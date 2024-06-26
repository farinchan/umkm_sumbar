<?php

namespace App\Http\Controllers\web\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input("search");
        $products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'search' => $search,
            'products' => $products->paginate(12)
        ];
        return view('front.product.index', $data);
    }

    public function product($slug)
    {
        $products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->where('products.slug', $slug)->first();
        $releatedProduct = ProductCategory::where('slug', $products->productCategory->slug)
            ->first()
            ->product()
            ->where('products.status', 1)
            ->inRandomOrder();
        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'product' => $products,
            'categoryProduct' => $products->productCategory->slug,
            'releatedProduct' => $releatedProduct->take(8)->get(),
        ];
        return view('front.product.product', $data);
    }

    public function category($slug)
    {
        $getCategory = ProductCategory::where('slug', $slug)->first();
        $products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->whereHas('productCategory', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'getCategory' => $getCategory,
            'products' => $products->paginate(10)
        ];
        return view('front.product.category', $data);
    }
}

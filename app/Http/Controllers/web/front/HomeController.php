<?php

namespace App\Http\Controllers\web\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = ProductCategory::where('status', 1)->get();
        $products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->leftJoin('product_reviews', 'products.id', '=', 'product_reviews.product_id')
            ->select('products.*', 'product_reviews.rating')->get();
        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'category' => $category,
            'products' => $products,
        ];
        return response()->json($data);
        return view('front.home.index', $data);
    }
}

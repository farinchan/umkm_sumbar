<?php

namespace App\Http\Controllers\web\front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Models\ProductViewer;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input("search");
        $categories_filter = $request->input("categories_filter");
        $review_filter = $request->input("review_filter");
        $city_filter = $request->input("city_filter");
        $products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        if ($categories_filter) {
            $products = $products->whereHas('productCategory', function ($query) use ($categories_filter) {
                $query->where('product_categories_id', $categories_filter);
            });
        }

        if ($review_filter) {
            $products = $products->whereHas('productReview', function ($query) use ($review_filter) {
                $query->select('product_id')
                    ->groupBy('product_id')
                    ->havingRaw('ROUND(AVG(rating),1) >= ' . $review_filter);
            });
        }

        if ($city_filter) {
            $products = $products->whereHas('shop', function ($query) use ($city_filter) {
                $query->where('city_id', $city_filter);
            });
        }

        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'search' => $search,
            'products' => $products->paginate(12),
            'categories_list' => ProductCategory::where('parent_id', '!=', null)->get(),
            'city_list' => City::all(),
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

        session(['product_history' => $products->id]);

        $currentUserInfo = Location::get(request()->ip());
        $productViewer = new ProductViewer();
        $productViewer->product_id = $products->id;
        $productViewer->ip = request()->ip();
        if ($currentUserInfo) {
            $productViewer->country = $currentUserInfo->countryName;
            $productViewer->city = $currentUserInfo->cityName;
            $productViewer->region = $currentUserInfo->regionName;
            $productViewer->postal_code = $currentUserInfo->postalCode;
            $productViewer->latitude = $currentUserInfo->latitude;
            $productViewer->longitude = $currentUserInfo->longitude;
            $productViewer->timezone = $currentUserInfo->timezone;
        }
        $productViewer->user_agent = Agent::getUserAgent();
        $productViewer->platform = Agent::platform();
        $productViewer->browser = Agent::browser();
        $productViewer->device = Agent::device();
        $productViewer->save();

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

    public function category(Request $request, $slug)
    {
        $review_filter = $request->input("review_filter");
        $city_filter = $request->input("city_filter");
        $getCategory = ProductCategory::where('slug', $slug)->first();
        $products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->whereHas('productCategory', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        if ($review_filter) {
            $products = $products->whereHas('productReview', function ($query) use ($review_filter) {
                $query->select('product_id')
                    ->groupBy('product_id')
                    ->havingRaw('ROUND(AVG(rating),1) >= ' . $review_filter);
            });
        }

        if ($city_filter) {
            $products = $products->whereHas('shop', function ($query) use ($city_filter) {
                $query->where('city_id', $city_filter);
            });
        }
        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'getCategory' => $getCategory,
            'products' => $products->paginate(12),
            'city_list' => City::all(),

        ];
        return view('front.product.category', $data);
    }

    public function postReview(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
            'product_id' => 'required',
        ]);

        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $productReview = new ProductReview();
        $productReview->product_id = $request->product_id;
        $productReview->user_id = auth()->user()->id;
        $productReview->rating = $request->rating;
        $productReview->comment = $request->comment;
        $productReview->save();

        return redirect()->back()->with('success', 'Review has been added');
    }


}

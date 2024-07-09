<?php

namespace App\Http\Controllers\web\front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SettingBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest_products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->latest();
        $latest_news = News::where('status', 1)->orderBy('created_at', 'desc');
        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'latest_products' => $latest_products->take(10)->get(),
            'latest_news' => $latest_news->take(4)->get(),
            'banner1' => SettingBanner::find(1),
            'banner2' => SettingBanner::find(2),
            'banner3' => SettingBanner::find(3),
        ];
        // return response()->json($data);
        return view('front.home.index', $data);
    }

  

    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => 'About page description',
            'keywords' => 'About page keywords',
        ];
        return view('front.home.about', $data);
    }

    public function help()
    {
        $data = [
            'title' => 'Help',
            'description' => 'Help page description',
            'keywords' => 'Help page keywords',
        ];
        return view('front.home.help', $data);
    }
}

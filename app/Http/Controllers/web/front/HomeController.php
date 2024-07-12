<?php

namespace App\Http\Controllers\web\front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SettingBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function index()
    {
        $latest_products = Product::where('products.status', 1)->orderBy('products.created_at', 'desc')
            ->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])
            ->latest();
        $latest_news = News::where('status', 1)->latest();

        $recomended1 = [];
        try {
            $product_history = session('product_history');
            if ($product_history) {
                $recomended1 = Http::get('https://ml-smart-umkm.gariskode.com/recomender/content', [
                    'product_id' => $product_history
                ])["recommendations"];

                foreach ($recomended1 as $key => $value) {
                    $recomended1[$key] = Product::where('id', $value)->where('status', 1)->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])->first();
                    if (!$recomended1[$key]) {
                        unset($recomended1[$key]);
                    }
                }

                $recomended1 = [
                    "filter" => "content",
                    "recommendations" => $recomended1
                ];
            } else {
                $recomended1 = Http::get('https://ml-smart-umkm.gariskode.com/recomender/ranking')["recommendations"];
                foreach ($recomended1 as $key => $value) {
                    $recomended1[$key] = Product::where('id', $value)->where('status', 1)->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])->first();
                    if (!$recomended1[$key]) {
                        unset($recomended1[$key]);
                    }
                }
                $recomended1 = [
                    "filter" => "ranking",
                    "recommendations" => $recomended1
                ];
            }
        } catch (\Throwable $th) {
        }

        $recomended2 = [];

        try {
            if (Auth::check()) {
                $recomended2 = Http::get('https://ml-smart-umkm.gariskode.com/recomender/item', [
                    'user_id' => auth()->user()->id
                ])["recommendations"];
    
                foreach ($recomended2 as $key => $value) {
                    $recomended2[$key] = Product::where('id', $value)->where('status', 1)->with(['productCategory', 'productImage', 'productReview', 'productViewer', 'shop'])->first();
                    if (!$recomended2[$key]) {
                        unset($recomended2[$key]);
                    }
                }
    
                $recomended2 = [
                    "filter" => "item-collaborative",
                    "recommendations" => $recomended2
                ];
            }
            
        } catch (\Throwable $th) {
        }

        $data = [
            'title' => 'Home',
            'description' => 'Home page description',
            'keywords' => 'Home page keywords',
            'latest_products' => $latest_products->take(10)->get(),
            'latest_news' => $latest_news->take(4)->get(),
            'banner1' => SettingBanner::find(1),
            'banner2' => SettingBanner::find(2),
            'banner3' => SettingBanner::find(3),
            'recomended1' => $recomended1,
            'recomended2' => $recomended2,
        ];
        // dd($data);
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

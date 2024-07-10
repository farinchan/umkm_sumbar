<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ProductReview;
use App\Models\shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->input("city");
        $shop = shop::where('status', 1)->orderBy('created_at', 'desc');
        if ($city) {
            $shop = $shop->whereHas('city', function ($query) use ($city) {
                $query->where('slug', $city);
            });
        }
        $list_city = City::with('shop')->get();

        $data = [
            'title' => 'Shop',
            'shop' => $shop->paginate(12),
            'list_city' => $list_city,
        ];
        // dd($data);
        return view('front.shop.index', $data);
    }

    public function shop($slug)
    {
        $shop = shop::where('status', 1)->where('slug', $slug)->first();
        if (!$shop) {
            abort(404, 'Shop not found');
        }
        $review = ProductReview::with('product')
            ->leftJoin('products', 'products.id', '=', 'product_reviews.product_id')
            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
            ->where('shops.id', $shop->id)
            ->select('product_reviews.*')
            ->orderBy('product_reviews.created_at', 'desc')
            ->take(6)->get();
        // dd($review);
        $data = [
            'title' => 'Shop',
            'shop' => $shop,
            'reviews' => $review,
            'products' => $shop->product()->where('status', 1)->paginate(12),
        ];
        return view('front.shop.shop', $data);
    }
}

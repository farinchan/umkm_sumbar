<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $data = [
            'title' => 'Cart',
            'description' => 'Cart page description',
            'keywords' => 'Cart page keywords',
        ];
        return view('front.product.cart', $data);
    }
    public function cartApi()
    {
        $userCart = UserCart::where('user_id', auth()->user()->id)->with('product')->get();
        $userCart->map(function ($item) {
            $item->product->image = $item->product->productImage->first()->image;
            return $item;
        });
        $userCart->map(function ($item) {
            $item->total_price = number_format($item->product->price * $item->quantity ,0,',','.');
        });
        $userCart->map(function ($item) {
            $item->product->price = number_format($item->product->price ,0,',','.');
            return $item;
        });
        
        $userCartCount = UserCart::where('user_id', auth()->user()->id)->count();
        $userCartTotal = UserCart::where('user_id', auth()->user()->id)->sum('quantity');
        $userCartTotalPrice = UserCart::where('user_id', auth()->user()->id)->with('product')->get()->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return response()->json([
            'userCart' => $userCart,
            'userCartCount' => $userCartCount,
            'userCartTotal' => $userCartTotal,
            'userCartTotalPrice' => $userCartTotalPrice,
        ]);
    }

    public function removeCart($id)
    {
        $userCart = UserCart::find($id);
        if (!$userCart) {
            return response()->json(['error' => 'Cart not found']);
        }
        $userCart->delete();
        return response()->json(['success' => 'Cart has been removed']);
    }
    

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(['error' => 'Product not found']);
        }

        $userCart = UserCart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->first();
        if ($userCart) {
            $userCart->quantity = $userCart->quantity + $request->quantity;
            $userCart->save();
        } else {
            $userCart = new UserCart();
            $userCart->product_id = $request->product_id;
            $userCart->quantity = $request->quantity;
            $userCart->user_id = auth()->user()->id;
            $userCart->save();
        }
        return response()->json(['success' => 'Product has been added to cart']);   
    }

}

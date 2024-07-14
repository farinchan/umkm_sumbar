<?php

use App\Http\Resources\ProductChatbot;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/info', function (Request $request) {
    return response()->json([
        'website' => SettingWebsite::first(),
        'products' => ProductChatbot::collection(Product::where('status', 1)->get()),
    ]);
});
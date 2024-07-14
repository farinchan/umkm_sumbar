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
    $website = SettingWebsite::first();
    return response()->json([
        'informasi' => '
        saya adalah chatbot yang dibuat untuk membantu Anda dalam menemukan produk yang Anda butuhkan.
        Aplikasi ini adalah aplikasi yang dibuat untuk membantu Anda dalam menemukan produk yang Anda butuhkan.
        Nama aplikasi ini adalah '. $website->name . '. Aplikasi ini dibuat oleh '. $website->name . ' Team - UIN Bukittinggi.
        ',
        'website_information' => $website,
        'products' => ProductChatbot::collection(Product::where('status', 1)->get()),
    ]);
});
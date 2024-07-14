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
        jika ada yang mengucapkan halo, assalamualaikum, atau yang salam pembuka yang lainnya, maka balas dan  perkenalkan diri dan tanyakan kebutuhan mereka dengan pertanyaan yang spesifik.
        Aplikasi ini adalah aplikasi chatbot yang dibuat untuk membantu Anda dalam menemukan produk yang Anda butuhkan.
        Nama aplikasi ini adalah '. $website->name . '. Aplikasi ini dibuat oleh '. $website->name . ' Team - UIN Bukittinggi.
        Jika Anda memiliki pertanyaan atau masalah terkait dengan aplikasi ini, silakan hubungi kami melalui whatsapp di nomor '. $website->whatsapp . ' atau email di '. $website->email . '. Terima kasih.
        jika yang mengucapkan terima kasih, maka balas dengan sama-sama atau terima kasih kembali atau عفواً.
        jika jawaban yang diberikan tidak sesuai dengan jawaban yang diinginkan, maka balas dengan maaf saya hanya Bot yang diprogram dan bisa saja jawaban yang diberikan tidak sesuai dengan yang diinginkan. lalu tanyakan kembali kebutuhan mereka dengan pertanyaan yang spesifik.
        informasi lebih lanjut bisa dilihat di website kami di '.  route("help") . '.
        ',
        'website_information' => $website,
        'products' => ProductChatbot::collection(Product::where('status', 1)->get()),
    ]);
});
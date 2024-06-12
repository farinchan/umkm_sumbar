<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index()
    {
        return view('back.shop.index');
    }

    public function create()
    {
        return view('back.shop.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'latitude' => '',
            'longitude' => '',
            'logo' => 'required',
            'banner' => 'required',
            'description' => 'required',
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'whatsapp' => '',
            'telegram' => '',
            'linkedin' => '',
            'meta_description' => '',
            'meta_keyword' => '',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.shop.index')->with('error', 'Gagal menambahkan toko baru')->withInput()->withErrors($validator);
        }

        $shop = new shop();
        $shop->name = $request->input('name');
        $shop->email = $request->input('email');
        $shop->phone = $request->input('phone');
        $shop->address = $request->input('address');
        $shop->latitude = $request->input('latitude');
        $shop->longitude = $request->input('longitude');
        $shop->logo = $request->input('logo');
        $shop->banner = $request->input('banner');
        $shop->description = $request->input('description');
        $shop->facebook = $request->input('facebook');
        $shop->instagram = $request->input('instagram');
        $shop->twitter = $request->input('twitter');
        $shop->youtube = $request->input('youtube');
        $shop->whatsapp = $request->input('whatsapp');
        $shop->telegram = $request->input('telegram');
        $shop->linkedin = $request->input('linkedin');
        $shop->meta_description = $request->input('meta_description');
        $shop->meta_keyword = $request->input('meta_keyword');
        $shop->city_id = $request->input('city_id');
        $shop->user_id = $request->input('user_id');
        $shop->save();
        return redirect()->route('admin.shop.index')->with('success', 'Berhasil menambahkan toko baru');
    }
}

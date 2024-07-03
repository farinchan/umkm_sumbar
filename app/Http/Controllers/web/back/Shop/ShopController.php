<?php

namespace App\Http\Controllers\Web\Back\Shop;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\shop;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function create()
    {
        if (shop::where('user_id', auth()->user()->id)->exists()) {
            return redirect()->route('admin.toko.detail')->with('error', 'Anda sudah memiliki toko');
        }
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Buat Toko Baru',
            'city' => City::all(),
        ];
        return view('back.shop.create', $data);
    }

    public function store(Request $request)
    {
        if (shop::where('user_id', auth()->user()->id)->exists()) {
            return redirect()->route('admin.toko.create')->with('error', 'Anda sudah memiliki toko');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'latitude' => '',
            'longitude' => '',
            'logo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'telegram' => '',
            'linkedin' => '',
            'meta_description' => '',
            'meta_keyword' => '',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('shop.create')->with('error', 'Gagal menambahkan toko baru')->withInput()->withErrors($validator);
        }


        $image = $request->file('logo');
        $fileName = time() . '_' . $image->getClientOriginalName();
        $filePath = $image->storeAs('images/shop/', $fileName, 'public');

        $shop = new shop();
        $shop->name = $request->input('name');
        $shop->slug = Str::slug($request->input('name')) . '-' . rand(1, 1000);
        $shop->email = $request->input('email');
        $shop->phone = $request->input('phone');
        $shop->address = $request->input('address');
        $shop->latitude = $request->input('latitude');
        $shop->longitude = $request->input('longitude');
        $shop->logo = $fileName;
        $shop->description = $request->input('description');
        $shop->facebook = $request->input('facebook');
        $shop->instagram = $request->input('instagram');
        $shop->twitter = $request->input('twitter');
        $shop->youtube = $request->input('youtube');
        $shop->telegram = $request->input('telegram');
        $shop->linkedin = $request->input('linkedin');
        $shop->meta_description = $request->input('meta_description');
        $shop->meta_keyword = $request->input('meta_keyword');
        $shop->city_id = $request->input('city_id');
        $shop->user_id = Auth::user()->id;
        $shop->save();
        return redirect()->route('shop.detail')->with('success', 'Berhasil membuat toko anda');
    }


    public function edit()
    {
        $shop = shop::leftJoin('users', 'shops.user_id', '=', 'users.id')
            ->leftJoin('cities', 'shops.city_id', '=', 'cities.id')
            ->select('shops.*', 'users.name as user_name', 'cities.name as city_name')
            ->where('shops.id', auth()->user()->shop->id)
            ->first();
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Edit Toko',
            'shop' => $shop,
            'city' => City::all(),
            'user' => User::Role('user')->get(),
        ];
        return view('back.shop.edit', $data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'latitude' => '',
            'longitude' => '',
            'logo' => 'mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'telegram' => '',
            'linkedin' => '',
            'meta_description' => '',
            'meta_keyword' => '',
            'city_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('shop.update')->with('error', 'Gagal mengubah data toko')->withInput()->withErrors($validator);
        }

        $shop = shop::where('user_id', auth()->user()->id)->first();
        $shop->name = $request->input('name');
        $shop->slug = Str::slug($request->input('name')) . '-' . $shop->id;
        $shop->email = $request->input('email');
        $shop->phone = $request->input('phone');
        $shop->address = $request->input('address');
        $shop->latitude = $request->input('latitude');
        $shop->longitude = $request->input('longitude');
        $shop->description = $request->input('description');
        $shop->facebook = $request->input('facebook');
        $shop->instagram = $request->input('instagram');
        $shop->twitter = $request->input('twitter');
        $shop->youtube = $request->input('youtube');
        $shop->telegram = $request->input('telegram');
        $shop->linkedin = $request->input('linkedin');
        $shop->meta_description = $request->input('meta_description');
        $shop->meta_keyword = $request->input('meta_keyword');
        $shop->city_id = $request->input('city_id');
        $shop->user_id = Auth::user()->id;
        if ($request->hasFile('logo')) {

            $image = $request->file('logo');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('images/shop/', $fileName, 'public');
            $shop->logo = $fileName;
        }
        $shop->save();
        return redirect()->route('shop.detail')->with('success', 'Berhasil mengubah data toko anda');
    }

    public function destroy()
    {
        $shop = shop::where('user_id', auth()->user()->id)->first();
        $shop->delete();
        return redirect()->route('home')->with('success', 'Berhasil menghapus toko anda');
    }

    public function detail()
    {
        $shop = shop::with(['user', 'city'])->where('user_id', auth()->user()->id)->first();
        if (!$shop) {
            return redirect()->route('shop.create')->with('error', 'Anda belum memiliki toko');
        }
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Detail Toko',
            'shop' => $shop,
        ];
        // return response()->json($data);
        return view('back.shop.detail', $data);
    }

    public function detailProduct(Request $request)
    {
        $search = $request->input('q');
        $shop = shop::with(['user', 'city'])->where('user_id', auth()->user()->id)->first();
        if (!$shop) {
            return redirect()->route('shop.create')->with('error', 'Anda belum memiliki toko');
        }
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Detail Produk Toko',
            'shop' => $shop,
            'product' => $shop->product()
                ->where(function ($query) use ($search) {
                    $query->where('products.name', 'LIKE', '%' . $search . '%');
                })
                ->leftJoin('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
                ->leftJoin('product_categories as parent', 'product_categories.parent_id', '=', 'parent.id')
                ->select('products.*', 'product_categories.name as category_name', 'parent.name as category_parent_name',)
                ->paginate(10),
        ];
        // return response()->json($data);
        return view('back.shop.detail_product', $data);
    }

    public function detailFollower()
    {
        $shop = shop::with(['ShopFollows.user'])->where('user_id', auth()->user()->id)->first();
        if (!$shop) {
            return redirect()->route('shop.create')->with('error', 'Anda belum memiliki toko');
        }
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Detail Follower Toko',
            'shop' => $shop,
            'follower' => $shop->ShopFollows,
        ];
        // return response()->json($data);
        return view('back.shop.detail_follower', $data);
    }
}

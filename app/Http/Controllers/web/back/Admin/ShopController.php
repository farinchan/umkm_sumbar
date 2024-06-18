<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ShopController extends Controller
{
    public function index()
    {
        $shop = shop::leftJoin('users', 'shops.user_id', '=', 'users.id')
            ->leftJoin('cities', 'shops.city_id', '=', 'cities.id')
            ->select('shops.*', 'users.name as user_name', 'cities.name as city_name')
            ->get();
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Daftar Toko',
            'shop' => $shop,
        ];
        return view('back.shop.index', $data);
    }

    public function create()
    {
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Tambah Toko',
            'city' => City::all(),
            'user' => User::Role('user')->get(),
        ];
        return view('back.shop.create',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
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
            return redirect()->route('admin.toko.create')->with('error', 'Gagal menambahkan toko baru')->withInput()->withErrors($validator);
        }

        $logo = $request->file('logo');
        $filename = now(). $logo->getClientOriginalName();
        $path = 'logo-toko/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($logo));

        $shop = new shop();
        $shop->name = $request->input('name');
        $shop->slug = Str::slug($request->input('name'));
        $shop->email = $request->input('email');
        $shop->phone = $request->input('phone');
        $shop->address = $request->input('address');
        $shop->latitude = $request->input('latitude');
        $shop->longitude = $request->input('longitude');
        $shop->logo = $filename;
        $shop->description = $request->input('description');
        $shop->facebook = $request->input('facebook');
        $shop->instagram = $request->input('instagram');
        $shop->twitter = $request->input('twitter');
        $shop->youtube = $request->input('youtube');
        $shop->telegram = $request->input('telegram');
        $shop->linkedin = $request->input('linkedin');
        $shop->meta_description = $request->input('meta_description');
        $shop->meta_keywords = $request->input('meta_keywords');
        $shop->city_id = $request->input('city_id');
        $shop->user_id = $request->input('user_id');
        $shop->save();
        return redirect()->route('admin.toko.create')->with('success', 'Berhasil menambahkan toko baru');
    }

    public function show($id)
    {
        $shop = shop::leftJoin('users', 'shops.user_id', '=', 'users.id')
            ->leftJoin('cities', 'shops.city_id', '=', 'cities.id')
            ->select('shops.*', 'users.name as user_name', 'cities.name as city_name')
            ->where('shops.id', $id)
            ->first();
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Detail Toko',
            'shop' => $shop,
        ];
        return view('back.shop.show', $data);
    }

    public function edit($id)
    {
        $shop = shop::leftJoin('users', 'shops.user_id', '=', 'users.id')
            ->leftJoin('cities', 'shops.city_id', '=', 'cities.id')
            ->select('shops.*', 'users.name as user_name', 'cities.name as city_name')
            ->where('shops.id', $id)
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

    public function update(Request $request, $id)
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
            return redirect()->route('admin.toko.edit', $id)->with('error', 'Gagal mengubah data toko')->withInput()->withErrors($validator);
        }

        $shop = shop::find($id);
        $shop->name = $request->input('name');
        $shop->slug = Str::slug($request->input('name'));
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
        $shop->meta_keywords = $request->input('meta_keywords');
        $shop->city_id = $request->input('city_id');
        $shop->user_id = $request->input('user_id');
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = now(). $logo->getClientOriginalName();
            $path = 'logo-toko/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($logo));
            $shop->logo = $filename;
        }
        $shop->save();
        return redirect()->route('admin.toko.edit', $id)->with('success', 'Berhasil mengubah data toko');

    }

    public function destroy($id)
    {
        $shop = shop::find($id);
        $shop->delete();
        return redirect()->route('admin.toko.index')->with('success', 'Berhasil menghapus data toko');
    }

    public function detail($id)
    {
        $shop = shop::with(['user', 'city'])->find($id);
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Detail Toko',
            'shop' => $shop,
        ];
        // return response()->json($data);
        return view('back.shop.detail', $data);
    }

    public function detailProduct($id)
    {
        $shop = shop::find($id);
        $data = [
            'menu_title' => 'Manajemen Toko',
            'submenu_title' => 'Toko',
            'title' => 'Detail Produk Toko',
            'shop' => $shop,
            'product' => $shop->product()->paginate(10),
        ];
        // return response()->json($data);
        return view('back.shop.detail_product', $data);
    }

    public function detailFollower($id)
    {
        $shop = shop::with(['ShopFollows.user'])->find($id);
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

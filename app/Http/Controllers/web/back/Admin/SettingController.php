<?php

namespace App\Http\Controllers\web\back\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function website ()
    {
        $data = [
            'menu_title' => 'Pengaturan',
            'submenu_title' => 'Website',
            'title' => 'Pengaturan Website'
        ];
        return view('back.setting.website', $data);
    }

    public function websiteUpdate (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'twitter' => 'required|string',
            'youtube' => 'required|string',
            'whatsapp' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
        ]);

        $setting = Setting::find(1);
        $setting->name = $request->name;
        $setting->tagline = $request->tagline;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtube;
        $setting->whatsapp = $request->whatsapp;
        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->meta_keyword = $request->meta_keyword;
        $setting->save();

        return redirect()->route('admin.setting.website')->with('success', 'Pengaturan Website berhasil diubah');
    }
}

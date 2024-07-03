<?php

namespace App\Http\Controllers\web\back\admin;

use App\Http\Controllers\Controller;
use App\Models\SettingBanner;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function website ()
    {
        $data = [
            'menu_title' => 'Pengaturan',
            'submenu_title' => 'Website',
            'title' => 'Pengaturan Website',
            'setting' => SettingWebsite::find(1) ?? ''
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

        $setting = SettingWebsite::find(1);
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

    public function banner ()
    {
        $data = [
            'menu_title' => 'Pengaturan',
            'submenu_title' => 'Banner',
            'title' => 'Pengaturan Banner',
            'banner1' => SettingBanner::find(1) ?? '',
            'banner2' => SettingBanner::find(2) ?? '',
            'banner3' => SettingBanner::find(3) ?? '',

        ];
        return view('back.setting.banner', $data);
    }

    public function bannerUpdate (Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'url' => 'required|string',
            'status' => 'required|in:1,0',
        ]);

        $banner = SettingBanner::find($id);
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->url = $request->url;
        $banner->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('images/banner/', $fileName, 'public');
            $banner->image = $fileName;
        }

        $banner->save();
        return redirect()->route('admin.setting.banner')->with('success', 'Pengaturan Banner berhasil diubah');
    }
}

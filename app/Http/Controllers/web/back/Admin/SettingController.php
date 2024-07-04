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
            'setting' => SettingWebsite::first(),
        ];
        return view('back.setting.website', $data);
    }

    public function websiteUpdate (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'telegram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'about' => 'nullable|string',
        ]);

        $setting = SettingWebsite::first();
        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->latitude = $request->latitude;
        $setting->longitude = $request->longitude;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtube;
        $setting->whatsapp = $request->whatsapp;
        $setting->telegram = $request->telegram;
        $setting->linkedin = $request->linkedin;
        $setting->about = $request->about;

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);
            $logo = $request->file('logo');
            $logoName = time() . '_' . 'LOGO' . '_' . $logo->getClientOriginalName();
            $logoPath = $logo->storeAs('images/setting/', $logoName, 'public');
            $setting->logo = $logoName;
        }

        if ($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'required|mimes:jpg,jpeg,png,ico|max:2048',
            ]);
            $favicon = $request->file('favicon');
            $faviconName = time() . '_' . 'FAVICON' . '_' . $favicon->getClientOriginalName();
            $faviconPath = $favicon->storeAs('images/setting/', $faviconName, 'public');
            $setting->favicon = $faviconName;
        }

        $setting->save();
        return redirect()->route('admin.setting.website')->with('success', 'Pengaturan Website berhasil diubah');
    }

    public function informationUpdate (Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required|string',
            'terms_and_conditions' => 'required|string',
            'return_policy' => 'required|string',
            'refund_policy' => 'required|string',
            'shipping_policy' => 'required|string',
            'payment_policy' => 'required|string',
            'cancellation_policy' => 'required|string',
        ]);

        $setting = SettingWebsite::first();
        $setting->privacy_policy = $request->privacy_policy;
        $setting->terms_and_conditions = $request->terms_and_conditions;
        $setting->return_policy = $request->return_policy;
        $setting->refund_policy = $request->refund_policy;
        $setting->shipping_policy = $request->shipping_policy;
        $setting->payment_policy = $request->payment_policy;
        $setting->cancellation_policy = $request->cancellation_policy;

        $setting->save();
        return redirect()->route('admin.setting.website')->with('success', 'Pengaturan Informasi berhasil diubah');
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

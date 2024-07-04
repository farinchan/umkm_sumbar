<?php

namespace Database\Seeders;

use App\Models\SettingBanner;
use App\Models\SettingWebsite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingBanner::create([
            'title' => 'Banner 1',
            'subtitle' => 'Ini adalah banner 1',
            'image' => 'banner.jpg',
            'url' => 'https://google.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SettingBanner::create([
            'title' => 'Banner 2',
            'subtitle' => 'Ini adalah banner 2',
            'image' => 'banner.jpg',
            'url' => 'https://facebook.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SettingBanner::create([
            'title' => 'Banner 3',
            'subtitle' => 'Ini adalah banner 3',
            'image' => 'banner.jpg',
            'url' => 'https://twitter.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SettingWebsite::create([
            'name' => 'Nama Website',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'email' => 'smartumkm@gariskode.com',
            'phone' => '08123456789',
            'address' => 'Jl. Lorem ipsum dolor sit amet',
            'latitude' => '-0.123456',
            'longitude' => '100.123456',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'twitter' => 'https://twitter.com',
            'youtube' => 'https://youtube.com',
            'whatsapp' => 'https://wa.me/628123456789',
            'telegram' => 'https://t.me',
            'linkedin' => 'https://linkedin.com',
            'about' => '<p> smart UMKM adalah platform yang membantu UMKM untuk memasarkan produknya secara online khususnya di wilayah Sumatera Barat. <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'privacy_policy' => '<p>  privacy policy <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'terms_and_conditions' => '<p> terms and conditions <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'return_policy' => '<p> return policy <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'refund_policy' => '<p> refund policy <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'shipping_policy' => '<p> shipping policy <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'payment_policy' => '<p> payment policy <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            'cancellation_policy' => '<p> cancellation policy <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
            ]);
    }    
}

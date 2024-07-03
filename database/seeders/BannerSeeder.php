<?php

namespace Database\Seeders;

use App\Models\SettingBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingBanner::create([
            'title' => 'Banner 1',
            'subtitle' => 'Ini adalah banner 1',
            'image' => 'banner1.jpg',
            'url' => 'https://google.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SettingBanner::create([
            'title' => 'Banner 2',
            'subtitle' => 'Ini adalah banner 2',
            'image' => 'banner2.jpg',
            'url' => 'https://facebook.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SettingBanner::create([
            'title' => 'Banner 3',
            'subtitle' => 'Ini adalah banner 3',
            'image' => 'banner3.jpg',
            'url' => 'https://twitter.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

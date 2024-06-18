<?php

namespace Database\Seeders;

use App\Models\shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       shop::create([
            'name' => 'Toko A',
            'slug' => 'toko-a',
            'logo' => 'logo.png',
            'email' => 'tokoa@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 1',
            'latitude' => '-6.123456',
            'longitude' => '106.123456',
            'description' => 'Toko A adalah toko yang menjual berbagai macam produk',
            'facebook' => 'https://facebook.com/toko-a',
            'instagram' => 'https://instagram.com/toko-a',
            'twitter' => 'https://twitter.com/toko-a',
            'youtube' => 'https://youtube.com/toko-a',
            'telegram' => 'https://t.me/toko-a',
            'linkedin' => 'https://linkedin.com/toko-a',
            'meta_description' => 'Toko A adalah toko yang menjual berbagai macam produk',
            'meta_keyword' => 'toko, produk, jual, beli',
            'city_id' => 1,
            'user_id' => 1,
        ]);

        shop::create([
            'name' => 'Toko B',
            'slug' => 'toko-b',
            'logo' => 'logo.png',
            'email' => 'tokob@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 2',
            'latitude' => '-6.123456',
            'longitude' => '106.123456',
            'description' => 'Toko B adalah toko yang menjual berbagai macam produk',
            'facebook' => 'https://facebook.com/toko-b',
            'instagram' => 'https://instagram.com/toko-b',
            'twitter' => 'https://twitter.com/toko-b',
            'youtube' => 'https://youtube.com/toko-b',
            'telegram' => 'https://t.me/toko-b',
            'linkedin' => 'https://linkedin.com/toko-b',
            'meta_description' => 'Toko B adalah toko yang menjual berbagai macam produk',
            'meta_keyword' => 'toko, produk, jual, beli',
            'city_id' => 2,
            'user_id' => 2,
        ]);

                
        shop::create([
            'name' => 'Toko C',
            'slug' => 'toko-c',
            'logo' => 'logo.png',
            'email' => 'tokoc@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 3',
            'latitude' => '-6.123456',
            'longitude' => '106.123456',
            'description' => 'Toko C adalah toko yang menjual berbagai macam produk',
            'facebook' => 'https://facebook.com/toko-c',
            'instagram' => 'https://instagram.com/toko-c',
            'twitter' => 'https://twitter.com/toko-c',
            'youtube' => 'https://youtube.com/toko-c',
            'telegram' => 'https://t.me/toko-c',
            'linkedin' => 'https://linkedin.com/toko-c',
            'meta_description' => 'Toko C adalah toko yang menjual berbagai macam produk',
            'meta_keyword' => 'toko, produk, jual, beli',
            'city_id' => 3,
            'user_id' => 3,
        ]);

        

    }
}

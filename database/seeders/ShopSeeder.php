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
            'logo' => 'logo_toko_a.png',
            'email' => 'tokoa@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Khatib Sulaiman, Alai Parak Kopi, Kec. Padang Utara, Kota Padang, Sumatera Barat 25173', 
            'latitude' => '-0.9241890795608046',
            'longitude' => '100.36155100240138',
            'description' => 'Toko A adalah toko yang menjual berbagai macam produk, produk yang dijual di toko A adalah produk yang berkualitas dan harga yang terjangkau. Toko A juga memberikan pelayanan yang terbaik kepada pelanggan. Toko A juga menerima pembelian secara online dan melayani pengiriman ke seluruh Indonesia dan juga menerima pembayaran dengan berbagai macam metode pembayaran. Toko A juga memberikan garansi untuk setiap produk yang dijual. Toko A juga memberikan diskon untuk setiap pembelian produk. Toko A juga memberikan voucher belanja untuk setiap pembelian produk. Toko A juga memberikan hadiah untuk setiap pembelian produk.',
            'facebook' => 'https://facebook.com/toko-a',
            'instagram' => 'https://instagram.com/toko-a',
            'twitter' => 'https://twitter.com/toko-a',
            'youtube' => 'https://youtube.com/toko-a',
            'telegram' => 'https://t.me/toko-a',
            'linkedin' => 'https://linkedin.com/toko-a',
            'meta_description' => 'Toko A adalah toko yang menjual berbagai macam produk',
            'meta_keyword' => '[{"value":"murah"},{"value":"meriah"},{"value":"muntah"}]',
            'city_id' => 1,
            'user_id' => 2,
        ]);

        shop::create([
            'name' => 'Toko B',
            'slug' => 'toko-b',
            'logo' => 'logo_toko_b.png',
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
            'meta_keyword' => '[{"value":"murah"},{"value":"meriah"},{"value":"muntah"}]',
            'city_id' => 2,
            'user_id' => 3,
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductViewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner',
            'description' => '<p>Kuliner khas sumaatera barat yang enak dan lezat</p>',
            'image' => 'kuliner.jpg',
            'meta_title' => 'Kuliner',
            'meta_description' => 'Kuliner khas sumatera barat yang enak dan lezat',
            'meta_keyword' => 'Kuliner',
        ]);

        ProductCategory::create([
            'name' => 'Keripik',
            'slug' => 'keripik',
            'description' => '<p>Keripik khas sumatera barat yang garin dan renyah</p>',
            'image' => 'keripik.jpg',
            'meta_title' => 'Keripik',
            'meta_description' => 'Keripik khas sumatera barat yang garin dan renyah',
            'meta_keyword' => 'Keripik',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Kue',
            'slug' => 'kue',
            'description' => '<p>Kue-kue khas sumatera barat yang enak dan lezat</p>',
            'image' => 'kue.jpg',
            'meta_title' => 'Kue',
            'meta_description' => 'Kue-kue khas sumatera barat yang enak dan lezat',
            'meta_keyword' => 'Kue',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Makanan Berat',
            'slug' => 'makanan-berat',
            'description' => '<p>Makanan berat khas sumatera barat yang enak dan lezat</p>',
            'image' => 'makanan_berat.jpg',
            'meta_title' => 'Makanan Berat',
            'meta_description' => 'Makanan berat khas sumatera barat yang enak dan lezat',
            'meta_keyword' => 'Makanan Berat',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Kerajinan',
            'slug' => 'kerajinan',
            'description' => '<p>Kerajinan khas sumatera barat yang unik dan menarik</p>',
            'image' => 'kerajinan.jpg',
            'meta_title' => 'Kerajinan',
            'meta_description' => 'Kerajinan khas sumatera barat yang unik dan menarik',
            'meta_keyword' => 'Kerajinan',
        ]);

        ProductCategory::create([
            'name' => 'Batik',
            'slug' => 'batik',
            'description' => '<p>Batik khas sumatera barat yang unik dan menarik</p>',
            'image' => 'batik.jpg',
            'meta_title' => 'Batik',
            'meta_description' => 'Batik khas sumatera barat yang unik dan menarik',
            'meta_keyword' => 'Batik',
            'parent_id' => 5,
        ]);

        ProductCategory::create([
            'name' => 'Tenun',
            'slug' => 'tenun',
            'description' => '<p>Tenun khas sumatera barat yang unik dan menarik</p>',
            'image' => 'tenun.jpg',
            'meta_title' => 'Tenun',
            'meta_description' => 'Tenun khas sumatera barat yang unik dan menarik',
            'meta_keyword' => 'Tenun',
            'parent_id' => 5,
        ]);

        ProductCategory::create([
            'name' => 'Anyaman',
            'slug' => 'anyaman',
            'description' => '<p>Anyaman khas sumatera barat yang unik dan menarik</p>',
            'image' => 'anyaman.jpg',
            'meta_title' => 'Anyaman',
            'meta_description' => 'Anyaman khas sumatera bara yang unik dan menarik',
            'meta_keyword' => 'Anyaman',
            'parent_id' => 5,
        ]);

        Product::create([
            'name' => 'Karak Kaliang',
            'slug' => 'karak-kaliang-'.rand(100, 999),
            'description' => '<p>Karak Kaliang adalah kuliner khas sumatera barat yang enak dan lezat</p>',
            'short_description' => 'Karak Kaliang',
            'price' => 10000,
            'discount' => 0,
            'stock' => 100,
            'product_categories_id' => 2,
            'shop_id' => 1,
            'weight' => 250,
            'size' => '10x10x1',
            'brand' => 'kerupuk sanjai rina',
            'tags' => 'Karak Kaliang, Kuliner, Sumatera Barat, keripik, keripik khas sumatera barat, keripik khas sumbar',
            'meta_title' => 'Karak Kaliang',
            'meta_description' => 'Karak Kaliang adalah kuliner khas sumatera barat yang enak dan lezat',
            'meta_keyword' => 'Karak Kaliang, Kuliner, Sumatera Barat, keripik, keripik khas sumatera barat, keripik khas sumbar',
        ]);

        Product::create([
            'name' => 'Kripik Balado',
            'slug' => 'kripik-balado-'.rand(100, 999),
            'description' => '<p>Kripik Balado adalah kuliner khas sumatera barat yang enak dan lezat</p>',
            'short_description' => 'Kripik Balado',
            'price' => 15000,
            'discount' => 10,
            'stock' => 100,
            'product_categories_id' => 2,
            'shop_id' => 1,
            'weight' => 250,
            'size' => '10x10x1',
            'brand' => 'kerupuk sanjai rina',
            'tags' => 'Kripik Balado, Kuliner, Sumatera Barat, keripik, keripik khas sumatera barat, keripik khas sumbar',
            'meta_title' => 'Kripik Balado',
            'meta_description' => 'Kripik Balado adalah kuliner khas sumatera barat yang enak dan lezat',
            'meta_keyword' => 'Kripik Balado, Kuliner, Sumatera Barat, keripik, keripik khas sumatera barat, keripik khas sumbar',
        ]);

        Product::create([
            'name' => 'Galamai',
            'slug' => 'galamai-'.rand(100, 999),
            'description' => '<p>Galamai adalah kuliner khas sumatera barat yang enak dan lezat</p>',
            'short_description' => 'Galamai',
            'price' => 20000,
            'discount' => 0,
            'stock' => 100,
            'product_categories_id' => 3,
            'shop_id' => 1,
            'weight' => 250,
            'size' => '10x10x1',
            'brand' => 'kerupuk sanjai rina',
            'tags' => 'Galamai, Kuliner, Sumatera Barat, kue, kue khas sumatera barat, kue khas sumbar',
            'meta_title' => 'Galamai',
            'meta_description' => 'Galamai adalah kuliner khas sumatera barat yang enak dan lezat',
            'meta_keyword' => 'Galamai, Kuliner, Sumatera Barat, kue, kue khas sumatera barat, kue khas sumbar',
        ]);

        Product::create([
            'name' => 'Batik Tanah Liek',
            'slug' => 'batik-tanah-liek-'.rand(100, 999),
            'description' => '<p>Batik Tanah Liek adalah batik khas sumatera barat yang unik dan menarik</p>',
            'short_description' => 'Batik Tanah Liek',
            'price' => 350000,
            'discount' => 10,
            'stock' => 1,
            'product_categories_id' => 6,
            'shop_id' => 2,
            'weight' => 250,
            'size' => '10x10x1',
            'brand' => 'Fajri Fashion',
            'tags' => 'Batik Tanah Liek, Batik, Sumatera Barat, batik khas sumatera barat, batik khas sumbar',
            'meta_title' => 'Batik Tanah Liek',
            'meta_description' => 'Batik Tanah Liek adalah batik khas sumatera barat yang unik dan menarik',
            'meta_keyword' => 'Batik Tanah Liek, Batik, Sumatera Barat, batik khas sumatera barat, batik khas sumbar',
        ]);

        Product::create([
            'name' => 'Songket Minangkabau',
            'slug' => 'songket-minangkabau-'.rand(100, 999),
            'description' => '<p>Songket Minangkabau adalah songket khas sumatera barat yang unik dan menarik</p>',
            'short_description' => 'Songket Minangkabau',
            'price' => 500000,
            'discount' => 0,
            'stock' => 3,
            'product_categories_id' => 7,
            'shop_id' => 2,
            'weight' => 250,
            'size' => '10x10x1',
            'brand' => 'Fajri Fashion',
            'tags' => 'Songket Minangkabau, Songket, Sumatera Barat, songket khas sumatera barat, songket khas sumbar',
            'meta_title' => 'Songket Minangkabau',
            'meta_description' => 'Songket Minangkabau adalah songket khas sumatera barat yang unik dan menarik',
            'meta_keyword' => 'Songket Minangkabau, Songket, Sumatera Barat, songket khas sumatera barat, songket khas sumbar',
        ]);

        Product::create([
            'name' => 'Tenun Pandai Sikek',
            'slug' => 'tenun-pandai-sikek-'.rand(100, 999),
            'description' => '<p>Tenun Pandai Sikek adalah tenun khas sumatera barat yang unik dan menarik</p>',
            'short_description' => 'Tenun Pandai Sikek',
            'price' => 750000,
            'discount' => 0,
            'stock' => 12,
            'product_categories_id' => 7,
            'shop_id' => 2,
            'weight' => 250,
            'size' => '10x10x1',
            'brand' => 'Fajri Fashion',
            'tags' => 'Tenun Pandai Sikek, Tenun, Sumatera Barat, tenun khas sumatera barat, tenun khas sumbar',
            'meta_title' => 'Tenun Pandai Sikek',
            'meta_description' => 'Tenun Pandai Sikek adalah tenun khas sumatera barat yang unik dan menarik',
            'meta_keyword' => 'Tenun Pandai Sikek, Tenun, Sumatera Barat, tenun khas sumatera barat, tenun khas sumbar',
        ]);


        // Product::factory(10)->create();


        // foreach (range(3, 12) as $index) {
        //     ProductImage::create([
        //         'product_id' => $index,
        //         'image' => 'product_placeholder.jpg',
        //     ]);
        //     ProductImage::create([
        //         'product_id' => $index,
        //         'image' => 'product_placeholder.jpg',
        //     ]);
        //     ProductReview::create([
        //         'product_id' => $index,
        //         'user_id' => 6,
        //         'rating' => 4,
        //         'review' => 'Bagus sekali produk ini, saya suka sekali dengan produk ini dan akan merekomendasikan produk ini kepada teman-teman saya yang lain untuk membeli produk ini juga karena produk ini sangat bagus dan berkualitas tinggi dan harga yang terjangkau dan terbaik. Terima kasih.',
        //     ]);
        // }

        ProductImage::create([
            'product_id' => 1,
            'image' => 'karak_kaliang.png',
        ]);

        ProductImage::create([
            'product_id' => 2,
            'image' => 'kripik_balado.png',
        ]);

        ProductImage::create([
            'product_id' => 3,
            'image' => 'galamai.png',
        ]);

        ProductImage::create([
            'product_id' => 4,
            'image' => 'batik_tanah_liek.png',
        ]);

        ProductImage::create([
            'product_id' => 5,
            'image' => 'songket_minangkabau.png',
        ]);

        ProductImage::create([
            'product_id' => 6,
            'image' => 'tenun_pandai_sikek.png',
        ]);

        

        ProductReview::create([
            'product_id' => 4,
            'user_id' => 2,
            'rating' => 5,
            'review' => 'Bagus sekali batik ini, saya suka sekali dengan batik ini dan akan merekomendasikan batik ini kepada teman-teman saya yang lain untuk membeli batik ini juga karena batik ini sangat bagus dan berkualitas tinggi dan harga yang terjangkau dan terbaik. Terima kasih.',
        ]);

        ProductReview::create([
            'product_id' => 2,
            'user_id' => 3,
            'rating' => 5,
            'review' => 'Lezat sekali kripik balado ini, saya suka sekali dengan kripik balado ini dan akan merekomendasikan kripik balado ini kepada teman-teman saya yang lain untuk membeli kripik balado ini juga karena kripik balado ini sangat enak dan berkualitas tinggi dan harga yang terjangkau dan terbaik. Terima kasih.',
        ]);

        ProductViewer::create([
            'product_id' => 1,
            'ip' => '10.10.10.10',
            'country' => 'Indonesia',
            'city' => 'Jakarta',
            'region' => 'DKI Jakarta',
            'postal_code' => '12345',
            'latitude' => '-6.2088',
            'longitude' => '106.8456',
            'timezone' => 'Asia/Jakarta',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
            'platform' => 'Windows',
            'browser' => 'Chrome',
            'device' => 'Computer',
        ]);


    }
}

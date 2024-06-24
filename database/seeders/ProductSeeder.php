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
            'name' => 'Elektronik',
            'slug' => 'elektronik',
            'description' => 'Elektronik adalah barang elektronik yang digunakan untuk kebutuhan sehari-hari',
            'image' => 'elektronik.jpg',
            'meta_title' => 'Elektronik',
            'meta_description' => 'Elektronik adalah barang elektronik yang digunakan untuk kebutuhan sehari-hari',
            'meta_keyword' => 'Elektronik',
            'parent_id' => null,
        ]);

        
        ProductCategory::create([
            'name' => 'Handphone',
            'slug' => 'handphone',
            'description' => 'Handphone adalah barang elektronik yang digunakan untuk berkomunikasi',
            'image' => 'handphone.jpg',
            'meta_title' => 'Handphone',
            'meta_description' => 'Handphone adalah barang elektronik yang digunakan untuk berkomunikasi',
            'meta_keyword' => 'Handphone',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Laptop',
            'slug' => 'laptop',
            'description' => 'Laptop adalah barang elektronik yang digunakan untuk bekerja',
            'image' => 'laptop.jpg',
            'meta_title' => 'Laptop',
            'meta_description' => 'Laptop adalah barang elektronik yang digunakan untuk bekerja',
            'meta_keyword' => 'Laptop',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Aksesoris',
            'slug' => 'aksesoris',
            'description' => 'Aksesoris adalah barang elektronik yang digunakan untuk melengkapi barang elektronik',
            'image' => 'aksesoris.jpg',
            'meta_title' => 'Aksesoris',
            'meta_description' => 'Aksesoris adalah barang elektronik yang digunakan untuk melengkapi barang elektronik',
            'meta_keyword' => 'Aksesoris',
            'parent_id' => 1,
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S21',
            'slug' => 'samsung-galaxy-s21',
            'description' => 'Samsung Galaxy S21 adalah handphone terbaru dari Samsung',
            'short_description' => 'Samsung Galaxy S21',
            'price' => 15000000,
            'discount' => 0,
            'stock' => 10,
            'product_categories_id' => 2,
            'shop_id' => 1,
            'weight' => 200,
            'size' => '10x5x1',
            'brand' => 'Samsung',
            'meta_title' => 'Samsung Galaxy S21',
            'meta_description' => 'Samsung Galaxy S21 adalah handphone terbaru dari Samsung',
            'meta_keyword' => 'Samsung Galaxy S21',
        ]);

        Product::create([
            'name' => 'Macbook Pro 2021',
            'slug' => 'macbook-pro-2021',
            'description' => 'Macbook Pro 2021 adalah laptop terbaru dari Apple',
            'short_description' => 'Macbook Pro 2021',
            'price' => 25000000,
            'discount' => 0,
            'stock' => 10,
            'product_categories_id' => 3,
            'shop_id' => 1,
            'weight' => 2000,
            'size' => '20x10x1',
            'brand' => 'Apple',
            'meta_title' => 'Macbook Pro 2021',
            'meta_description' => 'Macbook Pro 2021 adalah laptop terbaru dari Apple',
            'meta_keyword' => 'Macbook Pro 2021',
        ]);


        ProductImage::create([
            'product_id' => 1,
            'image' => 'samsung1.jpg',
        ]);

        ProductImage::create([
            'product_id' => 1,
            'image' => 'samsung2.jpg',
        ]);

        ProductImage::create([
            'product_id' => 2,
            'image' => 'laptop.jpg',
        ]);

        ProductImage::create([
            'product_id' => 2,
            'image' => 'laptop2.jpg',
        ]);

        ProductReview::create([
            'product_id' => 1,
            'user_id' => 3,
            'rating' => 5,
            'review' => 'Bagus sekali handphone ini',
        ]);

        ProductReview::create([
            'product_id' => 2,
            'user_id' => 3,
            'rating' => 5,
            'review' => 'Bagus sekali laptop ini',
        ]);

        ProductViewer::create([
            'product_id' => 1,
            'ip_address' => '10.10.10.1',
            'device' => 'Desktop',
            'browser' => 'Chrome',
            'platform' => 'Windows',
            'country' => 'Indonesia',
            'city' => 'Jakarta',
            'state' => 'DKI Jakarta',
            'postal_code' => '12345',
        ]);

        ProductViewer::create([
            'product_id' => 2,
            'ip_address' => '192.168.1.1',
            'device' => 'Mobile',
            'browser' => 'Safari',
            'platform' => 'iOS',
            'country' => 'Indonesia',
            'city' => 'Jakarta',
            'state' => 'DKI Jakarta',
            'postal_code' => '12345',
        ]);


    }
}

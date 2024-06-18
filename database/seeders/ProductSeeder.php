<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
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

        Product::create([
            'name' => 'Charger Samsung',
            'slug' => 'charger-samsung',
            'description' => 'Charger Samsung adalah aksesoris handphone dari Samsung',
            'short_description' => 'Charger Samsung',
            'price' => 50000,
            'discount' => 0,
            'stock' => 10,
            'product_categories_id' => 4,
            'shop_id' => 1,
            'weight' => 100,
            'size' => '5x5x1',
            'brand' => 'Samsung',
            'meta_title' => 'Charger Samsung',
            'meta_description' => 'Charger Samsung adalah aksesoris handphone dari Samsung',
            'meta_keyword' => 'Charger Samsung',
        ]);

        Product::create([
            'name' => 'Case Macbook Pro 2021',
            'slug' => 'case-macbook-pro-2021',
            'description' => 'Case Macbook Pro 2021 adalah aksesoris laptop dari Apple',
            'short_description' => 'Case Macbook Pro 2021',
            'price' => 500000,
            'discount' => 0,
            'stock' => 10,
            'product_categories_id' => 4,
            'shop_id' => 1,
            'weight' => 200,
            'size' => '10x10x1',
            'brand' => 'Apple',
            'meta_title' => 'Case Macbook Pro 2021',
            'meta_description' => 'Case Macbook Pro 2021 adalah aksesoris laptop dari Apple',
            'meta_keyword' => 'Case Macbook Pro 2021',
        ]);


    }
}

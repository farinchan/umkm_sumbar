<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);

        City::create([
            'name' => 'Padang',
            'slug' => 'padang',
            'postal_code' => '25111',
        ]);

        City::create([
            'name' => 'Bukittinggi',
            'slug' => 'bukittinggi',
            'postal_code' => '26111',
        ]);

        City::create([
            'name' => 'Pariaman',
            'slug' => 'pariaman',
            'postal_code' => '27111',
        ]);

        City::create([
            'name' => 'Payakumbuh',
            'slug' => 'payakumbuh',
            'postal_code' => '28111',
        ]);

        City::create([
            'name' => 'Sawahlunto',
            'slug' => 'sawahlunto',
            'postal_code' => '29111',
        ]);

        City::create([
            'name' => 'Solok',
            'slug' => 'solok',
            'postal_code' => '30111',
        ]);

        City::create([
            'name' => 'Padang Panjang',
            'slug' => 'padang-panjang',
            'postal_code' => '31111',
        ]);

        City::create([
            'name' => 'Painan',
            'slug' => 'painan',
            'postal_code' => '32111',
        ]);
        
        ProductCategory::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
            'description' => 'Elektronik',
            'image' => 'elektronik.jpg',
            'meta_title' => 'Elektronik',
            'meta_description' => 'Elektronik adalah barang elektronik yang digunakan untuk kebutuhan sehari-hari',
            'meta_keywords' => 'Elektronik',
            'parent_id' => null,
        ]);

        ProductCategory::create([
            'name' => 'Handphone',
            'slug' => 'handphone',
            'description' => 'Handphone',
            'image' => 'handphone.jpg',
            'meta_title' => 'Handphone',
            'meta_description' => 'Handphone adalah barang elektronik yang digunakan untuk berkomunikasi',
            'meta_keywords' => 'Handphone',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Laptop',
            'slug' => 'laptop',
            'description' => 'Laptop',
            'image' => 'laptop.jpg',
            'meta_title' => 'Laptop',
            'meta_description' => 'Laptop adalah barang elektronik yang digunakan untuk bekerja',
            'meta_keywords' => 'Laptop',
            'parent_id' => 1,
        ]);

        ProductCategory::create([
            'name' => 'Aksesoris',
            'slug' => 'aksesoris',
            'description' => 'Aksesoris',
            'image' => 'aksesoris.jpg',
            'meta_title' => 'Aksesoris',
            'meta_description' => 'Aksesoris adalah barang elektronik yang digunakan untuk melengkapi barang elektronik',
            'meta_keywords' => 'Aksesoris',
            'parent_id' => 1,
        ]);

    }
}

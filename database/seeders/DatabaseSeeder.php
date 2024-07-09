<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\shop;
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
            'name' => 'Bukittinggi',
            'slug' => 'bukittinggi',
            'postal_code' => '26111',
        ]);

        City::create([
            'name' => 'Sijunjung',
            'slug' => 'sijunjung',
            'postal_code' => '27111',
        ]);

        City::create([
            'name' => 'Padang',
            'slug' => 'padang',
            'postal_code' => '25111',
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

        $this->call(ShopSeeder::class);
        
        $this->call(ProductSeeder::class);

        $this->call(NewsSeeder::class);

        $this->call(SettingSeeder::class);



    }
}

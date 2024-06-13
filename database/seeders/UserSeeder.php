<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin =  Role::create(['name' => 'superadmin']);
        $admin =  Role::create(['name' => 'admin']);
        $user =  Role::create(['name' => 'user']);

        $userSuperAdmin = User::create([
            'name' => 'Fajri Rinaldi Chan',
            'email' => 'fajri@gariskode.com',
            'gender' => 'laki-laki',
            'password' => bcrypt('password'),
        ]);

        $userSuperAdmin->assignRole($superadmin);

        User::factory(10)->create()
            ->each(function ($user) {
                $user->assignRole('user');
            });;
    }
}

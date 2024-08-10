<?php

namespace App\Imports;

use App\Models\Shop;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;

class ShopImport implements ToModel, WithHeadingRow, WithValidation, WithProgressBar
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function model(array $row)
    {
        return Shop::updateOrCreate(
            [
                'user_id' => $row['user_id']
            ],
            [
                'name' => $row['name'],
                'slug' => $row['slug'],
                'logo' => $row['logo'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'description' => $row['description'],
                'facebook' => $row['facebook'],
                'instagram' => $row['instagram'],
                'twitter' => $row['twitter'],
                'youtube' => $row['youtube'],
                'telegram' => $row['telegram'],
                'linkedin' => $row['linkedin'],
                'verified' => $row['verified'],
                'status' => $row['status'],
                'meta_description' => $row['meta_description'],
                'meta_keyword' => $row['meta_keyword'],
                'city_id' => $row['city_id'],
            ]
        );

    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:shops,slug',
            'logo' => 'nullable',
            'email' => 'required|email|unique:shops,email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'description' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'telegram' => 'nullable',
            'linkedin' => 'nullable',
            'verified' => 'nullable',
            'status' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'city_id' => 'required|exists:cities,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'slug.required' => 'Slug harus diisi',
            'slug.unique' => 'Slug sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah terdaftar',
            'city_id.required' => 'Kota harus diisi',
            'city_id.exists' => 'Kota tidak ditemukan',
            'user_id.required' => 'User harus diisi',
            'user_id.exists' => 'User tidak ditemukan',
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }
}

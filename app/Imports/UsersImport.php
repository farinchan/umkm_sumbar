<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        $user = User::updateOrCreate(
            [
                'email' => $row['email']
            ],
            [
                'id' => $row['id'],
                'name' => $row['name'],
                'gender' => $row['gender'],
                'phone' => $row['phone'],
                'photo' => $row['photo'],
                'password' => $row['password'],
            ]
        );

        $user->assignRole('user');

        return $user;

    }
    
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'phone' => 'nullable',
            'photo' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }
}

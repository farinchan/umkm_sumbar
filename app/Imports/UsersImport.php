<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;


class UsersImport implements ToModel, WithHeadingRow, WithValidation, WithProgressBar
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

        use Importable;
    
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

    public function customValidationMessages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'gender.in' => 'Jenis kelamin harus diisi laki-laki atau perempuan',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }
}

<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\City;
use App\Models\CityAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function user(Request $request)
    {
        $search = $request->input('q');
        $data = User::Role("user")->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })

            ->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'menu_title' => 'Manajemen User',
            'submenu_title' => 'Pengguna',
            'title' => 'Daftar Pengguna',
            'user' => $data
        ];

        // dd($data);
        return view('back.users.user', $data);
    }
    public function userStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.pengguna.index')->with('error', 'Gagal menambahkan pengguna baru')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole('user');
        return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil menambahkan pengguna baru');
    }

    public function userUpdate($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('admin.pengguna.index')->with('error', 'Gagal mengubah data pengguna')->withInput()->withErrors($validator);
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil mengubah data pengguna');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil menghapus data pengguna');
    }

    public function userImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'excel' => 'required|mimes:xlsx,xls',
        ], [
            'required' => 'File excel tidak boleh kosong',
            'mimes' => 'File excel harus berformat .xlsx atau .xls',
        ]);
        if ($validator->fails()) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengimport data pengguna : ' . $validator->errors()->all());
            return redirect()->route('admin.pengguna.index');
        }

        try {
            Excel::import(new UsersImport, $request->file('excel'));
            Alert::success('Berhasil', 'Data pengguna berhasil diimport');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengimport data pengguna : ' . $e->getMessage());
        }

        return redirect()->route('admin.pengguna.index');
    }

    //TODO: Implement Super Admin
    public function superadmin(Request $request)
    {
        $search = $request->input('q');
        $data = User::Role("superadmin")->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
            ->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'menu_title' => 'Manajemen User',
            'submenu_title' => 'Super Admin',
            'title' => 'Daftar Super Admin',
            'user' => $data
        ];

        // dd($data);
        return view('back.users.superadmin', $data);
    }

    public function superadminStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.pengguna.superadmin.index')->with('error', 'Gagal menambahkan pengguna baru')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole('superadmin');
        return redirect()->route('admin.pengguna.superadmin.index')->with('success', 'Berhasil menambahkan pengguna baru');
    }

    public function superadminUpdate($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('admin.pengguna.superadmin.index')->with('error', 'Gagal mengubah data pengguna')->withInput()->withErrors($validator);
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('admin.pengguna.superadmin.index')->with('success', 'Berhasil mengubah data pengguna');
    }

    public function superadminDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.pengguna.superadmin.index')->with('success', 'Berhasil menghapus data pengguna');
    }

    //TODO: Implement Admin
    public function admin(Request $request)
    {
        $search = $request->input('q');
        $data = User::Role("admin")
        ->select('users.*', 'cities.name as city_name', 'cities.id as city_id')
        ->join('city_admin', 'city_admin.user_id', '=', 'users.id')
        ->join('cities', 'cities.id', '=', 'city_admin.city_id')
        ->where(function ($query) use ($search) {
            $query->where('users.name', 'LIKE', '%' . $search . '%');
        })
            ->paginate(10);
        $data->appends(['q' => $search]);
        $city = City::all();
        $data = [
            'menu_title' => 'Manajemen User',
            'submenu_title' => 'Admin',
            'title' => 'Daftar Admin Pengelola',
            'user' => $data,
            'city' => $city
        ];
        
        // return response()->json($data); 
        return view('back.users.admin', $data);
    }

    public function adminStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'city_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.pengguna.admin.index')->with('error', 'Gagal menambahkan pengguna baru')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole('admin');
        CityAdmin::create([
            'city_id' => $request->input('city_id'),
            'user_id' => $user->id
        ]);
        return redirect()->route('admin.pengguna.admin.index')->with('success', 'Berhasil menambahkan pengguna baru');
    }

    public function adminUpdate($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'city_id' => 'required',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('admin.pengguna.admin.index')->with('error', 'Gagal mengubah data pengguna')->withInput()->withErrors($validator);
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        CityAdmin::where('user_id', $id)->update([
            'city_id' => $request->input('city_id')
        ]);
        return redirect()->route('admin.pengguna.admin.index')->with('success', 'Berhasil mengubah data pengguna');
    }

    public function adminDestroy($id)
    {
        $user = User::findOrFail($id);
        $cityAdmin = CityAdmin::where('user_id', $id)->first();
        $cityAdmin->delete();
        $user->delete();
        return redirect()->route('admin.pengguna.admin.index')->with('success', 'Berhasil menghapus data pengguna');
    }
}

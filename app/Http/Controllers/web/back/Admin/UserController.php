<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function user(Request $request)
    {
        $search = $request->input('q');
        $data = User::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
        
        ->paginate(10);        
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Pengguna',
            'subTitle' => null,
            'page_id' => 10,
            'user' => $data
        ];

        // dd($data);
        return view('back.users.user', $data);
    }
    public function userStore(Request $request){
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

        $user = New User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole('user');
        return redirect()->route('admin.pengguna.index')->with('success','Berhasil menambahkan pengguna baru');
    }

    public function userUpdate($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
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
        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('admin.pengguna.index')->with('success','Berhasil mengubah data pengguna');
    }

    public function userDestroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.pengguna.index')->with('success','Berhasil menghapus data pengguna');
    }
}

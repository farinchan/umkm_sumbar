<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function index()
    {
        return view('login');

    }

    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_active) {
                if($user->role == 'user'){
                    if($request->route){
                        return redirect($request->route);
                    }else{
                        return redirect()->route('home');
                    }
                }else{
                    return redirect()->route('admin.dashboard');
                }
            } else{
                Auth::logout();
                return redirect()->route('login')->with('warning', 'Your account has been deactivated');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username and password are incorrect, please try again');
        }
        
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric|min:10|unique:users',
            'gender' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
        $user = new User();
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password  = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->is_active = true;
        $user->save();

        $user->assignRole('user');

        Mail::send('email.registerMail', ['email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Registrasi Berhasil');
        });

        return redirect()->route('login')->with('success', 'Akun Anda Berhasil didaftarkan<br>silahkan login untuk melanjutkan');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}

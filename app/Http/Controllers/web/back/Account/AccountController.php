<?php

namespace App\Http\Controllers\Web\Back\Account;

use App\Http\Controllers\Controller;
use App\Models\shop;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $data = [
            'menu_title' => 'Akun',
            'submenu_title' => 'Profil',
            'title' => 'Profil',
            'user' => $user,
        ];
        return view('back.account.profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Profil berhasil diubah');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Password lama salah');
        }
    }

    public function deleteAccount()
    {
        $user =  User::find(auth()->user()->id);
        $user->delete();
        $shop = shop::where('user_id', auth()->user()->id)->first();
        if ($shop) {
            $shop->delete();
        }
        return redirect()->route('login')->with('success', 'Akun berhasil dihapus');
    }
}

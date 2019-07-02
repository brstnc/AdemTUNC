<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // Kulanıcı Giriş
    public function signin()
    {

        return view('admin.signin');
    }

    public function signin_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => request('email'),
            'password' => request('password'),
            'active' => 1
        ];
        dd(Auth::attempt(['email' => request('email'), 'password' => request('password'), 'active' => 1]));
        if (Auth::attempt($credentials)) {
            return 'if';
            return redirect()->route('admin.homepage');
        } else {
            return 'else';
            $errors = ['mail' => 'Hatalı giriş. Veya hesabınızı aktifleştirin'];
            return back()->withErrors($errors);
        }

    }

    // Kullanıcı Kayıt
    public function signup()
    {
        return view('admin.signup');
    }

    public function signup_post(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:60',
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:5|max:15|'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(request('password'));


        $user->saveOrFail();

        return redirect()->route('admin.homepage');
    }

    //Oturum Kapatma
    public function logout()
    {
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.signin');
    }
}
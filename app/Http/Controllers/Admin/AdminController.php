<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\User;
use App\Models\UserDetail;
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
        $company_img = Company::all()->first();
        return view('admin.signin', compact('company_img'));
    }

    public function signin_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);
//
//        $credentials = [
//            "email" => "baristunc_04@hotmail.com",
//            "password" => "asdasd",
//            "admin" => 1
//        ];

       // $user = User::where('email', $request->email)->first();

      //  dd($user);
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.homepage');


        }
        else{
            $errors = ['mail' => 'Hatalı giriş.'];
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

        $user_detail = new UserDetail();
        $user_detail->user_id = $user->id;

        $user_detail->saveOrFail();


        return redirect()->route('admin.homepage');
    }

    //Oturum Kapatma
    public function logout()
    {
        \auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.signin');
    }
}
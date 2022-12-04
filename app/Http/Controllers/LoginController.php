<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = DB::select("select * from admin where username = :username", [
            "username" => $request->username,
        ]);

        if (!$admin) {
            throw ValidationException::withMessages([
                "username" => "username tidak ditemukan"
            ]);
        }

        if (!Hash::check($request->password, $admin[0]->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password Salah!'
            ]);
        }

        $request->session()->put("admin", $admin[0]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('/');
    }
}

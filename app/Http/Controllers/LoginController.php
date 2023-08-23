<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            if (auth()->user()->is_active == 2) {
                $request->session()->regenerate();
                return redirect()->intended('/setting/profile');
            } else {
                request()->session()->invalidate();
                request()->session()->regenerateToken();
                return back()->with('loginError', 'Login gagal! Belum diaktivasi');
            }
        }
        return back()->with('loginError', 'Login gagal!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}

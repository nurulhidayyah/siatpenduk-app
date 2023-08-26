<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'agama' => 'required|max:255',
            'email' => ['required', 'unique:users', 'email'],
            'phone' => 'required|min:10',
            'password' => 'required|min:3|max:255|confirmed'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['tanggal_lahir'] = strtotime($request->tanggal_lahir);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login');
    }
}

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
            'nik' => 'required|unique:users',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'agama' => 'required|max:255',
            'email' => ['required', 'unique:users', 'email'],
            'phone' => 'required|unique:users|min:10',
            'ktp' => 'required|image|file|max:1024|mimes:png,jpg,jpeg',
            'password' => 'required|min:3|max:255|confirmed'
        ], [
            'nik.required' => 'Kolom NIK wajib diisi.',
            'nik.unique' => 'NIK sudah digunakan.',
            'nama.required' => 'Kolom Nama wajib diisi.',
            'nama.max' => 'Kolom Nama tidak boleh lebih dari 255 karakter.',
            'tempat_lahir.required' => 'Kolom Tempat Lahir wajib diisi.',
            'tempat_lahir.max' => 'Kolom Tempat Lahir tidak boleh lebih dari 255 karakter.',
            'tanggal_lahir.required' => 'Kolom Tanggal Lahir wajib diisi.',
            'tanggal_lahir.max' => 'Kolom Tanggal Lahir tidak boleh lebih dari 255 karakter.',
            'jenis_kelamin.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'jenis_kelamin.max' => 'Kolom Jenis Kelamin tidak boleh lebih dari 255 karakter.',
            'pekerjaan.required' => 'Kolom Pekerjaan wajib diisi.',
            'pekerjaan.max' => 'Kolom Pekerjaan tidak boleh lebih dari 255 karakter.',
            'alamat.required' => 'Kolom Alamat wajib diisi.',
            'alamat.max' => 'Kolom Alamat tidak boleh lebih dari 255 karakter.',
            'agama.required' => 'Kolom Agama wajib diisi.',
            'agama.max' => 'Kolom Agama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Kolom Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'email.email' => 'Format Email tidak valid.',
            'phone.required' => 'Kolom Phone wajib diisi.',
            'phone.unique' => 'No Telepon sudah digunakan.',
            'phone.min' => 'Kolom Phone minimal harus 10 karakter.',
            'password.required' => 'Kolom Password wajib diisi.',
            'password.min' => 'Kolom Password minimal harus 3 karakter.',
            'password.max' => 'Kolom Password tidak boleh lebih dari 255 karakter.',
            'password.confirmed' => 'Konfirmasi Password tidak cocok.'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['tanggal_lahir'] = strtotime($request->tanggal_lahir);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['ktp'] = $request->file('ktp')->store('identitas');

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login');
    }
}

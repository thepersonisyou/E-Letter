<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users', // Gabungkan aturan dalam satu string
            'email' => 'required|email|unique:users',
            'no_telp' => 'required|max:12',
            'gender' => 'required',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        // Tambahkan nilai default untuk `role`
        $validatedData['role'] = 'user';

        // Simpan data ke database
        User::create($validatedData);

        return redirect()->route('login')
                    ->with('success', 'Akun Berhasil Didaftarkan.');
    }

}

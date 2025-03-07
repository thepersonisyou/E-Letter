<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;


class AuthController extends Controller
{
    protected $redirectTo = '/login';
    
    public function showLoginForm()
    {
        return view ('login.index', [
            'title' => 'login'
        ]);
    }

    public function valLogin(Request $request)
    {
        // Mencoba login
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, redirect ke dashboard
            return redirect('/dashboard')->with('success', 'Selamat datang!');
        } else {
            // Jika login gagal, redirect kembali dengan pesan kesalahan
            return redirect()->back()->withErrors(['login' => 'Username dan password tidak sesuai!'])->withInput();
        }
    }

    public function logout ()
    {
        Auth::logout();
        return redirect('/login');
    }
}






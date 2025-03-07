<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna dengan ID antara 1 hingga 5
        $users = User::whereBetween('id', [1, 5])->get();

        // Mengirim data ke tampilan
        return view('index', compact('users'), [
            'title' => 'Home'
        ]);
    }
}

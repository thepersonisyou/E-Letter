<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Kirim data ke sidebar untuk pengguna yang sedang login
        View::composer('dashboard.layouts.partials.sidebar', function ($view) {
            // Ambil user yang sedang login
            $user = Auth::user(); // Ini akan mengambil pengguna yang sedang login
            $view->with('user', $user); // Kirimkan data user yang sedang login ke sidebar
        });
    }
}

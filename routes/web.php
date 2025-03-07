<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/developersite', function () {
    return view('dashboard/developer/index');
});

// login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/valLogin', [AuthController::class, 'valLogin']);

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::group(['middleware' => ['auth','cekrole:admin,user,developer']], function(){
    route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Surat Masuk Dan Keluar
    Route::get('/suratmasuk', [SuratController::class ,'index'])->name('suratmasuk');
    Route::get('/suratkeluar', [SuratController::class ,'index2'])->name('suratkeluar');

    
    // Detail Surat
    Route::get('/surat/show/{id}', [SuratController::class, 'show'])->where('id', '[0-9]+')->name('showsurat');
    
    // Download Surat
    Route::get('/surat/download/{id}', [SuratController::class, 'download'])->name('download');
    
    // Create Data Surat
    Route::get('/surat/create', [SuratController::class ,'create']);
    Route::post('/surat/store', [SuratController::class ,'store']);
    
    // Update Data Surat
    Route::get('/surat/edit/{id}', [SuratController::class, 'edit'])->name('editsurat');
    Route::post('/surat/{id}/update', [SuratController::class, 'update'])->name('surat-update');
    
    // Delete Data Surat
    Route::get('/surat/delete/{id}', [SuratController::class, 'destroy']);
    
    // Searching Data Surat
    Route::get('/suratmasuk/search', [SuratController::class, 'search']);
    Route::get('/suratkeluar/search', [SuratController::class, 'search1']);

    Route::get('/semuapengguna', [UserController::class, 'index'])->name('semuapengguna');

    // Edit Akun User
    Route::get('/user/edit/{id}', [AkunController::class ,'edit'])->name('editakun');
    Route::PATCH('/user/update/{id}', [AkunController::class ,'update'])->name('user.update');

    // INFO PROFIL
    Route::get('/user/show/{id}', [AkunController::class ,'showProfile'])->name('showprofile');
    
    // Menambahkan Pengguna Oleh ADMIN
    Route::get('/pengguna/create', [UserController::class ,'create']);
    Route::post('/pengguna/store', [UserController::class ,'store']);

    
    // Edit Pengguna oleh ADMIN
    Route::get('/pengguna/edit/{id}', [UserController::class ,'edit']);
    Route::PUT('/pengguna/validasi/{id}', [UserController::class ,'update'])->name('pengguna.update');
    
    // Show Pengguna oleh ADMIN
    Route::get('/pengguna/show/{id}', [UserController::class ,'show'])->name('showpengguna');
    
    // Delete Pengguna Oleh ADMIN
    Route::get('/pengguna/delete/{id}', [UserController::class, 'destroy']);
});

Route::post('/register/validasi', [RegisterController::class ,'store']);



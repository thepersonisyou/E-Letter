<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $suratCount = Surat::count(); // Total semua surat
        $surata = Surat::paginate(5); // Menampilkan table surat dengan paginasi

        $yesterday = Carbon::yesterday(); // Ambil waktu kemarin
        $waktu = Carbon::now()->subDay();

        // Hitung jumlah user baru sejak kemarin
        $newUsersCount = User::where('role', 'user')
            ->where('created_at', '>=', $yesterday)
            ->count();
        $latestUser = User::where('role', 'user')
            ->where('created_at', '>=', $yesterday)
            ->latest()
            ->first();

        // Hitung jumlah admin baru sejak kemarin
        $newadminsCount = User::where('role', 'admin')
            ->where('created_at', '>=', $yesterday)
            ->count();
        $latestadmin = User::where('role', 'admin')
            ->where('created_at', '>=', $yesterday)
            ->latest()
            ->first();

        $user = auth()->user();

        if ($user->role === 'admin') {
            // Admin melihat semua surat
            $totalSurat = Surat::count();
            $newSuratCount = Surat::where('created_at', '>=', $yesterday)->count();
            $latestSurat = Surat::orderBy('id', 'desc')->first();
        } else {
            // User biasa hanya melihat surat miliknya
            $totalSurat = Surat::where('user_id', $user->id)->count();
            $newSuratCount = Surat::where('user_id', $user->id)
                ->where('created_at', '>=', $yesterday)
                ->count();
            $latestSurat = Surat::where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->first();
        }

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'css' => 'style',
            'surats' => Surat::where('user_id', $user->id)->get(),
            'surata' => $surata,
            'suratCount' => $suratCount,
            'usersCount' => User::where('role', 'user')->count(),
            'adminCount' => User::where('role', 'admin')->count(),
            // User
            'newUsersCount' => $newUsersCount,
            'latestUser' => $latestUser,
            // Admin
            'newadminsCount' => $newadminsCount,
            'latestadmin' => $latestadmin,
            // Surat
            'newSuratCount' => $newSuratCount,
            'totalSurat' => $totalSurat,
            'latestSurat' => $latestSurat,
            'waktus' => $waktu,
            'user' => $user
        ]);
    }
}

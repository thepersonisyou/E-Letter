<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::query();

        // Tambahkan filter pencarian (search)
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $user->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('username', 'like', '%' . $searchTerm . '%')
                ->orWhere('role', 'like', '%' . $searchTerm . '%')
                ->orWhere('gender', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }
        
        $user = $user->paginate(5);

        // Kirimkan data ke view
        return view('dashboard.pengguna.index', [
            'title' => 'Data Pengguna',
            'css' => 'surat',
            'user' => $user // Perhatikan nama variabel yang dikirim

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengguna.create', [
            'title' => 'Tambah Data Pengguna',
            'css' => 'surat'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'no_telp' => 'required|max:12',
            'gender' => 'required',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
            'password' => 'required|string|min:5', // Tambahkan konfirmasi password
        ]);

        try {
            // Proses unggah gambar jika ada
            if ($request->file('img')) {
                $validatedData['img'] = $request->file('img')->storeAs(
                    'file-surat',
                    time() . '_' . $request->file('img')->getClientOriginalName()
                );
            }

            // Simpan data ke database
            User::create($validatedData);

            // Redirect dengan pesan sukses
            return redirect()->route('semuapengguna')
                ->with('success', 'Akun Berhasil Didaftarkan.');
        } catch (\Exception $e) {
            // Log error dan tampilkan pesan kesalahan
            Log::error('Error saat menyimpan pengguna: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.showakun', [
            'user' => $user,
            'title' => 'Info Akun',
            'css' => 'showaccount'
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Cari user berdasarkan ID, jika tidak ditemukan, lemparkan 404
        $user = User::findOrFail($id);

        // Kirimkan data ke view
        return view('dashboard.pengguna.edit', [
            'user' => $user,
            'title' => 'Edit Data Pengguna',
            'css' => 'surat'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user , $id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|in:admin,user,developer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_telp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'nullable|date',
            'username' => [
                'required', 'string', 'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:5|max:255', // Validasi password diperbaiki
        ]);

        try {
            // Proses unggah gambar jika ada
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($user->img && Storage::exists($user->img)) {
                    Storage::delete($user->img);
                }

                // Simpan gambar baru
                $imagePath = $request->file('img')->storeAs(
                    'file-surat',
                    time() . '_' . $request->file('img')->getClientOriginalName()
                );
                $validatedData['img'] = $imagePath; // Update path gambar di database
            }

            // Tetapkan role lama jika tidak diisi
            if (!$request->filled('role')) {
                $validatedData['role'] = $user->role;
            }

            // Tetapkan gender lama jika tidak diisi
            if (!$request->filled('gender')) {
                $validatedData['gender'] = $user->gender;
            }

            // Tetapkan alamat lama jika tidak diisi
            $validatedData['alamat'] = $validatedData['alamat'] ?? $user->alamat;

            // Cek apakah password diinputkan
            if ($request->filled('password')) {
                $validatedData['password'] = Hash::make($request->password);
            } else {
                // Jika tidak ada password baru, hapus dari array agar tidak mereset password lama
                unset($validatedData['password']);
            }


            // Update data pengguna
            $user->update($validatedData);

            // Redirect dengan pesan sukses
            return redirect()->route('showprofile', ['id' => $user->id])
                ->with('success', 'Data pengguna berhasil diperbarui.');
        } catch (\Exception $e) {
            // Log error dan tampilkan pesan kesalahan
            Log::error('Error saat memperbarui pengguna: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Cari user berdasarkan ID
            $user = User::findOrFail($id);

            // Hapus gambar jika ada
            if ($user->img && Storage::exists($user->img)) {
                Storage::delete($user->img);
            }

            // Hapus user dari database
            $user->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('semuapengguna')->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error dan tampilkan pesan kesalahan
            Log::error('Error saat menghapus pengguna: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}

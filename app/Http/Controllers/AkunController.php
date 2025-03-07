<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.editakun', [
            'user' => $user,
            'title' => 'Edit Akun',
            'css' => 'surat'
        ]);
    }

    public function update(Request $request, $id)
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


    public function showProfile($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.showakun', [
            'user' => $user,
            'title' => 'Info Akun',
            'css' => 'showaccount'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        // Mulai query dengan tipe surat
        $suratMasuk = Surat::query()
            ->where('tipe_surat', $request->get('tipe_surat', 'Surat Masuk'));

        // Tambahkan filter berdasarkan role
        if ($user->role != 'admin') {
            $suratMasuk->where('user_id', $user->id);
        }

        // Tambahkan filter pencarian (search)
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $suratMasuk->where(function ($query) use ($searchTerm) {
                $query->where('pengirim', 'like', '%' . $searchTerm . '%')
                    ->orWhere('tanggal_surat', 'like', '%' . $searchTerm . '%')
                    ->orWhere('nomor_surat', 'like', '%' . $searchTerm . '%')
                    ->orWhere('asal_surat', 'like', '%' . $searchTerm . '%')
                    ->orWhere('departemen', 'like', '%' . $searchTerm . '%');
            });
        }

        // Paginate hasil akhir
        $suratMasuk = $suratMasuk->latest()->paginate(5);

        return view('dashboard.user.suratmasuk', [
            'suratMasuk' => $suratMasuk,
            'title' => 'Surat Masuk',
            'css'   => 'surat'
        ]);
    }

    public function index2(Request $request)
    {
        $user = auth()->user();

        // Mulai query dengan tipe surat
        $suratKeluar = Surat::query()
            ->where('tipe_surat', $request->get('tipe_surat', 'Surat Keluar'));

        // Tambahkan filter berdasarkan role
        if ($user->role != 'admin') {
            $suratKeluar->where('user_id', $user->id);
        }

        // Tambahkan filter pencarian (search)
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $suratKeluar->where(function ($query) use ($searchTerm) {
                $query->where('pengirim', 'like', '%' . $searchTerm . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $searchTerm . '%')
                ->orWhere('nomor_surat', 'like', '%' . $searchTerm . '%')
                ->orWhere('asal_surat', 'like', '%' . $searchTerm . '%')
                ->orWhere('departemen', 'like', '%' . $searchTerm . '%');
            });
        }

        // Paginate hasil akhir
        $suratKeluar = $suratKeluar->latest()->paginate(5);

        return view('dashboard.user.suratkeluar', [
            'suratKeluar' => $suratKeluar,
            'title' => 'Surat Keluar',
            'css'   => 'surat'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil nomor surat terakhir dari database
        $lastSurat = Surat::latest()->first();
        $lastNumber = $lastSurat ? (int) Str::afterLast($lastSurat->nomor_surat, '-') : 0;

        // Buat nomor surat baru
        $newNomorSurat = 'SURAT-' . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return view('dashboard.user.create',  [
            'nomorSurat' => $newNomorSurat,
            'title' => 'Tambah Surat',
            'css'   => 'surat',
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
            'pengirim' => 'required',
            'nomor_surat' => 'required|unique:surat,nomor_surat',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'perihal' => 'required',
            'asal_surat' => 'required',
            'file_surat' => 'required|mimes:pdf|file',
            'departemen' => 'required',
            'tipe_surat' => 'required'
        ]);

        try {

            // Proses unggah file
            // if ($request->file('file_surat')) {
            //     $validatedData['file_surat'] = $request->file('file_surat')->store('file-surat');
            // }

            if ($request->file('file_surat')) {
                $validatedData['file_surat'] = $request->file('file_surat')->storeAs(
                    'file-surat',
                    time() . '_' . $request->file('file_surat')->getClientOriginalName()
                );
            }

            // Tambahkan user_id dari pengguna yang sedang login
            $validatedData['user_id'] = Auth::id();

            // Tentukan redirect berdasarkan tipe_surat
            if ($validatedData['tipe_surat'] == 'Surat Masuk') {
                $redirect = 'suratmasuk';
            } else {
                $redirect = 'suratkeluar';
            }

            // Simpan data ke database
            Surat::create($validatedData);

            return redirect()
                ->route($redirect)
                ->with('success', 'Sukses! 1 Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan surat: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // Ambil data surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        return view('dashboard.user.showsurat', [
            'surat' => $surat,
            'css' => 'show-surat',
            'title' => 'Detail Surat'
        ]);
    }

    public function download($id)
    {
        try {
            // Cari surat berdasarkan ID
            $surat = Surat::findOrFail($id);

            // Path file di public storage
            $filePath = public_path('storage/' . $surat->file_surat);

            // Periksa apakah file ada
            if (file_exists($filePath)) {
                // Kirim file untuk diunduh
                return response()->download($filePath);
            } else {
                return back()->withErrors(['error' => 'File tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = Surat::find($id);
        return view(
            'dashboard.user.edit',
            [
                'surat' => $surat,
                'title' => 'Edit Surat',
                'css' => 'editsurat'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Ambil data lama
        $surat = Surat::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'pengirim' => 'required',
            'nomor_surat' => 'required|unique:surat,nomor_surat,' . $id,
            'tanggal_surat' => 'nullable|date', // Boleh null, fallback ke nilai lama
            'tanggal_diterima' => 'nullable|date', // Sama seperti tanggal_surat
            'perihal' => 'required',
            'asal_surat' => 'required',
            'departemen' => 'required',
            'tipe_surat' => 'required',
            'file_surat' => 'nullable|mimes:pdf|file',
        ]);

        try {
            // Fallback ke nilai lama jika tanggal tidak diisi
            $validatedData['tanggal_surat'] = $request->tanggal_surat ?? $surat->tanggal_surat;
            $validatedData['tanggal_diterima'] = $request->tanggal_diterima ?? $surat->tanggal_diterima;

            // Handle upload file jika ada
            if ($request->file('file_surat')) {
                if ($surat->file_surat) {
                    Storage::delete($surat->file_surat); // Hapus file lama
                }
                $validatedData['file_surat'] = $request->file('file_surat')->storeAs(
                    'file-surat',
                    time() . '_' . $request->file('file_surat')->getClientOriginalName()
                );
            }

            // Update data ke database
            $surat->update($validatedData);

            // Redirect berdasarkan tipe surat
            $redirect = $validatedData['tipe_surat'] === 'Surat Masuk' ? 'suratmasuk' : 'suratkeluar';

            return redirect()
                ->route($redirect)
                ->with('success', 'Data Berhasil Diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui surat: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = Surat::findorFail($id);

        if ($surat->tipe_surat == 'Surat Masuk') {
            $redirect = 'suratmasuk';
        } else {
            $redirect = 'suratkeluar';
        }

        Storage::delete($surat->surat_file);

        $surat->delete();

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $suratMasuk = Surat::filter($searchTerm)->get();

        return view('dashboard.user.suratmasuk', [
            'suratMasuk' => $suratMasuk,
            'css' => 'surat',
            'title' => 'Surat Masuk'
        ]);
    }

    public function search1(Request $request)
    {
        $searchTerm = $request->search;
        $suratKeluar = Surat::filter($searchTerm)->get();

        return view('dashboard.user.suratkeluar', [
            'suratKeluar' => $suratKeluar,
            'css' => 'surat',
            'title' => 'Surat Masuk'
        ]);
    }
}

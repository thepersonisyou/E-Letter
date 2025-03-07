@extends('dashboard.layouts.main')

@section('isi')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="col-lg-8 tambah">
        <form action="{{ url('/surat/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>
            <div class="mb-3">
                <label for="pengirim" class="form-label">Pengirim</label>
                <input type="text" name="pengirim" class="form-control" id="pengirim" aria-describedby="emailHelp"
                    required oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                {{-- <input type="number" name="nomor_surat" class="form-control" id="nomor_surat"> --}}
                <input type="text" name="nomor_surat_display" class="form-control" id="nomor_surat"
                    value="{{ $nomorSurat }}" readonly>
                <input type="hidden" name="nomor_surat" value="{{ $nomorSurat }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                <input type="date" name="tanggal_diterima" class="form-control" id="tanggal_diterima" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" class="form-control" id="perihal" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="asal_surat" class="form-label">Asal Surat</label>
                <input type="text" name="asal_surat" class="form-control" id="asal_surat" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">File Surat</label>
                <input class="form-control" name="file_surat" type="file" id="file_surat" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
                <div class="form-text">Hanya Ekstension PDF</div>
            </div>
            <div class="mb-3">
                <label for="departemen" class="form-label">Departements</label>
                <input type="text" name="departemen" class="form-control" id="departemen" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="tipe_surat" class="form-label">Tipe Surat</label>
                <select class="form-select" name="tipe_surat" id="tipe_surat" required
                    oninvalid="setCustomValidity('Wajib Mengisi Kolom Ini.')" oninput="setCustomValidity('')">
                    <option selected>Pilih Tipe Surat Yang Akan Dikirim</option>
                    <option value="Surat Masuk" {{ request('tipe_surat') == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk
                    </option>
                    <option value="Surat Keluar" {{ request('tipe_surat') == 'Surat Keluar' ? 'selected' : '' }}>Surat
                        Keluar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

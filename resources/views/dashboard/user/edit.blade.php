@extends('dashboard.layouts.main')

@section('isi')
    {{-- cek error --}}
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
    
    <div class="col-lg-8">
        <form action="{{ route('surat-update', $surat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="pengirim" class="form-label">Pengirim</label>
                <input type="text" name="pengirim" class="form-control" id="pengirim" value="{{ $surat->pengirim }}">
            </div>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input class="form-control" type="text" placeholder="{{ $surat->nomor_surat }}"
                    aria-label="Disabled input example" disabled>
                <input type="hidden" name="nomor_surat" value="{{ $surat->nomor_surat }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat"
                    value="{{ old('tanggal_surat', $surat->tanggal_surat) }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                <input type="date" name="tanggal_diterima" class="form-control" id="tanggal_diterima"
                    value="{{ old('tanggal_diterima', $surat->tanggal_diterima) }}">
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" class="form-control" id="perihal" value="{{ $surat->perihal }}">
            </div>
            <div class="mb-3">
                <label for="asal_surat" class="form-label">Asal Surat</label>
                <input type="text" name="asal_surat" class="form-control" id="asal_surat"
                    value="{{ $surat->asal_surat }}">
            </div>
            <div class="mb-3">
                <label for="departemen" class="form-label">Departements</label>
                <input type="text" name="departemen" class="form-control" id="departemen"
                    value="{{ $surat->departemen }}">
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">File Surat</label>
                <input class="form-control" name="file_surat" type="file" id="file_surat"
                    value="{{ $surat->file_surat }}">
                <div class="form-text">Hanya Ekstension PDF</div>
            </div>
            <div class="mb-3">
                <label for="tipe_surat" class="form-label">Tipe Surat</label>
                <select class="form-select" name="tipe_surat" id="tipe_surat">
                    <option selected>Pilih Tipe Surat Yang Akan Dikirim</option>
                    <option value="Surat Masuk" @if ($surat->tipe_surat == 'Surat Masuk') selected @endif>Surat Masuk</option>
                    <option value="Surat Keluar" @if ($surat->tipe_surat == 'Surat Keluar') selected @endif>Surat Keluar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
@endsection

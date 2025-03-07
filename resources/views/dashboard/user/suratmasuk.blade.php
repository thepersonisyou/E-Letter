@extends('dashboard.layouts.main')
@section('isi')
<div class="d-flex justify-content-between align-items-center">
    <!-- Form Pencarian di Kiri -->
    <form class="search w-50" action="{{ route('suratmasuk') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari {{$title}} Disini"
                value="{{ request('search') }}">    
            <button class="btn btn-primary z-0" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <!-- Alert di Kanan -->
    {{-- Menampilkan Pesan Sukses --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        <div>
            <i class="bi bi-check-circle-fill"></i> <strong>{{ session('success') }}</strong>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>




    <div class="table-responsive card">
        <div class="border-0">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title fw-bold">Table {{ $title }}</h5>
                <a class="btn btn-primary plus" href="/surat/create">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Surat
                </a>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><i class="bi bi-hash"></i></th>
                        <th scope="col"><i class="bi bi-envelope"></i> No. Surat</th>
                        <th scope="col"><i class="bi bi-calendar"></i> Tanggal</th>
                        <th scope="col"><i class="bi bi-geo-alt"></i> Asal Surat</th>
                        <th scope="col"><i class="bi bi-person"></i> Pengirim</th>
                        <th scope="col"><i class="bi bi-building"></i> Departemen</th>
                        <th scope="col"><i class="bi bi-file-earmark"></i> Tipe Surat</th>
                        <th scope="col"><i class="bi bi-gear"></i> Aksi</th>
                    </tr>
                </thead>
                @foreach ($suratMasuk as $item)
                    @if ($item->tipe_surat === 'Surat Masuk')
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ optional($item->tanggal_surat)->format('d-m-Y') }}</td>
                                <td>{{ $item->asal_surat }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->departemen }}</td>
                                <td>{{ $item->tipe_surat }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1 tombol-aksi1">
                                        <a href="/surat/show/{{ $item->id }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="/surat/edit/{{ $item->id }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="/surat/delete/{{ $item->id }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus Surat {{ $item->pengirim }}?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

            <!-- Laravel Pagination dengan Previous & Next -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <!-- Info jumlah kolom -->
                <div class="column-info">
                    <span class="badge ">Menampilkan {{ count($suratMasuk) }} dari {{ $suratMasuk->total() }}
                        surat</span>
                </div>

                <!-- Laravel Pagination -->
                <ul class="pagination mb-0">
                    <!-- Tombol Previous -->
                    <li class="page-item {{ $suratMasuk->onFirstPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $suratMasuk->previousPageUrl() }}">Previous</a>
                    </li>

                    <!-- Nomor Halaman -->
                    @for ($i = 1; $i <= $suratMasuk->lastPage(); $i++)
                        <li class="page-item {{ $suratMasuk->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $suratMasuk->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Tombol Next -->
                    <li class="page-item {{ $suratMasuk->hasMorePages() ? '' : 'active' }}">
                        <a class="page-link" href="{{ $suratMasuk->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

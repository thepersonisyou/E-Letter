@extends('dashboard.layouts.main')

@section('isi')
    <form class="search w-50" action="{{ route('semuapengguna') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari Pengguna Disini"
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

    <div class="table-responsive card">
        <div class="border-0">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title fw-bold">Table {{ $title }}</h5>
                <a class="btn btn-primary plus" href="/pengguna/create">
                    <i class="bi bi-person-plus-fill"></i> Tambah Pengguna
                </a>
            </div>

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->email }}</td>
                            <td>


                                @php
                                    $defaultImg =
                                        $item && $item->gender === 'Perempuan'
                                            ? 'img/assets/girl.svg' // Default untuk perempuan
                                            : 'img/assets/boy.svg'; // Default untuk laki-laki
                                @endphp

                                <img src="{{ asset($item && $item->img ? 'storage/' . $item->img : $defaultImg) }}"
                                    class="rounded-circl" alt="Profile Picture" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <a href="{{ route('showpengguna', ['id' => $item->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-eye-fill"></i></a>
                                <a href="/pengguna/edit/{{ $item->id }}" class="btn btn-success"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a href="/pengguna/delete/{{ $item->id }}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $item->name }}?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Laravel Pagination dengan Previous & Next -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <!-- Info jumlah kolom -->
                <div class="column-info">
                    <span class="badge ">Menampilkan {{ count($user) }} dari {{ $user->total() }}
                        pengguna</span>
                </div>

                <!-- Laravel Pagination -->
                <ul class="pagination mb-0">
                    <!-- Tombol Previous -->
                    <li class="page-item {{ $user->onFirstPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $user->previousPageUrl() }}">Previous</a>
                    </li>

                    <!-- Nomor Halaman -->
                    @for ($i = 1; $i <= $user->lastPage(); $i++)
                        <li class="page-item {{ $user->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $user->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Tombol Next -->
                    <li class="page-item {{ $user->hasMorePages() ? '' : 'active' }}">
                        <a class="page-link" href="{{ $user->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

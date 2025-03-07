@extends('dashboard.layouts.main')

@section('isi')
    <!-- ROW 1: Selamat Datang dan Jumlah Surat -->
    <div class="row">
        <div class="col-12 col-md-6 d-flex">
            <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="p-3 m-1">
                            <h2 class="h1">Welcome Back!</h2>
                            <h3>{{ Auth::user()->name }}</h3>
                            <p class="mb-0"><i class="bi bi-speedometer2"></i> {{ Auth::user()->role }} Dashboard</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row g-0 w-100">
                            <div class="p-3 m-1">
                                <h4><i class="bi bi-envelope"></i> Jumlah Surat</h4>
                                <p class="mb-2">Total {{ $totalSurat }} surat</p>
                                @if ($surats->isEmpty())
                                    <p class="text-muted"><i class="bi bi-exclamation-circle"></i> Tidak ada surat yang
                                        ditambahkan dalam 7 hari terakhir.</p>
                                @else
                                    <span class="badge text-success me-2">
                                        <i class="bi bi-plus-circle"></i> +{{ $newSuratCount }} surat
                                    </span>
                                    <span class="text-muted">
                                        <i class="bi bi-clock-history"></i>
                                        {{ $latestSurat ? $latestSurat->created_at->diffForHumans() : 'No new Surat' }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- ROW 2: Jumlah Admin dan Jumlah User -->
    <div class="row">
        <div class="col-12 col-md-6 d-flex">
            <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="p-3 m-1">
                            <h4><i class="bi bi-person-badge"></i> Jumlah Admin</h4>
                            <p class="mb-2">Total {{ $adminCount }} Admin</p>
                            <span class="badge text-success me-2">
                                <i class="bi bi-person-plus"></i> +{{ $newadminsCount }} Admin
                            </span>
                            <span class="text-muted">
                                <i class="bi bi-clock-history"></i>
                                {{ $latestadmin ? $latestadmin->created_at->diffForHumans() : 'No new admin' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 d-flex">
            <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="p-3 m-1">
                            <h4><i class="bi bi-people"></i> Jumlah User</h4>
                            <p class="mb-2">Total {{ $usersCount }} User</p>
                            <span class="badge text-success me-2">
                                <i class="bi bi-person-plus"></i> +{{ $newUsersCount }} User
                            </span>
                            <span class="text-muted">
                                <i class="bi bi-clock-history"></i>
                                {{ $latestUser ? $latestUser->created_at->diffForHumans() : 'No new users' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL DATA SURAT (Hanya untuk Admin) -->
    @if (auth()->user()->role == 'admin')
        <div class="table-responsive card">
            <div class="border-0">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col"><i class="bi bi-hash"></i></th>
                            <th scope="col"><i class="bi bi-person"></i> Pengirim</th>
                            <th scope="col"><i class="bi bi-envelope"></i> No.Surat</th>
                            <th scope="col"><i class="bi bi-chat-left-text"></i> Perihal</th>
                            <th scope="col"><i class="bi bi-building"></i> Departemen</th>
                            <th scope="col"><i class="bi bi-file-earmark-text"></i> Tipe Surat</th>
                            <th scope="col"><i class="bi bi-gear"></i> Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($surata as $item)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->departemen }}</td>
                                <td>{{ $item->tipe_surat }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1 tombol-aksi1">
                                        <a href="/surat/show/{{ $item->id }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Laravel Pagination dengan Previous & Next -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <!-- Info jumlah kolom -->
                    <div class="column-info">
                        <span class="badge ">Menampilkan {{ count($surata) }} dari {{ $surata->total() }}
                            surat</span>
                    </div>

                    <!-- Laravel Pagination -->
                    <ul class="pagination mb-0">
                        <!-- Tombol Previous -->
                        <li class="page-item {{ $surata->onFirstPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $surata->previousPageUrl() }}">Previous</a>
                        </li>

                        <!-- Nomor Halaman -->
                        @for ($i = 1; $i <= $surata->lastPage(); $i++)
                            <li class="page-item {{ $surata->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $surata->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Tombol Next -->
                        <li class="page-item {{ $surata->hasMorePages() ? '' : 'active' }}">
                            <a class="page-link" href="{{ $surata->nextPageUrl() }}">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endsection

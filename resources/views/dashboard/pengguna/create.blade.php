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

    <div class="col-lg-8">
        <form action="{{ url('/pengguna/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="name" required
                    oninvalid="setCustomValidity('Masukan Nama Anda di Sini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required
                    oninvalid="setCustomValidity('Masukan Email Di Sini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" required
                    oninvalid="setCustomValidity('Tolong Pilih Gender Di Sini.')" oninput="setCustomValidity('')">
                    <option selected>Pilih Gender Yang Anda Pilih</option>
                    <option value="Laki-laki" {{ request('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ request('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required
                    oninvalid="setCustomValidity('Masukan Username di SIni.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" required
                    oninvalid="setCustomValidity('Masukan Alamat Di Sini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="number" name="no_telp" class="form-control" id="no_telp" required
                    oninvalid="setCustomValidity('Masukan No Telpon Di Sini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required
                    oninvalid="setCustomValidity('Masukan No Telpon Di Sini.')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Pilih Role</label>
                <select class="form-select" name="role" id="role">
                    <option selected>Pilih Role Yang Anda Pilih</option>
                    <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ request('role') == 'User' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input class="form-control" name="img" type="file" id="img">
                <div class="form-text">Hanya Ekstension PNG | JPG | JPEG</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required
                    oninvalid="setCustomValidity('Masukan Password Di Sini.')" oninput="setCustomValidity('')">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

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

<hr>
        <div class="col-lg-8 tambah">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                </div>
                
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}">
                </div>

                @if (auth()->user()->role =="admin")
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="role">
                        <option selected>Role Anda Sekarang Adalah {{ $user->role }}</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        <option value="developer" {{ old('role', $user->role) == 'developer' ? 'selected' : '' }}>Developer</option>
                    </select>
                </div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telpon</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp" value="{{ $user->no_telp }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat', $user->alamat) }}">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{ $user->tgl_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender">
                        <option selected>Gender Sebelumnya {{ $user->gender }}</option>
                        <option value="Laki-laki" @if ($user->gender=='Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if ($user->gender=='Perempuan') selected @endif>Perempuan</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Image</label>
                    <input class="form-control" name="img" type="file" id="img">
                    <img src="{{ asset('storage/' . $user->img) }}" class="img-thumbnail mt-3" alt="..."  style="width: 130px; height: 120px; object-fit: cover;">
                    <div class="form-text">Jika Ingin Di Ubah Pastikan Ekstension PNG | JPG | JPEG</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Isi Password Baru Anda Disini" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection
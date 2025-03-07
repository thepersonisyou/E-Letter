@extends('dashboard.layouts.main')

@section('isi')
    <div class="profile-container shadow-lg rounded p-4">

        @php
            $defaultImg =
                $user && $user->gender === 'Perempuan'
                    ? 'img/assets/girl.svg' // Default untuk perempuan
                    : 'img/assets/boy.svg'; // Default untuk laki-laki
        @endphp

        <img src="{{ asset($user && $user->img ? 'storage/' . $user->img : $defaultImg) }}" class="profile-img" alt="Profile Picture">
        <div class="profile-info">
            <h3>Nama Pengguna</h3>
            <p><i class="bi bi-person-check"></i> <strong>Nama:</strong> {{ $user->name }}</p>
            <p><i class="bi bi-person-check"></i> <strong>Username:</strong> {{ $user->username }}</p>
            <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $user->email }}</p>
            <p><i class="fas fa-calendar-alt"></i> <strong>Tanggal Bergabung:</strong>
                {{ $user->created_at->format('d-m-Y') }}</p>
            <p><i class="fas fa-phone"></i> <strong>Nomor Telepon:</strong> {{ $user->no_telp }}</p>
            <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $user->alamat }}</p>
            <p><i class="fas fa-venus-mars"></i> <strong>Jenis Kelamin:</strong> {{ $user->gender }}</p>
            <p><i class="fas fa-birthday-cake"></i> <strong>Tanggal Lahir:</strong>
                {{ \Carbon\Carbon::parse($user->tgl_lahir)->format('d-m-Y') }} </p>
            <p><i class="fas fa-user-shield"></i> <strong>Role:</strong> {{ $user->role }}</p>

            @if (auth()->user()->role == 'user')
                <a href="{{ route('editakun', ['id' => Auth::id()]) }}" class="edit-btn">Edit Profil</a>
            @endif
        </div>
    </div>
@endsection

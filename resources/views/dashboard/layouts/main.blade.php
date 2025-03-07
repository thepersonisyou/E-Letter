<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- local css -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/splash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/sideandnav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/' . $css . '.css') }}">


    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- font cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="{{ asset('js/table/table.js') }}"></script>


</head>

<body>

    <div class="intro">
        <div class="logo-header">
            @php
            $icons = [
                'Dashboard' => 'fa-chart-line',
                'Surat' => 'fa-envelope',
                'Tambah Surat' => 'fa-plus-circle',
                'Surat Masuk' => 'fa-inbox',
                'Surat Keluar' => 'fa-paper-plane',
                'Blog' => 'fa-newspaper',
                'Edit Akun' => 'fa-user-edit',
                'Data Pengguna' => 'fa-users-cog',
                'Sign Out' => 'fa-sign-out-alt',
                'Detail Surat' => 'fa-eye',
                'Edit Surat' => 'fa-edit',
                'Info Akun' => 'fa-info-circle',
                'Tambah Data Pengguna' => 'fa-user-plus',
            ];
            $iconClass = $icons[$title] ?? 'fa-file'; // Default icon jika tidak ditemukan
        @endphp


            <span class="logo">
                <i class="fa-solid {{ $iconClass }} pe-2"></i> Halaman {{ $title }}
            </span>
            <br>
            <div class="spin">
                <p class="spinner-border text-warning" role="status"></p>
            </div>
        </div>
    </div>
    <div class="wrapper">
        {{-- side --}}
        @include('dashboard.templates.side')
        <div class="main">
            {{-- nav --}}
            @include('dashboard.templates.header')
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <!-- isi -->
                    <div class="m-3 mb-3">
                        <h1>
                            <i class="fa-solid {{ $iconClass }} pe-2"></i> Halaman {{ $title }}
                        </h1>
                    </div>
                    @yield('isi')
                </div>
            </main>
        </div>
    </div>



    <!-- js Bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- local js -->
    <script src="{{ asset('js/dashboard/splash.js') }}"></script>
    <script src="{{ asset('js/dashboard/script.js') }}"></script>
</body>

</html>

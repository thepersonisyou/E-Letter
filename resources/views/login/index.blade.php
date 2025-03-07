<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up & In</title>

    <link rel="stylesheet" href="css/login/style.css">

    {{-- fontfamily --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    {{-- @if ($errors->any())
    @dump($errors->all())
    @endif --}}


    <div class="container">
        {{-- Menampilkan Pesan Sukses --}}
        @if (session('success'))
            <div class="custom-alert success">
                <i class="bi bi-check-circle-fill"></i>
                <p>{{ session('success') }}</p>
                <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @endif

        {{-- Menampilkan Pesan Error --}}
        @if ($errors->any())
            <div class="custom-alert error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
                <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @endif
        <div class="nav">
            <div class="white">
                <a href="/"><img src="img/assets/logo-light.svg" alt="" srcset="" width="150px"></a>
            </div>
            <div class="blue">
            <a href="/"><img src="img/assets/logo-dark.svg" alt="" srcset="" width="150px"></a>
            </div>
        </div>
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/valLogin" method="POST" class="sign-in-form" id="signl">
                    @csrf
                    <h2 class="title">Sign in</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" id="username" value="{{ old('email') }}"
                            class="form-control" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="password"
                            class="form-control">
                    </div>

                    <input type="submit" value="Sign In" class="btn solid">
                </form>

                <form action="/register/validasi" class="sign-up-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="title">Sign Up</h2>

                    <div class="input-field">
                        <i class="bi bi-person-check"></i>
                        <input type="text" name="name" id="name" placeholder="Nama" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="no_telp" id="no_telp" placeholder="No Telpon" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required>
                    </div>

                    <!-- Dropdown Pilihan Gender -->
                    <div class="input-field">
                        <i class="fas fa-venus-mars"></i>
                        <select name="gender" id="gender" required>
                            <option value="" disabled selected>Pilih Gender</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Wrapper untuk tombol agar bisa berada di tengah -->
                    <div class="button-container">
                        <input type="submit" value="Sign up" class="btn signbtn solid">
                    </div>
                </form>


            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore corrupti maxime magnam!</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>

                <img src="img/login/log.svg" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Have Account ?</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore corrupti maxime magnam!</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                <img src="img/login/register.svg" class="image">
            </div>
        </div>
    </div>




    <script src="js/login/script.js"></script>
</body>


</html>

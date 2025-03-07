<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- local css --}}
    <link rel="stylesheet" href="css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <header>
            <div class="head-left">
                <img src="img/company/logo.svg" alt="" srcset="">
                <span>E-LETTER</span>
            </div>

            <div class="head-right">
                <a href="#">HOME</a>
                <a href="#">ABOUT</a>
                <a href="#">TEAMS</a>
                <a href="#">SERVICES</a>
                <a href="#">CONTACTS</a>
            </div>
        </header>

        <section class="hero-section autoBlur">
            <div class="hero-vid">
                <video loop autoplay muted plays-inline class="hero-video">
                    <source src="img/company/video/hero1.mp4">
                </video>
            </div>

            <div class="hero-info">
                <h1>APLIKASI SURAT</h1>
                <p>Aplikasi ini merupakan sistem manajemen surat yang dirancang untuk mempermudah pengelolaan surat
                    masuk dan surat keluar. Dengan fitur surat masuk, pengguna dapat mencatat, menyimpan, dan mencari
                    surat yang diterima. Sementara itu, fitur surat keluar memungkinkan pengguna membuat,
                    mendokumentasikan, dan melacak surat yang dikirim. Sistem ini membantu meningkatkan efisiensi
                    administrasi dengan pencatatan yang rapi, pencarian cepat, serta pengarsipan yang lebih
                    terorganisir.</p>
                <a href="/login">Login</a>
            </div>

            <div class="next-btn">
                NEXT
            </div>

        </section>

        <section class="about-section autoBlur">
            <p>Welcome to E-Letter</p>
            <div class="autoBlur">
                <h1>buat surat lebih mudah disini</h1>
            </div>
            <img src="img/company/foto/mail.png" alt="" class="mail-img">
            <div class="image-box autoTakeFull">
                <img src="img/company/foto/about.png" alt="" srcset="">
            </div>
        </section>

        <section class="team">
            <h3>We're Team</h3>
            <p>Berikut adalah beberapa anggota team kita.</p>
            <div class="team-container autoBlur ">
                <button class="nav-btn prev" onclick="moveSlide(-1)">&#10094;</button>
                <div class="team-slider" id="slider">
                    @foreach ($users as $user)
                        <div class="team-card">
                            <img src="{{ asset($user->img ? 'storage/' . $user->img : 'img/assets/avatar2.svg') }}"
                                alt="Team Member">
                            <h3>{{ $user->name }}</h3>
                            <p><span></span>{{ ucfirst($user->alamat) }}</p>
                            <p>ig</p>
                        </div>
                    @endforeach
                </div>
                <button class="nav-btn next" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </section>

        <!-- /* Section Info chat gpt isi disini */ -->
        <section class="info-section">
            <h3>About Application</h3>
            <p>E-Letter adalah aplikasi digital yang dirancang untuk membantu instansi, perusahaan, atau organisasi dalam mengelola surat masuk dan keluar secara efisien. 
                Dengan sistem ini, pengguna dapat dengan mudah mencatat, menyimpan, dan mencari surat tanpa perlu dokumen fisik, sehingga mengurangi risiko kehilangan arsip dan meningkatkan efektivitas kerja.
            </p>

            <div class="info-cards">
                <div class="card">
                    <h1>SURAT</h1>
                    <p>Modul utama dalam aplikasi ini memungkinkan pengguna untuk mengelola surat secara digital. Setiap surat yang diinput akan tersimpan secara aman dalam sistem, 
                        lengkap dengan detail informasi seperti pengirim, penerima, tanggal, serta status surat. Pengguna juga dapat melakukan pencarian surat dengan cepat berdasarkan kategori atau kata kunci.
                    </p>

                    <!-- <div class="card-isi">
                    <h1>SURAT</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, quisquam!</p>

                    </div> -->
                </div>
                <div class="card autoDisplay">
                    <h1>KELUAR</h1>
                    <p>Fitur ini memudahkan pengguna dalam mendokumentasikan setiap surat keluar. Dengan adanya pencatatan otomatis, pengguna dapat melihat riwayat surat yang telah dikirim, 
                        termasuk tujuan, nomor surat, serta lampiran jika ada. Fitur ini juga mendukung pengiriman surat elektronik ke pihak yang dituju.
                    </p>

                </div>
                <div class="card autoDisplay">
                    <h1>MASUK</h1>
                    <p>Semua surat yang diterima akan tercatat dalam sistem secara sistematis. Pengguna dapat memonitor surat masuk dengan mudah, melihat tanggal penerimaan, pengirim, 
                        serta menentukan tindak lanjut yang diperlukan. Dengan fitur ini, surat tidak akan lagi tercecer atau terlewatkan.
                    </p>

                </div>
                <div class="card autoDisplay">
                    <h1>JENIS</h1>
                    <p>Aplikasi ini mendukung berbagai jenis surat, mulai dari surat dinas, surat izin, surat keputusan, hingga surat pengaduan. Setiap jenis surat dapat dikategorikan sesuai kebutuhan, 
                        sehingga memudahkan pengguna dalam mengakses dan mengelola dokumen yang relevan.
                    </p>

                </div>
                <div class="cocard autoDisplay">
                    <h1>MORE COMING SOON</h1>
                </div>
            </div>
        </section>


        <section class="contact-section autoDisplay">
            <p style="color: black">Join E-Letter</p>
            <div>
                <h1>Kelola surat masuk dan keluar dengan mudah dan cepat.</h1>
            </div>
            <a>contact us</a>
            <img src="img/company/foto/contact1.png" alt="" class="img1">
            <img src="img/company/foto/contact2.png" alt="" class="img2">
            <img src="img/company/foto/contact3.png" alt="" class="img3">

        </section>

        <section class="footer">
            <p>Lorem ipsum dolor sit amet.</p>
            <ul>
                <li><a href=""><i class='bx bxl-instagram'></i></a></li>
                <li><a href=""><i class='bx bxl-instagram'></i></a></li>
                <li><a href=""><i class='bx bxl-instagram'></i></a></li>
                <li><a href=""><i class='bx bxl-instagram'></i></a></li>
                <li><a href=""><i class='bx bxl-instagram'></i></a></li>
            </ul>
            <p>Privacy Police</p>
        </section>



        <script src="js/script.js"></script>

</body>

</html>

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2025 pada 06.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bismillah-jadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_12_09_042612_create_surats_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosmed`
--

CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL,
  `link` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tipe_surat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `user_id`, `pengirim`, `nomor_surat`, `tanggal_surat`, `tanggal_diterima`, `perihal`, `asal_surat`, `file_surat`, `departemen`, `tipe_surat`, `created_at`, `updated_at`) VALUES
(1, 10, 'Jordan Prohaska', 'SURAT-32681', '2020-08-05', '2009-04-22', 'Qui possimus molestiae beatae.', 'South Rashawn', 'file-surat/1740464463_LDeRdf1dvazvwKCvcBD6s2EDgy0Q4KIVfI2y1HHz.pdf', 'Marketing', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-24 23:21:03'),
(2, 7, 'Prof. Hailey Kiehn I', 'SURAT-81125', '2007-10-19', '1999-07-06', 'Rerum aut accusamus.', 'West Alayna', 'file-surat/zzCIgMYxvP.pdf', 'HR', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(3, 6, 'Jon Sawayn', 'SURAT-77210', '1980-01-18', '2017-11-02', 'Expedita non facere fugiat.', 'Sawaynberg', 'file-surat/fGiJM9VNUG.pdf', 'IT', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(4, 1, 'Felix Stanton Jr.', 'SURAT-87008', '1978-08-17', '2010-08-13', 'Occaecati sit.', 'Bechtelarberg', 'file-surat/B38JIaXmyT.pdf', 'IT', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(5, 10, 'Emerald Price V', 'SURAT-01845', '1999-10-02', '2002-07-01', 'Amet nisi enim.', 'Krajcikberg', 'file-surat/RAS55SVUJ9.pdf', 'Finance', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(6, 5, 'Hassan Hills', 'SURAT-53468', '1972-05-17', '2001-07-04', 'Aperiam temporibus nulla.', 'West Frederiquetown', 'file-surat/71UKehwNH4.pdf', 'IT', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(7, 9, 'Alivia Buckridge', 'SURAT-52767', '2021-10-28', '2014-11-28', 'Aut unde nostrum.', 'Chaunceyland', 'file-surat/YCvfoPFCa3.pdf', 'IT', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(8, 1, 'Loren Schmeler', 'SURAT-92358', '1979-04-29', '2023-11-24', 'Quae ut modi.', 'Port Aliciastad', 'file-surat/QGenIftVpx.pdf', 'Finance', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(9, 7, 'Ada Fadel DVM', 'SURAT-75404', '1970-06-12', '2015-02-20', 'Eligendi qui excepturi delectus.', 'South Emanuelbury', 'file-surat/KCRNh5Wkyi.pdf', 'HR', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(10, 6, 'Roslyn Stoltenberg DVM', 'SURAT-18433', '2002-12-26', '1994-06-23', 'Libero qui modi.', 'Hansberg', 'file-surat/WlSd1cvgJO.pdf', 'HR', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(11, 8, 'Ms. Myrtie Gulgowski', 'SURAT-84087', '2010-02-13', '2012-01-11', 'Nisi non et.', 'Haneburgh', 'file-surat/DFf0HFXSqp.pdf', 'Finance', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(12, 2, 'Donald Pollich', 'SURAT-89790', '2023-07-13', '2005-10-08', 'Aut ut dignissimos velit.', 'New Elvera', 'file-surat/29wRcjmczv.pdf', 'Marketing', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(13, 7, 'Rubie Kuhlman', 'SURAT-72517', '2022-10-02', '2006-01-31', 'Et corporis dignissimos expedita.', 'Jonestown', 'file-surat/B0pE193ke8.pdf', 'Finance', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(14, 6, 'Shanon Reynolds', 'SURAT-83725', '2006-12-29', '2022-03-25', 'Debitis sed deleniti quo.', 'Andrechester', 'file-surat/LQnUOvfVbH.pdf', 'Marketing', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(15, 1, 'Elmer Casper', 'SURAT-03480', '1989-04-08', '2016-08-28', 'Aliquam itaque qui ab aperiam.', 'Flaviechester', 'file-surat/wBE6MWcVkH.pdf', 'Finance', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(16, 3, 'Royce Fritsch', 'SURAT-94582', '2008-03-19', '2007-04-05', 'Et ex id nobis nam.', 'Rosalindaside', 'file-surat/LHV6REpY4N.pdf', 'Finance', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(17, 7, 'Wyatt Hane II', 'SURAT-17289', '2009-04-12', '2014-01-13', 'Repudiandae est repellendus.', 'Krisshire', 'file-surat/cJENPl9Gy3.pdf', 'Marketing', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(18, 8, 'Lura Parker', 'SURAT-00860', '1987-02-28', '1983-10-08', 'Nihil dolorem accusantium et.', 'Gottliebberg', 'file-surat/zAnKwo56qb.pdf', 'Finance', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(19, 4, 'Natalia Kirlin', 'SURAT-52414', '1999-08-20', '2007-01-24', 'In sed recusandae fugit.', 'New Ninastad', 'file-surat/icmazRDnPn.pdf', 'HR', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(20, 8, 'Prof. Rowland Cole', 'SURAT-50344', '1982-04-29', '1993-05-05', 'Occaecati consectetur non.', 'East Kyle', 'file-surat/vCSg4MUMA3.pdf', 'IT', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(21, 5, 'Aubrey King', 'SURAT-17194', '2006-02-17', '2004-01-25', 'Numquam tempore placeat.', 'Jaredtown', 'file-surat/3uC3Qbz81S.pdf', 'HR', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(22, 9, 'Josue Huels', 'SURAT-23766', '2008-05-10', '2005-08-09', 'Quam molestias exercitationem.', 'North Delfinabury', 'file-surat/gOO1H02HEu.pdf', 'IT', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(23, 5, 'Julianne Nienow Sr.', 'SURAT-29218', '2003-02-18', '2001-10-31', 'Velit atque cumque.', 'Hermannland', 'file-surat/5Tqc2bNJiY.pdf', 'Finance', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(24, 6, 'Mrs. Rebecca Yost', 'SURAT-28715', '2020-03-05', '1989-01-15', 'Repudiandae laudantium porro non.', 'West Marcelino', 'file-surat/UZSiYoacpf.pdf', 'IT', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(25, 6, 'Dr. Johan Rippin', 'SURAT-79167', '2013-02-10', '1982-07-19', 'Ut amet nihil id.', 'New Libbie', 'file-surat/EVjiZS4awj.pdf', 'Marketing', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(26, 7, 'Velda Hamill MD', 'SURAT-02369', '1979-07-07', '2020-01-13', 'Itaque non id.', 'Hildegardshire', 'file-surat/LBjF78pQHZ.pdf', 'Marketing', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(27, 4, 'Ewell Roob', 'SURAT-35564', '1988-07-21', '1980-02-07', 'Quo esse sit asperiores.', 'South Wilmahaven', 'file-surat/FPtzlLGvHL.pdf', 'IT', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(28, 8, 'Alisa Bayer', 'SURAT-35934', '1980-10-11', '1980-11-30', 'Id molestiae quis.', 'Lake Viola', 'file-surat/uqbqxybUpF.pdf', 'HR', 'Surat Masuk', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(29, 4, 'Simeon Hauck', 'SURAT-97099', '2023-06-09', '1999-04-24', 'Aut et ut sed.', 'South Caleigh', 'file-surat/DIbIuvHsRR.pdf', 'Marketing', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13'),
(30, 6, 'Mr. Rusty Goldner MD', 'SURAT-38965', '2009-10-04', '2023-09-14', 'Odit in enim qui.', 'Jonasborough', 'file-surat/JXa4xkqhHJ.pdf', 'HR', 'Surat Keluar', '2025-02-21 00:03:13', '2025-02-21 00:03:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `role` enum('admin','user','developer') NOT NULL DEFAULT 'user',
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `no_telp`, `alamat`, `tgl_lahir`, `role`, `gender`, `img`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ziandra Naufaldi', '+1-740-673-2010', 'System Analyst & Backend', '1981-07-22', 'admin', 'Laki-laki', 'file-surat/1741152131_bd.jpg', 'zianganteng123', 'xrippin@example.org', '2025-02-21 00:03:13', '$2y$10$hE1hwM2ZD3ryEpAn4AVyiOt0nbzwnl9B1Kte6itO4j1VVuNjZM9Xy', NULL, NULL, NULL, 'M0YOZ0sbVKnXUn97zqsfrLNCP0WsmbtODKNYgydtOEcQbBdSH2lqn15cSnkN', '2025-02-21 00:03:13', '2025-03-05 01:12:30'),
(2, 'Andi M Nugua', '(413) 323-1462', 'Frontend & Web Design', '1970-01-25', 'admin', 'Laki-laki', 'file-surat/1741162451_IMG_7895.JPG', 'AndiNugua', 'yoconnell@example.com', '2025-02-21 00:03:13', '$2y$10$DPnmDoo8PoR7Te5VKym4TOhZz74x9VtxyMcB8KaWehVj2//jXZI5a', NULL, NULL, NULL, 'JcOhAlAa3TcaLpcINpmO2uOGSXS3wsg9uHJwFQEYz1lA3eNXDp92OqA0KBPd', '2025-02-21 00:03:13', '2025-03-05 01:17:10'),
(3, 'Muhammad Ripandi', '+1.757.398.3532', 'Software Modeling & Internship Report', '2021-04-04', 'admin', 'Laki-laki', NULL, 'cigo123', 'smitham.karianne@example.net', '2025-02-21 00:03:13', '$2y$10$ec7cz5kAu8c.KFfTYfdY2uLZ8uQR.t1yCjx5tdWXvs64zLpTkzCPK', NULL, NULL, NULL, 'jfg44FF3HM', '2025-02-21 00:03:13', '2025-03-05 01:16:44'),
(4, 'Iman', '+1.346.622.2144', 'Software Modeling & Internship Report', '2009-12-07', 'admin', 'Laki-laki', NULL, 'iman123', 'lucie.corkery@example.com', '2025-02-21 00:03:14', '$2y$10$ydFGQZ6ySTKOzrGSCXNENugWouHusWSilwYd.kjkNLFMZvpftgTBe', NULL, NULL, NULL, '2gMvnYmYB4', '2025-02-21 00:03:14', '2025-03-05 01:17:16'),
(5, 'Yusuf Faturrohman', '+1 (702) 476-6424', 'Software Modeling & Internship Report', '1996-03-29', 'admin', 'Laki-laki', NULL, 'yusup123', 'lowe.rachael@example.com', '2025-02-21 00:03:14', '$2y$10$08HAlhAvSuuv6SEZFStZWuUwQnU9WgOT/vcy.uPWycM8zxHP82UvC', NULL, NULL, NULL, 'Hl9TRHkU0xYdPHtkGwdFH9n0yfJN2FaIxLb3Bn70fMkspjqfMGEkvAqNXWqA', '2025-02-21 00:03:14', '2025-03-05 01:17:46'),
(6, 'Mr. Dagmar Bode V', '+1.865.452.0117', '35584 Weimann StravenueLake Luciouston, VT 55394-8287', '1983-08-21', 'user', 'Perempuan', NULL, 'anastacio54', 'clemmie.huels@example.net', '2025-02-21 00:03:14', '$2y$10$19UZbykJ.AHXZYt5iBGO5O87Dqz/ctTH5uz4ZVEZ5MuFYhCnDIdJG', NULL, NULL, NULL, 'jgGibQPjqx3TqHPtbTe2cAzl0RkHmRqOdLj1aUyFgPVi6TO0sxqNe7o3jdFg', '2025-02-21 00:03:14', '2025-03-04 23:07:01'),
(7, 'Trent Rosenbaum II', '+1.847.262.9730', '449 Christelle Street Suite 020\nLake Jared, CO 55015-1964', '2013-12-27', 'user', 'Laki-laki', NULL, 'ebaumbach', 'vernice80@example.net', '2025-02-21 00:03:14', '$2y$10$hylW.DXFI2HGJcXbcJc6GO6bEHGv8U3xJN9Z59cLF4caPjQoiJ/j2', NULL, NULL, NULL, 'Qsx2dHTrMJ', '2025-02-21 00:03:14', '2025-02-21 00:03:14'),
(8, 'Mitchell Kautzer Jr.', '+1.952.451.9347', '482 Jocelyn Plains\nNorth Virginie, CA 93585', '2002-08-09', 'user', 'Laki-laki', NULL, 'yconsidine', 'emmalee.walter@example.com', '2025-02-21 00:03:14', '$2y$10$Paib1NT0x22NKjcXtvzLxuxnQ9dFuXCpn0F2Hb2FOVc8WzIMpYaqK', NULL, NULL, NULL, 'W3JtyJXhTW', '2025-02-21 00:03:14', '2025-02-21 00:03:14'),
(9, 'Dr. Alysha Murphy II', '209-523-7163', '7592 Flatley Rapids\nGerlachborough, NY 66188', '1978-07-23', 'admin', 'Perempuan', NULL, 'wintheiser.demetris', 'rbode@example.net', '2025-02-21 00:03:14', '$2y$10$DYAPHJmvGtWnrGrabwWsVOMmQCsUQZgGIKyZNe/qiGtNGGltUrhpq', NULL, NULL, NULL, 'tdQSxXiyaQ', '2025-02-21 00:03:14', '2025-02-21 00:03:14'),
(10, 'Durward Cronin Jr.', '(678) 327-8397', '238 Powlowski Avenue Apt. 747\nOralmouth, UT 41622', '2005-08-22', 'user', 'Laki-laki', NULL, 'bahringer.jaleel', 'grady.grimes@example.net', '2025-02-21 00:03:14', '$2y$10$5jMT2C6oznYFp36pS1so.OHpKNTVBxBPJG9lxtG./AKBGSjW6juru', NULL, NULL, NULL, 'dYgxPTy5Xf', '2025-02-21 00:03:14', '2025-02-21 00:03:14'),
(11, 'Naufal Azmi Irwansyah', '085182127919', 'jalan pagarsih gang mukalmi', '2006-11-23', 'admin', 'Laki-laki', 'file-surat/1740375923_bd.jpg', 'zianganteng', 'naufaldiziandra@gmail.com', NULL, '$2y$10$xdVyhe4zxqL/6MDJ.IA1nuxf23AdrD0zJSycqGv5Yzixqm4gEdib6', NULL, NULL, NULL, NULL, '2025-02-23 22:20:42', '2025-02-23 22:45:25'),
(12, 'Muhammad Reza', '0894432382', 'Jl.Sasak gantung', '2025-02-25', 'user', 'Laki-laki', 'file-surat/1740458881_● SuratController.php - bismillah-jadi - Visual Studio Code 11_12_2024 14_05_22.png', 'rezzzfict', 'reza@gmail.com', NULL, '$2y$10$rpoAjJdzYOhwMCQwhCpvMOhxcVqlK1T4HqK.bvrHRX2q/lkgIXOaC', NULL, NULL, NULL, NULL, '2025-02-24 20:53:15', '2025-02-24 21:49:22'),
(13, 'Andi Nugua', '092834772214', 'Jl.Citulang', '2025-02-25', 'user', 'Laki-laki', 'file-surat/1740456327_(32) WhatsApp - Google Chrome 12_12_2024 13_08_59.png', 'xxpalkon', 'lew.becker@gmail.com', NULL, '$2y$10$4BCyMhad7SKv7846rufhW.xQmW3ak1MO5LZu3ymzMVmUDIY/7duMK', NULL, NULL, NULL, NULL, '2025-02-24 21:04:32', '2025-02-24 21:05:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

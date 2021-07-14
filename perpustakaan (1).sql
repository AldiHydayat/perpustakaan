-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2021 pada 05.06
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitungjumlahanggota` () RETURNS INT(11) BEGIN
    
    declare jumlah int;
    select count(*) as jumlah_anggota into jumlah from anggota;
    return jumlah;

    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `kode_anggota` varchar(10) NOT NULL,
  `nama_anggota` varchar(30) DEFAULT NULL,
  `almt_anggota` varchar(30) DEFAULT NULL,
  `tlp_anggota` varchar(30) DEFAULT NULL,
  `email_anggota` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`kode_anggota`, `nama_anggota`, `almt_anggota`, `tlp_anggota`, `email_anggota`) VALUES
('A0001', 'Asep Aldi Hidayat', 'Cigugur Tengah', '08421249571', 'aldyh128@gmail.com'),
('F0001', 'Adriana Lobo', 'Jl. Superpuma 4 NO. 5 MGG Cima', '085211144567', 'adriana_lobo@yahoo.com'),
('F0002', 'Isabek Torey', 'Jl. Kebon kOPI Gg. Tirta Indah', '085712345678', '-'),
('F0003', 'Silvia Sinaga', 'Kp. Cihaliung Atas RT 04/07 Pa', '08217789564', 'silvia_sinaga@gmail.com'),
('F0004', 'Dafne Alonso', 'Jl. Holis Cibuntu Barat 05/09,', '08712546571', '-'),
('F0005', 'Rosita', 'Jl. Cijerah Gg H. Anwar No 28 ', '08571665998', 'rosita@gmail.com'),
('M0001', 'Antoni Romano', 'Jl. Maleber Utara No. 117, Ban', '089215366547', '-'),
('M0002', 'Georgy Sebastian', 'Jl Safir V No 11 RT 05/23 Grah', '0229123456', '-'),
('M0003', 'Jusuf Uranus', 'Jl Gunung Batu No 48, Bandung', '08911154848', 'jusuf_uranus@rockets.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(5) NOT NULL,
  `judul` varchar(25) DEFAULT NULL,
  `kode_penerbit` varchar(5) DEFAULT NULL,
  `kode_kategori` char(5) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `cover_buku` text DEFAULT NULL,
  `status` enum('tidak tersedia','tersedia') DEFAULT NULL,
  `penulis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `kode_penerbit`, `kode_kategori`, `sinopsis`, `cover_buku`, `status`, `penulis`) VALUES
('B0001', 'The Lord of The Ring', 'A0002', 'K0001', 'asdasdasd', 'cover.png', 'tidak tersedia', 'J.R.R. Tolkien.'),
('B0002', 'SuperNova', 'P0001', 'K0001', NULL, NULL, 'tersedia', 'tes'),
('B0003', 'naruto', 'A0002', 'K0002', 'lkmlkm', 'lkkj.png', 'tidak tersedia', 'Yusuf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` char(5) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('K0001', 'Novel'),
('K0002', 'Komik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `table` varbinary(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `kegiatan`, `table`, `tanggal`) VALUES
(1, 'Memasukan Data transaksi', 0x7472616e73616b7369, '2021-04-29'),
(2, 'Memasukan Data transaksi', 0x7472616e73616b7369, '2021-04-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `kode_penerbit` varchar(5) NOT NULL,
  `nama_penerbit` varchar(25) DEFAULT NULL,
  `almt_penerbit` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`kode_penerbit`, `nama_penerbit`, `almt_penerbit`, `kontak`) VALUES
('A0002', 'Gramedia', 'Jl Gatot Subroto, Cimahi', '08975537256'),
('P0001', 'Erlangga', 'Jl Budhi', '08723553134');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(5) NOT NULL,
  `id_anggota` varchar(5) DEFAULT NULL,
  `kode_buku` varchar(5) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_hrs_kembali` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `id_anggota`, `kode_buku`, `tgl_pinjam`, `tgl_hrs_kembali`, `tgl_kembali`) VALUES
('T0002', 'F0004', 'B0003', '2021-04-29', '2021-05-06', NULL),
('TR000', 'A0001', 'B0001', '2021-04-29', '2021-05-06', '2021-05-01');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `logingtransaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	insert into perpustakaan.`log` set log.`kegiatan` = 'Memasukan Data transaksi', log.`table` = 'transaksi', log.`tanggal` = noW();
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgrbuku` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	update buku set buku.`status` = 'tidak tersedia' where buku.`kode_buku` = new.kode_buku;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Administrator','Operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$hPlu4oGfcSz4pC9QfVsn6umEmsBh7ns.TED1K5gFCJcpp5WBXHhrG', 'Administrator', NULL, NULL, NULL),
(2, 'operator', 'op@gmail.com', NULL, '$2y$10$UXaoj8uXQtnOWdNdJuu2DeAxP78TBul4Na/o2jtiPDYjQeCzXLBoa', 'Operator', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewbuku_pinjam`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewbuku_pinjam` (
`kode_buku` varchar(5)
,`kode_kategori` char(5)
,`kode_penerbit` varchar(5)
,`judul` varchar(25)
,`sinopsis` text
,`cover_buku` text
,`status` enum('tidak tersedia','tersedia')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewkondisi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewkondisi` (
`kode_buku` varchar(5)
,`judul` varchar(25)
,`kode_penerbit` varchar(5)
,`kode_kategori` char(5)
,`sinopsis` text
,`cover_buku` text
,`status` enum('tidak tersedia','tersedia')
,`penulis` varchar(25)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewbuku_pinjam`
--
DROP TABLE IF EXISTS `viewbuku_pinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewbuku_pinjam`  AS  (select `buku`.`kode_buku` AS `kode_buku`,`buku`.`kode_kategori` AS `kode_kategori`,`buku`.`kode_penerbit` AS `kode_penerbit`,`buku`.`judul` AS `judul`,`buku`.`sinopsis` AS `sinopsis`,`buku`.`cover_buku` AS `cover_buku`,`buku`.`status` AS `status` from (`buku` join `transaksi` on(`transaksi`.`kode_buku` = `buku`.`kode_buku`)) where `transaksi`.`tgl_pinjam` like '2019-05%') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewkondisi`
--
DROP TABLE IF EXISTS `viewkondisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewkondisi`  AS  (select `buku`.`kode_buku` AS `kode_buku`,`buku`.`judul` AS `judul`,`buku`.`kode_penerbit` AS `kode_penerbit`,`buku`.`kode_kategori` AS `kode_kategori`,`buku`.`sinopsis` AS `sinopsis`,`buku`.`cover_buku` AS `cover_buku`,`buku`.`status` AS `status`,`buku`.`penulis` AS `penulis` from `buku` where `buku`.`status` = 'tersedia' order by `buku`.`judul`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kode_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `buku_ibfk_1` (`kode_penerbit`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`kode_penerbit`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_penerbit`) REFERENCES `penerbit` (`kode_penerbit`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`kode_anggota`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

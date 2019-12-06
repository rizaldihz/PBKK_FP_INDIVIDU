-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2019 pada 07.15
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbkk-ind`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `bukti_donasi` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `users_id` varchar(24) NOT NULL,
  `kebutuhan_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `jumlah` float NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tipe` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `bukti_donasi`, `keterangan`, `users_id`, `kebutuhan_id`, `created_at`, `jumlah`, `judul`, `tipe`, `tanggal`, `status`) VALUES
(1, 'storage/1575601803-billing.jpg||', 'asdasd', 'Xo1feO9DlyqVHC5WvnmGL5dL', 6, '2019-12-06 10:10:03', 1, 'Mencoba membuat kue', 1, '2019-12-20', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhan`
--

CREATE TABLE `kebutuhan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` float NOT NULL,
  `label_id` int(11) NOT NULL,
  `nominal_uang` float NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `resipien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kebutuhan`
--

INSERT INTO `kebutuhan` (`id`, `nama`, `jumlah`, `label_id`, `nominal_uang`, `keterangan`, `file`, `created_at`, `resipien_id`) VALUES
(5, 'Kursi roda', 10, 1, 500000, 'asd', 'storage/1575501373-104127_1425723234_0.jpg||', '2019-12-05 06:16:13', 4),
(6, 'Kursi roda 1', 2, 1, 500000, 'butuh kursi roda', 'storage/1575567476-billing.jpg||', '2019-12-06 12:37:56', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `label`
--

CREATE TABLE `label` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `label`
--

INSERT INTO `label` (`id`, `nama`) VALUES
(1, 'Uang'),
(2, 'Tempat menginap'),
(3, 'Obat-obatan'),
(4, 'Makanan'),
(5, 'Pakaian'),
(6, 'Alat Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resipien`
--

CREATE TABLE `resipien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `latar_belakang` text NOT NULL,
  `ktp` varchar(17) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `resipien`
--

INSERT INTO `resipien` (`id`, `nama`, `alamat`, `no_telp`, `jk`, `latar_belakang`, `ktp`, `file`, `created_at`) VALUES
(4, 'Ini ersad', 'Jl Rungkut', '0812313123', 'L', 'Butuh kuris dora', '0811101768123', '', '2019-12-05 02:06:03'),
(5, 'Penerima1', 'Jl Rungkut', '081123123123', 'L', 'asd', '358111', '', '2019-12-05 06:49:03'),
(9, 'Donatur1', 'Jl Rungkut', '081123123123', 'L', 'asdasdasd', '091209102910290', 'storage/1575568924-wallpaper lp2-2.jpg||', '2019-12-06 01:02:04'),
(10, 'asdasd', 'asdada', '123', 'L', 'asdasd', '123', 'storage/1575571000-104127_1425723234_0.jpg||', '2019-12-06 01:36:40'),
(11, 'asdasd', 'asdada', '123', 'L', 'asdasd', '123', 'storage/1575571016-104127_1425723234_0.jpg||', '2019-12-06 01:36:56'),
(12, 'wq nama baru', 'wq', '123', 'L', '123', '123', 'storage/1575571079-wallpaper lp2-2.jpg||', '2019-12-06 01:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(24) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ktp` varchar(17) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(2) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `reset_pass` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `ver` varchar(32) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `priviliges` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `ktp`, `tanggal_lahir`, `jk`, `alamat`, `reset_pass`, `email`, `password`, `ver`, `gambar`, `priviliges`, `created_at`) VALUES
('+OjTWHWCtPpMbHCMXRt7MGQf', 'Donatur2', '124124124', '2019-12-05', 'L', 'Jl Rungkut', 'null', 'donatur2@mail.com', '$2y$12$ZFlWOGNIdnRjMlh4aU0yM.Coo4iq/IOTIK1YP0RVS.G/mCWaJLSzu', 'asd', NULL, 0, '0000-00-00 00:00:00'),
('m5pHTtXOLxa2qpIs/7Ul5ss/', 'coba', '1231231223', '2019-12-19', 'P', 'Jl Rungkut', 'null', 'coba@mail.com', '$2y$12$WllXYkcrOVp1NGZMRUp3d.bmUSERVCwXa14NkSHOhyWFVaE83/TEy', 'asd', NULL, 0, '2019-12-03 08:21:24'),
('mpmO0f4LOxUNpHD/ebDh7c+j', 'Ahmad Sodikin', '122122122', '2019-12-05', 'L', 'Jl Rungkut', 'null', 'ahmad@mail.com', '$2y$12$MnNPNEVzMWlRdHdHVGdkSO4hDNGLCiFeTS0fzVHF07Qa7SlZq0Pm.', 'asd', NULL, 0, '2019-12-03 02:51:19'),
('rMbUY+SAzN/qujEd3fdqUeRt', 'ganiwijaya', '112233445566', '1998-03-20', 'L', 'Solo', 'null', 'ganiwijaya@live.com', '$2y$12$N2wxSDMzcFJNVDZZNERWdu1WisO8cWFcpsi68OyvBDbrPMNB87M1i', 'asd', NULL, 0, '2019-12-04 01:02:15'),
('Xo1feO9DlyqVHC5WvnmGL5dL', 'Donatur1', '123123123', '2019-12-05', 'L', 'Jl Rungkut', 'null', 'donatur@mail.com', '$2y$12$Vk9GVXZ3T2U4TEZoeUFkae4PY5zwrTPBozMsO9esE7bvFxyUzmp1u', 'asd', NULL, 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resipien_kebutuhan` (`resipien_id`),
  ADD KEY `fk_label_keutuhan` (`label_id`);

--
-- Indeks untuk tabel `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resipien`
--
ALTER TABLE `resipien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ktp` (`ktp`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `label`
--
ALTER TABLE `label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `resipien`
--
ALTER TABLE `resipien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD CONSTRAINT `fk_label_keutuhan` FOREIGN KEY (`label_id`) REFERENCES `label` (`id`),
  ADD CONSTRAINT `fk_resipien_kebutuhan` FOREIGN KEY (`resipien_id`) REFERENCES `resipien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

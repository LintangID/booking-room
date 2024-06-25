-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2023 pada 07.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_office`
--

CREATE TABLE `head_office` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `tersedia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `head_office`
--

INSERT INTO `head_office` (`id`, `nama_ruangan`, `kapasitas`, `tersedia`) VALUES
(1, 'R. MEETING 1.01', 50, 'YA'),
(3, 'R. MEETING 1.02', 60, 'YA'),
(4, 'R. MEETING 1.03', 45, 'YA'),
(5, 'R. MEETING 1.04', 30, 'YA'),
(6, 'R. MEETING 1.05', 70, 'YA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id` int(11) NOT NULL,
  `nama_akun` varchar(300) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `departemen` varchar(300) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `nama_ruangan` varchar(45) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id`, `nama_akun`, `nama`, `departemen`, `no_hp`, `nama_ruangan`, `keperluan`, `tanggal_sewa`, `jam_mulai`, `jam_selesai`, `status`) VALUES
(1, 'General Affairs', 'Vita Nur K', 'General Affairs', '088806653132', 'R. MEETING 1.01', 'Rapat Koordinasi', '2023-10-19', '19:00:00', '21:56:00', 'Dikonfirmasi'),
(2, 'Firman Kurnia', 'sanjayaa', 'EHS', '0877766688', 'R. MEETING 1.01', 'weekly meeting', '2023-10-20', '16:26:00', '16:32:00', 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shn`
--

CREATE TABLE `shn` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `tersedia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shn`
--

INSERT INTO `shn` (`id`, `nama_ruangan`, `kapasitas`, `tersedia`) VALUES
(1, 'RUANG A', 36, 'YA'),
(2, 'RUANG B', 40, 'YA'),
(3, 'RUANG C', 40, 'YA'),
(4, 'RUANG D', 60, 'YA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `departemen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`, `departemen`) VALUES
(1, 'admin', 'admin123', 'Admin GA', 'admin', 'General Affairs'),
(2, 'vitan', 'Marketing123', 'Marketing', 'pengguna', 'Marketing'),
(18, 'abizar', 'EHS123', 'EHS', 'pengguna', 'EHS'),
(19, 'kurnia', 'PART123', 'PART', 'pengguna', 'PART');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `head_office`
--
ALTER TABLE `head_office`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shn`
--
ALTER TABLE `shn`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `head_office`
--
ALTER TABLE `head_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `shn`
--
ALTER TABLE `shn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

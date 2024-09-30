-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2024 pada 08.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_rb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('kepala','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$vKlD7o2zW7D0NyeRZ9gIOuq/H5cD/hjZgmjZ20.8.yRE9FHaJKqkq', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `gambar`, `no_kk`) VALUES
(15, 'Yeskial Kolloh', 'Screenshot 2024-06-07 002404_2.png', '55266281881292'),
(16, 'Yohanis Fora', 'Screenshot 2024-06-20 235814_1.png', '55266281881293'),
(17, 'Yeskial Laibiti', 'Screenshot 2024-07-13 122053.png', '552662818821195'),
(18, 'Saferus Laituy', 'Screenshot 2024-07-13 123417_1.png', '55266281883911'),
(19, 'Melkias Belabein', 'Screenshot 2024-07-13 123143.png', '55266281883998');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id_hasil` int(11) NOT NULL,
  `f_id_alternatif` int(11) NOT NULL,
  `preferensi_akhir` decimal(15,13) NOT NULL,
  `f_id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id_hasil`, `f_id_alternatif`, `preferensi_akhir`, `f_id_periode`) VALUES
(5, 18, '0.8888888900000', 1),
(6, 15, '0.7037037000000', 1),
(7, 16, '0.4259259300000', 1),
(8, 17, '0.3148148100000', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kec_alt_kriteria`
--

CREATE TABLE `kec_alt_kriteria` (
  `id_alt_kriteria` int(11) NOT NULL,
  `f_id_alternatif` int(11) NOT NULL,
  `f_id_kriteria` char(2) NOT NULL,
  `f_id_sub_kriteria` int(11) NOT NULL,
  `f_id_periode` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kec_alt_kriteria`
--

INSERT INTO `kec_alt_kriteria` (`id_alt_kriteria`, `f_id_alternatif`, `f_id_kriteria`, `f_id_sub_kriteria`, `f_id_periode`) VALUES
(92, 15, 'C1', 36, 1),
(93, 15, 'C2', 39, 1),
(94, 15, 'C3', 42, 1),
(95, 15, 'C4', 45, 1),
(96, 15, 'C5', 47, 1),
(97, 15, 'C6', 51, 1),
(98, 15, 'C7', 53, 1),
(99, 15, 'C8', 56, 1),
(100, 15, 'C9', 61, 1),
(101, 16, 'C1', 35, 1),
(102, 16, 'C2', 38, 1),
(103, 16, 'C3', 40, 1),
(104, 16, 'C4', 44, 1),
(105, 16, 'C5', 47, 1),
(106, 16, 'C6', 51, 1),
(107, 16, 'C7', 53, 1),
(108, 16, 'C8', 56, 1),
(109, 16, 'C9', 61, 1),
(110, 17, 'C1', 35, 1),
(111, 17, 'C2', 37, 1),
(112, 17, 'C3', 40, 1),
(113, 17, 'C4', 44, 1),
(114, 17, 'C5', 47, 1),
(115, 17, 'C6', 50, 1),
(116, 17, 'C7', 53, 1),
(117, 17, 'C8', 56, 1),
(118, 17, 'C9', 61, 1),
(119, 18, 'C1', 36, 1),
(120, 18, 'C2', 39, 1),
(121, 18, 'C3', 42, 1),
(122, 18, 'C4', 45, 1),
(123, 18, 'C5', 49, 1),
(124, 18, 'C6', 52, 1),
(125, 18, 'C7', 54, 1),
(126, 18, 'C8', 55, 1),
(127, 18, 'C9', 61, 1),
(128, 19, 'C1', 34, 1),
(129, 19, 'C2', 37, 1),
(130, 19, 'C3', 40, 1),
(131, 19, 'C4', 43, 1),
(132, 19, 'C5', 46, 1),
(133, 19, 'C6', 50, 1),
(134, 19, 'C7', 53, 1),
(135, 19, 'C8', 57, 1),
(136, 19, 'C9', 60, 1),
(310, 19, 'C1', 34, 7),
(311, 19, 'C2', 37, 7),
(312, 19, 'C3', 40, 7),
(313, 19, 'C4', 43, 7),
(314, 19, 'C5', 46, 7),
(315, 19, 'C6', 50, 7),
(316, 19, 'C7', 53, 7),
(317, 19, 'C8', 57, 7),
(318, 19, 'C9', 60, 7),
(319, 17, 'C1', 35, 7),
(320, 17, 'C2', 37, 7),
(321, 17, 'C3', 40, 7),
(322, 17, 'C4', 44, 7),
(323, 17, 'C5', 47, 7),
(324, 17, 'C6', 50, 7),
(325, 17, 'C7', 53, 7),
(326, 17, 'C8', 56, 7),
(327, 17, 'C9', 61, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` char(2) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`) VALUES
('C1', 'Jenis Dinding', 100),
('C2', 'Kondisi Dinding', 100),
('C3', 'Jenis Atap', 100),
('C4', 'Kondisi Atap', 100),
('C5', 'Jenis Lantai', 100),
('C6', 'Kondisi Lantai', 100),
('C7', 'Kamar Mandi/Toilet', 100),
('C8', 'Pendapatan Keluarga', 100),
('C9', 'Jumlah Tanggungan', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kuota` int(11) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `nama_periode`, `deskripsi`, `kuota`, `status`) VALUES
(-1, 'none', '-', 0, 'nonaktif'),
(1, '2024-2026', 'Periode 2024 sampai 2026', 3, 'nonaktif'),
(7, '2027-2029', '-', 1, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(255) NOT NULL,
  `f_id_kriteria` varchar(2) NOT NULL,
  `bobot_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `nama_sub_kriteria`, `f_id_kriteria`, `bobot_sub_kriteria`) VALUES
(34, 'Permanen (Full Tembok)', 'C1', 1),
(35, 'Semi Permanen (Setengah  Tembok)', 'C1', 2),
(36, 'Tidak Permanan (Tidak  Tembok)', 'C1', 3),
(37, 'Baik', 'C2', 1),
(38, 'Rusak Sedang', 'C2', 2),
(39, 'Rusak', 'C2', 3),
(40, 'Seng', 'C3', 1),
(41, 'Genteng', 'C3', 2),
(42, 'Alang-alang', 'C3', 3),
(43, 'Baik', 'C4', 1),
(44, 'Rusak Sedang', 'C4', 2),
(45, 'Rusak', 'C4', 3),
(46, 'Keramik', 'C5', 1),
(47, 'Semen', 'C5', 2),
(48, 'Papan', 'C5', 3),
(49, 'Tanah', 'C5', 4),
(50, 'Baik', 'C6', 1),
(51, 'Rusak Sedang', 'C6', 2),
(52, 'Rusak', 'C6', 3),
(53, 'Ada', 'C7', 1),
(54, 'Tidak Ada', 'C7', 2),
(55, '< 500.000,-', 'C8', 1),
(56, '501.000 - 1.500.000,-', 'C8', 2),
(57, '1.501.000 - 2.500.000', 'C8', 3),
(58, '>2.501.000', 'C8', 4),
(59, 'Tidak Ada', 'C9', 1),
(60, '1 - 2 orang', 'C9', 2),
(61, '3 - 5 orang', 'C9', 3),
(62, '> 5 orang', 'C9', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `f_id_alternatif` (`f_id_alternatif`),
  ADD KEY `f_id_periode` (`f_id_periode`);

--
-- Indeks untuk tabel `kec_alt_kriteria`
--
ALTER TABLE `kec_alt_kriteria`
  ADD PRIMARY KEY (`id_alt_kriteria`),
  ADD KEY `f_id_alternatif` (`f_id_alternatif`),
  ADD KEY `f_id_sub_kriteria` (`f_id_sub_kriteria`),
  ADD KEY `f_id_periode` (`f_id_periode`),
  ADD KEY `f_id_kriteria` (`f_id_kriteria`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `f_id_kriteria` (`f_id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kec_alt_kriteria`
--
ALTER TABLE `kec_alt_kriteria`
  MODIFY `id_alt_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD CONSTRAINT `hasil_akhir_ibfk_1` FOREIGN KEY (`f_id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_akhir_ibfk_2` FOREIGN KEY (`f_id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kec_alt_kriteria`
--
ALTER TABLE `kec_alt_kriteria`
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_1` FOREIGN KEY (`f_id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_3` FOREIGN KEY (`f_id_sub_kriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_4` FOREIGN KEY (`f_id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_5` FOREIGN KEY (`f_id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`f_id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

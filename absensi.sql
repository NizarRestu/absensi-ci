-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2023 pada 03.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan_izin` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_karyawan`, `kegiatan`, `date`, `jam_masuk`, `jam_pulang`, `keterangan_izin`, `status`) VALUES
(3, 1, 'Membuat  Project Absensiiii', '2023-10-11', '10:16:12', '10:52:38', '-', 'done'),
(5, 3, 'Membuat Tampilan Dashboard', '2023-10-11', '14:58:28', '14:58:44', '-', 'done'),
(7, 1, '-', '2023-10-11', NULL, NULL, 'Pusing', 'done'),
(10, 3, 'Mengerjakan Rekap Data', '2023-10-14', '09:07:15', '09:44:16', '-', 'done'),
(11, 1, 'Membuat tampilan rekap bulanan', '2023-10-14', '21:05:37', '21:05:58', '-', 'done'),
(12, 1, 'Membuat rekap data harian', '2023-10-14', '21:06:03', '21:06:08', '-', 'done'),
(13, 1, 'Membuat rekap mingguan', '2023-10-14', '21:06:12', '19:15:14', '-', 'done'),
(14, 1, 'Membuat tampilan profile', '2023-10-15', '19:15:07', '19:15:19', '-', 'done'),
(15, 3, 'Memperbaiki rekap data', '2023-10-16', '09:44:08', '09:44:20', '-', 'done'),
(16, 1, 'mencoba', '2023-10-16', '14:19:20', '14:19:26', '-', 'done'),
(17, 1, '-', '2023-10-17', NULL, NULL, 'Sakit mata', 'done'),
(21, 5, '-', '2023-10-19', NULL, NULL, 'Sakit', 'done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `nama_depan`, `nama_belakang`, `password`, `image`, `role`) VALUES
(1, 'Nizar Restu Aji', 'nizar@gmail.com', 'Nizar', 'Restu', '45658e41bffc709f42e085d3ca94c766', 'User.png', 'karyawan'),
(2, 'admin', 'admin@gmail.com', 'Admin', 'Absensi', '0192023a7bbd73250516f069df18b500', 'User.png', 'admin'),
(3, 'Andi Saputro', 'andi@gmail.com', 'Andi', 'Saputro', '45658e41bffc709f42e085d3ca94c766', '1697174256559_photo_2023-09-01_07-20-17.jpg', 'karyawan'),
(5, 'Secondta', 'secondta@gmail.com', 'Secondtaa', 'Ardiansah', '25d55ad283aa400af464c76d713c07ad', 'User.png', 'karyawan'),
(6, 'Admin absensi', 'admin2@gmail.com', 'Admin ', 'Absensi', '0192023a7bbd73250516f069df18b500', 'User.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

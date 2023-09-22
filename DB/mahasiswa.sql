-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2023 at 04:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas-8`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nama_mahasiswa`, `fakultas`, `prodi`, `no_telpon`, `kelamin`, `alamat`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(1, 'Ando Zamhariro Royan', 'Fasilkom', 'Sistem Informasi', '081216532315', 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:49:16', '2023-09-22 16:49:16'),
(2, 'Python Bean', 'faperta', 'Sistem Informasi', '081216532315', 'Jl. Melon ', '', '2023-09-11', '2023-09-22 16:49:16', '2023-09-22 16:49:16'),
(3, 'Ando Zamhariro Royan', 'Fasilkom', 'Sistem Informasi', '081216532315', 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:49:46', '2023-09-22 16:49:46'),
(4, 'Python Bean', 'faperta', 'Sistem Informasi', '081216532315', 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:49:46', '2023-09-22 16:49:46'),
(5, 'Ando Zamhariro Royan', 'Fasilkom', 'Sistem Informasi', '081216532315', 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:50:05', '2023-09-22 16:50:05'),
(6, 'Python Bean', 'faperta', 'Sistem Informasi', '081216532315', 'Jl. Melon ', '', '2023-09-11', '2023-09-22 16:50:05', '2023-09-22 16:50:05'),
(7, 'Ando Zamhariro Royan', 'Fasilkom', 'Sistem Informasi', '081216532315', 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:50:05', '2023-09-22 16:50:05'),
(8, 'Python Bean', 'faperta', 'Sistem Informasi', '081216532315', 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:50:05', '2023-09-22 16:50:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

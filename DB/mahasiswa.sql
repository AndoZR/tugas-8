-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2023 at 04:22 PM
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
  `prodi` varchar(255) NOT NULL,
  `no_telpon` int NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nama_mahasiswa`, `prodi`, `no_telpon`, `kelamin`, `alamat`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(45, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:13:41', '2023-09-22 16:13:41'),
(46, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:13:41', '2023-09-22 16:13:41'),
(47, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:13:45', '2023-09-22 16:13:45'),
(48, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:13:45', '2023-09-22 16:13:45'),
(49, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:20:33', '2023-09-22 16:20:33'),
(50, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:20:33', '2023-09-22 16:20:33'),
(51, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:20:33', '2023-09-22 16:20:33'),
(52, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:20:33', '2023-09-22 16:20:33'),
(53, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:20:55', '2023-09-22 16:20:55'),
(54, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:20:55', '2023-09-22 16:20:55'),
(55, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-09-04', '2023-09-22 16:20:55', '2023-09-22 16:20:55'),
(56, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-09-11', '2023-09-22 16:20:55', '2023-09-22 16:20:55'),
(57, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-04-09', '2023-09-22 16:21:19', '2023-09-22 16:21:19'),
(58, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-04-09', '2023-09-22 16:21:19', '2023-09-22 16:21:19'),
(59, 'Ando Zamhariro Royan', 'Sistem Informasi', 2147483647, 'Laki-Laki', 'Jl. Melon 5/F-3', '2023-04-09', '2023-09-22 16:21:19', '2023-09-22 16:21:19'),
(60, 'Python Bean', 'Sistem Informasi', 2147483647, 'Perempuan', 'Jl. Melon 5/F-5', '2023-11-09', '2023-09-22 16:21:19', '2023-09-22 16:21:19');

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
  MODIFY `mahasiswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

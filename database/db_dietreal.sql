-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 08:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dietreal`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_diet`
--

CREATE TABLE `data_diet` (
  `id_diet` int(4) NOT NULL,
  `nama_diet` varchar(256) COLLATE utf8_bin NOT NULL,
  `makanan` varchar(64) COLLATE utf8_bin NOT NULL,
  `olahraga` varchar(64) COLLATE utf8_bin NOT NULL,
  `goldar` varchar(64) COLLATE utf8_bin NOT NULL,
  `waktum` varchar(64) COLLATE utf8_bin NOT NULL,
  `resiko` varchar(64) COLLATE utf8_bin NOT NULL,
  `makanan_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `olahraga_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `goldar_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `waktum_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `resiko_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `tanggal_rekomen` date DEFAULT NULL,
  `hasil_rekomen` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `data_diet`
--

INSERT INTO `data_diet` (`id_diet`, `nama_diet`, `makanan`, `olahraga`, `goldar`, `waktum`, `resiko`, `makanan_angka`, `olahraga_angka`, `goldar_angka`, `waktum_angka`, `resiko_angka`, `tanggal_rekomen`, `hasil_rekomen`, `id_pengguna`) VALUES
(1, 'Diet Atkins', 'Sangat Tidak Penting', 'Penting', 'Cukup Penting', 'Cukup Penting', 'Tidak Penting', '1', '4', '3', '3', '2', NULL, '', 0),
(2, 'Diet Karnivora', 'Sangat Penting', 'Cukup Penting', 'Cukup Penting', 'Cukup Penting', 'Sangat Penting', '5', '3', '3', '3', '5', NULL, '', 0),
(3, 'Diet Vegan', 'Cukup Penting', 'Cukup Penting', 'Penting', 'Cukup Penting', 'Cukup Penting', '3', '3', '4', '3', '3', NULL, '', 0),
(4, 'Diet IF', 'Cukup Penting', 'Cukup Penting', 'Penting', 'Sangat Penting', 'Penting', '3', '3', '4', '5', '4', NULL, '', 0),
(5, 'Diet Ekstrem', 'Sangat Tidak Penting', 'Tidak Penting', 'Sangat Penting', 'Sangat Penting', 'Sangat Penting', '1', '2', '5', '5', '5', NULL, '', 0),
(6, 'Diet Keto', 'Tidak Penting', 'Cukup Penting', 'Cukup Penting', 'Cukup Penting', 'Cukup Penting', '2', '3', '3', '3', '3', NULL, '', 0),
(7, 'Diet OCD', 'Sangat Tidak Penting', 'Sangat Tidak Penting', 'Sangat Tidak Penting', 'Sangat Tidak Penting', 'Sangat Penting', '1', '1', '1', '1', '5', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diet`
--

CREATE TABLE `tbl_hasil_diet` (
  `id` int(11) NOT NULL,
  `id_diet` int(11) DEFAULT NULL,
  `nilai_v` float DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil_diet`
--

INSERT INTO `tbl_hasil_diet` (`id`, `id_diet`, `nilai_v`, `tanggal`, `id_pengguna`) VALUES
(9, 2, 0.78148, '2024-09-03 02:57:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id_kontak` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id_kontak`, `email`, `no_telepon`, `id_pengguna`) VALUES
(1, 'admin@gmail.com', '08122731041', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `status_pengguna` enum('admin','user') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `jenis_kelamin`, `status_pengguna`, `email`, `no_telepon`, `kata_sandi`, `reset_token`) VALUES
(1, 'Mahasiswa Penting', 'L', 'admin', 'mahasiswapentingumc@gmail.com', '08812212846', '$2y$10$DicQfmcVfL1tBt0Fy5MKQ.LK92S74o6FG1aS2cxDEg4SDe507MZeO', ''),
(2, 'Ferdy Pradana Putra', 'L', 'user', 'ferdy@gmail.com', '081222731048', '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', ''),
(29, 'Ferdy PP', 'L', 'admin', 'ferdypp@gmail.com', '0982323123', '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', ''),
(36, 'Bryan Ferdy PP', NULL, 'admin', 'bf12@gmail.com', NULL, '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', ''),
(39, 'Uhuy', NULL, 'user', 'komeng@gmail.com', NULL, '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', ''),
(40, 'Mapen', 'L', 'admin', 'mapenting123@gmail.com', '0812323232', '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', ''),
(43, 'Bryan Ferdy', NULL, 'admin', 'bryanferdy@gmail.com', NULL, '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', ''),
(45, 'Zayn Malik', NULL, 'admin', 'zayn@gmail.com', NULL, 'c91e99575f986f83a0837c7d1199ef72343c60cca1ad6d485d2bdbdd7302cc40', ''),
(46, 'Fantech', NULL, 'admin', 'fantech@gmail.com', NULL, '55c673fa7edd31edb488f3077ec94ba8b2c55bad2a8286d592b481c9788a83b0', ''),
(48, 'dss', NULL, 'admin', 'ferdypputra1ds7@gmail.com', NULL, '15ac88727e10c3a15024089524d4dbdd26dbfe6cfa1a70f61ef66b3a79c6037d', ''),
(51, 'Ferdy P Putra', NULL, 'admin', 'ferdypputra17@gmail.com', NULL, 'd2b21df439ba367d3ffc80693dfa5f6e2370d7d3903137285b6d1969ff362b70', ''),
(52, 'Admin', 'P', 'admin', 'admin@gmail.com', '085717708770', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', ''),
(53, 'Pradana', NULL, 'admin', 'pradana@gmail.com', NULL, 'd2b21df439ba367d3ffc80693dfa5f6e2370d7d3903137285b6d1969ff362b70', ''),
(55, 'Ferdy Pradana Putra', NULL, 'admin', 'ferdy17@gmail.com', NULL, '144882b2ae9d12a8a25a5f81291375f4c30ef68fb6bad29ffbb7e4f13f0601ee', ''),
(56, 'Ferdy Pradana Putra', NULL, 'user', 'ferdypputra@gmail.com', NULL, '1ebf236a36a3729ec8b9de29566bf74a9bb1a789a718bf82ced149d76e885876', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datadietangka`
--

CREATE TABLE `tb_datadietangka` (
  `id_diet` int(4) NOT NULL,
  `makanan_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `olahraga_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `goldar_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `waktum_angka` varchar(64) COLLATE utf8_bin NOT NULL,
  `resiko_angka` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_datadietangka`
--

INSERT INTO `tb_datadietangka` (`id_diet`, `makanan_angka`, `olahraga_angka`, `goldar_angka`, `waktum_angka`, `resiko_angka`) VALUES
(1, '3', '3', '5', '5', '3'),
(2, '3', '1', '5', '2', '1'),
(3, '1', '1', '2', '5', '5'),
(4, '5', '3', '5', '2', '3'),
(5, '3', '5', '5', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_diet`
--
ALTER TABLE `data_diet`
  ADD PRIMARY KEY (`id_diet`);

--
-- Indexes for table `tbl_hasil_diet`
--
ALTER TABLE `tbl_hasil_diet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hasil_diet_ibfk_1` (`id_pengguna`),
  ADD KEY `tbl_hasil_diet_ibfk_2` (`id_diet`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `tbl_kontak_ibfk_1` (`id_pengguna`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_telepon` (`no_telepon`);
ALTER TABLE `tbl_pengguna` ADD FULLTEXT KEY `email_2` (`email`);

--
-- Indexes for table `tb_datadietangka`
--
ALTER TABLE `tb_datadietangka`
  ADD PRIMARY KEY (`id_diet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_diet`
--
ALTER TABLE `data_diet`
  MODIFY `id_diet` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_hasil_diet`
--
ALTER TABLE `tbl_hasil_diet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hasil_diet`
--
ALTER TABLE `tbl_hasil_diet`
  ADD CONSTRAINT `tbl_hasil_diet_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tbl_hasil_diet_ibfk_2` FOREIGN KEY (`id_diet`) REFERENCES `data_diet` (`id_diet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD CONSTRAINT `tbl_kontak_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_datadietangka`
--
ALTER TABLE `tb_datadietangka`
  ADD CONSTRAINT `fk_datadietangka_diet` FOREIGN KEY (`id_diet`) REFERENCES `data_diet` (`id_diet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

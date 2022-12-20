-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 10:11 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuition`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(2, '11 RPL 2'),
(3, '10 RPL 3'),
(4, '12 RPL 7');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_petugas` int(10) DEFAULT NULL,
  `nisn` varchar(10) NOT NULL,
  `bulan_tahun_spp` varchar(20) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(1000) DEFAULT NULL,
  `status` enum('not paid','waiting for verification','verified') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `bulan_tahun_spp`, `tgl_bayar`, `jumlah_bayar`, `bukti_bayar`, `status`, `created_at`) VALUES
(37, 8, '0026490998', 'Januari 2021', '2021-03-23', 500000, NULL, 'verified', '2021-03-23 00:37:08'),
(38, 5, '0026490998', 'Februari 2021', '2021-03-24', 500000, 'cardiaccpu.png', 'waiting for verification', '2021-03-23 00:37:08'),
(39, NULL, '0026490998', 'Maret 2021', '2021-03-23', 500000, 'Birthday 1.png', 'waiting for verification', '2021-03-23 00:37:08'),
(40, NULL, '0026490998', 'April 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(41, NULL, '0026490998', 'Mei 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(42, NULL, '0026490998', 'Juni 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(43, NULL, '0026490998', 'Juli 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(44, NULL, '0026490998', 'Agustus 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(45, NULL, '0026490998', 'September 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(46, NULL, '0026490998', 'Oktober 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(47, NULL, '0026490998', 'November 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(48, 4, '0026490998', 'Desember 2021', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(49, 3, '0026490998', 'Januari 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(50, NULL, '0026490998', 'Februari 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(51, NULL, '0026490998', 'Maret 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(52, NULL, '0026490998', 'April 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(53, NULL, '0026490998', 'Mei 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(54, NULL, '0026490998', 'Juni 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(55, NULL, '0026490998', 'Juli 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(56, NULL, '0026490998', 'Agustus 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(57, NULL, '0026490998', 'September 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(58, NULL, '0026490998', 'Oktober 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(59, NULL, '0026490998', 'November 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(60, NULL, '0026490998', 'Desember 2022', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(68, NULL, '0026490998', 'Agustus 2020', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(69, NULL, '0026490998', 'September 2020', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(70, NULL, '0026490998', 'Oktober 2020', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(71, NULL, '0026490998', 'November 2020', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(72, NULL, '0026490998', 'Desember 2020', NULL, 500000, NULL, 'not paid', '2021-03-23 00:37:08'),
(181, NULL, '0724519212', 'Januari 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(182, NULL, '0724519212', 'Februari 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(183, NULL, '0724519212', 'Maret 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(184, NULL, '0724519212', 'April 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(185, NULL, '0724519212', 'Mei 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(186, NULL, '0724519212', 'Juni 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(187, NULL, '0724519212', 'Juli 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(188, NULL, '0724519212', 'Agustus 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(189, NULL, '0724519212', 'September 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(190, NULL, '0724519212', 'Oktober 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(191, NULL, '0724519212', 'November 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(192, NULL, '0724519212', 'Desember 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(193, NULL, '0724519212', 'Januari 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(194, NULL, '0724519212', 'Februari 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(195, NULL, '0724519212', 'Maret 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(196, NULL, '0724519212', 'April 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(197, NULL, '0724519212', 'Mei 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(198, NULL, '0724519212', 'Juni 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(199, NULL, '0724519212', 'Juli 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(200, NULL, '0724519212', 'Agustus 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(201, NULL, '0724519212', 'September 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(202, NULL, '0724519212', 'Oktober 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(203, NULL, '0724519212', 'November 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(204, NULL, '0724519212', 'Desember 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(205, NULL, '0724519212', 'Januari 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(206, NULL, '0724519212', 'Februari 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(207, NULL, '0724519212', 'Maret 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(208, NULL, '0724519212', 'April 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(209, NULL, '0724519212', 'Mei 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(210, NULL, '0724519212', 'Juni 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(211, NULL, '0724519212', 'Juli 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(212, NULL, '0724519212', 'Agustus 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(213, NULL, '0724519212', 'September 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(214, NULL, '0724519212', 'Oktober 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(215, NULL, '0724519212', 'November 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(216, NULL, '0724519212', 'Desember 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 02:32:16'),
(217, 9, '0056391538', 'Januari 2021', '2021-03-24', 500000, NULL, 'verified', '2021-03-24 05:59:02'),
(218, NULL, '0056391538', 'Februari 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(219, NULL, '0056391538', 'Maret 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(220, NULL, '0056391538', 'April 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(221, NULL, '0056391538', 'Mei 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(222, NULL, '0056391538', 'Juni 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(223, NULL, '0056391538', 'Juli 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(224, NULL, '0056391538', 'Agustus 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(225, NULL, '0056391538', 'September 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(226, NULL, '0056391538', 'Oktober 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(227, NULL, '0056391538', 'November 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(228, NULL, '0056391538', 'Desember 2021', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(229, NULL, '0056391538', 'Januari 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(230, NULL, '0056391538', 'Februari 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(231, NULL, '0056391538', 'Maret 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(232, NULL, '0056391538', 'April 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(233, NULL, '0056391538', 'Mei 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(234, NULL, '0056391538', 'Juni 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(235, NULL, '0056391538', 'Juli 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(236, NULL, '0056391538', 'Agustus 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(237, NULL, '0056391538', 'September 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(238, NULL, '0056391538', 'Oktober 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(239, NULL, '0056391538', 'November 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(240, NULL, '0056391538', 'Desember 2022', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(241, NULL, '0056391538', 'Januari 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(242, NULL, '0056391538', 'Februari 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(243, NULL, '0056391538', 'Maret 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(244, NULL, '0056391538', 'April 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(245, NULL, '0056391538', 'Mei 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(246, NULL, '0056391538', 'Juni 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(247, NULL, '0056391538', 'Juli 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(248, NULL, '0056391538', 'Agustus 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(249, NULL, '0056391538', 'September 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(250, NULL, '0056391538', 'Oktober 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(251, NULL, '0056391538', 'November 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02'),
(252, NULL, '0056391538', 'Desember 2023', NULL, 500000, NULL, 'not paid', '2021-03-24 05:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(3, 'krisnapm', 'f39c38615f9a24068e53205305c8c73a', 'Krisna Putra Mariyanto', 'admin'),
(4, 'onmyeji', '238b693c57bc748ea0a8b72c59fc9cf7', 'Yeji', 'petugas'),
(5, 'rcking', '2f24e9589af756452524a76b58ecab1c', 'Ronnie Coleman Muantap', 'admin'),
(7, 'masyoga', 'df38e53e08e6481ac0c73cc57c5d66d9', 'Mas Yoga Mantap', 'petugas'),
(8, 'junanda', '2f24e9589af756452524a76b58ecab1c', 'Junaaaa', 'admin'),
(9, 'gasss', 'e91e460352e1072264b8573b50c48f16', 'gasss', 'petugas'),
(10, 'uwedew', 'f39c38615f9a24068e53205305c8c73a', 'Mantap ges', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nis` varchar(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `norek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `password`, `nis`, `nama`, `id_kelas`, `alamat`, `norek`) VALUES
('0026490998', 'f39c38615f9a24068e53205305c8c73a', '2135/6789.123', 'Krisna Putra Mariyanto', 2, 'Siyotobagusan', '9.3509.930.5944.22010'),
('0056391538', '2a532d68ff642a4447bbbbccd415e52c', '2135/2761.935', 'Mas Yoga', 3, 'Blitar', '9.8909.980.5944.22050'),
('0724519212', 'f7c506c56c6cf70a7c908fbb2ba91be1', '2135/6612.432', 'Vicky Mariyanto', 3, 'Siyotobagus', '9.3509.640.3544.63818');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `bulan`, `nominal`) VALUES
(1, 'Januari', 500000),
(2, 'Februari', 500000),
(3, 'Maret', 500000),
(4, 'April', 500000),
(5, 'Mei', 500000),
(6, 'Juni', 500000),
(7, 'Juli', 500000),
(8, 'Agustus', 500000),
(9, 'September', 500000),
(10, 'Oktober', 500000),
(11, 'November', 500000),
(12, 'Desember', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

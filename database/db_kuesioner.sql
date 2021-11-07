-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 05:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuesioner`
--

-- --------------------------------------------------------

--
-- Table structure for table `isi_jawaban`
--

CREATE TABLE `isi_jawaban` (
  `id_jawaban` int(11) DEFAULT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `id_pengisi` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_pengisi` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengisi`
--

CREATE TABLE `pengisi` (
  `id_pengisi` int(11) NOT NULL,
  `nama_pengisi` varchar(100) DEFAULT NULL,
  `email_pengisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `nomor`, `pertanyaan`) VALUES
(1, 1, 'Apakah pelayanan di BRSPDSN Tan Miyat Bekasi sudah jelas, sesuai dan mudah dipahami untuk anda?'),
(2, 2, 'Berikan review anda terhadap kejelasan informasi, kemudahan prosedur dan kepuasan anda dalam mengikuti pelaksanaan prosedur pelayanan di BRSPDN Tan Miyat Bekasi.'),
(3, 3, 'Bagaimana pendapat anda tentang kejelasan informasi waktu pelayanan di BRSPDSN? Apakah penyelesaiannya sesuai dengan target waktu?'),
(4, 4, 'Apakah informasi tentang biaya pelayanan gratis sudah jelas menurut anda?'),
(5, 5, 'Apakah anda mengeluarkan uang/membayar ke Balai Tan Miyat?'),
(6, 6, 'Apakah anda memberikan imbalan kepada petugas untuk mendapatkan layanan di Balai Tan Miyat?'),
(7, 7, 'Apakah produk dan janji pelayanan sudah jelas dan sesuai?'),
(8, 8, 'Dalam memberikan pelayanan meliputi pengetahuan, keahlian, keterampilan dan pengalaman, apakah para petugas sudah cukup kompeten?'),
(9, 9, 'Bagaimana review anda terhadap perilaku para petugas pemberi layanan? Apakah mereka sopan, disiplin, dan bertanggung jawab?'),
(10, 10, 'Apakah selama anda menerima layanan di sini, petugas pernah bertindak diskriminasi? Jika ya, jelaskan!'),
(11, 11, 'Apakah anda merasa puas dengan pelayanan pengaduan, saran, dan masukan pada BRSPDSN Tan Miyat Bekasi?'),
(12, 12, 'Bagaimana review anda terhadap kenyamanan, kebersihan, serta kerapihan prasarana pelayanan pada BRSPDSN Tan Miyat Bekasi?');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$g/.itqKGrc6X1dEG2HdRae6TGfSIMbEC8k2jUfzhVOVV7tKHbXHhy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_pengisi` (`id_pengisi`);

--
-- Indexes for table `pengisi`
--
ALTER TABLE `pengisi`
  ADD PRIMARY KEY (`id_pengisi`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengisi`
--
ALTER TABLE `pengisi`
  MODIFY `id_pengisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_pengisi`) REFERENCES `pengisi` (`id_pengisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

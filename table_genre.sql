-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 05:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orakel`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_genre`
--

CREATE TABLE `table_genre` (
  `id` int(11) NOT NULL,
  `kode_genre` varchar(12) NOT NULL,
  `nama_genre` varchar(25) NOT NULL,
  `deskripsi_genre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_genre`
--

INSERT INTO `table_genre` (`id`, `kode_genre`, `nama_genre`, `deskripsi_genre`) VALUES
(1, 'GN-01', 'Cerita Member', 'Pengalaman seputar kejadian nyata dikehidupan sehari-hari yang berkaitan dengan dimensi lain'),
(2, 'GN-02', 'Misteri', 'Sesuatu yang belum diketahui dengan pasti dan menarik keingintahuan orang-orang, berkaitan dengan kejadian horor & supranatural'),
(3, 'GN-03', 'Mitos', 'Cerita rakyat tentang alam semesta & makhluk di dalamnya dengan latar belakang masa lampau yang dianggap benar-benar terjadi'),
(4, 'GN-04', 'Mitologi', 'Himpunan Kisah suci (cerita tradisional) yang menjelaskan bagaimana dunia maupun manusia dapat terbentuk seperti sekarang ini'),
(5, 'GN-05', 'Konspirasi', 'Penjelasan sebuah peristiwa rahasia untuk memperdaya orang banyak yang dilakukan sekelompok orang (organisasi) berkedudukan tinggi dan berkuasa'),
(6, 'GN-06', 'Urban Legend', 'Legenda kontemporer yang sering kali dipercaya secara luas sebagai sebuah kebenaran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_genre`
--
ALTER TABLE `table_genre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_genre`
--
ALTER TABLE `table_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

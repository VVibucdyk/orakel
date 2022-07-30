-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 06:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `table_artikel`
--

CREATE TABLE `table_artikel` (
  `id` int(11) NOT NULL,
  `kode_artikel` varchar(25) NOT NULL,
  `judul_artikel` varchar(256) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tgl_publish` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `slug` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `table_level`
--

CREATE TABLE `table_level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_level`
--

INSERT INTO `table_level` (`id`, `nama_level`) VALUES
(1, 'member'),
(2, 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `level_id` int(11) NOT NULL DEFAULT 1 COMMENT 'default = 1. level biasa',
  `link_foto` text DEFAULT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `nama`, `username`, `password`, `tgl_lahir`, `genre_id`, `level_id`, `link_foto`, `last_login`) VALUES
(1, 'Pocong Mumun', 'difawrd', 'afdd0b4ad2ec172c586e2150770fbf9e', '2001-09-27', 2, 1, NULL, '2022-07-29 19:17:13'),
(2, 'SUPER ADMIN', 'adminadmin.co', '237fc404f1250d295bfa0ab19c838602', '2022-04-29', 1, 1, NULL, '2022-07-29 20:55:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_artikel`
--
ALTER TABLE `table_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_genre`
--
ALTER TABLE `table_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_level`
--
ALTER TABLE `table_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_artikel`
--
ALTER TABLE `table_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_genre`
--
ALTER TABLE `table_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_level`
--
ALTER TABLE `table_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

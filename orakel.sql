-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 04:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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

--
-- Dumping data for table `table_artikel`
--

INSERT INTO `table_artikel` (`id`, `kode_artikel`, `judul_artikel`, `isi_artikel`, `tgl_publish`, `user_id`, `genre_id`, `rating`, `slug`) VALUES
(2, 'KD-001', 'Siluman Buruk Rupa', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores suscipit deserunt excepturi aperiam ut neque ad pariatur tempore ab! Voluptates totam maiores accusantium, ea praesentium quidem tempore corrupti nobis ducimus?\r\n\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores suscipit deserunt excepturi aperiam ut neque ad pariatur tempore ab! Voluptates totam maiores accusantium, ea praesentium quidem tempore corrupti nobis ducimus?\r\n\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores suscipit deserunt excepturi aperiam ut neque ad pariatur tempore ab! Voluptates totam maiores accusantium, ea praesentium quidem tempore corrupti nobis ducimus?', '2022-07-01', 7, 1, 5, 'siluman-buruk-rupa'),
(3, '62dd65dd9e77d', 'lpawodp asd', '\n                    This is some sample content.\n                ', '2022-07-24', 1, 3, 6, 'lpawodp-asd'),
(4, '62e3e5b864868', 'lpawodp', '<p>asdasd</p>', '2022-07-29', 1, 3, 9, 'lpawodp'),
(5, '62e3e5c8326e7', 'lpawodp', '<p><i>Lorem ipsum</i>, or <i>lipsum</i> as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s <i>De Finibus Bonorum et Malorum</i> for use in a type specimen book. It usually begins with:</p><blockquote><p><i>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</i></p></blockquote><p>The purpose of <i>lorem ipsum</i> is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without <a href=\"https://loremipsum.io/#controversy\">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p><p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our <a href=\"https://loremipsum.io/#generator\">generator</a> to get your own, or read on for the authoritative history of <i>lorem ipsum</i>.</p>', '2022-07-29', 1, 3, 6, 'lpawodp'),
(6, '62e3e5f3de38b', 'lpawodp', '<p><i>Lorem ipsum</i>, or <i>lipsum</i> as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s <i>De Finibus Bonorum et Malorum</i> for use in a type specimen book. It usually begins with:</p><blockquote><p><i>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</i></p></blockquote><p>The purpose of <i>lorem ipsum</i> is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without <a href=\"https://loremipsum.io/#controversy\">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p><p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our <a href=\"https://loremipsum.io/#generator\">generator</a> to get your own, or read on for the authoritative history of <i>lorem ipsum</i>.</p>', '2022-07-29', 1, 4, 10, 'lpawodp');

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
(1, 'GN-01', 'Cerita Member', ''),
(2, 'GN-02', 'Misteri', ''),
(3, 'GN-03', 'Mitos', NULL),
(4, 'GN-04', 'Mitologi', NULL),
(5, 'GN-05', 'Konspirasi', NULL),
(6, 'GN-06', 'Urban Legend', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

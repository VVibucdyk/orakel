-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 03:11 PM
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
  `tgl_publish` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `slug` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_artikel`
--

INSERT INTO `table_artikel` (`id`, `kode_artikel`, `judul_artikel`, `isi_artikel`, `tgl_publish`, `user_id`, `genre_id`, `rating`, `slug`) VALUES
(1, '62e9b4e27d452', 'Sample 1', '<p>Until recently, the prevailing view assumed <i>lorem ipsum</i> was born as a nonsense text. “It\'s not Latin, though it looks like it, and it actually says nothing,” <i>Before &amp; After</i> magazine <a href=\"https://www.straightdope.com/columns/read/2290/what-does-the-filler-text-lorem-ipsum-mean/\">answered a curious reader</a>, “Its ‘words’ loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.”</p><p>As Cicero would put it, “Um, not so fast.”</p><p>The placeholder text, beginning with the line <i>“Lorem ipsum dolor sit amet, consectetur adipiscing elit”</i>, looks like Latin because in its youth, centuries ago, it was Latin.</p><p>Richard McClintock, a Latin scholar from Hampden-Sydney College, is <a href=\"https://en.wikipedia.org/wiki/Lorem_ipsum\">credited</a> with discovering the source behind the ubiquitous filler text. In seeing a sample of <i>lorem ipsum</i>, his interest was piqued by <i>consectetur</i>—a genuine, albeit rare, Latin word. Consulting a Latin dictionary led McClintock to a passage from <i>De Finibus Bonorum et Malorum</i> (“On the Extremes of Good and Evil”), a first-century B.C. text from the Roman philosopher Cicero.</p><p>In particular, the garbled words of <i>lorem ipsum</i> bear an unmistakable resemblance to sections 1.10.32–33 of Cicero\'s work, with the most notable passage excerpted below:</p><blockquote><p><i>“Neque porro quisquam est, qui <strong>dolorem ipsum</strong> quia <strong>dolor sit amet, consectetur, adipisci velit, sed</strong> quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.”</i></p></blockquote><p>A 1914 English translation by <a href=\"https://en.wikipedia.org/wiki/Lorem_ipsum#English_translation\">Harris Rackham</a> reads:</p><blockquote><p><i>“Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure.”</i></p></blockquote><p>McClintock\'s eye for detail certainly helped narrow the whereabouts of <i>lorem ipsum\'s</i> origin, however, the “how and when” still remain something of a mystery, with competing theories and timelines.</p>', '2022-08-03 00:00:00', 1, 1, 5, 'Sample-1'),
(2, '62ea117896b37', 'Sample 2 ', '<h2><a href=\"https://loremipsum.io/#controversy\"><strong>Controversy in the Design World</strong></a></h2><p><strong>Some claim </strong><i><strong>lorem ipsum</strong></i><strong> threatens to promote design over content, while others defend its value in the process of planning.</strong></p><p><img src=\"https://loremipsum.io/assets/images/lorem-ipsum-star-wars.jpg\" alt=\"Star Wars lorem ipsum\"></p><p>&nbsp;</p><h4><strong>STAR WARS LOREM IPSUM</strong></h4><h3><strong>DESIGN OR (DIS)CONTENT</strong></h3><p>Among design professionals, there\'s a bit of controversy surrounding the filler text. Controversy, as in <a href=\"https://www.lukew.com/ff/entry.asp?927\">Death to Lorem Ipsum</a>.</p><p>The strength of <i>lorem ipsum</i> is its weakness: it doesn\'t communicate. To some, designing a website around placeholder text is unacceptable, akin to sewing a custom suit without taking measurements. <a href=\"http://adaptivepath.org/ideas/death-to-lorem-ipsum-other-adventures-in-content/\">Kristina Halvorson</a> notes:</p><blockquote><p><i>“I’ve heard the argument that “lorem ipsum” is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we’re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.”</i></p></blockquote><p><i>Lorem ipsum</i> is so ubiquitous because it is so versatile. Select how many paragraphs you want, copy, paste, and break the lines wherever it is convenient. Real copy doesn\'t work that way.</p><p>As front-end developer <a href=\"https://www.smashingmagazine.com/2010/01/lorem-ipsum-killing-designs/\">Kyle Fiedler put it</a>:</p><blockquote><p><i>“When you are designing with Lorem Ipsum, you diminish the importance of the copy by lowering it to the same level as any other visual element. The text simply becomes another supporting role, serving to make other aspects more aesthetic. Instead of your design enhancing the meaning of the content, your content is enhancing your design.”</i></p></blockquote><p>But despite zealous cries for the demise of <i>lorem ipsum</i>, others, such as <a href=\"https://karenmcgrane.com/2010/01/10/in-defense-of-lorem-ipsum/\">Karen McGrane</a>, offer appeals for moderation:</p><blockquote><p><i>“Lorem Ipsum doesn’t exist because people think the content is meaningless window dressing, only there to be decorated by designers who can’t be bothered to read. Lorem Ipsum exists because words are powerful. If you fill up your page with draft copy about your client’s business, they will read it. They will comment on it. They will be inexorably drawn to it. Presented the wrong way, draft copy can send your design review off the rails.”</i></p></blockquote><p>And that’s why a 15th century typesetter might have scrambled a passage of Cicero; he wanted people to focus on his fonts, to imagine their own content on the pages. He wanted people to see, and to get them to see he had to keep them from reading.</p>', '2022-08-03 00:00:00', 1, 1, 3, 'Sample-2'),
(3, '62ea80aa66cdd', 'Sample 3', '<h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2022-08-03 21:05:30', 2, 3, 7, 'Sample-3');

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
(1, 'Someone Member', 'someonemember', '9d9cf5b5992e36ed5cf9663c6f1991b5', '2001-01-01', 2, 1, NULL, '2022-08-06 20:04:16'),
(2, 'Someone Super Admin', 'someonesuperadmin', '5569bc69c705c6929b136d2fbfcebf3a', '2001-01-01', 5, 2, NULL, '0000-00-00 00:00:00'),
(3, 'difawitsqard', 'difawrd', 'afdd0b4ad2ec172c586e2150770fbf9e', '2001-06-22', 4, 2, NULL, '2022-08-06 20:08:32');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

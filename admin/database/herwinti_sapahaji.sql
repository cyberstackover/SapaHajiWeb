-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2017 at 05:42 AM
-- Server version: 10.0.33-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herwinti_sapahaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL,
  `nama` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Mas Admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `com_type` varchar(10) NOT NULL,
  `comment_text` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `comment_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `com_type`, `comment_text`, `create_at`, `update_at`, `delete_at`, `comment_by`) VALUES
(1, 5, 'comment', 'Bujuk i tok ....', '2017-10-21 23:37:54', NULL, NULL, 3),
(2, 8, 'comment', 'alay luu ...', '2017-10-22 20:58:12', NULL, NULL, 3),
(3, 8, 'comment', 'Biariiinnn ....', '2017-10-22 20:58:33', NULL, NULL, 3),
(4, 8, 'like', '', '2017-10-29 10:00:00', NULL, NULL, 5),
(5, 8, 'like', '', '2017-10-29 12:47:28', NULL, NULL, 3),
(6, 8, 'comment', 'all', '2017-10-29 12:59:58', NULL, NULL, 3),
(7, 8, 'comment', 'Yupp', '2017-10-29 13:00:36', NULL, NULL, 3),
(8, 10, 'comment', 'Yyi', '2017-11-03 15:38:27', NULL, NULL, 475),
(9, 10, 'comment', 'Oh itu', '2017-11-03 19:00:27', NULL, NULL, 475),
(10, 10, 'comment', 'Iya itu', '2017-11-03 19:10:09', NULL, NULL, 476),
(11, 10, 'like', '', '2017-11-03 19:10:22', NULL, NULL, 476),
(12, 10, 'comment', 'Berapa tuh om?', '2017-11-03 19:10:49', NULL, NULL, 476),
(13, 10, 'comment', 'Ini aid ya ? ', '2017-11-03 19:11:50', NULL, NULL, 475),
(14, 10, 'comment', 'Betul', '2017-11-03 19:13:30', NULL, NULL, 476),
(15, 11, 'comment', 'Ccd', '2017-11-03 19:17:11', NULL, NULL, 476),
(16, 12, 'comment', 'Ga jelas', '2017-11-03 19:17:39', NULL, NULL, 475),
(17, 12, 'comment', 'Bodo', '2017-11-03 19:17:54', NULL, NULL, 476),
(18, 12, 'comment', 'Postnya kok ga jelas', '2017-11-03 19:28:37', NULL, NULL, 477),
(19, 12, 'comment', 'Testing post s7 edge', '2017-11-03 21:25:15', NULL, NULL, 479),
(20, 16, 'comment', 'Asd', '2017-11-03 22:57:23', NULL, NULL, 480),
(21, 16, 'like', '', '2017-11-03 22:57:25', NULL, NULL, 480),
(22, 16, 'like', '', '2017-11-03 22:57:28', NULL, NULL, 480),
(23, 16, 'comment', 'Tes login google ', '2017-11-04 20:37:51', NULL, NULL, 484),
(24, 20, 'comment', 'Yess', '2017-11-04 20:46:41', NULL, NULL, 485),
(25, 20, 'like', '', '2017-11-04 20:46:44', NULL, NULL, 485),
(26, 21, 'comment', 'Asd', '2017-11-04 21:05:01', NULL, NULL, 484),
(27, 21, 'like', '', '2017-11-04 21:05:03', NULL, NULL, 484),
(28, 14, 'like', '', '2017-11-04 21:20:38', NULL, NULL, 483),
(29, 23, 'comment', 'Taps', '2017-11-04 22:03:41', NULL, NULL, 486),
(30, 28, 'like', '', '2017-11-04 22:18:28', NULL, NULL, 489),
(31, 28, 'comment', 'Brp tuh', '2017-11-04 22:18:44', NULL, NULL, 489),
(32, 28, 'comment', 'Sesuka lu aja bos', '2017-11-04 22:18:55', NULL, NULL, 476),
(33, 32, 'comment', 'Galaxy duos', '2017-11-06 19:34:18', NULL, NULL, 491),
(34, 32, 'like', '', '2017-11-06 19:34:20', NULL, NULL, 491),
(35, 33, 'like', '', '2017-11-06 19:40:22', NULL, NULL, 492),
(36, 33, 'comment', 'S8+', '2017-11-06 19:40:27', NULL, NULL, 492),
(37, 35, 'like', '', '2017-11-06 19:44:33', NULL, NULL, 493),
(38, 35, 'like', '', '2017-11-06 19:44:35', NULL, NULL, 493),
(39, 39, 'like', '', '2017-11-06 19:57:58', NULL, NULL, 494),
(40, 39, 'comment', 'Tes1', '2017-11-06 19:58:05', NULL, NULL, 494),
(41, 45, 'comment', 'okeeh', '2017-11-06 20:40:42', NULL, NULL, 496),
(42, 49, 'comment', 'Josss', '2017-11-08 11:59:23', NULL, NULL, 482),
(43, 32, 'comment', 'Xiaomi redminote', '2017-11-08 20:14:03', NULL, NULL, 490),
(44, 52, 'comment', 'Ntaps', '2017-11-11 04:45:24', NULL, NULL, 486);

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE `friend_list` (
  `id` int(11) NOT NULL,
  `id_friend_req` int(11) NOT NULL,
  `id_friend_apr` int(11) NOT NULL,
  `friend_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_req`
--

CREATE TABLE `friend_req` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `is_approve` tinyint(1) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likepost`
--

CREATE TABLE `likepost` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `like_by` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `delete_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likepost`
--

INSERT INTO `likepost` (`id_like`, `id_post`, `like_by`, `create_at`, `delete_at`, `update_at`) VALUES
(1, 8, 3, '2017-10-29 12:47:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 10, 476, '2017-11-03 19:10:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 16, 480, '2017-11-03 22:57:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 16, 480, '2017-11-03 22:57:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 20, 485, '2017-11-04 20:46:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 21, 484, '2017-11-04 21:05:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 14, 483, '2017-11-04 21:20:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 28, 489, '2017-11-04 22:18:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 32, 491, '2017-11-06 19:34:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 33, 492, '2017-11-06 19:40:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 35, 493, '2017-11-06 19:44:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 35, 493, '2017-11-06 19:44:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 39, 494, '2017-11-06 19:57:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_post` int(11) NOT NULL,
  `type` varchar(999) NOT NULL,
  `note` varchar(999) NOT NULL,
  `file_path_text` varchar(999) NOT NULL,
  `location` text NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `post_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_post`, `type`, `note`, `file_path_text`, `location`, `create_at`, `delete_at`, `update_at`, `post_by`) VALUES
(5, 'video', 'Video Unik. Jatuh dari pesawat (Terjun Payung)', '102a170912-6060753231.mp4', 'Angkasa', '2017-10-21 22:22:37', NULL, '2017-10-21 23:14:15', 3),
(7, 'text', 'Testing features', '', 'Di mana aja boleh', '2017-10-21 22:23:34', NULL, NULL, 3),
(8, 'text', 'Beginilah hidup. kadang gini, kadang gitu.', '', 'Lubuk hati', '2017-10-21 22:25:46', NULL, NULL, 3),
(10, 'photo', 'Uubh', 'img-201711-1791135580.jpg', '', '2017-11-03 15:38:17', NULL, NULL, 475),
(11, 'video', 'Anjingnya lucu', 'vid-201711-2400043909.mp4', 'Cibinong', '2017-11-03 19:15:52', NULL, NULL, 475),
(12, 'text', 'Tes', '', 'Magelang', '2017-11-03 19:15:53', NULL, NULL, 476),
(13, 'text', 'Tes3', '', '', '2017-11-03 19:30:47', NULL, NULL, 477),
(14, 'photo', 'Testing upload poto', 'img-201711-2739663291.jpg', 'Jakarta', '2017-11-03 21:25:55', NULL, NULL, 479),
(15, 'video', 'Testing upload video', 'vid-201710-1636264552.mp4', '', '2017-11-03 21:26:44', NULL, NULL, 479),
(16, 'text', 'Testing upload video', '', '', '2017-11-03 21:26:49', NULL, NULL, 479),
(17, 'text', 'Testing upload video', '', '', '2017-11-03 21:26:49', NULL, NULL, 479),
(18, 'text', 'Testing upload video', '', '', '2017-11-03 21:26:49', NULL, NULL, 479),
(19, 'text', 'Tes', '', '', '2017-11-04 20:32:41', NULL, NULL, 483),
(20, 'photo', 'Macet', 'screenshot-5252747093.png', '', '2017-11-04 20:38:12', NULL, NULL, 484),
(21, 'text', 'Tes', '', '', '2017-11-04 21:04:03', NULL, NULL, 486),
(22, 'photo', 'Tes', 'img-201711-4214745587.jpg', '', '2017-11-04 21:34:28', NULL, NULL, 487),
(23, 'photo', 'Tes2', 'img-201711-2895456352.jpg', '', '2017-11-04 21:58:34', NULL, NULL, 476),
(24, 'text', 'Tes lagi', '', '', '2017-11-04 21:59:00', NULL, NULL, 476),
(25, 'video', 'Tes lagi', 'vid-201710-2825372498.mp4', '', '2017-11-04 21:59:56', NULL, NULL, 476),
(26, 'photo', 'Lol', 'line_15086-2641967269.jpeg', '', '2017-11-04 22:14:19', NULL, NULL, 488),
(27, 'video', '', '20171104_2-4023978211.mp4', '', '2017-11-04 22:15:48', NULL, NULL, 488),
(28, 'photo', 'Tes sony', 'adidas-alp-1244866219.jpg', '', '2017-11-04 22:18:18', NULL, NULL, 476),
(29, 'text', 'Tes', '', '', '2017-11-04 22:19:00', NULL, NULL, 489),
(30, 'video', '', 'vid-201612-5667172786.mp4', '', '2017-11-04 22:19:40', NULL, NULL, 476),
(31, 'photo', 'Teat', 'img_4121-7873006006.jpg', 'lamongan', '2017-11-05 18:44:06', NULL, NULL, 475),
(32, 'text', 'Rkc', '', '', '2017-11-06 00:04:32', NULL, NULL, 490),
(33, 'text', 'Tes post\r\nDuos', '', '', '2017-11-06 19:35:43', NULL, NULL, 491),
(34, 'text', 'Chandra\r\nS8+ tes post', '', '', '2017-11-06 19:40:57', NULL, NULL, 492),
(35, 'photo', 'Chandra s8+\r\nTest poto', 'img-201711-2762780417.jpg', '', '2017-11-06 19:41:19', NULL, NULL, 492),
(36, 'video', 'Test post video\r\nS8+', 'vid-201710-7923340490.mp4', '', '2017-11-06 19:42:17', NULL, NULL, 492),
(37, 'photo', 'Mimax poto', 'screenshot-5067593455.png', '', '2017-11-06 19:45:14', NULL, NULL, 493),
(38, 'video', 'Mimax video', 'vid-201711-15838867.mp4', '', '2017-11-06 19:45:38', NULL, NULL, 493),
(39, 'text', 'Xiaomi mi max \r\nBs update prof. Post poto video', '', '', '2017-11-06 19:46:12', NULL, NULL, 493),
(40, 'photo', 'Tws upload poto dr redmi note 4', 'screenshot-4235074073.png', '', '2017-11-06 20:01:26', NULL, NULL, 494),
(41, 'video', '', 'vid-201711-1306859413.mp4', '', '2017-11-06 20:02:59', NULL, NULL, 494),
(42, 'text', 'Post z3', '', '', '2017-11-06 20:05:03', NULL, NULL, 495),
(43, 'photo', 'Z3', 'dsc_0001-5872314618.jpg', '', '2017-11-06 20:05:18', NULL, NULL, 495),
(44, 'video', 'Vid z3', 'vid-201612-1280580367.mp4', '', '2017-11-06 20:05:38', NULL, NULL, 495),
(45, 'photo', 'joss kan..', 'programmer-8774042967.jpg', 'gresik', '2017-11-06 20:40:20', NULL, NULL, 496),
(46, 'text', 'Coolpad e503', '', '', '2017-11-07 05:17:54', NULL, NULL, 497),
(47, 'text', 'Coolpad e503', '', '', '2017-11-07 05:18:53', NULL, NULL, 497),
(48, 'photo', '', 'img-201711-5729407588.jpg', '', '2017-11-07 11:31:32', NULL, NULL, 497),
(49, 'text', 'hemmmm\r\n', '', '', '2017-11-07 12:02:19', NULL, NULL, 498),
(50, 'text', 'hemmmm\r\n', '', '', '2017-11-07 12:02:19', NULL, NULL, 498),
(51, 'photo', 'Iye', 'glitchr_15-7066758614.jpg', '', '2017-11-11 04:39:01', NULL, NULL, 502),
(52, 'photo', 'Iye', 'glitchr_15-3792577325.jpg', '', '2017-11-11 04:39:07', NULL, NULL, 502),
(53, 'text', 'Iye', '', '', '2017-11-11 04:39:13', NULL, NULL, 502);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `jenis_kel` varchar(15) NOT NULL,
  `nomor_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(999) DEFAULT NULL,
  `home_pic` varchar(999) NOT NULL,
  `about` text,
  `is_login` tinyint(1) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `is_create_at` datetime NOT NULL,
  `register_by` varchar(20) NOT NULL,
  `image_url` text NOT NULL,
  `idlogin` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `nama_depan`, `nama_belakang`, `jenis_kel`, `nomor_tlp`, `alamat`, `email`, `password`, `profile_pic`, `home_pic`, `about`, `is_login`, `last_login`, `logout_at`, `is_create_at`, `register_by`, `image_url`, `idlogin`) VALUES
(5, 'Makruf', 'Rmd', 'Perempuan', '08324545111355', 'LamonganT', 'mrmd@gmail.comm', '1234567890', 'default.jpg', 'default.jpg', NULL, NULL, NULL, NULL, '2017-10-22 07:20:29', '', '', ''),
(6, 'Hikam', 'Pesek', 'Laki - Laki', '081345672891', 'Palangan', 'elek@email.com', '12345', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-17 21:08:58', NULL, '2017-10-22 07:26:49', '', '', ''),
(7, 'Ojan', 'Ad', 'Laki - Laki', '085712311111', 'Gresik', 'test@gitu.com', '123', 'default.jpg', 'default.jpg', NULL, 1, '2017-10-28 09:54:21', NULL, '2017-10-22 07:36:59', '', '', ''),
(8, 'Test', 'test', 'Perempuan', '23787383', 'kjsdkjsndjsd', 'test@mail.com', '123', 'default.jpg', 'default.jpg', NULL, 1, '2017-10-22 07:43:44', NULL, '2017-10-22 07:43:43', '', '', ''),
(9, 'FauzanAdmin', '', 'Perempuan', '2938392', 'Lamongan', 'admin@mail.com', 'admin', 'default.jpg', 'default.jpg', NULL, NULL, NULL, NULL, '2017-10-28 21:26:00', '', '', ''),
(10, 'Tesi', '', 'Perempuan', '24442', 'wewewe', 'tesi@mail.com', '123', 'default.jpg', 'default.jpg', NULL, NULL, NULL, NULL, '2017-10-28 21:28:14', '', '', ''),
(11, 'user01', '', 'Perempuan', '245445454545', 'sdsdsd', 'user01@mail.com', 'user01', 'default.jpg', 'default.jpg', NULL, NULL, NULL, NULL, '2017-10-28 21:30:22', '', '', ''),
(12, 'user02', '', 'Perempuan', '239892393', 'ewedwewe', 'user02@gmail.com', '123', 'default.jpg', 'default.jpg', NULL, NULL, NULL, NULL, '2017-10-28 21:31:37', '', '', ''),
(13, 'user03', '', 'Laki - Laki', '8392939', 'weweweew', 'user03@mail.com', '123', 'default.jpg', 'default.jpg', NULL, 1, '2017-10-29 17:05:17', NULL, '2017-10-28 21:32:50', '', '', ''),
(503, 'Adi Guna Syahputra', '', 'Laki - Laki', '', '', '', '', 'glitchr_15-7457641987.jpg', '', NULL, NULL, NULL, NULL, '2017-11-11 05:37:13', 'googleplus', '', '118339380618083442404'),
(501, 'akbar ajah', '', 'Laki - Laki', '0895348491788', 'depokoamula', 'akbarbudi86@gmail.com', 'akbar aja', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-08 21:31:15', NULL, '2017-11-08 21:31:15', '', '', ''),
(502, 'Adi guna syahputra', '', 'Laki - Laki', '0895348491788', 'Citayam', 'Adigunasyahputra@gmail.com', 'fruityloop11', 'glitchr_15-4666024828.jpg', 'default.jpg', NULL, 1, '2017-11-11 05:11:29', NULL, '2017-11-11 04:35:15', '', '', ''),
(500, 'Danu', '', 'Laki - Laki', '12334663', 'Depok', 'Danu@gmail.com', 'a1234', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-08 18:37:37', NULL, '2017-11-08 18:37:36', '', '', ''),
(499, 'Rizs Lathief Amalie', '', 'Laki - Laki', '081297018511', 'Bogor', 'rizs.lathief@gmail.com', '123456', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-08 18:36:36', NULL, '2017-11-08 18:36:34', '', '', ''),
(498, 'bagus hidayat', '', 'Laki - Laki', '', '', '', '', 'https://lh5.googleusercontent.com/-SV2O9D2DamQ/AAAAAAAAAAI/AAAAAAAAAc0/2DScbnrhjqA/photo.jpg', '', NULL, NULL, NULL, NULL, '2017-11-07 12:00:12', 'googleplus', '', '100641463238564223356'),
(497, 'Rifky', '', 'Laki - Laki', '089633051687', 'Cilendek timur bogor', 'rifky.radityatama@gmail.com', 'radityatama', 'img-201707-4087332151.jpg', 'default.jpg', NULL, 1, '2017-11-07 05:14:03', NULL, '2017-11-07 05:14:03', '', '', ''),
(495, 'Agus', '', 'Laki - Laki', '081274637', 'Cibinong', 'Agus@gmail.com', 'a1234', 'dsc_0001-8129249429.jpg', 'default.jpg', NULL, 1, '2017-11-06 20:04:21', NULL, '2017-11-06 20:04:21', '', '', ''),
(493, 'Kevin', '', 'Laki - Laki', '084563215', 'Cibinong', 'Kevin@gmail.com', 'a1234', 'screenshot-5883984761.png', 'default.jpg', NULL, 1, '2017-11-06 19:49:16', NULL, '2017-11-06 19:44:26', '', '', ''),
(494, 'Dolly@gmail.com', '', 'Laki - Laki', '081275648', 'Depok', 'Dolly@gmail.com', 'a12345', 'img_201709-4176022787.jpg', 'default.jpg', NULL, 1, '2017-11-06 19:56:52', NULL, '2017-11-06 19:56:51', '', '', ''),
(492, 'Chandra', '', 'Laki - Laki', '0812789683', 'Cibinong', 'Chandrahalim1506@gmail.com', 'a1234', 'img-201711-4740287391.jpg', 'default.jpg', NULL, 1, '2017-11-06 19:48:59', NULL, '2017-11-06 19:39:55', '', '', ''),
(490, 'Adiguna', '', 'Laki - Laki', '0895348491788', 'Citayam', 'Adigunasyahputra@gmail.com', 'fruityloop', 'glitchr_15-2926215003.jpg', 'default.jpg', NULL, 1, '2017-11-06 00:02:08', NULL, '2017-11-06 00:02:07', '', '', ''),
(491, 'Arkhan', '', 'Laki - Laki', '081288836072', 'Cibinong', 'Arkhan@gmail.com', 'a12345', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-06 19:33:52', NULL, '2017-11-06 19:33:51', '', '', ''),
(489, 'Aji', '', 'Laki - Laki', '0812648', 'Bekasi', 'Aji@gmail.com', 'a1234', 'img-201711-6720117647.jpg', 'default.jpg', NULL, 1, '2017-11-04 22:18:20', NULL, '2017-11-04 22:18:20', '', '', ''),
(488, 'Fakhrur Razi Diwa', '', 'Laki - Laki', '', '', '', '', 'default.jpg', '', NULL, NULL, NULL, NULL, '2017-11-04 22:12:33', 'googleplus', '', '103428624363432570027'),
(487, 'chandra halim', '', 'Laki - Laki', '081263746', 'Depok', '', '', 'img-201711-4783353302.jpg', '', NULL, NULL, NULL, NULL, '2017-11-04 21:33:45', 'googleplus', '', '113660842935822476315'),
(485, 'Chandrahalim', '', 'Laki - Laki', '08123456', 'Depok', 'Chandrahalim@gmail.con', 'a12345', 'img-201710-8839568113.jpg', 'default.jpg', NULL, 1, '2017-11-04 20:46:01', NULL, '2017-11-04 20:46:01', '', '', ''),
(486, 'Farid Caesar', '', 'Laki - Laki', '', '', '', '', 'https://lh6.googleusercontent.com/-KKNzteOwrXw/AAAAAAAAAAI/AAAAAAAAABU/27_Jkm5hs5g/photo.jpg', '', NULL, NULL, NULL, NULL, '2017-11-04 21:02:41', 'googleplus', '', '101427298334024654686'),
(484, 'fajar setiawan', '', 'Laki - Laki', '', '', '', '', 'img-201710-9057970880.jpg', '', NULL, NULL, NULL, NULL, '2017-11-04 20:36:29', 'googleplus', '', '101387666372104471336'),
(496, 'herwin', '', 'Laki - Laki', '081939115544', 'sidoarjo', 'herwin@windowslive.com', 'shadow999', 'me-profpic-4440795783.jpg', 'default.jpg', NULL, 1, '2017-11-06 20:23:09', NULL, '2017-11-06 20:23:09', '', '', ''),
(483, 'Oktavia Kartika Sari', '', 'Laki - Laki', '', '', '', '', 'https://lh5.googleusercontent.com/-iLSLqasjVdI/AAAAAAAAAAI/AAAAAAAAAD8/DIMtXfdrBuI/photo.jpg', '', NULL, NULL, NULL, NULL, '2017-11-04 20:31:30', 'googleplus', '', '102282985584147644172'),
(482, 'Adhim Ojan', '', 'Laki - Laki', '', '', '', '', 'img-201711-2976369708.jpg', '', NULL, NULL, NULL, NULL, '2017-11-04 20:23:34', 'googleplus', '', '113668497592391900713'),
(481, 'Fauzan Adhim Assyahied', '', 'Laki - Laki', '', '', '', '', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p320x320/20106243_1745882252107933_3897909522158627764_n.jpg?oh=3b3cb09313af122398f634da5bb841e5&oe=5A64AAA3', '', NULL, NULL, NULL, NULL, '2017-11-04 12:43:27', 'facebook', '', '1857912477571576'),
(480, 'Kevin', '', 'Laki - Laki', '0812852369', 'Bogor', 'Kevin@yahoo.com', 'a12345', 'img_201711-536626656.jpg', 'default.jpg', NULL, 1, '2017-11-03 22:56:02', NULL, '2017-11-03 22:56:02', '', '', ''),
(478, 'Diego', '', 'Perempuan', '087122735498', 'Depok', 'diegosatria@yahoo.com', 'A12345', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-03 19:30:10', NULL, '2017-11-03 19:30:09', '', '', ''),
(479, 'Chandra', '', 'Laki - Laki', '081264758', 'Jkt', 'Chandra@gmail.com', 'a1234', 'img-201711-5172945256.jpg', 'default.jpg', NULL, 1, '2017-11-04 21:19:09', NULL, '2017-11-03 21:24:53', '', '', ''),
(477, 'Tes3', '', 'Perempuan', '08123456', 'Cibinong', 'Tes3@gmail.com', 'a123456', 'default.jpg', 'default.jpg', NULL, 1, '2017-11-03 19:28:23', NULL, '2017-11-03 19:28:23', '', '', ''),
(475, 'Tes1', '', 'Laki - Laki', '1234567', 'Adjdiana no 10', 'Lukas@yahoo.com', 'a123456', 'screenshot-2674572225.jpg', 'default.jpg', NULL, 1, '2017-11-06 19:51:40', NULL, '2017-11-03 15:37:12', '', '', ''),
(476, 'Tes2', '', 'Laki - Laki', '0812748171', 'Cbg', 'Aid@gmail.com', 'a123456', 'suzuki_swi-7066191001.jpg', 'default.jpg', NULL, 1, '2017-11-04 22:17:22', NULL, '2017-11-03 19:09:44', '', '', ''),
(474, 'Fauzan Adhim Assyahied', '', 'Laki - Laki', '', '', '', '', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p320x320/20106243_1745882252107933_3897909522158627764_n.jpg?oh=3b3cb09313af122398f634da5bb841e5&oe=5A64AAA3', '', NULL, NULL, NULL, NULL, '2017-11-01 21:34:39', 'facebook', '', '1855138987848925');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_req`
--
ALTER TABLE `friend_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friend_req`
--
ALTER TABLE `friend_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

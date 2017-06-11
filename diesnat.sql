-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2017 at 02:04 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.6.30-11+deb.sury.org~trusty+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diesnat`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcer`
--

CREATE TABLE IF NOT EXISTS `announcer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `announcer`
--

INSERT INTO `announcer` (`id`, `jenis`, `desk`, `link`, `date`) VALUES
(1, 'bisplan', 'Soal Business Plan', 'http://Siaga.id', '2017-06-10 09:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `bisplan_db`
--

CREATE TABLE IF NOT EXISTS `bisplan_db` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `nama_tim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_univ` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_ketua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_a1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim_a2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_tim` (`nama_tim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bisplan_db`
--

INSERT INTO `bisplan_db` (`id`, `uid`, `nama_tim`, `asal_univ`, `ketua`, `nim_ketua`, `anggota1`, `nim_a1`, `anggota2`, `nim_a2`, `verifikasi`, `pembayaran`, `status`, `kontak`) VALUES
('FHPBB', 1, 'Tim Jago', 'ITSSS', 'MED', '1234', 'HAN', '1231', 'AHAH', '1212', '', 'BAYAR_FHPBB-.png', '4', '1212121');

-- --------------------------------------------------------

--
-- Table structure for table `cercer_db`
--

CREATE TABLE IF NOT EXISTS `cercer_db` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `nama_tim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_univ` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_ketua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_a1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim_a2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_tim` (`nama_tim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cercer_db`
--

INSERT INTO `cercer_db` (`id`, `uid`, `nama_tim`, `asal_univ`, `ketua`, `nim_ketua`, `anggota1`, `nim_a1`, `anggota2`, `nim_a2`, `verifikasi`, `pembayaran`, `status`, `kontak`) VALUES
('1XIM9', 2, 'Weheheh', 'SMA AA', 'Hoal', '12', 'Zola', '21', 'Lala', '33', '', '', '1', '8881211313');

-- --------------------------------------------------------

--
-- Table structure for table `debat_db`
--

CREATE TABLE IF NOT EXISTS `debat_db` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `nama_tim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_univ` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_ketua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_a1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim_a2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_tim` (`nama_tim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debat_db`
--

INSERT INTO `debat_db` (`id`, `uid`, `nama_tim`, `asal_univ`, `ketua`, `nim_ketua`, `anggota1`, `nim_a1`, `anggota2`, `nim_a2`, `verifikasi`, `pembayaran`, `status`, `kontak`) VALUES
('320P2', 1, 'Ecek Ecek', 'Universiti Malaysia', 'Ketut', '11313', 'Tutututu', '22111', 'Enakii', '221122', '', '', '1', 'id LINE : Wahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE IF NOT EXISTS `file_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_event` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Belum Bayar dan Belum Terverifikasi'),
(2, 'Belum Bayar dan Sudah Terverifikasi'),
(3, 'Sudah Bayar dan Belum Terverifikasi'),
(4, 'Sudah Bayar dan Sudah Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token`, `uid`, `date`, `status`) VALUES
('cae8807e0e9cb42d483be916990d72', '3', '2017-06-11 13:43:29', 1),
('822a7d836a52451621da61c4c0bcc7', '3', '2017-06-11 13:46:00', 1),
('066e38583cfe2231c3d2c82b6741e1', '3', '2017-06-11 13:54:56', 1),
('2e1e19a02213a88b2c3c495f64530e', '3', '2017-06-11 13:56:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `debat` int(11) NOT NULL DEFAULT '0',
  `bisplan` int(11) NOT NULL DEFAULT '0',
  `cercer` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `date`, `debat`, `bisplan`, `cercer`) VALUES
(1, 'burhan@gmail.com', '12345678', '2017-06-08 18:27:28', 1, 1, 0),
(2, 'med@mail.com', '12345678', '2017-06-10 17:17:39', 0, 0, 1),
(3, 'burhan@m.com', '25d55ad283aa400af464c76d713c07ad', '2017-06-11 13:43:06', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2020 at 03:19 PM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigjill_db_bl_cat_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_login_admin`
--

CREATE TABLE `log_login_admin` (
  `login_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `keterangan` text,
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `nama`, `username`, `email`, `password`, `keterangan`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'BigJill Official', 'bj_admin', 'bigjill.indonesia@gmail.com', '7a63092ed0dbf1cf717a930facf99a92', 'BigJill Official Account', 0, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42'),
(2, 'Aditya', 'aditya', 'adit.praset.27@gmail.com', 'f446d1791024a9a1a4f4db80d35762a8', 'Programmer', 0, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42'),
(3, 'Marcellino', 'marcell', 'marcellino2302@gmail.com', '7d4535690a318b0947cf4dde8e498748', 'Programmer', 0, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `harga` double NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ukuran_id` text,
  `warna_id` text NOT NULL,
  `link` text NOT NULL,
  `deskripsi` text NOT NULL,
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_foto`
--

CREATE TABLE `tbl_barang_foto` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `foto_utama` text NOT NULL,
  `foto_1` text,
  `foto_2` text,
  `foto_3` text,
  `foto_4` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `ukuran` char(1) NOT NULL DEFAULT 'T',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `nama`, `ukuran`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'Long Sleeve', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(2, 'Plain Tee', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(3, 'Masker', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(4, 'Jedai', 'T', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(5, 'Bandana', 'T', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(6, 'Calla', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(7, 'BigJill Knitt', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(8, 'Short Sleeve', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51'),
(9, 'Bag', 'T', 0, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51', 1, '2020-11-23 14:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ukuran`
--

CREATE TABLE `tbl_ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ukuran`
--

INSERT INTO `tbl_ukuran` (`ukuran_id`, `nama`, `singkatan`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'All Size', 'AllSize', 0, '2020-11-23 20:27:53', 1, '2020-11-23 20:27:53', 1, '2020-11-23 20:27:53'),
(2, 'Extra Small', 'XS', 0, '2020-11-23 20:27:54', 1, '2020-11-23 20:27:54', 1, '2020-11-23 20:27:54'),
(3, 'Small', 'S', 0, '2020-11-23 20:28:05', 1, '2020-11-23 20:28:05', 1, '2020-11-23 20:28:05'),
(4, 'Medium', 'M', 0, '2020-11-23 20:28:11', 1, '2020-11-23 20:28:11', 1, '2020-11-23 20:28:11'),
(5, 'Large', 'L', 0, '2020-11-23 20:29:31', 1, '2020-11-23 20:29:31', 1, '2020-11-23 20:29:31'),
(6, 'Extra Large', 'XL', 0, '2020-11-23 20:29:44', 1, '2020-11-23 20:29:44', 1, '2020-11-23 20:29:44'),
(7, 'Earloop', 'Earloop', 0, '2020-11-23 20:31:05', 1, '2020-11-23 20:31:05', 1, '2020-11-23 20:31:05'),
(8, 'Headloop', 'Headloop', 0, '2020-11-23 20:31:10', 1, '2020-11-23 20:31:10', 1, '2020-11-23 20:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warna`
--

CREATE TABLE `tbl_warna` (
  `warna_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warna`
--

INSERT INTO `tbl_warna` (`warna_id`, `nama`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'Aqua Blue', 0, '2020-11-23 20:15:00', 1, '2020-11-23 20:15:00', 1, '2020-11-23 20:15:00'),
(2, 'Army', 0, '2020-11-23 20:15:03', 1, '2020-11-23 20:15:03', 1, '2020-11-23 20:15:03'),
(3, 'Baby Green', 0, '2020-11-23 20:15:07', 1, '2020-11-23 20:15:07', 1, '2020-11-23 20:15:07'),
(4, 'Baby Pink', 0, '2020-11-23 20:15:11', 1, '2020-11-23 20:15:11', 1, '2020-11-23 20:15:11'),
(5, 'Banana', 0, '2020-11-23 20:15:15', 1, '2020-11-23 20:15:15', 1, '2020-11-23 20:15:15'),
(6, 'Black', 0, '2020-11-23 20:15:23', 1, '2020-11-23 20:15:23', 1, '2020-11-23 20:15:23'),
(7, 'Blue Misty', 0, '2020-11-23 20:15:29', 1, '2020-11-23 20:15:29', 1, '2020-11-23 20:15:29'),
(8, 'Blue Mountain', 0, '2020-11-23 20:15:31', 1, '2020-11-23 20:15:31', 1, '2020-11-23 20:15:31'),
(9, 'Brown', 0, '2020-11-23 20:15:39', 1, '2020-11-23 20:15:39', 1, '2020-11-23 20:15:39'),
(10, 'Brown - Army', 0, '2020-11-23 20:15:43', 1, '2020-11-23 20:15:43', 1, '2020-11-23 20:15:43'),
(11, 'Burgundy', 0, '2020-11-23 20:15:46', 1, '2020-11-23 20:15:46', 1, '2020-11-23 20:15:46'),
(12, 'Caramel', 0, '2020-11-23 20:15:49', 1, '2020-11-23 20:15:49', 1, '2020-11-23 20:15:49'),
(13, 'Carrot', 0, '2020-11-23 20:15:52', 1, '2020-11-23 20:15:52', 1, '2020-11-23 20:15:52'),
(14, 'Cloudy Yellow', 0, '2020-11-23 20:15:56', 1, '2020-11-23 20:15:56', 1, '2020-11-23 20:15:56'),
(15, 'Cobalt', 0, '2020-11-23 20:15:59', 1, '2020-11-23 20:15:59', 1, '2020-11-23 20:15:59'),
(16, 'Cream', 0, '2020-11-23 20:16:02', 1, '2020-11-23 20:16:02', 1, '2020-11-23 20:16:02'),
(17, 'Cream - Saffrom', 0, '2020-11-23 20:16:06', 1, '2020-11-23 20:16:06', 1, '2020-11-23 20:16:06'),
(18, 'Deep Blue', 0, '2020-11-23 20:16:08', 1, '2020-11-23 20:16:08', 1, '2020-11-23 20:16:08'),
(19, 'Deep Grey', 0, '2020-11-23 20:16:11', 1, '2020-11-23 20:16:11', 1, '2020-11-23 20:16:11'),
(20, 'Deep Jeans', 0, '2020-11-23 20:16:15', 1, '2020-11-23 20:16:15', 1, '2020-11-23 20:16:15'),
(21, 'Deep Misty', 0, '2020-11-23 20:16:18', 1, '2020-11-23 20:16:18', 1, '2020-11-23 20:16:18'),
(22, 'Deep Navy', 0, '2020-11-23 20:16:21', 1, '2020-11-23 20:16:21', 1, '2020-11-23 20:16:21'),
(23, 'Deep Peach', 0, '2020-11-23 20:16:24', 1, '2020-11-23 20:16:24', 1, '2020-11-23 20:16:24'),
(24, 'Deep Taro', 0, '2020-11-23 20:16:48', 1, '2020-11-23 20:16:48', 1, '2020-11-23 20:16:48'),
(25, 'Electric', 0, '2020-11-23 20:17:05', 1, '2020-11-23 20:17:05', 1, '2020-11-23 20:17:05'),
(26, 'Emerald', 0, '2020-11-23 20:17:08', 1, '2020-11-23 20:17:08', 1, '2020-11-23 20:17:08'),
(27, 'Green Apple', 0, '2020-11-23 20:17:11', 1, '2020-11-23 20:17:11', 1, '2020-11-23 20:17:11'),
(28, 'Green Leaf', 0, '2020-11-23 20:17:14', 1, '2020-11-23 20:17:14', 1, '2020-11-23 20:17:14'),
(29, 'Green Lime', 0, '2020-11-23 20:17:17', 1, '2020-11-23 20:17:17', 1, '2020-11-23 20:17:17'),
(30, 'Green Stabilo', 0, '2020-11-23 20:17:20', 1, '2020-11-23 20:17:20', 1, '2020-11-23 20:17:20'),
(31, 'Grey', 0, '2020-11-23 20:17:23', 1, '2020-11-23 20:17:23', 1, '2020-11-23 20:17:23'),
(32, 'Grey - Black', 0, '2020-11-23 20:17:26', 1, '2020-11-23 20:17:26', 1, '2020-11-23 20:17:26'),
(33, 'Grey - Pink', 0, '2020-11-23 20:17:30', 1, '2020-11-23 20:17:30', 1, '2020-11-23 20:17:30'),
(34, 'Hot Pink', 0, '2020-11-23 20:17:33', 1, '2020-11-23 20:17:33', 1, '2020-11-23 20:17:33'),
(35, 'Jase Blue', 0, '2020-11-23 20:17:36', 1, '2020-11-23 20:17:36', 1, '2020-11-23 20:17:36'),
(36, 'Jeans', 0, '2020-11-23 20:17:39', 1, '2020-11-23 20:17:39', 1, '2020-11-23 20:17:39'),
(37, 'Latte', 0, '2020-11-23 20:17:42', 1, '2020-11-23 20:17:42', 1, '2020-11-23 20:17:42'),
(38, 'Light Blue', 0, '2020-11-23 20:17:45', 1, '2020-11-23 20:17:45', 1, '2020-11-23 20:17:45'),
(39, 'Lime', 0, '2020-11-23 20:17:48', 1, '2020-11-23 20:17:48', 1, '2020-11-23 20:17:48'),
(40, 'Malibu', 0, '2020-11-23 20:17:51', 1, '2020-11-23 20:17:51', 1, '2020-11-23 20:17:51'),
(41, 'Mango', 0, '2020-11-23 20:17:54', 1, '2020-11-23 20:17:54', 1, '2020-11-23 20:17:54'),
(42, 'Medium Pink', 0, '2020-11-23 20:17:57', 1, '2020-11-23 20:17:57', 1, '2020-11-23 20:17:57'),
(43, 'Milo', 0, '2020-11-23 20:18:00', 1, '2020-11-23 20:18:00', 1, '2020-11-23 20:18:00'),
(44, 'Mint', 0, '2020-11-23 20:18:04', 1, '2020-11-23 20:18:04', 1, '2020-11-23 20:18:04'),
(45, 'Misty Grey', 0, '2020-11-23 20:18:07', 1, '2020-11-23 20:18:07', 1, '2020-11-23 20:18:07'),
(46, 'Mustard', 0, '2020-11-23 20:18:09', 1, '2020-11-23 20:18:09', 1, '2020-11-23 20:18:09'),
(47, 'Natural Green', 0, '2020-11-23 20:18:12', 1, '2020-11-23 20:18:12', 1, '2020-11-23 20:18:12'),
(48, 'Navy', 0, '2020-11-23 20:18:15', 1, '2020-11-23 20:18:15', 1, '2020-11-23 20:18:15'),
(49, 'Neon Pink', 0, '2020-11-23 20:18:18', 1, '2020-11-23 20:18:18', 1, '2020-11-23 20:18:18'),
(50, 'Norimaki', 0, '2020-11-23 20:18:30', 1, '2020-11-23 20:18:30', 1, '2020-11-23 20:18:30'),
(51, 'Orange', 0, '2020-11-23 20:18:36', 1, '2020-11-23 20:18:36', 1, '2020-11-23 20:18:36'),
(52, 'Orange Pastel', 0, '2020-11-23 20:18:39', 1, '2020-11-23 20:18:39', 1, '2020-11-23 20:18:39'),
(53, 'Peach', 0, '2020-11-23 20:20:36', 1, '2020-11-23 20:20:36', 1, '2020-11-23 20:20:36'),
(54, 'Pebble', 0, '2020-11-23 20:20:39', 1, '2020-11-23 20:20:39', 1, '2020-11-23 20:20:39'),
(55, 'Pink', 0, '2020-11-23 20:20:43', 1, '2020-11-23 20:20:43', 1, '2020-11-23 20:20:43'),
(56, 'Pink Stabilo', 0, '2020-11-23 20:20:46', 1, '2020-11-23 20:20:46', 1, '2020-11-23 20:20:46'),
(57, 'Purple Pastel', 0, '2020-11-23 20:20:49', 1, '2020-11-23 20:20:49', 1, '2020-11-23 20:20:49'),
(58, 'Red', 0, '2020-11-23 20:20:57', 1, '2020-11-23 20:20:57', 1, '2020-11-23 20:20:57'),
(59, 'Red Brick', 0, '2020-11-23 20:21:00', 1, '2020-11-23 20:21:00', 1, '2020-11-23 20:21:00'),
(60, 'Saffron', 0, '2020-11-23 20:21:03', 1, '2020-11-23 20:21:03', 1, '2020-11-23 20:21:03'),
(61, 'Salmon', 0, '2020-11-23 20:21:07', 1, '2020-11-23 20:21:07', 1, '2020-11-23 20:21:07'),
(62, 'Sea Foam', 0, '2020-11-23 20:21:11', 1, '2020-11-23 20:21:11', 1, '2020-11-23 20:21:11'),
(63, 'Shocking Pink', 0, '2020-11-23 20:21:16', 1, '2020-11-23 20:21:16', 1, '2020-11-23 20:21:16'),
(64, 'Soft Blue', 0, '2020-11-23 20:21:52', 1, '2020-11-23 20:21:52', 1, '2020-11-23 20:21:52'),
(65, 'Soft Green', 0, '2020-11-23 20:21:55', 1, '2020-11-23 20:21:55', 1, '2020-11-23 20:21:55'),
(66, 'Soft Grey', 0, '2020-11-23 20:21:59', 1, '2020-11-23 20:21:59', 1, '2020-11-23 20:21:59'),
(67, 'Soft Jeans', 0, '2020-11-23 20:22:02', 1, '2020-11-23 20:22:02', 1, '2020-11-23 20:22:02'),
(68, 'Soft Mint', 0, '2020-11-23 20:22:07', 1, '2020-11-23 20:22:07', 1, '2020-11-23 20:22:07'),
(69, 'Soft Peach', 0, '2020-11-23 20:22:13', 1, '2020-11-23 20:22:13', 1, '2020-11-23 20:22:13'),
(70, 'Soft Salmon', 0, '2020-11-23 20:22:16', 1, '2020-11-23 20:22:16', 1, '2020-11-23 20:22:16'),
(71, 'Soft Tosca', 0, '2020-11-23 20:22:21', 1, '2020-11-23 20:22:21', 1, '2020-11-23 20:22:21'),
(72, 'Soft Yellow', 0, '2020-11-23 20:22:25', 1, '2020-11-23 20:22:25', 1, '2020-11-23 20:22:25'),
(73, 'Stabilo', 0, '2020-11-23 20:22:30', 1, '2020-11-23 20:22:30', 1, '2020-11-23 20:22:30'),
(74, 'Sunset Orange', 0, '2020-11-23 20:22:34', 1, '2020-11-23 20:22:34', 1, '2020-11-23 20:22:34'),
(75, 'Taro', 0, '2020-11-23 20:22:37', 1, '2020-11-23 20:22:37', 1, '2020-11-23 20:22:37'),
(76, 'Teracotta', 0, '2020-11-23 20:22:40', 1, '2020-11-23 20:22:40', 1, '2020-11-23 20:22:40'),
(77, 'Tomato', 0, '2020-11-23 20:22:42', 1, '2020-11-23 20:22:42', 1, '2020-11-23 20:22:42'),
(78, 'Tosca', 0, '2020-11-23 20:22:45', 1, '2020-11-23 20:22:45', 1, '2020-11-23 20:22:45'),
(79, 'Tropical Pink', 0, '2020-11-23 20:22:53', 1, '2020-11-23 20:22:53', 1, '2020-11-23 20:22:53'),
(80, 'Turquaise', 0, '2020-11-23 20:22:56', 1, '2020-11-23 20:22:56', 1, '2020-11-23 20:22:56'),
(81, 'Violet', 0, '2020-11-23 20:22:59', 1, '2020-11-23 20:22:59', 1, '2020-11-23 20:22:59'),
(82, 'White', 0, '2020-11-23 20:23:02', 1, '2020-11-23 20:23:02', 1, '2020-11-23 20:23:02'),
(83, 'White Misty', 0, '2020-11-23 20:23:05', 1, '2020-11-23 20:23:05', 1, '2020-11-23 20:23:05'),
(84, 'Yellow', 0, '2020-11-23 20:23:16', 1, '2020-11-23 20:23:16', 1, '2020-11-23 20:23:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_login_admin`
--
ALTER TABLE `log_login_admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tbl_barang_foto`
--
ALTER TABLE `tbl_barang_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- Indexes for table `tbl_warna`
--
ALTER TABLE `tbl_warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_login_admin`
--
ALTER TABLE `log_login_admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang_foto`
--
ALTER TABLE `tbl_barang_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_warna`
--
ALTER TABLE `tbl_warna`
  MODIFY `warna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

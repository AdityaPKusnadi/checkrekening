-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Des 2020 pada 07.45
-- Versi server: 5.7.32
-- Versi PHP: 7.3.6

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
-- Struktur dari tabel `log_login_admin`
--

CREATE TABLE `log_login_admin` (
  `login_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_login_admin`
--

INSERT INTO `log_login_admin` (`login_id`, `admin_id`, `lastlogin`) VALUES
(1, 3, '2020-12-11 14:22:34'),
(2, 3, '2020-12-18 08:21:36'),
(3, 3, '2020-12-18 19:49:50'),
(4, 1, '2020-12-19 11:21:02'),
(5, 1, '2020-12-19 11:21:52'),
(6, 3, '2020-12-19 11:39:21'),
(7, 1, '2020-12-19 12:43:41'),
(8, 3, '2020-12-21 07:58:05'),
(9, 3, '2020-12-21 17:47:17'),
(10, 3, '2020-12-22 09:15:16'),
(11, 1, '2020-12-23 19:37:26'),
(12, 1, '2020-12-24 10:38:13'),
(13, 3, '2020-12-24 17:02:24'),
(14, 3, '2020-12-24 19:27:39'),
(15, 3, '2020-12-24 20:51:44'),
(16, 1, '2020-12-25 08:45:43'),
(17, 1, '2020-12-26 09:10:00'),
(18, 3, '2020-12-26 09:50:53'),
(19, 3, '2020-12-26 10:26:58'),
(20, 1, '2020-12-26 10:30:32'),
(21, 3, '2020-12-26 10:33:15'),
(22, 1, '2020-12-26 10:33:22'),
(23, 3, '2020-12-26 13:25:18'),
(24, 3, '2020-12-26 14:32:45'),
(25, 1, '2020-12-26 18:02:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `keterangan` text,
  `display_email` char(1) NOT NULL DEFAULT 'T',
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `nama`, `username`, `email`, `password`, `keterangan`, `display_email`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'BigJill Official', 'bj_admin', 'bigjill.indonesia@gmail.com', '7a63092ed0dbf1cf717a930facf99a92', 'BigJill Official Account', 'Y', 0, '2020-11-23 13:42:42', 1, '2020-12-21 17:12:51', 3, '2020-12-21 17:12:51'),
(2, 'Aditya', 'aditya', 'adit.praset.27@gmail.com', 'f446d1791024a9a1a4f4db80d35762a8', 'Programmer', 'T', 0, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42'),
(3, 'Marcellino', 'marcell', 'marcellino2302@gmail.com', '7d4535690a318b0947cf4dde8e498748', 'Programmer', 'T', 0, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
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

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `nama`, `harga`, `kategori_id`, `ukuran_id`, `warna_id`, `link`, `deskripsi`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'BANDO KERUT MUTIARA', 12000, 10, '', '44,55,6,53,84,86,85', 'https://shopee.co.id/BANDO-KERUT-i.40082839.3962139295', 'BANDO KERUT MUTIARA\r\nLagi musim banget nihh bando yang kainnya kerut-kerut\r\nAda 7 warna\r\nRp 12.000\r\n\r\nBe shine, be cool, be you !\r\n\r\n#iwearbigjill #produklokal #ootd #clothing #fashion #produkindonesia #casual #olshop #onlineshop #ootdindo #olshopindo \r\n#onlineshopindo #onlineshopbandung #produkbandung #bajukeren #olshopbandung #plaintee #tshirt #rajut #bando', 0, '2020-12-18 08:12:00', 3, '2020-12-18 08:12:00', 3, '2020-12-18 08:12:00'),
(2, 'MILLY SABRINE', 130000, 9, '', '1', 'https://shopee.co.id/BANDO-KERUT-i.40082839.3962139295', 'Warna pastel emang selalu bikin gemesh ! Nah ini ada yg model sabrina, cakep banget dipakenya\r\n\r\nLingkar dada 110cm\r\nPanjang badan 51cm\r\n\r\nAda 6 warna\r\nBahan baby corduroy\r\nRp 130.000\r\n\r\nBe shine, be cool, be you !', 1, '2020-12-19 11:12:10', 1, '2020-12-19 11:12:47', 1, '2020-12-19 11:12:47'),
(3, 'KIMBERLY SABRINE', 200000, 11, '1', '85,6', 'https://shopee.co.id/product/40082839/3570069208/', 'Masih belum punya one set Bigjill nihh ? Yuk ahh buruan !\r\n.\r\nKIMBERLY SABRINE\r\nFit to L\r\nPanjang badan 42cm\r\n\r\nLingkar pinggang 68-84cm\r\nPanjang celana 75cm\r\n\r\nAda 6 warna\r\nBahan katun\r\nRp 200.000\r\n\r\nBe shine, be cool, be you !\r\n\r\n#iwearbigjill #produklokal #ootd #clothing #fashion #produkindonesia #casual #olshop #onlineshop #ootdindo #olshopindo \r\n#onlineshopindo #onlineshopbandung #produkbandung #bajukeren #olshopbandung #plaintee #tshirt #kaospolos #oneset', 0, '2020-12-26 10:12:47', 3, '2020-12-26 10:12:47', 3, '2020-12-26 10:12:47'),
(4, 'ELVARETTA BAG', 110000, 9, '', '82,6,86,16,4,9', 'https://shopee.co.id/ELVARETTA-BAG-i.40082839.9704531019', 'Tas ini warna-warna’nya cakep banget !\r\nBisa jd hangbag or slingbag\r\n.\r\nELVARETTA BAG\r\nUkuran 22 x 8 x 14\r\n(Panjang - lebar - tinggi)\r\n\r\nAda 6 warna\r\nBahan faux leather\r\nRp 110.000\r\n\r\nBe shine, be cool, be you !\r\n\r\n#iwearbigjill #produklokal #ootd #clothing #fashion #produkindonesia #casual #olshop #onlineshop #ootdindo #olshopindo \r\n#onlineshopindo #onlineshopbandung #produkbandung #bajukeren #olshopbandung #plaintee #tshirt #kaospolos #taslucu', 0, '2020-12-21 18:12:10', 3, '2020-12-21 18:12:10', 3, '2020-12-21 18:12:10'),
(5, 'MASKER PLAIN', 6500, 3, '9,7,8', '87,92,90,91,88,89,93,94,95', 'https://shopee.co.id/MASKER-PLAIN-i.40082839.7823945912', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN TWILL\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-24 13:12:29', 1, '2020-12-24 13:12:29', 1, '2020-12-24 13:12:29'),
(6, 'MASKER ETNIK ABSTRAK', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-ETNIK-ABSTRAK-i.40082839.3624018743', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN JEPANG\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:01', 1, '2020-12-26 18:12:01', 1, '2020-12-26 18:12:01'),
(7, 'MASKER SCOTT PAGE 1', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-SCOTT-PAGE1-i.40082839.6823933329', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN JEPANG\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:54', 1, '2020-12-26 18:12:54', 1, '2020-12-26 18:12:54'),
(8, 'MASKER SCOTT PAGE 2', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-SCOTT-PAGE2-i.40082839.5137740614', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN JEPANG\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:19', 1, '2020-12-26 18:12:19', 1, '2020-12-26 18:12:19'),
(9, 'MASKER BUNGA PAGE 1', 6500, 3, '9,7,8', '', 'https://shopee.co.id/MASKER-BUNGA-PAGE-1-i.40082839.7327137546', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:06', 1, '2020-12-26 18:12:06', 1, '2020-12-26 18:12:06'),
(10, 'MASKER BUNGA PAGE 2', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-BUNGA-PAGE-2-i.40082839.6855994653', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)\r\n', 0, '2020-12-26 18:12:44', 1, '2020-12-26 18:12:44', 1, '2020-12-26 18:12:44'),
(11, 'test data ', 150000, 3, '1', '1', 'https://shopee.co.id', 'test data', 1, '2020-12-26 10:12:29', 1, '2020-12-26 10:12:00', 1, '2020-12-26 10:12:00'),
(12, 'test data2', 150000, 4, '', '2', 'https://shopee.com', 'test datanya', 1, '2020-12-26 11:12:02', 1, '2020-12-26 11:12:38', 1, '2020-12-26 11:12:38'),
(13, 'MASKER BINTIK', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-BINTIK-i.40082839.3135385359', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN JEPANG\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:34', 1, '2020-12-26 18:12:34', 1, '2020-12-26 18:12:34'),
(14, 'MASKER POLCA', 6500, 3, '9,7,8', '', 'https://shopee.co.id/MASKER-POLCA-i.40082839.5427144592', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN JEPANG\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)\r\n', 0, '2020-12-26 18:12:25', 1, '2020-12-26 18:12:25', 1, '2020-12-26 18:12:25'),
(15, 'MASKER DIAMOND', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-DIAMOND-i.40082839.4723937980', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN JEPANG\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)\r\n', 0, '2020-12-26 18:12:36', 1, '2020-12-26 18:12:36', 1, '2020-12-26 18:12:36'),
(16, 'MASKER SALUR', 6500, 3, '9,7,8', '96', 'https://shopee.co.id/MASKER-SALUR-i.40082839.3624043735', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN LINEN\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:09', 1, '2020-12-26 18:12:09', 1, '2020-12-26 18:12:09'),
(17, 'MASKER VINTAGE', 7500, 3, '9,7,8', '', 'https://shopee.co.id/MASKER-VINTAGE-i.40082839.7865023588', 'Ukuran : (KURANG LEBIH)\r\n- dewasa 21cm / 12cm\r\n- anak 18cm / 10cm (bisa lihat di foto)\r\nSemua’nya handmade, jd jika ada ada perbedaan ukuran harap maklum\r\nBahan KATUN LINEN\r\n2 lapisan, bisa diisi tissue buat filter (jadi 3 lapis)', 0, '2020-12-26 18:12:17', 1, '2020-12-26 18:12:17', 1, '2020-12-26 18:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_foto`
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

--
-- Dumping data untuk tabel `tbl_barang_foto`
--

INSERT INTO `tbl_barang_foto` (`id`, `barang_id`, `foto_utama`, `foto_1`, `foto_2`, `foto_3`, `foto_4`) VALUES
(1, 1, '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg'),
(2, 2, 'image1.jpeg', 'image2.jpeg', '0', '0', '0'),
(3, 3, 'sabrine_3.jpg', '0', '0', '0', '0'),
(4, 4, '131983809_716499189270296_8736821168042882175_n.jpg', '131888690_894919964587234_7027475415064517333_n.jpg', '132135583_1049986345469785_664668759440073271_n.jpg', '131889809_1819318588223160_8707970906502789209_n.jpg', '131900757_122049336393202_7165939084393727949_n.jpg'),
(5, 5, 'F4024844-5E71-49C4-A35E-FA9AA34CEA84.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg', 'IMG-7938.jpg', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg'),
(6, 6, 'E3114223-1CA8-405B-9EE0-69E3A006AC2D.jpg', 'B27106CF-B479-4A99-BC62-7ADE6C6F9060.jpg', '5CC5C77B-9C23-4487-9114-B9896B181E97.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg'),
(7, 7, 'B24B5E45-7B0D-4AEE-8B18-F353DC282B9F.jpg', '07830C98-DF48-4FBC-8BB6-2E74D238D1DA.jpg', '076EF178-028A-4363-8681-45A7C622E9F0.jpg', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg'),
(8, 8, '429CC2C9-0178-4E01-8984-15EE130E1903.jpg', '99DBD411-9AD3-42BD-92C8-EAD2C2CDDED8_(1).jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg'),
(9, 9, '10085F2F-AF25-47F6-8DA0-FB1618DB274D.jpg', '77C8D4B2-9794-4CD7-9CB8-86A5EA1AEFCE.jpg', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', 'IMG-7938.jpg'),
(10, 10, 'D721A4A0-3C36-4E22-8BFA-162457249410.jpg', '759594C3-0186-40EF-8F32-A7E1F56558C6.jpg', '054196A4-6515-4A3C-BDD6-DB29EEFB1909.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg'),
(11, 11, '8362A1BB-38BD-4E8C-B739-53F106020549.jpeg', '0', '0', '0', '0'),
(12, 12, '0', '0', '0', '0', '0'),
(13, 13, 'E2F644FB-9B76-45AD-898A-1184FAD1CC11.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', '0'),
(14, 14, 'F0DBCBC5-14D8-4F45-85FD-881EFEBE67B9.jpg', 'CC2D0596-8B62-4DAD-A6F4-B960188A9D1F.jpg', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg', 'IMG-7938.jpg'),
(15, 15, '8AC9E44E-28C7-47A9-B033-D78C5E0A544D.jpg', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', 'IMG-7938.jpg'),
(16, 16, 'eeae78dd-5324-4e68-aff4-651a832f010d.JPG', '45A321DF-843C-4340-B0EF-80E6020C0F7F.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg'),
(17, 17, 'IMG-4488.JPG', '0F178224-4CDF-4652-8F7E-F6142ED94D6A.JPG', '900B1BDE-F22E-4486-AD28-DF2AC4A42EB2.jpg', 'A5B61490-B299-43C9-93FE-F245D01F8333.JPG', '1A8F75AD-E9EE-484B-BBE2-A186C7FB4BAC.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
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
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `nama`, `ukuran`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'PLAIN LONGSLEEVE', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:20', 1, '2020-12-24 12:12:20'),
(2, 'TOP', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:17', 1, '2020-12-24 12:12:17'),
(3, 'MASKER', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:49', 1, '2020-12-24 12:12:49'),
(4, 'BOTTOM', 'T', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:07', 1, '2020-12-24 12:12:07'),
(6, 'TSHIRT', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:03', 1, '2020-12-24 12:12:03'),
(7, 'KNITT', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:49', 1, '2020-12-24 12:12:49'),
(8, 'PLAIN SHORTSLEEVE', 'Y', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:36', 1, '2020-12-24 12:12:36'),
(9, 'BAG', 'T', 0, '2020-11-23 14:07:51', 1, '2020-12-24 12:12:37', 1, '2020-12-24 12:12:37'),
(10, 'HAIR ACCESSORIES', 'T', 0, '2020-12-18 08:12:30', 3, '2020-12-24 12:12:26', 1, '2020-12-24 12:12:26'),
(11, 'SET', 'Y', 0, '2020-12-24 12:12:45', 1, '2020-12-24 12:12:45', 1, '2020-12-24 12:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `lokasi_id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `url` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`lokasi_id`, `nama`, `url`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'Kings Shopping Centre, Jl. Kepatihan No.4, Balonggede, Kec. Regol, Kota Bandung, Jawa Barat 40251', 'https://www.google.com/maps/place/Big+Jill/@-6.9236294,107.5976967,15z/data=!4m8!1m2!2m1!1sbigjill+indonesia!3m4!1s0x2e68e6246ce9c979:0x5c67b7582be8fe8d!8m2!3d-6.923346!4d107.604319', 0, '2020-12-21 17:12:19', 3, '2020-12-21 17:12:25', 3, '2020-12-21 17:12:25'),
(2, 'Jl. Dewi Sartika No.11, Balonggede, Kec. Regol, Kota Bandung, Jawa Barat 40251', 'https://www.google.com/maps/place/BigJill/@-6.9236294,107.5976967,15z/data=!4m8!1m2!2m1!1sbigjill+indonesia!3m4!1s0x2e68e6268692e901:0x4c1faf509fe2aeb6!8m2!3d-6.9236294!4d107.6064514', 0, '2020-12-21 17:12:49', 3, '2020-12-21 17:12:49', 3, '2020-12-21 17:12:49'),
(3, 'Bandung Indah Plaza, Jl. Merdeka No.56, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40117', 'https://www.google.com/maps/place/Big+Jill/@-6.908344,107.602497,15z/data=!4m8!1m2!2m1!1sbigjill+indonesia!3m4!1s0x2e68e637c28ce53d:0x19653cfa33e71afa!8m2!3d-6.908344!4d107.6112517', 0, '2020-12-21 17:12:09', 3, '2020-12-21 17:12:09', 3, '2020-12-21 17:12:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ukuran`
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
-- Dumping data untuk tabel `tbl_ukuran`
--

INSERT INTO `tbl_ukuran` (`ukuran_id`, `nama`, `singkatan`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'All Size', 'AllSize', 0, '2020-11-23 20:27:53', 1, '2020-11-23 20:27:53', 1, '2020-11-23 20:27:53'),
(2, 'Extra Small', 'XS', 0, '2020-11-23 20:27:54', 1, '2020-11-23 20:27:54', 1, '2020-11-23 20:27:54'),
(3, 'Small', 'S', 0, '2020-11-23 20:28:05', 1, '2020-11-23 20:28:05', 1, '2020-11-23 20:28:05'),
(4, 'Medium', 'M', 0, '2020-11-23 20:28:11', 1, '2020-11-23 20:28:11', 1, '2020-11-23 20:28:11'),
(5, 'Large', 'L', 0, '2020-11-23 20:29:31', 1, '2020-11-23 20:29:31', 1, '2020-11-23 20:29:31'),
(6, 'Extra Large', 'XL', 0, '2020-11-23 20:29:44', 1, '2020-11-23 20:29:44', 1, '2020-11-23 20:29:44'),
(7, 'Earloop', 'Earloop', 0, '2020-11-23 20:31:05', 1, '2020-11-23 20:31:05', 1, '2020-11-23 20:31:05'),
(8, 'Headloop', 'Headloop', 0, '2020-11-23 20:31:10', 1, '2020-11-23 20:31:10', 1, '2020-11-23 20:31:10'),
(9, 'Anak Earloop', 'AE', 0, '2020-12-24 12:12:56', 1, '2020-12-24 17:12:28', 1, '2020-12-24 17:12:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wa`
--

CREATE TABLE `tbl_wa` (
  `wa_id` int(11) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_wa`
--

INSERT INTO `tbl_wa` (`wa_id`, `nomor`, `pesan`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, '081222334054', 'Saya tertarik dengan #nama, kategori #kategori - #harga', 0, '2020-12-21 17:12:42', 3, '2020-12-22 09:12:58', 3, '2020-12-22 09:12:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_warna`
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
-- Dumping data untuk tabel `tbl_warna`
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
(84, 'Yellow', 0, '2020-11-23 20:23:16', 1, '2020-11-23 20:23:16', 1, '2020-11-23 20:23:16'),
(85, 'Lilac', 0, '2020-12-18 08:12:03', 3, '2020-12-18 08:12:03', 3, '2020-12-18 08:12:03'),
(86, 'Blue', 0, '2020-12-18 08:12:06', 3, '2020-12-18 08:12:06', 3, '2020-12-18 08:12:06'),
(87, 'K (hitam)', 0, '2020-12-23 19:12:41', 1, '2020-12-23 19:12:41', 1, '2020-12-23 19:12:41'),
(88, 'HA (Khaki)', 0, '2020-12-23 19:12:56', 1, '2020-12-23 19:12:56', 1, '2020-12-23 19:12:56'),
(89, 'HB (desert sand)', 0, '2020-12-23 19:12:04', 1, '2020-12-23 19:12:04', 1, '2020-12-23 19:12:04'),
(90, 'Y (telor asin)', 0, '2020-12-23 19:12:12', 1, '2020-12-23 19:12:12', 1, '2020-12-23 19:12:12'),
(91, 'Z (abu)', 0, '2020-12-23 19:12:17', 1, '2020-12-23 19:12:17', 1, '2020-12-23 19:12:17'),
(92, 'L (navy)', 0, '2020-12-23 19:12:24', 1, '2020-12-23 19:12:24', 1, '2020-12-23 19:12:24'),
(93, 'HP (broken white)', 0, '2020-12-23 19:12:33', 1, '2020-12-23 19:12:33', 1, '2020-12-23 19:12:33'),
(94, 'HV (avocado)', 0, '2020-12-23 19:12:39', 1, '2020-12-23 19:12:39', 1, '2020-12-23 19:12:39'),
(95, 'HL (lilac)', 0, '2020-12-23 19:12:47', 1, '2020-12-23 19:12:47', 1, '2020-12-23 19:12:47'),
(96, 'corak kode', 0, '2020-12-25 09:12:50', 1, '2020-12-25 09:12:50', 1, '2020-12-25 09:12:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_login_admin`
--
ALTER TABLE `log_login_admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `tbl_barang_foto`
--
ALTER TABLE `tbl_barang_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indeks untuk tabel `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- Indeks untuk tabel `tbl_wa`
--
ALTER TABLE `tbl_wa`
  ADD PRIMARY KEY (`wa_id`);

--
-- Indeks untuk tabel `tbl_warna`
--
ALTER TABLE `tbl_warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_login_admin`
--
ALTER TABLE `log_login_admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_foto`
--
ALTER TABLE `tbl_barang_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_wa`
--
ALTER TABLE `tbl_wa`
  MODIFY `wa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_warna`
--
ALTER TABLE `tbl_warna`
  MODIFY `warna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

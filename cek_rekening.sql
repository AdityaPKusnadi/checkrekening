-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Feb 2021 pada 15.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cek_rekening`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_login_admin`
--

CREATE TABLE `log_login_admin` (
  `login_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT current_timestamp()
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
(25, 1, '2020-12-26 18:02:22'),
(26, 2, '2020-12-27 14:16:40'),
(27, 2, '2020-12-27 16:04:53'),
(28, 2, '2021-01-31 07:37:48'),
(29, 2, '2021-02-07 18:23:53'),
(30, 2, '2021-02-11 18:38:03'),
(31, 2, '2021-02-11 23:50:17'),
(32, 2, '2021-02-12 07:29:06'),
(33, 2, '2021-02-14 11:54:42'),
(34, 2, '2021-02-14 20:24:09'),
(35, 2, '2021-02-15 05:59:02'),
(36, 2, '2021-02-15 20:54:50'),
(37, 2, '2021-02-15 21:13:29'),
(38, 2, '2021-02-16 00:07:17'),
(39, 2, '2021-02-20 06:41:49'),
(40, 2, '2021-02-20 07:11:53'),
(41, 4, '2021-02-20 07:13:25'),
(42, 2, '2021-02-20 07:14:19'),
(43, 2, '2021-02-22 20:08:22'),
(44, 2, '2021-02-22 21:20:14'),
(45, 2, '2021-02-24 11:40:29'),
(46, 2, '2021-02-28 14:30:09');

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
  `keterangan` text DEFAULT NULL,
  `display_email` char(1) NOT NULL DEFAULT 'T',
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `nama`, `username`, `email`, `password`, `keterangan`, `display_email`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(1, 'BigJill Official', 'bj_admin', 'bigjill.indonesia@gmail.com', '7a63092ed0dbf1cf717a930facf99a92', 'BigJill Official Account', 'Y', 1, '2020-11-23 13:42:42', 1, '2021-02-20 07:02:06', 2, '2021-02-20 07:02:06'),
(2, 'Aditya', 'aditya', 'adit.praset.27@gmail.com', 'f446d1791024a9a1a4f4db80d35762a8', 'Programmer', 'T', 0, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42', 1, '2020-11-23 13:42:42'),
(3, 'Marcellino', 'marcell', 'marcellino2302@gmail.com', '7d4535690a318b0947cf4dde8e498748', 'Programmer', 'T', 1, '2020-11-23 13:42:42', 1, '2021-02-20 07:02:10', 2, '2021-02-20 07:02:10'),
(4, 'admin', 'admin100', 'admin@min.com', 'f446d1791024a9a1a4f4db80d35762a8', '', 'Y', 0, '2021-02-20 07:02:59', 2, '2021-02-20 07:02:59', 2, '2021-02-20 07:02:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bank_id` int(11) NOT NULL,
  `nama` varchar(36) DEFAULT NULL,
  `singkatan` varchar(15) DEFAULT NULL,
  `deleted` char(1) DEFAULT '0',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `nama`, `singkatan`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(2, 'Bank Rakyat Indonesia', 'BRI', '0', '2021-02-11 23:02:20', 2, '2021-02-11 23:02:20', 2, '2021-02-11 23:02:20'),
(3, 'Bank Negara Indonesia', 'BNI', '0', '2021-02-14 12:02:32', 2, '2021-02-14 12:02:32', 2, '2021-02-14 12:02:32'),
(4, 'Bank Tabungan Pensiunan Nasional', 'BTPN', '0', '2021-02-14 12:02:55', 2, '2021-02-15 06:02:30', 2, '2021-02-15 06:02:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `harga` double NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ukuran_id` text DEFAULT NULL,
  `warna_id` text NOT NULL,
  `link` text NOT NULL,
  `deskripsi` text NOT NULL,
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT current_timestamp()
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
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `ukuran` char(1) NOT NULL DEFAULT 'T',
  `deleted` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT current_timestamp()
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
  `deleted` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT current_timestamp()
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
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `rekening_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `rekening` char(30) DEFAULT NULL,
  `atas_nama` varchar(45) DEFAULT NULL,
  `status` char(25) DEFAULT NULL COMMENT 'blacklist / whitelist',
  `kronologi` text NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted` int(1) DEFAULT 0 COMMENT '0 = normal / 1 = delete',
  `lastmodified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`rekening_id`, `bank_id`, `rekening`, `atas_nama`, `status`, `kronologi`, `create_at`, `create_by`, `update_at`, `update_by`, `deleted`, `lastmodified`) VALUES
(1, 1, '1', 'aditya', 'Blacklist', '', '2021-02-12 07:02:31', 2, '2021-02-20 07:02:42', 2, 1, '2021-02-20 07:02:42'),
(2, 1, '1', 'aditya', 'Blacklist', '', '2021-02-14 15:02:49', 2, '2021-02-20 07:02:02', 2, 1, '2021-02-20 07:02:02'),
(3, 2, '2', 'atas nama adit', 'Blacklist', '', '2021-02-14 15:02:16', 2, '2021-02-20 07:02:46', 2, 1, '2021-02-20 07:02:46'),
(4, 4, '47772838449', 'Ray Mond', 'Blacklist', '', '2021-02-14 15:02:24', 2, '2021-02-20 07:02:54', 2, 1, '2021-02-20 07:02:54'),
(5, 1, '83294294729', 'Niko Donat', 'Blacklist', 'menipu saat membeli donat', '2021-02-15 07:02:47', 2, '2021-02-20 07:02:02', 2, 1, '2021-02-20 07:02:02'),
(6, 3, '1278687638456', 'Nadita Dewi Profita', '', 'Sellernya Baik Ramah Barangnyapun sangat murah murah ga nyangka banget deh pokoknya', '2021-02-16 00:02:31', 2, '2021-02-22 23:02:24', 2, 0, '2021-02-22 23:02:24'),
(7, 1, '12345678910', 'Afif Akbar', 'Blacklist', 'Saya Di paksa di tipu jancok', '2021-02-20 08:02:56', 2, '2021-02-20 08:02:56', 2, 0, '2021-02-20 08:02:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening_foto`
--

CREATE TABLE `tbl_rekening_foto` (
  `id` int(11) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `foto_utama` text NOT NULL,
  `foto_1` text DEFAULT NULL,
  `foto_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekening_foto`
--

INSERT INTO `tbl_rekening_foto` (`id`, `rekening_id`, `foto_utama`, `foto_1`, `foto_2`) VALUES
(1, 1, 'IMG_1149.jpg', '0', '0'),
(2, 2, '0', '0', '0'),
(3, 3, '0', '0', '0'),
(4, 4, '0', '0', '0'),
(5, 5, '0', '0', '0'),
(6, 6, 'Screen_Shot_2021-02-14_at_22_45_52.png', '0', '0'),
(7, 7, 'Screen_Shot_2021-02-13_at_16_23_47.png', 'Screen_Shot_2021-02-14_at_22_45_52.png', 'Screen_Shot_2021-02-14_at_23_47_04.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ukuran`
--

CREATE TABLE `tbl_ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT current_timestamp()
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
(9, 'Anak Earloop', 'AE', 0, '2020-12-24 12:12:56', 1, '2020-12-24 17:12:28', 1, '2020-12-24 17:12:28'),
(10, 'Bank Central Asia', 'BCA', 0, '2021-02-11 21:02:47', 2, '2021-02-11 21:02:47', 2, '2021-02-11 21:02:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `display_email` char(1) NOT NULL DEFAULT 'T',
  `deleted` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `lastmodified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `nama`, `username`, `email`, `password`, `keterangan`, `display_email`, `deleted`, `create_at`, `create_by`, `update_at`, `update_by`, `lastmodified`) VALUES
(5, 'apkblack17', 'apkblack17', 'adit.praset.27@icloud.com', 'f446d1791024a9a1a4f4db80d35762a8', NULL, 'T', 0, '2021-02-28 09:02:30', 0, '2021-02-28 09:02:30', 0, '2021-02-28 09:02:30');

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
-- Indeks untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`);

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
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`rekening_id`);

--
-- Indeks untuk tabel `tbl_rekening_foto`
--
ALTER TABLE `tbl_rekening_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_login_admin`
--
ALTER TABLE `log_login_admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `rekening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening_foto`
--
ALTER TABLE `tbl_rekening_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

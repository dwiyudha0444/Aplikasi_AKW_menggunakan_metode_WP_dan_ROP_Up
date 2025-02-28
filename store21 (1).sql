-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2025 at 08:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store21`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `id` bigint UNSIGNED NOT NULL,
  `kualitas_produk` int DEFAULT NULL,
  `harga_produk` int DEFAULT NULL,
  `layanan_pelanggan` int DEFAULT NULL,
  `ulasan_pelanggan` int DEFAULT NULL,
  `fleksibilitas_pembayaran` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id`, `kualitas_produk`, `harga_produk`, `layanan_pelanggan`, `ulasan_pelanggan`, `fleksibilitas_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(2, 2, 2, 2, 2, 2, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(3, 3, 3, 3, 3, 3, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(4, 4, 4, 4, 4, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(5, 6, 6, 6, 6, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(6, 5, 5, 5, 5, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(7, 7, 7, 7, 7, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(8, 8, 8, 8, 8, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(9, 9, 9, 9, 9, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(10, 10, 10, 10, 10, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED DEFAULT NULL,
  `potongan_diskon` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id`, `id_produk`, `potongan_diskon`, `created_at`, `updated_at`) VALUES
(1, NULL, 10, '2025-02-09 19:47:57', '2025-02-09 19:47:57'),
(2, NULL, 20, '2025-02-09 20:19:26', '2025-02-09 20:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Baju', '2025-02-08 19:29:51', '2025-02-08 19:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(45, '2019_08_19_000000_create_failed_jobs_table', 1),
(46, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(47, '2025_01_20_050204_create_produk', 1),
(48, '2025_01_20_055710_create_kategori', 1),
(49, '2025_01_22_024030_create_pemesanan_table', 1),
(50, '2025_01_22_024200_create_pemesanan_produk_table', 1),
(51, '2025_01_22_075934_add_image_to_produk_table', 1),
(52, '2025_01_23_060823_add_image_bukti_tf_to_pemesanan_table', 1),
(53, '2025_01_23_064441_add_order_id_to_pemesanan_table', 1),
(54, '2025_01_24_090222_create_penilaian_table', 1),
(55, '2025_01_27_003728_create_pengiriman_table', 1),
(56, '2025_01_27_091852_create_atribut__table', 1),
(57, '2025_01_31_025629_add_komentar_to_penilaian_table', 1),
(58, '2025_02_09_015043_create_stok_table', 1),
(59, '2025_02_09_015053_create_diskon_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `image_bukti_tf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bukti transfer pembayaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_user`, `tanggal_pemesanan`, `status_pemesanan`, `total_harga`, `image_bukti_tf`, `created_at`, `updated_at`, `order_id`) VALUES
(1, 2, '2025-02-08 19:35:48', NULL, 60000.00, NULL, '2025-02-08 19:35:48', '2025-02-08 19:35:48', 'RE-090225001'),
(2, 2, '2025-02-08 19:36:00', 'waiting approvement', 60000.00, 'bukti_transfer/1739068566_logo.png', '2025-02-08 19:36:00', '2025-02-08 19:36:06', 'RE-090225002'),
(3, 2, '2025-02-12 21:10:22', NULL, 40000.00, NULL, '2025-02-12 21:10:22', '2025-02-12 21:10:22', 'RE-130225001'),
(4, 2, '2025-02-12 21:20:42', 'waiting approvement', 68000.00, 'bukti_transfer/1739420451_surat_persetujuan_1736902964.png', '2025-02-12 21:20:42', '2025-02-12 21:20:52', 'RE-130225002'),
(5, 2, '2025-02-13 19:27:39', NULL, 8000.00, NULL, '2025-02-13 19:27:39', '2025-02-13 19:27:39', 'RE-140225001'),
(6, 2, '2025-02-13 19:29:11', 'waiting approvement', 48000.00, 'bukti_transfer/1739500157_logo.jpg', '2025-02-13 19:29:11', '2025-02-13 19:29:18', 'RE-140225002'),
(7, 2, '2025-02-13 19:30:40', NULL, 28000.00, NULL, '2025-02-13 19:30:40', '2025-02-13 19:30:40', 'RE-140225003'),
(8, 2, '2025-02-13 20:31:52', NULL, 100000.00, NULL, '2025-02-13 20:31:52', '2025-02-13 20:31:52', 'RE-140225004'),
(9, 2, '2025-02-13 20:32:33', NULL, 100000.00, NULL, '2025-02-13 20:32:33', '2025-02-13 20:32:33', 'RE-140225005'),
(10, 2, '2025-02-13 20:33:55', NULL, 100000.00, NULL, '2025-02-13 20:33:55', '2025-02-13 20:33:55', 'RE-140225006'),
(11, 2, '2025-02-13 20:34:59', 'waiting approvement', 60000.00, 'bukti_transfer/1739504282_logomu.png', '2025-02-13 20:34:59', '2025-02-13 20:38:02', 'RE-140225007'),
(12, 2, '2025-02-13 20:42:59', NULL, 100000.00, NULL, '2025-02-13 20:42:59', '2025-02-13 20:42:59', 'RE-140225008'),
(13, 2, '2025-02-14 19:26:27', NULL, 10000.00, NULL, '2025-02-14 19:26:27', '2025-02-14 19:26:27', 'RE-150225001'),
(14, 2, '2025-02-14 19:43:15', NULL, 10000.00, NULL, '2025-02-14 19:43:15', '2025-02-14 19:43:15', 'RE-150225002'),
(15, 2, '2025-02-14 19:54:39', NULL, 10000.00, NULL, '2025-02-14 19:54:39', '2025-02-14 19:54:39', 'RE-150225003'),
(16, 2, '2025-02-14 20:29:11', NULL, 180.00, NULL, '2025-02-14 20:29:11', '2025-02-14 20:29:11', 'RE-150225004'),
(17, 2, '2025-02-14 20:40:50', NULL, 80.00, NULL, '2025-02-14 20:40:50', '2025-02-14 20:40:50', 'RE-150225005'),
(18, 2, '2025-02-14 20:41:55', NULL, 40000.00, NULL, '2025-02-14 20:41:55', '2025-02-14 20:41:55', 'RE-150225006'),
(19, 2, '2025-02-14 20:45:37', NULL, 40000.00, NULL, '2025-02-14 20:45:37', '2025-02-14 20:45:37', 'RE-150225007'),
(20, 2, '2025-02-14 20:48:19', NULL, 60000.00, NULL, '2025-02-14 20:48:19', '2025-02-14 20:48:19', 'RE-150225008'),
(21, 2, '2025-02-14 20:50:52', NULL, 60000.00, NULL, '2025-02-14 20:50:52', '2025-02-14 20:50:52', 'RE-150225009'),
(22, 2, '2025-02-14 20:51:12', NULL, 40000.00, NULL, '2025-02-14 20:51:12', '2025-02-14 20:51:12', 'RE-150225010'),
(23, 2, '2025-02-14 20:52:16', NULL, 40000.00, NULL, '2025-02-14 20:52:16', '2025-02-14 20:52:16', 'RE-150225011'),
(24, 2, '2025-02-14 20:52:55', NULL, 40000.00, NULL, '2025-02-14 20:52:55', '2025-02-14 20:52:55', 'RE-150225012'),
(25, 2, '2025-02-14 23:41:57', NULL, 40000.00, NULL, '2025-02-14 23:41:57', '2025-02-14 23:41:57', 'RE-150225013'),
(26, 2, '2025-02-17 22:11:30', NULL, 40000.00, NULL, '2025-02-17 22:11:30', '2025-02-17 22:11:30', 'RE-180225001'),
(27, 2, '2025-02-17 22:16:06', NULL, 40000.00, NULL, '2025-02-17 22:16:06', '2025-02-17 22:16:06', 'RE-180225002'),
(28, 2, '2025-02-17 22:16:51', NULL, 40000.00, NULL, '2025-02-17 22:16:51', '2025-02-17 22:16:51', 'RE-180225003'),
(29, 2, '2025-02-17 22:21:25', NULL, 80000.00, NULL, '2025-02-17 22:21:25', '2025-02-17 22:21:25', 'RE-180225004'),
(30, 2, '2025-02-17 23:12:57', NULL, 1000000.00, NULL, '2025-02-17 23:12:57', '2025-02-17 23:12:57', 'RE-180225005'),
(31, 2, '2025-02-17 23:14:09', NULL, 100000.00, NULL, '2025-02-17 23:14:09', '2025-02-17 23:14:09', 'RE-180225006'),
(32, 2, '2025-02-17 23:14:37', NULL, 1000000.00, NULL, '2025-02-17 23:14:37', '2025-02-17 23:14:37', 'RE-180225007'),
(33, 2, '2025-02-17 23:14:49', NULL, 40000.00, NULL, '2025-02-17 23:14:49', '2025-02-17 23:14:49', 'RE-180225008'),
(34, 2, '2025-02-17 23:15:09', NULL, 500000.00, NULL, '2025-02-17 23:15:09', '2025-02-17 23:15:09', 'RE-180225009'),
(35, 2, '2025-02-17 23:15:23', NULL, 800000.00, NULL, '2025-02-17 23:15:23', '2025-02-17 23:15:23', 'RE-180225010'),
(36, 2, '2025-02-17 23:15:35', NULL, 1000000.00, NULL, '2025-02-17 23:15:35', '2025-02-17 23:15:35', 'RE-180225011'),
(37, 2, '2025-02-17 23:16:13', NULL, 1000000.00, NULL, '2025-02-17 23:16:13', '2025-02-17 23:16:13', 'RE-180225012'),
(38, 2, '2025-02-17 23:17:48', NULL, 1500000.00, NULL, '2025-02-17 23:17:48', '2025-02-17 23:17:48', 'RE-180225013'),
(39, 2, '2025-02-17 23:18:02', NULL, 700000.00, NULL, '2025-02-17 23:18:02', '2025-02-17 23:18:02', 'RE-180225014'),
(40, 2, '2025-02-17 23:18:12', NULL, 600000.00, NULL, '2025-02-17 23:18:12', '2025-02-17 23:18:12', 'RE-180225015'),
(41, 2, '2025-02-17 23:18:23', NULL, 400000.00, NULL, '2025-02-17 23:18:23', '2025-02-17 23:18:23', 'RE-180225016'),
(42, 2, '2025-02-17 23:18:34', NULL, 1000000.00, NULL, '2025-02-17 23:18:34', '2025-02-17 23:18:34', 'RE-180225017'),
(43, 2, '2025-02-17 23:18:46', NULL, 1000000.00, NULL, '2025-02-17 23:18:46', '2025-02-17 23:18:46', 'RE-180225018'),
(44, 2, '2025-02-17 23:18:57', NULL, 1000000.00, NULL, '2025-02-17 23:18:57', '2025-02-17 23:18:57', 'RE-180225019'),
(45, 2, '2025-02-17 23:19:07', NULL, 800000.00, NULL, '2025-02-17 23:19:07', '2025-02-17 23:19:07', 'RE-180225020'),
(46, 2, '2025-02-17 23:19:18', NULL, 800000.00, NULL, '2025-02-17 23:19:18', '2025-02-17 23:19:18', 'RE-180225021'),
(47, 2, '2025-02-17 23:19:40', NULL, 1000000.00, NULL, '2025-02-17 23:19:40', '2025-02-17 23:19:40', 'RE-180225022'),
(48, 2, '2025-02-17 23:19:58', NULL, 1000000.00, NULL, '2025-02-17 23:19:58', '2025-02-17 23:19:58', 'RE-180225023'),
(49, 2, '2025-02-17 23:20:19', NULL, 1000000.00, NULL, '2025-02-17 23:20:19', '2025-02-17 23:20:19', 'RE-180225024'),
(50, 2, '2025-02-17 23:20:35', NULL, 700000.00, NULL, '2025-02-17 23:20:35', '2025-02-17 23:20:35', 'RE-180225025'),
(51, 2, '2025-02-17 23:20:51', NULL, 600000.00, NULL, '2025-02-17 23:20:51', '2025-02-17 23:20:51', 'RE-180225026'),
(52, 2, '2025-02-17 23:21:07', NULL, 500000.00, NULL, '2025-02-17 23:21:07', '2025-02-17 23:21:07', 'RE-180225027'),
(53, 2, '2025-02-17 23:21:23', NULL, 1000000.00, NULL, '2025-02-17 23:21:23', '2025-02-17 23:21:23', 'RE-180225028'),
(54, 2, '2025-02-17 23:21:39', NULL, 1000000.00, NULL, '2025-02-17 23:21:39', '2025-02-17 23:21:39', 'RE-180225029'),
(55, 2, '2025-02-17 23:22:13', NULL, 1000000.00, NULL, '2025-02-17 23:22:13', '2025-02-17 23:22:13', 'RE-180225030'),
(56, 2, '2025-02-17 23:22:31', NULL, 1000000.00, NULL, '2025-02-17 23:22:31', '2025-02-17 23:22:31', 'RE-180225031'),
(57, 2, '2025-02-17 23:22:45', NULL, 1000000.00, NULL, '2025-02-17 23:22:45', '2025-02-17 23:22:45', 'RE-180225032'),
(58, 2, '2025-02-17 23:23:40', NULL, 1000000.00, NULL, '2025-02-17 23:23:40', '2025-02-17 23:23:40', 'RE-180225033'),
(59, 2, '2025-02-17 23:23:56', NULL, 1000000.00, NULL, '2025-02-17 23:23:56', '2025-02-17 23:23:56', 'RE-180225034'),
(60, 2, '2025-02-17 23:24:30', NULL, 800000.00, NULL, '2025-02-17 23:24:30', '2025-02-17 23:24:30', 'RE-180225035'),
(61, 5, '2025-02-18 00:23:06', 'paid', 60000.00, 'bukti_transfer/1739863397_surat_persetujuan_1736902964.png', '2025-02-18 00:23:06', '2025-02-18 00:25:01', 'RE-180225036'),
(62, 6, '2025-02-18 00:48:22', NULL, 80000.00, NULL, '2025-02-18 00:48:22', '2025-02-18 00:48:22', 'RE-180225037'),
(63, 7, '2025-02-18 01:04:24', NULL, 80000.00, NULL, '2025-02-18 01:04:24', '2025-02-18 01:04:24', 'RE-180225038');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pemesanan` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `qty_produk` int DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id`, `id_pemesanan`, `id_produk`, `qty_produk`, `harga`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 20000.00, 60000.00, '2025-02-08 19:35:48', '2025-02-08 19:35:48'),
(2, 2, 1, 1, 20000.00, 60000.00, '2025-02-08 19:36:00', '2025-02-08 19:36:00'),
(3, 3, 1, 1, 20000.00, 480000.00, '2025-02-12 21:10:22', '2025-02-12 21:10:22'),
(4, 4, 1, 1, 20000.00, 68000.00, '2025-02-12 21:20:42', '2025-02-12 21:20:42'),
(5, 5, 1, 1, 20000.00, 8000.00, '2025-02-13 19:27:39', '2025-02-13 19:27:39'),
(6, 6, 1, 1, 20000.00, 48000.00, '2025-02-13 19:29:11', '2025-02-13 19:29:11'),
(7, 7, 1, 1, 20000.00, 28000.00, '2025-02-13 19:30:40', '2025-02-13 19:30:40'),
(8, 8, 1, 5, 20000.00, 100000.00, '2025-02-13 20:31:52', '2025-02-13 20:31:52'),
(9, 9, 1, 5, 20000.00, 100000.00, '2025-02-13 20:32:33', '2025-02-13 20:32:33'),
(10, 10, 2, 3, 20000.00, 100000.00, '2025-02-13 20:33:55', '2025-02-13 20:33:55'),
(11, 10, 1, 3, 20000.00, 100000.00, '2025-02-13 20:33:55', '2025-02-13 20:33:55'),
(12, 11, 1, 2, 20000.00, 60000.00, '2025-02-13 20:34:59', '2025-02-13 20:34:59'),
(13, 11, 2, 2, 20000.00, 60000.00, '2025-02-13 20:34:59', '2025-02-13 20:34:59'),
(14, 12, 1, 2, 20000.00, 100000.00, '2025-02-13 20:42:59', '2025-02-13 20:42:59'),
(15, 12, 2, 2, 20000.00, 100000.00, '2025-02-13 20:42:59', '2025-02-13 20:42:59'),
(16, 13, 1, 3, 20000.00, 10000.00, '2025-02-14 19:26:27', '2025-02-14 19:26:27'),
(17, 14, 1, 2, 20000.00, 10000.00, '2025-02-14 19:43:15', '2025-02-14 19:43:15'),
(18, 14, 2, 2, 20000.00, 10000.00, '2025-02-14 19:43:15', '2025-02-14 19:43:15'),
(19, 15, 2, 5, 20000.00, 10000.00, '2025-02-14 19:54:39', '2025-02-14 19:54:39'),
(20, 16, 2, 5, 20000.00, 180.00, '2025-02-14 20:29:11', '2025-02-14 20:29:11'),
(21, 16, 1, 5, 20000.00, 180.00, '2025-02-14 20:29:11', '2025-02-14 20:29:11'),
(22, 17, 2, 2, 20000.00, 80.00, '2025-02-14 20:40:50', '2025-02-14 20:40:50'),
(23, 17, 1, 2, 20000.00, 80.00, '2025-02-14 20:40:50', '2025-02-14 20:40:50'),
(24, 18, 2, 2, 20000.00, 40000.00, '2025-02-14 20:41:55', '2025-02-14 20:41:55'),
(25, 19, 1, 2, 20000.00, 40000.00, '2025-02-14 20:45:37', '2025-02-14 20:45:37'),
(26, 20, 1, 3, 20000.00, 60000.00, '2025-02-14 20:48:19', '2025-02-14 20:48:19'),
(27, 21, 1, 3, 20000.00, 60000.00, '2025-02-14 20:50:52', '2025-02-14 20:50:52'),
(28, 22, 1, 2, 20000.00, 40000.00, '2025-02-14 20:51:12', '2025-02-14 20:51:12'),
(29, 23, 1, 2, 20000.00, 40000.00, '2025-02-14 20:52:16', '2025-02-14 20:52:16'),
(30, 24, 1, 2, 20000.00, 40000.00, '2025-02-14 20:52:55', '2025-02-14 20:52:55'),
(31, 25, 1, 2, 20000.00, 40000.00, '2025-02-14 23:41:57', '2025-02-14 23:41:57'),
(32, 26, 1, 2, 20000.00, 40000.00, '2025-02-17 22:11:30', '2025-02-17 22:11:30'),
(33, 27, 1, 2, 20000.00, 40000.00, '2025-02-17 22:16:06', '2025-02-17 22:16:06'),
(34, 28, 1, 2, 20000.00, 40000.00, '2025-02-17 22:16:51', '2025-02-17 22:16:51'),
(35, 29, 1, 4, 20000.00, 80000.00, '2025-02-17 22:21:25', '2025-02-17 22:21:25'),
(36, 30, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:12:57', '2025-02-17 23:12:57'),
(37, 31, 1, 35, 20000.00, 100000.00, '2025-02-17 23:14:09', '2025-02-17 23:14:09'),
(38, 32, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:14:37', '2025-02-17 23:14:37'),
(39, 33, 1, 20, 20000.00, 40000.00, '2025-02-17 23:14:49', '2025-02-17 23:14:49'),
(40, 34, 1, 25, 20000.00, 500000.00, '2025-02-17 23:15:09', '2025-02-17 23:15:09'),
(41, 35, 1, 40, 20000.00, 800000.00, '2025-02-17 23:15:23', '2025-02-17 23:15:23'),
(42, 36, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:15:35', '2025-02-17 23:15:35'),
(43, 37, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:16:13', '2025-02-17 23:16:13'),
(44, 38, 1, 75, 20000.00, 1500000.00, '2025-02-17 23:17:48', '2025-02-17 23:17:48'),
(45, 39, 1, 35, 20000.00, 700000.00, '2025-02-17 23:18:02', '2025-02-17 23:18:02'),
(46, 40, 1, 30, 20000.00, 600000.00, '2025-02-17 23:18:12', '2025-02-17 23:18:12'),
(47, 41, 1, 20, 20000.00, 400000.00, '2025-02-17 23:18:23', '2025-02-17 23:18:23'),
(48, 42, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:18:34', '2025-02-17 23:18:34'),
(49, 43, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:18:46', '2025-02-17 23:18:46'),
(50, 44, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:18:57', '2025-02-17 23:18:57'),
(51, 45, 1, 40, 20000.00, 800000.00, '2025-02-17 23:19:07', '2025-02-17 23:19:07'),
(52, 46, 1, 40, 20000.00, 800000.00, '2025-02-17 23:19:18', '2025-02-17 23:19:18'),
(53, 47, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:19:40', '2025-02-17 23:19:40'),
(54, 48, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:19:58', '2025-02-17 23:19:58'),
(55, 49, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:20:19', '2025-02-17 23:20:19'),
(56, 50, 1, 35, 20000.00, 700000.00, '2025-02-17 23:20:35', '2025-02-17 23:20:35'),
(57, 51, 1, 30, 20000.00, 600000.00, '2025-02-17 23:20:51', '2025-02-17 23:20:51'),
(58, 52, 1, 25, 20000.00, 500000.00, '2025-02-17 23:21:07', '2025-02-17 23:21:07'),
(59, 53, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:21:23', '2025-02-17 23:21:23'),
(60, 54, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:21:39', '2025-02-17 23:21:39'),
(61, 55, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:22:13', '2025-02-17 23:22:13'),
(62, 56, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:22:31', '2025-02-17 23:22:31'),
(63, 57, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:22:45', '2025-02-17 23:22:45'),
(64, 58, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:23:40', '2025-02-17 23:23:40'),
(65, 59, 1, 50, 20000.00, 1000000.00, '2025-02-17 23:23:56', '2025-02-17 23:23:56'),
(66, 60, 1, 40, 20000.00, 800000.00, '2025-02-17 23:24:30', '2025-02-17 23:24:30'),
(67, 61, 1, 3, 20000.00, 60000.00, '2025-02-18 00:23:06', '2025-02-18 00:23:06'),
(68, 62, 1, 4, 20000.00, 80000.00, '2025-02-18 00:48:22', '2025-02-18 00:48:22'),
(69, 63, 1, 4, 20000.00, 80000.00, '2025-02-18 01:04:24', '2025-02-18 01:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` bigint UNSIGNED NOT NULL,
  `id_users` bigint UNSIGNED NOT NULL,
  `id_pemesanan` bigint UNSIGNED NOT NULL,
  `id_pemesanan_produk` bigint UNSIGNED NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirmasi_reseller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `id_users`, `id_pemesanan`, `id_pemesanan_produk`, `status_pengiriman`, `konfirmasi_reseller`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'BelumDibayar', NULL, '2025-02-08 19:35:48', '2025-02-08 19:35:48'),
(2, 2, 2, 2, 'BelumDibayar', NULL, '2025-02-08 19:36:00', '2025-02-08 19:36:00'),
(3, 2, 3, 3, 'BelumDibayar', NULL, '2025-02-12 21:10:22', '2025-02-12 21:10:22'),
(4, 2, 4, 4, 'BelumDibayar', NULL, '2025-02-12 21:20:42', '2025-02-12 21:20:42'),
(5, 2, 5, 5, 'BelumDibayar', NULL, '2025-02-13 19:27:39', '2025-02-13 19:27:39'),
(6, 2, 6, 6, 'BelumDibayar', NULL, '2025-02-13 19:29:11', '2025-02-13 19:29:11'),
(7, 2, 7, 7, 'BelumDibayar', NULL, '2025-02-13 19:30:40', '2025-02-13 19:30:40'),
(8, 2, 8, 8, 'BelumDibayar', NULL, '2025-02-13 20:31:52', '2025-02-13 20:31:52'),
(9, 2, 9, 9, 'BelumDibayar', NULL, '2025-02-13 20:32:33', '2025-02-13 20:32:33'),
(10, 2, 10, 10, 'BelumDibayar', NULL, '2025-02-13 20:33:55', '2025-02-13 20:33:55'),
(11, 2, 10, 11, 'BelumDibayar', NULL, '2025-02-13 20:33:55', '2025-02-13 20:33:55'),
(12, 2, 11, 12, 'BelumDibayar', NULL, '2025-02-13 20:34:59', '2025-02-13 20:34:59'),
(13, 2, 11, 13, 'BelumDibayar', NULL, '2025-02-13 20:34:59', '2025-02-13 20:34:59'),
(14, 2, 12, 14, 'BelumDibayar', NULL, '2025-02-13 20:42:59', '2025-02-13 20:42:59'),
(15, 2, 12, 15, 'BelumDibayar', NULL, '2025-02-13 20:42:59', '2025-02-13 20:42:59'),
(16, 2, 13, 16, 'BelumDibayar', NULL, '2025-02-14 19:26:27', '2025-02-14 19:26:27'),
(17, 2, 14, 17, 'BelumDibayar', NULL, '2025-02-14 19:43:15', '2025-02-14 19:43:15'),
(18, 2, 14, 18, 'BelumDibayar', NULL, '2025-02-14 19:43:15', '2025-02-14 19:43:15'),
(19, 2, 15, 19, 'BelumDibayar', NULL, '2025-02-14 19:54:39', '2025-02-14 19:54:39'),
(20, 2, 16, 20, 'BelumDibayar', NULL, '2025-02-14 20:29:11', '2025-02-14 20:29:11'),
(21, 2, 16, 21, 'BelumDibayar', NULL, '2025-02-14 20:29:11', '2025-02-14 20:29:11'),
(22, 2, 17, 22, 'BelumDibayar', NULL, '2025-02-14 20:40:50', '2025-02-14 20:40:50'),
(23, 2, 17, 23, 'BelumDibayar', NULL, '2025-02-14 20:40:50', '2025-02-14 20:40:50'),
(24, 2, 18, 24, 'BelumDibayar', NULL, '2025-02-14 20:41:55', '2025-02-14 20:41:55'),
(25, 2, 19, 25, 'BelumDibayar', NULL, '2025-02-14 20:45:37', '2025-02-14 20:45:37'),
(26, 2, 20, 26, 'BelumDibayar', NULL, '2025-02-14 20:48:19', '2025-02-14 20:48:19'),
(27, 2, 21, 27, 'BelumDibayar', NULL, '2025-02-14 20:50:52', '2025-02-14 20:50:52'),
(28, 2, 22, 28, 'BelumDibayar', NULL, '2025-02-14 20:51:12', '2025-02-14 20:51:12'),
(29, 2, 23, 29, 'BelumDibayar', NULL, '2025-02-14 20:52:16', '2025-02-14 20:52:16'),
(30, 2, 24, 30, 'BelumDibayar', NULL, '2025-02-14 20:52:55', '2025-02-14 20:52:55'),
(31, 2, 25, 31, 'BelumDibayar', NULL, '2025-02-14 23:41:57', '2025-02-14 23:41:57'),
(32, 2, 26, 32, 'BelumDibayar', NULL, '2025-02-17 22:11:30', '2025-02-17 22:11:30'),
(33, 2, 27, 33, 'BelumDibayar', NULL, '2025-02-17 22:16:06', '2025-02-17 22:16:06'),
(34, 2, 28, 34, 'BelumDibayar', NULL, '2025-02-17 22:16:51', '2025-02-17 22:16:51'),
(35, 2, 29, 35, 'BelumDibayar', NULL, '2025-02-17 22:21:25', '2025-02-17 22:21:25'),
(36, 2, 30, 36, 'BelumDibayar', NULL, '2025-02-17 23:12:57', '2025-02-17 23:12:57'),
(37, 2, 31, 37, 'BelumDibayar', NULL, '2025-02-17 23:14:09', '2025-02-17 23:14:09'),
(38, 2, 32, 38, 'BelumDibayar', NULL, '2025-02-17 23:14:37', '2025-02-17 23:14:37'),
(39, 2, 33, 39, 'BelumDibayar', NULL, '2025-02-17 23:14:49', '2025-02-17 23:14:49'),
(40, 2, 34, 40, 'BelumDibayar', NULL, '2025-02-17 23:15:09', '2025-02-17 23:15:09'),
(41, 2, 35, 41, 'BelumDibayar', NULL, '2025-02-17 23:15:23', '2025-02-17 23:15:23'),
(42, 2, 36, 42, 'BelumDibayar', NULL, '2025-02-17 23:15:35', '2025-02-17 23:15:35'),
(43, 2, 37, 43, 'BelumDibayar', NULL, '2025-02-17 23:16:13', '2025-02-17 23:16:13'),
(44, 2, 38, 44, 'BelumDibayar', NULL, '2025-02-17 23:17:48', '2025-02-17 23:17:48'),
(45, 2, 39, 45, 'BelumDibayar', NULL, '2025-02-17 23:18:02', '2025-02-17 23:18:02'),
(46, 2, 40, 46, 'BelumDibayar', NULL, '2025-02-17 23:18:12', '2025-02-17 23:18:12'),
(47, 2, 41, 47, 'BelumDibayar', NULL, '2025-02-17 23:18:23', '2025-02-17 23:18:23'),
(48, 2, 42, 48, 'BelumDibayar', NULL, '2025-02-17 23:18:34', '2025-02-17 23:18:34'),
(49, 2, 43, 49, 'BelumDibayar', NULL, '2025-02-17 23:18:46', '2025-02-17 23:18:46'),
(50, 2, 44, 50, 'BelumDibayar', NULL, '2025-02-17 23:18:57', '2025-02-17 23:18:57'),
(51, 2, 45, 51, 'BelumDibayar', NULL, '2025-02-17 23:19:07', '2025-02-17 23:19:07'),
(52, 2, 46, 52, 'BelumDibayar', NULL, '2025-02-17 23:19:18', '2025-02-17 23:19:18'),
(53, 2, 47, 53, 'BelumDibayar', NULL, '2025-02-17 23:19:40', '2025-02-17 23:19:40'),
(54, 2, 48, 54, 'BelumDibayar', NULL, '2025-02-17 23:19:58', '2025-02-17 23:19:58'),
(55, 2, 49, 55, 'BelumDibayar', NULL, '2025-02-17 23:20:19', '2025-02-17 23:20:19'),
(56, 2, 50, 56, 'BelumDibayar', NULL, '2025-02-17 23:20:35', '2025-02-17 23:20:35'),
(57, 2, 51, 57, 'BelumDibayar', NULL, '2025-02-17 23:20:51', '2025-02-17 23:20:51'),
(58, 2, 52, 58, 'BelumDibayar', NULL, '2025-02-17 23:21:07', '2025-02-17 23:21:07'),
(59, 2, 53, 59, 'BelumDibayar', NULL, '2025-02-17 23:21:23', '2025-02-17 23:21:23'),
(60, 2, 54, 60, 'BelumDibayar', NULL, '2025-02-17 23:21:39', '2025-02-17 23:21:39'),
(61, 2, 55, 61, 'BelumDibayar', NULL, '2025-02-17 23:22:13', '2025-02-17 23:22:13'),
(62, 2, 56, 62, 'BelumDibayar', NULL, '2025-02-17 23:22:31', '2025-02-17 23:22:31'),
(63, 2, 57, 63, 'BelumDibayar', NULL, '2025-02-17 23:22:45', '2025-02-17 23:22:45'),
(64, 2, 58, 64, 'BelumDibayar', NULL, '2025-02-17 23:23:40', '2025-02-17 23:23:40'),
(65, 2, 59, 65, 'Selesai', 'Barang Diterima', '2025-02-17 23:23:56', '2025-02-17 23:59:33'),
(66, 5, 60, 66, 'Selesai', 'Barang Diterima', '2025-02-17 23:24:30', '2025-02-18 00:29:49'),
(68, 6, 62, 68, 'Selesai', 'Barang Diterima', '2025-02-18 00:48:22', '2025-02-18 00:51:20'),
(69, 7, 63, 69, 'Selesai', 'Barang Diterima', '2025-02-18 01:04:24', '2025-02-18 01:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED DEFAULT NULL,
  `id_pemesanan` bigint UNSIGNED NOT NULL,
  `id_pemesanan_produk` bigint UNSIGNED NOT NULL,
  `kualitas_produk` int DEFAULT NULL,
  `harga_produk` int DEFAULT NULL,
  `layanan_pelanggan` int DEFAULT NULL,
  `ulasan_pelanggan` int DEFAULT NULL,
  `fleksibilitas_pembayaran` int DEFAULT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_user`, `id_pemesanan`, `id_pemesanan_produk`, `kualitas_produk`, `harga_produk`, `layanan_pelanggan`, `ulasan_pelanggan`, `fleksibilitas_pembayaran`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 2, 59, 65, 8, 6, 7, 7, 2, 'Bagus Kawan', '2025-02-18 00:00:29', '2025-02-18 00:00:29'),
(2, 5, 60, 66, 6, 8, 6, 7, 3, 'Sangat memuaskan belanja disini', '2025-02-18 00:31:15', '2025-02-18 00:31:15'),
(3, 6, 62, 68, 8, 4, 6, 8, 3, 'Ga ada', '2025-02-18 00:51:50', '2025-02-18 00:51:50'),
(4, 7, 63, 69, 9, 7, 8, 6, 1, 'K', '2025-02-18 01:05:46', '2025-02-18 01:05:46'),
(5, 7, 63, 69, 9, 7, 8, 6, 1, 'K', '2025-02-18 01:05:46', '2025-02-18 01:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `harga` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `id_kategori`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(1, 'yumee', 1, 20000, 'storage/images/1739068252.png', '2025-02-08 19:30:52', '2025-02-08 19:30:52'),
(2, 'yumee2', 1, 20000, '', '2025-02-13 20:33:04', '2025-02-13 20:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `rop`
--

CREATE TABLE `rop` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED DEFAULT NULL,
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `stok_keluar` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rop`
--

INSERT INTO `rop` (`id`, `id_produk`, `id_stok`, `stok_keluar`, `created_at`, `updated_at`) VALUES
(6, 1, 2, 50, '2025-02-17 23:12:57', '2025-02-17 23:12:57'),
(7, 1, 2, 35, '2025-02-17 23:14:09', '2025-02-17 23:14:09'),
(8, 1, 2, 50, '2025-02-17 23:14:37', '2025-02-17 23:14:37'),
(9, 1, 2, 20, '2025-02-17 23:14:49', '2025-02-17 23:14:49'),
(10, 1, 2, 25, '2025-02-17 23:15:09', '2025-02-17 23:15:09'),
(11, 1, 2, 40, '2025-02-17 23:15:23', '2025-02-17 23:15:23'),
(12, 1, 2, 50, '2025-02-17 23:15:35', '2025-02-17 23:15:35'),
(13, 1, 2, 50, '2025-02-17 23:16:13', '2025-02-17 23:16:13'),
(14, 1, 2, 75, '2025-02-17 23:17:48', '2025-02-17 23:17:48'),
(15, 1, 2, 35, '2025-02-17 23:18:02', '2025-02-17 23:18:02'),
(16, 1, 2, 30, '2025-02-17 23:18:12', '2025-02-17 23:18:12'),
(17, 1, 2, 20, '2025-02-17 23:18:23', '2025-02-17 23:18:23'),
(18, 1, 2, 50, '2025-02-17 23:18:34', '2025-02-17 23:18:34'),
(19, 1, 2, 50, '2025-02-17 23:18:46', '2025-02-17 23:18:46'),
(20, 1, 2, 50, '2025-02-17 23:18:57', '2025-02-17 23:18:57'),
(21, 1, 2, 40, '2025-02-17 23:19:07', '2025-02-17 23:19:07'),
(22, 1, 2, 40, '2025-02-17 23:19:18', '2025-02-17 23:19:18'),
(23, 1, 2, 50, '2025-02-17 23:19:40', '2025-02-17 23:19:40'),
(24, 1, 2, 50, '2025-02-17 23:19:58', '2025-02-17 23:19:58'),
(25, 1, 2, 50, '2025-02-17 23:20:19', '2025-02-17 23:20:19'),
(26, 1, 2, 35, '2025-02-17 23:20:35', '2025-02-17 23:20:35'),
(27, 1, 2, 30, '2025-02-17 23:20:51', '2025-02-17 23:20:51'),
(28, 1, 2, 25, '2025-02-17 23:21:07', '2025-02-17 23:21:07'),
(29, 1, 2, 50, '2025-02-17 23:21:23', '2025-02-17 23:21:23'),
(30, 1, 2, 50, '2025-02-17 23:21:39', '2025-02-17 23:21:39'),
(31, 1, 2, 50, '2025-02-17 23:22:13', '2025-02-17 23:22:13'),
(32, 1, 2, 50, '2025-02-17 23:22:31', '2025-02-17 23:22:31'),
(33, 1, 2, 50, '2025-02-17 23:22:45', '2025-02-17 23:22:45'),
(34, 1, 2, 50, '2025-02-17 23:23:40', '2025-02-17 23:23:40'),
(35, 1, 2, 50, '2025-02-17 23:23:56', '2025-02-17 23:23:56'),
(36, 1, 2, 40, '2025-02-17 23:24:30', '2025-02-17 23:24:30'),
(37, 1, 2, 3, '2025-02-18 00:23:06', '2025-02-18 00:23:06'),
(38, 1, 2, 4, '2025-02-18 00:48:22', '2025-02-18 00:48:22'),
(39, 1, 2, 4, '2025-02-18 01:04:24', '2025-02-18 01:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_motif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `jumlah_keluar` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_produk`, `id_kategori`, `ukuran`, `warna`, `model_motif`, `jumlah`, `jumlah_keluar`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'XL', 'Biru', 'Batik', 889, NULL, '2025-02-08 20:11:32', '2025-02-18 01:04:24'),
(2, 1, NULL, 'XXL', 'Biru', 'Batik', 649, 2, '2025-02-13 19:16:51', '2025-02-18 01:04:24'),
(3, 2, NULL, 'XXL', 'Biru', 'Batik', 35, NULL, '2025-02-13 20:33:36', '2025-02-13 20:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$10$uh2HFdaDZcloToQmMa0d8evefO2kIcdiRI1N4tcD4TxUHi4cRwYRy', 'admin', NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(2, 'Reseller User', 'reseller@example.com', NULL, '$2y$10$NzrkBYQLA0dHVmrUC.7/Gu6vlhMSQQkhB2hgPiA1lJhQxNSJ4.Y6m', 'reseller', NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(3, 'Kurir User', 'kurir@example.com', NULL, '$2y$10$8wxXNfgZ48oD8/FgXrOT7eo7DluogAV4ZqteXOcWui2vXYmLDoCom', 'kurir', NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(4, 'Owner User', 'owner@example.com', NULL, '$2y$10$qHcoX7yiVY0ktpie6A9Q8.6FiVo7S.QpniRxjDM3nsb1vr82HTCp6', 'owner', NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(5, 'reseller2', 'reseller2@example.com', NULL, '$2y$10$zshbsyu8227cYpD39/V8Y.3raKZRoZASJcwJcPdiAQ3WoIA.k6NRi', 'reseller', NULL, '2025-02-18 00:21:18', '2025-02-18 00:21:18'),
(6, 'reseller3', 'reseller3@example.com', NULL, '$2y$10$dOk1PIGt1L.8E9zT1mRLd.RtqOBnQ1GJgKz49eU6t7GCYOla7GH6u', 'reseller', NULL, '2025-02-18 00:21:50', '2025-02-18 00:21:50'),
(7, 'reseller4', 'reseller4@example.com', NULL, '$2y$10$nku75s0zMrcVAYja6DnRWOmndfq0iVCf9qPBEcGmfAnge0IZuNAou', 'reseller', NULL, '2025-02-18 01:03:38', '2025-02-18 01:03:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diskon_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemesanan_order_id_unique` (`order_id`),
  ADD KEY `pemesanan_id_user_foreign` (`id_user`);

--
-- Indexes for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_produk_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `pemesanan_produk_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_id_users_foreign` (`id_users`),
  ADD KEY `pengiriman_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `pengiriman_id_pemesanan_produk_foreign` (`id_pemesanan_produk`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `penilaian_id_pemesanan_produk_foreign` (`id_pemesanan_produk`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rop`
--
ALTER TABLE `rop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_id_produk_foreign` (`id_produk`),
  ADD KEY `stok_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribut`
--
ALTER TABLE `atribut`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rop`
--
ALTER TABLE `rop`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD CONSTRAINT `pemesanan_produk_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_pemesanan_produk_foreign` FOREIGN KEY (`id_pemesanan_produk`) REFERENCES `pemesanan_produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_id_pemesanan_produk_foreign` FOREIGN KEY (`id_pemesanan_produk`) REFERENCES `pemesanan_produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stok_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

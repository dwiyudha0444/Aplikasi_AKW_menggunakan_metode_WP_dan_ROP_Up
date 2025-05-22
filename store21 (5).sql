-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2025 at 06:45 AM
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
  `id_atribut` bigint UNSIGNED NOT NULL,
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

INSERT INTO `atribut` (`id_atribut`, `kualitas_produk`, `harga_produk`, `layanan_pelanggan`, `ulasan_pelanggan`, `fleksibilitas_pembayaran`, `created_at`, `updated_at`) VALUES
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
  `id_diskon` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED DEFAULT NULL,
  `potongan_diskon` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `potongan_diskon`, `created_at`, `updated_at`) VALUES
(1, NULL, 10, '2025-02-09 19:47:57', '2025-02-09 19:47:57');

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
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `created_at`, `updated_at`) VALUES
(4, 'Setelan Anak by Almahyra', '2025-03-11 22:46:54', '2025-03-11 22:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED DEFAULT NULL,
  `id_ukuran` bigint UNSIGNED DEFAULT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `model_motif` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_ukuran`, `stok`, `harga`, `warna`, `model_motif`, `created_at`, `updated_at`) VALUES
(2, 5, NULL, 1, 0, NULL, NULL, '2025-03-11 23:32:06', '2025-03-11 23:32:06');

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
  `id_pemesanan` bigint UNSIGNED NOT NULL,
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

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `tanggal_pemesanan`, `status_pemesanan`, `total_harga`, `image_bukti_tf`, `created_at`, `updated_at`, `order_id`) VALUES
(1, 2, '2025-03-11 21:16:57', 'paid', 54000.00, NULL, '2025-03-11 21:16:57', '2025-03-11 21:41:17', 'RE-120325001'),
(2, 2, '2025-03-11 21:42:16', 'paid', 36000.00, 'bukti_transfer/1741754543_logomu.png', '2025-03-11 21:42:16', '2025-03-11 22:26:44', 'RE-120325002');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` bigint UNSIGNED NOT NULL,
  `id_pemesanan` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `qty_produk` int DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` bigint UNSIGNED NOT NULL,
  `id_users` bigint UNSIGNED NOT NULL,
  `id_pemesanan` bigint UNSIGNED NOT NULL,
  `id_pemesanan_produk` bigint UNSIGNED NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirmasi_reseller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED DEFAULT NULL,
  `id_pemesanan` bigint UNSIGNED NOT NULL,
  `id_pemesanan_produk` bigint UNSIGNED NOT NULL,
  `id_atribut` bigint UNSIGNED DEFAULT NULL,
  `kualitas_produk` int DEFAULT NULL,
  `harga_produk` int DEFAULT NULL,
  `layanan_pelanggan` int DEFAULT NULL,
  `ulasan_pelanggan` int DEFAULT NULL,
  `fleksibilitas_pembayaran` int DEFAULT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_produk` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `id_kategori`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Kazumi Set', 4, NULL, 'storage/images/1741758542.jpg', '2025-03-11 22:47:43', '2025-03-11 22:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `rop`
--

CREATE TABLE `rop` (
  `id_rop` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED DEFAULT NULL,
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `stok_keluar` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rop`
--

INSERT INTO `rop` (`id_rop`, `id_produk`, `id_stok`, `stok_keluar`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 3, '2025-03-11 21:16:57', '2025-03-11 21:16:57'),
(2, NULL, 1, 1, '2025-03-11 21:42:16', '2025-03-11 21:42:16'),
(3, NULL, 2, 1, '2025-03-11 21:42:16', '2025-03-11 21:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_motif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `jumlah_keluar` int DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_produk`, `id_kategori`, `ukuran`, `warna`, `model_motif`, `jumlah`, `jumlah_keluar`, `harga`, `created_at`, `updated_at`) VALUES
(12, 5, NULL, 'XS', 'Denim', 'Kotak-Kotak', 10, NULL, 120000, '2025-03-11 23:13:20', '2025-03-11 23:13:20'),
(13, 5, NULL, 'XS', 'Khaky', 'Kotak-Kotak', 10, NULL, 120000, '2025-03-11 23:15:01', '2025-03-11 23:15:01'),
(14, 5, NULL, 'XS', 'Matcha', 'Kotak-Kotak', 10, NULL, 120000, '2025-03-11 23:15:23', '2025-03-11 23:15:23'),
(15, 5, NULL, 'XS', 'Salem', 'Kotak-Kotak', 10, NULL, 120000, '2025-03-11 23:16:06', '2025-03-11 23:16:06'),
(20, 5, NULL, 'S', 'Salem', 'Kotak-Kotak', 10, NULL, 120000, NULL, NULL),
(21, 5, NULL, 'S', 'Matcha', 'Kotak-Kotak', 10, NULL, 120000, NULL, NULL),
(22, 5, NULL, 'S', 'Khaky', 'Kotak-Kotak', 10, NULL, 120000, NULL, NULL),
(23, 5, NULL, 'S', 'Denim', 'Kotak-Kotak', 10, NULL, 120000, NULL, NULL),
(24, 5, NULL, 'M', 'Salem', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(25, 5, NULL, 'M', 'Matcha', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(26, 5, NULL, 'M', 'Khaky', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(27, 5, NULL, 'M', 'Denim', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(28, 5, NULL, 'L', 'Salem', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(29, 5, NULL, 'L', 'Matcha', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(30, 5, NULL, 'L', 'Khaky', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(31, 5, NULL, 'L', 'Denim', 'Kotak-Kotak', 15, NULL, 135000, NULL, NULL),
(32, 5, NULL, 'XL', 'Salem', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(33, 5, NULL, 'XL', 'Matcha', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(34, 5, NULL, 'XL', 'Khaky', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(35, 5, NULL, 'XL', 'Denim', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(36, 5, NULL, 'XXL', 'Salem', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(37, 5, NULL, 'XXL', 'Matcha', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(38, 5, NULL, 'XXL', 'Khaky', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL),
(39, 5, NULL, 'XXL', 'Denim', 'Kotak-Kotak', 15, NULL, 150000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` bigint UNSIGNED NOT NULL,
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `ukuran` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `id_stok`, `ukuran`, `created_at`, `updated_at`) VALUES
(4, NULL, 'XS', '2025-03-11 22:50:03', '2025-03-11 22:50:03'),
(5, NULL, 'S', '2025-03-11 22:50:22', '2025-03-11 22:50:22'),
(6, NULL, 'M', '2025-03-11 22:50:30', '2025-03-11 22:50:30'),
(7, NULL, 'L', '2025-03-11 22:50:38', '2025-03-11 22:50:38'),
(8, NULL, 'XL', '2025-03-11 22:50:50', '2025-03-11 22:50:50'),
(9, NULL, 'XXL', '2025-03-11 22:51:13', '2025-03-11 22:51:13');

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
  `nomer_hp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `nomer_hp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$10$uh2HFdaDZcloToQmMa0d8evefO2kIcdiRI1N4tcD4TxUHi4cRwYRy', 'admin', NULL, NULL, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(2, 'Reseller User', 'reseller@example.com', NULL, '$2y$10$NzrkBYQLA0dHVmrUC.7/Gu6vlhMSQQkhB2hgPiA1lJhQxNSJ4.Y6m', 'reseller', '085715180258', NULL, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(3, 'Kurir User', 'kurir@example.com', NULL, '$2y$10$8wxXNfgZ48oD8/FgXrOT7eo7DluogAV4ZqteXOcWui2vXYmLDoCom', 'kurir', NULL, NULL, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(4, 'Owner User', 'owner@example.com', NULL, '$2y$10$qHcoX7yiVY0ktpie6A9Q8.6FiVo7S.QpniRxjDM3nsb1vr82HTCp6', 'owner', NULL, NULL, NULL, '2025-02-08 19:14:18', '2025-02-08 19:14:18'),
(5, 'reseller2', 'reseller2@example.com', NULL, '$2y$10$zshbsyu8227cYpD39/V8Y.3raKZRoZASJcwJcPdiAQ3WoIA.k6NRi', 'reseller', NULL, NULL, NULL, '2025-02-18 00:21:18', '2025-02-18 00:21:18'),
(6, 'reseller3', 'reseller3@example.com', NULL, '$2y$10$dOk1PIGt1L.8E9zT1mRLd.RtqOBnQ1GJgKz49eU6t7GCYOla7GH6u', 'reseller', NULL, NULL, NULL, '2025-02-18 00:21:50', '2025-02-18 00:21:50'),
(7, 'reseller4', 'reseller4@example.com', NULL, '$2y$10$nku75s0zMrcVAYja6DnRWOmndfq0iVCf9qPBEcGmfAnge0IZuNAou', 'reseller', NULL, NULL, NULL, '2025-02-18 01:03:38', '2025-02-18 01:03:38'),
(8, 'awwaliya', 'awwaliya@gmail.com', NULL, '$2y$10$NzrkBYQLA0dHVmrUC.7/Gu6vlhMSQQkhB2hgPiA1lJhQxNSJ4.Y6m', 'reseller', NULL, NULL, NULL, '2025-03-11 22:32:59', '2025-03-11 22:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`),
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
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_ukuran` (`id_ukuran`);

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
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD UNIQUE KEY `pemesanan_order_id_unique` (`order_id`),
  ADD KEY `pemesanan_id_user_foreign` (`id_user`);

--
-- Indexes for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`),
  ADD KEY `pemesanan_produk_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `pemesanan_produk_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `pengiriman_id_users_foreign` (`id_users`),
  ADD KEY `pengiriman_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `pengiriman_id_pemesanan_produk_foreign` (`id_pemesanan_produk`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `penilaian_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `penilaian_id_pemesanan_produk_foreign` (`id_pemesanan_produk`),
  ADD KEY `id_atribut` (`id_atribut`),
  ADD KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rop`
--
ALTER TABLE `rop`
  ADD PRIMARY KEY (`id_rop`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `stok_id_produk_foreign` (`id_produk`),
  ADD KEY `stok_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`),
  ADD KEY `id_stok` (`id_stok`);

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
  MODIFY `id_atribut` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rop`
--
ALTER TABLE `rop`
  MODIFY `id_rop` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD CONSTRAINT `pemesanan_produk_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_pemesanan_produk_foreign` FOREIGN KEY (`id_pemesanan_produk`) REFERENCES `pemesanan_produk` (`id_pemesanan_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_atribut`) REFERENCES `atribut` (`id_atribut`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `penilaian_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_id_pemesanan_produk_foreign` FOREIGN KEY (`id_pemesanan_produk`) REFERENCES `pemesanan_produk` (`id_pemesanan_produk`) ON DELETE CASCADE;

--
-- Constraints for table `rop`
--
ALTER TABLE `rop`
  ADD CONSTRAINT `rop_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `stok_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD CONSTRAINT `ukuran_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `stok` (`id_stok`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

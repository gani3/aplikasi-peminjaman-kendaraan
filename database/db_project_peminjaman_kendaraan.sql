-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2025 at 11:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_peminjaman_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1742832916),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1742832916;', 1742832916);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id`, `jenis_kendaraan`, `created_at`, `updated_at`) VALUES
(1, 'Mobil', '2025-03-23 15:02:57', '2025-03-23 15:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kendaraan_id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(255) NOT NULL,
  `nopol` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `img_kendaraan` varchar(255) DEFAULT NULL,
  `status_kendaraan` enum('0','1') NOT NULL COMMENT '0 = dipinjam, 1 = standby',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `jenis_kendaraan_id`, `merk`, `nopol`, `warna`, `img_kendaraan`, `status_kendaraan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Toyota', 'B 111 AN', 'Hitam', 'HeNsHl5P2ElrlPkqoc83oqu5SGHYYmg5JZsuDure copy 2.png', '1', '2025-03-23 15:03:20', '2025-03-24 08:36:14'),
(2, 1, 'Avanza', 'B 121 AN', 'Kuning', 'HeNsHl5P2ElrlPkqoc83oqu5SGHYYmg5JZsuDure copy 3.png', '1', '2025-03-23 15:03:20', '2025-03-24 15:20:08'),
(3, 1, 'Suzuki', 'B 151 AN', 'Biru', 'HeNsHl5P2ElrlPkqoc83oqu5SGHYYmg5JZsuDure copy 4.png', '0', '2025-03-23 15:03:20', '2025-03-23 15:06:03'),
(4, 1, 'Ayla', 'B 161 AN', 'Putih', 'KyEYQeLQS1BA9z3wm57UI3AwcApnR5cCgspgRhXM.png', '1', '2025-03-23 15:03:20', '2025-03-23 15:03:20'),
(5, 1, 'testing', 'B 110 AN', 'Biru', 'HeNsHl5P2ElrlPkqoc83oqu5SGHYYmg5JZsuDure.png', '1', '2025-03-24 08:56:09', '2025-03-24 09:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_peminjaman_table', 1),
(5, '0001_01_01_000004_create_kendaraan_table', 1),
(6, '0001_01_01_000005_create_pengembalian_table', 1),
(7, '0001_01_01_000006_create_jenis_kendaraan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kendaraan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `waktu_peminjaman` time NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `status_peminjaman` enum('0','1','2','3') NOT NULL COMMENT '0 = menunggu, 1 = di setujui, 2 = ditolak, 3 = selesai',
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `user_id`, `kendaraan_id`, `tgl_keberangkatan`, `waktu_peminjaman`, `tgl_pengembalian`, `tujuan`, `status_peminjaman`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-03-24', '08:05:00', '2025-03-13', 'Jakarta', '3', 'tes keterangan', '2025-03-23 15:05:32', '2025-03-24 08:36:14'),
(2, 2, 3, '2025-03-13', '08:05:00', '2025-03-25', 'tujuan saja', '1', 'tes lagi', '2025-03-23 15:06:03', '2025-03-23 15:06:03'),
(3, 2, 2, '2025-03-24', '00:53:00', '2025-03-24', 'pekanbaru', '3', 'keterangan kendaraan', '2025-03-24 08:53:32', '2025-03-24 08:54:20'),
(4, 3, 2, '2025-03-12', '07:18:00', '2025-03-26', 'Jakarta', '3', 'telah di setujui', '2025-03-24 15:19:06', '2025-03-24 15:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kendaraan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `waktu_pengembalian` time NOT NULL,
  `status_pengembalian` enum('0','1') NOT NULL COMMENT '0 = belum dikembalikan, 1 = dikembalikan',
  `ontime` enum('0','1') NOT NULL COMMENT '0 = tepat waktu, 1 = terlambat',
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `peminjaman_id`, `user_id`, `kendaraan_id`, `tgl_pengembalian`, `waktu_pengembalian`, `status_pengembalian`, `ontime`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2025-03-24', '22:36:00', '1', '0', 'sudah kembali', '2025-03-24 08:33:29', '2025-03-24 08:36:14'),
(3, 3, 2, 2, '2025-03-24', '01:54:00', '1', '1', 'terlambat dikarenakan macet', '2025-03-24 08:54:20', '2025-03-24 08:54:20'),
(4, 4, 3, 2, '2025-03-25', '05:21:00', '1', '0', 'tepat waktu', '2025-03-24 15:20:08', '2025-03-24 15:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('i1A2W2MFn0r35kCYReaFPedgW5FeXkMAbu7tnIVD', 3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXBORUNmR0RleXplU0FjUWtId010MDNLRVZDT1M4OTZPMUd2OXdTSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1742855121);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `role` enum('0','1') NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `alamat`, `role`, `nohp`, `nik`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fulan bin Fulan', 'fulan', 'ini alamat', '1', '082111979607', '123456', 'fulan@admin.com', NULL, '$2y$12$N0Y3OxQyvbktDnBsLxqzLOOR8Dmm6g8Cp4ObpL7Ez6xWmwfk2q1b.', NULL, '2025-03-23 15:01:02', '2025-03-23 15:01:02'),
(2, 'Fulanah binti fulanah', 'fulanah', 'ini alamat tes', '0', '082131231412', '33123124', 'fulanah@karyawan.com', NULL, '$2y$12$w0ZdN2b2FUjll0qkcy9dE.xW9rus7mfzF6BSrcBWiquMw2RPdAuBq', NULL, '2025-03-23 15:02:43', '2025-03-23 15:02:43'),
(3, 'Suratno', 'suratno', 'testing alamat', '0', '082131231410', '12351261', 'suratno@gmail.com', NULL, '$2y$12$Ttqt/9xmW3toiPNUuac4V.jbCPcH9ZGyBRsnSTVF2YjFAEbqrKT9S', NULL, '2025-03-24 15:18:29', '2025-03-24 15:18:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
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
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nohp_unique` (`nohp`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

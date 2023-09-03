-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2023 at 04:09 PM
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
-- Database: `db_spkwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint UNSIGNED NOT NULL,
  `alternatif` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `alternatif`, `c1`, `c2`, `c3`, `c4`, `c5`, `created_at`, `updated_at`) VALUES
(1, '1871044933000005', '3', '1', '1', '1', '1', NULL, '2023-07-08 00:05:05'),
(2, '3414075303910011', '3', '3', '3', '4', '2', NULL, NULL),
(3, '3404075303910008', '3', '2', '2', '2', '3', '2023-08-04 04:57:10', '2023-08-04 04:57:10'),
(5, '2233837181910301', '4', '3', '4', '2', '3', '2023-08-13 10:09:10', '2023-08-13 10:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` bigint UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kepentingan`
--

CREATE TABLE `kepentingan` (
  `id` int UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepentingan`
--

INSERT INTO `kepentingan` (`id`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 5, '5 - Sangat Layak (SL)', NULL, NULL),
(2, 4, '4 - Layak (L)', NULL, NULL),
(3, 3, '3 - Cukup Layak (CL)', NULL, NULL),
(4, 2, '2 - Kurang Layak (KL)', NULL, NULL),
(5, 1, '1 - Tidak Layak (TL)', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_05_042716_create_table_criterias_table', 2),
(6, '2023_07_05_144721_create_kepentingan_table', 3),
(7, '2023_07_05_213549_create_bobot_table', 4),
(8, '2023_07_06_214759_create_alternatives_table', 4),
(9, '2023_07_27_171136_add_details_to_users_table', 5),
(10, '2023_07_27_175416_create_warga_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `table_criterias`
--

CREATE TABLE `table_criterias` (
  `id` int NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepentingan` int UNSIGNED NOT NULL,
  `cost_benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_criterias`
--

INSERT INTO `table_criterias` (`id`, `kriteria`, `kepentingan`, `cost_benefit`, `created_at`, `updated_at`) VALUES
(1, 'C1 Kondisi Rumah', 1, 'Benefit', NULL, NULL),
(2, 'C2 Pekerjaan', 2, 'Benefit', NULL, NULL),
(3, 'C3 Penghasilan', 1, 'Benefit', NULL, '2023-08-01 11:22:50'),
(4, 'C4 Usia', 4, 'Benefit', NULL, NULL),
(5, 'C5 Jumlah Tanggungan', 2, 'Cost', NULL, '2023-07-15 13:31:54');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0' COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Kec', 'kecamatan@example.com', NULL, '$2y$10$jJWpNpprKStGP5nv9QjGXuDnpY/YLREferfR3TyGAOTZf6mCsfYHy', NULL, '2023-06-28 02:47:58', '2023-08-14 09:05:59', 1),
(2, 'User', 'user@mail.com', NULL, '$2y$10$gU8XU2.HtwxjQeM/Fw6u5OtOgAfYaKMrwaTDUR2Uq0Fd6MvKW4jji', '7MuHlJFXpdR9ZLhZA2hXuNgnzeJJFSg21Or7bKo5xSqxyA6TLxY8d9nIW88B', '2023-06-29 06:29:06', '2023-06-29 06:29:06', 1),
(3, 'perangkat', 'perangkat@example.com', NULL, '$2y$10$VyMmGjIE60Ip5zrx5mNBfOzbLR8BBhjHE1NxishB3XeP3T.hWcyTG', NULL, '2023-08-04 20:20:20', '2023-08-04 20:20:20', 0),
(4, 'Desa', 'desa@example.com', NULL, '$2y$10$jkvao/9xAb..17vdmeVACeCakax86/kXEIkyAzG5lG0WNYZr9h1na', NULL, '2023-08-06 06:48:16', '2023-08-14 09:06:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `tempat_tinggal`, `alamat_lengkap`, `umur`, `pekerjaan`, `penghasilan`, `status`, `tanggungan`, `created_at`, `updated_at`) VALUES
(1, '1871044933000005', 'Inggar', 'Situbondo', 'Wringinanom timur', 18, 'Pelajar', 4, 'Belum Menikah', 1, NULL, '2023-08-01 14:56:05'),
(2, '3414075303910011', 'Hamid', 'Situbondo', 'kp. manding', 25, 'Petani', 3, 'Menikah', 1, NULL, NULL),
(3, '3404075303910008', 'Relisa Rahma Wati', 'Situbondo', 'setimbo', 40, 'Buruh', 4, 'Menikah', 3, '2023-08-01 10:43:55', '2023-08-01 10:43:55'),
(4, '7312042510720002', 'Mohammad Fikri', 'Situbondo', 'krastal - Jatibanteng', 45, 'Buruh', 3, 'Menikah', 2, '2023-08-02 08:10:28', '2023-08-02 08:10:28'),
(5, '3404075303910009', 'Contoh 1', 'Situbondo', 'setimbo', 45, 'Wiraswasta', 1, 'Menikah', 4, '2023-08-13 09:14:52', '2023-08-13 10:14:47'),
(6, '2233837181910301', 'M Haji', 'Situbondo', 'Jambang', 40, 'Buruh', 4, 'Menikah', 2, '2023-08-13 10:08:39', '2023-08-13 10:08:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kepentingan`
--
ALTER TABLE `kepentingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `table_criterias`
--
ALTER TABLE `table_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kepentingan` (`kepentingan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kepentingan`
--
ALTER TABLE `kepentingan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_criterias`
--
ALTER TABLE `table_criterias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_criterias`
--
ALTER TABLE `table_criterias`
  ADD CONSTRAINT `table_criterias_ibfk_1` FOREIGN KEY (`kepentingan`) REFERENCES `kepentingan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

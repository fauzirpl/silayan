-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 03:33 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sinelayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'public/default-avatar.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Fauzi', 'admin@admin.com', '$2y$10$1dNR4uES/.U9GdLDwRW1.ODvgq14yat8ngJhnqkolKS6mA3R9mwhe', 'public/S6iAYD9F8ywmxDbpH1Ug3YjiKSQZtctZ3tCAWk9G.jpeg', NULL, '2018-12-25 19:34:53', '2019-01-16 09:43:53'),
(2, 'Admin Mukhlis', 'admin@silayan.com', '$2y$10$aasEWHxARwBUkGLUytqP3eXA92aS3d5BP2NRDmxNCfNN4v2kNSrkG', 'public/zBdd4epzcvp4Cyu2EWHVxWldeA9FZlEGm48mGugk.jpeg', 'QmG8TxfLOQ3PSk7jrVZWd3KC7noZKdTixXO7Kq6j8SknDyUXDAi2Y902leaM', '2019-01-15 08:50:15', '2019-01-16 09:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ikan Terubuk', 'public/nprHUnb4cvsrAL5LbPCzBj6wFmJfNnnjSDCBk7fq.jpeg', '2019-01-16 12:56:23', '2019-01-17 08:32:35'),
(2, 'Ikan Lele', 'public/S5pmQlbh2DoEDSWz9Lf5LYnORue5wPhGs500Az40.png', '2019-01-16 12:59:04', '2019-01-16 12:59:04'),
(3, 'Ikan Tuna', 'public/OujVdUPEwtNLI30t8mkHZIOoQ0PWrfVjZ7zb851G.jpeg', '2019-01-17 08:19:41', '2019-01-17 08:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `fish_catches`
--

CREATE TABLE `fish_catches` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_catch` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fish_catches`
--

INSERT INTO `fish_catches` (`id`, `id_user`, `total_catch`, `created_at`, `updated_at`) VALUES
(1, 1, 178, '2019-01-17 21:11:34', '2019-01-17 21:11:34'),
(2, 3, 57, '2019-01-18 01:52:32', '2019-01-18 01:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `fish_locations`
--

CREATE TABLE `fish_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_fish` int(10) NOT NULL,
  `koordinat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fish_locations`
--

INSERT INTO `fish_locations` (`id`, `id_fish`, `koordinat`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 3, '1.678680, 101.763762', '1', '2019-01-17 12:07:32', '2019-01-17 12:07:32'),
(2, 2, '1.633967, 102.061582', '1', '2019-01-17 20:09:01', '2019-01-17 20:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `fish_prices`
--

CREATE TABLE `fish_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fish` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` mediumint(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fish_prices`
--

INSERT INTO `fish_prices` (`id`, `area`, `id_fish`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Bengkalis', '1', 42000, '2019-01-17 09:58:22', '2019-01-17 09:58:22'),
(2, 'Bantan', '2', 15000, '2019-01-17 10:00:54', '2019-01-17 10:00:54'),
(3, 'Mandau', '1', 64000, '2019-01-18 01:53:26', '2019-01-18 01:53:26'),
(4, 'Siak Kecil', '2', 12000, '2019-01-18 01:57:05', '2019-01-18 01:57:05'),
(5, 'Bandar Laksamana', '3', 156000, '2019-01-18 01:57:27', '2019-01-18 01:57:27'),
(6, 'Pinggir', '2', 11000, '2019-01-18 02:03:31', '2019-01-18 02:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_12_14_132602_create_admins_table', 1),
(2, '2018_12_14_132603_create_admin_password_resets_table', 1),
(3, '2018_12_14_132858_create_fishermen_table', 1),
(4, '2018_12_14_132859_create_fisherman_password_resets_table', 1),
(5, '2018_12_14_151354_create_users_table', 2),
(6, '2019_01_15_093749_create_fish_locations_table', 3),
(7, '2019_01_15_094336_create_fish_table', 3),
(8, '2019_01_15_094400_create_fish_prices_table', 3),
(9, '2019_01_15_094427_create_blogs_table', 3),
(10, '2019_01_15_094537_create_fish_catches_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noktp` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nonelayan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/default-avatar.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `provider`, `provider_id`, `nohp`, `noktp`, `nonelayan`, `alamat`, `kecamatan`, `koordinat`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Fauzi', 'fuushi97@myopera.com', '$2y$10$glSuDMQAQKuaulHEbcy4ouVLxyOFmRXs/I0g8wcxhJcs9OV5eX1Ai', 'facebook', '1908587169176793', '082350460808', '3525051105970001', 'AQS1.8899.A1A13.2013', 'JALAN UTAMA SEBAUK', 'Bantan', '1.794639, 102.032958', 'public/jKrXKxvvpYHjtsPoF75jJs6bFivuec3nrHOKJ6Xi.jpeg', '6LyQ9udmyfC0Ut51l4ZcK6LAGEDkgZDgXkRCYO1pM73t8a3DEi27Ygo9jyjq', '2018-12-14 09:23:41', '2019-01-16 09:40:22'),
(3, 'Suparmin', 'suparminrpl16a@gmail.com', '$2y$10$sd0ryQLrp5PINW8I2KtoRu4HA3hhbfAi8qq6Yil0fQtogvTRHqIR2', NULL, NULL, '028399201133', '3525051109980003', 'AQS1.8899.A1A13.2013', 'KANDIS', 'Rupat', '1.768200, 101.738990', 'public/B33XWHONwNj51VOVJO64F4GirAbmmrjzY2nBdjGW.jpeg', 'PCrQtj1qIfoPCKPuFqFR1wKTNhdCpXjQ1vQelDNLsxq0Jh527ncS9VAngM7W', '2019-01-06 02:21:15', '2019-01-13 10:39:30'),
(4, 'Mukhlis Santoso', 'mukhlissantoso164@gmail.com', '$2y$10$1GNlOaSnCtIk9EJ9yIAnkeI59WqrFgkz2QayQq9BIqzKffNkzJ9uS', NULL, NULL, '082350692144', '3525051109980012', 'AQS1.2299.A1A17.2017', 'JLN. UTAMA DUSUN PELIMAU', 'Bengkalis', '1.519168, 102.044465', 'public/ibjQAY3DD9h9XjJ5IGgrEFmPX6InlJYcoPqSGZPF.jpeg', 'YZfmvfg7uqYiSUWWcgFBFKU1m2uNEACg2SsA7rHXbm72y5zcblwzvCX1rrn2', '2019-01-13 10:43:03', '2019-01-13 10:46:59'),
(5, 'Jono Ganteng', 'jonoisdebes@gmail.com', '$2y$10$S7oHCylyrWuG8tyWtQXsXOYg76GpUZmbe9/e877onwkPwy5KoEtL2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2019-01-13 10:51:45', '2019-01-13 10:51:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish_catches`
--
ALTER TABLE `fish_catches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish_locations`
--
ALTER TABLE `fish_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fish` (`id_fish`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fish_prices`
--
ALTER TABLE `fish_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fish_catches`
--
ALTER TABLE `fish_catches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fish_locations`
--
ALTER TABLE `fish_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fish_prices`
--
ALTER TABLE `fish_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

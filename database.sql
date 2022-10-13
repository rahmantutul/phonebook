-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 02:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_favorite` tinyint(4) NOT NULL,
  `birthday` date DEFAULT NULL,
  `worked_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `address`, `image`, `is_favorite`, `birthday`, `worked_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'B', 'East rampura Dhaka Bangladesh', 'default.png', 0, NULL, 'Dhanmndi', '2022-10-13 05:48:05', '2022-10-13 05:48:05'),
(2, 1, 'A', 'East rampura Dhaka Bangladesh', 'default.png', 0, '2022-10-13', 'Dhanmndi', '2022-10-13 05:48:36', '2022-10-13 05:48:36'),
(3, 1, 'C', 'East rampura Dhaka Bangladesh', 'default.png', 0, NULL, 'Dhanmndi', '2022-10-13 05:48:58', '2022-10-13 05:48:58'),
(4, 1, 'D', 'East rampura Dhaka Bangladesh', 'default.png', 0, NULL, 'Dhanmndi', '2022-10-13 05:50:07', '2022-10-13 05:50:07'),
(5, 1, 'E', 'East rampura Dhaka Bangladesh', 'default.png', 0, NULL, 'Dhanmndi', '2022-10-13 05:50:32', '2022-10-13 05:50:32'),
(6, 1, 'f', 'East rampura Dhaka Bangladesh', 'default.png', 0, '2022-10-13', 'Dhanmndi', '2022-10-13 05:50:57', '2022-10-13 05:50:57'),
(7, 1, 'g', 'East rampura Dhaka Bangladesh', 'default.png', 0, '2022-10-13', 'Dhanmndi', '2022-10-13 05:51:19', '2022-10-13 05:51:19'),
(8, 1, 'Rahman Tutul', 'East rampura Dhaka Bangladesh', 'default.png', 0, '2022-10-13', 'Dhanmndi', '2022-10-13 05:51:43', '2022-10-13 05:51:43'),
(9, 1, 'H', 'East rampura Dhaka Bangladesh', 'default.png', 0, '2022-10-13', 'Dhanmndi', '2022-10-13 05:53:50', '2022-10-13 05:53:50'),
(10, 1, 'I', 'East rampura Dhaka Bangladesh', 'default.png', 0, '2022-10-13', 'Dhanmndi', '2022-10-13 05:54:21', '2022-10-13 05:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `contact_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'b@bcom', '2022-10-13 05:48:05', '2022-10-13 05:48:05'),
(2, 2, 'a@a.com', '2022-10-13 05:48:36', '2022-10-13 05:48:36'),
(3, 3, 'c@c.com', '2022-10-13 05:48:58', '2022-10-13 05:48:58'),
(4, 4, 'd@d.com', '2022-10-13 05:50:07', '2022-10-13 05:50:07'),
(5, 5, 'e@e.com', '2022-10-13 05:50:32', '2022-10-13 05:50:32'),
(6, 6, 'f@f.com', '2022-10-13 05:50:57', '2022-10-13 05:50:57'),
(8, 8, 'rahmantutul50@gmail.com', '2022-10-13 05:51:43', '2022-10-13 05:51:43'),
(9, 7, 'g@g.com', '2022-10-13 05:53:27', '2022-10-13 05:53:27'),
(10, 9, 'h@h.com', '2022-10-13 05:53:50', '2022-10-13 05:53:50'),
(11, 10, 'i@i.com', '2022-10-13 05:54:21', '2022-10-13 05:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2022_10_10_153147_create_contacts_table', 1),
(20, '2022_10_10_153147_create_emails_table', 1),
(21, '2022_10_10_153147_create_phones_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `phone` bigint(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `contact_id`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 1220000000, '2022-10-13 05:48:05', '2022-10-13 05:48:05'),
(2, 2, 110000000, '2022-10-13 05:48:36', '2022-10-13 05:48:36'),
(3, 3, 133333333, '2022-10-13 05:48:58', '2022-10-13 05:48:58'),
(4, 4, 144444444, '2022-10-13 05:50:07', '2022-10-13 05:50:07'),
(5, 5, 127777777, '2022-10-13 05:50:32', '2022-10-13 05:50:32'),
(6, 6, 1345544554, '2022-10-13 05:50:57', '2022-10-13 05:50:57'),
(7, 8, 1534334343, '2022-10-13 05:51:43', '2022-10-13 05:51:43'),
(8, 7, 12345678911, '2022-10-13 05:53:27', '2022-10-13 05:53:27'),
(9, 9, 56345235232, '2022-10-13 05:53:50', '2022-10-13 05:53:50'),
(10, 10, 6234635465432, '2022-10-13 05:54:21', '2022-10-13 05:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john@john.com', '01777777777', 'user.png', NULL, '$2y$10$WNlSM5XZkpks0IOGkxcDPuqQ0xTS9pa.PsaUtuQJoUeTh1z/8F8BC', NULL, '2022-10-13 05:47:53', '2022-10-13 05:47:53'),
(2, 'Cristina', 'cristina@cristina.com', '01888888888', 'user.png', NULL, '$2y$10$AZk2Jpr47N.2yRgkMrT39OAJFUa/3T4C8u5gviZ80I2jDIX7G93OC', NULL, '2022-10-13 05:47:53', '2022-10-13 05:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

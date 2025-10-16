-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2025 at 06:50 AM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'manmarius42@yahoo.com', 'How can create an app used laravel?', '2025-10-05 12:16:38', '2025-10-05 12:16:38');

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
(4, '2025_10_04_142108_create_students_table', 2),
(5, '2025_10_05_151121_create_contacts_table', 3),
(6, '2025_10_09_064106_create_videos_table', 4);

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
('1gJNUIO5CQSmYfFZZ7C1mk52x7Oiw4y8gts1jxzW', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkFEWFhsWklIZWR3c1lyWU5OaEhweEM5clhMVjlRbXY4Slh1amFtMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvbXlfcHJvamVjdDEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760251780),
('HA9M77yBmOtHOtlvzYIogIMZJ41KTp9kfmVzwb3G', 12, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ2V3OVRJdll2aHZrdW5LR0o2dU5kcnFuZVpNQzd5RnRLMFFUNzlMTiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vbG9jYWxob3N0L215X3Byb2plY3QxL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO30=', 1760194880),
('K9zVo9WHqSMDV27sdATXUYB3i2RWy6lFn8Ug602x', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXd0Q1NRaGFSdjZ0QXRVbGg0UjJmSWg4U2FXRnpuQURaWjJ4TzBxNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvbXlfcHJvamVjdDEvbG9naW4iO319', 1760195373);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_state` varchar(50) NOT NULL,
  `student_zip` varchar(255) NOT NULL,
  `student_age` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_address`, `student_state`, `student_zip`, `student_age`, `created_at`, `updated_at`) VALUES
(5, 'natus', 'iure', 'Wisconsin', '79916', 33, '2025-10-05 11:56:17', '2025-10-05 11:56:17'),
(6, 'blanditiis', 'enim', 'Tennessee', '78863', 34, '2025-10-05 11:56:17', '2025-10-05 11:56:17'),
(7, 'a', 'ad', 'Indiana', '70867-5508', 20, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(8, 'voluptate', 'vitae', 'Texas', '03795-8143', 47, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(9, 'est', 'ut', 'Iowa', '78291-8928', 64, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(10, 'eos', 'veniam', 'West Virginia', '51645', 65, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(11, 'consequatur', 'est', 'Tennessee', '93858', 50, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(12, 'corrupti', 'tenetur', 'Tennessee', '63746-7738', 52, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(13, 'tenetur', 'voluptates', 'Pennsylvania', '46866', 20, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(14, 'aliquid', 'ullam', 'Illinois', '91634-6121', 57, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(15, 'non', 'consequatur', 'South Dakota', '99797', 60, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(16, 'est', 'asperiores', 'Maine', '32318', 65, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(17, 'minus', 'ut', 'Nevada', '38071', 55, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(18, 'nobis', 'atque', 'Oregon', '74339', 25, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(19, 'maiores', 'numquam', 'Idaho', '67216', 59, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(20, 'consequatur', 'pariatur', 'New York', '32851', 59, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(21, 'et', 'hic', 'California', '40435', 26, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(22, 'nesciunt', 'architecto', 'Texas', '78920', 57, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(23, 'quidem', 'ea', 'Arkansas', '42911-0661', 50, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(24, 'fuga', 'voluptatem', 'Pennsylvania', '13100', 25, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(25, 'fugit', 'nisi', 'Idaho', '02063', 21, '2025-10-05 11:57:07', '2025-10-05 11:57:07'),
(26, 'deleniti', 'nisi', 'Montana', '98637', 43, '2025-10-05 11:57:07', '2025-10-05 12:07:15'),
(27, 'suscipit', 'quia', 'North Carolina', '90235-6354', 32, '2025-10-05 12:00:07', '2025-10-05 12:07:56'),
(28, 'illo', 'aut', 'Delaware', '20453-0626', 50, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(29, 'totam', 'est', 'Kentucky', '72795-0833', 18, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(30, 'et', 'ut', 'New Mexico', '74031', 22, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(31, 'quae', 'qui', 'Hawaii', '00140-8605', 38, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(32, 'reprehenderit', 'autem', 'Iowa', '04783', 27, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(33, 'magnam', 'libero', 'Tennessee', '10790', 35, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(34, 'laboriosam', 'rem', 'Georgia', '75163', 46, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(35, 'dolorem', 'voluptatum 45', 'RI', '77045-1486', 21, '2025-10-05 12:00:07', '2025-10-05 12:05:01'),
(36, 'dolores', 'dolor', 'Michigan', '36664-4198', 61, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(37, 'deserunt', 'optio', 'RO', '73001', 65, '2025-10-05 12:00:07', '2025-10-05 12:03:48'),
(38, 'ex', 'possimus', 'Mississippi', '75353', 25, '2025-10-05 12:00:07', '2025-10-05 12:03:33'),
(39, 'magnam', 'a', 'Minnesota', '41424', 40, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(40, 'earum', 'nostrum', 'New Jersey', '94187-1088', 45, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(41, 'vel', 'velit', 'Wyoming', '56183', 40, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(42, 'unde', 'voluptate', 'New Mexico', '27007-5776', 57, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(43, 'magni', 'est', 'North Dakota', '77151', 34, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(44, 'est', 'aliquid', 'Arizona', '24889', 47, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(45, 'aut', 'perspiciatis', 'District of Columbia', '99226-2829', 27, '2025-10-05 12:00:07', '2025-10-05 12:00:07'),
(46, 'eos', 'sequi', 'South Carolina', '35900-7983', 18, '2025-10-05 12:00:07', '2025-10-05 12:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Marius', 'manmarius@yahoo.com', NULL, '$2y$12$BT2bJjC/WYyVDICoTg0kFuT.yVckgwE0NYZhBkLc4/qc6bev4YzCS', NULL, NULL, '2025-10-08 03:32:57', '2025-10-08 03:32:57'),
(9, 'luca', 'luca11@gmail.com', NULL, '$2y$12$.g6LURH5X4zFPxWbrZSGpew25a0nxXwl1Ui4ViE.AwlvxxjsO.CsC', NULL, '2025-10-11-09-32-09-8k0rBhsw_male_34_cartoon13.png', '2025-10-11 06:32:09', '2025-10-11 06:32:09'),
(10, 'ion', 'ion@gmail.com', NULL, '$2y$12$lUaPNCLV5wIZfmRtzf3pruWr5VoQY1CjVn1iXM4lpVvIPUGsHzdDW', NULL, '2025-10-11-09-50-15-8k0rBhsw_male_34_cartoon21.png', '2025-10-11 06:50:15', '2025-10-11 06:50:15'),
(11, 'Man', 'marius@gmail.com', NULL, '$2y$12$MOK2Rx0jilw0iBPr8lbIsOxI3Oyg7LnEhhKoashmb.mikTuGAQW6O', NULL, '2025-10-11-11-02-51-8k0rBhsw_male_34_cartoon12.png', '2025-10-11 08:02:51', '2025-10-11 08:02:51'),
(12, 'Ionel', 'luca@gmail.com', NULL, '$2y$12$WyZBZjMxsiFVV7IQr3xxyuhdtq7h2S9.6BYGKC4C3eUS1K88jSG0u', NULL, '2025-10-11-11-06-27-8k0rBhsw_male_34_cartoon18.png', '2025-10-11 08:06:27', '2025-10-11 08:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `path`, `created_at`, `updated_at`) VALUES
(1, 'testare', 'videos/XquAwxMPGvM4UJGYmf6Su6tc5TyFKBOBcfnJbUJj.mp4', '2025-10-09 03:49:24', '2025-10-09 03:49:24'),
(2, 'lansare', 'videos/jWG7eMR6fYMryLA66MeRA2YXX3Lhb2z04nNBxw7s.mp4', '2025-10-09 03:49:37', '2025-10-09 03:49:37'),
(3, 'mafia 3', 'videos/mKWgrKOxTjHQz8ASfwc1UEQwMEvDYsJA05AeRiM0.mp4', '2025-10-10 02:11:54', '2025-10-10 02:11:54');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

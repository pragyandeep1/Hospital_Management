-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 08:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenities_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities_name`, `created_at`, `updated_at`) VALUES
(2, 'Air Conditioning', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_28_080223_create_property_types_table', 2),
(6, '2023_08_04_051333_create_amenities_table', 3),
(7, '2023_08_04_083605_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 16);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'type.menu', 'web', 'type', '2023-08-05 02:59:49', '2023-08-05 02:59:49'),
(2, 'all.type', 'web', 'type', '2023-08-05 03:01:19', '2023-08-05 03:01:19'),
(3, 'add.type', 'web', 'type', '2023-08-05 03:02:12', '2023-08-05 03:02:12'),
(4, 'edit.type', 'web', 'type', '2023-08-05 03:02:26', '2023-08-05 03:02:26'),
(5, 'delete.type', 'web', 'type', '2023-08-05 03:02:39', '2023-08-05 03:02:39'),
(6, 'state.menu', 'web', 'state', '2023-08-05 03:04:46', '2023-08-05 03:04:46'),
(7, 'all.state', 'web', 'state', '2023-08-05 03:05:02', '2023-08-05 13:21:10'),
(8, 'add.state', 'web', 'state', '2023-08-05 03:05:16', '2023-08-05 03:05:16'),
(9, 'edit.state', 'web', 'state', '2023-08-05 03:05:31', '2023-08-05 03:05:31'),
(10, 'delete.state', 'web', 'state', '2023-08-05 03:05:45', '2023-08-05 03:05:45'),
(13, 'amenities.menu', 'web', 'amenities', '2023-10-08 12:04:57', '2023-10-08 12:04:57'),
(14, 'amenities.all', 'web', 'amenities', '2023-10-08 12:05:56', '2023-10-08 12:05:56'),
(15, 'amenities.add', 'web', 'amenities', '2023-10-08 12:06:21', '2023-10-08 12:06:21'),
(16, 'amenities.edit', 'web', 'amenities', '2023-10-08 12:06:45', '2023-10-08 12:06:45'),
(17, 'amenities.delete', 'web', 'amenities', '2023-10-08 12:07:03', '2023-10-08 12:07:03'),
(18, 'agent.menu', 'web', 'agent', '2023-10-08 13:48:23', '2023-10-08 13:48:23'),
(19, 'agent.all', 'web', 'agent', '2023-10-08 13:48:40', '2023-10-08 13:48:40'),
(20, 'agent.add', 'web', 'agent', '2023-10-08 13:48:59', '2023-10-08 13:48:59'),
(21, 'agent.edit', 'web', 'agent', '2023-10-08 13:49:11', '2023-10-08 13:49:11'),
(22, 'agent.delete', 'web', 'agent', '2023-10-08 13:49:22', '2023-10-08 13:49:22'),
(23, 'package.menu', 'web', 'history', '2023-10-08 21:41:19', '2023-10-08 21:41:19'),
(24, 'post.menu', 'web', 'post', '2023-10-08 21:41:40', '2023-10-08 21:41:40'),
(25, 'comment.menu', 'web', 'comment', '2023-10-08 21:42:56', '2023-10-08 21:42:56'),
(26, 'category.menu', 'web', 'category', '2023-10-08 21:43:14', '2023-10-08 21:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type_name`, `type_icon`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', 'icon-1', NULL, NULL),
(2, 'Office', 'icon-2', NULL, NULL),
(3, 'Floor', 'icon-3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-08-25 11:27:24', '2023-08-25 11:27:24'),
(2, 'Admin', 'web', '2023-08-25 11:28:30', '2023-08-25 11:28:30'),
(3, 'Sales', 'web', '2023-08-25 11:29:47', '2023-08-25 11:29:47'),
(5, 'Manager', 'web', '2023-10-08 12:02:45', '2023-10-08 12:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 5),
(2, 1),
(2, 3),
(2, 5),
(3, 1),
(4, 1),
(4, 3),
(4, 5),
(5, 1),
(6, 1),
(6, 2),
(6, 5),
(7, 1),
(7, 2),
(7, 5),
(8, 1),
(9, 1),
(10, 1),
(13, 1),
(13, 2),
(13, 5),
(14, 1),
(14, 2),
(14, 5),
(15, 1),
(15, 5),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2);

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
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','agent','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `phone`, `photo`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Mahon', 'adminmahon@gmail.com', NULL, '$2y$10$ycteckpotNTYg.lEwNZvsO01HIJ/MoeAtmHMovXEeLqMR33TsDSCK', 'Bitan', '8249675334', '202307270645user 2023-07-27 121452.png', NULL, 'admin', 'active', 'F7v8GCeu7gtDDDiDkJSz0gcpYx9B0FSufUlXlsnStG9A3LHy0guOzomLW4vd', NULL, '2023-10-09 02:16:37'),
(2, 'Agent', 'agent@gmail.com', NULL, '$2y$10$tw45G2Ut9omcW7TJDJ2evuOZWaRzc3bcTgExhG87qXkjWtQcySB36', 'agent', '82497', NULL, NULL, 'agent', 'active', NULL, NULL, NULL),
(3, 'User', 'user@gmail.com', NULL, '$2y$10$isWKIUKMjYSlS0A4Ti3rpOFdMevp5C0E6o/5U/T7ZlLgxAL6T7B42', 'user', '97780', NULL, NULL, 'user', 'active', NULL, NULL, NULL),
(4, 'Arianna Windler III', 'bayer.alisha@example.net', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '305.445.5242', 'https://via.placeholder.com/60x60.png/00bb55?text=quasi', '4547 Dietrich Field Suite 894\nSimoneton, NV 03967-8708', 'agent', 'inactive', 'njg8D8cZMT', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(5, 'Dedric Ziemann', 'kbecker@example.com', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1-270-641-8928', 'https://via.placeholder.com/60x60.png/00bb77?text=aspernatur', '98283 Gleason Flat\nGrantshire, AK 03866', 'user', 'active', 'dmdgpCP1fR', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(6, 'Prof. Geo Rutherford', 'aveum@example.net', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '(351) 469-7336', 'https://via.placeholder.com/60x60.png/002255?text=unde', '66480 Asa Streets\nGradyland, SD 37987', 'agent', 'inactive', 'BSjIH1vlPf', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(7, 'Rhianna Donnelly DVM', 'durgan.juston@example.com', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1.469.446.9596', 'https://via.placeholder.com/60x60.png/003399?text=vitae', '48799 Granville Fort Apt. 968\nEast Lindsay, AR 96893', 'user', 'inactive', 'mdsOFr5jzM', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(8, 'Velva Watsica', 'milton25@example.com', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1 (515) 935-1449', 'https://via.placeholder.com/60x60.png/003311?text=sit', '9497 Raynor Station\nOlsonton, LA 49679', 'agent', 'inactive', 'fiHVgeAv7B', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(9, 'Jace Brekke Sr.', 'oconner.emil@example.org', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1-801-329-2876', 'https://via.placeholder.com/60x60.png/00ee77?text=debitis', '8757 Hand Rest\nPollichberg, ND 02451-9008', 'agent', 'active', 'H7s5aYmohC', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(11, 'Loyce Hamill III', 'lwyman@example.org', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+15514455981', 'https://via.placeholder.com/60x60.png/0088aa?text=voluptates', '9290 Barton Shoal\nEast Jaron, MN 25318-4141', 'agent', 'active', 'G6unc2EPzj', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(12, 'Nicklaus Ebert', 'dtoy@example.net', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '283-886-1227', 'https://via.placeholder.com/60x60.png/0044bb?text=odit', '247 Fadel Prairie Suite 569\nWest Josianeview, NH 12862', 'user', 'active', 'UjDZtKturR', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(13, 'Alejandra Tillman', 'okey71@example.net', '2023-07-09 12:27:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1-678-216-1038', 'https://via.placeholder.com/60x60.png/00cc55?text=ut', '5844 Murazik Harbors\nLake Sonyafort, TN 96710', 'agent', 'inactive', 'NJT2ZRIM0t', '2023-07-09 12:27:44', '2023-07-09 12:27:44'),
(16, 'Admin Ninja', 'a@one.in', NULL, '$2y$10$VrAunEryQehsBgmv4hnT6Oz/ygHkz4liq0oCT3o.rY0/PdYsEGIyi', 'Nimda', '7878677696', NULL, NULL, 'admin', 'active', NULL, '2023-10-09 01:13:41', '2023-10-09 02:16:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

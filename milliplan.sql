-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2024 at 06:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milliplan`
--

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
(5, '2024_03_19_224619_deploy', 1),
(6, '2024_03_19_225550_units', 1);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `operation_name` varchar(255) NOT NULL,
  `mission_details` varchar(255) NOT NULL,
  `deployment_area` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `operation_name`, `mission_details`, `deployment_area`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'Linda Nchi', 'Neutralize enemy fighters and infiltrate enemy , cut off ammo supply and food supply for insurgents, suppress any resistance', '40.671673952455905, -0.9933457266650692', 'Alpha', '2024-04-09 15:09:44', '2024-04-09 15:09:44'),
(2, 'Sword Fish', 'Gather intelligence on enemy position and quell any resistance', '39.63972374903784, -0.449998186108985', 'Quick Reaction Force', '2024-04-09 15:11:51', '2024-04-09 15:11:51'),
(3, 'Zuia Wizi', 'End cattle rustling and cut the supply of weaponry and ammunition', '40.023391931682, 1.7859690125209084', 'Bravo', '2024-04-09 17:50:15', '2024-04-09 17:50:15'),
(9, 'Spear Head', 'Train soldiers on close quarter battles and unarmed combat techniques', '38.035843407311575, -1.3701477750791042', 'Alpha', '2024-04-09 18:00:52', '2024-04-09 18:00:52'),
(10, 'Linda Nchi', 'End cattle rustling and cut the supply of weaponry..', '-74.3654174804688, 40.126123507995516', 'Tank Battalion', '2024-04-09 19:02:05', '2024-04-09 19:02:05'),
(11, 'Okoa Maisha', 'Rescue captured friendly forces and recapture captured towns, destroy enemy camps and locate possible ambush points', '40.422165006506276, 0.11941308704291487', 'Alpha', '2024-04-10 04:52:26', '2024-04-10 04:52:26'),
(12, 'Kaa Chonjo', 'Train soldiers in the harsh desert climate and prepare them for deployment in the harsh semi-arid north-eastern region', '35.64488858169591, 2.434320483829609', 'Alpha', '2024-04-10 04:56:24', '2024-04-10 04:56:24'),
(13, 'Linda Nchi', 'Neutralize enemy fighters and infiltrate enemy positions, relay intel to infantry units and eliminate any potential threats', '41.85792606640379, 0.6104356761938305', 'Quick Reaction Force', '2024-04-10 04:59:48', '2024-04-10 04:59:48'),
(14, 'protect asset', 'Protect critical infrastructure in the war torn area of Kapedo and protect principal assets in the area. End vandalism', '36.779452189055576, 1.8013719795311829', 'Bravo', '2024-04-15 08:05:17', '2024-04-15 08:05:17'),
(15, 'Tiger Shark', 'Recon operation. Alpha unit operators will infiltrate enemy ranks and gather and relay information back to base, they will remain in position until the assault team is in place .', '41.28546580034879, -0.15926779370282418', 'Alpha', '2024-04-15 08:48:46', '2024-04-15 08:48:46'),
(16, 'Protect Citizens', 'There has been a rise in insecurity in the coastal regions. Protect citizens and mitigate this issue in that region.', '39.67129367017847, -4.0343952505983935', 'Alpha', '2024-04-18 01:35:48', '2024-04-18 01:35:48');

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
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) NOT NULL,
  `deployments` varchar(255) DEFAULT '0',
  `deployment_status` varchar(255) DEFAULT 'Not deployed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `deployments`, `deployment_status`, `created_at`, `updated_at`) VALUES
(1, 'Tank Battalion', '12', 'not deployed', NULL, NULL),
(2, 'Quick Reaction Force', '1', 'deployed', '2024-04-03 06:21:25', '2024-04-10 04:59:48'),
(11, 'Alpha', '3', 'deployed', '2024-04-03 06:29:44', '2024-04-18 01:35:48'),
(12, 'Bravo', '1', 'deployed', '2024-04-03 06:33:06', '2024-04-15 08:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `unit` varchar(255) DEFAULT NULL,
  `psych_eval` varchar(255) NOT NULL DEFAULT 'pending',
  `deployments` varchar(255) NOT NULL DEFAULT '0',
  `deployment_status` varchar(255) NOT NULL DEFAULT 'not deployed',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `status`, `unit`, `psych_eval`, `deployments`, `deployment_status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'admin', 'active', 'tank batallion', 'passed', '13', 'deployed', '$2y$12$lFOfHRJJu5MV8yVb8a/pkOjx.EWET/Fcbx5yfOeTRgtRJ0cfRTHji', NULL, NULL, '2024-03-31 06:43:44'),
(2, 'John Doe', 'doejohn@gmail.com', NULL, 'user', 'active', 'Quick Reaction Force', 'passed', '1', 'deployed', '$2y$12$1iyY2iabV7r5fXOxpQszh.LNbgnQ1ll6s.M9tOuff6g/qvvmzr8X2', NULL, NULL, '2024-04-10 04:59:48'),
(3, 'Melissa Waititu', 'melissamakeba@gmail.com', NULL, 'user', 'active', 'Quick Reaction Force', 'passed', '1', 'deployed', '$2y$12$QYn..hAXrrlxRgwG5VQTK.UaanOOVxIP6zcep1Jr9FbVKRgc6dMUq', NULL, '2024-03-20 02:40:16', '2024-04-10 04:59:48'),
(4, 'Mark Williams Odhiambo', 'wodhiambo@gmail.com', NULL, 'user', 'active', 'Quick Reaction Force', 'passed', '1', 'deployed', '$2y$12$yw7UF/DtvT7GfdJKLN27neMSnujqt7NTMBsI4jLQ1S5/02abujmei', NULL, '2024-04-01 08:33:42', '2024-04-15 08:49:49'),
(5, 'Joe', 'joe@gmail.com', NULL, 'user', 'inactive', 'Quick Reaction Force', 'pending', '1', 'deployed', '$2y$12$271xFFhS.2h1BAhA0C8yjuhavZ8nAlL4sIWj8dEYfHIqykHghJPFG', NULL, '2024-04-03 07:15:19', '2024-04-10 04:59:48'),
(6, 'Derrick', 'derrick@gmail.com', NULL, 'user', 'inactive', 'Quick Reaction Force', 'pending', '1', 'deployed', '$2y$12$yJfO1H3R7hWX79knr5O/m.rl4jsvAuFmqs1TAxI7sHKcrr2YbSapG', NULL, '2024-04-03 07:19:41', '2024-04-10 04:59:48'),
(7, 'Mike Ross', 'mike@gmail.com', NULL, 'user', 'active', 'Bravo', 'passed', '1', 'deployed', '$2y$12$KH6ZdlJLLxy1Pez8b9nmpebysvuD3yByBprnpgeGJpELvA8nD/nLK', NULL, '2024-04-03 18:00:11', '2024-04-15 08:05:17'),
(8, 'Harvey Sheikh', 'harvey@gmail.com', NULL, 'user', 'active', 'Alpha', 'passed', '4', 'deployed', '$2y$12$L.wjvtZJcxOaa7Zy.l/Vfu9pQmFIJfQILhovqcQVbd4H0B02s5SHi', NULL, '2024-04-03 18:38:01', '2024-04-18 01:35:48'),
(9, 'Martin Black', 'black@gmail.com', NULL, 'user', 'active', 'Bravo', 'passed', '1', 'deployed', '$2y$12$odxO3VPuZzqnYWjdLMuYH.3/0FwlxFvwoiiGrw75NBoa9LhwEKzkK', NULL, '2024-04-10 05:51:52', '2024-04-15 08:05:17'),
(10, 'Amos Kinyua', 'amos@gmail.com', NULL, 'user', 'inactive', 'Alpha', 'failed', '0', 'not deployed', '$2y$12$kQsr0LO2YTuX5jOs7N/uueFLtZ3GGQjkc.vKQemzeHUImuO9uVFm.', NULL, '2024-04-15 08:42:39', '2024-04-15 08:49:58'),
(11, 'Brian Kamau', 'briankamau@gmail.com', NULL, 'user', 'active', 'Alpha', 'passed', '1', 'deployed', '$2y$12$ZvdgXXlvbgsw9bc..kzeWOpH6BLwzgryOojHuzfbqRDfrRIlqdEF2', NULL, '2024-04-18 01:16:37', '2024-04-18 01:35:48');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

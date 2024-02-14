-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 12:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_description` varchar(255) DEFAULT NULL,
  `case_type` varchar(255) NOT NULL,
  `case_status` varchar(255) NOT NULL DEFAULT 'pending',
  `email` varchar(255) NOT NULL,
  `court_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `client_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `judge_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `lawyer_id` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_description`, `case_type`, `case_status`, `email`, `court_id`, `client_id`, `judge_id`, `lawyer_id`, `created_at`, `updated_at`) VALUES
(1, 'Stalling weapon from friend and soled to civilian. Stalling weapon from friend and soled to civilian.', 'criminal', 'terminated', 'dagne@gmail.com', 2, 1, 2, 1, '2024-02-09 06:23:00', '2024-02-14 03:47:55'),
(2, 'Stalling weapon from friend and soled to civilian', 'criminal', 'Started', 'alebachew@gmail.com', 2, 2, 2, 2, '2024-02-06 12:17:59', '2024-02-07 13:25:19'),
(3, 'Stalling weapon from friend and soled to civilian, Stalling weapon from friend and soled to civilian', 'disciplen', 'On Progress', 'alebachew@gmail.com', 2, 2, 2, 1, '2024-02-09 06:24:00', '2024-02-10 03:24:07'),
(4, 'Stalling weapon from friend and soled to civilian', 'disciplen', 'Pending', 'alebachew@gmail.com', 1, 1, 1, 1, '2024-02-06 12:24:22', '2024-02-06 12:24:22'),
(5, 'Stalling weapon from friend and soled to civilian', 'disciplen', 'Pending', 'alebachew@gmail.com', 1, 2, 1, 1, '2024-02-06 12:27:00', '2024-02-06 12:27:00'),
(6, 'Killed his teammate while they were in duty', 'murder', 'Pending', 'dagne@gmail.com', 1, 2, 1, 2, '2024-02-06 12:41:52', '2024-02-06 12:41:52'),
(15, 'Fight with his teammeat', 'disciplen', 'Pending', 'admincases@gmail.com', 1, 1, 1, 1, '2024-02-07 03:36:50', '2024-02-07 03:36:50'),
(16, 'The Suspected person was arrested while he is scaping the camp.', 'criminal', 'On Progress', 'dagne@gmail.com', 2, 2, 2, 2, '2024-02-10 06:23:00', '2024-02-10 03:23:39'),
(17, 'sxsac', 'disciplen', 'Pending', 'dagne@gmail.com', 1, 1, 1, 2, '2024-02-12 10:57:37', '2024-02-12 10:57:37'),
(18, 'aSAs', 'disciplen', 'Pending', 'admincases@gmail.com', 1, 2, 1, 1, '2024-02-12 11:00:26', '2024-02-12 11:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `client_photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `dob`, `sex`, `client_address`, `phone_number`, `client_photo`, `created_at`, `updated_at`) VALUES
(1, 'Tamene Taye', '1986-01-31', 'male', 'Addis Ababa', '0925368916', 'Tamene Taye.webp', '2024-02-12 09:50:41', '2024-02-12 09:50:41'),
(2, 'Jemila Tufa', '1989-02-07', 'female', 'Addis Ababa', '0925368256', 'Jemila Tufa.jpg', '2024-02-12 09:52:03', '2024-02-12 09:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `court_place` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`id`, `court_name`, `court_place`, `created_at`, `updated_at`) VALUES
(1, 'Unasigned', 'Addis Ababa', NULL, NULL),
(2, 'Regular', 'Addis Ababa', NULL, NULL),
(3, 'High Court', 'Addis Ababa', '2024-02-06 21:00:00', '2024-02-06 21:00:00');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `quantity`, `price`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 500, 3, 2, '2023-12-29 08:02:50', '2023-12-29 08:02:50'),
(2, 1, 20, 3, 3, '2023-12-29 08:02:50', '2023-12-29 08:02:50'),
(3, 1, 10, 3, 4, '2023-12-29 08:02:50', '2023-12-29 08:02:50'),
(4, 1, 1500, 4, 1, '2023-12-29 08:03:25', '2023-12-29 08:03:25'),
(5, 1, 20, 4, 3, '2023-12-29 08:03:25', '2023-12-29 08:03:25'),
(6, 1, 20, 5, 3, '2023-12-29 08:05:00', '2023-12-29 08:05:00'),
(7, 1, 500, 6, 2, '2023-12-29 08:06:14', '2023-12-29 08:06:14'),
(8, 1, 10, 6, 4, '2023-12-29 08:06:14', '2023-12-29 08:06:14'),
(9, 1, 20, 7, 3, '2023-12-29 09:07:05', '2023-12-29 09:07:05'),
(10, 1, 10, 8, 4, '2023-12-29 09:11:00', '2023-12-29 09:11:00'),
(11, 1, 20, 9, 3, '2023-12-29 09:35:30', '2023-12-29 09:35:30'),
(12, 1, 500, 10, 2, '2023-12-29 09:47:59', '2023-12-29 09:47:59'),
(13, 1, 500, 11, 2, '2023-12-29 09:53:43', '2023-12-29 09:53:43'),
(14, 1, 10, 12, 4, '2023-12-29 10:00:10', '2023-12-29 10:00:10'),
(15, 1, 10, 13, 4, '2023-12-29 10:17:29', '2023-12-29 10:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judge_name` varchar(255) NOT NULL,
  `court_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`id`, `judge_name`, `court_id`, `created_at`, `updated_at`) VALUES
(1, 'unasigned', 1, NULL, NULL),
(2, 'Dagne Belachew', 1, NULL, NULL),
(4, 'Alebachew Dagne', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyer_name` varchar(255) NOT NULL,
  `court_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`id`, `lawyer_name`, `court_id`, `created_at`, `updated_at`) VALUES
(1, 'Michael Solomon', 2, NULL, NULL),
(2, 'Taye Ayele', 3, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_23_075324_create_products_table', 1),
(6, '2023_12_27_084523_add_role_and_balance_to_table', 1),
(7, '2023_12_27_121110_create_roles_table', 1),
(8, '2023_12_28_084647_add_role_id_to_table', 1),
(9, '2023_12_29_061203_create_orders_table', 1),
(10, '2023_12_29_061503_create_items_table', 1),
(11, '2024_02_06_120506_create_cases_table', 2),
(12, '2024_02_06_121418_create_court_table', 2),
(13, '2024_02_06_121635_create_judge_table', 2),
(14, '2024_02_10_070319_create_clients_table', 3),
(15, '2024_02_12_055223_create_client_table', 4),
(16, '2024_02_12_124753_create_client_table', 5),
(17, '2024_02_14_083244_create_lawyers_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '2023-12-29 08:00:21', '2023-12-29 08:00:21'),
(2, 0, 1, '2023-12-29 08:02:09', '2023-12-29 08:02:09'),
(3, 530, 1, '2023-12-29 08:02:50', '2023-12-29 08:02:50'),
(4, 1520, 1, '2023-12-29 08:03:25', '2023-12-29 08:03:25'),
(5, 20, 1, '2023-12-29 08:05:00', '2023-12-29 08:05:00'),
(6, 510, 1, '2023-12-29 08:06:14', '2023-12-29 08:06:14'),
(7, 20, 1, '2023-12-29 09:07:05', '2023-12-29 09:07:05'),
(8, 10, 1, '2023-12-29 09:11:00', '2023-12-29 09:11:00'),
(9, 20, 1, '2023-12-29 09:35:30', '2023-12-29 09:35:30'),
(10, 500, 1, '2023-12-29 09:47:59', '2023-12-29 09:47:59'),
(11, 500, 1, '2023-12-29 09:53:43', '2023-12-29 09:53:43'),
(12, 10, 1, '2023-12-29 10:00:10', '2023-12-29 10:00:10'),
(13, 10, 2, '2023-12-29 10:17:29', '2023-12-29 10:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admincases@gmail.com', '$2y$10$cizAjgEPZ4WpGaPgPHydieEWKB2gfVkuwEHMu6YsC/vF3j1IGq0l.', '2024-02-09 02:38:10');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'TV', 'My Best Tv', '1.jpg', '1500', '2023-12-29 04:35:34', '2024-02-12 09:25:27'),
(2, 'Camera', 'Canon Camera', '2.webp', '500', '2023-12-29 04:35:57', '2023-12-29 04:35:57'),
(3, 'Chromecast', 'Chromecast', '3.jpg', '20', '2023-12-29 04:36:18', '2023-12-29 04:36:18'),
(4, 'Game', 'Game', '4.png', '10', '2023-12-29 04:36:35', '2023-12-29 04:36:35'),
(5, 'submarine', 'submarine', '5.png', '105', '2023-12-29 04:37:05', '2023-12-29 04:37:05'),
(6, 'iphone', 'iphone', '6.jpg', '120', '2023-12-29 04:37:27', '2023-12-29 04:37:27'),
(7, 'PlayStation', 'Playstation', '7.jpg', '60', '2023-12-29 04:37:55', '2023-12-29 04:37:55'),
(8, 'Best Tv', 'Best Me', '8.jpg', '2500', '2024-02-12 09:26:42', '2024-02-12 09:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-12-29 04:32:12', '2023-12-29 04:32:12'),
(2, 'clark', '2023-12-29 04:32:20', '2023-12-29 04:32:20'),
(3, 'judge', '2023-12-29 04:32:32', '2023-12-29 04:32:32'),
(4, 'client', '2023-12-29 04:32:54', '2023-12-29 04:32:54'),
(5, 'supperAdmin', '2024-02-14 10:38:12', '2024-02-14 10:38:12'),
(6, 'lawyer', '2024-02-14 11:04:40', '2024-02-14 11:04:40');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `balance`, `role_id`) VALUES
(1, 'Berhan', 'berhanbzg@gmail.com', NULL, '$2y$10$xw/jVNmVHClPQUuB1VtnR.TSSs9gV/l8RUihRXcyOZn/tp3r6415G', NULL, '2023-12-29 04:30:40', '2023-12-29 10:00:10', 1360, 1),
(2, 'Jhon', 'jhon@mail.com', NULL, '$2y$10$j/ux1dwdTzGDm4ZbTSzuW.9qvhtP96tu6u0hB1N6o8rhoJEecOYbe', NULL, '2023-12-29 04:34:39', '2023-12-29 10:17:29', 4990, 4),
(3, 'Admin Online Store', 'onlinestore@gmail.com', NULL, '$2y$10$eO4QJg5oGogitmh9WJNhmu0vcYK6e0I.8D.2X3BZn4NO/mvlrJMZW', 'YIna0yFBGvcZJLloThSwq54PJdUdDzhhQo6eFGsoJErV5lxXx8jBAjlm43YC', '2024-02-06 04:50:12', '2024-02-06 04:50:12', 5000, 1),
(4, 'client', 'client@gmail.com', NULL, '$2y$10$/Oyf6azP77xNWaBKPgtMpur.2NzLYNczIP8nkBHOpyLAcZRyBFvCi', NULL, '2024-02-06 09:00:55', '2024-02-06 09:00:55', 5000, 4),
(6, 'admin cases', 'admincases@gmail.com', NULL, '$2y$10$Q3iGz81wL/mPFx0sRCXiYOrGDZDiNvV1Wgrf6PbBIgLEuNt0XIqTe', NULL, '2024-02-07 05:35:32', '2024-02-07 05:35:32', 5000, 5),
(15, 'adminuser', 'adminuser@gmail.com', NULL, '$2y$10$5nahbHygmv8/D/nDT.SjgOkw6wj31LCMWdXbG5Y9e4J3T.bxQh.cW', NULL, '2024-02-14 04:09:37', '2024-02-14 04:09:37', 5000, 1),
(16, 'clark', 'clark1@gmail.com', NULL, '$2y$10$/oo3eWlg6sxUumHTLdA0k.I8/NnqjSeLe/kl6KzIvYwLbmPmN8op6', NULL, '2024-02-14 04:30:36', '2024-02-14 04:30:36', 5000, 2),
(17, 'Dagne Belachew', 'dagne@gmail.com', NULL, '$2y$10$/1T.beGE3Ivs/YRisyS7qua2NxarQ9l3SpnErcg0MDycIBC75eRDK', NULL, '2024-02-14 07:35:31', '2024-02-14 07:50:55', 5000, 3),
(18, 'Alebachew Dagne', 'alebachew@gmail.com', NULL, '$2y$10$Dqyf2.1gkeZYnoofkxnGDuZrn6IOSVuEboJyYxwcxtCGPrHWZIVDO', NULL, '2024-02-14 07:36:19', '2024-02-14 07:50:49', 5000, 3),
(19, 'Michael Solomon', 'michael@gmail.com', NULL, '$2y$10$43PQED8tuj8Pm0KAKhGvJepbzPkMkJg8T6mgmGql219Yvd3KyPe0e', NULL, '2024-02-14 07:37:17', '2024-02-14 07:50:33', 5000, 6),
(20, 'Taye Ayele', 'taye@gmail.com', NULL, '$2y$10$bQfFRlNcyzcau4De/erVKuhBr8fl96kf1I1fIQBKUfrdUrMaVXaIK', NULL, '2024-02-14 07:38:01', '2024-02-14 07:50:27', 5000, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_order_id_foreign` (`order_id`),
  ADD KEY `items_product_id_foreign` (`product_id`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judge_court_id_foreign` (`court_id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_court_id_foreign` (`court_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `judge`
--
ALTER TABLE `judge`
  ADD CONSTRAINT `judge_court_id_foreign` FOREIGN KEY (`court_id`) REFERENCES `court` (`id`);

--
-- Constraints for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD CONSTRAINT `lawyer_court_id_foreign` FOREIGN KEY (`court_id`) REFERENCES `court` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

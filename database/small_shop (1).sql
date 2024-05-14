-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `small_shop`
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
('5c785c036466adea360111aa28563bfd556b5fba', 'i:6;', 1715316384),
('5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1715316384;', 1715316384),
('c1dfd96eea8cc2b62785275bca38ac261256e278', 'i:1;', 1715572525),
('c1dfd96eea8cc2b62785275bca38ac261256e278:timer', 'i:1715572525;', 1715572525);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'labtop', '2024-05-06 22:13:06', '2024-05-06 22:13:06'),
(18, 'notebook', '2024-05-09 21:44:40', '2024-05-09 21:44:40'),
(19, 'it', '2024-05-09 21:44:47', '2024-05-12 17:43:32'),
(23, 'test55', '2024-05-12 19:47:58', '2024-05-12 19:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `facebook`, `youtube`, `ig`, `x`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100011042470365&mibextid=ZbWKwL', 'https://www.youtube.com/@cwdev2545', 'https://www.instagram.com/', 'https://twitter.com/?lang=th', NULL, '2024-05-08 20:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_services`
--

CREATE TABLE `delivery_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_services`
--

INSERT INTO `delivery_services` (`id`, `name`, `cost`, `created_at`, `updated_at`) VALUES
(4, 'delivery-3', 45.00, '2024-05-07 22:01:39', '2024-05-08 20:44:28'),
(5, 'delivery-2', 20.00, '2024-05-07 22:01:42', '2024-05-08 20:44:20'),
(6, 'delivery-1', 30.00, '2024-05-07 22:01:48', '2024-05-12 18:05:59');

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
-- Table structure for table `firsts`
--

CREATE TABLE `firsts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firsts`
--

INSERT INTO `firsts` (`id`, `title`, `label`, `image`, `created_at`, `updated_at`) VALUES
(1, 'สินค้าออนไลน์ !', 'เว็บขายสินค้าเป็นแพลตฟอร์มที่ให้บริการในการซื้อขายสินค้าออนไลน์ โดยผู้ใช้สามารถเข้าชมสินค้าและบริการที่ขายบนเว็บไซต์ได้\n', 'first-5054c8a6c9bf09127c6009832b08495c.webp', NULL, '2024-05-12 20:54:27');

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
(4, '2024_05_05_020430_create_products_table', 1),
(5, '2024_05_07_041642_create_categories_table', 2),
(6, '2024_05_07_045644_add_category_id_to_products', 3),
(7, '2024_05_08_044824_create_delivery_services_table', 4),
(8, '2024_05_09_025141_create_contacts_table', 5),
(9, '2024_05_09_041506_create_firsts_table', 6),
(10, '2024_05_09_041620_create_product_samples_table', 6),
(11, '2024_05_10_052656_create_order_items_table', 7),
(12, '2024_05_10_055628_create_order_items_table', 8),
(13, '2024_05_10_060050_create_order_items_table', 9),
(14, '2024_05_11_050139_add_usertype_to_users', 10),
(15, '2024_05_13_014917_add_key_to_users', 11),
(16, '2024_05_13_090821_create_orders_table', 12),
(17, '2024_05_13_091809_add_order_id_to_order_items', 13),
(18, '2024_05_13_091913_add_order_code_to_orders', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `shipping_cost` decimal(8,2) NOT NULL,
  `percel_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `delivery_id`, `grand_total`, `payment_method`, `shipping_cost`, `percel_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'OR-9IRIL6641EF6EA6D4F', 7, 4, 5045.00, 'ปลายทาง', 45.00, NULL, 'new', '2024-05-13 03:46:06', '2024-05-13 03:46:06'),
(3, 'OR-69IWT6641F1170A26C', 7, 4, 2045.00, 'ปลายทาง', 45.00, NULL, 'cancel', '2024-05-13 03:53:11', '2024-05-13 03:53:11'),
(4, 'OR-BZXT56641F22E496DD', 8, 5, 520.00, 'ปลายทาง', 20.00, NULL, 'new', '2024-05-13 03:57:50', '2024-05-13 03:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `usercode` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `user_id`, `usercode`, `product_id`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(33, 2, 7, '6641cf6a8a79b1715588970', 44, 2, 4000.00, '2024-05-13 01:36:16', '2024-05-13 03:46:06'),
(34, 2, 7, '6641cf6a8a79b1715588970', 43, 2, 1000.00, '2024-05-13 01:39:43', '2024-05-13 03:46:06'),
(36, 3, 7, '6641cf6a8a79b1715588970', 44, 1, 2000.00, '2024-05-13 03:52:50', '2024-05-13 03:53:11'),
(37, 4, 8, '6641cf6a8a79b1715588970', 43, 1, 500.00, '2024-05-13 03:57:40', '2024-05-13 03:57:50'),
(38, NULL, NULL, '6641cf6a8a79b1715588970', 45, 1, 23000.00, '2024-05-13 04:04:26', '2024-05-13 04:04:26'),
(39, NULL, NULL, '6641cf6a8a79b1715588970', 44, 1, 2000.00, '2024-05-13 04:04:31', '2024-05-13 04:04:31');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `subimage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `detail`, `price`, `image`, `subimage`, `created_at`, `updated_at`) VALUES
(42, 12, 'product', 'detail', 500.00, 'product-b709c92ec60c544dd5e4c9a8eb025350.webp', '[\"product-sub-953aa947922d896f2cb4d28fe0d94e21.jpg\",\"product-sub-562b3ac81051c183119b49bdcc080547.jpg\",\"product-sub-b7683a721a83a9714afd897517a23be2.jpg\"]', '2024-05-07 22:16:55', '2024-05-07 22:16:55'),
(43, 18, 'no1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ducimus animi doloremque quaerat dignissimos! Quibusdam sapiente molestiae ipsum ipsam temporibus.\n', 500.00, 'product-ac04d53c324aaa26ae4f9d85270301ac.webp', '[\"product-sub-b99d2e1d5b5c50d27b7629bac68ae52e.webp\",\"product-sub-742719828ff335257686266c6b55f076.webp\",\"product-sub-1fe232a64056d4a37d7d5551b31fc1f4.webp\"]', '2024-05-09 21:45:31', '2024-05-09 21:45:31'),
(44, 19, 'notebook', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ducimus animi doloremque quaerat dignissimos! Quibusdam sapiente molestiae ipsum ipsam temporibus.\n', 2000.00, 'product-d3b11d50589ba16c05b253a6ec279c43.jpg', '[\"product-sub-961ad6260e37495d396dc38fcdeb7233.jpg\",\"product-sub-576bdf81548df6707156a28916c21773.jpg\",\"product-sub-18d91ae54206726aa4663c36baf13a88.jpg\"]', '2024-05-09 21:45:59', '2024-05-09 21:45:59'),
(45, 18, 'del', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ducimus animi doloremque quaerat dignissimos! Quibusdam sapiente molestiae ipsum ipsam temporibus.\n', 23000.00, 'product-ff103a36ed30e0ddd0d5a8283e7aaf01.jpg', '[\"product-sub-c389d212a0700c006808de5fc99b4ddd.webp\",\"product-sub-28b9d34807f2e4f256c42f01829c859e.jpg\",\"product-sub-d6526a08979a7000dce434c274a15162.jpg\"]', '2024-05-09 21:46:22', '2024-05-09 21:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_samples`
--

CREATE TABLE `product_samples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('lUSWn03ihwpuxhy1R92ZRQiK9dnyRqlg87o6v1cz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjg6InVzZXJjb2RlIjtzOjIzOiI2NjQxY2Y2YThhNzliMTcxNTU4ODk3MCI7czo2OiJfdG9rZW4iO3M6NDA6Ik1XUjVxNXRab2JxS2cwS0JsUjl4R3g4cnNPZGpXVXJLTU5YWkF0UDQiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXV0aC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1715598279);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `key`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'la', 'la@exp.com', '$2y$12$8WEmJGnTn6xQ2WXHkpSy5.9qqnbvAhYH/wmOslDBRYm57SolQqVcG', NULL, '$2y$12$XONUCDP37L7y8SVAe.xjSeFU6DsEO9puoZB1lRSS4IHFSFPAVumP.', 'member', NULL, '2024-05-12 19:29:00', '2024-05-12 19:29:00'),
(5, 'va', 'va@exp.com', '$2y$12$qNvQhyzERubDan.U85Zx/eOdzNcEeocjz2wHaYmfsRI85O.pLU9yq', NULL, '$2y$12$6v0K4cK7DbGypDSpRjEyvex/M0UlDvnNoReH9sl13v0ue09BZtxm.', 'member', NULL, '2024-05-12 19:41:54', '2024-05-12 19:42:32'),
(6, 'admin', 'admin@exp.com', '$2y$12$FEnckO4D/1yf16JOpYB41.skxrh1q6et3EASUxsdt9wfSz0NHnxry', NULL, '$2y$12$/88u0eExdW3VQxHyYpjJueitKy7HrUtQNUD65yGGr0hzs8anng1Bu', 'admin', NULL, '2024-05-12 19:44:29', '2024-05-12 19:44:29'),
(7, 'kan', 'kan@exp.com', '$2y$12$vcHYs3.mjh8OZOZ9I4iv0uZWlV/bq54p6JWGjdnjhvUqmXFx/C.Km', NULL, '$2y$12$5dE4QQDmp3lkKtQUAVbyMOwKXMcJ.xcRmk6ZRmYAmTY8jHtrOkfP2', 'member', NULL, '2024-05-13 01:40:29', '2024-05-13 01:41:50'),
(8, 'na', 'na@exp.com', '$2y$12$C89O9XEVHCVZOQl6rvCN/.vNyc4hjKluWbJ5getQzIh.8Wi4Ydbde', NULL, '$2y$12$BLRwbFY96cSqAjBCwNnqw.IyjBmfTGdyT4kXyv01R3HZJzgWr1Uny', 'member', NULL, '2024-05-13 03:57:17', '2024-05-13 03:57:17');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_services`
--
ALTER TABLE `delivery_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `firsts`
--
ALTER TABLE `firsts`
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_samples`
--
ALTER TABLE `product_samples`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_services`
--
ALTER TABLE `delivery_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firsts`
--
ALTER TABLE `firsts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_samples`
--
ALTER TABLE `product_samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `delivery_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

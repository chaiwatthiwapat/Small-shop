-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 04:35 AM
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
('c1dfd96eea8cc2b62785275bca38ac261256e278', 'i:2;', 1715823080),
('c1dfd96eea8cc2b62785275bca38ac261256e278:timer', 'i:1715823080;', 1715823080);

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
(23, 'หนังสือ', '2024-05-12 19:47:58', '2024-05-15 18:27:41');

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
(18, '2024_05_13_091913_add_order_code_to_orders', 13),
(19, '2024_05_14_043721_add_phone_to_orders', 14),
(20, '2024_05_14_045700_add_name_to_orders', 15),
(21, '2024_05_14_064314_add_unit_price_to_order_items', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `shipping_cost` decimal(8,2) NOT NULL,
  `address` text NOT NULL,
  `percel_number` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `delivery_id`, `name`, `grand_total`, `payment_method`, `shipping_cost`, `address`, `percel_number`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(10, 'OR-664308D8976C8', 9, 5, 'name', 4020.00, 'ปลายทาง', 20.00, 'address', '3456', '0955993948', 'success', '2024-05-13 23:46:48', '2024-05-14 22:33:11'),
(11, 'OR-66430E3634664', 7, 5, 'name', 1020.00, 'ปลายทาง', 20.00, 'address', NULL, '0988847776', 'new', '2024-05-14 00:09:42', '2024-05-14 00:21:32'),
(12, 'OR-6643125FB71E7', 7, 5, 'name', 23020.00, 'ปลายทาง', 20.00, 'address', '42345', '0888849983', 'shipping', '2024-05-14 00:27:27', '2024-05-15 19:31:58'),
(13, 'OR-664312913CDC9', 7, 5, 'my name', 2520.00, 'ปลายทาง', 20.00, 'my addres', '2352345', '0884888893', 'success', '2024-05-14 00:28:17', '2024-05-14 22:29:43'),
(14, 'OR-66442A6997DA5', 11, 5, 'name', 25020.00, 'ปลายทาง', 20.00, 'address Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, iure.', '234523', '0988858834', 'shipping', '2024-05-14 20:22:17', '2024-05-14 23:09:05'),
(15, 'OR-66442AE531974', 12, 5, 'my name', 3020.00, 'ปลายทาง', 20.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, iure.', '', '0999984837', 'canceled', '2024-05-14 20:24:21', '2024-05-14 23:07:48');

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
  `unit_price` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `user_id`, `usercode`, `product_id`, `quantity`, `unit_price`, `total_amount`, `created_at`, `updated_at`) VALUES
(48, 10, 9, '6642e3abba9c81715659691', 44, 2, 2000.00, 4000.00, '2024-05-13 23:46:31', '2024-05-13 23:46:48'),
(49, 11, 7, '6642e3abba9c81715659691', 43, 1, 500.00, 500.00, '2024-05-14 00:08:45', '2024-05-14 00:09:42'),
(50, 11, 7, '6642e3abba9c81715659691', 42, 1, 500.00, 500.00, '2024-05-14 00:09:26', '2024-05-14 00:09:42'),
(51, 12, 7, '6642e3abba9c81715659691', 45, 1, 23000.00, 23000.00, '2024-05-14 00:27:17', '2024-05-14 00:27:27'),
(52, 13, 7, '6642e3abba9c81715659691', 43, 1, 500.00, 500.00, '2024-05-14 00:27:52', '2024-05-14 00:28:17'),
(53, 13, 7, '6642e3abba9c81715659691', 44, 1, 2000.00, 2000.00, '2024-05-14 00:27:59', '2024-05-14 00:28:17'),
(54, 14, 11, '664420feb32b01715740926', 44, 1, 2000.00, 2000.00, '2024-05-14 20:21:13', '2024-05-14 20:22:17'),
(55, 14, 11, '664420feb32b01715740926', 45, 1, 23000.00, 23000.00, '2024-05-14 20:21:18', '2024-05-14 20:22:17'),
(56, 15, 12, '664420feb32b01715740926', 44, 1, 2000.00, 2000.00, '2024-05-14 20:23:48', '2024-05-14 20:24:21'),
(57, 15, 12, '664420feb32b01715740926', 42, 1, 500.00, 500.00, '2024-05-14 20:23:56', '2024-05-14 20:24:21'),
(58, 15, 12, '664420feb32b01715740926', 43, 1, 500.00, 500.00, '2024-05-14 20:24:01', '2024-05-14 20:24:21');

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
(42, 12, 'labtop', 'detail', 500.00, 'product-9cca40c2b92fd863ada0b7c9e7600018.webp', '[\"product-sub-30180694c1544ea56ade331efcc33497.webp\",\"product-sub-0d3764d62e16067502a46b6380f05dbe.jpg\",\"product-sub-fc39d1fe5a877d6b32430f1d5fcc936a.jpg\",\"product-sub-031e45163a97dac688b5b34f454be17a.jpg\"]', '2024-05-07 22:16:55', '2024-05-15 18:26:45'),
(43, 18, 'notebook 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ducimus animi doloremque quaerat dignissimos! Quibusdam sapiente molestiae ipsum ipsam temporibus.\n', 500.00, 'product-0583dfc76d48a5c20d9ee06226fa90f2.jpg', '[\"product-sub-5364f175566f8783c4f022e0749e1a9d.webp\",\"product-sub-41ef526f30df38c650974772ff3b91a9.jpg\",\"product-sub-1edd463ca52a23efc427772a7aa5e0e6.jpg\",\"product-sub-ed71166af7895a6902b8e45ff607c43e.jpg\"]', '2024-05-09 21:45:31', '2024-05-15 19:29:27'),
(44, 19, 'notebook 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ducimus animi doloremque quaerat dignissimos! Quibusdam sapiente molestiae ipsum ipsam temporibus.\n', 2000.00, 'product-c5306dd7f243c8dec06168ef17d4409a.webp', '[\"product-sub-ac5ff297f34f619b2defe46599e3106a.webp\",\"product-sub-58249ba1824280b164b365a60d5e7727.webp\",\"product-sub-d878bf633d448d7469afa3db2e349903.webp\",\"product-sub-0a0e5cf8628248a50c2197331c1b3380.jpg\"]', '2024-05-09 21:45:59', '2024-05-15 19:29:21'),
(45, 18, 'notebook 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ducimus animi doloremque quaerat dignissimos! Quibusdam sapiente molestiae ipsum ipsam temporibus.\n', 23000.00, 'product-0b92f05afa9386670b65cf6587a89053.webp', '[\"product-sub-6ad3554ec715e8728acab3617d9c76ad.webp\",\"product-sub-cb1bbdef66f3c1a9cce5c47294301d7f.webp\",\"product-sub-65221919bce002995d863b66e9cd8370.webp\",\"product-sub-a991d45e90489b7274f86aa3d7cd3791.jpg\"]', '2024-05-09 21:46:22', '2024-05-15 18:27:24'),
(48, 23, 'หนังสือ', 'เปลี่ยนความคิดของคุณให้เป็นจริงด้วยคอร์สการพัฒนาซอฟต์แวร์ของเรา ลงทะเบียนเลยวันนี้ แล้วมาเริ่มเขียนโค้ดกันเถอะครับ!', 200.00, 'product-65511c5fe9cf74d9f445093f943f0340.jpg', '[\"product-sub-64bdfa3a25acd9a2b995452c452d70c2.jpg\",\"product-sub-6403c1d30232f3ebdda95a6c267093c6.jpg\"]', '2024-05-15 18:30:35', '2024-05-15 18:30:35');

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
('s8cpsv8SiFsAN3c8D49AHtkTHifbm9FLXMqsEFlr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjg6InVzZXJjb2RlIjtzOjIzOiI2NjQ1NWRlYjc2ZTI5MTcxNTgyMjA1OSI7czo2OiJfdG9rZW4iO3M6NDA6ImgyR05JZnpycU9tWXpucUVWVm9iVUtqSWRyc0lTdDVoQlNzT3lKOEYiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcHJvZHVjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1715826828);

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
(7, 'kan', 'kan@exp.com', '$2y$12$vcHYs3.mjh8OZOZ9I4iv0uZWlV/bq54p6JWGjdnjhvUqmXFx/C.Km', NULL, '$2y$12$5dE4QQDmp3lkKtQUAVbyMOwKXMcJ.xcRmk6ZRmYAmTY8jHtrOkfP2', 'member', NULL, '2024-05-13 01:40:29', '2024-05-13 01:41:50'),
(8, 'na', 'na@exp.com', '$2y$12$C89O9XEVHCVZOQl6rvCN/.vNyc4hjKluWbJ5getQzIh.8Wi4Ydbde', NULL, '$2y$12$BLRwbFY96cSqAjBCwNnqw.IyjBmfTGdyT4kXyv01R3HZJzgWr1Uny', 'member', NULL, '2024-05-13 03:57:17', '2024-05-13 03:57:17'),
(9, 'sa', 'sa@exp.com', '$2y$12$jnFUJnJq/wOt18uKBdVcqOkbvlfgrv4A7oY9QHZ.bXaSTAi1Nztoe', NULL, '$2y$12$6bI7HJS41hJh5HUrulzjD.fAhG8eox2VR3RLH38alGtHeaoFu7Ioy', 'member', NULL, '2024-05-13 21:13:54', '2024-05-13 21:13:54'),
(10, 'nakhimov', 'nakhimov@exp.com', '$2y$12$TDPUEGi1tiVEc42aaRBfre1fo0iF5TTgbS0FwTgIPmzbBjNlgCPLi', NULL, '$2y$12$dpTrbike83q6EBH2AGWXguYawyKHyQoLozSmj3176ngtX7375hfGK', 'member', NULL, '2024-05-13 23:33:25', '2024-05-13 23:33:25'),
(11, 'ma', 'ma@exp.com', '$2y$12$eZZldEbLIM6XIP08GdrEVegBaaUCyEmah6C6Awc8OjZuo44wwmBUK', NULL, '$2y$12$5LIG1tmU0ixsd3TxQalV3.z6VhhHVpJIyOufpusuDpfI0t4OmX9VW', 'member', NULL, '2024-05-14 20:21:07', '2024-05-14 20:21:07'),
(12, 'aa', 'aa@exp.com', '$2y$12$GX.e1um4veYm8yhF4bcF2OLNyjjw/ojxk57p57C49RcBBXl5Djo5W', NULL, '$2y$12$NGAcBlr6oXp2MfEQvpxKb.nRc/i2WqaygwrcbZslBw9IrY0.2VliC', 'member', NULL, '2024-05-14 20:23:15', '2024-05-14 20:23:15'),
(13, 'admin', 'admin@exp.com', '$2y$12$8F8g5f6QuxR.IcAJ8QZAAOv81duIE1RSVJuo5tRK5nZLqxLuLKlNu', NULL, '$2y$12$3h3AOL9MPw.2DTdDgUXpFOvPpfYqrjHWgAPgdv1MIuA3aE6jAJzam', 'admin', NULL, '2024-05-15 19:30:57', '2024-05-15 19:30:57');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_samples`
--
ALTER TABLE `product_samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

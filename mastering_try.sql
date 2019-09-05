-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mastering_try`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `brand_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Sony', 'cf', './Brand-image/Bangladesh-image-bangladesh-36259274-3648-2736.jpg', 1, '2019-05-24 11:26:09', '2019-06-01 03:19:36'),
(3, 'LG', 'zsf', './Brand-image/Bangladesh-Wallpapers.jpg', 1, '2019-05-24 11:45:10', '2019-06-01 03:19:45'),
(5, 'BMW', 'ljkwbedk', './Brand-image/Bmw2.jpg', 1, '2019-05-28 11:30:30', '2019-06-01 03:17:43'),
(6, 'Lamborgini', 'sldkfj', './Brand-image/Lamborghini-insecta-concept-1.jpeg', 1, '2019-05-28 11:31:04', '2019-06-01 03:18:04'),
(10, 'Ferari', 'sdf', './Brand-image/Ferrari2.JPG', 1, '2019-06-01 03:18:43', '2019-06-01 03:18:43'),
(11, 'Toyota', 'local', './Brand-image/FRONT.JPG', 1, '2019-06-13 23:34:31', '2019-06-13 23:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', 'f', './Category-Images/امار-سونار-بنگلہ.jpg', 1, '2019-05-24 22:48:41', '2019-05-24 22:48:41'),
(2, 'Books', 'fgh', './Category-Images/1234124_512839428786799_2015630629_n.jpg', 1, '2019-05-24 22:48:53', '2019-05-24 22:49:12'),
(3, 'Nature', 'vg', './Category-Images/3867767062_ce759d1785.jpg', 1, '2019-05-24 22:49:05', '2019-05-24 22:49:05'),
(4, 'Super Car', 'sldjf', './Category-Images/[[[[_DIR_]]]]097.jpg', 1, '2019-05-28 11:31:45', '2019-05-28 11:31:45'),
(5, 'Local Car', 'asd', './Category-Images/09.JPG', 1, '2019-05-28 11:32:19', '2019-05-28 11:54:28'),
(6, 'car', 'sf', './Category-Images/02.JPG', 0, '2019-05-28 11:32:33', '2019-05-31 11:54:40');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_23_180419_create_categories_table', 2),
(4, '2019_05_24_091511_create_brands_table', 2),
(5, '2019_05_25_045718_create_products_table', 3),
(6, '2019_05_25_052826_create_product_sub_images_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount_price` double(10,2) DEFAULT NULL,
  `product_orginal_price` double(10,2) DEFAULT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci,
  `product_long_description` text COLLATE utf8mb4_unicode_ci,
  `product_image` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_code`, `product_discount_price`, `product_orginal_price`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 5, 11, 'Corolla', 'LOC-TOY-COR-13', 159326.00, 65456464.00, 'esfg', 'sdfg', './Brand-image/FB.jpg', 1, '2019-05-24 23:56:48', '2019-06-19 23:08:52'),
(2, 3, 1, 'asd', 'asd', 12.00, 12.00, '2', NULL, './Brand-image/امار-سونار-بنگلہ.jpg', 1, '2019-05-24 23:59:09', '2019-05-24 23:59:09'),
(3, 1, 1, 'TV', 'sont-tv', 15000.00, 23000.00, 'sadjkf', 'sdgnkesdn', './Brand-image/IMG_20161019_123057.jpg', 1, '2019-05-25 07:08:41', '2019-05-25 07:08:41'),
(4, 1, 1, 'Mobile', 'jsdf', 15000.00, 23000.00, 'sdf', 'sdg', './Brand-image/IMG_20151103_170752.jpg', 1, '2019-05-25 07:16:57', '2019-05-25 07:16:57'),
(6, 3, 3, 'sdf', 'NAT-LG-SDF-6', 15000.00, 600.00, 'lorem', 'asldhnfsadgnsdlkgnlk', './Brand-image/0,1020,141130,00.jpg', 1, '2019-05-28 11:30:11', '2019-05-28 11:30:11'),
(7, 4, 5, 'bmw', 'SUP-CAR-BMW-7', 2562000.00, 25694245.00, 'asd', 'lorem', './Brand-image/10077.JPG', 1, '2019-05-28 11:33:16', '2019-05-28 11:33:16'),
(8, 6, 6, 'lamborgini', 'CAR-CAR-LAM-8', 159326.00, 1655465.00, 'sdsadf', 'sadfsfd', './Brand-image/FRONT.JPG', 1, '2019-05-28 11:35:48', '2019-05-28 11:35:48'),
(9, 4, 7, 'M3', 'SUP-BMW-M3-9', 53621000.00, 73621000.00, 's', 's', './Brand-image/Bmw3.jpg', 1, '2019-05-30 23:27:12', '2019-05-30 23:27:12'),
(12, 2, 1, 'book', 'BOO-SON-BOO-12', 360.00, 400.00, 'lorem', 'lorem', './Brand-image/[[[[_DIR_]]]]097.jpg', 1, '2019-06-19 08:54:21', '2019-06-19 08:54:21'),
(15, 5, 11, 'Corolla', 'LOC-TOY-COR-13', 159326.00, 65456464.00, 'esfg', 'sdfg', './Brand-image/1140-classic-car-safety.imgcache.rev30757a1d44e422554cbd71f0df22a617.jpg', 1, '2019-06-19 22:56:34', '2019-06-19 23:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(1, 1, './Product-sub-image/3867767062_ce759d1785.jpg', '2019-05-24 23:56:48', '2019-05-24 23:56:48'),
(2, 1, './Product-sub-image/Bangladesh-image-bangladesh-36259274-3648-2736.jpg', '2019-05-24 23:56:48', '2019-05-24 23:56:48'),
(3, 1, './Product-sub-image/Bangladesh-Wallpapers.jpg', '2019-05-24 23:56:48', '2019-05-24 23:56:48'),
(4, 1, './Product-sub-image/C-3.jpg', '2019-05-24 23:56:48', '2019-05-24 23:56:48'),
(5, 2, './Product-sub-image/1234124_512839428786799_2015630629_n.jpg', '2019-05-24 23:59:09', '2019-05-24 23:59:09'),
(6, 2, './Product-sub-image/3867767062_ce759d1785.jpg', '2019-05-24 23:59:09', '2019-05-24 23:59:09'),
(7, 3, './Product-sub-image/IMG_20161019_123057.jpg', '2019-05-25 07:08:41', '2019-05-25 07:08:41'),
(8, 3, './Product-sub-image/IMG_20161019_123059.jpg', '2019-05-25 07:08:41', '2019-05-25 07:08:41'),
(9, 3, './Product-sub-image/IMG_20161019_123133.jpg', '2019-05-25 07:08:41', '2019-05-25 07:08:41'),
(10, 3, './Product-sub-image/IMG_20161019_142135.jpg', '2019-05-25 07:08:41', '2019-05-25 07:08:41'),
(11, 4, './Product-sub-image/IMG_20151103_171049.jpg', '2019-05-25 07:16:57', '2019-05-25 07:16:57'),
(12, 4, './Product-sub-image/IMG_20151103_171053.jpg', '2019-05-25 07:16:57', '2019-05-25 07:16:57'),
(13, 5, './Product-sub-image/IMG_20151103_170752.jpg', '2019-05-25 07:18:42', '2019-05-25 07:18:42'),
(14, 5, './Product-sub-image/IMG_20151103_170756.jpg', '2019-05-25 07:18:43', '2019-05-25 07:18:43'),
(15, 6, './Product-sub-image/0,1020,141128,00.jpg', '2019-05-28 11:30:11', '2019-05-28 11:30:11'),
(16, 6, './Product-sub-image/0,1020,141130,00.jpg', '2019-05-28 11:30:11', '2019-05-28 11:30:11'),
(17, 6, './Product-sub-image/0.jpg', '2019-05-28 11:30:11', '2019-05-28 11:30:11'),
(18, 7, './Product-sub-image/05.JPG', '2019-05-28 11:33:16', '2019-05-28 11:33:16'),
(19, 7, './Product-sub-image/06.JPG', '2019-05-28 11:33:16', '2019-05-28 11:33:16'),
(20, 8, './Product-sub-image/550sypder2.jpg', '2019-05-28 11:35:48', '2019-05-28 11:35:48'),
(21, 8, './Product-sub-image/718RS60Spyder.jpg', '2019-05-28 11:35:48', '2019-05-28 11:35:48'),
(22, 8, './Product-sub-image/911-1.jpg', '2019-05-28 11:35:48', '2019-05-28 11:35:48'),
(23, 8, './Product-sub-image/911-2.jpg', '2019-05-28 11:35:48', '2019-05-28 11:35:48'),
(24, 9, './Product-sub-image/Bmw2.jpg', '2019-05-30 23:27:12', '2019-05-30 23:27:12'),
(25, 9, './Product-sub-image/Bmw3.jpg', '2019-05-30 23:27:12', '2019-05-30 23:27:12'),
(26, 9, './Product-sub-image/bmwm54.jpg', '2019-05-30 23:27:12', '2019-05-30 23:27:12'),
(27, 10, './Product-sub-image/Lamborghini4.GIF', '2019-05-30 23:33:10', '2019-05-30 23:33:10'),
(28, 10, './Product-sub-image/Lamborghini7.JPG', '2019-05-30 23:33:10', '2019-05-30 23:33:10'),
(29, 10, './Product-sub-image/Lamborghini-insecta-concept-1.jpeg', '2019-05-30 23:33:10', '2019-05-30 23:33:10'),
(30, 11, './Product-sub-image/TRNGR219.JPG', '2019-06-19 08:53:19', '2019-06-19 08:53:19'),
(31, 11, './Product-sub-image/TRNGR220.JPG', '2019-06-19 08:53:19', '2019-06-19 08:53:19'),
(32, 11, './Product-sub-image/TRNGR221.JPG', '2019-06-19 08:53:19', '2019-06-19 08:53:19'),
(33, 12, './Product-sub-image/0,1020,139724,00.jpg', '2019-06-19 08:54:21', '2019-06-19 08:54:21'),
(34, 12, './Product-sub-image/0,1020,139846,00.jpg', '2019-06-19 08:54:21', '2019-06-19 08:54:21'),
(35, 12, './Product-sub-image/2.jpg', '2019-06-19 08:54:21', '2019-06-19 08:54:21'),
(36, 13, './Product-sub-image/1140-classic-car-safety.imgcache.rev30757a1d44e422554cbd71f0df22a617.jpg', '2019-06-19 22:39:27', '2019-06-19 22:39:27'),
(37, 13, './Product-sub-image/1959ferrari-1.jpg', '2019-06-19 22:39:27', '2019-06-19 22:39:27'),
(38, 14, './Product-sub-image/W113-GQ-6oct15-pr_b.jpg', '2019-06-19 22:50:08', '2019-06-19 22:54:17'),
(39, 14, './Product-sub-image/11250454.jpg', '2019-06-19 22:50:08', '2019-06-19 22:50:08'),
(40, 1, './Product-sub-image/1959ferrari-1.jpg', '2019-06-19 22:56:34', '2019-06-19 23:03:46'),
(41, 1, './Product-sub-image/FB.jpg', '2019-06-19 22:56:34', '2019-06-19 23:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mainul Islam', 'mainul12501@gmail.com', NULL, '$2y$10$GVf6EhiKud3rQvS4WDV.qOGQy5ZOXFMb3AYjSXIYieThuI7pnxxpC', '4SLxrnSAOHSQjfk3qLhVWUm2ZSHN0ZFf4RIWNLcwPDzbBpG4IFvwQtwhm67u', '2019-05-23 11:16:27', '2019-05-23 11:16:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

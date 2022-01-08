-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 11:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`) VALUES
(2, 'ÁO THUN NAM', 'áo thun nam', '<p>&aacute;o thun nam</p>', 33, 300000, 250000, 1, '2021-10-29 03:07:40', '2021-10-30 01:57:07', '/storage/uploads/2021/10/30/product-03.jpg'),
(3, 'ÁO THUN NỮ', 'ÁO THUN NỮ', '<p>&Aacute;O THUN NỮ</p>', 34, 300000, 250000, 1, '2021-10-30 01:58:54', '2021-10-30 01:58:54', '/storage/uploads/2021/10/30/product-01.jpg'),
(4, 'ÁO SƠ MI NỮ', 'ÁO SƠ MI NỮ', '<p>&Aacute;O SƠ MI NỮ</p>', 34, 500000, 400000, 1, '2021-10-30 01:59:22', '2021-10-30 01:59:22', '/storage/uploads/2021/10/30/product-02.jpg'),
(5, 'ÁO KHOÁC NỮ', 'ÁO KHOÁC NỮ', '<p>&Aacute;O KHO&Aacute;C NỮ</p>', 34, 1000000, 999999, 1, '2021-10-30 02:00:07', '2021-10-30 02:00:07', '/storage/uploads/2021/10/30/product-04.jpg'),
(6, 'CHÂN VÁY NỮ', 'CHÂN VÁY NỮ', '<p>CH&Acirc;N V&Aacute;Y NỮ</p>', 34, 150000, 149000, 1, '2021-10-30 02:00:40', '2021-10-30 02:00:40', '/storage/uploads/2021/10/30/product-05.jpg'),
(7, 'ĐỒNG HỒ NAM', 'ĐỒNG HỒ NAM', '<p>ĐỒNG HỒ NAM</p>', 33, 300000, 200000, 1, '2021-10-30 02:01:34', '2021-10-30 02:01:34', '/storage/uploads/2021/10/30/product-06.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2021 at 07:15 PM
-- Server version: 10.6.4-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokaner_hisab`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `unit_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'Onion', 75, 'kg', '2021-10-15 13:06:30', '2021-10-15 13:06:30'),
(2, 'Potato', 25, 'kg', '2021-10-15 13:06:47', '2021-10-15 13:06:47'),
(3, 'Salt', 35, 'kg', '2021-10-15 13:07:11', '2021-10-15 13:07:11'),
(4, 'Egg', 38, 'hali', '2021-10-15 13:07:32', '2021-10-15 13:07:32'),
(5, 'Soybean Oil', 145, 'kg', '2021-10-15 13:08:08', '2021-10-15 13:08:08'),
(6, 'Mustard Oil', 210, 'kg', '2021-10-15 13:09:16', '2021-10-15 13:09:16'),
(7, 'Toilet Tissue', 30, 'piece', '2021-10-15 13:09:59', '2021-10-15 13:09:59'),
(8, 'Sugar', 155, 'kg', '2021-10-15 13:10:19', '2021-10-15 13:10:19'),
(9, 'Atta', 40, 'kg', '2021-10-15 13:10:38', '2021-10-15 13:10:38'),
(10, 'Moida', 52, 'kg', '2021-10-15 13:11:11', '2021-10-15 13:11:11'),
(11, 'Sunflower Oil', 310, 'kg', '2021-10-15 13:11:34', '2021-10-15 13:11:34'),
(12, 'Mash Kolai Dal', 150, 'kg', '2021-10-15 13:12:08', '2021-10-15 13:12:08'),
(13, 'Mung Dal', 146, 'kg', '2021-10-15 13:12:30', '2021-10-15 13:12:30'),
(14, 'Mushur Dal', 100, 'kg', '2021-10-15 13:12:53', '2021-10-15 13:12:53'),
(15, 'Khesharir Dal', 78, 'kg', '2021-10-15 13:13:15', '2021-10-15 13:13:15'),
(16, 'Minicate Rice', 74, 'kg', '2021-10-15 13:13:48', '2021-10-15 13:13:48'),
(17, 'Basmoti Rice', 300, 'kg', '2021-10-15 13:14:15', '2021-10-15 13:14:15'),
(18, 'Nazirsail Rice', 78, 'kg', '2021-10-15 13:14:44', '2021-10-15 13:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ordered_items`)),
  `payment_claimed` tinyint(1) NOT NULL DEFAULT 0,
  `ordered_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Tohir Raihan', 'admin@dokanerhisab.com', '21232f297a57a5a743894a0e4a801fc3', '2021-10-11 14:09:45', '2021-10-11 21:33:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 02:22 PM
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
-- Database: `remote_hire`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` longtext NOT NULL,
  `type` enum('icon','svg','img') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file`, `type`, `created_at`, `updated_at`) VALUES
(1, 'type/player.svg', 'svg', NULL, NULL),
(2, 'type/colors.svg', 'svg', NULL, NULL),
(3, 'type/video.svg', 'svg', NULL, NULL),
(4, 'type/bag.svg', 'svg', NULL, NULL),
(5, 'type/cog.svg', 'svg', NULL, NULL),
(6, 'type/cart.svg', 'svg', NULL, NULL),
(7, 'type/arrow-up.svg', 'svg', NULL, NULL),
(8, 'type/chart.svg', 'svg', NULL, NULL),
(9, 'type/text.svg', 'svg', NULL, NULL),
(10, 'type/user-check.svg', 'svg', NULL, NULL),
(11, 'type/meg.svg', 'svg', NULL, NULL),
(12, 'type/bag_out.svg', 'svg', NULL, NULL),
(13, 'type/target.svg', 'svg', NULL, NULL),
(14, 'type/chats.svg', 'svg', NULL, NULL),
(15, 'type/pen.svg', 'svg', NULL, NULL),
(16, 'type/build.svg', 'svg', NULL, NULL),
(17, 'type/p-m.svg', 'svg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

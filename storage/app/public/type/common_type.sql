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
-- Table structure for table `common_type`
--

CREATE TABLE `common_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_type`
--

INSERT INTO `common_type` (`id`, `title`, `icon_id`, `created_at`, `updated_at`) VALUES
(1, 'Accountant / Bookkeeper', 17, NULL, NULL),
(2, 'Data Analyst', 13, NULL, NULL),
(3, 'Public Relations Coordinator', 9, NULL, NULL),
(4, 'Business Development Representative (BDR)', 4, NULL, NULL),
(5, 'Virtual Assistance', 18, NULL, NULL),
(6, 'Architects', 16, NULL, NULL),
(7, 'Media Buyer', 12, NULL, NULL),
(8, 'Marketing Coordinator', 6, NULL, NULL),
(9, 'Video Editor', 3, NULL, NULL),
(10, 'Tailored Services (Customizable Services)', 5, NULL, NULL),
(11, 'Copywriter /\r\nContent Creator', 15, NULL, NULL),
(12, 'Social Media Coordinator', 11, NULL, NULL),
(13, 'SEO Specialist', 7, NULL, NULL),
(14, 'Graphic Designer', 2, NULL, NULL),
(15, 'Customer Support', 14, NULL, NULL),
(16, 'Account Coordinator', 10, NULL, NULL),
(17, 'Sales Development Representative (SDR)', 6, NULL, NULL),
(18, 'Motion Graphics Designer', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `common_type`
--
ALTER TABLE `common_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_type_icon_id_foreign` (`icon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `common_type`
--
ALTER TABLE `common_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `common_type`
--
ALTER TABLE `common_type`
  ADD CONSTRAINT `common_type_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

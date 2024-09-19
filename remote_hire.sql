-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 12:24 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `image`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Elzero Team', 'elzero', '$2y$12$3ntU08TEGKaRsU0.2iNtxuhnhOTdPBrkepEUUjGfjxYHFLgn9EjQ.', 'profile_photos/1O8YsYRVdh9bSrmsW9gA9PS9OnKpOXKSQisJSby6.jpg', 'profile_photos/NsS6FOvFF2vIrs0IOA3zDwbiLJU3pMnMXui8LIr0.png', NULL, '2024-08-16 09:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `is_job` enum('True','False') NOT NULL,
  `is_remote` enum('True','False') NOT NULL,
  `hear_us` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` enum('Accepted','Rejected','Reviewing') NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `job_id`, `name`, `email`, `phone`, `country_code`, `education`, `is_job`, `is_remote`, `hear_us`, `resume`, `profile`, `status`, `ip`, `created_at`, `updated_at`) VALUES
(3, 5, 'Geoffrey Houston', 'hozyv@mailinator.com', '+1 (858) 904-5169', 'GU', 'High School', 'False', 'False', 'Social media', '/storage/resume/xyJkDlVdAJls1pqJxUTZQ5q2g8uKv59vQaMFgsCB.pdf', 'https://www.tahyzipihagum.co.uk', 'Reviewing', '127.0.0.1', '2024-09-14 13:04:06', '2024-09-14 13:04:06'),
(4, 5, 'Michael Ortega', 'gagaxyf@mailinator.com', '+1 (297) 307-7657', 'GY', 'Graduate', 'False', 'False', 'Communities', '/storage/resume/AqrMm3J557kw3CHXK5FF0E1k7BOgNE73j2diMMWr.pdf', 'https://www.zedidaxer.org.au', 'Reviewing', '127.0.0.1', '2024-09-14 13:19:28', '2024-09-14 13:19:28');

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

-- --------------------------------------------------------

--
-- Table structure for table `constant`
--

CREATE TABLE `constant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constant`
--

INSERT INTO `constant` (`id`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1, '30', 'duration_of_meeting', NULL, NULL),
(2, 'University', 'edu_level', NULL, NULL),
(3, 'High School', 'edu_level', NULL, NULL),
(4, 'Graduate', 'edu_level', NULL, NULL),
(5, 'Social media', 'hear_us', NULL, NULL),
(6, 'Communities', 'hear_us', NULL, NULL),
(7, 'Advertisements', 'hear_us', NULL, NULL),
(8, 'Europe/Kiev', 'time_zone', NULL, NULL),
(9, '', 'MAIL_HOST', NULL, NULL),
(10, '', 'MAIL_PORT', NULL, NULL),
(11, '', 'MAIL_USERNAME', NULL, NULL),
(12, '', 'MAIL_PASSWORD', NULL, NULL),
(13, '', 'MAIL_ENCRYPTION', NULL, NULL),
(14, '', 'MAIL_FROM_ADDRESS', NULL, NULL),
(15, '', 'MAIL_FROM_NAME', NULL, NULL),
(16, 'VZEfwqtR6SQWJ7OAPn7A', 'ZOOM_CLIENT_ID', NULL, NULL),
(17, 'jbL7i32O6voKZ1SJ6hFcBnfBx2HAbvWB', 'ZOOM_CLIENT_SECRET', NULL, NULL),
(18, 'iObut9DqQx2_f9qaZ3ryMA', 'ZOOM_ACCOUNT_ID', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `schedule` timestamp NULL DEFAULT NULL,
  `zoom_link` longtext DEFAULT NULL,
  `status` enum('Meeting','Waiting','Met') NOT NULL DEFAULT 'Waiting',
  `ip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `company_name`, `country`, `message`, `schedule`, `zoom_link`, `status`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'dasdasd', 'dasdasdas', 'dasdasd', 'EG', 'dasdasdfsvsdvdfsgsdfggddasdasdfsvsdvdfsgsdfggddasdasdfsvsdvdfsgsdfggddasdasdfsvsdvdfsgsdfggddasdasdfsvsdvdfsgsdfggddasdasdfsvsdvdfsgsdfggddasdasdfsvsdvdfsgsdfggd', '2024-08-29 06:45:26', 'https://www.youtube.com/watch?v=7cDKIaIF-HU', 'Waiting', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'title 12', 'title 24', NULL, '2024-09-19 07:13:59'),
(2, 'title 23', 'title 2', NULL, '2024-09-19 07:13:57'),
(3, 'title 3', 'title 3', NULL, NULL),
(4, 'title 4', 'title 4', NULL, NULL),
(5, 'title 5', 'title 5', NULL, NULL),
(6, 'title 6', 'title 6', NULL, NULL),
(7, 'title 7', 'title 7', NULL, NULL),
(8, 'title 8', 'title 8', NULL, NULL);

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
(17, 'type/p-m.svg', 'svg', NULL, NULL),
(18, 'type/headphone.svg', 'svg', NULL, NULL),
(27, 'covers/TaI1scMlVtNw6B6N1XPSobVxmWN2aEL2O76yGGV8.png', 'img', '2024-08-16 09:32:42', '2024-08-16 09:32:42'),
(28, 'covers/CVlTi7xafJqypRleutuSv0m4GKG8JG0ykHRVNw89.png', 'img', '2024-08-16 09:50:50', '2024-08-16 09:50:50'),
(29, 'covers/R6HB9Kjdhpuagqi8rQuDG3z9bJTXa4RWQcQGBjH3.jpg', 'img', '2024-09-14 12:40:13', '2024-09-14 12:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `cover_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `list_of_text` longtext NOT NULL,
  `text_highlight_list` longtext NOT NULL,
  `desc` longtext NOT NULL,
  `text_highlight_desc` longtext NOT NULL,
  `status` enum('Publish','Draft') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type_id`, `cover_id`, `title`, `sub_title`, `list_of_text`, `text_highlight_list`, `desc`, `text_highlight_desc`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, 29, 'Corrupti aut in con', 'Voluptas expedita et', 'Laborum Accusantium,hrllo,ellfefs', 'Voluptatem Ullam qu', 'In in consequuntur e', 'Molestiae ut sunt a', 'Publish', '2024-09-14 12:40:13', '2024-09-14 12:40:13');

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
(1, '2024_08_14_065703_create_images_table', 1),
(2, '2024_08_14_065850_create_widget_table', 1),
(3, '2024_08_14_070519_create_contact_table', 1),
(4, '2024_08_14_082748_create_careers_table', 1),
(5, '2024_08_14_083414_create_social_table', 1),
(6, '2024_08_14_145629_create_admin_table', 1),
(7, '2024_08_14_164711_create_services_table', 1),
(8, '2024_08_14_164927_create_jobs_table', 1),
(9, '2024_08_14_165013_create_common_type_table', 1),
(11, '2024_08_14_083414_create_constant_table', 2),
(12, '2024_09_19_092541_create_faqs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `cover_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` longtext NOT NULL,
  `list_of_text` longtext NOT NULL,
  `text_highlight_list` longtext NOT NULL,
  `desc` longtext NOT NULL,
  `text_highlight_desc` longtext NOT NULL,
  `status` enum('Publish','Draft') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `type_id`, `cover_id`, `title`, `sub_title`, `list_of_text`, `text_highlight_list`, `desc`, `text_highlight_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 28, 'Duis dicta exercitat', '', '', '', 'Voluptas dignissimos', '', 'Publish', '2024-08-16 09:50:50', '2024-08-16 09:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` longtext NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `title`, `icon`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LinkedIn', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">\r\n  <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM5.76081 9.93892H8.48027V18.1098H5.76081V9.93892ZM8.65938 7.41135C8.64173 6.6102 8.06883 6 7.13852 6C6.20821 6 5.6 6.6102 5.6 7.41135C5.6 8.1959 6.19023 8.82367 7.10322 8.82367H7.12059C8.06883 8.82367 8.65938 8.1959 8.65938 7.41135ZM15.1566 9.74706C16.9461 9.74706 18.2877 10.9151 18.2877 13.4249L18.2876 18.1098H15.5682V13.7384C15.5682 12.6404 15.1747 11.8911 14.1903 11.8911C13.4389 11.8911 12.9914 12.3962 12.7949 12.8841C12.723 13.0589 12.7053 13.3025 12.7053 13.5467V18.11H9.98555C9.98555 18.11 10.0214 10.7059 9.98555 9.93914H12.7053V11.0965C13.0663 10.5401 13.7127 9.74706 15.1566 9.74706Z\" fill=\"white\"/>\r\n</svg>', '#', 'active', NULL, '2024-09-15 16:21:14'),
(2, 'Facebook', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">\r\n  <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM13.2508 12.5271V19.0557H10.5495V12.5274H9.2V10.2776H10.5495V8.92678C10.5495 7.0914 11.3116 6 13.4766 6H15.279V8.25006H14.1524C13.3096 8.25006 13.2538 8.56447 13.2538 9.15125L13.2508 10.2773H15.2918L15.053 12.5271H13.2508Z\" fill=\"white\"/>\r\n</svg>', '#', 'active', NULL, NULL),
(3, 'Instagram', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">\r\n  <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM9.36164 5.63867C10.0443 5.6076 10.2624 5.6 12.0006 5.6H11.9986C13.7373 5.6 13.9546 5.6076 14.6373 5.63867C15.3186 5.66987 15.784 5.77774 16.192 5.936C16.6133 6.09934 16.9693 6.31801 17.3253 6.67401C17.6813 7.02975 17.9 7.38682 18.064 7.80776C18.2213 8.21469 18.3293 8.67977 18.3613 9.36111C18.392 10.0438 18.4 10.2619 18.4 12.0001C18.4 13.7382 18.392 13.9558 18.3613 14.6385C18.3293 15.3196 18.2213 15.7848 18.064 16.1918C17.9 16.6126 17.6813 16.9697 17.3253 17.3255C16.9697 17.6815 16.6132 17.9007 16.1924 18.0641C15.7852 18.2224 15.3196 18.3303 14.6382 18.3615C13.9556 18.3925 13.7381 18.4001 11.9998 18.4001C10.2618 18.4001 10.0438 18.3925 9.36111 18.3615C8.6799 18.3303 8.21469 18.2224 7.80749 18.0641C7.38682 17.9007 7.02975 17.6815 6.67414 17.3255C6.31827 16.9697 6.09961 16.6126 5.936 16.1917C5.77787 15.7848 5.67 15.3197 5.63867 14.6384C5.60773 13.9557 5.6 13.7382 5.6 12.0001C5.6 10.2619 5.608 10.0436 5.63853 9.36097C5.6692 8.6799 5.7772 8.21469 5.93587 7.80762C6.09987 7.38682 6.31854 7.02975 6.67454 6.67401C7.03028 6.31814 7.38735 6.09947 7.80829 5.936C8.21523 5.77774 8.6803 5.66987 9.36164 5.63867Z\" fill=\"white\"/>\r\n  <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M11.4265 6.75355C11.538 6.75338 11.6579 6.75343 11.7873 6.75349L12.0006 6.75355C13.7094 6.75355 13.912 6.75969 14.5868 6.79035C15.2108 6.81889 15.5495 6.92315 15.7751 7.01076C16.0737 7.12676 16.2867 7.26543 16.5105 7.48943C16.7345 7.71343 16.8732 7.92677 16.9895 8.22544C17.0771 8.45077 17.1815 8.78944 17.2099 9.41345C17.2405 10.0881 17.2472 10.2908 17.2472 11.9988C17.2472 13.7068 17.2405 13.9095 17.2099 14.5842C17.1813 15.2082 17.0771 15.5468 16.9895 15.7722C16.8735 16.0709 16.7345 16.2835 16.5105 16.5074C16.2865 16.7314 16.0739 16.8701 15.7751 16.9861C15.5497 17.0741 15.2108 17.1781 14.5868 17.2066C13.9121 17.2373 13.7094 17.2439 12.0006 17.2439C10.2917 17.2439 10.0891 17.2373 9.41447 17.2066C8.79046 17.1778 8.45179 17.0735 8.22605 16.9859C7.92739 16.8699 7.71405 16.7313 7.49005 16.5073C7.26604 16.2833 7.12738 16.0705 7.01111 15.7716C6.92351 15.5463 6.81911 15.2076 6.79071 14.5836C6.76004 13.909 6.75391 13.7063 6.75391 11.9972C6.75391 10.2881 6.76004 10.0865 6.79071 9.41185C6.81924 8.78784 6.92351 8.44917 7.01111 8.22357C7.12711 7.9249 7.26604 7.71156 7.49005 7.48756C7.71405 7.26356 7.92739 7.12489 8.22605 7.00862C8.45166 6.92062 8.79046 6.81662 9.41447 6.78795C10.0049 6.76129 10.2337 6.75329 11.4265 6.75195V6.75355ZM15.4169 7.81623C14.9929 7.81623 14.6489 8.15983 14.6489 8.58397C14.6489 9.00798 14.9929 9.35198 15.4169 9.35198C15.8409 9.35198 16.1849 9.00798 16.1849 8.58397C16.1849 8.15997 15.8409 7.81596 15.4169 7.81596V7.81623ZM8.71393 12.0003C8.71393 10.1852 10.1855 8.71364 12.0005 8.71357C13.8156 8.71357 15.2868 10.1852 15.2868 12.0003C15.2868 13.8154 13.8157 15.2863 12.0006 15.2863C10.1855 15.2863 8.71393 13.8154 8.71393 12.0003Z\" fill=\"white\"/>\r\n  <path d=\"M12.0005 9.86719C13.1787 9.86719 14.1339 10.8223 14.1339 12.0005C14.1339 13.1787 13.1787 14.1339 12.0005 14.1339C10.8223 14.1339 9.86719 13.1787 9.86719 12.0005C9.86719 10.8223 10.8223 9.86719 12.0005 9.86719Z\" fill=\"white\"/>\r\n</svg>', '#', 'active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `common_type`
--
ALTER TABLE `common_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_type_icon_id_foreign` (`icon_id`);

--
-- Indexes for table `constant`
--
ALTER TABLE `constant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_cover_id_foreign` (`cover_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_cover_id_foreign` (`cover_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `common_type`
--
ALTER TABLE `common_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `constant`
--
ALTER TABLE `constant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `common_type`
--
ALTER TABLE `common_type`
  ADD CONSTRAINT `common_type_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_cover_id_foreign` FOREIGN KEY (`cover_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_cover_id_foreign` FOREIGN KEY (`cover_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

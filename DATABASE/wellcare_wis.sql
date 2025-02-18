-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2024 at 09:32 AM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellcare_wis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Editor','Moderator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin', NULL, '$2y$12$3iUWqdUwK5v8nXlnkNDwoODo0Pt4p4FZ56qUwboiTUAJfbxlLriZy', '2024-10-20 01:19:25', '2024-10-20 01:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_job`
--

CREATE TABLE `cancel_job` (
  `id` bigint UNSIGNED NOT NULL,
  `giver_id` bigint DEFAULT NULL,
  `post_id` bigint DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancel_job`
--

INSERT INTO `cancel_job` (`id`, `giver_id`, `post_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'leaving a reason', '2024-10-20 03:48:52', '2024-10-20 03:48:53'),
(2, 3, 1, 'leaving a reason', '2024-10-20 03:49:19', '2024-10-20 03:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companydetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `logo`, `video`, `companydetail`, `phone`, `email`, `address`, `facebook`, `twitter`, `youtube`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'https://www.youtube.com/embed/Vb0dG-2huJE?autoplay=1&mute=1', '12 Years+ Experienced, 300+ Interior Design Construction & 500+ Interior Consultancy Done by Circle Interior Ltd. Currently No#1 Best Interior Design Company in Bangladesh', '01643371009', 'biplob@gmail.com', 'House # 6/20 (12st Floor) Block # E, A/k Link Rood, Boshundhora, Dhaka -1212', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', '2024-10-20 01:19:25', '2024-10-20 01:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_mambers`
--

CREATE TABLE `family_mambers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_mambers`
--

INSERT INTO `family_mambers` (`id`, `user_id`, `nid_name`, `nid_number`, `nid_image`, `address`, `relation`, `created_at`, `updated_at`) VALUES
(1, 1, 'Biplob', '12345678', 'image', 'badda', 'Brother', '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(2, 2, 'holder\'s name 1', '12314567892', 'storage/members_nid/1729416498_6714cd32580b9.png', 'holder\'s address 4', 'Mother', '2024-10-20 03:28:18', '2024-10-20 03:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `giver_id` bigint UNSIGNED DEFAULT NULL,
  `taker_id` bigint UNSIGNED DEFAULT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `offer_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `giver_id`, `taker_id`, `post_id`, `offer_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, NULL, '2024-10-20 03:34:02', '2024-10-20 03:34:02'),
(2, 3, 2, NULL, 1, '2024-10-20 03:39:01', '2024-10-20 03:39:01'),
(4, 4, 2, 1, NULL, '2024-10-20 04:12:49', '2024-10-20 04:12:49'),
(5, 4, 2, NULL, 2, '2024-10-20 04:22:02', '2024-10-20 04:22:02'),
(6, 3, 2, 2, NULL, '2024-10-26 20:16:00', '2024-10-26 20:16:00'),
(7, 3, 2, 4, NULL, '2024-11-07 01:03:22', '2024-11-07 01:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_13_041302_create_admins_table', 1),
(6, '2024_10_06_063602_create_family_mambers_table', 1),
(7, '2024_10_06_063705_create_testimonials_table', 1),
(8, '2024_10_06_064346_create_services_table', 1),
(9, '2024_10_06_064358_create_posts_table', 1),
(10, '2024_10_06_064416_create_jobs_table', 1),
(11, '2024_10_06_064436_create_profile_ratings_table', 1),
(12, '2024_10_06_064453_create_sliders_table', 1),
(13, '2024_10_06_064512_create_configurations_table', 1),
(14, '2024_10_12_120556_create_cancel_job', 1),
(15, '2024_10_12_195037_create_service_offer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `family_member_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `taken_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `service_id`, `family_member_id`, `title`, `slug`, `description`, `gender`, `budget`, `date`, `time`, `start_time`, `end_time`, `taken_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 'This is Philip kane post number 1', 'This is Philip kane post number 1', 'The storeAs method allows you to specify a custom file name when uploading.The storeAs method allows you to specify a custom file name when uploading.', 'male', 3500.00, '2024-10-21', '04:32:00', '07:35:00', '20:36:00', 4, '2024-10-20 03:32:09', '2024-10-20 04:12:49'),
(2, 2, 3, 2, 'this is my post number 2', 'this is my post number 2', 'The storeAs method allows you to specify a custom file name when uploading.The storeAs method allows you to specify a custom file name when uploading.', 'female', 6500.00, '2024-10-21', '06:50:00', '20:52:00', '19:50:00', 3, '2024-10-20 03:47:37', '2024-10-26 20:16:01'),
(3, 5, 1, 1, 'Doctor', 'Doctor', 'just for test', 'male', 50000.00, '2024-10-03', '14:33:00', '16:33:00', '17:33:00', NULL, '2024-10-30 22:34:20', '2024-10-30 22:34:20'),
(4, 2, 2, 2, 'hedlinkjlksadjl;f', 'hedlinkjlksadjl;f', 'sdfsdfsdffdfsdffdgdfgf', 'male', 2544.00, '2024-11-13', '16:04:00', '04:03:00', '18:05:00', 3, '2024-11-07 01:02:44', '2024-11-07 01:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `profile_ratings`
--

CREATE TABLE `profile_ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `giver_id` bigint UNSIGNED NOT NULL,
  `taker_id` bigint UNSIGNED NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Child Care', 'Child-Care', 'We provide safe, nurturing environments for children of all ages. Each child receives personalized attention to foster their growth and development through play, education, and care.', 'Frontend/assets/img/services/child-care.png', '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(2, 'Patient Care', 'Patient-Care', 'Our compassionate caregivers support patients with daily activities, medication management, and recovery, ensuring their comfort and well-being throughout the process.', 'Frontend/assets/img/services/patient-care.png', '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(3, 'House Care', 'House Care', 'Our house care services help maintain clean and organized homes, including housekeeping, laundry, and meal preparation, ensuring your home remains comfortable and welcoming.', 'Frontend/assets/img/services/house-care.png', '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(4, 'Special Needs Care', 'Special-Needs-Care', 'We offer tailored care for individuals with special needs, addressing their physical, mental, and emotional challenges while promoting independence and well-being.', 'Frontend/assets/img/services/special-needs-care.png', '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(5, 'Autism Care', 'Autism-Care', 'Our autism care services create structured and supportive environments designed to meet the unique needs of individuals with autism, encouraging social skills, learning, and emotional development.', 'Frontend/assets/img/services/autism-care.png', '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(6, 'Senior Care', 'Senior-Care', 'Our compassionate senior care includes assistance with daily living, companionship, and health management, focusing on improving quality of life while ensuring safety, dignity, and independence.', 'Frontend/assets/img/services/senior-care.png', '2024-10-20 01:19:25', '2024-10-20 01:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_offer`
--

CREATE TABLE `service_offer` (
  `id` bigint UNSIGNED NOT NULL,
  `giver_id` bigint DEFAULT NULL,
  `taker_id` bigint DEFAULT NULL,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `carefor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_offer`
--

INSERT INTO `service_offer` (`id`, `giver_id`, `taker_id`, `service_title`, `service`, `budget`, `date`, `start_time`, `end_time`, `gender`, `carefor`, `description`, `is_accepted`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'The code checks if the $offers collection is not empty and then iterates over each offer to', '2', 6000.00, '2024-10-21', '05:40:00', '18:41:00', 'male', '2', 'The storeAs method allows you to specify a custom file name when uploading.The storeAs method allows you to specify a custom file name when uploading.', 1, '2024-10-20 03:38:28', '2024-10-20 03:39:01'),
(2, 4, 2, 'The code checks if the $offers collection is not empt', '1', 3500.00, '2024-10-21', '07:23:00', '20:25:00', 'male', '2', 'The code checks if the $offers collection is not empty and then iterates over each offer to', 1, '2024-10-20 04:21:11', '2024-10-20 04:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `account_type` enum('care_giver','care_taker') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `status`, `account_type`, `division`, `city`, `state`, `address`, `image`, `location`, `nid_number`, `nid_image`, `gender`, `service`, `budget`, `profile_heading`, `phone_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', '01643381009', 'user@gmail.com', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$mC8kLDLBmCevvUOxlPcL8.WsX/3V9T.Sal7Kp/.Sy.K6dLygffHV.', NULL, '2024-10-20 01:19:25', '2024-10-20 01:19:25'),
(2, 'Philip Kane', '01777608508', NULL, 'active', 'care_taker', 'Dhaka', 'khulna city', 'khulna state', 'House 417, Road 7, DOHS', 'storage/Profiles/1729416347_6714cc9b0d281.png', 'https://maps.app.goo.gl/M39Day8wMRxGZ7zj8', '1231456789', 'storage/user_nid/1729416477_6714cd1d3e63f.png', 'male', NULL, NULL, 'The error message indicates that the GD PHP extension is not installed or enabled on your system. The GD extension is required for image processing in PHP. Here’s how to resolve this issue:', '2024-10-20 01:22:25', '$2y$12$pEctLMY5v5Zm5rphie0/lenGiwfWPj7liR/795NoaA2CpWFYuhIHK', NULL, '2024-10-20 01:22:20', '2024-10-20 03:27:57'),
(3, 'Peggy Carter', '01319376909', NULL, 'active', 'care_giver', 'Dhaka', 'Rajshahi city', 'Rajshahi State', 'Rajshahi Address', 'storage/Profiles/1729416558_6714cd6e57de4.png', 'https://maps.app.goo.gl/ws471pcV4XYVkHz19', '54989754856', 'storage/user_nid/1729416656_6714cdd015db4.png', 'female', NULL, '5000', 'The storeAs method allows you to specify a custom file name when uploading.The storeAs method allows you to specify a custom file name when uploading.', '2024-10-20 01:23:50', '$2y$12$ckDuDqCVkyPg3uBVSWbtO.qtok9xIfCIc2bLsmaP95NiLKaZkqu/m', NULL, '2024-10-20 01:23:42', '2024-10-20 03:30:56'),
(4, 'Mr. David Sadek', '01319376908', NULL, 'active', 'care_giver', 'Rangpur', 'Rangpur city', 'Rangpur state', 'Rangpur address', 'storage/Profiles/1729417489_6714d11127076.jpg', 'https://maps.app.goo.gl/eHDuGD94RBw79FFL9', '32659874587', 'storage/user_nid/1729417566_6714d15e7365f.png', 'male', '3', '4800', 'The storeAs method allows you to specify a custom file name when uploading. The storeAs method allows you to specify a custom file name when uploading.', '2024-10-20 03:43:38', '$2y$12$L/ZTjsRin.qKWsCZZ3mURODHs95yvog.N3eGXBXoCgZXg0i6g1x6.', NULL, '2024-10-20 03:43:31', '2024-10-20 03:46:06'),
(5, NULL, '01308403442', NULL, 'active', 'care_taker', NULL, NULL, NULL, NULL, NULL, 'https://maps.app.goo.gl/fhG6PYHRuAp11ENR6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-26 20:13:19', '$2y$12$u5lxKaD99DUtjB.H4I1CKemoEJRo2UmQIunjW0b3ZRAcfgt1J398a', 'HO394MHW4u2P2f2LzXtbXDnlP2Lgq1hvu2Dzm4XCNNYBzlqKAtFrhloAdXsX', '2024-10-26 20:12:28', '2024-10-26 20:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cancel_job`
--
ALTER TABLE `cancel_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_mambers`
--
ALTER TABLE `family_mambers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `family_mambers_nid_number_unique` (`nid_number`),
  ADD KEY `family_mambers_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_giver_id_foreign` (`giver_id`),
  ADD KEY `jobs_taker_id_foreign` (`taker_id`),
  ADD KEY `jobs_post_id_foreign` (`post_id`),
  ADD KEY `jobs_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_service_id_foreign` (`service_id`),
  ADD KEY `posts_family_member_id_foreign` (`family_member_id`);

--
-- Indexes for table `profile_ratings`
--
ALTER TABLE `profile_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_ratings_giver_id_foreign` (`giver_id`),
  ADD KEY `profile_ratings_taker_id_foreign` (`taker_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_offer`
--
ALTER TABLE `service_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cancel_job`
--
ALTER TABLE `cancel_job`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_mambers`
--
ALTER TABLE `family_mambers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_ratings`
--
ALTER TABLE `profile_ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_offer`
--
ALTER TABLE `service_offer`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family_mambers`
--
ALTER TABLE `family_mambers`
  ADD CONSTRAINT `family_mambers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_giver_id_foreign` FOREIGN KEY (`giver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_taker_id_foreign` FOREIGN KEY (`taker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_family_member_id_foreign` FOREIGN KEY (`family_member_id`) REFERENCES `family_mambers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_ratings`
--
ALTER TABLE `profile_ratings`
  ADD CONSTRAINT `profile_ratings_giver_id_foreign` FOREIGN KEY (`giver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_ratings_taker_id_foreign` FOREIGN KEY (`taker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

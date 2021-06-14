-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2021 at 06:34 PM
-- Server version: 5.7.31
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalregistrysystem2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `hospital_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@admin.com', '$2y$04$sJbJqpv7TH5RrgTPq0raburfQ6g1XOQtgd59Dgz.VCGlr8f5gUvm6', NULL, 'fBqtFM55aKqzwFeo7E8ldP01el82lMqIwdOLXcCJ0bhmNrPONYrE4ZCf9rdU', '2021-05-25 11:59:16', '2021-05-25 11:59:16'),
(2, 'labaid agent', 'ag1@gmail.com', '$2y$10$op38eDt2Qifa7dfDIduUOufu52R7Y2jWB71cu2HlEZMXk1J6lpb3G', 1, NULL, '2021-05-25 20:52:57', '2021-05-25 20:52:57'),
(3, 'Doctor 1', 'doc1@gmail.com', '$2y$10$/GW9QPagy/dsG4CGSYNKbu3EMrmxUyd5jm3RQfd4jBZcaCAr8YxP.', 4, NULL, '2021-05-25 20:57:44', '2021-05-28 23:14:01'),
(4, 'Sysyem User 1', 'sys1@gmail.com', '$2y$10$YwWLZyDG0Q/ZM2mj9YAzYOdPPAfQR7JCr.YNBnTArUCNkRik8mVQy', NULL, NULL, '2021-05-28 17:51:52', '2021-05-28 17:51:52'),
(5, 'Dcotor 2', 'doc2@gmail.com', '$2y$10$pt8pJxebVXPU0qUT3ZJRBuOVUawbxYvPEOa1ItpSqL7YLJiEa719m', 1, NULL, '2021-05-28 23:06:39', '2021-05-28 23:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_role_admin_id_foreign` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `role_id`, `admin_id`) VALUES
(1, 1, 1),
(2, 4, 2),
(3, 3, 3),
(5, 4, 3),
(6, 2, 4),
(7, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE IF NOT EXISTS `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `diseases_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Heart disease 1', 'Heart disease is the leading cause of deathTrusted Source for both men and women. This is the case in the U.S. and worldwide.', '2021-05-29 09:28:05', '2021-05-29 09:29:28'),
(4, 'Cancer', 'Cancer occurs when cells do not die at the normal point in their life cycle.', '2021-05-29 09:30:38', '2021-05-29 09:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hospitals_name_unique` (`name`),
  UNIQUE KEY `hospitals_phone_unique` (`phone`),
  UNIQUE KEY `hospitals_address_unique` (`address`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'LABAID Specialized Hospital', '09666710606', 'House- -1 and, 6 Road No 4, Dhaka 1205', '2021-05-28 20:28:15', '2021-05-28 22:37:51'),
(2, 'Square Hospitals Ltd.', '028144400', '18 Bir Uttam Qazi Nuruzzaman Sarak West, Panthapath, Dhaka 1205', '2021-05-28 20:33:16', '2021-05-28 20:33:16'),
(4, 'Evercare Hospital Dhaka', '09666710607', 'Plot: 81 Block: E, Dhaka 1229', '2021-05-28 22:19:36', '2021-05-28 22:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_06_023521_create_admins_table', 1),
(4, '2017_03_06_053834_create_admin_role_table', 1),
(5, '2018_03_06_023523_create_roles_table', 1),
(6, '2021_05_29_014844_create_hospitals_table', 2),
(7, '2021_05_29_135552_create_treatments_table', 3),
(8, '2021_05_29_151045_create_diseases_table', 4),
(9, '2021_05_29_154851_create_patients_table', 5),
(15, '2021_05_29_180323_create_prescriptions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patients_email_unique` (`email`),
  UNIQUE KEY `patients_code_unique` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `address`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Rifat 1', 'rifatron999@gmail.com', 'demra , sanarpar', '60b21b2459342', '2021-05-29 10:45:26', '2021-05-29 10:49:21'),
(3, 'Mojaded Kawsar', 'mojaded@gmail.com', 'address', '60b38339319e9', '2021-05-30 12:21:38', '2021-05-30 12:21:38'),
(4, 'Xahid Hossain', 'xahid123@gmail.com', 'address', '60b38352c83b8', '2021-05-30 12:22:26', '2021-05-30 12:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `disease_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `title`, `description`, `division`, `district`, `status`, `date`, `patient_id`, `hospital_id`, `doctor_id`, `disease_id`, `treatment_id`, `created_at`, `updated_at`) VALUES
(1, 'title', 'des', 'Dhaka', 'Dhaka', 'In Progress', '2021-05-30', 3, 4, 3, '[\"1\",\"4\"]', '[\"1\",\"2\",\"3\",\"4\"]', '2021-05-30 15:39:23', '2021-05-30 15:39:23'),
(2, 'title', 'des', 'Dhaka', 'Dhaka', 'Healthy', '2021-05-30', 3, 4, 3, '[\"1\",\"4\"]', '[\"1\",\"2\",\"3\",\"4\"]', '2021-05-30 15:39:23', '2021-05-30 15:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super', '2021-05-25 11:59:16', '2021-05-25 11:59:16'),
(2, 'system_user', '2021-05-25 20:41:29', '2021-05-25 21:04:24'),
(3, 'doctor', '2021-05-25 20:41:50', '2021-05-25 20:41:50'),
(4, 'hospital_agent', '2021-05-25 20:42:01', '2021-05-25 21:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

DROP TABLE IF EXISTS `treatments`;
CREATE TABLE IF NOT EXISTS `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `treatments_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Radiation Therapies', 'Radiation therapy, or radiotherapy, uses high-energy rays to damage or kill cancer cells by preventing them from growing and dividing. Similar to surgery, radiation therapy is a local', 'Therapy', '2021-05-29 08:24:07', '2021-05-29 08:24:07'),
(2, 'Targeted Therapies', 'A targeted therapy is designed to treat only the cancer cells and minimize damage to normal, healthy cells.', 'Therapy', '2021-05-29 08:24:58', '2021-05-29 08:24:58'),
(3, 'Surgery', 'Surgery is used in many ways, including for diagnosing cancer, determining the stage of the cancer, removing the primary tumor and relieving symptoms.', 'Surgery', '2021-05-29 08:25:30', '2021-05-29 08:25:30'),
(4, 'Histasin tablets 10mg', 'The antihistamine relieves itchy/watery eyes and itchy throat by blocking a substance (histamine) released by allergies.', 'Medicine', '2021-05-29 08:28:46', '2021-05-29 08:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

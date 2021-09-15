-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 06:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educare`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subject_id`, `chapter_no`, `chapter_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 8, 'one', 'Introduction to algebra', 0, '2021-03-31 05:02:00', '2021-03-31 05:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(191) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `status`, `created_at`, `updated_at`) VALUES
(18, 'eleventh', 0, '2021-03-26 04:28:37', '2021-04-08 07:49:48'),
(20, 'Twelve', 0, NULL, '2021-04-08 07:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `teacher_id`, `class_id`, `created_at`, `updated_at`) VALUES
(9, 30, 18, '2021-04-21 03:24:07', '2021-04-21 03:24:07'),
(10, 30, 18, '2021-04-21 03:33:29', '2021-04-21 03:33:29'),
(11, 30, 18, '2021-04-21 03:33:33', '2021-04-21 03:33:33'),
(12, 30, 18, '2021-04-21 03:35:16', '2021-04-21 03:35:16'),
(13, 30, 18, '2021-04-21 03:57:21', '2021-04-21 03:57:21'),
(14, 30, 18, '2021-04-21 03:58:57', '2021-04-21 03:58:57'),
(15, 30, 18, '2021-04-21 03:59:19', '2021-04-21 03:59:19'),
(16, 30, 18, '2021-04-21 03:59:34', '2021-04-21 03:59:34'),
(17, 30, 18, '2021-04-21 05:38:11', '2021-04-21 05:38:11'),
(18, 30, 18, '2021-04-21 05:38:34', '2021-04-21 05:38:34'),
(19, 30, 18, '2021-04-21 07:37:45', '2021-04-21 07:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `image_notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `topic_id`, `teacher_id`, `image_notes`, `video_notes`, `video_url`, `name`, `created_at`, `updated_at`) VALUES
(21, 5, 30, 'http://127.0.0.1:8000/content/image_notes/1619498393.jpg', 'http://127.0.0.1:8000/content/video_notes/1619498393.pdf', 'http://127.0.0.1:8000/content/video/1619498393.mp4', 'test', '2021-04-26 23:09:53', '2021-04-26 23:09:53'),
(22, 5, 30, 'http://127.0.0.1:8000/content/image_notes/1619498475.jpg', 'http://127.0.0.1:8000/content/video_notes/1619498475.pdf', 'http://127.0.0.1:8000/content/video/1619498475.mp4', 'ekart', '2021-04-26 23:11:15', '2021-04-26 23:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_03_15_115224_create_role_users_table', 5),
(36, '2021_03_06_095536_create_classes_table', 6),
(37, '2021_03_06_095537_create_students_table', 6),
(40, '2021_03_06_095818_create_class_subjects_table', 7),
(43, '2021_03_06_100231_create_topics_table', 7),
(45, '2021_03_15_121939_create_chats_table', 7),
(48, '2021_03_20_073813_create_types_table', 8),
(49, '2021_03_20_074025_create_contents_table', 9),
(50, '2021_03_06_095818_create_teachers_table', 10),
(52, '2021_03_06_095817_create_subjects_table', 11),
(53, '2014_10_11_095355_create_roles_table', 12),
(54, '2014_10_12_000000_create_users_table', 12),
(56, '2021_03_06_100124_create_chapters_table', 13),
(57, '2021_03_06_095816_create_types_table', 14),
(58, '2021_03_06_095819_create_class_teachers_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0cd785d7a6b61a8330dfe214faef9a92f7627bb28797034782314fee18210109cfe5cd1087254c66', 13, 1, 'eduapp token', '[]', 0, '2021-04-07 04:21:44', '2021-04-07 04:21:44', '2022-04-07 09:51:44'),
('0d7e9fd7d173334e10e8bda6217bb24d34dea2bcf429673ffb6d6603f12a607e2ba64ef45de78ca7', 9, 1, 'eduapp token', '[]', 0, '2021-03-30 23:41:03', '2021-03-30 23:41:03', '2022-03-31 05:11:03'),
('11be596ef15c37feb596ab4acea2e8d437eee99436c28827a1cbb01005aa50ac96543de837d715f0', 16, 1, 'eduapp token', '[]', 0, '2021-04-12 00:26:37', '2021-04-12 00:26:37', '2022-04-12 05:56:37'),
('232e2175038dee0ff19412c90efc36afdf0ed9a4fcc0a9a2f44209eacdfd32b7c357b7913b4274d4', 21, 1, 'eduapp token', '[]', 0, '2021-04-14 23:12:25', '2021-04-14 23:12:25', '2022-04-15 04:42:25'),
('35ae298b44ce9f6cbe1827bd9889dee38ff62cc7c6131ad0117b22283c29ad57a15aee76284d596c', 32, 1, 'eduapp token', '[]', 0, '2021-03-22 07:51:48', '2021-03-22 07:51:48', '2022-03-22 13:21:48'),
('3d46390ef2cfedf98444844f5529c5b16d47ba14ea74f09aa06ac1cda363ffc2170d4fb578ce4336', 20, 1, 'eduapp token', '[]', 0, '2021-04-14 23:09:39', '2021-04-14 23:09:39', '2022-04-15 04:39:39'),
('48a6f70b7280c7983d91b15a1342db95a2b907831207a6b324daea01e7df1a454e5a278404841cdd', 25, 1, 'eduapp token', '[]', 0, '2021-04-25 23:01:33', '2021-04-25 23:01:33', '2022-04-26 04:31:33'),
('4d8825cefd2a844c03bf9f1d0b2289b978a4d5247e2f3ea336680c93ac4161ac2a7ce4653e08f6f4', 26, 1, 'eduapp token', '[]', 0, '2021-03-19 07:13:13', '2021-03-19 07:13:13', '2022-03-19 12:43:13'),
('58d8c7e3e5582db427142bca0c4a55549167d534fd860b56e99be662e66cbeefb92a6f69acd3948b', 31, 1, 'eduapp token', '[]', 0, '2021-03-22 23:20:34', '2021-03-22 23:20:34', '2022-03-23 04:50:34'),
('5f729efdac171c4f002e5ff948c00d873634d3ea4899e5d7ad7403a83476d302474610f36152dfb6', 10, 1, 'eduapp token', '[]', 0, '2021-04-01 01:37:10', '2021-04-01 01:37:10', '2022-04-01 07:07:10'),
('66c794edd496ae17f2342f19c2370b8ff27a436aec7aa326ffe72520138a0d379528952616c46daa', 28, 1, 'eduapp token', '[]', 0, '2021-03-22 06:47:36', '2021-03-22 06:47:36', '2022-03-22 12:17:36'),
('71ffb39667ca353217308180b8abc0bbfd294ba0e1188ecd127840880a2711e6d9c8b45e650155a3', 33, 1, 'eduapp token', '[]', 0, '2021-03-23 04:43:19', '2021-03-23 04:43:19', '2022-03-23 10:13:19'),
('775642ba604bebb315f2faf590b4d793e6f409db966f8db511136c58532c14988cad3db82476d11a', 24, 1, 'eduapp token', '[]', 0, '2021-04-19 06:32:07', '2021-04-19 06:32:07', '2022-04-19 12:02:07'),
('78926676cf2ea10c0e78230823d2edc467f814ded770666a1704a9c4c1d40c63ba30e7568309c9c5', 9, 1, 'eduapp token', '[]', 0, '2021-03-13 01:10:41', '2021-03-13 01:10:41', '2022-03-13 06:40:41'),
('86fd8ced9a0cba853f66093d0c3cfd3ad3f27a910acbbdba37476825042c2c8ee7ae18882430ac15', 7, 1, 'eduapp token', '[]', 0, '2021-04-26 22:56:50', '2021-04-26 22:56:50', '2022-04-27 04:26:50'),
('88b8783e620769d4190cb143716097124043ea46b4f1f0e068d29d48faa4c46f304113fc1d581291', 20, 1, 'eduapp token', '[]', 0, '2021-03-17 04:02:27', '2021-03-17 04:02:27', '2022-03-17 09:32:27'),
('8b01e0b38eaa9bdf79ef0ec984c006b5bee10644883c74fb67351334b1d25312cd7d930a97fbe2ae', 21, 1, 'eduapp token', '[]', 0, '2021-03-17 04:18:06', '2021-03-17 04:18:06', '2022-03-17 09:48:06'),
('947a84fa129102df6d3f1d07c9346bc8a09d2041ce3d9269cbba65772a86a5249bb87fa31c667229', 18, 1, 'eduapp token', '[]', 0, '2021-03-17 03:55:28', '2021-03-17 03:55:28', '2022-03-17 09:25:28'),
('9e6876950cd6e9884016ae33a0e558b8f29fe1fb7959f41a2647324077c84d3252b111bbd0c7ca96', 29, 1, 'eduapp token', '[]', 0, '2021-03-22 06:15:39', '2021-03-22 06:15:39', '2022-03-22 11:45:39'),
('a2136a03e67be5a7fcb40739616c43c59313946b40d4af07e4df3780210204b646571ae3763c78fc', 5, 1, 'eduapp token', '[]', 0, '2021-03-30 05:40:21', '2021-03-30 05:40:21', '2022-03-30 11:10:21'),
('a5080aec30512e85ad7d2a94330f8acfbfab4a6b25023612ba61df9b5673a25d834f771d68801b52', 8, 1, 'eduapp token', '[]', 0, '2021-04-26 23:01:45', '2021-04-26 23:01:45', '2022-04-27 04:31:45'),
('a63406166c8fe52065fae746dbd794fec32d8b3dbc4d3e3008baebcebcf12dfbcaf3a5200d39f952', 27, 1, 'eduapp token', '[]', 0, '2021-03-22 00:49:05', '2021-03-22 00:49:05', '2022-03-22 06:19:05'),
('a823c671b4df47cc9437ef242f2b4a75bb7d6ce707ac681029aad862ee725537b81146728812edf3', 15, 1, 'eduapp token', '[]', 0, '2021-04-15 01:44:22', '2021-04-15 01:44:22', '2022-04-15 07:14:22'),
('c2908dcdede08ecdf0b7b72d66d14455100c81890371d7d4b110363a9888cf941399c78ff610de65', 11, 1, 'eduapp token', '[]', 0, '2021-04-01 01:42:16', '2021-04-01 01:42:16', '2022-04-01 07:12:16'),
('c8acf3c463f7e81549a0b415ba5b54805d8ebf56eaa6161f7d13e25e50d011ca75a0ceb46242c774', 19, 1, 'eduapp token', '[]', 0, '2021-04-13 22:49:51', '2021-04-13 22:49:51', '2022-04-14 04:19:51'),
('d107592c1007e789cd550157a8476be8db650bbf0e98812c6daad8ea890db95e6cf68b0ee9b806e4', 23, 1, 'eduapp token', '[]', 0, '2021-03-18 05:49:15', '2021-03-18 05:49:15', '2022-03-18 11:19:15'),
('df53856ebdb16ed791c1a58e56dcb374780baf4853b7b6b6845b8736370e78deb30031d543474e1f', 34, 1, 'eduapp token', '[]', 0, '2021-03-23 01:17:36', '2021-03-23 01:17:36', '2022-03-23 06:47:36'),
('f1ed4f07c90bde94ae08762849bf3d29c55321fc20f525c1f3806cf7eb38a7964822ceb2a5711e4b', 30, 1, 'eduapp token', '[]', 0, '2021-03-22 06:28:53', '2021-03-22 06:28:53', '2022-03-22 11:58:53'),
('fe9bb7f69fd63d3d0aa67d7a8ad2e75b8f4a7e174a5a66fb0a6f6831892ae55d150cf4b8dfe778eb', 17, 1, 'eduapp token', '[]', 0, '2021-04-12 06:12:49', '2021-04-12 06:12:49', '2022-04-12 11:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'NPdSimKmSi8IG49Y0ojD5WWhpSrOfzU66g0wEIXi', NULL, 'http://localhost', 1, 0, 0, '2021-03-12 02:48:05', '2021-03-12 02:48:05'),
(2, NULL, 'Laravel Password Grant Client', 'qIxrCWie7z3DFzMFiYMlklq3EPKSonHnzvXqA3Se', 'users', 'http://localhost', 0, 1, 0, '2021-03-12 02:48:05', '2021-03-12 02:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-12 02:48:05', '2021-03-12 02:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Student', NULL, NULL),
(3, 'Teacher', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `class_id`, `mobile_no`, `gender_id`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(7, 8, 20, '8', 1, '2021-01-06', '2021-03-30 05:44:03', '2021-04-04 23:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `class_id`, `subject_name`, `subject_code`, `status`, `created_at`, `updated_at`) VALUES
(8, 18, 'Maths', 1, 0, '2021-03-31 03:54:38', '2021-03-31 03:54:38'),
(9, 18, 'Physics', 12, 0, NULL, NULL),
(10, 20, 'English', 13, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(191) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `first_name`, `last_name`, `email`, `image`, `mobile_no`, `gender_id`, `date_of_birth`, `current_address`, `permanent_address`, `father_name`, `mother_name`, `marital_status`, `identity_doc`, `qualification_doc`, `created_at`, `updated_at`) VALUES
(30, 7, 'kap', 'sharma', 't@t', 'http://127.0.0.1:8000/teacher/teacher_image/1618045884.jpg', '10', 2, '2021-12-12', 'ca', 'pa', 'father', 'mn', 'married', 'http://127.0.0.1:8000/teacher/teacher_doc/1618045884.png', 'http://127.0.0.1:8000/teacher/teacher_doc/1618045884.jpg', '2021-03-30 05:43:20', '2021-04-10 03:41:24'),
(31, 13, 'kalesh', 'sharma', 'y@k', NULL, '10', 2, '2021-12-12', 'ca', 'pa', 'father', 'mn', 'married', NULL, NULL, '2021-04-07 04:21:44', '2021-04-07 04:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(191) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `chapter_id`, `topic_name`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 'algebra formula\'s', 0, '2021-03-31 06:46:43', '2021-03-31 06:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'content', NULL, NULL),
(2, 'Profile', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deactivate` int(15) NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(191) NOT NULL DEFAULT 0,
  `verification_code` int(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `deactivate`, `role_id`, `status`, `verification_code`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'y@e', '$2y$10$CH5h4KiWEII5ZCSk.wsOweACvu1mfCHTTWD9FpAw.BrJutk8WtGIu', 0, 3, 0, NULL, NULL, NULL, '2021-03-30 05:43:20', '2021-03-30 05:43:20'),
(8, 'y@d', '$2y$10$6Bhfeo0PqWzxbbxFWHqPreKAmAZ8UtlYuEOpGmxggGgqDvF7V7CeK', 0, 2, 0, NULL, NULL, NULL, '2021-03-30 05:44:03', '2021-04-01 01:32:28'),
(9, 'y@c', '$2y$10$WZCsrEKNJ/g3Bv6Lu4mIqu1cLl6Dlz9r8cWhF61y393f5Le2BPYZO', 0, 1, 0, NULL, NULL, NULL, '2021-03-30 23:41:00', '2021-04-01 01:25:41'),
(11, 'y@b', '$2y$10$B3RntMLVWcBFp8phTYIexec8uK2ZxGiZRSrB7dXCihYh.tXYsqz2C', 1, 1, 0, NULL, NULL, NULL, '2021-04-01 01:42:16', '2021-04-10 11:57:39'),
(12, 't@t', '$2y$10$3TLUghmjKBiocNGLR7j5JeWOZMFUiC2tNIUVwgcn3p2X5DqQiMmEa', 1, 1, 0, NULL, NULL, NULL, '2021-04-03 04:49:42', '2021-04-03 04:49:42'),
(13, 'y@k', '$2y$10$GK1z16iT9WQOFr9.14lNn.b6TccKEp5WnAITncEKHd4cCBy/0hYOy', 1, 3, 0, NULL, NULL, NULL, '2021-04-07 04:21:44', '2021-04-07 04:21:44'),
(15, 'y@n', '$2y$10$eMJYJXA4IRpnd1j6I0rfzeBjbHrQoawDK.8NMd3N8.92ooNrfnz9S', 1, 3, 0, NULL, NULL, NULL, '2021-04-07 07:32:38', '2021-04-10 00:57:44'),
(25, 'yogeshsainihere@gmail.com', '$2y$10$yt5BCyxzshsqZ4wK.jiqM.xlYnAKQ4mAcxdx3oJxOtV/XxqLoFXSG', 1, 1, 0, 984838, '2021-04-19 06:37:49', NULL, '2021-04-19 06:34:04', '2021-04-25 23:06:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `class_teachers_class_id_foreign` (`class_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_topic_id_foreign` (`topic_id`),
  ADD KEY `contents_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_class_id_foreign` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD CONSTRAINT `class_teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contents_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 10:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ant_app_maheeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_employees`
--

CREATE TABLE `assign_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved_a` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved_s` tinyint(1) NOT NULL DEFAULT 0,
  `approving_superAdmin_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `attendance_date`, `check_in`, `check_out`, `duration`, `status`, `is_approved_a`, `is_approved_s`, `approving_superAdmin_id`) VALUES
(1, 3, '2020-08-04 19:20:14.890798', '07:15:10', '16:00:00', '09:14:00', 'Late', 0, 1, NULL),
(2, 3, '2020-08-03 19:20:23.173301', '07:15:10', '16:00:00', '09:14:00', 'Late', 0, 1, 1),
(3, 3, '2020-08-04 18:00:00.000000', '00:40:08', '01:06:44', '00:11:56', 'present', 0, 1, 27),
(5, 1, '2020-08-05 18:00:00.000000', '16:37:37', '17:13:01', '00:30:24', 'late', 0, 1, 1),
(6, 1, '2020-08-07 18:00:00.000000', '00:49:19', '00:49:21', '00:00:02', 'present', 0, 1, 1),
(14, 1, '2020-08-25 18:00:00.000000', '00:49:19', '00:49:21', '00:00:02', 'present', 0, 1, 1),
(15, 3, '2020-08-25 18:00:00.000000', '00:49:19', '00:49:21', '00:00:02', 'Late', 0, 1, 1),
(16, 3, '2020-08-24 18:00:00.000000', '00:49:19', '00:49:21', '00:00:02', 'Late', 0, 1, 1),
(17, 1, '2020-08-24 18:00:00.000000', '00:49:19', '00:49:21', '00:00:02', 'present', 0, 1, 1),
(18, 8, '2020-08-24 18:00:00.000000', '00:49:19', '00:49:21', '00:00:02', 'Absent', 0, 1, 1),
(19, 1, '2020-08-26 18:00:00.000000', '10:16:00', '16:16:00', '06:00:06', 'late', 0, 1, 1),
(20, 3, '2020-08-03 18:00:00.000000', NULL, NULL, '00:00:00', 'present', 0, 1, 1),
(21, 1, '2020-08-07 18:00:00.000000', '00:49:19', '21:57:20', '15:17:45', 'present', 0, 1, 1),
(22, 3, '2020-08-05 18:00:00.000000', NULL, NULL, '00:00:00', 'present', 0, 1, 1),
(23, 1, '2020-08-24 18:00:00.000000', NULL, NULL, '00:00:00', 'present', 0, 1, 1),
(24, 27, '2020-08-03 18:00:00.000000', NULL, NULL, '00:00:00', 'present', 0, 1, 1),
(25, 1, '2020-08-06 18:00:00.000000', NULL, NULL, '00:00:00', 'present', 0, 1, 1),
(26, 3, '2020-08-26 18:00:00.000000', '00:12:00', '18:46:29', '08:14:36', 'present', 0, 1, 1),
(27, 8, '2020-08-26 06:00:00.000000', NULL, NULL, '00:00:00', 'present', 0, 1, 1),
(28, 1, '2020-09-02 06:00:00.000000', '13:13:04', '13:14:44', '00:00:46', 'late', 0, 1, 1),
(29, 1, '2020-09-02 06:00:00.000000', '13:13:04', '13:51:14', '00:01:08', 'late', 0, 1, 1),
(30, 3, '2020-09-02 06:00:00.000000', '13:51:38', '13:51:43', '00:00:05', 'late', 0, 1, 1),
(31, 35, '2020-09-03 06:00:00.000000', '21:48:27', '21:49:18', '00:00:36', 'late', 0, 1, 1),
(32, 36, '2020-09-07 06:00:00.000000', '11:56:00', '17:56:00', '06:00:00', 'late', 0, 1, 1),
(33, 34, '2020-09-07 06:00:00.000000', '09:56:00', '18:00:00', '08:04:00', 'present', 0, 1, 1),
(34, 43, '2020-09-10 06:00:00.000000', '14:12:25', NULL, '00:00:00', 'late', 0, 1, 28),
(35, 1, '2020-09-14 04:07:36.242183', '10:07:15', NULL, '00:00:00', 'present', 0, 1, 1),
(36, 27, '2020-09-14 04:07:36.250980', '10:01:33', NULL, '00:00:00', 'present', 0, 1, 1),
(37, 35, '2020-09-14 04:07:36.254533', '09:50:45', NULL, '00:00:00', 'present', 0, 1, 1),
(38, 45, '2020-09-14 04:07:36.264920', '09:38:40', NULL, '00:00:00', 'present', 0, 1, 1),
(39, 46, '2020-09-14 04:07:36.269020', '09:38:51', NULL, '00:00:00', 'present', 0, 1, 1),
(40, 48, '2020-09-14 04:07:36.278601', '10:04:54', NULL, '00:00:00', 'present', 0, 1, 1),
(41, 49, '2020-09-14 04:07:36.281867', '09:46:41', NULL, '00:00:00', 'present', 0, 1, 1),
(42, 50, '2020-09-14 04:07:36.284935', '10:00:35', NULL, '00:00:00', 'present', 0, 1, 1),
(43, 51, '2020-09-14 04:07:36.288209', '09:58:53', NULL, '00:00:00', 'present', 0, 1, 1),
(46, 1, '2020-09-26 18:00:00.000000', '10:02:00', '19:39:00', '09:37:00', 'present', 0, 1, 1),
(47, 49, '2020-09-26 18:00:00.000000', '10:02:00', '19:53:00', '09:51:00', 'present', 0, 1, 1),
(48, 52, '2020-09-27 18:00:00.000000', '10:00:00', '19:51:00', '09:51:00', 'present', 0, 1, 1),
(50, 27, '2020-09-27 18:00:00.000000', '10:02:00', '10:57:00', '00:55:00', 'present', 0, 1, 1),
(51, 35, '2020-09-29 18:00:00.000000', '10:04:00', '19:51:00', '09:47:00', 'present', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_logs`
--

CREATE TABLE `attendance_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `is_approved_a` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved_s` tinyint(1) NOT NULL DEFAULT 0,
  `approving_superAdmin_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_logs`
--

INSERT INTO `attendance_logs` (`id`, `user_id`, `attendance_date`, `check_in`, `check_out`, `status`, `duration`, `is_approved_a`, `is_approved_s`, `approving_superAdmin_id`) VALUES
(1, 3, '2020-08-27 06:36:22.305943', '18:21:38', '18:23:29', 'late', '00:01:51', 0, 1, 1),
(2, 3, '2020-08-27 06:36:22.305943', '18:23:33', '18:23:35', 'late', '00:00:02', 0, 1, 1),
(3, 27, '2020-08-27 06:47:16.301351', '18:24:18', '18:24:29', 'late', '00:00:11', 0, 1, 1),
(4, 27, '2020-08-27 06:47:16.301351', '18:24:31', '18:24:35', 'late', '00:00:04', 0, 1, 1),
(5, 27, '2020-08-27 06:47:16.301351', '18:24:40', '18:24:49', 'late', '00:00:09', 0, 1, 1),
(6, 3, '2020-08-27 06:36:22.305943', '18:27:57', '18:29:22', 'late', '00:01:25', 0, 1, 1),
(7, 3, '2020-08-27 06:36:22.305943', '18:31:32', '18:42:31', 'late', '00:10:59', 0, 1, 1),
(8, 3, '2020-08-27 06:36:22.305943', '18:46:07', '18:46:20', 'late', '00:00:13', 0, 1, 1),
(9, 3, '2020-08-27 06:36:22.305943', '18:46:23', '18:46:29', 'late', '00:00:06', 0, 1, 1),
(11, 3, '2020-08-05 17:00:08.148381', '00:40:08', '00:41:26', 'present', '00:01:18', 0, 1, 27),
(12, 3, '2020-08-05 17:00:08.148381', '00:43:24', '00:43:27', 'present', '00:00:03', 0, 1, 27),
(13, 3, '2020-08-05 17:00:08.148381', '00:43:36', '00:44:12', 'present', '00:00:36', 0, 1, 27),
(14, 3, '2020-08-05 17:00:08.148381', '00:44:26', '00:44:42', 'present', '00:00:16', 0, 1, 27),
(15, 3, '2020-08-05 17:00:08.148381', '00:45:01', '00:45:06', 'present', '00:00:05', 0, 1, 27),
(16, 3, '2020-08-05 17:00:08.148381', '00:45:10', '00:45:13', 'present', '00:00:03', 0, 1, 27),
(17, 3, '2020-08-05 17:00:08.148381', '00:45:15', '00:52:06', 'present', '00:06:51', 0, 1, 27),
(18, 3, '2020-08-05 17:00:08.148381', '00:52:12', '00:52:16', 'present', '00:00:04', 0, 1, 27),
(19, 3, '2020-08-05 17:00:08.148381', '01:03:48', '01:03:52', 'present', '00:00:04', 0, 1, 27),
(20, 3, '2020-08-05 17:00:08.148381', '01:03:56', '01:03:58', 'present', '00:00:02', 0, 1, 27),
(21, 3, '2020-08-05 17:00:08.148381', '01:04:00', '01:04:03', 'present', '00:00:03', 0, 1, 27),
(22, 3, '2020-08-05 17:00:08.148381', '01:04:10', '01:04:14', 'present', '00:00:04', 0, 1, 27),
(23, 3, '2020-08-05 17:00:08.148381', '01:04:17', '01:06:44', 'present', '00:02:27', 0, 1, 27),
(27, 3, '2020-08-27 06:46:56.799235', '00:12:00', '00:12:00', 'Meeting Late', '00:00:00', 0, 1, 1),
(28, 1, '2020-08-06 11:14:20.275258', '16:37:37', '16:38:05', 'late', '00:00:28', 0, 1, 1),
(29, 1, '2020-08-06 11:14:20.275258', '16:43:05', '17:13:01', 'late', '00:29:56', 0, 1, 1),
(30, 1, '2020-08-27 06:36:30.153393', '18:15:08', '18:15:17', 'late', '00:00:09', 0, 1, 1),
(31, 1, '2020-08-27 06:36:30.153393', '18:15:19', '18:15:21', 'late', '00:00:02', 0, 1, 1),
(32, 1, '2020-08-27 06:36:30.153393', '18:18:29', '18:41:25', 'late', '00:22:56', 0, 1, 1),
(33, 1, '2020-08-27 06:36:30.153393', '22:40:11', '22:42:01', 'late', '00:01:50', 0, 1, 1),
(34, 1, '2020-08-27 06:47:24.534821', '02:54:14', NULL, 'present', NULL, 0, 1, 1),
(35, 1, '2020-08-08 02:21:20.466311', '00:49:19', '00:49:21', 'present', '00:00:02', 0, 1, 1),
(36, 1, '2020-08-08 15:57:20.000000', '06:39:37', '21:57:20', 'present', '15:17:43', 0, 1, 1),
(37, 1, '2020-08-27 06:36:44.759227', '22:06:58', '22:08:41', 'late', '00:01:43', 0, 1, 1),
(38, 1, '2020-08-27 06:47:08.374897', '18:25:15', '18:25:29', 'late', '00:00:14', 0, 1, 1),
(39, 1, '2020-08-27 04:17:01.142348', '10:16:00', '10:16:06', 'late', '00:00:06', 0, 1, 1),
(40, 1, '2020-08-27 04:17:01.142348', '10:16:00', '16:16:00', 'Meeting Late', '06:00:00', 0, 1, 1),
(41, 3, '2020-08-27 08:01:45.365000', '10:20:00', '18:20:00', 'Late', '08:00:00', 0, 1, 1),
(42, 27, '2020-08-26 18:00:00.000000', '10:21:00', '18:21:00', 'Late', '08:00:00', 0, 0, NULL),
(43, 8, '2020-08-30 18:02:04.978092', '10:00:00', '18:00:00', 'InTime', '08:00:00', 0, 1, 1),
(44, 28, '2020-08-26 18:00:00.000000', '10:00:00', '18:50:00', 'InTime', '08:50:00', 0, 0, NULL),
(45, 1, '2020-08-31 09:14:53.000000', '03:14:32', '03:14:53', 'present', '00:00:21', 0, 0, NULL),
(46, 3, '2020-08-31 18:47:11.000000', '12:46:51', '12:47:11', NULL, '00:00:20', 0, 0, NULL),
(47, 1, '2020-08-31 23:25:24.000000', '16:04:31', '17:25:24', 'late', '01:20:53', 0, 0, NULL),
(48, 1, '2020-08-31 23:29:02.000000', '17:29:02', NULL, 'late', NULL, 0, 0, NULL),
(49, 27, '2020-09-01 17:32:49.000000', '11:29:43', '11:32:49', NULL, '00:03:06', 0, 0, NULL),
(50, 27, '2020-09-01 21:49:36.000000', '15:44:44', '15:49:36', 'late', '00:04:52', 0, 0, NULL),
(51, 27, '2020-09-01 21:50:10.000000', '15:49:53', '15:50:10', 'late', '00:00:17', 0, 0, NULL),
(52, 1, '2020-09-01 21:51:25.000000', '15:51:01', '15:51:25', NULL, '00:00:24', 0, 0, NULL),
(53, 1, '2020-09-02 07:49:20.495316', '13:13:04', '13:13:39', 'late', '00:00:35', 0, 1, 1),
(54, 1, '2020-09-02 07:49:20.495316', '13:14:33', '13:14:44', 'late', '00:00:11', 0, 1, 1),
(55, 1, '2020-09-02 07:53:03.826757', '13:50:33', '13:50:40', 'late', '00:00:07', 0, 1, 1),
(56, 1, '2020-09-02 07:53:03.826757', '13:50:43', '13:50:49', 'late', '00:00:06', 0, 1, 1),
(57, 1, '2020-09-02 07:53:03.826757', '13:50:53', '13:50:57', 'late', '00:00:04', 0, 1, 1),
(58, 1, '2020-09-02 07:53:03.826757', '13:51:09', '13:51:14', 'late', '00:00:05', 0, 1, 1),
(59, 3, '2020-09-02 07:53:14.932294', '13:51:38', '13:51:43', 'late', '00:00:05', 0, 1, 1),
(60, 35, '2020-09-03 15:55:06.125090', '21:48:27', '21:48:46', 'late', '00:00:19', 0, 1, 1),
(61, 35, '2020-09-03 15:55:06.125090', '21:49:01', '21:49:18', 'late', '00:00:17', 0, 1, 1),
(65, 34, '2020-09-07 06:57:12.082165', '09:56:00', '18:00:00', 'InTime', '08:04:00', 0, 1, 1),
(66, 36, '2020-09-07 06:57:08.335898', '11:56:00', '17:56:00', 'Late', '06:00:00', 0, 1, 1),
(67, 43, '2020-09-10 13:01:35.752732', '14:12:25', NULL, 'late', NULL, 0, 1, 28),
(68, 47, '2020-09-12 23:15:35.000000', '17:15:35', NULL, 'late', NULL, 0, 0, NULL),
(69, 50, '2020-09-13 01:07:03.000000', '19:06:48', '19:07:03', 'late', '00:00:15', 0, 0, NULL),
(70, 48, '2020-09-13 01:10:22.000000', '19:10:10', '19:10:22', 'late', '00:00:12', 0, 0, NULL),
(71, 41, '2020-09-13 02:20:12.000000', '20:19:26', '20:20:12', 'late', '00:00:46', 0, 0, NULL),
(72, 51, '2020-09-13 03:38:44.000000', '21:18:13', '21:38:44', 'late', '00:20:31', 0, 0, NULL),
(73, 45, '2020-09-14 03:27:25.000000', '09:27:58', '21:27:25', 'present', '11:59:27', 0, 0, NULL),
(74, 35, '2020-09-14 05:13:42.000000', '09:35:57', '23:13:42', 'present', '13:37:45', 0, 0, NULL),
(75, 43, '2020-09-13 15:40:57.000000', '09:40:57', NULL, 'present', NULL, 0, 0, NULL),
(76, 46, '2020-09-14 04:10:38.000000', '09:43:28', '22:10:38', 'present', '12:27:10', 0, 0, NULL),
(77, 41, '2020-09-13 15:46:16.000000', '09:46:16', NULL, 'present', NULL, 0, 0, NULL),
(78, 51, '2020-09-14 00:11:36.000000', '09:54:33', '18:11:36', 'present', '08:17:03', 0, 0, NULL),
(79, 50, '2020-09-14 01:06:11.000000', '09:57:32', '19:06:11', 'present', '09:08:39', 0, 0, NULL),
(80, 49, '2020-09-14 02:40:51.000000', '09:59:59', '20:40:51', 'present', '10:40:52', 0, 0, NULL),
(81, 27, '2020-09-13 20:52:31.000000', '10:00:44', '14:52:31', 'present', '04:51:47', 0, 0, NULL),
(82, 42, '2020-09-13 16:00:45.000000', '10:00:45', NULL, 'present', NULL, 0, 0, NULL),
(83, 1, '2020-09-14 00:08:19.000000', '10:03:42', '18:08:19', 'present', '08:04:37', 0, 0, NULL),
(84, 44, '2020-09-14 05:08:50.000000', '10:09:35', '23:08:50', 'present', '12:59:15', 0, 0, NULL),
(85, 48, '2020-09-13 16:12:26.000000', '10:12:26', NULL, 'late', NULL, 0, 0, NULL),
(86, 27, '2020-09-14 04:56:33.000000', '14:58:30', '22:56:33', 'late', '07:58:03', 0, 0, NULL),
(87, 45, '2020-09-14 04:07:36.237169', '09:38:40', NULL, 'present', NULL, 0, 1, 1),
(88, 46, '2020-09-14 04:07:36.237169', '09:38:51', NULL, 'present', NULL, 0, 1, 1),
(89, 49, '2020-09-14 04:07:36.237169', '09:46:41', NULL, 'present', NULL, 0, 1, 1),
(90, 35, '2020-09-14 04:07:36.237169', '09:50:45', NULL, 'present', NULL, 0, 1, 1),
(91, 51, '2020-09-14 04:07:36.237169', '09:58:53', NULL, 'present', NULL, 0, 1, 1),
(92, 50, '2020-09-14 04:07:36.237169', '10:00:35', NULL, 'present', NULL, 0, 1, 1),
(93, 27, '2020-09-14 04:07:36.237169', '10:01:33', NULL, 'present', NULL, 0, 1, 1),
(94, 48, '2020-09-14 04:07:36.237169', '10:04:54', NULL, 'present', NULL, 0, 1, 1),
(95, 1, '2020-09-14 04:07:36.237169', '10:07:15', NULL, 'present', NULL, 0, 1, 1),
(96, 42, '2020-09-14 16:26:45.000000', '10:26:45', NULL, 'late', NULL, 0, 0, NULL),
(97, 51, '2020-09-15 00:48:43.000000', '10:42:11', '18:48:43', 'late', '08:06:32', 0, 0, NULL),
(98, 50, '2020-09-15 00:24:20.000000', '10:59:40', '18:24:20', 'late', '07:24:40', 0, 0, NULL),
(99, 44, '2020-09-15 01:12:15.000000', '11:20:36', '19:12:15', 'late', '07:51:39', 0, 0, NULL),
(100, 46, '2020-09-15 00:25:14.000000', '11:23:34', '18:25:14', 'late', '07:01:40', 0, 0, NULL),
(101, 27, '2020-09-15 03:38:52.000000', '19:28:48', '21:38:52', 'late', '02:10:04', 0, 0, NULL),
(102, 35, '2020-09-15 03:38:20.000000', '21:37:17', '21:38:20', 'late', '00:01:03', 0, 0, NULL),
(103, 35, '2020-09-15 15:50:50.000000', '09:50:50', NULL, 'present', NULL, 0, 0, NULL),
(104, 42, '2020-09-15 15:51:34.000000', '09:51:34', NULL, 'present', NULL, 0, 0, NULL),
(105, 51, '2020-09-16 00:54:35.000000', '09:55:48', '18:54:35', 'present', '08:58:47', 0, 0, NULL),
(106, 46, '2020-09-16 01:27:18.000000', '09:59:05', '19:27:18', 'present', '09:28:13', 0, 0, NULL),
(107, 27, '2020-09-15 20:07:37.000000', '09:59:47', '14:07:37', 'present', '04:07:50', 0, 0, NULL),
(108, 50, '2020-09-16 01:49:41.000000', '10:03:45', '19:49:41', 'present', '09:45:56', 0, 0, NULL),
(109, 49, '2020-09-16 01:55:53.000000', '10:05:54', '19:55:53', 'present', '09:49:59', 0, 0, NULL),
(110, 44, '2020-09-16 01:29:04.000000', '12:40:39', '19:29:04', 'late', '06:48:25', 0, 0, NULL),
(111, 27, '2020-09-15 21:37:09.000000', '15:09:43', '15:37:09', 'late', '00:27:26', 0, 0, NULL),
(112, 27, '2020-09-16 04:28:43.000000', '15:37:18', '22:28:43', 'late', '06:51:25', 0, 0, NULL),
(113, 28, '2020-09-16 03:18:21.000000', '21:18:13', '21:18:21', NULL, '00:00:08', 0, 0, NULL),
(114, 35, '2020-09-16 15:53:08.000000', '09:53:08', NULL, 'present', NULL, 0, 0, NULL),
(115, 52, '2020-09-16 15:54:34.000000', '09:54:34', NULL, NULL, NULL, 0, 0, NULL),
(116, 51, '2020-09-17 00:10:58.000000', '09:56:25', '18:10:58', 'present', '08:14:33', 0, 0, NULL),
(117, 46, '2020-09-17 00:57:03.000000', '10:01:53', '18:57:03', 'present', '08:55:10', 0, 0, NULL),
(118, 50, '2020-09-16 16:03:39.000000', '10:03:39', NULL, 'present', NULL, 0, 0, NULL),
(119, 27, '2020-09-16 23:57:23.000000', '10:05:45', '17:57:23', 'present', '07:51:38', 0, 0, NULL),
(120, 42, '2020-09-16 16:23:19.000000', '10:23:19', NULL, 'late', NULL, 0, 0, NULL),
(121, 49, '2020-09-17 00:36:12.000000', '11:35:56', '18:36:12', 'late', '07:00:16', 0, 0, NULL),
(122, 49, '2020-09-18 00:01:25.000000', '09:40:00', '18:01:25', 'present', '08:21:25', 0, 0, NULL),
(123, 52, '2020-09-17 15:42:11.000000', '09:42:11', NULL, NULL, NULL, 0, 0, NULL),
(124, 35, '2020-09-17 15:54:09.000000', '09:54:09', NULL, 'present', NULL, 0, 0, NULL),
(125, 51, '2020-09-18 00:51:20.000000', '10:00:16', '18:51:20', 'present', '08:51:04', 0, 0, NULL),
(126, 42, '2020-09-17 16:12:59.000000', '10:12:59', NULL, 'late', NULL, 0, 0, NULL),
(127, 27, '2020-09-17 16:28:04.000000', '10:28:04', NULL, 'late', NULL, 0, 0, NULL),
(128, 50, '2020-09-18 02:00:51.000000', '10:44:10', '20:00:51', 'late', '09:16:41', 0, 0, NULL),
(129, 28, '2020-09-17 21:41:18.000000', '15:40:59', '15:41:18', NULL, '00:00:19', 0, 0, NULL),
(130, 28, '2020-09-17 21:41:56.000000', '15:41:45', '15:41:56', 'late', '00:00:11', 0, 0, NULL),
(131, 44, '2020-09-19 00:11:22.000000', '11:36:57', '18:11:22', 'late', '06:34:25', 0, 0, NULL),
(132, 1, '2020-09-19 23:15:12.000000', '17:14:48', '17:15:12', NULL, '00:00:24', 0, 0, NULL),
(133, 52, '2020-09-20 15:44:48.000000', '09:44:48', NULL, NULL, NULL, 0, 0, NULL),
(134, 51, '2020-09-21 00:54:40.000000', '09:52:38', '18:54:40', 'present', '09:02:02', 0, 0, NULL),
(135, 46, '2020-09-21 01:21:51.000000', '10:01:11', '19:21:51', 'present', '09:20:40', 0, 0, NULL),
(136, 50, '2020-09-21 03:13:02.000000', '10:04:07', '21:13:02', 'present', '11:08:55', 0, 0, NULL),
(137, 42, '2020-09-20 16:10:50.000000', '10:10:50', NULL, 'late', NULL, 0, 0, NULL),
(138, 44, '2020-09-20 16:33:30.000000', '10:33:30', NULL, 'late', NULL, 0, 0, NULL),
(139, 49, '2020-09-21 01:45:12.000000', '12:01:10', '19:45:12', 'late', '07:44:02', 0, 0, NULL),
(142, 1, '2020-09-27 13:39:20.257593', '10:02:00', '19:39:00', 'InTime', '09:37:00', 0, 1, 1),
(143, 49, '2020-09-27 13:55:15.678239', '10:02:00', '19:53:00', 'InTime', '09:51:00', 0, 1, 1),
(144, 52, '2020-09-28 04:51:22.417310', '10:00:00', '19:51:00', 'InTime', '09:51:00', 0, 1, 1),
(147, 27, '2020-09-28 16:58:06.176526', '10:02:00', '10:57:00', 'InTime', '00:55:00', 0, 1, 1),
(148, 35, '2020-09-30 07:06:44.976927', '10:04:00', '19:51:00', 'InTime', '09:47:00', 0, 1, 1),
(149, 1, '2020-10-08 07:51:50.000000', '13:51:45', '13:51:50', 'late', '00:00:05', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blacklists`
--

CREATE TABLE `blacklists` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blacklists`
--

INSERT INTO `blacklists` (`id`, `title`, `label`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Application test', 'Urgent', 0, '2020-07-16 06:24:08', '2020-07-20 06:36:14'),
(2, 'Lunch meeting', 'Priority', 0, '2020-07-16 06:24:08', '2020-07-19 06:53:26'),
(3, 'Call with Dave', 'Urgent', 0, '2020-07-16 06:25:25', '2020-07-19 05:59:35'),
(24, 'Blacklist test', 'Top pritorty', 1, '2020-07-18 02:14:36', '2020-07-20 06:36:11'),
(32, 'To do title', 'ToDo priority', 1, '2020-07-18 04:06:10', '2020-07-19 06:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_logo`, `created_at`, `updated_at`) VALUES
(78, 'Antopolis', NULL, '2020-10-03 06:59:25', '2020-10-03 06:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `company_id`, `created_at`, `updated_at`) VALUES
(30, 'Technology', NULL, '2020-10-03 07:17:00', '2020-10-03 10:05:55'),
(31, 'Car', NULL, '2020-10-03 10:39:58', '2020-10-03 10:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `sub_department_id`, `created_at`, `updated_at`) VALUES
(52, 'creative director', 46, '2020-10-05 05:05:47', '2020-10-05 05:05:47'),
(53, 'strategic planner_tata', 46, '2020-10-05 05:06:00', '2020-10-05 05:13:53'),
(54, 'CEO', 42, '2020-10-06 11:10:46', '2020-10-06 11:10:46'),
(55, 'Graphic designer', 48, '2020-10-06 11:11:06', '2020-10-06 11:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `holiday_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `types` tinyint(1) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_name`, `start_date`, `end_date`, `types`, `notes`, `created_at`, `updated_at`) VALUES
(32, 'Test_holiday_1', '2020-10-15', '2020-10-15', 0, 'Public holiday_updated', '2020-09-20 11:26:05', '2020-09-29 10:19:44'),
(33, 'Test_holiday_2', '2020-11-09', '2020-11-09', 1, 'Company Holiday', '2020-09-20 11:26:29', '2020-09-20 11:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL,
  `item_category_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `item_category_name`, `created_at`, `updated_at`) VALUES
(2, 'Content design', '2020-06-11 12:27:47', '2020-06-11 12:27:47'),
(3, 'Motion picture', '2020-06-11 12:27:58', '2020-06-11 12:27:58'),
(4, 'Web Development', '2020-06-11 13:25:59', '2020-06-11 13:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `lead_brands`
--

CREATE TABLE `lead_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_company_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_brand_services`
--

CREATE TABLE `lead_brand_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_brand_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_product_or_service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_companies`
--

CREATE TABLE `lead_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_companies`
--

INSERT INTO `lead_companies` (`id`, `lead_company_name`, `created_at`, `updated_at`) VALUES
(20, 'Test_2', '2020-10-14 10:39:18', '2020-10-14 12:44:04'),
(21, 'Test_1', '2020-10-14 10:42:34', '2020-10-14 12:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `lead_industries`
--

CREATE TABLE `lead_industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_industry_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_industries`
--

INSERT INTO `lead_industries` (`id`, `lead_industry_name`, `created_at`, `updated_at`) VALUES
(50, 'Nokia', '2020-10-06 11:17:18', '2020-10-06 11:17:32'),
(51, 'Apple', '2020-10-06 12:59:36', '2020-10-14 07:42:21'),
(52, 'Iphone', '2020-10-14 07:42:07', '2020-10-14 07:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `lead_product_or_services`
--

CREATE TABLE `lead_product_or_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_product_or_service_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_lead_product_or_service` tinyint(4) DEFAULT NULL,
  `lead_sub_industry_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_product_or_services`
--

INSERT INTO `lead_product_or_services` (`id`, `lead_product_or_service_name`, `is_lead_product_or_service`, `lead_sub_industry_id`, `created_at`, `updated_at`) VALUES
(18, 'sevice', 1, 20, '2020-10-14 08:18:49', '2020-10-14 08:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `lead_sub_industries`
--

CREATE TABLE `lead_sub_industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_sub_industry_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_industry_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_sub_industries`
--

INSERT INTO `lead_sub_industries` (`id`, `lead_sub_industry_name`, `lead_industry_id`, `created_at`, `updated_at`) VALUES
(20, 'test_3', 50, '2020-10-14 07:49:37', '2020-10-14 07:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` timestamp(6) NULL DEFAULT NULL,
  `end_date` timestamp(6) NULL DEFAULT NULL,
  `notes_by_requester` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_type` int(10) UNSIGNED DEFAULT NULL,
  `is_approved_superadmin` tinyint(4) NOT NULL DEFAULT 0,
  `is_approved_supervisor` tinyint(4) NOT NULL DEFAULT 0,
  `superadmin_approval_date` timestamp(6) NULL DEFAULT NULL,
  `supervisor_approval_date` timestamp(6) NULL DEFAULT NULL,
  `approving_superadmin_id` int(10) UNSIGNED DEFAULT NULL,
  `approving_supervisor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `start_date`, `end_date`, `notes_by_requester`, `documents`, `leave_type`, `is_approved_superadmin`, `is_approved_supervisor`, `superadmin_approval_date`, `supervisor_approval_date`, `approving_superadmin_id`, `approving_supervisor_id`, `created_at`, `updated_at`) VALUES
(93, 27, '2020-09-28 18:00:00.000000', '2020-09-28 18:00:00.000000', 'asdasdasd', NULL, 1, 1, 0, '2020-09-28 18:00:00.000000', NULL, 1, NULL, '2020-09-29 12:40:30', '2020-09-30 06:08:27'),
(94, 35, '2020-09-28 18:00:00.000000', '2020-09-28 18:00:00.000000', 'sick_leave', NULL, 2, 0, 0, NULL, NULL, NULL, NULL, '2020-09-29 12:42:29', '2020-09-30 06:05:22'),
(97, 51, '2020-09-09 18:00:00.000000', '2020-09-09 18:00:00.000000', 'rwerwerwer', NULL, 2, 0, 0, NULL, NULL, NULL, NULL, '2020-09-30 06:08:47', '2020-09-30 06:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Annual', '2020-06-30 11:17:34', NULL),
(2, 'Sick', '2020-06-30 11:17:34', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_14_020945_create_companies_table', 1),
(5, '2020_04_14_020950_create_departments_table', 1),
(6, '2020_04_14_020955_create_sub_departments_table', 1),
(7, '2020_04_14_020958_create_designations_table', 1),
(8, '2020_04_20_113106_create_lead_industries_table', 1),
(9, '2020_04_20_113441_create_lead_sub_industries_table', 1),
(10, '2020_04_20_113521_create_lead_companies_table', 1),
(11, '2020_04_20_113544_create_lead_brands_table', 1),
(12, '2020_04_21_102944_create_lead_product_or_services_table', 1),
(13, '2020_04_21_203236_create_lead_brand_services_table', 1),
(14, '2020_04_26_160719_create_user_information_table', 1),
(18, '2020_05_10_021140_create_old_attendances_table', 1),
(19, '2020_05_16_224803_create_remarks_table', 1),
(23, '2020_06_24_121511_create_holidays_table', 2),
(24, '2020_06_30_080755_create_leave_types_table', 2),
(25, '2020_06_30_082315_create_leave_types_table', 3),
(32, '2020_07_06_070652_create_companies_table', 5),
(33, '2020_07_06_112542_create_departments_table', 6),
(34, '2020_07_06_171013_create_sub_departments_table', 7),
(35, '2020_07_07_051623_create_designations_table', 8),
(36, '2020_07_07_065824_create_sub_departments_table', 9),
(37, '2020_07_07_102934_create_designations_table', 10),
(38, '2020_07_07_163835_create_lead_industries_table', 11),
(39, '2020_07_07_170639_create_lead_sub_industries_table', 12),
(40, '2020_07_07_185908_create_lead_companies_table', 13),
(41, '2020_07_07_194150_create_lead_brands_table', 14),
(42, '2020_07_08_041238_create_lead_product_or_services_table', 15),
(43, '2020_07_08_055333_create_lead_brand_services_table', 16),
(44, '2020_07_13_052917_create_tangible_categories_table', 17),
(45, '2020_07_13_061730_create_tangible_assets_table', 18),
(46, '2020_07_13_104304_create_subscriptions_table', 19),
(51, '2020_07_22_192919_create_assign_employees_table', 20),
(52, '2020_07_24_181716_create_postings_table', 21),
(53, '2020_05_04_212456_create_attendance_logs_table', 22),
(54, '2020_05_07_074521_create_attendances_table', 22),
(55, '2020_07_28_220955_create_permission_tables', 23),
(59, '2020_06_30_082430_create_leaves_table', 24),
(60, '2020_08_13_131820_create_projects_categories_table', 25),
(61, '2020_08_13_145849_create_projects_sub_categories_table', 26),
(62, '2020_08_16_104548_create_projects_natures_table', 27),
(63, '2020_08_16_113752_create_projects_table', 28),
(64, '2020_08_17_110318_create_project_item_categories_table', 29),
(65, '2020_08_19_111017_create_items_table', 30),
(66, '2020_08_19_133949_create_project_items_table', 31),
(67, '2020_08_20_113058_create_projects_table', 32),
(68, '2020_09_21_112350_add_nick_name_to_users_table', 33),
(69, '2020_10_14_105322_create_project_status_categories_table', 34),
(70, '2020_10_14_115933_create_project_statuses_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 47),
(2, 'App\\User', 46);

-- --------------------------------------------------------

--
-- Table structure for table `old_attendances`
--

CREATE TABLE `old_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `status` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isApproved_a` tinyint(1) NOT NULL DEFAULT 0,
  `isApproved_s` tinyint(1) NOT NULL DEFAULT 0
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('maheeb009@gmail.com', '$2y$10$ZZZMrWgWvIm1/QpVHPPJgOHLUxl3FwalCPtmBq9OpkOtJ.2YFg1qS', '2020-09-26 06:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `projects_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_nature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_frequency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `project_sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `project_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_categories`
--

CREATE TABLE `projects_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_natures`
--

CREATE TABLE `projects_natures` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_nature_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_natures`
--

INSERT INTO `projects_natures` (`id`, `project_nature_name`, `created_at`, `updated_at`) VALUES
(3, 'Client-work', '2020-08-16 05:26:32', '2020-08-16 05:26:32'),
(4, 'Self-assigned', '2020-08-16 05:26:40', '2020-08-16 05:30:10'),
(5, 'In-house', '2020-08-16 05:35:30', '2020-08-16 05:35:36'),
(6, 'Training', '2020-08-16 05:35:44', '2020-08-16 05:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `projects_sub_categories`
--

CREATE TABLE `projects_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `projects_sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_items`
--

CREATE TABLE `project_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `projects_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_item_categories`
--

CREATE TABLE `project_item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_statuses`
--

CREATE TABLE `project_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `definition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_status_categories`
--

CREATE TABLE `project_status_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `definition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id_receiver` int(10) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id_sender` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `user_id_receiver`, `subject`, `description`, `user_id_sender`, `created_at`, `updated_at`) VALUES
(9, 1, 'profile', 'rtyrt', 1, '2020-05-18 23:13:28', '2020-05-18 23:13:28'),
(10, 3, 'profile', 'rtyrt', 1, '2020-05-18 23:13:31', '2020-05-18 23:13:31'),
(11, 1, 'profile', 'rtyrt', 1, '2020-05-18 23:13:34', '2020-05-18 23:13:34'),
(12, 1, 'profile', 'afasdadadas', 1, '2020-05-18 23:13:39', '2020-05-18 23:13:39'),
(13, 1, 'profile', 'dasdasda', 1, '2020-05-18 23:13:43', '2020-05-18 23:13:43'),
(14, 1, 'profile', 'dasdasdadfadfa', 1, '2020-05-18 23:13:46', '2020-05-18 23:13:46'),
(15, 1, 'profile', 'dasdasdadfadfaasdasd', 1, '2020-05-18 23:13:48', '2020-05-18 23:13:48'),
(16, 1, 'profile', 'dasdasdadfadfaasdasddfaf', 1, '2020-05-18 23:13:52', '2020-05-18 23:13:52'),
(17, 1, 'profile', 'dasdasdadfadfaasdasddfaf', 1, '2020-05-18 23:13:53', '2020-05-18 23:13:53'),
(18, 1, 'profile', 'fdsfsd', 1, '2020-05-18 23:27:07', '2020-05-18 23:27:07'),
(19, 3, 'dfd', 'dsfds', 1, '2020-05-19 20:04:10', '2020-05-19 20:04:10'),
(20, 1, 'cc', 'cc', 1, '2020-05-19 21:33:42', '2020-05-19 21:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'web', '2020-07-28 18:00:00', '2020-07-28 18:00:00'),
(2, 'Admin', 'web', '2020-07-28 18:00:00', '2020-07-28 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(12) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `course`, `created_at`, `updated_at`) VALUES
(1, 'maheeb', 'Present', NULL, NULL),
(2, 'Azmaeen', 'Absent', NULL, NULL),
(3, 'Nahid', 'Absent', NULL, NULL),
(4, 'LIMON', 'Present', NULL, NULL),
(5, 'Hasan', 'Present', NULL, NULL),
(6, 'shuvo', 'Present', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE `sub_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_departments`
--

INSERT INTO `sub_departments` (`id`, `sub_department_name`, `department_id`, `created_at`, `updated_at`) VALUES
(36, 'Lenovo', 30, '2020-10-03 09:55:49', '2020-10-05 04:49:44'),
(42, 'Mazda', 31, '2020-10-03 12:58:58', '2020-10-03 13:31:59'),
(43, 'Bugatti', 31, '2020-10-03 13:32:06', '2020-10-03 13:32:17'),
(44, 'Iphone', 30, '2020-10-05 04:44:18', '2020-10-05 04:44:18'),
(45, 'Samsung', 30, '2020-10-05 04:45:18', '2020-10-05 04:45:18'),
(46, 'Tata', 31, '2020-10-05 04:45:32', '2020-10-05 04:45:32'),
(47, 'Ford', 31, '2020-10-05 04:53:43', '2020-10-05 04:53:54'),
(48, 'Nokia', 30, '2020-10-05 06:22:26', '2020-10-05 06:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `tangible_assets`
--

CREATE TABLE `tangible_assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `tangible_asset_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tangible_asset_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tangible_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tangible_assets`
--

INSERT INTO `tangible_assets` (`id`, `tangible_asset_name`, `tangible_asset_quantity`, `tangible_category_id`, `created_at`, `updated_at`) VALUES
(16, 'asset_1', '10', 16, '2020-09-29 07:22:46', '2020-09-29 07:22:46'),
(17, 'asset_2', '20', 17, '2020-09-29 07:23:00', '2020-09-29 07:23:00'),
(18, 'asset_3', '30', 18, '2020-09-29 07:23:12', '2020-09-29 07:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `tangible_categories`
--

CREATE TABLE `tangible_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `tangible_category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tangible_categories`
--

INSERT INTO `tangible_categories` (`id`, `tangible_category_name`, `created_at`, `updated_at`) VALUES
(16, 'tangible_category_1', '2020-09-29 07:10:10', '2020-09-29 07:10:10'),
(17, 'tangible_category_2', '2020-09-29 07:10:20', '2020-09-29 07:10:20'),
(18, 'tangible_category_3', '2020-09-29 07:10:33', '2020-09-29 07:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `task_category`
--

CREATE TABLE `task_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_category`
--

INSERT INTO `task_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'cat_1', '2020-06-10 06:58:37', NULL),
(6, 'cat_2', '2020-06-10 06:58:37', NULL),
(7, 'cat_3', '2020-06-10 06:58:37', NULL),
(8, 'cat_4', '2020-06-10 06:58:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_master`
--

CREATE TABLE `task_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `des` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_master`
--

INSERT INTO `task_master` (`id`, `name`, `user_id`, `cat_id`, `des`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(79, 'maheeb', 3, 8, NULL, '2020-06-12', '2020-06-06', '2020-06-10 08:40:00', '2020-06-10 08:40:00'),
(80, 'tyuty', 3, 8, NULL, '2020-06-04', '2020-06-06', '2020-06-10 08:43:38', '2020-06-10 08:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `label`, `created_at`, `updated_at`) VALUES
(1, 'Webpixels website redesign', 'Urgent', '2020-07-16 06:27:14', NULL),
(2, 'Todo_1', 'Priority', NULL, NULL),
(3, 'Todo_2', 'Urgent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_person_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nick_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `personal_email`, `mobile_number`, `gender`, `present_address`, `permanent_address`, `fb_username`, `emergency_person_name`, `emergency_person_relation`, `emergency_number`, `discord_id`, `blood_group`, `dob`, `photo`, `identification_number`, `identification_photo`, `identification_type`, `medical_condition`, `email_verified_at`, `password`, `is_approved`, `remember_token`, `created_at`, `updated_at`, `nick_name`) VALUES
(1, 'Sheehan', NULL, 'Rahman', 'sheehanvy@gmail.com', 'is_approved', '01718798989', 'male', 'Gulshan', 'USA', 'Shehaan', 'Shehhan rahman', 'Vai', '89798797', '12121', 'b+', '1990-08-30', '6cfb08734a2e447d6df60ef85917d3a6e545428c.jpg', '56496546', '79f95f1432891fdf2cc26f455bba35fba46a4432.jpg', 'nid', 'Well', NULL, '$2y$10$lzmN/eC7CDltVZff0o4Qo.aEQWfV5Yb8Z7PqA1loW65SSNhRye6/q', 0, NULL, NULL, '2020-09-27 06:14:52', '#vyrevy'),
(27, 'Suva', 'Karmaker', NULL, 'suva@theantopolis.com', 'suva@gmail.com', '01871333672', 'male', 'Village: Betil,  Ps: Enayetpur, Po: betil, District: sirajganj, Division: Rajshahi', 'asdsad', 'https://www.facebook.com/shuvo.karmaker.131', 'asdsad', 'asdsad', '747447', '5646', 'a-', '1999-02-12', '896d57abb51145bc9414e55d835f6eaaa8743913.jpg', '3763579889', 'c21f3935a955de62c9c3aace1b90cbf6d2b27f48.png', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-07-12 04:08:39', '2020-09-29 05:25:09', NULL),
(28, 'Mahruf', NULL, 'Uchal', 'mahruf@theantopolis.com', 'mahrufuchal47@gmail.com', '01643393069', 'male', 'F-5D, H-490, Malibag D.I.T Road Seen by Mahruf Uchal at 1:10 PM', NULL, 'https://www.facebook.com/mahruf.uchal', 'Md. Abu Alam', 'Father', '01712297344', NULL, 'a+', '1998-01-11', '10243d6e952dd0ac303845d2aa471c0dd307be65.jpg', 'MD0011151CL0007', 'ecef2479e223f2c0d5a3a009bee44ad2613ad9c7.jpg', 'driving license', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-07-12 04:08:39', '2020-09-29 05:26:31', NULL),
(35, 'Alavi', 'Anan', 'Meem', 'alavi@theantopolis.com', 'alavi.meem@northsouth.edu', '+8801768765444', 'female', 'Apt E2, House 53, Road 6, Block C, Banani, Dhaka, Bangladesh', NULL, 'https://www.facebook.com/anan.meem', 'Ahsan Senan', 'Husband', '+8801671171958', 'KofiAnnan #5727', '0+', '1996-02-02', '1b76fb6809069e53e2d24063ecd528e1f9802e8c.png', 'BW0844511', '9cc419a38f08c5588ad1f7e81cccd7313ea39ef5.jpg', 'passport', 'None', NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-04 03:27:43', '2020-09-27 05:34:07', NULL),
(46, 'Maheeb', 'Mohammad', 'Azmaeen', 'maheeb@theantopolis.com', 'maheeb009@gmail.com', '01683135932', 'male', '370,east goran dhaka-1219', NULL, 'https://www.facebook.com/maheeb.azmaeen', 'Rayhan Ahmed', 'Best Friend', '01757760004', NULL, 'b+', '1994-11-09', '4d6ca8c89f1e57e32284c136ac61ff7586fec090.png', '19942693602000298', '8aaaff0b9ec1899ec3af3b1dfa9a7d79be342913.jpg', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-12 22:23:50', '2020-09-27 05:32:31', NULL),
(47, 'Nahid', 'Hasan', 'Limon', 'nahid@theantopolis.com', 'nh.limon2010@gmail.com', '01621316727', 'male', 'Road 3, Block ржЪ, Mirpur 2, Dhaka', NULL, 'https://www.facebook.com/nh.limon', 'Zahid Hasan', 'Brother', '01995699469', NULL, '0+', '1994-08-04', '96cbe63b7203c01403030547a5f625033541f5d5.png', '1492995608', 'aefe4e99901ae7afbb495b2de5494f09f80a8b19.jpg', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-12 22:38:27', '2020-09-27 05:32:54', NULL),
(48, 'Sadia', 'Afrin', 'Nitol', 'sadia@theantopolis.com', 'afrinzebal@gmail.com', '01676521585', 'male', '?', NULL, 'https://www.facebook.com/afrin.nitol', 'Sheehan Rahman', 'Husband', '01790538712', NULL, 'b+', '1996-01-22', '748ccf1e14c9159e9b8ee99cad738ab9f0a47b7e.png', '8688310096', 'b61e7a8319cb67195bf0739325e98917bbe3aead.jpg', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-12 22:48:15', '2020-09-27 05:33:18', NULL),
(49, 'Md.', 'Shakil', 'Ahmed', 'shakil@theantopolis.com', 'shakilatrai5@gmail.com', '01775069169', 'male', 'f', NULL, 'https://www.facebook.com/cseshakil6/', 'Mst. Sofura Bibi', 'Mother', '01744983234', NULL, 'a+', '1996-08-22', '1c377e57757e2e8fa9f7d24341270b00524a1409.png', '2404045813', '088a1531c8a850cc4387d27f300f73a177900b81.pdf', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-13 00:00:34', '2020-09-27 05:32:01', NULL),
(50, 'Jarif', 'Ahmed', 'Soumik', 'jasoumik@gmail.com', 'jasoumik@gmail.com', '01716684803', 'male', 'H#03, R#32, Sector#07, Uttara, Dhaka-1230', NULL, 'https://www.facebook.com/jasoumik', 'Shakila Zannat Bema', 'Elder Sister', '01737129385', NULL, '0+', '1998-10-03', 'b718946f08c7715a4bdbb55823c32db15242fed0.png', '3307953665', '4948158e337d6f89db88a19e32b8f24369fb4904.jpg', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-13 00:13:06', '2020-09-27 05:31:25', NULL),
(51, 'Sheikh', 'Waliur', 'Rahman', 'sheikhwaliurrahman@gmail.com', 'sheikhwaliurrahman@gmail.com', '01729901263', 'male', 'House:532, Vill:Chandoir, Post:Garpara-1802, PS+Dist:Manikganj,', NULL, 'https://www.facebook.com/SheikhWaliur.BD', 'Sheikh Masudur Rahman', 'Father', '01712520005', NULL, 'ab+', '1995-07-31', 'e53a361750d3b334fce9420b898f0b0dd02c40de.png', '6408771423', '64feeb3efbd2337472b8626ed0bc8388ed7d4e24.jpg', 'nid', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-13 00:51:29', '2020-09-27 05:31:07', NULL),
(52, 'Tanzila', 'Binte', 'Hassan', 'tanzila0705@gmail.com', 'tanzila0705@gmail.com', '+880 1752644451', 'female', 'Flat 4B, House no. 79, Bashir Uddin Road, Kalabagan, Dhaka 1205', NULL, 'https://www.facebook.com/tanzila.hassan.37/', 'Humayra Faizah', 'Sister-in-law', '01689737985', NULL, '0+', '2000-05-07', '547a56c78a69757aaf46d272db6edf26add2af14.png', '20003090712065808', 'bfac553f0acec982452c985246fde321e58c9d25.jpg', 'birth certificate', NULL, NULL, '$2y$12$H48o62uiywd1m.uo4MCS.O5hFWnGkUf/I8PwWzsYhF0baa0alp2Am', 0, NULL, '2020-09-16 01:04:40', '2020-09-27 05:30:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `financial_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`financial_information`)),
  `work_experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`work_experience`)),
  `educational_qualification` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`educational_qualification`)),
  `skill` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`skill`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_id`, `financial_information`, `work_experience`, `educational_qualification`, `skill`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"personal_bank_name\":\"BRac\",\"personal_bank_account_name\":\"brac\",\"personal_bank_account_number\":\"5646546\",\"personal_bank_branch_name\":\"Uttara\",\"personal_bank_branch_routing_number\":\"2321\",\"bkash_account_number\":\"545646\",\"bkash_account_type\":\"personal\"}', '[{\"title\":\"dfgfd\",\"company\":\"gfdg\",\"joinDate\":\"2020-05-22\",\"LeftDate\":\"2020-05-20\"}]', '[{\"degree\":\"MSC\",\"programOrGroup\":\"dfgd\",\"institution\":\"dfg\",\"gpa\":\"dg\",\"major\":\"dfgd\",\"minor\":\"fg\",\"passingDate\":\"2020-05-12\"},{\"degree\":\"BBA\",\"programOrGroup\":\"dge\",\"institution\":\"erte\",\"gpa\":\"rter\",\"major\":\"tert\",\"minor\":\"erter\",\"passingDate\":\"2020-05-05\"}]', '[{\"name\":\"Graphics design\",\"category\":\"design\",\"workspace\":\"YES\",\"profeciency\":\"Advanced\"},{\"name\":\"Metal\",\"category\":\"Singing\",\"workspace\":\"YES\",\"profeciency\":\"Intermediate\"}]', '2020-05-17 09:29:43', '2020-08-12 07:28:18'),
(2, 3, '{\"personal_bank_name\":\"dfg\",\"personal_bank_account_name\":\"dfgfg\",\"personal_bank_account_number\":\"fdgdf\",\"personal_bank_branch_name\":\"dfgdf\",\"personal_bank_branch_routing_number\":\"dgd\",\"bkash_account_number\":\"df\",\"bkash_account_type\":\"personal\"}', '[{\"title\":\"dfgfd\",\"company\":\"gfdg\",\"joinDate\":\"2020-05-22\",\"LeftDate\":\"2020-05-20\"}]', '[{\"degree\":\"MSC\",\"programOrGroup\":\"dfgd\",\"institution\":\"dfg\",\"gpa\":\"dg\",\"major\":\"dfgd\",\"minor\":\"fg\",\"passingDate\":\"2020-05-12\"},{\"degree\":\"BBA\",\"programOrGroup\":\"dge\",\"institution\":\"erte\",\"gpa\":\"rter\",\"major\":\"tert\",\"minor\":\"erter\",\"passingDate\":\"2020-05-05\"}]', '[{\"name\":\"gdfg\",\"category\":\"dfgdf\",\"workspace\":\"YES\",\"profeciency\":\"Beginner\"},{\"name\":\"fgfd\",\"category\":\"fdgd\",\"workspace\":\"YES\",\"profeciency\":\"Advanced\"}]', '2020-05-19 19:40:32', '2020-05-19 19:40:33'),
(4, 5, '{\"personal_bank_name\":\"asdasd\",\"personal_bank_account_name\":\"asdasd\",\"personal_bank_account_number\":\"asdasd\",\"personal_bank_branch_name\":\"asdasd\",\"personal_bank_branch_routing_number\":\"asdasd\",\"bkash_account_number\":\"asdasd\",\"bkash_account_type\":\"personal\"}', '[{\"title\":\"asdasd\",\"company\":\"asdasd\",\"joinDate\":\"2020-07-09\",\"LeftDate\":\"2020-07-08\"}]', '[{\"degree\":\"A Level\",\"programOrGroup\":\"asdsad\",\"institution\":\"asdsad\",\"gpa\":\"asdasd\",\"major\":\"sad\",\"minor\":\"asdsad\",\"passingDate\":\"2020-07-02\"}]', '[{\"name\":\"asdasd\",\"category\":\"asdasd\",\"workspace\":\"YES\",\"profeciency\":\"Beginner\"}]', '2020-07-12 07:58:14', '2020-07-12 07:58:14'),
(26, 33, '{\"personal_bank_name\":\"DBBL\",\"personal_bank_account_name\":\"messi9\",\"personal_bank_account_number\":\"46467879\",\"personal_bank_branch_name\":\"Gulshan\",\"personal_bank_branch_routing_number\":\"2321\",\"bkash_account_number\":\"54564\",\"bkash_account_type\":\"agent\"}', '[{\"title\":\"asdsad\",\"company\":\"test\",\"joinDate\":\"2020-08-06\",\"LeftDate\":\"2020-08-25\"}]', '[{\"degree\":\"HSC\",\"programOrGroup\":\"asd\",\"institution\":\"Ideal School\",\"gpa\":\"5\",\"major\":\"56\",\"minor\":\"sad\",\"passingDate\":\"2020-07-30\"}]', '[{\"name\":\"Digital Marketing\",\"category\":\"asdsad\",\"workspace\":\"YES\",\"profeciency\":\"Advanced\"}]', '2020-08-27 09:07:48', '2020-08-27 10:25:26'),
(40, 27, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-10 13:12:27', '2020-09-10 13:12:27'),
(41, 52, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:30:45', '2020-09-27 05:30:45'),
(42, 51, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:31:07', '2020-09-27 05:31:07'),
(43, 50, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:31:26', '2020-09-27 05:31:26'),
(44, 49, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:32:01', '2020-09-27 05:32:01'),
(45, 46, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:32:31', '2020-09-27 05:32:31'),
(46, 47, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:32:54', '2020-09-27 05:32:54'),
(47, 48, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:33:18', '2020-09-27 05:33:18'),
(48, 28, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:33:43', '2020-09-27 05:33:43'),
(49, 35, '{\"personal_bank_name\":null,\"personal_bank_account_name\":null,\"personal_bank_account_number\":null,\"personal_bank_branch_name\":null,\"personal_bank_branch_routing_number\":null,\"bkash_account_number\":null,\"bkash_account_type\":null}', NULL, NULL, NULL, '2020-09-27 05:34:07', '2020-09-27 05:34:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_employees`
--
ALTER TABLE `assign_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_employees_designation_id_foreign` (`designation_id`),
  ADD KEY `assign_employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blacklists`
--
ALTER TABLE `blacklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_company_id_foreign` (`company_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_sub_department_id_foreign` (`sub_department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_item_category_id_foreign` (`item_category_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_brands`
--
ALTER TABLE `lead_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_brands_lead_company_id_foreign` (`lead_company_id`);

--
-- Indexes for table `lead_brand_services`
--
ALTER TABLE `lead_brand_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_brand_services_lead_brand_id_foreign` (`lead_brand_id`),
  ADD KEY `lead_brand_services_lead_product_or_service_id_foreign` (`lead_product_or_service_id`);

--
-- Indexes for table `lead_companies`
--
ALTER TABLE `lead_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_industries`
--
ALTER TABLE `lead_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_product_or_services`
--
ALTER TABLE `lead_product_or_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_product_or_services_lead_sub_industry_id_foreign` (`lead_sub_industry_id`);

--
-- Indexes for table `lead_sub_industries`
--
ALTER TABLE `lead_sub_industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_sub_industries_lead_industry_id_foreign` (`lead_industry_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_approving_superadmin_id_foreign` (`approving_superadmin_id`),
  ADD KEY `leaves_approving_supervisor_id_foreign` (`approving_supervisor_id`),
  ADD KEY `leaves_leave_type_foreign` (`leave_type`),
  ADD KEY `leaves_user_id_foreign` (`user_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `old_attendances`
--
ALTER TABLE `old_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postings_designation_id_foreign` (`designation_id`),
  ADD KEY `postings_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_company_id_foreign` (`company_id`),
  ADD KEY `projects_project_sub_category_id_foreign` (`project_sub_category_id`),
  ADD KEY `projects_project_category_id_foreign` (`project_category_id`);

--
-- Indexes for table `projects_categories`
--
ALTER TABLE `projects_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_natures`
--
ALTER TABLE `projects_natures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_sub_categories`
--
ALTER TABLE `projects_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_sub_categories_project_category_id_foreign` (`project_category_id`);

--
-- Indexes for table `project_items`
--
ALTER TABLE `project_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_items_item_id_foreign` (`item_id`),
  ADD KEY `project_items_projects_id_foreign` (`projects_id`);

--
-- Indexes for table `project_item_categories`
--
ALTER TABLE `project_item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_statuses`
--
ALTER TABLE `project_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_statuses_project_status_category_id_foreign` (`project_status_category_id`);

--
-- Indexes for table `project_status_categories`
--
ALTER TABLE `project_status_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_departments_department_id_foreign` (`department_id`);

--
-- Indexes for table `tangible_assets`
--
ALTER TABLE `tangible_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tangible_assets_tangible_category_id_foreign` (`tangible_category_id`);

--
-- Indexes for table `tangible_categories`
--
ALTER TABLE `tangible_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_master`
--
ALTER TABLE `task_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_personal_email_unique` (`personal_email`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_employees`
--
ALTER TABLE `assign_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `blacklists`
--
ALTER TABLE `blacklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lead_brands`
--
ALTER TABLE `lead_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lead_brand_services`
--
ALTER TABLE `lead_brand_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lead_companies`
--
ALTER TABLE `lead_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lead_industries`
--
ALTER TABLE `lead_industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `lead_product_or_services`
--
ALTER TABLE `lead_product_or_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lead_sub_industries`
--
ALTER TABLE `lead_sub_industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `old_attendances`
--
ALTER TABLE `old_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects_categories`
--
ALTER TABLE `projects_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `projects_natures`
--
ALTER TABLE `projects_natures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects_sub_categories`
--
ALTER TABLE `projects_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_item_categories`
--
ALTER TABLE `project_item_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project_statuses`
--
ALTER TABLE `project_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_status_categories`
--
ALTER TABLE `project_status_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_departments`
--
ALTER TABLE `sub_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tangible_assets`
--
ALTER TABLE `tangible_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tangible_categories`
--
ALTER TABLE `tangible_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task_category`
--
ALTER TABLE `task_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_master`
--
ALTER TABLE `task_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_employees`
--
ALTER TABLE `assign_employees`
  ADD CONSTRAINT `assign_employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_sub_department_id_foreign` FOREIGN KEY (`sub_department_id`) REFERENCES `sub_departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `project_item_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_brands`
--
ALTER TABLE `lead_brands`
  ADD CONSTRAINT `lead_brands_lead_company_id_foreign` FOREIGN KEY (`lead_company_id`) REFERENCES `lead_companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_brand_services`
--
ALTER TABLE `lead_brand_services`
  ADD CONSTRAINT `lead_brand_services_lead_brand_id_foreign` FOREIGN KEY (`lead_brand_id`) REFERENCES `lead_brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_brand_services_lead_product_or_service_id_foreign` FOREIGN KEY (`lead_product_or_service_id`) REFERENCES `lead_product_or_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_product_or_services`
--
ALTER TABLE `lead_product_or_services`
  ADD CONSTRAINT `lead_product_or_services_lead_sub_industry_id_foreign` FOREIGN KEY (`lead_sub_industry_id`) REFERENCES `lead_sub_industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_sub_industries`
--
ALTER TABLE `lead_sub_industries`
  ADD CONSTRAINT `lead_sub_industries_lead_industry_id_foreign` FOREIGN KEY (`lead_industry_id`) REFERENCES `lead_industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_approving_superadmin_id_foreign` FOREIGN KEY (`approving_superadmin_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `leaves_approving_supervisor_id_foreign` FOREIGN KEY (`approving_supervisor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `leaves_leave_type_foreign` FOREIGN KEY (`leave_type`) REFERENCES `leave_types` (`id`),
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `postings`
--
ALTER TABLE `postings`
  ADD CONSTRAINT `postings_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `postings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `lead_companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `projects_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_project_sub_category_id_foreign` FOREIGN KEY (`project_sub_category_id`) REFERENCES `projects_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_sub_categories`
--
ALTER TABLE `projects_sub_categories`
  ADD CONSTRAINT `projects_sub_categories_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `projects_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_items`
--
ALTER TABLE `project_items`
  ADD CONSTRAINT `project_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_items_projects_id_foreign` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_statuses`
--
ALTER TABLE `project_statuses`
  ADD CONSTRAINT `project_statuses_project_status_category_id_foreign` FOREIGN KEY (`project_status_category_id`) REFERENCES `project_status_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD CONSTRAINT `sub_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tangible_assets`
--
ALTER TABLE `tangible_assets`
  ADD CONSTRAINT `tangible_assets_tangible_category_id_foreign` FOREIGN KEY (`tangible_category_id`) REFERENCES `tangible_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

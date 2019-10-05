-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 12:39 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics_years`
--
-- Creation: Mar 02, 2019 at 10:03 AM
--

CREATE TABLE `academics_years` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `session` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `academics_years`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `academics_years`
--

INSERT INTO `academics_years` (`id`, `session`, `year`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, '2020', '2020-2021', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-02 04:19:03', '2019-03-02 04:54:47'),
(2, '2018', '2018-2019', NULL, 0, 1, 0, NULL, 1, NULL, NULL, '2019-03-06 22:55:36'),
(3, '2019', '2019-2020', NULL, 1, 1, 0, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--
-- Creation: Mar 15, 2019 at 07:45 AM
--

CREATE TABLE `bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `bank_accounts`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `bank_name`, `account_no`, `balance`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Nepal Investment Bank', '2355625', '611812.00', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:05:25', '2019-03-15 04:05:42'),
(2, 'Kist Bank Limited', '554468', '505656.00', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 04:06:17', '2019-03-26 23:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--
-- Creation: Mar 15, 2019 at 07:45 AM
--

CREATE TABLE `chart_of_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `chart_of_accounts`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `name`, `type`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Monthly Fee', 'income', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:06:20', '2019-03-15 02:06:20'),
(2, 'Rent', 'expense', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:06:29', '2019-03-15 02:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--
-- Creation: Mar 15, 2019 at 05:42 AM
--

CREATE TABLE `classrooms` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `class_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_status` tinyint(3) NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `classrooms`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `class_name`, `section_status`, `remarks`, `post_by`, `status`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'One', 0, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-13 02:31:15', '2019-03-13 02:31:15'),
(2, 'Two', 0, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-13 02:31:22', '2019-03-13 02:31:22'),
(13, 'Three', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 00:00:36', '2019-03-15 00:00:36'),
(14, 'Four', 0, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 00:00:47', '2019-03-15 00:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `class_days`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `class_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `class_days`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--
-- Creation: Feb 23, 2019 at 05:44 AM
--

CREATE TABLE `complains` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `complain_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taken_action` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `attach_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `complains`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `session_id`, `complain_type`, `source`, `complain_by`, `phone`, `email`, `date`, `taken_action`, `note`, `attach_document`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 110, 'Discipline', 'Watchman', 'Meera Shrestha', NULL, 'meera@gmail.com', '02/07/2019', NULL, NULL, NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-26 22:56:35', '2019-02-26 22:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `departments`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Exam', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:42:51', '2019-02-23 00:42:51'),
(2, 'Account', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:42:56', '2019-02-23 00:42:56'),
(3, 'Sports', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:43:08', '2019-02-23 00:43:08'),
(4, 'Science', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:43:15', '2019-02-23 00:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `designations`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Driver', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:40:41', '2019-02-23 00:40:41'),
(2, 'Teacher', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:40:54', '2019-02-23 00:40:54'),
(3, 'Accountant', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:41:00', '2019-02-23 00:41:00'),
(4, 'Receptionist', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:41:07', '2019-02-23 00:41:07'),
(5, 'Principal', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:41:16', '2019-02-23 00:41:16'),
(6, 'Watchman', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:41:24', '2019-02-23 00:41:24'),
(7, 'Librarian', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:41:29', '2019-02-23 00:41:29'),
(8, 'Sports Teacher', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:41:48', '2019-02-23 00:41:48'),
(9, 'Lab Incharge', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:42:03', '2019-02-23 00:42:03'),
(10, 'Peon', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:42:14', '2019-02-23 00:42:14'),
(11, 'Gardener', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 00:42:27', '2019-02-23 00:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--
-- Creation: Feb 23, 2019 at 05:44 AM
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `next_follow_up_date` date DEFAULT NULL,
  `reference` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `number_of_child` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `enquiries`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_lists`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `exam_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `exam_lists`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `exam_lists`
--

INSERT INTO `exam_lists` (`id`, `name`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(5, 'First Term', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-13 03:32:29', '2019-03-13 03:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `exam_routines`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `exam_routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `exam_routines`:
--   `exam_id`
--       `exam_lists` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `exam_routines`
--

INSERT INTO `exam_routines` (`id`, `exam_id`, `file`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(3, 5, 'public/5maoUvTyEOpXQJBwTxgAlpnbYmGSR5kQ3jtljABn.png', 'First Terminal Examination Routine', 1, 1, 0, NULL, 1, NULL, '2019-03-27 01:19:28', '2019-03-27 01:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `fee_collects`
--
-- Creation: Mar 07, 2019 at 04:51 AM
--

CREATE TABLE `fee_collects` (
  `id` int(10) UNSIGNED NOT NULL,
  `classroom_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `fee_collects`:
--

-- --------------------------------------------------------

--
-- Table structure for table `fee_discounts`
--
-- Creation: Mar 07, 2019 at 04:47 AM
--

CREATE TABLE `fee_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `fee_discounts`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--
-- Creation: Mar 25, 2019 at 07:27 AM
--

CREATE TABLE `fee_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `classroom_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `fee_types`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`id`, `classroom_id`, `fee_code`, `fee_type`, `amount`, `note`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, '1', '01', 'Monthly Fee', 1500, NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-11 02:32:06', '2019-03-11 02:32:06'),
(2, '2', '012', 'Admission Fee', 10000, NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 03:51:53', '2019-03-18 03:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--
-- Creation: Apr 04, 2019 at 07:08 AM
--

CREATE TABLE `fiscal_years` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `fiscal_years`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `name`, `starting_date`, `ending_date`, `remarks`, `working_status`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, '75/76', '2018-04-04', '2019-04-29', 'First Session', 1, 1, 1, 0, NULL, 1, NULL, NULL, '2019-04-05 23:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--
-- Creation: Feb 28, 2019 at 05:38 AM
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `galleries`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Holiday', 'Adidas NK', NULL, 1, 0, NULL, 1, NULL, 1, '2019-03-06 00:56:51', '2019-03-06 00:56:51'),
(2, 'January Update', 'Nah', NULL, 1, 0, NULL, 1, NULL, 1, '2019-03-08 03:20:51', '2019-03-08 03:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--
-- Creation: Mar 06, 2019 at 06:41 AM
--

CREATE TABLE `gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `gallery_images`:
--   `gallery_id`
--       `galleries` -> `id`
--

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/tKcSdlf2ki0Q2YndkwQ6yPICqzMSHwEPN16ZjRsS.jpeg', '2019-03-06 00:56:51', '2019-03-06 00:56:51'),
(2, 1, 'public/HvRKFIhMAZ0Cf0eJ4dm6N0QVNU5H2D0cs7UGdJdY.jpeg', '2019-03-06 00:56:51', '2019-03-06 00:56:51'),
(3, 1, 'public/Jk9QgEap9kcfAgJxsxueK3igYyvlQ1CFFfdfDMwB.jpeg', '2019-03-06 00:56:51', '2019-03-06 00:56:51'),
(5, 1, 'public/zEwIhT4Y67c2AFSMMMCCI9R6yrG5dYCGb3yNjkAe.jpeg', '2019-03-06 00:59:20', '2019-03-06 00:59:20'),
(7, 2, 'public/GR9Ba6pSpLePwgaljdgURgfWfBy7AUWAIDHbEtbm.jpeg', '2019-03-08 03:20:51', '2019-03-08 03:20:51'),
(8, 2, 'public/gBzEpfyCUTeXwmxKN11CEBK4al9e4swUaRoDqHsO.jpeg', '2019-03-08 03:20:51', '2019-03-08 03:20:51'),
(9, 2, 'public/QBmMdcGKzEecc71rPT8TaMUI4UkOER2qKGyFj667.jpeg', '2019-03-08 03:20:51', '2019-03-08 03:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks_from` decimal(8,2) NOT NULL,
  `marks_to` decimal(8,2) NOT NULL,
  `point` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `grades`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--
-- Creation: Apr 05, 2019 at 10:04 AM
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `groups`:
--

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `parent_id`, `remarks`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Assets', 1, NULL, NULL, NULL, 1),
(2, 'Current Assets', 1, NULL, NULL, NULL, 1),
(3, 'Bank Accounts', 2, NULL, NULL, NULL, 1),
(4, 'Cash-In-Hand', 2, NULL, NULL, NULL, 1),
(5, 'Deposits', 2, NULL, NULL, NULL, 1),
(6, 'Loans And Advances', 2, NULL, NULL, NULL, 1),
(7, 'Stock-In-Hand', 2, NULL, NULL, NULL, 1),
(8, 'Sundry Debtors', 2, NULL, NULL, NULL, 1),
(9, 'Miscellaneous Expenses', 1, NULL, NULL, NULL, 1),
(10, 'Investments', 1, NULL, NULL, NULL, 1),
(11, 'Fixed Assets', 1, NULL, NULL, NULL, 1),
(12, 'Liabilities', 12, NULL, NULL, NULL, 1),
(13, 'Branch/Divisions', 12, NULL, NULL, NULL, 1),
(14, 'Loans', 12, NULL, NULL, NULL, 1),
(15, 'Bank OCC A/C (Bank OD A/C)', 14, NULL, NULL, NULL, 1),
(16, 'Secured Loans', 14, NULL, NULL, NULL, 1),
(17, 'Unsecured Loans', 14, NULL, NULL, NULL, 1),
(18, 'Suspense A/C', 12, NULL, NULL, NULL, 1),
(19, 'Current Liabilities', 12, NULL, NULL, NULL, 1),
(20, 'Provisions', 19, NULL, NULL, NULL, 1),
(21, 'Sundry Creditors', 19, NULL, NULL, NULL, 1),
(22, 'Duties & Taxes', 19, NULL, NULL, NULL, 1),
(23, 'Capital Account', 12, NULL, NULL, NULL, 1),
(24, 'Reserves & Surplus (Retained Earnings)', 23, NULL, NULL, NULL, 1),
(25, 'Income', 25, NULL, NULL, NULL, 1),
(26, 'Sales Accounts', 25, NULL, NULL, NULL, 1),
(27, 'Indirect Incomes', 25, NULL, NULL, NULL, 1),
(28, 'Direct Incomes', 25, NULL, NULL, NULL, 1),
(29, 'Expenses', 29, NULL, NULL, NULL, 1),
(30, 'Purchase Accounts', 29, NULL, NULL, NULL, 1),
(31, 'Indirect Expenses', 29, NULL, NULL, NULL, 1),
(32, 'Direct Expenses', 29, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--
-- Creation: Mar 07, 2019 at 04:51 AM
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) UNSIGNED NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `due_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total` decimal(8,2) NOT NULL,
  `paid` decimal(8,2) NOT NULL,
  `paid_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `invoices`:
--   `post_by`
--       `users` -> `id`
--   `student_id`
--       `students` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `student_id`, `classroom_id`, `section_id`, `session_id`, `due_date`, `title`, `description`, `total`, `paid`, `paid_amount`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '03/12/2019', 'Third', NULL, '1500.00', '1.00', '1500.00', 1, 1, 0, NULL, 1, NULL, '2019-03-12 01:46:38', '2019-03-12 03:54:11'),
(3, 15, 1, 1, 3, '03/05/2019', 'Monthly Fees', NULL, '3000.00', '1.00', '3000.00', 1, 1, 0, NULL, 1, NULL, '2019-03-05 02:17:50', '2019-03-05 02:18:27'),
(4, 16, 1, 1, 3, '03/05/2019', 'Monthly Fees', NULL, '3000.00', '1.00', '3000.00', 1, 1, 0, NULL, 1, NULL, '2019-03-05 02:17:50', '2019-03-15 04:34:22'),
(5, 15, 1, 1, 3, '02/01/2019', 'Monthly Fees', NULL, '3000.00', '1.00', '3000.00', 1, 1, 0, NULL, 1, NULL, '2019-03-06 04:55:20', '2019-03-15 04:22:31'),
(6, 7, 1, 1, 3, '03/18/2019', 'kl', 'jk', '1500.00', '1.00', '1500.00', 1, 1, 0, NULL, 1, NULL, '2019-03-18 04:00:45', '2019-03-18 04:03:59'),
(7, 7, 1, 1, 3, '2019-03-30', 'First', NULL, '1500.00', '1.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-30 00:34:19', '2019-03-30 00:34:19'),
(8, 7, 1, 1, 3, '2019-03-30', 'First', NULL, '1500.00', '0.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-30 00:34:21', '2019-03-30 00:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--
-- Creation: Mar 07, 2019 at 04:51 AM
--

CREATE TABLE `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `invoice_items`:
--   `fee_id`
--       `fee_types` -> `id`
--   `invoice_id`
--       `invoices` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `fee_id`, `amount`, `discount`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1500.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-12 01:46:38', '2019-03-12 01:46:38'),
(3, 3, 2, '3000.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-05 02:17:50', '2019-03-05 02:17:50'),
(4, 4, 2, '3000.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-05 02:17:50', '2019-03-05 02:17:50'),
(5, 5, 2, '3000.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-06 04:55:20', '2019-03-06 04:55:20'),
(6, 6, 1, '1500.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-18 04:00:45', '2019-03-18 04:00:45'),
(7, 7, 1, '1500.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-30 00:34:19', '2019-03-30 00:34:19'),
(9, 8, 1, '1500.00', '0.00', 1, 1, 0, NULL, 1, NULL, '2019-03-30 00:34:41', '2019-03-30 00:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `item_of_journals`
--
-- Creation: Apr 04, 2019 at 10:25 AM
--

CREATE TABLE `item_of_journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `journal_id` int(10) UNSIGNED NOT NULL,
  `ledger_id` int(10) UNSIGNED NOT NULL,
  `debit` decimal(8,2) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `cr_dr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `item_of_journals`:
--   `journal_id`
--       `journals` -> `id`
--   `ledger_id`
--       `list_of_ledgers` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `item_of_journals`
--

INSERT INTO `item_of_journals` (`id`, `journal_id`, `ledger_id`, `debit`, `credit`, `cr_dr`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(3, 3, 2, '18000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:37:45', '2019-04-04 04:37:45'),
(5, 4, 2, '18000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:41:22', '2019-04-05 00:23:07'),
(6, 4, 3, '0.00', '18000.00', 'cr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:41:22', '2019-04-05 00:23:07'),
(7, 5, 3, '25000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 22:54:51', '2019-04-04 23:52:20'),
(8, 5, 2, '25000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 22:54:51', '2019-04-04 22:54:51'),
(9, 6, 2, '15000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 23:01:22', '2019-04-05 00:20:32'),
(10, 6, 1, '0.00', '15000.00', 'cr', 1, 1, 0, NULL, 1, NULL, '2019-04-04 23:01:22', '2019-04-05 00:20:32'),
(11, 2, 1, '146.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-05 00:13:46', '2019-04-05 00:13:46'),
(12, 2, 2, '0.00', '146.00', 'cr', 1, 1, 0, NULL, 1, NULL, '2019-04-05 00:13:46', '2019-04-05 00:13:46'),
(13, 7, 2, '35000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-05 02:15:18', '2019-04-05 02:15:18'),
(14, 7, 1, '0.00', '35000.00', 'cr', 1, 1, 0, NULL, 1, NULL, '2019-04-05 02:15:18', '2019-04-05 02:15:18'),
(15, 8, 3, '15000.00', '0.00', 'dr', 1, 1, 0, NULL, 1, NULL, '2019-04-06 02:01:41', '2019-04-06 02:01:41'),
(16, 8, 2, '0.00', '15000.00', 'cr', 1, 1, 0, NULL, 1, NULL, '2019-04-06 02:01:41', '2019-04-06 02:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--
-- Creation: Apr 04, 2019 at 07:27 AM
--

CREATE TABLE `journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `fiscal_year_id` tinyint(3) UNSIGNED NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci,
  `total_debit` decimal(8,2) NOT NULL,
  `total_credit` decimal(8,2) NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `journals`:
--   `fiscal_year_id`
--       `fiscal_years` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `fiscal_year_id`, `date`, `narration`, `total_debit`, `total_credit`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(2, 1, '2019-04-04', 'April Salary', '146.00', '146.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 01:41:41', '2019-04-05 00:13:46'),
(3, 1, '2019-04-04', NULL, '18000.00', '18000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:37:45', '2019-04-04 23:00:44'),
(4, 1, '2019-04-04', NULL, '18000.00', '18000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:41:22', '2019-04-05 00:23:06'),
(5, 1, '2019-04-05', 'April\'s Salaryi', '25000.00', '25000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 22:54:51', '2019-04-04 23:51:21'),
(6, 1, '2019-04-05', NULL, '15000.00', '15000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 23:01:21', '2019-04-05 00:20:32'),
(7, 1, '2019-04-05', NULL, '35000.00', '35000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 02:15:18', '2019-04-05 02:15:18'),
(8, 1, '2019-04-06', NULL, '15000.00', '15000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-06 02:01:41', '2019-04-06 02:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--
-- Creation: Mar 23, 2019 at 06:32 AM
--

CREATE TABLE `leave_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `leave_applications`:
--   `post_by`
--       `users` -> `id`
--   `student_id`
--       `students` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--
-- Creation: Apr 04, 2019 at 10:02 AM
--

CREATE TABLE `ledgers` (
  `id` int(10) UNSIGNED NOT NULL,
  `voucher_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_id` int(191) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `ledgers`:
--   `ledger_id`
--       `list_of_ledgers` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `voucher_no`, `ledger_id`, `date`, `description`, `debit`, `credit`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(3, '4', 2, '2019-04-04', '3', '18000.00', '0.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:41:22', '2019-04-05 00:23:07'),
(4, '4', 3, '2019-04-04', '2', '0.00', '18000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 04:41:23', '2019-04-05 00:23:07'),
(5, '5', 3, '2019-04-05', '2', '0.00', '25000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 22:54:51', '2019-04-04 22:54:51'),
(6, '5', 2, '2019-04-05', '3', '25000.00', '0.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 22:54:51', '2019-04-04 22:54:51'),
(7, '6', 2, '2019-04-05', '1', '15000.00', '0.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 23:01:22', '2019-04-04 23:01:22'),
(8, '6', 1, '2019-04-05', '2', '0.00', '15000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-04 23:01:22', '2019-04-04 23:01:22'),
(9, '2', 1, '2019-04-04', '2', '146.00', '0.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 00:13:47', '2019-04-05 00:13:47'),
(10, '2', 2, '2019-04-04', '1', '0.00', '146.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 00:13:47', '2019-04-05 00:13:47'),
(11, '7', 2, '2019-04-05', '1', '35000.00', '0.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 02:15:19', '2019-04-05 02:15:19'),
(12, '7', 1, '2019-04-05', '2', '0.00', '35000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 02:15:19', '2019-04-05 02:15:19'),
(13, '8', 3, '2019-04-06', '2', '15000.00', '0.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-06 02:01:41', '2019-04-06 02:01:41'),
(14, '8', 2, '2019-04-06', '3', '0.00', '15000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-06 02:01:41', '2019-04-06 02:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_ledgers`
--
-- Creation: Apr 03, 2019 at 10:17 AM
--

CREATE TABLE `list_of_ledgers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `list_of_ledgers`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `list_of_ledgers`
--

INSERT INTO `list_of_ledgers` (`id`, `name`, `alias`, `under`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Computer', 'Repair', '2', 1, NULL, 1, 0, NULL, 1, NULL, '2019-04-03 04:37:21', '2019-04-03 22:53:45'),
(2, 'Cash', 'Rupees', '4', 1, NULL, 1, 0, NULL, 1, NULL, '2019-04-03 04:39:55', '2019-04-06 00:01:45'),
(3, 'Salary', NULL, '2', 1, NULL, 1, 0, NULL, 1, NULL, '2019-04-04 04:33:59', '2019-04-05 04:05:31'),
(4, 'Donation', NULL, '2', 1, NULL, 1, 0, NULL, 1, NULL, '2019-04-05 23:59:24', '2019-04-06 00:02:15'),
(5, 'Wages', NULL, '11', 1, NULL, 1, 0, NULL, 1, NULL, '2019-04-06 02:06:45', '2019-04-06 02:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--
-- Creation: Mar 11, 2019 at 10:48 AM
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `classroom_id` tinyint(3) UNSIGNED NOT NULL,
  `section_id` tinyint(3) UNSIGNED NOT NULL,
  `th_marks` tinyint(4) DEFAULT NULL,
  `pr_marks` tinyint(4) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `marks`:
--   `classroom_id`
--       `classrooms` -> `id`
--   `exam_id`
--       `exam_lists` -> `id`
--   `post_by`
--       `users` -> `id`
--   `section_id`
--       `sections` -> `id`
--   `student_id`
--       `students` -> `id`
--   `subject_id`
--       `subjects` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `exam_id`, `subject_id`, `student_id`, `classroom_id`, `section_id`, `th_marks`, `pr_marks`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(2, 3, 2, 2, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(3, 3, 3, 2, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(4, 4, 1, 2, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(5, 4, 2, 2, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(6, 4, 3, 2, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(7, 4, 1, 3, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(8, 4, 2, 3, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(9, 4, 3, 3, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(10, 4, 1, 4, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(11, 4, 2, 4, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(12, 4, 3, 4, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(13, 5, 1, 7, 1, 1, NULL, 54, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-29 01:06:32'),
(14, 5, 2, 7, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(15, 5, 1, 8, 1, 1, NULL, 32, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-29 01:06:56'),
(16, 5, 2, 8, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(17, 5, 1, 9, 1, 1, NULL, 40, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-29 01:06:58'),
(18, 5, 2, 9, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(19, 5, 1, 10, 1, 1, NULL, 20, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-29 01:07:04'),
(20, 5, 2, 10, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(21, 5, 1, 11, 1, 1, NULL, 50, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 01:13:49'),
(22, 5, 2, 11, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(23, 5, 1, 12, 1, 1, NULL, 50, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 01:13:53'),
(24, 5, 2, 12, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(25, 5, 1, 13, 1, 1, NULL, 50, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 01:13:55'),
(26, 5, 2, 13, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(27, 5, 1, 14, 1, 1, NULL, 50, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 00:36:13'),
(28, 5, 2, 14, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(29, 5, 1, 15, 1, 1, NULL, 60, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 00:36:14'),
(30, 5, 2, 15, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(31, 5, 1, 16, 1, 1, NULL, 50, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 01:14:38'),
(32, 5, 2, 16, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(33, 5, 1, 17, 1, 1, NULL, 50, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 01:14:39'),
(34, 5, 2, 17, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(35, 5, 1, 18, 1, 1, NULL, 55, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 01:14:43'),
(36, 5, 2, 18, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(37, 5, 1, 19, 1, 1, NULL, 64, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 00:36:18'),
(38, 5, 2, 19, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL),
(39, 5, 1, 20, 1, 1, NULL, 51, NULL, 1, 0, NULL, 1, NULL, 1, NULL, '2019-03-14 00:36:19'),
(40, 5, 2, 20, 1, 1, NULL, NULL, NULL, 1, 0, NULL, 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mark_grades`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `mark_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `mark_grades`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `mark_grades`
--

INSERT INTO `mark_grades` (`id`, `name`, `from`, `upto`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'A', '80', '100', NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:49:05', '2019-02-23 00:49:05'),
(2, 'B', '60', '80', NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:49:14', '2019-02-23 00:49:14'),
(3, 'C', '40', '60', NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:49:24', '2019-02-23 00:49:24'),
(4, 'D', '30', '40', NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:49:33', '2019-02-23 00:49:33'),
(5, 'F', '0', '30', NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:49:41', '2019-02-23 00:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
-- Creation: Feb 23, 2019 at 05:29 AM
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `migrations`:
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2018_01_00_000000_create_users_table', 1),
(7, '2018_01_01_100000_create_password_resets_table', 1),
(8, '2018_01_01_100001_create_settings_table', 1),
(13, '2018_01_01_100006_create_subjects_table', 1),
(14, '2018_01_01_100007_create_syllabus_table', 1),
(16, '2018_01_01_100009_create_academics_years_table', 1),
(18, '2018_01_01_100015_create_transport_vehicles_table', 1),
(19, '2018_01_01_100016_create_transport_routes_table', 1),
(20, '2018_01_01_100017_create_transport_assigns_table', 1),
(22, '2018_06_04_173837_create_class_days_table', 1),
(23, '2019_02_13_074732_create_fee_types_table', 1),
(24, '2019_02_14_041748_create_visitors_table', 1),
(25, '2019_02_14_063604_create_departments_table', 1),
(26, '2019_02_14_063621_create_designations_table', 1),
(27, '2019_02_16_063516_create_routines_table', 1),
(29, '2019_02_17_060509_create_student_attendances_table', 1),
(30, '2019_02_18_070035_create_exam_lists_table', 1),
(31, '2019_02_18_083112_create_mark_grades_table', 1),
(32, '2019_02_18_091742_create_exam_routines_table', 1),
(33, '2019_07_09_105314_create_grades_table', 1),
(34, '2019_07_10_104623_create_marks_table', 1),
(35, '2019_07_20_071630_create_invoices_table', 1),
(36, '2019_07_20_071647_create_invoice_items_table', 1),
(37, '2019_09_04_175517_create_website_languages_table', 1),
(38, '2019_10_26_065006_create_enquiries_table', 1),
(39, '2019_10_26_190026_create_complains_table', 1),
(40, '2019_01_28_044944_create_permission_tables', 2),
(41, '2019_02_27_070118_create_syllabus_table', 3),
(43, '2019_02_28_085434_create_academics_years_table', 5),
(44, '2019_02_16_101350_create_notices_table', 6),
(45, '2018_01_01_100004_create_staffs_table', 7),
(46, '2018_01_01_100005_create_staff_attendances_table', 7),
(47, '2019_02_28_053258_create_galleries_table', 8),
(48, '2019_03_02_113000_create_gallery_images_table', 8),
(53, '2019_02_26_102541_create_fee_discounts_table', 9),
(54, '2019_02_27_051324_create_fee_collects_table', 9),
(55, '2019_02_27_061045_create_invoices_table', 9),
(56, '2019_02_27_061136_create_fee_types_table', 9),
(57, '2019_02_27_061137_create_invoice_items_table', 9),
(58, '2019_03_01_072012_create_student_payments_table', 9),
(59, '2019_03_07_053227_create_users_activations_table', 10),
(63, '2018_01_01_100002_create_classrooms_table', 13),
(64, '2018_01_01_100003_create_sections_table', 13),
(66, '2018_01_01_100008_create_students_table', 14),
(67, '2018_01_01_100010_create_student_sessions_table', 14),
(68, '2018_01_04_190234_create_student_groups_table', 14),
(69, '2019_03_13_091545_create_payment_methods_table', 15),
(70, '2019_03_14_041529_create_payee_and_payers_table', 15),
(71, '2019_03_14_060604_create_chart_of_accounts_table', 15),
(72, '2019_03_14_063624_create_transactions_table', 15),
(73, '2019_03_14_064924_create_bank_accounts_table', 15),
(75, '2019_01_28_044944_create_permissions_tables', 16),
(76, '2019_03_17_060257_create_permission_groups_table', 17),
(77, '2019_03_21_063657_create_leave_applications_table', 18),
(78, '2019_03_21_050601_create_news_and_events_table', 19),
(80, '2019_04_03_052409_create_groups_table', 20),
(84, '2019_04_03_070326_create_list_of_groups_table', 24),
(85, '2019_04_03_101601_create_list_of_ledgers_table', 25),
(86, '2019_04_03_070629_create_ledgers_table', 26),
(89, '2019_04_03_151203_create_fiscal_years_table', 29),
(90, '2019_04_02_054600_create_journals_table', 30),
(91, '2019_04_03_095454_create_item_of_journals_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--
-- Creation: Mar 17, 2019 at 06:17 AM
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `model_has_permissions`:
--   `permission_id`
--       `permissions` -> `id`
--

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1),
(61, 'App\\User', 1),
(62, 'App\\User', 1),
(63, 'App\\User', 1),
(64, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--
-- Creation: Mar 17, 2019 at 06:17 AM
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `model_has_roles`:
--   `role_id`
--       `roles` -> `id`
--

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 5),
(2, 'App\\User', 5),
(2, 'App\\User', 6),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(4, 'App\\User', 3),
(5, 'App\\User', 53);

-- --------------------------------------------------------

--
-- Table structure for table `news_and_events`
--
-- Creation: Mar 23, 2019 at 06:39 AM
--

CREATE TABLE `news_and_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `news_and_events`:
--

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `notices`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `body`, `image`, `remarks`, `post_by`, `status`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Holiday', '<p>School is providing 3 days holiday as a winter vacation.</p>', 'public/sjCaVoarHTTGIihEU52aBFSv8uYd3zIae1qvCxOu.jpeg', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-04 02:14:53', '2019-03-04 02:14:53'),
(2, 'IV Exam Schedule', '<p>This is to notify fourth semester students that the schedule of Board Exam has been published.</p>', 'public/sRR1rcf8UKwqU0Ny3xHpleYVnyDKooHWxCs5Hoj0.png', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-05 04:14:32', '2019-03-05 04:14:32'),
(3, 'Winter Vacation', '<p>This is to notify all the students that winter vacation starts from 30 December to 15 January.</p>', 'public/GFfdYkN8mWTpQLSmqCLua9cNNNaAgv94DZAKMI2i.png', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-05 04:20:10', '2019-03-05 04:20:10'),
(4, 'Public Holiday', '<p>This is to notify all the students that public holiday on the behalf of Maha Shivaratri is given on 4th March.</p>', 'public/tnyn3kZF7MIlYPHwGtwvX0u3k5uYBljhBB3S6qvw.png', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-05 04:21:24', '2019-03-05 04:21:24'),
(5, 'January Update', '<p><img src=\"/smis/public/photos/1/3.png\" alt=\"\" /></p>', 'public/f1oDB3N3ZfaY7Ar3yXYbobVVCQIZXuQxbRkMhUZD.jpeg', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:14:45', '2019-03-24 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `oauth_access_tokens`:
--

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `oauth_auth_codes`:
--

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `oauth_clients`:
--

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `oauth_personal_access_clients`:
--

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `oauth_refresh_tokens`:
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `password_resets`:
--

-- --------------------------------------------------------

--
-- Table structure for table `payee_and_payers`
--
-- Creation: Mar 15, 2019 at 07:45 AM
--

CREATE TABLE `payee_and_payers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `payee_and_payers`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `payee_and_payers`
--

INSERT INTO `payee_and_payers` (`id`, `name`, `type`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Susan Chikanbanjar', 'payer', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:04:23', '2019-03-15 02:04:23'),
(2, 'Admin', 'payee', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:04:31', '2019-03-15 02:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--
-- Creation: Mar 15, 2019 at 07:45 AM
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `payment_methods`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Esewa', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:03:45', '2019-03-15 02:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--
-- Creation: Mar 23, 2019 at 05:02 AM
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `permissions`:
--   `group_id`
--       `permission_groups` -> `id`
--

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'role-list', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(2, 1, 'role-create', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(3, 1, 'role-edit', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(4, 1, 'role-delete', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(5, 2, 'visitor-list', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(6, 2, 'visitor-create', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(7, 2, 'visitor-edit', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(8, 2, 'visitor-delete', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(9, 3, 'hr-list', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(10, 3, 'hr-create', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(11, 3, 'hr-edit', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(12, 3, 'hr-delete', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(13, 4, 'student-list', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(14, 4, 'student-create', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(15, 4, 'student-edit', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(16, 4, 'student-delete', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(17, 5, 'classroom-list', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(18, 5, 'classroom-create', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(19, 5, 'classroom-edit', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(20, 5, 'classroom-delete', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(21, 6, 'section-list', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(22, 6, 'section-create', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(23, 6, 'section-edit', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(24, 6, 'section-delete', 'web', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(25, 7, 'studentfee-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(26, 7, 'studentfee-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(27, 7, 'studentfee-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(28, 7, 'studentfee-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(29, 8, 'routine-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(30, 8, 'routine-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(31, 8, 'routine-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(32, 8, 'routine-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(33, 9, 'notice-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(34, 9, 'notice-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(35, 9, 'notice-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(36, 9, 'notice-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(37, 10, 'exam-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(38, 10, 'exam-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(39, 10, 'exam-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(40, 10, 'exam-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(41, 11, 'grade-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(42, 11, 'grade-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(43, 11, 'grade-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(44, 11, 'grade-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(45, 12, 'exam-routine-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(46, 12, 'exam-routine-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(47, 12, 'exam-routine-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(48, 12, 'exam-routine-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(49, 13, 'marksheet-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(50, 13, 'marksheet-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(51, 13, 'marksheet-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(52, 13, 'marksheet-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(53, 14, 'complaint-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(54, 14, 'complaint-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(55, 14, 'complaint-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(56, 14, 'complaint-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(57, 15, 'enquiry-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(58, 15, 'enquiry-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(59, 15, 'enquiry-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(60, 15, 'enquiry-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(61, 16, 'permission-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(62, 16, 'permission-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(63, 16, 'permission-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(64, 16, 'permission-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(65, 17, 'user-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(66, 17, 'user-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(67, 17, 'user-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(68, 17, 'user-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(69, 18, 'student-attendance-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(70, 18, 'student-attendance-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(71, 18, 'student-attendance-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(72, 18, 'student-attendance-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(73, 19, 'staff-attendance-list', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(74, 19, 'staff-attendance-create', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(75, 19, 'staff-attendance-edit', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(76, 19, 'staff-attendance-delete', 'web', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(77, 20, 'exam-attendance-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(78, 20, 'exam-attendance-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(79, 20, 'exam-attendance-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(80, 20, 'exam-attendance-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(81, 21, 'mark-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(82, 21, 'mark-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(83, 21, 'mark-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(84, 21, 'mark-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(85, 22, 'route-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(86, 22, 'route-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(87, 22, 'route-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(88, 22, 'route-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(89, 23, 'vehicle-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(90, 23, 'vehicle-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(91, 23, 'vehicle-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(92, 23, 'vehicle-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(93, 24, 'vehicle-assign-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(94, 24, 'vehicle-assign-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(95, 24, 'vehicle-assign-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(96, 24, 'vehicle-assign-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(97, 25, 'subject-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(98, 25, 'subject-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(99, 25, 'subject-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(100, 25, 'subject-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(101, 26, 'department-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(102, 26, 'department-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(103, 26, 'department-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(104, 26, 'department-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(105, 27, 'designation-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(106, 27, 'designation-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(107, 27, 'designation-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(108, 27, 'designation-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(109, 28, 'gallery-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(110, 28, 'gallery-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(111, 28, 'gallery-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(112, 28, 'gallery-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(113, 29, 'syllabus-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(114, 29, 'syllabus-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(115, 29, 'syllabus-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(116, 29, 'syllabus-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(117, 30, 'transaction-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(118, 30, 'transaction-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(119, 30, 'transaction-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(120, 30, 'transaction-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(121, 31, 'bank-account-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(122, 31, 'bank-account-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(123, 31, 'bank-account-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(124, 31, 'bank-account-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(125, 32, 'payment-method-list', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(126, 32, 'payment-method-create', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(127, 32, 'payment-method-edit', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(128, 32, 'payment-method-delete', 'web', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(129, 33, 'chart-of-account-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(130, 33, 'chart-of-account-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(131, 33, 'chart-of-account-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(132, 33, 'chart-of-account-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(133, 34, 'payee-payer-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(134, 34, 'payee-payer-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(135, 34, 'payee-payer-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(136, 34, 'payee-payer-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(137, 35, 'invoice-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(138, 35, 'invoice-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(139, 35, 'invoice-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(140, 35, 'invoice-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(141, 36, 'database-backup-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(142, 36, 'database-backup-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(143, 36, 'database-backup-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(144, 36, 'database-backup-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(145, 37, 'academics_year-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(146, 37, 'academics_year-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(147, 37, 'academics_year-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(148, 37, 'academics_year-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(149, 38, 'student-payment-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(150, 38, 'student-payment-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(151, 38, 'student-payment-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(152, 38, 'student-payment-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(153, 39, 'student-history-list', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(154, 39, 'student-history-create', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(155, 39, 'student-history-edit', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(156, 39, 'student-history-delete', 'web', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(157, 40, 'student-leave-application-list', 'web', '2019-03-23 01:18:05', '2019-03-23 01:18:05'),
(158, 40, 'student-leave-application-create', 'web', '2019-03-23 01:18:05', '2019-03-23 01:18:05'),
(159, 40, 'student-leave-application-edit', 'web', '2019-03-23 01:18:05', '2019-03-23 01:18:05'),
(160, 40, 'student-leave-application-delete', 'web', '2019-03-23 01:18:05', '2019-03-23 01:18:05'),
(161, 41, 'news-and-event-list', 'web', '2019-03-23 01:20:52', '2019-03-23 01:20:52'),
(162, 41, 'news-and-event-create', 'web', '2019-03-23 01:20:52', '2019-03-23 01:20:52'),
(163, 41, 'news-and-event-edit', 'web', '2019-03-23 01:20:52', '2019-03-23 01:20:52'),
(164, 41, 'news-and-event-delete', 'web', '2019-03-23 01:20:53', '2019-03-23 01:20:53'),
(165, 42, 'setting-list', 'web', '2019-03-23 01:45:05', '2019-03-23 01:45:05'),
(166, 42, 'setting-create', 'web', '2019-03-23 01:45:05', '2019-03-23 01:45:05'),
(167, 42, 'setting-edit', 'web', '2019-03-23 01:45:06', '2019-03-23 01:45:06'),
(168, 42, 'setting-delete', 'web', '2019-03-23 01:45:06', '2019-03-23 01:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--
-- Creation: Mar 18, 2019 at 07:16 AM
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `permission_groups`:
--

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'role', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(2, 'visitor', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(3, 'hr', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(4, 'student', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(5, 'classroom', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(6, 'section', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(7, 'studentfee', '2019-03-22 23:26:01', '2019-03-22 23:26:01'),
(8, 'routine', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(9, 'notice', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(10, 'exam', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(11, 'grade', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(12, 'exam-routine', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(13, 'marksheet', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(14, 'complaint', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(15, 'enquiry', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(16, 'permission', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(17, 'user', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(18, 'student-attendance', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(19, 'staff-attendance', '2019-03-22 23:26:02', '2019-03-22 23:26:02'),
(20, 'exam-attendance', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(21, 'mark', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(22, 'route', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(23, 'vehicle', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(24, 'vehicle-assign', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(25, 'subject', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(26, 'department', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(27, 'designation', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(28, 'gallery', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(29, 'syllabus', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(30, 'transaction', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(31, 'bank-account', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(32, 'payment-method', '2019-03-22 23:26:03', '2019-03-22 23:26:03'),
(33, 'chart-of-account', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(34, 'payee-payer', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(35, 'invoice', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(36, 'database-backup', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(37, 'academics_year', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(38, 'student-payment', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(39, 'student-history', '2019-03-22 23:26:04', '2019-03-22 23:26:04'),
(40, 'student-leave-application', '2019-03-23 01:18:05', '2019-03-23 01:18:05'),
(41, 'news-and-event', '2019-03-23 01:20:52', '2019-03-23 01:20:52'),
(42, 'setting', '2019-03-23 01:45:05', '2019-03-23 01:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
-- Creation: Mar 17, 2019 at 06:17 AM
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `roles`:
--

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', NULL, NULL),
(2, 'Student', 'web', NULL, NULL),
(3, 'Receptionist', 'web', NULL, NULL),
(4, 'Accountant', 'web', NULL, NULL),
(5, 'Teacher', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--
-- Creation: Mar 17, 2019 at 06:17 AM
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `role_has_permissions`:
--   `permission_id`
--       `permissions` -> `id`
--   `role_id`
--       `roles` -> `id`
--

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(9, 5),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(13, 5),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(17, 3),
(17, 5),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(21, 3),
(21, 5),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 3),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(29, 3),
(29, 5),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(33, 3),
(33, 5),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(41, 5),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(45, 2),
(45, 3),
(45, 5),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(49, 2),
(49, 5),
(50, 1),
(50, 5),
(51, 1),
(51, 5),
(52, 1),
(52, 5),
(53, 1),
(54, 1),
(54, 2),
(54, 3),
(54, 5),
(55, 1),
(56, 1),
(57, 1),
(57, 2),
(57, 3),
(58, 1),
(58, 5),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(69, 5),
(70, 1),
(70, 5),
(71, 1),
(71, 5),
(72, 1),
(72, 5),
(73, 1),
(73, 5),
(74, 1),
(74, 5),
(75, 1),
(75, 5),
(76, 1),
(76, 5),
(77, 1),
(77, 5),
(78, 1),
(78, 5),
(79, 1),
(79, 5),
(80, 1),
(80, 5),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(85, 2),
(85, 3),
(85, 5),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(89, 2),
(89, 3),
(89, 5),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(97, 2),
(97, 5),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(105, 2),
(105, 5),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(109, 2),
(109, 3),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(113, 2),
(113, 5),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(117, 4),
(118, 1),
(118, 4),
(119, 1),
(119, 4),
(120, 1),
(120, 4),
(121, 1),
(121, 4),
(122, 1),
(122, 4),
(123, 1),
(123, 4),
(124, 1),
(124, 4),
(125, 1),
(125, 4),
(126, 1),
(126, 4),
(127, 1),
(127, 4),
(128, 1),
(128, 4),
(129, 1),
(129, 4),
(130, 1),
(130, 4),
(131, 1),
(131, 4),
(132, 1),
(132, 4),
(133, 1),
(133, 4),
(134, 1),
(134, 4),
(135, 1),
(135, 4),
(136, 1),
(136, 4),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(153, 3),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(157, 5),
(158, 1),
(158, 2),
(159, 1),
(160, 1),
(161, 1),
(161, 2),
(161, 3),
(161, 4),
(161, 5),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1);

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routine_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `routines`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `class`, `section`, `routine_photo`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 'public/3wXBVPYs4ORmR8bJdPV0sXdGrLLJXZ1iKrkgbUyp.png', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-26 23:26:35', '2019-02-26 23:26:35'),
(2, '2', '1', 'public/hR9d3ZjcusTo9rnYE6vfp0TFZ4u3WsMoGxlAM80M.png', 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-26 23:26:52', '2019-03-26 04:55:02'),
(3, '1', '1', 'public/AnhBKyOrnQE6JOzSjD7mFtPRbjLuG5LMdKbd6Pc9.png', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-27 00:36:38', '2019-03-27 00:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--
-- Creation: Mar 22, 2019 at 09:23 AM
--

CREATE TABLE `sections` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `sections`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `classroom_id`, `class_teacher_id`, `capacity`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Bagmati', '1', 12, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 02:31:42', '2019-03-13 02:31:42'),
(2, 'Gandaki', '1', 2, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 02:31:56', '2019-03-13 02:31:56'),
(3, 'Trisuli', '2', 3, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 02:32:25', '2019-03-13 02:32:25'),
(4, 'Seti', '2', 4, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 02:32:41', '2019-03-13 02:32:41'),
(5, 'Default', '12', 7, 0, 1, 'jij', 1, 0, NULL, 1, NULL, '2019-03-14 23:59:08', '2019-03-14 23:59:08'),
(6, 'Default', '14', 8, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 00:00:47', '2019-03-15 00:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `settings`:
--

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'school_name', 'Mahendra Vidya Ashram', NULL, '2019-03-18 00:00:10'),
(2, 'site_title', 'CodePass', NULL, NULL),
(3, 'school_phone', '9843352492', NULL, NULL),
(4, 'school_email', 'codepass@gmail.com', NULL, NULL),
(5, 'currency_symbol', 'NRP', NULL, NULL),
(6, 'timezone', 'Asia/Kathmandu', NULL, NULL),
(7, 'data_color', 'rose', NULL, '2019-03-18 02:05:13'),
(8, 'data_background_color', 'black', NULL, '2019-04-05 04:32:27'),
(9, 'background_image', 'http://localhost/smis/public/assets/backend/img/sidebar-3.jpg', NULL, '2019-04-06 02:29:59'),
(10, 'school_address', 'Jagati, Bhaktapur', NULL, NULL),
(11, '_method', 'PUT', '2019-03-17 01:38:18', '2019-03-18 00:00:10'),
(12, 'short_name', 'CodePass', '2019-03-17 01:38:18', '2019-03-18 00:00:10'),
(13, 'tagline', 'Do Good, Be Good', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(14, 'email', 'mva@edu.np', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(15, 'phone', '9843352492', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(16, 'address', 'Barahisthan-14, Bhaktapur', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(17, 'establish_date', '2045', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(18, 'fb_link', 'www.facebook.com/mva', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(19, 'twitter_link', 'www.twitter.com/mva', '2019-03-17 01:38:18', '2019-03-18 00:00:11'),
(20, 'instagram_link', 'www.instagram.com/mva', '2019-03-17 01:38:19', '2019-03-18 00:00:11'),
(21, 'linkedin_link', 'www.linkedin.com/mva', '2019-03-17 01:38:19', '2019-03-18 00:00:11'),
(22, 'principal_voice', '<p>Dear Parents, Guardians and Students,</p>\r\n<p>Little Angels&rsquo; School believes in imparting quality education to all its students. Empowerment of each child at all levels by meeting the intellectual and emotional needs of the child is what we strive for. Our school has the best facilities that offer wide ranging opportunities for an outstanding teaching-learning environment.</p>\r\n<p>We believe Little Angels&rsquo; School is the largest institution of quality and a catalyst of academic, socio-culture, moral values that constantly influence and transform the students. LAS is one of the prestigious homes of learning. In addition to high quality academics, life at Little Angels&rsquo; provides a variety of opportunities for all round development of a child through music, sports, debates, quizzes, social involvement and cultural activities. The activities provide an opportunity for students to display their creative ability, develop their interest and build confidence. By the co-operation of parents, well wishers, efficient and dedicated teachers the school will ever more strive for excellence. We urge teachers, parents and guardians to present themselves as role models and inspire children by emulating true and lasting values.</p>', '2019-03-17 23:13:34', '2019-03-18 00:00:11'),
(23, 'logo', 'public/qgwppvphBl0WDMXXgH5JRN01xezU56ZAjt7Za46G.png', '2019-03-17 23:49:23', '2019-03-17 23:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--
-- Creation: Mar 07, 2019 at 05:39 AM
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `joining_date` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `higher_education_degree` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_duration` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_to_leave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_duration` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_institution_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `staffs`:
--   `post_by`
--       `users` -> `id`
--   `user_id`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `temporary_address`, `permanent_address`, `nationality`, `citizenship_no`, `citizenship_photo`, `personal_photo`, `phone`, `mobile`, `email`, `marital_status`, `father_first_name`, `father_middle_name`, `father_last_name`, `father_phone`, `father_mobile`, `father_occupation`, `mother_first_name`, `mother_middle_name`, `mother_last_name`, `mother_phone`, `mother_mobile`, `mother_occupation`, `blood_group`, `comments`, `joining_date`, `staff_id`, `designation_id`, `department_id`, `higher_education_degree`, `grade`, `institution`, `institution_address`, `institution_name`, `address`, `work_duration`, `reason_to_leave`, `training_title`, `training_duration`, `training_institution_name`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`, `is_activated`) VALUES
(2, 1, 'sahas', NULL, 'dangol', '02/25/2019', 'Male', NULL, 'tarkaribajar ,banepa', 'Nepal', '1234567890987654321', NULL, NULL, '9860464445', '9860464445', 'msrsn123@gmail.com', 'Single', 'ms', NULL, 'rsn', '9860464445', '9860464445', NULL, 'ms', NULL, 'rsn', '9860464445', '9860464445', NULL, 'A-', NULL, NULL, NULL, '2', '1', 'master in human science', '1', 'Khwopa medical college', 'tarkaribajar ,banepa', 'ms rsn', 'tarkaribajar ,banepa', '9', 'domination by seniors\"', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-05 23:59:05', '2019-03-05 23:59:05', 1),
(3, 1, 'Regan', NULL, 'Joshi', '02/25/1995', 'Male', NULL, 'tarkaribajar ,banepa', 'Nepal', '1234567890987654321', NULL, NULL, '9860464445', '9860464445', 'regan@gmail.com', 'Single', 'ms', NULL, 'rsn', '9860464445', '9860464445', NULL, 'ms', NULL, 'rsn', '9860464445', '9860464445', NULL, 'A+', NULL, NULL, NULL, '2', '1', 'slc', '1', 'shree kalidevi school', 'sindhupalchowk', 'little angle school', 'hattiban', '3 months', 'salary\"', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-05 23:59:05', '2019-03-05 23:59:05', 1),
(4, 1, 'Susan', NULL, 'Chikanbanjar', '03/06/2019', 'Male', 'Toronto', 'Chyamasingh', 'Nepali', '035-3-2-00612-2014', 'public/Lvl1t9zAMwe7uHoPVKjVMWvX34dH3J1RuAUeF49F.jpeg', 'public/zMc2Cw7gPce4GZO2d0rZ8Trw6Wf9L96Voha6zUPt.jpeg', '9843352492', '9843522492', 'schandboy@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-06', 'hr2019-2', '2', '1', 'Bachelor\'s', '1', 'Khwopa Engineering College', 'Chyamasingh', 'Susan Chikanbanjar', 'Chyamasingh', '1 Week', 'K', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-06 00:04:31', '2019-03-11 01:16:24', 1),
(7, 1, 'Susan', NULL, 'Chikanbanjar', '03/07/2019', 'Male', 'Jagati', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/vFzfabDUvG6uiyfk03JsvdR40tJ9KazwxMMu6Uhn.jpeg', 'public/Qv2MOBGPeq1i52xMNOvRaubfFn2zWg0dIXcExYBi.jpeg', '9843352492', '9843352492', 'rykysh@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-07', 'hr2019-5', '1', '2', 'Bachelor\'s', '1', 'Khwopa Engineering College', 'Liwali', 'Susan Chikanbanjar', 'Liwali, Near Khwopa Engineering College', '1 Week', 'E', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-07 04:45:28', '2019-03-18 00:05:39', 1),
(8, 1, 'Susan', 'Kumar', 'Chikanbanjar', '03/07/2019', 'Others', 'Chyamasingh', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/CdjWPJhIBfZ0FTPMw4DOnEFqtTeqVoafHinkm5VF.jpeg', 'public/pShCfbvgMILhQnCCqAXpL4pqBHjtiLh7z15rfsQY.jpeg', '9843352492', '9843352492', 'roshan.stha5298@gmail.com', 'Married', 'Turing', 'Prasad', 'Soft', '9843352492', '9843352492', 'Nb', 'Susan', 'Laxmi', 'Chikanbanjar', '9843352492', '9843352492', 'Ab', 'A+', NULL, '2019-Mar-07', 'hr2019-6', '2', '4', 'Bachelor\'s', '3', 'Khwopa Engineering College', 'Liwali', 'Past', 'Jagati', '1 year', 'S', 'Laravel Workshop', '6 hours', 'Turing Soft', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-07 04:52:04', '2019-03-18 00:06:34', 1),
(10, 1, 'Susan', NULL, 'Chikanbanjar', '03/08/2019', 'Male', 'Liwali, Near Khwopa Engineering College', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/56Ce0kqR5dtmbKX1ZkRCmeEJi1AA87yozIOS3J71.png', 'public/yJM8M5cHSXUwxGXOLh1dbs7UNEoWdwqApcnnUu7z.jpeg', '9843352492', '9843352492', 'kristsuwal1@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-08', 'hr2019-7', '2', '2', 'Bachelor\'s', '1', 'Susan Chikanbanjar', 'Chyamasingh', 'Susan Chikanbanjar', 'Chyamasingh', '1 Week', '6', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-07 22:57:50', '2019-03-07 22:57:50', 1),
(12, 1, 'Susan', NULL, 'Chikanbanjar', '03/08/2019', 'Male', 'Liwali, Near Khwopa Engineering College', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/uW6zvJP5IlS4oP3kRmjThxk5lCJ3hoNd3QxnWRph.png', 'public/1GdbLGtJGxkGmNTDs3Po8cZiEgnrTCDOpSLGGO6Y.jpeg', '9843352492', '9843352492', 'kristsuwal2@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-08', 'hr2019-7', '2', '2', 'Bachelor\'s', '1', 'Khwopa Engineering College', 'Chyamasingh', 'Susan Chikanbanjar', 'Chyamasingh', '1 Week', 'sdf', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-07 23:41:58', '2019-03-07 23:41:58', 0),
(14, 70, 'Susan', NULL, 'Chikanbanjar', '03/08/2019', 'Male', 'Toronto', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/fR7AydIcKiVg5zsd6e3FCgJLtiiITXRgBSQHUe86.png', 'public/KN4LFAHbWeDSzXlMw7SvideBeYcIYJC6ObVejMkD.jpeg', '9843352492', '9843522492', 'kristsuwal3@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, NULL, NULL, '4', '2', 'Bachelor\'s', '1', 'Khwopa Engineering College', 'Chyamasingh', 'Susan Chikanbanjar', 'Chyamasingh', '1 Week', 'ko', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-08 00:31:38', '2019-03-08 04:45:45', 1),
(15, 71, 'Susan', NULL, 'Chikanbanjar', '03/08/2019', 'Male', 'Chyamasingh', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/4dx6w1cFNEoZIT9RzCkkWznr46EMcHKj9zOqDPGx.png', 'public/KCjofRdwMJTQolVrj0blmwKrMrjB7QPO5YbinfE2.jpeg', '9843352492', '9843352492', 'kristsuwal12@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-08', 'hr2019-9', '3', '1', 'Bachelor\'s', '1', 'Khwopa Engineering College', 'Chyamasingh', 'Susan Chikanbanjar', 'Chyamasingh', '2 weeks', 'kj', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-08 01:22:09', '2019-03-08 01:24:27', 1),
(16, 72, 'Susan', NULL, 'Chikanbanjar', '03/08/2019', 'Male', 'Jagati', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/rPlV9JRYEvzQrbrCs2ihXMLt4KXqYaEi4aABQXIj.png', 'public/c75t8WI57ZGI5Y1BgaeXDEyEoo707gOEJgo8s9JW.jpeg', '9843352492', '9843352492', 'kristsuwal7@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-08', 'hr2019-10', '4', '2', 'Bachelor\'s', '2', 'Khwopa Engineering College', 'Liwali', 'Susan Chikanbanjar', 'Chyamasingh', '1 Week', 'jk', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-08 01:35:48', '2019-03-08 01:35:48', 0),
(18, 75, 'Susan', NULL, 'Chikanbanjar', '03/08/2019', 'Male', 'Chyamasingh', 'Chyamasingh', 'Nepal', '035-3-2-00612-2014', 'public/6krYepTxqicmn1GUKzzy0iK3PLcsDfem7RZ0EhcC.jpeg', 'public/9Fc3jD5lP7W971PJuLU94Zfc40VFyecNfjXwEJzM.jpeg', '9843352492', '9843352492', 'kristsuwal6@gmail.com', 'Single', 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'Susan', NULL, 'Chikanbanjar', '9843352492', '9843352492', NULL, 'A+', NULL, '2019-Mar-08', 'hr2019-11', '4', '2', 'Bachelor\'s', '1', 'Khwopa Engineering College', 'Chyamasingh', 'Susan Chikanbanjar', 'Chyamasingh', '1 Week', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGTVf63Vm3XgOncMVSOy0-jSxdMT8KVJIc8WiWaevuWiPGe0Pm', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-08 01:53:56', '2019-03-08 01:53:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendances`
--
-- Creation: Feb 23, 2019 at 05:41 AM
--

CREATE TABLE `staff_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `staff_attendances`:
--   `post_by`
--       `users` -> `id`
--   `staff_id`
--       `staffs` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Mar 13, 2019 at 08:42 AM
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `height` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_relation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_temporary_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_permanent_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_occupation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_class` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblings` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` tinyint(3) UNSIGNED NOT NULL,
  `classroom_id` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `students`:
--   `classroom_id`
--       `classrooms` -> `id`
--   `post_by`
--       `users` -> `id`
--   `section_id`
--       `sections` -> `id`
--   `user_id`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `temporary_address`, `permanent_address`, `nationality`, `religion`, `personal_photo`, `blood_group`, `comments`, `height`, `weight`, `father_first_name`, `father_middle_name`, `father_last_name`, `father_phone`, `father_mobile`, `father_occupation`, `father_photo`, `mother_first_name`, `mother_middle_name`, `mother_last_name`, `mother_phone`, `mother_mobile`, `mother_occupation`, `mother_photo`, `guardian_first_name`, `guardian_middle_name`, `guardian_last_name`, `guardian_relation`, `guardian_email`, `guardian_phone`, `guardian_mobile`, `guardian_temporary_address`, `guardian_permanent_address`, `guardian_occupation`, `guardian_photo`, `previous_school_name`, `previous_class`, `grade`, `file`, `previous_school_address`, `previous_school_phone`, `previous_school_email`, `route`, `percentage`, `reason`, `siblings`, `admission_id`, `admission_date`, `roll_no`, `house_id`, `section_id`, `classroom_id`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(7, 92, 'Sahas', NULL, 'Dangol', '11/19/1995', 'Male', NULL, 'Lubhoo', 'Nepali', 'Hindu', 'public/h03mpxFLZIT7z0ySlpU8QziOD0ZHGII46q3VIALd.jpeg', 'A+', NULL, '5', '5', 'Santa', 'Ram', 'Dangol', NULL, '9801019392', 'Government officer', NULL, 'Radhika', 'Devi', 'Shrestha', NULL, NULL, 'Housewife', NULL, 'Santa', 'Ram', 'Dangol', 'father', NULL, NULL, '9801019392', NULL, 'Lubhoo', 'Government officer', NULL, 'Shree lubhoo ma. Vi.', '1', '1', NULL, 'Kathmandu', NULL, NULL, 'New Road', NULL, NULL, NULL, NULL, NULL, 'stu2019one1', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:37', '2019-03-18 04:12:26'),
(8, 93, 'rikesh', NULL, 'shrestha', '35022', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'ram', 'bahadur', 'shrestha', NULL, '9898989898', 'teacher', NULL, 'sita', NULL, 'shrestha', NULL, '9898989899', 'housewife', NULL, 'ram', NULL, 'shrestha', 'father', NULL, NULL, '9898989898', NULL, 'ramechap', 'teacher', NULL, NULL, '1', '1', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 'stu2019one2', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(9, 94, 'Aditya ', NULL, 'Tharu', '35023', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Chaduram ', NULL, 'Chaudhary', NULL, '87654', 'teacher', NULL, 'Maya ', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Chaduram ', NULL, 'Chaudhary', 'father', NULL, NULL, '984256789', NULL, 'Lamki Chuha 01 lamki,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '2', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one3', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(10, 95, 'Ahan ', NULL, 'Shahi', '35024', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Nagendra  ', NULL, 'Shahi', NULL, '3456', 'teacher', NULL, 'Puspa Shahi', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Nagendra  ', NULL, 'Shahi', 'father', NULL, NULL, '11673', NULL, 'Lamki Chuha 3,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '2', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one4', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(11, 96, 'Abhiral Bhatta', NULL, 'Shahi', '35025', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Min Raj ', NULL, 'Bhatta', NULL, '7654321', 'teacher', NULL, 'Pushpa Neupane', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Min Raj ', NULL, 'Bhatta', 'father', NULL, NULL, '156782', NULL, 'Janaki 9 Kattase,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '4', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one5', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(12, 97, 'Anwesh Chaudhary', NULL, 'Shahi', '35026', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Tek Bdr. ', NULL, 'Chaudhary', NULL, '9876', 'teacher', NULL, 'Pushpa Neupane', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Tek Bdr. ', NULL, 'Chaudhary', 'father', NULL, NULL, '984156789', NULL, 'Lamki Chuha 01 ,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '3', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one6', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(13, 98, 'Angel Chaudhary', NULL, 'Shahi', '35027', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Abhiral ', NULL, 'Chaudhary', NULL, '3464356', 'teacher', NULL, 'Pushpa Neupane', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Abhiral ', NULL, 'Chaudhary', 'father', NULL, NULL, '985105678', NULL, ' balchur,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '1', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one7', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(14, 99, 'Amik Chaudhary', NULL, 'Shahi', '35028', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Kalu Ram ', NULL, 'Chaudhary', NULL, '452456', 'teacher', NULL, 'Pushpa Neupane', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Kalu Ram ', NULL, 'Chaudhary', 'father', NULL, NULL, '9880567', NULL, 'Lamki Chuha 1 lamki,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '2', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one8', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(15, 100, 'Chet Raj Rimal', NULL, 'Shahi', '35029', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Shiv Raj ', NULL, 'Rimal', NULL, '8776', 'teacher', NULL, 'Durga Rimal', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Shiv Raj ', NULL, 'Rimal', 'father', NULL, NULL, '98411234', NULL, 'Lamki Chuha 05 thapapur,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '4', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one9', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(16, 101, 'Anuja Chaudhary', NULL, 'Shahi', '35030', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Pancha ', NULL, 'Chaudhary', NULL, '987', 'teacher', NULL, 'Tara Devi Chaudhary', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Pancha ', NULL, 'Chaudhary', 'father', NULL, NULL, '9865456', NULL, 'Lamki Chuha 03 balchur,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '3', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one10', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(17, 102, 'D.S. Jung Shahil', NULL, 'Shahi', '03/18/2019', 'Male', NULL, 'Ramechap', 'Nepali', 'Hindu', 'public/M8M9nBcHKQSQY3tIoQnOeOXk8h5l9eybEXO84k2V.jpeg', 'A+', NULL, '5', '5', 'Tark Bdr.', NULL, 'Shahi', NULL, '432897', 'Teacher', NULL, 'Puja Kumari Shahi', NULL, 'Tharu', NULL, NULL, 'Housewife', NULL, 'Tark Bdr.', NULL, 'Shahi', 'father', NULL, NULL, '432897', NULL, 'Mohanyal 09 mitmari chisapani,KAILALI', 'Teacher', NULL, 'Shree lubhoo ma. Vi.', '1', '2', NULL, 'Sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one11', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-18 04:20:34'),
(18, 103, 'Anushka Balami Magar', NULL, 'Shahi', '35032', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Indra ', NULL, 'Balami', NULL, '4536987', 'teacher', NULL, 'Bhumi Balami', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Indra ', NULL, 'Balami', 'father', NULL, NULL, '98989898', NULL, 'Lamki Chuha 3 bebasthitnagar,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '1', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one12', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(19, 104, 'Dibya Shahi', NULL, 'Shahi', '35033', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'Jivan ', NULL, 'Balami', NULL, '76908', 'teacher', NULL, 'Sarmila Shahi', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'Jivan ', NULL, 'Balami', 'father', NULL, NULL, '98414141', NULL, 'Lamki Chuha 03 chisapani,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '4', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one13', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(20, 105, 'Anushka Neupane', NULL, 'Shahi', '35034', 'male', NULL, 'ramechap', 'nepali', 'hindu', NULL, 'A+', NULL, '5', '25', 'LaxmiKant ', NULL, 'Neupane', NULL, '87098', 'teacher', NULL, 'Pushpa Neupane', NULL, 'Tharu', NULL, NULL, 'housewife', NULL, 'LaxmiKant ', NULL, 'Neupane', 'father', NULL, NULL, '985105101', NULL, 'Lamki Chuha 1 rajipur,KAILALI', NULL, NULL, 'shree lubhoo ma. Vi.', '1', '3', NULL, 'sindhupalchowk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stu2019one14', NULL, 1, 1, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--
-- Creation: Feb 23, 2019 at 05:43 AM
--

CREATE TABLE `student_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `classroom_id` tinyint(3) UNSIGNED NOT NULL,
  `section_id` tinyint(3) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `student_attendances`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `student_id`, `classroom_id`, `section_id`, `date`, `attendance`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '03/11/2019', 0, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-11 01:28:50', '2019-03-11 06:10:21'),
(2, 7, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:27', '2019-03-15 01:25:27'),
(3, 8, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:27', '2019-03-15 01:25:27'),
(4, 9, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:27', '2019-03-15 01:25:27'),
(5, 10, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:25:28'),
(6, 11, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:25:28'),
(7, 12, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:41:44'),
(8, 13, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:25:28'),
(9, 14, 1, 1, '03/15/2019', 2, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:45:34'),
(10, 15, 1, 1, '03/15/2019', 2, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:45:52'),
(11, 16, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:25:28'),
(12, 17, 1, 1, '03/15/2019', 0, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:42:23'),
(13, 18, 1, 1, '03/15/2019', 2, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:45:22'),
(14, 19, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:40:50'),
(15, 20, 1, 1, '03/15/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 01:25:28', '2019-03-15 01:25:28'),
(16, 7, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:49', '2019-03-18 00:01:49'),
(17, 8, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:49', '2019-03-18 00:01:49'),
(18, 9, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(19, 10, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(20, 11, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(21, 12, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(22, 13, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(23, 14, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(24, 15, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(25, 16, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(26, 17, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(27, 18, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(28, 19, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(29, 20, 1, 1, '03/18/2019', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 00:01:50', '2019-03-18 00:01:50'),
(30, 7, 1, 1, '2019-03-24', 2, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:34:03'),
(31, 8, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(32, 9, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(33, 10, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(34, 11, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(35, 12, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(36, 13, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(37, 14, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(38, 15, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(39, 16, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(40, 17, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(41, 18, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(42, 19, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(43, 20, 1, 1, '2019-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:32:58', '2019-03-24 05:32:58'),
(44, 7, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(45, 8, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(46, 9, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(47, 10, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(48, 11, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(49, 12, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(50, 13, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(51, 14, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(52, 15, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(53, 16, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(54, 17, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(55, 18, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(56, 19, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(57, 20, 1, 1, '2019-09-20', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:17', '2019-03-24 05:35:17'),
(58, 7, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(59, 8, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(60, 9, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(61, 10, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(62, 11, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(63, 12, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(64, 13, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(65, 14, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(66, 15, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:53', '2019-03-24 05:35:53'),
(67, 16, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:54', '2019-03-24 05:35:54'),
(68, 17, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:54', '2019-03-24 05:35:54'),
(69, 18, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:54', '2019-03-24 05:35:54'),
(70, 19, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:54', '2019-03-24 05:35:54'),
(71, 20, 1, 1, '3036-10-12', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:35:54', '2019-03-24 05:35:54'),
(72, 7, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(73, 8, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(74, 9, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(75, 10, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(76, 11, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(77, 12, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(78, 13, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(79, 14, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:30', '2019-03-24 05:36:30'),
(80, 15, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:31', '2019-03-24 05:36:31'),
(81, 16, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:31', '2019-03-24 05:36:31'),
(82, 17, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:31', '2019-03-24 05:36:31'),
(83, 18, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:31', '2019-03-24 05:36:31'),
(84, 19, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:31', '2019-03-24 05:36:31'),
(85, 20, 1, 1, '2019-03-25', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:36:31', '2019-03-24 05:36:31'),
(86, 7, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:01', '2019-03-24 05:37:01'),
(87, 8, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:01', '2019-03-24 05:37:01'),
(88, 9, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:01', '2019-03-24 05:37:01'),
(89, 10, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:01', '2019-03-24 05:37:01'),
(90, 11, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(91, 12, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(92, 13, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(93, 14, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(94, 15, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(95, 16, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(96, 17, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(97, 18, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(98, 19, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(99, 20, 1, 1, '0000-03-24', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-24 05:37:02', '2019-03-24 05:37:02'),
(100, 7, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(101, 8, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(102, 9, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(103, 10, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(104, 11, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(105, 12, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(106, 13, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:33', '2019-04-05 03:19:33'),
(107, 14, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34'),
(108, 15, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34'),
(109, 16, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34'),
(110, 17, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34'),
(111, 18, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34'),
(112, 19, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34'),
(113, 20, 1, 1, '2019-04-11', 1, NULL, 1, 1, 0, NULL, 1, NULL, '2019-04-05 03:19:34', '2019-04-05 03:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--
-- Creation: Mar 13, 2019 at 08:42 AM
--

CREATE TABLE `student_groups` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `student_groups`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--
-- Creation: Mar 07, 2019 at 04:51 AM
--

CREATE TABLE `student_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `student_payments`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `student_payments`
--

INSERT INTO `student_payments` (`id`, `invoice_id`, `date`, `amount`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 1, '03/12/2019', '1500.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-12 03:54:11', '2019-03-12 03:54:11'),
(2, 5, '03/15/2019', '2700.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 04:22:31', '2019-03-15 04:22:31'),
(3, 4, '03/15/2019', '2000.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-15 04:34:22', '2019-03-15 04:34:22'),
(4, 6, '03/18/2019', '1500.00', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-18 04:03:59', '2019-03-18 04:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_sessions`
--
-- Creation: Mar 13, 2019 at 08:42 AM
--

CREATE TABLE `student_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` tinyint(3) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `classroom_id` tinyint(3) UNSIGNED NOT NULL,
  `section_id` tinyint(3) UNSIGNED NOT NULL,
  `roll` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `student_sessions`:
--   `classroom_id`
--       `classrooms` -> `id`
--   `post_by`
--       `users` -> `id`
--   `section_id`
--       `sections` -> `id`
--   `session_id`
--       `academics_years` -> `id`
--   `student_id`
--       `students` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `student_sessions`
--

INSERT INTO `student_sessions` (`id`, `session_id`, `student_id`, `classroom_id`, `section_id`, `roll`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 'stu2019one3', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:00:18', '2019-03-13 03:00:18'),
(2, 3, 2, 1, 1, 'stu2019one4', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:00:18', '2019-03-13 03:00:18'),
(6, 3, 7, 1, 1, 'stu2019one1', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(7, 3, 8, 1, 1, 'stu2019one2', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(8, 3, 9, 1, 1, 'stu2019one3', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(9, 3, 10, 1, 1, 'stu2019one4', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(10, 3, 11, 1, 1, 'stu2019one5', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(11, 3, 12, 1, 1, 'stu2019one6', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(12, 3, 13, 1, 1, 'stu2019one7', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(13, 3, 14, 1, 1, 'stu2019one8', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(14, 3, 15, 1, 1, 'stu2019one9', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(15, 3, 16, 1, 1, 'stu2019one10', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(16, 3, 17, 1, 1, 'stu2019one11', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(17, 3, 18, 1, 1, 'stu2019one12', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(18, 3, 19, 1, 1, 'stu2019one13', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(19, 3, 20, 1, 1, 'stu2019one14', NULL, 1, 0, NULL, 1, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--
-- Creation: Mar 25, 2019 at 07:24 AM
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` tinyint(3) UNSIGNED NOT NULL,
  `full_mark` tinyint(4) NOT NULL,
  `pass_mark` tinyint(4) NOT NULL,
  `optional` tinyint(1) NOT NULL DEFAULT '0',
  `additional` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `subjects`:
--   `classroom_id`
--       `classrooms` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_code`, `subject_type`, `classroom_id`, `full_mark`, `pass_mark`, `optional`, `additional`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Science', 'BEG144', 'practical', 1, 100, 40, 0, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-02-23 03:47:03', '2019-02-27 00:28:47'),
(2, 'Optional Mathematics', '144H', 'additional', 1, 100, 32, 0, 0, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-11 04:13:50', '2019-03-11 04:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--
-- Creation: Feb 27, 2019 at 09:20 AM
--

CREATE TABLE `syllabus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `classroom_id` tinyint(3) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `syllabus`:
--   `classroom_id`
--       `classrooms` -> `id`
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `title`, `description`, `classroom_id`, `file`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`, `status`) VALUES
(1, 'January Update', NULL, 1, 'public/TexKdKa3FZXP6oWY7uqqpQ7XCX1ExcSjvkpWclii.jpeg', NULL, 1, 0, NULL, 1, NULL, '2019-02-27 03:21:02', '2019-02-27 03:21:02', 1),
(2, 'February Update', NULL, 1, 'public/cwC2Wn43UI42PdPP1uDJkT0ID0p238jyBzwo522W.jpeg', NULL, 1, 0, NULL, 1, NULL, '2019-02-27 03:27:48', '2019-02-27 03:27:48', 1),
(3, 'February Update', NULL, 8, 'public/3UJFJKEXe2POT7s1PfzE4aOE1ry4RTonDcRJo94L.jpeg', NULL, 1, 0, NULL, 1, NULL, '2019-02-27 03:45:48', '2019-02-27 03:49:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--
-- Creation: Mar 15, 2019 at 07:45 AM
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `trans_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `dr_cr` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chart_id` int(11) NOT NULL,
  `payee_payer_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `transactions`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `account_id`, `trans_type`, `amount`, `dr_cr`, `chart_id`, `payee_payer_id`, `payment_method_id`, `create_user_id`, `update_user_id`, `attachment`, `status`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, '2019-03-15', 1, 'income', '2000.00', 'cr', 1, 1, 1, 1, 1, 'public/8YMkpMvKUmmdsMKRslZkZ1jrOz4NKPxgAaoapKTs.jpeg', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 02:06:52', '2019-03-15 04:03:21'),
(2, '2019-03-15', 1, 'income', '565656.00', 'cr', 1, 1, 1, 1, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 03:13:03', '2019-03-15 03:13:03'),
(3, '2019-03-15', 1, 'income', '565656.00', 'cr', 1, 1, 1, 1, NULL, 'public/a76g8uyixzZanCYeNRtjD4APp85Xxo42JyEx2YSJ.pdf', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 03:13:45', '2019-03-15 03:13:45'),
(4, '2019-03-15', 1, 'income', '565656.00', 'cr', 1, 1, 1, 1, NULL, 'public/YLL9KlNp76ugkvvGQYjeal3fb9d9lnsWfYORmFzx.jpeg', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 03:14:36', '2019-03-15 03:14:36'),
(5, '2019-03-15', 1, 'income', '5656.00', 'cr', 1, 1, 1, 1, NULL, 'public/ECtSlfxgomx3Vj2sqdlAALGePanZQmg1YruY904u.jpeg', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 03:15:00', '2019-03-15 03:15:00'),
(6, '2019-03-15', 1, 'expense', '1500.00', 'cr', 2, 2, 1, 1, 1, 'public/kzBEm9afS0i0sQ63VsBPssYq4QrSlKBS6rQo5aTM.jpeg', 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 03:31:58', '2019-03-15 03:58:31'),
(7, '2019-03-15', 1, 'expense', '10000.00', 'dr', 2, 2, 1, 1, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-15 04:05:42', '2019-03-15 04:05:42'),
(8, '2019-03-27', 2, 'income', '565656.00', 'cr', 1, 1, 1, 1, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-26 23:08:34', '2019-03-26 23:08:34'),
(9, '2019-03-27', 2, 'income', '5656.00', 'cr', 1, 1, 1, 1, NULL, NULL, 1, NULL, 1, 0, NULL, 1, NULL, '2019-03-26 23:10:18', '2019-03-26 23:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `transport_assigns`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `transport_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `transport_assigns`:
--

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `transport_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `route_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_fare` decimal(8,2) NOT NULL,
  `vehicle_id` int(3) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `transport_routes`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `transport_routes`
--

INSERT INTO `transport_routes` (`id`, `route_name`, `route_fare`, `vehicle_id`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Old Route', '1005.00', 1, 'Kamalvinayak', 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:55:24', '2019-03-24 05:16:33'),
(3, 'New Route', '1500.00', 3, 'Bhaktapur Ring Road', 1, 1, 0, NULL, 1, NULL, '2019-03-26 02:04:20', '2019-03-26 02:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicles`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `transport_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `transport_vehicles`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `transport_vehicles`
--

INSERT INTO `transport_vehicles` (`id`, `vehicle_name`, `serial_number`, `driver_id`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'A', '10-10', 'hr2019-5', NULL, 1, 1, 0, NULL, 1, NULL, '2019-02-23 00:53:57', '2019-02-23 00:53:57'),
(3, 'Kalanki Express', '20-34', 'hr2019-5', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-26 02:03:07', '2019-03-26 02:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Feb 23, 2019 at 05:30 AM
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `facebook` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(11) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `user_type`, `status`, `facebook`, `twitter`, `linkedin`, `google_plus`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', 'admin@turingsoft.com', '$2y$10$lAPUziok3dZjvNywid9RSurYPKAugOxeF/B.rZ2y36.k.EvMSc6FC', 'Admin', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'D5J8fagAnqtDZTiqeCDhTbInPuL9Vuvhql9IBpQwygdjnnnvf23JlHSSdbCh', NULL, NULL),
(2, 0, 'Principal', 'principal@turingsoft.com', '$2y$10$xx5vTl4jJKNCsYqjZrz7G.Z8T33K4O1RTayv0sxKzjejRWjKWu0tO', 'Principal', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'vDf9yL2SMwwu40ZoRw46MOODUdRSTtMdAtBSk3HhJ0Luk1LvNthCmo7dd1Rn', NULL, NULL),
(3, 0, 'Account', 'account@turingsoft.com', '$2y$10$5b6emCzxtzdOd/Q.sJXZ.O183j/tIB5I7TrrrK8zpWHyXwR.84hVm', 'Account', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'VCxJFvkMoXz5xNAJKxJZy4auId1dET3PrW5yFeXZiqioF9J1IrTWZCOfyG23', NULL, NULL),
(4, 0, 'Receptionist', 'receptionist@turingsoft.com', '$2y$10$hbbKUIoBnjJDp4oD43Q7r.Xgpv1a9uhulX7PxgLg0QZHRk.pLzgSS', 'Receptionist', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'evf8lIeZ73cWrvF5ndnBMhYb2jFt4m0pK0j8riZPJokgZM6FeX0VLweGmQN7', NULL, NULL),
(5, 0, 'TeacherDD', 'teacher@turingsoft.com', '$2y$10$TQlmWSyxsGSCJClmzH.uhO18XhJQQNyuAaXnxv4niYc/rzEyhdCMy', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '30gjGtEbr0y652xoUtdS1zeE3CrEUErJSI1DON5fK17fvQZnThroAmzGBQmr', NULL, '2019-03-24 05:22:47'),
(6, 0, 'Student', 'student@turingsoft.com', '$2y$10$zrugUxxRP9susW7v9gwtOOisP2XNA4FN8HxCB8I44Yliu7hqAecq2', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'J52DBRiI9jdnPnrlLFAqyD828zpUd2y6nNyaRCLMdO9O6RxzWjgpXFkbHnJr', NULL, NULL),
(8, 0, 'sahas  dangol', 'msrsn123@gmail.com', '$2y$10$3xDiZ94V3XpYPQehd660GuALNQ.XxGroP5BkHIMldPqnS0jlC/5Ca', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-05 23:59:05', '2019-03-05 23:59:05'),
(9, 0, 'Regan  Joshi', 'regan@gmail.com', '$2y$10$mOI6vW7jeZ16JyWpVeJtOuZxwRwsqmVI70adSZ3DuASMx8mi5WxUW', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-05 23:59:05', '2019-03-05 23:59:05'),
(53, 0, 'Susan  Chikanbanjar', 'kristsuwal1@gmail.com', '$2y$10$avieTOSlPi8RrVVqYmFKNOVgg9/XECRRM7BRUF1m0ByQQRQjqllTi', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-07 22:57:42', '2019-03-07 22:57:42'),
(68, 0, 'Susan  Chikanbanjar', 'kristsuwal2@gmail.com', '$2y$10$06R4QPE71hdRWnflYd7zNeac2n3/LlBG7X/31XgFRwdh293PPfyiG', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-07 23:41:54', '2019-03-07 23:41:54'),
(70, 0, 'Susan  Chikanbanjar', 'kristsuwal3@gmail.com', '$2y$10$YjZihpwqQ.WmAFhXUDRjS..B5FFM2M/B1TckgsMvJdtk5TbKpBm9K', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-08 00:31:33', '2019-03-08 00:31:33'),
(71, 0, 'Susan  Chikanbanjar', 'kristsuwal12@gmail.com', '$2y$10$8sMAh1RYTLNnGdygeemHB.Eiseth0umZs05aBZbelBCjbd1Xoa/IW', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-08 01:22:04', '2019-03-08 01:22:04'),
(72, 0, 'Susan  Chikanbanjar', 'kristsuwal7@gmail.com', '$2y$10$YVFj3NDx.8wVwkb338WInusZuW6uj1E91PF/ev6z.rraHH3oYIVcq', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-08 01:35:43', '2019-03-08 01:35:43'),
(75, 0, 'Susan  Chikanbanjar', 'kristsuwal6@gmail.com', '$2y$10$DqUTP3p/UPU9IKx0LpJ0.OXpmyqTmnxldOU56b2OQ/n1pEQzg9uOq', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-08 01:53:51', '2019-03-08 01:53:51'),
(82, 0, 'Susan  Chikanbanjar', '9843352492', '$2y$10$rL16uNSnhbPvCIsGN747MuoAxOsWIp8DLL2A6VspvmfNxkvZVsJx.', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-11 21:31:40', '2019-03-11 21:31:40'),
(84, 0, 'Susan  Chikanbanjar', '878787878', '$2y$10$lIcwFMpzNGPq7gOnCYiK0uHgmfAAf4N3comiQOGA9vN/BnCBi5jMC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:00:18', '2019-03-13 03:00:18'),
(85, 0, 'rikesh  shrestha', '78787878', '$2y$10$kKl7kHVmTq5FMj.n/kO.KOOObbAt1fPEzgBXu2dG8CAV5oSjQakcu', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:00:18', '2019-03-13 03:00:18'),
(92, 0, 'sahas  dangol', '9801019392', '$2y$10$wctASVlmC8iCM/TiNhb9fehuq2m54zhadWH8Il7htFWgCSEPwu2y.', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:37', '2019-03-13 03:28:37'),
(93, 0, 'rikesh  shrestha', '9898989898', '$2y$10$uiX9BlpfIzypR1odtaPCO.rms0lytWwGvwUYXU2qLCfplRcBRCh1e', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(94, 0, 'Aditya   Tharu', '984256789', '$2y$10$yHFypbpNcBbyfLuLIjGAI.yWrvUvetKt4kM0ATNSEr5zrYfsTufMO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(95, 0, 'Ahan   Shahi', '11673', '$2y$10$vXpDqHfnWWAo5G62VazHoe3eJe/Bbsxa29PNoV75TZdpWIHzU1iLC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(96, 0, 'Abhiral Bhatta  Shahi', '156782', '$2y$10$55OmSF1HDpr5iNY1LVTO9uT4dnRB.XpqHdPeB6Ye4MFmFQF3cn6Hu', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(97, 0, 'Anwesh Chaudhary  Shahi', '984156789', '$2y$10$yNLTrmVvkLkbhfUMEdErnOy9T8PpwQl2QqJGgpzoC/GpbpSnCTf06', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(98, 0, 'Angel Chaudhary  Shahi', '985105678', '$2y$10$z3.mKsqPmbYM4m9cVZ7CgecwBoHdgDu0Pu3oN..usCwwtrxwnx4cO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:38', '2019-03-13 03:28:38'),
(99, 0, 'Amik Chaudhary  Shahi', '9880567', '$2y$10$m3LGflEBqFrjCq003vFVBOcQp7xi/MexhHqzRq7Yp0kXnsE63F/0K', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(100, 0, 'Chet Raj Rimal  Shahi', '98411234', '$2y$10$lemcy4soPY33ntYwOQ7J1.xJFltcZR5qa1z1ndEelkFm8k467StuC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(101, 0, 'Anuja Chaudhary  Shahi', '9865456', '$2y$10$ymRzKSk2Lhp2vjVkbMU/hOfyMi7hdnvVUsvp03LTFC6IrcuWk82pi', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(102, 0, 'D.S. Jung Shahil  Shahi', '98713456', '$2y$10$TXQjf/Qo5XwYhyr4XRontOA4EIEJotg3pFP/pZOMWlfnLWdhg38aS', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(103, 0, 'Anushka Balami Magar  Shahi', '98989898', '$2y$10$2zv7qNgUWB.7XcSRvaWaBuWCLE.QFvwhMFF9A1fCkTzY8Ulj6jdI6', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(104, 0, 'Dibya Shahi  Shahi', '98414141', '$2y$10$uSyc/uNldLB8n/scWcjRsuUzxIRzIORIBIvgpxM5qJ1YWgHmG9bPa', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(105, 0, 'Anushka Neupane  Shahi', '985105101', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '2019-03-13 03:28:39', '2019-03-13 03:28:39'),
(106, 0, 'name', 'email', 'password', 'user_type', 0, 'facebook', 'twitter', 'linkedin', 'google_plus', 'remarks', 0, 0, '0000-00-00 00:00:00', 0, 0, 'remember_token', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 0, 'Regan  Joshi', 'admin@turingsoft.com8', '$2y$10$mOI6vW7jeZ16JyWpVeJtOuZxwRwsqmVI70adSZ3DuASMx8mi5WxUW', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com9', '$2y$10$avieTOSlPi8RrVVqYmFKNOVgg9/XECRRM7BRUF1m0ByQQRQjqllTi', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10', '$2y$10$06R4QPE71hdRWnflYd7zNeac2n3/LlBG7X/31XgFRwdh293PPfyiG', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com11', '$2y$10$YjZihpwqQ.WmAFhXUDRjS..B5FFM2M/B1TckgsMvJdtk5TbKpBm9K', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com12', '$2y$10$8sMAh1RYTLNnGdygeemHB.Eiseth0umZs05aBZbelBCjbd1Xoa/IW', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com13', '$2y$10$YVFj3NDx.8wVwkb338WInusZuW6uj1E91PF/ev6z.rraHH3oYIVcq', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com14', '$2y$10$DqUTP3p/UPU9IKx0LpJ0.OXpmyqTmnxldOU56b2OQ/n1pEQzg9uOq', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com15', '$2y$10$rL16uNSnhbPvCIsGN747MuoAxOsWIp8DLL2A6VspvmfNxkvZVsJx.', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com16', '$2y$10$lIcwFMpzNGPq7gOnCYiK0uHgmfAAf4N3comiQOGA9vN/BnCBi5jMC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 0, 'rikesh  shrestha', 'admin@turingsoft.com17', '$2y$10$kKl7kHVmTq5FMj.n/kO.KOOObbAt1fPEzgBXu2dG8CAV5oSjQakcu', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 0, 'sahas  dangol', 'admin@turingsoft.com18', '$2y$10$wctASVlmC8iCM/TiNhb9fehuq2m54zhadWH8Il7htFWgCSEPwu2y.', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 0, 'rikesh  shrestha', 'admin@turingsoft.com19', '$2y$10$uiX9BlpfIzypR1odtaPCO.rms0lytWwGvwUYXU2qLCfplRcBRCh1e', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 0, 'Aditya   Tharu', 'admin@turingsoft.com20', '$2y$10$yHFypbpNcBbyfLuLIjGAI.yWrvUvetKt4kM0ATNSEr5zrYfsTufMO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 0, 'Ahan   Shahi', 'admin@turingsoft.com21', '$2y$10$vXpDqHfnWWAo5G62VazHoe3eJe/Bbsxa29PNoV75TZdpWIHzU1iLC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 0, 'Abhiral Bhatta  Shahi', 'admin@turingsoft.com22', '$2y$10$55OmSF1HDpr5iNY1LVTO9uT4dnRB.XpqHdPeB6Ye4MFmFQF3cn6Hu', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 0, 'Anwesh Chaudhary  Shahi', 'admin@turingsoft.com23', '$2y$10$yNLTrmVvkLkbhfUMEdErnOy9T8PpwQl2QqJGgpzoC/GpbpSnCTf06', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 0, 'Angel Chaudhary  Shahi', 'admin@turingsoft.com24', '$2y$10$z3.mKsqPmbYM4m9cVZ7CgecwBoHdgDu0Pu3oN..usCwwtrxwnx4cO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 0, 'Amik Chaudhary  Shahi', 'admin@turingsoft.com25', '$2y$10$m3LGflEBqFrjCq003vFVBOcQp7xi/MexhHqzRq7Yp0kXnsE63F/0K', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 0, 'Chet Raj Rimal  Shahi', 'admin@turingsoft.com26', '$2y$10$lemcy4soPY33ntYwOQ7J1.xJFltcZR5qa1z1ndEelkFm8k467StuC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 0, 'Anuja Chaudhary  Shahi', 'admin@turingsoft.com27', '$2y$10$ymRzKSk2Lhp2vjVkbMU/hOfyMi7hdnvVUsvp03LTFC6IrcuWk82pi', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 0, 'D.S. Jung Shahil  Shahi', 'admin@turingsoft.com28', '$2y$10$TXQjf/Qo5XwYhyr4XRontOA4EIEJotg3pFP/pZOMWlfnLWdhg38aS', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 0, 'Anushka Balami Magar  Shahi', 'admin@turingsoft.com29', '$2y$10$2zv7qNgUWB.7XcSRvaWaBuWCLE.QFvwhMFF9A1fCkTzY8Ulj6jdI6', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 0, 'Dibya Shahi  Shahi', 'admin@turingsoft.com30', '$2y$10$uSyc/uNldLB8n/scWcjRsuUzxIRzIORIBIvgpxM5qJ1YWgHmG9bPa', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com31', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com32', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com33', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 3, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com34', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 4, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com35', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 5, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com36', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 6, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com37', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 7, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com38', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 8, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com39', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 9, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com40', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 10, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com41', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 11, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com42', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 12, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com43', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 13, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com44', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 14, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com45', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 15, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com46', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 16, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com47', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 17, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com48', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 18, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com49', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 19, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com50', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 20, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com51', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 21, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com52', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 22, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com53', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 23, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com54', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 24, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com55', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 25, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com56', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 26, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com57', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 27, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com58', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 28, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com59', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 29, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com60', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 30, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com61', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 31, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com62', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 32, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com63', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 33, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com64', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 34, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com65', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 35, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com66', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 36, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com67', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 37, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com68', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 38, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com69', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 39, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com70', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 40, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com71', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 41, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com72', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 42, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com73', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 43, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com74', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 44, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com75', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 45, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com76', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 46, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com77', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 47, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com78', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 48, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com79', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 49, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com80', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 50, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com81', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 51, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com82', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 52, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com83', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 53, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com84', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 54, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com85', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 55, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com86', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 56, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com87', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 57, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com88', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 58, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com89', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 59, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com90', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 60, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com91', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 61, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com92', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 62, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com93', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 63, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com94', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 64, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com95', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 65, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com96', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 66, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com97', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 67, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com98', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 68, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com99', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 69, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com100', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 70, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com101', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 71, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com102', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 72, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com103', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 73, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com104', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 74, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com105', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 75, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com106', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 76, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com107', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 77, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com108', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 78, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com109', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 79, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com110', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 80, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com111', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 81, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com112', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 82, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com113', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 83, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com114', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 84, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com115', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 85, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com116', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 86, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com117', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 87, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com118', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 88, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com119', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 89, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com120', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 90, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com121', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 91, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com122', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 92, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com123', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 93, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com124', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 94, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com125', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 95, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com126', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 96, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com127', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 97, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com128', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 98, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com129', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 99, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com130', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 100, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com131', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 101, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com132', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 102, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com133', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 103, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com134', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 104, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com135', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 105, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com136', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 106, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com137', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 107, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com138', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 108, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com139', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 109, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com140', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 110, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com141', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 111, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com142', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 112, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com143', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 113, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com144', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 114, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com145', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 115, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com146', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 116, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com147', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 117, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com148', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 118, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com149', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 119, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com150', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 120, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com151', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 121, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com152', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 122, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com153', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 123, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com154', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 124, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com155', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 125, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com156', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 126, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com157', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 127, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com158', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 127, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com159', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 127, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1001, 0, 'Admin', 'admin@turingsoft.com1', '$2y$10$lAPUziok3dZjvNywid9RSurYPKAugOxeF/B.rZ2y36.k.EvMSc6FC', 'Admin', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'kmATdbExxE4CImb83S7Dq5hMKegNdUGti048UsOYc8N8Ou5ytqdhYDac30Ca', NULL, NULL),
(1002, 0, 'Principal', 'admin@turingsoft.com2', '$2y$10$xx5vTl4jJKNCsYqjZrz7G.Z8T33K4O1RTayv0sxKzjejRWjKWu0tO', 'Principal', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'vDf9yL2SMwwu40ZoRw46MOODUdRSTtMdAtBSk3HhJ0Luk1LvNthCmo7dd1Rn', NULL, NULL),
(1003, 0, 'Account', 'admin@turingsoft.com3', '$2y$10$5b6emCzxtzdOd/Q.sJXZ.O183j/tIB5I7TrrrK8zpWHyXwR.84hVm', 'Account', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'VCxJFvkMoXz5xNAJKxJZy4auId1dET3PrW5yFeXZiqioF9J1IrTWZCOfyG23', NULL, NULL),
(1004, 0, 'Receptionist', 'admin@turingsoft.com4', '$2y$10$hbbKUIoBnjJDp4oD43Q7r.Xgpv1a9uhulX7PxgLg0QZHRk.pLzgSS', 'Receptionist', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'evf8lIeZ73cWrvF5ndnBMhYb2jFt4m0pK0j8riZPJokgZM6FeX0VLweGmQN7', NULL, NULL),
(1005, 0, 'TeacherDD', 'admin@turingsoft.com5', '$2y$10$TQlmWSyxsGSCJClmzH.uhO18XhJQQNyuAaXnxv4niYc/rzEyhdCMy', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '30gjGtEbr0y652xoUtdS1zeE3CrEUErJSI1DON5fK17fvQZnThroAmzGBQmr', NULL, '0000-00-00 00:00:00'),
(1006, 0, 'Student', 'admin@turingsoft.com6', '$2y$10$zrugUxxRP9susW7v9gwtOOisP2XNA4FN8HxCB8I44Yliu7hqAecq2', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'J52DBRiI9jdnPnrlLFAqyD828zpUd2y6nNyaRCLMdO9O6RxzWjgpXFkbHnJr', NULL, NULL),
(1007, 0, 'sahas  dangol', 'admin@turingsoft.com7', '$2y$10$3xDiZ94V3XpYPQehd660GuALNQ.XxGroP5BkHIMldPqnS0jlC/5Ca', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1008, 0, 'Regan  Joshi', 'admin@turingsoft.com10008', '$2y$10$mOI6vW7jeZ16JyWpVeJtOuZxwRwsqmVI70adSZ3DuASMx8mi5WxUW', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1009, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10009', '$2y$10$avieTOSlPi8RrVVqYmFKNOVgg9/XECRRM7BRUF1m0ByQQRQjqllTi', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1010, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10010', '$2y$10$06R4QPE71hdRWnflYd7zNeac2n3/LlBG7X/31XgFRwdh293PPfyiG', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1011, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10011', '$2y$10$YjZihpwqQ.WmAFhXUDRjS..B5FFM2M/B1TckgsMvJdtk5TbKpBm9K', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1012, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10012', '$2y$10$8sMAh1RYTLNnGdygeemHB.Eiseth0umZs05aBZbelBCjbd1Xoa/IW', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1013, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10013', '$2y$10$YVFj3NDx.8wVwkb338WInusZuW6uj1E91PF/ev6z.rraHH3oYIVcq', 'user', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1014, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10014', '$2y$10$DqUTP3p/UPU9IKx0LpJ0.OXpmyqTmnxldOU56b2OQ/n1pEQzg9uOq', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1015, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10015', '$2y$10$rL16uNSnhbPvCIsGN747MuoAxOsWIp8DLL2A6VspvmfNxkvZVsJx.', 'Teacher', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1016, 0, 'Susan  Chikanbanjar', 'admin@turingsoft.com10016', '$2y$10$lIcwFMpzNGPq7gOnCYiK0uHgmfAAf4N3comiQOGA9vN/BnCBi5jMC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1017, 0, 'rikesh  shrestha', 'admin@turingsoft.com10017', '$2y$10$kKl7kHVmTq5FMj.n/kO.KOOObbAt1fPEzgBXu2dG8CAV5oSjQakcu', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1018, 0, 'sahas  dangol', 'admin@turingsoft.com10018', '$2y$10$wctASVlmC8iCM/TiNhb9fehuq2m54zhadWH8Il7htFWgCSEPwu2y.', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1019, 0, 'rikesh  shrestha', 'admin@turingsoft.com10019', '$2y$10$uiX9BlpfIzypR1odtaPCO.rms0lytWwGvwUYXU2qLCfplRcBRCh1e', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1020, 0, 'Aditya   Tharu', 'admin@turingsoft.com10020', '$2y$10$yHFypbpNcBbyfLuLIjGAI.yWrvUvetKt4kM0ATNSEr5zrYfsTufMO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `user_type`, `status`, `facebook`, `twitter`, `linkedin`, `google_plus`, `remarks`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `remember_token`, `created_at`, `updated_at`) VALUES
(1021, 0, 'Ahan   Shahi', 'admin@turingsoft.com10021', '$2y$10$vXpDqHfnWWAo5G62VazHoe3eJe/Bbsxa29PNoV75TZdpWIHzU1iLC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1022, 0, 'Abhiral Bhatta  Shahi', 'admin@turingsoft.com10022', '$2y$10$55OmSF1HDpr5iNY1LVTO9uT4dnRB.XpqHdPeB6Ye4MFmFQF3cn6Hu', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1023, 0, 'Anwesh Chaudhary  Shahi', 'admin@turingsoft.com10023', '$2y$10$yNLTrmVvkLkbhfUMEdErnOy9T8PpwQl2QqJGgpzoC/GpbpSnCTf06', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1024, 0, 'Angel Chaudhary  Shahi', 'admin@turingsoft.com10024', '$2y$10$z3.mKsqPmbYM4m9cVZ7CgecwBoHdgDu0Pu3oN..usCwwtrxwnx4cO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1025, 0, 'Amik Chaudhary  Shahi', 'admin@turingsoft.com10025', '$2y$10$m3LGflEBqFrjCq003vFVBOcQp7xi/MexhHqzRq7Yp0kXnsE63F/0K', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1026, 0, 'Chet Raj Rimal  Shahi', 'admin@turingsoft.com10026', '$2y$10$lemcy4soPY33ntYwOQ7J1.xJFltcZR5qa1z1ndEelkFm8k467StuC', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1027, 0, 'Anuja Chaudhary  Shahi', 'admin@turingsoft.com10027', '$2y$10$ymRzKSk2Lhp2vjVkbMU/hOfyMi7hdnvVUsvp03LTFC6IrcuWk82pi', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1028, 0, 'D.S. Jung Shahil  Shahi', 'admin@turingsoft.com10028', '$2y$10$TXQjf/Qo5XwYhyr4XRontOA4EIEJotg3pFP/pZOMWlfnLWdhg38aS', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1029, 0, 'Anushka Balami Magar  Shahi', 'admin@turingsoft.com10029', '$2y$10$2zv7qNgUWB.7XcSRvaWaBuWCLE.QFvwhMFF9A1fCkTzY8Ulj6jdI6', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1030, 0, 'Dibya Shahi  Shahi', 'admin@turingsoft.com10030', '$2y$10$uSyc/uNldLB8n/scWcjRsuUzxIRzIORIBIvgpxM5qJ1YWgHmG9bPa', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1031, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10031', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1032, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10032', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1033, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10033', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 3, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1034, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10034', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 4, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1035, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10035', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 5, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1036, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10036', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 6, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1037, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10037', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 7, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1038, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10038', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 8, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1039, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10039', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 9, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1040, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10040', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 10, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1041, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10041', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 11, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1042, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10042', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 12, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1043, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10043', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 13, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1044, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10044', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 14, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1045, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10045', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 15, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1046, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10046', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 16, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1047, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10047', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 17, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1048, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10048', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 18, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1049, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10049', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 19, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1050, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10050', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 20, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1051, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10051', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 21, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1052, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10052', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 22, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1053, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10053', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 23, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1054, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10054', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 24, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1055, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10055', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 25, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1056, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10056', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 26, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1057, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10057', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 27, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1058, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10058', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 28, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1059, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10059', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 29, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1060, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10060', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 30, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1061, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10061', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 31, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1062, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10062', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 32, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1063, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10063', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 33, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1064, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10064', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 34, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1065, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10065', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 35, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1066, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10066', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 36, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1067, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10067', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 37, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1068, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10068', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 38, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1069, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10069', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 39, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1070, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10070', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 40, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1071, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10071', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 41, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1072, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10072', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 42, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1073, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10073', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 43, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1074, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10074', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 44, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1075, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10075', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 45, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1076, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10076', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 46, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1077, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10077', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 47, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1078, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10078', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 48, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1079, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10079', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 49, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1080, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10080', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 50, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1081, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10081', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 51, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1082, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10082', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 52, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1083, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10083', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 53, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1084, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10084', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 54, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1085, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10085', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 55, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1086, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10086', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 56, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1087, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10087', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 57, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1088, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10088', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 58, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1089, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10089', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 59, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1090, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10090', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 60, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1091, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10091', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 61, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1092, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10092', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 62, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1093, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10093', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 63, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1094, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10094', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 64, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1095, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10095', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 65, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1096, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10096', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 66, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1097, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10097', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 67, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1098, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10098', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 68, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1099, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10099', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 69, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1100, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10100', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 70, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1101, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10101', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 71, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1102, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10102', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 72, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1103, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10103', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 73, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1104, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10104', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 74, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1105, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10105', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 75, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1106, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10106', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 76, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1107, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10107', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 77, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1108, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10108', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 78, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1109, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10109', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 79, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1110, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10110', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 80, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1111, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10111', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 81, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1112, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10112', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 82, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1113, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10113', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 83, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1114, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10114', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 84, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1115, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10115', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 85, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1116, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10116', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 86, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1117, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10117', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 87, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1118, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10118', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 88, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1119, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10119', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 89, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1120, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10120', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 90, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1121, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10121', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 91, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1122, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10122', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 92, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1123, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10123', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 93, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1124, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10124', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 94, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1125, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10125', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 95, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1126, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10126', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 96, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1127, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10127', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 97, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1128, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10128', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 98, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1129, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10129', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 99, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1130, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10130', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 100, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1131, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10131', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 101, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1132, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10132', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 102, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1133, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10133', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 103, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1134, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10134', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 104, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1135, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10135', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 105, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1136, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10136', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 106, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1137, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10137', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 107, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1138, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10138', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 108, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1139, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10139', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 109, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1140, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10140', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 110, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1141, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10141', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 111, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1142, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10142', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 112, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1143, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10143', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 113, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1144, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10144', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 114, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1145, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10145', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 115, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1146, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10146', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 116, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1147, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10147', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 117, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1148, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10148', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 118, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1149, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10149', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 119, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1150, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10150', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 120, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1151, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10151', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 121, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1152, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10152', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 122, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1153, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10153', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 123, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1154, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10154', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 124, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1155, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10155', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 125, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1156, 0, 'Anushka Neupane  Shahi', 'admin@turingsoft.com10156', '$2y$10$j4RZKG8OX1s5cKt4rLPK3O8TcMrNqsfeo3d4xny3XD3u.4D9hvuiO', 'Student', 126, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_activations`
--
-- Creation: Mar 07, 2019 at 08:50 AM
--

CREATE TABLE `users_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users_activations`:
--   `id_staff`
--       `users` -> `id`
--

--
-- Dumping data for table `users_activations`
--

INSERT INTO `users_activations` (`id`, `id_staff`, `token`, `create_at`) VALUES
(24, 53, 'RjqSM7c9WGEVTIUqydQftCkcfWF3XU', '2019-03-08 04:42:42'),
(36, 68, 'HdWVt6ztzpNUaImZGFqeCzIU8kTvWM', '2019-03-08 05:26:54'),
(40, 72, 'boj0tyZSWnlY7xyBHg4LleS4kbZAmv', '2019-03-08 07:20:43'),
(42, 75, 'yCXBwQOV4b6d8XHfBEtOxEGkKqrQbG', '2019-03-08 07:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--
-- Creation: Feb 23, 2019 at 05:42 AM
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_time` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_card_no` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `visitors`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `purpose`, `entry_time`, `leave_time`, `visitor_card_no`, `remarks`, `status`, `post_by`, `is_verified`, `verified_at`, `verified_by`, `hits`, `created_at`, `updated_at`) VALUES
(1, 'Susan Chikanbanjar', 'Student Admission', '1:30 PM', '01:30 PM', '01', NULL, 1, 1, 0, NULL, 1, NULL, '2019-03-11 02:00:42', '2019-03-11 07:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `website_languages`
--
-- Creation: Feb 23, 2019 at 05:44 AM
--

CREATE TABLE `website_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `post_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `website_languages`:
--   `post_by`
--       `users` -> `id`
--   `verified_by`
--       `users` -> `id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics_years`
--
ALTER TABLE `academics_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academics_years_post_by_foreign` (`post_by`),
  ADD KEY `academics_years_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_post_by_foreign` (`post_by`),
  ADD KEY `bank_accounts_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chart_of_accounts_post_by_foreign` (`post_by`),
  ADD KEY `chart_of_accounts_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_post_by_foreign` (`post_by`),
  ADD KEY `classrooms_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `class_days`
--
ALTER TABLE `class_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_days_post_by_foreign` (`post_by`),
  ADD KEY `class_days_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_post_by_foreign` (`post_by`),
  ADD KEY `complains_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`),
  ADD KEY `departments_post_by_foreign` (`post_by`),
  ADD KEY `departments_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`),
  ADD KEY `designations_post_by_foreign` (`post_by`),
  ADD KEY `designations_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_post_by_foreign` (`post_by`),
  ADD KEY `enquiries_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `exam_lists`
--
ALTER TABLE `exam_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_lists_post_by_foreign` (`post_by`),
  ADD KEY `exam_lists_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `exam_routines`
--
ALTER TABLE `exam_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_routines_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_routines_post_by_foreign` (`post_by`),
  ADD KEY `exam_routines_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `fee_collects`
--
ALTER TABLE `fee_collects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_discounts`
--
ALTER TABLE `fee_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_discounts_post_by_foreign` (`post_by`),
  ADD KEY `fee_discounts_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_types_post_by_foreign` (`post_by`),
  ADD KEY `fee_types_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiscal_years_post_by_foreign` (`post_by`),
  ADD KEY `fiscal_years_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_post_by_foreign` (`post_by`),
  ADD KEY `galleries_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_post_by_foreign` (`post_by`),
  ADD KEY `grades_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_post_by_foreign` (`post_by`),
  ADD KEY `invoices_verified_by_foreign` (`verified_by`),
  ADD KEY `invoices_student_id_foreign` (`student_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_fee_id_foreign` (`fee_id`),
  ADD KEY `invoice_items_post_by_foreign` (`post_by`),
  ADD KEY `invoice_items_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `item_of_journals`
--
ALTER TABLE `item_of_journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_of_journals_journal_id_foreign` (`journal_id`),
  ADD KEY `item_of_journals_post_by_foreign` (`post_by`),
  ADD KEY `item_of_journals_verified_by_foreign` (`verified_by`),
  ADD KEY `item_of_journals_ledger_id_foreign` (`ledger_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journals_post_by_foreign` (`post_by`),
  ADD KEY `journals_verified_by_foreign` (`verified_by`),
  ADD KEY `fiscal_year_id_by_foreign` (`fiscal_year_id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_applications_student_id_foreign` (`student_id`),
  ADD KEY `leave_applications_post_by_foreign` (`post_by`),
  ADD KEY `leave_applications_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ledgers_post_by_foreign` (`post_by`),
  ADD KEY `ledgers_verified_by_foreign` (`verified_by`),
  ADD KEY `ledgers_id_by_foreign` (`ledger_id`);

--
-- Indexes for table `list_of_ledgers`
--
ALTER TABLE `list_of_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_of_ledgers_post_by_foreign` (`post_by`),
  ADD KEY `list_of_ledgers_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_exam_id_foreign` (`exam_id`),
  ADD KEY `marks_subject_id_foreign` (`subject_id`),
  ADD KEY `marks_student_id_foreign` (`student_id`),
  ADD KEY `marks_classroom_id_foreign` (`classroom_id`),
  ADD KEY `marks_section_id_foreign` (`section_id`),
  ADD KEY `marks_post_by_foreign` (`post_by`),
  ADD KEY `marks_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `mark_grades`
--
ALTER TABLE `mark_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_grades_post_by_foreign` (`post_by`),
  ADD KEY `mark_grades_verified_by_foreign` (`verified_by`);

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
-- Indexes for table `news_and_events`
--
ALTER TABLE `news_and_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_post_by_foreign` (`post_by`),
  ADD KEY `notices_verified_by_foreign` (`verified_by`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

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
-- Indexes for table `payee_and_payers`
--
ALTER TABLE `payee_and_payers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payee_and_payers_post_by_foreign` (`post_by`),
  ADD KEY `payee_and_payers_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`),
  ADD KEY `payment_methods_post_by_foreign` (`post_by`),
  ADD KEY `payment_methods_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
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
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routines_post_by_foreign` (`post_by`),
  ADD KEY `routines_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_post_by_foreign` (`post_by`),
  ADD KEY `sections_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_user_id_foreign` (`user_id`),
  ADD KEY `staff_post_by_foreign` (`post_by`),
  ADD KEY `staff_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_attendances_staff_id_foreign` (`staff_id`),
  ADD KEY `staff_attendances_post_by_foreign` (`post_by`),
  ADD KEY `staff_attendances_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_roll_no_unique` (`roll_no`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_section_id_foreign` (`section_id`),
  ADD KEY `students_classroom_id_foreign` (`classroom_id`),
  ADD KEY `students_post_by_foreign` (`post_by`),
  ADD KEY `students_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attendances_post_by_foreign` (`post_by`),
  ADD KEY `student_attendances_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_groups_post_by_foreign` (`post_by`),
  ADD KEY `student_groups_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_payments_post_by_foreign` (`post_by`),
  ADD KEY `student_payments_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `student_sessions`
--
ALTER TABLE `student_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_sessions_session_id_foreign` (`session_id`),
  ADD KEY `student_sessions_student_id_foreign` (`student_id`),
  ADD KEY `student_sessions_classroom_id_foreign` (`classroom_id`),
  ADD KEY `student_sessions_section_id_foreign` (`section_id`),
  ADD KEY `student_sessions_post_by_foreign` (`post_by`),
  ADD KEY `student_sessions_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_classroom_id_foreign` (`classroom_id`),
  ADD KEY `subjects_post_by_foreign` (`post_by`),
  ADD KEY `subjects_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `syllabus_classroom_id_foreign` (`classroom_id`),
  ADD KEY `syllabus_post_by_foreign` (`post_by`),
  ADD KEY `syllabus_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_post_by_foreign` (`post_by`),
  ADD KEY `transactions_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `transport_assigns`
--
ALTER TABLE `transport_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_routes`
--
ALTER TABLE `transport_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_routes_post_by_foreign` (`post_by`),
  ADD KEY `transport_routes_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_vehicles_post_by_foreign` (`post_by`),
  ADD KEY `transport_vehicles_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_activations`
--
ALTER TABLE `users_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_activations_id_staff_foreign` (`id_staff`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_post_by_foreign` (`post_by`),
  ADD KEY `visitors_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `website_languages`
--
ALTER TABLE `website_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_languages_post_by_foreign` (`post_by`),
  ADD KEY `website_languages_verified_by_foreign` (`verified_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics_years`
--
ALTER TABLE `academics_years`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `class_days`
--
ALTER TABLE `class_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_lists`
--
ALTER TABLE `exam_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam_routines`
--
ALTER TABLE `exam_routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fee_collects`
--
ALTER TABLE `fee_collects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_discounts`
--
ALTER TABLE `fee_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item_of_journals`
--
ALTER TABLE `item_of_journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `list_of_ledgers`
--
ALTER TABLE `list_of_ledgers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `mark_grades`
--
ALTER TABLE `mark_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `news_and_events`
--
ALTER TABLE `news_and_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payee_and_payers`
--
ALTER TABLE `payee_and_payers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_sessions`
--
ALTER TABLE `student_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transport_assigns`
--
ALTER TABLE `transport_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_routes`
--
ALTER TABLE `transport_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1157;
--
-- AUTO_INCREMENT for table `users_activations`
--
ALTER TABLE `users_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `website_languages`
--
ALTER TABLE `website_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academics_years`
--
ALTER TABLE `academics_years`
  ADD CONSTRAINT `academics_years_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `academics_years_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bank_accounts_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD CONSTRAINT `chart_of_accounts_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chart_of_accounts_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `classrooms_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `class_days`
--
ALTER TABLE `class_days`
  ADD CONSTRAINT `class_days_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `class_days_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `complains_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `departments_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `designations_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `enquiries_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_lists`
--
ALTER TABLE `exam_lists`
  ADD CONSTRAINT `exam_lists_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `exam_lists_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_routines`
--
ALTER TABLE `exam_routines`
  ADD CONSTRAINT `exam_routines_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_lists` (`id`),
  ADD CONSTRAINT `exam_routines_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `exam_routines_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `fee_discounts`
--
ALTER TABLE `fee_discounts`
  ADD CONSTRAINT `fee_discounts_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fee_discounts_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD CONSTRAINT `fee_types_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fee_types_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD CONSTRAINT `fiscal_years_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fiscal_years_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `grades_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoices_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `invoices_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fee_types` (`id`),
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_items_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoice_items_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `item_of_journals`
--
ALTER TABLE `item_of_journals`
  ADD CONSTRAINT `item_of_journals_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`),
  ADD CONSTRAINT `item_of_journals_ledger_id_foreign` FOREIGN KEY (`ledger_id`) REFERENCES `list_of_ledgers` (`id`),
  ADD CONSTRAINT `item_of_journals_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `item_of_journals_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `fiscal_year_id_by_foreign` FOREIGN KEY (`fiscal_year_id`) REFERENCES `fiscal_years` (`id`),
  ADD CONSTRAINT `journals_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `journals_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD CONSTRAINT `leave_applications_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `leave_applications_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `leave_applications_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD CONSTRAINT `ledgers_id_by_foreign` FOREIGN KEY (`ledger_id`) REFERENCES `list_of_ledgers` (`id`),
  ADD CONSTRAINT `ledgers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ledgers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `list_of_ledgers`
--
ALTER TABLE `list_of_ledgers`
  ADD CONSTRAINT `list_of_ledgers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `list_of_ledgers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `marks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_lists` (`id`),
  ADD CONSTRAINT `marks_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `marks_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `marks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `marks_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `mark_grades`
--
ALTER TABLE `mark_grades`
  ADD CONSTRAINT `mark_grades_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mark_grades_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

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
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notices_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payee_and_payers`
--
ALTER TABLE `payee_and_payers`
  ADD CONSTRAINT `payee_and_payers_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payee_and_payers_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_methods_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `permission_groups` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `routines_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sections_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staff_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `staff_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD CONSTRAINT `staff_attendances_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `staff_attendances_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`),
  ADD CONSTRAINT `staff_attendances_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `students_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD CONSTRAINT `student_attendances_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_attendances_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD CONSTRAINT `student_groups_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_groups_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD CONSTRAINT `student_payments_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_payments_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_sessions`
--
ALTER TABLE `student_sessions`
  ADD CONSTRAINT `student_sessions_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `student_sessions_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_sessions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `student_sessions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `academics_years` (`id`),
  ADD CONSTRAINT `student_sessions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_sessions_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `subjects_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subjects_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `syllabus_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `syllabus_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `syllabus_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `transport_routes`
--
ALTER TABLE `transport_routes`
  ADD CONSTRAINT `transport_routes_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transport_routes_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  ADD CONSTRAINT `transport_vehicles_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transport_vehicles_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_activations`
--
ALTER TABLE `users_activations`
  ADD CONSTRAINT `users_activations_id_staff_foreign` FOREIGN KEY (`id_staff`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `visitors_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `website_languages`
--
ALTER TABLE `website_languages`
  ADD CONSTRAINT `website_languages_post_by_foreign` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `website_languages_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

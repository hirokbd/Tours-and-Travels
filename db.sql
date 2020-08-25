-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2020 at 05:14 AM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msglobalcom_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `agent_id`, `email`, `phone`, `phone2`, `agent_photo`, `address`, `district_id`, `upazila_id`, `commission`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Monir Hossain', '1', 'monir@gmail.com', '01987665433', '01987665432', 'monir-1579152704.jpg', 'Mirpur-1, Dhaka', '1', '12', 6, 1, '2020-01-15 23:31:44', '2020-01-15 23:35:33'),
(2, 'anowar', '02', 'dgsghshs@gfhd.com', '01258235236', '02365+5698+', '', 'sshhdjhdjdjh', '11', 'Select Upazila', 5, 1, '2020-02-03 18:27:57', '2020-02-03 18:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sing_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_balance` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_name`, `account_number`, `branch`, `sing_photo`, `op_balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Brac Bank', 'Base IT', '2553738929209727635', 'Mirpur-11', 'baseit-logo-1577692877.png', 10000, 1, '2019-12-30 02:01:17', '2019-12-30 02:01:17'),
(2, 'Eastern Bank Ltd', 'Base IT', '2553738929209727680', 'Mirpur-11', 'baseit-logo-1577692928.png', 1000, 1, '2019-12-30 02:02:08', '2019-12-30 02:02:08'),
(3, 'Dutch Bangla Bank', 'Base IT', '2553738929209727654', 'Mirpur-10', 'baseit-logo-1577692985.png', 5000, 1, '2019-12-30 02:03:05', '2019-12-30 02:03:05'),
(4, 'Social Islami Bank Limited', 'Base IT', '2553738929209766666', 'Mirpur-10', 'baseit-logo-1577693041.png', 3000, 1, '2019-12-30 02:04:01', '2019-12-30 02:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `upazila_id` int(10) UNSIGNED NOT NULL,
  `client_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_expired` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_issue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_insurance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_insurance_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_company_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `agent_id`, `email`, `phone`, `phone2`, `address`, `district_id`, `upazila_id`, `client_photo`, `passport_no`, `birth_date`, `passport_expired`, `passport_issue`, `em_name`, `em_email`, `em_phone`, `em_insurance`, `em_insurance_no`, `em_company_phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahat Hossain', 1, 'rahat@gmail.com', '01878909871', '01878909872', 'Mirpur-11, Dhaka', 1, 12, 'rahat-1577770245.jpg', '22344566322488', '12-12-1986', '04-02-2025', '31-12-2019', 'Mousumi Islam', 'mousumi@gmail.com', '01982456789', 'Alico', '123245262672', '01987654342', 1, '2019-12-30 23:30:45', '2019-12-30 23:30:45'),
(2, 'Rakbir Hasan', 3, 'rakbir@gmail.com', '01911005555', '01911005556', 'Gazipur Sadar, Gazipur', 2, 21, 'rakbir hasan-1577774898.jpg', '253346546447456877', '03-07-1984', '21-07-2025', '31-12-2019', 'Mousumi Islam', 'mousumi@gmail.com', '01982456789', 'Alico', '123245262644', '01987654345', 1, '2019-12-31 00:48:18', '2019-12-31 00:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `name`, `tagline`, `description`, `email`, `email2`, `phone`, `phone2`, `logo`, `address`, `website`, `start_date`, `created_at`, `updated_at`) VALUES
(1, 'Parents Travels & Tours', 'Recruiting License No. RL-514', 'Parents Travels & Tours is a leading Travel Agency firm in Bangladesh. Our aspiration is to produce high quality, cost effective, reliable result-oriented web and e-commerce solutions on time. Our young and experienced Professionals are here to provide utmost return on your investment in shortest possible time with their talent and proficiency. Our company develops distinctive web solutions which guarantee competitive advantage and improved effectiveness for your business and thus to your end users.', 'info@parentsbd.net', 'istiqdam@yahoo.com', '01821878699', '01717172863', 'banner-1579087367.png', '183, Shahid Sayed Nazrul Islam Sharani, 3/3C, Bijoy Nagar (1st Floor), Dhaka-1000, Bangladesh', 'http://parentsbd.net', '01-12-2014', NULL, '2020-01-15 05:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `description`, `flag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'South Asian Country', 'bangladesh-1577692695.png', 1, '2019-12-30 01:58:15', '2019-12-30 01:58:15'),
(2, 'India', 'South Asian Country', 'Flag-India-1577692712.jpg', 1, '2019-12-30 01:58:32', '2019-12-30 01:58:32'),
(3, 'Bhutan', 'South Asian Country', 'Bhutan-1577692734.jpg', 1, '2019-12-30 01:58:54', '2019-12-30 01:58:54'),
(4, 'Nepal', 'South Asian Country', 'Flag-of-Nepal-1577692753.png', 1, '2019-12-30 01:59:13', '2019-12-30 01:59:13'),
(5, 'Myanmar', 'South Asian Country', 'FIN-MYA-1577692772.jpg', 1, '2019-12-30 01:59:32', '2019-12-30 01:59:32'),
(6, 'United States', 'European Country', 'usa-1577692810.png', 1, '2019-12-30 02:00:10', '2019-12-30 02:00:10'),
(7, 'United Kingdom', 'European Country', 'uk-1577692823.png', 1, '2019-12-30 02:00:23', '2019-12-30 02:00:23'),
(8, 'Pakistan', 'South Asian Country', 'pakistan-1577692837.png', 1, '2019-12-30 02:00:37', '2019-12-30 02:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_id` int(10) UNSIGNED NOT NULL,
  `payment_type` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `ex_date` date NOT NULL,
  `ex_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_id`, `payment_type`, `bank_id`, `amount`, `ex_date`, `ex_note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1000, '2019-12-24', 'dzfSDzxv', '2020-01-06 01:55:06', '2020-01-06 01:55:06'),
(2, 2, 1, 0, 2000, '2020-01-02', 'sdzvsDzvsz', '2020-01-06 01:56:23', '2020-01-06 01:56:23'),
(3, 3, 1, 0, 5000, '2020-01-06', 'dfzxvszvc', '2020-01-06 01:56:46', '2020-01-06 01:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `expense_names`
--

CREATE TABLE `expense_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ex_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ex_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_names`
--

INSERT INTO `expense_names` (`id`, `ex_name`, `ex_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Office Expense', 'All kind of office expenses', 1, '2020-01-01 23:01:02', '2020-01-01 23:01:02'),
(2, 'Visa Application', 'All kind of Visa Application', 1, '2020-01-01 23:02:00', '2020-01-01 23:02:00'),
(3, 'Convenience', 'All kind of Convenience', 1, '2020-01-01 23:02:35', '2020-01-01 23:02:35'),
(4, 'Mobile Bill', 'All kind of Mobile Bill', 1, '2020-01-01 23:02:55', '2020-01-01 23:02:55'),
(5, 'Salary', 'Staff Salary', 1, '2020-01-01 23:03:46', '2020-01-01 23:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `foreign_offices`
--

CREATE TABLE `foreign_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foreign_offices`
--

INSERT INTO `foreign_offices` (`id`, `name`, `email`, `email2`, `phone`, `phone2`, `address`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ibne Overseas', 'ibne1@overseas.com', 'ibne2@overseas.com', '9084237725887352', '9084237725887353', 'Katmundu, Nepal', 4, 1, '2020-01-18 01:15:56', '2020-01-18 01:34:58'),
(2, 'Rajkahon', 'rajkahon@gmail.com', 'rajkahon2@gmail.com', '9088776366363', '9088776366364', 'Dillihi, India', 2, 1, '2020-01-18 01:35:59', '2020-01-18 01:37:15'),
(3, 'Islamabad Overseas', 'islamabad@gmail.com', 'islamabad1@gmail.com', '094723577237', '094723577238', 'Islamabad, Pakistan', 8, 1, '2020-01-18 01:39:06', '2020-01-18 01:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` int(10) UNSIGNED DEFAULT NULL,
  `rem_id` int(10) UNSIGNED DEFAULT NULL,
  `pay_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `inv_id`, `rem_id`, `pay_amount`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 20000, NULL, NULL),
(2, NULL, 3, 300000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL,
  `regi_type` int(11) NOT NULL DEFAULT 1 COMMENT 'Registration=1, Pre-registration=0',
  `year` int(11) DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `visa_type` int(10) UNSIGNED NOT NULL,
  `payment_type` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `invoice_date`, `client_id`, `agent_id`, `regi_type`, `year`, `country_id`, `visa_type`, `payment_type`, `bank_id`, `cheque_no`, `sub_total`, `discount_percent`, `grand_total`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(2, 'INV-20-1002', '2020-01-06', 1, 1, 1, NULL, 4, 1, 1, 0, NULL, 30000, 1, 29700, 20000, 9700, '2020-01-06 01:53:28', '2020-01-06 01:53:28'),
(3, 'INV-2020-3', '2020-01-06', 1, 1, 1, NULL, 5, 2, 0, 1, '2142534w6364e564e57', 32000, 2, 31360, 20000, 11360, '2020-01-06 02:40:47', '2020-01-06 02:40:47'),
(4, 'INV-2020-4', '2020-01-15', 1, 1, 1, NULL, 3, 2, 1, 0, NULL, 30000, NULL, 30000, 20000, 10000, '2020-01-15 03:48:07', '2020-01-15 03:48:07'),
(5, 'INV-2020-5', '2020-01-15', 1, 1, 1, NULL, 2, 2, 1, 0, NULL, 2000, NULL, 2000, 2000, 0, '2020-01-15 04:15:04', '2020-01-15 04:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_infos`
--

CREATE TABLE `invoice_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `pack_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_infos`
--

INSERT INTO `invoice_infos` (`id`, `invoice_id`, `pack_id`, `quantity`, `price`, `total_amount`, `remarks`, `created_at`, `updated_at`) VALUES
(6, 2, 4, 1, 30000, 30000, 'Saves the text that\'s being written and will load it back in the future. It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load .* It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load it back in the future. * It will forget the text when the form it\'s contained in is submitted.', NULL, NULL),
(7, 3, 3, 1, 2000, 2000, 'Saves the text that\'s being written and will load it back in the future. It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load .* It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load it back in the future. * It will forget the text when the form it\'s contained in is submitted.', NULL, NULL),
(8, 3, 5, 1, 30000, 30000, 'dfxcsdzx', NULL, NULL),
(9, 4, 4, 1, 30000, 30000, 'Saves the text that\'s being written and will load it back in the future. It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load .* It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load it back in the future. * It will forget the text when the form it\'s contained in is submitted.', NULL, NULL),
(10, 5, 3, 1, 2000, 2000, 'Saves the text that\'s being written and will load it back in the future. It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load .* It will forget the text when the form it\'s contained in is submitted.* Saves the text that\'s being written and will load it back in the future. * It will forget the text when the form it\'s contained in is submitted.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dhaka', '2019-12-30 02:10:12', '2019-12-30 02:10:12'),
(2, 0, 'Gazipur', '2019-12-30 02:10:22', '2019-12-30 02:10:22'),
(3, 0, 'Rajbari', '2019-12-30 02:10:29', '2019-12-30 02:10:29'),
(4, 0, 'Gopalgonj', '2019-12-30 02:10:38', '2019-12-30 02:10:38'),
(5, 0, 'Faridpur', '2019-12-30 02:10:44', '2019-12-30 02:10:44'),
(6, 0, 'Tangail', '2019-12-30 02:10:55', '2019-12-30 02:10:55'),
(7, 0, 'Manikgonj', '2019-12-30 02:11:11', '2019-12-30 02:11:11'),
(8, 0, 'Narayangonj', '2019-12-30 02:11:32', '2019-12-30 02:11:32'),
(9, 0, 'Bogura', '2019-12-30 02:11:47', '2019-12-30 02:11:47'),
(10, 0, 'Barisal', '2019-12-30 02:11:58', '2019-12-30 02:11:58'),
(11, 0, 'Borguna', '2019-12-30 02:12:04', '2019-12-30 02:12:04'),
(12, 1, 'Mirpur', '2019-12-30 02:12:13', '2019-12-30 02:12:13'),
(13, 1, 'Kafrul', '2019-12-30 02:12:21', '2019-12-30 02:12:21'),
(14, 1, 'Motijheel', '2019-12-30 02:12:30', '2019-12-30 02:12:30'),
(15, 1, 'Pallabi', '2019-12-30 02:12:36', '2019-12-30 02:12:36'),
(16, 1, 'Paltan', '2019-12-30 02:12:43', '2019-12-30 02:12:43'),
(17, 1, 'Sutrapur', '2019-12-30 02:12:49', '2019-12-30 02:12:49'),
(18, 1, 'Savar', '2019-12-30 02:12:56', '2019-12-30 02:12:56'),
(19, 1, 'Dhamrai', '2019-12-30 02:13:09', '2019-12-30 02:13:09'),
(21, 2, 'Gazipur Sadar', '2019-12-30 02:13:39', '2019-12-30 02:13:39'),
(22, 4, 'Gopalgonj Sadar', '2019-12-30 02:13:52', '2019-12-30 02:13:52'),
(23, 4, 'Muksudpur', '2019-12-30 02:14:02', '2019-12-30 02:14:02'),
(24, 4, 'Kashiani', '2019-12-30 02:14:13', '2019-12-30 02:14:13'),
(25, 4, 'Kotalipara', '2019-12-30 02:14:20', '2019-12-30 02:14:20'),
(26, 4, 'Tungipara', '2019-12-30 02:14:32', '2019-12-30 02:14:32'),
(27, 3, 'Rajbari Sadar', '2019-12-30 02:15:04', '2019-12-30 02:15:04'),
(28, 3, 'Pangsha', '2019-12-30 02:15:15', '2019-12-30 02:15:15'),
(29, 5, 'Alphadanga', '2019-12-30 02:15:32', '2019-12-30 02:15:32'),
(30, 5, 'Vanga', '2019-12-30 02:15:40', '2019-12-30 02:15:40'),
(31, 5, 'Modhukhali', '2019-12-30 02:15:48', '2019-12-30 02:15:48'),
(32, 0, 'Madaripur', '2019-12-30 02:16:08', '2019-12-30 02:16:08'),
(33, 32, 'Madaripur Sadar', '2019-12-30 02:16:29', '2019-12-30 02:16:29'),
(34, 32, 'Kalkini', '2019-12-30 02:17:16', '2019-12-30 02:17:16'),
(35, 0, 'Pirojpur', '2020-02-05 10:38:17', '2020-02-05 10:38:17'),
(36, 35, 'Kaukhali', '2020-02-05 10:39:34', '2020-02-05 10:39:34'),
(37, 0, 'Nowga', '2020-02-05 11:57:46', '2020-02-05 11:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_10_053421_create_locations_table', 1),
(4, '2019_12_12_035242_create_clients_table', 1),
(5, '2019_12_15_094239_create_countries_table', 1),
(6, '2019_12_17_094808_create_visa_types_table', 1),
(7, '2019_12_18_060939_create_payment_types_table', 1),
(8, '2019_12_18_061503_create_company_infos_table', 1),
(10, '2019_12_22_064811_create_packages_table', 1),
(12, '2019_12_22_082751_create_invoice_infos_table', 1),
(13, '2019_12_23_042642_create_banks_table', 1),
(17, '2020_01_02_044447_create_expense_names_table', 3),
(21, '2019_12_22_082710_create_invoices_table', 4),
(22, '2020_01_02_051402_create_expenses_table', 4),
(24, '2019_12_31_042752_create_agents_table', 5),
(26, '2020_01_18_053630_create_foreign_offices_table', 6),
(28, '2020_01_18_090636_create_remittances_table', 7),
(29, '2020_01_18_083441_create_incomes_table', 8),
(30, '2019_12_18_093255_create_visa_apps_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pack_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pack_name`, `pack_desc`, `pack_amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Visa of USA', 'Visa Application of USA', '50000', 1, '2019-12-30 02:05:41', '2019-12-30 02:05:41'),
(3, 'Visa of India', 'Visa Application of India', '2000', 1, '2019-12-30 02:05:56', '2019-12-30 02:05:56'),
(4, 'Visa of China', 'Visa Application of China', '30000', 1, '2019-12-30 02:06:10', '2019-12-30 02:06:10'),
(5, 'USA Ticket', 'Ticket of USA', '30000', 1, '2019-12-30 02:06:37', '2019-12-30 02:06:37'),
(6, 'USA Ticket with Return', 'Ticket of USA with return', '50000', 1, '2019-12-30 02:07:02', '2019-12-30 02:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BDT', 'Bangladeshi Taka', 1, '2019-12-30 01:54:23', '2019-12-30 01:54:23'),
(2, 'USD', 'United States Dollar', 1, '2019-12-30 01:54:46', '2019-12-30 01:54:46'),
(3, 'Euro', 'European Currency', 1, '2019-12-30 01:55:06', '2019-12-30 01:55:06'),
(4, 'Rupees', 'Indian Rupees', 1, '2019-12-30 01:55:28', '2019-12-30 01:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `remittances`
--

CREATE TABLE `remittances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` int(10) UNSIGNED NOT NULL,
  `rem_amount` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remittances`
--

INSERT INTO `remittances` (`id`, `office_id`, `rem_amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 20000, 'Foreign Remittance', '2020-01-18 03:45:45', '2020-01-18 03:45:45'),
(3, 1, 300000, 'Foreign Remittance', '2020-01-18 03:51:36', '2020-01-18 03:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$10$9hTZ4CMw7HbH324cbknJWOuh3lF4ynslZfW/HrAhVXqHXFpnDzWQ2', 'DcvBG7uHUAQHJ6h8wxe75Ct0dhquAn2SIKmLbnQ0RfIt5XZX2ZSQqmxRYR6E', '2019-12-30 01:45:10', '2019-12-30 01:45:10'),
(2, 'Ahmed', 'admin@gmail.com', NULL, '$2y$10$nXRV6G.D2DFLoK3NCjP/kuCXyHOLj9IQbfAu66wEYQX6pEgrxIVcq', NULL, '2020-02-02 10:12:42', '2020-02-02 10:12:42'),
(3, 'BaseIT', 'baseit009@gmail.com', NULL, '$2y$10$fq6Pq8SJe.x2eJ8l6ZLPxul7meR6DoHWSZsW7h4hdEwH6uZnoex.S', NULL, '2020-03-03 15:46:52', '2020-03-03 15:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `visa_apps`
--

CREATE TABLE `visa_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `visa_type` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `visa_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa_duration_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `down_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `down_payment_type` int(10) UNSIGNED DEFAULT NULL,
  `app_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_fee_type` int(10) UNSIGNED DEFAULT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'New=1, Pending=0, Approved=2, Rejected=3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visa_apps`
--

INSERT INTO `visa_apps` (`id`, `client_id`, `visa_type`, `country_id`, `visa_duration`, `visa_duration_type`, `app_date`, `processing_time`, `down_payment`, `down_payment_type`, `app_fee`, `app_fee_type`, `document`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2', 'Days', '29-01-2020', '20', '1000', 1, '10000', 1, NULL, NULL, 1, '2020-01-21 03:19:18', '2020-01-21 03:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `visa_types`
--

CREATE TABLE `visa_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visa_types`
--

INSERT INTO `visa_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Labor Visa', 'Working Visa', 1, '2019-12-30 01:56:07', '2019-12-30 01:56:07'),
(2, 'Tourist Visa', 'Tour Visa', 1, '2019-12-30 01:56:25', '2019-12-30 01:56:25'),
(3, 'Free Visa', 'Free Visa', 1, '2019-12-30 01:56:40', '2019-12-30 01:56:40'),
(4, 'Contractual Visa', 'Contact Visa', 1, '2019-12-30 01:57:07', '2019-12-30 01:57:07'),
(5, 'Hajj Visa', 'Hajj Visa', 1, '2019-12-30 01:57:26', '2019-12-30 01:57:26'),
(6, 'Omrah Visa', 'Omrah Visa', 1, '2019-12-30 01:57:40', '2019-12-30 01:57:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_names`
--
ALTER TABLE `expense_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foreign_offices`
--
ALTER TABLE `foreign_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_infos`
--
ALTER TABLE `invoice_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remittances`
--
ALTER TABLE `remittances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visa_apps`
--
ALTER TABLE `visa_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa_types`
--
ALTER TABLE `visa_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_names`
--
ALTER TABLE `expense_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foreign_offices`
--
ALTER TABLE `foreign_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_infos`
--
ALTER TABLE `invoice_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `remittances`
--
ALTER TABLE `remittances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visa_apps`
--
ALTER TABLE `visa_apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visa_types`
--
ALTER TABLE `visa_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

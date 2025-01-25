-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2025 at 06:35 PM
-- Server version: 10.6.20-MariaDB-cll-lve-log
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profitli_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('pending','completed','canceled') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `house_phone_number` bigint(20) DEFAULT NULL,
  `city` varchar(155) NOT NULL,
  `agency_Id` bigint(20) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estate`
--

CREATE TABLE `estate` (
  `id` bigint(20) NOT NULL,
  `agency_id` bigint(20) NOT NULL,
  `client_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `city` varchar(35) NOT NULL,
  `type` enum('KONUT','OFIS','VILLA','ARAZI','SANAYI_ISYERI') NOT NULL,
  `floor_count` int(11) DEFAULT NULL,
  `floor` int(10) DEFAULT NULL,
  `unit` int(10) DEFAULT NULL,
  `building_age` varchar(11) DEFAULT NULL,
  `sleeps` varchar(11) DEFAULT NULL,
  `furnished` tinyint(1) DEFAULT NULL,
  `parking` varchar(255) DEFAULT NULL,
  `elevator` tinyint(1) DEFAULT NULL,
  `balcony` tinyint(1) DEFAULT NULL,
  `within_site` tinyint(1) DEFAULT NULL,
  `gross_area` int(11) NOT NULL,
  `net_area` int(11) NOT NULL,
  `contract_type` enum('SATILIK','KIRALIK') NOT NULL,
  `postal_code` varchar(55) DEFAULT NULL,
  `near_center` tinyint(1) DEFAULT NULL,
  `near_school` tinyint(1) DEFAULT NULL,
  `status` tinyint(5) DEFAULT 1,
  `project_name` varchar(255) DEFAULT NULL,
  `sold_out` tinyint(4) DEFAULT NULL,
  `rented` tinyint(4) DEFAULT NULL,
  `wrong_number` tinyint(4) DEFAULT NULL,
  `did_not_answer` tinyint(4) DEFAULT NULL,
  `does_not_sell` tinyint(4) DEFAULT NULL,
  `not_available` tinyint(4) DEFAULT NULL,
  `do_not_disturb` tinyint(4) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `not_sale` tinyint(4) DEFAULT NULL,
  `rent` tinyint(4) DEFAULT NULL,
  `not_rent` tinyint(4) DEFAULT NULL,
  `opportunity` tinyint(4) DEFAULT NULL,
  `block` varchar(45) DEFAULT NULL,
  `accept_rules` tinyint(2) DEFAULT 1,
  `price` bigint(20) DEFAULT NULL,
  `displayed` tinyint(5) DEFAULT 1,
  `notification_time` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `investment_type` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `agreement` tinyint(1) NOT NULL DEFAULT 0,
  `agency_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `action` varchar(35) NOT NULL,
  `ip_address` varchar(60) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `receiver_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifictions`
--

CREATE TABLE `notifictions` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(5) NOT NULL DEFAULT 0,
  `status` enum('warning','ban') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_consultant`
--

CREATE TABLE `real_estate_consultant` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `agency_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `office_phone_number` varchar(20) NOT NULL,
  `social_fb` varchar(255) DEFAULT NULL,
  `social_tw` varchar(255) DEFAULT NULL,
  `social_insta` varchar(255) DEFAULT NULL,
  `social_lin` varchar(255) DEFAULT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) NOT NULL,
  `buyer_Id` bigint(20) NOT NULL,
  `estate_id` int(11) DEFAULT NULL,
  `rental_date_start` date NOT NULL,
  `rental_date_end` date NOT NULL,
  `rental_price` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `project_name` varchar(250) DEFAULT NULL,
  `agency_id` bigint(11) NOT NULL,
  `notification_time` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) NOT NULL,
  `estate_Id` bigint(20) NOT NULL,
  `buyer_id` bigint(20) NOT NULL,
  `sale_date` datetime NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `mobile_phone_number` varchar(20) NOT NULL,
  `house_phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(155) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `role` enum('admin','ticket_admin','user') DEFAULT 'user',
  `verify_token` varchar(255) DEFAULT NULL,
  `verify_token_expire` bigint(35) DEFAULT NULL,
  `cookie_token` varchar(255) DEFAULT NULL,
  `csrf_token` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expire` bigint(35) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estate`
--
ALTER TABLE `estate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifictions`
--
ALTER TABLE `notifictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estate_consultant`
--
ALTER TABLE `real_estate_consultant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estate`
--
ALTER TABLE `estate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifictions`
--
ALTER TABLE `notifictions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `real_estate_consultant`
--
ALTER TABLE `real_estate_consultant`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

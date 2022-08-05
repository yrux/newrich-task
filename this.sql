-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 01:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newrichtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '0=main admin, 1 = judge'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`, `user_type`) VALUES
(12, 'yrux', 'yrux@gmail.com', 'yrux', '25d55ad283aa400af464c76d713c07ad', 2),
(13, 'yrux2', 'yrux2@gmail.com', 'yrux2', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_permissions`
--

CREATE TABLE `login_permissions` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_permissions`
--

INSERT INTO `login_permissions` (`id`, `user_type_id`, `permission_id`, `updated_at`, `created_at`) VALUES
(1, 2, 1, '2022-08-02 13:56:41', '2022-08-02 13:56:41'),
(2, 2, 2, '2022-08-02 13:56:43', '2022-08-02 13:56:43'),
(3, 2, 3, '2022-08-02 13:56:45', '2022-08-02 13:56:45'),
(4, 2, 4, '2022-08-02 13:56:47', '2022-08-02 13:56:47'),
(5, 2, 5, '2022-08-02 13:56:49', '2022-08-02 13:56:49'),
(6, 2, 6, '2022-08-02 13:56:51', '2022-08-02 13:56:51'),
(7, 2, 7, '2022-08-02 13:56:53', '2022-08-02 13:56:53'),
(8, 2, 8, '2022-08-02 13:56:55', '2022-08-02 13:56:55'),
(9, 2, 9, '2022-08-02 13:56:57', '2022-08-02 13:56:57'),
(10, 2, 10, '2022-08-02 13:56:59', '2022-08-02 13:56:59'),
(11, 2, 11, '2022-08-02 13:57:02', '2022-08-02 13:57:02'),
(12, 2, 12, '2022-08-02 13:57:04', '2022-08-02 13:57:04'),
(13, 1, 1, '2022-08-02 13:57:14', '2022-08-02 13:57:14'),
(14, 1, 3, '2022-08-02 13:57:19', '2022-08-02 13:57:19'),
(15, 1, 5, '2022-08-02 13:57:27', '2022-08-02 13:57:27'),
(16, 1, 7, '2022-08-02 13:57:29', '2022-08-02 13:57:29'),
(17, 1, 9, '2022-08-02 13:57:32', '2022-08-02 13:57:32'),
(18, 1, 11, '2022-08-02 13:57:35', '2022-08-02 13:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `name`, `updated_at`, `created_at`) VALUES
(1, 'text-read', 'text-read', '2022-08-02 13:52:29', '2022-08-02 13:52:29'),
(2, 'text-write', 'text-write', '2022-08-02 13:52:33', '2022-08-02 13:52:33'),
(3, 'textarea-read', 'textarea-read', '2022-08-02 13:52:44', '2022-08-02 13:52:44'),
(4, 'textarea-write', 'textarea-write', '2022-08-02 13:52:49', '2022-08-02 13:52:49'),
(5, 'password-read', 'password-read', '2022-08-02 13:52:56', '2022-08-02 13:52:56'),
(6, 'password-write', 'password-write', '2022-08-02 13:53:00', '2022-08-02 13:53:00'),
(7, 'select-read', 'select-read', '2022-08-02 13:53:05', '2022-08-02 13:53:05'),
(8, 'select-write', 'select-write', '2022-08-02 13:53:09', '2022-08-02 13:53:09'),
(9, 'radio-read', 'radio-read', '2022-08-02 13:53:31', '2022-08-02 13:53:18'),
(10, 'radio-write', 'radio-write', '2022-08-02 13:53:29', '2022-08-02 13:53:26'),
(11, 'checkbox-read', 'checkbox-read', '2022-08-02 13:53:36', '2022-08-02 13:53:36'),
(12, 'checkbox-write', 'checkbox-write', '2022-08-02 13:53:40', '2022-08-02 13:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `updated_at`, `created_at`) VALUES
(1, 'onlyread', '2022-08-02 13:54:27', '2022-08-02 13:54:27'),
(2, 'allpermissions', '2022-08-02 13:54:46', '2022-08-02 13:54:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `login_permissions`
--
ALTER TABLE `login_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_permissions`
--
ALTER TABLE `login_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login_permissions`
--
ALTER TABLE `login_permissions`
  ADD CONSTRAINT `login_permissions_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `login_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

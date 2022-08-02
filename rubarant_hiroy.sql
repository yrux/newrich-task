-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2021 at 02:31 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rubarant_hiroy`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `marked_for_scoring` tinyint(4) DEFAULT 0,
  `average_score` float DEFAULT 0,
  `grade` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `marked_for_scoring`, `average_score`, `grade`) VALUES
(3, 'Computer Science Project', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_scores`
--

CREATE TABLE `course_scores` (
  `id` int(11) NOT NULL,
  `judge_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `group_members` varchar(555) DEFAULT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `group_number` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `inp1` int(11) DEFAULT NULL,
  `inp2` int(11) DEFAULT NULL,
  `inp3` int(11) DEFAULT NULL,
  `inp4` int(11) DEFAULT NULL,
  `inp5` int(11) DEFAULT NULL,
  `inp6` int(11) DEFAULT NULL,
  `inp7` int(11) DEFAULT NULL,
  `inp8` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_scores`
--

INSERT INTO `course_scores` (`id`, `judge_id`, `course_id`, `group_members`, `project_title`, `group_number`, `comment`, `inp1`, `inp2`, `inp3`, `inp4`, `inp5`, `inp6`, `inp7`, `inp8`, `total`) VALUES
(5, 5, 3, 'test', 'test', '123', 'comments', 5, 0, 4, 0, 0, 13, 0, 12, 34),
(6, 11, 3, 'csc350', 'php final project', '001', '1234567', 5, 0, 0, 10, 8, 0, 0, 13, 36);

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
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=main admin, 1 = judge'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`, `user_type`) VALUES
(1, 'yrux', 'yruxwork@gmail.com', 'yrux', '25d55ad283aa400af464c76d713c07ad', 0),
(6, 'judge2', 'judge2@gmail.com', 'judge2', '25d55ad283aa400af464c76d713c07ad', 1),
(7, 'judge3', 'judge3@gmail.com', 'judge3', '25d55ad283aa400af464c76d713c07ad', 1),
(9, 'judge4', 'judge4@gmail.com', 'judge4', '25d55ad283aa400af464c76d713c07ad', 1),
(11, 'judge 1', 'judge1@gmail.com', 'judge1', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_scores`
--
ALTER TABLE `course_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_scores`
--
ALTER TABLE `course_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

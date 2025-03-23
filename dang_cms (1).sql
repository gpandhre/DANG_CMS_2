-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 08:10 PM
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
-- Database: `dang_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `password` varchar(8) NOT NULL,
  `verify_token` varchar(100) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `name`, `email`, `contact`, `dept`, `password`, `verify_token`, `verify_status`) VALUES
(1, 'Ganesh Pandhre', 'gpandhre97@gmail.com', '7779069600', 'Mamlatdar', '12345678', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `sub_category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sub_category`) VALUES
(1, 'General', 'Insufficient Water'),
(2, 'General', 'Inadequate Water Supply');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `cType` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(25) NOT NULL DEFAULT 'Dang',
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `votes` int(11) NOT NULL DEFAULT 0,
  `officer` tinyint(1) NOT NULL DEFAULT 0,
  `subDeptOff` tinyint(1) NOT NULL DEFAULT 0,
  `collector` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `subject`, `cType`, `description`, `city`, `address`, `date`, `votes`, `officer`, `subDeptOff`, `collector`) VALUES
(1, 'No water since 3 days', 'Water', 'Since 3 days, there is no water in our area. There is a damage in the water supply pipeline. Officers haven\'t fixed it yet.\r\n\r\nPlease do the needful as early as possible. Thank you.', 'Dang', 'B/105, Swarg building, near Rainbow Hospital, Lalchok road, Junimad, Dang', '2025-03-18 12:53:18', 115, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `verify_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`name`, `email`, `contact`, `password`, `verify_token`, `created_at`, `verify_status`) VALUES
('Divyesh Chauhan', 'masterfrontend97@gmail.com', 2147483647, '12345678', '06d729c7fdc86c4f70e4541bdef0c5f6', '2025-03-17 10:00:29', 0),
('Ganesh Pandhre', 'gpandhre97@gmail.com', 2147483647, '12345678', '95bf418dd1249c5e0dc039cbd7e8e5b1', '2025-03-23 18:52:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

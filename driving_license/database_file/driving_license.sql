-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 11:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driving_license`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Sr_no` int(11) NOT NULL,
  `Full_name` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Profile_pic` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `Password` int(50) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Sr_no`, `Full_name`, `UserName`, `Email`, `Profile_pic`, `gender`, `dob`, `address`, `Password`, `Mobile`, `created_at`, `is_status`) VALUES
(1, 'sandip memariya', 'Sandip196', 'sandip@gmail.com', '36kb.jpg', '', '0000-00-00', '', 123, '123', '2021-08-28 05:46:44', ''),
(2, 'sandip memariya', 'sandy1', 'sandipmemariya_admin@gmail.com', 'adminssandy11630131653.jpg', 'male', '1996-12-12', 'address', 123123, '1234567890', '2021-08-28 06:20:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr_no` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `documents` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `Password` varchar(255) NOT NULL,
  `is_status` int(2) NOT NULL DEFAULT '1',
  `is_reject` varchar(255) NOT NULL,
  `rej_message` varchar(255) NOT NULL,
  `driving_slot` date NOT NULL,
  `computer_slot` date NOT NULL,
  `driving_ststus` int(2) NOT NULL DEFAULT '0',
  `computer_status` int(2) NOT NULL DEFAULT '0',
  `license_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr_no`, `full_name`, `username`, `email`, `mobile`, `address`, `profile_pic`, `dob`, `city`, `gender`, `education`, `documents`, `created_at`, `date_created`, `Password`, `is_status`, `is_reject`, `rej_message`, `driving_slot`, `computer_slot`, `driving_ststus`, `computer_status`, `license_number`) VALUES
(15, '2021-09-24', 'sandy2', 'sandipmemariya_test2@gmail.com', '2222222222', 'Bhavnagar', 'sandy21632992496.jpg', '1996-12-12 00:00:00', 'Bhavnagar', 'male', '8th', 'sandy21632992496_Document.pdf', '2021-09-07 05:42:33', '2021-09-30 09:01:36.462139', '123123', 1, '', '', '2021-09-24', '2021-09-24', 1, 1, 'YEGA76794'),
(19, '2021-10-22', 'sandy6', 'sandipmemariya_test@gmail.com', '1111111111', 'Bhavnagar', 'sandy61632992397.jpg', '1996-12-12 00:00:00', 'Ahmedabad', 'male', '8th', 'sandy61632992397_Document.', '2021-09-03 03:07:24', '2021-09-30 08:59:57.072381', '123123', 1, '', '', '2021-10-22', '2021-10-22', 1, 1, 'YNEJ98025'),
(25, '2021-10-21', 'sandy1', 'sandipmemariya_test4@gmail.com', '4444444444', 'Bhavnagar', 'sandy11632992675.jpg', '1996-12-21 00:00:00', 'Botad', 'male', '8th', 'sandy11632992675_Document.pdf', '2021-09-03 04:10:48', '2021-09-30 09:04:35.627017', '123123', 1, '', '', '2021-10-21', '2021-10-21', 1, 1, 'YRVY82653'),
(26, 'PLEASE CONFIRM DATE', 'sandip2', 'sandipmemariya_test3@gmail.com', '3333333333', 'Bhavnagar', 'sandip21632992649.jpg', '1998-06-11 00:00:00', 'Botad', 'male', '8th', 'sandip21632992649_Document.pdf', '2021-09-04 04:39:27', '2021-09-30 09:22:14.977819', '123123', 1, '1', 'Adhar Not Available', '0000-00-00', '0000-00-00', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

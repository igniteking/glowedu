-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2021 at 07:51 PM
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
-- Database: `pythonide`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `date` text DEFAULT NULL,
  `active` varchar(10) NOT NULL,
  `token_key` varchar(255) NOT NULL,
  `state` text NOT NULL DEFAULT 'Rajasthan',
  `postalcode` varchar(10) NOT NULL DEFAULT '000000',
  `education` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(120) DEFAULT NULL,
  `user_type` text NOT NULL,
  `mobile_otp` varchar(60) NOT NULL,
  `mobile_active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`, `bio`, `date`, `active`, `token_key`, `state`, `postalcode`, `education`, `country`, `additional`, `profile_pic`, `user_type`, `mobile_otp`, `mobile_active`) VALUES
(1, 'Zaidan Khan', 'zaidan@zaidan.com', '7976156986', '$2y$10$A4V96Xndn/HFF/V1MGTP2estWq5qTgN9HzZxJbFF4fbFtIzcXwB2u', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2021-05-08 00:00:00', '', '823426bd2761a067f274bb2d8218f904', 'Rajasthan', '302002', 'graduatee', 'India', '', 'DAqZ3NFaoRlSgYO/image_2021-01-04_19-04-41.png', 'student', '6654', '1'),
(2, 'admin', 'admin@admin.com', '0000000000', '$2y$10$nFoDFE0Y5GEZB87jryD7eO2ZTeNDwFjodXRi/r7dc3V2fOJ5hfG3C', '', '2021-05-08 00:00:00', '', '2b3b2613b443454cdd8c651c4f20c388', '', '', '', '', '', '', 'admin', '', ''),
(6, 'IGNITEKING', 'hol1957@gmail.com', '9829167794', '$2y$10$T8AGXoFDgD8HYZpBm8TR7egmim9hFZdSllajHschIKpfmV1nO2oUm', '', '2021-05-16 00:00:00', '', 'ad775950b7625ebc2f1c8ec7651af246', '', '', '', '', '', '07OjsAX49ZSRE65/rzUEPod.jpg', 'student', '', ''),
(8, 'Rohan', 'sidhuroh@outlook.com', '', '$2y$10$4b0VS9Hh7ytv364ZvscR.enm0XvaU6xnxR3zDTHQrTY5jokMfytom', '', '2021-05-24    ', '0', '2196eb87f8391c3e7c6d25e7aacea0b5', 'Rajasthan', '000000', NULL, NULL, NULL, NULL, 'student', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

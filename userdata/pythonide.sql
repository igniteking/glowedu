-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 12:28 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_topic` text NOT NULL,
  `course_category` text NOT NULL,
  `course_data` text NOT NULL,
  `youtube_link` text NOT NULL,
  `hints` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_topic`, `course_category`, `course_data`, `youtube_link`, `hints`, `answer`) VALUES
(1, '6.2 Function parameters', 'Python', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#x27;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.youtube.com/embed/tgbNymZ7vqY', 'An argument may be an expression, like 12.0, x, or x * 1.5', '# Program to check if a number is prime or not\r\n\r\nnum = 407\r\n\r\n# To take input from the user\r\n#num = int(input(\"Enter a number: \"))\r\n\r\n# prime numbers are greater than 1\r\nif num > 1:\r\n   # check for factors\r\n   for i in range(2,num):\r\n       if (num % i) == 0:\r\n           print(num,\"is not a prime number\")\r\n           print(i,\"times\",num//i,\"is\",num)\r\n           break\r\n   else:\r\n       print(num,\"is a prime number\")\r\n       \r\n# if input number is less than\r\n# or equal to 1, it is not prime\r\nelse:\r\n   print(num,\"is not a prime number\")\r\n'),
(2, '6.3 Function parameters', 'Python', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#x27;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#x27;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'https://www.youtube.com/embed/tgbNymZ7vqY', 'An argument may be an expression, like 12.0, x, or x * 1.5', 'hello'),
(3, '6.4 Function parameters', 'Python', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'https://www.youtube.com/embed/tgbNymZ7vqY', 'An argument may be an expression, like 12.0, x, or x * 1.5', 'print(\"Hello, World!\")\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `match_id`
--

CREATE TABLE `match_id` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_id`
--

INSERT INTO `match_id` (`id`, `student_id`, `course_id`, `date`) VALUES
(5, '1', '2', '');

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
  `date` datetime NOT NULL,
  `active` varchar(10) NOT NULL,
  `token_key` varchar(255) NOT NULL,
  `state` text NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `education` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `additional` varchar(255) NOT NULL,
  `profile_pic` varchar(120) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`, `bio`, `date`, `active`, `token_key`, `state`, `postalcode`, `education`, `country`, `additional`, `profile_pic`, `user_type`) VALUES
(1, 'Zaidan Khan', 'zaidan@zaidan.com', '9829167794', '$2y$10$A4V96Xndn/HFF/V1MGTP2estWq5qTgN9HzZxJbFF4fbFtIzcXwB2u', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2021-05-08 00:00:00', '', '823426bd2761a067f274bb2d8218f904', 'Rajasthan', '302002', 'graduatee', 'India', '', 'DAqZ3NFaoRlSgYO/image_2021-01-04_19-04-41.png', 'student'),
(2, 'admin', 'admin@admin.com', '0000000000', '$2y$10$nFoDFE0Y5GEZB87jryD7eO2ZTeNDwFjodXRi/r7dc3V2fOJ5hfG3C', '', '2021-05-08 00:00:00', '', '2b3b2613b443454cdd8c651c4f20c388', '', '', '', '', '', '', 'admin'),
(6, 'IGNITEKING', 'hol1957@gmail.com', '9829167794', '$2y$10$T8AGXoFDgD8HYZpBm8TR7egmim9hFZdSllajHschIKpfmV1nO2oUm', '', '2021-05-16 00:00:00', '', 'ad775950b7625ebc2f1c8ec7651af246', '', '', '', '', '', '07OjsAX49ZSRE65/rzUEPod.jpg', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_id`
--
ALTER TABLE `match_id`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `match_id`
--
ALTER TABLE `match_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

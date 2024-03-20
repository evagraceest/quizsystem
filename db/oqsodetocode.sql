-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 03:05 PM
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
-- Database: `oqsodetocode`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admins`
--

CREATE TABLE `tb_admins` (
  `admin_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admins`
--

INSERT INTO `tb_admins` (`admin_user`, `username`, `password`) VALUES
(1, 'evs_admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tb_choices`
--

CREATE TABLE `tb_choices` (
  `choices_id` int(11) NOT NULL,
  `choice` varchar(60) NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_right` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_choices`
--

INSERT INTO `tb_choices` (`choices_id`, `choice`, `question_id`, `is_right`) VALUES
(21, 'Preprocessed Hypertext Page', 18, 1),
(22, 'Hypertext Markup Language', 18, 0),
(23, 'PHP: Hypertext Preprocessor', 18, 0),
(24, 'Hypertext Transfer Protocol', 18, 0),
(25, 'Willam Makepiece', 19, 0),
(26, 'Drek Kolkevi', 19, 0),
(27, 'List Barely', 19, 0),
(28, 'Rasmus Lerdorf', 19, 1),
(29, '.html\r\n', 20, 0),
(30, '.ph', 20, 0),
(31, '.php', 20, 1),
(32, '.xml', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quest`
--

CREATE TABLE `tb_quest` (
  `question_id` int(11) NOT NULL,
  `questions` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_quest`
--

INSERT INTO `tb_quest` (`question_id`, `questions`) VALUES
(1, 'What does PHP stand for?'),
(2, 'Who is the father of PHP?'),
(5, 'Which of the following is used to access session variables in PHP?'),
(6, 'Which of the looping statements is/are supported by PHP?'),
(7, 'Which of the following PHP statements will output Hello World on the screen?'),
(8, 'Which one of the following functions can be used to concatenate array elements to form a single delimited string?'),
(9, 'Which of the methods are used to manage result sets using both associative and indexed arrays?'),
(10, 'Which of the following is not PHP loops?'),
(11, 'Which one of the following statements is used to create a table?'),
(12, 'AVG, COUNT, MAX, MIN and SUM are known as what?'),
(13, 'Which of these groups are in the six common operators?'),
(14, 'Which of the following is true about a group function?'),
(15, 'Which of the following is not true about removing rows from a table?'),
(16, 'Which of the following query would display all the students with honours_subject ‘IntegProg1’?'),
(17, 'Which of the following is not true about a subquery?'),
(18, 'Which of the following code will successfully delete the table LOCATIONS from the database?'),
(19, 'Which statement is used for allocating system privileges to the users?'),
(20, 'Which one of the following sorts rows in SQL?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`question_id`, `quiz_id`, `question`) VALUES
(18, 1, 'What does PHP stand for?'),
(19, 1, 'Who is the father of PHP?'),
(20, 1, 'PHP files have a default file extension of?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quiz`
--

CREATE TABLE `tb_quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `points` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_quiz`
--

INSERT INTO `tb_quiz` (`quiz_id`, `quiz_name`, `points`) VALUES
(1, 'PHP', 2),
(3, 'Try', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(3) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `section` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `lastName`, `firstName`, `middleName`, `course`, `year_level`, `subject`, `section`, `email`, `contact`, `username`, `password`) VALUES
(4, 'Ragnvindr', 'Diluc', '', 'BSIT', '4', 'ITE ELECTIVE 2', '302', 'diluc@gmail.com', '09415541857', 'diluc_r', '123456'),
(5, 'Gunnhildr', 'Jean', '', 'BSIT-BA', '4', 'INFORMATION SECURITY', '303', 'jean@gmail.com', '09125825672', 'jean.jean', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admins`
--
ALTER TABLE `tb_admins`
  ADD PRIMARY KEY (`admin_user`);

--
-- Indexes for table `tb_choices`
--
ALTER TABLE `tb_choices`
  ADD PRIMARY KEY (`choices_id`);

--
-- Indexes for table `tb_quest`
--
ALTER TABLE `tb_quest`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admins`
--
ALTER TABLE `tb_admins`
  MODIFY `admin_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_choices`
--
ALTER TABLE `tb_choices`
  MODIFY `choices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_quest`
--
ALTER TABLE `tb_quest`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

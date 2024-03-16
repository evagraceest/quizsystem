-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 02:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `tbodetocodeques`
--

CREATE TABLE `tbodetocodeques` (
  `QuesId` int(1) NOT NULL,
  `Questions` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbodetocodeques`
--

INSERT INTO `tbodetocodeques` (`QuesId`, `Questions`) VALUES
(1, 'What does PHP stand for?'),
(2, 'Who is the father of PHP?'),
(4, 'Which of the following is the syntax of comment in PHP??'),
(5, 'Which of the following is used to access session variables in PHP??'),
(6, 'Which of the looping statements is/are supported by PHP?'),
(7, 'Which of the following PHP statements will output Hello World on the screen??'),
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
-- Table structure for table `tbodetocode_admins`
--

CREATE TABLE `tbodetocode_admins` (
  `admin_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbodetocode_admins`
--

INSERT INTO `tbodetocode_admins` (`admin_user`, `username`, `password`) VALUES
(1, 'evs_admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbodetocode_users`
--

CREATE TABLE `tbodetocode_users` (
  `user_id` int(3) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `section` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbodetocode_users`
--

INSERT INTO `tbodetocode_users` (`user_id`, `lastName`, `firstName`, `middleName`, `course`, `year_level`, `subject`, `section`, `address`, `contact`, `username`, `password`) VALUES
(1, 'Estrera', 'Evalyn', 'Pacsial', 'BSIT', '3', 'ITE', '301', 'eva@gmail.com', '09423852856', 'eva', '123456'),
(2, 'Cl0res', 'Jasmin', 'Alcaraz', 'BSIT', '3', 'PRESENTATION SKILLS FOR IT', '301', 'jasmin@gmail.com', '09412368525', 'jasmin', '12345'),
(3, 'Babas', 'Kim', 'Maghacot', 'BSCpE', '5', 'TECHNICAL WRITING FOR IT', '303', 'kimbabas@gmail.com', '09854265265', 'kim.babas', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbodetocodeques`
--
ALTER TABLE `tbodetocodeques`
  ADD PRIMARY KEY (`QuesId`);

--
-- Indexes for table `tbodetocode_admins`
--
ALTER TABLE `tbodetocode_admins`
  ADD PRIMARY KEY (`admin_user`);

--
-- Indexes for table `tbodetocode_users`
--
ALTER TABLE `tbodetocode_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbodetocodeques`
--
ALTER TABLE `tbodetocodeques`
  MODIFY `QuesId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbodetocode_admins`
--
ALTER TABLE `tbodetocode_admins`
  MODIFY `admin_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbodetocode_users`
--
ALTER TABLE `tbodetocode_users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2021 at 06:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s.no` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `section` char(1) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s.no`, `first_name`, `last_name`, `section`, `bio`, `dob`, `city`, `state`, `country`, `pincode`, `year`) VALUES
(1, 'Ankur', 'maorya', 'A', 'this is some bio about the studnet', 1493, 'mohali', 'punjab', 'india', 16004, 2010),
(2, 'ajit', 'dubey', 'B', 'this is some bio about the student', 1654, 'chandigarh0', 'punjab', 'india', 46523, 2011),
(3, 'Deepak', 'Dubey', 'c', 'this is some bio about the student', 1527, 'jhanjeri', 'Haryana', 'india', 145652, 2013),
(4, 'Om', 'prakash', 'c', 'this is some bio about the student', 1527, 'jhanjeri', 'Haryana', 'india', 145652, 2014),
(6, 'Deepak', 'Dubey', 'c', 'this is some bio about the student', 1527, 'jhanjeri', 'Haryana', 'india', 145652, 2016),
(7, 'Hello', NULL, NULL, NULL, NULL, NULL, NULL, 'india', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'id is ai here ',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bio` text DEFAULT 'my bio is definded',
  `created_on` date DEFAULT current_timestamp(),
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `phno` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `dob`, `bio`, `created_on`, `city`, `state`, `country`, `pincode`, `phno`, `year`) VALUES
(1, 'Wartiz', 'Technology', NULL, 'provide best services in the world.', '2021-11-10', 'Mohali', '0', 'india', 46466, 0, 2011),
(4, 'host', 'local', '1566-12-16', 'here is some bio about the user', '2021-11-10', 'pune', 'maharashtra', 'india', 46466, 0, 2012),
(6, 'narendra', 'modi', '2000-01-14', 'this is some bio about the narendra', '2021-11-10', 'soorat', 'gujrat', 'india', 46466, 0, 2013),
(7, 'maha', 'bharta', '4546-10-25', 'this is some bio about the mahabarta', '2021-11-10', 'kurukshetra', 'haryana', 'india', 152348, 44565, 0),
(8, 'deepak', 'dubey', '1992-10-26', 'this is some bio about the users', '2021-11-10', 'bandra', 'goa', 'india', 160025, 987654321, 2016),
(9, 'Akshey', NULL, NULL, 'my bio is definded', '2021-11-11', NULL, NULL, 'india', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id is ai here ', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 07:55 AM
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
-- Database: `blog-post`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `user_profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `name`, `email`, `password`, `dob`, `gender`, `user_profile`) VALUES
(1, 'john doe11', 'thisisemail@in.com', '123', '2021-11-09', 'Choose', ''),
(2, 'hello', 'enmail@gmail.com', '321', '2021-11-03', 'female', ''),
(3, 'tim', 'john@132.com', '987', '2021-11-09', 'male', ''),
(4, 'motu_Paltu', 'ppp@in.com', 'ppp', '1985-12-02', 'Male', 'upload/rock600x400.jpg'),
(5, 'dummy user', 'demo@gmail.com', '456', '2021-11-08', 'male', ''),
(6, 'dummy', 'dumm@yahoo.com', 'dumm', '2021-11-16', 'female', ''),
(7, 'dummyOne', 'dummyone@gmail.com', '555', '2021-11-05', 'female', ''),
(8, 'testone', 'test@gmail.com', '666', '2021-11-15', 'male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2021 at 08:22 AM
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
-- Database: `datawarehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `confirm_password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `phn` bigint(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `confirm_password`, `role`, `phn`, `address`, `country`, `img`) VALUES
(28, 'hello', 'world', 'newuser@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'user', NULL, NULL, NULL, NULL),
(29, 'demo', 'userthree', 'demothree@yahoo.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'user', NULL, NULL, NULL, NULL),
(30, 'newDummy', 'USer', 'dummyemail@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'user', NULL, NULL, NULL, NULL),
(31, 'user', 'one', 'userone@gmail.com', '8e037717c4f38f013faae706eab4fdc9', '8e037717c4f38f013faae706eab4fdc9', 'user', NULL, NULL, NULL, NULL),
(32, 'user', 'two', 'usertwo@gmail.com', '8e037717c4f38f013faae706eab4fdc9', '8e037717c4f38f013faae706eab4fdc9', 'user', NULL, NULL, NULL, NULL),
(33, 'user', 'three', 'userthree@gmail.com', '8e037717c4f38f013faae706eab4fdc9', '8e037717c4f38f013faae706eab4fdc9', 'user', NULL, NULL, NULL, NULL),
(34, 'admin', 'one', 'adminone@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'admin', 9999999999, 'Karnatka', 'INDIA', 'images/pexels-photo-3411134.jpeg'),
(35, 'admin', 'two', 'admintwo@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'admin', NULL, NULL, NULL, NULL),
(36, 'admin', 'three', 'adminthree@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'admin', 789854622, 'karnatka', 'INDIA', 'images/pexels-photo-3411134.jpeg'),
(37, 'dummy', 'one', 'adminone11@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'user', 888888889, 'karnatka', 'INDIA', 'images/remy_loz-3S0INpfREQc-unsplash.jpg'),
(38, 'Dummy', 'Two', 'dummyTwo22@gmail.com', 'e22753f62154c9a7e15096cacc193e32', 'e22753f62154c9a7e15096cacc193e32', 'user', 7894561230, 'karnatka', 'INDIA', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

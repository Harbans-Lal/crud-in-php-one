-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2021 at 08:23 AM
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
-- Table structure for table `prod_img`
--

CREATE TABLE `prod_img` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_img`
--

INSERT INTO `prod_img` (`id`, `ref_id`, `img`) VALUES
(2, 44, 'images/pexels-photo-3411134.jpeg'),
(3, 44, 'images/okay.jpeg'),
(4, 44, 'images/mario-luigi-yoschi-figures-163036.jpeg'),
(12, 46, 'images/remy_loz-3S0INpfREQc-unsplash.jpg'),
(13, 46, 'images/pexels-photo-3411134.jpeg'),
(14, 46, 'images/pexels-photo-264905.webp'),
(15, 46, 'images/okay.jpeg'),
(16, 14, 'images/remy_loz-3S0INpfREQc-unsplash.jpg'),
(17, 14, 'images/pexels-photo-3411134.jpeg'),
(18, 14, 'images/pexels-photo-264905.webp'),
(19, 14, 'images/okay.jpeg'),
(32, 49, 'images/html1.jpega'),
(33, 49, 'images/html.jpeg'),
(34, 49, 'images/edvin-johansson-rlwE8f8anOc-unsplash.jpg'),
(35, 14, 'images/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prod_img`
--
ALTER TABLE `prod_img`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prod_img`
--
ALTER TABLE `prod_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

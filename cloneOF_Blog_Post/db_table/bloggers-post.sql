-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2021 at 08:03 AM
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
-- Table structure for table `bloggers-post`
--

CREATE TABLE `bloggers-post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `mess` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_attatch` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloggers-post`
--

INSERT INTO `bloggers-post` (`id`, `title`, `mess`, `user_id`, `user_attatch`) VALUES
(1, 'The Hills', 'A hill is a landform that extends above the surrounding terrain. It often has a distinct summit.', NULL, '0'),
(2, 'Nature', 'Nature, in the broadest sense, is the natural, physical, material world or universe. \"Nature\" can refer to the phenomena of the physical world, and also to life in general. The study of nature is a large, if not the only, part of science', NULL, '0'),
(4, 'programming languages', 'A programming language is a formal language comprising a set of strings that produce various kinds of machine code output. ', 4, '0'),
(5, 'second title', 'adn this is my second post on sdfahkjdlhfk  dfkaj', 4, '0'),
(10, 'glasss', 'Glass is a non-crystalline, often transparent amorphous solid, that has widespread practical, technologica', 4, '0'),
(19, 'Metacharacters', 'Metacharacter 	Description\r\n| 	Find a match for any one of the patterns separated by | as in: cat|dog|fish\r\n. 	Find just one instance of any character\r\n^ 	Finds a match as the beginning of a string as in: ^Hello\r\n$ 	Finds a match at the end of the string as in: World$\r\nd 	Find a digit\r\ns 	Find a whitespace character\r\n 	Find a match at the beginning of a word like this: WORD, or at the end of a word like this: WORD\r\nuxxxx 	Find the Unicode character specified by the hexadecimal number xxxx', 1, '0'),
(20, 'Quantifiers', 'n+ 	Matches any string that contains at least one n\r\nn* 	Matches any string that contains zero or more occurrences of n\r\nn? 	Matches any string that contains zero or one occurrences of n', 1, '0'),
(21, 'hello', 'this is world!!.', 6, '0'),
(22, 'world', 'this is somthing about the world !!.....', 7, '0'),
(24, 'hello', 'ehdkehfjc...........', 8, '0'),
(25, 'nature', 'Nature, in the broadest sense, is the natural, physical, material world or universe. \"Nature\" can refer to the phenomena of the physical world, and also to life in general.', 1, '0'),
(28, 'jQuery Syntax', '\r\n    A $ sign to define/access jQuery\r\n    A (selector) to \"query (or find)\" HTML elements\r\n    A jQuery action() to be performed on the element(s)\r\n', 1, '0'),
(29, 'PHP basename() ', 'Return filename from the specified path:', 4, '0'),
(40, 'Hash', 'this is about hash...', 4, 'download_file/hash.pdf'),
(41, 'hello', 'this is hello.txt....', 4, 'download_file/hello.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloggers-post`
--
ALTER TABLE `bloggers-post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloggers-post`
--
ALTER TABLE `bloggers-post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

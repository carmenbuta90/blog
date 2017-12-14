-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 10:29 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phploversblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'News'),
(2, 'Events'),
(3, 'Tutorials'),
(4, 'Misc'),
(5, 'ccccc');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `tags`, `date`) VALUES
(1, 3, 'International PHP Conference 2016 new', '            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nisl diam, volutpat eu auctor in, venenatis in justo. Donec dui erat, finibus nec arcu in, varius venenatis nulla. Nulla aliquam imperdiet mollis. Curabitur fringilla justo in diam imperdiet, non condimentum mi mattis. Duis at venenatis arcu. Sed vel tincidunt est. Integer bibendum libero ut vulputate facilisis. Pellentesque malesuada a tortor et euismod. Cras tincidunt sollicitudin posuere. Sed fringilla orci quam, vel mollis ligula lobortis eget.</p>\r\n            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nisl diam, volutpat eu auctor in, venenatis in justo. Donec dui erat, finibus nec arcu in, varius venenatis nulla. Nulla aliquam imperdiet mollis. Curabitur fringilla justo in diam imperdiet, non condimentum mi mattis. Duis at venenatis arcu. Sed vel tincidunt est. Integer bibendum libero ut vulputate facilisis. Pellentesque malesuada a tortor et euismod. Cras tincidunt sollicitudin posuere. Sed fringilla orci quam, vel mollis ligula lobortis eget.</p>\r\n', 'Brad', 'php news, php events', '2016-06-24 09:04:32'),
(2, 1, 'PHP 7.0.1. beta release', '            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nisl diam, volutpat eu auctor in, venenatis in justo. Donec dui erat, finibus nec arcu in, varius venenatis nulla. Nulla aliquam imperdiet mollis. Curabitur fringilla justo in diam imperdiet, non condimentum mi mattis. Duis at venenatis arcu. Sed vel tincidunt est. Integer bibendum libero ut vulputate facilisis. Pellentesque malesuada a tortor et euismod. Cras tincidunt sollicitudin posuere. Sed fringilla orci quam, vel mollis ligula lobortis eget.</p>\r\n            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nisl diam, volutpat eu auctor in, venenatis in justo. Donec dui erat, finibus nec arcu in, varius venenatis nulla. Nulla aliquam imperdiet mollis. Curabitur fringilla justo in diam imperdiet, non condimentum mi mattis. Duis at venenatis arcu. Sed vel tincidunt est. Integer bibendum libero ut vulputate facilisis. Pellentesque malesuada a tortor et euismod. Cras tincidunt sollicitudin posuere. Sed fringilla orci quam, vel mollis ligula lobortis eget.</p>\r\n', 'Mike', 'php release', '2016-06-24 09:04:32'),
(6, 4, 'post nou 222', 'test', 'eu', 'cvva', '2016-06-30 13:39:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

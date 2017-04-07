-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 06:03 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kn_buoumau_2017`
--

-- --------------------------------------------------------

--
-- Table structure for table `slideshows_categories`
--

DROP TABLE IF EXISTS `slideshows_categories`;
CREATE TABLE `slideshows_categories` (
  `slideshow_category_id` int(11) NOT NULL,
  `slideshow_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshows_categories`
--

INSERT INTO `slideshows_categories` (`slideshow_category_id`, `slideshow_category_name`) VALUES
(1, 'Slideshow sample for testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slideshows_categories`
--
ALTER TABLE `slideshows_categories`
  ADD PRIMARY KEY (`slideshow_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slideshows_categories`
--
ALTER TABLE `slideshows_categories`
  MODIFY `slideshow_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

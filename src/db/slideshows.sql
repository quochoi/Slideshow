-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 06:02 AM
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
-- Table structure for table `slideshows`
--

DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE `slideshows` (
  `slideshow_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `slideshow_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slideshow_overview` text COLLATE utf8_unicode_ci,
  `slideshow_description` text COLLATE utf8_unicode_ci,
  `slideshow_image_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slideshow_image_dir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slideshow_images` text COLLATE utf8_unicode_ci,
  `slideshow_status` tinyint(4) DEFAULT NULL,
  `slideshow_created_at` int(11) DEFAULT NULL,
  `slideshow_updated_at` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`slideshow_id`, `user_id`, `category_id`, `slideshow_name`, `slideshow_overview`, `slideshow_description`, `slideshow_image_name`, `slideshow_image_dir`, `slideshow_images`, `slideshow_status`, `slideshow_created_at`, `slideshow_updated_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Slideshow sample for testing', '<p>Slideshow sample for testing</p>', '<p>Slideshow sample for testing</p>', '170223-742x647-doll-child-58d094ae92503.jpg', 'photos/slideshows/sample', '[{"full_path":"http:\\/\\/buoumau.local.com\\/photos\\/slideshows\\/sample\\/children-protection-58d094be0f468.jpg","sub_path":"photos\\/slideshows\\/sample","name":"children-protection-58d094be0f468.jpg","info":"B\\u01b0\\u1edbu m\\u00e1u tr\\u1ebb em"},{"full_path":"http:\\/\\/buoumau.local.com\\/photos\\/slideshows\\/sample\\/Children-with-Planters-58d094c3758ea.jpg","sub_path":"photos\\/slideshows\\/sample","name":"Children-with-Planters-58d094c3758ea.jpg","info":"B\\u01b0\\u1edbu m\\u00e1u tr\\u1ebb em"},{"full_path":"http:\\/\\/buoumau.local.com\\/photos\\/slideshows\\/sample\\/7561230-Retrato-de-chicos-lindos-juntos-de-dibujo-en-el-entorno-natural--Foto-de-archivo-58d094b8c9b7e.jpg","sub_path":"photos\\/slideshows\\/sample","name":"7561230-Retrato-de-chicos-lindos-juntos-de-dibujo-en-el-entorno-natural--Foto-de-archivo-58d094b8c9b7e.jpg","info":"B\\u01b0\\u1edbu m\\u00e1u tr\\u1ebb em"},{"full_path":"http:\\/\\/buoumau.local.com\\/photos\\/slideshows\\/sample\\/124351-849x565-Natural-environment-58d094b3870ac.jpg","sub_path":"photos\\/slideshows\\/sample","name":"124351-849x565-Natural-environment-58d094b3870ac.jpg","info":"B\\u01b0\\u1edbu m\\u00e1u tr\\u1ebb em"}]', NULL, NULL, 1490162429, NULL, '2017-03-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`slideshow_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `slideshow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

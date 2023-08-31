-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 10:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprout`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_rate`
--

CREATE TABLE `comment_rate` (
  `comment_rate_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `rating` varchar(25) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaints_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `complaints_details` int(11) NOT NULL,
  `complaints_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `message_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `message_from` varchar(50) NOT NULL,
  `message_to` varchar(50) NOT NULL,
  `message_details` text NOT NULL,
  `message_photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `plant_genus_name` varchar(50) NOT NULL,
  `plant_type_id` int(11) NOT NULL,
  `plant_information` text NOT NULL,
  `plant_image` blob NOT NULL,
  `plant_soil_recco` text NOT NULL,
  `plant_water_recco` text NOT NULL,
  `plant_sunlight_recco` text NOT NULL,
  `plant_care_tips` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plant_encyclopedia`
--

CREATE TABLE `plant_encyclopedia` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `plant_image` blob NOT NULL,
  `plant_genus_name` varchar(50) NOT NULL,
  `common_name` varchar(50) NOT NULL,
  `plant_type` varchar(50) NOT NULL,
  `light` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `width` varchar(50) NOT NULL,
  `flower_color` varchar(50) NOT NULL,
  `foliage_color` varchar(50) NOT NULL,
  `season_ft` varchar(50) NOT NULL,
  `special_ft` varchar(50) NOT NULL,
  `zones` varchar(25) NOT NULL,
  `propagation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plant_sale`
--

CREATE TABLE `plant_sale` (
  `plant_sale_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plant_type`
--

CREATE TABLE `plant_type` (
  `plant_type_id` int(11) NOT NULL,
  `plant_type` varchar(50) NOT NULL,
  `plant_type_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_information`
--

CREATE TABLE `post_information` (
  `post_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `post_description` text NOT NULL,
  `post_image` blob NOT NULL,
  `votes` int(11) NOT NULL,
  `post_notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `account_lastname` varchar(50) NOT NULL,
  `account_firstname` varchar(50) NOT NULL,
  `account_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `account_address` varchar(100) DEFAULT NULL,
  `account_mobile` varchar(13) DEFAULT NULL,
  `account_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `account_subscribed` tinyint(1) NOT NULL,
  `account_image` blob DEFAULT NULL,
  `account_status` varchar(1) NOT NULL,
  `account_fav_plantcare_id` int(11) DEFAULT NULL,
  `account_fav_plantsale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `account_lastname`, `account_firstname`, `account_email`, `account_address`, `account_mobile`, `account_password`, `account_subscribed`, `account_image`, `account_status`, `account_fav_plantcare_id`, `account_fav_plantsale_id`) VALUES
(1, 'Messi', 'Lionel', 'leomessi@gmail.com', 'Somewhere in Argentina, 2012', '+123432198', 'thegoat123', 1, NULL, 'A', NULL, NULL),
(2, 'Ronaldo', 'Cristiano', 'cronaldo@gmail.com', NULL, NULL, 'ronaldo123', 0, NULL, 'A', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment_rate`
--
ALTER TABLE `comment_rate`
  ADD PRIMARY KEY (`comment_rate_id`),
  ADD KEY `post_id` (`post_id`,`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaints_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `plant_type_id` (`plant_type_id`);

--
-- Indexes for table `plant_encyclopedia`
--
ALTER TABLE `plant_encyclopedia`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `plant_sale`
--
ALTER TABLE `plant_sale`
  ADD PRIMARY KEY (`plant_sale_id`),
  ADD KEY `account_id` (`account_id`,`plant_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `plant_type`
--
ALTER TABLE `plant_type`
  ADD PRIMARY KEY (`plant_type_id`);

--
-- Indexes for table `post_information`
--
ALTER TABLE `post_information`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_rate`
--
ALTER TABLE `comment_rate`
  ADD CONSTRAINT `comment_rate_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`),
  ADD CONSTRAINT `comment_rate_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`);

--
-- Constraints for table `messaging`
--
ALTER TABLE `messaging`
  ADD CONSTRAINT `messaging_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`plant_type_id`) REFERENCES `plant_type` (`plant_type_id`);

--
-- Constraints for table `plant_sale`
--
ALTER TABLE `plant_sale`
  ADD CONSTRAINT `plant_sale_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `plant_sale_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`);

--
-- Constraints for table `post_information`
--
ALTER TABLE `post_information`
  ADD CONSTRAINT `post_information_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

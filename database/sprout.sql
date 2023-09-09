-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 11:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_rate`
--

CREATE TABLE `comment_rate` (
  `comment_rate_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `rating` varchar(25) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaints_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `complaints_details` int(11) DEFAULT NULL,
  `complaints_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `message_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `message_from` varchar(50) DEFAULT NULL,
  `message_to` varchar(50) DEFAULT NULL,
  `message_details` text DEFAULT NULL,
  `message_photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(50) DEFAULT NULL,
  `plant_genus_name` varchar(50) DEFAULT NULL,
  `plant_type_id` int(11) DEFAULT NULL,
  `plant_information` text DEFAULT NULL,
  `plant_image` blob DEFAULT NULL,
  `plant_soil_recco` text DEFAULT NULL,
  `plant_water_recco` text DEFAULT NULL,
  `plant_sunlight_recco` text DEFAULT NULL,
  `plant_care_tips` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant_sale`
--

CREATE TABLE `plant_sale` (
  `plant_sale_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant_type`
--

CREATE TABLE `plant_type` (
  `plant_type_id` int(11) NOT NULL,
  `plant_type` varchar(50) NOT NULL,
  `plant_type_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_information`
--

CREATE TABLE `post_information` (
  `post_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `post_image` blob DEFAULT NULL,
  `votes` int(11) DEFAULT NULL,
  `post_notification` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `account_status` varchar(1) DEFAULT NULL,
  `account_fav_plantcare_id` int(11) DEFAULT NULL,
  `account_fav_plantsale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `account_lastname`, `account_firstname`, `account_email`, `account_address`, `account_mobile`, `account_password`, `account_subscribed`, `account_image`, `account_status`, `account_fav_plantcare_id`, `account_fav_plantsale_id`) VALUES
(2, 'Ronaldo', 'Cristiano', 'cr7@gmail.com', NULL, NULL, '1234', 0, NULL, NULL, NULL, NULL),
(3, 'Ronaldo', 'Cristiano', 'cr7@gmail.com', NULL, NULL, '1234', 0, NULL, NULL, NULL, NULL),
(4, 'Messi', 'Lionel', 'leomessi@gmail.com', NULL, NULL, '1234', 0, NULL, NULL, NULL, NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_rate`
--
ALTER TABLE `comment_rate`
  MODIFY `comment_rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaints_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant_encyclopedia`
--
ALTER TABLE `plant_encyclopedia`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant_sale`
--
ALTER TABLE `plant_sale`
  MODIFY `plant_sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant_type`
--
ALTER TABLE `plant_type`
  MODIFY `plant_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_information`
--
ALTER TABLE `post_information`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_rate`
--
ALTER TABLE `comment_rate`
  ADD CONSTRAINT `comment_rate_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_rate_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messaging`
--
ALTER TABLE `messaging`
  ADD CONSTRAINT `messaging_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`plant_type_id`) REFERENCES `plant_type` (`plant_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_sale`
--
ALTER TABLE `plant_sale`
  ADD CONSTRAINT `plant_sale_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plant_sale_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_information`
--
ALTER TABLE `post_information`
  ADD CONSTRAINT `post_information_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

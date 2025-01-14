-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 01:57 PM
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
  `admin_display_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaints_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `complaints_details` text DEFAULT NULL,
  `complaints_image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

-- --------------------------------------------------------

--
-- Table structure for table `message_content`
--

CREATE TABLE `message_content` (
  `message_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `plant_sale_id` int(11) DEFAULT NULL,
  `id_to` int(11) DEFAULT NULL,
  `message_details` text DEFAULT NULL,
  `message_photo` mediumblob DEFAULT NULL,
  `message_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_content`
--
-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `message_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `plant_sale_id` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `message_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(50) DEFAULT NULL,
  `plant_genus_name` varchar(50) DEFAULT NULL,
  `plant_category` varchar(500) DEFAULT NULL,
  `plant_soil_recco` text DEFAULT NULL,
  `plant_water_recco` text DEFAULT NULL,
  `plant_sunlight_recco` text DEFAULT NULL,
  `plant_care_tips` text DEFAULT NULL,
  `plant_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant`
--


-- --------------------------------------------------------

--
-- Table structure for table `plant_discussion`
--

CREATE TABLE `plant_discussion` (
  `message_discussion_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_discussion`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_encyclopedia`
--

CREATE TABLE `plant_encyclopedia` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `plant_description` text NOT NULL,
  `plant_genus_name` varchar(50) NOT NULL,
  `common_name` varchar(50) NOT NULL,
  `plant_category` varchar(50) NOT NULL,
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

--
-- Dumping data for table `plant_encyclopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_encyc_discussion`
--

CREATE TABLE `plant_encyc_discussion` (
  `message_discussion_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant_encyc_images`
--

CREATE TABLE `plant_encyc_images` (
  `plant_id` int(11) NOT NULL,
  `plant_image` mediumblob DEFAULT NULL,
  `plant_video` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_encyc_images`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_images`
--

CREATE TABLE `plant_images` (
  `plant_id` int(11) NOT NULL,
  `plant_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_images`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_sale`
--

CREATE TABLE `plant_sale` (
  `plant_sale_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `plant_name` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `plant_description` longtext DEFAULT NULL,
  `plant_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_sale_images`
--

CREATE TABLE `plant_sale_images` (
  `plant_sale_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sale_image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_sale_images`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_sale_rating`
--

CREATE TABLE `plant_sale_rating` (
  `plant_sale_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sale_rating` int(5) DEFAULT 0,
  `sale_comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_sale_rating`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `image_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `post_image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_images`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_information`
--

CREATE TABLE `post_information` (
  `post_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_notification`
--

CREATE TABLE `post_notification` (
  `notification_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `notification_user` varchar(100) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `notification_description` varchar(100) NOT NULL,
  `viewed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `account_id` int(11) NOT NULL,
  `otp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `account_id` int(11) DEFAULT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `plant_sale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved`
--

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `plant_sale_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `sold_by` int(11) DEFAULT NULL,
  `date_sold` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `account_id` int(11) DEFAULT NULL,
  `subscription_status` varchar(1) DEFAULT NULL,
  `subscription_plan` varchar(2) DEFAULT NULL,
  `subscription_price` double DEFAULT NULL,
  `proof` mediumblob DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `date_approved` datetime DEFAULT NULL,
  `date_expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `account_lastname` varchar(50) NOT NULL,
  `account_firstname` varchar(50) NOT NULL,
  `account_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `account_address` varchar(200) DEFAULT NULL,
  `account_mobile` varchar(13) DEFAULT NULL,
  `account_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `account_image` mediumblob DEFAULT NULL,
  `account_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaints_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `message_content`
--
ALTER TABLE `message_content`
  ADD KEY `message_id` (`message_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `plant_sale_id` (`plant_sale_id`),
  ADD KEY `id_to` (`id_to`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `plant_sale_id` (`plant_sale_id`),
  ADD KEY `id_to` (`id_to`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `plant_discussion`
--
ALTER TABLE `plant_discussion`
  ADD PRIMARY KEY (`message_discussion_id`),
  ADD KEY `plant_id` (`plant_id`,`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `plant_encyclopedia`
--
ALTER TABLE `plant_encyclopedia`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `plant_encyc_discussion`
--
ALTER TABLE `plant_encyc_discussion`
  ADD PRIMARY KEY (`message_discussion_id`),
  ADD KEY `plant_id` (`plant_id`,`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `plant_encyc_images`
--
ALTER TABLE `plant_encyc_images`
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `plant_images`
--
ALTER TABLE `plant_images`
  ADD KEY `plant_type_id` (`plant_id`);

--
-- Indexes for table `plant_sale`
--
ALTER TABLE `plant_sale`
  ADD PRIMARY KEY (`plant_sale_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `plant_sale_images`
--
ALTER TABLE `plant_sale_images`
  ADD KEY `plant_sale_id` (`plant_sale_id`,`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `plant_sale_rating`
--
ALTER TABLE `plant_sale_rating`
  ADD KEY `plant_sale_id` (`plant_sale_id`,`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `account_id` (`account_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `post_information`
--
ALTER TABLE `post_information`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `post_notification`
--
ALTER TABLE `post_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `post_id` (`post_id`,`account_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD KEY `account_id` (`account_id`,`plant_id`,`plant_sale_id`),
  ADD KEY `plant_id` (`plant_id`),
  ADD KEY `plant_sale_id` (`plant_sale_id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD KEY `plant_sale_id` (`plant_sale_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_email` (`account_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaints_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `plant_discussion`
--
ALTER TABLE `plant_discussion`
  MODIFY `message_discussion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plant_encyclopedia`
--
ALTER TABLE `plant_encyclopedia`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `plant_encyc_discussion`
--
ALTER TABLE `plant_encyc_discussion`
  MODIFY `message_discussion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant_sale`
--
ALTER TABLE `plant_sale`
  MODIFY `plant_sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `post_information`
--
ALTER TABLE `post_information`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `post_notification`
--
ALTER TABLE `post_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_content`
--
ALTER TABLE `message_content`
  ADD CONSTRAINT `message_content_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messaging` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messaging`
--
ALTER TABLE `messaging`
  ADD CONSTRAINT `messaging_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messaging_ibfk_2` FOREIGN KEY (`plant_sale_id`) REFERENCES `plant_sale` (`plant_sale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messaging_ibfk_3` FOREIGN KEY (`id_to`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_discussion`
--
ALTER TABLE `plant_discussion`
  ADD CONSTRAINT `plant_discussion_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plant_discussion_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_encyc_discussion`
--
ALTER TABLE `plant_encyc_discussion`
  ADD CONSTRAINT `plant_encyc_discussion_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plant_encyc_discussion_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant_encyclopedia` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_encyc_images`
--
ALTER TABLE `plant_encyc_images`
  ADD CONSTRAINT `plant_encyc_images_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plant_encyclopedia` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_images`
--
ALTER TABLE `plant_images`
  ADD CONSTRAINT `plant_images_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_sale`
--
ALTER TABLE `plant_sale`
  ADD CONSTRAINT `plant_sale_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_sale_images`
--
ALTER TABLE `plant_sale_images`
  ADD CONSTRAINT `plant_sale_images_ibfk_1` FOREIGN KEY (`plant_sale_id`) REFERENCES `plant_sale` (`plant_sale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plant_sale_images_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_sale_rating`
--
ALTER TABLE `plant_sale_rating`
  ADD CONSTRAINT `plant_sale_rating_ibfk_1` FOREIGN KEY (`plant_sale_id`) REFERENCES `plant_sale` (`plant_sale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plant_sale_rating_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_images_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_information`
--
ALTER TABLE `post_information`
  ADD CONSTRAINT `post_information_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_notification`
--
ALTER TABLE `post_notification`
  ADD CONSTRAINT `post_notification_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_notification_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post_information` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_notification_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reset`
--
ALTER TABLE `reset`
  ADD CONSTRAINT `reset_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `saved_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_ibfk_3` FOREIGN KEY (`plant_sale_id`) REFERENCES `plant_sale` (`plant_sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`plant_sale_id`) REFERENCES `plant_sale` (`plant_sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

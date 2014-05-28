
-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 72.167.233.51
-- Generation Time: May 28, 2014 at 10:30 AM
-- Server version: 5.5.33
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goalsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `happy`
--

CREATE TABLE `happy` (
  `happy_id` int(8) NOT NULL AUTO_INCREMENT,
  `happy_author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `happy_score` int(10) NOT NULL,
  `happy_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`happy_id`),
  KEY `happy_author` (`happy_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `happy`
--

INSERT INTO `happy` VALUES(6, 'dstory', 70, '2014-04-25 09:50:44');
INSERT INTO `happy` VALUES(7, 'dstory', 90, '2014-04-28 06:50:03');
INSERT INTO `happy` VALUES(8, 'dstory', 70, '2014-04-29 06:43:24');
INSERT INTO `happy` VALUES(9, 'yoyo', 120, '2014-05-11 14:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'active',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `post_author` (`post_author`),
  KEY `post_title` (`post_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=653 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` VALUES(627, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 'active', '2014-04-25 09:42:29');
INSERT INTO `post` VALUES(628, 'Make sure the apartment is clean before going to bed.', 'dstory', 'active', '2014-04-25 09:42:57');
INSERT INTO `post` VALUES(630, 'Complete work quicker and of higher quality than others expect.', 'dstory', 'active', '2014-04-25 09:52:05');
INSERT INTO `post` VALUES(631, 'Do something to become a better developer.', 'dstory', 'active', '2014-04-25 09:53:38');
INSERT INTO `post` VALUES(632, 'Physical activity: biking, running, pushups, sit-ups, etc...', 'dstory', 'active', '2014-04-25 09:55:08');
INSERT INTO `post` VALUES(633, 'Do everything you can to make sure Monica is happy.', 'dstory', 'active', '2014-04-25 09:56:13');
INSERT INTO `post` VALUES(634, 'Make healthy eating choices.', 'dstory', 'active', '2014-04-25 09:58:58');
INSERT INTO `post` VALUES(636, 'Give Kira attention (walks, going out, playing, treats, etc...)', 'dstory', 'active', '2014-04-25 10:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(8) NOT NULL AUTO_INCREMENT,
  `rating_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `rating_author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rating_score` int(10) NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rating_id`),
  KEY `rating_author` (`rating_author`),
  KEY `rating_title` (`rating_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=684 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` VALUES(644, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 70, '2014-04-25 09:48:53');
INSERT INTO `rating` VALUES(645, 'Make sure the apartment is clean before going to bed.', 'dstory', 110, '2014-04-25 09:48:58');
INSERT INTO `rating` VALUES(646, 'Complete work quicker and of higher quality than others expect.', 'dstory', 100, '2014-04-25 09:52:13');
INSERT INTO `rating` VALUES(647, 'Do something to become a better developer.', 'dstory', 50, '2014-04-25 09:53:48');
INSERT INTO `rating` VALUES(648, 'Physical activity: biking, running, pushups, sit-ups, etc...', 'dstory', 0, '2014-04-25 09:55:20');
INSERT INTO `rating` VALUES(649, 'Do everything you can to make sure Monica is happy.', 'dstory', 90, '2014-04-25 09:56:23');
INSERT INTO `rating` VALUES(650, 'Make healthy eating choices.', 'dstory', 80, '2014-04-25 09:59:38');
INSERT INTO `rating` VALUES(651, 'Give Kira attention (walks, going out, playing, treats, etc...)', 'dstory', 80, '2014-04-25 10:19:59');
INSERT INTO `rating` VALUES(653, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 50, '2014-04-28 06:49:22');
INSERT INTO `rating` VALUES(654, 'Make sure the apartment is clean before going to bed.', 'dstory', 100, '2014-04-28 06:49:25');
INSERT INTO `rating` VALUES(655, 'Do something to become a better developer.', 'dstory', 90, '2014-04-28 06:49:34');
INSERT INTO `rating` VALUES(656, 'Physical activity: biking, running, pushups, sit-ups, etc...', 'dstory', 0, '2014-04-28 06:49:38');
INSERT INTO `rating` VALUES(657, 'Do everything you can to make sure Monica is happy.', 'dstory', 110, '2014-04-28 06:49:46');
INSERT INTO `rating` VALUES(658, 'Make healthy eating choices.', 'dstory', 60, '2014-04-28 06:49:53');
INSERT INTO `rating` VALUES(659, 'Give Kira attention (walks, going out, playing, treats, etc...)', 'dstory', 70, '2014-04-28 06:49:56');
INSERT INTO `rating` VALUES(660, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 110, '2014-04-29 06:42:44');
INSERT INTO `rating` VALUES(661, 'Make sure the apartment is clean before going to bed.', 'dstory', 110, '2014-04-29 06:42:49');
INSERT INTO `rating` VALUES(662, 'Complete work quicker and of higher quality than others expect.', 'dstory', 120, '2014-04-29 06:42:54');
INSERT INTO `rating` VALUES(663, 'Do something to become a better developer.', 'dstory', 100, '2014-04-29 06:43:02');
INSERT INTO `rating` VALUES(664, 'Physical activity: biking, running, pushups, sit-ups, etc...', 'dstory', 0, '2014-04-29 06:43:06');
INSERT INTO `rating` VALUES(665, 'Do everything you can to make sure Monica is happy.', 'dstory', 90, '2014-04-29 06:43:11');
INSERT INTO `rating` VALUES(666, 'Make healthy eating choices.', 'dstory', 80, '2014-04-29 06:43:16');
INSERT INTO `rating` VALUES(667, 'Give Kira attention (walks, going out, playing, treats, etc...)', 'dstory', 50, '2014-04-29 06:43:20');
INSERT INTO `rating` VALUES(670, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 90, '2014-05-01 15:15:18');
INSERT INTO `rating` VALUES(671, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 40, '2014-05-03 18:49:48');
INSERT INTO `rating` VALUES(672, 'Make sure the apartment is clean before going to bed.', 'dstory', 80, '2014-05-03 18:49:57');
INSERT INTO `rating` VALUES(673, 'Complete work quicker and of higher quality than others expect.', 'dstory', 90, '2014-05-03 18:50:16');
INSERT INTO `rating` VALUES(674, 'Do something to become a better developer.', 'dstory', 90, '2014-05-03 18:50:30');
INSERT INTO `rating` VALUES(680, 'Don\\''t spend money on something you aren\\''t going to benefit from.', 'dstory', 110, '2014-05-21 08:34:12');
INSERT INTO `rating` VALUES(681, 'Physical activity: biking, running, pushups, sit-ups, etc...', 'dstory', 110, '2014-05-21 08:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` int(8) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(166, 'dstory', '73650270474000a655543594c8aff698c451577d', 'dstory@nextepsystems.com', 2, '2013-12-01 12:42:53');
INSERT INTO `users` VALUES(201, 'yoyo', 'c41975d1dae1cc69b16ad8892b8c77164e84ca39', 'yo', 0, '2013-12-19 00:03:46');
INSERT INTO `users` VALUES(202, 'mmodi2', '00f5e879ad900a96862ccbabc3ca7ebefc2808d1', 'mmodi2@gmail.com', 0, '2014-04-17 12:44:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `happy`
--
ALTER TABLE `happy`
  ADD CONSTRAINT `happy_ibfk_1` FOREIGN KEY (`happy_author`) REFERENCES `users` (`user_name`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`post_author`) REFERENCES `users` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`rating_author`) REFERENCES `users` (`user_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`rating_title`) REFERENCES `post` (`post_title`) ON DELETE CASCADE;

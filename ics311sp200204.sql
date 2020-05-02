-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 02:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics311sp200204`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `content`, `created_date`) VALUES
(1, 1, 'Just a comment from another site!', '2020-04-29 21:06:26'),
(2, 1, 'This is another cool comment!', '2020-04-29 22:37:04'),
(3, 1, 'You cannot insert comments because there is another dedicated site for inserting comments!', '2020-04-30 03:15:49'),
(4, 1, 'I have pre-populated comments for accounts that do not exist yet so you can test the site!', '2020-04-30 03:20:06'),
(5, 1, 'Please understand! :)', '2020-04-30 03:20:06'),
(6, 2, 'Why are you doing this? 2+2 = 4 not 5!', '2020-04-30 03:20:06'),
(7, 2, 'This is just great... Could I just have some pizza?', '2020-04-30 03:20:07'),
(8, 2, 'Why would you eat sausage when you can have pizza pockets?', '2020-04-30 03:20:07'),
(9, 2, 'Strange? Why would you want sausage with tomatoes?', '2020-04-30 03:20:07'),
(10, 3, 'Sausage is yummy! Especially with tomatoes!', '2020-04-30 03:20:07'),
(11, 4, 'This is just great... Could I just have some pizza?', '2020-04-30 03:20:07'),
(12, 5, 'This is a comment from user 5 that will exist someday! This is to simulate comments from the other site!', '2020-04-30 03:20:07'),
(13, 1, 'Just create 1-4 accounts and more comments will appear!', '2020-04-30 03:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `last_log_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `pass`, `email`, `admin`, `last_log_in`, `active`, `notes`) VALUES
(1, 'John', 'Doe', '$2y$10$uffWzRumEIUuT38BnboKmuFfZaMnRJNj.B8xthflJork1WGByTWnC', 'someone@example.com', 1, '2020-04-29 20:40:14', 1, 'I am a pretty cool person. I do not like meatballs for some reason.'),
(6, 'Example', 'User', '$2y$10$GmNqVwrmtoTbVb9brtFx3OCIYMs1MjFZ7flz7.qpeBRDh07WBLt26', 'student@example.com', 0, '0000-00-00 00:00:00', 1, 'This account cannot login to this site! It is a standard account.'),
(7, 'Disabled', 'User', '$2y$10$HCa.u9rRPCoVxQPy5NYSBeK4Kpqf3XhaxqYdyb5GzrihmXkheMN62', 'disabled@example.com', 1, '0000-00-00 00:00:00', 0, 'This is a disabled user! It cannot login either.'),
(8, 'Emergency', 'Account', '$2y$10$WFXVUzC5hdYNYKOk8iNWTOG0jTeP4DDcoC7cK4HNUH0qdc.M7T5UO', 'someone@example.net', 1, '0000-00-00 00:00:00', 1, 'Same password, use this if you get locked out!'),
(9, 'Emergency', 'Account', '$2y$10$urfq2.8uLiuOFNbLe5U7Pu54y3EtIufUXE3.vPb3SBcPVq4Ndy77G', 'someone@example.org', 1, '0000-00-00 00:00:00', 1, 'Use this if you get locked out. It has the same password.'),
(10, 'Emergency', 'Account', '$2y$10$cOzdcFWZtYxB6gCBVU6fKeHJ7mfa.CS9riZi.A9FXJIM3BNRKeXyG', 'someone@example.me', 1, '0000-00-00 00:00:00', 1, 'Use this if you get locked out. It has the same password. .com .net .org and .me are your choices if you disable an admin account.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

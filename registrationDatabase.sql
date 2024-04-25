-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 07:12 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbname`
--
CREATE DATABASE IF NOT EXISTS `dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dbname`;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `id` int(6) UNSIGNED NOT NULL,
  `studentID` varchar(8) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `project` varchar(60) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `slot` varchar(60) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`id`, `studentID`, `firstName`, `lastName`, `project`, `email`, `phone`, `slot`, `reg_date`) VALUES
(1, '12345678', 'John', 'Doe', 'Website', 'jd@gmail.com', '123-456-7890', '5/4/2024, 7:00 PM - 8:00 PM', '2024-04-21 18:13:44'),
(2, '11111111', 'Bugs', 'Bunny', 'Looney Tunes', 'LT@gmail.com', '111-111-1111', '5/3/2024, 7:00 PM - 8:00 PM', '2024-04-20 19:19:08'),
(3, '23456789', 'Tim', 'Jones', 'Novel Time', 'timj@gmail.com', '234-567-8901', '5/4/2024, 6:00 PM - 7:00 PM', '2024-04-19 16:19:49'),
(4, '34567890', 'Johnny', 'Smith', 'Evergreen', 'js@gmail.com', '345-678-9012', '5/4/2024, 6:00 PM - 7:00 PM', '2024-04-19 16:59:08'),
(5, '22222222', 'Tom', 'Jerry', 'Tom &amp; Jerry', 'TJ@gmail.com', '222-222-2222', '5/3/2024, 7:00 PM - 8:00 PM', '2024-04-21 18:53:20'),
(6, '33333333', 'Henry', 'Clark', 'Novel Time', 'henc@yahoo.com', '333-333-3333', '5/4/2024, 6:00 PM - 7:00 PM', '2024-04-21 18:55:13'),
(7, '44444444', 'Gold D', 'Roger', 'History', 'gdroger@gmail.com', '444-444-4444', '5/4/2024, 6:00 PM - 7:00 PM', '2024-04-21 18:58:54'),
(8, '55555555', 'Marie', 'Novak', 'Local Link', 'mari3@gmail.com', '555-555-5555', '5/4/2024, 6:00 PM - 7:00 PM', '2024-04-21 19:02:54'),
(9, '66666666', 'Lyn', 'Apple', '3D printing', 'lynapple@gmail.com', '666-666-6666', '5/4/2024, 6:00 PM - 7:00 PM', '2024-04-21 19:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:40 PM
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
-- Database: `phptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `postId` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `publishedAt` date DEFAULT NULL,
  `image` blob NOT NULL,
  `categoryId` int(6) DEFAULT NULL,
  `userId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`postId`, `title`, `content`, `url`, `publishedAt`, `image`, `categoryId`, `userId`) VALUES
(1, 'how to become a good learner?', 'video practice, meditation', 'goodlearner101.in', '2020-02-12', 0x626c612e6a7067, 3, 1),
(2, 'how to become a good learner?', 'video practice, meditation', 'goodlearner101.in', '2020-02-12', 0x626c612e6a7067, 3, 1),
(3, 'how to become a good learner?', 'video practice, meditation', 'goodlearner101.in', '2020-02-12', 0x626c612e6a7067, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `postId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `blogpost_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:44 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `metaTitle` varchar(100) NOT NULL,
  `parentCategoryId` int(6) NOT NULL,
  `image` blob DEFAULT NULL,
  `createdAt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `title`, `content`, `url`, `metaTitle`, `parentCategoryId`, `image`, `createdAt`) VALUES
(3, 'Education', 'learn about any subject, books', 'education.php', 'learn new things', 1, 0x67617264692e6a7067, '2020-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parentCategoryId` int(6) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`parentCategoryId`, `title`) VALUES
(1, 'Education'),
(2, 'Electronics'),
(3, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userId` int(6) NOT NULL,
  `prefix` varchar(6) DEFAULT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `information` varchar(200) NOT NULL,
  `lastLoginAt` varchar(50) DEFAULT NULL,
  `createdAt` varchar(50) DEFAULT NULL,
  `updatedAt` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userId`, `prefix`, `firstName`, `lastName`, `mobile`, `email`, `userPassword`, `information`, `lastLoginAt`, `createdAt`, `updatedAt`) VALUES
(1, 'Miss', 'Dhara', 'Parekh', '9824588991', 'abc@gmail.com', '123456789', 'I am dhara', '2020-02-03', '2020-02-03', '2020-02-03'),
(2, 'Miss', 'Dolly', 'Parekh', '6352301038', 'dollyjamnagar@gmail.com', 'dolly123', 'I am a physics teacher  ', '2020-02-03', '2020-02-03', '2020-02-03');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentCategoryId` (`parentCategoryId`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parentCategoryId`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `postId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `blogpost_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentCategoryId`) REFERENCES `parentcategory` (`parentCategoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

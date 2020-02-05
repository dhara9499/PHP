-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 09:36 AM
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
  `userId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`postId`, `title`, `content`, `url`, `publishedAt`, `image`, `userId`) VALUES
(1, 'How to become a good learner', 'Video practice', 'goodlearner.txt', '2020-02-13', 0x626c612e6a7067, 1);

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
  `image` varchar(250) DEFAULT NULL,
  `createdAt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `title`, `content`, `url`, `metaTitle`, `parentCategoryId`, `image`, `createdAt`) VALUES
(1, 'Maths', 'maths logical field', 'mathslogics.php', 'Education practice', 1, 'ic_math-web.png', '2020-02-04');

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
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `postCatId` int(11) NOT NULL,
  `postId` int(6) NOT NULL,
  `parentCategoryId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`postCatId`, `postId`, `parentCategoryId`) VALUES
(10, 1, 1),
(11, 1, 3);

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
(1, 'Miss', 'Dhara', 'Parekh', '9824588991', 'd.j.parekh99@gmail.com', 'f53f6a95dfc35753bff7d00d1f37c98e', 'I am Dhara', '2020-02-04', '2020-02-04', '2020-02-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `blogpost_ibfk_2` (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `category_ibfk_1` (`parentCategoryId`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parentCategoryId`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`postCatId`),
  ADD KEY `parentCategoryId` (`parentCategoryId`),
  ADD KEY `post_category_ibfk_1` (`postId`);

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
  MODIFY `postId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `postCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentCategoryId`) REFERENCES `parentcategory` (`parentCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `blogpost` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`parentCategoryId`) REFERENCES `parentcategory` (`parentCategoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 06:24 PM
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
-- Database: `blogpostapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `blogId` int(6) NOT NULL,
  `userId` int(6) NOT NULL,
  `blogTitle` varchar(50) NOT NULL,
  `blogUrl` varchar(200) NOT NULL,
  `blogContent` varchar(200) NOT NULL,
  `publishedAt` varchar(50) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `updatedAt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(6) NOT NULL,
  `parentCategoryId` int(6) NOT NULL,
  `categoryTitle` varchar(50) NOT NULL,
  `categoryMetaTitle` varchar(50) NOT NULL,
  `categoryUrl` varchar(200) NOT NULL,
  `categoryContent` varchar(300) NOT NULL,
  `categoryImage` varchar(250) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `updatedAt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentCategoryId`, `categoryTitle`, `categoryMetaTitle`, `categoryUrl`, `categoryContent`, `categoryImage`, `createdAt`, `updatedAt`) VALUES
(4, 1, 'fgfg', 'fghgfh', 'fghfgh', 'fgfg', 'bl.png', '07 Feb 2020  03:20:PM', '07 Feb 2020  03:20:PM');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parentCategoryId` int(6) NOT NULL,
  `parentCategoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`parentCategoryId`, `parentCategoryName`) VALUES
(1, 'Education'),
(2, 'Electronics'),
(3, 'Health'),
(4, 'Festival'),
(5, 'SQL Injection'),
(6, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `postcatgory`
--

CREATE TABLE `postcatgory` (
  `postCategoryId` int(6) NOT NULL,
  `parentCategoryId` int(6) NOT NULL,
  `blogId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(6) NOT NULL,
  `prefix` varchar(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastLoginAt` varchar(50) DEFAULT NULL,
  `information` varchar(200) NOT NULL,
  `createdAt` varchar(50) DEFAULT NULL,
  `updatedAt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `prefix`, `firstName`, `lastName`, `mobile`, `email`, `password`, `lastLoginAt`, `information`, `createdAt`, `updatedAt`) VALUES
(1, 'Miss', 'Dhara', 'Parekh', '9824588991', 'd.j.parekh99@gmail.com', 'f53f6a95dfc35753bff7d00d1f37c98e', '07 Feb 2020  06:22:PM', 'I am dhara', '07 Feb 2020  06:21:PM', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`blogId`),
  ADD UNIQUE KEY `blogUrl` (`blogUrl`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `categoryUrl` (`categoryUrl`),
  ADD KEY `parentCategoryId` (`parentCategoryId`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parentCategoryId`);

--
-- Indexes for table `postcatgory`
--
ALTER TABLE `postcatgory`
  ADD PRIMARY KEY (`postCategoryId`),
  ADD KEY `parentCategoryId` (`parentCategoryId`),
  ADD KEY `postcatgory_ibfk_2` (`blogId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `blogId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `postcatgory`
--
ALTER TABLE `postcatgory`
  MODIFY `postCategoryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentCategoryId`) REFERENCES `parentcategory` (`parentCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postcatgory`
--
ALTER TABLE `postcatgory`
  ADD CONSTRAINT `postcatgory_ibfk_1` FOREIGN KEY (`parentCategoryId`) REFERENCES `parentcategory` (`parentCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postcatgory_ibfk_2` FOREIGN KEY (`blogId`) REFERENCES `blogpost` (`blogId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

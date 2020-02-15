-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 07:16 PM
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
-- Database: `mvcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(6) NOT NULL,
  `categoryName` varchar(100) DEFAULT NULL,
  `urlKey` varchar(50) DEFAULT NULL,
  `categoryImage` varchar(250) DEFAULT NULL,
  `categoryStatus` tinyint(1) DEFAULT NULL,
  `categoryDescription` varchar(200) DEFAULT NULL,
  `parentCategoryID` int(6) DEFAULT NULL,
  `craetedAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `urlKey`, `categoryImage`, `categoryStatus`, `categoryDescription`, `parentCategoryID`, `craetedAt`, `updatedAt`) VALUES
(1, 'iage', 'sdfsd', '', 0, 'hdsj', 2, '2020-02-15 06:34:26', '2020-02-15 12:14:07'),
(3, 'vcxvx', 'cf', 'bla.jpg', 0, 'cxcvxc', 1, '2020-02-15 11:58:01', NULL),
(4, 'dsfsdf', 'dsf', 'bla.jpg', 0, '0', 1, '2020-02-15 11:58:13', NULL),
(5, 'sdsd', 'sds', NULL, 0, 'sdsd', 4, '2020-02-15 12:54:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `pageId` int(6) NOT NULL,
  `pageTitle` varchar(50) DEFAULT NULL,
  `urlKey` varchar(100) DEFAULT NULL,
  `pageStatus` varchar(50) DEFAULT NULL,
  `Content` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parentCategoryID` int(6) NOT NULL,
  `parentCategoryName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`parentCategoryID`, `parentCategoryName`) VALUES
(1, 'Electronics'),
(2, 'Clothes'),
(3, 'Food'),
(4, 'Books'),
(5, 'Festival');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(6) NOT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `SKU` varchar(50) DEFAULT NULL,
  `urlKey` varchar(100) DEFAULT NULL,
  `productImage` varchar(250) DEFAULT NULL,
  `productStatus` tinyint(1) DEFAULT NULL,
  `productDescription` varchar(100) DEFAULT NULL,
  `shortDescription` varchar(100) DEFAULT NULL,
  `productStock` varchar(100) DEFAULT NULL,
  `productPrice` varchar(20) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `SKU`, `urlKey`, `productImage`, `productStatus`, `productDescription`, `shortDescription`, `productStock`, `productPrice`, `createdAt`, `updatedAt`) VALUES
(19, 'sdsd', 'sdsd', 'sds', 'bl.png', 1, 'kdsfk', 'dl', 'sfll', 'lfdl', '2020-02-15 08:51:33', '2020-02-15 08:51:54'),
(20, 'sdfsdf', '53331253', 'sds', 'bl.png', 0, 'erwr', 'ereg', 'dfdg', 'gdfd', '2020-02-15 10:37:14', NULL),
(21, 'sds', 'dsd', 'sds', 'bl.png', 0, 'sdsd', 'scxs', 'xsx', 'xcxcd', '2020-02-15 10:42:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `pcID` int(6) NOT NULL,
  `productID` int(6) DEFAULT NULL,
  `categoryID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `categories_ibfk_1` (`parentCategoryID`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `urlKey` (`urlKey`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parentCategoryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `SKU` (`SKU`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`pcID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `productID` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `pageId` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `pcID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parentCategoryID`) REFERENCES `parentcategory` (`parentCategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 06:23 PM
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
(1, 'Fruit ', 'fruit', 'fruitGroup.jpg', 1, 'Fruits are good for health', 3, '2020-02-18 06:07:49', NULL),
(2, 'Vegetables', 'vegetable', 'vegGroup.jpg', 1, 'Vegetables are good for health', 3, '2020-02-18 06:08:43', NULL),
(3, 'Grains', 'grains', 'grainGroup.jpg', 1, 'Grains are good for health', 3, '2020-02-18 06:09:43', NULL),
(4, 'Protien', 'protien', 'protienGroup.jpg', 1, 'Protiens are good for health', 3, '2020-02-18 06:10:25', NULL),
(5, 'Dairy Products', 'dairyProduct', 'dairyGroup.jpg', 1, 'Dairy products are good for health', 3, '2020-02-18 06:11:19', NULL);

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

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`pageId`, `pageTitle`, `urlKey`, `pageStatus`, `Content`, `createdAt`, `updatedAt`) VALUES
(2, 'Home', 'home', '1', 'Home page', '2020-02-17 09:20:25', '2020-02-17 11:08:14'),
(3, 'Aboutus', 'aboutus', '1', 'About us', '2020-02-17 09:21:19', '2020-02-17 11:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parentCategoryID` int(11) NOT NULL,
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
(1, 'Apple', 'fruit1', 'apple', 'apple.jpg', 1, 'Apple is red', 'Apple', '50', '35', '2020-02-18 07:43:36', '2020-02-18 08:27:05'),
(2, 'Banana', 'fruit2', 'banana', 'banana.jpg', 1, 'Banana is yellow', 'Banana', '60', '25', '2020-02-18 07:44:13', '2020-02-18 08:44:43'),
(3, 'Mango', 'fruit3', 'mango', 'msngo.jpg', 1, 'Mangoes are sweet', 'Mango', '100', '90', '2020-02-18 07:45:20', '2020-02-18 09:04:35'),
(4, 'Potatoes', 'veg1', 'potatoes', 'poteto.jpg', 1, 'Potato', 'Potato', '200', '20', '2020-02-18 07:48:14', '2020-02-18 09:43:42'),
(5, 'Tomato', 'veg2', 'tomato', 'tomato.jpg', 1, 'Tomato', 'Tomato', '200', '50', '2020-02-18 07:49:09', '2020-02-18 09:44:09'),
(6, 'onion', 'veg3', 'onion', 'onion.jpg', 1, 'Onion', 'Onion', '50', '25', '2020-02-18 07:50:16', '2020-02-18 09:44:25');

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
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`pcID`, `productID`, `categoryID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `urlKey` (`urlKey`),
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
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD UNIQUE KEY `urlKey` (`urlKey`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`pcID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `categoryID` (`categoryID`);

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
  MODIFY `pageId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `pcID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_3` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 11:50 AM
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
-- Database: `vehicleregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `serviceregistration`
--

CREATE TABLE `serviceregistration` (
  `serviceID` int(6) NOT NULL,
  `userID` int(6) NOT NULL,
  `title` varchar(20) NOT NULL,
  `vehicleNumber` varchar(5) NOT NULL,
  `licenseNumber` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `timeSlot` varchar(20) NOT NULL,
  `vehicleIssue` text NOT NULL,
  `serviceCenter` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `createdDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceregistration`
--

INSERT INTO `serviceregistration` (`serviceID`, `userID`, `title`, `vehicleNumber`, `licenseNumber`, `date`, `timeSlot`, `vehicleIssue`, `serviceCenter`, `status`, `createdDate`) VALUES
(32, 1, 'S1', '1', '1', '2020-02-06', '9-10', 'Issue1', 'service1', 0, '2020-02-22'),
(33, 1, 'S2', '2', '2', '2020-02-06', '9-10', 'Issue2', 'service1', 0, '2020-02-22'),
(34, 1, 'S3', '3', '3', '2020-02-06', '9-10', 'Issue3', 'service1', 0, '2020-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(6) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`) VALUES
(1, 'Dhara', 'Parekh', 'abc@gmail.com', '123456', '9824588991'),
(3, 'hsdh', 'jcsjh', 'harmi@gmail.com', '123456', '982458889');

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `addressID` int(6) NOT NULL,
  `userID` int(6) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipCode` mediumint(5) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`addressID`, `userID`, `street`, `city`, `state`, `zipCode`, `country`) VALUES
(1, 1, 's1', 'Jamnagar', 'Gujarat', 360001, 'India'),
(3, 3, 'dh', 'Jamnagar', 'Gujarat', 360001, 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceregistration`
--
ALTER TABLE `serviceregistration`
  ADD PRIMARY KEY (`serviceID`),
  ADD UNIQUE KEY `vehicleNumber` (`vehicleNumber`),
  ADD UNIQUE KEY `licenseNumber` (`licenseNumber`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviceregistration`
--
ALTER TABLE `serviceregistration`
  MODIFY `serviceID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `addressID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serviceregistration`
--
ALTER TABLE `serviceregistration`
  ADD CONSTRAINT `serviceregistration_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2016 at 05:08 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskmanager`
--
CREATE DATABASE IF NOT EXISTS `taskmanager` DEFAULT CHARACTER SET utf16 COLLATE utf16_unicode_ci;
USE `taskmanager`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lists`
--

CREATE TABLE IF NOT EXISTS `tbl_lists` (
  `listID` int(11) NOT NULL AUTO_INCREMENT,
  `listName` varchar(500) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`listID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_lists`
--

INSERT INTO `tbl_lists` (`listID`, `listName`) VALUES
(1, 'test1'),
(2, 'list2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `statusID` int(11) NOT NULL AUTO_INCREMENT,
  `statusDesc` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`statusID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`statusID`, `statusDesc`) VALUES
(1, 'Open'),
(2, 'In progress'),
(3, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE IF NOT EXISTS `tbl_tasks` (
  `taskID` int(11) NOT NULL AUTO_INCREMENT,
  `taskName` varchar(500) COLLATE utf16_unicode_ci NOT NULL,
  `taskDesc` text COLLATE utf16_unicode_ci NOT NULL,
  `taskStatusID` int(11) NOT NULL,
  PRIMARY KEY (`taskID`),
  KEY `fk_status` (`taskStatusID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`taskID`, `taskName`, `taskDesc`, `taskStatusID`) VALUES
(1, 'test', 'test1', 3),
(3, 'test3', 'xxxvcxv', 1),
(4, '12', '2', 2),
(5, '2', '3434', 1),
(6, 'task1', 'task desc1', 1),
(7, '10', 'qwqwqw', 1),
(8, 'tes', '1212', 1),
(9, 'test1', 'ewewe', 1),
(10, 'fsdf', 'dsfsf', 1),
(11, 'ssdsd', 'dfdf', 1),
(12, 'asas', 'asas', 1),
(13, 'asas', 'asas', 1),
(14, 'asas', 'asas', 1),
(15, 'asas', 'asas', 1),
(16, 'asas', 'asa', 1),
(17, 'sasa', 'asas', 1),
(18, 'asas', 'asas', 1),
(19, 'a', 'a', 1),
(20, 'as', 'as', 1),
(21, 'as', 'as', 1),
(22, 'asas', 'asas', 1),
(23, 'asas', 'asas', 1),
(24, 'asas', 'asas', 1),
(25, 'test', 'test1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks_lists`
--

CREATE TABLE IF NOT EXISTS `tbl_tasks_lists` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `listID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_lists` (`listID`),
  KEY `fk_task` (`taskID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD CONSTRAINT `tbl_tasks_ibfk_1` FOREIGN KEY (`taskStatusID`) REFERENCES `tbl_status` (`statusID`);

--
-- Constraints for table `tbl_tasks_lists`
--
ALTER TABLE `tbl_tasks_lists`
  ADD CONSTRAINT `tbl_tasks_lists_ibfk_2` FOREIGN KEY (`taskID`) REFERENCES `tbl_tasks` (`taskID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_tasks_lists_ibfk_1` FOREIGN KEY (`listID`) REFERENCES `tbl_lists` (`listID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

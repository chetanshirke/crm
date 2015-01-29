-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2015 at 04:43 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seips-intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `CEVENT`
--

CREATE TABLE IF NOT EXISTS `CEVENT` (
  `CEVID` int(5) NOT NULL AUTO_INCREMENT,
  `CID` int(5) NOT NULL,
  `EMPID` int(5) NOT NULL,
  `CEVDETAILS` varchar(10000) NOT NULL,
  `CEVDATE` varchar(40) NOT NULL,
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`CEVID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CMASTER`
--

CREATE TABLE IF NOT EXISTS `CMASTER` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `CNAME` varchar(40) NOT NULL,
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CID`),
  UNIQUE KEY `CID` (`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `CMASTER`
--

INSERT INTO `CMASTER` (`CID`, `CNAME`, `DTIME`) VALUES
(0, 'Not Avaliable', '2015-01-18 15:09:26'),
(1, 'stegs', '2015-01-19 17:31:00'),
(2, 'paras', '2015-01-19 17:32:53'),
(3, 'raptors', '2015-01-20 18:18:07'),
(4, 't-rex', '2015-01-20 18:20:36'),
(5, 'mammoths', '2015-01-20 18:20:51'),
(6, 'plesios', '2015-01-20 18:21:24'),
(7, 'brontos', '2015-01-20 18:21:24'),
(8, 'pachyos', '2015-01-20 18:23:00'),
(9, 'sabers', '2015-01-20 18:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `EATT`
--

CREATE TABLE IF NOT EXISTS `EATT` (
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EID` int(5) NOT NULL,
  `INTIME` int(5) NOT NULL,
  `OUTTIME` int(5) NOT NULL,
  `HOLIDAY` int(1) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EEVENT`
--

CREATE TABLE IF NOT EXISTS `EEVENT` (
  `EEVID` int(5) NOT NULL AUTO_INCREMENT,
  `EMPID` int(5) NOT NULL,
  `EEVDETAILS` varchar(10000) NOT NULL,
  `EEVNOTIFY` int(1) NOT NULL,
  `EEVDATE` varchar(40) NOT NULL,
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`EEVID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `EMASTER`
--

CREATE TABLE IF NOT EXISTS `EMASTER` (
  `EMPID` int(5) NOT NULL AUTO_INCREMENT,
  `EMPNAME` varchar(50) NOT NULL,
  `EMPPASS` varchar(15) NOT NULL,
  `EMPPHONE` varchar(20) DEFAULT NULL,
  `EMPEMAIL` varchar(50) DEFAULT NULL,
  `CID` varchar(10) NOT NULL DEFAULT '0',
  `STATUS` varchar(10) NOT NULL DEFAULT 'inactive',
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EMPID`),
  UNIQUE KEY `EMPID` (`EMPID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `EMASTER`
--

INSERT INTO `EMASTER` (`EMPID`, `EMPNAME`, `EMPPASS`, `EMPPHONE`, `EMPEMAIL`, `CID`, `STATUS`, `is_admin`, `DTIME`) VALUES
(1, 'admin', 'admin', '18621736040', 'chetan.shirke@seips-china.com', '0', '0', 1, '2015-01-15 18:56:22'),
(96, 'tina', 'tina', '124323456', 'tina@example.com', '9', 'active', 0, '2015-01-22 20:11:08'),
(95, 'lilli', 'lilli', '0894859595', 'lilli@example.com', '8', 'active', 0, '2015-01-22 19:57:13'),
(94, '2', '', '', '', '4', 'inactive', 0, '2015-01-22 19:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `HOLIDAYS`
--

CREATE TABLE IF NOT EXISTS `HOLIDAYS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HDATE` date NOT NULL,
  `MARKED` int(5) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SATT`
--

CREATE TABLE IF NOT EXISTS `SATT` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `SID` int(5) NOT NULL,
  `DTIME` date NOT NULL,
  `HOLIDAY` int(1) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `SID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `SATT`
--

INSERT INTO `SATT` (`ID`, `SID`, `DTIME`, `HOLIDAY`, `STATUS`) VALUES
(37, 13, '2015-01-24', 0, 'Absent'),
(36, 13, '2015-01-26', 0, 'Present'),
(35, 13, '2015-01-23', 0, 'Absent'),
(40, 13, '2015-01-25', 0, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `SMASTER`
--

CREATE TABLE IF NOT EXISTS `SMASTER` (
  `SID` int(5) NOT NULL AUTO_INCREMENT,
  `SNAME` varchar(50) NOT NULL,
  `SPHONE` int(15) DEFAULT NULL,
  `SEMAIL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL,
  `SCID` int(5) NOT NULL,
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `SMASTER`
--

INSERT INTO `SMASTER` (`SID`, `SNAME`, `SPHONE`, `SEMAIL`, `STATUS`, `SCID`, `DTIME`) VALUES
(13, 'jojo', 0, 'test', 'active', 96, '2015-01-22 20:19:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

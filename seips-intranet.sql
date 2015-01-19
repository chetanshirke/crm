-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2015 at 01:44 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `CMASTER`
--

INSERT INTO `CMASTER` (`CID`, `CNAME`, `DTIME`) VALUES
(1, 't-rex', '2015-01-18 15:09:26'),
(2, 'stegs', '2015-01-19 17:31:00'),
(3, 'paras', '2015-01-19 17:32:53');

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
  `CID` int(5) NOT NULL DEFAULT '0',
  `STATUS` varchar(10) NOT NULL DEFAULT 'inactive',
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EMPID`),
  UNIQUE KEY `EMPID` (`EMPID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `EMASTER`
--

INSERT INTO `EMASTER` (`EMPID`, `EMPNAME`, `EMPPASS`, `EMPPHONE`, `EMPEMAIL`, `CID`, `STATUS`, `is_admin`, `DTIME`) VALUES
(1, 'admin', 'admin', '18621736040', 'chetan.shirke@seips-china.com', 0, '0', 1, '2015-01-15 18:56:22'),
(14, 'tina', 'tina', '123456789', 'test@example', 1, 'inactive', 0, '2015-01-18 20:27:55'),
(15, 'test', 'test', '123456789', 'test@example', 3, 'active', 0, '2015-01-18 20:31:47');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `SATT`
--

INSERT INTO `SATT` (`ID`, `SID`, `DTIME`, `HOLIDAY`, `STATUS`) VALUES
(23, 1, '2015-01-21', 0, 'Present'),
(22, 2, '2015-01-20', 0, 'Present'),
(21, 1, '2015-01-20', 0, 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `SMASTER`
--

CREATE TABLE IF NOT EXISTS `SMASTER` (
  `SID` int(5) NOT NULL AUTO_INCREMENT,
  `SNAME` varchar(50) NOT NULL,
  `SPHONE` int(15) DEFAULT NULL,
  `SEMAIL` varchar(50) DEFAULT NULL,
  `STATUS` int(1) NOT NULL,
  `SCID` int(5) NOT NULL,
  `DTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `SMASTER`
--

INSERT INTO `SMASTER` (`SID`, `SNAME`, `SPHONE`, `SEMAIL`, `STATUS`, `SCID`, `DTIME`) VALUES
(1, 'chetan', 12344, 'abc@example.com', 0, 15, '2015-01-19 15:28:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

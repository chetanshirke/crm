-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2015 at 05:38 PM
-- Server version: 5.1.32
-- PHP Version: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE IF NOT EXISTS `studentdetails` (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(55) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`studentId`, `studentName`, `teacherId`, `dateadded`) VALUES
(1, 'Neel Sawant', 2, '2015-01-12 16:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE IF NOT EXISTS `useradmin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `classroom` varchar(25) NOT NULL DEFAULT '0',
  `is_admin` int(2) NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`uid`, `name`, `username`, `password`, `classroom`, `is_admin`, `datecreated`) VALUES
(1, 'Admin', 'admin', 'admin123', '', 1, '0000-00-00 00:00:00'),
(2, 'Prashant V Sawant', 'prashant', 'prashant123', 'I Div A', 0, '2015-01-12 15:41:11');

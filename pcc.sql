-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2020 at 04:26 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

DROP TABLE IF EXISTS `complains`;
CREATE TABLE IF NOT EXISTS `complains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `phone`, `email`, `message`) VALUES
(2, 333, 'haris@gmail.com', 'lakfjlsjf'),
(3, 3233, 'hairs@gmail.com', 'lkfhasdhf'),
(4, 487395005, 'haris@gmail.com', 'hfasfskjhdf'),
(5, 487395005, 'haris@gmail.com', 'hfasfskjhdf'),
(6, 487395001, 'Shahryartariq59@gmail.coma', 'i have masla'),
(7, 4234234, 'haris@gmail.com', 'haihfsafhsalkdfj<br />\r\naksldfjlsakjdflk<br />\r\nkjdsfhkjdsafhkj<br />\r\ndslkfhsadlkfh'),
(8, 4234234, 'haris@gmail.com', 'haihfsafhsalkdfj<br />\r\naksldfjlsakjdflk<br />\r\nkjdsfhkjdsafhkj<br />\r\ndslkfhsadlkfh');

-- --------------------------------------------------------

--
-- Table structure for table `cust_info`
--

DROP TABLE IF EXISTS `cust_info`;
CREATE TABLE IF NOT EXISTS `cust_info` (
  `PTCL_ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `cnic` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` bigint(20) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `address` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`PTCL_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=487395007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_info`
--

INSERT INTO `cust_info` (`PTCL_ID`, `name`, `cnic`, `email`, `number`, `gender`, `address`, `password`) VALUES
(487395000, 'Faizan Ali ', 3840307362993, 'faizanarshadali@gmail.com', 3450620787, 'f', 'Hyderabad town, SGD', 'Fa411647'),
(487395001, 'Shahryar Tariq', 3840307362529, 'Shahryartariq59@gmail.coma', 3059298547, 'm', 'Hyderabad town, SGD', 'shah'),
(487395005, 'Haris', 33434234, 'haris@gmail.com', 3004444443, 'm', 'sgd', 'haris');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `speed` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `data`, `speed`) VALUES
(3, 'montly', '300', '30000Mb', '4mbps'),
(4, 'aslkfj', '324', 'LKSDFJ', 'LDSAKFJ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

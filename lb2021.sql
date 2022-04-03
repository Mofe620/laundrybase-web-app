-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2021 at 05:14 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FNAME` text NOT NULL,
  `LNAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PNUMBER` varchar(30) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(300) NOT NULL,
  `STATUS` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `FNAME`, `LNAME`, `EMAIL`, `PNUMBER`, `USERNAME`, `PASSWORD`, `STATUS`) VALUES
(12, 'Mike', 'Jordan', 'mike34@yahoo.com', '09087652356', 'Mike', 'mike34', '1'),
(13, 'Anna', 'Gradel', 'anna94@gmail.com', '08124578354', 'Anna', 'anna94', '1'),
(14, 'Gabriel', 'Jones', 'gaby@gmail.com', '07099883454', 'Gabriel', 'gaby24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `O-ID` int NOT NULL AUTO_INCREMENT,
  `NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PNUMBER` varchar(20) NOT NULL,
  `ADDRESS` text NOT NULL,
  `PICKUP` text NOT NULL,
  `ITEMS` text NOT NULL,
  `SERVICE` text NOT NULL,
  `PAYMENT` int NOT NULL,
  `RETURN` text NOT NULL,
  `STATUS` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`O-ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`O-ID`, `NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `PICKUP`, `ITEMS`, `SERVICE`, `PAYMENT`, `RETURN`, `STATUS`) VALUES
(13, 'Madrens', 'madd@yahoo.com', '0908764567', '29, Rainbow Avenue', '01/26/2019', '4 Trousers', 'Only Iron', 4500, '01/28/2019', 2),
(24, 'Henry Ford', 'mo627@gmail.com', '07031456432', '17, Ford Lane', '01/22/2019', '2 Suits, 4 pairs of Socks, ', 'Wash and Fold', 2350, '01/28/2019', 3),
(32, 'Stanley', 'stan24@yahooo.com', '09076213421', '21 Zenith Avenue', '01/30/2019', '6 Shirts, 4 Trousers, 1 Towel', 'Dry Clean', 2700, '02/02/2019', 3),
(33, 'Jovita', 'jovi77@yahoo.com', '08012345432', '27, Alada Road', '01/30/2019', '6 Blouses, 4 Skirts', 'Wash and Fold', 2600, '02/02/2019', 3),
(34, 'Michael', 'michy66@gmail.com', '09034567243', '99, Ben-Clarks Rd.', '01/31/2019', '3 Trousers, 4 Shirts', 'Wash and Fold', 1400, '02/04/2019', 2),
(35, 'Daniel Jay', 'dan47@gmail.com', '08086826664', '14, Sevenson Rd.', '01/31/2019', '4 Shirts, 3 Trousers', 'Dry Clean', 4000, '02/03/2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `laundryblock`
--

DROP TABLE IF EXISTS `laundryblock`;
CREATE TABLE IF NOT EXISTS `laundryblock` (
  `B-ID` int NOT NULL AUTO_INCREMENT,
  `NAME` text NOT NULL,
  `ADDRESS` text NOT NULL,
  `CONTACT` varchar(17) NOT NULL,
  PRIMARY KEY (`B-ID`),
  UNIQUE KEY `CONTACT` (`CONTACT`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundryblock`
--

INSERT INTO `laundryblock` (`B-ID`, `NAME`, `ADDRESS`, `CONTACT`) VALUES
(1, 'Sure Grace Laundry ltd.', '99 JohnBaker Street', '09098745634'),
(2, 'Sparkles DryCleaning ltd', '24 AIBridge Avenue', '07012536534'),
(3, 'Higher-Glory Dry Cleaning Services', '44, Johnson-Barter Avenue', '09076452345'),
(4, 'Helena Laundry Services', '21, Alwood Avenue', '08082651875'),
(5, 'ZannyWhite DryCleaning Services', '28, Barny-zeed Lane', '08054217846');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `NAME` text NOT NULL,
  `SERVICE` text NOT NULL,
  `TIME` datetime NOT NULL,
  `VIEW` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`NAME`, `SERVICE`, `TIME`, `VIEW`) VALUES
('Henry Ford', 'Wash and Fold', '2019-01-26 12:54:54', 1),
('Andrew Macaulay', 'Dry Clean', '2019-01-26 20:47:28', 1),
('Sandra', 'Dry Clean', '2019-01-26 22:47:25', 1),
('Annabel', 'Wash and Fold', '2019-01-27 15:22:26', 1),
('Alero', 'Wash and Fold', '2019-01-27 20:28:56', 1),
('Diana', 'Only Iron', '2019-01-27 23:51:24', 1),
('Julie', 'Wash and Fold', '2019-01-28 18:46:10', 1),
('Stanley', 'Dry Clean', '2019-01-29 08:01:41', 1),
('Jovita', 'Wash and Fold', '2019-01-29 08:19:40', 1),
('Michael', 'Wash and Fold', '2019-01-30 09:12:02', 1),
('Daniel Jay', 'Dry Clean', '2019-01-30 10:12:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `STATUS` varchar(1) NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`STATUS`, `DESCRIPTION`) VALUES
('0', 'Awaiting Pickup'),
('1', 'Picked'),
('2', 'Assigned & Processing'),
('3', 'Returning'),
('4', 'Completed!');

-- --------------------------------------------------------

--
-- Table structure for table `tagging`
--

DROP TABLE IF EXISTS `tagging`;
CREATE TABLE IF NOT EXISTS `tagging` (
  `O-ID` int NOT NULL,
  `BLOCK` text NOT NULL,
  `ITEMS` text NOT NULL,
  `SERVICE` text NOT NULL,
  `TAG` varchar(3) NOT NULL,
  `DUE_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagging`
--

INSERT INTO `tagging` (`O-ID`, `BLOCK`, `ITEMS`, `SERVICE`, `TAG`, `DUE_DATE`) VALUES
(32, 'Helena Laundry Services', '6 Shirts, 4 Trousers, 1 Towel', 'Only Iron', 'Y89', '2019-01-02'),
(24, 'ZannyWhite DryCleaning Services', '2 Suits, 4 pairs of Socks, ', 'Wash and Fold', 'nwh', '2019-01-27'),
(33, 'ZannyWhite DryCleaning Services', '6 Blouses, 4 Skirts', 'Wash and Fold', 'nwh', '2019-02-01'),
(13, 'Higher-Glory Dry Cleaning Services', '4 Trousers', 'Only Iron', 'xgh', '2019-01-27'),
(34, 'Helena Laundry Services', '3 Trousers, 4 Shirts', 'Wash and Fold', 't8c', '2019-02-03'),
(29, 'Sparkles DryCleaning ltd', '', 'Dry Clean', 'SG3', '2019-01-29'),
(35, 'Helena Laundry Services', '4 Shirts, 3 Trousers', 'Dry Clean', 'j4b', '2019-02-02'),
(7, 'Sure Grace Laundry ltd.', '', 'Wash and Fold', 'w3b', '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `trackb`
--

DROP TABLE IF EXISTS `trackb`;
CREATE TABLE IF NOT EXISTS `trackb` (
  `O-ID` int NOT NULL,
  `TAG` text NOT NULL,
  `BLOCK` text NOT NULL,
  `ITEMS` text NOT NULL,
  `RETRIEVE` date NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trackb`
--

INSERT INTO `trackb` (`O-ID`, `TAG`, `BLOCK`, `ITEMS`, `RETRIEVE`, `STATUS`) VALUES
(32, 'Y89', 'Helena Laundry Services', '6 Shirts, 4 Trousers, 1 Towel', '2019-02-01', 'COMPLETED'),
(24, 'nwh', 'ZannyWhite DryCleaning Services', '2 Suits, 4 pairs of Socks, ', '2019-01-27', 'COMPLETED'),
(33, 'nwh', 'ZannyWhite DryCleaning Services', '6 Blouses, 4 Skirts', '2019-02-01', 'COMPLETED'),
(13, 'xgh', 'Higher-Glory Dry Cleaning Services', '4 Trousers', '2019-01-27', 'PENDING'),
(34, 't8c', 'Helena Laundry Services', '3 Trousers, 4 Shirts', '2019-02-03', 'PENDING'),
(29, 'SG3', 'Sparkles DryCleaning ltd', '', '2019-01-29', 'COMPLETED'),
(35, 'j4b', 'Helena Laundry Services', '4 Shirts, 3 Trousers', '2019-02-02', 'PENDING'),
(7, 'w3b', 'Sure Grace Laundry ltd.', '', '2019-01-15', 'PENDING');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

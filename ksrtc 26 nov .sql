-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2018 at 02:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksrtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `stop_id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `idproof` char(20) NOT NULL,
  `phno` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `gender` char(10) NOT NULL,
  `seats` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `stop_id`, `name`, `idproof`, `phno`, `amount`, `gender`, `seats`) VALUES
(1, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', ''),
(2, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', '2_5'),
(3, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', '2_5'),
(4, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', '2_5'),
(5, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', '2_5'),
(6, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', '2_5'),
(7, 1, 'ddddd', '44554433444', 2147483647, 34, 'male', '2_5'),
(8, 1, 'ddddd', '3423423424234', 2147483647, 34, 'female', '1_2');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` varchar(20) NOT NULL,
  `type` char(20) NOT NULL,
  `purchasedate` date NOT NULL,
  `noofseats` int(10) NOT NULL,
  `depot` varchar(30) NOT NULL,
  `producer` varchar(30) NOT NULL,
  `depoid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `type`, `purchasedate`, `noofseats`, `depot`, `producer`, `depoid`) VALUES
('8iu87', 'superfast', '2018-11-27', 34, 'Ponkunnam', 'Ashok Leyland', 2),
('KL 1 345', 'ordinary', '2018-01-31', 50, 'Ponkunnam', 'Tata', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bus_route`
--

CREATE TABLE `bus_route` (
  `route_id` int(11) NOT NULL,
  `depo_from` int(11) NOT NULL,
  `depo_to` int(11) NOT NULL,
  `bus_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `driver` int(11) DEFAULT NULL,
  `conductor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_route`
--

INSERT INTO `bus_route` (`route_id`, `depo_from`, `depo_to`, `bus_id`, `date`, `driver`, `conductor`) VALUES
(2, 2, 0, '1', '2018-11-26 11:10:48', NULL, NULL),
(3, 2, 1, '0', '2018-11-26 11:13:08', NULL, NULL),
(4, 2, 1, 'KL 1 345', '2018-11-26 11:13:29', 1, 2),
(5, 2, 6, '8iu87', '2018-11-26 11:27:05', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bus_stop`
--

CREATE TABLE `bus_stop` (
  `stop_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `s_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `distance` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_stop`
--

INSERT INTO `bus_stop` (`stop_id`, `route_id`, `s_from`, `s_to`, `amount`, `distance`, `date`) VALUES
(1, 5, 'ttttss', 'kalloo', 34, '44', '2018-11-26 12:18:18'),
(2, 5, 'varnasi', 'rtus', 56, '6084', '2018-11-26 12:26:26'),
(3, 4, 'turt', 'ssdf', 44, '545', '2018-11-26 12:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintid` varchar(20) NOT NULL,
  `type` char(10) NOT NULL,
  `name` char(50) NOT NULL,
  `address` char(20) NOT NULL,
  `complaints` char(100) NOT NULL,
  `phoneno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `conductor_id` int(11) NOT NULL,
  `conductorid` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` char(30) NOT NULL,
  `phno` int(11) NOT NULL,
  `serviceyear` date NOT NULL,
  `depot` char(20) NOT NULL,
  `license` int(20) NOT NULL,
  `address` char(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`conductor_id`, `conductorid`, `username`, `name`, `phno`, `serviceyear`, `depot`, `license`, `address`, `dob`) VALUES
(2, 'C_2018_5960', 'dddd', 'ddddddd', 2147483647, '2018-11-29', '', 12334433, 'dddsdfs sdf sdf', '2018-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `depoid` int(20) NOT NULL,
  `depotname` char(20) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `depousername` varchar(20) CHARACTER SET utf8 NOT NULL,
  `depopswd` varchar(20) NOT NULL,
  `conformpswd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`depoid`, `depotname`, `contactno`, `depousername`, `depopswd`, `conformpswd`) VALUES
(1, 'Mallappally', 9846578638, 'Dmlply', 'Dmlply', 'Dmlply'),
(2, 'Ponkunnam', 4582200201, 'Dpnknm', 'Dpnknm', 'Dpnknm'),
(3, 'Thiruvalla', 4692568412, 'Dtvla', 'Dtvla', 'Dtvla'),
(4, 'Erumely', 4586321200, 'Dermly', 'Dermly', 'Dermly'),
(6, 'test', 2233223344, 'username', 'qqqqqq', 'qqqqqq');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driverid` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` char(50) NOT NULL,
  `phno` int(11) NOT NULL,
  `serviceyear` date NOT NULL,
  `depot` char(50) NOT NULL,
  `license` int(20) NOT NULL,
  `address` char(30) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driverid`, `username`, `name`, `phno`, `serviceyear`, `depot`, `license`, `address`, `dob`) VALUES
(1, 'C_2018_8870', 'ssss', 'ddddddd', 2147483647, '2018-11-28', '4', 12334433, 'ddsdf sdf sdf sdf sd', '2018-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(20) NOT NULL,
  `username` char(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `usertype`) VALUES
(1, 'admin@ksrtc.com', 'qqqqqq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stationmaster`
--

CREATE TABLE `stationmaster` (
  `stationmasterid` int(20) NOT NULL,
  `name` char(50) NOT NULL,
  `type` char(50) NOT NULL,
  `joiningyear` date NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `depotname` char(50) NOT NULL,
  `depotusename` varchar(20) NOT NULL,
  `depotpswd` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stationmaster`
--

INSERT INTO `stationmaster` (`stationmasterid`, `name`, `type`, `joiningyear`, `contactno`, `depotname`, `depotusename`, `depotpswd`) VALUES
(16, 'Leya', 'Station Master', '2006-05-20', 9544139255, 'Erumely', 'Dermly', 'Dermly'),
(12, 'Anju Rajan', 'Station Master', '2005-03-02', 7034409806, 'Thiruvalla', 'Thiruvalla', 'Dtvla'),
(17, 'daaaaa', 'Station Master', '2018-11-24', 5566554455, 'Mallappally', 'Dmlply', 'Dmlply'),
(18, 'daaaaa', 'Station Master', '2018-11-24', 5566554455, 'Mallappally', 'Dmlply', 'Dmlply'),
(30, 'qaz', 'Station Master', '2018-11-27', 1122334455, 'Ponkunnam', 'aaaaaa', 'qqqqqq'),
(20, 'name', 'Station Master', '2018-11-26', 5566554455, '', '', ''),
(21, 'name', 'Station Master', '2018-11-26', 5566554455, '', '', ''),
(22, 'name', 'Station Master', '2018-11-13', 3333333333, '', '', ''),
(23, 'name', 'Station Master', '2018-11-13', 3333333333, '', '', ''),
(24, 'name', 'Station Master', '2018-11-13', 3333333333, '', '', ''),
(25, 'qqqqqqqqqq', 'Station Master', '2018-11-30', 3333333333, '', '', ''),
(26, 'qqqqqqqqqq', 'Station Master', '2018-11-30', 3333333333, '', '', ''),
(27, 'qqqqqqqqqq', 'Station Master', '2018-11-28', 3333333333, '', '', ''),
(28, 'working', 'Station Master', '2018-11-30', 8899887766, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`),
  ADD KEY `depoid` (`depoid`);

--
-- Indexes for table `bus_route`
--
ALTER TABLE `bus_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `bus_stop`
--
ALTER TABLE `bus_stop`
  ADD PRIMARY KEY (`stop_id`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`conductor_id`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`depoid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `stationmaster`
--
ALTER TABLE `stationmaster`
  ADD PRIMARY KEY (`stationmasterid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bus_route`
--
ALTER TABLE `bus_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bus_stop`
--
ALTER TABLE `bus_stop`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conductor`
--
ALTER TABLE `conductor`
  MODIFY `conductor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `depoid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stationmaster`
--
ALTER TABLE `stationmaster`
  MODIFY `stationmasterid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`depoid`) REFERENCES `depot` (`depoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

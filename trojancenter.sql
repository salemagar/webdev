-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 03:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trojancenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `parkingrow_a`
--

CREATE TABLE `parkingrow_a` (
  `ParkingSpotID` int(20) NOT NULL,
  `Availability` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingrow_a`
--

INSERT INTO `parkingrow_a` (`ParkingSpotID`, `Availability`) VALUES
(1, 'YES'),
(2, 'YES'),
(3, 'YES'),
(4, 'YES'),
(5, 'YES'),
(6, 'YES'),
(7, 'NO'),
(8, 'YES'),
(9, 'YES'),
(10, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `parkingrow_b`
--

CREATE TABLE `parkingrow_b` (
  `ParkingSpotID` int(20) NOT NULL,
  `Availability` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingrow_b`
--

INSERT INTO `parkingrow_b` (`ParkingSpotID`, `Availability`) VALUES
(1, 'YES'),
(2, 'YES'),
(3, 'YES'),
(4, 'YES'),
(5, 'YES'),
(6, 'YES'),
(7, 'YES'),
(8, 'YES'),
(9, 'YES'),
(10, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `parkingrow_c`
--

CREATE TABLE `parkingrow_c` (
  `ParkingSpotID` int(20) NOT NULL,
  `Availability` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingrow_c`
--

INSERT INTO `parkingrow_c` (`ParkingSpotID`, `Availability`) VALUES
(1, 'YES'),
(2, 'NO'),
(3, 'NO'),
(4, 'NO'),
(5, 'NO'),
(6, 'NO'),
(7, 'NO'),
(8, 'NO'),
(9, 'NO'),
(10, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `parkingrow_d`
--

CREATE TABLE `parkingrow_d` (
  `ParkingSpotID` int(20) NOT NULL,
  `Availability` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingrow_d`
--

INSERT INTO `parkingrow_d` (`ParkingSpotID`, `Availability`) VALUES
(1, 'NO'),
(2, 'NO'),
(3, 'NO'),
(4, 'NO'),
(5, 'NO'),
(6, 'NO'),
(7, 'NO'),
(8, 'NO'),
(9, 'NO'),
(10, 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parkingrow_a`
--
ALTER TABLE `parkingrow_a`
  ADD PRIMARY KEY (`ParkingSpotID`);

--
-- Indexes for table `parkingrow_b`
--
ALTER TABLE `parkingrow_b`
  ADD PRIMARY KEY (`ParkingSpotID`);

--
-- Indexes for table `parkingrow_c`
--
ALTER TABLE `parkingrow_c`
  ADD PRIMARY KEY (`ParkingSpotID`);

--
-- Indexes for table `parkingrow_d`
--
ALTER TABLE `parkingrow_d`
  ADD PRIMARY KEY (`ParkingSpotID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parkingrow_a`
--
ALTER TABLE `parkingrow_a`
  MODIFY `ParkingSpotID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parkingrow_b`
--
ALTER TABLE `parkingrow_b`
  MODIFY `ParkingSpotID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parkingrow_c`
--
ALTER TABLE `parkingrow_c`
  MODIFY `ParkingSpotID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parkingrow_d`
--
ALTER TABLE `parkingrow_d`
  MODIFY `ParkingSpotID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 07:47 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `uname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `uname`) VALUES
(7, 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `user`, `pass`) VALUES
(3, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tran`
--

CREATE TABLE `tran` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dte` text NOT NULL,
  `amt` text NOT NULL,
  `month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tran`
--

INSERT INTO `tran` (`id`, `uid`, `dte`, `amt`, `month`) VALUES
(12, 1, '15/Apr/17 01:47 am', '5000', ''),
(13, 1, '15/Apr/17 01:48 am', '900', ''),
(14, 1, '15/Apr/17 01:48 am', '5000', ''),
(15, 1, '22/Apr/17 05:06 am', '560', ''),
(16, 2, '26/Apr/17 12:53 pm', '2200', ''),
(17, 2, '26/Apr/17 12:54 pm', '2000', ''),
(18, 2, '26/Apr/17 01:29 pm', '3000', 'Apr/17'),
(19, 1, '26/Apr/17 01:30 pm', '2500', 'Apr/17'),
(20, 4, '28/Apr/17 11:26 am', '6000', 'Apr/17'),
(21, 1, '05/May/17 01:50 pm', '4590', 'May/17'),
(22, 4, '18/May/17 07:08 pm', '5000', 'May/17'),
(23, 1, '28/Jun/17 03:04 pm', '6000', 'Jun/17'),
(24, 1, '28/Jun/17 03:04 pm', '6000', 'Jun/17'),
(25, 1, '28/Jun/17 03:04 pm', '6000', 'Jun/17'),
(26, 8, '21/Jul/17 10:01 am', '6000', 'Jul/17'),
(27, 8, '21/Jul/17 10:02 am', '3000', 'Jul/17'),
(28, 9, '06/Aug/17 10:05 am', '2368', 'Aug/17'),
(29, 9, '12/Oct/17 09:55 am', '900', 'Oct/17'),
(30, 9, '12/Oct/17 09:56 am', '900', 'Oct/17'),
(31, 9, '12/Oct/17 09:57 am', '760', 'Oct/17'),
(32, 9, '12/Oct/17 10:19 am', '3900', 'Oct/17'),
(33, 10, '13/Oct/17 06:56 am', '2000', 'Oct/17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `pass` text NOT NULL,
  `bankcode` text NOT NULL,
  `lt` text NOT NULL,
  `amt` text NOT NULL,
  `g_amt` int(11) NOT NULL,
  `reg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `bankcode`, `lt`, `amt`, `g_amt`, `reg`) VALUES
(9, 'admin', 'admin', 'admin', '12/Oct/17 10:19 am', '20000', 20000, 'yes'),
(10, 'Aqib Sattar', 'aqib', 'aqib', '13/Oct/17 06:56 am', '38000', 40000, 'yes'),
(34, 'Ehsan Sattar', '12345', 'ehsan', '', '20000', 20000, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tran`
--
ALTER TABLE `tran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tran`
--
ALTER TABLE `tran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

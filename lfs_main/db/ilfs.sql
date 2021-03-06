-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2019 at 09:25 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `hsn`
--

CREATE TABLE `hsn` (
  `uuid` varchar(50) NOT NULL,
  `ainc` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hsn`
--

INSERT INTO `hsn` (`uuid`, `ainc`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('7f79f564-48f1-11e9-a446-14c2130d0834', 1, 'jaihsn', '2019-03-18 01:46:07', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-18 01:49:12', '8605c690-2d55-11e9-8642-14c2130d0834');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `uuid` varchar(50) NOT NULL,
  `a_inc` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `uuid` varchar(50) NOT NULL,
  `aInc` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `ps_un` varchar(50) NOT NULL,
  `narration` varchar(50) NOT NULL DEFAULT 'msdbooking.com',
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`uuid`, `aInc`, `f_name`, `l_name`, `full_name`, `user_name`, `password`, `mobile`, `email`, `created_by`, `created_at`, `updated_by`, `updated_at`, `ps_un`, `narration`, `type`) VALUES
('60edea8c-48de-11e9-a446-14c2130d0834', 2, 'jai', 'pandey', 'jai pandey', 'jai', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9479275716', 'jaishankarpandey329@gmail.com', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-17 23:29:15', 8605, '2019-03-18 00:47:18', '1234', 'http://localhost/il-fs/', 1),
('8605c690-2d55-11e9-8642-14c2130d0834', 1, 'Administrator', '', 'Administrator', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9479275716', 'jaishankarpandey329@gmail.com', '', '0000-00-00 00:00:00', 8605, '2019-02-18 14:52:50', '1234', 'http://localhost/il-fs/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `uuid` varchar(50) NOT NULL,
  `ainc` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`uuid`, `ainc`, `name`, `mobile`, `email`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('bcdf0a14-48ee-11e9-a446-14c2130d0834', 1, 'jai shankar ', '9479275716', 'jaishankarpandey329@gmail.com', '2019-03-18 01:26:21', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-18 01:33:46', '8605c690-2d55-11e9-8642-14c2130d0834');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `uuid` varchar(50) NOT NULL,
  `a_inc` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hsn`
--
ALTER TABLE `hsn`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `a_inc` (`ainc`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `a_inc` (`a_inc`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `AutoInc` (`aInc`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `a_inc` (`ainc`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `a_inc` (`a_inc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hsn`
--
ALTER TABLE `hsn`
  MODIFY `ainc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `a_inc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `aInc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `ainc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `a_inc` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

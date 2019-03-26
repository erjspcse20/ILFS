-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 08:21 PM
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
('7f79f564-48f1-11e9-a446-14c2130d0834', 1, 'hsn12', '2019-03-18 01:46:07', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 23:27:15', '8605c690-2d55-11e9-8642-14c2130d0834'),
('e3902db4-4ff1-11e9-a446-14c2130d0834', 2, 'yashp123', '2019-03-26 23:36:33', '8605c690-2d55-11e9-8642-14c2130d0834', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `uuid` varchar(50) NOT NULL,
  `ainc` int(11) NOT NULL,
  `prefix` varchar(10) DEFAULT 'DL/JHA/',
  `item_no` varchar(500) DEFAULT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `pdf_name` varchar(100) NOT NULL,
  `party_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`uuid`, `ainc`, `prefix`, `item_no`, `invoice_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `pdf_name`, `party_id`) VALUES
('8ff5bce2-4ff5-11e9-a446-14c2130d0834', 3, 'DL/JHA/', 'IFLS2019Mar4^', 'DL/JHA/Mar/2019/3', '2019-03-27 00:02:51', '8605c690-2d55-11e9-8642-14c2130d0834', '0000-00-00 00:00:00', '', 'upload/bill/2019_03_27_00_02_51_.pdf', 'd101566e-4ff1-11e9-a446-14c2130d0834'),
('b3f3c04c-4fed-11e9-a446-14c2130d0834', 1, 'DL/JHA/', 'IFLS2019Mar1^', 'DL/JHA/Mar/2019/1', '2019-03-26 23:06:35', '8605c690-2d55-11e9-8642-14c2130d0834', '0000-00-00 00:00:00', '', 'upload/bill/2019_03_26_23_06_35_.pdf', '749a6422-4af8-11e9-a446-14c2130d0834'),
('c1d3aab0-4fed-11e9-a446-14c2130d0834', 2, 'DL/JHA/', 'IFLS2019Mar3^IFLS2019Mar2^', 'DL/JHA/Mar/2019/2', '2019-03-26 23:06:58', '8605c690-2d55-11e9-8642-14c2130d0834', '0000-00-00 00:00:00', '', 'upload/bill/2019_03_26_23_06_58_.pdf', 'bcdf0a14-48ee-11e9-a446-14c2130d0834');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `uuid` varchar(50) NOT NULL,
  `a_inc` bigint(11) NOT NULL,
  `item_published_id` varchar(100) NOT NULL,
  `party_id` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `hsn_id` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `calculated_amount` double DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `transport_charge` double DEFAULT NULL,
  `total_gst` float DEFAULT NULL,
  `sgst` float DEFAULT NULL,
  `cgst` float DEFAULT NULL,
  `igst` float DEFAULT NULL,
  `gst_type` int(11) DEFAULT NULL COMMENT '1=igst,2=sgst &cgst',
  `total_igst_calculated` double DEFAULT NULL,
  `total_sgst_calculated` double DEFAULT NULL,
  `total_cgst_calculated` double DEFAULT NULL,
  `amount_with_tax` double DEFAULT NULL,
  `dimension` varchar(100) DEFAULT NULL,
  `vahical_no` varchar(100) DEFAULT NULL,
  `gp_no` varchar(100) DEFAULT NULL,
  `state_of_supply` varchar(100) DEFAULT NULL,
  `mode_of_payment` varchar(50) DEFAULT NULL,
  `recived_amount` double DEFAULT NULL,
  `rest_amount` double DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `bill_status` int(11) NOT NULL DEFAULT '2' COMMENT '1=genrated,2=pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`uuid`, `a_inc`, `item_published_id`, `party_id`, `product_id`, `hsn_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `type`, `quantity`, `rate`, `calculated_amount`, `category`, `transport_charge`, `total_gst`, `sgst`, `cgst`, `igst`, `gst_type`, `total_igst_calculated`, `total_sgst_calculated`, `total_cgst_calculated`, `amount_with_tax`, `dimension`, `vahical_no`, `gp_no`, `state_of_supply`, `mode_of_payment`, `recived_amount`, `rest_amount`, `is_deleted`, `bill_status`) VALUES
('4e9f02a6-4ff2-11e9-a446-14c2130d0834', 4, 'IFLS2019Mar4', 'd101566e-4ff1-11e9-a446-14c2130d0834', 'f538d296-4ff1-11e9-a446-14c2130d0834', 'e3902db4-4ff1-11e9-a446-14c2130d0834', '2019-03-26 23:39:33', '8605c690-2d55-11e9-8642-14c2130d0834', NULL, NULL, 'TRIP', 10, 500, 5000, 'BSB', 200, 520, 5, 5, 0, 2, 0, 260, 260, 5720, 'hjbjk', 'dlyasho123', 'yasho123', 'delhi', 'Cash', 5700, 20, 0, 1),
('51fa8051-4ee6-11e9-b259-705a0f3cbc10', 1, 'IFLS2019Mar1', '749a6422-4af8-11e9-a446-14c2130d0834', '729c3445-493c-11e9-aa7a-705a0f3cbc10', '7f79f564-48f1-11e9-a446-14c2130d0834', '2019-03-25 15:41:13', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 23:27:33', '8605c690-2d55-11e9-8642-14c2130d0834', 'CUM', 2, 100, 200, 'SandSubTitute', 23, 22.3, 0, 0, 0, 1, 22.3, 0, 0, 245.3, 'dwfs', 'sdfgsdf', 'dsfgsd', 'sdfgsdf', 'CreditCard', 100, 145.3, 0, 1),
('672bf762-4efb-11e9-b259-705a0f3cbc10', 2, 'IFLS2019Mar2', 'bcdf0a14-48ee-11e9-a446-14c2130d0834', '729c3445-493c-11e9-aa7a-705a0f3cbc10', '7f79f564-48f1-11e9-a446-14c2130d0834', '2019-03-25 18:12:08', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 23:17:36', '8605c690-2d55-11e9-8642-14c2130d0834', 'NUM', 3, 34, 102, 'SandSubTitute', 324, 55.38, 6.5, 6.5, 0, 2, 0, 27.69, 27.69, 481.38, 'ere', 'werter', 'werter', 'ertre', 'Paytm', 340, 141.38, 0, 1),
('e0ff7ac5-4f87-11e9-b579-705a0f3cbc10', 3, 'IFLS2019Mar3', 'bcdf0a14-48ee-11e9-a446-14c2130d0834', '729c3445-493c-11e9-aa7a-705a0f3cbc10', '7f79f564-48f1-11e9-a446-14c2130d0834', '2019-03-26 10:57:42', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 14:55:03', '8605c690-2d55-11e9-8642-14c2130d0834', 'CUM', 3, 34, 102, 'SandSubTitute', 324, 55.38, 6.5, 6.5, 0, 2, 0, 27.69, 27.69, 481.38, 'ere', 'werter', 'werter', 'ertre', 'Paytm', 34, 447.38, 0, 1);

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
  `updated_by` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `ps_un` varchar(50) NOT NULL,
  `narration` varchar(50) NOT NULL DEFAULT 'msdbooking.com',
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`uuid`, `aInc`, `f_name`, `l_name`, `full_name`, `user_name`, `password`, `mobile`, `email`, `created_by`, `created_at`, `updated_by`, `updated_at`, `ps_un`, `narration`, `type`) VALUES
('60edea8c-48de-11e9-a446-14c2130d0834', 2, 'jai', 'pandey', 'jai pandey', 'jai', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9479275716', 'jaishankarpandey329@gmail.com', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-17 23:29:15', '8605', '2019-03-26 16:48:05', '1234', 'http://localhost/il-fs/', 1),
('8605c690-2d55-11e9-8642-14c2130d0834', 1, 'Administrator', '', 'Administrator ', 'admin', '8cb2237d0679ca88db6464eac60da96345513964', '9479275716', 'jaishankarpandey329@gmail.com', '', '0000-00-00 00:00:00', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 23:24:01', '12345', 'http://localhost/il-fs/', 0),
('ea54e582-4fb8-11e9-b0ab-705a0f3cbc10', 3, 'jai', 'pandey', 'jai     pandey', 'admin34', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9479275716', 'jaishankarpandey329@gmail.com', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 16:48:43', '0', '0000-00-00 00:00:00', '1234', 'http://localhost/il-fs/', 0);

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
  `updated_by` varchar(50) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `gst_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`uuid`, `ainc`, `name`, `mobile`, `email`, `created_at`, `created_by`, `updated_at`, `updated_by`, `address`, `gst_no`) VALUES
('749a6422-4af8-11e9-a446-14c2130d0834', 2, 'jai shankar pandey', '9479275716', 'jaishankarpandey329@gmail.com', '2019-03-20 15:40:58', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 16:16:27', '8605c690-2d55-11e9-8642-14c2130d0834', 'green ', 'sfggdfg'),
('bcdf0a14-48ee-11e9-a446-14c2130d0834', 1, 'jai shankar pa', '9479275716', 'erjspcse2@gmail.com', '2019-03-18 01:26:21', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 16:08:11', '8605c690-2d55-11e9-8642-14c2130d0834', 'jsp address', 'sdgfsdg'),
('d101566e-4ff1-11e9-a446-14c2130d0834', 3, 'yasho', '88888888', 'yasho@gmail.com', '2019-03-26 23:36:02', '8605c690-2d55-11e9-8642-14c2130d0834', NULL, NULL, '143, address ', '78561234549');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `uuid` varchar(50) NOT NULL,
  `hsn_id` varchar(50) NOT NULL,
  `a_inc` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`uuid`, `hsn_id`, `a_inc`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('729c3445-493c-11e9-aa7a-705a0f3cbc10', '7f79f564-48f1-11e9-a446-14c2130d0834', 1, 'prod1', '2019-03-18 10:42:38', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 15:07:17', '8605c690-2d55-11e9-8642-14c2130d0834'),
('e2d49916-4aea-11e9-a446-14c2130d0834', '7f79f564-48f1-11e9-a446-14c2130d0834', 2, 'prod2', '2019-03-20 14:03:49', '8605c690-2d55-11e9-8642-14c2130d0834', '2019-03-26 23:27:22', '8605c690-2d55-11e9-8642-14c2130d0834'),
('f538d296-4ff1-11e9-a446-14c2130d0834', 'e3902db4-4ff1-11e9-a446-14c2130d0834', 3, 'product123', '2019-03-26 23:37:03', '8605c690-2d55-11e9-8642-14c2130d0834', NULL, NULL);

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
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `ainc` (`ainc`);

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
  MODIFY `ainc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ainc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `a_inc` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `aInc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `ainc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `a_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 05:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prj_auction_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `bid_id` int(9) NOT NULL,
  `bid_amt` double(10,2) NOT NULL,
  `pid` int(9) NOT NULL,
  `bid` int(9) NOT NULL,
  `bid_date` datetime NOT NULL,
  `bid_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(9) NOT NULL,
  `bname` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `comp_mob` varchar(12) NOT NULL,
  `comp_type` varchar(150) NOT NULL,
  `comp_prod` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `dist` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(25) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `regdate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `paystatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_deposit`
--

CREATE TABLE `buyer_deposit` (
  `bd_id` int(9) NOT NULL,
  `amt` double(10,2) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `tracking_id` varchar(150) NOT NULL,
  `pay_mode` varchar(45) NOT NULL,
  `bid` int(9) NOT NULL,
  `trans_date` date NOT NULL,
  `pay_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_doc`
--

CREATE TABLE `buyer_doc` (
  `doc_id` int(9) NOT NULL,
  `imgpath` varchar(500) NOT NULL,
  `photo_date` date NOT NULL,
  `photo_status` tinyint(1) NOT NULL,
  `bid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(9) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `paddress` varchar(500) NOT NULL,
  `area` varchar(500) NOT NULL,
  `size` varchar(100) NOT NULL,
  `variety` varchar(100) NOT NULL,
  `production` varchar(100) NOT NULL,
  `sugar` varchar(100) NOT NULL,
  `farm_reg` varchar(50) NOT NULL,
  `residue_free_check` varchar(50) NOT NULL,
  `residue_result` varchar(50) NOT NULL,
  `global_gap` varchar(50) NOT NULL,
  `pdesc` varchar(500) NOT NULL,
  `base_rate` double(10,2) NOT NULL,
  `bid_start_date` timestamp NULL DEFAULT NULL,
  `bid_end_date` timestamp NULL DEFAULT NULL,
  `vdopath` varchar(500) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `regdate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE `product_photo` (
  `photo_id` int(11) NOT NULL,
  `imgpath` varchar(70) NOT NULL,
  `photo_date` date NOT NULL,
  `photo_status` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sid` int(9) NOT NULL,
  `sname` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `dist` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `regdate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `paystatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_deposit`
--

CREATE TABLE `seller_deposit` (
  `sd_id` int(9) NOT NULL,
  `amt` double(10,2) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `tracking_id` varchar(150) NOT NULL,
  `pay_mode` varchar(45) NOT NULL,
  `sid` int(9) NOT NULL,
  `trans_date` date NOT NULL,
  `pay_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_doc`
--

CREATE TABLE `seller_doc` (
  `sdoc_id` int(9) NOT NULL,
  `imgpath` varchar(250) NOT NULL,
  `photo_date` date NOT NULL,
  `photo_status` tinyint(1) NOT NULL,
  `sid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(45) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `regdate` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `mobile`, `pass`, `last_login_date`, `last_login_ip`, `latitude`, `longitude`, `regdate`, `status`) VALUES
(2587, 'Manali', '8530398292', '$2y$10$mnt1TKcfg2m7qL0nZKiITe/9QwVHsFsyC4zBRFnam7AKqsqLCHvDe', '2023-02-21 09:58:27', '::1', '18.5565184', '73.8459648', '2023-02-21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `buyer_deposit`
--
ALTER TABLE `buyer_deposit`
  ADD PRIMARY KEY (`bd_id`),
  ADD KEY `uid` (`bid`);

--
-- Indexes for table `buyer_doc`
--
ALTER TABLE `buyer_doc`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `euser_id` (`pid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `seller_deposit`
--
ALTER TABLE `seller_deposit`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `uid` (`sid`);

--
-- Indexes for table `seller_doc`
--
ALTER TABLE `seller_doc`
  ADD PRIMARY KEY (`sdoc_id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bid_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_deposit`
--
ALTER TABLE `buyer_deposit`
  MODIFY `bd_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_doc`
--
ALTER TABLE `buyer_doc`
  MODIFY `doc_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sid` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_deposit`
--
ALTER TABLE `seller_deposit`
  MODIFY `sd_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_doc`
--
ALTER TABLE `seller_doc`
  MODIFY `sdoc_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2588;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seller_doc`
--
ALTER TABLE `seller_doc`
  ADD CONSTRAINT `seller_doc_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `seller` (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

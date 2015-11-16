-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 03:39 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `digitalgaia_willlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` longtext NOT NULL,
  `address` longtext NOT NULL,
  `developer` longtext NOT NULL,
  `status` longtext NOT NULL,
  `financing` longtext NOT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_finance`
--

CREATE TABLE IF NOT EXISTS `asset_finance` (
  `asset_finance_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `bank` longtext NOT NULL,
  `monthly_payment` decimal(10,2) NOT NULL,
  `acc_no` varchar(500) NOT NULL,
  `MRTA` varchar(500) NOT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `doc_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_legal`
--

CREATE TABLE IF NOT EXISTS `asset_legal` (
  `asset_legal_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `sp_name` longtext NOT NULL,
  `sp_phone` varchar(500) NOT NULL,
  `sp_email` varchar(500) NOT NULL,
  `finance_name` longtext NOT NULL,
  `finance_phone` varchar(500) NOT NULL,
  `finance_email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_transaction`
--

CREATE TABLE IF NOT EXISTS `asset_transaction` (
  `asset_transaction_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `buyer_seller` longtext NOT NULL,
  `buyer_seller_contact` varchar(500) NOT NULL,
  `lawyer` longtext NOT NULL,
  `lawyer_contact` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `cash_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` longtext NOT NULL,
  `bank_place` longtext NOT NULL,
  `account_no` varchar(500) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `name` longtext NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `next_email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trusty`
--

CREATE TABLE IF NOT EXISTS `trusty` (
  `trusty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trusty_name` varchar(500) NOT NULL,
  `trusty_phone` varchar(500) NOT NULL,
  `trusty_email` varchar(500) NOT NULL,
  `trusty_address` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE IF NOT EXISTS `wish` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `cash_id` int(11) NOT NULL,
  `wish_type` longtext NOT NULL,
  `wish_address` longtext NOT NULL,
  `wish_acc` varchar(500) NOT NULL,
  `wish_dolist` longtext NOT NULL,
  `wish_notify` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `asset_finance`
--
ALTER TABLE `asset_finance`
  ADD PRIMARY KEY (`asset_finance_id`);

--
-- Indexes for table `asset_legal`
--
ALTER TABLE `asset_legal`
  ADD PRIMARY KEY (`asset_legal_id`);

--
-- Indexes for table `asset_transaction`
--
ALTER TABLE `asset_transaction`
  ADD PRIMARY KEY (`asset_transaction_id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`cash_id`);

--
-- Indexes for table `trusty`
--
ALTER TABLE `trusty`
  ADD PRIMARY KEY (`trusty_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asset_finance`
--
ALTER TABLE `asset_finance`
  MODIFY `asset_finance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asset_legal`
--
ALTER TABLE `asset_legal`
  MODIFY `asset_legal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asset_transaction`
--
ALTER TABLE `asset_transaction`
  MODIFY `asset_transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `cash_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trusty`
--
ALTER TABLE `trusty`
  MODIFY `trusty_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

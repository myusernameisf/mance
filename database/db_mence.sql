-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 10:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mence`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `acc_ID` int(11) NOT NULL,
  `acc_firstname` varchar(150) NOT NULL,
  `acc_lastname` varchar(150) NOT NULL,
  `acc_email` varchar(150) NOT NULL,
  `acc_password` varchar(200) NOT NULL,
  `acc_access` varchar(50) NOT NULL DEFAULT 'STAFF',
  `acc_isTrash` int(11) NOT NULL,
  `acc_datecreated` date NOT NULL DEFAULT current_timestamp(),
  `acc_logo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`acc_ID`, `acc_firstname`, `acc_lastname`, `acc_email`, `acc_password`, `acc_access`, `acc_isTrash`, `acc_datecreated`, `acc_logo`) VALUES
(5, 'MANCE', 'BICYCLE', 'mancebikeshop@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'ADMIN', 0, '2023-09-12', 1),
(13, 'EPH', 'ARCEO', 'rerem456@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 0, '2023-10-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblexpenses`
--

CREATE TABLE `tblexpenses` (
  `exp_ID` int(11) NOT NULL,
  `exp_productCode` varchar(150) NOT NULL,
  `exp_productName` varchar(200) NOT NULL,
  `exp_receiptno` varchar(100) NOT NULL,
  `exp_supplier` varchar(150) NOT NULL,
  `exp_qty` int(11) NOT NULL,
  `exp_unitprice` double NOT NULL,
  `exp_isTrash` int(11) NOT NULL,
  `exp_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `inv_ID` int(11) NOT NULL,
  `inv_prdCode` varchar(80) NOT NULL,
  `inv_name` varchar(150) NOT NULL,
  `inv_prdCategory` varchar(150) NOT NULL,
  `inv_uom` varchar(100) NOT NULL,
  `inv_qty` int(11) NOT NULL,
  `inv_unitprice` double NOT NULL,
  `inv_sellingprice` double NOT NULL,
  `inv_lowstocknotif` int(11) NOT NULL DEFAULT 10,
  `inv_description` longtext NOT NULL,
  `inv_isTrash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpos`
--

CREATE TABLE `tblpos` (
  `pos_ID` int(11) NOT NULL,
  `pos_invID` int(11) NOT NULL,
  `pos_qty` int(11) NOT NULL,
  `pos_unitprice` double NOT NULL,
  `pos_sellingPrice` double NOT NULL,
  `pos_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `prd_ID` int(11) NOT NULL,
  `prd_code` varchar(80) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_uom` varchar(100) NOT NULL,
  `prd_category` longtext NOT NULL,
  `prd_isTrash` int(11) NOT NULL,
  `prd_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblremarks`
--

CREATE TABLE `tblremarks` (
  `remarks_ID` int(11) NOT NULL,
  `remarks_notes` longtext NOT NULL,
  `remarks_userID` int(11) NOT NULL,
  `remarks_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreturncustomer`
--

CREATE TABLE `tblreturncustomer` (
  `rc_ID` int(11) NOT NULL,
  `rc_itemID` int(11) NOT NULL,
  `rc_remarks` longtext NOT NULL,
  `rc_isTrash` int(11) NOT NULL,
  `rc_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnsupplier`
--

CREATE TABLE `tblreturnsupplier` (
  `rs_ID` int(11) NOT NULL,
  `rs_date` date NOT NULL DEFAULT current_timestamp(),
  `rs_qty` int(11) NOT NULL,
  `rs_isTrash` int(11) NOT NULL,
  `rs_invID` int(11) NOT NULL,
  `rs_remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `sale_ID` int(11) NOT NULL,
  `sale_receiptno` int(11) NOT NULL,
  `sale_userID` int(11) NOT NULL,
  `sale_date` varchar(50) NOT NULL,
  `sale_customer` varchar(120) NOT NULL,
  `sale_pm` varchar(50) NOT NULL,
  `sale_paid` double NOT NULL,
  `sale_isTrash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsalesitem`
--

CREATE TABLE `tblsalesitem` (
  `item_ID` int(11) NOT NULL,
  `item_prdCode` varchar(150) NOT NULL,
  `item_prdName` varchar(150) NOT NULL,
  `item_receiptno` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_returnQty` int(11) NOT NULL,
  `item_unitprice` double NOT NULL,
  `item_sellingPrice` double NOT NULL,
  `item_isTrash` int(11) NOT NULL,
  `item_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`acc_ID`);

--
-- Indexes for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  ADD PRIMARY KEY (`exp_ID`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`inv_ID`);

--
-- Indexes for table `tblpos`
--
ALTER TABLE `tblpos`
  ADD PRIMARY KEY (`pos_ID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`prd_ID`);

--
-- Indexes for table `tblremarks`
--
ALTER TABLE `tblremarks`
  ADD PRIMARY KEY (`remarks_ID`);

--
-- Indexes for table `tblreturncustomer`
--
ALTER TABLE `tblreturncustomer`
  ADD PRIMARY KEY (`rc_ID`);

--
-- Indexes for table `tblreturnsupplier`
--
ALTER TABLE `tblreturnsupplier`
  ADD PRIMARY KEY (`rs_ID`);

--
-- Indexes for table `tblsales`
--
ALTER TABLE `tblsales`
  ADD PRIMARY KEY (`sale_ID`);

--
-- Indexes for table `tblsalesitem`
--
ALTER TABLE `tblsalesitem`
  ADD PRIMARY KEY (`item_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  MODIFY `exp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `inv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblpos`
--
ALTER TABLE `tblpos`
  MODIFY `pos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `prd_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblremarks`
--
ALTER TABLE `tblremarks`
  MODIFY `remarks_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblreturncustomer`
--
ALTER TABLE `tblreturncustomer`
  MODIFY `rc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblreturnsupplier`
--
ALTER TABLE `tblreturnsupplier`
  MODIFY `rs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsalesitem`
--
ALTER TABLE `tblsalesitem`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

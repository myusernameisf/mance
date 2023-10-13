-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 11:23 AM
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
(13, 'EPH', 'ARCEO', 'rerem456@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 1, '2023-10-11', 1),
(14, 'ROXANNE`', 'VILLAREZ', 'roxanne@email.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 0, '2023-10-13', 5),
(15, 'JOYCE', 'ANGULO', 'joyceangulo@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 0, '2023-10-13', 5),
(16, 'DENNIS', 'BERGADO', 'dennisbergado@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 0, '2023-10-13', 5),
(17, 'JOSHUA', 'BORROMEO', 'joshuaborromeo@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 0, '2023-10-13', 1),
(18, 'MARK', 'MOLINA', 'markmolina@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'STAFF', 0, '2023-10-13', 1);

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

--
-- Dumping data for table `tblexpenses`
--

INSERT INTO `tblexpenses` (`exp_ID`, `exp_productCode`, `exp_productName`, `exp_receiptno`, `exp_supplier`, `exp_qty`, `exp_unitprice`, `exp_isTrash`, `exp_date`) VALUES
(60, '111-001', 'SHIMANO SORA STI 9SPEED', '1', 'BIKE BIKE BIKE', 20, 4500, 0, '2023-10-13'),
(61, '111-002', 'MOUNTAINPEAK VULCAN FRAME', '2', 'BIKE BIKE BIKE', 20, 5500, 0, '2023-10-13'),
(62, '111-003', 'SAGMIT HANDLEBAR', '3', 'BIKE BIKE BIKE', 50, 700, 0, '2023-10-13'),
(63, '111-004', 'MAXXIS TIRES', '4', 'BIKE BIKE', 48, 600, 0, '2023-10-13'),
(64, '111-005', 'SAGMIT CRANKSET', '5', 'BIKE BIKE', 20, 1800, 0, '2023-10-13'),
(65, '111-006', 'SHIMANO BUTTOM BRACKETS', '6', 'BIKE', 15, 1800, 0, '2023-10-13'),
(66, '111-007', 'SHIMANO CASSETTE', '7', 'BIKE', 20, 1000, 0, '2023-10-13'),
(67, '111-007', 'SHIMANO CASSETTE', '01', 'BIKE', 5, 1000, 0, '2023-10-13');

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
  `prd_unitprice` double NOT NULL,
  `prd_sellingprice` double NOT NULL,
  `prd_lowstock` int(11) NOT NULL,
  `prd_qty` int(11) NOT NULL,
  `prd_desc` longtext NOT NULL,
  `prd_isTrash` int(11) NOT NULL,
  `prd_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`prd_ID`, `prd_code`, `prd_name`, `prd_uom`, `prd_category`, `prd_unitprice`, `prd_sellingprice`, `prd_lowstock`, `prd_qty`, `prd_desc`, `prd_isTrash`, `prd_date`) VALUES
(26, '111-001', 'SHIMANO SORA STI 9SPEED', 'BOX', 'Bike Parts', 4500, 5000, 10, 18, '', 0, '2023-10-13'),
(27, '111-002', 'MOUNTAINPEAK VULCAN FRAME', 'PCS', 'BIKE PARTS', 5500, 6000, 10, 20, 'CANDY RED', 0, '2023-10-13'),
(28, '111-003', 'SAGMIT HANDLEBAR', 'PCS', 'BIKE PARTS', 700, 800, 10, 47, '', 0, '2023-10-13'),
(29, '111-004', 'MAXXIS TIRES', 'PCS', 'BIKE PARTS', 600, 700, 10, 43, 'TAN WALL', 0, '2023-10-13'),
(30, '111-005', 'SAGMIT CRANKSET', 'PCS', 'BIKE PARTS', 1800, 2000, 10, 16, 'RED/BLACK', 0, '2023-10-13'),
(31, '111-006', 'SHIMANO BUTTOM BRACKETS', 'PCS', 'BIKE PARTS', 1800, 2000, 10, 11, '', 0, '2023-10-13'),
(32, '111-007', 'SHIMANO CASSETTE', 'PCS', 'BIKE PARTS', 1000, 1200, 10, 21, '', 0, '2023-10-13');

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

--
-- Dumping data for table `tblreturncustomer`
--

INSERT INTO `tblreturncustomer` (`rc_ID`, `rc_itemID`, `rc_remarks`, `rc_isTrash`, `rc_date`) VALUES
(6, 60, 'SCRATCH', 0, '2023-10-13'),
(7, 59, 'DEFECTIVE', 0, '2023-10-13'),
(8, 54, ' the tire has been broken', 0, '2023-10-13'),
(9, 50, 'the teeth of the cassette have defect', 0, '2023-10-13'),
(10, 51, 'defective and scratch', 0, '2023-10-13'),
(11, 58, 'dents of crank arm', 0, '2023-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnsupplier`
--

CREATE TABLE `tblreturnsupplier` (
  `rs_ID` int(11) NOT NULL,
  `rs_date` date NOT NULL DEFAULT current_timestamp(),
  `rs_supplier` varchar(100) NOT NULL,
  `rs_qty` int(11) NOT NULL,
  `rs_isTrash` int(11) NOT NULL,
  `rs_invID` int(11) NOT NULL,
  `rs_remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreturnsupplier`
--

INSERT INTO `tblreturnsupplier` (`rs_ID`, `rs_date`, `rs_supplier`, `rs_qty`, `rs_isTrash`, `rs_invID`, `rs_remarks`) VALUES
(10, '2023-10-13', 'BIKE', 2, 0, 32, 'SCRATCH'),
(11, '2023-10-13', 'BIKE BIKE BIKE', 1, 0, 30, 'SCRATCH'),
(12, '2023-10-13', 'BIKE BIKE BIKE', 1, 0, 28, 'DENTS'),
(13, '2023-10-13', 'BIKE BIKE BIKE ', 1, 0, 26, 'DEFECTIVE'),
(14, '2023-10-13', 'BIKE BIKE BIKE', 1, 0, 30, 'SCRATCH');

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

--
-- Dumping data for table `tblsales`
--

INSERT INTO `tblsales` (`sale_ID`, `sale_receiptno`, `sale_userID`, `sale_date`, `sale_customer`, `sale_pm`, `sale_paid`, `sale_isTrash`) VALUES
(30, 1, 5, '2023-10-13', 'ROXANE', 'CASH', 6000, 0),
(31, 2, 5, '2023-10-13', 'RUSSEL', 'CASH', 2000, 0),
(32, 3, 5, '2023-10-13', 'EPH', 'CASH', 1000, 0),
(33, 4, 5, '2023-10-13', 'JOYCE', 'CASH', 6000, 0),
(34, 5, 5, '2023-10-13', 'DENNIS', 'CASH', 5500, 0),
(35, 6, 5, '2023-10-13', 'RUSSEL', 'CASH', 1500, 0),
(36, 7, 5, '2023-10-13', 'MARK', 'CASH', 800, 0),
(37, 8, 5, '2023-10-13', '', 'CASH', 5000, 1);

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
-- Dumping data for table `tblsalesitem`
--

INSERT INTO `tblsalesitem` (`item_ID`, `item_prdCode`, `item_prdName`, `item_receiptno`, `item_qty`, `item_returnQty`, `item_unitprice`, `item_sellingPrice`, `item_isTrash`, `item_date`) VALUES
(50, '111-007', 'SHIMANO CASSETTE', 1, 1, 1, 1000, 1200, 0, '2023-10-13'),
(51, '111-006', 'SHIMANO BUTTOM BRACKETS', 1, 2, 1, 1800, 2000, 0, '2023-10-13'),
(52, '111-006', 'SHIMANO BUTTOM BRACKETS', 2, 1, 0, 1800, 2000, 0, '2023-10-13'),
(53, '111-003', 'SAGMIT HANDLEBAR', 3, 1, 0, 700, 800, 0, '2023-10-13'),
(54, '111-004', 'MAXXIS TIRES', 4, 1, 1, 600, 700, 0, '2023-10-13'),
(55, '111-001', 'SHIMANO SORA STI 9SPEED', 4, 1, 0, 4500, 5000, 0, '2023-10-13'),
(56, '111-007', 'SHIMANO CASSETTE', 5, 1, 0, 1000, 1200, 0, '2023-10-13'),
(57, '111-006', 'SHIMANO BUTTOM BRACKETS', 5, 1, 0, 1800, 2000, 0, '2023-10-13'),
(58, '111-005', 'SAGMIT CRANKSET', 5, 1, 1, 1800, 2000, 0, '2023-10-13'),
(59, '111-004', 'MAXXIS TIRES', 6, 2, 2, 600, 700, 0, '2023-10-13'),
(60, '111-003', 'SAGMIT HANDLEBAR', 7, 1, 1, 700, 800, 0, '2023-10-13'),
(61, '111-005', 'SAGMIT CRANKSET', 8, 1, 0, 1800, 3000, 1, '2023-10-13'),
(62, '111-004', 'MAXXIS TIRES', 8, 2, 0, 600, 900, 1, '2023-10-13');

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
  MODIFY `acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  MODIFY `exp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tblpos`
--
ALTER TABLE `tblpos`
  MODIFY `pos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `prd_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblreturncustomer`
--
ALTER TABLE `tblreturncustomer`
  MODIFY `rc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblreturnsupplier`
--
ALTER TABLE `tblreturnsupplier`
  MODIFY `rs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblsalesitem`
--
ALTER TABLE `tblsalesitem`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 07:32 AM
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
(5, 'MANCE', 'BICYCLE', 'mancebikeshop@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'ADMIN', 0, '2023-09-12', 5),
(10, 'YUKIS', 'USHIRO', 'yukiushiro@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'STAFF', 0, '2023-09-13', 5),
(11, 'REGINO', 'ASUNSCION', 'regino@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'STAFF', 0, '2023-09-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblexpenses`
--

CREATE TABLE `tblexpenses` (
  `exp_ID` int(11) NOT NULL,
  `exp_receiptno` varchar(100) NOT NULL,
  `exp_supplier` varchar(150) NOT NULL,
  `exp_qty` int(11) NOT NULL,
  `exp_unitprice` double NOT NULL,
  `exp_productID` int(11) NOT NULL,
  `exp_isTrash` int(11) NOT NULL,
  `exp_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblexpenses`
--

INSERT INTO `tblexpenses` (`exp_ID`, `exp_receiptno`, `exp_supplier`, `exp_qty`, `exp_unitprice`, `exp_productID`, `exp_isTrash`, `exp_date`) VALUES
(15, '1001', 'DENNIS BERGADO', 30, 1000, 4, 0, '2023-09-15'),
(16, '1001', 'EJAY BAWE', 80, 10000, 6, 0, '2023-09-13'),
(17, '1003', 'EJAY BAWE', 25, 1000, 4, 0, '2023-09-14'),
(18, '1002', 'JOSHUA BORROMEO', 2, 5000, 7, 0, '2023-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `inv_ID` int(11) NOT NULL,
  `inv_productID` int(11) NOT NULL,
  `inv_prdCode` varchar(80) NOT NULL,
  `inv_brandname` varchar(150) NOT NULL,
  `inv_name` varchar(150) NOT NULL,
  `inv_qty` int(11) NOT NULL,
  `inv_unitprice` double NOT NULL,
  `inv_sellingprice` double NOT NULL,
  `inv_lowstocknotif` int(11) NOT NULL DEFAULT 10,
  `inv_isTrash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`inv_ID`, `inv_productID`, `inv_prdCode`, `inv_brandname`, `inv_name`, `inv_qty`, `inv_unitprice`, `inv_sellingprice`, `inv_lowstocknotif`, `inv_isTrash`) VALUES
(4, 4, '000-000-001', 'SHIMANO', 'ALTUS', 46, 1000, 2000, 20, 0),
(5, 6, '000-000-002', 'SHIMANO', 'DEORE', 78, 10000, 15000, 10, 0),
(6, 7, '000-000-001', 'NIKE', 'JORDAN', 2, 5000, 8500, 0, 0);

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

--
-- Dumping data for table `tblpos`
--

INSERT INTO `tblpos` (`pos_ID`, `pos_invID`, `pos_qty`, `pos_unitprice`, `pos_sellingPrice`, `pos_userID`) VALUES
(23, 5, 8, 10000, 15000, 5),
(24, 5, 1, 10000, 15000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `prd_ID` int(11) NOT NULL,
  `prd_code` varchar(80) NOT NULL,
  `prd_brandname` varchar(100) NOT NULL,
  `prd_name` varchar(100) NOT NULL,
  `prd_category` longtext NOT NULL,
  `prd_isTrash` int(11) NOT NULL,
  `prd_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`prd_ID`, `prd_code`, `prd_brandname`, `prd_name`, `prd_category`, `prd_isTrash`, `prd_date`) VALUES
(4, '000-000-001', 'SHIMANO', 'ALTUS', 'shifter', 0, '2023-09-15'),
(5, '', 'LTWOO', 'R6', '8 speed', 0, '2023-09-15'),
(6, '', 'SHIMANO', 'DEORE', '10 speed', 0, '2023-09-15'),
(7, '000-000-001', 'NIKE', 'JORDAN', 'shoes', 0, '2023-09-18');

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

--
-- Dumping data for table `tblremarks`
--

INSERT INTO `tblremarks` (`remarks_ID`, `remarks_notes`, `remarks_userID`, `remarks_date`) VALUES
(7, '', 5, '2023-09-17');

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
(8, 1, 5, '2023-09-15', 'MARK JOSEPH', 'CASH', 10000, 0),
(9, 2, 5, '2023-09-15', 'IRISH DELA CRUZ', 'CASH', 40000, 0),
(10, 1001, 10, '2023-09-18', 'ROMMEL ARCEO', 'CASH', 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsalesitem`
--

CREATE TABLE `tblsalesitem` (
  `item_ID` int(11) NOT NULL,
  `item_receiptno` int(11) NOT NULL,
  `item_invID` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_unitprice` double NOT NULL,
  `item_sellingPrice` double NOT NULL,
  `item_isTrash` int(11) NOT NULL,
  `item_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsalesitem`
--

INSERT INTO `tblsalesitem` (`item_ID`, `item_receiptno`, `item_invID`, `item_qty`, `item_unitprice`, `item_sellingPrice`, `item_isTrash`, `item_date`) VALUES
(8, 1, 4, 5, 1000, 2000, 0, '2023-08-15'),
(9, 2, 4, 3, 1000, 2000, 0, '2023-09-15'),
(10, 2, 5, 2, 10000, 15000, 0, '2023-09-15'),
(11, 1001, 4, 1, 1000, 2000, 0, '2023-09-18');

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
  MODIFY `acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  MODIFY `exp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `inv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpos`
--
ALTER TABLE `tblpos`
  MODIFY `pos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `prd_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblremarks`
--
ALTER TABLE `tblremarks`
  MODIFY `remarks_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblsalesitem`
--
ALTER TABLE `tblsalesitem`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

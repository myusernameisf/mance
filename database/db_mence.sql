-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 03:10 AM
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

--
-- Dumping data for table `tblexpenses`
--

INSERT INTO `tblexpenses` (`exp_ID`, `exp_productCode`, `exp_productName`, `exp_receiptno`, `exp_supplier`, `exp_qty`, `exp_unitprice`, `exp_isTrash`, `exp_date`) VALUES
(54, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', '5543658', 'PATRICK LINGAHAN', 30, 5000, 0, '2023-10-12'),
(55, '2023-001-0012', 'MSI GTX 1050TI', '35435', 'CHRIS', 10, 3000, 0, '2023-10-12'),
(56, '213124-4534i690768-545sfa', 'ACER LP2Y4K 24\" 75HZ', '1242', 'EPH ARCEO', 20, 7500, 0, '2023-10-12'),
(57, '012-0221-221', 'LOGITECH G304', '5555', 'PATRICK', 55, 2100, 0, '2023-10-12'),
(58, '2202304', 'REALME C35', '1111', 'REALME', 50, 8500, 0, '2023-10-12');

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
(21, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', 'PCS', 'KEYBOARD', 5000, 4000, 20, 27, 'sample description', 0, '2023-10-12'),
(22, '2023-001-0012', 'MSI GTX 1050TI', 'PCS', 'video card', 3000, 3500, 10, 0, 'this is a video card', 0, '2023-10-12'),
(23, '213124-4534i690768-545sfa', 'ACER LP2Y4K 24\" 75HZ', 'PCS', 'monitor', 7500, 9500, 10, 11, 'monitor', 0, '2023-10-12'),
(24, '012-0221-221', 'LOGITECH G304', 'PCS', 'mouse', 2100, 3000, 10, 0, 'mouse', 0, '2023-10-12'),
(25, '2202304', 'REALME C35', 'PCS', 'cellphone', 8500, 9500, 10, 0, 'cp', 1, '2023-10-12');

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
(2, 28, 'faulty', 1, '2023-10-11'),
(3, 27, 'faultyyyy', 1, '2023-10-11'),
(4, 46, 'sira daw', 0, '2023-10-13');

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

--
-- Dumping data for table `tblreturnsupplier`
--

INSERT INTO `tblreturnsupplier` (`rs_ID`, `rs_date`, `rs_qty`, `rs_isTrash`, `rs_invID`, `rs_remarks`) VALUES
(3, '2023-10-11', 5, 1, 19, 'faulty others cant click'),
(4, '2023-10-12', 5, 0, 21, 'sira 5'),
(5, '2023-10-12', 45, 0, 25, ''),
(6, '2023-10-12', 50, 0, 24, ''),
(7, '2023-10-13', 2, 0, 23, 'sira defective');

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
(23, 1, 5, '2023-10-12', '', 'CASH', 26000, 0),
(24, 2, 5, '2023-10-12', '', 'CASH', 90000, 0),
(25, 3, 5, '2023-10-12', '', 'BANK TRANSFER', 58000, 0),
(26, 4, 5, '2023-10-12', '', 'CASH', 5000, 0),
(27, 5, 5, '2023-10-13', '', 'CASH', 14000, 1),
(28, 6, 5, '2023-10-13', '', 'CASH', 14000, 0);

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
(31, '2023-001-0012', 'MSI GTX 1050TI', 1, 4, 0, 3000, 3500, 0, '2023-10-12'),
(32, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', 1, 3, 0, 5000, 6000, 0, '2023-10-12'),
(35, '213124-4534i690768-545sfa', 'ACER LP2Y4K 24\" 75HZ', 2, 2, 0, 7500, 9500, 0, '2023-10-12'),
(36, '2023-001-0012', 'MSI GTX 1050TI', 2, 3, 0, 3000, 3500, 0, '2023-10-12'),
(37, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', 2, 5, 0, 5000, 4000, 0, '2023-10-12'),
(38, '2202304', 'REALME C35', 3, 2, 0, 8500, 9500, 0, '2023-10-12'),
(39, '012-0221-221', 'LOGITECH G304', 3, 1, 0, 2100, 3000, 0, '2023-10-12'),
(40, '213124-4534i690768-545sfa', 'ACER LP2Y4K 24\" 75HZ', 3, 3, 0, 7500, 9500, 0, '2023-10-12'),
(41, '2023-001-0012', 'MSI GTX 1050TI', 3, 1, 0, 3000, 3500, 0, '2023-10-12'),
(42, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', 3, 1, 0, 5000, 4000, 0, '2023-10-12'),
(43, '2023-001-0012', 'MSI GTX 1050TI', 4, 1, 0, 3000, 5000, 0, '2023-10-12'),
(44, '213124-4534i690768-545sfa', 'ACER LP2Y4K 24\" 75HZ', 5, 1, 0, 7500, 9500, 1, '2023-10-13'),
(45, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', 5, 1, 0, 5000, 4000, 1, '2023-10-13'),
(46, '2023-001-001', 'TECWARE PHANTOM ELITE 84 KEYS', 6, 1, 1, 5000, 4000, 0, '2023-10-13'),
(47, '213124-4534i690768-545sfa', 'ACER LP2Y4K 24\" 75HZ', 6, 1, 0, 7500, 9500, 0, '2023-10-13');

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
  MODIFY `acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  MODIFY `exp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tblpos`
--
ALTER TABLE `tblpos`
  MODIFY `pos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `prd_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblreturncustomer`
--
ALTER TABLE `tblreturncustomer`
  MODIFY `rc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblreturnsupplier`
--
ALTER TABLE `tblreturnsupplier`
  MODIFY `rs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblsalesitem`
--
ALTER TABLE `tblsalesitem`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

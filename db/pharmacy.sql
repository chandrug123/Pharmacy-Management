-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 06:51 PM
-- Server version: 8.0.39
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `USERNAME` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `PASSWORD` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`USERNAME`, `PASSWORD`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int NOT NULL,
  `NAME` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `AGE` int NOT NULL,
  `DATE_OF_BIRTH` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` bigint NOT NULL,
  `ALTERNATIVE_NUMBER` bigint NOT NULL,
  `FATHER_NAME` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `FATHER_OCCUPATION` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `MOTHER_NAME` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `MOTHER_OCCUPATION` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `ADDRESS1` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `ADDRESS2` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `ADHAR_CARD_NUMBER` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `GIVEN_CARD` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `DISTRICT` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `TALUK` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `VILLEGE` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `DOCTOR_NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `INVOICE_ID` int NOT NULL,
  `NET_TOTAL` double NOT NULL DEFAULT '0',
  `INVOICE_DATE` date DEFAULT NULL,
  `CUSTOMER_ID` int NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `TOTAL_DISCOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE_ID`, `NET_TOTAL`, `INVOICE_DATE`, `CUSTOMER_ID`, `TOTAL_AMOUNT`, `TOTAL_DISCOUNT`) VALUES
(1, 30, '2021-10-19', 14, 30, 0),
(2, 2626, '2021-10-19', 6, 2626, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `ID` int NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `PACKING` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `GENERIC_NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `SUPPLIER_NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `medicine_type` varchar(45) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`ID`, `NAME`, `PACKING`, `GENERIC_NAME`, `SUPPLIER_NAME`, `medicine_type`) VALUES
(1, 'Crosin', '2', '22', 'Desai Pharma', 'Powder'),
(2, 'Crosin', '45', 'A', 'Hmrxfmgtmt', 'Others'),
(3, 'Dolo', '45', 'A', 'ggg', 'Tablet'),
(4, 'Dolo', '11', 'A', 'ggg', 'Tablet'),
(5, 'Med New', '12', 'Ag', 'gjj', 'Tablet'),
(6, 'Med New2', '12', 'Agg', 'gjjk', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_stock`
--

CREATE TABLE `medicines_stock` (
  `ID` int NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `BATCH_ID` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `EXPIRY_DATE` varchar(10) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `QUANTITY` int NOT NULL,
  `MRP` double NOT NULL,
  `RATE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines_stock`
--

INSERT INTO `medicines_stock` (`ID`, `NAME`, `BATCH_ID`, `EXPIRY_DATE`, `QUANTITY`, `MRP`, `RATE`) VALUES
(1, 'Crosin', 'CROS12', '12/34', 2, 2626, 26),
(2, 'Gelusil', 'G327', '12/42', 5, 15, 12),
(3, 'Dolo 650', 'DOLO327', '01/23', 3, 30, 24),
(4, 'Nicip Plus', 'NI325', '05/22', 3, 32.65, 28);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `SUPPLIER_NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `INVOICE_NUMBER` int NOT NULL,
  `VOUCHER_NUMBER` int NOT NULL,
  `PURCHASE_DATE` varchar(10) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `PAYMENT_STATUS` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`SUPPLIER_NAME`, `INVOICE_NUMBER`, `VOUCHER_NUMBER`, `PURCHASE_DATE`, `TOTAL_AMOUNT`, `PAYMENT_STATUS`) VALUES
('Desai Pharma', 987, 1, '2024-10-22', 50, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `ID` int NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` varchar(10) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `ADDRESS` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `NAME`, `EMAIL`, `CONTACT_NUMBER`, `ADDRESS`) VALUES
(1, 'Desai Pharma', 'desai@gmail.com', '9948724242', 'Mahim East'),
(2, 'BDPL PHARMA', 'bdpl@gmail.com', '8645632963', 'Santacruz West'),
(9, 'Kiran Pharma', 'kiranpharma@gmail.com', '7638683637', 'Andheri East'),
(10, 'Rsrnrnrndnn', 'ydj', '3737355538', '3fndfndfndndfnfdndfn'),
(11, 'Dfnsfndfndf', 'fnsn', '5475734385', 'Ndnss4yrhrhdhrdhrh'),
(12, 'SS Distributors', 'ssdis@gamil.com', '3867868752', 'Matunga West'),
(13, 'Avceve', 'ehh', '3466626226', 'Eteh266266262'),
(14, 'Hrshrhrjher', 'dzgdg', '4636347335', 'Rhrswjrnswjn'),
(15, 'Hmrxfmgtmt', 'trmtrm gm tr', '6553838835', '38ejtdjtdxetjdt'),
(20, 'Dtdxtkmtdshrrhhsrjrs', 'trmtrm gm tr', '6553838835', '38ejtdjtdxetjdt'),
(23, 'Fndn', 'nena ena', '3462462642', 'Ebsbsdbsdndsnsdfns'),
(24, 'Fndnbrwh', 'nena ena', '3462462642', 'Ebsbsdbsdndsnsdfns'),
(25, 'Jnentjrtj', 'nena ena', '3462462642', 'Ebsbsdbsdndsnsdfns'),
(26, 'Jerthjrtjtjr', 'nena ena', '3462462642', 'Ebsbsdbsdndsnsdfns'),
(28, 'Gahgkakbvkv', 'nena ena', '3462462642', 'Ebsbsdbsdndsnsdfns'),
(29, 'Hywhwhrhdw', 'nena ena', '3462462642', 'Ebsbsdbsdndsnsdfns'),
(30, 'Sup', 'sup@email.com', '9876543212', 'Supplier Address'),
(31, 'Supplier New', 'supemail', '9876543219', 'Supplier Address'),
(32, 'Supddd', 'ddd', '3333333333', 'Rttr Gtrtr Gtrgtr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`INVOICE_ID`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BATCH_ID` (`BATCH_ID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`VOUCHER_NUMBER`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `INVOICE_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `VOUCHER_NUMBER` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

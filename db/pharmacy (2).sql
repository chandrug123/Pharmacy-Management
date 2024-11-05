-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 07:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `USERNAME` varchar(50) COLLATE utf16_bin NOT NULL,
  `PASSWORD` varchar(50) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin DEFAULT NULL,
  `contact_number` varchar(15) COLLATE utf16_bin DEFAULT NULL,
  `alternative_number` varchar(15) COLLATE utf16_bin DEFAULT NULL,
  `role` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf16_bin DEFAULT NULL,
  `IS_LOGGED_IN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`USERNAME`, `PASSWORD`, `email`, `contact_number`, `alternative_number`, `role`, `created_by`, `created_time`, `id`, `name`, `address`, `IS_LOGGED_IN`) VALUES
('admin', 'admin', NULL, NULL, NULL, 'admin', NULL, NULL, 1, NULL, NULL, 0),
('chandru', 'chandru', 'chandru@gmail.com', '2222', '3333', 'Staff', NULL, NULL, 3, 'Chandru', 'BEHIND BUSSTAND\r\nNEAR GIRLS HOSTEL 25TH WARD', 0),
('test', 'test', 'test@test.com', '2323232323', '2323232323', 'Pharmacy', NULL, NULL, 4, 'Test', 'BEHIND BUSSTAND\r\nNEAR GIRLS HOSTEL 25TH WARD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `AGE` int(11) NOT NULL,
  `DATE_OF_BIRTH` varchar(100) COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` bigint(20) NOT NULL,
  `ALTERNATIVE_NUMBER` bigint(20) NOT NULL,
  `FATHER_NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `FATHER_OCCUPATION` varchar(100) COLLATE utf16_bin NOT NULL,
  `MOTHER_NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `MOTHER_OCCUPATION` varchar(100) COLLATE utf16_bin NOT NULL,
  `ADDRESS1` varchar(100) COLLATE utf16_bin NOT NULL,
  `ADDRESS2` varchar(100) COLLATE utf16_bin NOT NULL,
  `ADHAR_CARD_NUMBER` varchar(100) COLLATE utf16_bin NOT NULL,
  `GIVEN_CARD` varchar(100) COLLATE utf16_bin NOT NULL,
  `DISTRICT` varchar(100) COLLATE utf16_bin NOT NULL,
  `TALUK` varchar(100) COLLATE utf16_bin NOT NULL,
  `VILLEGE` varchar(100) COLLATE utf16_bin NOT NULL,
  `DOCTOR_NAME` varchar(100) COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `NAME`, `AGE`, `DATE_OF_BIRTH`, `CONTACT_NUMBER`, `ALTERNATIVE_NUMBER`, `FATHER_NAME`, `FATHER_OCCUPATION`, `MOTHER_NAME`, `MOTHER_OCCUPATION`, `ADDRESS1`, `ADDRESS2`, `ADHAR_CARD_NUMBER`, `GIVEN_CARD`, `DISTRICT`, `TALUK`, `VILLEGE`, `DOCTOR_NAME`) VALUES
(7, 'CHANDRASHEKHAR GANDH', 23, '2024-11-13', 1212121212, 1212121212, 'test fatrher', 'Government Employee', 'fcgf', 'Teacher/Educator', 'BEHIND BUSSTAND\r\nNEAR GIRLS HOSTEL 25TH WARD', 'BEHIND BUSSTAND\r\nNEAR GIRLS HOSTEL 25TH WARD', '121212121212', 'Gold', 'Koppal', 'Gangavathi', 'GV1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `INVOICE_ID` int(11) NOT NULL,
  `NET_TOTAL` double NOT NULL DEFAULT 0,
  `INVOICE_DATE` date DEFAULT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `TOTAL_DISCOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE_ID`, `NET_TOTAL`, `INVOICE_DATE`, `CUSTOMER_ID`, `TOTAL_AMOUNT`, `TOTAL_DISCOUNT`) VALUES
(1, 30, '2021-10-19', 14, 30, 0),
(2, 2626, '2021-10-19', 6, 2626, 0),
(3, 2656, '2024-10-09', 1, 2656, 0),
(4, 2626, '2024-10-28', 1, 2626, 0),
(5, 30, '2024-11-01', 1, 30, 0),
(6, 60, '2024-11-05', 7, 60, 0),
(7, 29.4, '2024-11-05', 7, 30, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `PACKING` varchar(20) COLLATE utf16_bin NOT NULL,
  `GENERIC_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `SUPPLIER_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `medicine_type` varchar(45) COLLATE utf16_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`ID`, `NAME`, `PACKING`, `GENERIC_NAME`, `SUPPLIER_NAME`, `medicine_type`) VALUES
(12, 'Dolo', '10', 'Dolo 650', 'Kiran Pharma', 'Tablet'),
(13, 'Dolpo', '4', 'Dolo', 'Kiran Pharma', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_stock`
--

CREATE TABLE `medicines_stock` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `BATCH_ID` varchar(20) COLLATE utf16_bin NOT NULL,
  `EXPIRY_DATE` varchar(10) COLLATE utf16_bin NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `MRP` double NOT NULL,
  `RATE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines_stock`
--

INSERT INTO `medicines_stock` (`ID`, `NAME`, `BATCH_ID`, `EXPIRY_DATE`, `QUANTITY`, `MRP`, `RATE`) VALUES
(1, 'Crosin', 'CROS12', '12/34', 0, 2626, 26),
(2, 'Gelusil', 'G327', '12/42', 1, 15, 12),
(3, 'Dolo', 'DOLO327', '01/26', 0, 30, 24),
(4, 'Nicip Plus', 'NI325', '05/22', 3, 32.65, 28);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `SUPPLIER_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `INVOICE_NUMBER` int(11) NOT NULL,
  `VOUCHER_NUMBER` int(11) NOT NULL,
  `PURCHASE_DATE` varchar(10) COLLATE utf16_bin NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `PAYMENT_STATUS` varchar(20) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`SUPPLIER_NAME`, `INVOICE_NUMBER`, `VOUCHER_NUMBER`, `PURCHASE_DATE`, `TOTAL_AMOUNT`, `PAYMENT_STATUS`) VALUES
('Desai Pharma', 987, 1, '2024-10-22', 50, 'PAID'),
('Kiran Pharma', 243334, 2, '2024-10-28', 529, 'PAID'),
('Kiran Pharma', 2433342, 3, '2024-10-28', 529, 'PAID'),
('Hmrxfmgtmt', 3243, 4, '2024-10-28', 1150, 'PAID'),
('Kiran Pharma', 6565, 5, '2024-10-28', 200, 'PAID'),
('Kiran Pharma', 223, 6, '2024-11-01', 460, 'PAID'),
('Kiran Pharma', 323233, 7, '2024-11-04', 50, 'PAID'),
('Kiran Pharma', 24443, 8, '2024-11-03', 300, 'PAID'),
('Kiran Pharma', 2323, 9, '2024-11-04', 66, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `INVOICE_NUMBER` int(11) NOT NULL,
  `MEDICINE_NAME` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `BATCH_ID` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `EXPIRY_DATE` date DEFAULT NULL,
  `QUANTITY` int(11) NOT NULL,
  `MRP` decimal(10,2) NOT NULL,
  `DISCOUNT` decimal(5,2) DEFAULT 0.00,
  `TOTAL` decimal(10,2) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATED_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALE_ID`, `CUSTOMER_ID`, `INVOICE_NUMBER`, `MEDICINE_NAME`, `BATCH_ID`, `EXPIRY_DATE`, `QUANTITY`, `MRP`, `DISCOUNT`, `TOTAL`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 7, 7, 'Dolo', 'DOLO327', '0000-00-00', 1, '30.00', '2.00', '29.40', '2024-11-05 06:29:29', '2024-11-05 06:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `EMAIL` varchar(100) COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` varchar(10) COLLATE utf16_bin NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `NAME`, `EMAIL`, `CONTACT_NUMBER`, `ADDRESS`) VALUES
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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `VOUCHER_NUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

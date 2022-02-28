-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 12:53 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waka_cmec_hospital`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `card`
--
CREATE TABLE `card` (
`PID` int(11)
,`Item` varchar(500)
,`Supplier` varchar(200)
,`QtyReceived` varchar(50)
,`price` int(11)
,`Total` double
,`ReceiveNo` int(11)
,`dateReceived` timestamp
,`RNO` int(11)
,`Rdate` timestamp
,`QtyI` varchar(50)
,`Balance` double
);

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consultationID` int(11) NOT NULL,
  `cno` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `mod` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `diseaseID` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `age` varchar(15) NOT NULL,
  `other_details` text,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptom`
--

CREATE TABLE `disease_symptom` (
  `DSID` int(11) NOT NULL,
  `diseaseID` int(11) NOT NULL,
  `symptomID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `added` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `labTestID` int(11) NOT NULL,
  `testID` int(11) NOT NULL,
  `patientNo` varchar(50) NOT NULL,
  `visitNo` varchar(50) NOT NULL,
  `result` varchar(10000) DEFAULT NULL,
  `doc` int(11) NOT NULL,
  `test_date` timestamp NULL DEFAULT NULL,
  `lab` int(11) DEFAULT NULL,
  `results_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `patientNo` varchar(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `id` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `town` varchar(200) NOT NULL,
  `added` timestamp NULL DEFAULT NULL,
  `staff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosed_disease`
--

CREATE TABLE `patient_diagnosed_disease` (
  `PDDID` int(11) NOT NULL,
  `patientNo` varchar(200) NOT NULL,
  `visitNo` varchar(200) NOT NULL,
  `dod` timestamp NULL DEFAULT NULL,
  `diseaseID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosed_symptoms`
--

CREATE TABLE `patient_diagnosed_symptoms` (
  `PDSID` int(11) NOT NULL,
  `patientNo` varchar(30) NOT NULL,
  `visitNo` varchar(30) NOT NULL,
  `date_diagnosed` timestamp NULL DEFAULT NULL,
  `symptomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `visitNo` varchar(10) NOT NULL,
  `patientNo` varchar(15) NOT NULL,
  `dop` timestamp NULL DEFAULT NULL,
  `rateID` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `staffID` int(11) NOT NULL,
  `service` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pharmacy_card`
--
CREATE TABLE `pharmacy_card` (
`PID` int(11)
,`Item` varchar(500)
,`Supplier` varchar(200)
,`QtyReceived` varchar(50)
,`price` int(11)
,`Total` double
,`ReceiveNo` int(11)
,`dateReceived` timestamp
,`RNO` int(11)
,`Rdate` timestamp
,`QtyI` varchar(50)
,`Balance` double
);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_productsupplied`
--

CREATE TABLE `pharmacy_productsupplied` (
  `PPSID` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `Qty` varchar(50) NOT NULL,
  `item_qty` varchar(10) NOT NULL,
  `item_price` varchar(20) NOT NULL,
  `Bal1` int(11) NOT NULL,
  `Bal2` int(11) NOT NULL,
  `contract` varchar(100) NOT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `delivery` varchar(50) DEFAULT NULL,
  `received` timestamp NULL DEFAULT NULL,
  `PID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pharmacy_product_stock`
--
CREATE TABLE `pharmacy_product_stock` (
`PPSID` int(11)
,`SID` int(11)
,`PID` int(11)
,`dateReceived` timestamp
,`Qty` varchar(50)
,`Bal1` int(11)
,`Bal2` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pharmacy_receipt`
--
CREATE TABLE `pharmacy_receipt` (
`ProductID` int(11)
,`name` varchar(500)
,`Capacity` varchar(10)
,`PPSID` int(11)
,`receiptNo` int(11)
,`price` int(11)
,`Qty` varchar(50)
,`item_qty` varchar(10)
,`item_price` varchar(20)
,`Contract` varchar(100)
,`invoice` varchar(50)
,`delivery` varchar(50)
,`received` timestamp
,`Supplier` varchar(200)
,`Officer` varchar(61)
);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_request`
--

CREATE TABLE `pharmacy_request` (
  `PRID` int(11) NOT NULL,
  `RNO` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `QtyR` varchar(50) NOT NULL,
  `Iuse` varchar(10000) NOT NULL,
  `Designation` varchar(300) NOT NULL,
  `QtyI` varchar(50) DEFAULT NULL,
  `Bal` varchar(20) DEFAULT NULL,
  `Rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Idate` timestamp NULL DEFAULT NULL,
  `No` int(11) DEFAULT NULL,
  `bar` int(11) NOT NULL,
  `pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pharmacy_stock1`
--
CREATE TABLE `pharmacy_stock1` (
`PID` int(11)
,`maxpostid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_supply`
--

CREATE TABLE `pharmacy_supply` (
  `PHID` int(11) NOT NULL,
  `RNO` int(11) NOT NULL,
  `Qty` varchar(50) NOT NULL,
  `item_qty` varchar(10) NOT NULL,
  `item_price` varchar(20) NOT NULL,
  `received` timestamp NULL DEFAULT NULL,
  `Bal1` int(11) NOT NULL,
  `Bal2` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pharmacy_voucher`
--
CREATE TABLE `pharmacy_voucher` (
`PID` int(11)
,`name` varchar(500)
,`Capacity` varchar(10)
,`Department` varchar(50)
,`RNO` int(11)
,`Officer` varchar(61)
,`IssuingOfficer` varchar(61)
,`Designation` varchar(300)
,`QtyR` varchar(50)
,`QtyI` varchar(50)
,`Iuse` varchar(10000)
,`Idate` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescriptionID` int(11) NOT NULL,
  `patientNo` varchar(200) NOT NULL,
  `visitNo` varchar(100) NOT NULL,
  `productID` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `qty` varchar(5) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `Bal` varchar(20) DEFAULT NULL,
  `date_purchased` timestamp NULL DEFAULT NULL,
  `RNO` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_details`
--

CREATE TABLE `prescription_details` (
  `PDID` int(11) NOT NULL,
  `patientNo` varchar(200) NOT NULL,
  `visitNo` varchar(200) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `Capacity` varchar(10) DEFAULT NULL,
  `qty` varchar(10) NOT NULL,
  `price` varchar(10) DEFAULT NULL,
  `minimum` varchar(11) DEFAULT NULL,
  `pharmacy_minimum` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productsupplied`
--

CREATE TABLE `productsupplied` (
  `PSID` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `Qty` varchar(50) NOT NULL,
  `item_qty` varchar(10) NOT NULL,
  `item_price` varchar(20) NOT NULL,
  `Bal1` int(11) NOT NULL,
  `Bal2` int(11) NOT NULL,
  `contract` varchar(100) NOT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `delivery` varchar(50) DEFAULT NULL,
  `received` timestamp NULL DEFAULT NULL,
  `PID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_stock`
--
CREATE TABLE `product_stock` (
`PSID` int(11)
,`SID` int(11)
,`PID` int(11)
,`dateReceived` timestamp
,`Qty` varchar(50)
,`Bal1` int(11)
,`Bal2` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rateID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rateID`, `name`, `cost`) VALUES
(1, 'Consultation', 30),
(2, 'Lab Test', 100);

-- --------------------------------------------------------

--
-- Stand-in structure for view `receipt`
--
CREATE TABLE `receipt` (
`ProductID` int(11)
,`name` varchar(500)
,`Capacity` varchar(10)
,`PSID` int(11)
,`receiptNo` int(11)
,`price` int(11)
,`Qty` varchar(50)
,`item_qty` varchar(10)
,`item_price` varchar(20)
,`Contract` varchar(100)
,`invoice` varchar(50)
,`delivery` varchar(50)
,`received` timestamp
,`Supplier` varchar(200)
,`Officer` varchar(61)
);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RID` int(11) NOT NULL,
  `RNO` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `QtyR` varchar(50) NOT NULL,
  `Iuse` varchar(10000) NOT NULL,
  `Designation` varchar(300) NOT NULL,
  `QtyI` varchar(50) DEFAULT NULL,
  `Bal` varchar(20) DEFAULT NULL,
  `Rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Idate` timestamp NULL DEFAULT NULL,
  `No` int(11) DEFAULT NULL,
  `bar` int(11) NOT NULL,
  `pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staffNo` varchar(30) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` varchar(20) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffNo`, `pic`, `fname`, `lname`, `sname`, `gender`, `dob`, `id`, `phone`, `mail`, `category`, `pass`, `added`, `activation`) VALUES
(1, 'wrwe', '', 'HR', 'Kenn', 'Kenn', 'Kenn', '2015-12-13 21:00:00', '213432423343', '234252424', 'hr@mail.com', 'Human Resource Manager', '202cb962ac59075b964b07152d234b70', '2017-10-26 10:31:13', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock1`
--
CREATE TABLE `stock1` (
`PID` int(11)
,`maxpostid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contacts1` varchar(20) NOT NULL,
  `Contacts2` varchar(100) DEFAULT NULL,
  `mail` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `symptomID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `added` timestamp NULL DEFAULT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visitID` int(11) NOT NULL,
  `visitNo` varchar(10) NOT NULL,
  `patientNo` varchar(10) NOT NULL,
  `dov` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eov` timestamp NULL DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `level` int(11) NOT NULL,
  `bedNo` varchar(10) DEFAULT NULL,
  `staffID` int(11) NOT NULL,
  `doc` int(11) DEFAULT NULL,
  `pharmacy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `voucher`
--
CREATE TABLE `voucher` (
`PID` int(11)
,`name` varchar(500)
,`Capacity` varchar(10)
,`Department` varchar(50)
,`RNO` int(11)
,`Officer` varchar(61)
,`IssuingOfficer` varchar(61)
,`Designation` varchar(300)
,`QtyR` varchar(50)
,`QtyI` varchar(50)
,`Iuse` varchar(10000)
,`Idate` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `card`
--
DROP TABLE IF EXISTS `card`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `card`  AS  select `p`.`PID` AS `PID`,`p`.`name` AS `Item`,`s`.`name` AS `Supplier`,`l`.`Qty` AS `QtyReceived`,`l`.`price` AS `price`,(`l`.`Qty` * `l`.`price`) AS `Total`,`l`.`No` AS `ReceiveNo`,`l`.`received` AS `dateReceived`,`r`.`RNO` AS `RNO`,`r`.`Rdate` AS `Rdate`,`r`.`QtyI` AS `QtyI`,(`l`.`Qty` - `r`.`QtyI`) AS `Balance` from ((((`product` `p` left join `productsupplied` `l` on((`l`.`PID` = `p`.`PID`))) left join `supplier` `s` on((`l`.`SID` = `s`.`SID`))) left join `request` `r` on((`r`.`PID` = `p`.`PID`))) left join `staff` `t` on((`r`.`staffID` = `t`.`staffID`))) where ((`l`.`PSID` <> '') and (`r`.`QtyI` > 0)) order by `l`.`PSID`,`r`.`RID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `pharmacy_card`
--
DROP TABLE IF EXISTS `pharmacy_card`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pharmacy_card`  AS  select `p`.`PID` AS `PID`,`p`.`name` AS `Item`,`s`.`name` AS `Supplier`,`l`.`Qty` AS `QtyReceived`,`l`.`price` AS `price`,(`l`.`Qty` * `l`.`price`) AS `Total`,`l`.`No` AS `ReceiveNo`,`l`.`received` AS `dateReceived`,`r`.`RNO` AS `RNO`,`r`.`Rdate` AS `Rdate`,`r`.`QtyI` AS `QtyI`,(`l`.`Qty` - `r`.`QtyI`) AS `Balance` from ((((`product` `p` left join `pharmacy_productsupplied` `l` on((`l`.`PID` = `p`.`PID`))) left join `supplier` `s` on((`l`.`SID` = `s`.`SID`))) left join `pharmacy_request` `r` on((`r`.`PID` = `p`.`PID`))) left join `staff` `t` on((`r`.`staffID` = `t`.`staffID`))) where ((`l`.`PPSID` <> '') and (`r`.`QtyI` > 0)) order by `l`.`PPSID`,`r`.`PRID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `pharmacy_product_stock`
--
DROP TABLE IF EXISTS `pharmacy_product_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pharmacy_product_stock`  AS  select `s1`.`PPSID` AS `PPSID`,`s1`.`SID` AS `SID`,`s1`.`PID` AS `PID`,`s1`.`received` AS `dateReceived`,`s1`.`Qty` AS `Qty`,`s1`.`Bal1` AS `Bal1`,`s1`.`Bal2` AS `Bal2` from (`pharmacy_productsupplied` `s1` join `pharmacy_stock1` `s2` on((`s1`.`PPSID` = `s2`.`maxpostid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `pharmacy_receipt`
--
DROP TABLE IF EXISTS `pharmacy_receipt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pharmacy_receipt`  AS  select `p`.`PID` AS `ProductID`,`p`.`name` AS `name`,`p`.`Capacity` AS `Capacity`,`r`.`PPSID` AS `PPSID`,`r`.`No` AS `receiptNo`,`r`.`price` AS `price`,`r`.`Qty` AS `Qty`,`r`.`item_qty` AS `item_qty`,`r`.`item_price` AS `item_price`,`r`.`contract` AS `Contract`,`r`.`invoice` AS `invoice`,`r`.`delivery` AS `delivery`,`r`.`received` AS `received`,`s`.`name` AS `Supplier`,concat(`a`.`fname`,' ',`a`.`sname`) AS `Officer` from (((`product` `p` left join `pharmacy_productsupplied` `r` on((`r`.`PID` = `p`.`PID`))) left join `staff` `a` on((`r`.`staffID` = `a`.`staffID`))) left join `supplier` `s` on((`r`.`SID` = `s`.`SID`))) where (`r`.`PPSID` > 0) ;

-- --------------------------------------------------------

--
-- Structure for view `pharmacy_stock1`
--
DROP TABLE IF EXISTS `pharmacy_stock1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pharmacy_stock1`  AS  select `s1`.`PID` AS `PID`,max(`s1`.`PPSID`) AS `maxpostid` from `pharmacy_productsupplied` `s1` group by `s1`.`PID` ;

-- --------------------------------------------------------

--
-- Structure for view `pharmacy_voucher`
--
DROP TABLE IF EXISTS `pharmacy_voucher`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pharmacy_voucher`  AS  select `p`.`PID` AS `PID`,`p`.`name` AS `name`,`p`.`Capacity` AS `Capacity`,`t`.`category` AS `Department`,`r`.`RNO` AS `RNO`,concat(`t`.`fname`,' ',`t`.`sname`) AS `Officer`,concat(`s`.`fname`,' ',`s`.`sname`) AS `IssuingOfficer`,`r`.`Designation` AS `Designation`,`r`.`QtyR` AS `QtyR`,`r`.`QtyI` AS `QtyI`,`r`.`Iuse` AS `Iuse`,`r`.`Idate` AS `Idate` from (((`pharmacy_request` `r` left join `product` `p` on((`r`.`PID` = `p`.`PID`))) left join `staff` `t` on((`r`.`staffID` = `t`.`staffID`))) left join `staff` `s` on((`r`.`pro` = `s`.`staffID`))) where (`r`.`QtyI` > 0) ;

-- --------------------------------------------------------

--
-- Structure for view `product_stock`
--
DROP TABLE IF EXISTS `product_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_stock`  AS  select `s1`.`PSID` AS `PSID`,`s1`.`SID` AS `SID`,`s1`.`PID` AS `PID`,`s1`.`received` AS `dateReceived`,`s1`.`Qty` AS `Qty`,`s1`.`Bal1` AS `Bal1`,`s1`.`Bal2` AS `Bal2` from (`productsupplied` `s1` join `stock1` `s2` on((`s1`.`PSID` = `s2`.`maxpostid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `receipt`
--
DROP TABLE IF EXISTS `receipt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `receipt`  AS  select `p`.`PID` AS `ProductID`,`p`.`name` AS `name`,`p`.`Capacity` AS `Capacity`,`r`.`PSID` AS `PSID`,`r`.`No` AS `receiptNo`,`r`.`price` AS `price`,`r`.`Qty` AS `Qty`,`r`.`item_qty` AS `item_qty`,`r`.`item_price` AS `item_price`,`r`.`contract` AS `Contract`,`r`.`invoice` AS `invoice`,`r`.`delivery` AS `delivery`,`r`.`received` AS `received`,`s`.`name` AS `Supplier`,concat(`a`.`fname`,' ',`a`.`sname`) AS `Officer` from (((`product` `p` left join `productsupplied` `r` on((`r`.`PID` = `p`.`PID`))) left join `staff` `a` on((`r`.`staffID` = `a`.`staffID`))) left join `supplier` `s` on((`r`.`SID` = `s`.`SID`))) where (`r`.`PSID` > 0) ;

-- --------------------------------------------------------

--
-- Structure for view `stock1`
--
DROP TABLE IF EXISTS `stock1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock1`  AS  select `s1`.`PID` AS `PID`,max(`s1`.`PSID`) AS `maxpostid` from `productsupplied` `s1` group by `s1`.`PID` ;

-- --------------------------------------------------------

--
-- Structure for view `voucher`
--
DROP TABLE IF EXISTS `voucher`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `voucher`  AS  select `p`.`PID` AS `PID`,`p`.`name` AS `name`,`p`.`Capacity` AS `Capacity`,`t`.`category` AS `Department`,`r`.`RNO` AS `RNO`,concat(`t`.`fname`,' ',`t`.`sname`) AS `Officer`,concat(`s`.`fname`,' ',`s`.`sname`) AS `IssuingOfficer`,`r`.`Designation` AS `Designation`,`r`.`QtyR` AS `QtyR`,`r`.`QtyI` AS `QtyI`,`r`.`Iuse` AS `Iuse`,`r`.`Idate` AS `Idate` from (((`request` `r` left join `product` `p` on((`r`.`PID` = `p`.`PID`))) left join `staff` `t` on((`r`.`staffID` = `t`.`staffID`))) left join `staff` `s` on((`r`.`pro` = `s`.`staffID`))) where (`r`.`QtyI` > 0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consultationID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`diseaseID`);

--
-- Indexes for table `disease_symptom`
--
ALTER TABLE `disease_symptom`
  ADD PRIMARY KEY (`DSID`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`labTestID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD UNIQUE KEY `patientNo` (`patientNo`);

--
-- Indexes for table `patient_diagnosed_disease`
--
ALTER TABLE `patient_diagnosed_disease`
  ADD PRIMARY KEY (`PDDID`);

--
-- Indexes for table `patient_diagnosed_symptoms`
--
ALTER TABLE `patient_diagnosed_symptoms`
  ADD PRIMARY KEY (`PDSID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `pharmacy_productsupplied`
--
ALTER TABLE `pharmacy_productsupplied`
  ADD PRIMARY KEY (`PPSID`);

--
-- Indexes for table `pharmacy_request`
--
ALTER TABLE `pharmacy_request`
  ADD PRIMARY KEY (`PRID`);

--
-- Indexes for table `pharmacy_supply`
--
ALTER TABLE `pharmacy_supply`
  ADD PRIMARY KEY (`PHID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescriptionID`);

--
-- Indexes for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD PRIMARY KEY (`PDID`),
  ADD UNIQUE KEY `visitNo` (`visitNo`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `productsupplied`
--
ALTER TABLE `productsupplied`
  ADD PRIMARY KEY (`PSID`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rateID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `staffNo` (`staffNo`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SID`),
  ADD UNIQUE KEY `contacts1` (`contacts1`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`symptomID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visitID`),
  ADD UNIQUE KEY `visitNo` (`visitNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `diseaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disease_symptom`
--
ALTER TABLE `disease_symptom`
  MODIFY `DSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `labTestID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patient_diagnosed_disease`
--
ALTER TABLE `patient_diagnosed_disease`
  MODIFY `PDDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `patient_diagnosed_symptoms`
--
ALTER TABLE `patient_diagnosed_symptoms`
  MODIFY `PDSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pharmacy_productsupplied`
--
ALTER TABLE `pharmacy_productsupplied`
  MODIFY `PPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacy_request`
--
ALTER TABLE `pharmacy_request`
  MODIFY `PRID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pharmacy_supply`
--
ALTER TABLE `pharmacy_supply`
  MODIFY `PHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `prescription_details`
--
ALTER TABLE `prescription_details`
  MODIFY `PDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productsupplied`
--
ALTER TABLE `productsupplied`
  MODIFY `PSID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `symptomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

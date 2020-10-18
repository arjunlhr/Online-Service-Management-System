-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 08:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(60) COLLATE utf8_bin NOT NULL,
  `aemail` varchar(60) COLLATE utf8_bin NOT NULL,
  `apassword` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`aid`, `aname`, `aemail`, `apassword`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assignwork`
--

CREATE TABLE `assignwork` (
  `rno` int(11) NOT NULL,
  `assigninfo` text COLLATE utf8_bin NOT NULL,
  `assigndesc` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignname` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignadd1` text COLLATE utf8_bin NOT NULL,
  `assignadd2` text COLLATE utf8_bin NOT NULL,
  `assigncity` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignstate` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignzip` int(11) NOT NULL,
  `assignemail` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignmobile` int(11) NOT NULL,
  `assigntechnician` varchar(60) COLLATE utf8_bin NOT NULL,
  `assigndate` date NOT NULL,
  `assignrequestid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork`
--

INSERT INTO `assignwork` (`rno`, `assigninfo`, `assigndesc`, `assignname`, `assignadd1`, `assignadd2`, `assigncity`, `assignstate`, `assignzip`, `assignemail`, `assignmobile`, `assigntechnician`, `assigndate`, `assignrequestid`) VALUES
(19, 'cpu fan not working', 'power failure because cpu fan not working', 'Arjun Lahare', 'Dhimbergally Begumpura', 'Parvati nagar', 'Aurangabad', 'Maharashtra', 431001, 'arjunlhr820@gmail.com', 2147483647, 'banty', '2020-09-28', 23),
(20, 'cpu fan not working', 'power failure because cpu fan not working', 'Arjun Lahare', 'Dhimbergally Begumpura', 'Parvati nagar', 'Aurangabad', 'Maharashtra', 431001, 'arjunlhr820@gmail.com', 2147483647, 'banty', '2020-09-28', 23),
(21, 'mobile jack not working', 'mobi', 'Prasad Lahare', 'Begumpura aurangabad', 'Parvati nagar', 'Aurangabad', 'Maharashtra', 431001, 'prasad@gmail.com', 2147483647, 'prasad', '2020-10-04', 3),
(22, 'mouse not working', 'mouse ne patki khaya aur band hogaya', 'Arjun Lahare', 'sai mandir', 'sai mandir', 'aurangabad', 'maharashtra', 431001, 'arjunlhr820@gmail.com', 2147483647, 'Shubham Lachure', '2020-10-04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customber`
--

CREATE TABLE `customber` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customber`
--

INSERT INTO `customber` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(8, 'Arjun Lahare', 'Dhimbergally Begumpura', 'mouse', 5, 1000, 5000, '2020-10-02'),
(9, 'Arjun Lahare', 'Dhimbergally Begumpura', 'mouse', 5, 1000, 5000, '2020-10-03'),
(10, 'Arjun Lahare', 'Dhimbergally Begumpura', 'mouse', 5, 1000, 5000, '2020-10-03'),
(11, 'Prasad Lahare', 'Begumpura aurangabad', 'mouse', 1, 1000, 1000, '2020-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdateofpurchase` date NOT NULL,
  `pavailable` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pdateofpurchase`, `pavailable`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(6, 'mouse', '2020-09-30', 14, 20, 300, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `requester_db`
--

CREATE TABLE `requester_db` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requester_db`
--

INSERT INTO `requester_db` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(11, 'Arjun Lahare', 'arjunlhr820@gmail.com', 'arjunlahare'),
(16, 'Arjun Lahare', 'arjunlhr820@gmail.com', 'SSSS'),
(17, 'Shubham Lachure', 'shubhamlachure22@gmail.com', 'shubham');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest`
--

CREATE TABLE `submitrequest` (
  `submitrequestid` int(11) NOT NULL,
  `submitrequestinfo` text COLLATE utf8_bin NOT NULL,
  `submitrequestdesc` text COLLATE utf8_bin NOT NULL,
  `submitrequestname` varchar(60) COLLATE utf8_bin NOT NULL,
  `submitrequestadd1` text COLLATE utf8_bin NOT NULL,
  `submitrequestadd2` text COLLATE utf8_bin NOT NULL,
  `submitrequestcity` varchar(60) COLLATE utf8_bin NOT NULL,
  `submitrequeststate` varchar(60) COLLATE utf8_bin NOT NULL,
  `submitrequestzip` int(11) NOT NULL,
  `submitrequestemail` text COLLATE utf8_bin NOT NULL,
  `submitrequestmobile` bigint(20) NOT NULL,
  `submitrequestdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest`
--

INSERT INTO `submitrequest` (`submitrequestid`, `submitrequestinfo`, `submitrequestdesc`, `submitrequestname`, `submitrequestadd1`, `submitrequestadd2`, `submitrequestcity`, `submitrequeststate`, `submitrequestzip`, `submitrequestemail`, `submitrequestmobile`, `submitrequestdate`) VALUES
(5, 'cpu fan not working', 'power failure because cpu fan not working', 'Arjun Lahare', 'Dhimbergally Begumpura', 'Parvati nagar', 'Aurangabad', 'Maharashtra', 431001, 'arjunlhr820@gmail.com', 9923601376, '2020-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `empid` int(11) NOT NULL,
  `empname` varchar(60) COLLATE utf8_bin NOT NULL,
  `empcity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empmobile` bigint(20) NOT NULL,
  `empmail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`empid`, `empname`, `empcity`, `empmobile`, `empmail`) VALUES
(2, 'banty lahare', 'Aurangabad', 858585, 'bantylahare@gmail.com'),
(3, 'prasad', 'Aurangabad', 9168065096, 'prasad@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `assignwork`
--
ALTER TABLE `assignwork`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customber`
--
ALTER TABLE `customber`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `requester_db`
--
ALTER TABLE `requester_db`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest`
--
ALTER TABLE `submitrequest`
  ADD PRIMARY KEY (`submitrequestid`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignwork`
--
ALTER TABLE `assignwork`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customber`
--
ALTER TABLE `customber`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requester_db`
--
ALTER TABLE `requester_db`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submitrequest`
--
ALTER TABLE `submitrequest`
  MODIFY `submitrequestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

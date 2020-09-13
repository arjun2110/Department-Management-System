-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 03:09 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feed`
--

-- --------------------------------------------------------

--
-- Table structure for table `allosub`
--

CREATE TABLE `allosub` (
  `Subcode` int(20) NOT NULL,
  `Subname` varchar(50) NOT NULL,
  `staffid` int(20) NOT NULL,
  `Teacher` varchar(50) NOT NULL,
  `Scheme` varchar(50) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `Sem` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allosub`
--

INSERT INTO `allosub` (`Subcode`, `Subname`, `staffid`, `Teacher`, `Scheme`, `Dept`, `Sem`) VALUES
(102030, 'PROGRAMMING C', 25, 'shinde', 'G', 'INFORMATION TECHNOLOGY', 4),
(123456, 'OOP', 25, 'shinde', 'G', 'INFORMATION TECHNOLOGY', 4),
(145632, 'MAP', 24, 'raju', 'G', 'INFORMATION TECHNOLOGY', 4),
(444919, 'INSTRUMENT', 22, 'jadhav', 'G', 'INSTRUMENTATION', 5);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` int(3) NOT NULL,
  `city` varchar(20) NOT NULL,
  `stateid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `city`, `stateid`) VALUES
(1601, 'city a', 241),
(1602, 'city b', 241),
(1603, 'city c', 241),
(1604, 'city d', 242),
(1605, 'city e', 242),
(1606, 'city f', 242),
(1607, 'city g', 243),
(1608, 'city h', 243);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `count` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`count`, `Username`) VALUES
('5', ''),
('3', '3125469875'),
('1', '3256985624');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cid` int(10) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cid`, `country`) VALUES
(1, 'country1'),
(2, 'country2'),
(3, 'country3'),
(4, 'country4');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `Dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`Dept_name`) VALUES
('COMPUTER TECHNOLOGY'),
('ELECTRONICS & TELECOMMUNICATION'),
('INFORMATION TECHNOLOGY'),
('INSTRUMENTATION'),
('MECHANICAL');

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE `excel` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excel`
--

INSERT INTO `excel` (`fname`, `lname`) VALUES
('fname ', 'lname'),
('my', 'name'),
('adas', 'sdfsd'),
('adas', 'sdfsd'),
('adas', 'sdfsd'),
('fuibu', 'INFORMATION TECHNOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_data`
--

CREATE TABLE `feedback_data` (
  `Username` varchar(30) NOT NULL,
  `Subname` varchar(30) NOT NULL,
  `First` varchar(30) NOT NULL,
  `Second` varchar(30) NOT NULL,
  `Third` varchar(30) NOT NULL,
  `Fourth` varchar(30) NOT NULL,
  `Fifth` varchar(30) NOT NULL,
  `Sixth` varchar(30) NOT NULL,
  `Seventh` varchar(30) NOT NULL,
  `Eighth` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_data`
--

INSERT INTO `feedback_data` (`Username`, `Subname`, `First`, `Second`, `Third`, `Fourth`, `Fifth`, `Sixth`, `Seventh`, `Eighth`) VALUES
('1425364262', 'PROGRAMMING C', '4', '3', '4', '5', '4', '5', '5', ''),
('1425364262', 'OOP', '5', '4', '5', '4', '5', '4', '5', 'DF'),
('1425364262', 'MAP', '4', '5', '4', '5', '4', '5', '4', 'FH');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `sem` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`ID`, `sem`, `description`, `filename`, `date`) VALUES
(23, 5, 'ds', '5.png', '2019-10-25 18:57:55'),
(29, 5, 'hello please fill this feedback form www.google.com', 'carsuosl example.txt', '2019-11-02 12:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `management_data`
--

CREATE TABLE `management_data` (
  `Username` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `First` varchar(50) NOT NULL,
  `Second` varchar(50) NOT NULL,
  `Third` varchar(50) NOT NULL,
  `Fourth` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management_data`
--

INSERT INTO `management_data` (`Username`, `Name`, `First`, `Second`, `Third`, `Fourth`) VALUES
('3256985624', 'Office', '5', '4', '5', '4'),
('3256985624', 'Library', '5', '4', '3', '4'),
('3256985624', 'Canteen', '5', '4', '4', '3'),
('3256985624', 'Toilet', '5', '4', '5', '4'),
('3256985624', 'Medical Room', '5', '4', '5', '4'),
('3256985624', 'mohite', '5', '4', '5', '4');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email_id` varchar(30) NOT NULL,
  `Dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`Username`, `Password`, `Email_id`, `Dept`) VALUES
('cm', 'usSczkaM', 'cm@gmail.com', 'COMPUTER TECHNOLOGY'),
('mohite', 'mohite123', 'It@gmail.com', 'INFORMATION TECHNOLOGY'),
('asda', 'Wn9jZsHR', 'msr@gmail.com', 'MECHANICAL');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Name` varchar(50) NOT NULL,
  `Sem` int(20) NOT NULL,
  `Subname` varchar(50) NOT NULL,
  `marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semid` int(10) NOT NULL,
  `sem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semid`, `sem`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Name` varchar(50) NOT NULL,
  `DEPARTMENT` varchar(50) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `GENDER` varchar(20) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Name`, `DEPARTMENT`, `PHONE_NUMBER`, `GENDER`, `EMAIL_ID`, `USERNAME`, `PASSWORD`) VALUES
('abhishek', 'INFORMATION TECHNOLOGY', '9861554644', 'Male', 'sadfss@gmail.com', 'sandy', '111111'),
('das', 'INFORMATION TECHNOLOGY', '9869568923', 'Male', 'asddd@gmail.com', 'dk', 'as'),
('jadhav', 'INSTRUMENTATION', '9878986548', 'Male', 'jd@gmail.com', 'jadhav', 'jadhav123'),
('jyoti miss', 'INFORMATION TECHNOLOGY', '6542546542', 'Female', 'j@gmail.com', 'Jyoti', 'jyoti'),
('rajan patil', 'INFORMATION TECHNOLOGY', '0702155464', 'Male', 'jjjjj@gmail.com', 'rajan', '123654'),
('raju', 'INFORMATION TECHNOLOGY', '9856985689', 'Male', 'pop@gmail.com', 'uio', '123456'),
('shinde', 'INFORMATION TECHNOLOGY', '9865986532', 'Male', 'sk@gmail.com', 'shinde', 'shinde123'),
('www', 'ELECTRONICS & TELECOMMUNICATION', '9876543217', 'Female', 'edda@gmaill.com', 'qwert', 'qwert');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `cid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `state`, `cid`) VALUES
(241, 'stateA', 1),
(242, 'stateB', 1),
(243, 'stateC', 1),
(244, 'stateD', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Name` varchar(50) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `Sem` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `UID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Name`, `Dept`, `Sem`, `Email`, `UID`, `Password`) VALUES
('wvb', 'INFORMATION TECHNOLOGY', 4, '', '1234256734', '6bSdoVed'),
('Swapnil', 'ELECTRONICS & TELECOMMUNICATION', 3, '', '1234567895', 'v1vxZqHd'),
('prajwal patil', 'INFORMATION TECHNOLOGY', 6, '', '1478529634', '6EUnedYU'),
('bvit', 'INFORMATION TECHNOLOGY', 4, '', '2343233243', 'TPrekyW5'),
('prashant', 'INFORMATION TECHNOLOGY', 2, '', '3245698715', 'RFy3NH86'),
('sumit supra', 'INFORMATION TECHNOLOGY', 5, '', '3256985624', 'HjGVtU84'),
('pratik', 'INFORMATION TECHNOLOGY', 1, '', '3652986574', '3Y4uLG4z'),
('chinmay', 'INFORMATION TECHNOLOGY', 3, '', '3659812548', 'AhNDcj9k'),
('jack', 'INFORMATION TECHNOLOGY', 5, '', '4569871234', 'I6epNtbD'),
('omkar', 'INFORMATION TECHNOLOGY', 6, '', '5623895623', 'WzkAhd3P'),
('ram', 'INFORMATION TECHNOLOGY', 4, '', '74185963625', 'QG5X5gRI');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `name` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `year` int(50) NOT NULL,
  `sem` int(50) NOT NULL,
  `dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subcode` int(20) NOT NULL,
  `Subname` varchar(50) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `Sem` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subcode`, `Subname`, `Dept`, `Sem`) VALUES
(102030, 'PROGRAMMING C', 'INFORMATION TECHNOLOGY', 4),
(123456, 'OOP', 'INFORMATION TECHNOLOGY', 4),
(145632, 'MAP', 'INFORMATION TECHNOLOGY', 4),
(152635, 'AJP', 'INFORMATION TECHNOLOGY', 6),
(163463, 'MATHS3', 'INFORMATION TECHNOLOGY', 3),
(222333, 'MECHANICS', 'MECHANICAL', 5),
(369852, 'MAN', 'COMPUTER TECHNOLOGY', 6),
(444919, 'INSTRUMENT', 'INSTRUMENTATION', 5);

-- --------------------------------------------------------

--
-- Table structure for table `temp_feed`
--

CREATE TABLE `temp_feed` (
  `Username` varchar(30) NOT NULL,
  `Subname` varchar(30) NOT NULL,
  `First` varchar(30) NOT NULL,
  `Second` varchar(30) NOT NULL,
  `Third` varchar(30) NOT NULL,
  `Fourth` varchar(30) NOT NULL,
  `Fifth` varchar(30) NOT NULL,
  `Sixth` varchar(30) NOT NULL,
  `Seventh` varchar(30) NOT NULL,
  `Eighth` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`Dept_name`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`Dept`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1609;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

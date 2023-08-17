-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 01:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bluecollar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclients`
--

CREATE TABLE `tblclients` (
  `ClientID` int(11) NOT NULL,
  `Fname` varchar(90) NOT NULL,
  `Lname` varchar(90) NOT NULL,
  `Address` text NOT NULL,
  `ContactNo` varchar(30) NOT NULL,
  `Status` varchar(90) NOT NULL DEFAULT 'Pending',
  `cUsername` varchar(90) NOT NULL,
  `cPassword` varchar(90) NOT NULL,
  `PicLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclients`
--

INSERT INTO `tblclients` (`ClientID`, `Fname`, `Lname`, `Address`, `ContactNo`, `Status`, `cUsername`, `cPassword`, `PicLoc`) VALUES
(1, 'Mustafa', 'Ahmed', 'Prestige, Ngong Road', '723266163', 'Confirmed', 'mussys', '1791243dbeab4c30439d9f7478a22ac530819933', ''),
(2, 'Asha', 'Jamal', 'Nairobi', '911', 'Confirmed', 'aisha', '81fe8bfe87576c3ecb22426f8e57847382917acf', 'client/car.jpg'),
(3, 'Uhuru', 'ruto', '179 Mertie Crossroad', '263', 'Confirmed', 'customer1', '8263328106ab337b8198c34842eec25da12c89d4', 'client/TEST 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FeedBackID` int(11) NOT NULL,
  `ClientID` int(90) NOT NULL DEFAULT 0,
  `FeedBack` text NOT NULL,
  `ServiceID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrating`
--

CREATE TABLE `tblrating` (
  `RatingID` int(11) NOT NULL,
  `RatingNo` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `ClientID` int(90) NOT NULL,
  `RateDate` date NOT NULL,
  `FeedBack` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `RequestID` int(11) NOT NULL,
  `Request` text NOT NULL,
  `Status` varchar(90) NOT NULL,
  `Remarks` text NOT NULL,
  `ClientID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL DEFAULT 0,
  `Viewed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblrequest`
--

INSERT INTO `tblrequest` (`RequestID`, `Request`, `Status`, `Remarks`, `ClientID`, `ServiceID`, `USERID`, `Viewed`) VALUES
(3, 'PLUMBER', 'Confirmed', '', 2, 4, 0, 1),
(4, 'budget 300kes', 'Confirmed', '', 3, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblserviceprovider`
--

CREATE TABLE `tblserviceprovider` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(90) NOT NULL,
  `ServiceContact` varchar(30) NOT NULL,
  `ServiceAddress` text NOT NULL,
  `lat` double NOT NULL DEFAULT 0,
  `lng` double NOT NULL DEFAULT 0,
  `Services` text NOT NULL,
  `EmailAddress` varchar(90) NOT NULL DEFAULT 'ma5755333@gmail.com',
  `spUsername` varchar(90) NOT NULL,
  `spPassword` varchar(90) NOT NULL,
  `Status` varchar(90) NOT NULL DEFAULT 'Confirmed',
  `PicLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblserviceprovider`
--

INSERT INTO `tblserviceprovider` (`ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`, `lat`, `lng`, `Services`, `EmailAddress`, `spUsername`, `spPassword`, `Status`, `PicLoc`) VALUES
(4, 'Kamau Mutiso', '0712345678', 'Nairobi, Kenya', 0, 0, 'PLUMBER', 'janobe@gmail.com', 'PLUMBER', '67fb02f8a93efe46568977dd109d443b46811210', 'Confirmed', 'services/MUTISO.jpg'),
(5, 'Eugine Wamalwa', '072345678', 'STAREHE', 0, 0, 'CAPENTER', 'janobe@gmail.com', 'CAPENTER', '92bb250fb4b12cc4fb0817f23415595bf73f2a58', 'Confirmed', 'services/WAMALWA.jpg'),
(6, 'Ann Waiguru', '07654323456', 'LANAGATA', 0, 0, 'MECHANIC', 'janobe@gmail.com', 'MECHANIC', 'a4f81fbe8889a6e4e9a7a4b2f3d91bd70ddea7ea', 'Confirmed', 'services/ANN WAIGURU.jpg'),
(7, 'Ngoroge Wa Stima', '076545678', 'KIKUYU', 0, 0, 'ELECTRICIAN', 'janobe@gmail.com', 'ELECTRICIAN', '5b38e010524446101dd9f45ca84d37d20d33bf08', 'Confirmed', 'services/NGORO.jpg'),
(8, 'Peter Marangi', '0798765432', 'CBD', 0, 0, 'PAINTER', 'janobe@gmail.com', 'PAINTER', 'f337b26b210feab31cb06381eb7718679e99da90', 'Confirmed', 'services/MARANGI.jpg'),
(9, 'Mama Makena', '07234567', 'RUIRU', 0, 0, 'GARDENER', 'janobe@gmail.com', 'GARDENER', '31e2db8a953e5b349c9bd5db4b08173218d562fb', 'Confirmed', 'services/MAKENA.jpg'),
(10, 'test', '723266163', 'Nairobi, Kenya', 36.1027394, -95.92606049999999, 'test', 'ma5755333@gmail.com', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Pending', ''),
(11, 'Kenya Yetu', '722222222', 'Syokimau', 0, 0, 'Interor design', 'blue@colllar.com', 'Kenya', 'f456eb5a21e8f84466481bb318956433dca7b3fb', 'Pending', 'services/img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` int(11) NOT NULL,
  `NAME` varchar(90) NOT NULL,
  `UEMAIL` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `PicLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `NAME`, `UEMAIL`, `PASS`, `TYPE`, `PicLoc`) VALUES
(15, 'sad', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'users/fb.jpg'),
(17, 'Admin Asha ', 'asha.001', '81fe8bfe87576c3ecb22426f8e57847382917acf', 'Staff', 'users/img.jpg'),
(18, 'ASHA', 'admin2', '32e3a82cbf1481d7f7603a4a7e533ed3856e4ca0', 'Staff', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclients`
--
ALTER TABLE `tblclients`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FeedBackID`);

--
-- Indexes for table `tblrating`
--
ALTER TABLE `tblrating`
  ADD PRIMARY KEY (`RatingID`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `tblserviceprovider`
--
ALTER TABLE `tblserviceprovider`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclients`
--
ALTER TABLE `tblclients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FeedBackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrating`
--
ALTER TABLE `tblrating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblserviceprovider`
--
ALTER TABLE `tblserviceprovider`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

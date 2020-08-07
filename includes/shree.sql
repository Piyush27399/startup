-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2020 at 01:02 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shree`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `msg` varchar(500) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resolveDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `userID`, `email`, `subject`, `msg`, `status`, `date`, `resolveDate`) VALUES
(2, 1, NULL, 'Costly Subscription', NULL, 'DELETEP', '2020-08-04 12:16:54', NULL),
(3, 1, NULL, 'Privacy Problems', NULL, 'DELETEP', '2020-08-04 12:17:20', NULL),
(4, 1, NULL, 'Costly Subscription', NULL, 'DELETEP', '2020-08-04 12:30:41', NULL),
(5, 1, NULL, 'Privacy Problems', NULL, 'DELETEP', '2020-08-05 10:25:10', NULL),
(6, 1, NULL, '1', 'hello', 'OPEN', '2020-08-05 10:36:18', NULL),
(7, 1, NULL, 'as', 'sasa', 'OPEN', '2020-08-05 10:37:21', NULL),
(8, 1, NULL, '1', '1', 'OPEN', '2020-08-05 16:28:16', NULL),
(9, 0, 'nihalblog25@gmail.com', '000', '12', 'OPEN', '2020-08-05 16:37:42', NULL),
(10, 0, 'nihalblog25@gmail.comm', '000', '12', 'OPEN', '2020-08-05 16:39:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `planID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `des` varchar(500) NOT NULL,
  `duration` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planID`, `type`, `des`, `duration`, `amount`) VALUES
(1, 'Standard', 'View Unlimited Profiles<br/>Various Search Filters<br/>Customer Support<br/>Duration : 180 Days', 180, 149),
(2, 'Pro', 'View Unlimited Profiles<br/>Various Search Filters<br/>Customer Support<br/>Duration : 360 Days', 360, 229);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `transID` varchar(200) NOT NULL,
  `planID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `duration` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `userID`, `transID`, `planID`, `type`, `duration`, `amount`, `sdate`, `edate`, `status`, `date`) VALUES
(1, 1, 'asas', 1, 'STANDARD', 180, 149, '2020-07-25', '2020-08-29', 'SUCCESS', '2020-07-26 11:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `mno` bigint(12) NOT NULL,
  `education` varchar(20) DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `maritalStatus` varchar(30) DEFAULT NULL,
  `fatherName` varchar(50) DEFAULT NULL,
  `motherName` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `expectations` varchar(500) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `regDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `mno`, `education`, `profession`, `height`, `age`, `dob`, `gender`, `maritalStatus`, `fatherName`, `motherName`, `address`, `city`, `state`, `pincode`, `expectations`, `image`, `regDate`) VALUES
(1, 'nihal bhovare', 'Bhovare', 'nihalblog25@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 9165525067, 'BE CSE', 'FREELANCER', 5.7, 22, '1998-08-29', 'MALE', 'DIVORCED', 'Mukesh Bhovare', ' Anita Bhovare', 'New Indira Colony', 'BURHANPUR1', 'Himachal Pradesh', '450331', 'NO\r\n\r\n', 'will-langenberg-8989-unsplash.jpg', '2020-07-31 00:00:00'),
(5, 'Piyush', 'Patil', 'patil@gmail.com', '4a48db6397a59b7aa1ed297337a5aea4', 9518572855, 'BCA', 'FREEANCER', 5.7, NULL, '1999-03-27', 'MALE', 'NEVER MARRIED', NULL, NULL, NULL, NULL, 'MAHaRASHTRA', NULL, NULL, NULL, '2020-08-02 11:53:59'),
(6, 'KALI', 'LINUX', NULL, 'c20ad4d76fe97759aa27a0c99bff6710', 8788126366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-07 12:27:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`planID`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Backup` ON SCHEDULE EVERY 1 MINUTE STARTS '2020-08-05 00:00:00' ENDS '2030-12-31 00:00:00' ON COMPLETION PRESERVE ENABLE DO SELECT * INTO OUTFILE 'backup/usersBackup.sql' FROM users$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

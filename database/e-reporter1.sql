-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 03:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-reporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Admin_Id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Admin_Id`, `FirstName`, `MiddleName`, `Surname`, `Username`, `Password`) VALUES
(55497730, 'Brian', 'Wanjala', 'Barasa', 'Brian.Barasa', 'Barasa7730');

-- --------------------------------------------------------

--
-- Table structure for table `electioncandidates`
--

CREATE TABLE `electioncandidates` (
  `FirstName` int(11) NOT NULL,
  `MiddleName` int(11) NOT NULL,
  `Surname` int(11) NOT NULL,
  `Sex` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Votes` int(11) NOT NULL,
  `Percentage` int(11) NOT NULL,
  `Elected` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pollingstations`
--

CREATE TABLE `pollingstations` (
  `PSCodes` varchar(20) NOT NULL,
  `PSNames` varchar(100) NOT NULL,
  `Registered_Voters` int(10) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Constituency` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Candidate` varchar(100) NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `pollingstations`
--
ALTER TABLE `pollingstations`
  ADD KEY `PSCodes` (`PSCodes`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

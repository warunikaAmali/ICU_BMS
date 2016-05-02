-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 05:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icu_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE IF NOT EXISTS `bed` (
  `bedNo` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(8) NOT NULL,
  `oxygenSypply` varchar(15) NOT NULL,
  `artificialRespiration` varchar(15) NOT NULL,
  `cardiacMonitor` varchar(15) NOT NULL,
  PRIMARY KEY (`bedNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE IF NOT EXISTS `condition` (
  `recordNo` int(11) NOT NULL AUTO_INCREMENT,
  `BHT_No` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `acuteRenalFailure` varchar(5) NOT NULL,
  `confirmedInfection` varchar(5) NOT NULL,
  `vasoactiveMedication` varchar(5) NOT NULL,
  `invasiveMedication` varchar(5) NOT NULL,
  `nonInvaisveMedication` varchar(5) NOT NULL,
  `dialysis` varchar(5) NOT NULL,
  `dialysisType` varchar(12) NOT NULL,
  `heartRate` int(2) NOT NULL,
  `pulseRate` int(3) NOT NULL,
  `bodyTemperature` int(3) NOT NULL,
  `paralysed` varchar(3) NOT NULL,
  `spontaneousBreathing` varchar(3) NOT NULL,
  `bloodPressure` int(3) NOT NULL,
  `hydrogenState` int(3) NOT NULL,
  PRIMARY KEY (`recordNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`recordNo`, `BHT_No`, `date`, `time`, `acuteRenalFailure`, `confirmedInfection`, `vasoactiveMedication`, `invasiveMedication`, `nonInvaisveMedication`, `dialysis`, `dialysisType`, `heartRate`, `pulseRate`, `bodyTemperature`, `paralysed`, `spontaneousBreathing`, `bloodPressure`, `hydrogenState`) VALUES
(1, 1, '2016-05-01', '10:00:00', 'Yes', 'No', 'No', 'No', 'No', 'No', '', 12, 15, 132, 'No', 'No', 123, 34);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `speciallity` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `icu`
--

CREATE TABLE IF NOT EXISTS `icu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `distance` int(3) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `vacancies` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE IF NOT EXISTS `nurse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `shift` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `BHT_No` int(11) NOT NULL AUTO_INCREMENT,
  `bedNo` int(2) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNumber` int(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `admittedDate` date NOT NULL,
  `dischargedDate` date DEFAULT NULL,
  `reasonToAdmit` varchar(15) NOT NULL,
  PRIMARY KEY (`BHT_No`),
  KEY `FOREIGN` (`bedNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`BHT_No`, `bedNo`, `name`, `gender`, `nic`, `birthDate`, `phoneNumber`, `address`, `admittedDate`, `dischargedDate`, `reasonToAdmit`) VALUES
(1, 2, 'Male', '', '92701524V', '1992-12-14', 773969626, 'sssssssssssss', '2016-01-01', '2016-01-20', 'Shock'),
(5, 3, 'Female', '', '11111111111', '1980-01-01', 11111111, 'AAAAAAAAAAAAAA', '2016-01-01', '2016-01-01', 'Infections');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('130113D', '$2a$12$cyTWeE9kpq1PjqKFiWUZFuCRPwVyAZwm4XzMZ1qPUFl7/flCM3V0G', 'ROLE_NURSE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

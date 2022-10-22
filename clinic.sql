-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2022 at 12:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acct_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `acc_type` enum('0','1') NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `email`, `password`, `acc_type`, `first_name`, `last_name`, `specialization`, `username`, `gender`, `status`) VALUES
(10, 'earljakemahilum@gmail.com', 'earljake', '1', 'Earl Jake', 'Mahilum', 'Neurologists', 'earl jake', 'Male', '0'),
(11, 'kernelpaulo@gmail.com', 'kerker', '1', 'Kernel', 'Paulo', 'Pediatricians', 'kerker', '', '1'),
(14, 'anamaeflores@gmail.com', 'anamae', '0', 'Ana Mae', 'Flores', '', 'ana', 'Female', '0'),
(15, 'marcusmahilum@gmail.com', 'macmac', '0', 'Marcus Julian', 'Mahilum', '', 'macmac', 'Male', '0');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `transaction_id` int(11) NOT NULL,
  `Fullname` varchar(250) NOT NULL,
  `doc_id` int(50) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `type` enum('0','1',',') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`transaction_id`, `Fullname`, `doc_id`, `pat_id`, `sched_date`, `sched_time`, `type`) VALUES
(15, 'Marcus Julian Mahilum', 11, 15, '2022-10-21', '11:20:00', '0'),
(16, 'Ana Mae Flores', 11, 14, '2022-10-21', '11:48:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `last_name`, `first_name`, `status`, `specialization`, `gender`) VALUES
(1, 'Tuazon', 'Fritz', 1, 'Psychiatrist', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `doc_img_id` int(11) NOT NULL,
  `pat_img_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `comment` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `doc_img_id`, `pat_img_id`, `image`, `comment`) VALUES
(2, 11, 14, 'profile.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `acct_fkey` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `acct_fkey`, `last_name`, `first_name`, `age`, `sex`, `religion`, `gender`, `status`) VALUES
(1, 0, 'Mahilum', 'Earl Jake', 22, 'Male', 'Christian', 'Male', '1'),
(2, 0, 'Paulo', 'Kernel Fritz', 21, 'Male', 'Catholic', 'Male', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acct_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `acct_fkey` (`acct_fkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

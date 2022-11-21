-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2022 at 07:00 AM
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
-- Table structure for table `accept_appointment`
--

CREATE TABLE `accept_appointment` (
  `transaction_id` int(11) NOT NULL,
  `fullname` int(11) NOT NULL,
  `docfullname` int(11) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `pat_id` int(10) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(15, 'marcusmahilum@gmail.com', 'macmac', '0', 'Marcus Julian', 'Mahilum', '', 'macmac', 'Male', '0'),
(17, 'fritz@gmail.com', 'fritz', '1', 'Fritz', 'Tuazon', 'Orthopedic surgeon ', 'fritz', 'Male', '0'),
(19, 'giljason@gmail.com', 'tuna', '0', 'Gil Jason', 'Tuna', '', 'tuna', 'Male', '0');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `transaction_id` int(11) NOT NULL,
  `Fullname` varchar(250) NOT NULL,
  `docfullname` varchar(250) NOT NULL,
  `doc_id` int(50) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`transaction_id`, `Fullname`, `docfullname`, `doc_id`, `pat_id`, `sched_date`, `sched_time`, `type`) VALUES
(22, 'Marcus Julian Mahilum', 'Earl Jake Mahilum', 10, 15, '2022-10-29', '08:00:00', 'Face to Face'),
(23, 'Marcus Julian Mahilum', 'Kernel Paulo', 11, 15, '2022-10-22', '10:01:00', 'Face to Face'),
(24, ' ', 'Earl Jake Mahilum', 10, 0, '2022-10-27', '16:27:00', '1'),
(25, ' ', 'Earl Jake Mahilum', 10, 0, '0000-00-00', '00:00:00', '1'),
(26, ' ', 'Earl Jake Mahilum', 10, 0, '0000-00-00', '00:00:00', '1'),
(30, 'Ana Mae Flores', 'Earl Jake Mahilum', 10, 14, '2022-10-28', '14:51:00', 'Face to face'),
(31, ' ', 'Earl Jake Mahilum', 10, 0, '2022-11-07', '11:00:00', '1'),
(32, ' ', 'Earl Jake Mahilum', 10, 0, '2022-11-07', '11:00:00', '1'),
(34, 'Earl Jake Mahilum', 'Earl Jake Mahilum', 10, 10, '2022-11-07', '11:55:00', '1'),
(35, 'Ana Mae Flores', 'Earl Jake Mahilum', 10, 14, '2022-11-10', '00:00:00', ''),
(36, 'Ana Mae Flores', 'Earl Jake Mahilum', 10, 14, '0000-00-00', '00:00:00', ''),
(37, 'Ana Mae Flores', 'Earl Jake Mahilum', 10, 14, '2022-11-09', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `app_log`
--

CREATE TABLE `app_log` (
  `transaction_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `docfullname` varchar(100) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `pat_cons_id` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `symptoms` varchar(250) NOT NULL,
  `how_long` varchar(250) NOT NULL,
  `better` varchar(250) NOT NULL,
  `smoke` varchar(250) NOT NULL,
  `drugs` varchar(250) NOT NULL,
  `alcohol` varchar(250) NOT NULL,
  `history` varchar(250) NOT NULL,
  `meds` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `pat_cons_id`, `reason`, `symptoms`, `how_long`, `better`, `smoke`, `drugs`, `alcohol`, `history`, `meds`) VALUES
(1, 14, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `diag_doc_id` int(11) NOT NULL,
  `diag_pat_id` int(11) NOT NULL,
  `diag_sched_date` date NOT NULL,
  `diagnosis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `last_name`, `first_name`, `specialization`, `address`) VALUES
(1, 'Tuazon', 'Fritz', 'Psychiatrist', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_availability`
--

CREATE TABLE `doctors_availability` (
  `avail_id` int(11) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `avail_date` date NOT NULL,
  `avail_time` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors_availability`
--

INSERT INTO `doctors_availability` (`avail_id`, `doctor_id`, `avail_date`, `avail_time`, `status`) VALUES
(1, 0, '2022-11-09', '9:00', '0'),
(2, 0, '2022-11-09', '10:00', '0'),
(3, 0, '2022-11-09', '11:00', '0'),
(4, 0, '2022-11-09', '12:00', '0'),
(5, 0, '2022-11-09', '9:00', '0'),
(6, 0, '2022-11-09', '10:00', '0'),
(7, 0, '2022-11-09', '9:00', '0'),
(8, 0, '2022-11-09', '10:00', '0'),
(9, 0, '2022-11-10', '12:00pm', '0'),
(10, 0, '2022-11-09', '9:00', '0'),
(11, 0, '2022-11-09', '10:00', '0'),
(12, 0, '2022-11-09', '11:00', '0'),
(13, 0, '2022-11-09', '12:00pm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `document_sessions`
--

CREATE TABLE `document_sessions` (
  `id` int(11) NOT NULL,
  `sess_doc_id` int(11) NOT NULL,
  `sess_pat_id` int(11) NOT NULL,
  `sess_sched_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `doc_img_id` int(11) NOT NULL,
  `pat_img_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` enum('1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `doc_img_id`, `pat_img_id`, `image`, `type`) VALUES
(7, 10, 15, 'cat.webp', '1');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `acct_patient_id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `about` text NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `acct_patient_id`, `last_name`, `first_name`, `birthday`, `about`, `age`, `sex`, `religion`, `gender`, `status`) VALUES
(1, 15, 'Mahilum', 'Earl Jake', '0000-00-00', '', 22, 'Male', 'Christian', 'Male', '1'),
(2, 0, 'Paulo', 'Kernel Fritz', '0000-00-00', '', 21, 'Male', 'Catholic', 'Male', '0');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `pres_doc_id` int(11) NOT NULL,
  `pres_pat_id` int(11) NOT NULL,
  `pres_sched_date` date NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `milligrams` varchar(100) NOT NULL,
  `every_hour` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `screening_acct_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `acc_type` enum('0','1') NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `pic_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs`
--

CREATE TABLE `vital_signs` (
  `id` int(11) NOT NULL,
  `vit_pat_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `heart_rate` int(11) NOT NULL,
  `blood_pressure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vital_signs`
--

INSERT INTO `vital_signs` (`id`, `vit_pat_id`, `height`, `weight`, `heart_rate`, `blood_pressure`) VALUES
(1, 15, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_appointment`
--
ALTER TABLE `accept_appointment`
  ADD PRIMARY KEY (`transaction_id`);

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
-- Indexes for table `app_log`
--
ALTER TABLE `app_log`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pat_cons_id` (`pat_cons_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pres_doc_id` (`diag_doc_id`),
  ADD KEY `pres_pat_id` (`diag_pat_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctors_availability`
--
ALTER TABLE `doctors_availability`
  ADD PRIMARY KEY (`avail_id`);

--
-- Indexes for table `document_sessions`
--
ALTER TABLE `document_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sess_doc_id` (`sess_doc_id`),
  ADD KEY `sess_pat_id` (`sess_pat_id`);

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
  ADD KEY `acct_fkey` (`acct_patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pres_doc_id` (`pres_doc_id`),
  ADD KEY `pres_pat_id` (`pres_pat_id`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`screening_acct_id`);

--
-- Indexes for table `vital_signs`
--
ALTER TABLE `vital_signs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vit_pat_id` (`vit_pat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_appointment`
--
ALTER TABLE `accept_appointment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `app_log`
--
ALTER TABLE `app_log`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors_availability`
--
ALTER TABLE `doctors_availability`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `document_sessions`
--
ALTER TABLE `document_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_acct_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vital_signs`
--
ALTER TABLE `vital_signs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

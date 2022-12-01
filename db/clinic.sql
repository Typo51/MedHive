-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2022 at 12:39 AM
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
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `type` enum('0','1') NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `last_name`, `first_name`, `username`, `password`, `email`, `status`, `type`, `avatar`) VALUES
(10, 'Paulo', 'Kernel Fritz', 'kerker', 'kerker', 'kernelfritzp@gmail.com', '0', '1', NULL),
(12, 'Mahilum', 'Marcus Julian', 'macmac', 'macmac', 'kernelfritzp@gmail.com', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `transaction_id` int(11) NOT NULL,
  `doc_id` int(50) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`transaction_id`, `doc_id`, `pat_id`, `sched_date`, `sched_time`, `type`) VALUES
(38, 11, 15, '2022-11-21', '08:00:00', 'Face to face'),
(39, 11, 15, '2022-11-28', '08:00:00', 'Face to face');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_info`
--

CREATE TABLE `clinic_info` (
  `clinic_id` int(11) NOT NULL,
  `doc_clinic_id` int(11) DEFAULT NULL,
  `clinic_address` varchar(100) DEFAULT NULL,
  `office_days` varchar(100) DEFAULT NULL,
  `office_time` varchar(100) DEFAULT NULL,
  `contact_info` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_info`
--

INSERT INTO `clinic_info` (`clinic_id`, `doc_clinic_id`, `clinic_address`, `office_days`, `office_time`, `contact_info`) VALUES
(1, NULL, '5143 Rudy Lane', NULL, NULL, '17026015723');

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

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `diag_doc_id`, `diag_pat_id`, `diag_sched_date`, `diagnosis`) VALUES
(6, 11, 15, '2022-11-21', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doc_acc_id` int(11) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doc_acc_id`, `specialization`, `bio`) VALUES
(4, NULL, 'Pediatrician', NULL);

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
(1, 0, '2022-11-09', '9:00', '1'),
(2, 0, '2022-11-09', '10:00', '1'),
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
(13, 0, '2022-11-09', '12:00pm', '1'),
(14, 11, '2022-11-21', '8:00', '0'),
(15, 11, '2022-11-21', '9:00', '1'),
(16, 11, '2022-11-21', '10:00', '1'),
(17, 11, '2022-11-21', '11:00', '1'),
(18, 11, '2022-11-21', '12:00pm', '1'),
(19, 11, '2022-11-21', '1:00', '1'),
(20, 11, '2022-11-21', '2:00', '1'),
(21, 11, '2022-11-21', '3:00', '1'),
(22, 11, '2022-11-21', '4:00', '1'),
(23, 11, '2022-11-21', '5:00pm', '1'),
(24, 11, '2022-11-28', '8:00', '0'),
(25, 11, '2022-11-28', '9:00', '1'),
(26, 11, '2022-11-28', '10:00', '1'),
(27, 11, '2022-11-28', '11:00', '1'),
(28, 11, '2022-11-28', '12:00pm', '1'),
(29, 11, '2022-11-28', '1:00', '1'),
(30, 11, '2022-11-28', '2:00', '1'),
(31, 11, '2022-11-29', '8:00', '1'),
(32, 11, '2022-11-29', '9:00', '1'),
(33, 11, '2022-11-29', '10:00', '1'),
(34, 11, '2022-11-29', '11:00', '1'),
(35, 11, '2022-11-29', '12:00pm', '1'),
(36, 11, '2022-11-29', '1:00', '1'),
(37, 11, '2022-11-29', '2:00', '1'),
(38, 11, '2022-11-29', '3:00', '1'),
(39, 11, '2022-11-29', '4:00', '1'),
(40, 11, '2022-11-29', '5:00pm', '1');

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

--
-- Dumping data for table `document_sessions`
--

INSERT INTO `document_sessions` (`id`, `sess_doc_id`, `sess_pat_id`, `sess_sched_date`) VALUES
(6, 11, 15, '2022-11-21');

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
  `pat_acc_id` int(11) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_num` varchar(15) DEFAULT NULL,
  `height` int(3) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `pat_acc_id`, `bio`, `birthday`, `address`, `contact_num`, `height`, `weight`, `sex`) VALUES
(1, NULL, NULL, '2022-12-01', '5143 Rudy Lane', '17026015723', 162, 59, 'Male');

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
  `screening_id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `type` enum('0','1') NOT NULL,
  `birthday` date DEFAULT NULL,
  `height` int(3) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL,
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shared_docs`
--

CREATE TABLE `shared_docs` (
  `id` int(11) NOT NULL,
  `share_doc_id` int(11) NOT NULL,
  `share_pat_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `clinic_info`
--
ALTER TABLE `clinic_info`
  ADD PRIMARY KEY (`clinic_id`),
  ADD UNIQUE KEY `doc_clinic_id` (`doc_clinic_id`);

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
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doc_acc_id` (`doc_acc_id`);

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
  ADD UNIQUE KEY `pat_acc_id` (`pat_acc_id`);

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
  ADD PRIMARY KEY (`screening_id`);

--
-- Indexes for table `shared_docs`
--
ALTER TABLE `shared_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `share_doc_id` (`share_doc_id`),
  ADD KEY `share_pat_id` (`share_pat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `clinic_info`
--
ALTER TABLE `clinic_info`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors_availability`
--
ALTER TABLE `doctors_availability`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `document_sessions`
--
ALTER TABLE `document_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shared_docs`
--
ALTER TABLE `shared_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

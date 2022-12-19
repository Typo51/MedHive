-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 01:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinics`
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
  `avatar` varchar(100) DEFAULT 'icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `last_name`, `first_name`, `username`, `password`, `email`, `status`, `type`, `avatar`) VALUES
(1, 'Mahilum', 'Earl Jake', 'earl jake', 'earljake', 'earljakemahilum123@gmail.com', '0', '1', 'icon.png'),
(2, 'Solmayor', 'Francis', 'franz', 'franz', 'franz@gmail.com', '0', '0', 'icon.png'),
(3, 'Dela Cruz', 'Chris Jan', 'jeyjey', 'jeyjey', 'jeyjey@gmail.com', '0', '1', 'icon.png'),
(4, 'Paulo', 'Kernel Fritz', 'kerker', 'kerker', 'playingmoonlord@gmail.com', '0', '1', 'icon.png'),
(5, '', '', '', '', '', '0', '0', 'icon.png'),
(6, 'Mahilum', 'Delight', 'delite', 'delite', 'delite@gmail.com', '0', '0', 'icon.png'),
(7, 'Dela Cruz', 'Juan', 'juan', 'juan', 'juandelacruz@gmail.com', '0', '1', 'icon.png'),
(8, 'Dela Cruz', 'Juana', 'juana', 'juana', 'juanadelacruz@gmail.com', '0', '0', 'icon.png');

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
  `typeapp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_log`
--

CREATE TABLE `appointment_log` (
  `transaction_id` int(11) NOT NULL,
  `doc_id` int(50) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `typeapp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_log`
--

INSERT INTO `appointment_log` (`transaction_id`, `doc_id`, `pat_id`, `sched_date`, `sched_time`, `typeapp`) VALUES
(1, 1, 2, '2022-12-14', '00:00:00', ''),
(2, 1, 2, '2022-12-14', '11:00:00', 'Virtual'),
(3, 7, 8, '2022-12-15', '10:00:00', 'Face to face');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_queue`
--

CREATE TABLE `appointment_queue` (
  `transaction_id` int(11) NOT NULL,
  `doc_id` int(50) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `sched_date` date NOT NULL,
  `sched_time` time NOT NULL,
  `typeapp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_queue`
--

INSERT INTO `appointment_queue` (`transaction_id`, `doc_id`, `pat_id`, `sched_date`, `sched_time`, `typeapp`) VALUES
(3, 7, 8, '2022-12-15', '08:00:00', 'Face to face');

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
(1, 1, 'Agreda Phase 1', 'Monday-Friday', '8:00am - 5:00pm', '09076351998'),
(2, 3, 'Agreda Phase 1', NULL, NULL, '09071234565'),
(3, 4, 'Brgy. GPS', NULL, NULL, '09071234565'),
(4, 7, 'Brgy. Sta. Cruz', 'Monday-Friday', '8:00am - 5:00pm', '09071234565');

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
(1, 1, 2, '2022-12-14', 'Lagnat'),
(4, 7, 8, '2022-12-15', 'Flu');

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
(1, 1, 'Psychiatrist', ''),
(2, 3, 'Pediatrician', NULL),
(3, 4, 'Orthopedic surgeon ', NULL),
(4, 7, 'Neurologist', NULL);

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
(1, 1, '2022-12-14', '8:00', '1'),
(2, 1, '2022-12-14', '9:00', '1'),
(3, 1, '2022-12-14', '10:00', '1'),
(4, 1, '2022-12-14', '11:00', '0'),
(5, 1, '2022-12-14', '12:00pm', '1'),
(6, 1, '2022-12-14', '1:00', '1'),
(7, 1, '2022-12-14', '2:00', '1'),
(8, 1, '2022-12-14', '3:00', '1'),
(9, 1, '2022-12-14', '4:00', '1'),
(10, 1, '2022-12-14', '5:00pm', '1'),
(11, 7, '2022-12-15', '8:00', '0'),
(12, 7, '2022-12-15', '9:00', '1'),
(13, 7, '2022-12-15', '10:00', '0'),
(14, 7, '2022-12-15', '11:00', '1'),
(15, 7, '2022-12-15', '12:00pm', '1'),
(16, 7, '2022-12-15', '1:00', '1'),
(17, 7, '2022-12-15', '2:00', '1'),
(18, 7, '2022-12-15', '3:00', '1'),
(19, 7, '2022-12-15', '4:00', '1'),
(20, 7, '2022-12-15', '5:00pm', '1');

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
(3, 1, 2, '2022-12-14'),
(4, 7, 8, '2022-12-15');

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
(1, 0, 2, 'WIN_20221028_11_06_56_Pro.jpg', '1'),
(2, 0, 8, '5620845.jpg', '1'),
(3, 0, 8, 'wp5633985.jpg', '1');

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
(1, 2, '', '2000-12-12', 'Prk. Upper Valley', '09076351998', 123, 69, 'Male'),
(2, 5, NULL, '0000-00-00', '', '', 0, 0, ''),
(3, 6, NULL, '1978-02-05', 'Agreda Phase 1', '09123456789', 156, 50, 'Female'),
(4, 8, NULL, '2000-12-12', 'Agreda Phase 1', '09276340273', 123, 45, 'Female');

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

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `pres_doc_id`, `pres_pat_id`, `pres_sched_date`, `diagnosis`, `med_name`, `milligrams`, `every_hour`) VALUES
(1, 1, 2, '2022-12-14', '', 'Bioflu', '250', '4'),
(2, 1, 2, '2022-12-14', '', 'Biogesic', '250', '4'),
(6, 7, 8, '2022-12-15', '', 'Paracetamol', '50', ''),
(7, 7, 8, '2022-12-15', '', 'Mefenamic', '50', '');

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
-- Dumping data for table `shared_docs`
--

INSERT INTO `shared_docs` (`id`, `share_doc_id`, `share_pat_id`, `image`) VALUES
(1, 0, 8, 'wp5633985.jpg'),
(2, 7, 8, 'wp5633985.jpg');

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
-- Indexes for table `appointment_log`
--
ALTER TABLE `appointment_log`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `appointment_queue`
--
ALTER TABLE `appointment_queue`
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
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment_log`
--
ALTER TABLE `appointment_log`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment_queue`
--
ALTER TABLE `appointment_queue`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clinic_info`
--
ALTER TABLE `clinic_info`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors_availability`
--
ALTER TABLE `doctors_availability`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `document_sessions`
--
ALTER TABLE `document_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shared_docs`
--
ALTER TABLE `shared_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

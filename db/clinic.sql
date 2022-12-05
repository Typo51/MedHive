-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 12:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
  `avatar` varchar(100) DEFAULT 'icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `last_name`, `first_name`, `username`, `password`, `email`, `status`, `type`, `avatar`) VALUES
(1, 'Paulo', 'Kernel Fritz', 'kerker', 'kerker', 'asd@gmail.com', '0', '1', 'SPACE-MISSION-2-DESKTOP-HD.png'),
(2, 'Mahilum', 'Marcus Julian', 'macmac', 'macmac', 'asd@gmail.com', '0', '0', '12.jpg'),
(3, 'Tuna', 'Gil Jason', 'tuna', 'tuna', 'asd@gmail.com', '0', '1', '12.jpg'),
(4, 'Tuazon', 'Fritz', 'toto', 'toto', 'asd@gmail.com', '0', '0', 'icon.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `app_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_log`
--

INSERT INTO `appointment_log` (`transaction_id`, `doc_id`, `pat_id`, `sched_date`, `sched_time`, `app_type`) VALUES
(2, 3, 4, '2022-12-05', '08:00:00', 'Face to face'),
(3, 3, 2, '2022-12-06', '08:00:00', 'Face to face');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinic_info`
--

INSERT INTO `clinic_info` (`clinic_id`, `doc_clinic_id`, `clinic_address`, `office_days`, `office_time`, `contact_info`) VALUES
(1, 1, 'Alunan Ave.', 'Saturday - Sunday', '8:00 AM - 5:00 PM', '09265010400'),
(2, 3, 'Alunan Ave.', NULL, NULL, '09265010400');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `diag_doc_id`, `diag_pat_id`, `diag_sched_date`, `diagnosis`) VALUES
(1, 1, 2, '2022-12-04', 'diabetic'),
(2, 1, 2, '2022-12-05', 'cancerous'),
(3, 3, 2, '2022-12-04', 'asthmatic'),
(6, 3, 4, '2022-12-05', 'sakit sa dapa dapa'),
(15, 3, 2, '2022-12-06', 'sakit sa kili kili');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doc_acc_id` int(11) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doc_acc_id`, `specialization`, `bio`) VALUES
(1, 1, 'Pediatrician', 'I love helping people in need :&gt;'),
(2, 3, 'Psychiatrist', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_availability`
--

INSERT INTO `doctors_availability` (`avail_id`, `doctor_id`, `avail_date`, `avail_time`, `status`) VALUES
(11, 1, '2022-12-05', '8:00', '0'),
(12, 3, '2022-12-04', '8:00', '0'),
(13, 3, '2022-12-05', '8:00', '0'),
(14, 3, '2022-12-06', '8:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `document_sessions`
--

CREATE TABLE `document_sessions` (
  `id` int(11) NOT NULL,
  `sess_doc_id` int(11) NOT NULL,
  `sess_pat_id` int(11) NOT NULL,
  `sess_sched_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_sessions`
--

INSERT INTO `document_sessions` (`id`, `sess_doc_id`, `sess_pat_id`, `sess_sched_date`) VALUES
(1, 1, 2, '2022-12-04'),
(2, 1, 2, '2022-12-05'),
(3, 3, 2, '2022-12-04'),
(6, 3, 4, '2022-12-05'),
(15, 3, 2, '2022-12-06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `doc_img_id`, `pat_img_id`, `image`, `type`) VALUES
(1, 0, 2, 'SPACE-MISSION-2-DESKTOP-HD.png', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `pat_acc_id`, `bio`, `birthday`, `address`, `contact_num`, `height`, `weight`, `sex`) VALUES
(1, 2, NULL, '2000-09-26', 'Agreda Phase 1', '09265010400', 160, 60, 'Male'),
(2, 4, NULL, '2000-09-26', 'San Antonio Phase 1', '09265010400', 160, 60, 'Male');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `pres_doc_id`, `pres_pat_id`, `pres_sched_date`, `diagnosis`, `med_name`, `milligrams`, `every_hour`) VALUES
(1, 1, 2, '2022-12-04', '', 'medicol', '150', '6'),
(2, 1, 2, '2022-12-05', '', 'neozep', '150', '12'),
(3, 3, 2, '2022-12-04', '', 'alaxan fr', '150', '12'),
(6, 3, 4, '2022-12-05', '', 'paracetamol', '150', '6'),
(15, 3, 2, '2022-12-06', '', 'solmux', '150', '6');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shared_docs`
--

CREATE TABLE `shared_docs` (
  `id` int(11) NOT NULL,
  `share_doc_id` int(11) NOT NULL,
  `share_pat_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `clinic_info`
--
ALTER TABLE `clinic_info`
  ADD PRIMARY KEY (`clinic_id`),
  ADD UNIQUE KEY `doc_clinic_id` (`doc_clinic_id`);

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
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment_log`
--
ALTER TABLE `appointment_log`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clinic_info`
--
ALTER TABLE `clinic_info`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors_availability`
--
ALTER TABLE `doctors_availability`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `document_sessions`
--
ALTER TABLE `document_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shared_docs`
--
ALTER TABLE `shared_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

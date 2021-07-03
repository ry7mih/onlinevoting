-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 05:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_verification_tbl`
--

CREATE TABLE `admin_verification_tbl` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `security_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_verification_tbl`
--

INSERT INTO `admin_verification_tbl` (`id`, `admin_name`, `admin_password`, `security_code`) VALUES
(1, 'rupesh', 'dd', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_tbl`
--

CREATE TABLE `candidates_tbl` (
  `candidates_id` int(11) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `elections_name` varchar(100) NOT NULL,
  `total_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates_tbl`
--

INSERT INTO `candidates_tbl` (`candidates_id`, `candidate_name`, `elections_name`, `total_votes`) VALUES
(7, 'sss', 'qqqq', 0),
(8, 'ssssssss', 'qqqq', 1),
(9, 'pawan', 'HOD', 1),
(14, 'hello', 'HOD', 0),
(15, 'ddd', 'HOD', 0),
(19, 'MODI', 'LOKSHABHA', 1),
(20, 'RAHUL', 'LOKSHABHA', 1),
(21, 'DIMPLE', 'LOKSHABHA', 1),
(27, 'Indian National Congress', 'LOKSHABHA_ELECTIONS_2021', 0),
(28, 'Shiv Sena', 'LOKSHABHA_ELECTIONS_2021', 0),
(29, 'Bharatiya Janata Party', 'LOKSHABHA_ELECTIONS_2021', 0),
(30, 'Bahujan Samaj Party', 'LOKSHABHA_ELECTIONS_2021', 0),
(31, 'Samajwadi Party', 'LOKSHABHA_ELECTIONS_2021', 0),
(32, 'NOTA(None of the Above)', 'LOKSHABHA_ELECTIONS_2021', 1),
(33, 'lol', 'Test', 0),
(34, 'sss', 'Test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elections_tbl`
--

CREATE TABLE `elections_tbl` (
  `elections_id` int(11) NOT NULL,
  `elections_name` varchar(100) NOT NULL,
  `elections_start_date` date NOT NULL,
  `elections_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections_tbl`
--

INSERT INTO `elections_tbl` (`elections_id`, `elections_name`, `elections_start_date`, `elections_end_date`) VALUES
(3, 'HOD', '2021-06-02', '2021-07-22'),
(8, 'LOKSHABHA_ELECTIONS_2021', '2021-07-02', '2021-07-02'),
(10, 'Test', '2021-07-10', '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `id_request_tbl`
--

CREATE TABLE `id_request_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_aadhar` varchar(16) NOT NULL,
  `user_phonenumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `results_tbl`
--

CREATE TABLE `results_tbl` (
  `id` int(11) NOT NULL,
  `user_aadhar` varchar(16) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `elections_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results_tbl`
--

INSERT INTO `results_tbl` (`id`, `user_aadhar`, `candidate_name`, `elections_name`) VALUES
(1, '55', 'rahul', 'HOD'),
(2, '55', 'rahul', 'HOD'),
(3, '55', 'ssssssss', 'qqqq'),
(7, '789456127894', 'NOTA(None of the Above)', 'LOKSHABHA_ELECTIONS_2021'),
(8, '44', 'pawan', 'HOD'),
(9, '66', 'pawan id=', 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `users_db`
--

CREATE TABLE `users_db` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_aadhar` varchar(16) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_id_generated` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_db`
--

INSERT INTO `users_db` (`user_id`, `user_name`, `user_aadhar`, `user_email`, `user_gender`, `user_password`, `user_id_generated`) VALUES
(3, 'anshul saxsena', '7894561298746521', 'anshulsaxsena@hamker.com', 'Other', 'hamker', '6907117'),
(4, 'PP ss', '77', 'ry7mih@gmail.com', 'Male', 'a', '1193520001'),
(9, 'ee', '33', 'ry7mih@gmail.com', 'Other', '22', '2094243809'),
(11, 'Tanmay singh', '55', 'theaxiomaticcuber@gmail.com', 'Male', 'dd', '1811765753'),
(12, 'xyz', '11', 'hello@hello.com', 'Male', 'dd', '1929412059'),
(13, 'sigma', '22', 'sigma@sigmamale.com', 'Male', 'dd', '325513692'),
(14, 'Shreya Yadav', '924182078680', 'shreya.16yadav@gmail.com', 'Other', 'rr', '464674671'),
(15, 'Rupesh Yadav', '789456127894', 'ry7mih@gmail.com', 'Male', 'dd', '677905468'),
(16, 'hemlo', '44', 'ry7mih@gmail.com', 'Male', 'dd', '487395779'),
(17, 'happy', '66', 'ry7mih@gmail.com', 'Male', 'dd', '494982132');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_verification_tbl`
--
ALTER TABLE `admin_verification_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  ADD PRIMARY KEY (`candidates_id`);

--
-- Indexes for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  ADD PRIMARY KEY (`elections_id`);

--
-- Indexes for table `id_request_tbl`
--
ALTER TABLE `id_request_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_tbl`
--
ALTER TABLE `results_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_verification_tbl`
--
ALTER TABLE `admin_verification_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  MODIFY `candidates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  MODIFY `elections_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `id_request_tbl`
--
ALTER TABLE `id_request_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `results_tbl`
--
ALTER TABLE `results_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_db`
--
ALTER TABLE `users_db`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

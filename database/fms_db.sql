-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 12:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `claimant`
--

CREATE TABLE `claimant` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `ec_number` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claimant`
--

INSERT INTO `claimant` (`id`, `first_name`, `last_name`, `national_id`, `ec_number`, `department`) VALUES
(37, 'nigel', 'manyika', '13283004k83', '1212K90', 'ICT'),
(38, 'Tadiwanashe', 'Tembani', '100293348k83', 'TT3400L', 'Hostel Negotiation'),
(39, 'Tinashe', 'Nyamayaro', '202026839k88', 'TRR20U1', 'The department'),
(40, 'Ronald', 'Kanyemba', '111888k83', 'U2020', 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `folder_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `file`, `timestamp`, `folder_id`) VALUES
(11, 'police report edited', 'Kevin D. Mitnick & William L. Simon - The Art Of Deception_19_32_58.pdf', '2022-11-23 21:36:58.531483', 18),
(12, 'doctors report', 'deeplearningwithpython_18_35_57.pdf', '2022-11-18 18:11:38.781297', 18),
(13, 'police report 2', 'Flutter for beginners_19_10_15.pdf', '2022-11-18 18:11:38.781297', 18),
(14, 'police report 2.1', 'flutter_tutorial_19_12_00.pdf', '2022-11-18 18:12:00.832892', 18),
(15, 'police report', 'pdfcoffee.com_beginning-flutterpdf-pdf-free_19_15_53.pdf', '2022-11-20 18:15:53.588172', 19),
(16, 'doctor truma report', 'PHP, MySQL, & JavaScript All-in-One For Dummies_19_16_14.pdf', '2022-11-20 18:16:14.441074', 19),
(18, 'police report 2.1', 'pdfcoffee.com_beginning-flutterpdf-pdf-free_11_13_42.pdf', '2022-11-24 10:13:42.306097', 20),
(19, 'the file', 'Programming PyTorch for Deep Learning - Ian Pointer_14_07_17.pdf', '2022-11-24 13:07:17.465418', 21);

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` int(255) NOT NULL,
  `claimant_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `claimant_id`) VALUES
(18, 37),
(19, 38),
(20, 39),
(21, 40);

-- --------------------------------------------------------

--
-- Table structure for table `injuries`
--

CREATE TABLE `injuries` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `claimant_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `injuries`
--

INSERT INTO `injuries` (`id`, `type`, `place`, `date`, `stage`, `status`, `reference`, `claimant_id`) VALUES
(24, 'Decapitation + broken leg', 'Workplace Lab', '2022-10-31', 'ESCRR2', 'completed', '12/3030', 37),
(25, 'broken leg', 'Workplace Lab', '2022-11-01', 'ESC', 'pending', NULL, 37),
(26, 'Decapitation', 'Workplace Lab', '2022-11-01', 'ESC', 'done', '1/20', 37),
(27, 'Trauma', 'Workplace Lab', '2022-10-30', 'ESC', 'none', '2/20', 38),
(31, 'Head Injury', 'Somewhere on the company grounf', '2022-10-30', 'ESCRR2', 'completed', '1/92', 39),
(32, 'Trauma', 'Workplace Lab', '2022-11-14', 'ESC', 'none', '45/22', 39),
(33, 'Heart Broken', 'Workplace Lab', '2022-10-30', 'ESCRR2', 'done', '02/19', 39),
(34, 'Molestation', 'Workplace Lab', '2022-10-04', 'ESCRR2', 'postponed', '01/18', 38),
(35, 'Broken Arms', 'Workstation', '2022-09-06', 'ESCRR2', 'denied', '01/17', 40),
(36, 'Molestation', 'Workplace Lab', '2022-11-24', 'ESC', 'none', '12/22', 40),
(37, 'Decapitation', 'Workstation', '2022-05-02', 'ESCRR2', 'done', '05/12', 40),
(38, 'Heart Broken', 'Somewhere on the company grounf', '2022-04-24', 'ESCRR2', 'denied', '07/20', 37);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ec_number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `ec_number`, `designation`, `email`, `password`) VALUES
(1, 'King', 'Shark', '200UU7', 'The Ocean', 'kingshark@gmail.com', '123'),
(6, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'prichard', 'matizirofa', '11222309', 'IT Derpartment', 'prichard@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(9, 'Mambo', 'Tembani', '1212K902', 'IT Derpartment', 'mambo@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claimant`
--
ALTER TABLE `claimant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_ibfk_1` (`folder_id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claimant_id` (`claimant_id`);

--
-- Indexes for table `injuries`
--
ALTER TABLE `injuries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claimant_id` (`claimant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claimant`
--
ALTER TABLE `claimant`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `injuries`
--
ALTER TABLE `injuries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `folder`
--
ALTER TABLE `folder`
  ADD CONSTRAINT `folder_ibfk_1` FOREIGN KEY (`claimant_id`) REFERENCES `claimant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `injuries`
--
ALTER TABLE `injuries`
  ADD CONSTRAINT `injuries_ibfk_1` FOREIGN KEY (`claimant_id`) REFERENCES `claimant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

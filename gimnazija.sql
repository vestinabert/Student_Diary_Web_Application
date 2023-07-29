-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 08:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gimnazija`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `adm_mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`, `adm_mail`) VALUES
(1, 'gg', '123', 'Adelė', 'Danielienė', 'adele@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gradings`
--

CREATE TABLE `gradings` (
  `grading_id` int(20) NOT NULL,
  `grading` int(2) NOT NULL,
  `student_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradings`
--

INSERT INTO `gradings` (`grading_id`, `grading`, `student_id`, `subject_id`) VALUES
(1, 3, 2, 3),
(2, 3, 2, 2),
(3, 10, 1, 1),
(4, 6, 3, 5),
(5, 9, 1, 4),
(6, 3, 2, 2),
(7, 4, 1, 1),
(8, 10, 2, 2),
(9, 4, 3, 3),
(10, 8, 4, 4),
(11, 2, 5, 5),
(12, 10, 6, 6),
(13, 1, 7, 7),
(14, 6, 1, 1),
(15, 10, 2, 2),
(16, 10, 3, 3),
(17, 7, 4, 4),
(18, 9, 5, 5),
(19, 4, 6, 6),
(20, 8, 7, 7),
(21, 10, 1, 1),
(22, 10, 2, 2),
(23, 4, 3, 3),
(24, 8, 4, 4),
(25, 2, 5, 5),
(26, 10, 6, 6),
(27, 1, 7, 7),
(28, 10, 8, 2),
(29, 10, 8, 3),
(30, 7, 9, 4),
(31, 2, 9, 5),
(32, 4, 10, 6),
(33, 10, 10, 7),
(34, 10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `s_mail` varchar(250) NOT NULL,
  `grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `username`, `password`, `fname`, `lname`, `s_mail`, `grade`) VALUES
(1, 'john', 'eee', 'Jurgis', 'Donis', 'donis@gmail.com', '2a'),
(2, 'abas', '45678', 'Abas', 'Abaitis', 'abas@gmail.com', '2a'),
(3, 'remrex', 'rexus6987', 'Remis', 'Nainys', 'nainys@yahoo.com', '4a'),
(4, 'galius', '456', 'Galius', 'Urbonavičius', 'galius@yahoo.com', '4a'),
(5, 'sonis', 'labas123', 'Šarūnas', 'Mickevičius', 'galius@yahoo.com', '4b'),
(6, 'katis', 'miau25', 'Gabrielė', 'Šaunuolytė', 'galius@yahoo.com', '1a'),
(7, 'klakas', 'klak', 'Kęstutis', 'Sonavičius', 'galius@yahoo.com', '2b'),
(8, 'matematikas', 'matematika', 'Justas', 'Bagdonavičius', 'galius@yahoo.com', '4a'),
(9, 'magas123', 'magic123', 'Saulė', 'Miškinytė', 'galius@yahoo.com', '2b'),
(10, 'justas456', 'justukas', 'Justas', 'Kubonavičius', 'galius@yahoo.com', '3a');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`) VALUES
(1, 'Lietuvių k.'),
(2, 'Dailė'),
(3, 'Anglų k.'),
(4, 'Tikyba'),
(5, 'Muzika'),
(7, 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `t_mail` varchar(250) NOT NULL,
  `subjects` int(11) NOT NULL,
  `grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `username`, `password`, `fname`, `lname`, `t_mail`, `subjects`, `grade`) VALUES
(1, 'oliver', '321', 'Oliveris', 'Naujaitis', 'oliver@gmail.com', 3, '4a'),
(2, 'jone', 'jone', 'Jonė', 'Matulionė', 'jone@gmail.lt', 1, '1a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gradings`
--
ALTER TABLE `gradings`
  ADD PRIMARY KEY (`grading_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `grade` (`grade`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `subjects` (`subjects`) USING BTREE,
  ADD KEY `grade` (`grade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gradings`
--
ALTER TABLE `gradings`
  MODIFY `grading_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gradings`
--
ALTER TABLE `gradings`
  ADD CONSTRAINT `gradings_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subjects`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

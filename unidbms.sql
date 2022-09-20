-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 06:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unidbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSE_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSE_ID`, `NAME`) VALUES
('CS-123', 'COMPUTER ORGANISATION AND DESIGN'),
('CS-218', 'SIGNALS AND SYSTEMS'),
('CS-222', 'DATABASES MANAGAMENT SYSTEM'),
('EE-345', 'BASIC ELECTRICAL ENGINEERING'),
('EE-567', 'CIRCUIT THEORY'),
('EE-856', 'ELECTRICAL SIGNALS'),
('HS-228', 'PROFESSIONAL ETHICS'),
('HS-234', 'CHINESE LANGUAGE'),
('HS-992', 'FUNCTONAL ENGLISH'),
('ME-092', 'ENGINEERING DRAWING'),
('ME-222', 'FLUID MECHANICS'),
('ME-234', 'BASIC MECHANICS');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DEPT_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `NAME`) VALUES
('CE-10', 'CIVIL ENGINEERING'),
('CS-10', 'COMPUTER SYSTEMS ENGINEERING'),
('EE-10', 'ELECTRICAL ENGINEERING'),
('EL-10', 'ELECTRONICS ENGINEERING'),
('HS-10', 'HUMANITIES'),
('ME-10', 'MECHANICAL ENGINEERING '),
('PH-10', 'APPLIED PHYSICS');

-- --------------------------------------------------------

--
-- Table structure for table `department_courses`
--

CREATE TABLE `department_courses` (
  `COURSE_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DEPT_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_courses`
--

INSERT INTO `department_courses` (`COURSE_ID`, `DEPT_ID`) VALUES
('CS-218', 'CS-10'),
('ME-222', 'ME-10'),
('CS-222', 'CS-10'),
('CS-123', 'CS-10'),
('HS-234', 'HS-10'),
('HS-228', 'HS-10'),
('HS-992', 'HS-10'),
('ME-092', 'ME-10'),
('ME-234', 'ME-10'),
('EE-345', 'EE-10'),
('EE-567', 'EE-10'),
('EE-856', 'EE-10');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `ACC_NO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FEE` int(11) NOT NULL,
  `STATUS` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`ACC_NO`, `FEE`, `STATUS`) VALUES
('12345', 20000, 'PAID'),
('12567', 20000, 'PAID'),
('23456', 30000, 'PAID'),
('34567', 30000, 'NOT PAID'),
('47384', 30000, 'NOT PAID'),
('56789', 30000, 'PAID'),
('56987', 30000, 'NOT PAID'),
('86573', 30000, 'NOT PAID'),
('88844', 30000, 'NOT PAID');

-- --------------------------------------------------------

--
-- Table structure for table `regularstaff`
--

CREATE TABLE `regularstaff` (
  `STAFF_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `FNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `LNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `DESIGNATION` text COLLATE utf8_unicode_ci NOT NULL,
  `QUALIFICATION` text COLLATE utf8_unicode_ci NOT NULL,
  `DEPT_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regularstaff`
--

INSERT INTO `regularstaff` (`STAFF_ID`, `FNAME`, `LNAME`, `EMAIL`, `DESIGNATION`, `QUALIFICATION`, `DEPT_ID`) VALUES
('RS-01', 'MARIA', 'WAQAS', 'MW@gmail.com', 'TEACHER', 'MASTERS', 'CS-10'),
('RS-02', 'KASHIF', 'ASRAR', 'ka@gmail.com', 'ASSISTANT', 'UG', 'ME-10'),
('RS-03', 'ALI', 'USMAN', 'aliusman@gmail.com', 'TEACHER', 'PHD', 'HS-10'),
('RS-04', 'KASHIF', 'WAQAS', 'kw@gmail.com', 'CHAIRMAN', 'PHD', 'EE-10'),
('RS-05', 'ANAS', 'NAVEED', 'anasnav@gmail.com', 'ASSISTANT', 'UG', 'EL-10'),
('RS-06', 'Muhammad', 'Khizer', 'mkhizer@gmail.com', 'CHAIRMAN', 'PHD', 'CE-10');

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `SOCIETY_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`SOCIETY_ID`, `NAME`) VALUES
('AIC-01', 'ARTIFICIAL INTELLIGENCE CLUB'),
('ASME-01', 'AMERICAN SOCIETY OF MECHANICAL ENGINEERS'),
('CC-01', 'COMPUTER CLUB'),
('EC-01', 'ELECTRICAL CLUB'),
('IMECHE-01', 'INSTITUTION OF MECH ENG'),
('TMHC-01', 'THE MENTAL HEALTH CLUB');

-- --------------------------------------------------------

--
-- Table structure for table `staff_contacts`
--

CREATE TABLE `staff_contacts` (
  `STAFF_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PHONE_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_contacts`
--

INSERT INTO `staff_contacts` (`STAFF_ID`, `PHONE_NO`) VALUES
('RS-01', 123456789),
('RS-04', 127583465),
('RS-02', 234556788),
('RS-03', 234567182),
('RS-05', 317255466),
('VS-02', 334455665),
('VS-05', 364821957),
('VS-04', 559123768),
('RS-02', 596723485),
('VS-03', 886647356),
('VS-03', 896754234),
('RS-04', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ROLL_NO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `BATCH` int(4) NOT NULL,
  `FNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `LNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `GENDER` text COLLATE utf8_unicode_ci NOT NULL,
  `DEPT_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ACC_NO` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ROLL_NO`, `BATCH`, `FNAME`, `LNAME`, `DOB`, `GENDER`, `DEPT_ID`, `ACC_NO`) VALUES
('CS-045', 2019, 'Hasnain', 'Ali', '2002-10-28', 'M', 'CS-10', '12345'),
('CS-058', 2019, 'Eesha', 'Ansari', '2000-11-15', 'F', 'CS-10', '23456'),
('EE-026', 2019, 'Ayesha', 'Aamir', '2001-08-03', 'F', 'EE-10', '12567'),
('EE-056', 2020, 'Muhammad', 'Areeb', '2001-07-27', 'M', 'EE-10', '34567'),
('HS-018', 2018, 'Bisma', 'Imran', '2000-05-23', 'F', 'HS-10', '47384'),
('HS-018', 2020, 'Sadaf', 'Jawed', '2000-12-30', 'F', 'HS-10', '86573'),
('HS-074', 2018, 'Heba', 'Naveed', '2000-10-08', 'F', 'HS-10', '56789'),
('ME-020', 2020, 'Izma ', 'Aziz', '2001-04-07', 'F', 'ME-10', '56987'),
('ME-037', 2018, 'Hamza ', 'Junaid', '2000-05-23', 'M', 'ME-10', '88844');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `ROLL_NO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `BATCH` int(4) NOT NULL,
  `COURSE_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`ROLL_NO`, `BATCH`, `COURSE_ID`) VALUES
('CS-045', 2019, 'CS-222'),
('CS-045', 2019, 'CS-218'),
('CS-045', 2019, 'CS-123'),
('CS-058', 2019, 'CS-222'),
('CS-058', 2019, 'CS-218'),
('EE-026', 2019, 'HS-234'),
('EE-026', 2019, 'EE-567'),
('EE-056', 2020, 'EE-856'),
('EE-056', 2020, 'CS-222');

-- --------------------------------------------------------

--
-- Table structure for table `student_societies`
--

CREATE TABLE `student_societies` (
  `ROLL_NO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `BATCH` int(4) NOT NULL,
  `SOCIETY_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_societies`
--

INSERT INTO `student_societies` (`ROLL_NO`, `BATCH`, `SOCIETY_ID`) VALUES
('ME-020', 2020, 'IMECHE-01'),
('ME-020', 2020, 'CC-01'),
('HS-074', 2018, 'TMHC-01'),
('HS-074', 2018, 'EC-01'),
('HS-018', 2020, 'ASME-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(6, 'hasnain', 'beinghasnain16@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'heba', 'heba1@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(8, 'eesha', 'eesha12@gmail.com', 'c0e48bf6ad73a5cbced35b3dca24a9d5');

-- --------------------------------------------------------

--
-- Table structure for table `visitingstaff`
--

CREATE TABLE `visitingstaff` (
  `STAFF_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `LNAME` text COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `DESIGNATION` text COLLATE utf8_unicode_ci NOT NULL,
  `QUALIFICATION` text COLLATE utf8_unicode_ci NOT NULL,
  `UNI_NAME` text COLLATE utf8_unicode_ci NOT NULL,
  `DEPT_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitingstaff`
--

INSERT INTO `visitingstaff` (`STAFF_ID`, `FNAME`, `LNAME`, `EMAIL`, `DESIGNATION`, `QUALIFICATION`, `UNI_NAME`, `DEPT_ID`) VALUES
('VS-01', 'MEHAK', 'WAQAS', 'mwaqass@gmail.com', 'ASSISTANT', 'PHD', 'NUST', 'PH-10'),
('VS-02', 'AFFAN', 'KHOKAR', 'affankho@gmail.com', 'ASSISTANT', 'MASTERS', 'IQRA', 'EE-10'),
('VS-03', 'ZAHRA', 'ASHFAQUE', 'zahraa@gmail.com', 'LECTURER', 'PHD', 'NED', 'EL-10'),
('VS-04', 'FATIMA', 'SHAH', 'fatimahsss@gmail.com', 'LECTURER', 'MASTERS', 'CBM', 'ME-10'),
('VS-05', 'IRTIZA', 'ALI', 'irtizz@gmail.com', 'LECTURER', 'MASTERS', 'KU', 'HS-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `department_courses`
--
ALTER TABLE `department_courses`
  ADD KEY `DC_FK` (`DEPT_ID`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`ACC_NO`);

--
-- Indexes for table `regularstaff`
--
ALTER TABLE `regularstaff`
  ADD PRIMARY KEY (`STAFF_ID`),
  ADD KEY `RG_FK` (`DEPT_ID`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`SOCIETY_ID`);

--
-- Indexes for table `staff_contacts`
--
ALTER TABLE `staff_contacts`
  ADD PRIMARY KEY (`PHONE_NO`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ROLL_NO`,`BATCH`),
  ADD KEY `ST_FK1` (`DEPT_ID`),
  ADD KEY `ST_FKA` (`ACC_NO`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD KEY `SC_1` (`COURSE_ID`),
  ADD KEY `SC_2` (`ROLL_NO`,`BATCH`);

--
-- Indexes for table `student_societies`
--
ALTER TABLE `student_societies`
  ADD KEY `SS_FK1` (`SOCIETY_ID`),
  ADD KEY `SS_FK2` (`ROLL_NO`,`BATCH`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `visitingstaff`
--
ALTER TABLE `visitingstaff`
  ADD PRIMARY KEY (`STAFF_ID`),
  ADD KEY `VS_FK` (`DEPT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_courses`
--
ALTER TABLE `department_courses`
  ADD CONSTRAINT `DC_FK` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `regularstaff`
--
ALTER TABLE `regularstaff`
  ADD CONSTRAINT `RG_FK` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `ST_FK1` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`),
  ADD CONSTRAINT `ST_FKA` FOREIGN KEY (`ACC_NO`) REFERENCES `finance` (`ACC_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `SC_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `SC_2` FOREIGN KEY (`ROLL_NO`,`BATCH`) REFERENCES `student` (`ROLL_NO`, `BATCH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_societies`
--
ALTER TABLE `student_societies`
  ADD CONSTRAINT `SS_FK1` FOREIGN KEY (`SOCIETY_ID`) REFERENCES `societies` (`SOCIETY_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `SS_FK2` FOREIGN KEY (`ROLL_NO`,`BATCH`) REFERENCES `student` (`ROLL_NO`, `BATCH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visitingstaff`
--
ALTER TABLE `visitingstaff`
  ADD CONSTRAINT `VS_FK` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

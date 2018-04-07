-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 03:51 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `row_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `row_id` int(11) NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `transaction` varchar(255) NOT NULL COMMENT 'cash_credit_check',
  `payment_type` varchar(255) NOT NULL COMMENT 'down_full',
  `cash_amount` varchar(255) NOT NULL DEFAULT '0',
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL DEFAULT '0',
  `card_amount` varchar(255) NOT NULL DEFAULT '0',
  `card_expiration` varchar(255) NOT NULL DEFAULT '0',
  `card_securitycode` varchar(255) NOT NULL DEFAULT '0',
  `check_number` varchar(255) NOT NULL DEFAULT '0',
  `check_amount` varchar(255) NOT NULL DEFAULT '0',
  `check_phone` varchar(255) NOT NULL DEFAULT '0',
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `role`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Max', 'Afton', 'Rant', 'Admin', 1),
(2, 'acruz', 'e10adc3949ba59abbe56e057f20f883e', 'Romano', 'Aurella', 'Cruz', 'Teacher', 1),
(3, 'rtruz', 'e10adc3949ba59abbe56e057f20f883e', 'Ren', 'Dam', 'Truz', 'Accountant', 1),
(4, 'xicas', 'e10adc3949ba59abbe56e057f20f883e', 'Xhnun', 'Nath', 'Icas', 'Admin', 1),
(5, 'zyipp', 'e10adc3949ba59abbe56e057f20f883e', 'Zipp', 'Winrr', 'Yipp', 'Accountant', 1),
(6, 'wtwo', 'e10adc3949ba59abbe56e057f20f883e', 'Wan', 'Litter', 'Two', 'Teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `user_id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `year_id` varchar(255) NOT NULL,
  `latestnumber` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `lastschool` varchar(255) NOT NULL,
  `schooladdress` varchar(255) NOT NULL,
  `yeargraduation` varchar(255) NOT NULL,
  `gpa` varchar(255) NOT NULL,
  `honors` varchar(255) NOT NULL,
  `school_last_attended` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `last_school_year_attended` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `parent_phone` varchar(255) NOT NULL,
  `parent_religion` varchar(255) NOT NULL,
  `educational_attainment_father` varchar(255) NOT NULL,
  `educational_attainment_mother` varchar(255) NOT NULL,
  `occupation_father` varchar(255) NOT NULL,
  `occupation_mother` varchar(255) NOT NULL,
  `email_father` varchar(255) NOT NULL,
  `email_mother` varchar(255) NOT NULL,
  `name_guardian` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `mailing_address` varchar(255) NOT NULL,
  `guardian_phone` varchar(255) NOT NULL,
  `siblings_yes_no` varchar(255) NOT NULL,
  `sibling_name` varchar(255) NOT NULL,
  `sibling_level_year` varchar(255) NOT NULL,
  `how_did_know_angelicum` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `type_of_application` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `is_paid` varchar(255) NOT NULL COMMENT 'full or down',
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`user_id`, `level`, `year`, `studentnumber`, `year_id`, `latestnumber`, `lastname`, `firstname`, `middlename`, `address`, `dateofbirth`, `placeofbirth`, `email`, `student_phone`, `postal`, `citizenship`, `religion`, `civilstatus`, `age`, `gender`, `lastschool`, `schooladdress`, `yeargraduation`, `gpa`, `honors`, `school_last_attended`, `course`, `last_school_year_attended`, `father_name`, `mother_name`, `parent_phone`, `parent_religion`, `educational_attainment_father`, `educational_attainment_mother`, `occupation_father`, `occupation_mother`, `email_father`, `email_mother`, `name_guardian`, `relationship`, `mailing_address`, `guardian_phone`, `siblings_yes_no`, `sibling_name`, `sibling_level_year`, `how_did_know_angelicum`, `exam_date`, `type_of_application`, `password`, `role`, `is_paid`, `status`) VALUES
(1, 'High School', '2', '201700001', '2017', '1', 'Tyler', 'Mike', 'Cham', 'Manila', 'November 28 2003', 'Manila Hospital', 'miketyler@gmail.com', '123456789012', '1122', 'Filipino', 'Catholic', 'Single', '12', 'male', 'iadjaidn', 'iasdiadi', 'aisdnasind', '1', 'aasduihadu', 'aisdasid', 'asdijadija', 'aisdjaisdj', 'iajdijadj', 'mcvwnvuweb', '231231214241', 'cnacnsuanc', 'acnnauca', 'iasdmciamcsi', 'cainciansi', 'casicaicmac', 'asucbnauc@gmail.com', 'IAsndiamn@yahoo.com', 'aidmasimca', 'acinnsccas', 'amsciamsc@gmail.com', '12345674891', 'no', '', '', 'iaicaixcma', '2017/09/22 15:23', '6', '530a2e05cfb13193b24469c2e65d09ef', 'student', '0', 1),
(2, 'High School', '2', '201700002', '2017', '2', 'Layn', 'Michael Angelo', 'Wheton', 'Quezon City', 'January 12, 2000', 'Quezon City Hospital', 'Laydddn@gmail.com', '09218731821', '112', 'Filipino', 'Catholic', 'Single ', '13', 'male', 'Trost', 'Trost Quezon City', '2009', '2.0', '', 'Trost', 'High School', '2013', 'eoameoa', 'aomdoamd', '1231141241', 'omadosmd', 'uwnundf', 'uwnuendunq', 'winfwindfi', 'qidmnqidniqn', 'qidniin@gmail.com', 'infasinf@gmail.com', 'asidjai', 'iamdaimd', 'dAIWMDi@gmail.com', '912381983', 'no', '', '', 'acafadfadf', '2017/09/23 19:31', '7', 'e10adc3949ba59abbe56e057f20f883e', 'student', '0', 1),
(3, 'High School', '1', '201700003', '2017', '3', 'Mart', 'Manse', 'Mant', '95 Hermogenes Street, Sofia Subdivision Del Pilar, San Fernando City', 'January 11 1999', 'Manila City Hospital', 'mart@gmail.com', '09268301211', '1442', 'Filipino', 'Catholic', 'Single ', '12', 'male', 'San Fernando Montessori', 'San Fernando St. Brgy. 2 Del Pilar', '2017', '87', 'None', 'San Fernando Montessori', 'Grade School', '2017', 'Samuel H. Magtanggol', 'Rach H. Magtanggol', '09268302322', 'Catholic', 'Civil Engineer', 'Accountancy', 'Engineer', 'Bank Employee', 'samuel@gmail.com', 'Rach@gmail.com', 'Arrijsj G. Castillo', 'Aunt', 'aaa@gmail.com', '88829912341', 'yes', 'Mark SSuiii', 'Grade School 2', 'From my parents', '2017/09/21 20:44', '1', 'd637051989cc17a2abf66edcdf39baea', 'student', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL COMMENT 'foreign key for classes section id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_section`
--
ALTER TABLE `student_section`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

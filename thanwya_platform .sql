-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 10:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thanwya_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `uid`) VALUES
(1, 'admin samir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `Cid` int(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cloc` varchar(50) NOT NULL,
  `cnumber` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`Cid`, `cname`, `cloc`, `cnumber`, `uid`) VALUES
(0, 'default', '[value-3]', '[value-6]', 54),
(1, 'elhedayaa', 'sefarat', '01286749530', 52),
(4, 'huda', 'nasr city', '01286749530', 51);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `sessid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `sid`, `sessid`) VALUES
(19, 31, 16),
(20, 31, 20),
(21, 31, 18),
(22, 31, 23);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pgid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `linkaddress` varchar(50) NOT NULL,
  `icons` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pgid`, `name`, `linkaddress`, `icons`, `class`) VALUES
(2, 'search and delete', 'adminsearch.php', '<iconify-icon icon=\"material-symbols:delete\"></iconify-icon>', ''),
(3, 'overview', 'admin.php', '<i class=\"ri-bar-chart-line\"></i>', 'active'),
(4, 'patientsearch', 'patients.php', '<iconify-icon icon=\"openmoji:patient-clipboard\"></iconify-icon>', ''),
(5, 'permissions', 'permissions.php', '<iconify-icon icon=\"mingcute:user-security-line\"></iconify-icon>', ''),
(6, 'view appointments', 'viewSessions.php', '<iconify-icon icon=\"carbon:view\"></iconify-icon>', ''),
(7, 'add appointments', 'addSessions.php', '<iconify-icon icon=\"basil:add-solid\"></iconify-icon>', ''),
(8, 'logout', 'logout.php', '<iconify-icon icon=\"icon-park:logout\"></iconify-icon>', ''),
(9, 'patient home', 'studentindex.php', '<i class=\"ri-bar-chart-line\"></i>', 'active'),
(10, 'add users', 'users.php', '<iconify-icon icon=\"mdi:user-add\"></iconify-icon>', ''),
(18, 'add page', 'addpage.php', '<iconify-icon icon=\"iconoir:multiple-pages-add\"></iconify-icon>', ''),
(20, 'booking', 'enrollment.php', '<iconify-icon icon=\"tabler:brand-booking\"></iconify-icon>', ''),
(21, 'settings', 'settings.php', '<iconify-icon icon=\"uil:setting\"></iconify-icon>', ''),
(22, 'retrievedocs', 'retrievedocs.php', '<iconify-icon icon=\"fontisto:doctor\"></iconify-icon>', ''),
(23, 'admin overview', 'adminmain.php', '<i class=\"ri-bar-chart-line\"></i>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessid` int(50) NOT NULL,
  `tid` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Cid` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `date` date NOT NULL,
  `enrolled` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessid`, `tid`, `time`, `status`, `Cid`, `price`, `date`, `enrolled`) VALUES
(15, 12, '10pm', 'available', 4, 502, '2023-12-21', 0),
(16, 12, '9:30pm', 'available', 4, 2900, '2024-05-13', 0),
(17, 15, '10am', 'available', 1, 2000, '2023-12-22', 0),
(18, 15, '9am', 'available', 1, 5155, '2023-12-28', 0),
(19, 15, '2 am', 'available', 1, 20202, '2023-12-28', 0),
(20, 15, '6:20am', 'available', 1, 202202, '2023-12-27', 0),
(21, 12, '10 am', 'available', 4, 2000, '2023-12-28', 0),
(22, 12, '8pm', 'available', 4, 115, '2023-12-28', 0),
(23, 14, '10pm', 'available', 4, 41, '2023-12-27', 0),
(24, 14, '6pm', 'available', 4, 55, '2023-12-26', 0),
(27, 1, '9:99 am', 'available', 1, 787, '2024-05-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `firstname`, `lastname`, `age`, `gender`, `address`, `number`, `uid`) VALUES
(5, 'ibrahim', 'wagih', '21', 'm', 'madinaty', '0111111', 20),
(14, 'Abdelrahman', 'Samir', '', '', 'nasr city', '01286749530', 34),
(15, 'abdelrahman', 'samir', '', '', '', '', 35),
(17, 'abdo', 'samir', '20', 'Male', 'Sefarat', '0128674953', 37),
(18, 'seif', 'sherif', '', 'Male', '', '', 39),
(20, 'Abdelrahman', 'Samir', '', '', '', '', 41),
(25, 'Abdelrahman', 'Samir', '', '', '', '', 47),
(26, 'Abdelrahman', 'Samir', '', '', '', '', 48),
(27, 'Abdelrahman', 'Samir', '', '', '', '', 49),
(29, 'seif', 'patient', '12345678', 'M', 'sas', '012251020', 59),
(30, 'doctor', 'conor', '20', 'M', '1_zbdjssdjkw', '010251525', 60),
(31, 'doc', 'seifo', '20', 'M', '1 sdhakk', '010255544', 61),
(32, 'marwan', 'mourad', '20', 'M', '1-madinaty', '0115525151', 63);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `educ` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `Cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `firstname`, `lastname`, `subject`, `number`, `educ`, `uid`, `Cid`) VALUES
(1, 'dr', 'samir', 'neurology', '01286749530', 'miu', 27, 1),
(12, 'Abdelrahman', 'Samir', 'gera7a', '01286749530', 'miu', 57, 4),
(13, 'doctor', 'seif', 'eye', '0101029291', 'harvard', 58, 0),
(14, 'doc', 'wego', 'eye', '011520525515', 'harvard', 62, 4),
(15, 'aly', 'lolly', 'bones', '02051515152', 'miu', 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `utid` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`utid`, `name`) VALUES
(0, 'default'),
(1, 'admin'),
(2, 'teacher'),
(3, 'center'),
(4, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `upid` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `pageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`upid`, `usertypeid`, `pageid`) VALUES
(16, 0, 3),
(17, 0, 5),
(120, 2, 3),
(121, 2, 4),
(122, 2, 6),
(123, 2, 8),
(124, 4, 9),
(125, 4, 20),
(126, 4, 21),
(127, 4, 8),
(128, 3, 3),
(129, 3, 4),
(130, 3, 7),
(131, 3, 6),
(132, 3, 8),
(139, 1, 23),
(140, 1, 5),
(141, 1, 10),
(142, 1, 18),
(143, 1, 2),
(144, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `uid` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`uid`, `email`, `pass`, `usertype_id`, `image`) VALUES
(1, 'samirzzz@email.com', '12345678', 1, ''),
(10, 'test12@gmail.com', '1111', 1, ''),
(15, 'abdelrahman2108', '1234', 2, ''),
(20, 'ibrahim2105690@miuegypt.edu.eg', '123', 0, ''),
(27, 'test122@gmail.com', '12345678', 2, 'abdelrahman.200300@gmail.com.jpg'),
(34, 'abdelrahman.200300@gmail.com', '', 0, ''),
(35, 'abdelrahman.20030440@gmail.com', '', 0, ''),
(36, 'abdelrahman.200300@gmail.com', '12345678', 2, ''),
(37, 'abdo@email.com', '12345678', 4, 'abdelrahman.200300@gmail.com.jpg'),
(39, 'seifo@email.com', '', 0, ''),
(41, 'abdelrahman.20030d0@gmail.com', '', 0, ''),
(47, 'abdelrahman.2003@gmail.com', '12345678', 0, ''),
(48, 'abdelrahman.20000@gmail.com', '12345678', 0, ''),
(49, 'abdelrahman.2300@gmail.com', '12345678', 0, ''),
(51, 'elhuda@gmail.com', '12345678', 3, ''),
(52, 'hedaya@gmail.com', '12345678', 3, ''),
(53, 'abdelrahman.200300@gmail.com', '12345678', 2, 'abdelrahman.200300@gmail.com.jpg'),
(54, 'defalut', 'defalut', 3, 'defalut'),
(57, 'samird@gmail.com', '12345678', 2, 'abdelrahman.2003000@gmail.com.jpg'),
(58, 'seifodoc@gmail.com', '12345678', 2, 'seifod@gmail.com.jpg'),
(59, 'aliarafat534@gmail.com', '12345678', 4, 'patient@gmail.com.png'),
(60, 'conorp@gmail.com', '12345678', 4, 'conorp@gmail.com.jpg'),
(61, 'seifop@gmail.com', '12345678', 4, 'seifop@gmail.com.jpg'),
(62, 'wegod@gmail.com', '12345678', 2, 'wegod@gmail.com.jpg'),
(63, 'marop@gmail.com', '12345678', 4, 'marwand@gmail.com.png'),
(64, 'alyd@gmail.com', '12345678', 2, 'alyd@gmail.com.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollment_ibfk_1` (`sessid`),
  ADD KEY `enrollment_ibfk_2` (`sid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pgid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessid`),
  ADD KEY `Did` (`tid`),
  ADD KEY `Cid` (`Cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `Cid` (`Cid`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`utid`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`upid`),
  ADD KEY `pageid` (`pageid`),
  ADD KEY `usertypeid` (`usertypeid`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `user_id` (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `Cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `utid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `upid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `center`
--
ALTER TABLE `center`
  ADD CONSTRAINT `center_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`sessid`) REFERENCES `sessions` (`sessid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessions_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `center` (`Cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `center` (`Cid`);

--
-- Constraints for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD CONSTRAINT `usertype_pages_ibfk_1` FOREIGN KEY (`pageid`) REFERENCES `pages` (`pgid`),
  ADD CONSTRAINT `usertype_pages_ibfk_2` FOREIGN KEY (`usertypeid`) REFERENCES `usertypes` (`utid`);

--
-- Constraints for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD CONSTRAINT `user_acc_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`utid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

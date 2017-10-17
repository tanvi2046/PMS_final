-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2017 at 11:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `stageID` int(11) NOT NULL,
  `type` varchar(258) NOT NULL,
  `content` varchar(258) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `label` varchar(258) NOT NULL,
  `activityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(258) NOT NULL,
  `description` varchar(258) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `confirmation` varchar(259) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noteID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `title` varchar(258) NOT NULL,
  `description` varchar(258) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noteID`, `projectID`, `title`, `description`, `startdate`, `enddate`) VALUES
(1, 8, 'test', 'this is test', '2017-09-12 00:00:00', '2017-09-20 00:00:00'),
(2, 8, 'test', 'this is test', '2017-09-12 00:00:00', '2017-09-20 00:00:00'),
(3, 8, 'test', 'this is test', '2017-09-12 00:00:00', '2017-09-20 00:00:00'),
(4, 8, 'test', 'this is test', '2017-09-20 00:00:00', '2017-09-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(11) NOT NULL,
  `name` varchar(258) NOT NULL,
  `description` varchar(259) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `name`, `description`, `startdate`, `enddate`) VALUES
(8, 'project management ', 'hi', '2017-09-20 00:00:00', '2017-09-28 00:00:00'),
(9, 'project management ', 'undefined', '1970-01-01 00:00:00', '0000-00-00 00:00:00'),
(10, 'proposal', '', '2017-09-05 00:00:00', '2017-09-28 00:00:00'),
(11, 'proposal', '', '2017-09-05 00:00:00', '2017-09-28 00:00:00'),
(12, 'proposal', '', '2017-09-05 00:00:00', '2017-09-28 00:00:00'),
(13, 'proposal', '', '2017-09-19 00:00:00', '2017-09-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `id` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_files`
--

INSERT INTO `project_files` (`id`, `projectID`, `file_path`, `name`) VALUES
(3, 9, 'http://localhost/pms/uploads/150732330620930427_1679811822052425_777536830_o.jpg', 'test file'),
(4, 9, 'http://localhost/pms/uploads/1507323413Generic Project Proposal Template.doc', 'test file');

-- --------------------------------------------------------

--
-- Table structure for table `project_messages`
--

CREATE TABLE `project_messages` (
  `id` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_messages`
--

INSERT INTO `project_messages` (`id`, `projectID`, `message`, `sender`) VALUES
(1, 9, 'hi', 'student'),
(2, 9, 'hi', 'student'),
(3, 9, 'hi', 'student'),
(4, 9, 'hi', 'student'),
(5, 8, 'hi', 'admin'),
(6, 9, 'hi', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `stageaid` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `stageName` varchar(258) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`stageaid`, `projectID`, `stageName`, `startdate`, `enddate`) VALUES
(1, 9, 'proposal1', '1970-01-01 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fname` varchar(258) NOT NULL,
  `lname` varchar(258) NOT NULL,
  `username` varchar(258) NOT NULL,
  `email` varchar(258) NOT NULL,
  `user_type` varchar(258) NOT NULL,
  `password` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `lname`, `username`, `email`, `user_type`, `password`) VALUES
(2, 'ali', 'raza', 'ammar', 'abc@gmail.com', 'admin', 'abc'),
(4, 'rauf', 'bodla', 'rauf', 'a@gmail.com', 'student', 'abc'),
(5, 'ali', 'bhai', 'ali', 'bodla.pu@gmail.com', 'admin', '123'),
(6, 'ali', 'bhai', 'rauf1', 'bodla.pu@gmail.com', 'admin', '123'),
(7, 'ali4', 'bhai', 'ali2', 'bodla.pu@gmail.com', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`id`, `userID`, `projectID`) VALUES
(1, 2, 8),
(2, 2, 9),
(3, 4, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noteID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_messages`
--
ALTER TABLE `project_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stageaid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_messages`
--
ALTER TABLE `project_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stageaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

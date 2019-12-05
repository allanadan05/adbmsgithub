-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 08:56 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms`
--
CREATE DATABASE IF NOT EXISTS `elms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `elms`;

-- --------------------------------------------------------

--
-- Table structure for table `announcementtbl`
--

DROP TABLE IF EXISTS `announcementtbl`;
CREATE TABLE `announcementtbl` (
  `announceid` int(10) NOT NULL,
  `antitle` varchar(1000) NOT NULL,
  `andetails` text NOT NULL,
  `dateposted` date NOT NULL,
  `anfrom` varchar(100) NOT NULL,
  `sectionid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `announcementtbl`
--

TRUNCATE TABLE `announcementtbl`;
--
-- Dumping data for table `announcementtbl`
--

INSERT INTO `announcementtbl` (`announceid`, `antitle`, `andetails`, `dateposted`, `anfrom`, `sectionid`, `subjectid`, `userid`) VALUES
(19, 'ako na ang pinaka!', 'ako nga pala si espencer ang hari ng half moon!', '2019-11-29', 'bulate pencer', 5, 0, 0),
(20, 'Welcome', 'You should see this Dan', '2019-12-05', 'decano rye angelica', 0, 0, 1),
(21, 'Welcome', 'Dan cant see this announcement', '2019-12-05', 'decano rye angelica', 0, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `answertbl`
--

DROP TABLE IF EXISTS `answertbl`;
CREATE TABLE `answertbl` (
  `answerid` int(10) NOT NULL,
  `questionid` int(10) NOT NULL,
  `optionid` int(10) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `answertbl`
--

TRUNCATE TABLE `answertbl`;
--
-- Dumping data for table `answertbl`
--

INSERT INTO `answertbl` (`answerid`, `questionid`, `optionid`, `answer`) VALUES
(1, 1, 1, 'C'),
(2, 2, 2, 'B'),
(3, 3, 3, 'a'),
(4, 4, 4, 'b'),
(5, 5, 5, 'd'),
(6, 6, 6, 'b'),
(7, 7, 7, 'A'),
(8, 8, 8, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `chaptertbl`
--

DROP TABLE IF EXISTS `chaptertbl`;
CREATE TABLE `chaptertbl` (
  `chapterid` int(10) NOT NULL,
  `chaptername` varchar(100) NOT NULL,
  `subjectid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `chaptertbl`
--

TRUNCATE TABLE `chaptertbl`;
-- --------------------------------------------------------

--
-- Table structure for table `departmenttbl`
--

DROP TABLE IF EXISTS `departmenttbl`;
CREATE TABLE `departmenttbl` (
  `deptid` int(10) NOT NULL,
  `departmentname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `departmenttbl`
--

TRUNCATE TABLE `departmenttbl`;
--
-- Dumping data for table `departmenttbl`
--

INSERT INTO `departmenttbl` (`deptid`, `departmentname`) VALUES
(1, 'BSBA'),
(2, 'IIT'),
(3, 'GATE'),
(4, 'HRM'),
(5, 'HRM');

-- --------------------------------------------------------

--
-- Table structure for table `lessontbl`
--

DROP TABLE IF EXISTS `lessontbl`;
CREATE TABLE `lessontbl` (
  `lessonid` int(10) NOT NULL,
  `lessontitle` varchar(100) NOT NULL,
  `lessondetail` text NOT NULL,
  `lessonpdf` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `subjectid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `lessontbl`
--

TRUNCATE TABLE `lessontbl`;
--
-- Dumping data for table `lessontbl`
--

INSERT INTO `lessontbl` (`lessonid`, `lessontitle`, `lessondetail`, `lessonpdf`, `path`, `subjectid`) VALUES
(71, 'math', '2+2 = 4', './uploads/sample.pdf', '', 1),
(72, 'asdas', 'asdasd', './uploads/_uploads_yhhkl.pdf', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `optionstbl`
--

DROP TABLE IF EXISTS `optionstbl`;
CREATE TABLE `optionstbl` (
  `optionsid` int(10) NOT NULL,
  `optiona` varchar(100) NOT NULL,
  `optionb` varchar(100) NOT NULL,
  `optionc` varchar(100) NOT NULL,
  `optiond` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `optionstbl`
--

TRUNCATE TABLE `optionstbl`;
--
-- Dumping data for table `optionstbl`
--

INSERT INTO `optionstbl` (`optionsid`, `optiona`, `optionb`, `optionc`, `optiond`) VALUES
(1, '4', '7', '2', '1'),
(2, 'sven', 'meepo', 'slark', 'sniper'),
(3, 'God', 'Ama', 'Amaking', 'NinaKim'),
(4, 'God', 'Magellan', 'Amaking', 'Rodrigo Duterte'),
(5, 'Lapu-Lapu', 'Ama', 'Jose Rizal', 'Rodrigo Duterte'),
(6, 'Lapu-Lapu', 'Magellan', 'Jose Rizal', 'Rodrigo Duterte'),
(7, 'sada', 'sdas', 'dasdd', 'asd'),
(8, 'Lapu-Lapu', 'Magellan', 'Jose Rizal', 'Rodrigo Duterte');

-- --------------------------------------------------------

--
-- Table structure for table `questiontbl`
--

DROP TABLE IF EXISTS `questiontbl`;
CREATE TABLE `questiontbl` (
  `questionid` int(10) NOT NULL,
  `quizid` int(10) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `questiontbl`
--

TRUNCATE TABLE `questiontbl`;
--
-- Dumping data for table `questiontbl`
--

INSERT INTO `questiontbl` (`questionid`, `quizid`, `question`) VALUES
(1, 1, '1+1?'),
(2, 2, 'sino ang pinaka malakas na hero sa dota?'),
(3, 3, 'Who is your father?'),
(4, 2, 'Who is your father?'),
(5, 1, 'Who is your father?'),
(6, 1, 'Who is your father?'),
(7, 4, 'sdda'),
(8, 1, 'Who is the most powerful character in dota 1?');

-- --------------------------------------------------------

--
-- Table structure for table `quizbridgetbl`
--

DROP TABLE IF EXISTS `quizbridgetbl`;
CREATE TABLE `quizbridgetbl` (
  `quizbridgeid` int(10) NOT NULL,
  `quizid` int(10) DEFAULT NULL,
  `questionid` int(10) DEFAULT NULL,
  `answerid` int(10) DEFAULT NULL,
  `optionid` int(10) DEFAULT NULL,
  `chapterid` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `starttime` int(10) DEFAULT NULL,
  `endtime` int(10) DEFAULT NULL,
  `scoreid` int(10) DEFAULT NULL,
  `correntanswer` int(10) DEFAULT NULL,
  `wronganswer` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `quizbridgetbl`
--

TRUNCATE TABLE `quizbridgetbl`;
-- --------------------------------------------------------

--
-- Table structure for table `quiztbl`
--

DROP TABLE IF EXISTS `quiztbl`;
CREATE TABLE `quiztbl` (
  `quizid` int(10) NOT NULL,
  `quizname` varchar(100) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `duration` time NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `quiztbl`
--

TRUNCATE TABLE `quiztbl`;
--
-- Dumping data for table `quiztbl`
--

INSERT INTO `quiztbl` (`quizid`, `quizname`, `subjectid`, `duration`, `status`) VALUES
(1, 'title', 5, '01:01:00', 'ACTIVATED'),
(2, 'Information Management', 2, '00:00:00', 'DEACTIVATED'),
(4, 'Article 4', 5, '01:02:00', 'ACTIVATED');

-- --------------------------------------------------------

--
-- Table structure for table `scoretbl`
--

DROP TABLE IF EXISTS `scoretbl`;
CREATE TABLE `scoretbl` (
  `scoreid` int(10) NOT NULL,
  `totalscore` int(100) NOT NULL,
  `averagescore` float(10,2) NOT NULL,
  `quizid` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `scoretbl`
--

TRUNCATE TABLE `scoretbl`;
-- --------------------------------------------------------

--
-- Table structure for table `sectionquizbridgetbl`
--

DROP TABLE IF EXISTS `sectionquizbridgetbl`;
CREATE TABLE `sectionquizbridgetbl` (
  `sectionquizbridgeid` int(10) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `quizid` int(10) DEFAULT NULL,
  `student` varchar(100) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectionquizbridgetbl`
--

TRUNCATE TABLE `sectionquizbridgetbl`;
-- --------------------------------------------------------

--
-- Table structure for table `sectionstudentbridgetbl`
--

DROP TABLE IF EXISTS `sectionstudentbridgetbl`;
CREATE TABLE `sectionstudentbridgetbl` (
  `sectionstudentbridgeid` int(10) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `teachersuserid` int(10) DEFAULT NULL,
  `student_userid` int(10) DEFAULT NULL,
  `section_section` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectionstudentbridgetbl`
--

TRUNCATE TABLE `sectionstudentbridgetbl`;
-- --------------------------------------------------------

--
-- Table structure for table `sectionsubjecttbl`
--

DROP TABLE IF EXISTS `sectionsubjecttbl`;
CREATE TABLE `sectionsubjecttbl` (
  `sectionsubjectid` int(10) NOT NULL,
  `sectionid` int(10) DEFAULT NULL,
  `subjectid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectionsubjecttbl`
--

TRUNCATE TABLE `sectionsubjecttbl`;
--
-- Dumping data for table `sectionsubjecttbl`
--

INSERT INTO `sectionsubjecttbl` (`sectionsubjectid`, `sectionid`, `subjectid`) VALUES
(1, 5, 0),
(2, 2, 5),
(3, 1, 6),
(4, 0, 11),
(5, 0, 0),
(6, NULL, 1),
(7, 3, 3),
(8, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbl`
--

DROP TABLE IF EXISTS `sectiontbl`;
CREATE TABLE `sectiontbl` (
  `sectionid` int(10) NOT NULL,
  `sectionname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectiontbl`
--

TRUNCATE TABLE `sectiontbl`;
--
-- Dumping data for table `sectiontbl`
--

INSERT INTO `sectiontbl` (`sectionid`, `sectionname`) VALUES
(1, 'BSIT 3B1'),
(2, 'BSIT 3A1'),
(3, 'BSIT 3A2'),
(4, 'BSIT 4A1'),
(5, 'IIT 3A1'),
(6, 'BSIT 2A2'),
(7, 'BSIT 2A3');

-- --------------------------------------------------------

--
-- Table structure for table `subjecttbl`
--

DROP TABLE IF EXISTS `subjecttbl`;
CREATE TABLE `subjecttbl` (
  `subjectid` int(10) NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `subjectdesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `subjecttbl`
--

TRUNCATE TABLE `subjecttbl`;
--
-- Dumping data for table `subjecttbl`
--

INSERT INTO `subjecttbl` (`subjectid`, `subjectname`, `subjectdesc`) VALUES
(1, 'mathematics', 'ha ? hakdog!'),
(2, 'computer', 'dota is life!'),
(3, 'english', 'hello world!'),
(4, 'english', 'hello world!'),
(5, 'political science', 'we the sovereign filipino people!'),
(6, 'Physical education', 'push 100x'),
(7, 'Sec', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `teachersectiontbl`
--

DROP TABLE IF EXISTS `teachersectiontbl`;
CREATE TABLE `teachersectiontbl` (
  `teachersectionid` int(10) NOT NULL,
  `sectionid` int(10) NOT NULL,
  `teachersid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `teachersectiontbl`
--

TRUNCATE TABLE `teachersectiontbl`;
--
-- Dumping data for table `teachersectiontbl`
--

INSERT INTO `teachersectiontbl` (`teachersectionid`, `sectionid`, `teachersid`) VALUES
(1, 3, 0),
(2, 4, 10),
(3, 6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `teacherstbl`
--

DROP TABLE IF EXISTS `teacherstbl`;
CREATE TABLE `teacherstbl` (
  `teachersid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `deptid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `teacherstbl`
--

TRUNCATE TABLE `teacherstbl`;
--
-- Dumping data for table `teacherstbl`
--

INSERT INTO `teacherstbl` (`teachersid`, `email`, `password`, `fname`, `lname`, `mname`, `deptid`) VALUES
(1, 'angel.decano8@gmail.com', '1234', 'rye angelica', 'decano', 't', 1),
(2, 'espencer@gmail.com', '123123', 'pencer', 'bulate', 'halfmoon', 2),
(3, '123123@gmail.com', '123123', '123123', '123123', '123123', 3),
(6, 'japok@gmail.com', '123', 'japok', 'lapok', 'golteb', 3),
(7, 'asd@1q', 'asd', 'aa', 'asdasd', 'adssdasd', 2),
(8, 'qweqw@qwe', 'qweq', 'qwe', 'qwe', 'qwe', 2),
(9, 'qwe@gmail.com', 'qweqw', 'qweqe', 'qweqwe', 'qweqwe', 1),
(10, 'qwe@gmail.com', 'qwe', 'qwe', 'qwe', 'qwe', 3),
(11, 'jaricruz@gmail.com', '1234', 'jari', 'cruz', 'cruz', 4),
(12, 'lyndon@gmial.com', '123', 'lyndon', 'penaso', 'payaso', 1),
(13, 'jek@gmial.com', '123', 'jek', 'deleon', 'lion', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachersubjecttbl`
--

DROP TABLE IF EXISTS `teachersubjecttbl`;
CREATE TABLE `teachersubjecttbl` (
  `teachersubjectid` int(10) NOT NULL,
  `teachersid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `teachersubjecttbl`
--

TRUNCATE TABLE `teachersubjecttbl`;
--
-- Dumping data for table `teachersubjecttbl`
--

INSERT INTO `teachersubjecttbl` (`teachersubjectid`, `teachersid`, `subjectid`) VALUES
(1, 1, 1),
(3, 1, 2),
(5, 1, 6),
(6, 6, 6),
(7, 3, 5),
(8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

DROP TABLE IF EXISTS `userstbl`;
CREATE TABLE `userstbl` (
  `userid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `sectionid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `userstbl`
--

TRUNCATE TABLE `userstbl`;
--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userid`, `email`, `password`, `fname`, `lname`, `mname`, `sectionid`) VALUES
(1, 'DanAstillero@gmail.com', '123123', 'dan', 'adan', 'astillero', 1),
(2, 'stevenigop@gmail.com', 'steven', 'steven', 'francisco', 'gabriel', 5),
(3, 'jekdeleon@gmail.com', 'jekjek', 'jek', 'deleon', 'burat', 3),
(5, 'jek@gmail.com', '123', 'jek', 'deleon', 'lion', 1),
(6, 'stevenigop@gmail.com', 'steven', 'steven', 'francisco', 'gabriel', 2),
(7, 'jr@gmail.com', '123123', 'jr', 'jr', 'jr', 3),
(8, 'kong@gmail.com', '123', 'angelico', 'gomez', 'lopez', 4),
(16, 'apol@gmail.com', '123', 'apple', 'lansones', 'mandirigma', 1),
(17, 'jari@gmail.com', '123', 'jari', 'cruz', 'jaru', 2),
(18, 'sheenakatrinaf@yahoo.com', '1234', 'sheena', 'francisco', 'gabriel', 3),
(19, 'sheryl@gmail.com', '123', 'sheryl', 'francisco', 'gabriel', 4),
(20, 'asdasd@asdasd', '123', 'asd', 'asda', 'asdas', 5),
(21, 'asdasd@asdasd', '13123', '123123', '13123', '123123', 5),
(22, 'first@first', 'first', 'aasd', 'asdad', 'asdsad', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcementtbl`
--
ALTER TABLE `announcementtbl`
  ADD PRIMARY KEY (`announceid`);

--
-- Indexes for table `answertbl`
--
ALTER TABLE `answertbl`
  ADD PRIMARY KEY (`answerid`);

--
-- Indexes for table `chaptertbl`
--
ALTER TABLE `chaptertbl`
  ADD PRIMARY KEY (`chapterid`);

--
-- Indexes for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `lessontbl`
--
ALTER TABLE `lessontbl`
  ADD PRIMARY KEY (`lessonid`);

--
-- Indexes for table `optionstbl`
--
ALTER TABLE `optionstbl`
  ADD PRIMARY KEY (`optionsid`);

--
-- Indexes for table `questiontbl`
--
ALTER TABLE `questiontbl`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `quizbridgetbl`
--
ALTER TABLE `quizbridgetbl`
  ADD PRIMARY KEY (`quizbridgeid`);

--
-- Indexes for table `quiztbl`
--
ALTER TABLE `quiztbl`
  ADD PRIMARY KEY (`quizid`);

--
-- Indexes for table `scoretbl`
--
ALTER TABLE `scoretbl`
  ADD PRIMARY KEY (`scoreid`);

--
-- Indexes for table `sectionquizbridgetbl`
--
ALTER TABLE `sectionquizbridgetbl`
  ADD PRIMARY KEY (`sectionquizbridgeid`);

--
-- Indexes for table `sectionstudentbridgetbl`
--
ALTER TABLE `sectionstudentbridgetbl`
  ADD PRIMARY KEY (`sectionstudentbridgeid`);

--
-- Indexes for table `sectionsubjecttbl`
--
ALTER TABLE `sectionsubjecttbl`
  ADD PRIMARY KEY (`sectionsubjectid`);

--
-- Indexes for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  ADD PRIMARY KEY (`sectionid`);

--
-- Indexes for table `subjecttbl`
--
ALTER TABLE `subjecttbl`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `teachersectiontbl`
--
ALTER TABLE `teachersectiontbl`
  ADD PRIMARY KEY (`teachersectionid`);

--
-- Indexes for table `teacherstbl`
--
ALTER TABLE `teacherstbl`
  ADD PRIMARY KEY (`teachersid`);

--
-- Indexes for table `teachersubjecttbl`
--
ALTER TABLE `teachersubjecttbl`
  ADD PRIMARY KEY (`teachersubjectid`);

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcementtbl`
--
ALTER TABLE `announcementtbl`
  MODIFY `announceid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `answertbl`
--
ALTER TABLE `answertbl`
  MODIFY `answerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chaptertbl`
--
ALTER TABLE `chaptertbl`
  MODIFY `chapterid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  MODIFY `deptid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessontbl`
--
ALTER TABLE `lessontbl`
  MODIFY `lessonid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `optionstbl`
--
ALTER TABLE `optionstbl`
  MODIFY `optionsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questiontbl`
--
ALTER TABLE `questiontbl`
  MODIFY `questionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizbridgetbl`
--
ALTER TABLE `quizbridgetbl`
  MODIFY `quizbridgeid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiztbl`
--
ALTER TABLE `quiztbl`
  MODIFY `quizid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scoretbl`
--
ALTER TABLE `scoretbl`
  MODIFY `scoreid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectionquizbridgetbl`
--
ALTER TABLE `sectionquizbridgetbl`
  MODIFY `sectionquizbridgeid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectionstudentbridgetbl`
--
ALTER TABLE `sectionstudentbridgetbl`
  MODIFY `sectionstudentbridgeid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectionsubjecttbl`
--
ALTER TABLE `sectionsubjecttbl`
  MODIFY `sectionsubjectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  MODIFY `sectionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjecttbl`
--
ALTER TABLE `subjecttbl`
  MODIFY `subjectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachersectiontbl`
--
ALTER TABLE `teachersectiontbl`
  MODIFY `teachersectionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacherstbl`
--
ALTER TABLE `teacherstbl`
  MODIFY `teachersid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachersubjecttbl`
--
ALTER TABLE `teachersubjecttbl`
  MODIFY `teachersubjectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

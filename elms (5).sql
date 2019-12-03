-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 10:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms`
--
CREATE DATABASE IF NOT EXISTS `elms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `elms`;

-- --------------------------------------------------------

--
-- Table structure for table `announcementtbl`
--

CREATE TABLE `announcementtbl` (
  `announceid` int(10) NOT NULL,
  `antitle` varchar(1000) NOT NULL,
  `andetails` text NOT NULL,
  `dateposted` date NOT NULL,
  `anfrom` varchar(100) NOT NULL,
  `sectionid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `announcementtbl`
--

TRUNCATE TABLE `announcementtbl`;
--
-- Dumping data for table `announcementtbl`
--

INSERT INTO `announcementtbl` (`announceid`, `antitle`, `andetails`, `dateposted`, `anfrom`, `sectionid`, `subjectid`) VALUES
(19, 'ako na ang pinaka!', 'ako nga pala si espencer ang hari ng half moon!', '2019-11-29', 'bulate pencer', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `answertbl`
--

CREATE TABLE `answertbl` (
  `answerid` int(10) NOT NULL,
  `questionid` int(10) NOT NULL,
  `optionid` int(10) NOT NULL,
  `answer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `answertbl`
--

TRUNCATE TABLE `answertbl`;
-- --------------------------------------------------------

--
-- Table structure for table `chaptertbl`
--

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

CREATE TABLE `optionstbl` (
  `optionsid` int(11) NOT NULL,
  `questionid` int(10) NOT NULL,
  `optiona` varchar(100) NOT NULL,
  `optionb` varchar(100) NOT NULL,
  `optionc` varchar(100) NOT NULL,
  `optiond` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `optionstbl`
--

TRUNCATE TABLE `optionstbl`;
-- --------------------------------------------------------

--
-- Table structure for table `questiontbl`
--

CREATE TABLE `questiontbl` (
  `questionid` int(10) NOT NULL,
  `question` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `questiontbl`
--

TRUNCATE TABLE `questiontbl`;
-- --------------------------------------------------------

--
-- Table structure for table `quizbridgetbl`
--

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

CREATE TABLE `quiztbl` (
  `quizid` int(10) NOT NULL,
  `quizname` varchar(100) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `quiztbl`
--

TRUNCATE TABLE `quiztbl`;
-- --------------------------------------------------------

--
-- Table structure for table `scoretbl`
--

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
(7, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbl`
--

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
(6, 'Physical education', 'push 100x');

-- --------------------------------------------------------

--
-- Table structure for table `teacherstbl`
--

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

CREATE TABLE `userstbl` (
  `userid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `sectionid` int(10) NOT NULL,
  `teachersid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `userstbl`
--

TRUNCATE TABLE `userstbl`;
--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userid`, `email`, `password`, `fname`, `lname`, `mname`, `sectionid`, `teachersid`) VALUES
(1, 'DanAstillero@gmail.com', '123123', 'dan', 'adan', 'astillero', 1, 0),
(2, 'stevenigop@gmail.com', 'steven', 'steven', 'francisco', 'gabriel', 5, 0),
(3, 'jekdeleon@gmail.com', 'jekjek', 'jek', 'deleon', 'burat', 3, 0),
(4, 'stevenigop@gmail.com', '123', 'steven', 'francisco', 'gabriel', 4, 0),
(5, 'jek@gmail.com', '123', 'jek', 'deleon', 'lion', 1, 0),
(6, 'stevenigop@gmail.com', 'steven', 'steven', 'francisco', 'gabriel', 2, 0),
(7, 'jr@gmail.com', '123123', 'jr', 'jr', 'jr', 3, 0),
(8, 'kong@gmail.com', '123', 'angelico', 'gomez', 'lopez', 4, 0),
(16, 'apol@gmail.com', '123', 'apple', 'lansones', 'mandirigma', 1, 0),
(17, 'jari@gmail.com', '123', 'jari', 'cruz', 'jaru', 2, 0),
(18, 'sheenakatrinaf@yahoo.com', '1234', 'sheena', 'francisco', 'gabriel', 3, 0),
(19, 'sheryl@gmail.com', '123', 'sheryl', 'francisco', 'gabriel', 4, 0),
(20, 'asdasd@asdasd', '123', 'asd', 'asda', 'asdas', 5, 0),
(21, 'asdasd@asdasd', '13123', '123123', '13123', '123123', 5, 0);

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
  ADD PRIMARY KEY (`questionid`);

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
  MODIFY `announceid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `answertbl`
--
ALTER TABLE `answertbl`
  MODIFY `answerid` int(10) NOT NULL AUTO_INCREMENT;
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
  MODIFY `questionid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questiontbl`
--
ALTER TABLE `questiontbl`
  MODIFY `questionid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quizbridgetbl`
--
ALTER TABLE `quizbridgetbl`
  MODIFY `quizbridgeid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiztbl`
--
ALTER TABLE `quiztbl`
  MODIFY `quizid` int(10) NOT NULL AUTO_INCREMENT;
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
  MODIFY `sectionsubjectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  MODIFY `sectionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjecttbl`
--
ALTER TABLE `subjecttbl`
  MODIFY `subjectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

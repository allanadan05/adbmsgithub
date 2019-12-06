-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 04:59 AM
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
CREATE TABLE IF NOT EXISTS `announcementtbl` (
  `announceid` int(10) NOT NULL AUTO_INCREMENT,
  `antitle` varchar(1000) NOT NULL,
  `andetails` text NOT NULL,
  `dateposted` date NOT NULL,
  `anfrom` varchar(100) NOT NULL,
  `sectionid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  PRIMARY KEY (`announceid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
CREATE TABLE IF NOT EXISTS `answertbl` (
  `answerid` int(10) NOT NULL AUTO_INCREMENT,
  `questionid` int(10) NOT NULL,
  `optionid` int(10) NOT NULL,
  `answer` varchar(1) NOT NULL,
  PRIMARY KEY (`answerid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(3, 3, 3, 'A'),
(4, 4, 4, 'B'),
(5, 5, 5, 'D'),
(6, 6, 6, 'B'),
(7, 7, 7, 'A'),
(8, 8, 8, 'A'),
(9, 9, 9, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `chaptertbl`
--

DROP TABLE IF EXISTS `chaptertbl`;
CREATE TABLE IF NOT EXISTS `chaptertbl` (
  `chapterid` int(10) NOT NULL AUTO_INCREMENT,
  `chaptername` varchar(100) NOT NULL,
  `subjectid` int(10) NOT NULL,
  PRIMARY KEY (`chapterid`)
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
CREATE TABLE IF NOT EXISTS `departmenttbl` (
  `deptid` int(10) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(100) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
CREATE TABLE IF NOT EXISTS `lessontbl` (
  `lessonid` int(10) NOT NULL AUTO_INCREMENT,
  `lessontitle` varchar(100) NOT NULL,
  `lessondetail` text NOT NULL,
  `lessonpdf` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `subjectid` int(10) NOT NULL,
  PRIMARY KEY (`lessonid`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

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
CREATE TABLE IF NOT EXISTS `optionstbl` (
  `optionsid` int(10) NOT NULL AUTO_INCREMENT,
  `optiona` varchar(100) NOT NULL,
  `optionb` varchar(100) NOT NULL,
  `optionc` varchar(100) NOT NULL,
  `optiond` varchar(100) NOT NULL,
  PRIMARY KEY (`optionsid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(8, 'Lapu-Lapu', 'Magellan', 'Jose Rizal', 'Rodrigo Duterte'),
(9, 'Philippine Peso', 'Philippine Profile', 'Preprocessor Hypertext', 'None of the above');

-- --------------------------------------------------------

--
-- Table structure for table `questiontbl`
--

DROP TABLE IF EXISTS `questiontbl`;
CREATE TABLE IF NOT EXISTS `questiontbl` (
  `questionid` int(10) NOT NULL AUTO_INCREMENT,
  `quizid` int(10) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(8, 1, 'Who is the most powerful character in dota 1?'),
(9, 1, 'PHP stands for?');

-- --------------------------------------------------------

--
-- Table structure for table `quizbridgetbl`
--

DROP TABLE IF EXISTS `quizbridgetbl`;
CREATE TABLE IF NOT EXISTS `quizbridgetbl` (
  `quizbridgeid` int(10) NOT NULL AUTO_INCREMENT,
  `quizid` int(10) DEFAULT NULL,
  `questionid` int(10) DEFAULT NULL,
  `answerid` int(10) DEFAULT NULL,
  `optionid` int(10) DEFAULT NULL,
  `chapterid` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `starttime` int(10) DEFAULT NULL,
  `endtime` int(10) DEFAULT NULL,
  `scoreid` int(10) DEFAULT NULL,
  `correctanswer` int(10) DEFAULT NULL,
  `wronganswer` int(10) DEFAULT NULL,
  PRIMARY KEY (`quizbridgeid`)
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
CREATE TABLE IF NOT EXISTS `quiztbl` (
  `quizid` int(10) NOT NULL AUTO_INCREMENT,
  `quizname` varchar(100) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `duration` time NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`quizid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `quiztbl`
--

TRUNCATE TABLE `quiztbl`;
--
-- Dumping data for table `quiztbl`
--

INSERT INTO `quiztbl` (`quizid`, `quizname`, `subjectid`, `duration`, `status`) VALUES
(1, 'title', 5, '01:01:00', 'ACTIVATED'),
(2, 'Information Management', 2, '00:00:00', 'ACTIVATED');

-- --------------------------------------------------------

--
-- Table structure for table `scoretbl`
--

DROP TABLE IF EXISTS `scoretbl`;
CREATE TABLE IF NOT EXISTS `scoretbl` (
  `scoreid` int(10) NOT NULL AUTO_INCREMENT,
  `totalscore` int(100) NOT NULL,
  `totalitems` int(10) NOT NULL,
  `averagescore` float(10,2) NOT NULL,
  `quizid` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL,
  PRIMARY KEY (`scoreid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `scoretbl`
--

TRUNCATE TABLE `scoretbl`;
--
-- Dumping data for table `scoretbl`
--

INSERT INTO `scoretbl` (`scoreid`, `totalscore`, `totalitems`, `averagescore`, `quizid`, `remarks`, `userid`) VALUES
(3, 5, 5, 100.00, 1, 'PASSED', 17),
(5, 5, 5, 100.00, 1, 'PASSED', 2),
(6, 3, 5, 80.00, 1, 'PASSED', 22),
(7, 1, 2, 75.00, 2, 'PASSED', 22);

-- --------------------------------------------------------

--
-- Table structure for table `sectionquizbridgetbl`
--

DROP TABLE IF EXISTS `sectionquizbridgetbl`;
CREATE TABLE IF NOT EXISTS `sectionquizbridgetbl` (
  `sectionquizbridgeid` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `quizid` int(10) DEFAULT NULL,
  `student` varchar(100) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sectionquizbridgeid`)
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
CREATE TABLE IF NOT EXISTS `sectionstudentbridgetbl` (
  `sectionstudentbridgeid` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `teachersuserid` int(10) DEFAULT NULL,
  `student_userid` int(10) DEFAULT NULL,
  `section_section` int(10) DEFAULT NULL,
  PRIMARY KEY (`sectionstudentbridgeid`)
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
CREATE TABLE IF NOT EXISTS `sectionsubjecttbl` (
  `sectionsubjectid` int(10) NOT NULL AUTO_INCREMENT,
  `sectionid` int(10) DEFAULT NULL,
  `subjectid` int(10) NOT NULL,
  PRIMARY KEY (`sectionsubjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectionsubjecttbl`
--

TRUNCATE TABLE `sectionsubjecttbl`;
--
-- Dumping data for table `sectionsubjecttbl`
--

INSERT INTO `sectionsubjecttbl` (`sectionsubjectid`, `sectionid`, `subjectid`) VALUES
(2, 2, 5),
(3, 1, 6),
(7, 3, 3),
(8, 5, 7),
(9, 1, 2),
(10, 1, 8),
(11, 5, 9),
(12, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbl`
--

DROP TABLE IF EXISTS `sectiontbl`;
CREATE TABLE IF NOT EXISTS `sectiontbl` (
  `sectionid` int(10) NOT NULL AUTO_INCREMENT,
  `sectionname` varchar(100) NOT NULL,
  PRIMARY KEY (`sectionid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
CREATE TABLE IF NOT EXISTS `subjecttbl` (
  `subjectid` int(10) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(100) NOT NULL,
  `subjectdesc` varchar(100) NOT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(7, 'Sec', 'asdasd'),
(8, 'fdd', 'dfg'),
(9, 'qwer', 'qwer');

-- --------------------------------------------------------

--
-- Table structure for table `teachersectiontbl`
--

DROP TABLE IF EXISTS `teachersectiontbl`;
CREATE TABLE IF NOT EXISTS `teachersectiontbl` (
  `teachersectionid` int(10) NOT NULL AUTO_INCREMENT,
  `sectionid` int(10) NOT NULL,
  `teachersid` int(10) NOT NULL,
  PRIMARY KEY (`teachersectionid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
(3, 6, 17),
(4, 1, 14),
(5, 2, 15),
(6, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `teacherstbl`
--

DROP TABLE IF EXISTS `teacherstbl`;
CREATE TABLE IF NOT EXISTS `teacherstbl` (
  `teachersid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `deptid` int(10) NOT NULL,
  PRIMARY KEY (`teachersid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
(6, 'japok@gmail.com', '123', 'japok', 'lapok', 'golteb', 3),
(7, 'asd@1q', 'asd', 'aa', 'asdasd', 'adssdasd', 2),
(8, 'qweqw@qwe', 'qweq', 'qwe', 'qwe', 'qwe', 2),
(9, 'qwe@gmail.com', 'qweqw', 'qweqe', 'qweqwe', 'qweqwe', 1),
(10, 'qwe@gmail.com', 'qwe', 'qwe', 'qwe', 'qwe', 3),
(11, 'jaricruz@gmail.com', '1234', 'jari', 'cruz', 'cruz', 4),
(12, 'lyndon@gmial.com', '123', 'lyndon', 'penaso', 'payaso', 1),
(13, 'jek@gmial.com', '123', 'jek', 'deleon', 'lion', 3),
(16, 'teacher@teacher', '123', 'Tee', 'Cher', 'M', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachersubjecttbl`
--

DROP TABLE IF EXISTS `teachersubjecttbl`;
CREATE TABLE IF NOT EXISTS `teachersubjecttbl` (
  `teachersubjectid` int(10) NOT NULL AUTO_INCREMENT,
  `teachersid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  PRIMARY KEY (`teachersubjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(8, 2, 1),
(9, 1, 1),
(10, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

DROP TABLE IF EXISTS `userstbl`;
CREATE TABLE IF NOT EXISTS `userstbl` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `sectionid` int(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `userstbl`
--

TRUNCATE TABLE `userstbl`;
--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userid`, `email`, `password`, `fname`, `lname`, `mname`, `sectionid`) VALUES
(2, 'stevenigop@gmail.com', 'steven', 'steven', 'francisco', 'gabriel', 5),
(5, 'jek@gmail.com', '123', 'jek', 'deleon', 'lion', 1),
(7, 'jr@gmail.com', '123123', 'jr', 'jr', 'jr', 3),
(8, 'kong@gmail.com', '123', 'angelico', 'gomez', 'lopez', 4),
(16, 'apol@gmail.com', '123', 'apple', 'lansones', 'mandirigma', 1),
(17, 'jari@gmail.com', '123', 'jari', 'cruz', 'jaru', 2),
(18, 'sheenakatrinaf@yahoo.com', '1234', 'sheena', 'francisco', 'gabriel', 3),
(19, 'sheryl@gmail.com', '123', 'sheryl', 'francisco', 'gabriel', 4),
(20, 'asdasd@asdasd', '123', 'asd', 'asda', 'asdas', 5),
(21, 'asdasd@asdasd', '13123', '123123', '13123', '123123', 5),
(22, 'first@first', 'first', 'aasd', 'asdad', 'asdsad', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

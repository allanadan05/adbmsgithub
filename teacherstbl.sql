-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 02:01 PM
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
  `deptid` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherstbl`
--

INSERT INTO `teacherstbl` (`teachersid`, `email`, `password`, `fname`, `lname`, `mname`, `deptid`, `image`) VALUES
(1, 'angel.decano8@gmail.com', '1234', 'rye angelica', 'decano', 't', 1, ''),
(2, 'espencer@gmail.com', '123123', 'pencer', 'bulate', 'halfmoon', 2, ''),
(6, 'japok@gmail.com', '123', 'japok', 'lapok', 'golteb', 3, ''),
(7, 'asd@1q', 'asd', 'aa', 'asdasd', 'adssdasd', 2, ''),
(8, 'qweqw@qwe', 'qweq', 'qwe', 'qwe', 'qwe', 2, ''),
(9, 'qwe@gmail.com', 'qweqw', 'qweqe', 'qweqwe', 'qweqwe', 1, ''),
(10, 'qwe@gmail.com', 'qwe', 'qwe', 'qwe', 'qwe', 3, ''),
(11, 'jaricruz@gmail.com', '1234', 'jari', 'cruz', 'cruz', 4, ''),
(12, 'lyndon@gmial.com', '123', 'lyndon', 'penaso', 'payaso', 1, ''),
(13, 'jek@gmial.com', '123', 'jek', 'deleon', 'lion', 3, ''),
(16, 'teacher@teacher', '123', 'Tee', 'Cher', 'M', 1, ''),
(17, 'teacher@gmail.com', 'teacher', 'teacher', 'teacher', 'teacher', 1, ''),
(25, 'jp@gmail.com', '1234', 'Paul', 'Javinez', 'G', 2, '(6045) avatar-05.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacherstbl`
--
ALTER TABLE `teacherstbl`
  ADD PRIMARY KEY (`teachersid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacherstbl`
--
ALTER TABLE `teacherstbl`
  MODIFY `teachersid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 03:47 PM
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
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `userid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sectionid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userid`, `email`, `password`, `fname`, `lname`, `mname`, `image`, `sectionid`) VALUES
(2, 'stevenigop@gmail.com', 'steven', 'steven', 'francisco', 'gabriel', '', 5),
(5, 'jek@gmail.com', '123', 'jek', 'deleon', 'lion', '', 1),
(7, 'jr@gmail.com', '123123', 'jr', 'jr', 'jr', '', 3),
(8, 'kong@gmail.com', '123', 'angelico', 'gomez', 'lopez', '', 4),
(16, 'apol@gmail.com', '123', 'apple', 'lansones', 'mandirigma', '', 1),
(17, 'jari@gmail.com', '123', 'jari', 'cruz', 'jaru', '', 2),
(18, 'sheenakatrinaf@yahoo.com', '1234', 'sheena', 'francisco', 'gabriel', '', 3),
(19, 'sheryl@gmail.com', '123', 'sheryl', 'francisco', 'gabriel', '', 4),
(20, 'asdasd@asdasd', '123', 'asd', 'asda', 'undefined', '', 1),
(22, 'first@first', 'first', 'aasd', 'asdad', 'asdsad', '', 5),
(23, 'user@gmail.com', 'user', 'user', 'user', 'undefined', '', 1),
(27, 'javinezp@gmail.com', '1111', 'Paul', 'Javinez', 'G', 'avatar-04.jpg', 3),
(28, 'althea@gmail.com', '1111', 'Althea', 'Javinez', 'G.', 'avatar-02.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

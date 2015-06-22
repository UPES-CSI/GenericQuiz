-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2015 at 07:15 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `genericquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `imibuzo`
--

CREATE TABLE IF NOT EXISTS `imibuzo` (
  `q_no` int(6) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `option1` varchar(50) DEFAULT NULL,
  `option2` varchar(50) DEFAULT NULL,
  `option3` varchar(50) DEFAULT NULL,
  `option4` varchar(50) DEFAULT NULL,
  `answer` varchar(50) NOT NULL,
  `organizer` varchar(50) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `imibuzo`
--

INSERT INTO `imibuzo` (`q_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `organizer`) VALUES
(1, 'Hello World prog', 'a', 'b', 'c', 'd', 'c', 'Varun Bawa'),
(2, 'Hola', 'a', 'b', 'c', 'd', 'b', 'Varun Bawa'),
(3, 'ab', 'bb', 'bb', 'bb', 'bb', 'bb', 'bb');

-- --------------------------------------------------------

--
-- Table structure for table `imibuzo_score`
--

CREATE TABLE IF NOT EXISTS `imibuzo_score` (
  `email` varchar(30) NOT NULL,
  `score` int(5) DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imibuzo_score`
--

INSERT INTO `imibuzo_score` (`email`, `score`, `name`) VALUES
('varunbawa', 3, 'Varun'),
('varunbawa62ak@gmail.com', 14, 'Varun@Gmail'),
('varunbawa62ak@outlook.com', 13, 'Varun@Outlook');

-- --------------------------------------------------------

--
-- Table structure for table `jumbojet`
--

CREATE TABLE IF NOT EXISTS `jumbojet` (
  `q_no` int(6) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `option1` varchar(50) DEFAULT NULL,
  `option2` varchar(50) DEFAULT NULL,
  `option3` varchar(50) DEFAULT NULL,
  `option4` varchar(50) DEFAULT NULL,
  `answer` varchar(50) NOT NULL,
  `organizer` varchar(50) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jumbojet`
--

INSERT INTO `jumbojet` (`q_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `organizer`) VALUES
(1, 'Hello', 'hi', 'hola', 'halloo', 'sionara', 'hi', 'Anmol Rastogi'),
(2, 'gihaad', 'pakistan', 'afganistan', 'agra', 'meerut', 'afganistan', 'Anmol Rastogi');

-- --------------------------------------------------------

--
-- Table structure for table `jumbojet_score`
--

CREATE TABLE IF NOT EXISTS `jumbojet_score` (
  `email` varchar(40) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginad`
--

CREATE TABLE IF NOT EXISTS `loginad` (
  `UID` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `permission` int(11) DEFAULT '0',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginad`
--

INSERT INTO `loginad` (`UID`, `Name`, `email`, `password`, `permission`) VALUES
('CSI@123', 'Varun', 'varunbawa62ak@gmail.com', 'Gmail@123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `quiz_no` int(5) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(50) DEFAULT NULL,
  `o_name` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`quiz_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_no`, `quiz_name`, `o_name`, `start_date`, `start_time`, `end_date`, `end_time`) VALUES
(1, 'Imibuzo', 'Varun Bawa', '2015-05-25', '01:01:00', '2015-05-26', '01:01:00'),
(2, 'JumboJet', 'Anmol Rastogi', '2015-10-31', '12:59:00', '2015-12-31', '12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `college` varchar(30) NOT NULL,
  `CSI` varchar(4) NOT NULL,
  `CSI_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `CSI_id` (`CSI_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `password`, `contact`, `college`, `CSI`, `CSI_id`) VALUES
('varunbawa62ak@gmail.com', 'Varun Bawa', 'Gmail@123', '7830626214', 'UPES', 'YES', NULL),
('varunbawa62ak@outlook.com', 'Varun Bawa', 'hello', '7830626214', 'UPES', 'YES', '1233111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2015 at 12:55 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbt`
--
CREATE DATABASE `cbt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cbt`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pre` varchar(40) NOT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `username`, `password`, `pre`) VALUES
(3, 'John', 'deo', 'Administrator'),
(4, 'riddle', 'daredevil', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(70) NOT NULL,
  `classteacher` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`, `classteacher`) VALUES
(1, 'jjj', 'ojo'),
(2, 'kjij', 'ijiji'),
(3, 'SS1A', 'Mr John ');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `qclass` text NOT NULL,
  `test` varchar(225) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `correctanswer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `qno`, `question`, `qclass`, `test`, `option1`, `option2`, `option3`, `option4`, `correctanswer`) VALUES
(1, 1, '_____ is a superset of the C langague', 'SS1A', 'Rapi Test', 'B', 'C++', 'B++', 'PHP', 'C++'),
(2, 2, 'cout is used in ', 'SS1A', 'Rapi test', 'C', 'C++', 'Java', 'VB.net', 'C++'),
(3, 3, 'If a=1, a+2 = ?', 'SS1A', 'Rapi test', '3', '1', '4', '2', '3'),
(4, 4, 'Which of the following is not an object oriented Programming language ?', 'SS1A', 'Rapi test', 'C', 'Java', 'Objective C', 'Android', 'C'),
(5, 5, 'The first female computer programmer is___', 'SS1A', 'Rapi Test', 'Ada', 'Queen', 'Steve Job''s wife', 'Stella', 'Ada'),
(6, 6, 'Which is not programming jargon', 'SS1A', 'Rapi Test', 'Bug', 'Keyboard', 'Debug', 'Compile', 'Keyboard'),
(7, 7, 'Who is the founder of microsoft', 'SS1A', 'Rapi Test', 'Mike', 'Steve Job', 'Bill Gate', 'Melinda Gate', 'Bill Gate'),
(8, 8, 'In this code ''int a; '' a is ?', 'SS1A', 'Rapi Test', 'Data type', 'Name', 'Variable', 'Constant', 'Variable'),
(9, 9, '<p>Nigeria got her indipendent in the year?</p>\r\n', 'SS1A', 'Rapi Test', '1960', '1966', '1965', '1950', '1960'),
(25, 10, '<p>pojkoikj</p>\r\n', 'lmpol,pok', 'opkpok', 'kopkpokpo', 'kopkp', 'kpokpok', 'kpok', 'kopkpokpo'),
(26, 11, '<p>oinijnmij</p>\r\n', 'jopjoijojoij', 'oijoijoij', 'kmkim', 'kmkm', 'kmol,', 'mlom', 'mlom'),
(29, 11, '<p>oinijnmij</p>\r\n', 'jopjoijojoij', 'oijoijoij', 'kmkim', 'kmkm', 'kmol,', 'mlom', 'mlom');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(225) NOT NULL,
  `username` varchar(70) NOT NULL,
  `class` varchar(70) NOT NULL,
  `dept` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `username`, `class`, `dept`, `password`) VALUES
(3, 'Abiodun Temidayo', 'good', 'SS1A', 'Science', 'inusokan'),
(4, 'Abiodun Tolulope', 'Tolubukky', 'SS2A', 'Science', 'abiodun'),
(5, 'ify andy', 'pretty', 'SS1A', 'science', 'honesty'),
(6, 'Olaseyo Olumide', 'olumide', 'SS1A', 'Science', 'inusokan');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `class` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `class`, `time`) VALUES
(121, 'Rapi Test', 'SS1A', 180),
(122, 'kljfgoit', '', 0),
(123, 'Sample', '', 180);

-- --------------------------------------------------------

--
-- Table structure for table `testattempt`
--

CREATE TABLE IF NOT EXISTS `testattempt` (
  `atid` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `ans` varchar(30) NOT NULL,
  `correctans` varchar(30) NOT NULL DEFAULT 'Unanswered',
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`atid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=558 ;

--
-- Dumping data for table `testattempt`
--

INSERT INTO `testattempt` (`atid`, `stdid`, `testid`, `quid`, `ans`, `correctans`, `mark`) VALUES
(505, 5, 121, 4, 'Android', 'C', 0),
(506, 5, 121, 2, 'C++', 'C++', 0),
(507, 5, 121, 1, 'C++', 'C++', 0),
(508, 5, 121, 3, '3', '3', 0),
(509, 5, 121, 9, '1960', '1960', 0),
(510, 5, 121, 6, 'Keyboard', 'Keyboard', 0),
(511, 5, 121, 7, 'Bill Gate', 'Bill Gate', 0),
(512, 5, 121, 5, 'Ada', 'Ada', 0),
(513, 5, 121, 8, 'Variable', 'Variable', 0),
(529, 6, 121, 4, 'C', 'C', 0),
(530, 6, 121, 1, 'C++', 'C++', 0),
(531, 6, 121, 3, '3', '3', 0),
(532, 6, 121, 9, '1960', '1960', 0),
(533, 6, 121, 7, 'Mike', 'Bill Gate', 0),
(534, 6, 121, 2, 'C++', 'C++', 0),
(535, 6, 121, 5, 'Ada', 'Ada', 0),
(536, 6, 121, 6, 'Keyboard', 'Keyboard', 0),
(537, 6, 121, 8, 'Variable', 'Variable', 0),
(551, 3, 121, 9, '', 'Unanswered', 0),
(552, 3, 121, 1, '', 'Unanswered', 0),
(553, 3, 121, 3, '', 'Unanswered', 0),
(554, 3, 121, 2, '', 'Unanswered', 0),
(555, 3, 121, 5, '', 'Unanswered', 0),
(556, 3, 121, 4, '', 'Unanswered', 0),
(557, 3, 121, 6, '', 'Unanswered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testscore`
--

CREATE TABLE IF NOT EXISTS `testscore` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `testscore`
--

INSERT INTO `testscore` (`ID`, `stdid`, `testid`, `score`) VALUES
(33, 5, 121, 89),
(34, 6, 121, 89),
(35, 3, 121, 100),
(36, 3, 121, 44);

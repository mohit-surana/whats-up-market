-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 05:15 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `ml`
--

DROP TABLE IF EXISTS `ml`;
CREATE TABLE IF NOT EXISTS `ml` (
  `i_id` varchar(8) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ml`
--

INSERT INTO `ml` (`i_id`, `date`, `quantity`) VALUES
('10b3', '2016-04-06', 3),
('1b1', '2016-04-05', 4),
('2b5', '2016-04-08', 3),
('3b10', '2016-04-10', 2),
('4b8', '2016-04-12', 1),
('5b3', '2016-04-14', 5),
('6b7', '2016-04-18', 3),
('7b8', '2016-04-20', 4),
('8b10', '2016-04-05', 2),
('9b3', '2016-04-09', 1),
('10b3', '2016-04-06', 2),
('2b5', '2016-04-10', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

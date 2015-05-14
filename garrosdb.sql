-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2015 at 03:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `garrosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `partie`
--

CREATE TABLE IF NOT EXISTS `partie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playerID1` int(11) NOT NULL,
  `playerID2` int(11) NOT NULL,
  `jour` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) CHARACTER SET utf8 NOT NULL,
  `nationalite` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `nom`, `nationalite`, `naissance`) VALUES
(1, 'pierre', 'espagnole', '2015-03-11'),
(2, 'erick', 'belge', '2015-03-06'),
(3, 'toto', 'belge', '2015-05-18'),
(4, 'oloo tata', 'francais', '2015-05-18'),
(8, 'aaaa', 'bbbb', '0000-00-00'),
(9, 'aaa', 'aaa', '0000-00-00'),
(10, 'xxx', 'xxx', '2014-08-02'),
(11, 'eaz', 'eza', '0000-00-00'),
(12, '', '', '0000-00-00'),
(13, '', '', '0000-00-00'),
(14, '', '', '0000-00-00'),
(15, 'eza', 'eza', '0000-00-00'),
(16, 'aa', 'zz', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPartie` int(11) NOT NULL,
  `joueur1ID` int(11) NOT NULL,
  `pointJ1` int(11) NOT NULL,
  `joueur2ID` int(11) NOT NULL,
  `pointJ2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

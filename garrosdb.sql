-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2015 at 03:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
  `terrainID` int(11) NOT NULL,
  `tour` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `playerID1` (`playerID1`),
  KEY `playerID2` (`playerID2`),
  KEY `terrainID` (`terrainID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partie`
--

INSERT INTO `partie` (`id`, `playerID1`, `playerID2`, `jour`, `terrainID`, `tour`) VALUES
(1, 187, 189, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) CHARACTER SET utf8 NOT NULL,
  `nationalite` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=191 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `nom`, `nationalite`, `image`) VALUES
(187, 'zdqd', 'azd', ''),
(189, 'df', 'eee', ''),
(190, 'zze', 'Ã©eÃ©', '');

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
-- Table structure for table `terrain`
--

CREATE TABLE IF NOT EXISTS `terrain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `terrain`
--

INSERT INTO `terrain` (`id`, `name`) VALUES
(1, ''),
(2, 'jardin');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_player1` FOREIGN KEY (`playerID1`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `fk_player2` FOREIGN KEY (`playerID2`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `fk_terrain` FOREIGN KEY (`terrainID`) REFERENCES `terrain` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2015 at 02:26 AM
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
  `terrainID` int(11) NOT NULL,
  `numSet` int(11) NOT NULL,
  `scorej1` int(11) NOT NULL,
  `scorej2` int(11) NOT NULL,
  `finish` tinyint(1) NOT NULL,
  `tour` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `playerID1` (`playerID1`),
  KEY `playerID2` (`playerID2`),
  KEY `terrainID` (`terrainID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `partie`
--

INSERT INTO `partie` (`id`, `playerID1`, `playerID2`, `jour`, `terrainID`, `numSet`, `scorej1`, `scorej2`, `finish`, `tour`) VALUES
(48, 187, 189, '2015-06-09', 1, 3, 1, 0, 1, 1),
(49, 190, 191, '2015-06-09', 1, 3, 0, 1, 1, 1),
(50, 192, 193, '2015-06-09', 1, 3, 1, 0, 1, 1),
(51, 194, 191, '2015-06-09', 1, 3, 1, 0, 1, 1),
(52, 187, 192, '2015-06-12', 1, 1, 0, 0, 0, 2),
(53, 194, 191, '2015-06-12', 1, 1, 0, 0, 0, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `nom`, `nationalite`, `image`) VALUES
(187, 'zdqd', 'azd', ''),
(189, 'df', 'eee', ''),
(190, 'zze', 'Ã©eÃ©', ''),
(191, 'truc', '', ''),
(192, 'much', '', ''),
(193, 'djoko', '', ''),
(194, 'jp', '', '');

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
-- Table structure for table `set`
--

CREATE TABLE IF NOT EXISTS `set` (
  `idSet` int(11) NOT NULL AUTO_INCREMENT,
  `partie_id` int(11) NOT NULL,
  `j1` int(11) NOT NULL,
  `j2` int(11) NOT NULL,
  `numSet` int(11) NOT NULL COMMENT 'valeur 1 2 ou 3',
  PRIMARY KEY (`idSet`,`partie_id`),
  KEY `partie_id_2` (`partie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `set`
--

INSERT INTO `set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet`) VALUES
(30, 48, 6, 0, 1),
(31, 48, 6, 0, 2),
(32, 48, 6, 1, 3),
(33, 49, 6, 0, 1),
(34, 49, 1, 6, 2),
(35, 49, 1, 6, 3),
(36, 50, 0, 6, 1),
(37, 50, 6, 2, 2),
(38, 50, 1, 6, 3),
(39, 51, 1, 6, 1),
(40, 51, 1, 6, 2),
(41, 51, 6, 2, 3);

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

--
-- Constraints for table `set`
--
ALTER TABLE `set`
  ADD CONSTRAINT `fk_partie_id` FOREIGN KEY (`partie_id`) REFERENCES `partie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

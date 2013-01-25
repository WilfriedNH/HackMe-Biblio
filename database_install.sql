-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `bn_accounts`
--

CREATE TABLE IF NOT EXISTS `bn_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bn_accounts`
--

INSERT INTO `bn_accounts` (`id`, `email`, `pass`, `name`, `rank`) VALUES
(1, 'foo@bar.com', '7e276a22029de80e633a3d01a9950dc0', 'Aministr4t0r', 'fake_admin'),
(2, 'admin@biblio.com', 'ef6997fdb1551f51e878dad8c3b68cb6', 'Administrateur', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bn_books`
--

CREATE TABLE IF NOT EXISTS `bn_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(17) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bn_books`
--

INSERT INTO `bn_books` (`id`, `isbn`, `author`, `title`, `publisher`) VALUES
(1, '978-1-118-02647-2', 'Dafydd Studdart - Marcus Pinto', 'The Web Application Hacker''s Handbook', 'Wiley'),
(2, '978-2-02-033625-3', 'Pierre Desproges', 'Des femmes qui tombent', 'Points'),
(3, '978-2-212-12369-2', 'Eric Daspet - Cyril Pierre de Geyer', 'PHP5 Avancé - 5ème édition', 'Eyrolles'),
(4, '978-2-212-12866-6', 'Claude Delanoy', 'Programmer en Java', 'Eyrolles'),
(5, '978-2-869-59227-8', 'Sénèque', 'La Vie Heureuse', 'Arléa'),
(6, '978-2-259-21248-9', 'Frédéric Lenoir', 'Petit traité de vie intérieure', 'Plon'),
(7, '978-2-501-07320-2', 'Sandra Mahut', 'Nutella, les 30 recettes cultes', 'Marabout'),
(8, '978-2-500-7323-3', 'Garlone Bardel', 'Carambar, les 30 recettes cultes', 'Marabout'),
(9, '978-2-747-01694-0', 'Danièle Bour', 'Petit Ours Brun joue dans la neige', 'Bayard Jeunesse'),
(10, '978-2-747-02288-0', 'Danièle Bour', 'Petit Ours Brun au manège', 'Bayard Jeunesse'),
(11, '978-2-020-42785-2', 'Denis Guedj', 'Le théorème du perroquet', 'Seuil'),
(12, '978-2-212-12821-5', 'Cédric Llorens', 'Tableaux de bord de la sécurité réseau', 'Eyrolles');

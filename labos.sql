-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2015 at 02:06 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.4-14+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `labos`
--

-- --------------------------------------------------------

--
-- Table structure for table `Korisnici`
--

CREATE TABLE IF NOT EXISTS `Korisnici` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `pravo_ime` text COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`korisnicko_ime`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Korisnici`
--

INSERT INTO `Korisnici` (`ID`, `korisnicko_ime`, `lozinka`, `pravo_ime`) VALUES
(3, 'Ovca', '59c34194e50d3fe72df4ab359e16b92c8f4b6495', 'Ovan Ovnić'),
(1, 'Panda', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Marko Ljubešić'),
(2, 'Pingvin', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 'Pajo Patak');

-- --------------------------------------------------------

--
-- Table structure for table `Proizvodi`
--

CREATE TABLE IF NOT EXISTS `Proizvodi` (
  `Naziv_proizvoda` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `Tip_proizvoda` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `Opis_proizvoda` text COLLATE utf8_swedish_ci NOT NULL,
  `Vege` tinyint(1) NOT NULL,
  `Halal` tinyint(1) NOT NULL,
  `Koser` tinyint(1) NOT NULL,
  `Alergeni` text COLLATE utf8_swedish_ci NOT NULL,
  `Cijena` int(11) NOT NULL,
  PRIMARY KEY (`Naziv_proizvoda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `Proizvodi`
--

INSERT INTO `Proizvodi` (`Naziv_proizvoda`, `Tip_proizvoda`, `Opis_proizvoda`, `Vege`, `Halal`, `Koser`, `Alergeni`, `Cijena`) VALUES
('505 sa crtom', 'ostalo', 'bombon na kojem se poreže jezik', 0, 0, 0, '', 8),
('Banana', 'ostalo', 'žuto i duguljasto', 1, 1, 1, '', 5),
('Burek', 'ostalo', 'Ovo je slani tip kolača, punjen mesom', 0, 0, 0, 'jaja', 14),
('čaj', 'piće', 'topli napitak dobar za zdravlje', 1, 0, 1, '', 9),
('coca-cola', 'piće', 'crni gazirani napitak sa puno šećera', 1, 0, 0, '', 12),
('Croisant', 'ostalo', 'francuski specijalitet, lisnato punjeno tjesto u obliku kiflice', 1, 0, 0, '', 8),
('Čupavac', 'kolač', 'kolač sa kokosom', 0, 0, 0, 'jaja', 12),
('Gibanica', 'ostalo', 'Ovo je slani tip kolača, punjena je orasima', 0, 0, 0, 'jaja, orasi', 10),
('Jaffa', 'keks', 'kaks sa čokoladom i želatinastim središtem od naranče', 0, 0, 1, '', 12),
('Jelačić kocke', 'kolač', 'Čokoladni muss kolač', 1, 0, 0, 'mlijeko', 12),
('Juice', 'piće', 'sok od naranče', 1, 1, 0, '', 13),
('Kremšnita', 'kolač', 'Kremasti kolač ', 0, 0, 0, 'jaja', 12),
('Ledeni vjetar', 'torta', 'Vočna torta', 0, 1, 1, 'jagoda , banana', 14),
('Lindt', 'čokolada', 'Najskuplja čokolada na svijetu, provjerite zašto', 1, 0, 0, 'mlijeko', 30),
('Medenjaci', 'keks', 'keks sa okusom meda', 0, 1, 1, '', 7),
('Petit Beurre', 'keks', 'Svima poznati francuski keks', 1, 1, 0, '', 7),
('Pita Mađarica', 'kolač', 'Slojeviti čokoladni kolač sa korama i čokoladom', 0, 0, 0, 'jaja', 10),
('Pizza', 'ostalo', 'Ako može pekara, zašto ne i ovdje?', 0, 0, 0, '', 10),
('Sacher torta', 'kolač', 'Čokoladna torta u više slojeva sa pekmezom', 1, 1, 1, '', 16),
('Sirnica', 'ostalo', 'Ovo je slani tip kolača, punjen sirom', 0, 0, 0, 'jaja, mlijeko', 12),
('Snickers', 'Čokolada', 'čokoladica sa karalelom, keksom i kikirikijem.', 1, 0, 0, 'mlijeko , orašasti plodovi', 8),
('Sok od bazge', 'piće', 'Sok od cvijetova bazge', 1, 0, 0, '', 9),
('Torta od jagoda', 'torta', 'ima puno jagoda i šlaga', 0, 0, 0, 'jaja, jagode', 17),
('Torta od sira', 'torta', 'torta od sira', 0, 0, 0, 'jaja, mlijeko', 14);

-- --------------------------------------------------------

--
-- Table structure for table `Proizvodi_alergeni`
--

CREATE TABLE IF NOT EXISTS `Proizvodi_alergeni` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Alergeni` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_swedish_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Proizvodi_alergeni`
--

INSERT INTO `Proizvodi_alergeni` (`ID`, `Alergeni`) VALUES
(1, 'soja'),
(2, 'jaja'),
(3, 'kikiriki'),
(4, 'rakovi'),
(5, 'mlijeko'),
(6, 'skoljke'),
(7, 'orasasti_plodovi'),
(8, 'jagode'),
(9, 'kivi'),
(10, 'ananas');

-- --------------------------------------------------------

--
-- Table structure for table `Proizvodi_tip`
--

CREATE TABLE IF NOT EXISTS `Proizvodi_tip` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tip_proizvoda` text COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Proizvodi_tip`
--

INSERT INTO `Proizvodi_tip` (`ID`, `Tip_proizvoda`) VALUES
(1, 'kolač'),
(2, 'torta'),
(3, 'keks'),
(4, 'čokolada'),
(5, 'piće'),
(6, 'ostalo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

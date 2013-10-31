-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2013 at 01:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psp`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartats`
--

CREATE TABLE IF NOT EXISTS `apartats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titol` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `apartats`
--

INSERT INTO `apartats` (`id`, `titol`) VALUES
(1, '1. Titula aquesta imatge:'),
(2, '2. Escull una etiqueta:'),
(3, '3. Defineix "guerra" amb una frase:'),
(4, '1. Identifica aquests sons:'),
(5, '2. Grava o busca un so:'),
(6, '3. Quin fragment deixaries en silenci?'),
(7, '4. Escull el tema musical que representi millor el món actual'),
(8, '1. Manipula aquesta imatge posant-hi un filtre més agradable:'),
(9, '2. Penja una imatge d''un graffiti, d''una pintada, d''street art i explica perquè l''has triada:'),
(10, '3. Tria el fotograma que representi millor aquest fragment'),
(11, '1. Crea una imatge que et representi on no hi apareguis tu (amb una foto, un dibuix, etc.):'),
(12, '2. Escriu un lema (inventat o no) amb el que et sentis identificat:'),
(13, '1. Dossiers pedagògics:'),
(14, '2. Links d0interès:'),
(15, '3. Crèdits PSP'),
(16, '1. Representa amb l''eina o eines que vulguis la felicitat:'),
(17, '2. Representa amb l''eina o eines que vulguis el dolor:'),
(18, '1. Escriu a la porta del WC i cita l''autor:'),
(19, 'Representacions dels dolors i felicitats');

-- --------------------------------------------------------

--
-- Table structure for table `respostes`
--

CREATE TABLE IF NOT EXISTS `respostes` (
  `salaid` int(11) NOT NULL DEFAULT '0',
  `apartatid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `respostatext` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `respostanumber` int(11) DEFAULT NULL,
  `respostafitxer` blob,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`salaid`,`apartatid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respostes`
--

INSERT INTO `respostes` (`salaid`, `apartatid`, `userid`, `respostatext`, `respostanumber`, `respostafitxer`, `timestamp`) VALUES
(1, 1, 1, 'edifici', NULL, NULL, '2013-10-30 13:19:59'),
(1, 1, 2, 'e-difici', NULL, NULL, '2013-10-27 16:10:04'),
(1, 1, 3, 'infinit', NULL, NULL, '2013-10-28 16:20:06'),
(1, 1, 4, 'cubus', NULL, NULL, '2013-10-27 16:10:44'),
(1, 1, 5, 'edificis cubics', NULL, NULL, '2013-10-29 17:25:05'),
(1, 1, 6, 'cup', NULL, NULL, '2013-10-27 16:19:43'),
(1, 2, 1, NULL, 342, NULL, '2013-10-30 21:50:13'),
(1, 2, 2, NULL, 2, NULL, '2013-10-27 16:22:38'),
(1, 2, 4, NULL, 3, NULL, '2013-10-27 16:23:05'),
(1, 31, 1, 'una sola paraula: horror', NULL, NULL, '2013-10-30 14:28:10'),
(1, 31, 2, 'doble de mort i bombes', NULL, NULL, '2013-10-30 14:27:46'),
(1, 31, 3, 'horrors repetits i bla bla', NULL, NULL, '2013-10-30 14:25:55'),
(1, 31, 5, 'mort i mort i mrt', NULL, NULL, '2013-10-30 14:26:57'),
(1, 31, 6, 'conflicte mal resolt de manera violenta', NULL, NULL, '2013-10-30 22:31:23'),
(1, 32, 1, 'una teocracia cientifico tecnica retroalimentada amb dolors i patiment', NULL, NULL, '2013-10-30 14:45:57'),
(1, 32, 3, 'retromusic power distroying la gent', NULL, NULL, '2013-10-30 14:47:19'),
(1, 33, 1, 'tontos que es barallen entre ells i peguen i fan mal', NULL, NULL, '2013-10-30 14:46:48'),
(1, 33, 3, 'burros tontos que fan pupa i peguen', NULL, NULL, '2013-10-30 14:47:33'),
(1, 33, 6, 'armes violencia ara tinc pressio', NULL, NULL, '2013-10-30 22:32:01'),
(2, 4, 1, 'El gat rumberu - La pegatina', NULL, NULL, '2013-10-30 21:38:46'),
(2, 4, 2, 'Particules de Deu - El petit de Ca l''Eril', NULL, NULL, '2013-10-30 21:38:10'),
(2, 4, 3, 'Ai Dolors - Manel', NULL, NULL, '2013-10-30 21:38:10'),
(2, 11, 0, 'un petard llancat la nit de st joan', NULL, NULL, '2013-10-30 15:46:19'),
(2, 11, 1, 'un coet', NULL, NULL, '2013-10-30 15:57:14'),
(2, 12, 0, 'un tro una nit d''estiu', NULL, NULL, '2013-10-30 16:09:07'),
(2, 12, 1, 'un coet pero mes greu', NULL, NULL, '2013-10-30 16:12:29'),
(2, 13, 0, 'una bomba', NULL, NULL, '2013-10-30 16:09:07'),
(2, 13, 1, 'molts coets en una traca una nit de tempesta', NULL, NULL, '2013-10-30 16:14:25'),
(2, 14, 0, 'un terratremol al Delta de l''Ebre', NULL, NULL, '2013-10-30 16:09:46'),
(2, 14, 1, 'un explosió', NULL, NULL, '2013-10-30 16:14:35'),
(3, 2, 5, 'Qui canta els seus mals espanta! Jo també :-)', NULL, NULL, '2013-10-30 23:24:24'),
(3, 2, 6, 'A minya rua, a minya rua', NULL, NULL, '2013-10-30 23:24:24'),
(4, 1, 1, 'encara no sé ni com es pugen els arxius', NULL, NULL, '2013-10-30 22:17:00'),
(4, 2, 1, 'encara no sé ni com es pugen els arxius', NULL, NULL, '2013-10-30 22:17:38'),
(4, 2, 4, 'no m''agrada l''street art, prefereixo els bodegons', NULL, NULL, '2013-10-30 22:16:41'),
(4, 2, 5, 'encara no he trobat res', NULL, NULL, '2013-10-30 22:16:41'),
(4, 2, 6, 'graffitis jo? osti! no m''agraden els graffitis', NULL, NULL, '2013-10-30 22:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `salaapartat`
--

CREATE TABLE IF NOT EXISTS `salaapartat` (
  `salaid` int(11) NOT NULL,
  `apartatid` int(11) NOT NULL,
  PRIMARY KEY (`salaid`,`apartatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaapartat`
--

INSERT INTO `salaapartat` (`salaid`, `apartatid`) VALUES
(1, 1),
(1, 2),
(1, 31),
(1, 32),
(1, 33),
(2, 3),
(2, 4),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 21),
(2, 22),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titol` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `salanext` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `salaprev` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `titol`, `salanext`, `salaprev`) VALUES
(1, 'Sala de les PARAULES', 'saladelso', NULL),
(2, 'Sala del SO', 'saladelaimatge', 'saladelesparaules'),
(3, 'Sala del JO', 'biblioteca', 'saladelaimatge'),
(4, 'Sala de la IMATGE', 'saladeljo', 'saladelso'),
(5, 'BIBLIOTECA', 'saladeldolorilafelicitat', 'saladeljo'),
(6, 'Sala del DOLOR i la FELICITAT', 'wc', 'biblioteca'),
(7, 'WC', '', 'saladeldolorilafelicitat'),
(8, 'Exposició GLOBAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `galeria` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `galeria`) VALUES
(1, 'carriers', 'b798f6bf6e6cd3bc04caa2aee8653ad6', NULL),
(2, 'carla', '35bc8cec895861697a0243c1304c7789', NULL),
(3, 'jackson5', 'e4da3b7fbbce2345d7772b0674a318d5', NULL),
(4, 'carreras', 'b798f6bf6e6cd3bc04caa2aee8653ad6', 'psp'),
(5, 'acarreras', 'b798f6bf6e6cd3bc04caa2aee8653ad6', 'psp'),
(6, 'conilla', '0b8eaade667444ca06d4e1bd6bef048d', 'psp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

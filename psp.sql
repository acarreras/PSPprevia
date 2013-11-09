-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2013 at 12:36 AM
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
(13, '1. Guia PSP recursos didàctics:'),
(14, '2. Links d''interès:'),
(15, '3. Crèdits PSP:'),
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
  `respostafitxer` varchar(255) DEFAULT NULL,
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
(1, 1, 7, 'escala al cel', NULL, NULL, '2013-11-01 17:00:52'),
(1, 1, 8, 'qualsevol cosa', NULL, NULL, '2013-11-07 20:13:10'),
(1, 2, 1, NULL, 3, NULL, '2013-11-03 13:23:19'),
(1, 2, 2, NULL, 2, NULL, '2013-10-27 16:22:38'),
(1, 2, 3, NULL, 2, NULL, '2013-11-07 00:52:40'),
(1, 2, 4, NULL, 3, NULL, '2013-10-27 16:23:05'),
(1, 2, 7, NULL, 2, NULL, '2013-11-07 00:51:06'),
(1, 2, 8, NULL, 3, NULL, '2013-11-07 20:13:22'),
(1, 31, 1, 'una sola paraula: horror', NULL, NULL, '2013-10-30 14:28:10'),
(1, 31, 2, 'doble de mort i bombes', NULL, NULL, '2013-10-30 14:27:46'),
(1, 31, 3, 'horrors repetits i bla bla', NULL, NULL, '2013-10-30 14:25:55'),
(1, 31, 5, 'mort i mort i mrt', NULL, NULL, '2013-10-30 14:26:57'),
(1, 31, 6, 'conflicte mal resolt de manera violenta', NULL, NULL, '2013-10-30 22:31:23'),
(1, 31, 7, 'guerra guerra vermella negra grisa i fosca molt fosca', NULL, NULL, '2013-11-03 12:39:40'),
(1, 31, 8, 'enfrontament militar sado', NULL, NULL, '2013-11-07 20:13:55'),
(1, 32, 1, 'una teocracia cientifico tecnica retroalimentada amb dolors i patiment', NULL, NULL, '2013-10-30 14:45:57'),
(1, 32, 3, 'retromusic power distroying la gent', NULL, NULL, '2013-10-30 14:47:19'),
(1, 32, 8, 'boombardeig psicotropic neotrascendental', NULL, NULL, '2013-11-07 20:14:15'),
(1, 33, 1, 'tontos que es barallen entre ells i peguen i fan mal', NULL, NULL, '2013-10-30 14:46:48'),
(1, 33, 3, 'burros tontos que fan pupa i peguen', NULL, NULL, '2013-10-30 14:47:33'),
(1, 33, 6, 'armes violencia ara tinc pressio', NULL, NULL, '2013-10-30 22:32:01'),
(1, 33, 8, 'mal mal mal', NULL, NULL, '2013-11-07 20:14:27'),
(2, 3, 10, NULL, 45, NULL, '2013-11-09 20:47:45'),
(2, 4, 1, 'El gat rumberu - La pegatina', NULL, NULL, '2013-10-30 21:38:46'),
(2, 4, 2, 'Particules de Deu - El petit de Ca l''Eril', NULL, NULL, '2013-10-30 21:38:10'),
(2, 4, 3, 'Ai Dolors - Manel', NULL, NULL, '2013-10-30 21:38:10'),
(2, 4, 5, 'volando voy, volando vengo por el camino yo me entretengo', NULL, NULL, '2013-11-05 10:36:36'),
(2, 11, 0, 'una bomba', NULL, NULL, '2013-10-30 15:46:19'),
(2, 11, 1, 'un coet', NULL, NULL, '2013-10-30 15:57:14'),
(2, 11, 5, '', NULL, NULL, '2013-11-06 23:38:46'),
(2, 11, 8, 'xim xiri', NULL, NULL, '2013-11-07 20:16:12'),
(2, 12, 0, 'un petard', NULL, NULL, '2013-10-30 16:09:07'),
(2, 12, 1, 'un coet pero mes greu', NULL, NULL, '2013-10-30 16:12:29'),
(2, 12, 5, '', NULL, NULL, '2013-11-06 23:39:05'),
(2, 12, 8, 'un tret', NULL, NULL, '2013-11-07 20:16:36'),
(2, 13, 0, 'un tro', NULL, NULL, '2013-10-30 16:09:07'),
(2, 13, 1, 'molts coets en una traca una nit de tempesta', NULL, NULL, '2013-10-30 16:14:25'),
(2, 13, 5, 'el que sigui', NULL, NULL, '2013-11-06 23:59:22'),
(2, 14, 0, 'un tret d''escopeta', NULL, NULL, '2013-10-30 16:09:46'),
(2, 14, 1, 'un explosió', NULL, NULL, '2013-10-30 16:14:35'),
(2, 15, 0, 'un globus que peta', NULL, NULL, '2013-11-03 13:42:45'),
(2, 15, 1, 'un pet', NULL, NULL, '2013-11-03 13:44:29'),
(2, 16, 0, 'una roda', NULL, NULL, '2013-11-03 13:42:45'),
(2, 16, 1, 'un tret pet', NULL, NULL, '2013-11-03 13:44:38'),
(2, 16, 5, 'el so del petard', NULL, NULL, '2013-11-07 00:00:18'),
(2, 21, 1, NULL, NULL, 'e63c468d4e2ba86df4c523642448ecc3.mp3', '2013-11-05 16:47:20'),
(2, 21, 5, NULL, NULL, '7725bceac323dbccf4ff51ca5676a8d4.mp3', '2013-11-05 10:32:10'),
(2, 21, 8, NULL, NULL, '7080251b23f01f2484721e65c5616f9e.ogg', '2013-11-07 20:18:17'),
(2, 21, 10, NULL, NULL, '0a0cf9bd7fe430a5c65d20ccebcaef39.mp3', '2013-11-09 21:42:57'),
(2, 22, 1, NULL, NULL, '076d178c155bcbd49061455f15136a5c.ogg', '2013-11-05 16:54:30'),
(2, 22, 5, NULL, NULL, '69f4479c117a58a0ce6f4bb3270f892b.ogg', '2013-11-05 10:42:32'),
(2, 211, 1, '03_Tro.mp3', NULL, NULL, '2013-11-05 16:47:20'),
(2, 211, 5, '06_Roda.mp3', NULL, NULL, '2013-11-05 10:32:10'),
(2, 211, 8, '01_Bomba.ogg', NULL, NULL, '2013-11-07 20:18:17'),
(2, 211, 10, '01_Bomba.mp3', NULL, NULL, '2013-11-09 21:42:57'),
(2, 221, 1, '03_Tro.ogg', NULL, NULL, '2013-11-05 16:54:30'),
(2, 221, 5, '04_Escopeta.ogg', NULL, NULL, '2013-11-05 10:42:32'),
(3, 1, 1, NULL, NULL, 'd9676105e315150001388fe6744a4861.jpg', '2013-11-06 12:12:08'),
(3, 1, 3, NULL, NULL, '04234e0d690e79f6c80307898d6eb00a.jpg', '2013-11-06 11:10:10'),
(3, 1, 5, NULL, NULL, '271258df1add0951628ae5325125cf78.jpg', '2013-11-06 11:10:34'),
(3, 1, 7, NULL, NULL, '7eb8394bb0af1316ae10f1080ac08109.jpg', '2013-11-05 17:41:25'),
(3, 1, 8, NULL, NULL, 'd491bbb5acece7f722b5d446bda11620.png', '2013-11-07 20:33:24'),
(3, 2, 1, 'i a vegades una totneria de sobte ens indica que ens en sortim', NULL, NULL, '2013-11-05 17:21:10'),
(3, 2, 5, 'Qui canta els seus mals espanta! Jo també :-)', NULL, NULL, '2013-10-30 23:24:24'),
(3, 2, 6, 'A minya rua, a minya rua', NULL, NULL, '2013-10-30 23:24:24'),
(3, 2, 7, 'Si tu no te das cuenta de lo que vale el  mundo es una tonteria', NULL, NULL, '2013-11-01 17:00:26'),
(3, 2, 8, 'No se que xim pum cuques', NULL, NULL, '2013-11-07 20:35:04'),
(3, 11, 1, '01-INICI.jpg', NULL, NULL, '2013-11-06 12:12:08'),
(3, 11, 3, '07-saladelJO.jpg', NULL, NULL, '2013-11-06 11:10:10'),
(3, 11, 5, '04-saladelesPARAULES01.jpg', NULL, NULL, '2013-11-06 11:10:34'),
(3, 11, 7, '012-biblioteca.jpg', NULL, NULL, '2013-11-05 17:41:25'),
(3, 11, 8, 'testetiqueta01.png', NULL, NULL, '2013-11-07 20:33:24'),
(4, 1, 3, NULL, 2, NULL, '2013-11-07 01:15:56'),
(4, 1, 8, NULL, 3, NULL, '2013-11-07 20:31:05'),
(4, 1, 10, NULL, 2, NULL, '2013-11-09 21:15:45'),
(4, 2, 1, NULL, NULL, 'd9062c0ad11e1c37dec3f2279f40de33.png', '2013-11-07 11:10:05'),
(4, 2, 3, NULL, NULL, '0084571816940e8b5c45b3bae742e131.jpg', '2013-11-07 11:44:00'),
(4, 2, 4, NULL, NULL, '91b74f195a82af548ccfeb613f25954d.jpg', '2013-11-07 11:59:09'),
(4, 2, 5, NULL, NULL, 'aa35e731956399d5c4906da600f615be.png', '2013-11-07 11:11:38'),
(4, 2, 7, NULL, NULL, '33998cbbaa410a42026118fea5ba5b78.png', '2013-11-07 12:01:23'),
(4, 2, 8, NULL, NULL, '095344b1cbc81b4b0b3e22ccef1ae903.jpg', '2013-11-07 20:31:43'),
(4, 3, 1, NULL, 2, NULL, '2013-11-07 20:08:42'),
(4, 3, 7, NULL, 2, NULL, '2013-11-07 12:32:59'),
(4, 3, 8, NULL, 3, NULL, '2013-11-07 20:32:19'),
(4, 3, 10, NULL, 4, NULL, '2013-11-09 21:41:55'),
(4, 21, 1, 'testtitula01.png', NULL, NULL, '2013-11-07 11:10:05'),
(4, 21, 3, 'titula01.jpg', NULL, NULL, '2013-11-07 11:44:00'),
(4, 21, 4, 'titula01.jpg', NULL, NULL, '2013-11-07 11:59:09'),
(4, 21, 5, 'testetiqueta01.png', NULL, NULL, '2013-11-07 11:11:38'),
(4, 21, 7, 'testetiqueta01.png', NULL, NULL, '2013-11-07 12:01:23'),
(4, 21, 8, 'testfiltra01ambfiltre3.jpg', NULL, NULL, '2013-11-07 20:31:43'),
(4, 22, 1, 'perquè representa un edifici que s''enlaira cap al cel i l''esperança', NULL, NULL, '2013-11-07 11:10:05'),
(4, 22, 3, 'un quadre buit en blanc per a omplir', NULL, NULL, '2013-11-07 11:44:00'),
(4, 22, 4, 'blanc sobre blanc', NULL, NULL, '2013-11-07 11:59:09'),
(4, 22, 5, 'esperança davant la guerra i alegria', NULL, NULL, '2013-11-07 11:11:38'),
(4, 22, 7, 'alegria de la huerta', NULL, NULL, '2013-11-07 12:01:23'),
(4, 22, 8, 'edifici graffititzat', NULL, NULL, '2013-11-07 20:31:43'),
(7, 1, 1, 'Al pan pan y al vino vino - popular', NULL, NULL, '2013-11-07 13:08:17'),
(7, 1, 3, 'i want to break free - Freddy Mercury', NULL, NULL, '2013-11-07 13:18:25'),
(7, 1, 4, 'mes text! - by me', NULL, NULL, '2013-11-07 13:20:08'),
(7, 1, 5, 'Tu mateix per tu mateix - Lao Sung', NULL, NULL, '2013-11-07 13:17:05'),
(7, 1, 7, '"A l''abril, no le mires el dentado" by Furmi i Carrier', NULL, NULL, '2013-11-07 12:56:00'),
(7, 1, 8, 'Be water my friend - Bruce Lee', NULL, NULL, '2013-11-07 20:37:52'),
(7, 1, 10, 'a cagar a la via - popular catalana', NULL, NULL, '2013-11-09 23:23:09');

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
(2, 211),
(2, 221),
(3, 1),
(3, 2),
(3, 11),
(4, 1),
(4, 2),
(4, 3),
(4, 21),
(4, 22),
(7, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `galeria`) VALUES
(1, 'carriers', 'b798f6bf6e6cd3bc04caa2aee8653ad6', NULL),
(2, 'carla', '35bc8cec895861697a0243c1304c7789', NULL),
(3, 'jackson5', 'e4da3b7fbbce2345d7772b0674a318d5', NULL),
(4, 'carreras', 'b798f6bf6e6cd3bc04caa2aee8653ad6', 'psp'),
(5, 'acarreras', 'b798f6bf6e6cd3bc04caa2aee8653ad6', 'psp'),
(6, 'conilla', '0b8eaade667444ca06d4e1bd6bef048d', 'psp'),
(7, 'neuss', 'c743cb20a88fe6855b310ade1ad06722', 'psp'),
(8, 'lilou', '301733ca8ff8afda93d92b48675f3c95', 'psp'),
(9, 'pspera', '95d52d58778762c70ae3328bb07d8a3d', 'psp'),
(10, 'pesepe', '4c7448cdd0c980cbc6d2bad24e4f94c9', 'psp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

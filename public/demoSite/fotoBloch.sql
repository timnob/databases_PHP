-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2022 at 09:09 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotoBloch`
--
CREATE DATABASE IF NOT EXISTS `fotoBloch` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `fotoBloch`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `naam` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `naam`, `email`, `wachtwoord`) VALUES
(1, 'RenÃ©', 'vnr@csg.nl', '8d847e01d22baa969f71fa362b4de21c9e13c7882bcea13ba5c6a8ae0d71fc8c9700c82e0087a65c8b37bd29f536747f28c9672bec1cae7762d2c9f36b6013f2'),
(2, 'Pieter', 'plp@csg.nl', '64b1da9e2c1faa690cb7fe7f392525c9a41ab1963e161d46fbbd973535c4ed512081da192a6760940a6f54bf6402d6100a1f607c9a351f1236e043ed5c887dc1'),
(3, 'Ids', 'osi@csg.nl', '158bd6e847c3b942bef60752fbda08ecd7fa06a32f1503802a9f5449337f2680584d3e293bad5cf4d221b4237cc2b7cc01d89449b56d7a0817acb80e8869ade3'),
(4, 'Vincent', 'vnv@csg.nl', '4e649ac2bea1a2b77c13b7f9fc89eba0c3bd8ad3b30ac065a4cf5db642b5368cecb58d8e8cbdcf926616bfb606096ee82fb980bb5dd8b73906ea85ef6708c3bf');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id` int NOT NULL,
  `titel` varchar(32) NOT NULL,
  `subtitel` varchar(64) NOT NULL,
  `omschrijving` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `titel`, `subtitel`, `omschrijving`) VALUES
(1, 'Museum', 'Chalon-sur-SaÃ´ne (Frankrijk), 27 april 2020', 'Foto genomen in MusÃ©e NicÃ©phore NiÃ©pce.'),
(2, 'Molens', 'Eemshaven (Groningen), 27 april 2020', 'Foto genomen tijdens een excursie. Nabewerking in Lightroom.'),
(3, 'Naar Huis', 'Schiermonnikoog (Groningen), 27 april 2020', 'De donkere lucht waarschuwde al: niet veel later zware onweer.'),
(4, 'Sneeuwduinen', 'Katwijk aan Zee, 27 april 2020', 'Zwart-wit-bewerking van een schilderachtig tafereel.');

-- --------------------------------------------------------

--
-- Table structure for table `reacties`
--

DROP TABLE IF EXISTS `reacties`;
CREATE TABLE `reacties` (
  `id` int NOT NULL,
  `foto` int NOT NULL,
  `account` int NOT NULL,
  `reactie` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reacties`
--

INSERT INTO `reacties` (`id`, `foto`, `account`, `reactie`) VALUES
(1, 1, 1, 'Ik vind het een hele intrigerende foto. Je moet echt goed kijken om te begrijpen waar je naar kijkt. Daar houd ik van: foto\'s die je nog even laten denken.'),
(2, 1, 3, 'Sorry, hier heb ik echt helemaal niks mee. Vaak vind ik het nog wel ok wat er hier op de site te zien is, maar dit kan me echt niet bekoren.'),
(3, 1, 4, 'Ik snap wat je hier hebt geprobeerd, maar vind het niet erg geslaagd. Op zich heeft de foto wel iets ouderwets: dat past bij een museum.'),
(4, 2, 2, 'Hee, dit is niet zo heel ver van mijn huis!'),
(5, 2, 2, 'Nog even: ik ken dit rijtje windmolens. Staan er al heel lang. Volgens mij hebben ze een heel laag rendement naar de huidige maatstaven.'),
(6, 3, 3, 'Sfeervol!'),
(7, 3, 4, 'Mooi dat contrast tussen de grauwe achtergrond en de frisse kleuren van de kleding van de jongens.'),
(8, 3, 1, 'Dank je: vind dit zelf ook best goed gelukt, hoewel de foto relatief donker geworden is.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reacties`
--
ALTER TABLE `reacties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reacties`
--
ALTER TABLE `reacties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 09:48 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `frogio`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS stocke;
DROP TABLE IF EXISTS hybridation;
DROP TABLE IF EXISTS espece;
DROP TABLE IF EXISTS collection;
DROP TABLE IF EXISTS famille;
DROP TABLE IF EXISTS statutuicn;
DROP TABLE IF EXISTS users;

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `idCollection` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `espece`
--

CREATE TABLE `espece` (
  `idEspece` int(11) NOT NULL,
  `nomVernaculaire` varchar(50) DEFAULT NULL,
  `nomScientifique` varchar(50) DEFAULT NULL,
  `altitudeMax` int(11) DEFAULT NULL,
  `taille` varchar(30) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `idStatut` int(11) NOT NULL,
  `idFamille` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `famille`
--

CREATE TABLE `famille` (
  `idFamille` int(11) NOT NULL,
  `nomFamille` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hybridation`
--

CREATE TABLE `hybridation` (
  `idEspece1` int(11) NOT NULL,
  `idEspece2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statutuicn`
--

CREATE TABLE `statutuicn` (
  `idStatut` int(11) NOT NULL,
  `statut` varchar(30) DEFAULT NULL,
  `iconeStatut` varchar(50) DEFAULT NULL,
  `codeStatut` varchar(2) DEFAULT NULL,
  `descriptionStatut` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `stocke`
--

CREATE TABLE `stocke` (
  `idCollection` int(11) NOT NULL,
  `idEspece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  `pwd` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`idCollection`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`idEspece`),
  ADD KEY `idStatut` (`idStatut`),
  ADD KEY `idFamille` (`idFamille`);

--
-- Indexes for table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`idFamille`);

--
-- Indexes for table `hybridation`
--
ALTER TABLE `hybridation`
  ADD PRIMARY KEY (`idEspece1`,`idEspece2`),
  ADD KEY `idEspece2` (`idEspece2`);

--
-- Indexes for table `statutuicn`
--
ALTER TABLE `statutuicn`
  ADD PRIMARY KEY (`idStatut`);

--
-- Indexes for table `stocke`
--
ALTER TABLE `stocke`
  ADD PRIMARY KEY (`idCollection`,`idEspece`),
  ADD KEY `idEspece` (`idEspece`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `idCollection` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espece`
--
ALTER TABLE `espece`
  MODIFY `idEspece` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `famille`
--
ALTER TABLE `famille`
  MODIFY `idFamille` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statutuicn`
--
ALTER TABLE `statutuicn`
  MODIFY `idStatut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `espece`
--
ALTER TABLE `espece`
  ADD CONSTRAINT `espece_ibfk_1` FOREIGN KEY (`idStatut`) REFERENCES `statutuicn` (`idStatut`),
  ADD CONSTRAINT `espece_ibfk_2` FOREIGN KEY (`idFamille`) REFERENCES `famille` (`idFamille`);

--
-- Constraints for table `hybridation`
--
ALTER TABLE `hybridation`
  ADD CONSTRAINT `hybridation_ibfk_1` FOREIGN KEY (`idEspece1`) REFERENCES `espece` (`idEspece`),
  ADD CONSTRAINT `hybridation_ibfk_2` FOREIGN KEY (`idEspece2`) REFERENCES `espece` (`idEspece`);

--
-- Constraints for table `stocke`
--
ALTER TABLE `stocke`
  ADD CONSTRAINT `stocke_ibfk_1` FOREIGN KEY (`idCollection`) REFERENCES `collection` (`idCollection`),
  ADD CONSTRAINT `stocke_ibfk_2` FOREIGN KEY (`idEspece`) REFERENCES `espece` (`idEspece`);
COMMIT;

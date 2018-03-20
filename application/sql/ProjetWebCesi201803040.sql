-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Genere le :  Lun 26 Fevrier 2018 Ã  09:25
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnees :  `ProjetWebCesi`
--
-- SCRIPT de création de la base de données ProjetWebCesi

CREATE DATABASE IF NOT EXISTS `PROJETWEBCESI` DEFAULT CHARACTER SET utf8;
USE `PROJETWEBCESI` ;
-- --------------------------------------------------------
SET FOREIGN_KEY_CHECKS=0;




--
-- Structure de la table `demande`
--
DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `utilisateurid` int(11) NOT NULL,
  `dateorigine` date NOT NULL,
  `datemaj` date NOT NULL,
  `datefinprevue` date ,
  `idEtat` int(11) NOT NULL,
  `description` text,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


REPLACE INTO `Demande` (`id` ,`utilisateurId`, `dateorigine`, `datemaj`, `datefinprevue` ,`idEtat`,`description`,`titre`) VALUES
	(1,2, '2018-02-19','2018-02-19','2019-02-19',1,'Demande aide gracieuse','Demande subvention creation entreprise'),
	(2,1, '2018-02-19','2018-02-19','2018-02-19',0,'Demande aide PME','Demande subvention creation entreprise'),
	(3,1, '2018-01-11','2018-01-19','2019-02-19',1,'Demande suvention','Demande subvention creation entreprise'),
	(4,1, '2018-01-19','2018-01-19','2019-02-19',0,'Demande aide PME','Demande subvention creation entreprise'),
	(5,2, '2018-02-10','2018-02-11','2019-02-19',1,'Demande aide gracieuse','Demande subvention creation entreprise'),
	(6,2, '2018-02-10','2018-03-01','2018-12-01',0,'Demande aide ville Kourou','Demande amenagement'),
	(7,3, '2018-02-09','2018-02-19','2019-02-19',1,'Demande subvention quartier','Demande amenagement'),
	(8,3, '2018-02-09','2018-01-11','2019-02-19',1,'Demande aide entreprise ','Demande projet entreprise'),
	(9,3, '2018-02-22','2018-03-01','2019-02-19',1,'Demande aide entreprise','Demande projet  entreprise'),
	(10,2, '2018-02-01','2018-02-19','2019-02-19',1,'Demande aide gracieuse','Demande subvention creation entreprise'),
	(11,2, '2018-02-02','2018-02-19','2018-02-19',1,'Demande aide PME','Demande subvention creation entreprise'),
	(12,3, '2018-02-11','2018-01-19','2019-02-19',1,'Demande suvention','Demande subvention creation entreprise'),
	(13,3, '2018-01-19','2018-01-19','2019-02-19',1,'Demande aide PME','Demande subvention creation entreprise'),
	(14,5, '2018-03-01','2018-03-11','2019-02-19',1,'Demande travaux ville Kourou','Demande amenagement'),
	(15,9, '2018-03-01','2018-03-11','2018-12-01',1,'Demande travaux ville Kourou','Demande amenagement'),
	(16,9, '2018-03-01','2018-03-11','2019-02-19',1,'Demande subvention quartier','Demande amenagement'),
	(17,9, '2018-03-01','2018-03-11','2019-02-19',1,'Demande aide capital initial ','Demande projet entreprise'),
	(18,9, '2018-03-01','2018-03-11','2019-02-19',1,'Demande subvention fête de la musique','Demande projet  entreprise');
-- --------------------------------------------------------

--
-- Structure de la table `demande_dossier`
--
DROP TABLE IF EXISTS `demande_dossier`;
CREATE TABLE `demande_dossier` (
  `idDemande` int(11) NOT NULL,
  `idDossier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


REPLACE INTO `demande_dossier` (`idDemande` ,`idDossier`) VALUES
	(1,1),
	(2,2),
	(3,3),
	(4,4),
	(5,5),
	(6,6),
	(7,7),
	(8,8),
	(9,9),
	(10,10),
	(11,11),
	(12,12),
	(13,13),
	(14,14),
	(15,15),
	(16,16),
	(17,17),
	(18,18);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--
DROP TABLE IF EXISTS `dossier`;
CREATE TABLE `dossier` (
  `id` int(11) NOT NULL,
  `dateorigine` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datemaj` date NOT NULL,
  `nomfichier` varchar(50) ,
  `cheminfichier` text 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
INSERT INTO `dossier` (`id`, `dateorigine`, `datemaj` ,`nomfichier` ,`cheminfichier` ) VALUES
	(1,'2018-02-19','2018-02-19','fichier.pdf','C:/xampp/htdocs/projet/files/'),
	(2, '2018-02-19','2018-02-19','fichier.zip','C:/xampp/htdocs/projet/files/'),
	(3, '2018-01-11','2018-01-19','fichier(2).zip','C:/xampp/htdocs/projet/files/'),
	(4, '2018-01-19','2018-01-19','fichier - Copie (4).pdf','C:/xampp/htdocs/projet/files/'),
	(5, '2018-02-10','2018-02-11','fichier - Copie (5).pdf','C:/xampp/htdocs/projet/files/'),
	(6, '2018-02-10','2018-03-01','fichier - Copie (6).pdf','C:/xampp/htdocs/projet/files/'),
	(7, '2018-02-09','2018-02-19','fichier - Copie (7).pdf','C:/xampp/htdocs/projet/files/'),
	(8, '2018-02-09','2018-01-11','fichier - Copie (8).pdf','C:/xampp/htdocs/projet/files/'),
	(9, '2018-02-22','2018-03-01','fichier - Copie (9).pdf','C:/xampp/htdocs/projet/files/'),
	(10, '2018-02-01','2018-02-19','fichier - Copie (10).pdf','C:/xampp/htdocs/projet/files/'),
	(11, '2018-02-02','2018-02-19','fichier - Copie (11).pdf','C:/xampp/htdocs/projet/files/'),
	(12, '2018-02-11','2018-01-19','fichier - Copie (12).pdf','C:/xampp/htdocs/projet/files/'),
	(13, '2018-01-19','2018-01-19','fichier - Copie (13).pdf','C:/xampp/htdocs/projet/files/'),
	(14, '2018-03-01','2018-03-11','fichier - Copie (14).pdf','C:/xampp/htdocs/projet/files/'),
	(15, '2018-03-01','2018-03-11','fichier - Copie (15).pdf','C:/xampp/htdocs/projet/files/'),
	(16, '2018-03-01','2018-03-11','fichier - Copie (16).pdf','C:/xampp/htdocs/projet/files/'),
	(17, '2018-03-01','2018-03-11','fichier - Copie (17).pdf ','C:/xampp/htdocs/projet/files/'),
	(18, '2018-03-01','2018-03-11','fichier - Copie (18).pdf','C:/xampp/htdocs/projet/files/');

--
-- Structure de la table `etat`
--
DROP TABLE IF EXISTS `etat`;
CREATE TABLE `etat` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




INSERT INTO `etat` (`id`, `titre`, `description`) VALUES
(1, 'Nouvelle Demande', 'Etat dans lequel se trouve les nouvelles demandes des utilisateurs'),
(2, 'En traitement', 'Cela signifie que la demande est en cours de traitement'),
(3, 'Valide', 'La demande est valide'),
(4, 'Refus', 'La demande est refusée');


-- --------------------------------------------------------


--
-- Structure de la table `responsabilite`
--
DROP TABLE IF EXISTS `responsabilite` ;
CREATE TABLE `responsabilite` (
  `idDemande` int(11) NOT NULL,
  `idService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
INSERT INTO `responsabilite` (`idDemande`,`idService`) VALUES
	(1,1),
	(2, 1),
	(3, 1),
	(4, 2),
	(5, 2),
	(6,3),
	(7, 3),
	(8, 3),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 2),
	(13,1),
	(14, 3),
	(15, 2),
	(16,2),
	(17,3),
	(18, 3);


--
-- Structure de la table `service`
--
DROP TABLE IF EXISTS `service` ;
CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
INSERT INTO `service` (`id`,`nom`,`description`) VALUES
	(1,'Secretariat','Secretariat'),
	(2,'Service1','Premier service'),
	(3,'Service2','Second service');
	

SET FOREIGN_KEY_CHECKS=1;
--
-- Index pour les tables exportees
--

--


--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEtat` (`idEtat`);

--
-- Index pour la table `demande_dossier`
--
ALTER TABLE `demande_dossier`
  ADD KEY `idDemande` (`idDemande`),
  ADD KEY `idDossier` (`idDossier`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`id`);


--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);



--
-- Index pour la table `responsabilite`
--
ALTER TABLE `responsabilite`
  ADD KEY `idService` (`idService`),
  ADD KEY `idDemande` (`idDemande`);


--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `dossier`
--
ALTER TABLE `dossier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--


--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--

--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--  debut des tables liées à la librairie Ion Auth 



-- Dumping structure for table tbl_reset_password
DROP TABLE IF EXISTS `tbl_reset_password`;
CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table tbl_reset_password: ~0 rows (approximately)


-- Dumping structure for table tbl_roles
DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table tbl_roles: 3 rows
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
REPLACE INTO `tbl_roles` (`roleId`, `role`) VALUES
	(1, 'Administrateur'),
	(2, 'Demandeur'),
	(3, 'Valideur');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 14 mars 2018 à 19:00
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetwebcesi`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

DROP TABLE IF EXISTS  `tbl_users`;
CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'email',
  `password` varchar(128) NOT NULL COMMENT 'Mot de passe crypt?',
  `name` varchar(128) DEFAULT NULL COMMENT 'Nom',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `idService` int(11) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `idService`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@test.com', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'Administrateur', '9890098900', 1, NULL, 0, 0, '2015-07-01 18:56:49', 1, '2017-06-19 09:22:53'),
(2, 'cb@test.com', '$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK', 'Demandeur', '9890098900', 2, 0, 0, 1, '2016-12-09 17:49:56', 1, '2017-06-19 09:22:29'),
(3, 'aj@test.com', '$2y$10$MB5NIu8i28XtMCnuExyFB.Ao1OXSteNpCiZSiaMSRPQx1F1WLRId2', 'Valideur', '9890098900', 3, NULL, 0, 1, '2016-12-09 17:50:22', 1, '2017-06-19 09:23:21'),
(4, 'guest@guest.com', '$2y$10$SLVIDlBjdBDuLGExIY.gXOT9NJ2FkT7yLhd8h.h4yQ2His/LllfvS', 'Guest', '0642664665', 3, NULL, 0, 1, '2018-03-09 11:40:13', NULL, NULL),
(5, 'test@test.com', '$2y$10$OWrCuHM7vC7uWPNBehP1/.BHmHboz4OMt.Qgrb6Uh5K7Eq2Q8ht9G', 'Test', '0642664665', 2, 0, 1, 0, '2018-03-09 11:41:00', 1, '2018-03-11 19:45:32'),
(6, 'test3@test.com', '$2y$10$Fs3Lcx5nQIIl4jTIS/MlaeaWZM4uEhEUXY9KFtSdCq9zGCCo9UcGa', 'Test3', '0387079536', 3, 6, 1, 1, '2018-03-10 08:43:59', 1, '2018-03-11 17:48:50'),
(7, 'test@test.com', '$2y$10$o.dMNdL8tEakT7I0IIQede793IzPSiZgzXB.EykfhBFnQ4CGsAq9O', 'Test4', '0642664665', 3, 6, 0, 1, '2018-03-11 21:41:50', NULL, NULL),
(8, 'test5@test.com', '$2y$10$C3yHYPELaxcjbjoxkVhRo.4qNsE3YG3/qPVO48SAKbXTyHiRflSum', 'Test5', '0387079536', 3, NULL, 0, 1, '2018-03-11 21:42:15', NULL, NULL),
(9, 'test6@test.com', '$2y$10$h5KRPxmDtEibilomhmv4Keykpyzr.tRAH6kT5r10Eo2I0tu/g.3eS', 'Test6', '0387079536', 3, NULL, 0, 1, '2018-03-11 21:42:33', NULL, NULL),
(10, 'test7@test.com', '$2y$10$Vvv7juoSQBoIhE/kxxeCKe4MrO8oG3QVGkum4wQprkdTYELCkB1jG', 'Test7', '0642664665', 2, NULL, 0, 1, '2018-03-11 21:43:20', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



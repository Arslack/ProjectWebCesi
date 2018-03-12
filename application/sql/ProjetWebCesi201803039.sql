-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- GÃ©nÃ©rÃ© le :  Lun 26 FÃ©vrier 2018 Ã  09:25
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



-- --------------------------------------------------------

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `etage` varchar(100) NOT NULL,
  `rue` varchar(200) NOT NULL,
  `rue2` varchar(200) ,
  `ville` varchar(200) NOT NULL,
  `codepostal` varchar(12) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `Adresse` DISABLE KEYS */;
REPLACE INTO `Adresse` ( `id`,`idprofil`,`numero` ,`etage` ,`rue` ,`rue2` ,`ville`,`codepostal` , `region` ,`pays` ) VALUES
	(2, 1,1,'', 'Rue Duchesne ','','Kourou','97310', 'Guyane', 'France'),
	(3, 1,3,'', 'Angle Rue Becker et Boulevard Mandela','','Cayenne','97300', 'Guyane', 'France'),
	(4, 1,180,'', 'Route de Montabo','','Cayenne','97300', 'Guyane', 'France');
/*!40000 ALTER TABLE `Adresse` ENABLE KEYS */;
-- --------------------------------------------------------

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

/*!40000 ALTER TABLE `Demande` DISABLE KEYS */;
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
	(14,2, '2018-03-01','2018-03-11','2019-02-19',1,'Demande travaux ville Kourou','Demande amenagement'),
	(15,2, '2018-03-01','2018-03-11','2018-12-01',1,'Demande travaux ville Kourou','Demande amenagement'),
	(16,3, '2018-03-01','2018-03-11','2019-02-19',1,'Demande subvention quartier','Demande amenagement'),
	(17,3, '2018-03-01','2018-03-11','2019-02-19',1,'Demande aide capital initial ','Demande projet entreprise'),
	(18,3, '2018-03-01','2018-03-11','2019-02-19',1,'Demande subvention fête de la musique','Demande projet  entreprise');
/*!40000 ALTER TABLE `Demande` ENABLE KEYS */;-- --------------------------------------------------------

--
-- Structure de la table `demande_dossier`
--
DROP TABLE IF EXISTS `demande_dossier`;
CREATE TABLE `demande_dossier` (
  `nom` varchar(256) NOT NULL,
  `idDemande` int(11) NOT NULL,
  `idDossier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Structure de la table `droits`
--
-- DROP TABLE IF EXISTS `droits`;
-- CREATE TABLE `droits` (
--  `id` int(11) NOT NULL,
--  `nom` varchar(50) NOT NULL,
--  `descr` text NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--
DROP TABLE IF EXISTS `etat`;
CREATE TABLE `etat` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--
DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telportable` varchar(42) NOT NULL,
  `telfixe` varchar(42) NOT NULL,
  `idCategrie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_adresse`
--
DROP TABLE IF EXISTS `profil_adresse`;
CREATE TABLE `profil_adresse` (
  `nom` varchar(256) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `idAdresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_role`
--
DROP TABLE IF EXISTS `profil_role`  ;

CREATE TABLE `profil_role` (
  `idProfil` int(11) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `responsabilite`
--
DROP TABLE IF EXISTS `responsabilite` ;
CREATE TABLE `responsabilite` (
  `idDemande` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `idService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--
DROP TABLE IF EXISTS `role` ;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role_droit`
--
DROP TABLE IF EXISTS `role_droit` ;
CREATE TABLE `role_droit` (
  `idRole` int(11) NOT NULL,
  `idDroit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

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

--
-- Structure de la table `service_role`
--
DROP TABLE IF EXISTS `service_role` ;
CREATE TABLE `service_role` (
  `idService` int(11) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--
 DROP TABLE IF EXISTS `utilisateur` ;
 CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(64) NOT NULL,
  `dateorigine` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datemaj` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nom` varchar(128) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `FlagOk` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_profil`
--
DROP TABLE IF EXISTS `utilisateur_profil` ;
CREATE TABLE `utilisateur_profil` (
  `idUtilisateur` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;
--
-- Index pour les tables exportÃ©es
--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);
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
-- Index pour la table `droits`
--
-- ALTER TABLE `droits`
--  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portable` (`telportable`),
  ADD UNIQUE KEY `fixe` (`telfixe`);

--
-- Index pour la table `profil_adresse`
--
ALTER TABLE `profil_adresse`
  ADD KEY `idProfil` (`idProfil`),
  ADD KEY `idAdresse` (`idAdresse`);

--
-- Index pour la table `profil_role`
--
ALTER TABLE `profil_role`
  ADD KEY `idProfil` (`idProfil`),
  ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `responsabilite`
--
ALTER TABLE `responsabilite`
  ADD UNIQUE KEY `idRole` (`idRole`),
  ADD UNIQUE KEY `idService` (`idService`),
  ADD KEY `idDemande` (`idDemande`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_droit`
--
ALTER TABLE `role_droit`
  ADD KEY `idRole` (`idRole`),
  ADD KEY `idDroit` (`idDroit`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `service_role`
--
ALTER TABLE `service_role`
  ADD KEY `idService` (`idService`),
  ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `utilisateur`
--
-- ALTER TABLE `utilisateur`
--  ADD PRIMARY KEY (`id`),
--  ADD UNIQUE KEY `utilisateur_email` (`email`);

--
-- Index pour la table `utilisateur_profil`
--
ALTER TABLE `utilisateur_profil`
  ADD KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idProfil` (`idProfil`);

--
-- AUTO_INCREMENT pour les tables exportÃ©es
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `dossier`
--
ALTER TABLE `dossier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `droits`
--
-- ALTER TABLE `droits`
--  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
-- ALTER TABLE `utilisateur`
--  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
/*!40000 ALTER TABLE `tbl_reset_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reset_password` ENABLE KEYS */;

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

-- Dumping structure for table tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL COMMENT 'email',
  `password` varchar(128) NOT NULL COMMENT 'Mot de passe crypté',
  `name` varchar(128) DEFAULT NULL COMMENT 'Nom',
  `roleText` varchar(128) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table tbl_users: 3 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
REPLACE INTO `tbl_users` (`userId`, `email`, `password`, `name`, `roleText` , `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
	(1, 'admin@test.com', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'Admin','Administrateur', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2017-06-19 09:22:53'),
	(2, 'cb@test.com', '$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK', 'Clement Burger','Demandeur', '9890098900', 2, 0, 1, '2016-12-09 17:49:56', 1, '2017-06-19 09:22:29'),
	(3, 'aj@test.com', '$2y$10$MB5NIu8i28XtMCnuExyFB.Ao1OXSteNpCiZSiaMSRPQx1F1WLRId2', 'Alain Jantet','Valideur', '9890098900', 3, 0, 1, '2016-12-09 17:50:22', 1, '2017-06-19 09:23:21');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

--  fin des tables liées à la librairie Ion Auth 


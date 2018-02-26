-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 26 Février 2018 à 09:25
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
-- SCRIPT de cr�ation de la base de donn�es ProjetWebCesi

CREATE DATABASE IF NOT EXISTS `PROJETWEBCESI` DEFAULT CHARACTER SET utf8;
USE `PROJETWEBCESI` ;
-- --------------------------------------------------------
SET FOREIGN_KEY_CHECKS=0;



--
-- Structure de la table `adresse`
--
DROP TABLE IF EXISTS `adresse`;
CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `etage` int(11) ,
  `rue` varchar(255) NOT NULL,
  `rue2` varchar(255) ,
  `ville` varchar(255) NOT NULL,
  `codepostal` varchar(12) NOT NULL,
  `region` varchar(255) NOT NULL,
  `pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--
DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `dateorigine` date NOT NULL,
  `datemaj` date NOT NULL,
  `datefinprevue` date ,
  `idEtat` int(11) NOT NULL,
  `description` text,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

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
DROP TABLE IF EXISTS `droits`;
CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `identifiant` varchar(64) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `dateorigine` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datemaj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

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
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

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
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateur_email` (`email`);

--
-- Index pour la table `utilisateur_profil`
--
ALTER TABLE `utilisateur_profil`
  ADD KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idProfil` (`idProfil`);

--
-- AUTO_INCREMENT pour les tables exportées
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
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`);

--
-- Contraintes pour la table `demande_dossier`
--
ALTER TABLE `demande_dossier`
  ADD CONSTRAINT `demande_dossier_ibfk_1` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`id`),
  ADD CONSTRAINT `demande_dossier_ibfk_2` FOREIGN KEY (`idDossier`) REFERENCES `dossier` (`id`);

--
-- Contraintes pour la table `profil_adresse`
--
ALTER TABLE `profil_adresse`
  ADD CONSTRAINT `profil_adresse_ibfk_1` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `profil_adresse_ibfk_2` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`id`);

--
-- Contraintes pour la table `profil_role`
--
ALTER TABLE `profil_role`
  ADD CONSTRAINT `profil_role_ibfk_1` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `profil_role_ibfk_2` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `responsabilite`
--
ALTER TABLE `responsabilite`
  ADD CONSTRAINT `responsabilite_ibfk_1` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`id`),
  ADD CONSTRAINT `responsabilite_ibfk_2` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `responsabilite_ibfk_3` FOREIGN KEY (`idService`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `role_droit`
--
ALTER TABLE `role_droit`
  ADD CONSTRAINT `role_droit_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `role_droit_ibfk_2` FOREIGN KEY (`idDroit`) REFERENCES `droits` (`id`);

--
-- Contraintes pour la table `service_role`
--
ALTER TABLE `service_role`
  ADD CONSTRAINT `service_role_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `service_role_ibfk_2` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `utilisateur_profil`
--
ALTER TABLE `utilisateur_profil`
  ADD CONSTRAINT `utilisateur_profil_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `utilisateur_profil_ibfk_2` FOREIGN KEY (`idProfil`) REFERENCES `etat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- creation des user de la BDD


drop user 'admin'@'localhost';
flush privileges;
create user 'admin'@'localhost' identified by 'admin';
GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';

drop user 'CB'@'localhost';
CREATE USER 'CB'@'localhost' IDENTIFIED BY 'CB';
GRANT ALL PRIVILEGES ON * . * TO 'CB'@'localhost';

drop user 'AJ'@'localhost';
CREATE USER 'AJ'@'localhost' IDENTIFIED BY 'AJ';
GRANT ALL PRIVILEGES ON * . * TO 'CB'@'localhost';
FLUSH PRIVILEGES;



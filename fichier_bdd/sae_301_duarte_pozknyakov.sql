-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 jan. 2023 à 15:37
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_301_duarte_pozknyakov`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE IF NOT EXISTS `jeu` (
  `nom` varchar(60) NOT NULL,
  `editeur` varchar(100) DEFAULT NULL,
  `edition` int DEFAULT NULL,
  `genre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `idjoueur` int NOT NULL,
  PRIMARY KEY (`idjoueur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `maitrise`
--

DROP TABLE IF EXISTS `maitrise`;
CREATE TABLE IF NOT EXISTS `maitrise` (
  `idmaitrise` int NOT NULL,
  `idpartie` int NOT NULL,
  `idmeneur` int NOT NULL,
  PRIMARY KEY (`idmaitrise`),
  KEY `fk_meneur_has_partie_partie1_idx` (`idpartie`),
  KEY `fk_mene_meneur1_idx` (`idmeneur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `meneur`
--

DROP TABLE IF EXISTS `meneur`;
CREATE TABLE IF NOT EXISTS `meneur` (
  `idmeneur` int NOT NULL,
  PRIMARY KEY (`idmeneur`),
  KEY `fk_meneur_utilisateur1_idx` (`idmeneur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `message_jdr`
--

DROP TABLE IF EXISTS `message_jdr`;
CREATE TABLE IF NOT EXISTS `message_jdr` (
  `idmessagen` int NOT NULL,
  `corps` text NOT NULL,
  `date` date NOT NULL,
  `idscene` int NOT NULL,
  `idpersonnage` int DEFAULT NULL,
  `utilisateur_idutilisateur` int NOT NULL,
  `image` mediumblob,
  PRIMARY KEY (`idmessagen`),
  KEY `fk_message_narration_scene1_idx` (`idscene`),
  KEY `fk_message_narration_personnage1_idx` (`idpersonnage`),
  KEY `fk_message_narration_utilisateur1_idx` (`utilisateur_idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `message_prive`
--

DROP TABLE IF EXISTS `message_prive`;
CREATE TABLE IF NOT EXISTS `message_prive` (
  `idmessagec` int NOT NULL,
  `corps` text NOT NULL,
  `date` date NOT NULL,
  `idscene` int NOT NULL,
  `idutilisateur` int NOT NULL,
  `image` mediumblob,
  PRIMARY KEY (`idmessagec`),
  KEY `fk_message_conversation_scene1_idx` (`idscene`),
  KEY `fk_message_conversation_utilisateur1_idx` (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `idpartie` int NOT NULL AUTO_INCREMENT,
  `datecreation` date NOT NULL,
  `titre` varchar(100) NOT NULL,
  `resume` mediumtext,
  `nomjeu` varchar(60) NOT NULL,
  PRIMARY KEY (`idpartie`),
  KEY `fk_partie_jeu1_idx` (`nomjeu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `idpersonnage` int NOT NULL,
  `nom` varchar(45) NOT NULL,
  `age` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`idpersonnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `pj`
--

DROP TABLE IF EXISTS `pj`;
CREATE TABLE IF NOT EXISTS `pj` (
  `idpartie` int NOT NULL,
  `idpersonnage` int NOT NULL,
  `idutilisateur` int NOT NULL,
  PRIMARY KEY (`idpartie`,`idpersonnage`,`idutilisateur`),
  KEY `fk_utilisateur_has_partie_partie1_idx` (`idpartie`),
  KEY `fk_role_personnage1_idx` (`idpersonnage`),
  KEY `fk_interprete_joueur1_idx` (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `pnj`
--

DROP TABLE IF EXISTS `pnj`;
CREATE TABLE IF NOT EXISTS `pnj` (
  `idmaitrise` int NOT NULL,
  `idpersonnage` int NOT NULL,
  PRIMARY KEY (`idmaitrise`,`idpersonnage`),
  KEY `fk_maitrise_has_personnage_personnage1_idx` (`idpersonnage`),
  KEY `fk_maitrise_has_personnage_maitrise1_idx` (`idmaitrise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

DROP TABLE IF EXISTS `scene`;
CREATE TABLE IF NOT EXISTS `scene` (
  `idscene` int NOT NULL,
  `titre` varchar(45) NOT NULL,
  `idpartie` int NOT NULL,
  PRIMARY KEY (`idscene`),
  KEY `fk_scene_partie1_idx` (`idpartie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `fk_joueur_utilisateur1` FOREIGN KEY (`idjoueur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `maitrise`
--
ALTER TABLE `maitrise`
  ADD CONSTRAINT `fk_mene_meneur1` FOREIGN KEY (`idmeneur`) REFERENCES `meneur` (`idmeneur`),
  ADD CONSTRAINT `fk_meneur_has_partie_partie1` FOREIGN KEY (`idpartie`) REFERENCES `partie` (`idpartie`);

--
-- Contraintes pour la table `meneur`
--
ALTER TABLE `meneur`
  ADD CONSTRAINT `fk_meneur_utilisateur1` FOREIGN KEY (`idmeneur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `message_jdr`
--
ALTER TABLE `message_jdr`
  ADD CONSTRAINT `fk_message_narration_personnage1` FOREIGN KEY (`idpersonnage`) REFERENCES `personnage` (`idpersonnage`),
  ADD CONSTRAINT `fk_message_narration_scene1` FOREIGN KEY (`idscene`) REFERENCES `scene` (`idscene`),
  ADD CONSTRAINT `fk_message_narration_utilisateur1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD CONSTRAINT `fk_message_conversation_scene1` FOREIGN KEY (`idscene`) REFERENCES `scene` (`idscene`),
  ADD CONSTRAINT `fk_message_conversation_utilisateur1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_jeu1` FOREIGN KEY (`nomjeu`) REFERENCES `jeu` (`nom`);

--
-- Contraintes pour la table `pj`
--
ALTER TABLE `pj`
  ADD CONSTRAINT `fk_interprete_joueur1` FOREIGN KEY (`idutilisateur`) REFERENCES `joueur` (`idjoueur`),
  ADD CONSTRAINT `fk_role_personnage1` FOREIGN KEY (`idpersonnage`) REFERENCES `personnage` (`idpersonnage`),
  ADD CONSTRAINT `fk_utilisateur_has_partie_partie1` FOREIGN KEY (`idpartie`) REFERENCES `partie` (`idpartie`);

--
-- Contraintes pour la table `pnj`
--
ALTER TABLE `pnj`
  ADD CONSTRAINT `fk_maitrise_has_personnage_maitrise1` FOREIGN KEY (`idmaitrise`) REFERENCES `maitrise` (`idmaitrise`),
  ADD CONSTRAINT `fk_maitrise_has_personnage_personnage1` FOREIGN KEY (`idpersonnage`) REFERENCES `personnage` (`idpersonnage`);

--
-- Contraintes pour la table `scene`
--
ALTER TABLE `scene`
  ADD CONSTRAINT `fk_scene_partie1` FOREIGN KEY (`idpartie`) REFERENCES `partie` (`idpartie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

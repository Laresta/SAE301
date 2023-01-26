-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 26 2023 г., 18:05
-- Версия сервера: 5.7.36
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sae-301`
--

-- --------------------------------------------------------

--
-- Структура таблицы `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE IF NOT EXISTS `jeu` (
  `nom` varchar(60) NOT NULL,
  `editeur` varchar(100) DEFAULT NULL,
  `edition` int(11) DEFAULT NULL,
  `genre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `jeu`
--

INSERT INTO `jeu` (`nom`, `editeur`, `edition`, `genre`) VALUES
('Test', 'Test', 1, 'test'),
('Test1', 'Test', 1, 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `idjoueur` int(11) NOT NULL,
  PRIMARY KEY (`idjoueur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `maitrise`
--

DROP TABLE IF EXISTS `maitrise`;
CREATE TABLE IF NOT EXISTS `maitrise` (
  `idmaitrise` int(11) NOT NULL AUTO_INCREMENT,
  `idpartie` int(11) NOT NULL,
  `idmeneur` int(11) NOT NULL,
  PRIMARY KEY (`idmaitrise`),
  KEY `fk_mene_meneur1_idx` (`idmeneur`),
  KEY `fk_meneur_has_partie_partie1` (`idpartie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `maitrise`
--

INSERT INTO `maitrise` (`idmaitrise`, `idpartie`, `idmeneur`) VALUES
(8, 28, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `meneur`
--

DROP TABLE IF EXISTS `meneur`;
CREATE TABLE IF NOT EXISTS `meneur` (
  `idmeneur` int(11) NOT NULL,
  PRIMARY KEY (`idmeneur`),
  KEY `fk_meneur_utilisateur1_idx` (`idmeneur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meneur`
--

INSERT INTO `meneur` (`idmeneur`) VALUES
(7);

-- --------------------------------------------------------

--
-- Структура таблицы `message_jdr`
--

DROP TABLE IF EXISTS `message_jdr`;
CREATE TABLE IF NOT EXISTS `message_jdr` (
  `idmessagen` int(11) NOT NULL,
  `corps` text NOT NULL,
  `date` date NOT NULL,
  `idscene` int(11) NOT NULL,
  `idpersonnage` int(11) DEFAULT NULL,
  `utilisateur_idutilisateur` int(11) NOT NULL,
  `image` mediumblob,
  PRIMARY KEY (`idmessagen`),
  KEY `fk_message_narration_scene1_idx` (`idscene`),
  KEY `fk_message_narration_personnage1_idx` (`idpersonnage`),
  KEY `fk_message_narration_utilisateur1_idx` (`utilisateur_idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `message_prive`
--

DROP TABLE IF EXISTS `message_prive`;
CREATE TABLE IF NOT EXISTS `message_prive` (
  `idmessagec` int(11) NOT NULL,
  `corps` text NOT NULL,
  `date` date NOT NULL,
  `idscene` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `image` mediumblob,
  PRIMARY KEY (`idmessagec`),
  KEY `fk_message_conversation_scene1_idx` (`idscene`),
  KEY `fk_message_conversation_utilisateur1_idx` (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `idpartie` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` date NOT NULL,
  `titre` varchar(100) NOT NULL,
  `resume` mediumtext,
  `nomjeu` varchar(60) NOT NULL,
  PRIMARY KEY (`idpartie`),
  KEY `fk_partie_jeu1_idx` (`nomjeu`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partie`
--

INSERT INTO `partie` (`idpartie`, `datecreation`, `titre`, `resume`, `nomjeu`) VALUES
(19, '2023-01-25', 'dsa', 'sa', 'Test'),
(22, '2023-01-25', 'dsa', 'sa', 'Test'),
(24, '2023-01-25', 'Test 2', 'series d\'action', 'Test'),
(28, '2023-01-26', 'Test 2', 'Series de comediess', 'Test');

-- --------------------------------------------------------

--
-- Структура таблицы `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `idpersonnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `age` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`idpersonnage`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personnage`
--

INSERT INTO `personnage` (`idpersonnage`, `nom`, `age`, `description`) VALUES
(1, 'Test', '19', 'Test'),
(2, 'Test 2', '25', 'Test 2');

-- --------------------------------------------------------

--
-- Структура таблицы `pj`
--

DROP TABLE IF EXISTS `pj`;
CREATE TABLE IF NOT EXISTS `pj` (
  `idpartie` int(11) NOT NULL,
  `idpersonnage` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idpartie`,`idpersonnage`,`idutilisateur`),
  KEY `fk_utilisateur_has_partie_partie1_idx` (`idpartie`),
  KEY `fk_role_personnage1_idx` (`idpersonnage`),
  KEY `fk_interprete_joueur1_idx` (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pnj`
--

DROP TABLE IF EXISTS `pnj`;
CREATE TABLE IF NOT EXISTS `pnj` (
  `idmaitrise` int(11) NOT NULL,
  `idpersonnage` int(11) NOT NULL,
  PRIMARY KEY (`idmaitrise`,`idpersonnage`),
  KEY `fk_maitrise_has_personnage_personnage1_idx` (`idpersonnage`),
  KEY `fk_maitrise_has_personnage_maitrise1_idx` (`idmaitrise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `scene`
--

DROP TABLE IF EXISTS `scene`;
CREATE TABLE IF NOT EXISTS `scene` (
  `idscene` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `idpartie` int(11) NOT NULL,
  PRIMARY KEY (`idscene`),
  KEY `fk_scene_partie1_idx` (`idpartie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `scene`
--

INSERT INTO `scene` (`idscene`, `titre`, `idpartie`) VALUES
(1, 'Test scene', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `login`, `password`, `email`) VALUES
(7, 'maxpoz', '$2y$10$b60TBrjDE6tVwEDdls2yJe9xdkkUU0T3WIad.zdo2LShzGZUoRvSO', NULL);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `fk_joueur_utilisateur1` FOREIGN KEY (`idjoueur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `maitrise`
--
ALTER TABLE `maitrise`
  ADD CONSTRAINT `fk_mene_meneur1_idx` FOREIGN KEY (`idmeneur`) REFERENCES `meneur` (`idmeneur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_meneur_has_partie_partie1` FOREIGN KEY (`idpartie`) REFERENCES `partie` (`idpartie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `meneur`
--
ALTER TABLE `meneur`
  ADD CONSTRAINT `fk_meneur_utilisateur1` FOREIGN KEY (`idmeneur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message_jdr`
--
ALTER TABLE `message_jdr`
  ADD CONSTRAINT `fk_message_narration_personnage1` FOREIGN KEY (`idpersonnage`) REFERENCES `personnage` (`idpersonnage`),
  ADD CONSTRAINT `fk_message_narration_scene1` FOREIGN KEY (`idscene`) REFERENCES `scene` (`idscene`),
  ADD CONSTRAINT `fk_message_narration_utilisateur1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `message_prive`
--
ALTER TABLE `message_prive`
  ADD CONSTRAINT `fk_message_conversation_scene1` FOREIGN KEY (`idscene`) REFERENCES `scene` (`idscene`),
  ADD CONSTRAINT `fk_message_conversation_utilisateur1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_jeu1` FOREIGN KEY (`nomjeu`) REFERENCES `jeu` (`nom`);

--
-- Ограничения внешнего ключа таблицы `pj`
--
ALTER TABLE `pj`
  ADD CONSTRAINT `fk_interprete_joueur1` FOREIGN KEY (`idutilisateur`) REFERENCES `joueur` (`idjoueur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_personnage1` FOREIGN KEY (`idpersonnage`) REFERENCES `personnage` (`idpersonnage`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_has_partie_partie1` FOREIGN KEY (`idpartie`) REFERENCES `partie` (`idpartie`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pnj`
--
ALTER TABLE `pnj`
  ADD CONSTRAINT `fk_maitrise_has_personnage_maitrise1` FOREIGN KEY (`idmaitrise`) REFERENCES `maitrise` (`idmaitrise`),
  ADD CONSTRAINT `fk_maitrise_has_personnage_personnage1` FOREIGN KEY (`idpersonnage`) REFERENCES `personnage` (`idpersonnage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

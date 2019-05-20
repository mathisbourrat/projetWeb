-

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `benevole` (
  `idBen` int(11) NOT NULL AUTO_INCREMENT,
  `nomBen` varchar(50) NOT NULL,
  `prenomBen` varchar(11) NOT NULL,
  `mailBen` varchar(50) NOT NULL,
  `telBen` int(11) NOT NULL,
  `codePBen` int(11) NOT NULL,
  `villeBen` varchar(50) NOT NULL,
  `adresseBen` varchar(50) NOT NULL,
  `mdpBen` varchar(50) NOT NULL,
  PRIMARY KEY (`idBen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;


-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `nomEvent` varchar(50) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `idOrga` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `imageEvent` varchar(2000) NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `idOrga` (`idOrga`,`idType`),
  KEY `idType` (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;


-- Structure de la table `organisateur`


CREATE TABLE IF NOT EXISTS `organisateur` (
  `idOrga` int(11) NOT NULL AUTO_INCREMENT,
  `nomOrga` varchar(50) NOT NULL,
  `prenomOrga` varchar(50) NOT NULL,
  `mailOrga` varchar(50) NOT NULL,
  `telOrga` int(11) NOT NULL,
  `codePOrga` int(11) NOT NULL,
  `villeOrga` varchar(50) NOT NULL,
  `adresseOrga` varchar(50) NOT NULL,
  `mdpOrga` varchar(50) NOT NULL,
  PRIMARY KEY (`idOrga`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;



-- Structure de la table `orgatokens`

CREATE TABLE IF NOT EXISTS `orgatokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOrga` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idOrga` (`idOrga`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;



-- Structure de la table `participer`

CREATE TABLE IF NOT EXISTS `participer` (
  `idBen` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  PRIMARY KEY (`idBen`,`idEvent`),
  KEY `participer_ibfk_2` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- Structure de la table `typeevent`
--

CREATE TABLE IF NOT EXISTS `typeevent` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `descriptionType` varchar(50) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;



-- Structure de la table `usertokens`
--

CREATE TABLE IF NOT EXISTS `usertokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  KEY `token` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--

-- Déclencheurs `event`
--
DELIMITER $$
CREATE TRIGGER `verif_date_debut` BEFORE INSERT ON `event` FOR EACH ROW BEGIN
if new.dateDebut<CURDATE() then 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'vous ne pouvez pas ajouter un evenement déja commencé';
end if;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `verif_date_fin` BEFORE INSERT ON `event` FOR EACH ROW BEGIN
if new.dateDebut>new.dateFin then 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'la date de fin doit être après celle de début';
end if;
END
$$
DELIMITER ;

--


-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`idOrga`) REFERENCES `organisateur` (`IdOrga`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `typeevent` (`idType`);

--
-- Contraintes pour la table `orgatokens`
--
ALTER TABLE `orgatokens`
  ADD CONSTRAINT `orgatokens_ibfk_1` FOREIGN KEY (`idOrga`) REFERENCES `organisateur` (`IdOrga`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `event` (`idEvent`) ON DELETE CASCADE,
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`idBen`) REFERENCES `benevole` (`idBen`) ON DELETE CASCADE;

--
-- Contraintes pour la table `usertokens`
--
ALTER TABLE `usertokens`
  ADD CONSTRAINT `usertokens_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `benevole` (`idBen`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

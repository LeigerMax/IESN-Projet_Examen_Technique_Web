-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 14 Décembre 2020 à 00:00
-- Version du serveur :  10.1.47-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myExam`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `ansID` int(11) NOT NULL,
  `ansTxt` varchar(255) NOT NULL,
  `isCorrect` int(3) NOT NULL DEFAULT '0',
  `questID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `answer`
--

INSERT INTO `answer` (`ansID`, `ansTxt`, `isCorrect`, `questID`) VALUES
(1, 'Oui', 1, 1),
(2, 'Non', 0, 1),
(3, 'Partiellement', 0, 1),
(4, 'je ne sais pas ', 2, 1),
(5, 'RJ11', 0, 2),
(6, 'RJ45', 1, 2),
(7, 'VGA', 0, 2),
(8, 'je ne sais pas ', 2, 2),
(9, '4', 0, 3),
(10, '6', 0, 3),
(11, '8', 1, 3),
(12, 'je ne sais pas ', 2, 3),
(13, '1-2 et 3-6', 0, 4),
(14, '1-3 et 2-6', 1, 4),
(15, '2-4 et 1-3', 0, 4),
(16, 'je ne sais pas ', 2, 4),
(17, 'Un Hub', 0, 5),
(18, 'Un Switch', 1, 5),
(19, 'Un Routeur', 0, 5),
(20, 'je ne sais pas ', 2, 5),
(21, 'Vrai', 1, 6),
(22, 'Faux', 0, 6),
(23, 'Vrai, mais pour les serveurs professionnels uniquement', 0, 6),
(24, 'je ne sais pas ', 2, 6),
(25, 'Oui', 1, 7),
(26, 'Non', 0, 7),
(27, 'Oui, mais uniquement en filaire', 0, 7),
(28, 'je ne sais pas ', 2, 7),
(29, 'Un modem', 0, 8),
(30, 'Un routeur', 1, 8),
(31, 'Un switch', 0, 8),
(32, 'je ne sais pas ', 2, 8),
(33, 'IMAP', 0, 9),
(34, 'POP', 1, 9),
(35, 'SMTP', 0, 9),
(36, 'je ne sais pas ', 2, 9),
(37, 'Outlook', 0, 10),
(38, 'Debian', 0, 10),
(39, 'Samba', 1, 10),
(40, 'je ne sais pas ', 2, 10),
(41, 'La clé doit être aussi longue que le message ', 0, 11),
(42, 'La clé doit être aléatoire ', 0, 11),
(43, 'La clé doit être jetable une utilisation ', 0, 11),
(44, 'Toutes les proposition citées ', 1, 11),
(45, 'Je ne sais pas', 2, 11),
(46, 'CZCO ', 0, 12),
(47, 'RKNZ ', 0, 12),
(48, 'HADP', 1, 12),
(49, 'Je ne sais pas', 2, 12),
(50, 'Les faiblesses d’un système crypto doivent être discutées publiquement ', 1, 13),
(51, 'Les faiblesse d’un système crypto doivent rester secrètes ', 0, 13),
(52, 'Si quelqu’un intercepte le message il pourra le décrypter ', 0, 13),
(53, 'Je ne sais pas', 2, 13),
(54, 'Chiffre de Playfer ', 0, 14),
(55, 'Chiffre de César ', 1, 14),
(56, 'Chiffre de Vernam ', 0, 14),
(57, 'Je ne sais pas', 2, 14),
(58, 'Décaler les lettres de l’alphabets d’un nombre n ', 1, 15),
(59, 'Remplacer des groupes de lettres par une seule lettre ', 0, 15),
(60, 'Permuter message ', 0, 15),
(61, 'Toute les propositions', 0, 15),
(62, 'Je ne sais pas', 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `examInProgress`
--

CREATE TABLE `examInProgress` (
  `examInProgressID` int(11) NOT NULL,
  `examInProgressResult` float NOT NULL,
  `examProfilID` int(11) NOT NULL,
  `questID` int(11) NOT NULL,
  `ansID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `examInProgress`
--

INSERT INTO `examInProgress` (`examInProgressID`, `examInProgressResult`, `examProfilID`, `questID`, `ansID`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 6),
(3, 1, 1, 3, 11),
(4, 1, 1, 4, 14),
(5, 1, 1, 5, 18),
(6, 1, 1, 6, 21),
(7, 1, 1, 7, 25),
(8, 1, 1, 8, 30),
(9, 1, 1, 9, 34),
(10, 1, 1, 10, 39),
(11, -0.5, 3, 11, 42),
(12, 0, 3, 12, 49),
(13, 0, 3, 13, 53),
(14, 1, 3, 14, 55),
(15, -0.5, 3, 15, 59),
(16, 1, 4, 1, 1),
(17, 1, 4, 2, 6),
(18, -0.5, 4, 3, 9),
(19, 0, 4, 4, 16),
(20, 1, 4, 5, 18),
(21, -0.5, 4, 6, 23),
(22, 1, 4, 7, 25),
(23, 1, 4, 8, 30),
(24, 0, 4, 9, 36),
(25, -0.5, 4, 10, 38);

-- --------------------------------------------------------

--
-- Structure de la table `examProfil`
--

CREATE TABLE `examProfil` (
  `examProfilID` int(11) NOT NULL,
  `examProfilStatus` int(3) NOT NULL DEFAULT '0',
  `examProfilResult` float NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL,
  `examThemeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `examProfil`
--

INSERT INTO `examProfil` (`examProfilID`, `examProfilStatus`, `examProfilResult`, `userID`, `examThemeID`) VALUES
(1, 1, 10, 2, 1),
(2, 0, 0, 2, 2),
(3, 1, 0, 3, 2),
(4, 1, 3.5, 3, 1),
(5, 2, 0, 4, 1),
(6, 0, 0, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `examTheme`
--

CREATE TABLE `examTheme` (
  `examThemeID` int(11) NOT NULL,
  `examThemeTitle` varchar(255) NOT NULL,
  `examThemeTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `examTheme`
--

INSERT INTO `examTheme` (`examThemeID`, `examThemeTitle`, `examThemeTime`) VALUES
(1, 'Réseau', 15),
(2, 'Principe de crypto', 10);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `questID` int(11) NOT NULL,
  `questTxt` text CHARACTER SET utf8 NOT NULL,
  `examThemeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`questID`, `questTxt`, `examThemeID`) VALUES
(1, 'Est-ce qu\'internet est un réseau informatique ?', 1),
(2, 'Quel est le nom des connecteurs réseau ? ', 1),
(3, 'Combien de fils peuvent etre cablés dans un câble réseau?', 1),
(4, 'Dans un cable croisé, quelles sont les paires qui croisent  ?', 1),
(5, 'Qu\'est-ce qu\'un commutateur ?', 1),
(6, 'Certains fabricants proposent de coupler 2 prises réseau 1gb/s pour profiter d\'un débit de 2Gb/s', 1),
(7, 'Peut -on relier windows, mac OS et linux sur un même réseau ?', 1),
(8, 'Pour faire communiquer 2 PC avec les IP 192.168.0.1 et 172.10.0.23, je dois utiliser', 1),
(9, 'Quel protocole utilise le port 110 ?', 1),
(10, 'Quel outil permet le partage de données entre unix et windows ?', 1),
(11, 'A quels impératifs doit répondre le chiffre de Vernam ?', 2),
(12, 'Si vous chiffrez EXAM en ROT3 vous obtenez :', 2),
(13, 'Le principe de kerchoffs émet le fait que :', 2),
(14, 'Pour quel type de chiffrement l’analyse fréquentielle de lettres est la plus utile : ', 2),
(15, 'Le principe de chiffrement par substitution monoalphabétique consiste à : ', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `userStatus` varchar(10) NOT NULL DEFAULT 'etu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`userID`, `email`, `username`, `password`, `fName`, `lName`, `userStatus`) VALUES
(1, 'prof@gmail.com', 'prof', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', 'Didier', 'VALENTIN ', 'prof'),
(2, 'maxime@gmail.com', 'maxime', '1acc295174379ec718e1123290d06dcd8d68feb6', 'Maxime', 'ALLEMEERSCH', 'etu'),
(3, 'amores@gmail.com', 'amores', 'b9acfb0278fdb04c4e1de8cf2ae6a605062d46e5', 'Miguel', 'AMORES', 'etu'),
(4, 'marina@hotmail.com', 'marina', '79b333c96ec99512a3bf72653b23c7ed8a52dc42', '', '', 'etu');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ansID`),
  ADD KEY `questID` (`questID`);

--
-- Index pour la table `examInProgress`
--
ALTER TABLE `examInProgress`
  ADD PRIMARY KEY (`examInProgressID`),
  ADD KEY `examProfilID` (`examProfilID`),
  ADD KEY `questID` (`questID`),
  ADD KEY `ansID` (`ansID`);

--
-- Index pour la table `examProfil`
--
ALTER TABLE `examProfil`
  ADD PRIMARY KEY (`examProfilID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `examThemeID` (`examThemeID`);

--
-- Index pour la table `examTheme`
--
ALTER TABLE `examTheme`
  ADD PRIMARY KEY (`examThemeID`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questID`),
  ADD KEY `examThemeID` (`examThemeID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `ansID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `examInProgress`
--
ALTER TABLE `examInProgress`
  MODIFY `examInProgressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `examProfil`
--
ALTER TABLE `examProfil`
  MODIFY `examProfilID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `examTheme`
--
ALTER TABLE `examTheme`
  MODIFY `examThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `questID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questID`) REFERENCES `question` (`questID`);

--
-- Contraintes pour la table `examInProgress`
--
ALTER TABLE `examInProgress`
  ADD CONSTRAINT `examInProgress_ibfk_1` FOREIGN KEY (`examProfilID`) REFERENCES `examProfil` (`examProfilID`),
  ADD CONSTRAINT `examInProgress_ibfk_2` FOREIGN KEY (`questID`) REFERENCES `question` (`questID`),
  ADD CONSTRAINT `examInProgress_ibfk_3` FOREIGN KEY (`ansID`) REFERENCES `answer` (`ansID`);

--
-- Contraintes pour la table `examProfil`
--
ALTER TABLE `examProfil`
  ADD CONSTRAINT `examProfil_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `examProfil_ibfk_2` FOREIGN KEY (`examThemeID`) REFERENCES `examTheme` (`examThemeID`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`examThemeID`) REFERENCES `examTheme` (`examThemeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

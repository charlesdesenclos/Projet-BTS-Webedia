-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 08 juin 2023 à 08:56
-- Version du serveur :  10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Webedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `canaux`
--

CREATE TABLE `canaux` (
  `id` int(11) NOT NULL,
  `valeur` int(255) DEFAULT NULL,
  `idscene` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `canaux`
--

INSERT INTO `canaux` (`id`, `valeur`, `idscene`) VALUES
(0, NULL, 56),
(7, 0, 1),
(9, 255, 1),
(10, 0, 1),
(11, 0, 1),
(12, 255, 1),
(13, 0, 1),
(14, 0, 1),
(15, 0, 1),
(20, 0, 1),
(21, 0, 1),
(22, 0, 1),
(23, 0, 1),
(26, 255, 1),
(27, 0, 1),
(28, 0, 1),
(29, 0, 1),
(30, 0, 1),
(31, 0, 1),
(32, 0, 1),
(33, 0, 1),
(34, 255, 1),
(35, 255, 1),
(39, 255, 1);

-- --------------------------------------------------------

--
-- Structure de la table `champs`
--

CREATE TABLE `champs` (
  `id` int(11) NOT NULL,
  `nomChamps` text NOT NULL,
  `adress` int(11) NOT NULL,
  `idCanaux` int(11) NOT NULL,
  `idModule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `champs`
--

INSERT INTO `champs` (`id`, `nomChamps`, `adress`, `idCanaux`, `idModule`) VALUES
(163, 'Champs rouge Saber 1', 1, 7, 88),
(164, 'Champs vert Saber 1', 2, 9, 88),
(165, 'Champs bleu Saber 1', 3, 10, 88),
(166, 'Champs blanc Saber 1', 4, 11, 88),
(167, 'Champs rouge Saber 2', 5, 12, 89),
(168, 'Champs vert Saber 2', 6, 13, 89),
(169, 'Champs bleu Saber 2', 7, 14, 89),
(170, 'Champs blanc Saber 2', 8, 15, 89),
(172, 'Champs rouge Saber 3', 9, 20, 90),
(173, 'Champs vert Saber 3', 10, 21, 90),
(174, 'Champs bleu Saber 3', 11, 22, 90),
(175, 'Champs blanc Saber 3', 12, 23, 90),
(176, 'Champs rouge Lampe tes', 19, 0, 91),
(177, '   Champs vert Lampe test', 20, 0, 91),
(178, '   Champs bleu Lampe test', 21, 0, 91),
(193, '   Champs blanc Lampe test', 22, 0, 91);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `positionX` int(11) NOT NULL,
  `positionY` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idScene` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `nomEquipement` text NOT NULL,
  `adress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `nomEquipement`, `adress`) VALUES
(1, 'Aucun Equipement', 512),
(88, 'Saber 1', 1),
(89, 'Saber 2', 5),
(90, 'Saber 3', 9),
(91, 'Saber test', 19);

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

CREATE TABLE `scene` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scene`
--

INSERT INTO `scene` (`id`, `nom`) VALUES
(1, 'Scène 1'),
(2, 'Scène 2'),
(3, 'Scène 3'),
(4, 'Scène 4'),
(10, 'Scène 5'),
(32, 'Scene 6'),
(33, 'Scene 7'),
(34, 'Scene 6'),
(35, 'Scene 7'),
(36, 'Scene 8'),
(37, 'Scene 9'),
(38, 'Scene 10'),
(39, 'Scene 11'),
(40, 'Scene 12'),
(41, 'Scene 13'),
(42, 'Scene 14'),
(43, 'Scene 15'),
(44, 'Scene 16'),
(45, 'Scene 17'),
(46, 'Scene 18'),
(47, 'Scene 19'),
(48, 'Scene 20'),
(49, 'Scene 21'),
(50, 'Scene 22'),
(51, 'Scene 23'),
(52, 'Scene 24'),
(56, 'Aucune Scène'),
(66, 'Scène 25'),
(67, ''),
(68, 'theo');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `identifiant` text NOT NULL,
  `password` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `identifiant`, `password`, `isAdmin`) VALUES
(1, 'Alexis', 'Alexis', 1),
(2, 'Enzo', 'Enzo', 0),
(3, 'Charles', 'Charles', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmodule` (`idscene`);

--
-- Index pour la table `champs`
--
ALTER TABLE `champs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCanaux` (`idCanaux`),
  ADD KEY `idModule` (`idModule`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idScene` (`idScene`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `scene`
--
ALTER TABLE `scene`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `canaux`
--
ALTER TABLE `canaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `champs`
--
ALTER TABLE `champs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `scene`
--
ALTER TABLE `scene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD CONSTRAINT `canaux_ibfk_2` FOREIGN KEY (`idscene`) REFERENCES `scene` (`id`);

--
-- Contraintes pour la table `champs`
--
ALTER TABLE `champs`
  ADD CONSTRAINT `champs_ibfk_1` FOREIGN KEY (`idCanaux`) REFERENCES `canaux` (`id`),
  ADD CONSTRAINT `champs_ibfk_2` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favoris_ibfk_3` FOREIGN KEY (`idScene`) REFERENCES `scene` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

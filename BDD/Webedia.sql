-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 10 mai 2023 à 11:29
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
  `valeur` int(255) NOT NULL,
  `idmodule` int(11) NOT NULL,
  `idscene` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `canaux`
--

INSERT INTO `canaux` (`id`, `valeur`, `idmodule`, `idscene`) VALUES
(7, 255, 14, 1),
(9, 0, 14, 1),
(10, 0, 14, 1),
(11, 0, 14, 1),
(12, 255, 19, 1),
(13, 0, 19, 1),
(14, 0, 19, 1),
(15, 0, 19, 1),
(20, 0, 35, 1),
(21, 255, 35, 1),
(22, 0, 35, 1),
(23, 0, 35, 1),
(26, 42, 42, 1),
(27, 255, 45, 1),
(28, 255, 45, 1),
(29, 0, 45, 1),
(30, 0, 45, 1);

-- --------------------------------------------------------

--
-- Structure de la table `champs`
--

CREATE TABLE `champs` (
  `id` int(11) NOT NULL,
  `nomChamps` text NOT NULL,
  `adress` int(11) NOT NULL,
  `idCanaux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `champs`
--

INSERT INTO `champs` (`id`, `nomChamps`, `adress`, `idCanaux`) VALUES
(3, 'Champs rouge Lampe 15', 19, 7),
(4, 'Champs vert Lampe 1', 2, 9),
(5, 'Champs Bleu Lampe 1', 3, 10),
(6, 'Lampe 1 Blanc', 4, 11),
(7, 'Lampe 2 rouge', 5, 12),
(8, 'Lampe 2 vert', 6, 13),
(9, 'Lampe 2 bleu', 7, 14),
(10, 'Lampe 2 Blanc', 8, 15),
(64, 'Champs rouge Lampe 3', 9, 20),
(65, 'Champs vert Lampe 3', 10, 21),
(66, 'Champs bleu Lampe 3', 11, 22),
(67, 'Champs blanc Lampe 3', 12, 23),
(72, 'Champs rouge Lampe test', 19, 27),
(73, 'Champs vert Lampe test', 22, 28),
(74, 'Champs blanc Lampe test', 23, 27),
(75, 'Champs bleu Lampe test', 22, 27);

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
(14, 'Lampe 15', 19),
(19, 'Lampe 2', 5),
(35, 'Lampe 3', 9),
(45, 'Lampe test', 19);

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
(11, 'Scène 6'),
(12, 'Scène 7'),
(13, 'Scène 8'),
(14, 'Scène 9');

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
(3, 'Charles', 'Charles', 1),
(4, 'Johnny', 'Sins', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmodule` (`idmodule`,`idscene`),
  ADD KEY `idscene` (`idscene`);

--
-- Index pour la table `champs`
--
ALTER TABLE `champs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCanaux` (`idCanaux`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `champs`
--
ALTER TABLE `champs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `scene`
--
ALTER TABLE `scene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  ADD CONSTRAINT `champs_ibfk_1` FOREIGN KEY (`idCanaux`) REFERENCES `canaux` (`id`);

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

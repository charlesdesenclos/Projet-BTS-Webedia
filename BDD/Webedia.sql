-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 22 mars 2023 à 10:41
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
(7, 16, 21, 2),
(8, 16, 21, 2),
(9, 19, 23, 3);

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
(3, 'Champs rouge Lampe 1', 66, 7),
(4, 'Champs vert Lampe 1', 18, 9);

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
(14, 'Lampe 2', 67),
(19, 'Lampe 3', 14),
(20, 'Lampe 4', 250),
(21, 'Lampe 5', 450),
(22, 'Lampe 6', 1),
(23, 'LAmpe 7', 11),
(24, 'Lampe 8', 512);

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
(1, 'Scène Webedia'),
(2, 'Scène 1'),
(3, 'Scène 2');

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
(1, 'Alexis', 'Alexis', 1);

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
  ADD KEY `idScene` (`idScene`),
  ADD KEY `idUser` (`idUser`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `champs`
--
ALTER TABLE `champs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD CONSTRAINT `canaux_ibfk_1` FOREIGN KEY (`idmodule`) REFERENCES `module` (`id`),
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
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`idScene`) REFERENCES `scene` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

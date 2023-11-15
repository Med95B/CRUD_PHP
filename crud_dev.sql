-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 mai 2023 à 16:36
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crud_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id_patient` int(11) NOT NULL,
  `id_specialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id_patient`, `id_specialite`) VALUES
(14, 1),
(14, 2),
(14, 3),
(15, 4),
(15, 5),
(15, 6),
(16, 6),
(16, 7),
(17, 1),
(17, 2),
(17, 3),
(19, 2),
(19, 3),
(18, 3),
(18, 4),
(18, 5);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `consulter` varchar(10) NOT NULL,
  `rendez` datetime DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  `taille_img` int(11) NOT NULL,
  `nom_img` varchar(50) NOT NULL,
  `bin_img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `nom`, `sexe`, `tel`, `consulter`, `rendez`, `img`, `taille_img`, `nom_img`, `bin_img`) VALUES
(14, 'med', 'Male', '123456789', 'oui', '2023-04-13 10:10:00', 'profil-1.avif', 9328, 'mon_fichier260423013104.jpg', 0x31),
(15, 'mohamed', 'Male', '1243788', 'oui', '2023-04-21 20:20:00', 'profil-2.avif', 6915, 'mon_fichier260423013131.jpg', 0x31),
(16, 'mohamed med', 'Male', '173717', 'oui', '2023-04-18 12:12:00', 'profil-3.avif', 6533, 'mon_fichier260423013210.jpg', 0x31),
(17, 'momo', 'Male', '11353', 'oui', '2023-04-19 10:20:00', 'profil-2.avif', 6915, 'mon_fichier260423013242.jpg', 0x31),
(18, 'mdddd', 'Female', '1243788', 'oui', '2023-04-18 13:13:00', 'profil-1.avif', 9328, 'mon_fichier260423013310.jpg', 0x31),
(19, 'mddd', 'Female', '1243788', 'oui', '2023-04-17 10:10:00', 'profil-3.avif', 6533, 'mon_fichier260423020055.jpg', 0x31);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `nom`) VALUES
(1, 'ORL'),
(2, 'Chirurgien-dentiste'),
(3, 'Médecin généraliste '),
(4, 'Pédiatre'),
(5, 'Gynécologue médical et obstétrique '),
(6, 'Ophtalmologue'),
(7, 'Dermatologue et vénérologue ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `pass`) VALUES
(1, 'mohamed', 'ADMINmohamed'),
(2, 'med', 'ADMINmed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_specialite` (`id_specialite`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id_specialite`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id_specialite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

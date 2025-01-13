-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 sep. 2024 à 23:39
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
-- Base de données : `fddei`
--

-- --------------------------------------------------------

--
-- Structure de la table `eventcategories`
--

CREATE TABLE `eventcategories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eventcategories`
--

INSERT INTO `eventcategories` (`category_id`, `category_name`) VALUES
(1, 'Prise en charge de l’usager'),
(2, 'Activités logistiques'),
(3, 'Sécurité des Personnels des Locaux et des Tiers'),
(4, 'Vigilances sanitaires'),
(5, 'Autre'),
(6, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `eventdetails`
--

CREATE TABLE `eventdetails` (
  `detail_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eventdetails`
--

INSERT INTO `eventdetails` (`detail_id`, `event_id`, `subcategory_id`, `description`) VALUES
(22, 12, 4, 'test'),
(23, 12, 12, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `other_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`event_id`, `description`, `other_details`) VALUES
(12, 'test', 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'Accueil de l’usager'),
(2, 1, 'Activités de soins'),
(3, 1, 'Dossier de l’usager'),
(4, 1, 'Problème d’identité'),
(5, 1, 'Droits de l’usager'),
(6, 1, 'Biens de l’usager'),
(7, 1, 'Chute de l’usager'),
(8, 1, 'Contention/escarre'),
(9, 1, 'Conduites suicidaires'),
(10, 1, 'SCAM/EVASION'),
(11, 1, 'Femme/enfant victime de violence'),
(12, 1, 'AVP de masse (+ 4 pers)'),
(13, 2, 'Circuit du médicament'),
(14, 2, 'Linge'),
(15, 2, 'Restaurant'),
(16, 2, 'Approvisionnements'),
(17, 2, 'Transport'),
(18, 2, 'Téléphonie/Informatique/réseau'),
(19, 2, 'Locaux'),
(20, 2, 'Perte de matériel'),
(21, 2, 'Déchets'),
(22, 3, 'Agression physique'),
(23, 3, 'Agression verbale'),
(24, 3, 'Hygiène'),
(25, 3, 'Accident d\'Exposition au Sang'),
(26, 3, 'Contamination'),
(27, 3, 'Produits toxiques'),
(28, 3, 'Gestes et postures'),
(29, 3, 'Accident de travail'),
(30, 3, 'Incendie'),
(31, 3, 'Coupures d’eau/d’électricité'),
(32, 3, 'Risque lié aux locaux'),
(33, 3, 'Risque lié aux équipements'),
(34, 3, 'Atteinte aux biens'),
(35, 3, 'Risques liés à l’atteinte à l’image de marque'),
(36, 4, 'Maladie à déclaration obligatoire'),
(37, 4, 'Infection nosocomiale'),
(38, 4, 'Déclaration des TIAC/ intoxication'),
(39, 4, 'Effets indésirables dus aux médicaments'),
(40, 4, 'Risque lié à un Dispositif Médical');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD CONSTRAINT `eventdetails_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `eventdetails_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcategory_id`);

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `eventcategories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

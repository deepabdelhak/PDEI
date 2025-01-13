-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 29 sep. 2024 à 00:24
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
-- Base de données : `medical_incident_db4`
--

-- --------------------------------------------------------

--
-- Structure de la table `eventcategories`
--

CREATE TABLE `eventcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eventcategories`
--

INSERT INTO `eventcategories` (`id`, `name`) VALUES
(1, 'ACTES ET SOINS'),
(2, 'RISQUE INFECTIEUX'),
(3, 'MEDICAMENTS'),
(4, 'MATERIELS ET DISPOSITIFS MEDICAUX'),
(5, 'EXAMENS BIOLOGIQUES'),
(6, 'EXAMENS IMAGERIE MEDICALE'),
(7, 'VIE HOSPITALIERE'),
(8, 'PRISE EN CHARGE HOTELIERE'),
(9, 'ACCIDENT / INCIDENT'),
(10, 'VOL/DISPARITION/DEGRADATION'),
(11, 'COMMUNICATIONS'),
(12, 'LOGISTIQUE');

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
(3, 5, NULL, ''),
(4, 5, NULL, ''),
(5, 5, NULL, ''),
(6, 5, NULL, ''),
(7, 5, NULL, '');

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
(5, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `incident_causes`
--

CREATE TABLE `incident_causes` (
  `id` int(11) NOT NULL,
  `category` enum('Humain','Matériel','Financier') DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `incident_causes`
--

INSERT INTO `incident_causes` (`id`, `category`, `description`) VALUES
(1, 'Humain', 'épuisement'),
(2, 'Humain', 'manque formation'),
(3, 'Humain', 'communication'),
(4, 'Humain', 'charge de travail'),
(5, 'Humain', 'posture au travail'),
(6, 'Matériel', 'maintenance'),
(7, 'Matériel', 'obsolescence'),
(8, 'Matériel', 'défaillance infrastructures'),
(9, 'Matériel', 'manipulation'),
(10, 'Matériel', 'normes de sécurité'),
(11, 'Financier', 'Flux insuffisant'),
(12, 'Financier', 'contrôles'),
(13, 'Financier', 'planification budgétaire'),
(14, 'Financier', 'changement éco/règlement inattendus'),
(15, 'Financier', 'Perte de revenus'),
(16, 'Financier', 'non-conformité aux normes');

-- --------------------------------------------------------

--
-- Structure de la table `incident_consequences`
--

CREATE TABLE `incident_consequences` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `incident_consequences`
--

INSERT INTO `incident_consequences` (`id`, `description`) VALUES
(1, 'Décès'),
(2, 'Incapacité'),
(3, 'Hospitalisation ou Prolongation'),
(4, 'Besoin d\'intervention médicochirurgicale'),
(5, 'Financier et Administratif'),
(6, 'Social');

-- --------------------------------------------------------

--
-- Structure de la table `incident_other`
--

CREATE TABLE `incident_other` (
  `id` int(11) NOT NULL,
  `incident_id` int(11) DEFAULT NULL,
  `other_description` text DEFAULT NULL,
  `accident_reported` tinyint(1) DEFAULT NULL,
  `complaint_filed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medical_incidents`
--

CREATE TABLE `medical_incidents` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_of_incident` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`) VALUES
(1, 1, 'Erreur identité usager'),
(2, 1, 'Information médicale (erreur de diagnostic)'),
(3, 1, 'Problème de recueil de consentement'),
(4, 1, 'Problème de surveillance usager'),
(5, 1, 'Découverte d\'un début d\'escarre'),
(6, 1, 'Retrait accidentel d\'un matériel invasif'),
(7, 1, 'Annulation d\'acte après induction anesthésique'),
(8, 1, 'Ré-intervention non programmée'),
(9, 1, 'Complication des actes diagnostiques'),
(10, 1, 'Complication des gestes thérapeutiques'),
(11, 1, 'Anesthésie'),
(12, 1, 'Urgence'),
(13, 1, 'Réanimation'),
(14, 1, 'Gynéco-obstétrique'),
(15, 1, 'Chirurgie'),
(16, 1, 'Médecine'),
(17, 1, 'Pédiatrie'),
(18, 1, 'Orientation usager inadaptée'),
(19, 1, 'Médecin indisponible en urgence'),
(20, 1, 'Protocole non conforme, obsolète'),
(21, 2, 'Situation épidémique'),
(22, 2, 'Malade contagieux à germe résistant non isolé'),
(23, 2, 'Malade contagieux à germe résistant non signalé'),
(24, 3, 'Prescription : absente, incomplète ou d\'origine inconnue'),
(25, 3, 'Prescription non compréhensible (lisibilité)'),
(26, 3, 'Dispensation : erreur, manque'),
(27, 3, 'Médicament périmé'),
(28, 3, 'Administration : erreur, non-respect'),
(29, 3, 'Problème de communication lors de chargement de prestataires'),
(30, 3, 'Absence de renseignements cliniques'),
(31, 3, 'Problème de délai de prise en charge'),
(32, 3, 'Irradiation intempestive'),
(33, 4, 'Matériel non adapté ou dangereux'),
(34, 4, 'Défaut de prise en charge d\'un dysfonctionnement'),
(35, 4, 'Panne'),
(36, 4, 'Fluide/vide'),
(37, 4, 'Incendie'),
(38, 5, 'Problèmes de délai de retour des résultats'),
(39, 5, 'Groupe sanguin : problème (incompatibilité)'),
(40, 5, 'Examen : non réalisé'),
(41, 6, 'Demande non conforme / incomplète'),
(42, 6, 'Absence de renseignements cliniques'),
(43, 6, 'Problème de PEC irradiation intempestive'),
(44, 6, 'Résultats éronés mauvaise qualité des clichés'),
(45, 7, 'Accueil'),
(46, 7, 'Délai d\'attente excessif pour l\'usager'),
(47, 7, 'Lit d\'hospitalisation'),
(48, 7, 'Agression / violence'),
(49, 7, 'Refus de soins opposé par l\'usager'),
(50, 7, 'Sortie contre avis médical'),
(51, 7, 'Sortie sans avis médical (fugue)'),
(52, 8, 'Repas : quantité / qualité / souhait non respect'),
(53, 9, 'Chute'),
(54, 9, 'Blessures (brûlure, coupure, piqûre)'),
(55, 9, 'Suicide ou tentative / automutilation'),
(56, 10, 'Dégradation de matériel/vandalisme'),
(57, 10, 'Inondation, incendie'),
(58, 10, 'Vol – Disparition – Perte (à préciser)'),
(59, 11, 'Déficience bip, téléphone, alarme'),
(60, 11, 'Problème informatique'),
(61, 11, 'Perte du dossier ou d\'une pièce du dossier'),
(62, 12, 'Défaut d\'approvisionnement'),
(63, 12, 'Défaut tri/évacuation/traitement/Élimination'),
(64, 12, 'Défaut stockage/archivage'),
(65, 12, 'Défaut transport');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `incident_causes`
--
ALTER TABLE `incident_causes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_consequences`
--
ALTER TABLE `incident_consequences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_other`
--
ALTER TABLE `incident_other`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incident_id` (`incident_id`);

--
-- Index pour la table `medical_incidents`
--
ALTER TABLE `medical_incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `incident_causes`
--
ALTER TABLE `incident_causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `incident_consequences`
--
ALTER TABLE `incident_consequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `incident_other`
--
ALTER TABLE `incident_other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `medical_incidents`
--
ALTER TABLE `medical_incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD CONSTRAINT `eventdetails_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `eventdetails_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Contraintes pour la table `incident_other`
--
ALTER TABLE `incident_other`
  ADD CONSTRAINT `incident_other_ibfk_1` FOREIGN KEY (`incident_id`) REFERENCES `medical_incidents` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `medical_incidents`
--
ALTER TABLE `medical_incidents`
  ADD CONSTRAINT `medical_incidents_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `eventcategories` (`id`),
  ADD CONSTRAINT `medical_incidents_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `eventcategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 oct. 2024 à 04:35
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
-- Base de données : `pro_usermanagent`
--

-- --------------------------------------------------------

--
-- Structure de la table `eventcategories`
--

CREATE TABLE `eventcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `principal_title_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eventcategories`
--

INSERT INTO `eventcategories` (`id`, `name`, `principal_title_id`) VALUES
(1, 'ACTES ET SOINS', 3),
(2, 'RISQUE INFECTIEUX', 3),
(3, 'MEDICAMENTS', 3),
(4, 'MATERIELS ET DISPOSITIFS MEDICAUX', 2),
(5, 'EXAMENS BIOLOGIQUES', 2),
(6, 'EXAMENS IMAGERIE MEDICALE', 2),
(7, 'VIE HOSPITALIERE', 1),
(8, 'PRISE EN CHARGE HOTELIERE', 1),
(9, 'ACCIDENT / INCIDENT', 1),
(10, 'VOL/DISPARITION/DEGRADATION', 1),
(11, 'COMMUNICATIONS', 1),
(12, 'LOGISTIQUE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eventcauses`
--

CREATE TABLE `eventcauses` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `cause_id` int(11) DEFAULT NULL,
  `cause_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eventconsequences`
--

CREATE TABLE `eventconsequences` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `consequence_id` int(11) DEFAULT NULL,
  `consequence_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `eventotherdetails`
--

CREATE TABLE `eventotherdetails` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `other_cause` text DEFAULT NULL,
  `other_consequence` text DEFAULT NULL,
  `declaration_accident` text DEFAULT NULL,
  `depot_plainte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eventotherdetails`
--

INSERT INTO `eventotherdetails` (`id`, `event_id`, `other_cause`, `other_consequence`, `declaration_accident`, `depot_plainte`) VALUES
(37, 70, '', '', '', ''),
(38, 71, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `professional` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `formation` set('DG','HS','HME','HMSSP','COHII') DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `declarant_name` varchar(255) NOT NULL,
  `declarant_function` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_gender` enum('M','F') DEFAULT NULL,
  `user_service` varchar(255) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `staff_service` varchar(255) DEFAULT NULL,
  `staff_function` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`event_id`, `description`, `other_details`, `event_date`, `event_time`, `end_time`, `professional`, `order_number`, `formation`, `service`, `declarant_name`, `declarant_function`, `user_name`, `user_ip`, `user_gender`, `user_service`, `staff_name`, `staff_service`, `staff_function`, `userid`) VALUES
(70, '', '', '2024-10-03', '12:12:00', '12:12:00', 'test', 'azer', 'DG', 'cardio', 'abdelhak moussi', '', 'MED HM', '12345679', 'M', 'URG', '', '', '', 124),
(71, '', '', '2024-10-10', '03:27:00', '12:33:00', 'AZE', 'AZE', 'DG', 'AZE', 'test4', 'Technicien', 'AZER', '1234', 'M', 'AZEER', '', '', '', 128);

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
-- Structure de la table `principal_title`
--

CREATE TABLE `principal_title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `principal_title`
--

INSERT INTO `principal_title` (`id`, `title`) VALUES
(1, 'ADMISSION-HOTELLERIE ET LOGISTIQUE'),
(2, 'SERVICES MEDICO-TECHNIQUE'),
(3, 'SOINS ET USAGERS');

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

-- --------------------------------------------------------

--
-- Structure de la table `tbl_app_autho`
--

CREATE TABLE `tbl_app_autho` (
  `id_autho` int(11) NOT NULL,
  `allow_email` int(11) NOT NULL DEFAULT 0,
  `fb_autho` int(11) NOT NULL DEFAULT 0,
  `tw_autho` int(11) NOT NULL DEFAULT 0,
  `gle_autho` int(11) NOT NULL DEFAULT 0,
  `git_autho` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_app_autho`
--

INSERT INTO `tbl_app_autho` (`id_autho`, `allow_email`, `fb_autho`, `tw_autho`, `gle_autho`, `git_autho`, `status`) VALUES
(143, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_app_settings`
--

CREATE TABLE `tbl_app_settings` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `front_name` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_app_settings`
--

INSERT INTO `tbl_app_settings` (`app_id`, `app_name`, `title`, `front_name`, `favicon`, `logo`) VALUES
(1, 'Platforme de déclaration des événements indésirables', 'Platforme de déclaration des événements indésirables', 'Platforme de déclaration des événements indésirables', 'app/uploads/logo/fcfe515aec9b7e3.png', 'app/uploads/logo/fcfe515aec9b7e3ab76c.png');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `perid` int(11) NOT NULL,
  `per_access` varchar(255) NOT NULL,
  `per_create` varchar(255) NOT NULL,
  `per_show` varchar(255) NOT NULL,
  `per_edit` varchar(255) NOT NULL,
  `per_delete` varchar(255) NOT NULL,
  `ban_activ_user` varchar(255) NOT NULL,
  `per_onlyUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`perid`, `per_access`, `per_create`, `per_show`, `per_edit`, `per_delete`, `ban_activ_user`, `per_onlyUser`) VALUES
(1, 'Access', 'Create', 'Show', 'Edit', 'Delete', 'Ban/Active user', 'User only');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `roledname` varchar(255) NOT NULL,
  `permission_items` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleid`, `rolename`, `roledname`, `permission_items`, `status`) VALUES
(212, 'Author', 'Nababur', 'Access,Create,Show,Edit,Delete,Ban/Active user,User only', 0),
(213, 'Admin', 'Sabuj', 'Show,Edit', 0),
(215, 'Supper Admin', 'Nababur Rahaman', 'Create,Show,Edit,Delete,Ban/Active user,User only', 0),
(217, 'Contributor', 'Sujon ahmed', 'Create,Show,Edit,Delete,Ban/Active user', 0),
(219, 'Subscriber', 'Raju abir', 'Create,Show,Edit,Delete', 0),
(221, 'Only user', 'Sabuj', 'User only,Show', 0),
(223, 'test2', 'test2', 'User only', 0),
(224, 'meryam', 'meryam', 'User only', 0),
(225, 'test3', 'test', 'Show,Edit,Ban/Active user', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `gendar` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `lastactivity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`userid`, `name`, `phone`, `address`, `information`, `email`, `city`, `country`, `password`, `profilePhoto`, `rolename`, `status`, `gendar`, `create_date`, `lastactivity`) VALUES
(103, 'Md Nababur Rahaman', '01717090233', 'Thakurgaon, Baliadangi', 'This is Nababur Rahaman', 'nababurbd@gmail.com', 'Thakurgaon', 'Bangladesh', '$2y$10$3Z8ZD74Ok4TSSoyHAp/p6Ok7EdQMq3eJKYgg9JFQcLy1j990mRDGG', 'app/uploads/userAvatar/9f785a4605.jpg', 'Author', 0, 'male', '2015-01-13 09:51:15', 0),
(124, 'abdelhak moussi', '0631561685', 'h', '', 'abdelhakmoussi61@gmail.com', 'hhhhhhhhh', 'France', '$2y$10$xLcv1mUwIwdBsTpLxFhMq.W01rljgp2MVTngldMmHpGr5eJg7zIU6', 'app/uploads/userAvatar/ce0f943b9e.jpg', 'Author', 0, 'male', '2024-07-29 06:14:19', 1),
(127, 'Meryem', '060000000', 'jerada', 'test', 'imeryem539@gmail.com', 'jerada', 'Pédiatrie', '$2y$10$HLjHUCBXCVaBsVh01JPmBO0N6Fz.LrKvA7CX3Fk2Y2Ww2o1J/9T8y', 'app/uploads/userAvatar/3cc89dd11d.jpg', 'Author', 0, 'male', '2024-10-17 01:15:50', 0),
(128, 'test4', '0602030101', 'testtest', 'azrt', 'test4@gmail.com', 'test', 'Technicien', '$2y$10$Tb9tzX1tt42J7GtW95OWfOfYTDLqzjkDSio2ry4h0X41CZqfNN/rq', 'app/uploads/userAvatar/55ed641d42.jpg', 'Author', 0, 'male', '2024-10-16 03:09:28', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_principal_title` (`principal_title_id`);

--
-- Index pour la table `eventcauses`
--
ALTER TABLE `eventcauses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `cause_id` (`cause_id`);

--
-- Index pour la table `eventconsequences`
--
ALTER TABLE `eventconsequences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `consequence_id` (`consequence_id`);

--
-- Index pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Index pour la table `eventotherdetails`
--
ALTER TABLE `eventotherdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_user_event` (`userid`);

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
-- Index pour la table `principal_title`
--
ALTER TABLE `principal_title`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `tbl_app_autho`
--
ALTER TABLE `tbl_app_autho`
  ADD PRIMARY KEY (`id_autho`);

--
-- Index pour la table `tbl_app_settings`
--
ALTER TABLE `tbl_app_settings`
  ADD PRIMARY KEY (`app_id`);

--
-- Index pour la table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`perid`);

--
-- Index pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `eventcauses`
--
ALTER TABLE `eventcauses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `eventconsequences`
--
ALTER TABLE `eventconsequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `eventotherdetails`
--
ALTER TABLE `eventotherdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
-- AUTO_INCREMENT pour la table `principal_title`
--
ALTER TABLE `principal_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `tbl_app_autho`
--
ALTER TABLE `tbl_app_autho`
  MODIFY `id_autho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT pour la table `tbl_app_settings`
--
ALTER TABLE `tbl_app_settings`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `perid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  ADD CONSTRAINT `fk_principal_title` FOREIGN KEY (`principal_title_id`) REFERENCES `principal_title` (`id`);

--
-- Contraintes pour la table `eventcauses`
--
ALTER TABLE `eventcauses`
  ADD CONSTRAINT `eventcauses_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventcauses_ibfk_2` FOREIGN KEY (`cause_id`) REFERENCES `incident_causes` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `eventconsequences`
--
ALTER TABLE `eventconsequences`
  ADD CONSTRAINT `eventconsequences_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventconsequences_ibfk_2` FOREIGN KEY (`consequence_id`) REFERENCES `incident_consequences` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD CONSTRAINT `eventdetails_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `eventdetails_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Contraintes pour la table `eventotherdetails`
--
ALTER TABLE `eventotherdetails`
  ADD CONSTRAINT `eventotherdetails_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_user_event` FOREIGN KEY (`userid`) REFERENCES `tbl_users` (`userid`) ON DELETE CASCADE;

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

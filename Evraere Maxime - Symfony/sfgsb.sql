-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 mai 2022 à 07:46
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sfgsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(99, 'Visiteur'),
(100, 'Laborantin'),
(101, 'Dirigeant'),
(102, 'Comptable');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_domaine`
--

DROP TABLE IF EXISTS `categorie_domaine`;
CREATE TABLE IF NOT EXISTS `categorie_domaine` (
  `categorie_id` int(11) NOT NULL,
  `domaine_id` int(11) NOT NULL,
  PRIMARY KEY (`categorie_id`,`domaine_id`),
  KEY `IDX_272CA46EBCF5E72D` (`categorie_id`),
  KEY `IDX_272CA46E4272FC9F` (`domaine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_domaine`
--

INSERT INTO `categorie_domaine` (`categorie_id`, `domaine_id`) VALUES
(99, 46),
(101, 45),
(101, 46),
(102, 47);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `l_utilisateur_id` char(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CFF65260E7927C74` (`email`),
  UNIQUE KEY `UNIQ_CFF6526082FAAA3D` (`l_utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `email`, `roles`, `password`, `l_utilisateur_id`) VALUES
(1, 'user1@gmail.com', '[\"ROLE_USER1\"]', '$2y$13$RSd/MP1NR45YPEOKmQM0juC0C9EI6mb/6UC8l3DhrYV/4TJPRVjFe', NULL),
(2, 'user2@gmail.com', '[\"ROLE_USER2\"]', '$2y$13$xkU5Y0JsabOGz1UeNUkhd.vr0gPEF6StkzkpCayhvHGCssyMv9rzO', NULL),
(3, 'user3@gmail.com', '[\"ROLE_USER1\", \"ROLE_USER2\"]', '$2y$13$LK8K8LqkjsjqT589Xhiv2uKB9scsXmepzxIzSYxQHJmE2MWIlm3Mm', NULL),
(10, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$eUbHpBjFUoXrz5GngLPRUOvJfYE5jbTNXh7sDxmatK61czjBGMcSi', NULL),
(11, 'matheo.dupire@gmail.com', '[]', '$2y$13$G2X0LrVJMaTsrqJjxCkI8uxTdcL4qMoEPTnVXsBaJTDubQKL1cowC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220506063932', '2022-05-06 06:39:51', 502),
('DoctrineMigrations\\Version20220513064051', '2022-05-13 06:41:07', 4036);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_domaine` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom_domaine`) VALUES
(45, 'Administratif'),
(46, 'Extérieur'),
(47, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('EN', 'Enregistré'),
('SA', 'Saisie');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

DROP TABLE IF EXISTS `fichefrais`;
CREATE TABLE IF NOT EXISTS `fichefrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` char(4) DEFAULT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unefiche` (`idUtilisateur`,`mois`) USING BTREE,
  KEY `idEtat` (`idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`id`, `idUtilisateur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
(12, 'u1', '202011', 2, '2000.00', '2022-04-07', 'EN'),
(13, 'u1', '202010', 1, '1000.00', '2022-04-12', 'EN'),
(14, 'u1', '202022', 3, '240.00', '2022-02-02', 'SA');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

DROP TABLE IF EXISTS `fraisforfait`;
CREATE TABLE IF NOT EXISTS `fraisforfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('SE', 'prix semaine', '50.00'),
('WE', 'prix week-end', '80.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

DROP TABLE IF EXISTS `lignefraisforfait`;
CREATE TABLE IF NOT EXISTS `lignefraisforfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFiche` int(11) DEFAULT NULL,
  `idFraisForfait` char(3) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idFraisForfait` (`idFraisForfait`),
  KEY `idFiche` (`idFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`id`, `idFiche`, `idFraisForfait`, `quantite`) VALUES
(9, 12, 'SE', 12),
(10, 13, 'WE', 3);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

DROP TABLE IF EXISTS `lignefraishorsforfait`;
CREATE TABLE IF NOT EXISTS `lignefraishorsforfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFiche` int(11) DEFAULT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idFiche` (`idFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idFiche`, `libelle`, `date`, `montant`) VALUES
(4, 12, 'repas gastronomique', '2022-03-10', '1000.00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `la_categorie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1D1C63B3281042B9` (`la_categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `la_categorie_id`) VALUES
('u1', 'Dicule', 'Terry', '25, rue du jambon', '25', 'Leport', '2019-10-01', 101);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_secondaire`
--

DROP TABLE IF EXISTS `utilisateur_secondaire`;
CREATE TABLE IF NOT EXISTS `utilisateur_secondaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utili_id` char(4) NOT NULL,
  `id_fiche_frais_id` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43239A8965793845` (`id_utili_id`),
  KEY `IDX_43239A89E429EA53` (`id_fiche_frais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_domaine`
--
ALTER TABLE `categorie_domaine`
  ADD CONSTRAINT `FK_272CA46E4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_272CA46EBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_CFF6526082FAAA3D` FOREIGN KEY (`l_utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `fraisforfait` (`id`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_3` FOREIGN KEY (`idFiche`) REFERENCES `fichefrais` (`id`);

--
-- Contraintes pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idFiche`) REFERENCES `fichefrais` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B3281042B9` FOREIGN KEY (`la_categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `utilisateur_secondaire`
--
ALTER TABLE `utilisateur_secondaire`
  ADD CONSTRAINT `FK_43239A8965793845` FOREIGN KEY (`id_utili_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_43239A89E429EA53` FOREIGN KEY (`id_fiche_frais_id`) REFERENCES `fichefrais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

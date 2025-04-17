-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 24 avr. 2022 à 18:40
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location_colocation_logement_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `Id_administrateur` int(11) NOT NULL,
  `Nom_utilisateur` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`Id_administrateur`, `Nom_utilisateur`, `Email`, `Mot_de_passe`, `photo`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `Id_annonce` int(11) NOT NULL,
  `Titre` varchar(150) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Logement_meublé` tinyint(1) NOT NULL,
  `Surface` decimal(10,0) NOT NULL,
  `N_chambre` int(11) NOT NULL,
  `Date_deposition` timestamp NOT NULL DEFAULT current_timestamp(),
  `N_colocation_possible` int(11) NOT NULL,
  `Photo1` varchar(150) NOT NULL,
  `Photo2` varchar(150) NOT NULL,
  `Photo3` varchar(150) NOT NULL,
  `Photo4` varchar(150) NOT NULL,
  `Photo5` varchar(150) NOT NULL,
  `Id_propriétaire` int(11) NOT NULL,
  `Description_logement` text NOT NULL,
  `Ville` varchar(20) NOT NULL,
  `Université` varchar(150) NOT NULL,
  `Pays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`Id_annonce`, `Titre`, `Adresse`, `Type`, `Prix`, `Logement_meublé`, `Surface`, `N_chambre`, `Date_deposition`, `N_colocation_possible`, `Photo1`, `Photo2`, `Photo3`, `Photo4`, `Photo5`, `Id_propriétaire`, `Description_logement`, `Ville`, `Université`, `Pays`) VALUES
(187, 'une maison a louer a ourzazat', 'rue atlas lot talhaoui nr 144gg ourzazat', 'Maison', 1500, 0, '0', 7, '2022-04-24 15:26:21', 5, '../Annonce_images/62656c1d05b960.99458842.jpg', '', '', '', '', 1, '  ', 'ourzazat', '', 'Maroc'),
(188, 'une appartement à louer à lhoceima', 'rue bn Tlha lot talhaoui nr232 ', 'Appartement', 1200, 0, '0', 0, '2022-04-24 15:27:31', 2, '../Annonce_images/62656c63529e64.64322046.jpg', '', '', '', '', 1, '  ', 'ourzazat', '', 'Maroc'),
(189, 'chambre a louer a taourirte', 'rue taourirte lot talhaoui nr 144gg ourzazat', 'Chambre', 700, 0, '0', 0, '2022-04-24 15:29:43', 0, '../Annonce_images/62656ce76612e6.56773459.jpg', '', '', '', '', 1, '  ', 'taourirte', '', 'Maroc'),
(190, 'une bureau a louer a ourzazat', 'rue atlas lot talhaoui nr 144gg ourzazat', 'Bureau', 1150, 0, '0', 0, '2022-04-24 15:31:27', 4, '../Annonce_images/62656d4f82d546.07953802.jpg', '', '', '', '', 1, '  ', 'ourzazat', '', 'Maroc');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `Id_etudiant` int(11) NOT NULL,
  `Nom_utilisateur` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Id_etudiant`, `Nom_utilisateur`, `Email`, `Mot_de_passe`, `photo`) VALUES
(1, 'hicham louissi', 'blabalbloblobli@gmail.com', 'aa', ''),
(2, 'az', 'aze', '123', ''),
(3, 'etudiant', 'etudiant@gmail.com', 'etudiant', ''),
(4, 'Hicham', 'Hicham.louissi20@ump.ac.ma', 'b', ''),
(17, 'badou_ourzazi', 'badou_ourzazi@hotmail.ma', 'jjj', ''),
(18, 'badou_ourzazi', 'badouourzazi2002@gmail.com', 'uu', ''),
(19, 'badou_ourzazi', 'badouourzazi2002@gmail.com', 'hhh', ''),
(20, 'badou ', 'badou2020@gmail.com', 'jj', ''),
(21, 'badou jad', 'badouourzazi2002@gmail.com', 'jjkk', '');

-- --------------------------------------------------------
CREATE TABLE Contrats (
    id_contrat INT PRIMARY KEY AUTO_INCREMENT,
    -- معلومات البايلور (المؤجر)
    bailleur_nom VARCHAR(100) NOT NULL,
    bailleur_Email VARCHAR(100)NOT NULL,
    -- معلومات المستأجر الرئيسي
    locataire_nom VARCHAR(100) NOT NULL,
    locataire_adresse TEXT,
    locataire_telephone VARCHAR(20),
    locataire_email VARCHAR(100),
    locataire_cne VARCHAR(20),
    locataire_code_apoge VARCHAR(20),
    nombre_personnes INT DEFAULT 1,
    
    -- معلومات الضمان
    montant_garantie DECIMAL(10,2),
    
    -- معلومات المدة
    date_debut DATE NOT NULL,
    heure_debut TIME,
    date_fin DATE NOT NULL,
    heure_fin TIME,
    
    -- معلومات الخدمات المطلوبة (يمكن تخزينها كقيم منفصلة أو كسلسلة JSON)
    besoin_eau BOOLEAN DEFAULT FALSE,
    besoin_electricite BOOLEAN DEFAULT FALSE,
    besoin_chauffage BOOLEAN DEFAULT FALSE,
    besoin_internet BOOLEAN DEFAULT FALSE,
    
    -- حقوق وواجبات المستأجر (يمكن تخزينها كقيم منفصلة أو كسلسلة JSON)
    droit_payer_loyer BOOLEAN DEFAULT FALSE,
    droit_souscrire_assurance BOOLEAN DEFAULT FALSE,
    droit_nbr_etudiant BOOLEAN DEFAULT FALSE,
    droit_respect BOOLEAN DEFAULT FALSE,
    droit_reglement_interieur BOOLEAN DEFAULT FALSE,
    droit_nettoyage_chambres BOOLEAN DEFAULT FALSE,
    droit_vie_privee BOOLEAN DEFAULT FALSE,
    droit_reparations BOOLEAN DEFAULT FALSE,
    droit_securite_chambre BOOLEAN DEFAULT FALSE,
    droit_modification_logement BOOLEAN DEFAULT FALSE,
    droit_sous_location BOOLEAN DEFAULT FALSE,
    droit_informations_problemes BOOLEAN DEFAULT FALSE,
    
   
    signature_locataire TEXT,
    signature_mandataire TEXT,
    
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_modification DATETIME ON UPDATE CURRENT_TIMESTAMP,
    statut_contrat ENUM('actif', 'expiré', 'résilié') DEFAULT 'actif'
);
--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `Id_message` int(11) NOT NULL,
  `Personne` varchar(20) NOT NULL,
  `Id_personne` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`Id_message`, `Personne`, `Id_personne`, `Email`, `Message`) VALUES
(1, 'Annonyme', 0, 'badou2020@gmail.com', 'hi'),
(2, 'Annonyme', 0, 'badouourzazi2022@gmail.com', 'heellloo'),
(3, 'Annonyme', 0, 'badouourzazi2020@gmail.com', 'hhhhhhhhhhhh'),
(4, 'Propriétaire', 1, 'badou_ourzazi@htmail.ma', 'fsdf'),
(5, 'Etudiant', 2, 'badouourzazi2022@gmail.com', 'iiiiiiiii'),
(6, 'Annonyme', 0, 'sdqf', 'fd'),
(7, 'Annonyme', 0, 'badouourzazi2022@gmail.com', 'sdflkqj'),
(8, 'Annonyme', 0, 'badouourzazi2020@gmail.com', 'eqfd'),
(9, 'Annonyme', 0, 'badouourzazi2020@gmail.com', 'eqfd'),
(10, 'Annonyme', 0, 'badou2020@gmail.com', 'fdsljkmqs'),
(11, 'Annonyme', 0, 'blabalbloblobli@gmail.com', 'qdslfkjmdlfj'),
(12, 'Annonyme', 0, 'badouourzazi2002@gmail.com', 'qzfeqsdf'),
(13, 'Annonyme', 0, 'badouourzazi2022@gmail.com', 'fdqjslkfdj'),
(14, 'Annonyme', 0, 'badou2020@gmail.com', 'qfsdfsqfsqd'),
(15, 'Annonyme', 0, 'badouourzazi2022@gmail.com', 'qsdfsfdq'),
(16, 'Annonyme', 0, 'badouja', 'dsqljkfkfds');

-- --------------------------------------------------------

--
-- Structure de la table `propriétaire`
--

CREATE TABLE `propriétaire` (
  `Id_propriétaire` int(11) NOT NULL,
  `Nom_utilisateur` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Telephone` varchar(13) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `propriétaire`
--

INSERT INTO `propriétaire` (`Id_propriétaire`, `Nom_utilisateur`, `Email`, `ville`, `Gmail`, `Telephone`, `Mot_de_passe`, `photo`) VALUES
(1, 'ourzazi', 'badou', 'ourzazat', 'badouourzazi2020@gmail.com', '0611241065', 'h', ''),
(65, 'badou ourzazi', 'badou ourzazi', 'ourzazat', 'badouourzazi2020@gmail.com', '0611241065', 'a', ''),
(66, 'badou', 'badouourzazi2020@gmail.com', 'ourzazat', 'badouourzazi2020@gmail.com', '0611241065', 'i', ''),
(70, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(71, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(72, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(73, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(74, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(75, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(76, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(77, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(78, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(79, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(80, 'g', 'g', 'g', 'g', 'g', 'g', ''),
(81, 'w', 'w', 'w', 'w', 'w', 'ww', ''),
(82, 'w', 'w', 'w', 'w', 'w', 'ww', ''),
(83, 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`Id_administrateur`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`Id_annonce`),
  ADD KEY `Id_propriétaire_fk` (`Id_propriétaire`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Id_etudiant`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id_message`);

--
-- Index pour la table `propriétaire`
--
ALTER TABLE `propriétaire`
  ADD PRIMARY KEY (`Id_propriétaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `Id_administrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `Id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `Id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `propriétaire`
--
ALTER TABLE `propriétaire`
  MODIFY `Id_propriétaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 22, 2020 at 12:36 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ProjetWeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `idArticle` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `imageurl` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `authorLink` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`idArticle`, `title`, `author`, `content`, `imageurl`, `date`, `authorLink`) VALUES
(1, 'Anim officia occaecat ', 'proident fugiat', 'Anim officia occaecat cupidatat proident fugiat aliquip velit.\r\nEt incididunt nulla exercitation amet quis excepteur mollit do ad amet pariatur veniam nulla. Reprehenderit eiusmod sit irure labore voluptate non. Minim ea quis est sint sunt. Magna eiusmod voluptate Lorem pariatur consequat voluptate labore.\r\n\r\nIpsum dolore incididunt consectetur officia ad. Culpa ullamco deserunt dolore ipsum eiusmod reprehenderit et aliquip nostrud sit ipsum anim consectetur officia. Fugiat dolore adipisicing deserunt culpa irure incididunt cillum proident. Non veniam voluptate enim culpa reprehenderit sunt voluptate esse aliqua nostrud aliquip sint esse.\r\n\r\nProident aute ipsum non ullamco deserunt sunt magna sint eiusmod culpa est elit. Eu veniam reprehenderit elit ullamco elit veniam nostrud nostrud duis ut consectetur non nulla pariatur. Deserunt ex amet anim in commodo non pariatur id reprehenderit Lorem proident nulla mollit.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSwg34wF9BH_Ipu0YkjRpPJ0YfYd0CTwSXzFnuNWXlwrZ72WgMI', '2020-01-02', 'https://github.com/yaacine');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(260) NOT NULL,
  `wilaya` varchar(30) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`idClient`, `nom`, `prenom`, `email`, `password`, `wilaya`, `commune`, `adresse`, `telephone`, `fax`) VALUES
(1, 'Benouadah', 'Benouadah', 'email@gmail.com', 'pswrd1234', 'Tizi-Ouzou', 'Es-Senia', '05 Rue des martyrs', '021 56 25 70', '021 56 30 50'),
(3, 'Brahimi', 'Leila', 'email@gmail.com', 'pswrd1234', 'Sétif', 'El-Eulma', '50 Rue de la liberté', ' 021 56 25 70', ' 021 56 30 50 / 56 51 54'),
(5, 'Aider', 'Said', 'email@gmail.com', 'paswrd1234', 'Blida', 'Soûmaa', ' 50 Rue de la gare', '021 56 25 70', ' 021 56 30 50 / 56 51 54'),
(6, 'Boumaaza', 'Samir', 'email@gmail.com', 'paswrd1234', 'Alger', 'Rouiba', ' 50 Rue des Dunes', '021 56 25 70', ' 021 56 30 50 / 56 51 54'),
(7, 'Bendaoud', 'Fatiha', 'email@gmail.com', 'paswrd1234', 'Bechar', 'Saoura', '50 Rue des oliviers.', '021 56 25 70', ' 021 56 30 50 / 56 51 54'),
(8, 'yacine', NULL, 'gy', 'az', NULL, NULL, NULL, NULL, NULL),
(9, 'hamid', NULL, '123', '1234', NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'yacine@email.com', 'ycine', NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, '$email', '$password', NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, 'flumslkmkhsqmkdfjkmhj@j.d', 'fsjfkmsjflmskjdf', NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 'ali@gmail.com', 'flutter', NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, 'allo@flutter.com', 'flutter', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `client_id` int(11) NOT NULL,
  `Traducteur_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DemandeDevis`
--

CREATE TABLE `DemandeDevis` (
  `idDemandeDevis` int(11) NOT NULL,
  `cleint_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` double DEFAULT NULL,
  `fileLink` varchar(300) NOT NULL,
  `langueSource_id` int(11) NOT NULL,
  `langueDestination_id` int(11) NOT NULL,
  `typeTraduction` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DemandeDevis`
--

INSERT INTO `DemandeDevis` (`idDemandeDevis`, `cleint_id`, `traducteur_id`, `date`, `montant`, `fileLink`, `langueSource_id`, `langueDestination_id`, `typeTraduction`, `nom`, `prenom`, `telephone`, `adresse`, `status`) VALUES
(2, 1, 1, '2020-01-22', NULL, '.$file.', 2, 1, '.$typeTrad.', '.$nom.', '.$prenom.', '.$telephone.', '. $adresse .', '.$status .'),
(3, 8, 3, '2020-01-22', NULL, '', 11, 1, 'on', 'rojetWedex.php', 'rojetWeindex.php', '', 'rojetWedex.php', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `DemandeRecrutement`
--

CREATE TABLE `DemandeRecrutement` (
  `idDemandeRecrutemet` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DemandeTraduction`
--

CREATE TABLE `DemandeTraduction` (
  `idDemandeTrad` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Langue`
--

CREATE TABLE `Langue` (
  `idLangue` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Langue`
--

INSERT INTO `Langue` (`idLangue`, `designation`) VALUES
(8, 'Anglais'),
(1, 'Arabe'),
(10, 'Chinois'),
(11, 'Espagnol'),
(2, 'Français'),
(9, 'Turque');

-- --------------------------------------------------------

--
-- Table structure for table `LangueDevis`
--

CREATE TABLE `LangueDevis` (
  `demandeDevis_is` int(11) NOT NULL,
  `langueDestination_id` int(11) NOT NULL,
  `langueSource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LangueTraduction`
--

CREATE TABLE `LangueTraduction` (
  `traduction_id` int(11) NOT NULL,
  `langueDestination_id` int(11) NOT NULL,
  `langueSource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MaitriseLangue`
--

CREATE TABLE `MaitriseLangue` (
  `traducteur_id` int(11) NOT NULL,
  `langue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MaitriseLangue`
--

INSERT INTO `MaitriseLangue` (`traducteur_id`, `langue_id`) VALUES
(1, 1),
(1, 2),
(5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Note`
--

CREATE TABLE `Note` (
  `client_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Note`
--

INSERT INTO `Note` (`client_id`, `traducteur_id`, `date`, `note`) VALUES
(3, 5, '2020-01-08', 5),
(5, 1, '2020-01-01', 4),
(7, 1, '2020-01-02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Payement`
--

CREATE TABLE `Payement` (
  `idPayement` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `traduction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ReponseDevis`
--

CREATE TABLE `ReponseDevis` (
  `idReponseDevis` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `demandeDevis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Signale`
--

CREATE TABLE `Signale` (
  `client_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `motif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Traducteur`
--

CREATE TABLE `Traducteur` (
  `idTraducteur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `wilaya` varchar(30) NOT NULL,
  `commune` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `assermente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Traducteur`
--

INSERT INTO `Traducteur` (`idTraducteur`, `nom`, `prenom`, `email`, `password`, `wilaya`, `commune`, `adresse`, `telephone`, `fax`, `assermente`) VALUES
(1, 'Belhadj', 'Said', 'email@gmail.com', 'pswrd1234', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', '031 56 30 50', 0),
(2, 'Belhadji', 'Yacine', 'email@gmail.com', 'pswrd1234', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', '031 56 30 50', 0),
(3, 'Helali', 'Karim', 'email@gmail.com', 'pswrd1234', 'Boumerdes', 'Boumerdes-centre', '3500 Rue de la liberté', '031 56 25 70', '031 56 30 50', 0),
(4, 'Bouroubi', 'Taous', 'email@gmail.com', 'pswrd1234', 'Alger', 'Oued Smar', '68 rue de la gare', '031 56 25 70', '031 56 30 50', 0),
(5, 'Sebaa', 'Djamila', 'email@gmail.com', 'pswrd1234', 'El-Oued', 'Djamaa', '30 Rue des dunes', '031 56 25 70', '031 56 30 50', 0),
(6, 'Hazi', 'Farouk', 'emailyacine@gmail.com', 'pswrd1234', 'Tizi-ouzou', 'Freha', '10 Rue des oliviers', '031 56 25 70', '031 56 30 50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Traduction`
--

CREATE TABLE `Traduction` (
  `idTraduction` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `demandeTraduction_id` int(11) NOT NULL,
  `payement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`idArticle`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`client_id`,`Traducteur_id`,`date`),
  ADD KEY `Traducteur_id` (`Traducteur_id`);

--
-- Indexes for table `DemandeDevis`
--
ALTER TABLE `DemandeDevis`
  ADD PRIMARY KEY (`idDemandeDevis`),
  ADD KEY `demandedevis_ibfk_1` (`cleint_id`),
  ADD KEY `traducteur_id` (`traducteur_id`),
  ADD KEY `langueDestination_id` (`langueDestination_id`),
  ADD KEY `langueSource_id` (`langueSource_id`);

--
-- Indexes for table `DemandeRecrutement`
--
ALTER TABLE `DemandeRecrutement`
  ADD PRIMARY KEY (`idDemandeRecrutemet`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `DemandeTraduction`
--
ALTER TABLE `DemandeTraduction`
  ADD PRIMARY KEY (`idDemandeTrad`),
  ADD KEY `demandetraduction_ibfk_1` (`client_id`),
  ADD KEY `traducteur_id` (`traducteur_id`);

--
-- Indexes for table `Langue`
--
ALTER TABLE `Langue`
  ADD PRIMARY KEY (`idLangue`),
  ADD UNIQUE KEY `designation` (`designation`);

--
-- Indexes for table `LangueDevis`
--
ALTER TABLE `LangueDevis`
  ADD PRIMARY KEY (`demandeDevis_is`,`langueDestination_id`),
  ADD KEY `langueDestination_id` (`langueDestination_id`),
  ADD KEY `langueSource_id` (`langueSource_id`);

--
-- Indexes for table `LangueTraduction`
--
ALTER TABLE `LangueTraduction`
  ADD PRIMARY KEY (`traduction_id`,`langueDestination_id`,`langueSource_id`),
  ADD KEY `langueDestination_id` (`langueDestination_id`),
  ADD KEY `langueSource_id` (`langueSource_id`);

--
-- Indexes for table `MaitriseLangue`
--
ALTER TABLE `MaitriseLangue`
  ADD PRIMARY KEY (`traducteur_id`,`langue_id`),
  ADD KEY `maitriselangue_ibfk_1` (`langue_id`);

--
-- Indexes for table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`client_id`,`traducteur_id`,`date`),
  ADD KEY `traducteur_id` (`traducteur_id`);

--
-- Indexes for table `Payement`
--
ALTER TABLE `Payement`
  ADD PRIMARY KEY (`idPayement`),
  ADD KEY `traduction_id` (`traduction_id`);

--
-- Indexes for table `ReponseDevis`
--
ALTER TABLE `ReponseDevis`
  ADD PRIMARY KEY (`idReponseDevis`),
  ADD KEY `reponsedevis_ibfk_1` (`demandeDevis_id`);

--
-- Indexes for table `Signale`
--
ALTER TABLE `Signale`
  ADD PRIMARY KEY (`client_id`,`traducteur_id`,`date`),
  ADD KEY `traducteur_id` (`traducteur_id`);

--
-- Indexes for table `Traducteur`
--
ALTER TABLE `Traducteur`
  ADD PRIMARY KEY (`idTraducteur`);

--
-- Indexes for table `Traduction`
--
ALTER TABLE `Traduction`
  ADD PRIMARY KEY (`idTraduction`),
  ADD KEY `payement_id` (`payement_id`),
  ADD KEY `demandeTraduction_id` (`demandeTraduction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `DemandeDevis`
--
ALTER TABLE `DemandeDevis`
  MODIFY `idDemandeDevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `DemandeRecrutement`
--
ALTER TABLE `DemandeRecrutement`
  MODIFY `idDemandeRecrutemet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DemandeTraduction`
--
ALTER TABLE `DemandeTraduction`
  MODIFY `idDemandeTrad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Langue`
--
ALTER TABLE `Langue`
  MODIFY `idLangue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Payement`
--
ALTER TABLE `Payement`
  MODIFY `idPayement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ReponseDevis`
--
ALTER TABLE `ReponseDevis`
  MODIFY `idReponseDevis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Traducteur`
--
ALTER TABLE `Traducteur`
  MODIFY `idTraducteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Traduction`
--
ALTER TABLE `Traduction`
  MODIFY `idTraduction` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`Traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`);

--
-- Constraints for table `DemandeDevis`
--
ALTER TABLE `DemandeDevis`
  ADD CONSTRAINT `demandedevis_ibfk_1` FOREIGN KEY (`cleint_id`) REFERENCES `Client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandedevis_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandedevis_ibfk_3` FOREIGN KEY (`langueDestination_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandedevis_ibfk_4` FOREIGN KEY (`langueSource_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DemandeRecrutement`
--
ALTER TABLE `DemandeRecrutement`
  ADD CONSTRAINT `demanderecrutement_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`idClient`);

--
-- Constraints for table `DemandeTraduction`
--
ALTER TABLE `DemandeTraduction`
  ADD CONSTRAINT `demandetraduction_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandetraduction_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `LangueDevis`
--
ALTER TABLE `LangueDevis`
  ADD CONSTRAINT `languedevis_ibfk_1` FOREIGN KEY (`langueDestination_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `languedevis_ibfk_2` FOREIGN KEY (`langueSource_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `LangueTraduction`
--
ALTER TABLE `LangueTraduction`
  ADD CONSTRAINT `languetraduction_ibfk_1` FOREIGN KEY (`langueDestination_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `languetraduction_ibfk_2` FOREIGN KEY (`langueSource_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `MaitriseLangue`
--
ALTER TABLE `MaitriseLangue`
  ADD CONSTRAINT `maitriselangue_ibfk_1` FOREIGN KEY (`langue_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maitriselangue_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payement`
--
ALTER TABLE `Payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`traduction_id`) REFERENCES `Traduction` (`idTraduction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ReponseDevis`
--
ALTER TABLE `ReponseDevis`
  ADD CONSTRAINT `reponsedevis_ibfk_1` FOREIGN KEY (`demandeDevis_id`) REFERENCES `DemandeDevis` (`idDemandeDevis`) ON DELETE CASCADE;

--
-- Constraints for table `Signale`
--
ALTER TABLE `Signale`
  ADD CONSTRAINT `signale_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`idClient`),
  ADD CONSTRAINT `signale_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`);

--
-- Constraints for table `Traduction`
--
ALTER TABLE `Traduction`
  ADD CONSTRAINT `traduction_ibfk_1` FOREIGN KEY (`payement_id`) REFERENCES `Payement` (`idPayement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traduction_ibfk_2` FOREIGN KEY (`demandeTraduction_id`) REFERENCES `DemandeTraduction` (`idDemandeTrad`);

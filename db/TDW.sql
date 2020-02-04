-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 30, 2020 at 10:40 PM
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
(1, 'Anim officia occaecat ', 'proident fugiat', 'Anim officia occaecat cupidatat proident fugiat aliquip velit.\r\nEt incididunt nulla exercitation amet quis excepteur mollit do ad amet pariatur veniam nulla. Reprehenderit eiusmod sit irure labore voluptate non. Minim ea quis est sint sunt. Magna eiusmod voluptate Lorem pariatur consequat voluptate labore.\r\n\r\nIpsum dolore incididunt consectetur officia ad. Culpa ullamco deserunt dolore ipsum eiusmod reprehenderit et aliquip nostrud sit ipsum anim consectetur officia. Fugiat dolore adipisicing deserunt culpa irure incididunt cillum proident. Non veniam voluptate enim culpa reprehenderit sunt voluptate esse aliqua nostrud aliquip sint esse.\r\n\r\nProident aute ipsum non ullamco deserunt sunt magna sint eiusmod culpa est elit. Eu veniam reprehenderit elit ullamco elit veniam nostrud nostrud duis ut consectetur non nulla pariatur. Deserunt ex amet anim in commodo non pariatur id reprehenderit Lorem proident nulla mollit.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSwg34wF9BH_Ipu0YkjRpPJ0YfYd0CTwSXzFnuNWXlwrZ72WgMI', '2020-01-02', 'https://github.com/yaacine'),
(2, 'Anim officia occaecat ', 'proident fugiat', 'Anim officia occaecat cupidatat proident fugiat aliquip velit.\r\nEt incididunt nulla exercitation amet quis excepteur mollit do ad amet pariatur veniam nulla. Reprehenderit eiusmod sit irure labore voluptate non. Minim ea quis est sint sunt. Magna eiusmod voluptate Lorem pariatur consequat voluptate labore.\r\n\r\nIpsum dolore incididunt consectetur officia ad. Culpa ullamco deserunt dolore ipsum eiusmod reprehenderit et aliquip nostrud sit ipsum anim consectetur officia. Fugiat dolore adipisicing deserunt culpa irure incididunt cillum proident. Non veniam voluptate enim culpa reprehenderit sunt voluptate esse aliqua nostrud aliquip sint esse.\r\n\r\nProident aute ipsum non ullamco deserunt sunt magna sint eiusmod culpa est elit. Eu veniam reprehenderit elit ullamco elit veniam nostrud nostrud duis ut consectetur non nulla pariatur. Deserunt ex amet anim in commodo non pariatur id reprehenderit Lorem proident nulla mollit.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSwg34wF9BH_Ipu0YkjRpPJ0YfYd0CTwSXzFnuNWXlwrZ72WgMI', '2020-01-02', 'https://github.com/yaacine'),
(3, 'Anim officia occaecat ', 'proident fugiat', 'Anim officia occaecat cupidatat proident fugiat aliquip velit.\r\nEt incididunt nulla exercitation amet quis excepteur mollit do ad amet pariatur veniam nulla. Reprehenderit eiusmod sit irure labore voluptate non. Minim ea quis est sint sunt. Magna eiusmod voluptate Lorem pariatur consequat voluptate labore.\r\n\r\nIpsum dolore incididunt consectetur officia ad. Culpa ullamco deserunt dolore ipsum eiusmod reprehenderit et aliquip nostrud sit ipsum anim consectetur officia. Fugiat dolore adipisicing deserunt culpa irure incididunt cillum proident. Non veniam voluptate enim culpa reprehenderit sunt voluptate esse aliqua nostrud aliquip sint esse.\r\n\r\nProident aute ipsum non ullamco deserunt sunt magna sint eiusmod culpa est elit. Eu veniam reprehenderit elit ullamco elit veniam nostrud nostrud duis ut consectetur non nulla pariatur. Deserunt ex amet anim in commodo non pariatur id reprehenderit Lorem proident nulla mollit.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSwg34wF9BH_Ipu0YkjRpPJ0YfYd0CTwSXzFnuNWXlwrZ72WgMI', '2020-01-02', 'https://github.com/yaacine');

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
  `fax` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`idClient`, `nom`, `prenom`, `email`, `password`, `wilaya`, `commune`, `adresse`, `telephone`, `fax`, `status`) VALUES
(1, 'Benouadah', 'Benouadah', 'email@gmail.com', 'pswrd1234', 'Tizi-Ouzou', 'Es-Senia', '05 Rue des martyrs', '021 56 25 70', '021 56 30 50', 'active'),
(3, 'Brahimi', 'Leila', 'email@gmail.com', 'pswrd1234', 'Sétif', 'El-Eulma', '50 Rue de la liberté', ' 021 56 25 70', ' 021 56 30 50 / 56 51 54', 'active'),
(5, 'Aider', 'Said', 'email@gmail.com', 'paswrd1234', 'Blida', 'Soûmaa', ' 50 Rue de la gare', '021 56 25 70', ' 021 56 30 50 / 56 51 54', 'active'),
(6, 'Boumaaza', 'Samir', 'email@gmail.com', 'paswrd1234', 'Alger', 'Rouiba', ' 50 Rue des Dunes', '021 56 25 70', ' 021 56 30 50 / 56 51 54', 'active'),
(7, 'Bendaoud', 'Fatiha', 'email@gmail.com', 'paswrd1234', 'Bechar', 'Saoura', '50 Rue des oliviers.', '021 56 25 70', ' 021 56 30 50 / 56 51 54', 'active'),
(8, 'yacine', NULL, 'gy', 'az', NULL, NULL, NULL, NULL, NULL, 'active'),
(9, 'hamid', NULL, '123', '1234', NULL, NULL, NULL, NULL, NULL, 'active'),
(10, NULL, NULL, 'yacine@email.com', 'ycine', NULL, NULL, NULL, NULL, NULL, 'active'),
(11, NULL, NULL, '$email', '$password', NULL, NULL, NULL, NULL, NULL, 'active'),
(25, NULL, NULL, 'flumslkmkhsqmkdfjkmhj@j.d', 'fsjfkmsjflmskjdf', NULL, NULL, NULL, NULL, NULL, 'active'),
(26, NULL, NULL, 'ali@gmail.com', 'flutter', NULL, NULL, NULL, NULL, NULL, 'active'),
(27, NULL, NULL, 'allo@flutter.com', 'flutter', NULL, NULL, NULL, NULL, NULL, 'active');

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
  `client_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` double DEFAULT NULL,
  `fileLink` varchar(300) DEFAULT NULL,
  `langueSource_id` int(11) NOT NULL,
  `langueDestination_id` int(11) NOT NULL,
  `typeTraduction` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `commentaire` text,
  `responseCommentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DemandeDevis`
--

INSERT INTO `DemandeDevis` (`idDemandeDevis`, `client_id`, `traducteur_id`, `date`, `montant`, `fileLink`, `langueSource_id`, `langueDestination_id`, `typeTraduction`, `nom`, `prenom`, `telephone`, `adresse`, `status`, `commentaire`, `responseCommentaire`) VALUES
(2, 1, 1, '2020-01-22 00:00:00', NULL, '.$file.', 2, 1, '.$typeTrad.', '.$nom.', '.$prenom.', '.$telephone.', '. $adresse .', 'ouverte', 'Quis cupidatat sunt sint incididunt pariatur quis esse magna exercitation dolore. Incididunt cillum labore sunt aute mollit quis voluptate veniam labore officia cupidatat quis veniam nisi. Ea amet anim ullamco elit incididunt cupidatat. Laborum ipsum id esse mollit anim Lorem pariatur dolore mollit esse eiusmod esse. Quis pariatur anim dolor ullamco aliquip irure ipsum. Non mollit in magna esse. Aute in elit mollit do ut nulla id nisi aliquip eu.\r\n', ''),
(3, 8, 3, '2020-01-22 00:00:00', NULL, '', 11, 1, 'on', 'rojetWedex.php', 'rojetWeindex.php', '', 'rojetWedex.php', 'ouverte', 'SELECT tab1.* , tab2.designation lngSrc , tab3.designation lngDest FROM ((SELECT d.*, t.nom nomTrad, t.prenom prenomTrad , t.idTraducteur FROM DemandeDevis d JOIN Traducteur t on d.traducteur_id= t.idTraducteur WHERE cleint_id =1 order by date DESC) tab1 join Langue tab2 on tab1.langueSource_id = tab2.idLangue) JOIN Langue tab3 on tab1.langueDestination_id=tab3.idLangue', ''),
(4, 8, 1, '2020-01-22 00:00:00', 12222, 'uploads/01:54:23pmmyWorks.pdf', 1, 1, 'on', '1sdfs', 'yacin', '08976543', 'sqlmkfjsmlfjklsmkdfjs lmskjfmlsdfj', 'soumise pour traduction', 'mon comment les gars', 'flutergdfdqf'),
(5, 8, 1, '2020-01-22 00:00:00', 4444, 'uploads/02:01:02pmmyWorks.pdf', 1, 1, 'on', '1sdfs', 'yacin', '08976543', 'sqlmkfjsmlfjklsmkdfjs lmskjfmlsdfj', 'soumise pour traduction', '', ''),
(6, 8, 1, '2020-01-22 15:06:01', NULL, 'uploads/02:05:44pmmyWorks.pdf', 1, 1, 'on', '1sdfs', 'yacin', '08976543', 'sqlmkfjsmlfjklsmkdfjs lmskjfmlsdfj', 'archivée', '', ''),
(7, 8, 1, '2020-01-22 15:10:42', 123333, 'uploads/02:10:23pmmyWorks.pdf', 1, 1, 'on', '1sdfs', 'yacin', '08976543', 'sqlmkfjsmlfjklsmkdfjs lmskjfmlsdfj', 'soumise pour traduction', '', 'flutter run'),
(8, 1, 3, '2020-01-22 18:54:13', NULL, 'uploads/05:54:13pm', 11, 1, 'on', '', '', '', '', 'open', '', ''),
(9, 8, 5, '2020-01-22 18:54:13', NULL, 'uploads/05:54:13pm', 11, 1, 'on', '', '', '', '', 'open', '', ''),
(10, 8, 3, '2020-01-08 14:28:11', NULL, NULL, 1, 2, 'scientifique', 'yacine', 'hamod', '0762336564', 'fdfggdsdf sdfsfs', 'ouverte', 'fluteksjhjskljdhf skjhfskj mlskdjf smlkfjq mlskdjf mlsqkfjslkjlmj', ''),
(11, 8, 3, '2020-01-08 14:28:11', NULL, NULL, 1, 2, 'scientifique', 'yacine', 'hamod', '0762336564', 'fdfggdsdf sdfsfs', 'ouverte', 'fluteksjhjskljdhf skjhfskj mlskdjf smlkfjq mlskdjf mlsqkfjslkjlmj', ''),
(13, 8, 3, '2020-01-08 14:28:11', NULL, NULL, 1, 1, 'scientifique', 'yacine', 'hamod', '0762336564', 'fdfggdsdf sdfsfs', 'ouverte', 'fluteksjhjskljdhf skjhfskj mlskdjf smlkfjq mlskdjf mlsqkfjslkjlmj', ''),
(14, 8, 1, '2020-01-29 13:42:23', NULL, 'uploads/results/12:42:23pmAALLoC_en_Student(1).pdf', 8, 11, 'on', 'yacien', 'Zidelmal', '03485213402', 'fsdjfslkj  lksdfjmlk jdsf lmkj ', 'ouverte', NULL, NULL),
(15, 8, 2, '2020-01-29 13:42:23', NULL, 'uploads/results/12:42:23pmAALLoC_en_Student(1).pdf', 8, 11, 'on', 'yacien', 'Zidelmal', '03485213402', 'fsdjfslkj  lksdfjmlk jdsf lmkj ', 'ouverte', NULL, NULL),
(16, 8, 3, '2020-01-29 13:42:23', NULL, 'uploads/results/12:42:23pmAALLoC_en_Student(1).pdf', 8, 11, 'on', 'yacien', 'Zidelmal', '03485213402', 'fsdjfslkj  lksdfjmlk jdsf lmkj ', 'archivée', NULL, NULL);

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
  `date` datetime NOT NULL,
  `montant` double DEFAULT NULL,
  `traducteur_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `fileLink` varchar(200) DEFAULT NULL,
  `resultFileLink` varchar(200) DEFAULT NULL,
  `langueSource_id` int(11) DEFAULT NULL,
  `langueDestination_id` int(11) DEFAULT NULL,
  `typeTraduction` varchar(30) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `commentaire` text,
  `responseCommentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DemandeTraduction`
--

INSERT INTO `DemandeTraduction` (`idDemandeTrad`, `date`, `montant`, `traducteur_id`, `client_id`, `fileLink`, `resultFileLink`, `langueSource_id`, `langueDestination_id`, `typeTraduction`, `nom`, `prenom`, `telephone`, `adresse`, `status`, `commentaire`, `responseCommentaire`) VALUES
(1, '2020-01-14 06:13:34', 2000, 1, 8, 'sdf', 'sfsdf', 1, 2, 'scientifique', 'zidelmal', 'hamid', '0987654321', 'sqmlkfjlsmkfj mlksjf lk fslk j', 'terminée', 'sjflmksjd mlkj msldkfj smlfkj sljksqmlf jmkljsdcxn;,n;,xn;vbiruroizaupiu ', NULL),
(2, '2020-01-14 06:13:34', 2000, 2, 8, 'sdf', 'sfsdf', 1, 2, 'scientifique', 'zidelmal', 'hamid', '0987654321', 'sqmlkfjlsmkfj mlksjf lk fslk j', 'archivée', 'sjflmksjd mlkj msldkfj smlfkj sljksqmlf jmkljsdcxn;,n;,xn;vbiruroizaupiu ', NULL),
(3, '2020-01-14 06:13:34', 2000, 3, 8, 'sdf', 'sfsdf', 1, 2, 'scientifique', 'zidelmal', 'hamid', '0987654321', 'sqmlkfjlsmkfj mlksjf lk fslk j', 'achevée', 'sjflmksjd mlkj msldkfj smlfkj sljksqmlf jmkljsdcxn;,n;,xn;vbiruroizaupiu ', NULL),
(4, '2020-01-01 08:14:24', 10, 3, 9, NULL, '', 1, 11, 'scientifique', 'zidelmal', 'ouiza', '09876435', 'sflmkjsqlmkj mslqkfj mslk jmlkjml', 'en attente', 'lqskmfj mljoieruezpiy sbhkjsdlkcxjmkjwicusifdy s josdifuz aopo zeupoiu', NULL),
(5, '2020-01-01 08:14:24', 10, 3, 9, NULL, '', 1, 8, 'scientifique', 'zidelmal', 'ouiza', '09876435', 'sflmkjsqlmkj mslqkfj mslk jmlkjml', 'en attente', 'lqskmfj mljoieruezpiy sbhkjsdlkcxjmkjwicusifdy s josdifuz aopo zeupoiu', NULL),
(6, '2020-01-01 08:14:24', 10, 3, 9, NULL, '', 1, 1, 'scientifique', 'zidelmal', 'ouiza', '09876435', 'sflmkjsqlmkj mslqkfj mslk jmlkjml', 'en attente', 'lqskmfj mljoieruezpiy sbhkjsdlkcxjmkjwicusifdy s josdifuz aopo zeupoiu', NULL),
(8, '2020-01-26 23:38:28', NULL, 1, 8, 'uploads/01:40:11pmEssayForm_Internship_2019.pdf', 'uploads/results/11:46:15pmEssayForm_Internship_2019.pdf', 1, 1, 'on', '1sdfs', 'yacin', '08976543', 'sqlmkfjsmlfjklsmkdfjs lmskjfmlsdfj', 'Validation du Payement', NULL, NULL);

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
(2, 'Français');

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
  `idNote` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `note` int(11) NOT NULL,
  `idDemandeTraduction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Note`
--

INSERT INTO `Note` (`idNote`, `client_id`, `traducteur_id`, `date`, `note`, `idDemandeTraduction`) VALUES
(0, 3, 5, '2020-01-08 00:00:00', 5, NULL),
(0, 5, 1, '2020-01-01 00:00:00', 4, NULL),
(0, 7, 1, '2020-01-02 00:00:00', 2, NULL),
(0, 8, 3, '2020-01-28 00:00:00', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Payement`
--

CREATE TABLE `Payement` (
  `idPayement` int(11) NOT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `traduction_id` int(11) DEFAULT NULL,
  `payementFile` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Payement`
--

INSERT INTO `Payement` (`idPayement`, `etat`, `date`, `traduction_id`, `payementFile`) VALUES
(1, 'non-valide', '2020-01-29', 8, 'uploads/payements/12:10:36amScreenShot2020-01-01at8.43.45PM.png');

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
  `assermente` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Traducteur`
--

INSERT INTO `Traducteur` (`idTraducteur`, `nom`, `prenom`, `email`, `password`, `wilaya`, `commune`, `adresse`, `telephone`, `fax`, `assermente`, `status`) VALUES
(1, 'Belhadj', 'Said', 'email1@gmail.com', 'pswrd1234', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', '031 56 30 50', 0, 'active'),
(2, 'Belhadji', 'Yacine', 'email2@gmail.com', 'pswrd1234', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', '031 56 30 50', 0, 'blocked'),
(3, 'Helali', 'Karim', 'email3@gmail.com', 'pswrd1234', 'Boumerdes', 'Boumerdes-centre', '3500 Rue de la liberté', '031 56 25 70', '031 56 30 50', 0, 'blocked'),
(4, 'Bouroubi', 'Taous', 'email4@gmail.com', 'pswrd1234', 'Alger', 'Oued Smar', '68 rue de la gare', '031 56 25 70', '031 56 30 50', 0, 'active'),
(5, 'Sebaa', 'Djamila', 'email5@gmail.com', 'pswrd1234', 'El-Oued', 'Djamaa', '30 Rue des dunes', '031 56 25 70', '031 56 30 50', 0, 'active'),
(6, 'Hazi', 'Farouk', 'emailyacine@gmail.com', 'pswrd1234', 'Tizi-ouzou', 'Freha', '10 Rue des oliviers', '031 56 25 70', '031 56 30 50', 0, 'active');

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
  ADD KEY `demandedevis_ibfk_1` (`client_id`),
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
  ADD KEY `traducteur_id` (`traducteur_id`),
  ADD KEY `langueDestination_id` (`langueDestination_id`),
  ADD KEY `langueSource_id` (`langueSource_id`);

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
  ADD KEY `traducteur_id` (`traducteur_id`),
  ADD KEY `idDemandeTraduction` (`idDemandeTraduction`);

--
-- Indexes for table `Payement`
--
ALTER TABLE `Payement`
  ADD PRIMARY KEY (`idPayement`),
  ADD KEY `payement_ibfk_1` (`traduction_id`);

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
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `DemandeDevis`
--
ALTER TABLE `DemandeDevis`
  MODIFY `idDemandeDevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `DemandeRecrutement`
--
ALTER TABLE `DemandeRecrutement`
  MODIFY `idDemandeRecrutemet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DemandeTraduction`
--
ALTER TABLE `DemandeTraduction`
  MODIFY `idDemandeTrad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Langue`
--
ALTER TABLE `Langue`
  MODIFY `idLangue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Payement`
--
ALTER TABLE `Payement`
  MODIFY `idPayement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `demandedevis_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `demandetraduction_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandetraduction_ibfk_3` FOREIGN KEY (`langueDestination_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandetraduction_ibfk_4` FOREIGN KEY (`langueSource_id`) REFERENCES `Langue` (`idLangue`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`traducteur_id`) REFERENCES `Traducteur` (`idTraducteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`idDemandeTraduction`) REFERENCES `DemandeTraduction` (`idDemandeTrad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payement`
--
ALTER TABLE `Payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`traduction_id`) REFERENCES `DemandeTraduction` (`idDemandeTrad`) ON DELETE CASCADE ON UPDATE CASCADE;

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

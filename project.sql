
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 juil. 2020 à 21:16
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(40) NOT NULL,
  `mdpA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `mdpA`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `affectationlivreur`
--

CREATE TABLE `affectationlivreur` (
  `idLivreur` varchar(40) NOT NULL,
  `idZone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectationlivreur`
--

INSERT INTO `affectationlivreur` (`idLivreur`, `idZone`) VALUES
('sonicEh', 1),
('sonicEh', 2),
('express', 1),
('express', 2),
('express', 3),
('express', 5),
('Fast', 3),
('Fast', 4),
('Fast', 5),
('Fast', 6),
('Fast', 7),
('diou', 1),
('diou1', 1),
('diou1', 2),
('diou1', 3),
('diou1', 14),
('diou1', 31),
('diou1', 32),
('diou1', 33),
('diou1', 34),
('diou1', 35),
('diou1', 36),
('diou1', 37);

-- --------------------------------------------------------

--
-- Structure de la table `allergie`
--

CREATE TABLE `allergie` (
  `idAllergie` int(11) NOT NULL,
  `nomAllergie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `allergie`
--

INSERT INTO `allergie` (`idAllergie`, `nomAllergie`) VALUES
(1, 'urticaire ou eczéma'),
(2, 'rhinite allergique ou asthme'),
(3, 'œdème de Quincke'),
(4, 'choc anaphylactique'),
(5, 'animaux à plumes'),
(6, 'animaux à poils'),
(7, 'insectes '),
(8, 'soleil'),
(9, 'latex moisissures'),
(10, 'aucun');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` varchar(40) NOT NULL,
  `nomC` varchar(40) NOT NULL,
  `prenomC` varchar(40) NOT NULL,
  `telC` int(40) NOT NULL,
  `emailC` varchar(40) NOT NULL,
  `datenaissC` varchar(40) NOT NULL,
  `genreC` varchar(40) NOT NULL,
  `statutmaternelC` varchar(40) NOT NULL,
  `mdpC` varchar(40) NOT NULL,
  `atestasmaladieC` varchar(40) NOT NULL,
  `adrC` varchar(40) NOT NULL,
  `villeC` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomC`, `prenomC`, `telC`, `emailC`, `datenaissC`, `genreC`, `statutmaternelC`, `mdpC`, `atestasmaladieC`, `adrC`, `villeC`) VALUES
('aly1A', 'wane', 'Aly', 772901097, 'alythiernowane6@gmail.com', '2000-03-03', 'M', 'Aucune', '9a900f538965a426994e1e90600920aff0b4e8d2', 'attestation.png', 'L27', 'Dakar'),
('aly5292', 'Aly Thierno', 'Wane', 772901097, 'alythiernowane6@gmail.com', '2000-03-03', 'M', ' Aucune', 'edc7536056d59631fca5a3f3989b7373f0181c01', 'attestation.png', 'L27 Sacré Coeur', 'Dakar'),
('aq', 'dsfcs', 'fdesf', 2147483647, 'dscefsze@dezsc.com', '2020-06-04', 'M', 'Allaitante', 'edc7536056d59631fca5a3f3989b7373f0181c01', 'attestation.png', 'descf', 'Dakar'),
('bbbb', 'hjb', 'nn', 5463534, 'hjyu', '2020-06-03', 'F', ' Aucune', '9a900f538965a426994e1e90600920aff0b4e8d2', 'attestation.png', 'nk b', 'Rufisque'),
('bbbbd', 'hjb', 'nn', 5463534, 'hjyu', '2020-06-03', 'F', ' Aucune', '388ad1c312a488ee9e12998fe097f2258fa8d5ee', 'attestation.png', 'nk b', 'Rufisque'),
('bbn', 'khb', 'hygu', 5442266, 'nn@jj.com', '2020-06-04', 'F', ' Aucune', 'a50535d20876d13d91c4e1c1753fd0a3223e9788', 'attestation.png', 'jknhui', 'Dakar'),
('dds', 'xx', 'jvg', 5445, 'zedss', '2020-06-04', 'M', 'Allaitante', '0cee248e5c6c7852c919f5a325003ab29d786561', 'attestation.png', 'sds', 'Dakar'),
('dscfd', 'sqsqs', 'dd', 2345, 'sqq52', '2020-06-03', 'F', ' Aucune', '388ad1c312a488ee9e12998fe097f2258fa8d5ee', 'attestation.png', 'eszz', 'Touba'),
('edqdqez', 'ezd', 'sf', 4521214, 'eqzdez', '2020-06-03', 'M', ' Aucune', '1f444844b1ca616009c2b0e3564fecc065872b5b', 'attestation.png', 'efz', 'Dakar'),
('ee', 'dsfcvf', 'sdcssd', 547558, 'ezdxfezsx', '2020-06-03', 'M', 'Aucune', '07962e32beac4da179b30c06f1c1e71bd220f782', 'attestation.png', 'edfdse', 'Dakar'),
('hancho', 'hoho', 'tryit', 65489854, 'jghj', '2020-06-03', 'M', 'Allaitante', '02b659d069731602ab77c9ca665688bcbdfc8e00', 'attestation.png', '', 'Dakar'),
('ihnu', 'gvfyt', 'bnbnb', 4545, 'ugvju', '2020-06-03', 'M', 'Enceinte', '110c8a30c16070bf2813480d9492a1a170a7d80a', 'attestation.png', 'ghvgh', 'Touba'),
('jameerodri', 'rodriguez', 'james', 2147483647, 'jamesito52@gmail.com', '2020-06-03', 'M', ' Aucune', 'fc60521348f32f65ff50da42a2851b853e6c62a5', 'attestation.png', '', ''),
('james', 'rodriguez', 'james', 125669988, 'jamesito52@gmail.com', '2020-06-04', 'M', ' Aucune', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', 'attestation.png', 'colombia', 'Dakar'),
('jhb', 'rodriguez', 'jjjn', 5436, 'bbb', '2020-06-04', 'M', 'Allaitante', '7323a5431d1c31072983a6a5bf23745b655ddf59', 'attestation.png', 'll52', 'Dakar'),
('jhbj', 'hjuuvbgj', 'khbgiy', 7458857, 'bkb', '2020-06-02', 'M', ' Aucune', '110c8a30c16070bf2813480d9492a1a170a7d80a', 'attestation.png', '56', 'Dakar'),
('jm5292', 'Preira', 'Jean Marie', 775646699, 'jm55@gmail.com', '1990-02-05', 'M', ' Aucune', 'b84cd3f30eb0ac9e7ff648f1958bb4d87711a0f5', 'attestation.png', 'Colobane', 'Saint-Louis'),
('kk', 'ezd', 'sf', 4521214, 'eqzdez', '2020-06-03', 'M', ' Aucune', '2ed45186c72f9319dc64338cdf16ab76b44cf3d1', 'attestation.png', 'efz', 'Dakar'),
('kkn', 'ezd', 'sf', 4521214, 'eqzdez', '2020-06-03', 'M', ' Aucune', '07962e32beac4da179b30c06f1c1e71bd220f782', 'attestation.png', 'efz', 'Dakar'),
('mane', 'hellme', 'meliodas', 775556254, 'kkkjdj@gmail.com', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'attestation.png', '', ''),
('manemane', 'Sadio', 'Mane', 332255699, 'man@gmail.com', '2020-06-03', 'M', ' Aucune', 'f9984009ae2fbc64274d0b28fe3353997131d709', 'attestation.png', 'Senegal', 'Dakar'),
('md5292', 'Dieng', 'Momar', 336589944, 'md44@yahoo.fr', '1898-05-04', 'M', ' Aucune', 'c6579c39477552f2522a537eae3a1ee7be9fc3e9', 'attestation.png', 'Chicago 654', 'Thies'),
('mmmi', 'grrt', 'ddg', 645165, 'sfdesrdfx', '2020-06-11', 'M', ' Aucune', '07962e32beac4da179b30c06f1c1e71bd220f782', 'attestation.png', 'rdfre', 'Touba'),
('mmms', ' Semedo', 'Nelson', 332226655, 'yguyg', '2020-06-03', 'M', 'Aucune', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', 'attestation.png', 'Cap Vert', 'Dakar'),
('new', 'nioo', 'Marseill', 338645599, 'hh@hotmail.fr', '2020-07-02', 'F', ' Aucune', 'c2a6b03f190dfb2b4aa91f8af8d477a9bc3401dc', 'attestation.png', 'mkkd@', 'Diourbel'),
('ous5292', 'Tall', 'Ousmane', 775569877, 'ous@gmail.com', '2020-06-10', 'M', ' Aucune', 'bacc7e6c8f591dbe411fa4cd37be8f1cece58400', 'attestation.png', 'Chicago 654', 'Kaolack'),
('pape5292', 'Ndiour', 'Pape Seybatou', 332569944, 'ppp@hotmail.com', '1998-06-27', 'M', ' Aucune', '240f8423181972803439e3d384ee9798140f7ac6', 'attestation.png', 'Hlm', 'Dakar'),
('ss', 'ffff', 'ddd', 11225566, 'dxxilkjbd', '2020-06-03', 'F', 'Allaitante', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7', 'attestation.png', 'ddd', 'Dakar'),
('uygym', 'jnkjn', 'kbh', 6531, 'xder', '2020-06-03', 'M', ' Aucune', 'b8d09b4d8580aacbd9efc4540a9b88d2feb9d7e5', 'attestation.png', 'bjh', 'Dakar');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `idClient` varchar(40) NOT NULL,
  `idOrdonnance` int(11) NOT NULL,
  `idPharmacie` varchar(40) NOT NULL,
  `dateCommande` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `idOrdonnance`, `idPharmacie`, `dateCommande`) VALUES
(5, 'aly5292', 5, 'momi5292', '2020-06-16 18:19:03'),
(7, 'aly5292', 6, 'momi5292', '2020-06-16 23:29:21'),
(9, 'aly5292', 8, 'momi5292', '2020-06-16 21:35:10'),
(10, 'aly5292', 9, 'momi5292', '2020-06-16 21:36:45'),
(12, 'aly5292', 12, 'momi5292', '2020-06-21 17:10:30'),
(13, 'aly5292', 13, 'cc', '2020-06-22 18:22:42'),
(14, 'jm5292', 14, 'dd', '2020-06-27 13:10:58'),
(15, 'jm5292', 15, 'dd', '2020-06-27 13:11:30'),
(16, 'jm5292', 16, 'sa5292', '2020-06-27 13:11:59'),
(17, 'aly5292', 17, 'refzd', '2020-06-27 15:24:03'),
(18, 'jm5292', 18, 'dd', '2020-06-29 18:03:27'),
(19, 'jm5292', 19, 'dd', '2020-06-29 18:38:23'),
(20, 'aly5292', 20, 'momi5292', '2020-07-01 01:16:03'),
(21, 'jm5292', 21, 'dd', '2020-07-01 01:17:34'),
(22, 'aly5292', 22, 'momi5292', '2020-07-01 01:26:50'),
(23, 'md5292', 23, 'aly5292', '2020-07-01 18:15:12'),
(24, 'new', 24, 'momi5292', '2020-07-01 18:43:21');

-- --------------------------------------------------------

--
-- Structure de la table `commandeencours`
--

CREATE TABLE `commandeencours` (
  `idCommande` int(11) NOT NULL,
  `validationClient` int(11) NOT NULL,
  `validationLivreur` int(11) NOT NULL,
  `validationPharmacie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandeencours`
--

INSERT INTO `commandeencours` (`idCommande`, `validationClient`, `validationLivreur`, `validationPharmacie`) VALUES
(13, 1, 1, 1),
(17, 1, 0, 1),
(20, 1, 1, 1),
(21, 1, 1, 1),
(22, 1, 1, 1),
(24, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etreallergique`
--

CREATE TABLE `etreallergique` (
  `idAllergie` int(11) NOT NULL,
  `idClient` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etreallergique`
--

INSERT INTO `etreallergique` (`idAllergie`, `idClient`) VALUES
(4, 'aly5292'),
(6, 'aly5292'),
(1, 'aly1A'),
(5, 'jm5292'),
(8, 'jm5292'),
(1, 'new');

-- --------------------------------------------------------

--
-- Structure de la table `etreentraitement`
--

CREATE TABLE `etreentraitement` (
  `idTraitement` int(11) NOT NULL,
  `idClient` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etreentraitement`
--

INSERT INTO `etreentraitement` (`idTraitement`, `idClient`) VALUES
(2, 'jameerodri'),
(3, 'aly5292'),
(13, 'aly5292'),
(0, '1'),
(0, '2'),
(0, '1'),
(1, 'mmms'),
(2, 'mmms'),
(1, 'jm5292'),
(2, 'jm5292'),
(2, 'md5292'),
(13, 'md5292'),
(3, 'pape5292'),
(2, 'ous5292'),
(1, 'james'),
(1, 'manemane'),
(2, 'manemane'),
(7, 'manemane'),
(3, 'ss'),
(2, 'dds'),
(3, 'edqdqez'),
(13, 'edqdqez'),
(3, 'kk'),
(3, 'kkn'),
(2, 'bbbb'),
(2, 'bbbb'),
(2, 'bbbbd'),
(1, 'bbn'),
(1, 'bbn'),
(3, 'ihnu'),
(3, 'jhbj'),
(13, 'uygym'),
(3, 'jhb'),
(2, 'dscfd'),
(3, 'mmms'),
(3, 'mmmi'),
(3, 'njh'),
(1, 'ee'),
(2, 'ee'),
(12, 'aly1A'),
(3, 'new');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `idHoraire` int(11) NOT NULL,
  `Heure-Début` varchar(20) NOT NULL,
  `Heure-Fin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`idHoraire`, `Heure-Début`, `Heure-Fin`) VALUES
(1, '8 H- md1 m', '13 H- mf1 '),
(2, '19 H- md1 ', '12 H- mf1 '),
(3, '8 H- md1 m', '13 H- mf1 '),
(4, '19 H- md1 ', '12 H- mf1 '),
(5, '2 H- md1 m', '5 H- mf1 m'),
(6, '6 H- md1 m', '6 H- mf1 m'),
(7, '2 H- md1 m', '5 H- mf1 m'),
(8, '6 H- md1 m', '6 H- mf1 m'),
(9, '18 H- 18 mn', '18 H- 17 mn'),
(10, '16 H-17 mn', '17 H-17 mn'),
(11, '18 H- 18 mn', '18 H- 17 mn'),
(12, '16 H-17 mn', '17 H-17 mn'),
(13, '18 H- 18 mn', '18 H- 17 mn'),
(14, '16 H-17 mn', '17 H-17 mn'),
(15, '18 H- 18 mn', '18 H- 17 mn'),
(16, '16 H-17 mn', '17 H-17 mn'),
(17, '0 H- 0 mn', '0 H- 0 mn'),
(18, '0 H-0 mn', '0 H-0 mn'),
(19, '0 H- 0 mn', '0 H- 0 mn'),
(20, '0 H-0 mn', '0 H-0 mn'),
(21, '0 H- 0 mn', '0 H- 0 mn'),
(22, '0 H-0 mn', '0 H-0 mn'),
(23, '8 H- 0 mn', '10 H- 0 mn'),
(24, '10 H-30 mn', '17 H-0 mn'),
(25, '9 H- 0 mn', '11 H- 0 mn'),
(26, '13 H-0 mn', '17 H-0 mn'),
(27, '0 H- 0 mn', '0 H- 0 mn'),
(28, '0 H-0 mn', '18 H-0 mn'),
(29, '0 H- 0 mn', '0 H- 0 mn'),
(30, '0 H-0 mn', '0 H-0 mn'),
(31, '0 H- 0 mn', '0 H- 0 mn'),
(32, '2 H-0 mn', '5 H-0 mn'),
(33, '8 H- 0 mn', '0 H- 0 mn'),
(34, '16 H-0 mn', '0 H-0 mn');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `idLivraison` int(11) NOT NULL,
  `idPharmacie` varchar(40) NOT NULL,
  `idClient` varchar(40) NOT NULL,
  `idLivreur` varchar(40) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `dateL` varchar(40) NOT NULL,
  `heureL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `idPharmacie`, `idClient`, `idLivreur`, `idCommande`, `dateL`, `heureL`) VALUES
(5, 'momi5292', 'aly5292', 'sonicEh', 5, '2020-06-03', '15 : 17'),
(7, 'momi5292', 'aly5292', 'sonicEh', 7, '2020-06-12', '17 : 15'),
(9, 'momi5292', 'aly5292', 'sonicEh', 9, '2020-06-05', '7 : 0'),
(10, 'momi5292', 'aly5292', 'sonicEh', 10, '2020-06-04', '15 : 0'),
(13, 'momi5292', 'aly5292', 'sonicEh', 12, '2020-06-12', '12 : 0'),
(14, 'cc', 'aly5292', 'sonicEh', 13, '2020-06-11', '10 : 0'),
(15, 'dd', 'jm5292', 'express', 14, '2020-06-28', '14 : 0'),
(16, 'dd', 'jm5292', 'express', 15, '2020-06-28', '17 : 0'),
(17, 'sa5292', 'jm5292', 'sonicEh', 16, '2020-06-20', '17 : 0'),
(18, 'refzd', 'aly5292', '', 17, '2020-06-05', '0 : 0'),
(19, 'dd', 'jm5292', 'express', 18, '2020-06-12', '13 : 0'),
(20, 'dd', 'jm5292', 'express', 19, '2020-06-11', '14 : 0'),
(21, 'momi5292', 'aly5292', 'express', 20, '2020-07-03', '15 : 0'),
(22, 'dd', 'jm5292', 'express', 21, '2020-07-03', '13 : 0'),
(23, 'momi5292', 'aly5292', 'sonicEh', 22, '2020-07-16', '18 : 0'),
(24, 'aly5292', 'md5292', 'Fast', 23, '2020-07-03', '16 : 0'),
(25, 'momi5292', 'new', 'diou1', 24, '2020-07-04', '17 : 0');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `idLivreur` varchar(40) NOT NULL,
  `nomLivreur` varchar(20) NOT NULL,
  `prenomLivreur` varchar(20) NOT NULL,
  `mdpL` varchar(40) NOT NULL,
  `telL` int(11) NOT NULL,
  `emailL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`idLivreur`, `nomLivreur`, `prenomLivreur`, `mdpL`, `telL`, `emailL`) VALUES
('diou', 'Kaynioudem', 'diouf', 'a5926c331e7e0a0998dd2e8b3fc4117c78ab9c6d', 775632255, 'dd@gmail.com'),
('diou1', 'Kaynioudem', 'diouf', 'bdfdfb44c630a5c22d1fb63b97a6c83f1943fbda', 775632255, 'dd@gmail.com'),
('express', 'Diallo', 'Aliou Mamdou', 'f3c62de455962fbdacddf3843dee5914477682c1', 338655221, 'aliou@gmail.com'),
('Fast', 'ba', 'Omar Samba', '8db6a2f1d3b7e19e518ffa8979d7ad15359af460', 775663211, 'basal@gmail.com'),
('sonicEh', 'SuperSonic', 'Bumblebeee', 'edc7536056d59631fca5a3f3989b7373f0181c01', 214748300, 'alythiernowane6@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE `medicaments` (
  `idMedicament` int(11) NOT NULL,
  `nomM` varchar(40) NOT NULL,
  `quantiteM` int(11) NOT NULL,
  `prixM` int(40) NOT NULL,
  `photoM` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`idMedicament`, `nomM`, `quantiteM`, `prixM`, `photoM`) VALUES
(1, 'Abelcet', 2500, 5000, 'medoc1.jpg'),
(2, 'Algicalm', 11111, 6000, 'medoc2.jpeg'),
(3, 'Adepale', 55555, 5000, 'medoc3.jpg'),
(4, 'brustan', 658431, 5000, 'medoc4.jpg'),
(6, 'Amoxiline', 333355, 5500, 'amoxiline.jpg'),
(7, 'Doliprane', 56455, 3685, 'medoc5.jpg'),
(8, 'Effralgan', 1000, 5000, 'ffrel.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `medicamentschoisis`
--

CREATE TABLE `medicamentschoisis` (
  `idPharmacie` varchar(40) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `quantiteChoisi` int(11) NOT NULL,
  `idOrdonnance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicamentschoisis`
--

INSERT INTO `medicamentschoisis` (`idPharmacie`, `idMedicament`, `quantiteChoisi`, `idOrdonnance`) VALUES
('momi5292', 1, 13, 5),
('momi5292', 1, 13, 6),
('momi5292', 2, 9, 6),
('momi5292', 1, 1, 8),
('momi5292', 2, 16, 8),
('momi5292', 3, 7, 8),
('momi5292', 1, 13, 9),
('momi5292', 3, 1, 9),
('momi5292', 1, 1, 12),
('momi5292', 2, 1, 12),
('momi5292', 3, 4, 12),
('cc', 1, 1, 13),
('cc', 3, 16, 13),
('dd', 3, 1, 14),
('dd', 4, 1, 14),
('dd', 6, 6, 14),
('dd', 8, 20, 14),
('dd', 1, 1, 15),
('dd', 4, 15, 15),
('dd', 7, 1, 15),
('dd', 8, 21, 15),
('sa5292', 7, 17, 16),
('refzd', 3, 19, 17),
('dd', 1, 3, 18),
('dd', 4, 3, 18),
('dd', 7, 1, 18),
('dd', 8, 4, 18),
('dd', 1, 1, 19),
('momi5292', 1, 20, 20),
('momi5292', 2, 20, 20),
('momi5292', 3, 1, 20),
('momi5292', 8, 1, 20),
('dd', 1, 1, 21),
('dd', 2, 16, 21),
('momi5292', 1, 13, 22),
('momi5292', 3, 15, 22),
('momi5292', 8, 34, 22),
('aly5292', 1, 20, 23),
('aly5292', 2, 1, 23),
('aly5292', 3, 1, 23),
('aly5292', 7, 11, 23),
('momi5292', 1, 11, 24);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `note`) VALUES
(1, 20),
(3, 15),
(4, 20),
(5, 1),
(6, 15),
(7, 14),
(8, 0),
(9, 20),
(10, 20),
(11, 11),
(12, 7),
(13, 9),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 5),
(21, 20),
(22, 5),
(23, 20),
(24, 20),
(25, 20),
(26, 20),
(27, 20),
(28, 20),
(29, 20),
(30, 20),
(31, 20),
(32, 10),
(33, 20),
(34, 11),
(35, 20),
(36, 15),
(37, 14),
(38, 14),
(39, 14),
(40, 14),
(41, 14),
(42, 14),
(43, 11),
(44, 20),
(45, 11),
(46, 20),
(47, 0),
(48, 0),
(49, 0),
(50, 20),
(51, 0),
(52, 0),
(53, 0),
(54, 0),
(55, 0),
(56, 0),
(57, 0),
(58, 0),
(59, 0),
(60, 0),
(61, 0),
(62, 0),
(63, 0),
(64, 0),
(65, 0),
(66, 0),
(67, 0),
(68, 0),
(69, 0),
(70, 0),
(71, 0),
(72, 0),
(73, 0),
(74, 0),
(75, 0),
(76, 0),
(77, 20),
(78, 5),
(79, 5),
(80, 20),
(81, 20),
(82, 20),
(83, 20),
(84, 20),
(85, 0),
(86, 0),
(87, 0),
(88, 0),
(89, 0),
(90, 0),
(91, 0),
(92, 0),
(93, 0),
(94, 0),
(95, 0),
(96, 0),
(97, 0),
(98, 0),
(99, 0),
(100, 0),
(101, 0),
(102, 0),
(103, 0),
(104, 0),
(105, 0),
(106, 0),
(107, 0),
(108, 0),
(109, 0),
(110, 0),
(111, 0),
(112, 0),
(113, 0),
(114, 0),
(115, 0),
(116, 0),
(117, 0),
(118, 0),
(119, 0),
(120, 0),
(121, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `idOrdonnance` int(11) NOT NULL,
  `idClient` varchar(40) NOT NULL,
  `photoOrdonnance` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ordonnance`
--

INSERT INTO `ordonnance` (`idOrdonnance`, `idClient`, `photoOrdonnance`) VALUES
(5, 'aly5292', 'ordo1.jpg'),
(6, 'aly5292', 'ordo2.jpg'),
(7, 'aly5292', 'ordo3.jpg'),
(8, 'aly5292', 'ordo4.jpg'),
(9, 'aly5292', 'ordo5.jpg'),
(10, 'aly1A', 'ordo6.jpg'),
(11, 'aly5292', 'ordo7.jpg'),
(12, 'aly5292', 'ordo8.jpg'),
(13, 'aly5292', 'im3.jpg'),
(14, 'jm5292', 'ordo2.jpg'),
(15, 'jm5292', 'ordo7.jpg'),
(16, 'jm5292', 'ordo3.jpg'),
(17, 'aly5292', 'ordo6.jpg'),
(18, 'jm5292', 'ordo7.jpg'),
(19, 'jm5292', 'ordo7.jpg'),
(20, 'aly5292', 'ordo3.jpg'),
(21, 'jm5292', 'ordo6.jpg'),
(22, 'aly5292', 'ordo8.jpg'),
(23, 'md5292', 'ordo6.jpg'),
(24, 'new', 'ordo2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrable`
--

CREATE TABLE `ouvrable` (
  `idPharmacie` varchar(40) NOT NULL,
  `idHoraire` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ouvrable`
--

INSERT INTO `ouvrable` (`idPharmacie`, `idHoraire`) VALUES
('', '5'),
('', '6'),
('ghgh', '7'),
('ghgh', '8'),
('hgvfh', '9'),
('hgvfh', '10'),
('hgvfh', '11'),
('hgvfh', '12'),
('hgvfh', '13'),
('hgvfh', '14'),
('hgvfh', '15'),
('hgvfh', '16'),
('desre', '17'),
('desre', '18'),
('desre', '19'),
('desre', '20'),
('77aa', '21'),
('77aa', '22'),
('momi5292', '23'),
('momi5292', '24'),
('aly5292', '25'),
('aly5292', '26'),
('refzd', '27'),
('refzd', '28'),
('dd', '29'),
('dd', '30'),
('cc', '31'),
('cc', '32'),
('sa5292', '33'),
('sa5292', '34');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `idPharmacie` varchar(40) NOT NULL,
  `nomP` varchar(40) NOT NULL,
  `nomgerantP` varchar(40) NOT NULL,
  `adrP` varchar(40) NOT NULL,
  `emailP` varchar(40) NOT NULL,
  `telP` int(11) NOT NULL,
  `mdpP` varchar(40) NOT NULL,
  `photoP` varchar(40) NOT NULL,
  `villeP` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`idPharmacie`, `nomP`, `nomgerantP`, `adrP`, `emailP`, `telP`, `mdpP`, `photoP`, `villeP`) VALUES
('77aa', 'Santè', 'ezqs', 'Sali', 'Sansan@gmail.com', 336589944, 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', 'noimage.jpg', 'Dakar'),
('aly5292', 'Healpro', 'ghhuhuihu', '5631', 'hb', 456835, 'edc7536056d59631fca5a3f3989b7373f0181c01', 'pharm2.jpg', 'Thies'),
('dd', 'PharmiWane', 'dd', 'vc', 'xw', 9986, 'edc7536056d59631fca5a3f3989b7373f0181c01', 'pharm4.jpg', 'Saint-Louis'),
('momi5292', 'wergouyaram', 'Racky mommi', 'L27', 'weer@gmail.com', 338645588, 'edc7536056d59631fca5a3f3989b7373f0181c01', 'pharm1.jpg', 'Dakar'),
('refzd', 'edfe', 'ezfdz', 'feefd', 'ezee', 415986, 'edc7536056d59631fca5a3f3989b7373f0181c01', 'noimage.jpg', 'Dakar'),
('sa5292', 'SoigneSoigne', 'Omar Sylla', 'kllj55', 'soignon@yahoo.fr', 332569988, 'b06ec3a46af1165942e026a2dff86fff509a6ef0', 'noimage.jpg', 'Saint-Louis');

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE `traitement` (
  `idTraitement` int(11) NOT NULL,
  `nomTraitement` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `traitement`
--

INSERT INTO `traitement` (`idTraitement`, `nomTraitement`) VALUES
(1, 'dermatologique'),
(2, 'fievreux'),
(3, 'hormonal'),
(4, 'cancer'),
(5, 'grippe'),
(6, 'repiratoire'),
(7, 'visuel'),
(8, 'cardiaque'),
(9, 'toux'),
(10, 'psychiatrique'),
(11, 'pour maux de tete'),
(12, 'corporal'),
(13, 'aucun');

-- --------------------------------------------------------

--
-- Structure de la table `zonelivraison`
--

CREATE TABLE `zonelivraison` (
  `idZone` int(11) NOT NULL,
  `villeL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `zonelivraison`
--

INSERT INTO `zonelivraison` (`idZone`, `villeL`) VALUES
(1, 'Dakar'),
(2, 'Saint-Louis'),
(3, 'Touba'),
(4, 'Thies'),
(5, 'Kaolack'),
(6, 'Rufisque'),
(7, 'Tambacounda'),
(8, 'Ziguinchor'),
(9, 'Joal Fadiouth'),
(10, 'Richard Toll'),
(11, 'Mbour'),
(12, 'Pikine'),
(13, 'Tivaouane'),
(14, 'Diourbel'),
(15, 'Bargny'),
(16, 'Saly'),
(17, 'Matam'),
(18, 'Guediaway'),
(19, 'Kédougou'),
(20, 'Kayar'),
(21, 'Pout'),
(22, 'Kolda'),
(23, 'Khombole'),
(24, 'Ourossogui'),
(25, 'Nianing'),
(26, 'Sédhiou'),
(27, 'Bakel'),
(28, 'Hann bel air'),
(29, 'Louga'),
(30, 'Ndioum'),
(31, 'Kongueul'),
(32, 'Diamnadio'),
(33, 'Yoff'),
(34, 'Medina'),
(35, 'Thiaroye'),
(36, 'Dagana'),
(37, 'Bambey'),
(38, 'Bargny');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `allergie`
--
ALTER TABLE `allergie`
  ADD PRIMARY KEY (`idAllergie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `commandeencours`
--
ALTER TABLE `commandeencours`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`idHoraire`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idLivraison`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`idLivreur`);

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`idMedicament`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`idOrdonnance`);

--
-- Index pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD PRIMARY KEY (`idPharmacie`);

--
-- Index pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`idTraitement`);

--
-- Index pour la table `zonelivraison`
--
ALTER TABLE `zonelivraison`
  ADD PRIMARY KEY (`idZone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergie`
--
ALTER TABLE `allergie`
  MODIFY `idAllergie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `idHoraire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `idMedicament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `idOrdonnance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `traitement`
--
ALTER TABLE `traitement`
  MODIFY `idTraitement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `zonelivraison`
--
ALTER TABLE `zonelivraison`
  MODIFY `idZone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
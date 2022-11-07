-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 03:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fonacogestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `login`, `password`, `statut`) VALUES
(1, 'Lahcen', 12354, 'utilisateur'),
(2, 'Oussama', 12345, 'utilisateur'),
(10, 'Massine', 12345, 'administrateur'),
(13, 'Soufiane', 12345, 'administrateur'),
(14, 'Zineb', 12345, 'comptable');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `montantmax` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`nom`, `telephone`, `email`, `montantmax`, `id_client`, `adresse`) VALUES
('Intelimage', '0667793712', 'contact@intelimage.com', 2500, 1, ''),
('Bennarg (Ihab)', '0661338541', 'bennarihab@gmail.com', 1000, 2, NULL),
('Al aqlam', '0528232272', 'impaqlam@gmail.com', 3000, 3, NULL),
('Pubicom', '0528211216', 'pubicomail@gmail.com', 1500, 4, NULL),
('Wl service', '0661220306', 'ste.wlservice@gmail.com', 6000, 5, NULL),
('Beking', '0528236746', 'Beking.sarl@gmail.com', 0, 6, NULL),
('Massine Mountasser', '0656762287', 'mountasser.massine@gmail.com', 1000, 7, 'appt 4');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(255) NOT NULL,
  `id_devis` int(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `quantite` int(255) NOT NULL,
  `prix_unitaire` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_devis`, `designation`, `quantite`, `prix_unitaire`, `total`) VALUES
(48, 17, 'test2', 10, 1.6, 16),
(49, 17, 'test4', 12, 2.5, 30),
(53, 1, 'test4', 4, 1.2, 4.8),
(55, 10, 'hello', 11, 1, 11),
(56, 12, 'etq', 100, 2, 200),
(58, 13, 'test', 7, 2.2, 15.4),
(59, 13, 'test2', 2, 2.8, 5.6),
(60, 3, 'test3', 11, 3.1, 34.1),
(62, 4, 'test2', 4, 1.1, 4.4),
(63, 19, 'cv ', 8, 0.8, 6.4),
(64, 3, 'test3', 7, 2.3, 16.1),
(65, 3, 'hello', 5, 1.3, 6.5),
(66, 3, 'test2', 5, 2.9, 14.5),
(67, 3, 'test4', 2, 3.6, 7.2),
(68, 3, 'test', 38, 0.9, 34.2),
(69, 3, 'hello', 14, 1.4, 19.6),
(70, 3, 'test4', 7, 1, 7),
(71, 3, 'hello', 8, 1.8, 14.4),
(72, 3, 'test', 7, 2.5, 17.5),
(73, 3, 'test4', 15, 1.6, 24),
(74, 3, 'test3', 6, 2.7, 16.2),
(75, 18, 'hello', 10, 1.9, 19),
(76, 18, 'test', 7, 2.2, 15.4),
(77, 18, 'test4', 4, 3.2, 12.8),
(78, 15, 'hello', 12, 1.2, 14.4),
(79, 15, 'test4', 14, 1.2, 16.8),
(80, 16, 'hello', 10, 1.9, 19),
(81, 16, 'test4', 15, 1.3, 19.5),
(82, 14, 'test2', 17, 1.4, 23.8),
(83, 14, 'test4', 13, 3.2, 41.6),
(84, 8, 'test3', 33, 1.4, 46.2),
(85, 8, 'test2', 12, 2.8, 33.6),
(86, 20, 'hello', 12, 2, 24),
(87, 18, 'test2', 100, 5.5, 550),
(88, 21, 'test3', 9, 2.4, 21.6);

-- --------------------------------------------------------

--
-- Table structure for table `commandes_fournisseur`
--

CREATE TABLE `commandes_fournisseur` (
  `id_com_fournisseur` int(25) NOT NULL,
  `id_fournisseur` int(255) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `qte` int(25) NOT NULL,
  `prix_unitaire` double NOT NULL,
  `prix_total` double NOT NULL,
  `date_commande` date NOT NULL,
  `paye` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commandes_fournisseur`
--

INSERT INTO `commandes_fournisseur` (`id_com_fournisseur`, `id_fournisseur`, `designation`, `qte`, `prix_unitaire`, `prix_total`, `date_commande`, `paye`) VALUES
(7, 9, 'test3', 12, 14, 168, '2022-08-24', 1),
(9, 10, 'test4', 8, 11, 88, '2022-12-31', 0),
(10, 9, 'test3', 12, 15, 180, '2022-08-30', 0),
(11, 13, 'test2', 7, 15, 105, '2022-08-29', 0),
(12, 11, 'hello', 6, 12, 72, '2022-08-28', 1),
(13, 13, 'test', 6, 11, 66, '2022-08-27', 0),
(14, 12, 'test3', 21, 10, 210, '2022-08-25', 1),
(15, 12, 'hello', 8, 16, 128, '2022-08-23', 0),
(16, 10, 'test2', 10, 18, 180, '2022-08-15', 1),
(17, 9, 'test', 4, 30, 120, '2022-08-16', 1),
(18, 9, 'test3', 17, 11, 187, '2022-08-19', 1),
(19, 11, 'test4', 4, 10, 40, '2022-07-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(255) NOT NULL,
  `id_client` int(255) NOT NULL,
  `date_devis` date NOT NULL,
  `total_ht` float NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `paye` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id_devis`, `id_client`, `date_devis`, `total_ht`, `valide`, `paye`) VALUES
(1, 4, '2022-08-17', 4.8, 1, 1),
(3, 4, '2022-08-18', 211.3, 1, 0),
(4, 2, '2022-08-19', 4.4, 1, 1),
(8, 3, '2022-08-21', 79.8, 1, 1),
(10, 6, '2022-08-16', 11, 1, 1),
(12, 5, '2022-08-23', 200, 1, 1),
(13, 3, '2022-08-15', 21, 1, 1),
(14, 2, '2022-08-26', 65.4, 1, 1),
(15, 1, '2022-08-29', 31.2, 1, 1),
(16, 7, '2022-08-28', 38.5, 1, 0),
(17, 1, '2022-08-22', 46, 1, 1),
(18, 4, '2022-08-30', 597.2, 1, 0),
(19, 3, '2022-08-24', 6.4, 1, 0),
(20, 2, '2022-07-29', 24, 0, 0),
(21, 4, '2022-10-23', 21.6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_fournisseur` int(255) NOT NULL,
  `nom_fournisseur` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseur`, `nom_fournisseur`, `tel`, `email`) VALUES
(9, 'Massine', '0656762287', 'mountasser.massine@gmail.com'),
(10, 'Mountasser Massine', '0643528424', 'g.fox841@gmail.com'),
(11, 'Massine2', '0656762287', 'mountasser.massine@gmail.com'),
(12, 'Massine Mountasser', '0656762287', 'mountasser.massine@gmail.com'),
(13, 'Mountasser', '0662707092', 'g.fox841@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(25) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `qte` int(25) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `designation`, `qte`, `date`) VALUES
(2, 'papier A3 300g', 10, '2022-08-03'),
(3, 'test', 6, '2022-08-08'),
(9, 'test3', 8, '2022-08-09'),
(10, 'test2', 12, '2022-08-23'),
(11, 'Papier A3 80 g / m2', 260, '2022-09-10'),
(12, 'Papier A3 toilé 300 g / m', 200, '2022-09-10'),
(13, 'Adhésif soft touch', 20, '2022-09-09'),
(14, 'Encre CMJN Xerox', 90, '2022-09-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `commandes_ibfk_1` (`id_devis`);

--
-- Indexes for table `commandes_fournisseur`
--
ALTER TABLE `commandes_fournisseur`
  ADD PRIMARY KEY (`id_com_fournisseur`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`),
  ADD KEY `devis_ibfk_1` (`id_client`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `commandes_fournisseur`
--
ALTER TABLE `commandes_fournisseur`
  MODIFY `id_com_fournisseur` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_fournisseur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_devis`) REFERENCES `devis` (`id_devis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commandes_fournisseur`
--
ALTER TABLE `commandes_fournisseur`
  ADD CONSTRAINT `commandes_fournisseur_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseurs` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

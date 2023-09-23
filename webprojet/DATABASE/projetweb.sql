-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 03, 2022 at 12:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `influenceur`
--

CREATE TABLE `influenceur` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `age` date NOT NULL,
  `ville` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `tiktok` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `influenceur`
--

INSERT INTO `influenceur` (`id`, `Name`, `Email`, `Password`, `age`, `ville`, `foto`, `facebook`, `instagram`, `tiktok`, `twitter`, `description`, `tel`) VALUES
(11, 'Ilias Charchaoui', 'iliasch.2001@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2022-05-10', 'tetouan', 'Ilias Charchaoui.png', 'ilias charchaoui', '16516', '165156', 'iliasch77', '16569', 2147483647),
(15, 'nasrlah', 'nasrlah@gmail.com', '2e8c0277e396fabf683e56c8b7fa7e6dad68c679', '3333-03-03', 'tetuan', 'nasrlah.jpg', '', 'nasr7', 'nasr123', '', 'ana nasr', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `age` date NOT NULL,
  `ville` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `tiktok` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id`, `Name`, `Email`, `Password`, `age`, `ville`, `foto`, `facebook`, `instagram`, `tiktok`, `twitter`, `description`, `tel`) VALUES
(14, 'nike', 'nike@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1999-11-11', 'berlin', 'nike.png', '', 'nike124', 'nike123', '', 'ana Nike', 678945123),
(16, 'youth', 'youth@gmail.com', 'e575dccc71140754dd85beda5965b6a358150309', '2022-05-05', 'Tetouan', 'youth.jpg', '', 'youth2022', 'youth2022', '', 'Youth Store', 678945123),
(18, 'puma', 'puma@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', '1999-12-12', 'casablanca', 'puma.jpg', '', 'puma456', 'puma123', '', 'im puma', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `source` int(100) NOT NULL,
  `destination` int(100) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `etat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `source`, `destination`, `msg`, `etat`) VALUES
(0, 18, 11, 'uyghvbhvhv', ''),
(0, 18, 11, 'cv', ''),
(0, 18, 15, 'salam', ''),
(0, 18, 15, 'hey\r\n', ''),
(0, 18, 15, 'yuguy', ''),
(0, 18, 15, 'salut', ''),
(0, 18, 15, 'bonjour 3awtani', ''),
(0, 18, 15, 'bonjour 3awtani\r\n', ''),
(0, 18, 15, 'salamo3alikom', ''),
(0, 18, 15, 'message envoye', ''),
(0, 18, 11, 'voulaer vous collaborer avec nous??', ''),
(0, 11, 18, 'non', ''),
(0, 11, 19, 'chfiha hp\r\n', ''),
(0, 18, 20, 'salam dalal', ''),
(0, 11, 18, 'la walo ', ''),
(0, 11, 13, 'vv adidas', ''),
(0, 11, 14, 'vv nike', ''),
(0, 11, 14, 'vv chabiba', ''),
(0, 11, 18, 'vv puma', ''),
(0, 23, 14, 'bonjour NIKE cv', '');

-- --------------------------------------------------------

--
-- Table structure for table `partenariat`
--

CREATE TABLE `partenariat` (
  `id` int(11) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `influenceur` varchar(100) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `montant` int(20) NOT NULL,
  `methodpm` enum('Paypal','Liquide','Cheque','Carte de credit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partenariat`
--

INSERT INTO `partenariat` (`id`, `marque`, `influenceur`, `etat`, `date_debut`, `date_fin`, `montant`, `methodpm`) VALUES
(1, 'puma', 'Ilias Charchaoui', 'accepter', '2022-05-12', '2022-05-20', 500, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `supprimer`
--

CREATE TABLE `supprimer` (
  `id` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supprimer`
--

INSERT INTO `supprimer` (`id`, `etat`) VALUES
(19, 'marque'),
(20, 'influenceur'),
(17, 'marque'),
(13, 'marque'),
(22, 'influenceur'),
(23, 'influenceur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `etat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Name`, `Email`, `Password`, `etat`) VALUES
(11, 'Ilias Charchaoui', 'iliasch.2001@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'influenceur'),
(14, 'nike', 'nike@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'marque'),
(15, 'nasrlah', 'nasrlah@gmail.com', '2e8c0277e396fabf683e56c8b7fa7e6dad68c679', 'influenceur'),
(16, 'youth', 'youth@gmail.com', 'e575dccc71140754dd85beda5965b6a358150309', 'marque'),
(18, 'puma', 'puma@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'marque'),
(21, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `influenceur`
--
ALTER TABLE `influenceur`
  ADD KEY `id` (`id`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD KEY `id` (`id`);

--
-- Indexes for table `partenariat`
--
ALTER TABLE `partenariat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`,`Name`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partenariat`
--
ALTER TABLE `partenariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

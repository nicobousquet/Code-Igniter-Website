-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 17 déc. 2022 à 00:33
-- Version du serveur : 8.0.31-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `Kart`
--

CREATE TABLE `Kart` (
  `id` smallint NOT NULL,
  `email_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo_id` int NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Photos`
--

CREATE TABLE `Photos` (
  `id` int NOT NULL,
  `continent` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Photos`
--

INSERT INTO `Photos` (`id`, `continent`, `url`) VALUES
(1, 'Europe', 'https://wallpaperaccess.com/full/236182.jpg'),
(2, 'America', 'https://www.todofondos.net/wp-content/uploads/1920x1224-California-WallpaperPaperDownload-Free-Beautiful-High-Resolution.jpg'),
(3, 'Africa', 'https://wallpaperaccess.com/full/1117146.jpg'),
(4, 'Asia', 'https://wallpaperaccess.com/full/6127.jpg'),
(5, 'Oceania', 'https://wallpaperaccess.com/full/492882.jpg'),
(6, 'America', 'https://w0.peakpx.com/wallpaper/499/489/HD-wallpaper-beautiful-yosemite-in-r-margin-california-high-definition-clouds-cenario-firs-stones-gold-mounts-stumps-bright-creeks-peaks-upper-yosemite-fall-beauty-yosemite-national-park-brightness.jpg'),
(7, 'America', 'https://wallpaperaccess.com/full/254834.jpg'),
(8, 'America', 'https://wallpaperaccess.com/full/311182.jpg'),
(9, 'America', 'https://c0.wallpaperflare.com/preview/975/999/628/mexico-tequila-field-mountain.jpg'),
(10, 'America', 'https://wallpaperaccess.com/full/1704828.jpg'),
(11, 'Africa', 'https://rare-gallery.com/thumbs/565971-african-savanna.jpg'),
(12, 'Africa', 'https://www.traveloffpath.com/wp-content/uploads/2021/09/Six-Great-Experiences-In-Cape-Town.jpg'),
(13, 'Europe', 'https://wallpapercave.com/wp/wp1929422.jpg'),
(14, 'Europe', 'https://wallpapercave.com/wp/wp2874210.jpg'),
(15, 'Asia', 'https://wallpaperaccess.com/full/6130.jpg'),
(16, 'Asia', 'https://wallpaperaccess.com/full/441155.jpg'),
(17, 'Asia', 'https://wallpaperaccess.com/full/562732.jpg'),
(18, 'Oceania', 'https://wallpaperaccess.com/full/889234.jpg'),
(19, 'Oceania', 'https://w0.peakpx.com/wallpaper/90/622/HD-wallpaper-western-australia-australia-nature-sky-blue.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `first_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password`, `id`) VALUES
('Nicolas', 'Bousquet', 'nbousquet99@gmail.com', 'root', 24),
('Juan', 'Garcia', 'jgarcia@gmail.com', 'root', 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Kart`
--
ALTER TABLE `Kart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Kart`
--
ALTER TABLE `Kart`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `Photos`
--
ALTER TABLE `Photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

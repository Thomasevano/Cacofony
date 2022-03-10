-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 28 jan. 2022 à 16:36
-- Version du serveur : 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mt4-data`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
                            `id` int(11) NOT NULL,
                            `content` text NOT NULL,
                            `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
                            `authorId` int(11) NOT NULL,
                            `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
                         `id` int(11) NOT NULL,
                         `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
                         `title` varchar(255) NOT NULL,
                         `content` text NOT NULL,
                         `authorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `createdAt`, `title`, `content`, `authorId`) VALUES
    (10, '2022-01-28 15:14:40', 'Post 1', 'post test', 6);
-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `firstName` varchar(30) NOT NULL,
                         `lastName` varchar(30) NOT NULL,
                         `password` text NOT NULL,
                         `admin` tinyint(1) NOT NULL DEFAULT 0,
                         `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `password`, `admin`, `email`) VALUES
                                                                                      (6, 'clement', 'clement', '$2y$10$oQ2g8gnxDfuW3klE7Uw4aeBhDYa509WIqEleFNuWgYnQxnOBM7QQS', 0, 'clement@email.fr'),
                                                                                      (7, 'test', 'test', '$2y$10$RzAnUlG2MSUjScRFDoliKOfFsLXJt4QBMZ8MAwFpzydu3xV/bo9ui', 0, 'test@test.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
    ADD PRIMARY KEY (`id`),
    ADD KEY `authorId` (`authorId`),
    ADD KEY `post` (`postId`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
    ADD PRIMARY KEY (`id`),
    ADD KEY `author` (`authorId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
    ADD CONSTRAINT `comment_author` FOREIGN KEY (`authorId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `post` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
    ADD CONSTRAINT `author` FOREIGN KEY (`authorId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
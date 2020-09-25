SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `magic_deck`
--

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mana_cost` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `card_color`
--

CREATE TABLE `card_color` (
  `id` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `value`) VALUES
(4, NULL),
(3, 'Black'),
(2, 'Blue'),
(1, 'Green'),
(6, 'Red'),
(5, 'White');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user_card`
--

CREATE TABLE `user_card` (
  `id` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_image_uindex` (`image`);

--
-- Index pour la table `card_color`
--
ALTER TABLE `card_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_color_card_id_fk` (`card`),
  ADD KEY `card_color_color_id_fk` (`color`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_value_uindex` (`value`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_uindex` (`email`),
  ADD UNIQUE KEY `user_password_uindex` (`password`);

--
-- Index pour la table `user_card`
--
ALTER TABLE `user_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_card_card_id_fk` (`card`),
  ADD KEY `user_card_user_id_fk` (`user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `card_color`
--
ALTER TABLE `card_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `card_color`
--
ALTER TABLE `card_color`
  ADD CONSTRAINT `card_color_card_id_fk` FOREIGN KEY (`card`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `card_color_color_id_fk` FOREIGN KEY (`color`) REFERENCES `color` (`id`);

--
-- Contraintes pour la table `user_card`
--
ALTER TABLE `user_card`
  ADD CONSTRAINT `user_card_card_id_fk` FOREIGN KEY (`card`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `user_card_user_id_fk` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

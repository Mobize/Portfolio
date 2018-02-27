-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Janvier 2016 à 14:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `portfolio`
--
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio`;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `client` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT '',
  `picture` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `client`, `tags`, `logo`, `picture`, `date`) VALUES
(1, 'cabane dans les bois', 'Nichées au coeur du Parc Naturel Régional des Volcans d’Auvergne, ces cabanes perchées dans les arbres uniques et originales vous accueilleront pour un moment d’évasion au contact de la nature.', 'cabane de france', 'nature et découverte', '', 'cabin.png', '2010-04-10'),
(2, 'patisserie de rêve', 'S''il est aujourd''hui à la tête de Maisons des rêves et de la Pâtisserie des Rêves, Thierry Teyssier vient pourtant du théâtre. Epris du monde du spectacle, cet homme au parcours atypique commence sa carrière en créant une compagnie au nom évocateur, Midi-Minuit. Soirée de théâtre aux chandelles, balades théâtrales dans des jardins, la mise en scène qu''il maîtrise parfaitement est tournée vers la recherche d’expérience différente. Cela le conduit très naturellement vers le monde de la communication et de l''événement. Au début des années 1990, il crée Lever de Rideau aujourd’hui classé parmi les plus grandes agences d’évènementiel françaises. Il imagine des scénographies où la générosité et l''imaginaire l''emportent.', 'fauchon', 'gourmandise', '', 'cake.png', '2015-08-02'),
(3, 'cirque', 'Synonyme d''excellence, le nom légendaire de Bouglione évoque sensations fortes, prouesses, émotion, magie, féerie, gaieté, convivialité... Car c''est bien de fête dont il est question avec Bravo !\r\n\r\nCe spectacle unique est rythmé au son des rires, des applaudissements et du souffle que l''on retient devant des numéros d''exception. A partager sans modération ! Imaginez le Grand Orchestre du Cirque d’Hiver qui entonne les premières notes de l''air de La Piste aux étoiles, les Salto Dancers qui vous entraînent dans la danse avant même que vous ne preniez place sous le chapiteau...\r\n\r\nLe top est donné pour 2 h de réjouissances ! Les artistes ont à cœur de vous divertir, de vous faire découvrir leur univers, de vous faire vibrer, et surtout de cultiver, avec vous, l''art noble et généreux de la Fête !', 'zavatta', 'divertissement', '', 'circus.png', '2014-06-07'),
(4, 'gaming', 'Jeux vidéo : Retrouvez toutes les consoles Nintendo Wii U, PS3, PS4, Xbox 360, Xbox One mais aussi les jeux PC ainsi que les consoles portables Nintendo 3DS, New 3DS et PS Vita. Commandez toutes les nouveautés et tous les jeux vidéo pas chers et d''occasion sur Fnac.com', 'sony', 'multimedia', 'game/logo-project.png', 'game.png', '2013-10-23'),
(5, 'sécurité', 'Actuellement, Coffre Fort France fait partie des plus grands spécialistes français pour l''achat d''un coffre fort. Notre rigueur en terme de contrôle et de tests vous garantie ainsi une protection optimale de tous vos supports de données ou objets de valeur.', 'secu infor', 'sécurité', '', 'safe.png', '2012-09-15'),
(6, 'submersible', 'Un sous-marin est un navire submersible capable de se déplacer en surface et sous l''eau ; il se distingue ainsi des autres bateaux et navires qui se déplacent uniquement à la surface, et des bathyscaphes qui ne se déplacent que selon l''axe vertical.\r\n\r\nLa plupart des sous-marins sont des navires de guerre. L''usage civil du sous-marin concerne, pour l''essentiel, la recherche océanographique et l''exploitation pétrolière ; son emploi à des fins touristiques ou de transport commercial reste anecdotique1.\r\n\r\nL''immersion maximale2 d''un sous-marin militaire est de quelques centaines de mètres. D''une centaine de mètres pendant la Seconde Guerre mondiale, elle est passée à environ 300/400 mètres pour la plupart des sous-marins actuels. Elle atteint plusieurs milliers de mètres pour les sous-marins de recherche océanographique.\r\n\r\nUn sous-marinier est un membre de l''équipage d''un sous-marin.', 'Louis Cotier', 'maritime', '', 'submarine.png', '2011-11-30');

-- --------------------------------------------------------

--
-- Structure de la table `project_pictures`
--

CREATE TABLE IF NOT EXISTS `project_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `src` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT '',
  `desc` text,
  `date` datetime DEFAULT NULL,
  `sort` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `project_pictures`
--

INSERT INTO `project_pictures` (`id`, `project_id`, `src`, `alt`, `desc`, `date`, `sort`) VALUES
(1, 4, 'game/1.jpg', 'Lorem ipsum dolor sit amet', '<h2 style="color: orange">Lorem ipsum !</h2><a class="btn btn-info">Voir le projet</a>', NULL, 1),
(2, 4, 'game/2.jpg', 'Lorem ipsum dolor sit amet', NULL, NULL, 2),
(3, 4, 'game/3.jpg', 'Lorem ipsum dolor sit amet', '<blockquote><p>&laquo; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat ante. &raquo;</p><footer>Someone famous in <cite title="Source Title">Source Title</cite></footer></blockquote>', NULL, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

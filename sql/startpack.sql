-- phpMyAdmin SQL Dump
-- version 4.0.0-alpha2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 10 Février 2013 à 17:52
-- Version du serveur: 5.1.66-0+squeeze1
-- Version de PHP: 5.3.3-7+squeeze14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `usine`
--

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `label`) VALUES
(1, 'nom-site', 'StartPack', 'Nom du site'),
(2, 'nb-colonne', '2', 'Nombre de colonne'),
(3, 'company', 'StartPack', 'Société');

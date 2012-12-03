-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 03 Décembre 2012 à 13:59
-- Version du serveur: 5.5.28
-- Version de PHP: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `startpack`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(128) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'xtTYO6w8gcSM9j/iKTJ0Xj1iOtyjlEmskuyxuO+4K+e6ISZ6k1ffqq83OKQfMe9JLVXeNa/VBzuooaMpaTckvQ==', 'ROLE_ADMIN', '6uun4qgswps0o4kw040w8sk4kcgoowc', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `label`) VALUES
(1, 'nom-site', 'StartPack', 'Nom du site'),
(2, 'nb-colonne', '2', 'Nombre de colonne');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`id`, `nom`) VALUES
(1, 'text');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `name`, `slug`, `content`) VALUES
(1, 'Test', 'page-de-test', 'Content de la page');

-- --------------------------------------------------------

--
-- Structure de la table `page_module`
--

CREATE TABLE IF NOT EXISTS `page_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) NOT NULL,
  `colonne_id` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`),
  KEY `page` (`page`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `page_module`
--

INSERT INTO `page_module` (`id`, `page`, `colonne_id`, `ordre`, `module`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 2, 0, 1),
(3, 1, 2, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `page_module_content`
--

CREATE TABLE IF NOT EXISTS `page_module_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `valeur` text NOT NULL,
  `page_module` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_module_id` (`page_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `page_module_content`
--

INSERT INTO `page_module_content` (`id`, `libelle`, `valeur`, `page_module`) VALUES
(1, 'text', 'Content de la page', 1),
(2, 'text', 'text de test', 2),
(3, 'text', 'test ici', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(128) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'l@disko.fr', 'xtTYO6w8gcSM9j/iKTJ0Xj1iOtyjlEmskuyxuO+4K+e6ISZ6k1ffqq83OKQfMe9JLVXeNa/VBzuooaMpaTckvQ==', 'ROLE_USER', '6uun4qgswps0o4kw040w8sk4kcgoowc', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `optin` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `last_name`, `first_name`, `address`, `cp`, `ville`, `optin`) VALUES
(1, 1, 'Mathieu', 'MARCHOIS', '40 rue de vaux', '95620', 'Parmain', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `page_module`
--
ALTER TABLE `page_module`
  ADD CONSTRAINT `page_module_ibfk_3` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_module_ibfk_4` FOREIGN KEY (`module`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `page_module_content`
--
ALTER TABLE `page_module_content`
  ADD CONSTRAINT `page_module_content_ibfk_2` FOREIGN KEY (`page_module`) REFERENCES `page_module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

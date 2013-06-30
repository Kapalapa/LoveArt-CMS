-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Neděle 30. června 2013, 22:25
-- Verze MySQL: 5.1.56
-- Verze PHP: 5.3.6-pl1-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `loveart_cms`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_user`
--

CREATE TABLE IF NOT EXISTS `love_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_admin_user`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_content`
--

CREATE TABLE IF NOT EXISTS `love_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `plugin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_content`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_module`
--

CREATE TABLE IF NOT EXISTS `love_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_module`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_page`
--

CREATE TABLE IF NOT EXISTS `love_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_page`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_plugin`
--

CREATE TABLE IF NOT EXISTS `love_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_plugin`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_plugin_static`
--

CREATE TABLE IF NOT EXISTS `love_plugin_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `data` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_plugin_static`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_settings`
--

CREATE TABLE IF NOT EXISTS `love_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_settings`
--


-- --------------------------------------------------------

--
-- Struktura tabulky `love_theme`
--

CREATE TABLE IF NOT EXISTS `love_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `love_theme`
--


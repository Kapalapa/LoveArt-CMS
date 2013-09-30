-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 30. zář 2013, 19:33
-- Verze MySQL: 5.5.28
-- Verze PHP: 5.3.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `loveart_cms`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_content`
--

CREATE TABLE IF NOT EXISTS `love_admin_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `plugin_id` int(11) NOT NULL,
  `plugin_instance_id` int(11) NOT NULL,
  `static_data` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `love_admin_content`
--

INSERT INTO `love_admin_content` (`id`, `page_id`, `module_id`, `plugin_id`, `plugin_instance_id`, `static_data`, `rank`, `admin`) VALUES
(1, 2, 1, 0, 0, 'settings', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_menu`
--

CREATE TABLE IF NOT EXISTS `love_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_czech_ci AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `love_admin_menu`
--

INSERT INTO `love_admin_menu` (`id`, `name`, `title`, `parent_id`, `rank`) VALUES
(1, 'about', 'About', NULL, 0),
(2, 'settings', 'Settings', NULL, 5),
(3, 'plugins', 'Plugins', NULL, 0),
(4, 'static-content', 'Static Content', 3, 0),
(5, 'themes', 'Themes', 2, 2),
(6, 'pages', 'Pages', 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_module`
--

CREATE TABLE IF NOT EXISTS `love_admin_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `love_admin_module`
--

INSERT INTO `love_admin_module` (`id`, `name`) VALUES
(1, 'content');

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_page`
--

CREATE TABLE IF NOT EXISTS `love_admin_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `theme` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `love_admin_page`
--

INSERT INTO `love_admin_page` (`id`, `name`, `title`, `theme`) VALUES
(1, 'about', 'About', ''),
(2, 'settings', 'Settings', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_settings`
--

CREATE TABLE IF NOT EXISTS `love_admin_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `keywords` text COLLATE utf8_czech_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `copyright` text COLLATE utf8_czech_ci NOT NULL,
  `theme` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabulky `love_admin_user`
--

CREATE TABLE IF NOT EXISTS `love_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `love_admin_user`
--

INSERT INTO `love_admin_user` (`id`, `username`, `password`, `rank`, `last_login`) VALUES
(1, 'Kapa', 'kapalina', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `love_content`
--

CREATE TABLE IF NOT EXISTS `love_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `plugin_id` int(11) NOT NULL,
  `plugin_instance_id` int(11) NOT NULL,
  `static_data` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `love_content`
--

INSERT INTO `love_content` (`id`, `page_id`, `module_id`, `plugin_id`, `plugin_instance_id`, `static_data`, `rank`) VALUES
(1, 1, 2, 1, 5, '', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `love_module`
--

CREATE TABLE IF NOT EXISTS `love_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `love_module`
--

INSERT INTO `love_module` (`id`, `name`) VALUES
(1, 'header'),
(2, 'content'),
(3, 'footer');

-- --------------------------------------------------------

--
-- Struktura tabulky `love_page`
--

CREATE TABLE IF NOT EXISTS `love_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `theme` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `love_page`
--

INSERT INTO `love_page` (`id`, `name`, `title`, `theme`) VALUES
(1, 'homepage', 'Homepage', ''),
(2, 'contact', '', 'contact_template'),
(3, 'asda', '', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `love_plugin`
--

CREATE TABLE IF NOT EXISTS `love_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `love_plugin`
--

INSERT INTO `love_plugin` (`id`, `name`) VALUES
(1, 'StaticContent');

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

-- --------------------------------------------------------

--
-- Struktura tabulky `love_settings`
--

CREATE TABLE IF NOT EXISTS `love_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `keywords` text COLLATE utf8_czech_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `copyright` text COLLATE utf8_czech_ci NOT NULL,
  `theme` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `love_settings`
--

INSERT INTO `love_settings` (`id`, `title`, `description`, `keywords`, `author`, `copyright`, `theme`) VALUES
(1, 'Beruska', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `love_theme`
--

CREATE TABLE IF NOT EXISTS `love_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

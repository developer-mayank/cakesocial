-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 03. Oktober 2010 um 22:19
-- Server Version: 5.1.33
-- PHP-Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cakesocial`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity_type` tinyint(4) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`entity_type`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `albums`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buddies`
--

DROP TABLE IF EXISTS `buddies`;
CREATE TABLE IF NOT EXISTS `buddies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  `accept` tinyint(3) NOT NULL DEFAULT '0',
  `type` tinyint(4) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`friend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `buddies`
--

INSERT INTO `buddies` (`id`, `user_id`, `friend_id`, `accept`, `type`, `created`, `updated`) VALUES
(1, 1, 2, 0, NULL, 1286136952, 1286136952);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(12) unsigned NOT NULL,
  `region_id` int(12) unsigned NOT NULL,
  `country_id` int(12) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rid` (`region_id`),
  KEY `cid` (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Daten für Tabelle `cities`
--

INSERT INTO `cities` (`id`, `region_id`, `country_id`, `name`, `count`) VALUES
(3161, 3160, 3159, 'Russian Federation City', 0),
(5683, 5682, 5681, 'United States City', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(12) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `alpha2` char(2) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `prio` tinyint(3) unsigned NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `countries`
--

INSERT INTO `countries` (`id`, `name`, `name_en`, `alpha2`, `count`, `prio`) VALUES
(3159, 'Россия', 'Russian Federation', 'RU', 615, 1),
(5681, 'США', 'United States', 'US', 0, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `favorite_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favorite_id`) VALUES
(1, 1000, 1000),
(2, 1001, 1000),
(3, 1003, 1000),
(4, 1000, 1003),
(5, 1000, 1011),
(6, 1093, 1093),
(7, 1011, 1039),
(8, 1112, 1057),
(9, 1126, 1126),
(10, 1126, 1129),
(11, 1048, 1048),
(12, 1363, 1011),
(13, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `entity_type` tinyint(2) unsigned DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `forums`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `forum_posts`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `src` varchar(50) NOT NULL,
  `describe` varchar(255) NOT NULL,
  `voice` int(11) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `fotos`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geos`
--

DROP TABLE IF EXISTS `geos`;
CREATE TABLE IF NOT EXISTS `geos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `date_an` year(4) DEFAULT NULL,
  `date_end` year(4) DEFAULT NULL,
  `created` int(11) NOT NULL DEFAULT '1262528642',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`,`region_id`,`city_id`),
  KEY `type` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `geos`
--

INSERT INTO `geos` (`id`, `country_id`, `region_id`, `city_id`, `user_id`, `type`, `date_an`, `date_end`, `created`) VALUES
(1, 3159, 3160, 3161, 1, 1, NULL, NULL, 1286134636),
(2, 5681, 5682, 5683, 2, 1, NULL, NULL, 1286135857),
(3, 5681, 5682, 5683, 1, 0, 2009, 2008, 1286136702);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'title',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `admin_id`, `img`, `name`, `purpose`, `title`, `created`, `modified`) VALUES
(1, 1, '', 'group_user', '', 'title', '2008-11-22 22:11:55', '2008-11-22 22:11:55'),
(2, 0, '', 'group 1', '', 'title', '2010-10-03 22:12:15', '2010-10-03 22:12:15');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups_roles`
--

DROP TABLE IF EXISTS `groups_roles`;
CREATE TABLE IF NOT EXISTS `groups_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`,`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `groups_roles`
--

INSERT INTO `groups_roles` (`id`, `user_id`, `role_id`, `group_id`, `group_type`) VALUES
(1, 1037, 2, 2, 2),
(2, 1000, 2, 3, 2),
(3, 1057, 2, 4, 2),
(4, 1011, 2, 5, 2),
(5, 1011, 2, 6, 2),
(6, 1011, 2, 7, 2),
(7, 1121, 2, 8, 2),
(8, 1000, 2, 9, 2),
(9, 1217, 2, 10, 2),
(10, 1000, 2, 11, 2),
(11, 1000, 2, 12, 2),
(12, 1386, 2, 13, 2),
(13, 1386, 2, 14, 2),
(14, 1384, 2, 15, 2),
(16, 1041, 2, 17, 2),
(17, 1622, 2, 18, 2),
(18, 1650, 2, 19, 2),
(19, 1832, 2, 20, 2),
(20, 1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups_users`
--

DROP TABLE IF EXISTS `groups_users`;
CREATE TABLE IF NOT EXISTS `groups_users` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accept` int(11) NOT NULL DEFAULT '0',
  KEY `accept` (`accept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `groups_users`
--

INSERT INTO `groups_users` (`group_id`, `user_id`, `accept`) VALUES
(1, 1, 0),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guests`
--

DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT '0',
  `updated` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `guests`
--

INSERT INTO `guests` (`id`, `user_id`, `guest_id`, `updated`, `created`) VALUES
(1, 1, NULL, 1286135208, 1286135208),
(2, 2, 1, 1286136950, 1286136950);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `invitations`
--

DROP TABLE IF EXISTS `invitations`;
CREATE TABLE IF NOT EXISTS `invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `inviter_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `updated` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `invitations`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user1_id` (`user1_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `user1_id`, `message`, `is_read`, `created`) VALUES
(1, 1, 2, 'hallo', 0, 1286136961);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `family` tinyint(3) unsigned DEFAULT NULL,
  `children` tinyint(4) NOT NULL,
  `height` tinyint(4) unsigned DEFAULT NULL,
  `fname_2` varchar(20) NOT NULL DEFAULT ' ',
  `sname_2` varchar(20) NOT NULL DEFAULT ' ',
  `sname_3` varchar(20) NOT NULL DEFAULT ' ',
  `email_2` varchar(25) DEFAULT NULL,
  `skype` varchar(20) DEFAULT NULL,
  `count_views` int(11) NOT NULL DEFAULT '0',
  `voll` tinyint(3) unsigned NOT NULL DEFAULT '10',
  `ip` varchar(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `profiles`
--

INSERT INTO `profiles` (`id`, `title`, `purpose`, `family`, `children`, `height`, `fname_2`, `sname_2`, `sname_3`, `email_2`, `skype`, `count_views`, `voll`, `ip`) VALUES
(2, '', '', NULL, 0, NULL, ' ', ' ', ' ', NULL, NULL, 0, 10, '127.0.0.1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(12) unsigned NOT NULL,
  `country_id` int(12) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `regions`
--

INSERT INTO `regions` (`id`, `country_id`, `name`, `count`) VALUES
(3160, 3159, 'Russian Federation  region', 0),
(5682, 5681, 'United States region', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(20) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL DEFAULT 'fname',
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_online` tinyint(4) NOT NULL DEFAULT '0',
  `bdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `img`, `created`, `updated`, `name`, `sname`, `fname`, `username`, `password`, `email`, `is_active`, `is_online`, `bdate`) VALUES
(1, '', 1286134636, 1286136961, 'user1', 'user1', 'fname', '', '47ec27c54680e05f98f7930e75c194e3931178c6', 'user1@user1.com', 1, 1, '1990-05-01'),
(2, '', 1286135857, 1286135857, 'user2', 'user2', 'fname', '', 'dc9b90e7682314d4a7f6884b3825c6c21dd6990a', 'user2@user2.net', 1, 0, '0000-00-00');

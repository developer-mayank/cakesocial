-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 22. November 2008 um 22:37
-- Server Version: 5.0.51
-- PHP-Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Datenbank: `cakesocial`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `fotos`
-- 

CREATE TABLE `fotos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `src` varchar(50) NOT NULL,
  `describe` varchar(255) NOT NULL,
  `voice` int(11) NOT NULL,
  `album` varchar(255) default NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Daten für Tabelle `fotos`
-- 

INSERT INTO `fotos` VALUES (1, 1, '1227388254.jpg', '', 0, NULL, 1227388255, 0);
INSERT INTO `fotos` VALUES (2, 1, '1227388268.jpg', 'Описание', 0, NULL, 1227388269, 0);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `groups`
-- 

CREATE TABLE `groups` (
  `id` int(11) NOT NULL auto_increment,
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Daten für Tabelle `groups`
-- 

INSERT INTO `groups` VALUES (1, 1, 'group_user', '2008-11-22 22:11:55', '2008-11-22 22:11:55');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `groups_users`
-- 

CREATE TABLE `groups_users` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accept` int(11) NOT NULL default '0',
  KEY `accept` (`accept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Daten für Tabelle `groups_users`
-- 

INSERT INTO `groups_users` VALUES (1, 1, 0);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `guests`
-- 

CREATE TABLE `guests` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Daten für Tabelle `guests`
-- 

INSERT INTO `guests` VALUES (1, 1, 1, 1215868201);
INSERT INTO `guests` VALUES (2, 1, 2, 1215868258);
INSERT INTO `guests` VALUES (3, 5, 5, 1223013904);
INSERT INTO `guests` VALUES (4, 5, 4, 1223052028);
INSERT INTO `guests` VALUES (5, 1, 5, 1223052543);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `img` varchar(20) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_active` tinyint(3) unsigned NOT NULL default '1',
  `bdate` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Daten für Tabelle `users`
-- 

INSERT INTO `users` VALUES (1, '', 1227387873, 1227387873, 'Yuri', '', 'user', 'ef0f2017621ee635a0565e0f8a3d60b5288a1807', '7278181@gmail.com', 1, '1991-11-22');
INSERT INTO `users` VALUES (2, '', 1227388470, 1227388470, 'test', 'test', 'user1', '47ec27c54680e05f98f7930e75c194e3931178c6', '7278181@gmail.com', 1, '1991-11-22');

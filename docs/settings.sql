-- phpMyAdmin SQL Dump
-- version 2.9.0
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 07, 2009 at 11:40 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5
-- 
-- Database: `gershbeta`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `gersh_settings_settings`
-- 

CREATE TABLE `gersh_settings_settings` (
  `id` int(10) NOT NULL auto_increment,
  `key` varchar(250) collate utf8_bin default NULL,
  `value` varchar(500) collate utf8_bin default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=47 ;

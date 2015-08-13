-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2015 at 07:00 PM
-- Server version: 5.5.35
-- PHP Version: 5.5.27-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample-core-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `adr_addresses`
--

CREATE TABLE IF NOT EXISTS `adr_addresses` (
  `adr_i_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adr_s_street` varchar(100) NOT NULL DEFAULT '',
  `adr_s_city` varchar(25) NOT NULL DEFAULT '',
  `adr_s_state` varchar(25) NOT NULL DEFAULT '',
  `adr_s_zip` varchar(10) NOT NULL DEFAULT '',
  `adr_d_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adr_d_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adr_d_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`adr_i_id`),
  UNIQUE KEY `unique_index` (`adr_s_street`,`adr_s_city`,`adr_s_state`),
  KEY `adr_d_created_at` (`adr_d_created_at`)
) ENGINE=InnoDB;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

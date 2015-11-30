-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 11:10 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tastebuzz`
--
CREATE DATABASE IF NOT EXISTS `tastebuzz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tastebuzz`;

-- --------------------------------------------------------

--
-- Table structure for table `dinfo`
--

CREATE TABLE IF NOT EXISTS `dinfo` (
  `id` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img_addr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dtraits`
--

CREATE TABLE IF NOT EXISTS `dtraits` (
  `traitnum` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `trait` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userprefs`
--

CREATE TABLE IF NOT EXISTS `userprefs` (
  `prefnum` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL,
  `pref` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userprefs`
--

INSERT INTO `userprefs` (`prefnum`, `id`, `pref`) VALUES
(1, 4, 'tasty'),
(2, 4, 'yummy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pword`, `admin`) VALUES
(1, 'john', 'doe', 'jd', '$2y$10$D5ykpCpAKaN1krsPmSto0O93mEqZNCjdaD8nawAgRI2JQnGsB6V1i', 0),
(2, 'Jim', 'John', 'JimmyJon', '$2y$10$d8VVQ6D7KcAG2rb4UkHPnOFkP24WTDl4HAFGYZ4KPRuzdTBES90rK', 0),
(3, 'Ned', 'Ded', 'nd', '$2y$10$wZsATs3z2NgCPJuWtYdcJOqrEN1IYEDLSjDrHhFMwpX5r0nsW5Kv.', 0),
(4, 'ezra', 'dowd', 'testemail', '$2y$10$9v.pzg4WhLrRIlTqKcrTnure.dm3ZBmViiDy0/Q2Q9.bEgbEnuZMW', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dinfo`
--
ALTER TABLE `dinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtraits`
--
ALTER TABLE `dtraits`
  ADD PRIMARY KEY (`traitnum`);

--
-- Indexes for table `userprefs`
--
ALTER TABLE `userprefs`
  ADD PRIMARY KEY (`prefnum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dinfo`
--
ALTER TABLE `dinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtraits`
--
ALTER TABLE `dtraits`
  MODIFY `traitnum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userprefs`
--
ALTER TABLE `userprefs`
  MODIFY `prefnum` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

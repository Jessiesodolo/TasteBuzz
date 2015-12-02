-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 12:58 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `dinfo`
--

CREATE TABLE IF NOT EXISTS `dinfo` (
  `id` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img_addr` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinfo`
--

INSERT INTO `dinfo` (`id`, `dname`, `description`, `img_addr`) VALUES
(1, 'Long Island Iced Tea', 'The Long Island Iced Tea is the basis of many elaborate mixed-drinks. It dates to the 70''s, named after the continental U.S largest long island in New York.', 'resources/images/longisland.jpg'),
(2, 'Margarita', 'The perfect margarita is all about fresh, crisp flavors barely tempered by triple sec and sugar. After testing all the ratios, this is the one we reach for.', 'resources/images/margarita.jpg'),
(3, 'Whiskey Sour', 'You just want a nice, easy drink, one that''s as loyal and friendly as an old dog, that doesn''t mind if you pad around the living room in your socks or lie back on the couch watching shows you''d never dare admit you enjoy', 'resources/images/whiskey sour.jpg'),
(4, 'Apple Martini', 'The Martini is a cocktail made with gin and vermouth, and garnished with an olive or a lemon twist. Over the years, the Martini has become one of the best-known mixed alcoholic beverages.', 'resources/images/martini.jpg'),
(5, 'Kamikaze', 'Born in the 1970s during the days of disco, the Kamikaze is an easy-to-make shooter that''s perfect for knocking back quickly and getting the party started.', 'resources/images/kamikaze.jpg'),
(6, 'Angry Balls', 'Apple and Cinnamon are a match made in heaven, so it’s no surprise this Angry Orchard and Fireball drink is gaining in popularity quickly.', 'resources/images/angry_balls.jpg'),
(7, 'Angry Orchard', 'This crisp and refreshing cider mixes the sweetness of the apples with a subtle dryness for a balanced cider tast', 'resources/images/orchard.jpg'),
(8, 'Pumpkin Ale', 'Often released as a fall seasonal, Pumpkin Ales are quite varied. Some brewers opt to add hand-cut pumpkins and drop them in the mash, while others use puree or pumpkin flavoring. These beers also tend to be spiced with pumpkin pie spices, like: ground ginger, nutmeg, cloves, cinnamon, and allspice', 'resources/images/pumpkin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dtraits`
--

CREATE TABLE IF NOT EXISTS `dtraits` (
  `traitnum` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `trait` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dtraits`
--

INSERT INTO `dtraits` (`traitnum`, `id`, `trait`) VALUES
(1, 1, 'Mixed Drink'),
(2, 1, 'Sweet'),
(3, 2, 'Fruity'),
(4, 3, 'Whiskey'),
(5, 3, 'Sour'),
(6, 4, 'Fruity'),
(7, 5, 'Mixed'),
(8, 5, 'Fruity'),
(9, 6, 'Fruity'),
(10, 6, 'Spicy'),
(11, 7, 'Cider'),
(12, 7, 'Sweet'),
(13, 6, 'Ale'),
(14, 8, 'Ale'),
(15, 8, 'Flavored');

-- --------------------------------------------------------

--
-- Table structure for table `userprefs`
--

CREATE TABLE IF NOT EXISTS `userprefs` (
  `prefnum` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL,
  `pref` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userprefs`
--

INSERT INTO `userprefs` (`prefnum`, `id`, `pref`) VALUES
(1, 4, 'tasty'),
(2, 4, 'yummy'),
(3, 3, 'Bitter'),
(4, 5, 'Bitter'),
(5, 1, 'Fruity'),
(6, 2, 'Sour');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pword`, `admin`) VALUES
(1, 'john', 'doe', 'jd', '$2y$10$D5ykpCpAKaN1krsPmSto0O93mEqZNCjdaD8nawAgRI2JQnGsB6V1i', 0),
(2, 'Jim', 'John', 'JimmyJon', '$2y$10$d8VVQ6D7KcAG2rb4UkHPnOFkP24WTDl4HAFGYZ4KPRuzdTBES90rK', 0),
(3, 'Ned', 'Ded', 'nd', '$2y$10$wZsATs3z2NgCPJuWtYdcJOqrEN1IYEDLSjDrHhFMwpX5r0nsW5Kv.', 0),
(4, 'ezra', 'dowd', 'testemail', '$2y$10$9v.pzg4WhLrRIlTqKcrTnure.dm3ZBmViiDy0/Q2Q9.bEgbEnuZMW', 0),
(5, 'jessie', 'sodolo', 'sodolj@aol.com', '$2y$10$GBpNP.JKv6atllmPIGu0P.Jb3uIFX9v63NiExhAvtlVvTOL2NzKHu', 0);

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
  ADD PRIMARY KEY (`traitnum`),
  ADD KEY `dtraits` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dtraits`
--
ALTER TABLE `dtraits`
  MODIFY `traitnum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `userprefs`
--
ALTER TABLE `userprefs`
  MODIFY `prefnum` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dtraits`
--
ALTER TABLE `dtraits`
  ADD CONSTRAINT `dtraits_ibfk_1` FOREIGN KEY (`id`) REFERENCES `dinfo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

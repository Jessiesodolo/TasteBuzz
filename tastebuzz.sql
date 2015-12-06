-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 10:50 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinfo`
--

INSERT INTO `dinfo` (`id`, `dname`, `description`, `img_addr`) VALUES
(1, 'Long Island Iced Tea', 'The Long Island Iced Tea is the basis of many elaborate mixed-drinks. It dates to the 70''s, named after the continental U.S largest long island in New York.', 'resources/images/longisland.jpg'),
(2, 'Margarita', 'The perfect margarita is all about fresh, crisp flavors barely tempered by triple sec and sugar. After testing all the ratios, this is the one we reach for.', 'resources/images/margarita.jpg'),
(3, 'Whiskey Sour', 'You just want a nice, easy drink, one that''s as loyal and friendly as an old dog, that doesn''t mind if you pad around the living room in your socks or lie back on the couch watching shows you''d never dare admit you enjoy', 'resources/images/whiskey sour.jpg'),
(4, 'Apple Martini', 'The Martini is a cocktail made with gin and vermouth, and garnished with an olive or a lemon twist. Over the years, the Martini has become one of the best-known mixed alcoholic beverages.', 'resources/images/martini.jpg'),
(5, 'Kamikaze', 'Born in the 1970s during the days of disco, the Kamikaze is an easy-to-make shooter that''s perfect for knocking back quickly and getting the party started.', 'resources/images/kamikaze.jpg'),
(7, 'Angry Orchard', 'This crisp and refreshing cider mixes the sweetness of the apples with a subtle dryness for a balanced cider tast', 'resources/images/orchard.jpg'),
(8, 'Pumpkin Ale', 'Often released as a fall seasonal, Pumpkin Ales are quite varied. Some brewers opt to add hand-cut pumpkins and drop them in the mash, while others use puree or pumpkin flavoring. These beers also tend to be spiced with pumpkin pie spices, like: ground ginger, nutmeg, cloves, cinnamon, and allspice', 'resources/images/pumpkin.jpg'),
(9, 'Mai Tai', 'The Mai Tai is one of the iconic rum drinks to come out of the tiki scene. This classic rum cocktail is too much fun to pass up, especially on those hot days of summer.\n\nThis is a drink with a great story and it all began in 1944 at Trader Vic''s original location in Oakland, California.\n\nVictor Bergeron, one of the founders of the tiki cocktail culture, was very well known for his amazing rum cocktails.\n\nOne day he mixed up a new drink using "...17-year old Jamaican J. Wray Nephew rum, added fresh lime, some Orange Curacao from Holland, a dash of Rock Candy syrup, and a dollop of French Orgeat..." with lime and mint and served it to a friend visiting from Tahiti. After that first drink, the Tahitian phrase "Mai Tai - Roa Ae" was exclaimed and Bergeron had a name for his drink.', 'resources/images/mai-tai.jpg'),
(10, 'Bloody Mary', 'Few things are better in the morning or on a cold day than the spicy tomato flavor of a Bloody Mary. Whether you are enjoying it as a brunch cocktail, enjoying the morning game, or searching for a hangover cure, this is one of the most popular cocktails you will find and it is very easy to make it your own.\n\nThe Bloody Mary can be as spicy or mild as you like. You can switch out the liquor or skip it all together and enjoy a Virgin Mary.', 'resources/images/bloody mary.jpg'),
(11, 'Scotch & Soda', 'It seems like such an easy and obvious drink that it barely constitutes a recipe, but the Scotch and Soda has a purpose and it is a popular way for many drinkers to enjoy their favorite Scotch. The concept here is to water down a Scotch without destroying the flavors of the whiskey, making the drink last a little longer, go down a little smoother, and make it a little more refreshing. It is a great way to enjoy Scotch on warmer days.', 'resources/images/Scotch-Soda-Cocktail.jpg'),
(12, 'Lemon Drop', 'These sweet and sour shooters are meant to make you pucker, so get ready.\n\nOne popular way to make Lemon Drop shots is very similar to tequila shots in which it is more about the process than mixing anything together. You will begin with a shot of chilled vodka, then quickly take a bite of a sugar-coated lemon to get that sour kick that is the drink''s namesake.\n\nClear vodka is a popular choice, though you may also consider a lemon or citrus vodka as well.\n\nChilled vodka will make the shot go down a bit easier. Either stick the bottle in the freezer for an hour or two or shake a shot with ice and strain it into the shot glass. Shaking will dilute it slightly, but it is not enough to make a difference when we''re talking about straight vodka.', 'resources/images/LemonDrop-Shooter.jpg'),
(13, 'Mojito', 'The Mojito has risen in the ranks to become one of the most popular cocktails. It is a simple and delightful drink that should be on every drinker''s list of cocktails that must be tasted.\n\nAs with many of the best cocktails, the Mojito is easy to make. It requires just a handful of ingredients, most of which are fresh and may even be right there in your kitchen. The Mojito is the perfect beginner''s drink, even for those without a fully stocked bar.\n\nRum, mint, and lime are the essential elements for a great Mojito. The lime and mint should be fresh and the rum should be your favorite top-shelf light rum.', 'resources/images/Mojito.jpg'),
(14, 'Bellini', 'The Bellini is a popular sparkling wine cocktail and a perfect way to make your favorite wine a little peachy. The recipe is easy and the drink is a lot of fun.\n\nThe story behind the Bellini is that is was created in the 1930''s or 40''s at Harry''s Bar in Venice, Italy by bartender Giuseppe Cipriani. It was named after the Italian renaissance painter, Giovanni Bellini.\n\nOriginally, the Bellini used sparkling Italian wine, particularly prosecco, and it is still made that way in Italy. Elsewhere, it is often made with Champagne, though most any sparkling wine will do.', 'resources/images/Bellini.jpg'),
(15, 'Wine Spritzer', 'A Wine Spritzer is a classic, and very easy, wine drink. It is a great way to transform any white wine into a sparkling wine and is a nice drink to serve at a brunch, bridal shower, book club, or any small, intimate gathering.', 'resources/images/Wine-Spritzer.jpg'),
(16, 'Mimosa', 'The Mimosa is a very simple yet delightful drink that makes an excellent brunch cocktail.\n\nYou can vary this recipe a little by adding a splash of grenadine, adding a little Cognac, or substituting Grand Mariner for the triple sec. However you decide to mix up the bubbly here, it will be a sure hit any time you entertain.', 'resources/images/Mimosa.jpg'),
(17, 'Arnold Palmer', 'An Arnold Palmer is a simple mocktail that mixes two favorite summer beverages.\n\nThe mix of tea and lemonade is a perfect match and it is so easy, particularly if you regularly stock the two in your refrigerator. The drink gets even better if you make both ingredients yourself.\n\nThe other thing that I love about the Arnold Palmer is that almost everyone knows how to make it. This is the one non-alcoholic mixed drink that you can order at almost any bar and restaurant and never be disappointed. It''s perfect for a casual lunch, for the non-drinker and the designated driver.', 'resources/images/ArnoldPalmer.jpg'),
(18, 'Shirley Temple', 'The Shirley Temple is one of the great drinks of all time. It is a simple, non-alcoholic mixed drink that is popular enough so that you can order it for yourself or the kids at almost any restaurant you visit.\n\nThe recipe is very easy and it is a nice way to shake up your soda routine at home.\n\nTo make a Shirley Temple, you will simply need three ingredients: two light sodas and grenadine to add a fruity flavor. The combination is fantastic and refreshing, and it is one of the best soda fountain drinks you will have.\n\nThis homemade soda recipe was one of the original ''mocktails'' and, of course, it was named after the famous child star. Shirley Temple left a legacy beyond the movies and this fantastic mixed drink is just one of them.', 'resources/images/shirley-temple.jpg'),
(19, 'Virgin Mary', 'As a non-alcoholic version of the Bloody Mary, the Virgin Mary is a tomato juice drink that you can drink anytime. It''s the ultimate spicy drink for healthy breakfast or brunch that you can adapt to your  taste.\n\nYou can also make this with clamato juice for a variation of a Bloody Caesar.', 'resources/images/virginmary.jpg'),
(21, 'Screwdriver', 'Few mixed drinks are as easy as the popular Screwdriver. It is not only an essential drink that everyone should know and one of the best brunch drinks, but it lends itself to experimentation and improvement.\n\nThe Screwdriver is, quite simply, vodka and orange juice. There is no mystery or secret ingredients and all you need to do is pour a shot of vodka and fill your glass with OJ.', 'resources/images/screwdriver-cocktail.jpg'),
(22, 'Rusty Nail', 'The Rusty Nail is the ultimate in Scotch cocktails and if you are interested in that style of whiskey, this is a drink you should be familiar with.\n\nThe cocktail is very simple and is the ideal drink of choice for any Scotch lover. In it you will simply mix Scotch and Drambuie over ice. It is designed to be a sophisticated, slow-sipping drink and in that regard it is one of the best you will find.', 'resources/images/rusty-nail-cocktail.jpg'),
(23, 'Martini', 'The classic Martini is one of the most iconic cocktails and should certainly be on every bartenders list of drinks to know. Though there have been many martinis created, there is only one Martini and few drinks are better than this one.\n\nThere is also no mystery to the classic Gin Martini. It is, quite simply, gin and dry vermouth, however, personal preferences among martini lovers does make it a little more complicated. The Martini also has a number of common customizations.\n\nNo longer can you walk into a cocktail lounge and simply say "I''ll have a Martini" and it often becomes a game of twenty questions: Gin or vodka? What brand of gin (or vodka)? Dry, bone-dry, or perfect? Shaken or stirred? An olive or a twist? What kind of olives? One drink, so many options.', 'resources/images/martini.jpg'),
(24, 'Lemon Drop Martini', 'Pucker up for this easy vodka cocktail that makes a great dessert drink, is extremely popular, and has potential to take on other flavors.\n\nThe Lemon Drop Martini is one of those great vodka martinis that have become a hit of the modern martini menu. It has also been the inspiration for a number of ready-to-drink variations, though the recipe is so easy that those are not needed.', 'resources/images/LemonDropMartini.jpg'),
(26, 'Metropolitan', 'The Metropolitan sounds and looks like a classic cocktail, one as old as the Manhattan or Martinez, and it is often called a Brandy Manhattan or a Harvard, though those tend to skip the syrup.\n\nA Metropolitan recipe appears in the 1935 The Old Waldorf-Astoria Bar Book, but it calls for 2/3 Manhattan bitters and 1/3 vermouth. While that sounds like an interesting mix, the more common brandy recipe has been noted with the year 1900.', 'resources/images/metropolitan-cocktail.jpg'),
(27, 'Cosmopolitan', 'The classic Cosmopolitan is a very simple drink and it quickly became one of the most popular cocktails of all time. It''s peak was in the 1990''s because of its multiple appearances in the HBO show, Sex and the City, though the story begins a little earlier.\n\nMost bartenders know how to make this light, fruity martini, making it a great choice for a casual night out. There are hundreds of variations on the Cosmo, some use more or less cranberry juice, some triple sec instead of Cointreau, and some include citrus vodka. It''s all a matter of personal preference.', 'resources/images/Cosmopolitan.jpg'),
(28, 'Old-fashioned', 'The Old-fashioned is a classic whiskey cocktail that has been served since around 1880 at the Pendennis Club in Louisville, Kentucky and is the first drink referred to as a cocktail. It is the perfect ideal of what a cocktail should contain: a spirit, a sweet, a bitter, a sour, and water.', 'resources/images/OldFashioned.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dtraits`
--

CREATE TABLE IF NOT EXISTS `dtraits` (
  `traitnum` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `trait` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dtraits`
--

INSERT INTO `dtraits` (`traitnum`, `id`, `trait`) VALUES
(1, 1, 'Mixed'),
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
(15, 8, 'Flavored'),
(16, 9, 'Sweet'),
(17, 9, 'Sour'),
(18, 9, 'Fruity'),
(19, 9, 'Rum'),
(20, 9, 'Cocktail'),
(21, 10, 'Spicy'),
(22, 10, 'Cocktail'),
(23, 11, 'Whisky'),
(24, 11, 'Soda'),
(25, 12, 'Sweet'),
(26, 12, 'Sour'),
(27, 12, 'Vodka'),
(28, 13, 'Cocktail'),
(29, 13, 'Rum'),
(30, 13, 'Sweet'),
(31, 13, 'Soda'),
(32, 13, 'Mint'),
(33, 14, 'Cocktail'),
(34, 14, 'Fruity'),
(35, 14, 'Wine'),
(36, 15, 'Wine'),
(37, 15, 'Soda'),
(38, 16, 'Cocktail'),
(39, 16, 'Fruity'),
(40, 16, 'Sweet'),
(41, 17, 'Mocktail'),
(42, 17, 'Fruity'),
(43, 18, 'Soda'),
(44, 18, 'Fruity'),
(45, 18, 'Sweet'),
(46, 18, 'Mocktail'),
(47, 19, 'Mocktail'),
(48, 19, 'Spicy'),
(49, 20, 'Fruity'),
(50, 20, 'Sweet'),
(51, 21, 'Vodka'),
(52, 21, 'Fruity'),
(53, 21, 'Sweet'),
(54, 22, 'Whisky'),
(55, 22, 'Sweet'),
(56, 23, 'Gin'),
(57, 23, 'Bitter'),
(58, 24, 'Vodka'),
(59, 24, 'Sweet'),
(60, 24, 'Fruity'),
(61, 25, 'Whisky'),
(62, 25, 'Bitter'),
(63, 26, 'Brandy'),
(64, 26, 'Sweet'),
(65, 26, 'Bitter'),
(66, 27, 'Vodka'),
(67, 27, 'Fruity'),
(68, 27, 'Sweet'),
(69, 28, 'Whisky'),
(70, 28, 'Sweet'),
(71, 28, 'Bitter');

-- --------------------------------------------------------

--
-- Table structure for table `userprefs`
--

CREATE TABLE IF NOT EXISTS `userprefs` (
  `prefnum` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL,
  `pref` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userprefs`
--

INSERT INTO `userprefs` (`prefnum`, `id`, `pref`) VALUES
(1, 4, 'Sweet'),
(2, 4, 'Spicy'),
(3, 3, 'Bitter'),
(4, 5, 'Bitter'),
(5, 1, 'Fruity'),
(6, 2, 'Sour'),
(7, 6, 'Mocktail'),
(15, 5, 'Vodka');

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
(5, 'Christopher', 'Renus', 'cmrenus@gmail.com', '$2y$10$Ok/m2E/Zj.h9OjlBUfOc..NWe2iKd7R24DXgwCQ6IcgB40wEctrji', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `dtraits`
--
ALTER TABLE `dtraits`
  MODIFY `traitnum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `userprefs`
--
ALTER TABLE `userprefs`
  MODIFY `prefnum` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
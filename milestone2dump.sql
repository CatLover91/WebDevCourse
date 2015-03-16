-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2015 at 04:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ngcs418`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`id` int(6) unsigned NOT NULL,
  `answerer_id` int(6) unsigned NOT NULL,
  `asked_id` int(6) unsigned NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `value` int(7) NOT NULL DEFAULT '0',
  `best` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answerer_id`, `asked_id`, `title`, `content`, `value`, `best`) VALUES
(1, 15, 1, 'Omg dude', 'whatta nerd', 0, 0),
(2, 5, 1, '???', 'I think u love cats too much', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(6) unsigned NOT NULL,
  `asker_id` int(6) unsigned NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `best_id` int(6) unsigned DEFAULT NULL,
  `value` int(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `asker_id`, `title`, `content`, `best_id`, `value`) VALUES
(1, 13, '*holds a cat’s paw*', '*cat desperately tries to pull away*', NULL, 0),
(2, 1, 'Everyone draw a bug girl', 'Everyone draw a bug girl and make lore about their species that would fit into a fantasy swords and bows kinda setting.\r\n\r\nI wanna see what everyone can come up with.\r\n\r\nAnd if you can’t draw or don’t want to then just describe them and I might draw them myself.', NULL, 0),
(3, 8, 'Despite Twilight’s flaws', 'It has these kickass supporting characters with these fascinating back stories and instead we have to pay attention to this truly boring couple instead of hearing about Jasper fighting in a vampire war, or Alice as a psychic girl in a 1920’s mental institution, Or Leah as the ONLY BIOLOGICALLY FEMALE WEREWOLF IN THE WORLD, or that other vampire baby', NULL, 0),
(4, 15, '"why are you dipping your', '"why are you dipping your ipod in a wine glass full of dish soap"\r\nme: aesthetic', NULL, 0),
(5, 5, 'How to dragon.', 'Be lizard\r\nBreath hot orange\r\nGo flap flap', NULL, 0),
(6, 5, 'How to Phoenix.', 'Majestic Birb\r\nWings of hot\r\nHoly shit you’re on fire', NULL, 0),
(7, 5, 'How to Ogre.', 'Be a rockstar\r\nGet your game on\r\nGet paid', NULL, 0),
(8, 3, 'RIP, boiled water', 'You will be mist.', NULL, 0),
(9, 13, 'cat:walks by', 'me:what a cute cat\r\ncat:sneezes\r\nme:this cat is amazing\r\ncat:literally lays around doing nothing of note\r\nme:i have never loved anything more than i love this cat', NULL, 0),
(10, 14, 'I am a level-5 vegan.', 'I won''t eat anything that casts a shadow.', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(6) unsigned NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'pallen', 'm$ftw'),
(2, 'tblee', '0mGth3WeB!'),
(3, 'bourne', 'bash_$'),
(4, 'edsger', 'st1ll1l11lG0O2'),
(5, 'wgates', '5il3M4X_m$4L'),
(6, 'hopper', 'im4usn'),
(7, 'dknuth', 'tek!tex'),
(8, 'ada', 'wtf15b4b'),
(9, 'cmoore', 'moreM00R3!'),
(10, 'jresig', 'In0JS'),
(11, 'atanen', 'minix!minix'),
(12, 'linus', 'ilUvP3nGu1n5'),
(13, 'aturing', '1nfin1t3TAp3'),
(14, 'lwall', 'oysters&camels'),
(15, 'thewoz', '4daK1d5');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `user_id` int(6) unsigned NOT NULL,
  `q_o_a` tinyint(1) unsigned NOT NULL,
  `ref_id` int(6) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`), ADD KEY `answerer_id` (`answerer_id`,`asked_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`), ADD KEY `asker_id` (`asker_id`,`best_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
 ADD KEY `user_id` (`user_id`,`ref_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

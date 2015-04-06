-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 01:05 PM
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
CREATE DATABASE IF NOT EXISTS `ngcs418` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ngcs418`;
--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`id` int(6) unsigned NOT NULL,
  `user_id` int(6) unsigned NOT NULL,
  `question_id` int(6) unsigned NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `value` int(7) NOT NULL DEFAULT '0',
  `best` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `title`, `content`, `value`, `best`) VALUES
(1, 15, 1, 'Omg dude', 'whatta nerd', 0, 0),
(2, 5, 1, '???', 'I think u love cats too much', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE IF NOT EXISTS `connections` (
  `tags_id` int(6) unsigned NOT NULL,
  `question_id` int(6) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`tags_id`, `question_id`) VALUES
(1, 1),
(1, 9),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(6) unsigned NOT NULL,
  `user_id` int(6) unsigned NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `best_id` int(6) unsigned NOT NULL DEFAULT '0',
  `value` int(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `title`, `content`, `best_id`, `value`) VALUES
(1, 13, '*holds a cat’s paw*', '*cat desperately tries to pull away*', 2, 0),
(2, 1, 'Everyone draw a bug girl', 'Everyone draw a bug girl and make lore about their species that would fit into a fantasy swords and bows kinda setting.\r\n\r\nI wanna see what everyone can come up with.\r\n\r\nAnd if you can’t draw or don’t want to then just describe them and I might draw them myself.', 0, 0),
(3, 8, 'Despite Twilight’s flaws', 'It has these kickass supporting characters with these fascinating back stories and instead we have to pay attention to this truly boring couple instead of hearing about Jasper fighting in a vampire war, or Alice as a psychic girl in a 1920’s mental institution, Or Leah as the ONLY BIOLOGICALLY FEMALE WEREWOLF IN THE WORLD, or that other vampire baby', 0, 0),
(4, 15, '"why are you dipping your', '"why are you dipping your ipod in a wine glass full of dish soap"\r\nme: aesthetic', 0, 0),
(5, 5, 'How to dragon.', 'Be lizard\r\nBreath hot orange\r\nGo flap flap', 0, 0),
(6, 5, 'How to Phoenix.', 'Majestic Birb\r\nWings of hot\r\nHoly shit you’re on fire', 0, 0),
(7, 5, 'How to Ogre.', 'Be a rockstar\r\nGet your game on\r\nGet paid', 0, 0),
(8, 3, 'RIP, boiled water', 'You will be mist.', 0, 0),
(9, 13, 'cat:walks by', 'me:what a cute cat\r\ncat:sneezes\r\nme:this cat is amazing\r\ncat:literally lays around doing nothing of note\r\nme:i have never loved anything more than i love this cat', 0, 0),
(10, 14, 'I am a level-5 vegan.', 'I won''t eat anything that casts a shadow.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(6) unsigned NOT NULL,
  `content` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `content`) VALUES
(1, 'cats'),
(2, 'how to');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(6) unsigned NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `admin`) VALUES
(1, 'pallen', 'm$ftw', 0),
(2, 'tblee', '0mGth3WeB!', 0),
(3, 'bourne', 'bash_$', 1),
(4, 'edsger', 'st1ll1l11lG0O2', 0),
(5, 'wgates', '5il3M4X_m$4L', 0),
(6, 'hopper', 'im4usn', 0),
(7, 'dknuth', 'tek!tex', 0),
(8, 'ada', 'wtf15b4b', 0),
(9, 'cmoore', 'moreM00R3!', 0),
(10, 'jresig', 'In0JS', 0),
(11, 'atanen', 'minix!minix', 0),
(12, 'linus', 'ilUvP3nGu1n5', 0),
(13, 'aturing', '1nfin1t3TAp3', 0),
(14, 'lwall', 'oysters&camels', 0),
(15, 'thewoz', '4daK1d5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
`id` int(6) unsigned NOT NULL,
  `user_id` int(6) unsigned NOT NULL,
  `describes_type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `describes_id` int(6) unsigned NOT NULL,
  `positive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`), ADD KEY `answerer_id` (`user_id`,`question_id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
 ADD KEY `tags_id` (`tags_id`,`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`), ADD KEY `asker_id` (`user_id`,`best_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`describes_id`);

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
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

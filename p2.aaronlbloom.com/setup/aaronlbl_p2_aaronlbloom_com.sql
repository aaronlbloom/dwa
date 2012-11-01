-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2012 at 02:27 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aaronlbl_p2_aaronlbloom_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `hashtag_id` int(11) NOT NULL AUTO_INCREMENT,
  `hashtag` varchar(140) NOT NULL,
  `post_id` int(11) NOT NULL COMMENT 'fk joins to a post this hashtag is used on',
  PRIMARY KEY (`hashtag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`hashtag_id`, `hashtag`, `post_id`) VALUES
(1, 'badfeeling', 2),
(2, 'weakminds', 5),
(3, 'onlyhope', 6),
(4, 'onlyhope', 7),
(5, 'badfeeling', 9),
(6, 'moseisley', 10),
(7, 'force', 11),
(8, 'hyperspace', 12),
(9, 'hyperspace', 13),
(10, 'force', 14);

-- --------------------------------------------------------

--
-- Table structure for table `mentions`
--

CREATE TABLE IF NOT EXISTS `mentions` (
  `mention_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'fk joins to user being mentioned',
  `post_id` int(11) NOT NULL COMMENT 'fj joins to post mention is made in',
  PRIMARY KEY (`mention_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mentions`
--

INSERT INTO `mentions` (`mention_id`, `user_id`, `post_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 4, 6),
(4, 4, 6),
(5, 4, 7),
(6, 3, 8),
(7, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(500) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `poster` int(11) NOT NULL COMMENT 'user_id who created post',
  `reply_to` int(11) NOT NULL COMMENT 'user_id of who post is to, if it is a reply',
  PRIMARY KEY (`post_id`),
  KEY `post` (`post`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post`, `created`, `modified`, `poster`, `reply_to`) VALUES
(1, 'bought some new droids, hope they work out', 1351735680, 1351735680, 1, 0),
(2, 'I''ve got a bad feeling about this #<a href=''/posts/hash?input=badfeeling''>badfeeling</a>', 1351735732, 1351735732, 2, 0),
(3, '@<a href=''/posts/mentions?input=lskywalker''>lskywalker</a> Great, kid. Don''t get cocky', 1351735758, 1351735758, 2, 1),
(4, '@<a href=''/posts/mentions?input=lskywalker''>lskywalker</a> aren''t you a little short for a stormtrooper', 1351735893, 1351735893, 3, 1),
(5, 'these are not the droids you are looking for #<a href=''/posts/hash?input=weakminds''>weakminds</a>', 1351735957, 1351735957, 4, 0),
(7, '@<a href=''/posts/mentions?input=okenobi''>okenobi</a> help me obi-wan you''re our only hope #<a href=''/posts/hash?input=onlyhope''>onlyhope</a>', 1351736131, 1351736131, 3, 4),
(8, '@<a href=''/posts/mentions?input=plea''>plea</a> I’m Luke Skywalker, I’m here to rescue you. ', 1351736204, 1351736204, 1, 3),
(9, 'I''ve got a bad feeling about this #<a href=''/posts/hash?input=badfeeling''>badfeeling</a>', 1351736223, 1351736223, 1, 0),
(10, 'You will never find a more wretched hive of scum and villainy #<a href=''/posts/hash?input=moseisley''>moseisley</a>', 1351736280, 1351736280, 4, 0),
(11, ' I warn you not to underestimate my power. #<a href=''/posts/hash?input=force''>force</a>', 1351736474, 1351736474, 1, 0),
(13, 'Traveling through #<a href=''/posts/hash?input=hyperspace''>hyperspace</a> ain''t like dusting crops', 1351736586, 1351736586, 2, 0),
(14, 'Hey, @<a href=''/posts/mentions?input=lskywalker''>lskywalker</a> May the Force be with you #<a href=''/posts/hash?input=force''>force</a>', 1351736729, 1351736729, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) DEFAULT NULL,
  `user_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `country` varchar(256) DEFAULT NULL,
  `timezone` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `bio` varchar(750) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `user_name`, `last_name`, `first_name`, `token`, `password`, `country`, `timezone`, `website`, `bio`, `created`, `modified`) VALUES
(1, 'lskywalker@swu.com', 'lskywalker', 'Skywalker ', 'Luke', 'cb96e6795bddb7917f56eb852835f6a2f8797676', '590a91fc8af43321003acebcbbbda395941c0e4b', 'tatooine', NULL, '', 'new hope', 1351735492, 1351736412),
(2, 'hsolo@swu.com', 'hsolo', 'Solo ', 'Han', 'cbed7e2e868a4915a8df6396ef29e91075802395', '590a91fc8af43321003acebcbbbda395941c0e4b', '', NULL, '', 'Made the Kessel Run in less than twelve parsecs. Surely you''ve heard of me.', 1351735717, 1351736672),
(3, 'plea@swu.com', 'plea', 'Lea ', 'Princess', 'f05d9358db04b69bb9cd444ba6320d4ea32d289e', '590a91fc8af43321003acebcbbbda395941c0e4b', '(formerly) alderaan', NULL, '', 'kick-ass rebel princess', 1351735815, 1351736373),
(4, 'okenobi@swu.com', 'okenobi', 'Kenobi  ', 'Obi-Wan', 'b76bd3444479fda9138e5efb8494362b5d636e3a', '590a91fc8af43321003acebcbbbda395941c0e4b', 'tatooine', NULL, '', 'jedi, retired', 1351735929, 1351736324);

-- --------------------------------------------------------

--
-- Table structure for table `users_users`
--

CREATE TABLE IF NOT EXISTS `users_users` (
  `user_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_followed` int(11) NOT NULL,
  PRIMARY KEY (`user_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_users`
--

INSERT INTO `users_users` (`user_user_id`, `created`, `user_id`, `user_id_followed`) VALUES
(1, '0000-00-00', 1, 4),
(2, '0000-00-00', 1, 2),
(3, '0000-00-00', 2, 3),
(4, '0000-00-00', 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

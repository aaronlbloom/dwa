-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2012 at 07:45 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aaronlbl_p4_aaronlbloom_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_log`
--

CREATE TABLE IF NOT EXISTS `change_log` (
  `change_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_header_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `descr` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`change_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `change_type`
--

CREATE TABLE IF NOT EXISTS `change_type` (
  `change_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `change_type_descr` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`change_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `change_type`
--

INSERT INTO `change_type` (`change_type_id`, `change_type_descr`, `created`, `modified`) VALUES
(1, 'New Request', 12, 12),
(2, 'Change Request', 12, 12),
(3, 'Defect', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `custom_headers`
--

CREATE TABLE IF NOT EXISTS `custom_headers` (
  `customer_headers_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_01` varchar(256) NOT NULL,
  `custom_02` varchar(256) NOT NULL,
  `custom_03` varchar(256) NOT NULL,
  `custom_04` varchar(256) NOT NULL,
  `custom_05` varchar(256) NOT NULL,
  `custom_06` varchar(256) NOT NULL,
  `custom_07` varchar(256) NOT NULL,
  `custom_08` varchar(256) NOT NULL,
  `custom_09` varchar(256) NOT NULL,
  `custom_10` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`customer_headers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `custom_headers`
--

INSERT INTO `custom_headers` (`customer_headers_id`, `custom_01`, `custom_02`, `custom_03`, `custom_04`, `custom_05`, `custom_06`, `custom_07`, `custom_08`, `custom_09`, `custom_10`, `created`, `modified`) VALUES
(1, 'Ticket', 'Report Nbr', 'System', 'Analyst', 'Users', 'custom 06', 'custom 07', 'custom 08', 'custom 09', 'custom 10', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL,
  `status_descr` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_descr`, `created`, `modified`) VALUES
(1, 'Open', 12, 12),
(2, 'Analysis', 12, 12),
(3, 'Development', 12, 12),
(4, 'QA', 12, 12),
(5, 'UAT', 12, 12),
(6, 'Closed', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `task_detail`
--

CREATE TABLE IF NOT EXISTS `task_detail` (
  `task_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_header_id` int(11) NOT NULL,
  `task_detail_type_id` int(11) NOT NULL,
  `line` varchar(256) NOT NULL,
  `task_detail_descr` varchar(10000) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`task_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `task_detail`
--

INSERT INTO `task_detail` (`task_detail_id`, `task_header_id`, `task_detail_type_id`, `line`, `task_detail_descr`, `created`, `modified`) VALUES
(21, 7, 1, '1', '1. Your name\r\n2. A small bio of yourself\r\n3. The name of the web host and the plan you''re using\r\n4. The name of the code editor you''re using\r\n5. A linked URL to your Git repository ex:             https://github.com/your_username/dwa\r\n', 1355935762, 1355935762),
(23, 7, 1, '2', 'Your project should follow this URL structure: http://yourdomain.com/dwa/p1/', 1355938099, 1355938099),
(24, 7, 1, '3', 'When you''re done, submit your URLs via the class site. \r\nhttp://www.google.com/url?q=http%3A%2F%2Fstudents.susanbuck.net&sa=D&sntz=1&usg=AFQjCNGrIVc0W8-zbu4BQDON3uyGt5g8EA', 1355938099, 1355938099),
(25, 7, 2, '1', 'Page should use proper HTML/CSS structure', 1355938099, 1355938099),
(26, 7, 2, '2', 'Your repository should show a history of commits that it took to build this page', 1355938099, 1355938099),
(27, 8, 1, '1', 'As a user you can...\r\n1. Sign up\r\n2. Log in\r\n3. Log out\r\n4. Add posts\r\n5. See a list of all other users\r\n6. Follow and unfollow other users\r\n7. View a stream of posts from the users you follow\r\n8. +2 other features of your choosing', 1355938597, 1355938597),
(28, 8, 2, '1', 'In addition to these set requirements, you''re responsible for covering all the logistical pieces of this application.\r\nFor example, you''ll need to make sure non-logged in users can''t see user-only areas, you''ll need a navigation menu, you''ll need a landing page, etc.', 1355938804, 1355938804),
(29, 8, 2, '2', 'If you''re new to server side programming, its suggested you use the framework we''re covering in class.\r\n', 1355938804, 1355938804),
(30, 8, 2, '3', 'If you''re experienced with PHP and have been looking for an opportunity to explore another framework (CakePHP, CodeIgniter, etc.) you''re welcome to do so but are responsible for any obstacles you face. You can not use CMSs such as WordPress, Drupal, Joomla, etc.\r\n', 1355938804, 1355938804),
(31, 8, 2, '4', 'Logistics\r\n* Your project should exist at p2.yourdomain.com\r\n* Your project should be fully version controlled\r\n* Your project should use a framework\r\nCode\r\n* Well organized\r\n* Follows D.R.Y principle\r\n* Well commented\r\n* Efficient\r\n* Logical\r\n* Separation of display and logic\r\n* Clean / valid HTML and CSS\r\nApplication\r\n* Free of bugs\r\n* Uses error handling\r\n* Cross-browser compatible\r\n* Flow makes sense (i.e. don''t confuse the user. e.g. If I log out, it shouldn''t leave me on my dashboard; if I trigger an ajax save it should give me some visual indicator that the server is working, etc.)\r\nContent quality and level of challenge\r\n* Did you execute all of the application requirements? (see above)\r\nInterface design: This is not a web design course, but applications should still be thoughtfully designed.\r\n* Adequate text-to-background contrast\r\n* Easy-to-read font size/spacing\r\n* Negative space in the page design\r\n* Clear visual hierarchy\r\n* Consistent styles and colors\r\n* Aesthetically pleasing\r\nAccessibility / Usability\r\n* Reasonable site load time\r\n* Alt tags for images\r\n* Main navigation easily identifiable\r\n* Navigation labels clear and concise\r\n* Logo links to home page\r\n* Consistent and easy-to-identify links\r\n* URLs meaningful and user-friendly\r\n* Critical content above the fold', 1355938804, 1355938804),
(32, 9, 2, '1', 'Logistics\r\n* Your project should exist at p2.yourdomain.com\r\n* Your project should be fully version controlled\r\n* Your project should use a framework\r\nCode\r\n* Well organized\r\n* Follows D.R.Y principle\r\n* Well commented\r\n* Efficient\r\n* Logical\r\n* Separation of display and logic\r\n* Clean / valid HTML and CSS\r\nApplication\r\n* Free of bugs\r\n* Uses error handling\r\n* Cross-browser compatible\r\n* Flow makes sense (i.e. don''t confuse the user. e.g. If I log out, it shouldn''t leave me on my dashboard; if I trigger an ajax save it should give me some visual indicator that the server is working, etc.)\r\nContent quality and level of challenge\r\n* Did you execute all of the application requirements? (see above)\r\nInterface design: This is not a web design course, but applications should still be thoughtfully designed.\r\n* Adequate text-to-background contrast\r\n* Easy-to-read font size/spacing\r\n* Negative space in the page design\r\n* Clear visual hierarchy\r\n* Consistent styles and colors\r\n* Aesthetically pleasing\r\nAccessibility / Usability\r\n* Reasonable site load time\r\n* Alt tags for images\r\n* Main navigation easily identifiable\r\n* Navigation labels clear and concise\r\n* Logo links to home page\r\n* Consistent and easy-to-identify links\r\n* URLs meaningful and user-friendly\r\n* Critical content above the fold', 1355939302, 1355939302),
(33, 9, 1, '1', 'Logistics\r\nWhere you build this application is up to you\r\nOption 1) Tack it on to p2.yourdomain.com\r\nOption 2) Spawn a new app at p3.yourdomain.com\r\nOption 3) If it will be part of P4, spawn a new app for P4 and build it as a subset of that\r\nOption 4) Off your main domain, such as yourdomain.com/p3', 1355939336, 1355939336),
(34, 9, 1, '2', 'Proposals should be submitted in the form of a link to a single web page with the following information:\r\n* Project title\r\n* 3-4 sentence description\r\n* Sketch(s) with well thought out attention to all the possible interactions\r\n* 3-4 Related / inspirational examples - sites can be chosen because they are similar in content and / or because they match a style or approach you''re interested in.', 1355939435, 1355939435),
(35, 9, 1, '3', 'Proposals are due by Friday 11/2. Submit your proposals by including your links in a reply to this thread:\r\nhttp://forum.susanbuck.net/discussion/143/-post-your-p3-proposals-here-due-112-#Item_1', 1355939435, 1355939435),
(36, 9, 4, '1', 'Examples:\r\nCard Generator\r\nhttp://students.susanbuck.net/storage/code/_js/card-generator.html\r\n\r\nProgrammer''s Best Friend\r\nhttp://students.susanbuck.net/storage/projects/javascript-tools/programmersBestFriend_BenChirlin/compsciFriend/\r\n\r\nPaint calculator\r\nhttp://www.glidden.com/calculators/paint-calculator-shadowbox.do\r\n\r\n\r\nnowdothis.com\r\nhttp://nowdothis.com/\r\n\r\n\r\nNet My Profit\r\nhttp://students.susanbuck.net/storage/projects/javascript-tools/netMyProfit_AliceYang/netmyprofit/', 1355939435, 1355939435);

-- --------------------------------------------------------

--
-- Table structure for table `task_detail_type`
--

CREATE TABLE IF NOT EXISTS `task_detail_type` (
  `task_detail_type_id` int(11) NOT NULL,
  `task_detail_type_descr` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_detail_type`
--

INSERT INTO `task_detail_type` (`task_detail_type_id`, `task_detail_type_descr`, `created`, `modified`) VALUES
(1, 'Requirements', 20121212, 20121212),
(2, 'Assumptions', 20121212, 20121212),
(3, 'Columns', 20121212, 20121212),
(4, 'Special_Logic', 20121212, 20121212),
(5, 'SQL', 20121212, 20121212),
(6, 'Reconciliation', 20121212, 20121212);

-- --------------------------------------------------------

--
-- Table structure for table `task_header`
--

CREATE TABLE IF NOT EXISTS `task_header` (
  `task_header_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_type_id` int(11) NOT NULL,
  `change_type_id` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `custom_01` varchar(1000) NOT NULL,
  `custom_02` varchar(1000) NOT NULL,
  `custom_03` varchar(1000) NOT NULL,
  `custom_04` varchar(1000) NOT NULL,
  `custom_05` varchar(1000) NOT NULL,
  `custom_06` varchar(1000) NOT NULL,
  `custom_07` varchar(1000) NOT NULL,
  `custom_08` varchar(1000) NOT NULL,
  `custom_09` varchar(1000) NOT NULL,
  `custom_10` varchar(1000) NOT NULL,
  `status_id` int(11) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`task_header_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `task_header`
--

INSERT INTO `task_header` (`task_header_id`, `task_name`, `user_id`, `task_type_id`, `change_type_id`, `description`, `custom_01`, `custom_02`, `custom_03`, `custom_04`, `custom_05`, `custom_06`, `custom_07`, `custom_08`, `custom_09`, `custom_10`, `status_id`, `summary`, `created`, `modified`) VALUES
(7, 'DWA P1               ', 1, 2, 1, 'The intention of this first project is to make sure everyone has set up the workflow they will use for the duration of the semester. It is an opportunity to refresh yourself on HTML/CSS and make sure you have a working knowledge of version control''d', '                     ', '                     ', 'DWA                    ', 'Aaron Bloom                         ', 'Susan Buck                    ', '                     ', '                     ', '                     ', '                     ', '                     ', 6, 'Workflow setup and essential HTML/CSS demonstration                    ', 1355935423, 1355938099),
(8, 'DWA P2  ', 1, 2, 1, 'Your task for this project is to create your own, scaled down, version of Twitter. While this popular microblogging platform is by no means a simple application, especially with approximately half a billion users, at its core it is a great demonstration of the basic pieces needed for many web based applications.\r\nThe ability to execute this project demonstrates your understanding of PHP and frameworks, so you will be prepared to create your own app for P4.', '   ', '   ', 'DWA  ', 'Aaron Bloom          ', 'Susan Buck                 ', '   ', '   ', '   ', '   ', '   ', 6, 'Microblog  ', 1355938572, 1355938804),
(9, 'DWA P3   ', 1, 2, 1, 'The goal of this project is to give you hands on experience with JavaScript and jQuery. Your task is to build a simple tool, game, or widget - any utility that reacts and changes based on user input to provide some meaningful outcome.\r\n\r\nThink of tasks you do everyday and think of some tool that could assist:\r\n* A web based Pomodoro timer to help with productivity\r\n* A random chore picker for your kids\r\n* A password generator - perhaps one that meets different requirements - ex: at least one number. x amount of characters, etc.\r\n\r\nGames:\r\n* Memory\r\n* The card game "War"\r\n* Dice\r\nThink about what you might want to do for P4 (which is wide open to whatever web application you want to build) - Does it have any components that could meet the requirements of this project?\r\n', '    ', '    ', 'DWA   ', 'Aaron Bloom               ', 'Susan Buck                  ', '    ', '    ', '    ', '    ', '    ', 6, 'JavaScript tool   ', 1355939277, 1355939434);

-- --------------------------------------------------------

--
-- Table structure for table `task_type`
--

CREATE TABLE IF NOT EXISTS `task_type` (
  `task_type_id` int(11) NOT NULL,
  `task_type_descr` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_type`
--

INSERT INTO `task_type` (`task_type_id`, `task_type_descr`, `created`, `modified`) VALUES
(0, 'Report', 12, 12),
(1, 'Data Feed', 12, 12),
(2, 'Application', 12, 12),
(3, 'UI', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `user_name`, `last_name`, `first_name`, `token`, `password`, `created`, `modified`) VALUES
(1, 'guest@guest.com', 'guest', 'Bloom', 'Aaron', 'd799be84b399db2bd9570017275198367fd383e9', '590a91fc8af43321003acebcbbbda395941c0e4b', 1354985261, 1354985261),
(2, 'jsmith@test.com', 'jsmith', 'smith', 'john', '4666f77b177b6b245747a2aaeb9dcbbd2c61f2b1', '590a91fc8af43321003acebcbbbda395941c0e4b', 1355237598, 1355237598);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

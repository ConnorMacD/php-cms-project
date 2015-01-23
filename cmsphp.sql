-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2015 at 09:37 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdByIndicator` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `contentArea_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `allPages` tinyint(1) DEFAULT NULL,
  `body` mediumtext NOT NULL,
  `modifyBy` int(11) DEFAULT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_contantArea2_idx` (`contentArea_id`),
  KEY `fk_articles_users1_idx` (`createdByIndicator`),
  KEY `fk_articles_pages1_idx` (`page_id`),
  KEY `fk_articles_users2_idx` (`modifyBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `createdByIndicator`, `createdate`, `title`, `description`, `contentArea_id`, `page_id`, `allPages`, `body`, `modifyBy`, `modifyDate`) VALUES
(1, 1, '2015-01-20 18:46:30', 'Testing', 'This is a test.', 1, 1, NULL, '<H1>Testing a content area, and a article of content!</h1>\r\n\r\n<h3>Nullam est mi, suscipit ut mattis in, hendrerit eget erat. Aenean in lectus nec est mollis volutpat in sed nulla. Aliquam commodo dolor eget felis tincidunt, non mattis nunc vehicula. Etiam auctor est eu justo gravida imperdiet. Pellentesque sed sapien et mi ultricies sollicitudin a nec arcu. Ut elementum purus lorem, ut porta felis congue et. Vestibulum sit amet erat lectus. Donec iaculis nisi lectus, a sagittis ligula ultrices eu. Nunc aliquam urna eget odio scelerisque lobortis. </h3>', NULL, NULL),
(2, 1, '2015-01-21 12:37:58', 'Products Page', 'This is a test product page', 1, 2, NULL, '<p>This is a samnple products page.</p><br/><h1>DEBUG</h1>', NULL, NULL),
(3, 1, '2015-01-21 13:06:45', 'Testing the body area!', 'AKSFAGD', 2, 1, NULL, '<p>This is clearly a paragraph.</p><br/>\r\n<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', NULL, NULL),
(4, 1, '2015-01-21 13:15:06', 'quote', 'Its a quote of Lorem Ipsum.', 3, 1, NULL, '<blockquote>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</blockquote>', NULL, NULL),
(5, 1, '2015-01-21 13:20:22', 'footer', 'ITS A FOOTAHR', 4, 1, NULL, '<p class="foot">Vivamus ac posuere velit. Ut lobortis, urna id vehicula fringilla, turpis felis sodales ex, non ultricies erat felis nec ipsum. Donec ligula nulla, consectetur ut malesuada et, egestas ut quam. Donec vitae commodo turpis. Proin elementum ut erat ac molestie. Praesent interdum nisl id enim accumsan iaculis. Donec vulputate nunc id nisl facilisis egestas. Aenean laoreet tincidunt lacus non viverra. Mauris dolor lectus, sollicitudin ut consequat ullamcorper, mollis eu nisi.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contentarea`
--

CREATE TABLE IF NOT EXISTS `contentarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `creatByIndicator` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `modifyByIndicator` int(11) DEFAULT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contantArea_users1_idx` (`creatByIndicator`),
  KEY `fk_contantArea_users2_idx` (`modifyByIndicator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contentarea`
--

INSERT INTO `contentarea` (`id`, `name`, `alias`, `description`, `creatByIndicator`, `creationDate`, `modifyByIndicator`, `modifyDate`) VALUES
(1, 'header', 'head', 'Its a header.', 1, '2015-01-20 18:27:34', NULL, NULL),
(2, 'body', 'body', 'It''s a body. What more do you want??!?', 1, '2015-01-21 13:02:47', NULL, NULL),
(3, 'body2', 'body2', 'Its a second body!!!!', 1, '2015-01-21 13:14:03', NULL, NULL),
(4, 'foot', 'foot', 'Its a footer.', 1, '2015-01-21 13:17:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `createdByIndicator` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `modifyByIndicator` int(11) DEFAULT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pages_users1_idx` (`modifyByIndicator`),
  KEY `fk_pages_users2_idx` (`createdByIndicator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `alias`, `description`, `createdByIndicator`, `creationDate`, `modifyByIndicator`, `modifyDate`) VALUES
(1, 'Testing', 'test', 'Its a testing page.', 1, '2015-01-20 18:33:33', NULL, NULL),
(2, 'Testing No.2', 'product', 'This is a product listing page.', 1, '2015-01-21 12:29:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Author'),
(2, 'Editor'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `stylesheet`
--

CREATE TABLE IF NOT EXISTS `stylesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `content` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `activeState` tinyint(1) NOT NULL,
  `createsByIndicator` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `lastModifyBy` int(11) DEFAULT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_styleSheet_users3` (`createsByIndicator`),
  KEY `fk_styleSheet_users4` (`lastModifyBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stylesheet`
--

INSERT INTO `stylesheet` (`id`, `name`, `content`, `description`, `activeState`, `createsByIndicator`, `creationDate`, `lastModifyBy`, `modifyDate`) VALUES
(1, 'testingsheet1', 'body{background-color:blue;}article{padding-left:20px;}.foot{color:pink;}', 'This is a testing stylesheet. Currently used only for testing.', 1, 1, '2015-01-21 09:35:44', 1, '2015-01-21 10:19:51'),
(2, 'testingsheet2', 'body{background-color:lightgreen;}article{padding-left:20px;}blockquote{padding:50px,50px,0,50px}.foot{background-color:pink;}', 'This is a testing stylesheet. Currently used only for testing.', 0, 1, '2015-01-21 09:35:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdByIndicator` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `modifyByIndicator` int(11) DEFAULT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modifyByIndicator` (`modifyByIndicator`),
  KEY `createByIndicator` (`createdByIndicator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`, `createdByIndicator`, `creationDate`, `modifyByIndicator`, `modifyDate`) VALUES
(1, 'Connor', 'MacDonald', 'connorM', '123lol321', 1, '2015-01-20 18:22:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`roles_id`),
  KEY `fk_users_roles_roles1_idx` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `roles_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_contentAreaID` FOREIGN KEY (`contentArea_id`) REFERENCES `contentarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_createByID` FOREIGN KEY (`createdByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_modifyByID` FOREIGN KEY (`modifyBy`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pageID` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contentarea`
--
ALTER TABLE `contentarea`
  ADD CONSTRAINT `fk_contantArea_users1` FOREIGN KEY (`creatByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contantArea_users2` FOREIGN KEY (`modifyByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_users1` FOREIGN KEY (`modifyByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pages_users2` FOREIGN KEY (`createdByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stylesheet`
--
ALTER TABLE `stylesheet`
  ADD CONSTRAINT `fk_styleSheet_users3` FOREIGN KEY (`createsByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_styleSheet_users4` FOREIGN KEY (`lastModifyBy`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_createBy` FOREIGN KEY (`createdByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_modifyBy` FOREIGN KEY (`modifyByIndicator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_users_roles_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_roles_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

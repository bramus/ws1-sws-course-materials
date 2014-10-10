-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2010 at 04:23 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `fotofactory`
--

DROP DATABASE IF EXISTS fotofactory;
CREATE DATABASE fotofactory DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE fotofactory;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` VALUES(1, 'russia', 1);
INSERT INTO `collections` VALUES(2, 'serbia', 2);
INSERT INTO `collections` VALUES(3, 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `when` datetime NOT NULL,
  PRIMARY KEY (`photo_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `user_id` int(11) NOT NULL,
  `interest` enum('nature','people','still lives','abstract') NOT NULL,
  PRIMARY KEY (`user_id`,`interest`)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` VALUES(1, 'nature');
INSERT INTO `interests` VALUES(1, 'people');
INSERT INTO `interests` VALUES(2, 'people');
INSERT INTO `interests` VALUES(2, 'abstract');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `collection_id` (`collection_id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` VALUES(1, 'Me + Voadre', 'dvn_0000.jpg', 0, 1);
INSERT INTO `photos` VALUES(2, 'Russia 001', 'photo22.jpg', 1, 1);
INSERT INTO `photos` VALUES(3, 'Russia 002', 'photo23.jpg', 1, 1);
INSERT INTO `photos` VALUES(4, 'Russia 003', 'photo24.jpg', 1, 1);
INSERT INTO `photos` VALUES(5, 'Russia 004', 'photo25.jpg', 1, 1);
INSERT INTO `photos` VALUES(6, 'Russia 005', 'photo34.jpg', 1, 1);
INSERT INTO `photos` VALUES(7, 'Russia 006', 'photo35.jpg', 1, 1);
INSERT INTO `photos` VALUES(8, 'Serbia 001', 'photo37.jpg', 2, 1);
INSERT INTO `photos` VALUES(9, 'Serbia 002', 'photo38.jpg', 2, 1);
INSERT INTO `photos` VALUES(10, 'Test 001', 'photo29.jpg', 3, 2);
INSERT INTO `photos` VALUES(11, 'Test 002', 'photo31.jpg', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `equipment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'bramus', 'test', 'bramus.vandamme@odisee.be', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et gravida tellus.\r\n\r\nPraesent auctor feugiat quam a ornare. Integer aliquam nulla ipsum. Aenean metus nibh, egestas vel ultricies ut, dignissim id felis. Cras vel turpis lectus, sed posuere urna. Morbi posuere enim a augue dapibus non tincidunt lacus placerat. Fusce ut volutpat odio. Praesent eu est elit. Etiam nec convallis nibh. In ultricies congue lectus, eget fringilla magna consequat at. Morbi pharetra mollis odio at ultricies. Aliquam ut nulla a nunc hendrerit egestas ut eu lacus.\r\n\r\nAliquam blandit bibendum purus sit amet mollis. Maecenas ante enim, sagittis eget cursus nec, lobortis quis augue. Quisque placerat lectus non nibh laoreet bibendum.\r\n\r\nDonec néc ultricies purus.');
INSERT INTO `users` VALUES(2, 'rogier', 'test', 'rogier.vanderlinde@odisee.be', 'Aliquam in est risus, id congue massa. Ut feugiat iaculis tortor sed egestas. Nunc ligula nibh, pulvinar et dapibus eget, accumsan nec libero.\r\n\r\nAenean non turpis quis nulla egestas imperdiet. Cras at nunc nec nisl lacinia dapibus. Nullam consectetur sollicitudin rutrum. In at neque in quam elementum faucibus.\r\n\r\nEtiam et orci eu massa sodales adipiscing at eget lectus. Praesent rutrum neque nec felis pretium non imperdiet tortor dictum. Praesent id est eu augue elementum lacinia nec eu massa. Donec euismod risus eu metus imperdiet ac rhoncus enim hendrerit. Ut vel arcu sit amet elit sagittis dapibus eu tempor justo. Phasellus quis orci nibh, eget eleifend augue.\r\n\r\nVivamus nulla purus, eleifend et rhoncus non, eleifend et mauris. In diam turpis, pharetra nec congue non, commodo vel lacus. Donec vulputate eros sed purus egestas sit amet lobortis augue convallis. Nullam quis nulla leo, vitae pellentesque risus. Nullam ornare ullamcorper placerat. Phasellus non velit at est vestibulum congue. ');

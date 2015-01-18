-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2015 at 08:54 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srijan15`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `auid` int(20) NOT NULL AUTO_INCREMENT,
  `secret_code` varchar(20) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `verification_id` varchar(50) NOT NULL,
  `is_verified` int(2) NOT NULL DEFAULT '0',
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) DEFAULT NULL,
  `n_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `designation` int(2) NOT NULL,
  `event_id` int(2) DEFAULT NULL,
  `team_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`auid`, `secret_code`, `password`, `verification_id`, `is_verified`, `f_name`, `l_name`, `n_name`, `email`, `mobile`, `designation`, `event_id`, `team_id`) VALUES
(5, 'imsecrete', '49c2398aae2e85db56ab1407c3ab1f7679e796f3', 'd51045b1a7cb7f5a110cfed46c29002d', 0, 'dcnm', 'gaurav', '22', 'kumargaurav2596@gmail.com', '9934138072', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_team`
--

CREATE TABLE IF NOT EXISTS `coordinator_team` (
  `team_id` int(10) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `sequence` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(10) NOT NULL AUTO_INCREMENT,
  `e_category` varchar(20) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_about` varchar(10000) DEFAULT 'About your event...<br>',
  `e_rules` varchar(10000) DEFAULT 'Rules &amp; Regulation <br>1. Rule1<br>2. Rule2<br>3. ...<br>',
  `e_prize` varchar(2000) DEFAULT ' Prize<br>1st Prize : Rs. <br>2nd Prize: Rs.<br>3rd Prize:&nbsp; Rs.<br>',
  `e_image` varchar(200) NOT NULL,
  `e_team_max` int(10) NOT NULL,
  `e_team_min` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `e_category`, `e_name`, `e_about`, `e_rules`, `e_prize`, `e_image`, `e_team_max`, `e_team_min`) VALUES
(1, 'game', 'something', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\ngaurav<br>hjdfhkj<br>nvmn,mcn lkfnjh&nbsp;&nbsp; hvhdvh<br>ncmfbhjv<br>', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nRules &amp; Regulation <br>1. Rule1<br>2. Rule2<br>3. ...<br>', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nPrize<br>1st Prize : Rs. <br>2nd Prize: Rs.<br>3rd Prize:&nbsp; Rs.<br>', 'C:/wamp/www/srijan/event_img/ISM_Garden3.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_category`
--

CREATE TABLE IF NOT EXISTS `events_category` (
  `ecid` int(10) NOT NULL AUTO_INCREMENT,
  `ec_name` varchar(60) NOT NULL,
  `ec-pic` varchar(200) NOT NULL,
  PRIMARY KEY (`ecid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_team_reg`
--

CREATE TABLE IF NOT EXISTS `event_team_reg` (
  `team_id` int(10) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(30) NOT NULL,
  `team_members` int(10) NOT NULL,
  `is_verified` int(2) NOT NULL DEFAULT '0',
  `verified_by` int(10) DEFAULT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3243 ;

--
-- Dumping data for table `event_team_reg`
--

INSERT INTO `event_team_reg` (`team_id`, `team_name`, `team_members`, `is_verified`, `verified_by`, `event_id`) VALUES
(32, 'ewff', 4, 1, NULL, 1),
(42, 'ewff', 4, 2, NULL, 1),
(342, 'feeee', 3, 2, NULL, 1),
(3242, 'feeee', 3, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fav_gen`
--

CREATE TABLE IF NOT EXISTS `fav_gen` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genere_name` varchar(30) NOT NULL,
  `genere_pic` varchar(200) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nick_name_genere_map`
--

CREATE TABLE IF NOT EXISTS `nick_name_genere_map` (
  `nick_id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(30) NOT NULL,
  `gener_id` int(11) NOT NULL,
  PRIMARY KEY (`nick_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_members_map`
--

CREATE TABLE IF NOT EXISTS `team_members_map` (
  `teamid` int(10) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members_map`
--

INSERT INTO `team_members_map` (`teamid`, `userid`) VALUES
(32, 'S15-GAU-1'),
(42, 'S15-PKR-2');

-- --------------------------------------------------------

--
-- Table structure for table `user_coordi_team_map`
--

CREATE TABLE IF NOT EXISTS `user_coordi_team_map` (
  `teamid` int(10) NOT NULL,
  `auid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `unique_code` varchar(20) NOT NULL DEFAULT 'S15',
  `password` varchar(100) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `verification_id` varchar(500) NOT NULL,
  `is_verified` int(2) NOT NULL DEFAULT '0',
  `avatar` int(2) NOT NULL DEFAULT '0',
  `nick_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `college` varchar(70) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `unique_code` (`unique_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`uid`, `unique_code`, `password`, `f_name`, `l_name`, `verification_id`, `is_verified`, `avatar`, `nick_name`, `email`, `mobile`, `college`) VALUES
(1, 'S15-GAU-1', '49c2398aae2e85db56ab1407c3ab1f7679e796f3', 'gaurav', 'gaurav', 'ffd061c9b30a58272bb1721a4cc9313e', 0, 2, '12', 'csa@gmail.com', '9934993499', 'hgryhghdfhjdgjg'),
(2, 'S15-PKR-2', '49c2398aae2e85db56ab1407c3ab1f7679e796f3', 'pkr', '', 'fcbfe5b5fa096354c7d8117d11edf087', 0, 2, '12', 'ajhj@gmail.com', '1234567890', 'dsnmfjdhhfd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

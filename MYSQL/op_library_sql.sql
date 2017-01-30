-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 30, 2017 at 05:54 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `op_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_key`
--

CREATE TABLE `api_key` (
`id` int(50) NOT NULL,
  `members_id` int(50) NOT NULL,
  `access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_control`
--

CREATE TABLE `image_control` (
`id` int(11) NOT NULL,
  `members_id` int(50) NOT NULL,
  `custom` tinyint(4) NOT NULL COMMENT '1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Does the member have a defined image list';

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
`id` int(50) NOT NULL,
  `members_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isSuspend` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Check on login to see if suspended.'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_fav`
--

CREATE TABLE `media_fav` (
`id` int(11) NOT NULL,
  `media_type` int(11) NOT NULL DEFAULT '1',
  `media_id` int(11) NOT NULL,
  `count` int(11) NOT NULL COMMENT 'total count'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_fav_manager`
--

CREATE TABLE `media_fav_manager` (
`id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `media_type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
`id` int(50) NOT NULL,
  `current` int(11) NOT NULL DEFAULT '1' COMMENT '1 = yes 0 = no',
  `registeredDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact` varchar(50) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = user 2 = admin',
  `privilege` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0 = public 1 = both',
  `loggedIn` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_album`
--

CREATE TABLE `member_album` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `album_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_images`
--

CREATE TABLE `member_images` (
`id` int(11) NOT NULL,
  `members_id` int(50) NOT NULL,
  `album_name` varchar(45) NOT NULL COMMENT 'Narnoo Album Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Custom images for a member';

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
`id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL,
  `brochure` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='store the menu options';

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
`id` int(12) NOT NULL,
  `disclaimer` mediumtext NOT NULL,
  `editDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `members_id` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
`id` int(100) NOT NULL,
  `members_id` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media_id` int(100) NOT NULL,
  `media_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stats_login`
--

CREATE TABLE `stats_login` (
`id` int(50) NOT NULL,
  `date` date NOT NULL,
  `count` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_key`
--
ALTER TABLE `api_key`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_api_key_members1` (`members_id`);

--
-- Indexes for table `image_control`
--
ALTER TABLE `image_control`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_image_control_members1` (`members_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_login_members` (`members_id`);

--
-- Indexes for table `media_fav`
--
ALTER TABLE `media_fav`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_fav_manager`
--
ALTER TABLE `media_fav_manager`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_album`
--
ALTER TABLE `member_album`
 ADD PRIMARY KEY (`id`), ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_images`
--
ALTER TABLE `member_images`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_member_images_members1` (`members_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_settings_members1` (`members_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_statistics_members1` (`members_id`);

--
-- Indexes for table `stats_login`
--
ALTER TABLE `stats_login`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_key`
--
ALTER TABLE `api_key`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_control`
--
ALTER TABLE `image_control`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media_fav`
--
ALTER TABLE `media_fav`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `media_fav_manager`
--
ALTER TABLE `media_fav_manager`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member_album`
--
ALTER TABLE `member_album`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_images`
--
ALTER TABLE `member_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `stats_login`
--
ALTER TABLE `stats_login`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_control`
--
ALTER TABLE `image_control`
ADD CONSTRAINT `fk_image_control_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_album`
--
ALTER TABLE `member_album`
ADD CONSTRAINT `member_album_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `member_images`
--
ALTER TABLE `member_images`
ADD CONSTRAINT `member_images_ibfk_1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

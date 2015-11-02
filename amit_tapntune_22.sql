-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2012 at 07:03 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amit_tapntune`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `idanswer` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(20) unsigned NOT NULL,
  `answer` bigint(20) unsigned NOT NULL,
  `user` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idanswer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `idarticle` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `datepublish` datetime NOT NULL,
  `dateadd` datetime NOT NULL,
  `datelastedit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` bigint(20) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `author` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `idcategory` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `parentid` bigint(20) unsigned NOT NULL,
  `order` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `idcontact` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idcontact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `idcontent` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idcontent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `content`
--


-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `idphoto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idphoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`idphoto`, `name`, `url`, `description`, `date`, `active`) VALUES
(1, 'e2e2', '4f470409db229.jpg', '', '2012-02-01 19:28:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `idgender` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`idgender`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`idgender`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `posibleanswers`
--

CREATE TABLE IF NOT EXISTS `posibleanswers` (
  `idposans` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `answer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `question` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idposans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `posibleanswers`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `idpool` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpool`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE IF NOT EXISTS `selection` (
  `idselection` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`idselection`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`idselection`, `name`) VALUES
(1, 'Local Video'),
(2, 'Youtube Video');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` datetime NOT NULL,
  `usertype` enum('administrator','moderator','regular') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'regular',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `_about`
--

CREATE TABLE IF NOT EXISTS `_about` (
  `idabout` int(11) NOT NULL AUTO_INCREMENT,
  `para1` text NOT NULL,
  `para2` text NOT NULL,
  `para3` text NOT NULL,
  `para4` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idabout`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `_about`
--

INSERT INTO `_about` (`idabout`, `para1`, `para2`, `para3`, `para4`, `active`) VALUES
(1, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 0),
(2, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_adminfiles`
--

CREATE TABLE IF NOT EXISTS `_adminfiles` (
  `idfile` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filesize` decimal(10,2) NOT NULL,
  `for_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `for_id` bigint(20) unsigned NOT NULL,
  `order` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idfile`),
  KEY `index_for_id` (`for_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_adminfiles`
--


-- --------------------------------------------------------

--
-- Table structure for table `_adminlang`
--

CREATE TABLE IF NOT EXISTS `_adminlang` (
  `idlang` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idlang`),
  UNIQUE KEY `unique_lang_key` (`lang`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `_adminlang`
--

INSERT INTO `_adminlang` (`idlang`, `lang`, `key`, `value`) VALUES
(1, 'en', 'men_admin_settings', 'Admin settings'),
(2, 'en', 'men_users', 'Users'),
(3, 'en', 'men_roles', 'Roles'),
(4, 'en', 'men_language', 'Language keys'),
(5, 'en', 'username', 'Username'),
(6, 'en', 'password', 'Password'),
(7, 'en', 'login', 'Login'),
(8, 'en', '_site_title_', 'Tap-N-Tune Admin Panel'),
(9, 'en', 'men_roles_to_privs', 'Roles to privileges'),
(10, 'en', 'js_search_filter_to', 'Select field to filter by...'),
(11, 'en', 'js_remove_filter', 'Remove filter'),
(12, 'en', 'js_choose_a_filter', 'choose a field'),
(13, 'en', 'js_set_some_filters', 'Please set some valid filters!'),
(14, 'en', 'apply_filters', 'Apply filters'),
(15, 'en', 'alpha_numerical', 'alpha numerical'),
(16, 'en', 'digits', 'digits'),
(17, 'en', 'number', 'number'),
(18, 'en', 'date', 'date'),
(19, 'en', 'email', 'e-mail'),
(20, 'en', 'username_alphanumerical_and_', 'username ( alphanumerical, _ and - )'),
(21, 'en', 'image', 'image'),
(22, 'en', 'document', 'document'),
(23, 'en', 'archive', 'archive'),
(24, 'en', 'video', 'video'),
(25, 'en', 'the_x_field_is_not_', 'The <b>%1s</b> field is not <b>%2s</b>'),
(26, 'en', 'the_x_field_is_smaller_', 'The <b>%1s</b> field length is smaller than %2s chars.'),
(27, 'en', 'the_x_field_is_bigger_', 'The <b>%1s</b> field length is bigger than %2s chars.'),
(28, 'en', 'the_x_field_cannot_be_duplicate', 'The field <b>%1s</b> is not allowed to be duplicated.'),
(29, 'en', 'cannot_upload_file_for_', 'Cannot upload file for <b>%1s</b> field.'),
(30, 'en', 'the_file_is_larger_than_', 'The <b>%1s</b> file is larger than %2s MB.'),
(31, 'en', 'fail_cannot_resize_file', 'FAIL: %1s<br />Cannot resize file.<br />%2s'),
(32, 'en', 'js_select_records_to_delete', 'Select records to delete.'),
(33, 'en', 'js_delete_selected_recs', 'Delete selected records?'),
(34, 'en', 'download_file', 'Download file'),
(35, 'en', 'exported_at', 'exported at'),
(36, 'en', 'csv_files_will_remain_in_', '(CSV files will remain in "uploads/_excels_/..." until you will delete them)'),
(37, 'en', 'clear_this_listing', 'Clear this listing'),
(38, 'en', 'clear_question', 'Clear current listing?'),
(39, 'en', 'act_insert', 'insert'),
(40, 'en', 'act_update', 'update'),
(41, 'en', 'act_delete', 'delete'),
(42, 'en', 'act_view', 'view'),
(43, 'en', 'act_uploadfile', 'uploadfile'),
(44, 'en', 'act_deletefile', 'delete file'),
(56, 'en', 'access_denied_section', 'You don''t have the permision to access this page.'),
(57, 'en', 'access_denied_action', 'You don''t have the permision to make this action.'),
(58, 'en', 'confirm_delete_picture', 'Are you sure you want to delete this picture?'),
(59, 'en', 'confirm_delete_record', 'Are you sure you want to delete this record?'),
(60, 'en', 'home', 'Home'),
(61, 'en', 'completed', 'completed'),
(62, 'en', 'insert_new', 'Insert new record'),
(63, 'en', 'go_to_list', 'Go to list'),
(64, 'en', 'delete_record', 'Delete record'),
(65, 'en', 'add_filter', 'Add filter (+)'),
(66, 'en', 'export_csv', 'Export CSV'),
(67, 'en', 'delete_selected', 'Delete selected'),
(68, 'en', 'logout', 'LogOut'),
(69, 'en', 'are_you_sure', 'Are you sure?'),
(70, 'en', 'remove', 'Remove'),
(71, 'en', 'are_you_sure_reset', 'Are you sure you want to reset?'),
(72, 'en', 'submit', 'Submit'),
(73, 'en', 'reset', 'Reset'),
(74, 'en', 'set_privileges_for_role', 'Set privileges for current role'),
(75, 'en', 'wait', 'Wait...');

-- --------------------------------------------------------

--
-- Table structure for table `_adminlog`
--

CREATE TABLE IF NOT EXISTS `_adminlog` (
  `idlog` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_get` longtext COLLATE utf8_unicode_ci NOT NULL,
  `request_post` longtext COLLATE utf8_unicode_ci NOT NULL,
  `request_files` longtext COLLATE utf8_unicode_ci NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idlog`),
  KEY `index_user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=522 ;

--
-- Dumping data for table `_adminlog`
--

INSERT INTO `_adminlog` (`idlog`, `request_get`, `request_post`, `request_files`, `stamp`, `user`) VALUES
(168, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(169, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php1E56.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(170, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:16:"ex6_photogallery";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(171, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:16:"ex6_photogallery";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"Name";s:4:"e2e2";s:11:"description";s:0:"";s:4:"date";s:0:"";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:5:"url_1";a:5:{s:4:"name";s:16:"amit-cam2410.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php5445.tmp";s:5:"error";i:0;s:4:"size";i:1158270;}}', '0000-00-00 00:00:00', 5),
(172, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:16:"ex6_photogallery";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"Name";s:4:"e2e2";s:11:"description";s:0:"";s:4:"date";s:19:"2012-02-01 19:28:00";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:5:"url_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php9174.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(173, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:16:"ex6_photogallery";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(174, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(175, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(176, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(177, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:9:"Bangalore";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpEB77.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(178, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:9:"Bangalore";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-4.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpF2A9.tmp";s:5:"error";i:0;s:4:"size";i:37349;}}', '0000-00-00 00:00:00', 5),
(179, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(180, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(181, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:13:"Untitled5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php8B50.tmp";s:5:"error";i:0;s:4:"size";i:49704;}}', '0000-00-00 00:00:00', 5),
(182, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:13:"Untitled5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpDD57.tmp";s:5:"error";i:0;s:4:"size";i:49704;}}', '0000-00-00 00:00:00', 5),
(183, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(184, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(185, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(186, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(187, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:9:"Bangalore";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpA798.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(188, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCF";s:5:"genre";s:1:"1";s:8:"location";s:9:"Bangalore";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpCCF4.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(189, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCF";s:5:"genre";s:1:"1";s:8:"location";s:10:"BangaloreW";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(190, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(191, 'a:6:{s:4:"edit";s:6:"3|4|5|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(192, 'a:6:{s:4:"edit";s:4:"3|4|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(193, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"ex1_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:34:"a:1:{s:6:\\"iduser\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(194, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(195, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(196, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(197, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php82AE.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(198, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(199, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(200, 'a:6:{s:4:"edit";s:1:"6";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:22:"C:\\xampp\\tmp\\phpB5.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(201, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(202, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(203, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(204, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(205, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(206, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(207, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:8:"Janneman";s:7:"caption";s:11:"Beyond Love";s:4:"band";s:1:"6";s:7:"youtube";s:27:"http://youtu.be/JUDjbESzZZU";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:11:"video_pic_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php8B58.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(208, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:8:"Janneman";s:7:"caption";s:11:"Beyond Love";s:4:"band";s:1:"6";s:7:"youtube";s:27:"http://youtu.be/JUDjbESzZZU";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:11:"video_pic_1";a:5:{s:4:"name";s:14:"Untitled-4.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php5CBC.tmp";s:5:"error";i:0;s:4:"size";i:37349;}}', '0000-00-00 00:00:00', 5),
(209, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(210, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(211, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"GHJ";s:5:"genre";s:1:"1";s:8:"location";s:11:"Murshidabad";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:16:"amit-cam2427.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php22EA.tmp";s:5:"error";i:0;s:4:"size";i:1151793;}}', '0000-00-00 00:00:00', 5),
(212, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"GHJ";s:5:"genre";s:1:"1";s:8:"location";s:11:"Murshidabad";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled59.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpA026.tmp";s:5:"error";i:0;s:4:"size";i:350839;}}', '0000-00-00 00:00:00', 5),
(213, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(214, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:16:"ex6_photogallery";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(215, 'a:6:{s:4:"edit";s:1:"8";s:4:"page";s:1:"1";s:7:"section";s:13:"_adm_language";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:55:"a:2:{s:4:\\"lang\\";s:3:\\"asc\\";s:3:\\"key\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:4:"lang";s:2:"en";s:3:"key";s:12:"_site_title_";s:5:"value";s:20:"TapNTune Admin Panel";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(216, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(217, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:15:"ex5_contactform";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:37:"a:1:{s:9:\\"idcontact\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(218, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(219, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(220, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"ASD";s:7:"caption";s:11:"Beyond Love";s:4:"band";s:1:"7";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"video_pic_1";a:5:{s:4:"name";s:16:"amit-cam2427.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpD06A.tmp";s:5:"error";i:0;s:4:"size";i:1151793;}s:11:"localfile_1";a:5:{s:4:"name";s:16:"CycleCumBoat.mpg";s:4:"type";s:10:"video/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpD08A.tmp";s:5:"error";i:0;s:4:"size";i:11197036;}}', '0000-00-00 00:00:00', 5),
(221, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"ASD";s:7:"caption";s:11:"Beyond Love";s:4:"band";s:1:"7";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"video_pic_1";a:5:{s:4:"name";s:13:"Untitled5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpB657.tmp";s:5:"error";i:0;s:4:"size";i:49704;}s:11:"localfile_1";a:5:{s:4:"name";s:16:"CycleCumBoat.mpg";s:4:"type";s:10:"video/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpB678.tmp";s:5:"error";i:0;s:4:"size";i:11197036;}}', '0000-00-00 00:00:00', 5),
(222, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(223, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(224, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:4:"Amit";s:4:"band";s:1:"7";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:11:"audio_pic_1";a:5:{s:4:"name";s:13:"Untitled5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpCE5C.tmp";s:5:"error";i:0;s:4:"size";i:49704;}}', '0000-00-00 00:00:00', 5),
(225, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:4:"Amit";s:4:"band";s:1:"7";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:11:"audio_pic_1";a:5:{s:4:"name";s:13:"Untitled5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php16B3.tmp";s:5:"error";i:0;s:4:"size";i:49704;}}', '0000-00-00 00:00:00', 5),
(226, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(227, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:5:"admin";s:4:"mail";s:18:"admin@tapntune.com";s:4:"role";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(228, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(229, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(230, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:3:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"HipHop";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(231, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(232, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(233, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(234, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"HipHop";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(235, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(236, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:7:"Fossils";s:5:"genre";s:1:"2";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpBC87.tmp";s:5:"error";i:0;s:4:"size";i:754648;}}', '0000-00-00 00:00:00', 5),
(237, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(238, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(239, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:9:"Agneepath";s:4:"band";s:1:"8";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"audio_pic_1";a:5:{s:4:"name";s:5:"2.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php77FA.tmp";s:5:"error";i:0;s:4:"size";i:251463;}s:11:"localfile_1";a:5:{s:4:"name";s:50:"[Songs.PK] 06 - Agneepath - Deva Shree Ganesha.mp3";s:4:"type";s:10:"audio/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php780A.tmp";s:5:"error";i:0;s:4:"size";i:11557943;}}', '0000-00-00 00:00:00', 5),
(240, 'a:6:{s:4:"edit";s:1:"1";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:3:"pop";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(241, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"hipHop";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(242, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"Hiphop";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(243, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"hiphop";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(244, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(245, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:3:"rnb";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(246, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(247, 'a:6:{s:4:"edit";s:6:"6|8|7|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(248, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(249, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:7:"Fossils";s:5:"genre";s:1:"1";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled-5.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpBF78.tmp";s:5:"error";i:0;s:4:"size";i:39119;}}', '0000-00-00 00:00:00', 5),
(250, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(251, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(252, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:6:"Cactus";s:5:"genre";s:1:"3";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:14:"Untitled13.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpE071.tmp";s:5:"error";i:0;s:4:"size";i:1043938;}}', '0000-00-00 00:00:00', 5),
(253, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(254, 'a:6:{s:4:"edit";s:2:"10";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:6:"Cactus";s:5:"genre";s:1:"3";s:8:"location";s:7:"Kolkata";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(255, 'a:6:{s:4:"edit";s:2:"10";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:6:"Cactus";s:5:"genre";s:1:"3";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(256, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(257, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"XYZ";s:5:"genre";s:1:"2";s:8:"location";s:9:"Bangalore";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:13:"Untitled5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php5C67.tmp";s:5:"error";i:0;s:4:"size";i:49704;}}', '0000-00-00 00:00:00', 5),
(258, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(259, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(260, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(261, 'a:6:{s:4:"edit";s:4:"2|1|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(262, 'a:6:{s:4:"edit";s:2:"1|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(263, 'a:6:{s:4:"edit";s:8:"10|9|11|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(264, 'a:6:{s:4:"edit";s:6:"2|1|3|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(265, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(266, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:3:"Pop";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(267, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(268, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(269, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"HipHop";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(270, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(271, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(272, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:3:"RnB";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(273, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(274, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(275, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:4:"Rock";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(276, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(277, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(278, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo4.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php4C34.tmp";s:5:"error";i:0;s:4:"size";i:358597;}}', '0000-00-00 00:00:00', 5),
(279, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(280, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(281, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"DEF";s:5:"genre";s:1:"6";s:8:"location";s:9:"Bangalore";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo2.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpAA99.tmp";s:5:"error";i:0;s:4:"size";i:357965;}}', '0000-00-00 00:00:00', 5),
(282, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(283, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(284, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"GHJ";s:5:"genre";s:1:"7";s:8:"location";s:5:"Delhi";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:11:"photo12.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php2287.tmp";s:5:"error";i:0;s:4:"size";i:358022;}}', '0000-00-00 00:00:00', 5),
(285, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(286, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(287, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"KLM";s:5:"genre";s:1:"5";s:8:"location";s:7:"Chennai";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo8.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php8F4F.tmp";s:5:"error";i:0;s:4:"size";i:299289;}}', '0000-00-00 00:00:00', 5),
(288, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(289, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"NOP";s:5:"genre";s:1:"4";s:8:"location";s:9:"Rajasthan";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo6.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php701C.tmp";s:5:"error";i:0;s:4:"size";i:346667;}}', '0000-00-00 00:00:00', 5),
(290, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(291, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(292, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"XYZ";s:5:"genre";s:1:"6";s:8:"location";s:6:"Kerala";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php4556.tmp";s:5:"error";i:0;s:4:"size";i:312684;}}', '0000-00-00 00:00:00', 5),
(293, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"XYZ";s:5:"genre";s:1:"6";s:8:"location";s:6:"Kerala";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpA293.tmp";s:5:"error";i:0;s:4:"size";i:312684;}}', '0000-00-00 00:00:00', 5),
(294, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(295, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(296, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:2:"AS";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(297, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(298, 'a:6:{s:4:"edit";s:2:"18";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(299, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(300, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"SERR";s:5:"genre";s:1:"7";s:8:"location";s:5:"Vizag";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:11:"photo11.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpC986.tmp";s:5:"error";i:0;s:4:"size";i:329250;}}', '0000-00-00 00:00:00', 5),
(301, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(302, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(303, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(304, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(305, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(306, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:27:"http://youtu.be/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:11:"video_pic_1";a:5:{s:4:"name";s:10:"video8.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:23:"C:\\xampp\\tmp\\phpC70.tmp";s:5:"error";i:0;s:4:"size";i:128504;}}', '0000-00-00 00:00:00', 5),
(307, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:27:"http://youtu.be/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(308, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(309, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:27:"http://youtu.be/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"video_pic_1";a:5:{s:4:"name";s:10:"video6.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpD686.tmp";s:5:"error";i:0;s:4:"size";i:162006;}}', '0000-00-00 00:00:00', 5),
(310, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(311, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"localfile_1";a:5:{s:4:"name";s:16:"CycleCumBoat.mpg";s:4:"type";s:10:"video/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php188A.tmp";s:5:"error";i:0;s:4:"size";i:11197036;}}', '0000-00-00 00:00:00', 5),
(312, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(313, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(314, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(315, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(316, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(317, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(318, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5);
INSERT INTO `_adminlog` (`idlog`, `request_get`, `request_post`, `request_files`, `stamp`, `user`) VALUES
(319, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:20:"Abhi Mujh Mein Kahin";s:7:"caption";s:9:"Agneepath";s:4:"band";s:2:"17";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"audio_pic_1";a:5:{s:4:"name";s:11:"album13.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php6D23.tmp";s:5:"error";i:0;s:4:"size";i:12266;}s:11:"localfile_1";a:5:{s:4:"name";s:52:"[Songs.PK] 05 - Agneepath - Abhi Mujh Mein Kahin.mp3";s:4:"type";s:10:"audio/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php6D33.tmp";s:5:"error";i:0;s:4:"size";i:10183645;}}', '0000-00-00 00:00:00', 5),
(320, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:20:"Abhi Mujh Mein Kahin";s:7:"caption";s:9:"Agneepath";s:4:"band";s:2:"17";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"audio_pic_1";a:5:{s:4:"name";s:11:"album17.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:23:"C:\\xampp\\tmp\\php7ED.tmp";s:5:"error";i:0;s:4:"size";i:11211;}s:11:"localfile_1";a:5:{s:4:"name";s:52:"[Songs.PK] 05 - Agneepath - Abhi Mujh Mein Kahin.mp3";s:4:"type";s:10:"audio/mpeg";s:8:"tmp_name";s:23:"C:\\xampp\\tmp\\php7EE.tmp";s:5:"error";i:0;s:4:"size";i:10183645;}}', '0000-00-00 00:00:00', 5),
(321, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(322, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:20:"Abhi Mujh Mein Kahin";s:7:"caption";s:9:"Agneepath";s:4:"band";s:2:"17";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(323, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(324, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(325, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(326, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(327, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(328, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(329, 'a:6:{s:4:"edit";s:2:"1|";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(330, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(331, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(332, 'a:6:{s:4:"edit";s:4:"3|2|";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(333, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(334, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(335, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(336, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(337, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(338, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:14:"Chikni Chameli";s:7:"caption";s:9:"Agneepath";s:4:"band";s:2:"16";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"audio_pic_1";a:5:{s:4:"name";s:11:"album14.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php11B8.tmp";s:5:"error";i:0;s:4:"size";i:11929;}s:11:"localfile_1";a:5:{s:4:"name";s:46:"[Songs.PK] 01 - Agneepath - Chikni Chameli.mp3";s:4:"type";s:10:"audio/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php11C9.tmp";s:5:"error";i:0;s:4:"size";i:10639464;}}', '0000-00-00 00:00:00', 5),
(339, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(340, 'a:6:{s:4:"edit";s:2:"12";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:7:"fb_page";s:25:"http://facebook.com/pages";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(341, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(342, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(343, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(344, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(345, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:17:"Amit Kumar Mondal";s:4:"band";s:2:"12";s:3:"sex";s:1:"1";s:8:"position";s:9:"Guitarist";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(346, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:17:"Amit Kumar Mondal";s:4:"band";s:2:"12";s:3:"sex";s:1:"1";s:8:"position";s:9:"Guitarist";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(347, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(348, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:39:"a:1:{s:11:\\"artist_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(349, 'a:6:{s:4:"edit";s:1:"1";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:17:"Amit Kumar Mondal";s:4:"band";s:2:"12";s:3:"sex";s:1:"1";s:8:"position";s:9:"Guitarist";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(350, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(351, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:12:"Lipika Dutta";s:4:"band";s:2:"12";s:3:"sex";s:1:"2";s:8:"position";s:7:"Drummer";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(352, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(353, 'a:6:{s:4:"edit";s:2:"12";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:7:"fb_page";s:25:"http://facebook.com/pages";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(354, 'a:6:{s:4:"edit";s:2:"12";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:7:"fb_page";s:64:"http://www.facebook.com/pages/Synapse-hub-NITdgp/251625021526840";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(355, 'a:6:{s:4:"edit";s:2:"12";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:7:"fb_page";s:64:"http://www.facebook.com/pages/Synapse-hub-NITdgp/251625021526840";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(356, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(357, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(358, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:6:"ABCDEF";s:7:"caption";s:4:"AMIT";s:4:"band";s:2:"19";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"video_pic_1";a:5:{s:4:"name";s:10:"video3.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php1DB6.tmp";s:5:"error";i:0;s:4:"size";i:178839;}s:11:"localfile_1";a:5:{s:4:"name";s:32:"big_boobs_having_sex~AxOpLiX.avi";s:4:"type";s:9:"video/avi";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php1DB7.tmp";s:5:"error";i:0;s:4:"size";i:11253362;}}', '0000-00-00 00:00:00', 5),
(359, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(360, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(361, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:3:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:0:"";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(362, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(363, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(364, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(365, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(366, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(367, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(368, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(369, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(370, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"15";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(371, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(372, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:13:"Bhaag DK Bose";s:7:"caption";s:11:"Delly Belly";s:4:"band";s:2:"13";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"audio_pic_1";a:5:{s:4:"name";s:10:"album8.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php50B8.tmp";s:5:"error";i:0;s:4:"size";i:11437;}s:11:"localfile_1";a:5:{s:4:"name";s:62:"[Songs.PK] Delhi Belly - 01 - Bhaag D.K. Bose, Aandhi Aayi.mp3";s:4:"type";s:10:"audio/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php50B9.tmp";s:5:"error";i:0;s:4:"size";i:8502620;}}', '0000-00-00 00:00:00', 5),
(373, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(374, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:13:"_adm_language";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:55:"a:2:{s:4:\\"lang\\";s:3:\\"asc\\";s:3:\\"key\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(375, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(376, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:8:"username";s:4:"amit";s:8:"password";s:6:"123456";s:4:"mail";s:20:"admin@amitinside.com";s:4:"role";s:0:"";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(377, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(378, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(379, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"RRR";s:5:"genre";s:1:"4";s:8:"location";s:6:"Sikkim";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"photo3.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php7BD0.tmp";s:5:"error";i:0;s:4:"size";i:337679;}}', '0000-00-00 00:00:00', 5),
(380, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(381, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(382, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(383, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(384, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(385, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"_adm_users";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:35:"a:1:{s:8:\\"username\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(386, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 6),
(387, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:0:"";s:4:"band";s:0:"";s:3:"sex";s:0:"";s:8:"position";s:0:"";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 6),
(388, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 6),
(389, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(390, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"AMIT";s:5:"genre";s:1:"4";s:8:"location";s:7:"Manipal";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php6D97.tmp";s:5:"error";i:0;s:4:"size";i:1784469;}}', '0000-00-00 00:00:00', 5),
(391, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(392, 'a:6:{s:4:"edit";s:2:"21";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"AMIT";s:5:"genre";s:1:"4";s:8:"location";s:7:"Manipal";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:30:"00398_toonlandia_2560x1600.jpg";s:4:"type";s:10:"image/jpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php2746.tmp";s:5:"error";i:0;s:4:"size";i:350926;}}', '0000-00-00 00:00:00', 5),
(393, 'a:6:{s:4:"edit";s:3:"21|";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(394, 'a:6:{s:4:"edit";s:2:"13";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"DEF";s:5:"genre";s:1:"6";s:8:"location";s:5:"Delhi";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(395, 'a:6:{s:4:"edit";s:1:"8";s:4:"page";s:1:"1";s:7:"section";s:13:"_adm_language";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:55:"a:2:{s:4:\\"lang\\";s:3:\\"asc\\";s:3:\\"key\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:4:"lang";s:2:"en";s:3:"key";s:12:"_site_title_";s:5:"value";s:16:"Admin Login Area";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(396, 'a:6:{s:4:"edit";s:2:"14";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"GHJ";s:5:"genre";s:1:"5";s:8:"location";s:5:"Delhi";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 6),
(397, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 6),
(398, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:10:"Alex Arnan";s:4:"band";s:2:"13";s:3:"sex";s:1:"1";s:8:"position";s:7:"Drummer";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 6),
(399, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 6),
(400, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(401, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:3:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"HipHop";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(402, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_genre";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"genre_name\\";s:3:\\"asc\\";}";}', 'a:4:{s:18:"actionFormSubmited";s:1:"1";s:10:"genre_name";s:6:"HipHop";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(403, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(404, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(405, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_message";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(406, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(407, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(408, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(409, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"14";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(410, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:13:"_adm_language";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:55:"a:2:{s:4:\\"lang\\";s:3:\\"asc\\";s:3:\\"key\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(411, 'a:6:{s:4:"edit";s:1:"3";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:20:"Why this Kolaveri Di";s:7:"caption";s:8:"Kolaveri";s:4:"band";s:2:"19";s:7:"youtube";s:40:"http://www.youtube.com/embed/YR12Z8f1Dh8";s:6:"choice";s:1:"2";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(412, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(413, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(414, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(415, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(416, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(417, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(418, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:17:"Arijit Chatterjee";s:4:"band";s:0:"";s:5:"genre";s:1:"6";s:3:"sex";s:1:"1";s:8:"position";s:6:"Singer";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:12:"artist_pic_1";a:5:{s:4:"name";s:10:"album4.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php3ACE.tmp";s:5:"error";i:0;s:4:"size";i:12487;}}', '0000-00-00 00:00:00', 5),
(419, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(420, 'a:6:{s:4:"edit";s:1:"1";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:17:"Amit Kumar Mondal";s:4:"band";s:2:"12";s:5:"genre";s:0:"";s:3:"sex";s:1:"1";s:8:"position";s:9:"Guitarist";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:12:"artist_pic_1";a:5:{s:4:"name";s:10:"album9.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php3ADF.tmp";s:5:"error";i:0;s:4:"size";i:11973;}}', '0000-00-00 00:00:00', 5),
(421, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(422, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:13:"Mohit Chauhan";s:4:"band";s:0:"";s:5:"genre";s:1:"6";s:3:"sex";s:1:"1";s:8:"position";s:6:"Singer";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(423, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(424, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:13:"Mohit Chauhan";s:4:"band";s:0:"";s:5:"genre";s:1:"7";s:3:"sex";s:1:"1";s:8:"position";s:6:"Singer";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(425, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(426, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(427, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(428, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(429, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(430, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(431, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(432, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:7:"Tenu Le";s:7:"caption";s:9:"Jai Veeru";s:4:"band";s:0:"";s:6:"artist";s:1:"5";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"audio_pic_1";a:5:{s:4:"name";s:11:"album18.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php1D35.tmp";s:5:"error";i:0;s:4:"size";i:12149;}s:11:"localfile_1";a:5:{s:4:"name";s:27:"Tennu Le - www.Songs.PK.mp3";s:4:"type";s:10:"audio/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php1D46.tmp";s:5:"error";i:0;s:4:"size";i:5162889;}}', '0000-00-00 00:00:00', 5),
(433, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(434, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(435, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(436, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:2:{s:11:"video_pic_1";a:5:{s:4:"name";s:10:"video2.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php612A.tmp";s:5:"error";i:0;s:4:"size";i:171090;}s:11:"localfile_1";a:5:{s:4:"name";s:17:"4f47f9fcedec7.mpg";s:4:"type";s:10:"video/mpeg";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php613A.tmp";s:5:"error";i:0;s:4:"size";i:11197036;}}', '0000-00-00 00:00:00', 5),
(437, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(438, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:9:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(439, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(440, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"5";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php31CE.tmp";s:5:"error";i:0;s:4:"size";i:1784469;}}', '0000-00-00 00:00:00', 5),
(441, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(442, 'a:6:{s:4:"edit";s:298:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:3:{s:7:\\"120x120\\";s:4:\\"crop\\";s:7:\\"300x200\\";s:6:\\"resize\\";s:7:\\"190x300\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"22\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(443, 'a:6:{s:4:"edit";s:2:"22";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"5";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php154A.tmp";s:5:"error";i:0;s:4:"size";i:1784469;}}', '0000-00-00 00:00:00', 5),
(444, 'a:6:{s:4:"edit";s:298:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:3:{s:7:\\"120x120\\";s:4:\\"crop\\";s:7:\\"300x200\\";s:6:\\"resize\\";s:7:\\"190x300\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"22\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(445, 'a:6:{s:4:"edit";s:2:"22";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"5";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"2.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php4D8A.tmp";s:5:"error";i:0;s:4:"size";i:2742955;}}', '0000-00-00 00:00:00', 5),
(446, 'a:6:{s:4:"edit";s:2:"22";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"delete";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(447, 'a:6:{s:4:"edit";s:128:"a:3:{i:0;a:3:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:15:\\"uploads/videos/\\";s:5:\\"order\\";b:1;}i:1;s:9:\\"localfile\\";i:2;s:1:\\"4\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(448, 'a:6:{s:4:"edit";s:1:"4";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:6:"ABCDEF";s:7:"caption";s:4:"AMIT";s:4:"band";s:2:"15";s:6:"artist";s:0:"";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(449, 'a:6:{s:4:"edit";s:1:"8";s:4:"page";s:1:"1";s:7:"section";s:13:"_adm_language";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:55:"a:2:{s:4:\\"lang\\";s:3:\\"asc\\";s:3:\\"key\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:4:"lang";s:2:"en";s:3:"key";s:12:"_site_title_";s:5:"value";s:22:"Tap-N-Tune Admin Panel";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(450, 'a:6:{s:4:"edit";s:1:"8";s:4:"page";s:1:"1";s:7:"section";s:13:"_adm_language";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:55:"a:2:{s:4:\\"lang\\";s:3:\\"asc\\";s:3:\\"key\\";s:3:\\"asc\\";}";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:4:"lang";s:2:"en";s:3:"key";s:12:"_site_title_";s:5:"value";s:22:"Tap-N-Tune Admin Panel";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(451, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(452, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"6";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php61DA.tmp";s:5:"error";i:0;s:4:"size";i:1784469;}}', '0000-00-00 00:00:00', 5),
(453, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(454, 'a:6:{s:4:"edit";s:206:"a:3:{i:0;a:5:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x300\\";s:6:\\"resize\\";}}i:1;s:6:\\"poster\\";i:2;s:2:\\"23\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(455, 'a:6:{s:4:"edit";s:2:"23";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"6";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php5D88.tmp";s:5:"error";i:0;s:4:"size";i:1784469;}}', '0000-00-00 00:00:00', 5),
(456, 'a:6:{s:4:"edit";s:206:"a:3:{i:0;a:5:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x300\\";s:6:\\"resize\\";}}i:1;s:6:\\"poster\\";i:2;s:2:\\"23\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(457, 'a:6:{s:4:"edit";s:2:"23";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"6";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:5:"1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:23:"C:\\xampp\\tmp\\php80A.tmp";s:5:"error";i:0;s:4:"size";i:1784469;}}', '0000-00-00 00:00:00', 5),
(458, 'a:6:{s:4:"edit";s:2:"23";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"ABCD";s:5:"genre";s:1:"6";s:8:"location";s:1:"A";s:7:"fb_page";s:0:"";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(459, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(460, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:9:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"localfile_1";a:5:{s:4:"name";s:41:"Imran Khan Bewafa ChipMunk remix 0001.mp4";s:4:"type";s:9:"video/mp4";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php2F2E.tmp";s:5:"error";i:0;s:4:"size";i:5663752;}}', '0000-00-00 00:00:00', 5),
(461, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:9:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"localfile_1";a:5:{s:4:"name";s:41:"Imran Khan Bewafa ChipMunk remix 0001.mp4";s:4:"type";s:9:"video/mp4";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpD444.tmp";s:5:"error";i:0;s:4:"size";i:5663752;}}', '0000-00-00 00:00:00', 5),
(462, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:9:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"localfile_1";a:5:{s:4:"name";s:51:"Dailymotion - Charisma Carpenter - a Sexy video.mp4";s:4:"type";s:9:"video/mp4";s:8:"tmp_name";s:23:"C:\\xampp\\tmp\\php7E4.tmp";s:5:"error";i:0;s:4:"size";i:11636604;}}', '0000-00-00 00:00:00', 5),
(463, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(464, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:9:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"localfile_1";a:5:{s:4:"name";s:41:"Imran Khan Bewafa ChipMunk remix 0001.mp4";s:4:"type";s:9:"video/mp4";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php4208.tmp";s:5:"error";i:0;s:4:"size";i:5663752;}}', '0000-00-00 00:00:00', 5),
(465, 'a:6:{s:4:"edit";s:1:"5";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', 'a:9:{s:18:"actionFormSubmited";s:1:"1";s:10:"video_name";s:3:"XYZ";s:7:"caption";s:5:"ASDEF";s:4:"band";s:0:"";s:6:"artist";s:1:"4";s:7:"youtube";s:0:"";s:6:"choice";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:11:"localfile_1";a:5:{s:4:"name";s:41:"Imran Khan Bewafa ChipMunk remix 0001.mp4";s:4:"type";s:9:"video/mp4";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpC981.tmp";s:5:"error";i:0;s:4:"size";i:5663752;}}', '0000-00-00 00:00:00', 5);
INSERT INTO `_adminlog` (`idlog`, `request_get`, `request_post`, `request_files`, `stamp`, `user`) VALUES
(466, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(467, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"12\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(468, 'a:6:{s:4:"edit";s:2:"12";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"ABC";s:5:"genre";s:1:"5";s:8:"location";s:7:"Kolkata";s:7:"fb_page";s:64:"http://www.facebook.com/pages/Synapse-hub-NITdgp/251625021526840";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"video4.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:23:"C:\\xampp\\tmp\\php429.tmp";s:5:"error";i:0;s:4:"size";i:186562;}}', '0000-00-00 00:00:00', 5),
(469, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"23\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(470, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"13\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(471, 'a:6:{s:4:"edit";s:2:"13";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"DEF";s:5:"genre";s:1:"6";s:8:"location";s:5:"Delhi";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"video8.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php5DFD.tmp";s:5:"error";i:0;s:4:"size";i:128504;}}', '0000-00-00 00:00:00', 5),
(472, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"14\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(473, 'a:6:{s:4:"edit";s:2:"14";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"GHJ";s:5:"genre";s:1:"5";s:8:"location";s:5:"Delhi";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:11:"video12.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php8CAB.tmp";s:5:"error";i:0;s:4:"size";i:150203;}}', '0000-00-00 00:00:00', 5),
(474, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"15\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(475, 'a:6:{s:4:"edit";s:2:"15";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"KLM";s:5:"genre";s:1:"5";s:8:"location";s:7:"Chennai";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"video7.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpC1DF.tmp";s:5:"error";i:0;s:4:"size";i:150166;}}', '0000-00-00 00:00:00', 5),
(476, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"16\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(477, 'a:6:{s:4:"edit";s:2:"16";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"NOP";s:5:"genre";s:1:"4";s:8:"location";s:9:"Rajasthan";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"video5.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\phpEF56.tmp";s:5:"error";i:0;s:4:"size";i:155093;}}', '0000-00-00 00:00:00', 5),
(478, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"20\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(479, 'a:6:{s:4:"edit";s:2:"20";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"RRR";s:5:"genre";s:1:"4";s:8:"location";s:6:"Sikkim";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"video8.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php1A1E.tmp";s:5:"error";i:0;s:4:"size";i:128504;}}', '0000-00-00 00:00:00', 5),
(480, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"19\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(481, 'a:6:{s:4:"edit";s:2:"19";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:4:"SERR";s:5:"genre";s:1:"7";s:8:"location";s:5:"Vizag";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:10:"video1.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php4C27.tmp";s:5:"error";i:0;s:4:"size";i:184718;}}', '0000-00-00 00:00:00', 5),
(482, 'a:6:{s:4:"edit";s:238:"a:3:{i:0;a:6:{s:3:\\"for\\";b:0;s:8:\\"location\\";s:16:\\"uploads/gallery/\\";s:5:\\"order\\";b:1;s:13:\\"keep-original\\";b:0;s:6:\\"resize\\";a:1:{s:7:\\"190x160\\";s:6:\\"resize\\";}s:12:\\"fixed-aspect\\";s:1:\\"R\\";}i:1;s:6:\\"poster\\";i:2;s:2:\\"17\\";}";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:10:"deletefile";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(483, 'a:6:{s:4:"edit";s:2:"17";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_bands";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:36:"a:1:{s:9:\\"band_name\\";s:3:\\"asc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:9:"band_name";s:3:"XYZ";s:5:"genre";s:1:"6";s:8:"location";s:6:"Kerala";s:7:"fb_page";s:0:"";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', 'a:1:{s:8:"poster_1";a:5:{s:4:"name";s:11:"video10.png";s:4:"type";s:9:"image/png";s:8:"tmp_name";s:24:"C:\\xampp\\tmp\\php799D.tmp";s:5:"error";i:0;s:4:"size";i:156350;}}', '0000-00-00 00:00:00', 5),
(484, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_artist";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(485, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(486, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(487, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(488, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(489, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(490, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(491, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(492, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:5:"para3";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para4";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(493, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(494, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:5:"para3";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para4";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(495, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:4:\\"date\\";s:4:\\"desc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(496, 'a:6:{s:4:"edit";s:1:"1";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:5:"para3";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para4";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(497, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:7:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:5:"para3";s:449:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.";s:5:"para4";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(498, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', '', '', '0000-00-00 00:00:00', 5),
(499, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', '', '', '0000-00-00 00:00:00', 5),
(500, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_about";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:0:"";s:5:"para2";s:0:"";s:5:"para3";s:0:"";s:5:"para4";s:0:"";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(501, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(502, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_video";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:38:"a:1:{s:10:\\"video_name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(503, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(504, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:7:"Krishna";s:3:"sex";s:1:"1";s:4:"mail";s:7:"x@y.com";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(505, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(506, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(507, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:12:"Mohit Wilson";s:3:"sex";s:1:"1";s:4:"mail";s:7:"x@y.com";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(508, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(509, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(510, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:4:"name";s:17:"Sarita Chatterjee";s:3:"sex";s:1:"2";s:4:"mail";s:7:"x@y.com";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(511, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_owner";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:31:"a:1:{s:4:\\"name\\";s:3:\\"asc\\";}";}', '', '', '0000-00-00 00:00:00', 5),
(512, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_contact";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', '', '', '0000-00-00 00:00:00', 5),
(513, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_contact";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:455:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.\r\n    ";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(514, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_contact";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:391:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(515, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_contact";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:5:{s:18:"actionFormSubmited";s:1:"1";s:5:"para1";s:391:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.";s:5:"para2";s:996:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(516, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:11:"tnt_contact";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', '', '', '0000-00-00 00:00:00', 5),
(517, 'a:6:{s:4:"edit";s:1:"2";s:4:"page";s:1:"1";s:7:"section";s:9:"tnt_audio";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:32:"a:1:{s:5:\\"title\\";s:3:\\"asc\\";}";}', 'a:8:{s:18:"actionFormSubmited";s:1:"1";s:5:"title";s:20:"Abhi Mujh Mein Kahin";s:7:"caption";s:9:"Agneepath";s:4:"band";s:2:"17";s:6:"artist";s:0:"";s:4:"like";s:1:"1";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(518, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_social";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', '', '', '0000-00-00 00:00:00', 5),
(519, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_social";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:8:"facebook";s:2:"qq";s:7:"twitter";s:2:"qq";s:6:"google";s:2:"qq";s:6:"active";s:1:"1";s:10:"insertForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5),
(520, 'a:6:{s:4:"edit";s:1:"0";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_social";s:4:"show";s:6:"insert";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', '', '', '0000-00-00 00:00:00', 5),
(521, 'a:6:{s:4:"edit";s:1:"1";s:4:"page";s:1:"1";s:7:"section";s:10:"tnt_social";s:4:"show";s:6:"update";s:6:"filter";s:0:"";s:5:"order";s:0:"";}', 'a:6:{s:18:"actionFormSubmited";s:1:"1";s:8:"facebook";s:24:"http://www.facebook.com/";s:7:"twitter";s:19:"http://twitter.com/";s:6:"google";s:22:"http://plus.google.com";s:6:"active";s:1:"1";s:10:"updateForm";s:6:"Submit";}', '', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `_adminprivs`
--

CREATE TABLE IF NOT EXISTS `_adminprivs` (
  `idpriv` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idpriv`),
  KEY `index_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_adminprivs`
--


-- --------------------------------------------------------

--
-- Table structure for table `_adminroles`
--

CREATE TABLE IF NOT EXISTS `_adminroles` (
  `idrole` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_adminroles`
--


-- --------------------------------------------------------

--
-- Table structure for table `_adminusers`
--

CREATE TABLE IF NOT EXISTS `_adminusers` (
  `idadmin` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `role` bigint(20) unsigned NOT NULL,
  `lastloggedip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastkeyused` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `lasttimestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idadmin`),
  KEY `index_role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `_adminusers`
--

INSERT INTO `_adminusers` (`idadmin`, `username`, `password`, `mail`, `role`, `lastloggedip`, `lastkeyused`, `lasttimestamp`, `active`) VALUES
(5, 'admin', '9206740666e7d93d03052b0a54347edaec691470', 'admin@tapntune.com', 0, '127.0.0.1', 'bba7809f0c2832c2a9b825a66808ff9c', '2012-03-01 17:55:46', 1),
(6, 'amit', 'e5103761b9d2d418d2a6fe4be88a9059a94e0adf', 'admin@amitinside.com', 0, '127.0.0.1', '4d3bbbe374b43acb4ca13f9d5d8d9ad5', '2012-02-27 00:42:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_artist`
--

CREATE TABLE IF NOT EXISTS `_artist` (
  `idartist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `artist_pic` varchar(70) NOT NULL,
  `band` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `sex` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idartist`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `_artist`
--

INSERT INTO `_artist` (`idartist`, `name`, `artist_pic`, `band`, `genre`, `position`, `sex`, `active`) VALUES
(1, 'Amit Kumar Mondal', '4f4bf76060c77.png', 12, '', 'Guitarist', 1, 1),
(2, 'Lipika Dutta', '', 12, '', 'Drummer', 2, 1),
(3, 'Alex Arnan', '', 13, '', 'Drummer', 1, 1),
(4, 'Arijit Chatterjee', '4f4bf40c607c8.png', 0, '6', 'Singer', 1, 1),
(5, 'Mohit Chauhan', '', 0, '7', 'Singer', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_audio`
--

CREATE TABLE IF NOT EXISTS `_audio` (
  `idaudio` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `band` int(11) NOT NULL,
  `artist` varchar(20) NOT NULL,
  `audio_pic` varchar(70) NOT NULL,
  `localfile` varchar(70) NOT NULL,
  `likes` varchar(60) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`idaudio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `_audio`
--

INSERT INTO `_audio` (`idaudio`, `title`, `caption`, `band`, `artist`, `audio_pic`, `localfile`, `likes`, `active`) VALUES
(2, 'Abhi Mujh Mein Kahin', 'Agneepath', 17, '', '4f47ffdb4f370.png', '4f47ffdb5b23f.mp3', '12', 1),
(3, 'Chikni Chameli', 'Agneepath', 15, '', '4f481871560ce.png', '4f48187161e9f.mp3', '22', 1),
(4, 'Bhaag DK Bose', 'Delly Belly', 15, '', '4f4a597978b1e.png', '4f4a597984dac.mp3', '27', 1),
(5, 'Tenu Le', 'Jai Veeru', 0, '5', '4f4bfdbf8c109.png', '4f4bfdbf97d78.mp3', '24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_bands`
--

CREATE TABLE IF NOT EXISTS `_bands` (
  `idband` int(11) NOT NULL AUTO_INCREMENT,
  `band_name` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `poster` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(30) NOT NULL,
  `fb_page` varchar(180) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idband`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `_bands`
--

INSERT INTO `_bands` (`idband`, `band_name`, `genre`, `poster`, `location`, `fb_page`, `active`) VALUES
(14, 'GHJ', '5', '4f4f103abc1e9.png', 'Delhi', '', 1),
(13, 'DEF', '6', '4f4f102ecf7c0.png', 'Delhi', '', 1),
(12, 'ABC', '5', '4f4f1017d15c5.png', 'Kolkata', 'http://www.facebook.com/pages/Synapse-hub-NITdgp/251625021526840', 1),
(15, 'KLM', '5', '4f4f10485d955.png', 'Chennai', '', 1),
(16, 'NOP', '4', '4f4f1054059c6.png', 'Rajasthan', '', 1),
(17, 'XYZ', '6', '4f4f107768018.png', 'Kerala', '', 1),
(19, 'SERR', '7', '4f4f106bbfbbd.png', 'Vizag', '', 1),
(20, 'RRR', '4', '4f4f105eec3b8.png', 'Sikkim', '', 1),
(23, 'ABCD', '6', '', 'A', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_contact`
--

CREATE TABLE IF NOT EXISTS `_contact` (
  `idcontact` int(11) NOT NULL AUTO_INCREMENT,
  `para1` text NOT NULL,
  `para2` text NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`idcontact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `_contact`
--

INSERT INTO `_contact` (`idcontact`, `para1`, `para2`, `active`) VALUES
(1, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_genres`
--

CREATE TABLE IF NOT EXISTS `_genres` (
  `idgenre` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idgenre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `_genres`
--

INSERT INTO `_genres` (`idgenre`, `genre_name`, `active`) VALUES
(5, 'HipHop', 1),
(4, 'Pop', 1),
(6, 'RnB', 1),
(7, 'Rock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_message`
--

CREATE TABLE IF NOT EXISTS `_message` (
  `idmessage` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `web` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`idmessage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `_message`
--


-- --------------------------------------------------------

--
-- Table structure for table `_owner`
--

CREATE TABLE IF NOT EXISTS `_owner` (
  `idowner` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idowner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `_owner`
--

INSERT INTO `_owner` (`idowner`, `name`, `mail`, `sex`, `active`) VALUES
(1, 'Krishna', 'x@y.com', 1, 1),
(2, 'Mohit Wilson', 'x@y.com', 1, 1),
(3, 'Sarita Chatterjee', 'x@y.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_social`
--

CREATE TABLE IF NOT EXISTS `_social` (
  `idsocial` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(70) NOT NULL,
  `twitter` varchar(70) NOT NULL,
  `google` varchar(70) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idsocial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `_social`
--

INSERT INTO `_social` (`idsocial`, `facebook`, `twitter`, `google`, `active`) VALUES
(1, 'http://www.facebook.com/', 'http://twitter.com/', 'http://plus.google.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_video`
--

CREATE TABLE IF NOT EXISTS `_video` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `band` int(11) NOT NULL,
  `artist` varchar(20) NOT NULL,
  `localfile` varchar(70) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `video_pic` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choice` int(11) NOT NULL,
  `video_name` varchar(50) NOT NULL,
  `caption` varchar(15) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idvideo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `_video`
--

INSERT INTO `_video` (`idvideo`, `band`, `artist`, `localfile`, `youtube`, `video_pic`, `choice`, `video_name`, `caption`, `active`) VALUES
(3, 19, '', '', 'http://www.youtube.com/embed/YR12Z8f1Dh8', '4f47f407e3204.png', 2, 'Why this Kolaveri Di', 'Kolaveri', 1),
(4, 15, '', '', '', '4f48c6ab07797.png', 1, 'ABCDEF', 'AMIT', 0),
(5, 0, '4', '4f4eaf02c5e3f.mp4', '', '4f4bff9b84b2a.png', 1, 'XYZ', 'ASDEF', 1);

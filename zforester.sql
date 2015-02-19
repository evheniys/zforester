-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 12:14 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zforester`
--

-- --------------------------------------------------------

--
-- Table structure for table `filelog`
--

CREATE TABLE IF NOT EXISTS `filelog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `fileid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `filelog`
--

INSERT INTO `filelog` (`id`, `userid`, `fileid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-02-19 13:42:04', '2015-02-19 13:42:04'),
(2, 1, 3, '2015-02-19 13:48:15', '2015-02-19 13:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `mimetype`, `description`, `created_at`, `updated_at`) VALUES
(1, 'upload/adobe_pdf.pdf', 'multipart/octet-stream', 'Файл в формате Adobe PDF', '2015-02-19 07:34:50', '2015-02-19 07:34:50'),
(2, 'upload/microsoft_word_doc.doc', 'application/msword', 'Файл в формате Microsoft Office DOC', '2015-02-19 07:35:18', '2015-02-19 07:35:18'),
(3, 'upload/microsoft_word_docx.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Файл в формате Microsoft Office DOCX', '2015-02-19 07:35:45', '2015-02-19 07:35:45'),
(4, 'upload/microsoft_excel_xls.xls', 'application/vnd.ms-excel', 'Файл в формате Microsoft Office XLS', '2015-02-19 07:36:01', '2015-02-19 07:36:01'),
(5, 'upload/microsoft_excel_xlsx.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'Файл в формате Microsoft Office XLSX', '2015-02-19 07:36:12', '2015-02-19 07:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_02_15_154314_TurboSmsSend', 1),
('2015_02_15_210512_CreateUserLog', 1),
('2015_02_15_210529_CreateFileLog', 1),
('2015_02_17_154908_Create_Files_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_02_15_154314_TurboSmsSend', 2),
('2015_02_15_210512_CreateUserLog', 2),
('2015_02_15_210529_CreateFileLog', 2),
('2015_02_18_201317_ChangeFilesTable', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_phonenumber_index` (`phonenumber`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turbosmssent`
--

CREATE TABLE IF NOT EXISTS `turbosmssent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `turbosmssent`
--

INSERT INTO `turbosmssent` (`id`, `phone`, `text`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '+380958949336', 'Ваш пароль на доступ к сайту: "7556"', 'Сообщения успешно отправлено', NULL, '2015-02-15 21:47:59', '2015-02-15 21:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `ipaddress` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userid`, `activity`, `ipaddress`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '127.0.0.1', '2015-02-15 21:48:00', '2015-02-15 21:48:00'),
(2, 1, 2, '127.0.0.1', '2015-02-19 20:09:37', '2015-02-19 20:09:37'),
(3, 1, 2, '127.0.0.1', '2015-02-19 20:10:12', '2015-02-19 20:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phonenumber_unique` (`phonenumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phonenumber`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '+380958949336', '$2y$10$ThiYs.mY0wFUAsvKnUw8welBTO0tRDXC9HZNVkGRDL0WULDMr.OFK', 1, 'XQYaogpcgMDQaqU1B0KSZYV3Mv6oNZTIGLuI3fGBmTCsI80yboktV439LAmb', '2015-02-15 21:47:59', '2015-02-19 20:09:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

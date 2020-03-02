-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2017 at 06:39 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nbu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `order_by` smallint(6) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(200) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `blog` varchar(200) DEFAULT NULL,
  `biography` varchar(200) DEFAULT NULL,
  `level_name` text NOT NULL,
  `name` text NOT NULL,
  `reception_days` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `order_by`, `status`, `phone`, `fax`, `email`, `site`, `image`, `blog`, `biography`, `level_name`, `name`, `reception_days`) VALUES
(1, 1, 1, '123', '123', '12321', '123', 'e3572e07fa29f940e16a58623cc0fd78.jpg', '123', '123', '123123', '123123', '123'),
(2, 2, 1, '23432', '234234', '23423', '423432', '', '324324', '4324', '123', '123', '234324');

-- --------------------------------------------------------

--
-- Table structure for table `admission_lang`
--

CREATE TABLE `admission_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `level_name` varchar(256) NOT NULL,
  `reception_days` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission_lang`
--

INSERT INTO `admission_lang` (`id`, `parent`, `lang`, `name`, `level_name`, `reception_days`) VALUES
(1, 1, 2, '123', '12333', ''),
(2, 1, 3, '123123', '112333', '123tt1333');

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `name`, `url`, `image`, `status`, `category`) VALUES
(2, '123', '123', '460acef59f95528c6ac72c8b0fe8811b.jpg', 1, 1),
(3, 'footer-banner', '/', '866a12de84a98798b12154e8e58e5217.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `advertise_lang`
--

CREATE TABLE `advertise_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(600) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `description`, `creator`, `created_date`, `status`, `order_by`, `seen_count`) VALUES
(1, 'В соответствии с постановлением Президента Республики Узбекистан от 8 августа 2013 года №ПП-2022', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, incidunt?</p>\r\n', 1, '2017-08-03 14:09:24', 1, NULL, 173);

-- --------------------------------------------------------

--
-- Table structure for table `album_lang`
--

CREATE TABLE `album_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album_lang`
--

INSERT INTO `album_lang` (`id`, `lang`, `parent`, `name`, `description`) VALUES
(1, 2, 1, 'First Album', '');

-- --------------------------------------------------------

--
-- Table structure for table `attach`
--

CREATE TABLE `attach` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guid` varchar(100) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `size` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attach`
--

INSERT INTO `attach` (`id`, `section`, `parent`, `name`, `guid`, `extension`, `size`, `creator`, `created_date`, `status`) VALUES
(1, 1, 33, 'banner.jpg', '28199ac8dafccbe4240ae08729b6b80e', 'jpg', 114596, 1, '2017-10-31 23:42:41', 1),
(2, 1, 33, 'banner.jpg', 'ca5d1bc289fa71bf2740e8f96618a639', 'jpg', 114596, 1, '2017-10-31 23:44:59', 1),
(3, 1, 33, 'banner.jpg', '8daf759a202ccc45d754fff126f33b92', 'jpg', 114596, 1, '2017-10-31 23:46:00', 1),
(4, 1, 33, 'book-1.png', 'f6dc648f8bf3a4a5598805763aabec3a', 'png', 179142, 1, '2017-10-31 23:51:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `image`, `file`, `status`) VALUES
(1, '123', '123', 'd352de01e7cb91486d8ced7d1328507d.png', '1.html', 1),
(2, '123', '123', 'aa04a8d42c1a7027ba86857ba49378bf.png', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books_lang`
--

CREATE TABLE `books_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_lang`
--

INSERT INTO `books_lang` (`id`, `parent`, `lang`, `title`, `description`) VALUES
(1, 1, 2, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `callback`
--

CREATE TABLE `callback` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `callback`
--

INSERT INTO `callback` (`id`, `phone`, `date`, `status`) VALUES
(1, '123', '2017-10-28 23:17:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `leader` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  `anons` varchar(300) NOT NULL,
  `fax` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `region`, `name`, `body`, `leader`, `address`, `email`, `phone`, `icon`, `creator`, `created_date`, `updated_date`, `status`, `anons`, `fax`) VALUES
(1, 1, 'Филиал в Республике Каракалпакстане', '<p>123</p>\r\n', '', '12312', '', '123213', '', 1, '2017-11-01 14:24:07', '2017-11-01 14:36:57', 1, '123', ''),
(2, 14, 'ewrer', '<p>rwe</p>\r\n', '', '12312312', '', '123123', '', 1, '2017-11-01 14:25:02', '2017-11-01 14:33:15', 1, 'werewr', ''),
(3, 1, '132', '<p>123213</p>\r\n', '', '123213', '', '123', '', 1, '2017-11-01 16:54:48', '2017-11-01 16:54:48', 1, '123', ''),
(4, 10, 'ewq', '<p>32132</p>\r\n', '', '', '', '', '', 1, '2017-11-01 16:55:04', '2017-11-01 17:00:29', 1, 'ewq', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_lang`
--

CREATE TABLE `company_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `anons` varchar(300) NOT NULL,
  `body` text NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `leader` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company_signup`
--

CREATE TABLE `company_signup` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `director` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `fax` varchar(256) DEFAULT NULL,
  `region` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `index` varchar(10) DEFAULT NULL,
  `product` varchar(500) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `mfo` varchar(5) NOT NULL,
  `inn` varchar(9) NOT NULL,
  `okonx` varchar(5) DEFAULT NULL,
  `rs` varchar(30) NOT NULL COMMENT 'Hisob raqami',
  `opf` varchar(4) DEFAULT NULL,
  `fs` varchar(3) DEFAULT NULL,
  `soato` varchar(7) DEFAULT NULL,
  `okpo` varchar(8) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_date` datetime NOT NULL,
  `phone` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `created_date`, `phone`, `category`) VALUES
(1, 'qwewq', 'wqee@r.ru', '', 'weqe', '2017-11-02 13:11:56', 'wqewqe', 0),
(2, '12312', '123123@m.ru', '', '123123', '2017-11-02 13:15:31', '123123', 0),
(3, '12312', '123123@m.ru', '', '123123', '2017-11-02 13:15:32', '123123', 0),
(4, '12312', '123123@m.ru', '', '123123', '2017-11-02 13:15:37', '123123', 0),
(5, '12312', '123123@m.ru', '', '123123', '2017-11-02 13:15:55', '123123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_by` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `parent`, `name`, `order_by`, `status`) VALUES
(1, 1, 'Oltinko\'l tumani', 10, 1),
(2, 1, 'Andijon tumani', 20, 1),
(3, 1, 'Asaka tumani', 30, 1),
(4, 1, 'Baliqchi tumani', 40, 1),
(5, 1, 'Bo\'z tumani', 50, 1),
(6, 1, 'Buloqboshi tumani', 60, 1),
(7, 1, 'Jalolquduq tumani', 70, 1),
(8, 1, 'Izbosgan tumani', 80, 1),
(9, 1, 'Qo\'rg\'ontepa tumani', 90, 1),
(10, 1, 'Marhamat tumani', 100, 1),
(11, 1, 'Paxtaobod tumani', 110, 1),
(12, 1, 'Ulug\'nor tumani', 120, 1),
(13, 1, 'Xo\'jaobod tumani', 130, 1),
(14, 1, 'Shaxrixon tumani', 140, 1),
(15, 1, 'Andijon shahar', 150, 1),
(16, 1, 'Xonobod shahar', 160, 1),
(17, 2, 'Olot tumani', 10, 1),
(18, 2, 'Buxoro tumani', 20, 1),
(19, 2, 'Vobkent tumani', 30, 1),
(20, 2, 'G\'ijduvon tumani', 40, 1),
(21, 2, 'Jondor tumani', 50, 1),
(22, 2, 'Kogon tumani', 60, 1),
(23, 2, 'Qorako\'l tumani', 70, 1),
(24, 2, 'Qorovulbozor tumani', 80, 1),
(25, 2, 'Peshku tumani', 90, 1),
(26, 2, 'Romitan tumani', 100, 1),
(27, 2, 'Shofirkon tumani', 110, 1),
(28, 2, 'Buxoro shahar', 120, 1),
(29, 3, 'Arnasoy tumani', 10, 1),
(30, 3, 'Baxmal tumani', 20, 1),
(31, 3, 'G\'allaorol tumani', 30, 1),
(32, 3, 'Jizzax tumani', 40, 1),
(33, 3, 'Do\'stlik tumani', 50, 1),
(34, 3, 'Zomin tumani', 60, 1),
(35, 3, 'Zarbdor tumani', 70, 1),
(36, 3, 'Zafarobod tumani', 80, 1),
(37, 3, 'Mirzacho\'l tumani', 90, 1),
(38, 3, 'Paxtakor tumani', 100, 1),
(39, 3, 'Forish tumani', 110, 1),
(40, 3, 'Yangiobod tumani', 120, 1),
(41, 3, 'Jizzax shahar', 1230, 1),
(42, 4, 'G\'uzor tumani', 10, 1),
(43, 4, 'Dehqonobod tumani', 20, 1),
(44, 4, 'Qamashi tumani', 30, 1),
(45, 4, 'Qarshi tumani', 40, 1),
(46, 4, 'Koson tumani', 50, 1),
(47, 4, 'Kasbi tumani', 60, 1),
(48, 4, 'Kitob tumani', 70, 1),
(49, 4, 'Mirishkor tumani', 80, 1),
(50, 4, 'Muborak tumani', 90, 1),
(51, 4, 'Nishon tumani', 100, 1),
(52, 4, 'Chiroqchi tumani', 110, 1),
(53, 4, 'Shaxrisabz tumani', 120, 1),
(54, 4, 'Yakkabog\' tumani', 130, 1),
(55, 4, 'Qarshi shahar', 150, 1),
(56, 5, 'Konimex tumani', 10, 1),
(57, 5, 'Karmana tumani', 20, 1),
(58, 5, 'Qiziltepa tumani', 30, 1),
(59, 5, 'Navbahor tumani', 40, 1),
(60, 5, 'Nurota tumani', 50, 1),
(61, 5, 'Tomdi tumani', 60, 1),
(62, 5, 'Uchquduq tumani', 70, 1),
(63, 5, 'Xatirchi tumani', 80, 1),
(64, 5, 'Zarafshon shahar', 90, 1),
(65, 5, 'Navoiy shahar', 100, 1),
(66, 6, 'Kosonsoy tumani', 10, 1),
(67, 6, 'Mingbuloq tumani', 20, 1),
(68, 6, 'Namangan tumani', 30, 1),
(69, 6, 'Norin tumani', 40, 1),
(70, 6, 'Pop tumani', 50, 1),
(71, 6, 'To\'raqo\'rg\'on tumani', 60, 1),
(72, 6, 'Uychi tumani', 70, 1),
(73, 6, 'Uchqo\'rg\'on tumani', 80, 1),
(74, 6, 'Chortoq tumani', 90, 1),
(75, 6, 'Chust tumani', 100, 1),
(76, 6, 'Yangiqo\'rg\'on tumani', 110, 1),
(77, 6, 'Namangan shahar', 120, 1),
(78, 7, 'Oqdaryo tumani', 10, 1),
(79, 7, 'Bulung\'ur tumani', 20, 1),
(80, 7, 'Jomboy tumani', 30, 1),
(81, 7, 'Ishtixon tumani', 40, 1),
(82, 7, 'Kattaqo\'rg\'on tumani', 50, 1),
(83, 7, 'Qo\'shrabot tumani', 60, 1),
(84, 7, 'Narpay tumani', 70, 1),
(85, 7, 'Nurobod tumani', 80, 1),
(86, 7, 'Payariq tumani', 90, 1),
(87, 7, 'Pastdarg\'om tumani', 110, 1),
(88, 7, 'Paxtachi tumani', 120, 1),
(89, 7, 'Samarqand tumani', 130, 1),
(90, 7, 'Tayloq tumani', 140, 1),
(91, 7, 'Urgut tumani', 150, 1),
(92, 7, 'Kattaqo\'rg\'on shahar', 160, 1),
(93, 7, 'Samarqand shahar', 170, 1),
(94, 8, 'Oltinsoy tumani', 10, 1),
(95, 8, 'Angor tumani', 20, 1),
(96, 8, 'Bo\'ysun tumani', 30, 1),
(97, 8, 'Denov tumani', 40, 1),
(98, 8, 'Jarqo\'rgon tumani', 50, 1),
(99, 8, 'Qiziriq tumani', 60, 1),
(100, 8, 'Qumqo\'rg\'on tumani', 70, 1),
(101, 8, 'Muzrabot tumani', 80, 1),
(102, 8, 'Sariosiyo  tumani', 90, 1),
(103, 8, 'Termiz  tumani', 100, 1),
(104, 8, 'Uzun  tumani', 110, 1),
(105, 8, 'Sherobod  tumani', 120, 1),
(106, 8, 'Sho\'rchi  tumani', 130, 1),
(107, 8, 'Termiz shahar', 140, 1),
(108, 9, 'Oqoltin tumani', 10, 1),
(109, 9, 'Boyovut tumani', 20, 1),
(110, 9, 'Guliston tumani', 30, 1),
(111, 9, 'Mirzaobod tumani', 40, 1),
(112, 9, 'Sayxunobod tumani', 50, 1),
(113, 9, 'Sardoba tumani', 60, 1),
(114, 9, 'Sirdaryo tumani', 70, 1),
(115, 9, 'Xovos tumani', 80, 1),
(116, 9, 'Guliston shahar', 90, 1),
(117, 9, 'Shirin shahar', 100, 1),
(118, 9, 'Yangiyer shahar', 110, 1),
(119, 10, 'Oqqo\'rg\'on tumani', 10, 1),
(120, 10, 'Ohangaron tumani', 20, 1),
(121, 10, 'Bekobod tumani', 30, 1),
(122, 10, 'Bo\'stonliq tumani', 40, 1),
(123, 10, 'Bo\'ka tumani', 50, 1),
(124, 10, 'Zangiota tumani', 60, 1),
(125, 10, 'Qibray tumani', 70, 1),
(126, 10, 'Quyichirchiq tumani', 80, 1),
(127, 10, 'Parkent tumani', 90, 1),
(128, 10, 'Piskent tumani', 100, 1),
(129, 10, 'O\'rtachirchiq tumani', 110, 1),
(130, 10, 'Chinoz tumani', 120, 1),
(131, 10, 'Yuqorichirchiq tumani', 130, 1),
(132, 10, 'Yangiyo\'l tumani', 140, 1),
(133, 10, 'Olmaliq shahar', 150, 1),
(134, 10, 'Angren shahar', 160, 1),
(135, 10, 'Bekobod shahar', 170, 1),
(136, 10, 'Chirchiq shahar', 180, 1),
(137, 11, 'Oltiariq tumani', 10, 1),
(138, 11, 'Bog\'dod tumani', 20, 1),
(139, 11, 'Beshariq tumani', 30, 1),
(140, 11, 'Buvayda tumani', 40, 1),
(141, 11, 'Dang\'ara tumani', 50, 1),
(142, 11, 'Quva tumani', 60, 1),
(143, 11, 'Qo\'shtepa tumani', 70, 1),
(144, 11, 'Rishton tumani', 80, 1),
(145, 11, 'So\'x tumani', 90, 1),
(146, 11, 'Toshloq tumani', 100, 1),
(147, 11, 'O\'zbekiston tumani', 110, 1),
(148, 11, 'Uchko\'prik tumani', 120, 1),
(149, 11, 'Farg\'ona tumani', 130, 1),
(150, 11, 'Furqat tumani', 140, 1),
(151, 11, 'Yozyovon tumani', 150, 1),
(152, 11, 'Qo\'qon shahar', 160, 1),
(153, 11, 'Quvasoy shahar', 170, 1),
(154, 11, 'Marg\'ilon shahar', 180, 1),
(155, 11, 'Farg\'ona shahar', 190, 1),
(156, 12, 'Bog\'ot tumani', 10, 1),
(157, 12, 'Gurlan tumani', 20, 1),
(158, 12, 'Qo\'shko\'pir tumani', 30, 1),
(159, 12, 'Urganch tumani', 40, 1),
(160, 12, 'Xazorasp tumani', 50, 1),
(161, 12, 'Xonqa tumani', 60, 1),
(162, 12, 'Xiva tumani', 70, 1),
(163, 12, 'Shovot tumani', 80, 1),
(164, 12, 'Yangibozor tumani', 90, 1),
(165, 12, 'Yangiariq tumani', 100, 1),
(166, 12, 'Urganch shahar', 110, 1),
(167, 13, 'Amudaryo tumani', 10, 1),
(168, 13, 'Beruniy tumani', 20, 1),
(169, 13, 'Qorao\'zak tumani', 30, 1),
(170, 13, 'Kegeyli tumani', 40, 1),
(171, 13, 'Qo\'ng\'irot tumani', 50, 1),
(172, 13, 'Qonliko\'l tumani', 60, 1),
(173, 13, 'Mo\'ynoq tumani', 70, 1),
(174, 13, 'Nukus tumani', 80, 1),
(175, 13, 'Taxtako\'pir tumani', 90, 1),
(176, 13, 'To\'rtko\'l tumani', 100, 1),
(177, 13, 'Xo\'jayli tumani', 110, 1),
(178, 13, 'Chimboy tumani', 120, 1),
(179, 13, 'Shumanay tumani', 130, 1),
(180, 13, 'Ellikqal\'a tumani', 140, 1),
(181, 13, 'Nukus shahar', 150, 1),
(182, 14, 'Olmazor tumani', 10, 1),
(183, 14, 'Bektemir tumani', 20, 1),
(184, 14, 'Mirobod tumani', 30, 1),
(185, 14, 'Mirzo Ulug\'bek tumani', 40, 1),
(186, 14, 'Sirg\'ali tumani', 50, 1),
(187, 14, 'Uchtepa tumani', 60, 1),
(188, 14, 'Yashnobod tumani', 70, 1),
(189, 14, 'Chilonzor tumani', 80, 1),
(190, 14, 'Shayxontoxur tumani', 90, 1),
(191, 14, 'Yunusobod tumani', 100, 1),
(192, 14, 'Yakkasaroy tumani', 110, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district_lang`
--

CREATE TABLE `district_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `anons` varchar(600) NOT NULL,
  `answer` text NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `anons`, `answer`, `creator`, `created_date`, `order_by`, `status`, `name`, `email`, `phone`, `category`) VALUES
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam inventore libero necessitatibus nesciunt omnis ratione reiciendis rem sed tempore. Deserunt dolorem facere, illo maiores maxime nam odit quam quidem tenetur vero. Aperiam consequuntur ipsam sit suscipit tempore veniam! Consequatur consequuntur cumque debitis deserunt et iste maxime nostrum praesentium reiciendis vero? Accusantium alias architecto consequuntur delectus, deleniti dolorem eligendi eveniet, incidunt maxime nam, neque numquam quam quas quasi similique suscipit ullam unde vitae! Accusantium animi aperiam blanditiis earum, excepturi hic ipsam iure, magni mollitia, necessitatibus nesciunt perspiciatis recusandae repudiandae suscipit totam? Dolorum neque odio qui quis ullam! Architecto, dolorum ex!', 0, '2017-11-02 14:30:07', NULL, 1, '123123', '123123@mr.ru', '123123123', 0),
(11, '12312312312', '', '', 0, '2017-11-02 14:36:21', NULL, 0, '123123', '123123@mr.ru', '131232312', 0),
(12, '321321', '', '', 1, '2017-11-02 14:41:22', NULL, 1, '', '', '', 0),
(13, '123123', '', '<p>13123</p>\r\n', 1, '2017-11-02 14:43:00', NULL, 1, '', '', '', 0),
(14, '123123123', '', '<p>lorem</p>\r\n', 0, '2017-11-02 14:47:06', NULL, 1, '123123', '1@mr.u1', '123123123', 0),
(15, '21313213', '', '', 0, '2017-11-02 16:17:53', NULL, 0, 'qwewq', '1@mr.u1', '123123123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq_lang`
--

CREATE TABLE `faq_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `anons` varchar(600) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_lang`
--

INSERT INTO `faq_lang` (`id`, `lang`, `parent`, `question`, `anons`, `answer`, `status`) VALUES
(1, 2, 1, 'qweqw', 'qwewe', '<p>qweqwe</p>\\r\\n', 0),
(2, 3, 1, 'qweqwe', 'qweqwe', '<p>qwewqeqwe</p>\\r\\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `identity` varchar(96) NOT NULL,
  `lastdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `identity`, `lastdate`) VALUES
(1, '46155a0b93d55807a24f2d85776b8269.59fa270f3b5d0.363baea9cba210afac6d7a556fca596e30c46333', 1509566223);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `guid` varchar(100) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `size` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `album`, `name`, `guid`, `extension`, `size`, `creator`, `created_date`, `status`) VALUES
(4, 1, 'albums-item', '8090c667b05441b1d051777ecd2cf5c2.jpg', 'jpg', 95755, 1, '2017-10-31 16:03:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `abb` varchar(5) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `abb`, `status`) VALUES
(1, 'Русский', 'ru', 1),
(2, 'English', 'en', 1),
(3, 'O`zbekcha', 'uz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `icon2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `type`, `parent`, `name`, `url`, `icon`, `order_by`, `status`, `icon2`) VALUES
(1, 0, NULL, 'Главная', '/', '', NULL, 1, ''),
(2, 0, NULL, 'Фонд', '/fond/', '', NULL, 1, ''),
(3, 0, NULL, 'Услуги', '/services', '', NULL, 1, ''),
(4, 0, NULL, 'Экспортерам', '/', '', NULL, 1, ''),
(5, 0, NULL, 'Пресс-центр', '/', '', NULL, 1, ''),
(6, 0, NULL, 'Мероприятия', '/', '', NULL, 1, ''),
(7, 0, NULL, 'Партнерам', '/', '', NULL, 1, ''),
(8, 0, NULL, 'Контакты', '/site/contacts', '', NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_lang`
--

CREATE TABLE `menu_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'en', ''),
(1, 'ru', 'При полном или частичном использовании и цитировании материалов, опубликованных на данном сайте, ссылка на официальный сайт Фонда'),
(1, 'uz', ''),
(2, 'en', 'Virtual <br> reception'),
(2, 'ru', 'Виртуальная <br> приемная'),
(2, 'uz', 'Virtual <br> qabulxona'),
(3, 'en', ''),
(3, 'ru', 'ФОНД ПОДДЕРЖКИ ЭКСПОРТА\r\n<br>СУБЪЕКТОВ МАЛОГО БИЗНЕСА И\r\n<br>ЧАСТНОГО ПРЕДПРИНИМАТЕЛЬСТВА'),
(3, 'uz', ''),
(4, 'en', 'Learn more'),
(4, 'ru', 'Узнать больше'),
(4, 'uz', ''),
(5, 'en', ''),
(5, 'ru', 'Книги и руководствы для <br>экспортерам'),
(5, 'uz', ''),
(6, 'en', ''),
(6, 'ru', 'Финансирование участия субъектов предпринимательства на зарубежных выставках и ярмарках путем оплаты расходов по рекламе, по поездке и проживанию отечественных субъектов предпринимательства, а также оплаты других'),
(6, 'uz', ''),
(7, 'en', 'News'),
(7, 'ru', 'Новости'),
(7, 'uz', 'Yangiliklar'),
(8, 'en', ''),
(8, 'ru', 'Финансирование участия субъектов предпринимательства на зарубежных выставках и ярмарках путем оплаты расходов по рекламе, по поездке и проживанию отечественных'),
(8, 'uz', ''),
(9, 'en', ''),
(9, 'ru', 'Подробнее'),
(9, 'uz', ''),
(10, 'en', ''),
(10, 'ru', 'Отзывы <br>экспортеров'),
(10, 'uz', ''),
(11, 'en', ''),
(11, 'ru', 'Финансирование участия субъектов предпринимательства на зарубежных выставках и ярмарках путем оплаты расходов по рекламе, по поездке и проживанию отечественных субъектов предпринимательства, а также оплаты других'),
(11, 'uz', ''),
(12, 'en', ''),
(12, 'ru', 'Открыть все'),
(12, 'uz', ''),
(13, 'en', ''),
(13, 'ru', 'Услуги'),
(13, 'uz', ''),
(14, 'en', ''),
(14, 'ru', 'Финансирование участия субъектов предпринимательства на зарубежных выставках и ярмарках путем оплаты расходов по рекламе, по поездке и проживанию отечественных субъектов предпринимательства, а также оплаты других'),
(14, 'uz', ''),
(15, 'en', ''),
(15, 'ru', 'Партнеры'),
(15, 'uz', ''),
(16, 'en', ''),
(16, 'ru', 'Финансирование участия субъектов предпринимательства на зарубежных выставках и ярмарках путем оплаты расходов по рекламе, по поездке и проживанию отечественных субъектов предпринимательства, а также оплаты других'),
(16, 'uz', ''),
(17, 'en', ''),
(17, 'ru', 'Часто задаваемое вопросы'),
(17, 'uz', ''),
(18, 'en', ''),
(18, 'ru', 'Контакты'),
(18, 'uz', '');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `second_title` text,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0',
  `event_date` date DEFAULT NULL,
  `ban` tinyint(1) DEFAULT '0',
  `update_date` datetime NOT NULL,
  `slider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category`, `type`, `visible`, `creator`, `created_date`, `status`, `title`, `second_title`, `anons`, `body`, `main_image`, `secondary_image`, `icon`, `seen_count`, `event_date`, `ban`, `update_date`, `slider`) VALUES
(17, 1, NULL, NULL, 1, '2017-10-30 20:49:12', 1, '123', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-30 20:49:12', 0),
(18, 1, NULL, NULL, 1, '2017-10-30 20:39:25', 1, '123', '123', '', '', '', NULL, NULL, 2, NULL, 0, '2017-10-31 17:45:49', 0),
(19, 1, NULL, NULL, 1, '2017-10-30 20:39:16', 1, '123', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-30 20:39:16', 0),
(20, 1, NULL, NULL, 1, '2017-10-09 12:37:30', 1, 'Международная продовольственная выставка World Food Moscow - 2016', 'Международная продовольственная выставка World Food Moscow - 2016', '', '', 'cc820680c0ca296d749da731d6a2def5.jpg', NULL, NULL, 20, NULL, 0, '2017-10-31 14:43:19', 1),
(21, 1, NULL, NULL, 1, '2017-10-30 16:43:37', 1, '1', '1', '', '', '992ce6ca0498bbfe2de21dc9e2cbad49.jpg', NULL, NULL, 8, NULL, 0, '2017-11-01 10:23:17', 0),
(22, 1, NULL, NULL, 1, '2017-10-30 16:43:55', 1, '2', '2', '', '', 'c0f3e0ce1ff78f3966a3a9e813494457.jpg', NULL, NULL, 16, NULL, 0, '2017-10-31 14:40:18', 0),
(23, 2, NULL, NULL, 1, '2017-10-30 16:44:06', 1, 'Индивидуальные предприниматели и фермерские хозяйства смогут снимать наличную иностранную валюту со своих банковских счетов', 'Индивидуальные предприниматели и фермерские хозяйства смогут снимать наличную иностранную валюту со своих банковских счетов', '', '<p>Во исполнение Указа Президента Республики Узбекистан &laquo;О первоочередных мерах по либерализации валютной политики&raquo; от 2 сентября 2017 года постановлением правления Центрального банка Республики Узбекистан внесены изменения и дополнения в Порядок ведения коммерческими банками счетов в иностранной валюте, сообщает официальный сайт банка.</p>\r\n\r\n<p><img alt=\"\" src=\"images/single-news-page.jpg\" /></p>\r\n\r\n<p>В мероприятии, организованном по инициативе Фонда поддержки экспорта субъектов малого бизнеса и частного предпринимательства при Национальном банке внешнеэкономической деятельности, приняли участие ответственные работники областного территориального управления Торгово-промышленной палаты Узбекистана, коммерческих банков, руководители предприятий-экспортеров и предприниматели.</p>\r\n\r\n<p>Стратегия действий по пяти приоритетным направлениям развития Республики Узбекистан в 2017&ndash;2021 годах служит дальнейшему улучшению делового климата в нашей стране, поддержке развития малого бизнеса и частного предпринимательства. На основе Стратегии действий уже принят ряд постановлений, указов и распоряжений Президента Республики Узбекистан и правительства, направленных на создание благоприятной деловой среды для предпринимателей, повышение конкурентоспособности экономики, стимулирование производителей экспортоориентированной и импортозамещающей продукции, поддержку предприятий-экспортеров, реформирование банковско-финансовой системы.</p>\r\n\r\n<p>В соответствии с постановлением Президента нашей страны &quot;О мерах по дальнейшей поддержке отечественных организаций-экспортеров и совершенствованию внешнеэкономической деятельности&quot; от 21 июня 2017 года субъектам предпринимательства предоставлены широкие льготы и преференции, которые помогают предпринимателям расширять и развивать свою деятельность.</p>\r\n\r\n<p>- За шесть месяцев текущего года фонд оказал практическое содействие 310 предпринимателям в участии в международных выставках и ярмарках в Германии, России, Казахстане и Таджикистане, - говорит главный специалист дирекции Фонда поддержки экспорта субъектов малого бизнеса и частного предпринимательства О.Маназаров. - В результате ими заключены экспортные соглашения на 154,5 миллиона долларов. По сравнению с аналогичным периодом прошлого года число предпринимателей, принявших участие в международных выставках, выросло на 160, а стоимость экспортных договоров - почти в три раза, точнее, на 97 миллионов долларов.</p>\r\n\r\n<p>На семинаре предпринимателям была предоставлена информация о зарубежных кредитных линиях, разъяснены нововведения, связанные с реализацией государственных активов по нулевой стоимости, а также упрощением сертификации экспортируемых товаров и услуг.</p>\r\n', '08a39fc43f21f369170d3c18894b64ea.jpg', NULL, NULL, 19, NULL, 0, '2017-11-01 13:18:05', 0),
(24, 1, NULL, NULL, 1, '2017-10-31 10:30:55', 1, '123', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-31 10:30:55', 0),
(25, 1, NULL, NULL, 1, '2017-10-31 09:03:40', 1, '213', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-31 09:03:40', 0),
(26, 1, NULL, NULL, 1, '2017-10-30 20:49:17', 1, '123', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-30 20:49:17', 0),
(27, 1, NULL, NULL, 1, '2017-10-30 20:49:12', 1, '123', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-30 20:49:12', 0),
(28, 1, NULL, NULL, 1, '2017-10-30 20:39:25', 1, '123', '123', '', '', '', NULL, NULL, 2, NULL, 0, '2017-10-31 17:45:49', 0),
(29, 1, NULL, NULL, 1, '2017-10-30 20:39:16', 1, '123', '123', '', '', '', NULL, NULL, 0, NULL, 0, '2017-10-30 20:39:16', 0),
(30, 1, NULL, NULL, 1, '2017-10-09 12:37:30', 1, 'Международная продовольственная выставка World Food Moscow - 2016', 'Международная продовольственная выставка World Food Moscow - 2016', '', '', '502e4d9c29be2d2d15c2f81ded94d6eb.jpg', NULL, NULL, 26, NULL, 0, '2017-11-01 12:08:49', 1),
(31, 1, NULL, NULL, 1, '2017-10-30 16:43:37', 1, '1', '1', '', '', '992ce6ca0498bbfe2de21dc9e2cbad49.jpg', NULL, NULL, 9, NULL, 0, '2017-11-01 00:21:18', 0),
(32, 1, NULL, NULL, 1, '2017-10-30 16:43:55', 1, '2', '2', '', '', 'c0f3e0ce1ff78f3966a3a9e813494457.jpg', NULL, NULL, 38, NULL, 0, '2017-11-01 12:08:59', 0),
(33, 2, NULL, NULL, 1, '2017-10-30 16:44:06', 1, 'Индивидуальные предприниматели и фермерские хозяйства смогут снимать наличную иностранную валюту со своих банковских счетов', 'Индивидуальные предприниматели и фермерские хозяйства смогут снимать наличную иностранную валюту со своих банковских счетов', '', '<p>Во исполнение Указа Президента Республики Узбекистан &laquo;О первоочередных мерах по либерализации валютной политики&raquo; от 2 сентября 2017 года постановлением правления Центрального банка Республики Узбекистан внесены изменения и дополнения в Порядок ведения коммерческими банками счетов в иностранной валюте, сообщает официальный сайт банка.</p>\r\n\r\n<p><img alt=\"\" src=\"images/single-news-page.jpg\" /></p>\r\n\r\n<p>В мероприятии, организованном по инициативе Фонда поддержки экспорта субъектов малого бизнеса и частного предпринимательства при Национальном банке внешнеэкономической деятельности, приняли участие ответственные работники областного территориального управления Торгово-промышленной палаты Узбекистана, коммерческих банков, руководители предприятий-экспортеров и предприниматели.</p>\r\n\r\n<p>Стратегия действий по пяти приоритетным направлениям развития Республики Узбекистан в 2017&ndash;2021 годах служит дальнейшему улучшению делового климата в нашей стране, поддержке развития малого бизнеса и частного предпринимательства. На основе Стратегии действий уже принят ряд постановлений, указов и распоряжений Президента Республики Узбекистан и правительства, направленных на создание благоприятной деловой среды для предпринимателей, повышение конкурентоспособности экономики, стимулирование производителей экспортоориентированной и импортозамещающей продукции, поддержку предприятий-экспортеров, реформирование банковско-финансовой системы.</p>\r\n\r\n<p>В соответствии с постановлением Президента нашей страны &quot;О мерах по дальнейшей поддержке отечественных организаций-экспортеров и совершенствованию внешнеэкономической деятельности&quot; от 21 июня 2017 года субъектам предпринимательства предоставлены широкие льготы и преференции, которые помогают предпринимателям расширять и развивать свою деятельность.</p>\r\n\r\n<p>- За шесть месяцев текущего года фонд оказал практическое содействие 310 предпринимателям в участии в международных выставках и ярмарках в Германии, России, Казахстане и Таджикистане, - говорит главный специалист дирекции Фонда поддержки экспорта субъектов малого бизнеса и частного предпринимательства О.Маназаров. - В результате ими заключены экспортные соглашения на 154,5 миллиона долларов. По сравнению с аналогичным периодом прошлого года число предпринимателей, принявших участие в международных выставках, выросло на 160, а стоимость экспортных договоров - почти в три раза, точнее, на 97 миллионов долларов.</p>\r\n\r\n<p>На семинаре предпринимателям была предоставлена информация о зарубежных кредитных линиях, разъяснены нововведения, связанные с реализацией государственных активов по нулевой стоимости, а также упрощением сертификации экспортируемых товаров и услуг.</p>\r\n', 'fa7c47f704446d18e5fb3fb01ee59c4c.jpg', NULL, NULL, 41, NULL, 0, '2017-11-01 18:14:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `status`, `order_by`, `parent`) VALUES
(1, 'Новости', 1, NULL, NULL),
(2, 'Поздравления', 1, NULL, NULL),
(3, '2343', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_category_lang`
--

CREATE TABLE `news_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_category_lang`
--

INSERT INTO `news_category_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 2, 1, 'News'),
(2, 3, 1, 'Yangiliklar'),
(3, 2, 3, '324');

-- --------------------------------------------------------

--
-- Table structure for table `news_lang`
--

CREATE TABLE `news_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `second_title` varchar(100) DEFAULT NULL,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_lang`
--

INSERT INTO `news_lang` (`id`, `lang`, `parent`, `title`, `second_title`, `anons`, `body`, `main_image`, `status`) VALUES
(1, 2, 33, '1', '', '', '', '', 1),
(2, 3, 33, '2', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `second_title` text,
  `keywords` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_lang`
--

CREATE TABLE `page_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `second_title` varchar(100) DEFAULT NULL,
  `keywords` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `title`, `link`, `status`, `image`) VALUES
(1, 'NBU', '/', 1, 'f5881cde660e73a50a62ef55281afe19.png');

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(255) NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('deefa78549f452571c9a034c85d16f42', 1509629563);

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_data`
--

CREATE TABLE `poll_data` (
  `id` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_lang`
--

CREATE TABLE `poll_lang` (
  `id` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_options`
--

CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_option_lang`
--

CREATE TABLE `poll_option_lang` (
  `id` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `second_title` text,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0',
  `event_date` date DEFAULT NULL,
  `ban` tinyint(1) DEFAULT '0',
  `update_date` datetime NOT NULL,
  `slider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category`, `type`, `visible`, `creator`, `created_date`, `status`, `title`, `second_title`, `anons`, `body`, `main_image`, `secondary_image`, `icon`, `seen_count`, `event_date`, `ban`, `update_date`, `slider`) VALUES
(1, 1, NULL, NULL, 1, '2017-11-01 13:08:18', 1, '123', '123', '', '', 'd43dbdcbc71d5948341d7fb60047f8d8.jpg', NULL, NULL, 2, NULL, 0, '2017-11-01 13:14:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `status`, `order_by`, `parent`) VALUES
(1, '123', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category_lang`
--

CREATE TABLE `post_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_lang`
--

CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `second_title` varchar(100) DEFAULT NULL,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `text`, `image`, `price`, `status`) VALUES
(1, 2, 'продукт1', 'продукт1', '', 'dc67246023722d11699e299ca61c8c17.png', '', 1),
(2, 3, 'продукт2', 'продукт2', '<p>продукт2</p>\r\n', '9454c7f8997c78a72518a5c39e98c905.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent_id`, `name`, `description`, `image`) VALUES
(3, 0, 'категория 2', 'категория 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_lang`
--

CREATE TABLE `product_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category_lang`
--

INSERT INTO `product_category_lang` (`id`, `lang`, `parent`, `name`, `description`) VALUES
(2, 2, 3, 'cat2', 'cat2'),
(9, 3, 3, 'kat2', 'kat2');

-- --------------------------------------------------------

--
-- Table structure for table `product_lang`
--

CREATE TABLE `product_lang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  `status` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_lang`
--

INSERT INTO `product_lang` (`id`, `name`, `text`, `description`, `image`, `price`, `status`, `lang`, `parent`) VALUES
(1, 'eng1', '<p>eng1&nbsp;</p>\r\n', 'eng1', '', 0, 0, 2, 2),
(2, 'uz1', '<p>uz1</p>\r\n', 'uz1', '', 0, 0, 3, 2),
(3, 'Product1', '<p>product1</p>\r\n', 'product1', '', 0, 0, 2, 1),
(4, 'max1', '<p>max1</p>\r\n', 'max1', '', 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT 'F.I.SH',
  `email` varchar(256) NOT NULL COMMENT 'Email',
  `phone` varchar(24) DEFAULT NULL COMMENT 'Telefon raqami',
  `address` varchar(512) NOT NULL COMMENT 'Manzil',
  `index` int(11) DEFAULT NULL COMMENT 'Pochta indeksi',
  `person_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Jismoniy (0) yoki Yuridik (1)',
  `firm_name` varchar(256) DEFAULT NULL COMMENT 'Yuridik firma nomi',
  `passport` varchar(12) DEFAULT NULL COMMENT 'Passport raqami',
  `text` text NOT NULL COMMENT 'Savol matni',
  `admissionId` int(11) NOT NULL COMMENT 'Admission id',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT 'Time',
  `status` tinyint(4) DEFAULT '0' COMMENT 'Status',
  `uniqid` varchar(24) NOT NULL COMMENT 'Unique ID',
  `reply_time` int(11) DEFAULT '0',
  `reply_text` text,
  `reply_by` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`id`, `name`, `email`, `phone`, `address`, `index`, `person_type`, `firm_name`, `passport`, `text`, `admissionId`, `time`, `status`, `uniqid`, `reply_time`, `reply_text`, `reply_by`, `image`) VALUES
(1, 'ewqewqe', '1231@m.ru', '123123', 'Buxoro viloyati, Buxoro tumani, 123123', 123123, 1, '123123', '1312321', 'Жалоба: \n12312321', 1, 1509549242, 0, '171101-59f9e4ba66cfe', 0, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_by` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `order_by`, `status`) VALUES
(1, 'Andijon viloyati', 10, 1),
(2, 'Buxoro viloyati', 20, 1),
(3, 'Jizzax viloyati', 30, 1),
(4, 'Qashqadaryo viloyati', 40, 1),
(5, 'Navoiy viloyati', 50, 1),
(6, 'Namangan viloyati', 60, 1),
(7, 'Samarqand viloyati', 70, 1),
(8, 'Surxondaryo viloyati', 80, 1),
(9, 'Sirdaryo viloyati', 90, 1),
(10, 'Toshkent viloyati', 100, 1),
(11, 'Farg\'ona viloyati', 110, 1),
(12, 'Xorazm viloyati', 120, 1),
(13, 'Qoraqalpog\'iston respublikasi', 130, 1),
(14, 'Toshkent shahri', 140, 1);

-- --------------------------------------------------------

--
-- Table structure for table `region_lang`
--

CREATE TABLE `region_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region_lang`
--

INSERT INTO `region_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 1, 1, 'Андижанская область'),
(2, 2, 1, 'Andijan Region'),
(3, 2, 2, 'Bukhara Region'),
(4, 1, 2, 'Бухарская область'),
(5, 1, 3, 'Джизакская область'),
(6, 2, 3, 'Jizzakh Region'),
(7, 1, 4, 'Кашкадарьинская область'),
(8, 2, 4, 'Qashqadaryo Region'),
(9, 1, 5, 'Навоийская область'),
(10, 2, 5, 'Navoiy Region'),
(11, 1, 6, 'Наманганская область'),
(12, 2, 6, 'Namangan Region'),
(13, 2, 7, 'Samarqand Region'),
(14, 2, 7, 'Samarqand Region'),
(15, 1, 7, 'Самаркандская область'),
(16, 1, 8, 'Самаркандская область'),
(17, 2, 8, 'Surxondaryo Region'),
(18, 1, 9, 'Сырдарьинская область'),
(19, 2, 9, 'Sirdaryo Region'),
(20, 1, 10, 'Ташкентская область'),
(21, 2, 10, 'Tashkent Region'),
(22, 1, 12, 'Хорезмская область'),
(23, 2, 12, 'Xorazm Region'),
(24, 1, 13, 'Каракалпакстан'),
(25, 2, 13, 'Karakalpakstan'),
(26, 1, 14, 'Ташкент'),
(27, 2, 14, 'Tashkent city');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `category`, `image`, `status`) VALUES
(1, 'Организация участия субъектов малого бизнеса и фермерских хозяейств на зарубежных выставках и ярмарках Организация участия субъектов малого бизнеса и фермерских хозяейств на зарубежных выставках и ярмарках Организация участия субъекто                     ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id nulla veritatis et culpa voluptatem, ipsa perspiciatis est. Unde vero fugiat, repudiandae quaerat, reprehenderit officiis! Hic quisquam nostrum error adipisci, suscipit, esse ea neque doloribus nam, architecto excepturi numquam voluptatibus nihil culpa vero molestiae, accusantium aliquid cumque modi atque quas. Qui nulla labore officia temporibus quis, sapiente quia alias adipisci molestias fuga veniam architecto. Nam esse quibusdam voluptatibus perspiciatis ipsa praesentium iure vel provident nobis autem, rem velit numquam commodi eius ipsum ratione quos officia blanditiis necessitatibus quae minima at ex neque laborum! Beatae repudiandae, neque totam dicta deserunt tenetur.</p>\r\n', 1, '841f873d277cc5270c26930a3b710761.jpg', 1),
(2, 'qweqwewewq', '<p>qwew</p>\r\n', 1, '8b6d82ad31d0dadad1454379326a4d04.jpg', 1),
(3, 'qwewqewqew', '', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services_lang`
--

CREATE TABLE `services_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_lang`
--

INSERT INTO `services_lang` (`id`, `parent`, `lang`, `title`, `description`, `status`) VALUES
(1, 1, 2, 'Hi title', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 1),
(2, 1, 3, '123', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 1),
(3, 2, 2, 'qwewqe', '<p>qwewqe</p>\r\n', 1),
(4, 2, 3, '123', '<p>123</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `name`, `description`, `status`) VALUES
(1, 'Организационное содействие', 'first cat', 1),
(2, 'Финансовое содействие', 'Финансовое содействие', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_category_lang`
--

CREATE TABLE `service_category_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_category_lang`
--

INSERT INTO `service_category_lang` (`id`, `parent`, `lang`, `name`, `description`, `status`) VALUES
(1, 1, 2, 'cccca', 'asas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `subject` text NOT NULL,
  `company` text NOT NULL,
  `message` text NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`id`, `name`, `email`, `phone`, `subject`, `company`, `message`, `service_id`) VALUES
(1, '132123', '1@m.ru', '123123', '0', '123123', '123123', 1),
(2, '12312', '1@m.ru', '123123', '0', '123123', '123123', 3),
(3, '12312', '1@m.ru', '123123', '0', '123123', '123123', 3),
(4, 'qwe', 'qw@m.ru', 'ewqeq', '0', 'ewqewq', 'ewqew', 1),
(5, '123123', '1@m.ru', '12123', '0', '123213', '123213', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `val`, `url`) VALUES
('address', 'г. Ташкент, ул. Т.Шевченко, д. 34', ''),
('call-center-phone', '998 71 244-34-60', ''),
('email', 'info@nbu-export.uz', ''),
('facebook', 'http://facebook.com/', ''),
('google-plus', 'http://google-plus.com', ''),
('instagram', 'http://instagram.com', ''),
('phone', '998 71 244-35-60', ''),
('telegram', 'http://telegram.org/', ''),
('twitter', 'http://twitter.com/', ''),
('web-site', 'www.nbu-export.uz', ''),
('youtube', 'http://youtube/', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings_lang`
--

CREATE TABLE `settings_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `message` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `source_message`
--

INSERT INTO `source_message` (`id`, `category`, `message`) VALUES
(1, 'main', 'footer-copyright-text'),
(2, 'main', 'Virtual reception'),
(3, 'main', 'company-name'),
(4, 'main', 'Learn more'),
(5, 'main', 'books-section-title'),
(6, 'main', 'books-section-subtitle'),
(7, 'main', 'News'),
(8, 'main', 'news-section-subtitle'),
(9, 'main', 'Read more'),
(10, 'main', 'testimonials-section-title'),
(11, 'main', 'testimonials-section-subtitle'),
(12, 'main', 'show-all'),
(13, 'main', 'Services'),
(14, 'main', 'services-section-subtitle'),
(15, 'main', 'Partners'),
(16, 'main', 'partner-section-subtitle'),
(17, 'main', 'faq-page-title'),
(18, 'main', 'Contacts');

-- --------------------------------------------------------

--
-- Table structure for table `telegram_settings`
--

CREATE TABLE `telegram_settings` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telegram_settings`
--

INSERT INTO `telegram_settings` (`id`, `value`) VALUES
('callbackTemplate', 'Number: {$number}'),
('TestimonialsTemplate', 'Name: {$name}\r\nPhone: {$phone}\r\nMessage: {$text}'),
('contactstemplate', 'Name: {$name} \r\nEmail: {$email} \r\nSubject: {$subject} \r\nMessage: {$body}');

-- --------------------------------------------------------

--
-- Table structure for table `telegram_user`
--

CREATE TABLE `telegram_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telegram_user`
--

INSERT INTO `telegram_user` (`id`, `user_id`, `name`) VALUES
(4, 1929889, 'qwerty'),
(7, 666769, 'Zuxriddin'),
(6, 276046538, 'Johongir'),
(8, 468757351, 'Suxrob');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `position` varchar(150) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `phone`, `message`, `status`, `date`, `position`, `image`) VALUES
(1, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(2, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(3, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(4, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(5, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(6, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(7, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg'),
(8, 'Азиза Умарова', '', '<p>На мой взгляд, стало больше женщин в бизнесе, искусстве, но в государственном управлении еще очень рано говорить о каких-либо проблесках гендерного баланса. Нет пока ни одной женщины-хокима,</p>\r\n', 1, '2017-10-28 23:18:27', 'Директор по Terra Textile', '019f7519b87be5f49b421f45e1f662d2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_lang`
--

CREATE TABLE `testimonials_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `position` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`) VALUES
(1, 'root', 'dArVMsVrEo-9LPrwI4RtJc_I0eAnIIu9', '$2y$13$C.lM0daWxgWpXff2VZfjw.xQI1M.HQkqmpD1wPDmnR4imqI.nxyZ.', NULL, '', 10, 1481295772, 1492241401, 1),
(3, 'zuck', 'NFwYZNuDe0Xcr0sj9hEzb3maJQouajXq', '$2y$13$OWmSdNyF5c04ErYOoWFREu9INtoafP2IQT0AU/7maJs7PHNjpqKr6', NULL, 'zuhriddint@gmail.com', 10, 1485944816, 1485944816, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_lang`
--
ALTER TABLE `admission_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_id` (`parent`),
  ADD KEY `language_id` (`lang`);

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertise_lang`
--
ALTER TABLE `advertise_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_lang`
--
ALTER TABLE `album_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attach`
--
ALTER TABLE `attach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_lang`
--
ALTER TABLE `books_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_lang`
--
ALTER TABLE `company_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_signup`
--
ALTER TABLE `company_signup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`),
  ADD KEY `district` (`district`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_lang`
--
ALTER TABLE `district_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_lang`
--
ALTER TABLE `faq_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category_lang`
--
ALTER TABLE `news_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_lang`
--
ALTER TABLE `news_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_lang`
--
ALTER TABLE `page_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcounter_save`
--
ALTER TABLE `pcounter_save`
  ADD PRIMARY KEY (`save_name`);

--
-- Indexes for table `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `poll_data`
--
ALTER TABLE `poll_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`),
  ADD KEY `option` (`option`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `poll_lang`
--
ALTER TABLE `poll_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`),
  ADD KEY `language` (`language`);

--
-- Indexes for table `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`);

--
-- Indexes for table `poll_option_lang`
--
ALTER TABLE `poll_option_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`),
  ADD KEY `option` (`option`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_lang`
--
ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admissionId` (`admissionId`),
  ADD KEY `reply_by` (`reply_by`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_lang`
--
ALTER TABLE `region_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_lang`
--
ALTER TABLE `services_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category_lang`
--
ALTER TABLE `service_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `settings_lang`
--
ALTER TABLE `settings_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_lang`
--
ALTER TABLE `testimonials_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admission_lang`
--
ALTER TABLE `admission_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `advertise_lang`
--
ALTER TABLE `advertise_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `album_lang`
--
ALTER TABLE `album_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attach`
--
ALTER TABLE `attach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `books_lang`
--
ALTER TABLE `books_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company_lang`
--
ALTER TABLE `company_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_signup`
--
ALTER TABLE `company_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `district_lang`
--
ALTER TABLE `district_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `faq_lang`
--
ALTER TABLE `faq_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu_lang`
--
ALTER TABLE `menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news_category_lang`
--
ALTER TABLE `news_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news_lang`
--
ALTER TABLE `news_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_lang`
--
ALTER TABLE `page_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_data`
--
ALTER TABLE `poll_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_lang`
--
ALTER TABLE `poll_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_option_lang`
--
ALTER TABLE `poll_option_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_category_lang`
--
ALTER TABLE `post_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_category_lang`
--
ALTER TABLE `product_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_lang`
--
ALTER TABLE `product_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `region_lang`
--
ALTER TABLE `region_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services_lang`
--
ALTER TABLE `services_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service_category_lang`
--
ALTER TABLE `service_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings_lang`
--
ALTER TABLE `settings_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `testimonials_lang`
--
ALTER TABLE `testimonials_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_lang`
--
ALTER TABLE `admission_lang`
  ADD CONSTRAINT `admission_lang_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `admission` (`id`),
  ADD CONSTRAINT `admission_lang_ibfk_2` FOREIGN KEY (`lang`) REFERENCES `languages` (`id`);

--
-- Constraints for table `company_signup`
--
ALTER TABLE `company_signup`
  ADD CONSTRAINT `company_signup_ibfk_1` FOREIGN KEY (`region`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `company_signup_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`id`);

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id`);

--
-- Constraints for table `poll_data`
--
ALTER TABLE `poll_data`
  ADD CONSTRAINT `poll_data_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`),
  ADD CONSTRAINT `poll_data_ibfk_2` FOREIGN KEY (`option`) REFERENCES `poll_options` (`id`),
  ADD CONSTRAINT `poll_data_ibfk_3` FOREIGN KEY (`user`) REFERENCES `guests` (`id`);

--
-- Constraints for table `poll_lang`
--
ALTER TABLE `poll_lang`
  ADD CONSTRAINT `poll_lang_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`),
  ADD CONSTRAINT `poll_lang_ibfk_2` FOREIGN KEY (`language`) REFERENCES `languages` (`id`);

--
-- Constraints for table `poll_options`
--
ALTER TABLE `poll_options`
  ADD CONSTRAINT `poll_options_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`);

--
-- Constraints for table `poll_option_lang`
--
ALTER TABLE `poll_option_lang`
  ADD CONSTRAINT `poll_option_lang_ibfk_1` FOREIGN KEY (`language`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `poll_option_lang_ibfk_2` FOREIGN KEY (`option`) REFERENCES `poll_options` (`id`);

--
-- Constraints for table `reception`
--
ALTER TABLE `reception`
  ADD CONSTRAINT `reception_ibfk_1` FOREIGN KEY (`admissionId`) REFERENCES `admission` (`id`),
  ADD CONSTRAINT `reception_ibfk_2` FOREIGN KEY (`reply_by`) REFERENCES `user` (`id`);

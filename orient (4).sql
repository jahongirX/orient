-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2020 г., 17:14
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orient`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `info` longtext NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `title`, `main_image`, `info`, `created_date`, `updated_date`, `status`) VALUES
(1, '11', '', '11', '2020-03-06 14:56:21', '2020-03-06 14:56:21', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `admission`
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

-- --------------------------------------------------------

--
-- Структура таблицы `admission_lang`
--

CREATE TABLE `admission_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `level_name` varchar(256) NOT NULL,
  `reception_days` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `advertise`
--

CREATE TABLE `advertise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `advertise_lang`
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
-- Структура таблицы `album`
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

-- --------------------------------------------------------

--
-- Структура таблицы `album_lang`
--

CREATE TABLE `album_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `attach`
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

-- --------------------------------------------------------

--
-- Структура таблицы `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `img`, `status`) VALUES
(1, 'Собственное производсто', '838ce86f0f0ee26f7a0e2b26fb414c18.png', 1),
(2, 'Современное оборудование', 'ef3e0e8b21fec22f2415de9a96c40ffe.png', 1),
(3, 'Логистический отдел', '7e7faf373a260a8f8a854c061f7f6a5c.png', 1),
(4, 'Оперативное выполнение', '03957d69bda4757eef231b3cf1dda853.png', 1),
(5, 'Гарантия по договору', 'be73717e1f30c6331addf6901888ecfb.png', 1),
(6, 'Конкурентная стоимость', '15b99444288339d83206cd470d1eabae.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `books_lang`
--

CREATE TABLE `books_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `callback`
--

CREATE TABLE `callback` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `company`
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

-- --------------------------------------------------------

--
-- Структура таблицы `company_lang`
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
-- Структура таблицы `company_signup`
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
-- Структура таблицы `contact`
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
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `created_date`, `phone`, `category`) VALUES
(1, 'Sadulla', '', '', 'ewqdwqas', '2020-03-04 15:39:25', '90245169821', 0),
(2, 'Sadulla', '', '', 'ewqdwqas', '2020-03-04 15:47:04', '90245169821', 0),
(3, 'Sadulla', '', '', 'ewqdwqas', '2020-03-04 15:47:14', '90245169821', 0),
(4, 'Sadulla', '', '', 'ewqdwqas', '2020-03-04 15:52:38', '90245169821', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `contact_subject`
--

CREATE TABLE `contact_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `contact_subject_lang`
--

CREATE TABLE `contact_subject_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_by` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `district`
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
-- Структура таблицы `district_lang`
--

CREATE TABLE `district_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `dormitory`
--

CREATE TABLE `dormitory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `passport_serial` varchar(3) NOT NULL,
  `passport_number` int(11) NOT NULL,
  `address` text NOT NULL,
  `student_doc` varchar(255) NOT NULL,
  `inn` varchar(255) NOT NULL,
  `unique_id` varchar(500) NOT NULL,
  `reply_text` text NOT NULL,
  `reply_by` varchar(255) NOT NULL,
  `reply_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `guruh` int(11) NOT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
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

-- --------------------------------------------------------

--
-- Структура таблицы `faq_lang`
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

-- --------------------------------------------------------

--
-- Структура таблицы `faq_questions`
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
-- Структура таблицы `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `identity` varchar(96) NOT NULL,
  `lastdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guests`
--

INSERT INTO `guests` (`id`, `identity`, `lastdate`) VALUES
(1, '46155a0b93d55807a24f2d85776b8269.59fa270f3b5d0.363baea9cba210afac6d7a556fca596e30c46333', 1509566223),
(2, 'a4dae1464fd2def6b7b81c7022208539.59fb4757c3900.4b84b15bff6ee5796152495a230e45e3d7e947d9', 1509640023),
(3, '81f5eae0afbddc87bd0742a529a178bd.5a3fe7ce57df9.4b84b15bff6ee5796152495a230e45e3d7e947d9', 1514137550);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
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

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `abb` varchar(5) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `abb`, `status`) VALUES
(1, 'O`zbekcha', 'uz', 1),
(2, 'English', 'en', 1),
(3, 'Русский', 'ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
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
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `type`, `parent`, `name`, `url`, `icon`, `order_by`, `status`, `icon2`) VALUES
(1, 0, NULL, 'Главная', '/', '', 1, 1, ''),
(2, 0, NULL, 'О компании', '/site/about', '', 2, 1, ''),
(3, 0, NULL, 'Каталог', '/', '', 3, 1, ''),
(4, 0, NULL, 'Филиалы', '/', '', 4, 1, ''),
(5, 0, NULL, 'Новости', '/news/view-all', '', 5, 1, ''),
(6, 0, NULL, 'Контакты', '/site/contacts', '', 6, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_lang`
--

CREATE TABLE `menu_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_lang`
--

INSERT INTO `menu_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 2, 1, 'Home'),
(2, 2, 2, 'About Company'),
(3, 2, 3, 'Catalog'),
(4, 2, 4, 'Branch'),
(5, 2, 5, 'News'),
(6, 2, 6, 'Contacts');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'en', 'OTM Products'),
(1, 'ru', 'Продукция ОТМ'),
(1, 'uz', 'Продукция ОТМ'),
(2, 'en', 'Add to cart'),
(2, 'ru', 'В корзину'),
(2, 'uz', 'В корзину'),
(3, 'en', 'Go to catalog'),
(3, 'ru', 'Перейти в каталог'),
(3, 'uz', 'Перейти в каталог'),
(4, 'en', '₽'),
(4, 'ru', '₽'),
(4, 'uz', '₽'),
(5, 'en', 'Артикул:'),
(5, 'ru', 'Артикул:'),
(5, 'uz', 'Артикул:'),
(6, 'en', 'Модель:'),
(6, 'ru', 'Модель:'),
(6, 'uz', 'Модель:'),
(7, 'en', 'Торцы:'),
(7, 'ru', 'Торцы:'),
(7, 'uz', 'Торцы:'),
(8, 'en', 'Цена:'),
(8, 'ru', 'Цена:'),
(8, 'uz', 'Цена:'),
(9, 'en', 'Новости компании'),
(9, 'ru', 'Новости компании'),
(9, 'uz', 'Новости компании'),
(10, 'en', 'Посмотреть каталог'),
(10, 'ru', 'Посмотреть каталог'),
(10, 'uz', 'Посмотреть каталог'),
(11, 'en', 'Последние новости'),
(11, 'ru', 'Последние новости'),
(11, 'uz', 'Последние новости'),
(12, 'en', 'Сортировать:'),
(12, 'ru', 'Сортировать:'),
(12, 'uz', 'Сортировать:'),
(13, 'en', 'по дате'),
(13, 'ru', 'по дате'),
(13, 'uz', 'по дате'),
(14, 'en', 'по рейтингу'),
(14, 'ru', 'по рейтингу'),
(14, 'uz', 'по рейтингу'),
(15, 'en', 'по рейтингу'),
(15, 'ru', 'по рейтингу'),
(15, 'uz', 'по рейтингу'),
(16, 'en', 'Читать статью'),
(16, 'ru', 'Читать статью'),
(16, 'uz', 'Читать статью'),
(17, 'en', 'Архив новостей'),
(17, 'ru', 'Архив новостей'),
(17, 'uz', 'Архив новостей'),
(18, 'en', 'Укажите месяц'),
(18, 'ru', 'Укажите месяц'),
(18, 'uz', 'Укажите месяц'),
(19, 'en', 'Укажите тему'),
(19, 'ru', 'Укажите тему'),
(19, 'uz', 'Укажите тему'),
(20, 'en', 'Контакты компании'),
(20, 'ru', 'Контакты компании'),
(20, 'uz', 'Контакты компании'),
(21, 'en', 'Оставить сообщение'),
(21, 'ru', 'Оставить сообщение'),
(21, 'uz', 'Оставить сообщение'),
(22, 'en', 'Ваше имя'),
(22, 'ru', 'Ваше имя'),
(22, 'uz', 'Ваше имя'),
(23, 'en', 'г.Москва'),
(23, 'ru', 'г.Москва'),
(23, 'uz', 'г.Москва'),
(24, 'en', 'г.Огенбург'),
(24, 'ru', 'г.Огенбург'),
(24, 'uz', 'г.Огенбург'),
(25, 'en', 'Организация:'),
(25, 'ru', 'Организация:'),
(25, 'uz', 'Организация:'),
(26, 'en', '«ОРЕНТЕХМАШ» завод емкостного оборудования\r\n'),
(26, 'ru', '«ОРЕНТЕХМАШ» завод емкостного оборудования\r\n'),
(26, 'uz', '«ОРЕНТЕХМАШ» завод емкостного оборудования\r\n'),
(27, 'en', 'У вас остались вопросы?'),
(27, 'ru', 'У вас остались вопросы?'),
(27, 'uz', 'У вас остались вопросы?'),
(28, 'en', 'Отправьте нам сообщение и мы Вам обязательно ответим'),
(28, 'ru', 'Отправьте нам сообщение и мы Вам обязательно ответим'),
(28, 'uz', 'Отправьте нам сообщение и мы Вам обязательно ответим'),
(29, 'en', 'Ваш телефон'),
(29, 'ru', 'Ваш телефон'),
(29, 'uz', 'Ваш телефон'),
(30, 'en', 'Ваш вопрос или сообщение'),
(30, 'ru', 'Ваш вопрос или сообщение'),
(30, 'uz', 'Ваш вопрос или сообщение'),
(31, 'en', 'Ваш вопрос или сообщение'),
(31, 'ru', 'Ваш вопрос или сообщение'),
(31, 'uz', 'Ваш вопрос или сообщение'),
(32, 'en', 'Толщина металла:'),
(32, 'ru', 'Толщина металла:'),
(32, 'uz', 'Толщина металла:');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
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
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category`, `type`, `visible`, `creator`, `created_date`, `status`, `title`, `second_title`, `anons`, `body`, `main_image`, `secondary_image`, `icon`, `seen_count`, `event_date`, `ban`, `update_date`, `slider`) VALUES
(1, 2, NULL, NULL, 1, '2020-03-04 00:01:42', 1, 'Условное название новости которое возможно на несколько строк', 'Повседневная практика показывает, что консультация с широким активом кругу (специалистов)...', '', '<p>Повседневная практика показывает, что консультация с широким активом кругу (специалистов)...</p>\r\n', '141d901b84eb9b4e9acebbafbe432123.png', NULL, NULL, 5, '2020-03-24', 0, '2020-03-06 18:46:23', 0),
(2, 1, NULL, NULL, 1, '2020-03-04 00:13:28', 1, 'Условное название новости которое возможно на несколько строк', 'Повседневная практика показывает, что консультация с широким активом кругу (специалистов)...', '', '<p>Повседневная практика показывает, что консультация с широким активом кругу (специалистов)...</p>\r\n', '270b621495cde9f05919db652a8b507b.png', NULL, NULL, 0, '2020-03-13', 0, '2020-03-04 00:13:28', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `status`, `order_by`, `parent`) VALUES
(1, 'Новости', 1, 10, 1),
(2, 'Интересное', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category_lang`
--

CREATE TABLE `news_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_category_lang`
--

INSERT INTO `news_category_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 1, 1, 'Новости'),
(2, 2, 1, 'Новости'),
(3, 1, 2, 'Интересное'),
(4, 2, 2, 'Интересное');

-- --------------------------------------------------------

--
-- Структура таблицы `news_lang`
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

-- --------------------------------------------------------

--
-- Структура таблицы `page`
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
-- Структура таблицы `page_lang`
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
-- Структура таблицы `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partner_lang`
--

CREATE TABLE `partner_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(255) NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('f4e5099664dd473467d011bd021a0877', 1583503725);

-- --------------------------------------------------------

--
-- Структура таблицы `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `poll_data`
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
-- Структура таблицы `poll_lang`
--

CREATE TABLE `poll_lang` (
  `id` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `poll_options`
--

CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `poll_option_lang`
--

CREATE TABLE `poll_option_lang` (
  `id` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
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

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post_category_lang`
--

CREATE TABLE `post_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post_lang`
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
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `articul` varchar(500) NOT NULL,
  `model` varchar(500) NOT NULL,
  `depth` varchar(500) NOT NULL,
  `butt` varchar(500) NOT NULL,
  `color` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `text`, `image`, `price`, `status`, `articul`, `model`, `depth`, `butt`, `color`) VALUES
(1, 2, '1', '1', '<p>1</p>\r\n', 'fb3cb7a9324c54dd783c80e2e339bced.jpg', '1', 1, '1', '1', '1', '1', '1'),
(2, 1, 'Цистерна ассенизаторская', 'Идейные соображения высшего порядка, а также укрепление и развитие структуры позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям.', '<p>Идейные соображения высшего порядка, а также укрепление и развитие структуры позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Таким образом новая модель организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений. Товарищи! новая модель организационной деятельности играет важную роль в формировании модели развития.</p>\r\n\r\n<p>Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа существенных финансовых и административных условий. Таким образом сложившаяся структура организации позволяет оценить значение существенных финансовых и административных условий. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание соответствующий условий активизации.</p>\r\n\r\n<p>Таким образом сложившаяся структура организации позволяет оценить значение существенных финансовых и административных условий. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание соответствующий условий активизации.</p>\r\n', '67082e50a8c9e801c3cd93dcab740b9c.jpg', '58 650', 1, 'МАЗ-3-0,4/ОТМ', ' МАЗ', '4 мм', 'сферические', 'оранжевый'),
(3, 3, '2', '2', '<p>2</p>\r\n', 'e8e2e7d46f8905193919a8ccb6ed4ba1.jpg', '2', 1, '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_category`
--

INSERT INTO `product_category` (`id`, `parent_id`, `name`, `description`, `image`) VALUES
(1, 0, 'assenzator', 'Ассенизаторские цистерны', 'f977c80e5b3272c2a6a184d5f7923200.png'),
(2, 0, 'protivopojar', 'Противопожарные двери', 'f3aaeee0d01d67a50b1a780aa7939a4a.png'),
(3, 0, 'musor-konteyr', 'Мусорные котейнера', '0aafa4582bab19b5ae07ce1f3b539511.png');

-- --------------------------------------------------------

--
-- Структура таблицы `product_category_lang`
--

CREATE TABLE `product_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_category_lang`
--

INSERT INTO `product_category_lang` (`id`, `lang`, `parent`, `name`, `description`) VALUES
(1, 2, 1, 'assenzator', 'Cesspool tanks'),
(2, 2, 3, 'musor-konteyr', 'Trash Cotainer'),
(3, 3, 3, 'musor-konteyr', 'Мусорные котейнера'),
(4, 3, 2, 'protivopojar', 'Противопожарные двери'),
(5, 2, 2, 'protivopojar', 'Fire doors'),
(6, 3, 1, 'assenzator', 'Ассенизаторские цистерны');

-- --------------------------------------------------------

--
-- Структура таблицы `product_lang`
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
-- Дамп данных таблицы `product_lang`
--

INSERT INTO `product_lang` (`id`, `name`, `text`, `description`, `image`, `price`, `status`, `lang`, `parent`) VALUES
(1, 'The tank is sewer', '<p>Higher-order ideological considerations, as well as strengthening and developing the structure, allow us to carry out important tasks to develop a personnel training system that meets urgent needs. Thus, a new model of organizational activity entails the process of implementation and modernization of new proposals. Comrades! A new model of organizational activity plays an important role in shaping a development model.</p>\r\n\r\n<p>Thus, the constant outreach of our activities requires us to analyze the significant financial and administrative conditions. Thus, the existing structure of the organization allows us to assess the importance of significant financial and administrative conditions. Comrades! the constant outreach support for our activities to a large extent determines the creation of appropriate activation conditions.</p>\r\n', 'Higher-order ideological considerations, as well as strengthening and developing the structure, allow us to carry out important tasks to develop a personnel training system that meets urgent needs.', '', 0, 0, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `question_answer`
--

CREATE TABLE `question_answer` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `category` int(11) NOT NULL,
  `status` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question_answer`
--

INSERT INTO `question_answer` (`id`, `question`, `answer`, `category`, `status`) VALUES
(1, 'Условный текст который придумал дизайнер для написания вороса cat1', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный \r\nуниверсальный код речей.</pre>\r\n', 3, 1),
(2, 'Условный текст который придумал дизайнер для написания вороса cat1', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный \r\nуниверсальный код речей.</pre>\r\n', 3, 1),
(3, 'Условный текст который придумал дизайнер для написания вороса cat2', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n', 4, 1),
(4, 'Условный текст который придумал дизайнер для написания вороса cat3', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n', 5, 1),
(5, 'Условный текст который придумал дизайнер для написания вороса cat3', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n\r\n<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n', 5, 1),
(6, 'Условный текст который придумал дизайнер для написания вороса cat3', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n', 5, 1),
(7, 'Условный текст который придумал дизайнер для написания вороса cat4', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n', 6, 1),
(8, 'Условный текст который придумал дизайнер для написания вороса 5 cat5', '<pre>\r\nСайт рыбатекст поможет дизайнеру, верстальщику,\r\nвебмастеру сгенерировать несколько абзацев более менее осмысленного текста\r\nрыбы на русском языке, а начинающему оратору отточить навык публичных выступлений\r\nв домашних условиях. При создании генератора мы использовали небезизвестный\r\nуниверсальный код речей.</pre>\r\n', 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `question_category`
--

CREATE TABLE `question_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question_category`
--

INSERT INTO `question_category` (`id`, `name`, `img`, `status`) VALUES
(3, 'Технические вопросы', '8054d022f9a71c9e6d94bd1dca5d66f8.png', 1),
(4, 'Вопросы по доставке', 'b148226a596c4469d4aa9e33f9efff65.png', 1),
(5, 'Вопросы по оплате', '28e28b17c324b1634bc8b616a086ae50.png', 1),
(6, 'Вопросы по договору', 'bbba356341344e1022323405cbb60449.png', 1),
(7, 'Вопросы по срокам поставок', 'e374974725bd06fede40033ab6c3d451.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reception`
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

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_by` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
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
(11, 'Ферганская область', 110, 1),
(12, 'Xorazm viloyati', 120, 1),
(13, 'Qoraqalpog\'iston respublikasi', 130, 1),
(14, 'Toshkent shahri', 140, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `region_lang`
--

CREATE TABLE `region_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region_lang`
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
(27, 2, 14, 'Tashkent city'),
(28, 3, 14, 'Toshkent shahri'),
(29, 3, 11, 'Farg\'ona viloyati');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `services_lang`
--

CREATE TABLE `services_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service_category_lang`
--

CREATE TABLE `service_category_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service_request`
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

-- --------------------------------------------------------

--
-- Структура таблицы `service_request_subject`
--

CREATE TABLE `service_request_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service_request_subject_lang`
--

CREATE TABLE `service_request_subject_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `val`, `url`) VALUES
('fb', 'facebook', 'htttp://facebook.com'),
('instagram', 'instagram', 'htttp://instagram.com'),
('ok', 'odnaklasniki', 'htttp://ok.ru'),
('title', ' OrentTexMash ', ''),
('twitter', 'twitter', 'htttp://twitter.com'),
('vk', 'vkontakte', '/htttp://vk.com'),
('адрес', 'г. Москва, ул. Неизвестное название 24, возможно <br> что то еще', ''),
('Бесплатный-звонок', 'Бесплатный звонок', ''),
('Режим', 'Режим работы', ''),
('Режим-время', 'Пн.-Вс.: 8:00-22:00', ''),
('телефон', '8 800 505-27-28', ''),
('эмаил', 'info@otm.ru', 'info@otm.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `settings_lang`
--

CREATE TABLE `settings_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `message` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `source_message`
--

INSERT INTO `source_message` (`id`, `category`, `message`) VALUES
(1, 'main', 'products'),
(2, 'main', 'korzina'),
(3, 'main', 'goCatalog'),
(4, 'main', '$'),
(5, 'main', 'articul'),
(6, 'main', 'model'),
(7, 'main', 'butt'),
(8, 'main', 'price'),
(9, 'main', 'newsCompany'),
(10, 'main', 'viewCatalog'),
(11, 'main', 'newsMoment'),
(12, 'main', 'filter'),
(13, 'main', 'asDate'),
(14, 'main', 'asReyting'),
(15, 'main', 'asReyting'),
(16, 'main', 'read'),
(17, 'main', 'historynews'),
(18, 'main', 'month'),
(19, 'main', 'less'),
(20, 'main', 'contactCompany'),
(21, 'main', 'sms'),
(22, 'main', 'name'),
(23, 'main', 'town'),
(24, 'main', 'town2'),
(25, 'main', 'organization'),
(26, 'main', 'companyFactory'),
(27, 'main', 'вопросы'),
(28, 'main', 'ответим'),
(29, 'main', 'телефон'),
(30, 'main', 'сообщение'),
(31, 'main', 'сообщение'),
(32, 'main', 'depth');

-- --------------------------------------------------------

--
-- Структура таблицы `telegram_settings`
--

CREATE TABLE `telegram_settings` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `telegram_user`
--

CREATE TABLE `telegram_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `phone`, `message`, `status`, `date`, `position`, `image`) VALUES
(1, 'Условный заголовок с которого начнется отзыв sss', 'Гинеральный директор <br>Курганов Дмитрий Васильевач,', '<p>Равным образом сложившаяся структура организации в значительной степени обуславливает создание дальнейших направлений развития<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;br&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;Равным образом сложившаяся структура организации в значительной степени обуславливает создание дальнейших направлений развития</p>\r\n', 1, '2020-03-06 01:17:07', 'г. Москва', '947e5ad09740777afd5f28c16f318ab0.png');

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials_lang`
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
-- Структура таблицы `user`
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
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`) VALUES
(1, 'root', 'dArVMsVrEo-9LPrwI4RtJc_I0eAnIIu9', '$2y$13$tiluCXM6rvru9PTaU.F3teSnc2vwO98EDSF8nqVmMJ7xZsY7t7Vhm', NULL, '', 10, 1481295772, 1513629941, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `admission_lang`
--
ALTER TABLE `admission_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_id` (`parent`),
  ADD KEY `language_id` (`lang`);

--
-- Индексы таблицы `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `advertise_lang`
--
ALTER TABLE `advertise_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `album_lang`
--
ALTER TABLE `album_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attach`
--
ALTER TABLE `attach`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_lang`
--
ALTER TABLE `books_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_lang`
--
ALTER TABLE `company_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_signup`
--
ALTER TABLE `company_signup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`),
  ADD KEY `district` (`district`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact_subject`
--
ALTER TABLE `contact_subject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact_subject_lang`
--
ALTER TABLE `contact_subject_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district_lang`
--
ALTER TABLE `district_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq_lang`
--
ALTER TABLE `faq_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category_lang`
--
ALTER TABLE `news_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_lang`
--
ALTER TABLE `news_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page_lang`
--
ALTER TABLE `page_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner_lang`
--
ALTER TABLE `partner_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pcounter_save`
--
ALTER TABLE `pcounter_save`
  ADD PRIMARY KEY (`save_name`);

--
-- Индексы таблицы `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Индексы таблицы `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Индексы таблицы `poll_data`
--
ALTER TABLE `poll_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`),
  ADD KEY `option` (`option`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `poll_lang`
--
ALTER TABLE `poll_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`),
  ADD KEY `language` (`language`);

--
-- Индексы таблицы `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`);

--
-- Индексы таблицы `poll_option_lang`
--
ALTER TABLE `poll_option_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`),
  ADD KEY `option` (`option`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_lang`
--
ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question_category`
--
ALTER TABLE `question_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admissionId` (`admissionId`),
  ADD KEY `reply_by` (`reply_by`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region_lang`
--
ALTER TABLE `region_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services_lang`
--
ALTER TABLE `services_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_category_lang`
--
ALTER TABLE `service_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_request_subject`
--
ALTER TABLE `service_request_subject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_request_subject_lang`
--
ALTER TABLE `service_request_subject_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `settings_lang`
--
ALTER TABLE `settings_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telegram_settings`
--
ALTER TABLE `telegram_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telegram_user`
--
ALTER TABLE `telegram_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `testimonials_lang`
--
ALTER TABLE `testimonials_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `admission_lang`
--
ALTER TABLE `admission_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `advertise_lang`
--
ALTER TABLE `advertise_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `album_lang`
--
ALTER TABLE `album_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attach`
--
ALTER TABLE `attach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `books_lang`
--
ALTER TABLE `books_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `company_lang`
--
ALTER TABLE `company_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `company_signup`
--
ALTER TABLE `company_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `contact_subject`
--
ALTER TABLE `contact_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `contact_subject_lang`
--
ALTER TABLE `contact_subject_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT для таблицы `district_lang`
--
ALTER TABLE `district_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `faq_lang`
--
ALTER TABLE `faq_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_category_lang`
--
ALTER TABLE `news_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news_lang`
--
ALTER TABLE `news_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `page_lang`
--
ALTER TABLE `page_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `partner_lang`
--
ALTER TABLE `partner_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `poll_data`
--
ALTER TABLE `poll_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `poll_lang`
--
ALTER TABLE `poll_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `poll_option_lang`
--
ALTER TABLE `poll_option_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product_category_lang`
--
ALTER TABLE `product_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_lang`
--
ALTER TABLE `product_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `question_category`
--
ALTER TABLE `question_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `region_lang`
--
ALTER TABLE `region_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `services_lang`
--
ALTER TABLE `services_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service_category_lang`
--
ALTER TABLE `service_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service_request_subject`
--
ALTER TABLE `service_request_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service_request_subject_lang`
--
ALTER TABLE `service_request_subject_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings_lang`
--
ALTER TABLE `settings_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `telegram_user`
--
ALTER TABLE `telegram_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `testimonials_lang`
--
ALTER TABLE `testimonials_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admission_lang`
--
ALTER TABLE `admission_lang`
  ADD CONSTRAINT `admission_lang_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `admission` (`id`),
  ADD CONSTRAINT `admission_lang_ibfk_2` FOREIGN KEY (`lang`) REFERENCES `languages` (`id`);

--
-- Ограничения внешнего ключа таблицы `company_signup`
--
ALTER TABLE `company_signup`
  ADD CONSTRAINT `company_signup_ibfk_1` FOREIGN KEY (`region`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `company_signup_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`id`);

--
-- Ограничения внешнего ключа таблицы `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `poll_data`
--
ALTER TABLE `poll_data`
  ADD CONSTRAINT `poll_data_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`),
  ADD CONSTRAINT `poll_data_ibfk_2` FOREIGN KEY (`option`) REFERENCES `poll_options` (`id`),
  ADD CONSTRAINT `poll_data_ibfk_3` FOREIGN KEY (`user`) REFERENCES `guests` (`id`);

--
-- Ограничения внешнего ключа таблицы `poll_lang`
--
ALTER TABLE `poll_lang`
  ADD CONSTRAINT `poll_lang_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`),
  ADD CONSTRAINT `poll_lang_ibfk_2` FOREIGN KEY (`language`) REFERENCES `languages` (`id`);

--
-- Ограничения внешнего ключа таблицы `poll_options`
--
ALTER TABLE `poll_options`
  ADD CONSTRAINT `poll_options_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`);

--
-- Ограничения внешнего ключа таблицы `poll_option_lang`
--
ALTER TABLE `poll_option_lang`
  ADD CONSTRAINT `poll_option_lang_ibfk_1` FOREIGN KEY (`language`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `poll_option_lang_ibfk_2` FOREIGN KEY (`option`) REFERENCES `poll_options` (`id`);

--
-- Ограничения внешнего ключа таблицы `reception`
--
ALTER TABLE `reception`
  ADD CONSTRAINT `reception_ibfk_1` FOREIGN KEY (`admissionId`) REFERENCES `admission` (`id`),
  ADD CONSTRAINT `reception_ibfk_2` FOREIGN KEY (`reply_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

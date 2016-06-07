-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 07 2016 г., 17:18
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `wall_of_ads`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `role` enum('private','company') NOT NULL DEFAULT 'private',
  `allow_mails` enum('yes','no') NOT NULL DEFAULT 'no',
  `city_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Транспорт', 0),
(2, 'Автомобили с пробегом', 1),
(3, 'Новые автомобили', 1),
(4, 'Мотоциклы и мототехника', 1),
(5, 'Грузовики и спецтехника', 1),
(6, 'Водный транспорт', 1),
(7, 'Запчасти и аксессуары', 1),
(8, 'Недвижимость', 0),
(9, 'Квартиры', 8),
(10, 'Комнаты', 8),
(11, 'Дома, дачи, коттеджи', 8),
(12, 'Земельные участки', 8),
(13, 'Гаражи и машиноместа', 8),
(14, 'Коммерческая недвижимость', 8),
(15, 'Недвижимость за рубежом', 8),
(16, 'Работа', 0),
(17, 'Вакансии (поиск сотрудников)', 16),
(18, 'Резюме (поиск работы)', 16),
(20, 'Для дома и дачи', 0),
(21, 'Бытовая техника', 20),
(22, 'Мебель и интерьер', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `postcode`) VALUES
(1, 'Новосибирск', '641780'),
(2, 'Барабинск', '641490'),
(3, 'Бердск', '641510'),
(4, 'Искитим', '641600'),
(5, 'Колывань', '641630'),
(6, 'Краснообск', '641680'),
(7, 'Куйбышев', '641710'),
(8, 'Мошково', '641760');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

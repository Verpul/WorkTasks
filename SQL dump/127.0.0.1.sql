-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2014 г., 14:25
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `work`
--
CREATE DATABASE `work` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `work`;

-- --------------------------------------------------------

--
-- Структура таблицы `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` char(6) CHARACTER SET cp1251 NOT NULL,
  `comment` text CHARACTER SET cp1251 NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Дамп данных таблицы `missions`
--

INSERT INTO `missions` (`id`, `priority`, `comment`, `closed`, `date`) VALUES
(14, 'High', 'updated again', 1, '2014-04-21 16:25:42'),
(15, 'Medium', 'Second updated', 1, '2014-04-22 16:25:58'),
(16, 'Low', 'First', 1, '2014-04-23 16:48:17'),
(17, 'Low', 'Wow', 1, '2014-04-23 16:48:25'),
(28, 'High', '?', 1, '2014-05-05 15:27:54'),
(29, 'High', '??', 1, '2014-05-05 15:29:03'),
(30, 'High', 'вава', 1, '2014-05-05 15:34:58'),
(35, 'Medium', 'тест', 1, '2014-05-05 16:12:44'),
(36, 'High', 'sdsddsds sdsds as', 1, '2014-05-05 16:27:00'),
(43, 'High', 'da da da da', 1, '2014-05-07 15:02:51'),
(44, 'High', 'РґР°', 1, '2014-05-08 11:37:10'),
(45, 'High', 'РµСѓС‹Рµ', 1, '2014-05-08 11:57:36'),
(46, 'High', 'asd', 0, '2014-05-08 13:25:40');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` text NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 123456),
('test', 123);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

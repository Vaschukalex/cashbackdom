-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 07 2020 г., 17:30
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `caschbackdom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anketa2_data`
--

CREATE TABLE IF NOT EXISTS `anketa2_data` (
  `Fio` text NOT NULL,
  `Bir_day` date NOT NULL,
  `Mob_tel` text NOT NULL,
  `Email` text NOT NULL,
  `Town_when_buy_kv` text NOT NULL,
  `Zastroischik` text NOT NULL,
  `JK` text NOT NULL,
  `Price_kvartirif` text NOT NULL,
  `Price_kvartirit` text NOT NULL,
  `Kolvo_komnat` text NOT NULL,
  `Srok_sdachi` text NOT NULL,
  `Ploschad_kvartirif` text NOT NULL,
  `Ploschad_kvartirit` text NOT NULL,
  `Ploschad_kuhnif` text NOT NULL,
  `Ploschad_kuhnit` text NOT NULL,
  `Raion` text NOT NULL,
  `Etazhf` text NOT NULL,
  `Etazht` text NOT NULL,
  `Etazhnost_domaf` text NOT NULL,
  `Etazhnost_domat` text NOT NULL,
  `Material_sten` text NOT NULL,
  `Remont` text NOT NULL,
  `Data_prosmotra` text NOT NULL,
  `Dop_komenty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `anketa_data`
--

CREATE TABLE IF NOT EXISTS `anketa_data` (
  `brand` text NOT NULL,
  `Site_n` text NOT NULL,
  `social` text NOT NULL,
  `Name_Ur_lic` text NOT NULL,
  `Gorod_prisytstvia` text NOT NULL,
  `Vidi_tovarov` text NOT NULL,
  `Osnovnie_kanali` text NOT NULL,
  `Kolvo_komnat` text NOT NULL,
  `Dolia_rashodow` text NOT NULL,
  `Opit_isp` text NOT NULL,
  `Fio_dolzh` text NOT NULL,
  `Contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

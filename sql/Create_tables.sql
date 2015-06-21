-- phpMyAdmin SQL Dump
-- version home.pl
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 21 Cze 2015, 23:33
-- Wersja serwera: 5.5.42-37.1-log
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Dzieci`
--

CREATE TABLE IF NOT EXISTS `Dzieci` (
  `id_dziecka` int(11) NOT NULL AUTO_INCREMENT,
  `imie1` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `opiekun1_id` int(11) NOT NULL,
  `opiekun2_id` int(11) NOT NULL,
  `grupa_id` int(11) NOT NULL,
  `plec` enum('M','K') NOT NULL,
  `akt` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_dziecka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=11 ;

--


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Grupy`
--

CREATE TABLE IF NOT EXISTS `Grupy` (
  `id_grupy` int(11) NOT NULL AUTO_INCREMENT,
  `rocznik` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL,
  `akt` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_grupy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=14 ;

--


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Osoby`
--

CREATE TABLE IF NOT EXISTS `Osoby` (
  `id_osoby` int(11) NOT NULL AUTO_INCREMENT,
  `imie1` varchar(45) NOT NULL,
  `imie2` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `stanowisko` tinyint(4) NOT NULL,
  `plec` enum('M','K') NOT NULL,
  `pass1` varchar(200) NOT NULL,
  `user1` varchar(10) NOT NULL,
  `akt` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_osoby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=26 ;

--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

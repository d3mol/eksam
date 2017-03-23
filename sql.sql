-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Loomise aeg: Märts 23, 2017 kell 11:50 AM
-- Serveri versioon: 5.5.49-log
-- PHP versioon: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `uksed`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `cards`
--

CREATE TABLE `cards` (
  `card_nr` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Andmete tõmmistamine tabelile `cards`
--

INSERT INTO `cards` (`card_nr`, `user_id`, `expiration`) VALUES
(1, 2, NULL),
(20003000, 2, '2016-11-15 00:00:00'),
(20003001, 2, '2017-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `card_doors`
--

CREATE TABLE `card_doors` (
  `id` int(11) NOT NULL,
  `card_nr` int(11) DEFAULT NULL,
  `door_nr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Andmete tõmmistamine tabelile `card_doors`
--

INSERT INTO `card_doors` (`id`, `card_nr`, `door_nr`) VALUES
(3, 1, 5),
(4, 1, 7),
(5, 20003000, 6),
(6, 20003001, 7);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `doors`
--

CREATE TABLE `doors` (
  `door_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Andmete tõmmistamine tabelile `doors`
--

INSERT INTO `doors` (`door_nr`) VALUES
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`) VALUES
(2, 'Mark ', 'Väljak'),
(3, 'Jaagup', 'Kippar'),
(4, 'Romil', 'R'),
(5, 'admin', 'admin');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_nr`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksid tabelile `card_doors`
--
ALTER TABLE `card_doors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_nr` (`card_nr`),
  ADD KEY `door_nr` (`door_nr`);

--
-- Indeksid tabelile `doors`
--
ALTER TABLE `doors`
  ADD PRIMARY KEY (`door_nr`);

--
-- Indeksid tabelile `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `card_doors`
--
ALTER TABLE `card_doors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT tabelile `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Piirangud tabelile `card_doors`
--
ALTER TABLE `card_doors`
  ADD CONSTRAINT `card_doors_ibfk_1` FOREIGN KEY (`card_nr`) REFERENCES `cards` (`card_nr`),
  ADD CONSTRAINT `card_doors_ibfk_2` FOREIGN KEY (`door_nr`) REFERENCES `doors` (`door_nr`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

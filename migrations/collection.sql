-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 11, 2021 alle 14:55
-- Versione del server: 10.4.20-MariaDB
-- Versione PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collection`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `rubbish_collection`
--

CREATE TABLE `rubbish_collection` (
  `type_` varchar(30) COLLATE utf8_bin NOT NULL,
  `day_` varchar(30) COLLATE utf8_bin NOT NULL,
  `hour` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `rubbish_collection`
--

INSERT INTO `rubbish_collection` (`type_`, `day_`, `hour`) VALUES
('paper', 'monday', '08:00 - 10:00'),
('plastic', 'tuesday', '09:00 - 10:30'),
('organic', 'wednesday', '07:00 - 08:30'),
('organic', 'thursday', '09:00 - 08:00'),
('glass', 'friday', '10:00 - 10:30'),
('organic', 'saturday', '10:00 - 10:30'),
('paper', 'saturday', '11:00 - 11:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

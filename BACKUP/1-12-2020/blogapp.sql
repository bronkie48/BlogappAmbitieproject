-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 dec 2020 om 14:27
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `image` blob,
  `message` varchar(255) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blog`
--

INSERT INTO `blog` (`blogid`, `userid`, `subject`, `image`, `message`, `date`) VALUES
(18, 1, 'test123', 0x57494e5f32303138313230345f31375f30335f34385f50726f2e6a7067, 'Dit ben ik brian', '2020-12-01 14:21:53'),
(19, 1, 'test123', 0x57494e5f32303138313230345f31375f30335f34385f50726f2e6a7067, 'test123', '2020-12-01 14:23:05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `email`, `postal`, `address`, `city`, `pwd`) VALUES
(1, 'brian bronkhorst', 'bronkie48', 'brian@brian.nl', '3781ER', 'Straat 18', 'Voorthuizen', '$2y$10$tNLhAER6Ef/BmNDO7cPatu7NHIRhtK7eeWz0AIvyNztHSA8AEeCcu');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`),
  ADD KEY `userid` (`userid`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

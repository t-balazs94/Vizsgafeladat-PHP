-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Aug 27. 11:13
-- Kiszolgáló verziója: 10.4.19-MariaDB
-- PHP verzió: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szotar`
--
CREATE DATABASE IF NOT EXISTS `szotar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `szotar`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szotar`
--

CREATE TABLE `szotar` (
  `sorszam` smallint(5) UNSIGNED NOT NULL,
  `angol` varchar(20) CHARACTER SET utf8 NOT NULL,
  `magyar` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `szotar`
--

INSERT INTO `szotar` (`sorszam`, `angol`, `magyar`) VALUES
(1, 'apple', 'alma'),
(2, 'cat', 'macska'),
(3, 'house', 'ház'),
(4, 'bridge', 'híd'),
(5, 'light', 'fény'),
(6, 'or', 'vagy'),
(7, 'red', 'piros'),
(8, 'blue', 'kék'),
(9, 'hat', 'kalap'),
(10, 'six', 'hat'),
(11, 'and', 'és'),
(12, 'set', 'beállít'),
(13, 'set', 'teríték'),
(14, 'street', 'utca'),
(15, 'dog', 'kutya'),
(16, 'city', 'város'),
(17, 'capital', 'főváros'),
(18, 'yellow', 'sárga'),
(19, 'tiger', 'tigris'),
(20, 'wolf', 'farkas'),
(21, 'pig', 'malac'),
(22, 'book', 'könyv'),
(23, 'beer', 'sör'),
(24, 'computer', 'számítógép'),
(25, 'bus', 'busz'),
(26, 'clock', 'óra'),
(27, 'river', 'folyó'),
(28, 'ship', 'hajó'),
(29, 'bird', 'madár'),
(30, 'car', 'autó'),
(31, 'night', 'éjszaka'),
(32, 'sun', 'nap'),
(33, 'man', 'férfi'),
(34, 'woman', 'nő');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `szotar`
--
ALTER TABLE `szotar`
  ADD PRIMARY KEY (`sorszam`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `szotar`
--
ALTER TABLE `szotar`
  MODIFY `sorszam` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

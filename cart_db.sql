-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Dez 2016 um 12:03
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Mert Yucel', 'mertyucel12@gmail.com', '01722747322', 'Tubingen, TU, DE', '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(1, 1, 25.00, '2016-12-04 22:38:01', '2016-12-04 22:38:01', '1'),
(2, 1, 40.00, '2016-12-04 22:39:47', '2016-12-04 22:39:47', '1'),
(3, 1, 40.00, '2016-12-04 22:59:40', '2016-12-04 22:59:40', '1'),
(4, 1, 15.00, '2016-12-04 23:10:38', '2016-12-04 23:10:38', '1'),
(5, 1, 25.00, '2016-12-04 23:16:40', '2016-12-04 23:16:40', '1'),
(6, 1, 25.00, '2016-12-04 23:52:23', '2016-12-04 23:52:23', '1'),
(7, 1, 80.00, '2016-12-04 23:53:01', '2016-12-04 23:53:01', '1'),
(8, 1, 40.00, '2016-12-04 23:54:26', '2016-12-04 23:54:26', '1'),
(9, 1, 99.95, '2016-12-05 00:23:17', '2016-12-05 00:23:17', '1'),
(10, 1, 441.80, '2016-12-05 00:23:41', '2016-12-05 00:23:41', '1'),
(11, 1, 87.95, '2016-12-05 00:24:34', '2016-12-05 00:24:34', '1'),
(12, 1, 173.90, '2016-12-05 12:03:10', '2016-12-05 12:03:10', '1'),
(13, 1, 99.95, '2016-12-05 12:03:17', '2016-12-05 12:03:17', '1'),
(14, 1, 99.95, '2016-12-05 14:39:19', '2016-12-05 14:39:19', '1'),
(15, 1, 299.85, '2016-12-05 14:41:07', '2016-12-05 14:41:07', '1'),
(16, 1, 99.95, '2016-12-05 14:43:10', '2016-12-05 14:43:10', '1'),
(17, 1, 99.95, '2016-12-05 14:44:52', '2016-12-05 14:44:52', '1'),
(18, 1, 99.95, '2016-12-05 14:46:28', '2016-12-05 14:46:28', '1'),
(19, 1, 99.95, '2016-12-05 14:47:15', '2016-12-05 14:47:15', '1'),
(20, 1, 99.95, '2016-12-05 14:49:28', '2016-12-05 14:49:28', '1'),
(21, 1, 286.90, '2016-12-05 14:49:51', '2016-12-05 14:49:51', '1'),
(22, 1, 99.95, '2016-12-05 14:50:04', '2016-12-05 14:50:04', '1'),
(23, 1, 289.85, '2016-12-05 14:52:18', '2016-12-05 14:52:18', '1'),
(24, 1, 287.85, '2016-12-05 14:53:48', '2016-12-05 14:53:48', '1'),
(25, 1, 89.95, '2016-12-05 14:54:09', '2016-12-05 14:54:09', '1'),
(26, 1, 199.90, '2016-12-05 14:54:27', '2016-12-05 14:54:27', '1'),
(27, 1, 99.95, '2016-12-05 14:55:12', '2016-12-05 14:55:12', '1'),
(28, 1, 99.95, '2016-12-05 14:55:29', '2016-12-05 14:55:29', '1'),
(29, 1, 189.90, '2016-12-05 15:12:16', '2016-12-05 15:12:16', '1'),
(30, 1, 199.90, '2016-12-05 15:24:29', '2016-12-05 15:24:29', '1'),
(31, 1, 376.89, '2016-12-05 19:04:43', '2016-12-05 19:04:43', '1'),
(32, 1, 164.90, '2016-12-05 19:14:14', '2016-12-05 19:14:14', '1'),
(33, 1, 99.99, '2016-12-05 19:18:13', '2016-12-05 19:18:13', '1'),
(34, 1, 183.94, '2016-12-05 19:22:25', '2016-12-05 19:22:25', '1'),
(35, 1, 267.89, '2016-12-05 19:23:43', '2016-12-05 19:23:43', '1'),
(36, 1, 903.71, '2016-12-06 10:21:30', '2016-12-06 10:21:30', '1'),
(37, 1, 87.99, '2016-12-06 10:21:44', '2016-12-06 10:21:44', '1'),
(38, 1, 99.95, '2016-12-06 10:26:09', '2016-12-06 10:26:09', '1'),
(39, 1, 465.79, '2016-12-06 10:29:01', '2016-12-06 10:29:01', '1'),
(40, 1, 275.93, '2016-12-06 10:29:20', '2016-12-06 10:29:20', '1'),
(41, 1, 89.95, '2016-12-06 10:31:01', '2016-12-06 10:31:01', '1'),
(42, 1, 367.88, '2016-12-06 10:31:49', '2016-12-06 10:31:49', '1'),
(43, 1, 487.87, '2016-12-06 11:11:24', '2016-12-06 11:11:24', '1'),
(44, 1, 276.89, '2016-12-06 11:11:38', '2016-12-06 11:11:38', '1'),
(45, 1, 199.98, '2016-12-06 11:52:24', '2016-12-06 11:52:24', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 2, 1),
(2, 2, 1, 1),
(3, 2, 2, 1),
(4, 3, 2, 1),
(5, 3, 1, 1),
(6, 4, 1, 1),
(7, 5, 2, 1),
(8, 6, 2, 1),
(9, 7, 1, 2),
(10, 7, 2, 2),
(11, 8, 2, 1),
(12, 8, 1, 1),
(13, 9, 6, 1),
(14, 10, 1, 1),
(15, 10, 2, 1),
(16, 10, 5, 1),
(17, 10, 6, 1),
(18, 10, 4, 1),
(19, 11, 5, 1),
(20, 12, 3, 1),
(21, 12, 4, 1),
(22, 13, 6, 1),
(23, 14, 6, 1),
(24, 15, 6, 3),
(25, 16, 6, 1),
(26, 17, 6, 1),
(27, 18, 6, 1),
(28, 19, 6, 1),
(29, 20, 6, 1),
(30, 21, 1, 1),
(31, 21, 5, 1),
(32, 21, 6, 1),
(33, 22, 6, 1),
(34, 23, 6, 2),
(35, 23, 4, 1),
(36, 24, 6, 2),
(37, 24, 5, 1),
(38, 25, 4, 1),
(39, 26, 6, 2),
(40, 27, 6, 1),
(41, 28, 6, 1),
(42, 29, 4, 1),
(43, 29, 6, 1),
(44, 30, 6, 2),
(45, 31, 1, 1),
(46, 31, 4, 1),
(47, 31, 5, 1),
(48, 31, 12, 1),
(49, 32, 2, 1),
(50, 32, 6, 1),
(51, 33, 12, 1),
(52, 34, 3, 1),
(53, 34, 12, 1),
(54, 35, 12, 1),
(55, 35, 3, 2),
(56, 36, 10, 1),
(57, 36, 11, 2),
(58, 36, 5, 1),
(59, 36, 1, 1),
(60, 36, 3, 1),
(61, 36, 4, 2),
(62, 36, 12, 2),
(63, 37, 11, 1),
(64, 38, 6, 1),
(65, 39, 11, 1),
(66, 39, 4, 1),
(67, 39, 6, 2),
(68, 39, 5, 1),
(69, 40, 9, 1),
(70, 40, 4, 1),
(71, 40, 12, 1),
(72, 41, 4, 1),
(73, 42, 7, 1),
(74, 42, 12, 1),
(75, 42, 4, 1),
(76, 42, 11, 1),
(77, 43, 11, 1),
(78, 43, 6, 2),
(79, 43, 12, 2),
(80, 44, 6, 1),
(81, 44, 10, 1),
(82, 44, 12, 1),
(83, 45, 12, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`, `status`, `image`, `gender`) VALUES
(1, 'ADIDAS ORIGINALS', 'GAZELLE - Sneaker low', 99.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1', 'img/1gazelle.jpg', 'male'),
(2, 'Converse', 'CHUCK TAYLOR ALL STAR - Sneaker ', 64.95, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1', 'img/converse.jpg', 'male'),
(3, 'K-SWISS', 'RINZLER TRAINER - Sneaker low', 83.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/kswiss.jpg', 'male'),
(4, 'PUMA', 'BASKET CLASSIC - Sneaker low - burnt ', 89.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/puma.jpg', 'male'),
(5, 'Nike', 'AIR FORCE 1 ULTRAFORCE - Sneaker ', 87.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/nikeairforce.jpg', 'male'),
(6, 'Nike', 'AIR MAX SEQUENT - Laufschuh Neutral ', 99.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/nikeairmax.jpg', 'male'),
(7, 'New Balance', 'WL996 - Sneaker low - silver\r\n', 89.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/newbalance.jpg', 'female'),
(8, 'Adidas', 'STAN SMITH - Sneaker low - pale ', 99.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/adidasfemale.jpg', 'female'),
(9, 'Reebok Classic', 'CLASSIC OUTDOOR - Sneaker low', 85.99, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/female1.jpg', 'female'),
(10, 'Adidas Originals', 'ZX FLUX ADV VIRTUE EM - Sneaker ', 76.95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/female2.jpg', 'female'),
(11, 'New Balance', 'WL574 - Sneaker low - silver/black\r\n', 87.99, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/female3.jpg', 'female'),
(12, 'Nike', 'JUVENATE - Sneaker low - dark ', 99.99, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 'img/female4.jpg', 'female');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indizes für die Tabelle `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT für Tabelle `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

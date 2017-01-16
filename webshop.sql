--
-- Veritabanı: `webshop`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `vorname`, `nachname`, `email`, `passwort`, `phone`, `adresse`, `created_at`) VALUES
(1, 'asd', 'asd', 'mert@mert.com', '$2y$10$0bCwgHZTBkJTSlof1PBMNOLwEFcxHhi0yTLW31LFuj56SrE6skuP.', '123456789', 'brunsstr.', NULL),
(15, 'mehmet', 'martin', 'martin@hotmail.de', '$2y$10$z6dUvzn32FdPqktXknFfzOp5ZDUsOBHz9YIOJ1aG39qQFiHkpxUwO', '12312', 'skjÃ¶slf', NULL),
(16, 'Memo', 'Kizil', 'memo@gmail.com', '$2y$10$eFrpqpDwHJ9XQ3rV5KXgf.MVafZfwVlhOi4YRBTuOm.GiHR3txUPq', '123456789', 'NauklerstraÃŸe 21, 72074, TÃ¼bingen', NULL),
(17, 'ali', 'ali', 'ali@gmail.com', '$2y$10$HBvfOqkbaMlU/cicY0LMB.f0Q2eY7wlbg/ZHALEKXh.XMQ4vGQzC2', '123456789', 'dsfdsfsfsdfsd', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
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
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(43, 1, 87.99, '2017-01-15 14:52:25', '2017-01-15 14:52:25', '1'),
(44, 1, 87.99, '2017-01-15 15:15:54', '2017-01-15 15:15:54', '1'),
(45, 1, 87.99, '2017-01-15 15:16:01', '2017-01-15 15:16:01', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(41, 43, 11, 1),
(42, 44, 11, 1),
(43, 45, 11, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
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
-- Tablo döküm verisi `products`
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
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Tablo için indeksler `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Tablo için AUTO_INCREMENT değeri `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

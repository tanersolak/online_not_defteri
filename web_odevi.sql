-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Haz 2021, 20:26:32
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `web_odevi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notlar_tablo`
--

CREATE TABLE `notlar_tablo` (
  `not_id` int(11) NOT NULL,
  `not_text` varchar(500) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `notlar_tablo`
--

INSERT INTO `notlar_tablo` (`not_id`, `not_text`, `uye_id`, `tarih`) VALUES
(12, 'a', 5, '2021-06-12'),
(13, '                        asdasdasdghasfd hasdh gafsd jasd fahsg gasj ddsa', 5, '2021-06-12'),
(14, 'asdasdasdghasfd hasdh gafsd jasd fahsg gasj d', 5, '2021-06-12'),
(15, 'aghsdvasjbfdahskjasdjg asdhgasjgd s gdjahg dhajsdgfhas da jd gajs gdajsg d sajdg ja djad jas djadg ajsg dhajsg dja djagdgajf jahsgdhjags djhagd jaj dag djhsagdj hag dhjasd jhadjh asd sajdgasjd', 5, '2021-06-12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_tablo`
--

CREATE TABLE `uye_tablo` (
  `uye_id` int(11) NOT NULL,
  `uye_adi` varchar(45) NOT NULL,
  `uye_soyadi` varchar(45) NOT NULL,
  `uye_mail` varchar(25) NOT NULL,
  `uye_sifre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uye_tablo`
--

INSERT INTO `uye_tablo` (`uye_id`, `uye_adi`, `uye_soyadi`, `uye_mail`, `uye_sifre`) VALUES
(5, 'Mustafa', 'Eren', 'mustafa@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(6, 'Taner', 'Solak', 'taner@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `notlar_tablo`
--
ALTER TABLE `notlar_tablo`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `uye_id` (`uye_id`);

--
-- Tablo için indeksler `uye_tablo`
--
ALTER TABLE `uye_tablo`
  ADD PRIMARY KEY (`uye_id`),
  ADD UNIQUE KEY `uye_mail` (`uye_mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `notlar_tablo`
--
ALTER TABLE `notlar_tablo`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `uye_tablo`
--
ALTER TABLE `uye_tablo`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `notlar_tablo`
--
ALTER TABLE `notlar_tablo`
  ADD CONSTRAINT `notlar_tablo_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uye_tablo` (`uye_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

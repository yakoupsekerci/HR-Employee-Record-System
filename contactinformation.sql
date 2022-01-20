-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Oca 2022, 17:31:31
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `employee`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contactinformation`
--

CREATE TABLE `contactinformation` (
  `id` int(11) NOT NULL,
  `namesurname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `jop` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dateofstart` datetime DEFAULT current_timestamp(),
  `salary` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `contactinformation`
--

INSERT INTO `contactinformation` (`id`, `namesurname`, `address`, `phone`, `jop`, `dateofstart`, `salary`) VALUES
(1, 'YAKUP ŞEKERCİ', 'KÜÇÜKBAKKALKÖY MAH', '536 XXX XX XX', 'IT', '2022-01-20 17:29:00', '5500'),
(2, 'OMER RIZA ŞEKERCİ', 'İÇERENKÖY MAH', '532 XXX XX XX', 'MUHASEBE', '2022-01-20 17:30:00', '8800');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contactinformation`
--
ALTER TABLE `contactinformation`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contactinformation`
--
ALTER TABLE `contactinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

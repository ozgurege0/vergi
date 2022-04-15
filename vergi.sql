-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 15 Nis 2022, 20:29:14
-- Sunucu sürümü: 10.3.34-MariaDB
-- PHP Sürümü: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `panterya_vergi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_icon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `contact_title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `contact_desc` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `features`
--

CREATE TABLE `features` (
  `features_id` int(11) NOT NULL,
  `features_icon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `features_title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `features_desc` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `features`
--

INSERT INTO `features` (`features_id`, `features_icon`, `features_title`, `features_desc`) VALUES
(1, 'fa-solid fa-laptop', 'Vergi Numarası Doğrulama', 'Vergi Numarası Doğrulama'),
(2, 'fa-solid fa-laptop', 'Vergi Numarası Doğrulama', 'Vergi Numarası Doğrulama'),
(3, 'fa-solid fa-laptop', 'Vergi Numarası Doğrulama', 'Vergi Numarası Doğrulama');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hero`
--

CREATE TABLE `hero` (
  `hero_id` int(11) NOT NULL,
  `hero_img` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hero_title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hero_text` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hero`
--

INSERT INTO `hero` (`hero_id`, `hero_img`, `hero_title`, `hero_text`) VALUES
(0, 'assets/img/2107129921hero.png', 'Vergi Kimlik Sorgula, Doğruluğunu Kontrol Et!', 'Ozgur Sorgula sayesinde ücretsiz vergi kimliği sorgulayarak doğruluğa ulaşabilirsin!\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `message_mail` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `message_subject` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `message_message` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `message_status` int(1) NOT NULL,
  `message_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL DEFAULT 0,
  `seo_title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `seo_description` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `seo_keywords` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `seo`
--

INSERT INTO `seo` (`seo_id`, `seo_title`, `seo_description`, `seo_keywords`) VALUES
(0, 'Vkn Sorgula', 'Vkn Sorgula, Ozgur_Medya', 'html, css, js');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL DEFAULT 0,
  `setting_logo` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `setting_footer` varchar(1500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_logo`, `setting_footer`) VALUES
(0, 'assets/img/2067230973logo.png', '© 2022 Copyright: &lt;a href=&quot;https://vergi.genelyazilim.com/&quot;&gt;Ozgur_Medya&lt;/a&gt;');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sss`
--

CREATE TABLE `sss` (
  `sss_id` int(11) NOT NULL,
  `sss_title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sss_desc` varchar(1500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sss`
--

INSERT INTO `sss` (`sss_id`, `sss_title`, `sss_desc`) VALUES
(1, 'Veriler Doğrumu?', 'Sitemizde yayınlan bilgilerin güncelliğini garanti etmez, doğruluk, tamlık ve kullanılırlığını değerlendirmek yalnızca kullanıcının sorumluluğundadır.'),
(2, 'Aradığım VKN yok ne yapabilirim.', 'Bize Firma ünvanını yollayarak eklenmesini sağlaya bilirsiniz. Bunun için ana sayfadaki iletişim kutumuzu kullan!'),
(3, 'VKN Numaramı Sildirmek İstiyorum.', 'Sildirmek istediğiniz vergi kimlik numarasını ve iletişim kutumuza yazarak bize bildirebilirsin.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `admin_id` int(11) NOT NULL,
  `admin_kullanici` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `admin_parola` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`admin_id`, `admin_kullanici`, `admin_parola`) VALUES
(0, 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`features_id`);

--
-- Tablo için indeksler `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`hero_id`);

--
-- Tablo için indeksler `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Tablo için indeksler `sss`
--
ALTER TABLE `sss`
  ADD PRIMARY KEY (`sss_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `features`
--
ALTER TABLE `features`
  MODIFY `features_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `hero`
--
ALTER TABLE `hero`
  MODIFY `hero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sss`
--
ALTER TABLE `sss`
  MODIFY `sss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

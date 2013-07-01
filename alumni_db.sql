-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Tem 2013, 12:48:53
-- Sunucu sürümü: 5.5.31
-- PHP Sürümü: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `mezun2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fakulte_id` int(11) DEFAULT NULL,
  `bolum_id` int(11) DEFAULT NULL,
  `admin_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `fakulte_id`, `bolum_id`, `admin_type`) VALUES
(2, 'hatice', 'aydın', 'hatice@mail.com', '12345', 1, 2, 2),
(3, 'derya', 'uzun', 'derya@mail.com', '12345', NULL, NULL, 1),
(4, 'Zeynep', 'Aydın', 'zeynep@gmail.com', '12345', 0, 1, 2),
(5, 'özlem', 'aydın', 'ozlem@gmail.com', '12345', 0, 2, 2),
(6, 'sefa', 'yıldız', 'sefa@mail.com', '12345', 0, 5, 2),
(7, 'ali', 'veli', 'aliveliselami@yopmail.com', '12345', 0, 2, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_department_faculty1` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `department`
--

INSERT INTO `department` (`id`, `name`, `faculty_id`) VALUES
(1, 'Bilgisayar', 1),
(2, 'Gida', 1),
(3, 'Kimya', 1),
(4, 'Fizik', 2),
(5, 'Tarih', 2),
(6, 'Biyoloji', 2),
(7, 'Psikiyatri', 3),
(8, 'Savcı', 4),
(9, 'Hakim', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `publish_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_event_users1` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=17 ;

--
-- Tablo döküm verisi `event`
--

INSERT INTO `event` (`id`, `event_type`, `subject`, `content`, `users_id`, `publish_date`) VALUES
(12, 'job', 'bilgisayar mühendisi aranıyor', 'php, mysql  bilen, tercihen linux  kullanıcısı eleman aranıyor.', 42, '2013-06-20 02:35:18'),
(13, 'job', 'mühendis', 'php bilen', 45, '2013-06-22 01:25:37'),
(14, 'notice', 'mezunlar buluşuyor', 'temmmuz ayında omü mezunlarını topluyoruz', 42, '2013-06-23 05:54:40'),
(15, 'notice', 'tanışma balosu', 'tüm omü öğrencileri davetlidir', 51, '2013-06-23 08:44:34'),
(16, 'job', 'mühendis', 'c bilen aranıyor', 51, '2013-06-23 08:45:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Mühendislik Fakültesi'),
(2, 'Fen Edebiyat'),
(3, 'Tıp '),
(4, 'Hukuk Fakültesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `first_name` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `user_type_no` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `joining_date` year(4) DEFAULT NULL,
  `graduated_date` year(4) DEFAULT NULL,
  `job_status` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  `register_date` date DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `apprave_teacher` int(11) DEFAULT NULL,
  `imagepath` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_department1` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=56 ;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `email`, `user_type_no`, `joining_date`, `graduated_date`, `job_status`, `password`, `register_date`, `last_login_date`, `department_id`, `active`, `apprave_teacher`, `imagepath`) VALUES
(38, '1', 'derya', 'uzun', 'derya@mail.com', '08060333', 2005, 2010, NULL, '12345', '0000-00-00', NULL, 6, 0, NULL, NULL),
(40, '1', 'Emine', 'Aydın', 'emine@mail.com', '08060456', 2006, 2010, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(41, '1', 'Zeynep', 'Aydın', 'zeynep@gmail.com', '76472920', 2008, 2013, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(42, '2', 'Leyla', 'Git', 'leyla@gmail.com', '274902748392', NULL, NULL, NULL, '123456', NULL, NULL, 2, 1, NULL, NULL),
(44, '1', 'Zeynep', 'Aydın', 'zeynep@mail.com', '876534567', 2006, 2010, NULL, '1234', '0000-00-00', NULL, 5, 0, NULL, NULL),
(45, '2', 'Elif', 'Acar', 'elif@mail.com', '234567895678', NULL, NULL, NULL, '1234', NULL, NULL, 5, 1, NULL, NULL),
(46, '1', 'Hatice Nur', 'Aydın', 'hatice.aydin@bil.omu.edu.tr', '08060334', 2008, 2013, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(47, '1', 'Derya', 'Uzun', 'derya.uzun@bil.omu.edu.tr', '08060333', 2009, 2014, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(49, '1', 'Sema', 'Altunal', 'sema@gmail.com', '08060321', 2009, 2014, NULL, '12345', '0000-00-00', NULL, 1, 0, NULL, NULL),
(50, '1', 'Merve', 'Ceylan', 'merve@gmail.com', '08060312', 2009, 2014, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(51, '2', 'Gökhan', 'Kayhan', 'gokhan_kayhan@omu.edu.tr', '672888462', NULL, NULL, NULL, '12345', NULL, NULL, 1, 1, NULL, NULL),
(52, '1', 'Meryem', 'Yılmaz', 'meryem@gmail.com', '08060340', 2007, 2012, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(54, '1', 'ali', 'veli', 'ali@gmail.com', '123456', 2006, 2006, NULL, '12345', '0000-00-00', NULL, 1, 1, NULL, NULL),
(55, '1', 'derya', 'uzun', 'derya@mail.com', '123', 2006, 2006, NULL, '123', '0000-00-00', NULL, 7, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id_user` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_type`
--

INSERT INTO `user_type` (`id_user`, `name`) VALUES
(1, 'öğrenci'),
(2, 'öğretim görevlisi');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_department_faculty1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

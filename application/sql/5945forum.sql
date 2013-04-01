-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2013 年 04 月 01 日 06:16
-- 伺服器版本: 6.0.4-alpha-community-log
-- PHP 版本: 6.0.0-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `5945forum`
--

-- --------------------------------------------------------

--
-- 表的結構 `5945post`
--

CREATE TABLE IF NOT EXISTS `5945post` (
  `PostID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Content` text,
  `Category` bigint(20) DEFAULT NULL,
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifyDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PostID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 轉存資料表中的資料 `5945post`
--

INSERT INTO `5945post` (`PostID`, `UserName`, `UserEmail`, `Content`, `Category`, `CreateDate`, `ModifyDate`) VALUES
(1, '312', '', 'OKOK888888', 2, '2013-03-29 06:29:03', NULL),
(10, 'haha11', 'ha@gmail.com', 'OKOK', 1, '2013-03-29 06:40:45', '2013-03-28 22:40:45'),
(13, 'OK', '', 'sdfasfsf', 1, '2013-03-29 06:50:39', '2013-03-28 22:50:39'),
(25, 'hello', '', 'test', 1, '2013-04-01 06:15:55', '2013-03-31 22:15:55'),
(23, '123', '', '456', 1, '2013-04-01 05:50:36', '2013-03-31 21:50:36'),
(24, '1567', '', '890', 2, '2013-04-01 05:50:47', '2013-03-31 22:15:47');

-- --------------------------------------------------------

--
-- 表的結構 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifyDate` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `CreateDate`, `ModifyDate`) VALUES
(1, '公佈欄', '2013-03-29 06:03:16', '0000-00-00 00:00:00'),
(2, '一般留言', '2013-03-29 06:03:16', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

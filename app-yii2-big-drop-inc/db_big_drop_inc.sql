-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 17 2018 г., 20:51
-- Версия сервера: 5.5.59-0ubuntu0.14.04.1
-- Версия PHP: 7.0.27-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_big_drop_inc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '4', 1521573323),
('adminAccess', '4', 1523377657),
('client', '10', 1523901928),
('client', '11', 1523906581),
('client', '12', 1523907256),
('client', '13', 1523907334),
('client', '14', 1523907374),
('client', '3', 1521576210),
('client', '6', 1521576638),
('client', '8', 1523829071),
('vendor', '15', 1523907424),
('vendor', '2', 1523148202),
('vendor', '7', 1523377403);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1521415179, 1521415179),
('/client/*', 2, NULL, NULL, NULL, 1521864807, 1521864807),
('/client/add-information', 2, NULL, NULL, NULL, 1523910466, 1523910466),
('/client/buy-vendor', 2, NULL, NULL, NULL, 1523910463, 1523910463),
('/client/index', 2, NULL, NULL, NULL, 1523910482, 1523910482),
('/client/list-services', 2, NULL, NULL, NULL, 1523910474, 1523910474),
('/client/list-vendor', 2, NULL, NULL, NULL, 1523910465, 1523910465),
('/client/order-service', 2, NULL, NULL, NULL, 1523910472, 1523910472),
('/client/show-success-order', 2, NULL, NULL, NULL, 1523910468, 1523910468),
('/client/show-success-order-vendor-time', 2, NULL, NULL, NULL, 1523910462, 1523910462),
('/client/update-profile', 2, NULL, NULL, NULL, 1523910459, 1523910459),
('/client/view-profile', 2, NULL, NULL, NULL, 1523910460, 1523910460),
('/event/*', 2, NULL, NULL, NULL, 1523910457, 1523910457),
('/event/create', 2, NULL, NULL, NULL, 1523910452, 1523910452),
('/event/delete', 2, NULL, NULL, NULL, 1523910455, 1523910455),
('/event/index', 2, NULL, NULL, NULL, 1523910449, 1523910449),
('/event/update', 2, NULL, NULL, NULL, 1523910454, 1523910454),
('/event/view', 2, NULL, NULL, NULL, 1523910451, 1523910451),
('/rbac/*', 2, NULL, NULL, NULL, 1521415192, 1521415192),
('/service/*', 2, NULL, NULL, NULL, 1521415433, 1521415433),
('/service/create', 2, NULL, NULL, NULL, 1523910188, 1523910188),
('/service/delete', 2, NULL, NULL, NULL, 1523910203, 1523910203),
('/service/index', 2, NULL, NULL, NULL, 1523910008, 1523910008),
('/service/list-verified', 2, NULL, NULL, NULL, 1523915707, 1523915707),
('/service/update', 2, NULL, NULL, NULL, 1523910216, 1523910216),
('/service/view', 2, NULL, NULL, NULL, 1523910177, 1523910177),
('/site/*', 2, NULL, NULL, NULL, 1521868583, 1521868583),
('/vendor-metadata', 2, NULL, NULL, NULL, 1523241230, 1523241230),
('/vendor-metadata/*', 2, NULL, NULL, NULL, 1523911966, 1523911966),
('/vendor-metadata/update', 2, NULL, NULL, NULL, 1523911033, 1523911033),
('/vendor-metadata/view', 2, NULL, NULL, NULL, 1523911037, 1523911037),
('/vendor/*', 2, NULL, NULL, NULL, 1521864864, 1521864864),
('/vendor/activate-service/*', 2, NULL, NULL, NULL, 1523912662, 1523912662),
('/vendor/active-vendor-time', 2, NULL, NULL, NULL, 1523911334, 1523911334),
('/vendor/deactivate-service/*', 2, NULL, NULL, NULL, 1523912667, 1523912667),
('/vendor/deactive-vendor-time', 2, NULL, NULL, NULL, 1523911352, 1523911352),
('/vendor/edit-vedor-profile', 2, NULL, NULL, NULL, 1523911273, 1523911273),
('/vendor/edit-vendor-profile', 2, NULL, NULL, NULL, 1523910045, 1523910045),
('/vendor/index', 2, NULL, NULL, NULL, 1523911159, 1523911159),
('/vendor/list-clients-for-buy-time', 2, NULL, NULL, NULL, 1523910051, 1523910051),
('/vendor/list-vendor', 2, NULL, NULL, NULL, 1523911281, 1523911281),
('/vendor/list-verified', 2, NULL, NULL, NULL, 1523910027, 1523910027),
('/vendor/service', 2, NULL, NULL, NULL, 1523911193, 1523911193),
('/vendor/show-success-order', 2, NULL, NULL, NULL, 1523910037, 1523910037),
('/vendor/update-level', 2, NULL, NULL, NULL, 1523911299, 1523911299),
('admin', 1, 'admin', NULL, NULL, 1521499548, 1521572902),
('adminAccess', 2, 'Доступ к админу', NULL, NULL, 1521415575, 1521415697),
('client', 1, 'client', NULL, NULL, 1521499624, 1521576702),
('clientAccess', 2, 'clientAccess', NULL, NULL, 1521888300, 1521888300),
('vendor', 1, 'vendor', NULL, NULL, 1521499635, 1523910400),
('vendorAccess', 2, 'vendorAccess', NULL, NULL, 1521881892, 1523911429);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('adminAccess', '/admin/*'),
('clientAccess', '/client/*'),
('adminAccess', '/event/*'),
('clientAccess', '/event/create'),
('clientAccess', '/event/index'),
('clientAccess', '/event/update'),
('clientAccess', '/event/view'),
('adminAccess', '/rbac/*'),
('adminAccess', '/service/*'),
('clientAccess', '/service/*'),
('vendorAccess', '/service/create'),
('vendorAccess', '/service/delete'),
('vendorAccess', '/service/index'),
('vendorAccess', '/service/update'),
('vendorAccess', '/service/view'),
('adminAccess', '/site/*'),
('clientAccess', '/site/*'),
('vendorAccess', '/site/*'),
('vendorAccess', '/vendor-metadata/update'),
('vendorAccess', '/vendor-metadata/view'),
('vendorAccess', '/vendor/*'),
('admin', 'adminAccess'),
('client', 'clientAccess'),
('vendor', 'vendorAccess');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `client_metadata`
--

CREATE TABLE IF NOT EXISTS `client_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `client_metadata`
--

INSERT INTO `client_metadata` (`id`, `client_id`, `city`, `state`) VALUES
(1, 3, 'Kiev2', 'Ukraine2'),
(2, 8, 'xxx2', 'yyy2'),
(3, 10, '', ''),
(4, 11, '', ''),
(5, 12, '', ''),
(6, 13, '', ''),
(7, 14, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `event_service`
--

CREATE TABLE IF NOT EXISTS `event_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `service_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendor_confirm` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `event_service`
--

INSERT INTO `event_service` (`id`, `client_id`, `service_id`, `title`, `discription`, `created_date`, `vendor_confirm`) VALUES
(7, 3, 7, 'xdxd123', '123', '2018-03-15 22:00:00', 0),
(8, 3, 7, 'test', 'test', '2018-03-23 22:00:00', 0),
(9, 3, 1, 'xdxd', 'xdxd', '2018-02-28 22:00:00', 0),
(10, 3, 6, 'misha', 'misha', '2018-03-29 22:00:00', 0),
(11, 3, 7, '1 april', '1 april', '2018-03-31 22:00:00', 0),
(12, 3, 8, '2 april', '2 april', '2018-04-01 22:00:00', 1),
(13, 3, 1, 'xd', 'xd', '2018-04-11 22:00:00', 0),
(14, 3, 6, '333', '333', '2018-04-03 22:00:00', 0),
(15, 3, 9, 'test2', 'test2', '2018-04-05 22:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `event_vendor`
--

CREATE TABLE IF NOT EXISTS `event_vendor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) NOT NULL,
  `vendor_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `price` int(255) NOT NULL,
  `vendor_confirm` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `event_vendor`
--

INSERT INTO `event_vendor` (`id`, `client_id`, `vendor_id`, `date`, `price`, `vendor_confirm`) VALUES
(3, 3, 7, '2028-04-20', 0, 1),
(6, 3, 2, '2028-03-20', 2997, 1),
(8, 3, 2, '2013-04-20', 2997, 0),
(9, 3, 2, '2028-03-20', 2997, 0),
(10, 3, 2, '2012-04-20', 2997, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1521156049),
('m140506_102106_rbac_init', 1521399365),
('m140602_111327_create_menu_table', 1521399342),
('m160312_050000_create_user', 1521399342),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1521399365),
('m180315_231726_create_post', 1521156084),
('m180318_111216_create_service', 1521372191);

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `user_id`, `title`, `description`, `price`, `verify`) VALUES
(1, 1, 'Title', 'Description', 10, 1),
(6, 2, 'xdxd2', 'xdxd2', 5, 1),
(7, 6, 'same shit', 'same shit', 50, 1),
(8, 2, 'Service of 2 userID', 'Service of 2 userID', 99, 1),
(9, 2, 'I hope that it is the final', 'I hope that it is the final. Description', 250, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'User', 'User', 'User', '390mnvRnjZW55VfDjAERjJ2mV-_rsYBN', '$2y$13$1otZBQS7HbS0O4U/QANOZu9ftOYdQmLXpGZWNMdG2SPJLVjpHrxhW', NULL, 'user@gmail.com', 10, 1521402178, 1521402178),
(2, 'Vendor', 'Vendor', 'Vendor', 'DsZUBIL7eA6QLjJHwr3VKWhgFjruqIaP', '$2y$13$UW34BS/nzmqFdqs1sL.hPOOMNTVF7SDcWwpyxrKy6LorTWuAYVrlO', NULL, 'vendor@gmail.com', 10, 1521402280, 1521402280),
(3, 'Client', 'Client', 'Client', 'U6HI6DcFMV3dSVWKSNXvTuqwrXLjGixd', '$2y$13$NaEpQWDv/XGMOvunN36xeeD66OdOz0zcqfWbIg93FWQNa5Bdn6A3i', NULL, 'client@gmail.com', 10, 1521402320, 1521402320),
(4, 'Admin', 'Admin', 'Admin', 'k2FUsPmDLBwNkWOA02MCHwQAl56wEa8t', '$2y$13$eFs1aIc9E0RFpqcQtFAmPe237UTjlo7bTrEjtF66NfTCMTqLXAwLi', NULL, 'admin@gmail.com', 10, 1521402338, 1521402338),
(6, 'Vendor2', 'Vendor2', 'Vendor2', 'kJxu7O05cJO9jKhwItifr0dxG6pPCSkM', '$2y$13$3h.NhI10Fch0PFEHee0i9.auUcrELI8q/74DwedY1CP6AWwvwOfXu', NULL, 'myTestClint@gmail.com', 10, 1521495649, 1521495649),
(7, 'hoho-vendor', 'hoho-vendor', 'hoho-vendor', 'V-31BaVR4kdIk_ADGh2ApSowbVbFsMqN', '$2y$13$N7dQinZOh2rGcrYDSQTeY.0BiNRBxKekxdpqpPOFWeBeFzoQBT7.a', NULL, 'hoho-vendor@gmail.com', 10, 1523377403, 1523377403),
(8, 'final_client', 'final_client', 'final_client', 'fYBj4WOhfyOEMypvVqQdQmq0icKit-8B', '$2y$13$nfbaYvw0NnDfTLEGc5PVHOtb.hPfU/osvhxQRY6aNooQIKRW9tyZy', NULL, 'final_client@gmail.com', 10, 1523829071, 1523829071),
(10, 'sign_up_user', 'sign_up_user', 'sign_up_user', 'TO7JuUt1XjSYyw578rlDhUoKJEdxd1Bs', '$2y$13$fkw/uWJhudZbHkYf7Er9SO1dGXBoEaijK.aOAS8bjcB7T.5si51DK', NULL, 'sign_up_user@gmail.com', 10, 1523901928, 1523901928),
(11, 'delete_client', 'delete_client', 'delete_client', '7DkmjVhOq5wQHANdfj7m9aLeVRLJxZjd', '$2y$13$zGcQQuWX6CghxAly1KmdReVnq/4ejpc7mkB0hqdU1wVzeeBvKMihW', NULL, 'delete_client@gmail.com', 10, 1523906581, 1523906581),
(12, 'delete_client2', 'delete_client2', 'delete_client2', 'vE61hCPf1dB1yyfr7eCoplV_gLR_guRp', '$2y$13$EWh8U8fRgH0ZtyVseSOUD.Uhe7hPSYicPayTyNDPU5/rhdVyJhgeG', NULL, 'delete_client2@gmail.com', 10, 1523907256, 1523907256),
(13, 'delete_client3', 'delete_client3', 'delete_client3', 'T3zRwfrN0e0VfP380Pwyh2RGGqyMkUw4', '$2y$13$0RRQIyOUAfQx3yFTeQHcieaaA9myg0Cldzn2SztZcczhUU1rMGxca', NULL, 'delete_client3@gmail.com', 10, 1523907334, 1523907334),
(14, 'delete_client4', 'delete_client3', 'delete_client3', 'kA3GWeWDd7vHir7y2OJatezwzvraFc2m', '$2y$13$B1VW9R/B4BO725i1mb4hDOXB/iU.OmVYfPEqlFByGY07U13J4U45W', NULL, 'delete_client4@gmail.com', 10, 1523907374, 1523907374),
(15, 'delete_vendor', 'delete_vendor', 'delete_vendor', 'JCFgstAMzyfCmvTM9HFl2-V9BM6ciccd', '$2y$13$JtGI0I04jhSvAqRWQbx66eaa5lhlpfrSw3QCI3UHh.3jYBfWAwl.a', NULL, 'delete_vendor@gmail.com', 10, 1523907423, 1523907423);

-- --------------------------------------------------------

--
-- Структура таблицы `vendor_metadata`
--

CREATE TABLE IF NOT EXISTS `vendor_metadata` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(255) NOT NULL,
  `sphere` varchar(64) NOT NULL,
  `level` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `vendor_metadata`
--

INSERT INTO `vendor_metadata` (`id`, `vendor_id`, `sphere`, `level`) VALUES
(1, 2, 's3', 3),
(2, 7, '', 1),
(4, 15, 'AHAAHAHA', 4);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

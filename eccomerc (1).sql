-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 11 2024 г., 20:39
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eccomerc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@mail.com', '4039788e7397bf5fc863ea88d41ba4ca');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 2999.00, 'shipped', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-07 17:44:01'),
(2, 2999.00, 'paid', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-07 17:45:15'),
(3, 2999.00, 'on_hold', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-07 17:46:12'),
(4, 2999.00, 'on_hold', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-07 17:47:09'),
(5, 2999.00, 'on_hold', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-07 17:47:18'),
(6, 2999.00, 'on_hold', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-07 17:47:20'),
(15, 8997.00, 'on_hold', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-09 19:44:57'),
(16, 8997.00, 'hold', 1, 7777777, 'Moscow', 'Lenina 55', '2024-05-09 19:52:50'),
(18, 2999.00, '?? ???????', 1, 7777777, 'Moscow', 'Lenina 55', '2024-06-02 11:51:45'),
(19, 2999.00, '?? ???????', 1, 7777777, 'Moscow', 'Lenina 55', '2024-06-04 12:50:25'),
(20, 2999.00, '?? ???????', 1, 7777777, 'Moscow', 'Lenina 55', '2024-06-04 12:51:14'),
(21, 2999.00, '?? ???????', 1, 7777777, 'Moscow', 'Lenina 55', '2024-06-04 12:51:54'),
(22, 3300.00, '?? ???????', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 12:55:46'),
(23, 6299.00, '?? ???????', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 13:02:10'),
(24, 2999.00, '?? ???????', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 13:24:40'),
(25, 3300.00, 'on_hold', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 15:12:12'),
(26, 9999.99, 'not paid', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 15:14:31'),
(27, 2999.00, 'not paid', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 15:37:22'),
(28, 9999.00, '?? ???????', 1, 7777777, 'Moscow', 'Lenina 55', '2024-06-04 15:43:08'),
(29, 5998.00, '?? ???????', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-04 18:27:36'),
(30, 2999.00, '?? ???????', 1, 7777777, 'Moscow', 'Lenina 55', '2024-06-04 20:03:34'),
(31, 2999.00, 'Not paid', 1, 7, 'Moscow', 'Lenina 55', '2024-06-07 09:30:34'),
(32, 2999.00, 'Not paid', 1, 12132313, 'Moscow', 'Lenina 55', '2024-06-07 14:08:36'),
(33, 9999.99, 'Not paid', 1, 7, 'Moscow', 'Lenina 55', '2024-06-07 14:15:48'),
(34, 2999.00, 'Not paid', 1, 7, 'Moscow', 'Lenina 55', '2024-06-07 14:21:34'),
(35, 2999.00, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-07 14:33:39'),
(36, 5998.00, 'shipped', 3, 12132313, 'Moscow', 'Lenina 55', '2024-06-08 09:51:12'),
(37, 5998.00, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-08 20:37:53'),
(38, 5998.00, 'Paid', 3, 12132313, 'Moscow', 'Lenina 55', '2024-06-08 21:42:51'),
(39, 5998.00, 'Paid', 3, 7, 'Moscow', 'Lenina 55', '2024-06-09 08:55:48'),
(40, 2999.00, 'Paid', 3, 7, 'Moscow', 'Lenina 55', '2024-06-09 09:00:54'),
(41, 2999.00, 'Paid', 3, 7, 'Moscow', 'Lenina 55', '2024-06-09 09:02:04'),
(42, 2999.00, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-09 09:02:47'),
(43, 9999.00, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-09 09:07:35'),
(44, 3300.00, 'Paid', 3, 12132313, 'Moscow', 'Lenina 55', '2024-06-09 09:14:06'),
(45, 9999.00, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-09 13:32:48'),
(46, 3300.00, 'Paid', 3, 7, 'Moscow', 'Lenina 55', '2024-06-09 13:36:47'),
(47, 2999.00, 'Paid', 3, 12132313, 'Moscow', 'Lenina 55', '2024-06-09 15:20:32'),
(48, 8997.00, 'Paid', 3, 12132313, 'Moscow', 'Lenina 55', '2024-06-09 16:42:00'),
(49, 9999.99, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-09 16:43:45'),
(50, 5400.00, 'Paid', 3, 12132313, 'Moscow', 'Lenina 55', '2024-06-09 16:44:50'),
(51, 9999.99, 'Paid', 3, 7, 'Moscow', 'Lenina 55', '2024-06-09 16:46:22'),
(52, 2999.00, 'Paid', 3, 2147483647, '????-???', '???????? 32 ?', '2024-06-11 17:17:18');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 8, '1', '??????', 'cloth.jpg', 2999.00, 1, 1, '2024-05-07 18:38:28'),
(2, 8, '4', '??????-?????', '1.jpg', 12800.00, 1, 1, '2024-05-07 18:38:28'),
(3, 9, '1', 'Платье', 'cloth.jpg', 2999.00, 2, 1, '2024-05-07 18:39:47'),
(4, 9, '4', 'Куртка-дэгэл', '1.jpg', 12800.00, 1, 1, '2024-05-07 18:39:47'),
(5, 10, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-05-09 03:07:20'),
(6, 11, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-05-09 03:22:12'),
(7, 12, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-05-09 03:24:56'),
(8, 13, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-05-09 03:39:46'),
(9, 14, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-05-09 03:39:56'),
(10, 15, '1', 'Платье', 'cloth.jpg', 2999.00, 3, 1, '2024-05-09 19:44:57'),
(11, 16, '1', 'Платье', 'cloth.jpg', 2999.00, 3, 1, '2024-05-09 19:52:50'),
(12, 17, '1', 'Платье', 'cloth.jpg', 2999.00, 3, 1, '2024-05-09 19:53:30'),
(13, 18, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-06-02 11:51:45'),
(14, 23, '5', 'Платье', 'dr2.jpg', 3300.00, 1, 1, '2024-06-04 13:02:10'),
(15, 23, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-06-04 13:02:10'),
(16, 24, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-06-04 13:24:40'),
(17, 25, '5', 'Платье', 'dr2.jpg', 3300.00, 1, 1, '2024-06-04 15:12:12'),
(18, 26, '3', 'Куртка-дэгэл', '1.jpg', 9999.00, 2, 1, '2024-06-04 15:14:31'),
(19, 27, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-06-04 15:37:22'),
(20, 28, '3', 'Куртка-дэгэл', '1.jpg', 9999.00, 1, 1, '2024-06-04 15:43:08'),
(21, 29, '1', 'Платье', 'cloth.jpg', 2999.00, 2, 1, '2024-06-04 18:27:36'),
(22, 30, '1', 'Платье', 'cloth.jpg', 2999.00, 1, 1, '2024-06-04 20:03:34'),
(23, 31, '1', 'Платье красивое', 'clo.jpg', 2999.00, 1, 1, '2024-06-07 09:30:34'),
(24, 32, '1', 'Платье красивое', 'clo.jpg', 2999.00, 1, 1, '2024-06-07 14:08:36'),
(25, 33, '1', 'Платье красивое', 'clo.jpg', 2999.00, 4, 1, '2024-06-07 14:15:48'),
(26, 34, '1', 'Платье красивое', 'clo.jpg', 2999.00, 1, 1, '2024-06-07 14:21:34'),
(27, 35, '2', 'Платье серое', 'cloth.jpg', 2999.00, 1, 3, '2024-06-07 14:33:39'),
(28, 36, '2', 'Платье серое', 'cloth.jpg', 2999.00, 1, 3, '2024-06-08 09:51:12'),
(29, 36, '1', 'Платье красивое', 'clo.jpg', 2999.00, 1, 3, '2024-06-08 09:51:12'),
(30, 37, '2', 'Платье серое', 'cloth.jpg', 2999.00, 1, 3, '2024-06-08 20:37:53'),
(31, 37, '1', 'Платье красивое', 'clo.jpg', 2999.00, 1, 3, '2024-06-08 20:37:53'),
(32, 38, '2', 'Платье серое', 'cloth.jpg', 2999.00, 1, 3, '2024-06-08 21:42:51'),
(33, 38, '1', 'Платье красивое', 'clo.jpg', 2999.00, 1, 3, '2024-06-08 21:42:51'),
(34, 39, '2', 'Платье серое', 'cloth.jpg', 2999.00, 1, 3, '2024-06-09 08:55:48'),
(35, 39, '1', 'Платье красивое', 'dr3.jpg', 2999.00, 1, 3, '2024-06-09 08:55:48'),
(36, 40, '1', 'Платье красивое', 'dr3.jpg', 2999.00, 1, 3, '2024-06-09 09:00:54'),
(37, 41, '1', 'Платье красивое', 'dr3.jpg', 2999.00, 1, 3, '2024-06-09 09:02:04'),
(38, 42, '1', 'Платье красивое', 'dr3.jpg', 2999.00, 1, 3, '2024-06-09 09:02:47'),
(39, 43, '3', 'Куртка-дэгэл', '1.jpg', 9999.00, 1, 3, '2024-06-09 09:07:35'),
(40, 44, '5', 'Платье', 'dr2.jpg', 3300.00, 1, 3, '2024-06-09 09:14:06'),
(41, 45, '3', 'Куртка-дэгэл', '1.jpg', 9999.00, 1, 3, '2024-06-09 13:32:48'),
(42, 46, '9', 'Платье из овечьей шерсти', 'dr4.jpg', 3300.00, 1, 3, '2024-06-09 13:36:47'),
(43, 47, '1', 'Платье красивое', 'dr3.jpg', 2999.00, 1, 3, '2024-06-09 15:20:32'),
(44, 48, '2', 'Платье серое', 'cloth.jpg', 2999.00, 3, 3, '2024-06-09 16:42:00'),
(45, 49, '15', 'Спортивный костюм', 'customs31.jpg', 3600.00, 3, 3, '2024-06-09 16:43:45'),
(46, 50, '8', 'Платье-лапша', '2.jpg', 1800.00, 3, 3, '2024-06-09 16:44:50'),
(47, 51, '18', 'Пуховик-дэгэл', 'jack4.jpg', 14900.00, 3, 3, '2024-06-09 16:46:22'),
(48, 52, '2', 'Платье серое', 'cloth.jpg', 2999.00, 1, 3, '2024-06-11 17:17:18');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_special_offer` int(2) DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Платье красивое', 'dress', 'Материал: смесовый сатин, скользящий лёгкий материал.Состав ткани: хб,пэ,вискоза.С поясом', 'dr3.jpg', '.jpg', '.jpg', 'cloth.jpg', 2999.00, 0, 'темно-серый'),
(2, 'Платье серое', 'dress', 'Материал: смесовый сатин, скользящий лёгкий материал.Состав ткани: хб,пэ,вискоза.С поясом', 'cloth.jpg', 'cloth.jpg', 'cloth.jpg', 'cloth.jpg', 2999.00, 0, 'темно-серый'),
(3, 'Куртка-дэгэл', 'jacket', 'Три цвета: черный, горчица, зеленый\r\nРазмеры: M, L, XL', '1.jpg', '1.jpg', '1.jpg', '1.jpg', 9999.99, 0, 'Черный'),
(5, 'Платье', 'dress', 'Материал: сатин смесовый средней плотности,\r\nС поясом', 'dr2.jpg', 'dr2.jpg', 'dr2.jpg', 'dr2.jpg', 3300.00, 0, 'серый'),
(6, 'Костюм женский', 'custom', 'Материал: смесовый сатин, скользящий лёгкий материал.Состав ткани: хб,пэ,вискоза.С поясом', 'customs.jpg', 'customs.jpg', 'customs.jpg', 'customs.jpg', 2015.00, 0, 'бирюзовый'),
(8, 'Платье-лапша', 'jacket', 'этот материал имеет простой и естественный, но вместе с тем эффектный внешний вид; благодаря своей мягкости и эластичности он очень комфортен; лапша хорошо держит форму; материал не выцветает из-за действия воды и моющих средств; одежда из лапши стройнит ', '2.jpg', '2.jpg', '2.jpg', NULL, 1800.00, 0, 'Песочный'),
(9, 'Платье из овечьей шерсти', 'dress', 'Рекомендации по уходу: Ручная стирка не более 30С Стирать в мыльной стружке или спец.средствах для стирки шерст.вещей. Не мыльте само изделие Избегайте отжима, растягивания, выкручивания Сушите горизонтально на хорошо впитывающей ткани', 'dr4.jpg', 'dr4.jpg', 'dr4.jpg', NULL, 3300.00, 0, 'Коричневый'),
(10, 'Платье с лампасами', 'dress', 'Материал средней плотности, состав ткани: хб/пэ. Тянется Цвета: чёрный, зелёный с лампасами Без пояса, фасон свободный', 'dr5.jpg', 'dr51.jpg', 'dr52.jpg', NULL, 2400.00, 0, 'Хаки'),
(11, 'Платье с V воротом', 'dress', 'Цвет: бордовый Материал не тянется', 'dr6.jpg', 'dr61.jpg', '', NULL, 2990.00, 0, 'Бордовый'),
(13, 'Платье хаки', 'dress', 'Платье на каждый день ина праздник!', 'dr8.jpg', 'dr81.jpg', 'Платье хаки3.jpg', NULL, 2700.00, 0, 'Хаки'),
(14, 'Толстовка женская с капюшоном', 'custom', 'Цвет: розовый Материал: хб80/пэ20', 'customs2.jpg', 'Толстовка женская с капюшоном2.jpg', 'Толстовка женская с капюшоном3.jpg', NULL, 2200.00, 0, 'Розовый'),
(15, 'Спортивный костюм', 'custom', 'Стирка ручная температура воды 30С Глажка и стирка с изнаночной стороны Вышивки прогладить после сушки', 'customs31.jpg', 'Спортивный костюм2.jpg', 'Спортивный костюм3.jpg', NULL, 3600.00, 0, 'Cиний'),
(16, 'Ремень кожаный КАЖУГ', 'remen', ' Значение орнаментов: ⠀ВАДЖРА- символ силы и твердости духа, мужское начало, вечность и нерушимость. ⠀СОЕМБО- национальный знак. Увенчан знаком огня-рассвет и возрождение, продолжение рода. Три язычка пламени - процветание народа в трёх временах - прошлом', 'remn.jpg', 'Ремень кожаный КАЖУГ2.jpg', 'Ремень кожаный КАЖУГ3.jpg', NULL, 1400.00, 0, 'Черный'),
(17, 'Спортивный костюм из  футера', 'custom', 'Спортивный костюм из футера: удобный и мягкий, идеально подходит для тренировок и повседневного ношения. Обеспечивает комфорт и свободу движений благодаря высококачественному материалу.', 'custom4.jpg', 'Спортивный костюм из  футера2.jpg', 'Спортивный костюм из  футера3.jpg', NULL, 4900.00, 0, 'Белый'),
(18, 'Пуховик-дэгэл', 'jacket', 'Пуховик дэгэл: стильный и теплый, создан для холодной погоды. Легкий и удобный, обеспечивает отличную теплоизоляцию благодаря натуральному пуху. Идеален для зимних прогулок и активного отдыха.', 'jack4.jpg', 'Пуховик-дэгэл2.jpg', 'Пуховик-дэгэл3.jpg', NULL, 14900.00, 0, 'Серый'),
(19, 'Пуховик', 'jacket', 'Пуховик дэгэл: стильный и теплый, создан для холодной погоды. Легкий и удобный, обеспечивает отличную теплоизоляцию благодаря натуральному пуху. Идеален для зимних прогулок и активного отдыха.', 'jack3.jpg', 'Пуховик2.jpg', 'Пуховик3.jpg', NULL, 13900.00, 0, 'Серый'),
(21, 'Кошельки мужские', 'wallet', 'Стильные мужские кошельки ', 'kosh1.jpg', 'Кошельки мужские2.jpg', 'Кошельки мужские3.jpg', NULL, 1000.00, 0, 'Коричневый'),
(22, 'Кошельки женские', 'wallet', 'Стильные женские кошельки', 'kosh2.jpg', 'Кошельки женские2.jpg', 'Кошельки женские3.jpg', NULL, 1000.00, 0, 'Коричневый');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Neo Matrix', 'boss.nanzad@gmail.com', '209958b1044dd5c76df11f55329b4849'),
(2, 'Rustam Bayer', 'boss@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Pavel', 'bos@gmail.com', 'dc8996dd918da29b90603d2d443bce5e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

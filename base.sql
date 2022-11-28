-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 28 2022 г., 03:05
-- Версия сервера: 5.6.51-log
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `infosec_info`
--

-- --------------------------------------------------------

--
-- Структура таблицы `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL,
  `sotrudnik_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `otdel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `journal`
--

INSERT INTO `journal` (`id`, `about`, `sotrudnik_id`, `date`, `otdel_id`) VALUES
(2, 'Эксплуатация уязвимости на порту 3389 TCP (протокол RDP)', 5, '2022-10-15', 4),
(4, 'Эксплуатация уязвимости log4j', 3, '2022-10-03', 1),
(7, 'Атака \"человек по середине\"', 8, '2022-11-07', 4),
(8, 'Открытие фишингового письма', 4, '2022-11-11', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `info` text NOT NULL,
  `datetime` timestamp NOT NULL,
  `user` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `info`, `datetime`, `user`, `ip`) VALUES
(2, 'login', '2022-11-19 20:00:51', 4, '127.0.0.1'),
(3, 'logout', '2022-11-19 20:03:05', 4, '127.0.0.1'),
(4, 'login', '2022-11-19 20:16:48', 3, '127.0.0.1'),
(5, 'logout', '2022-11-19 20:16:55', 3, '127.0.0.1'),
(6, 'login', '2022-11-19 20:17:02', 4, '127.0.0.1'),
(7, 'login', '2022-11-21 16:05:32', 3, '127.0.0.1'),
(8, 'logout', '2022-11-25 21:38:40', 3, '127.0.0.1'),
(9, 'login', '2022-11-25 21:55:50', 3, '127.0.0.1'),
(10, 'logout', '2022-11-25 21:56:02', 3, '127.0.0.1'),
(11, 'login', '2022-11-25 21:59:33', 3, '127.0.0.1'),
(12, 'logout', '2022-11-25 21:59:38', 3, '127.0.0.1'),
(13, 'login', '2022-11-26 15:10:13', 3, '127.0.0.1'),
(14, 'logout', '2022-11-26 15:10:19', 3, '127.0.0.1'),
(15, 'login', '2022-11-26 15:38:44', 3, '127.0.0.1'),
(16, 'logout', '2022-11-27 15:36:17', 3, '127.0.0.1'),
(17, 'login', '2022-11-27 15:37:07', 4, '127.0.0.1'),
(18, 'logout', '2022-11-27 15:55:26', 4, '127.0.0.1'),
(19, 'login', '2022-11-27 15:55:33', 3, '127.0.0.1'),
(20, 'logout', '2022-11-27 15:57:13', 3, '127.0.0.1'),
(21, 'login', '2022-11-27 16:10:21', 3, '127.0.0.1'),
(22, 'logout', '2022-11-27 16:11:11', 3, '127.0.0.1'),
(23, 'login', '2022-11-27 16:15:04', 3, '127.0.0.1'),
(24, 'logout', '2022-11-27 22:21:10', 3, '127.0.0.1'),
(25, 'login', '2022-11-27 22:21:44', 4, '127.0.0.1'),
(26, 'logout', '2022-11-27 22:21:48', 4, '127.0.0.1'),
(27, 'login', '2022-11-27 22:22:21', 3, '127.0.0.1'),
(28, 'logout', '2022-11-27 22:23:07', 3, '127.0.0.1'),
(29, 'login', '2022-11-27 22:24:40', 7, '127.0.0.1'),
(30, 'logout', '2022-11-27 22:24:43', 7, '127.0.0.1'),
(31, 'login', '2022-11-27 22:24:58', 7, '127.0.0.1'),
(32, 'logout', '2022-11-27 22:25:02', 7, '127.0.0.1'),
(33, 'login', '2022-11-27 22:25:10', 3, '127.0.0.1'),
(34, 'logout', '2022-11-27 22:26:23', 3, '127.0.0.1'),
(35, 'login', '2022-11-27 22:26:32', 8, '127.0.0.1'),
(36, 'logout', '2022-11-27 22:40:33', 8, '127.0.0.1'),
(37, 'login', '2022-11-27 22:41:12', 3, '127.0.0.1'),
(38, 'logout', '2022-11-27 22:41:50', 3, '127.0.0.1'),
(39, 'login', '2022-11-27 22:42:10', 10, '127.0.0.1'),
(40, 'logout', '2022-11-27 22:42:29', 10, '127.0.0.1'),
(41, 'login', '2022-11-27 22:43:03', 3, '127.0.0.1'),
(42, 'logout', '2022-11-27 23:08:45', 3, '127.0.0.1'),
(43, 'login', '2022-11-27 23:08:57', 3, '127.0.0.1'),
(44, 'logout', '2022-11-27 23:21:45', 3, '127.0.0.1'),
(45, 'login', '2022-11-27 23:22:45', 3, '127.0.0.1'),
(46, 'logout', '2022-11-27 23:22:55', 3, '127.0.0.1'),
(47, 'login', '2022-11-27 23:23:23', 3, '127.0.0.1'),
(48, 'logout', '2022-11-27 23:24:07', 3, '127.0.0.1'),
(49, 'login', '2022-11-27 23:25:06', 3, '127.0.0.1'),
(50, 'logout', '2022-11-27 23:25:20', 3, '127.0.0.1'),
(51, 'login', '2022-11-27 23:29:48', 3, '127.0.0.1'),
(52, 'logout', '2022-11-27 23:29:56', 3, '127.0.0.1'),
(53, 'login', '2022-11-27 23:30:42', 3, '127.0.0.1'),
(54, 'logout', '2022-11-27 23:30:44', 3, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` text NOT NULL,
  `name` text NOT NULL,
  `patronim` text NOT NULL,
  `role` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `last_name`, `name`, `patronim`, `role`, `worker_id`, `username`, `password`) VALUES
(3, 'Админов', 'Админ', 'Админович', 0, 0, 'stalin', '$2y$10$D0GUEkRudwHDgMU2TrKgi./6Rz5ZRDmV0U3G.6QJeKbhV3szrBPya'),
(4, 'Городов', 'Авдотий', 'Климентьевич', 1, 0, 'fux93', '$2y$10$I6qCJ93.KsBOf3kGbJJT6O8eWeqx8HrkrKPwrwQAnvs6MOuuqdA6i'),
(5, 'Дзержинский', 'Феликс', 'Эдмундович', 0, 0, 'assfaltov', '$2y$10$qgTlTX0KF3mDx0BbfcAO2ODUf.F0.trvgkA65ZPhGFr5Qvo5/8bf6'),
(8, 'Ульянов', 'Владимир', 'Ильич', 1, 0, 'lenin', '$2y$10$9.aKueW84qQB7iaioyhBQOOibYWu7A/lY7GMpHU8PK2Q5YGZ6B6wC');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `last_name` text NOT NULL,
  `name` text NOT NULL,
  `patronim` text NOT NULL,
  `date_priem` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `role` text NOT NULL,
  `zarplata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `last_name`, `name`, `patronim`, `date_priem`, `department_id`, `role`, `zarplata`) VALUES
(1, 'Каденец', 'Алексей', 'Юрьевич', '2015-05-20', 2, '', 128000),
(2, 'Демиденко', 'Александр', 'Сергеевич', '2020-10-20', 1, '', 95000),
(3, 'Иванов', 'Павел', 'Петрович', '2018-11-20', 3, '', 78000),
(4, 'Суржиков', 'Константин', 'Евгеньевич', '2001-05-20', 4, '', 61000),
(5, 'Нефедов', 'Виктор', 'Геннадьевич', '2018-05-20', 2, '', 11000),
(6, 'Менжинский', 'Вячеслав', 'Рудольфович', '2020-12-20', 1, '', 17000),
(7, 'Ивановский', 'Павел', 'Аркадьевич', '2018-04-20', 3, '', 48000),
(9, 'Евглевский', 'Вячеслав', 'Юрьевич', '2020-06-12', 2, '', 12000000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

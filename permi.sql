-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2017 г., 15:44
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `permi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `userLP`
--

CREATE TABLE `userLP` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userLP`
--

INSERT INTO `userLP` (`id`, `login`, `pwd`) VALUES
(49, 'admin', '$2y$10$c/1s.SBkwAPZpWvjsG0uF.s4N4YQG63nV.nLnG75efZeBJqaeykzu'),
(52, 'depp', '$2y$10$cmO.373GpAPKbGsHHH6F5eO26aHZCKbgrxsJd5CgMPFgZPu2mSxlG'),
(53, 'ring', '$2y$10$S5n5wbDEfqNBd8pT/I.kk.0IYBhPYZTy2XpokuUzRKoBLuk205noK');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'public/images/default.jpg',
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `avatar`, `u_id`) VALUES
(33, 'Alexander', 13, '/public/images/1512902695144media-share-0-02-04-e1dd12ef15b4436bc3754e43e2b18fb6c89f3196aa738f6b55d5df62550b8b30-ab3da6d8-2a26-423f-9dcd-9a59a0749cde.jpg', 49),
(36, 'jonny', 33, '/public/images/1512909390170e7eb2781d1311ac2e3157a38d83e4c28511c5f42.jpg', 52),
(37, 'smegol', NULL, '/public/images/151290948535Lord-Of-Rings-Gollum-Andy-Serkis-Almost-Said.jpg', 53);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `userLP`
--
ALTER TABLE `userLP`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userLP_login_uindex` (`login`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `userLP`
--
ALTER TABLE `userLP`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

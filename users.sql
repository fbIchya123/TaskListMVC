-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 10 2023 г., 16:25
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasklist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `created_at`) VALUES
(36, 'test1', '$2y$10$YWGQ/4oKapDlXsm5qUa80ejUXm1G/J22PswibYppXrTQfAiEMgl7m', '2023-07-03'),
(37, '12', '$2y$10$J.Gl0BhRgWmBf/aoQ46z8uY8xBESUlSyJXLFuWqJi7pcCpZyeKZa2', '2023-07-03'),
(38, 'ggs', '$2y$10$0H3qrnEpNZ6ot0Qt0OeaP.26qIM9JvcVEgxgmxDfbbV81E4p2Kwjq', '2023-07-03'),
(39, '', '$2y$10$7P7i9gHMW/2cQ5fZQHkXh.6vWJIEW3Phq7IooI0kuDk0DbCn60sRW', '2023-07-04'),
(40, '11', '$2y$10$pbZW4OFmtaC/H7tiLUJlAeM05Vl/yLT4PO277y750GuDk1AbiCFbS', '2023-07-04'),
(41, 'test', '$2y$10$DZLR4AT713..LuT.TmfZ5.cQDNaKwhXorjokw/MFyRnwicGPnZttS', '2023-07-04'),
(42, '1', '$2y$10$hMAxvEg1sQCa7u8gvABcFuM.rPAkSjuj5AlnjgOgKc2eOG3L3OtP2', '2023-07-07'),
(43, 'MVCC', '$2y$10$seXuUtp4f3JNJhSTHbGmeO.e1xkhBQzwnf3sqCt2ggbu2HeWzNu2O', '2023-07-10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

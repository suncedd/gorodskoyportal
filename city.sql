-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2022 г., 08:42
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `city`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `name`) VALUES
(1, 'Ремонт дорог'),
(2, 'Уборка мусора'),
(3, 'Уборка граффити'),
(30, 'Кат');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `username`, `login`, `email`, `password`) VALUES
(10, 'Садурдинов Ринат Рамилевич', 'rin', 'rin@yandex.ru', 'Test'),
(12, 'admin', 'admin', 'admin@yandex.ru', 'adminWSR'),
(13, 'Иванов Иван Иванович', 'Ivan', 'ivan@mail.ru', '123123'),
(14, 'fdf', 'asd', 'teskastxt@yandex.ru', 'qwert1');

-- --------------------------------------------------------

--
-- Структура таблицы `zaiv`
--

CREATE TABLE `zaiv` (
  `id_zaiv` int NOT NULL,
  `namezaiv` varchar(30) NOT NULL,
  `infozaiv` text NOT NULL,
  `id_categoria` int NOT NULL,
  `file` varchar(100) NOT NULL,
  `file_ref` varchar(100) NOT NULL,
  `datezaiv` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `zaiv`
--

INSERT INTO `zaiv` (`id_zaiv`, `namezaiv`, `infozaiv`, `id_categoria`, `file`, `file_ref`, `datezaiv`, `status`, `login`) VALUES
(9, 'Гослинг', 'Он правда умер или просто хайпит на своём финале?', 1, 'gosling.jpg', 'Gats.jpg', '2022-05-10 00:00:00', 'Новая', 'rin'),
(10, 'Test', 'Test', 3, 'проблема!.jpg', '0', '2022-05-10 00:00:00', '11111', 'rin'),
(21, 'Test', ',jh,h,jh,jh', 2, 'Gats.jpg', 'unnamed.jpg', 'May 26, 2022, 7:08 pm', 'Новая', 'admin'),
(22, 'Test', 'ббброборбрборбрб', 2, '1570463298_hachiroku-134.jpg', '', 'May 26, 2022, 7:15 pm', 'Новая', 'admin'),
(23, 'Test432423', 'ppppppppppppppp', 3, 'unnamed.jpg', '', 'May 26, 2022, 7:16 pm', 'Новая', 'admin'),
(24, '32', 'hfghhg', 2, 'G0AAAgLQ2uA-1920.jpg', '', 'May 26, 2022, 8:19 pm', 'Новая', 'admin'),
(26, 'Мусор', 'Мусор Мусор', 2, 'problem3.jpeg', '', 'May 27, 2022, 12:01 am', '1', 'Ivan');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `zaiv`
--
ALTER TABLE `zaiv`
  ADD PRIMARY KEY (`id_zaiv`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `zaiv`
--
ALTER TABLE `zaiv`
  MODIFY `id_zaiv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `zaiv`
--
ALTER TABLE `zaiv`
  ADD CONSTRAINT `zaiv_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

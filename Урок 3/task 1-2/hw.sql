DROP DATABASE IF EXISTS hw;    
CREATE DATABASE hw;

USE hw;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `name` text NOT NULL,
  `likes` int(11) NOT NULL
);

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `path`, `size`, `name`, `likes`) VALUES
(1, '/public/img/', '48650', '01.jpg', 0),
(2, '/public/img/', '46695', '02.jpg', 0),
(3, '/public/img/', '615309', '03.jpg', 0),
(4, '/public/img/', '152068', '04.jpg', 0),
(5, '/public/img/', '293100', '05.jpg', 0),
(6, '/public/img/', '76528', '06.jpg', 0),
(7, '/public/img/', '297927', '07.jpg', 0),
(8, '/public/img/', '145464', '08.jpg', 0),
(9, '/public/img/', '411725', '09.jpg', 0),
(10, '/public/img/', '65865', '10.jpg', 0),
(11, '/public/img/', '71741', '11.jpg', 0),
(12, '/public/img/', '131046', '12.jpg', 0);

-- --------------------------------------------------------

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
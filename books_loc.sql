-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 21 2019 г., 09:35
-- Версия сервера: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- Версия PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books.loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`) VALUES
(10, 'Джордж Р. Р. Мартин', 'djordj-r-r-martin'),
(11, 'Джоан Роулинг', 'djoan-rouling'),
(12, 'Джек Торн', 'djek-torn'),
(13, 'Джон Тиффани', 'djon-tiffani'),
(14, 'Рэй Брэдбери', 'rey-bredberi'),
(15, 'Стивен Кинг', 'stiven-king'),
(16, 'Мэтт Зандстра', 'mett-zandstra'),
(17, 'Александр Сергеев', 'aleksandr-sergeev'),
(18, 'Александр Матросов', 'aleksandr-matrosov'),
(19, 'Михаил Чаунин', 'mihail-chaunin');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `pubyear` int(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `slug`, `price`, `pubyear`, `lang`, `description`) VALUES
(7, 'Рыцарь Семи Королевств', 'rycar-semi-korolevstv', 189, 2015, 'RUS', 'Еще сто лет – до смертоносного противостояния Старков, Баратеонов и Ланнистеров. Еще правит Вестеросом династия Таргариенов от крови драконов. Еще свежа память о битве за Железный трон Дейемона и Дейерона Таргариенов, еще стоят у городских стен эшафоты, на которых окончили жизнь проигравшие. А по вестеросским землям странствует молодой рыцарь Дункан со своим оруженосцем – десятилетним Эгом, – он жаждет славы, чести и приключений, и он получит их. И не только на ристалищах чести, но и в череде жестоких заговоров и опасных политических интриг, по-прежнему зреющих за замковыми стенами Семи Королевств…'),
(8, 'Гаррі Поттер колекція (комплект із 7 книг)', 'garr-potter-kolekcya-komplekt-z-7-knig', 925, 2016, 'UKR', 'Історія хлопця-сироти, який дізнається про існування паралельного світу, в якому йому вже давно заброньовано одне з визначальних місць, де на нього чекають відчайдушні і віддані друзі та найлютіші вороги і підступні злодії. З моменту виходу першої книги про Гаррі Поттера немає жодної дитини, яка б не прагнула вчитися в Гріффіндорі та грати за їх команду в квіддіч. Книга, рекламувати яку було б зайвим. Немає жодного сумніву, що цикл пригод хлопчика-чаклуна та його друзів варто вивчати в шкільній програмі із зарубіжної літератури, а серйозні дослідження і дисертації на його грунті існують вже сьогодні. «Гаррі Поттер. Повна колекція (комплект із 7 книг)» — тепер придбати повне зібрання можна одним замовленням. Яскраві обкладинки, якісний друк  і прекрасний переклад від видавництва «А-ба-ба-га-ла-ма-га» — чудовий подарунок шанувальникам творчості Джоан Роулінг та літературного українського перекладу.'),
(9, 'Гаррі Поттер і прокляте дитя', 'garr-potter--proklyate-ditya', 140, 2016, 'RUS', 'История повествует о дальнейшем развитии событий через почти 20 лет после описанных в «Дарах Смерти». Писательница отметила, что она написала не роман, а именно пьесу. Серия книг о Гарри Поттере на этом должна закончиться, однако Джоан Роулинг уже делала подобное заявление после выхода седьмой части. Несмотря на то, что фантастический роман имеет продолжение в непривычном формате, многие поклонники поспешили оформить заказ книги «Гарри Поттер и Проклятое дитя» заранее, чтобы не упустить возможность первыми прочесть ее. Сеть книжных магазинов Barnes and Noble и сайт Amazon Books объявили, что по количеству предзаказов в США книга установила новый рекорд, обогнав предыдущую историю о «Дарах Смерти». Резонанс в массах вызвал выбор Джоан Роулинг актеров, которые исполнили роли в пьесе. Актриса Нуме Думезвени, имеющая темный цвет кожи, сыграла роль Гермионы. Автор отметила, что в романах ни разу не упоминался цвет кожи персонажа, однако для зрителей уже стал привычным образ мисс Грейнджер в исполнении Эммы Уотсон.'),
(10, 'Fahrenheit 451', 'fahrenheit-451', 483, 2013, 'ENG', 'Voyager Classics – timeless masterworks of science fiction and fantasy. A beautiful clothbound edition of the internationally acclaimed Fahrenheit 451 – a masterwork of twentieth-century literature. The terrifyingly prophetic novel of a post-literate future. Guy Montag is a fireman. His job is to burn books, which are forbidden, being the source of all discord and unhappiness. Even so, Montag is unhappy; there is discord in his marriage. Are books hidden in his house? The Mechanical Hound of the Fire Department, armed with a lethal hypodermic, escorted by helicopters, is ready to track down those dissidents who defy society to preserve and read books. The classic dystopian novel of a post-literate future, Fahrenheit 451 stands alongside Orwell’s 1984 and Huxley’s Brave New World as a prophetic account of Western civilization’s enslavement by the media, drugs and conformity. Bradbury’s powerful and poetic prose combines with uncanny insight into the potential of technology to create a novel which, decades on from first publication, still has the power to dazzle and shock.'),
(11, 'Оно', 'ono', 373, 2016, 'RUS', 'Специальное издание к выходу экранизации одного из самых масштабных романов Стивена Кинга. Книга, ставшая образцом остросюжетной литературы, а также визитной карточкой Кинга, наряду с бестселлерами &quot;Сияние&quot;, &quot;Кладбище домашних животных&quot; и многими другими. Читайте книгу - смотрите фильм! Маленький американский городок Дерри. Семеро друзей создают &quot;Клуб неудачников&quot;. У каждого из них есть своя проблема, обрекающая на одиночество и насмешки, - заикание, астма, лишний вес, близорукость... А еще - каждый из них однажды столкнулся со Злом. И это Зло не человек из плоти и крови. Чаще всего оно является в обличие клоуна, называющего себя Пеннивайз. Взрослые не способны видеть его, лишь подростки могут выследить чудовище и дать ему бой. Изгнанный из города &quot;Неудачниками&quot; в конце пятидесятых, спустя двадцать семь лет Пеннивайз снова начинает убивать. Друзьям предстоит вернуться в Дерри, вспомнить события, которые по непонятной причине стерлись из их памяти, и остановить монстра навсегда.'),
(12, 'Кладовище домашніх тварин', 'kladovishche-domashnh-tvarin', 120, 2015, 'UKR', 'Усе почалося з того, що улюбленця родини Луїса Кріда, кота Черча, збила вантажівка. Сусід запропонував йому поховати тварину на старому індіанському кладовищі. За легендами, воно має таємничу силу, яка здатна повертати до життя. І Луїс погодився... Уранці кіт повернувся додому живим. Майже живим...'),
(13, 'PHP. Объекты, шаблоны и методики программирования', 'php-obekty-shablony-i-metodiki-programmirovaniya', 624, 2015, 'RUS', 'Об авторе:  Мэтт Зандстра почти 20 лет проработал веб-программистом, консультантом по PHP и составителем технической документации. Он был старшим разработчиком в компании Yahoo! и работал в офисах компании как в Лондоне, так и в Силиконовой долине. Сейчас он зарабатывает себе на жизнь в качестве свободного консультанта и писателя. До этой книги Мэтт написал книгу Освой самостоятельно PHP за 24 часа (третье издание), выпущенной в ИД &quot;Вильямс&quot; в 2007 году, а также был соавтором книги DHTML Unleashed (издательство SAMS Publishing). Кроме всего прочего он также писал статьи для Linux Magazine, Zend.com, IBM DeveloperWorks и php|architect Magazine. Мэтт также изучает литературу и пишет фантастические рассказы. Он получил степень магистра в области литературного мастерства (creative writing) в университетах Манчестера и Ист-Англии. В те моменты, когда ему не приходится мотаться по всем уголкам Великобритании при изучении литературы или выполнения какой-либо работы, Мэтт живет в Ливерпуле со своей женой Луизой и двумя детьми, Холли и Джейком.'),
(14, 'HTML 4.0', 'html-40', 229, 2008, 'RUS', 'Представлен весь спектр технологий создания Web-документов (начиная от примитивных - статических - и до документов на основе динамического HTML), включая форматирование текста, создание списков, таблиц, форм, использование графики, каскадных таблиц стилей, встраивание разных объектов, использование средств интерактивного общения с пользователем, баз данных, мультимедиа-объектов и пр. Рассмотрены объектно-ориентированные технологии и программирование на языке Perl, а также создание CGI-программ и написание сценариев на языках JavaScript и VBScript. Приведены сведения о браузерах Netscape Communicator и Microsoft Internet Explorer и таблице HTML-тэгов.');

-- --------------------------------------------------------

--
-- Структура таблицы `book_author`
--

CREATE TABLE `book_author` (
  `id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `author_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_author`
--

INSERT INTO `book_author` (`id`, `book_id`, `author_id`) VALUES
(16, 7, 10),
(17, 8, 11),
(18, 9, 12),
(19, 9, 11),
(20, 9, 13),
(21, 10, 14),
(22, 11, 15),
(23, 12, 15),
(24, 13, 16),
(25, 14, 18),
(26, 14, 17),
(27, 14, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `book_genre`
--

CREATE TABLE `book_genre` (
  `id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `genre_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_genre`
--

INSERT INTO `book_genre` (`id`, `book_id`, `genre_id`) VALUES
(15, 7, 21),
(16, 7, 20),
(17, 8, 22),
(18, 8, 21),
(19, 9, 22),
(20, 9, 21),
(21, 9, 20),
(22, 10, 23),
(23, 11, 25),
(24, 11, 24),
(25, 11, 20),
(26, 12, 25),
(27, 12, 24),
(28, 13, 26),
(29, 14, 26);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`) VALUES
(20, 'Художественная литература', 'hudojestvennaya-literatura'),
(21, 'Фентези', 'fentezi'),
(22, 'Сказка', 'skazka'),
(23, 'Антиутопия', 'antiutopiya'),
(24, 'Ужасы', 'ujasy'),
(25, 'Триллер', 'triller'),
(26, 'Учебник', 'uchebnik');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

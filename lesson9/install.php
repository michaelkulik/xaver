<?php

require 'config.inc.php';

if (isset($_POST['submit'])) {
    $server_name = trim($_POST['server_name']);
    $database_name = trim($_POST['database_name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // первый раз использую конструкцию try - catch; пока до конца не разобрался, как она работает, но, как я понял,
    // она может заменить mysql-... or die(mysql_error());
    try {
        $connection = new PDO('mysql:host=' . $server_name . ';dbname=' . $database_name . ';charset=utf8', $username, $password);
    }
    catch( PDOException $Exception ) {
        echo 'Ошибка создания подключения к базе данных <a href="install.php">Назад</a>';
        exit;
    }

    // запись дескриптора подключения к БД в config.inc.php
    $put = "\r\n\$connection = new PDO('mysql:host=$server_name;dbname=$database_name;charset=utf8', '$username', '$password');";

    if (!file_put_contents('config.inc.php', $put, FILE_APPEND)) {
        echo 'Ошибка создания подключения к базе данных <a href="install.php">Назад</a>';
        exit;
    }
    
    $connection->query('SET foreign_key_checks = 0'); // без этого, если есть FOREIGN KEY, может не произойти удаление таблиц перед дампом
    $res = $connection->query('SHOW TABLES');

    // предварительная очистка базы данных
    while ($row = $res->fetch(PDO::FETCH_NUM)) {
        $connection->query('DROP TABLE IF EXISTS ' . $row[0]);
    }

    $dump = 'CREATE TABLE IF NOT EXISTS `ads` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL,
      `description` text NOT NULL,
      `seller_name` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `phone` varchar(255) NOT NULL,
      `price` float NOT NULL DEFAULT \'0\',
      `role` enum(\'private\',\'company\') NOT NULL DEFAULT \'private\',
      `allow_mails` enum(\'yes\',\'no\') NOT NULL DEFAULT \'no\',
      `city_id` int(10) unsigned NOT NULL,
      `category_id` int(10) unsigned NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
    
    -- --------------------------------------------------------
    
    --
    -- Структура таблицы `categories`
    --
    
    CREATE TABLE IF NOT EXISTS `categories` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `parent_id` int(11) NOT NULL DEFAULT \'0\',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;
    
    --
    -- Дамп данных таблицы `categories`
    --
    
    INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
    (1, \'Транспорт\', 0),
    (2, \'Автомобили с пробегом\', 1),
    (3, \'Новые автомобили\', 1),
    (4, \'Мотоциклы и мототехника\', 1),
    (5, \'Грузовики и спецтехника\', 1),
    (6, \'Водный транспорт\', 1),
    (7, \'Запчасти и аксессуары\', 1),
    (8, \'Недвижимость\', 0),
    (9, \'Квартиры\', 8),
    (10, \'Комнаты\', 8),
    (11, \'Дома, дачи, коттеджи\', 8),
    (12, \'Земельные участки\', 8),
    (13, \'Гаражи и машиноместа\', 8),
    (14, \'Коммерческая недвижимость\', 8),
    (15, \'Недвижимость за рубежом\', 8),
    (16, \'Работа\', 0),
    (17, \'Вакансии (поиск сотрудников)\', 16),
    (18, \'Резюме (поиск работы)\', 16),
    (20, \'Для дома и дачи\', 0),
    (21, \'Бытовая техника\', 20),
    (22, \'Мебель и интерьер\', 20);
    
    -- --------------------------------------------------------
    
    --
    -- Структура таблицы `cities`
    --
    
    CREATE TABLE IF NOT EXISTS `cities` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `postcode` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
    
    --
    -- Дамп данных таблицы `cities`
    --
    
    INSERT INTO `cities` (`id`, `name`, `postcode`) VALUES
    (1, \'Новосибирск\', \'641780\'),
    (2, \'Барабинск\', \'641490\'),
    (3, \'Бердск\', \'641510\'),
    (4, \'Искитим\', \'641600\'),
    (5, \'Колывань\', \'641630\'),
    (6, \'Краснообск\', \'641680\'),
    (7, \'Куйбышев\', \'641710\'),
    (8, \'Мошково\', \'641760\')';

    if ($connection->query($dump)) { // выполнение запроса с дампом
        $smarty->assign('success', true);
    } else {
        $smarty->assign('error', 'Не удалось сделать дамп базы данных');
    }

    $connection->query('SET foreign_key_checks = 1'); // возвращаем значение foreign_key_checks на прежнее
}

$smarty->display('install.tpl');
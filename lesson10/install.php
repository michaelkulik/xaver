<?php

require 'config.inc.php';

if (isset($_POST['submit'])) {
    $server_name = trim($_POST['server_name']);
    $database_name = trim($_POST['database_name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $connection = DbSimple_Generic::connect('mysql://' . $username . ':' . $password . '@' . $server_name . '/' . $database_name);

    // запись подключения к БД в config.inc.php
    $put = "\r\n\$connection = DbSimple_Generic::connect('mysql://$username:$password@$server_name/$database_name');
            \r\n// Устанавливаем обработчик ошибок и функцию логирования
            \r\$connection->setErrorHandler('databaseErrorHandler');\r\$connection->setLogger('myLogger');";
    
    if (!file_put_contents('config.inc.php', $put, FILE_APPEND)) {
        echo 'Ошибка создания подключения к базе данных <a href="install.php">Назад</a>';
        exit;
    }

    $connection->query('SET foreign_key_checks = 0');
    $res = $connection->query('SHOW TABLES');

    // предварительная очистка базы данных
    if (!$res) {
        exit('Ошибка при очистке существующих данных в БД.');
    }
    foreach ($res as $value) {
        $connection->query('DROP TABLE IF EXISTS ' . $value["Tables_in_$database_name"]);
    }

    $dump = [
        'CREATE TABLE `ads` (
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
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8',

        'CREATE TABLE `categories` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `parent_id` int(11) NOT NULL DEFAULT \'0\',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23',

        'INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
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
    (22, \'Мебель и интерьер\', 20)',

        'CREATE TABLE `cities` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `postcode` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9',

        'INSERT INTO `cities` (`id`, `name`, `postcode`) VALUES
    (1, \'Новосибирск\', \'641780\'),
    (2, \'Барабинск\', \'641490\'),
    (3, \'Бердск\', \'641510\'),
    (4, \'Искитим\', \'641600\'),
    (5, \'Колывань\', \'641630\'),
    (6, \'Краснообск\', \'641680\'),
    (7, \'Куйбышев\', \'641710\'),
    (8, \'Мошково\', \'641760\')'];

    foreach ($dump as $value_of_dump) {
        if ($connection->query($value_of_dump) === false) { 
            $smarty->assign('error', 'Не удалось сделать дамп базы данных');
            break;
        }
    }
    
    $smarty->assign('success', true);

    $connection->query('SET foreign_key_checks = 1'); // возвращаем значение foreign_key_checks на прежнее
}

$smarty->display('install.tpl');
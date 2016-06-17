<?php

// подключение сторонних библиотек
require 'vendor/autoload.php';
require 'vendor/dbsimple/DbSimple/Generic.php';
require 'vendor/FirePHPCore/FirePHP.class.php';

// создаём объект класса Smarty
$smarty = new Smarty();

define('SMARTY_DIRECTORY', __DIR__ . '/vendor/smarty/smarty/');

// определяем настройки Smarty
$smarty->compile_check = true;
$smarty->debugging = false;
$smarty->template_dir = SMARTY_DIRECTORY . 'templates';
$smarty->compile_dir = SMARTY_DIRECTORY . 'templates_c';
$smarty->cache_dir = SMARTY_DIRECTORY . 'cache';
$smarty->config_dir = SMARTY_DIRECTORY . 'configs';

// заголовок сайта
$smarty->assign('title', 'lesson9 | Xaver Course');

// Инициализируем класс FirePHP
$firePHP = FirePHP::getInstance(true);
// Устанавливаем активность
$firePHP->setEnabled(true);

// Код обработчика ошибок SQL.
function databaseErrorHandler($message, $info)
{
    // Если использовалась @, ничего не делать.
    if (!error_reporting()) return;
    // Выводим подробную информацию об ошибке.
    echo "SQL Error: $message<br><pre>";
    print_r($info);
    echo "</pre>";
    exit();
}

// Функция для логирования запросов
function myLogger($connection, $sql, $caller)
{
    global $firePHP;
    if (isset($caller['file'])) {
        $firePHP->group("at ".@$caller['file'].' line '.@$caller['line']);
    }
    $firePHP->log($sql);
    if (isset($caller['file'])) {
        $firePHP->groupEnd();
    }
}

// подключение к БД
<?php

define('SMARTY_DIRECTORY', __DIR__ . '/vendor/smarty/smarty/');

// подключение библиотеки шаблонизатора Smarty
require 'vendor/autoload.php';

// создаём объект класса Smarty
$smarty = new Smarty();

// определяем настройки Smarty
$smarty->compile_check = true;
$smarty->debugging = false;
$smarty->template_dir = SMARTY_DIRECTORY . 'templates';
$smarty->compile_dir = SMARTY_DIRECTORY . 'templates_c';
$smarty->cache_dir = SMARTY_DIRECTORY . 'cache';
$smarty->config_dir = SMARTY_DIRECTORY . 'configs';

// заголовок сайта
$smarty->assign('title', 'lesson12 | Xaver Course');

// подключение к БД
$db = new PDO('mysql:host=localhost;dbname=wall_of_ads;charset=utf8', 'root', '');
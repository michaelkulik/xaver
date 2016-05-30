<?php

define('SMARTY_DIRECTORY', __DIR__ . '/vendor/smarty/smarty/');

// подключение шаблонизатора Smarty и файла с функциями
require 'functions.php';
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

$smarty->assign('title', 'lesson8 | Xaver Course');
$smarty->assign('cities', $cities);
$smarty->assign('categories', $categories);

$filename = './ads/data_ads.txt';
$ads = (file_exists($filename)) ? unserialize(file_get_contents($filename)) : array();

// удаление объявления
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    unset($ads[$id]);
    save_data($ads);
}

// добавление и редактирование объявления
if (isset($_POST['submit'])) {
    if (isset($_GET['id']) && array_key_exists((int) $_GET['id'], $ads)) {
        $id = (int) $_GET['id'];
        $ads[$id] = $_POST;
        save_data($ads);
    } else {
        $ads[] = $_POST;
        if (count($ads) == 1) {
            array_unshift($ads, 'phoney');
            unset($ads[0]);
        }
        save_data($ads);
    }
}

if (!$_GET) {
    $smarty->assign('ads', $ads);
    show_form('', $ads, $smarty);
} elseif (isset($_GET['id']) && array_key_exists((int) $_GET['id'], $ads)) {
    show_form((int) $_GET['id'], $ads, $smarty);
} else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
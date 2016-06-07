<?php

// подключение файла конфигурации
require 'config.inc.php';

// подключение модели
require 'model.php';

// получение списка городов
$smarty->assign('cities', get_cities());

// получение списка категорий
$smarty->assign('cat', get_categories());

// удаление объявления
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    if (delete($id)) {
        header('location: index.php');
    } else {
        echo '<p>Ошибка при удалении.</p>';
    }
}

// добавление и редактирование объявления
if (isset($_POST['submit'])) {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        save($id);
    } else {
        save();
    }
}

if (!$_GET) {
    // получение всех объявлений
    $ads = get_ads();
    $smarty->assign('ads', $ads);

    show_form('', $ads, $smarty);
} elseif (isset($_GET['id']) && (int) $_GET['id'] != 0) {
    // получение выбранного объявления
    $ads = get_ads((int) $_GET['id']);
    
    if ($ads) {
        show_form((int)$_GET['id'], $ads, $smarty);
    } else {
        echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
    }
} else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
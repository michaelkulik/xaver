<?php

header('Content-Type: text/html; charset=utf-8');

// подключение файла конфигурации
require 'config.inc.php';

// подключение модели
require 'model.php';

// получение списка городов
$smarty->assign('cities', get_cities($connection));

// получение списка категорий
$smarty->assign('cat', get_categories($connection));

// добавление и редактирование объявления
if (isset($_POST['submit'])) {
    $id = (isset($_GET['id'])) ? (int) $_GET['id'] : '';
    save($id, $connection);
}
// удаление объявления
elseif (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    if (delete($id, $connection)) {
        header('location: index.php');
    } else {
        echo '<p>Ошибка при удалении.</p>';
    }
}
// главная страница
elseif (!$_GET) {
    // получение всех объявлений
    $ads = get_ads('', $connection);
    $smarty->assign('ads', $ads);

    show_form('', $ads, $smarty);
}
// страница выбранного объявления
elseif (isset($_GET['id']) && (int) $_GET['id'] != 0) {
    // получение выбранного объявления
    $ads = get_ads((int) $_GET['id'], $connection);
    
    if ($ads) {
        show_form((int)$_GET['id'], $ads, $smarty);
    } else {
        page_not_found();
    }
}
// нанайденная страница
else {
    page_not_found();
}
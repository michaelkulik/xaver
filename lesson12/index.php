<?php

header('Content-Type: text/html; charset=utf-8');

require_once 'config.inc.php';
require_once 'Ads.php';
require_once 'City.php';
require_once 'Category.php';

// получение списка городов
$city = new City;
$smarty->assign('cities', $city->fetchCities($db));

// получение списка категорий
$category = new Category;
$smarty->assign('cats', $category->fetchCategories($db));

//$ad = new Ads;

// добавление и редактирование объявления
if (isset($_POST['submit'])) {
    $id = (isset($_GET['id'])) ? (int) $_GET['id'] : null;
    $ad = new Ads($_POST);
    try {
        $ad->save($db);
        header('location: index.php');
    } catch (Exception $e) {
        $e->getMessage();
    }
}
// удаление объявления
elseif (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $ad->setId($id);
    try {
        $ad->delete($c);
        header('location: index.php');
    }
    catch (Exception $e) {
        $e->getMessage();
    }
}
// главная страница
elseif (!$_GET) {
    // получение всех объявлений
    $ads = $ad->fetchAll($c);
    if (isset($_POST['fill'])) $ad->fillData();
    $smarty->assign(['ads' => $ads, 'ad' => $ad]);
    $smarty->display('index.tpl');
}
// страница выбранного объявления
elseif (isset($_GET['id']) && (int) $_GET['id'] != 0) {
    // получение выбранного объявления
    $id = (int) $_GET['id'];
    $ad->setId($id);
    if ($ad->fetchById($c)) {
        if (isset($_POST['fill'])) $ad->fillData();
        $smarty->assign('ad', $ad);
        $smarty->display('index.tpl');
    } else {
        $smarty->display('not_found.tpl');
    }
}
// нанайденная страница
else {
    $smarty->display('not_found.tpl');
}

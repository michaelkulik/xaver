<?php

header('Content-Type: text/html; charset=utf-8');

require_once 'config.inc.php';
require_once 'Ads.php';
require_once 'AdsStore.php';
require_once 'City.php';
require_once 'Category.php';

// получение списка городов
$city = new City;
$smarty->assign('cities', $city->fetchCities($db));

// получение списка категорий
$category = new Category;
$smarty->assign('cats', $category->fetchCategories($db));

// главная страница
if (!$_GET) {
    // получение всех объявлений
    AdsStore::getInstance()->getAllAdsFromDb($db)->prepareForOut($smarty)->display($smarty);
}
// страница выбранного объявления
elseif (isset($_GET['id']) && (int) $_GET['id'] != 0) {
    $id = (int) $_GET['id'];
    $ad = AdsStore::getInstance()->getAdById($db, $id);
    if ($ad) {
        $smarty->assign('ad', $ad)->display('index.tpl');
    } else {
        $smarty->display('not_found.tpl');
    }
}
// нанайденная страница
else {
    $smarty->display('not_found.tpl');
}
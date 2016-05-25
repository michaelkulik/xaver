<?php

require 'functions.php';

$filename = './ads/data_ads.txt';
$ads = (file_exists($filename)) ? unserialize(file_get_contents($filename)) : array();

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    unset($ads[$id]);
    save_data($ads);
}

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
    show_form();
} elseif (isset($_GET['id']) && array_key_exists((int) $_GET['id'], $ads)) {
    show_form((int) $_GET['id']);
} else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
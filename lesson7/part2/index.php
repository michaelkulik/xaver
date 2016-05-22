<?php

require 'functions.php';

if (isset($_GET['delete'])) {
    $id = './ads/' . $_GET['delete'] . '.txt';
    unlink($id);
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    $new_ad = serialize($_POST);
    if (isset($_GET['id']) && array_key_exists('./ads/' . $_GET['id'] . '.txt', array_flip(glob('./ads/*.txt')))) {
        $id = './ads/' . $_GET['id'] . '.txt';
        file_put_contents($id, $new_ad);
        header('Location: index.php');
    } else {
        file_put_contents('./ads/ad' . substr(time(), -4, 4) . '.txt', $new_ad);
        header('Location: index.php');
    }
}

if (!$_GET) {
    show_form();
} elseif (isset($_GET['id']) && array_key_exists('./ads/' . $_GET['id'] . '.txt', array_flip(glob('./ads/*.txt')))) {
    show_form($_GET['id']);
} else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
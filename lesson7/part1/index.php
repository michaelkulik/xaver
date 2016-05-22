<?php

require 'functions.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    setcookie($id, '');
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    if (isset($_GET['id']) && array_key_exists($_GET['id'], $_COOKIE)) {
        $id = $_GET['id'];
        $new_ad = serialize($_POST);
        setcookie($id, $new_ad, time()+3600*24*7);
        header('Location: index.php');
    } else {
        $new_ad = serialize($_POST);
        setcookie('ad' . substr(time(), -4, 4), $new_ad, time()+3600*24*7);
        header('Location: index.php');
    }
}

if (!$_GET) {
    show_form();
} elseif (isset($_GET['id']) && array_key_exists($_GET['id'], $_COOKIE)) {
    show_form($_GET['id']);
} else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
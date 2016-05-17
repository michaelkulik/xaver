<?php

require 'functions.php';

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    unset($_SESSION['ads'][$id]);
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $_SESSION['ads'][$id] = $_POST;
        header('Location: index.php');
    } else {
        $_SESSION['ads'][] = $_POST;
        // Ниже две строчки сделал для того, чтобы id объявлений начинался с 1, а не с 0, т.к. при привидении гетов
        // с помощью (int) возникают дополнительные трудности
        array_unshift($_SESSION['ads'], "phoney");
        unset($_SESSION['ads'][0]);
    }
}

if (!$_GET) {
    show_form();
} elseif (isset($_GET['id']) && array_key_exists((int) $_GET['id'], $_SESSION['ads'])) {
    show_form((int) $_GET['id']);
} else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
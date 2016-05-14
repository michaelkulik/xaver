<?php

require 'functions.php';

date_default_timezone_set('Asia/Krasnoyarsk');

if(isset($_GET['delete'])) {
    unset($_SESSION[$_GET['delete']]);
    header("Location: index.php");
}

if($_POST) {
    $id = 'ad' . substr(time(), -4, 4);
    foreach($_POST as $key => $value) {
        if($key == 'submit') continue;
        $_SESSION[$id][$key] = $value;
    }
}

if (!$_GET) {
    show_empty_form($cities, $categories);
}elseif (isset($_GET['id']) && array_key_exists($_GET['id'], $_SESSION)) {
    show_form($cities, $categories);
}else {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
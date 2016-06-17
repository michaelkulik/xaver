<?php

/* ==== Получение объявлений ==== */
function get_ads($id = '', $c) {
    if ($id) {
        $sql = "SELECT * FROM `ads` WHERE `id` = ?d";
        return $c->selectRow($sql, $id);
    } else {
        $sql = 'SELECT `id`, `title`, `price`, `seller_name` FROM `ads`';
        return $c->select($sql);
    }
}
/* ==== Получение объявлений ==== */


/* ==== Получение списка городов ==== */
function get_cities($c) {
    $sql = 'SELECT id AS ARRAY_KEY, name FROM cities';
    return $cities = $c->selectCol($sql);
}
/* ==== Получение списка городов ==== */


/* ==== Получение списка категорий ==== */
function get_categories($c) {
    $sql = 'SELECT id AS ARRAY_KEY, name, parent_id AS PARENT_KEY FROM `categories`';
    return $c->select($sql);
}
/* ==== Получение списка категорий ==== */


/* ==== Сохранение и редактирование объявления ==== */
function save($id = '', $c) {
    $data = [
        'role' => $_POST['role'],
        'seller_name' => trim($_POST['seller_name']),
        'email' => trim($_POST['email']),
        'allow_mails' => (isset($_POST['allow_mails'])) ? 'yes' : 'no',
        'phone' => trim($_POST['phone']),
        'city_id' => $_POST['city_id'],
        'category_id' => $_POST['category_id'],
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'price' => abs(round($_POST['price']))
    ];

    if ($id) { // редактирование объявления
        $sql = "UPDATE `ads` SET ?a WHERE `id` = ?d";
        $res = $c->query($sql, $data, $id);
    } else { // сохранение нового объявления
        $sql = "INSERT INTO `ads` (?#) VALUES (?a)";
        $res = $c->query($sql, array_keys($data), array_values($data));
    }
    
    if ($res !== false) {
        header('location: index.php');
    } else {
        echo 'Произошла ошибка при сохранении/редактировании объявления.';
    }
}
/* ==== Сохранение и редактирование объявления ==== */


/* ==== Вывод формы ==== */
function show_form($id = '', $ads = '', $smarty) {
    $ad = null;
    if ($id) $ad = $ads;
    if (isset($_POST['fill'])) $ad = fill_data();
    $smarty->assign('ad', $ad);
    $smarty->display('index.tpl');
}
/* ==== Вывод формы ==== */


/* ==== Заполнение объявления тестовыми данными ==== */
function fill_data() {
    return $ad = array(
        'seller_name' => 'Михаил',
        'email' => 'ivan@mail.ru',
        'phone' => '+79059051234',
        'city_id' => '7',
        'category_id' => '3',
        'title' => 'Audi RS ' . substr(time(), -4, 4),
        'description' => 'ОТС. Звоните после 18:00.'
    );
}
/* ==== Заполнение объявления тестовыми данными ==== */


/* ==== Удаление объявления ==== */
function delete($id, $c) {
    $sql = "DELETE FROM `ads` WHERE `id` = ?d";
    
    if ($c->query($sql, $id)) {
        return true;
    } else {
        return false;
    }
}
/* ==== Удаление объявления ==== */


/* ==== Функция вывода ненайденной страницы ==== */
function page_not_found() {
    echo '<h3>Такой страницы не существует.</h3>
            <a href="index.php">Назад</a>';
}
/* ==== Функция вывода ненайденной страницы ==== */
<?php

/* ==== Фильтрация входящих данных ==== */
function clear($var){
    $var = mysql_real_escape_string(strip_tags($var));
    return $var;
}
/* ==== Фильтрация входящих данных ==== */


/* ==== Получение списка объявлений ==== */
function get_ads($id = '') {
    if ($id) {
        $sql = "SELECT * FROM `ads` WHERE `id` = $id";
        $res = mysql_query($sql) or die(mysql_error());
        $ads = mysql_fetch_assoc($res);
    } else {
        $sql = 'SELECT `id`, `title`, `price`, `seller_name` FROM `ads`';
        $res = mysql_query($sql) or die(mysql_error());
        while ($row = mysql_fetch_assoc($res)) {
            $ads[] = $row;
        }
    }
    
    return $ads;
}
/* ==== Получение списка объявлений ==== */


/* ==== Получение списка городов ==== */
function get_cities() {
    $sql = 'SELECT * FROM `cities`';
    $res = mysql_query($sql) or die(mysql_error());
    
    while ($row = mysql_fetch_assoc($res)) {
        $cities[$row['id']] = $row['name'];
    }
    
    return $cities;
}
/* ==== Получение списка городов ==== */


/* ==== Получение списка категорий ==== */
function get_categories() {
    $sql = 'SELECT * FROM `categories`';
    $res = mysql_query($sql) or die(mysql_error());
    
    while ($row = mysql_fetch_assoc($res)) {
        if(!$row['parent_id']){ // если parent_id = 0
            $cat[$row['id']][] = $row['name']; // $cat[1][0] = $row['name']
        } else { // если parent_id != 0
            $cat[$row['parent_id']]['sub'][$row['id']] = $row['name']; // $cat[1]['sub'][6] (введём sub для дочерних категорий)
        }
    }
    
    return $cat;
}
/* ==== Получение списка категорий ==== */


/* ==== Сохранение и редактирование объявления ==== */
function save($id = '') {
    $role = $_POST['role'];
    $seller_name = clear(trim($_POST['seller_name']));
    $email = clear(trim($_POST['email']));
    $allow_mails = (isset($_POST['allow_mails'])) ? 'yes' : 'no';
    $phone = clear(trim($_POST['phone']));
    $city_id = $_POST['city_id'];
    $category_id = $_POST['category_id'];
    $title = clear(trim($_POST['title']));
    $description = clear(trim($_POST['description']));
    $price = abs(round($_POST['price']));;

    if ($id) { // редактирование объявления
        $sql = "UPDATE `ads` SET `title` = '$title', `description` = '$description', `seller_name` = '$seller_name', 
                                  `email` = '$email', `phone` = '$phone', `price` = $price, `role` = '$role', 
                                  `allow_mails` = '$allow_mails', `city_id` = $city_id, `category_id` = $category_id 
                                      WHERE `id` = $id";
    } else { // сохранение нового объявления
        $sql = "INSERT INTO `ads` (`title`, `description`, `seller_name`, `email`, `phone`, `price`, `role`, `allow_mails`, `city_id`, `category_id`)
                  VALUES ('$title', '$description', '$seller_name', '$email', '$phone', $price, '$role', '$allow_mails', $city_id, $category_id)";
    }
    mysql_query($sql) or die(mysql_error());
    
    if (mysql_affected_rows() > 0) {
        header('Location: index.php');
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
function delete($id) {
    $sql = "DELETE FROM `ads` WHERE `id` = $id";
    mysql_query($sql) or die(mysql_error());
    
    if (mysql_affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
}
/* ==== Удаление объявления ==== */
<?php

/* ==== Получение объявлений ==== */
function get_ads($id = '', $c) {
    if ($id) {
        $sql = "SELECT * FROM `ads` WHERE `id` = ?";
        $stmt = $c->prepare($sql);
        $stmt->execute([$id]);
        $ads = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $sql = 'SELECT `id`, `title`, `price`, `seller_name` FROM `ads`';
        $res = $c->query($sql);

        $ads = [];
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $ads[] = $row;
        }
    }
    
    return $ads;
}
/* ==== Получение объявлений ==== */


/* ==== Получение списка городов ==== */
function get_cities($c) {
    $sql = 'SELECT * FROM `cities`';
    $res = $c->query($sql);
    
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $cities[$row['id']] = $row['name'];
    }
    
    return $cities;
}
/* ==== Получение списка городов ==== */


/* ==== Получение списка категорий ==== */
function get_categories($c) {
    $sql = 'SELECT * FROM `categories`';
    $res = $c->query($sql);
    
    $cat = [];
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
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
function save($id = '', $c) {
    $role = $_POST['role'];
    $seller_name = trim($_POST['seller_name']);
    $email = trim($_POST['email']);
    $allow_mails = (isset($_POST['allow_mails'])) ? 'yes' : 'no';
    $phone = trim($_POST['phone']);
    $city_id = $_POST['city_id'];
    $category_id = $_POST['category_id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = abs(round($_POST['price']));;

    if ($id) { // редактирование объявления
        $sql = "UPDATE `ads` SET `title` = ?, `description` = ?, `seller_name` = ?, `email` = ?, `phone` = ?, `price` = ?, 
                  `role` = ?, `allow_mails` = ?, `city_id` = ?, `category_id` = ? WHERE `id` = $id";
    } else { // сохранение нового объявления
        $sql = "INSERT INTO `ads` (`title`, `description`, `seller_name`, `email`, `phone`, `price`, `role`, `allow_mails`, `city_id`, `category_id`)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    }
    $stmt = $c->prepare($sql);
    
    $insert_data = [$title, $description, $seller_name, $email, $phone, $price, $role, $allow_mails, $city_id, $category_id];
    if ($stmt->execute($insert_data)) {
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
    $sql = "DELETE FROM `ads` WHERE `id` = $id";
    
    if ($c->query($sql)) {
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
<?php

date_default_timezone_set('Asia/Krasnoyarsk');
session_start();

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

$cities = array(
    '641780' => 'Новосибирск',
    '641490' => 'Барабинск',
    '641510' => 'Бердск',
    '641600' => 'Искитим',
    '641630' => 'Колывань',
    '641680' => 'Краснообск',
    '641710' => 'Куйбышев',
    '641760' => 'Мошково'
);
$categories = array(
    'Транспорт' => array(
        '9' => 'Автомобили с пробегом',
        '109' => 'Новые автомобили',
        '14' => 'Мотоциклы и мототехника',
        '81' => 'Грузовики и спецтехника',
        '11' => 'Водный транспорт',
        '10' => 'Запчасти и аксессуары'
    ),
    'Недвижимость' => array(
        '24' => 'Квартиры',
        '23' => 'Комнаты',
        '25' => 'Дома, дачи, коттеджи',
        '26' => 'Земельные участки',
        '85' => 'Гаражи и машиноместа',
        '42' => 'Коммерческая недвижимость',
        '86' => 'Недвижимость за рубежом',
    ),
    'Работа' => array(
        '111' => 'Вакансии (поиск сотрудников)',
        '112' => 'Резюме (поиск работы)'
    )
);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <style>
        input:not(#form_submit) {float: right;} textarea {margin: 20px 0; float: right;} .fortextarea {margin: 20px 0;} select {margin-left: 40px;}
    </style>
<?php if(!$_GET): ?>
    <div class="row">
        <div class="col-lg-8">
        <form method="post" class="">
            <div class="form-row-indented">
                <label class="form-label-radio">
                    <input type="radio" checked="" value="1" name="private">Частное лицо
                </label>
                <label class="form-label-radio">
                    <input type="radio" value="0" name="private">Компания
                </label>
            </div>
            <div class="form-row">
                <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
                <input type="text" maxlength="40" class="form-input-text" value="" name="seller_name" id="fld_seller_name">
            </div>
            <div class="form-row">
                <label for="fld_email" class="form-label">Электронная почта</label>
                <input type="email" class="form-input-text" value="" name="email" id="fld_email">
            </div>
            <div class="form-row-indented">
                <label style="margin: 10px 0;" for="allow_mails">
                    <input style="margin: 5px 0 0 20px" type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
                    <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
                </label>
            </div>
            <div class="form-row">
                <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-input-text" value="" name="phone" id="fld_phone">
            </div>
            <div id="f_location_id" class="form-row form-row-required">
                <label for="region" class="form-label">Город</label>
                <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select">
                    <option value="">-- Выберите город --</option>
                    <option class="opt-group" disabled="disabled">-- Города --</option>
<?php foreach($cities as $key => $city): ?>
                    <option value="<?=$key?>"><?=$city?></option>
<?php endforeach; ?>
                </select>
            </div>
            <div class="form-row">
                <label for="fld_category_id" class="form-label">Категория</label>
                <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
                    <option value="">-- Выберите категорию --</option>
<?php foreach($categories as $category => $subcategories): ?>
                    <optgroup label="<?=$category?>">
<?php foreach($subcategories as $key => $subcategory): ?>
                        <option value="<?=$key?>"><?=$subcategory?></option>
<?php endforeach; ?>
                    </optgroup>
<?php endforeach; ?>
                </select>
            </div>
            <div id="f_title" class="form-row f_title">
                <label for="fld_title" class="form-label">Название объявления</label>
                <input type="text" maxlength="50" class="form-input-text-long" value="" name="title" id="fld_title">
            </div>
            <div class="form-row">
                <label for="fld_description" class="fortextarea" id="js-description-label">Описание объявления</label>
                <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea"></textarea>
                <div style="clear: both"></div>
            </div>
            <div id="price_rw" class="form-row rl">
                <label id="price_lbl" for="fld_price" class="form-label">Цена</label>
                <input type="text" maxlength="9" class="form-input-text-short" value="0" name="price" id="fld_price">
            </div>
            <input style="margin: 20px 0 0 0" type="submit" value="Готово" id="form_submit" name="submit">
        </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <table class="table">
                <tr>
                    <th>Название объявления</th>
                    <th>Цена</th>
                    <th>Имя</th>
                    <th>&nbsp;</th>
                </tr>
<?php if(!empty($_SESSION)): ?>
<?php foreach($_SESSION as $id => $ad): ?>
                <tr>
                    <td><a href="?id=<?=$id?>"><?=$ad['title']?></a></td>
                    <td><?=$ad['price']?></td>
                    <td><?=$ad['seller_name']?></td>
                    <td><a href="?delete=<?=$id?>">Удалить</a></td>
                </tr>
<?php endforeach; ?>
<?php else: ?>
                <tr>
                    <td colspan="4">Пока объявлений нет.</td>
                </tr>
<?php endif; ?>
            </table>
        </div>
    </div>

<?php elseif(isset($_GET['id']) && array_key_exists($_GET['id'], $_SESSION)): ?>

    <div class="row">
        <div class="col-lg-8">
            <form method="post" class="">
                <div class="form-row-indented">
                    <label class="form-label-radio">
                        <input <?php if($_SESSION[$_GET['id']]['private'] == 1) echo 'checked=""'; ?> type="radio" value="1" name="private">Частное лицо
                    </label>
                    <label class="form-label-radio">
                        <input <?php if($_SESSION[$_GET['id']]['private'] == 0) echo 'checked=""'; ?> type="radio" value="0" name="private">Компания
                    </label>
                </div>
                <div class="form-row">
                    <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
                    <input type="text" maxlength="40" class="form-input-text" value="<?=$_SESSION[$_GET['id']]['seller_name']?>" name="seller_name" id="fld_seller_name">
                </div>
                <div class="form-row">
                    <label for="fld_email" class="form-label">Электронная почта</label>
                    <input type="email" class="form-input-text" value="<?=$_SESSION[$_GET['id']]['email']?>" name="email" id="fld_email">
                </div>
                <div class="form-row-indented">
                    <label style="margin: 10px 0;" for="allow_mails">
                        <input style="margin: 5px 0 0 20px" <?php if(isset($_SESSION[$_GET['id']]['allow_mails']) && $_SESSION[$_GET['id']]['allow_mails'] == 1) echo 'checked=""'; ?> type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
                        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label>
                </div>
                <div class="form-row">
                    <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
                    <input type="text" class="form-input-text" value="<?=$_SESSION[$_GET['id']]['phone']?>" name="phone" id="fld_phone">
                </div>
                <div id="f_location_id" class="form-row form-row-required">
                    <label for="region" class="form-label">Город</label>
                    <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select">
                        <option value="">-- Выберите город --</option>
                        <option class="opt-group" disabled="disabled">-- Города --</option>
                        <?php foreach($cities as $key => $city): ?>
                            <option <?php if($key == $_SESSION[$_GET['id']]['location_id']) echo 'selected=""'; ?> value="<?=$key?>"><?=$city?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="fld_category_id" class="form-label">Категория</label>
                    <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
                        <option value="">-- Выберите категорию --</option>
                        <?php foreach($categories as $category => $subcategories): ?>
                            <optgroup label="<?=$category?>">
                                <?php foreach($subcategories as $key => $subcategory): ?>
                                    <option <?php if($key == $_SESSION[$_GET['id']]['category_id']) echo 'selected=""'; ?> value="<?=$key?>"><?=$subcategory?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="f_title" class="form-row f_title">
                    <label for="fld_title" class="form-label">Название объявления</label>
                    <input type="text" maxlength="50" class="form-input-text-long" value="<?=$_SESSION[$_GET['id']]['title']?>" name="title" id="fld_title">
                </div>
                <div class="form-row">
                    <label for="fld_description" class="fortextarea" id="js-description-label">Описание объявления</label>
                    <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea"><?=$_SESSION[$_GET['id']]['description']?></textarea>
                    <div style="clear: both"></div>
                </div>
                <div id="price_rw" class="form-row rl">
                    <label id="price_lbl" for="fld_price" class="form-label">Цена</label>
                    <input type="text" maxlength="9" class="form-input-text-short" value="<?=$_SESSION[$_GET['id']]['price']?>" name="price" id="fld_price">
                </div>
                <a href="index.php">Назад</a>
            </form>
        </div>
    </div>

<?php else: ?>
    <h3>Такой страницы не существует.</h3>
    <a href="index.php">Назад</a>
<?php endif; ?>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>

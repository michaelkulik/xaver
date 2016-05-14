<?php

session_start();

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

function show_cities($cities = '', $location_id = '') {
    ?>
    <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select">
        <option value="">-- Выберите город --</option>
        <option class="opt-group" disabled="disabled">-- Города --</option>
        <?php foreach($cities as $key => $city): ?>
            <option <?php if($key == $location_id) echo 'selected=""'; ?> value="<?=$key?>"><?=$city?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function show_categories($categories = '', $category_id) {
    ?>
    <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
        <option value="">-- Выберите категорию --</option>
        <?php foreach($categories as $category => $subcategories): ?>
            <optgroup label="<?=$category?>">
                <?php foreach($subcategories as $key => $subcategory): ?>
                    <option <?php if($key == $category_id) echo 'selected=""'; ?> value="<?=$key?>"><?=$subcategory?></option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
    </select>
<?php
}

function show_ads_list() {
    ?>
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
<?php
}

function show_empty_form($cities, $categories) {
    $private = '';
    $seller_name = '';
    $email = '';
    $allow_mails = '';
    $phone = '';
    $title = '';
    $description = '';
    $price = '';
    $location_id = '';
    $category_id = '';
    require 'form.php';
}

function show_form($cities, $categories) {
    $private = $_SESSION[$_GET['id']]['private'];
    $seller_name = $_SESSION[$_GET['id']]['seller_name'];
    $email = $_SESSION[$_GET['id']]['email'];
    $allow_mails = (isset($_SESSION[$_GET['id']]['allow_mails'])) ? $_SESSION[$_GET['id']]['allow_mails'] : 0;
    $phone = $_SESSION[$_GET['id']]['phone'];
    $title = $_SESSION[$_GET['id']]['title'];
    $description = $_SESSION[$_GET['id']]['description'];
    $price = $_SESSION[$_GET['id']]['price'];
    $location_id = $_SESSION[$_GET['id']]['location_id'];
    $category_id = $_SESSION[$_GET['id']]['category_id'];
    require 'form.php';
}

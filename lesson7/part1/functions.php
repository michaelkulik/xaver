<?php ;

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

function show_cities($location_id = '') {
    global $cities;
    foreach ($cities as $key => $city) {
        if ($key == $location_id) {
            echo '<option selected="" value="' . $key . '">' . $city . '</option>';
        } else {
            echo '<option value="' . $key . '">' . $city . '</option>';
        }
    }
}

function show_categories($category_id = '') {
    global $categories;
    foreach ($categories as $category => $subcategories) {
        echo "<optgroup label='$category'>";
        foreach ($subcategories as $key => $subcategory) {
            if ($key == $category_id) {
                echo "<option selected='' value='$key'>$subcategory</option>";
            } else {
                echo "<option value='$key'>$subcategory</option>";
            }
        }
        echo '</optgroup>';
    }
}

function show_ads_list() {
    foreach($_COOKIE as $id => $ad) {
        $ad = unserialize($ad);
        echo "<tr>
                  <td><a href='?id=$id'>{$ad['title']}</a></td>
                  <td>{$ad['price']}</td>
                  <td>{$ad['seller_name']}</td>
                  <td><a href='#' data-href='?delete=$id' data-toggle='modal' data-target='#confirm-delete'>Удалить</a></td>
              </tr>";
    }
}

function show_form($id = '') {
    if ($id) $ad = unserialize($_COOKIE[$id]);
    if (isset($_POST['fill'])) $ad = fill_data();
    require 'form.php';
}

function fill_data() {
    return $ad = array(
        'private' => 'option1',
        'seller_name' => 'Иван',
        'email' => 'ivan@mail.ru',
        'phone' => '+79059051234',
        'location_id' => '641600',
        'category_id' => '9',
        'title' => 'BMW M' . substr(time(), -4, 4) . ' Sedan',
        'description' => 'ХТС. Звоните после 18:00.'
    );
}
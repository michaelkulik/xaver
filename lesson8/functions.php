<?php

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

function show_form($id = '', $ads = '', $smarty) {
    $ad = null;
    if ($id) $ad = $ads[$id];
    if (isset($_POST['fill'])) $ad = fill_data();
    $smarty->assign('ad', $ad);
    $smarty->display('index.tpl');
}

function fill_data() {
    return $ad = array(
        'private' => 'option1',
        'seller_name' => 'Михаил',
        'email' => 'ivan@mail.ru',
        'phone' => '+79059051234',
        'location_id' => '641600',
        'category_id' => '9',
        'title' => 'BMW M' . substr(time(), -4, 4) . ' Sedan',
        'description' => 'ХТС. Звоните после 18:00.'
    );
}

function save_data($ads) {
    file_put_contents('./ads/data_ads.txt', serialize($ads));
    header('Location: index.php');
}
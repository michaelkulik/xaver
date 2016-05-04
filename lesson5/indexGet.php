<?php

$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news=  explode("\n", $news);

function fetchAll($news) {
    return array_map(function($item){
        echo ' &#149; ' . $item . '<br>';
    }, $news);
}

function fetch($id) {
    global $news;
    echo ' &#149; ' . $news[$id];
}

if( isset($_GET['id']) ){
    if(!array_key_exists($_GET['id'], $news)) {
        fetchAll($news);
    }else{
        fetch($_GET['id']);
    }
}elseif(!$_GET){
    fetchAll($news);
}else{
    require 'page404.html';
}
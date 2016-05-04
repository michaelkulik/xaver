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
    <div class="row">
        <form class="form-inline" method="post">
            <div class="form-group">
                <label class="sr-only">Email</label>
                <p class="form-control-static">Введите номер новости</p>
            </div>
            <div class="form-group">
                <label for="number" class="sr-only">Password</label>
                <input type="text" class="form-control" id="number" name="id">
            </div>
            <button type="submit" class="btn btn-primary">Показать новости</button>
        </form>
    </div>
    <div class="row">
        <?php
        if( isset($_POST['id']) ){
            if(!array_key_exists($_POST['id'], $news)) {
                echo '<br><h4>Все новости</h4>';
                fetchAll($news);
            }else{
                echo '<br><h4>Выбранная новость</h4>';
                fetch($_POST['id']);
            }
        }else {
            echo '<br><h4>Все новости</h4>';
            fetchAll($news);
        }
        ?>
    </div>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>

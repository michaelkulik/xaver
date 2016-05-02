<?php

$ini_string='
[игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';

';
$bd = parse_ini_string($ini_string, true);

echo '<pre>';
print_r($bd);
echo '</pre>';

function diskont1($price) {
    return $discount_price = $price - $price * 0.1;
}

function diskont2($price) {
    return $discount_price = $price - $price * 0.2;
}

function diskont0($price) {
    return $price;
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
<div class="">
    <table class="table">
        <tr>
            <th>&nbsp;</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Остаток</th>
            <th>Дисконт</th>
            <th>Уведомление</th>
            <th>Доп. скидка</th>
        </tr>
<?php foreach($bd as $key => $value): ?>
        <tr>
            <td>&nbsp;</td>
            <td><?php echo $key; ?></td>
<?php
if($key == 'игрушка детская велосипед' && $value['количество заказано'] >= 3) {
    $value['цена'] = $value['цена'] - $value['цена'] * 0.3;
    $message_of_discount = 'При таком количестве на этот товар Вам начисляется скидка 30% на каждую штуку.';
}
$value['цена'] = $value['diskont']($value['цена']);
?>
            <td><?php echo $value['цена'] ?></td>
            <td><?php echo $value['количество заказано'] ?></td>
            <td><?php echo $value['осталось на складе'] ?></td>
            <td><?php echo $value['diskont'] ?></td>
<?php if($value['количество заказано'] > $value['осталось на складе']): ?>
            <td>Извините, на складе осталось всего <?=$value['осталось на складе']?> шт.</td>
<?php else: ?>
            <td>&nbsp;</td>
<?php endif; ?>
            <td><?php if(isset($message_of_discount)) { echo $message_of_discount;} ?></td>
        </tr>
<?php
static $total_price;
$total_price += $value['цена'] * $value['количество заказано'];
static $total_count;
$total_count += $value['количество заказано'];
endforeach; ?>
        <tr>
            <th>Итого</th>
            <td><?php echo count($bd); ?></td>
            <td><?php echo $total_price; ?></td>
            <td><?php echo $total_count; ?></td>
        </tr>

    </table>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>

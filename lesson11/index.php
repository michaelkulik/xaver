<?php

require_once 'config.inc.php';
require_once 'Ads.php';

//$ad = new Db();
$ad = new Ads();
$ad->setTitle('Аккордеон');
$ad->setPrice(5);

$ad->save($c);

//$records = $ads->fetchAds($c);
//
//foreach ($records as $record) {
//    echo $record->getId();
//    echo '<br>';
//}

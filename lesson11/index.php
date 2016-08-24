<?php

require_once 'config.inc.php';
require_once 'Ads.php';

//$ad = new Db();
$ad = new Ads();

$ad->setId(2);
$ad->fetchById($c);

echo $ad->getTitle();
//$records = $ads->fetchAds($c);
//
//foreach ($records as $record) {
//    echo $record->getId();
//    echo '<br>';
//}

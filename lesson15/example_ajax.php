<?php

include 'config.inc.php';

//echo $_GET['delete']; exit;

$sql = "DELETE FROM ads WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$_GET['delete']]);
if ( !($stmt->rowCount() > 0) ) {
    throw new Exception('Произошла ошибка при удалении.');
} else {
    echo 'Объявление с id = ' . $_GET['delete'] . ' удалён успешно!';
}
<?php

require 'config.inc.php';
//require 'index.php';
require 'Ads.php';

//sleep(7);

switch ($_GET['action']) {
    case 'delete':
        $id = (int)$_GET['id'];
        $ad = new Ads;
        try {
            $ad->delete($db, $id);
            $result['status'] = 'success';
            $result['msg'] = 'Объявление #' . $id . ' удалено успешно!';
            // проверка на наличие объявлений в базе данных
            $res = $db->query("SELECT id FROM ads");
            if (!$row = $res->fetch(PDO::FETCH_ASSOC)) {
                $result['row'] = 'empty';
            }
        } catch (Exception $e) {
            $result['msg'] = 'Ошибка при удалении! Попробуйте ещё раз.';
        }
        break;
    case 'create':
        $ad = new Ads($_POST);
        try {
            $id = $ad->save($db);
            $res = $db->query("SELECT id, title, price, seller_name FROM ads WHERE id = " . $id);
            $result = $res->fetch(PDO::FETCH_ASSOC);
            $ad = new Ads($result);
            $result['tr'] = $smarty->assign('table_ad', $ad)->fetch('table_row.tpl.html');
            $result['status'] = 'success';
            $result['msg'] = 'Объявление успешно добавлено!';
        } catch (Exception $e) {
            $result['status'] = 'error';
            $result['msg'] = 'Ошибка при создании нового объявления. Попробуйте ещё раз.';
        }
        break;
}
// передаём шаблон последней строки в JS
$result['last_tr'] = $smarty->fetch('table_last_tr.tpl.html');

if (isset($result)) echo json_encode($result);
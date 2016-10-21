<?php

require 'config.inc.php';
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
            $result['status'] = 'error';
            $result['msg'] = 'Ошибка при удалении! Попробуйте ещё раз.';
        }
        break;
    case 'create':

        break;
}
if (isset($result)) echo json_encode($result);
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
        } catch (Exception $e) {
            $result['status'] = 'error';
            $result['msg'] = 'Ошибка при удалении! Попробуйте ещё раз.';
        }

        echo json_encode($result);

}
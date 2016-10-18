<?php

require 'config.inc.php';
require 'Ads.php';

//echo $_GET['delete']; exit;
switch ($_GET['action']) {
    case 'delete':
        $id = (int)$_GET['id'];
        $ad = new Ads;
        try {
            $ad->delete($db, $id);
        } catch (Exception $e) {
            $smarty->assign('error', $e->getMessage())->display('error.tpl');
        }

}
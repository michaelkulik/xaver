<?php

/**
 * Class AdsStore - класс-хранилище. Будет заниматься выгрузкой объявлений из БД
 */
class AdsStore
{
    private static $instance;
    private $ads = [];

    private function __construct() {}

    /**
     * Метод для создания экземпляра объекта данного класса
     * @return AdsStore|null
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new AdsStore;
        }
        return self::$instance;
    }

    public function addAds(Ads $ad)
    {
        if (!($this instanceof AdsStore)) {
            die('Нельзя использовать этот метод в конструкторе класса.');
        }
        $this->ads[] = $ad;
    }

    /**
     * Метод получения всех объявлений и помещения их как объектов в хранилище
     * @param PDO $db
     */
    public function getAllAdsFromDb(PDO $db)
    {
        $res = $db->query("SELECT * FROM ads");
        $all = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($all as $value) {
            $ad = new Ads($value);
            self::addAds($ad); // помещаем объекты в хранилище
        }
        return $this->ads;
    }

    public function getAdById(PDO $db, $id)
    {
        $sql = "SELECT * FROM ads WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ad = new Ads($row);
            self::addAds($ad);
            return $this->ads[0];
        } else {
            return false;
        }
    }

    public static function fillData()
    {
        $temp = array(
            'seller_name' => 'Михаил',
            'email' => 'ivan@mail.ru',
            'phone' => '+79059051234',
            'city_id' => '7',
            'category_id' => '3',
            'title' => 'Audi RS ' . substr(time(), -4, 4),
            'description' => 'ОТС. Звоните после 18:00.'
        );
        $ad = new Ads($temp);
        return $ad;
    }
    
//    public function writeOut($smarty)
//    {
//        $row = '';
//        foreach ($this->ads as $value) {
//            $smarty->assign('ad', $value);
//            $row .= $smarty->fetch('table_row.tpl.html');
//        }
//        $smarty->assign('ads', $row);
//    }
}
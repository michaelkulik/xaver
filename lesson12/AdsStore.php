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
        $this->ads[$ad->getId()] = $ad;
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
            $this->addAds($ad); // помещаем объекты в хранилище
        }
    }


    public function writeOut($smarty)
    {
        $row = '';
        foreach ($this->ads as $value) {
            $smarty->assign('ad', $value);
            $row .= $smarty->fetch('table_row.tpl.html');
        }
        $smarty->assign('ads_rows', $row);
    }
}
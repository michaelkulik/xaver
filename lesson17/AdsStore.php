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
        $res = $db->query("SELECT * FROM ads ORDER BY id DESC");
        $all = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($all as $value) {
            $ad = new Ads($value);
            self::addAds($ad); // помещаем объекты в хранилище
        }
        return self::$instance;
    }

    /**
     * Метод получает выбранное объявление и кладёт его в хранилище
     * @param PDO $db
     * @param $id
     * @return bool|mixed
     */
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

    public function prepareForOut($smarty)
    {
        $row = '';
        $n = 1;
        foreach($this->ads as $ad){
            $smarty->assign(['table_ad' => $ad, 'n' => $n]);
            $row .= $smarty->fetch('table_row.tpl.html');
            $n++;
        }
        $smarty->assign('ads_rows', $row);
        return self::$instance;
    }

    public function display($smarty)
    {
        $smarty->display('index.tpl');
    }
}
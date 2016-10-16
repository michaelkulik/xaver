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
//            echo '<pre>';
//            print_r($this->ads[0]);
//            echo '</pre>';exit;
        } else {
            return false;
        }
    }

    public function writeOut($smarty)
    {
        $row = '';
        foreach($this->ads as $ad){
            $smarty->assign('ad', $ad);
            $row .= $smarty->fetch('table_row.tpl.html');
        }
        $smarty->assign('ads_rows', $row);
    }

    /**
     * Метод для заполнения произвольными данными поля формы
     * @return Ads
     */
    public static function fillData()
    {
        $temp = array(
            'id' => isset($_POST['id']) ? $_POST['id'] : null,
            'seller_name' => 'Михаил',
            'email' => 'michael@mail.ru',
            'phone' => '+79059051234',
            'role' => 'private',
            'city_id' => '7',
            'category_id' => '3',
            'title' => 'Audi RS ' . substr(time(), -4, 4),
            'description' => 'ОТС. Звоните после 18:00.'
        );
        $ad = new Ads($temp);
        return $ad;
    }
}
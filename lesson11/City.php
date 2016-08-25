<?php

require_once "Db.php";

class City extends Db
{
    protected $table = 'cities';

    private $id;
    private $name;
    private $postcode;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    public function fetchCities(PDO $c)
    {
        $records = parent::fetchAll($c);
        $cities = [];
        foreach ($records as $record) {
            $cities[$record->getId()] = $record->getName();
        }
        return $cities;
    }
}
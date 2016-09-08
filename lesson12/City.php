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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }
    

    public function fetchCities(PDO $db)
    {
        $records = parent::fetchAll($db);
        $cities = [];
        foreach ($records as $record) {
            $cities[$record->getId()] = $record->getName();
        }
        return $cities;
    }
}
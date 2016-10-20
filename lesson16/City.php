<?php

class City
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
        $sql = 'SELECT * FROM ' . $this->table;
        $res = $db->query($sql);
        $records = [];
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $temp = new $this();
            $temp->setProperties($row);
            $records[] = $temp;
        }
        $cities = [];
        foreach ($records as $record) {
            $cities[$record->getId()] = $record->getName();
        }
        return $cities;
    }

    public function setProperties(array $properties)
    {
        foreach ($properties as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
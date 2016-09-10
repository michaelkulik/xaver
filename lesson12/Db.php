<?php

/**
 * Класс Db решил оставить в качестве универсального класса для выборки данных из БД
 */
class Db
{
    public function fetchAll(PDO $db)
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $res = $db->query($sql);
        $records = [];
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $temp = new $this();
            $temp->setProperties($row);
            $records[] = $temp;
        }
        return $records;
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
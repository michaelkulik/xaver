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

    public function fetchById(PDO $db)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->getId()]);
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->setProperties($row);
            return true;
        } else {
            return false;
        }
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
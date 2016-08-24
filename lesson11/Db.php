<?php

// В этом классе будут несколько методов для работы с базой данных
class Db
{
    public function fetchAds(PDO $c)
    {
        $sql = 'SELECT `id`, `title`, `price`, `seller_name` FROM ' . $this->table;
        $res = $c->query($sql);
        $records = [];
        while ($ad = $res->fetch(PDO::FETCH_ASSOC)) {
            $temp = new $this();
            $temp->setProperties($ad);
            $records[] = $temp;
        }
        return $records;
    }

    public function fetchById(PDO $c)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `id` = ?";
        $stmt = $c->prepare($sql);
        $stmt->execute([$this->getId()]);
        $ad = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setProperties($ad);
    }

    public function setProperties(array $properties)
    {
        $methods = get_class_methods($this);
        foreach ($properties as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
    }
}
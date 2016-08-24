<?php

// В этом классе будут несколько методов для работы с базой данных
class Db
{
    public function fetchAll(PDO $c)
    {
        $sql = 'SELECT * FROM ' . $this->table;
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

    public function save($c)
    {
        if ($this->getId() != null) {
            $this->update();
        } else {
            $this->insert($c);
        }
    }

    public function insert($c)
    {
        $role = $_POST['role'];
        $seller_name = trim($_POST['seller_name']);
        $email = trim($_POST['email']);
        $allow_mails = (isset($_POST['allow_mails'])) ? 'yes' : 'no';
        $phone = trim($_POST['phone']);
        $city_id = $_POST['city_id'];
        $category_id = $_POST['category_id'];
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $price = abs(round($_POST['price']));

        $sql = "INSERT INTO {$this->table} (" . implode(',', $this->cols) . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//        $stmt = $c->prepare($sql);

        $vals = [];
        foreach ($this->cols as $col) {
            $method = 'get' . ucfirst($col);
            $vals[] = $this->$method();
        }
//        $stmt->execute($vals);
        echo $sql;
        $insert_data = [$title, $description, $seller_name, $email, $phone, $price, $role, $allow_mails, $city_id, $category_id];
    }

    public function update()
    {

    }
}
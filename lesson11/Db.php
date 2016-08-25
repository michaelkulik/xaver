<?php

// В этом классе будут несколько методов для работы с базой данных
class Db
{
    public function fetchAll(PDO $c)
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $res = $c->query($sql);
        $records = [];
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $temp = new $this();
            $temp->setProperties($row);
            $records[] = $temp;
        }
        return $records;
    }

    public function fetchById(PDO $c)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `id` = ?";
        $stmt = $c->prepare($sql);
        $stmt->execute([$this->getId()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setProperties($row);
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

    public function save(PDO $c)
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
        $insert_data = [$title, $description, $seller_name, $email, $phone, $price, $role, $allow_mails, $city_id, $category_id];

        if ($this->getId() != null) {
            try {
                $this->update($c, $this->getId(), $insert_data);
            } catch (Exception $e) {
                $e->getMessage();
            }
        } else {
            try {
                $this->insert($c, $insert_data);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }

    public function insert(PDO $c, array $insert_data)
    {
        $sql = "INSERT INTO {$this->table} (" . implode(',', $this->cols) . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $c->prepare($sql);
        if (!$stmt->execute($insert_data)) {
            throw new Exception('Произошла ошибка при попытке вставить данные.');
        }
    }

    public function update(PDO $c, $id, array $insert_data)
    {
        $vals = [];
        foreach ($this->cols as $col) {
            $vals[] = $col . ' = ?';
        }
        $sql = "UPDATE {$this->table} SET " . implode(',', $vals) . " WHERE `id` = $id";
        $stmt = $c->prepare($sql);
        if (!$stmt->execute($insert_data)) {
            throw new Exeption('Произошла ошибка при попытке обновить данные.');
        }
    }

    public function delete(PDO $c, $id)
    {
        if ($this->getId() != null) {
            $sql = "DELETE FROM {$this->table} WHERE id = $id";
            if (!$c->query($sql)) {
                throw new Exception('Произошла ошибка при удалении.');
            }
        }
    }
}
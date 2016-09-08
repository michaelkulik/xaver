<?php

class Ads
{
    private $id;
    private $title;
    private $description;
    private $seller_name;
    private $email;
    private $phone;
    private $price;
    private $role;
    private $allow_mails;
    private $city_id;
    private $category_id;

    public function __construct($ad)
    {
        // если это редактирование объявления
        if (isset($ad['id'])) {
            $this->id = $ad['id'];
        }
        $this->title = trim($ad['title']);
        $this->description = trim($ad['description']);
        $this->seller_name = trim($ad['seller_name']);
        $this->email = trim($ad['email']);
        $this->phone = trim($ad['phone']);
        $this->price = abs(round($ad['price']));
        $this->role = isset($ad['role']) ? $ad['role'] : null;
        $this->allow_mails = isset($ad['allow_mails']) ? 'yes' : 'no';
        $this->city_id = $ad['city_id'];
        $this->category_id = $ad['category_id'];
    }

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSellerName()
    {
        return $this->seller_name;
    }

    /**
     * @param mixed $seller_name
     */
    public function setSeller_name($seller_name)
    {
        $this->seller_name = $seller_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getAllowMails()
    {
        return $this->allow_mails;
    }

    /**
     * @param mixed $allow_mails
     */
    public function setAllow_mails($allow_mails)
    {
        $this->allow_mails = $allow_mails;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * @param mixed $city_id
     */
    public function setCity_id($city_id)
    {
        $this->city_id = $city_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function save(PDO $db)
    {
        $insert_data = [$this->getTitle(), $this->getDescription(), $this->getSellerName(), $this->getEmail(), $this->getPhone(), $this->getPrice(), $this->getRole(), $this->getAllowMails(), $this->getCityId(), $this->getCategoryId()];
        if ($this->getId() != null) {
            $this->update($db, $this->getId(), $insert_data);
        } else {
            $this->insert($db, $insert_data);
        }
    }

    public function insert($c, array $insert_data)
    {
        $sql = "INSERT INTO {$this->table} (" . implode(',', $this->cols) . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $c->prepare($sql);
        if (!$stmt->execute($insert_data)) {
            throw new Exception('Произошла ошибка при попытке вставить данные.');
        }
    }

    public function update($c, $id, array $insert_data)
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

    public function delete(PDO $c)
    {
        if ($this->getId() != null) {
            $sql = "DELETE FROM {$this->table} WHERE id = {$this->getId()}";
            if (!$c->query($sql)) {
                throw new Exception('Произошла ошибка при удалении.');
            }
        }
    }

    public function fillData()
    {
        $temp = array(
            'Seller_name' => 'Михаил',
            'Email' => 'ivan@mail.ru',
            'Phone' => '+79059051234',
            'City_id' => '7',
            'Category_id' => '3',
            'Title' => 'Audi RS ' . substr(time(), -4, 4),
            'Description' => 'ОТС. Звоните после 18:00.'
        );
        foreach ($temp as $key => $value) {
            $method = 'set' . $key;
            $this->$method($value);
        }
    }
}
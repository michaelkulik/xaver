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

    private $table = 'ads';
    private $cols = ['id', 'title', 'description', 'seller_name', 'email', 'phone', 'price', 'role', 'allow_mails', 'city_id', 'category_id'];

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
    public function getSeller_name()
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
    public function getAllow_mails()
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
    public function getCity_id()
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
    public function getCategory_id()
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
        // в $data положим данные для вставки в запрос
        $data = [];
        foreach ($this->cols as $key) {
            $method = 'get' . ucfirst($key);
            $data[] =  $this->$method();
        }

        $sql = "REPLACE INTO {$this->table} (" . implode(',', $this->cols) . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        if (!($stmt->rowCount() > 0)) {
            throw new Exception('Произошла ошибка при добавлении/редактировании данных.');
        }
//        if ($this->getId() != null) {
//            $this->update($db, $this->getId(), $data);
//        } else {
//            $this->insert($db, $data);
//        }
    }

//    public function insert($db, array $data)
//    {
//        $sql = "INSERT INTO {$this->table} (" . implode(',', $this->cols) . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//        $stmt = $db->prepare($sql);
//        $stmt->execute($data);
//        if (!($stmt->rowCount() > 0)) {
//            throw new Exception('Произошла ошибка при добавлении данных.');
//        }
//    }
//
//    public function update($db, $id, array $data)
//    {
//        $vals = [];
//        foreach ($this->cols as $col) {
//            $vals[] = $col . ' = ?';
//        }
//        $sql = "UPDATE {$this->table} SET " . implode(',', $vals) . " WHERE `id` = $id";
//        $stmt = $db->prepare($sql);
//        $stmt->execute($data);
//        if (!($stmt->rowCount() > 0)) {
//            throw new Exeption('Произошла ошибка при попытке обновить данные.');
//        }
//    }

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
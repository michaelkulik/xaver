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
    // список свойств и, соответственно, колонок в БД, которые подлежат актуализации
    private $cols = ['id', 'title', 'description', 'seller_name', 'email', 'phone', 'price', 'role', 'allow_mails', 'city_id', 'category_id'];

    public function __construct($ad = null)
    {
        // если это редактирование объявления, то помещаем значение id в свойство $id
        if (isset($ad['id'])) {
            $this->id = $ad['id'];
        }
        $this->title = trim($ad['title']);
        $this->description = trim($ad['description']);
        $this->seller_name = trim($ad['seller_name']);
        $this->email = trim($ad['email']);
        $this->phone = trim($ad['phone']);
        $this->price = isset($ad['price']) ? abs(round($ad['price'])) : null;
        $this->role = isset($ad['role']) ? $ad['role'] : null;
        if (isset($ad['allow_mails'])) {
            if ($ad['allow_mails'] == 'on') {
                $this->allow_mails = 'yes';
            } else {
                $this->allow_mails = $ad['allow_mails'];
            }
        } else {
            $this->allow_mails = 'no';
        }
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

    /**
     * Метод сохранения и редактирования объявления
     * @param PDO $db
     * @throws Exception
     */
    public function save(PDO $db)
    {
        $data = []; // в $data положим данные для вставки в запрос SQL
        foreach ($this->cols as $key) {
            $method = 'get' . ucfirst($key);
            $data[] =  $this->$method();
        }
        $sql = "REPLACE INTO {$this->table} (" . implode(',', $this->cols) . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        if (!($stmt->rowCount() > 0)) {
            throw new Exception('Произошла ошибка при добавлении/редактировании данных.');
        }
    }

    public function delete(PDO $db, $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        if ( !($stmt->rowCount() > 0) ) {
            throw new Exception('Произошла ошибка при удалении.');
        }
    }
}
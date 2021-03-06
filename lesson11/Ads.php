<?php

require_once 'Db.php';

class Ads extends Db
{
    protected $table = 'ads';
    protected $cols = ['title', 'description', 'seller_name', 'email', 'phone', 'price', 'role', 'allow_mails', 'city_id', 'category_id'];

    // columns in the table
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
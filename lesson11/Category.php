<?php

require_once 'Db.php';

class Category extends Db
{
    protected $table = 'categories';

    private $id;
    private $name;
    private $parent_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }
    
    public function fetchCategories(PDO $c)
    {
        $records = parent::fetchAll($c);
        $cats = [];
        foreach ($records as $record) {
            if(!$record->getParentId()){ // если parent_id = 0
                $cats[$record->getId()][] = $record->getName(); // $cat[1][0] = значение поля name
            } else { // если parent_id != 0
                $cats[$record->getParentId()]['sub'][$record->getId()] = $record->getName(); // $cat[1]['sub'][6] (введём sub для дочерних категорий)
            }
        }
        return $cats;
    }
}
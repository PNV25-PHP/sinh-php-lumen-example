<?php

abstract class BaseModel
{
    private $id;

    public function getId()
    {
        return $this->id;
    }
}

abstract class BaseRepository
{
    private $tableName;

    public function __construct($tableName) {
        $this->tableName = $tableName;
    }

    public function SelectAll() {
        $querty = "select * from $this->tableName";

        // database excute
    }
}

class ProductRepositoru extends BaseRepository
{
    static $tableName = "products";

    public function __construct() {
        parent::__construct(ProductRepositoru::$tableName);
    }
}

$x = new ProductRepositoru();

$x->SelectAll();

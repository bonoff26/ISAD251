<?php

class Item
{
    public $ID;
    public $name;
    public $description;
    public $quantity;
    public $price;
    public $type;
    public $conn;
    public $table;

    public function __construct($db) {
        $this->conn = $db;
    }

    // read products
    public function read(){

        $query = 'SELECT * FROM MenuItem';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $stmt;

    }

    public static function getMenuData($data) {
        $readable = json_decode($data);
        return $readable;
    }



    public function ID() {
        return $this->ID;
    }

    public function Name() {
        return $this->name;
    }

    public function Desc() {
        return $this->description;
    }

    public function Quant() {
        return $this->quantity;
    }

    public function Price() {
        return $this->price;
    }

    public function Type() {
        return $this->type;
    }


}


?>

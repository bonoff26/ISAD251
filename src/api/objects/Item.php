<?php

include_once '../model/DbContext.php';

class Item {

    private $db;

    public function __construct()
    {
        $db = new DbContext();
    }
}
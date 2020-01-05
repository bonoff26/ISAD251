<?php

class MenuItem
{
    private $ID;
    private $name;
    private $description;
    private $quantity;

    public function __construct($ID, $NAME, $DESC, $QUANT) {
        $this->ID = $ID;
        $this->name = $NAME;
        $this->description = $DESC;
        $this->quantity = $QUANT;
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


}


?>

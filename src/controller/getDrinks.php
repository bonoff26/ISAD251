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

    public function getInfo() {
        $sql = "SELECT * FROM `menuitem`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $menuitems = [];

        if ($results) {
            foreach($results as $row)
            {
                $menuitem = new MenuItem($row['MenuItemID'], $row['Name'], $row['Description'], $row['Quantity']);
                $menuitems[] = $menuitem;
                $_SESSION['NumOfItems'] ++;
            }
        }

        return $menuitems;

    }
}


?>

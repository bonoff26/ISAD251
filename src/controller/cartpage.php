<link rel="stylesheet" href="../../assets/css/cartpage.css">

<?php
include_once '../model/cartpage.php';
include_once '../../public/includes/session.php';
include_once '../model/DbContext.php';
include_once "../../assets/html/bootstrap.html";
?>



<?php

class CartPageController {

    function __construct()
    {

    }

    function showItems() {
        $db = new DbContext();
        $items = $db->getInfo();

        if($items) {
            foreach ($items as $item) {
                //$_SESSION['TakeAction'] = $item->ID();
                $optionString = "";
                $optionString .= "<option value=" . $item->ID() . ">" . $item->Name() . ">" . $item->Quant() . ">" . $item->Desc() . ">" . $item->Price() . "</option>";

                $keys = array_keys($_SESSION['cart']);
                $values = array_values($_SESSION['cart']);
                $total = 0;
                for ($i = 0; $i < count($keys); $i++) {
                    if ($keys[$i] == $item->ID()) {
                        echo "<div class='card'>";

                        echo"<div class='card-body''>";
                        echo"<h5 class='card-title'>"; echo $item->Name(); echo "</h5>";
                        echo"<p class='card-text'>"; echo "Amount: " . $values[$i]; echo "</p>";
                        $id = $item->ID();
                        echo "<form action='../model/addItem.php' method='post'>";
                        echo "<button name='action_button' class='btn btn-primary' type='submit' value='$id'>Add</button>";
                        echo "</form>";
                        echo "<form action='../model/removeItem.php' method='post'>";
                        echo "<button name='remove_button' class='btn btn-danger' type='submit' value='$id'>Remove</button>";
                        echo "</form>";
                        echo"</div>";
                        echo"</div>";
                    }
                }
            }
        }

    }

}

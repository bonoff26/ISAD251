<?php
include "../../public/includes/session.php";
include_once "../../assets/html/bootstrap.html";


?>

<?php
include_once '../model/getDrinks.php';
include_once '../model/DbContext.php';

class Controller {

    private $optionString;
    private $db;
    private $items;
    private $total;
    private $itemCount;

    function GetDbItems()
    {
        $db = new DbContext();
        $items = $db->getInfo();


        if($items) {
            foreach($items as $item) {
                //$_SESSION['TakeAction'] = $item->ID();
                $optionString = "";
                $optionString .= "<option value=".$item->ID().">".$item->Name().">".$item->Quant().">".$item->Desc().">".$item->Price()."</option>";
                if ($item->Quant() > 0) {

                    echo "<div class='card' style='width: 18rem;'>";

                    echo"<div class='card-body''>";
                    echo"<h5 class='card-title'>"; echo $item->Name(); echo "</h5>";
                    echo"<p class='card-text'>"; echo $item->Desc(); echo "</p>";
                    $id = $item->ID();
                    echo "<form action='../model/addItem.php' method='post'>";

                    echo "<button name='action_button' class='btn btn-primary' type='submit' value='$id'>Add to cart</button>";
                    //echo "<a class='btn btn-primary' href='../model/addItem.php' role='button'>Add to Cart</a>";
                    echo "</form>";
                    echo"</div>";
                    echo"</div>";
                }

                else {
                    echo "<div class='card' style='width: 18rem;'>";

                    echo"<div class='card-body''>";
                    echo"<h5 class='card-title'>"; echo $item->Name(); echo "</h5>";
                    echo"<p class='card-text'>"; echo $item->Desc(); echo "</p>";
                    echo"<a href='#' class='btn btn-danger'>Out of stock</a>";
                    echo"</div>";
                    echo"</div>";

                }
            }


        }
    }
}


    //$test = $_SESSION['test'];

    //$num = count($_SESSION['cart']);
    //echo "In Cart:  $num";


?>
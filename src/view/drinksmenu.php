<?php
include_once "../../public/includes/session.php";
include_once "../../assets/html/bootstrap.html";
include_once "../../public/includes/sidebar.php";


?>

<link rel="stylesheet" href="../../assets/css/landing.css">
<link rel="stylesheet" href="../../assets/css/drinksmenu.css">

<?php
include_once '../model/getDrinks.php';
include_once '../model/DbContext.php';
include_once '../../public/includes/navbar.php';

    $optionString = "";

    $db = new DbContext();
    $items = $db->getInfo();
    $total = 0;
    $itemCount = 0;

    echo "<pre>", print_r($_SESSION['cart'], true), "</pre>";
    //$num = count($_SESSION['cart']);
    //echo "In Cart:  $num";

    if($items) {
        foreach($items as $item) {
            $_SESSION['TakeAction'] = $item->ID();
            $optionString = "";
            $optionString .= "<option value=".$item->ID().">".$item->Name().">".$item->Quant().">".$item->Desc().">".$item->Price()."</option>";
            if ($item->Quant() > 0) {

                echo "<div class='card' style='width: 18rem;'>";

                  echo"<div class='card-body''>";
                    echo"<h5 class='card-title'>"; echo $item->Name(); echo "</h5>";
                    echo"<p class='card-text'>"; echo $item->Desc(); echo "</p>";
                    $id = $item->ID();
                    echo"<form action='../model/addItem.php' method='post'>";

                    echo "<button name='action_button' class='btn btn-primary' type='submit' value='$id'>Submit</button>";
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

?>
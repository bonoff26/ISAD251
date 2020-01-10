<?php
include "../../public/includes/session.php";
include_once "../../assets/html/bootstrap.html";


?>

<?php
include_once '../../src/api/objects/Item.php';
include_once '../model/DbContext.php';

class SnacksController {

    private $optionString;
    private $db;
    private $items;
    private $total;
    private $itemCount;

    function GetDbItems()
    {
        $url="http://web.socem.plymouth.ac.uk/isad251/TAllenbrook/src/api/read.php";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $auth = curl_exec($curl);
        if($auth)
        {
            $json = json_decode($auth, true);
        }
        $newData = $json;
        $db = new DbContext();

        $item = new Item($db);

        if($newData) {
            for ($i=0; $i<count($newData['records']); $i++) {
                //$_SESSION['TakeAction'] = $item->ID();

                if ($newData['records'][$i]['Quantity'] > 0 && $newData['records'][$i]['Type'] == "f") {
                    echo "<div class='card' style='width: 18rem;'>";

                    echo"<div class='card-body''>";
                    echo"<h5 class='card-title'>"; echo $newData['records'][$i]['Name']; echo "</h5>";
                    echo"<p class='card-text'>"; echo $newData['records'][$i]['Description']; echo "</p>";
                    $id = $item->ID();
                    echo "<form action='../model/addItem.php' method='post'>";

                    echo "<button name='action_button' class='btn btn-primary' type='submit' value='$id'>Add to cart</button>";
                    //echo "<a class='btn btn-primary' href='../model/addItem.php' role='button'>Add to Cart</a>";
                    echo "</form>";
                    echo"</div>";
                    echo"</div>";
                }

                else if ($newData['records'][$i]['Quantity'] <= 0 && $newData['records'][$i]['Type'] == 'f'){
                    echo "<div class='card' style='width: 18rem;'>";

                    echo"<div class='card-body''>";
                    echo"<h5 class='card-title'>"; echo $newData['records'][$i]['Name']; echo "</h5>";
                    echo"<p class='card-text'>"; echo $newData['records'][$i]['Description']; echo "</p>";
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
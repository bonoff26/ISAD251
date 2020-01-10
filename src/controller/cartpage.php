<link rel="stylesheet" href="../../assets/css/cartpage.css">

<?php
include_once '../model/cartpage.php';
include_once '../../public/includes/session.php';
include_once '../model/DbContext.php';
include_once "../../assets/html/bootstrap.html";
include_once '../../src/api/objects/Item.php';
?>



<?php

class CartPageController {

    function __construct()
    {

    }

    function showItems() {
        $url="http://web.socem.plymouth.ac.uk/isad251/TAllenbrook/src/api/read.php";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $found = false;
        $auth = curl_exec($curl);
        if($auth)
        {
            $json = json_decode($auth, true);
        }
        $newData = $json;



        if($newData) {

            for ($i=0; $i<count($newData['records']); $i++) {

                $keys = array_keys($_SESSION['cart']);
                $values = array_values($_SESSION['cart']);
                $total = 0;
                for ($j = 0; $j < count($keys); $j++) {

                    if ($keys[$j] == $newData['records'][$i]['MenuItemID']) {
                        $found = true;
                        echo "<div style='padding-left: 2%; padding-top: 2%; display: inline-block'>";
                        echo "<div class='card'>";

                        echo"<div class='card-body''>";
                        echo"<h5 class='card-title'>"; echo $newData['records'][$i]['Name']; echo "</h5>";
                        echo"<p class='card-text'>"; echo "Amount: " . $values[$j]; echo "</p>";
                        echo"<p class='card-text'>"; echo "Cost: £" . $values[$j]*$newData['records'][$i]['Price']; echo "</p>";
                        $id = $newData['records'][$i]['MenuItemID'];
                        echo "<div style='padding-left: 3%; padding-top: 4%; display: inline-block;'>";
                            echo "<form action='../model/addItem.php' method='post'>";
                            echo "<button name='action_button' class='btn btn-primary' type='submit' value='$id'>Add</button>";
                            echo "</form>";
                        echo"</div>";

                        echo "<div style='padding-left: 3%; padding-top: 4%; display: inline-block;'>";
                            echo "<form action='../model/removeItem.php' method='post'>";
                            echo "<button name='remove_button' class='btn btn-danger'  type='submit' value='$id'>Remove</button>";
                            echo "</form>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                    }
                }
            }
        }
        if (!$found) {
            echo "<h2>No items in basket</h2>";
        }

    }

}

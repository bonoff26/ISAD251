<?php
if(!isset($_SESSION))
{
    session_start();
    if (!isset($_SESSION["NumOfItems"])) {
        $_SESSION["NumOfItems"] = 0;
    }
    if (!isset($_SESSION["ItemID"]) && !isset($_SESSION["cart"])) {
        $_SESSION["ItemID"]=0;
        $_SESSION["NumOfItems"]=0;
        $product_id = 0;
        $_SESSION["cart"][$product_id][] = array();
    }

    $_SESSION['test'] = "4";
    echo '<script>console.log("Session started")</script>';
}
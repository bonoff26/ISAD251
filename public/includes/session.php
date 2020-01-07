<?php
if(!isset($_SESSION))
{
    session_start();
    $_SESSION["ItemID"]=0;
    $product_id = 0;
    $_SESSION["cart"][$product_id][] = array(
        '0' => '0'
    );

    echo '<script>console.log("Session started")</script>';
}
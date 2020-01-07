<?php
include_once "../../public/includes/session.php";
header("Location: ../view/drinksmenu.php");

function add_to_cart ($product_id) {
    $_SESSION['cart'][$product_id]++;
}

$var = $_POST["action_button"];
add_to_cart($var);




//var_dump($_SESSION["cart"]);
//array_push($_SESSION["Cart"], $var);
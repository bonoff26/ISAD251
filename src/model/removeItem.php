<?php
include_once "../../public/includes/session.php";
header('Location: ' . $_SERVER['HTTP_REFERER']);



function remove_from_cart ($product_id) {
    $_SESSION['cart'][$product_id]--;
}

$var = $_POST["remove_button"];
remove_from_cart($var);


//echo '<script>window.location="../view/drinksmenu.php"</script>';

//var_dump($_SESSION["cart"]);
//array_push($_SESSION["Cart"], $var);
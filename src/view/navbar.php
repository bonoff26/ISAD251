<link rel="stylesheet" href="../../assets/css/navbar.css">

<nav class="navbar navbar-light bg-light">

<?php
include "../../public/includes/session.php";
include_once '../controller/navcontroller.php';

$controller = new NavController();

$var = $controller->getCartController();
echo "<a class='navbar-brand' href='#'>Your Cart: $var </a>";
include_once '../controller/seecartbutton.php';
$buttonController = new ButtonController();
$buttonController->ShowButton();
echo "</nav>";



?>
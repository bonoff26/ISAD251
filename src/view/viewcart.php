<?php
include "../../public/includes/session.php";
include_once "../../assets/html/bootstrap.html";
include_once 'navbar.php';
include_once "../../public/includes/sidebar.php";


?>

<link rel="stylesheet" href="../../assets/css/landing.css">
<link rel="stylesheet" href="../../assets/css/drinksmenu.css">


<?php
//include_once '../../src/api/objects/Item.php';
include_once '../model/DbContext.php';
include_once '../controller/drinksmenu.php';
//print_r($_SESSION);

$drinkController = new Controller();
$drinkController->GetDbItems();

?>
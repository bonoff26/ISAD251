<?php
//header("Location: ../view/drinksmenu.php");
$var = $_SESSION["ItemID"];
array_push($_SESSION["Cart"], $var);
$_SESSION['NumOfItems']++;
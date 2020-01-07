<link rel="stylesheet" href="../../assets/css/navbar.css.css">

<nav class="navbar navbar-light bg-light">

<?php
include_once "session.php";
if (!isset($_SESSION["NumOfItems"])) {
    $_SESSION["NumOfItems"] = 0;
}
$var = $_SESSION["NumOfItems"];
echo "<a class='navbar-brand' href='#'>Your Cart: $var </a>";
echo "</nav>";
?>
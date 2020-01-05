<?php
include_once "../assets/html/bootstrap.html";
if(!isset($_SESSION))
{
    session_start();
    $_SESSION["NumOfItems"]=0;
    echo '<script>console.log("Session started")</script>';
}
?>

<link rel="stylesheet" href="../assets/css/background.css">
<link rel="stylesheet" href="../assets/css/landing.css">

<nav class="navbar fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#">Fixed top</a>
</nav>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="buttons">
        <a class="btn btn-secondary" id="1" href="../src/model/drinksmenu.php" role="button">Drinks Menu</a>
        <a class="btn btn-secondary" id="2" href="#" role="button">Snacks Menu</a>
    </div>
</div>
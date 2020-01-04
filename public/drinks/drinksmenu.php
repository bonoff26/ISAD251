<?php
include_once "../../assets/html/bootstrap.html";
include_once "../includes/sidebar.php";
if(!isset($_SESSION))
{
    session_start();
    echo '<script>console.log("Session started")</script>';
}
?>

<link rel="stylesheet" href="../../assets/css/landing.css">

<?php
include_once '../../src/controller/getDrinks.php';

//fetches the current tickets from the session arrays
//NumOfTickets is how many tickets a user has
//TicketOpen is if the current ticket is open/closed

for ($i = 1; $i <= $_SESSION['NumOfItems']; $i++) {
    if ($_SESSION['InStock'][$i] == '1') { //if in stock
        echo "<div class='alert alert-success' role='alert'>";
    }
    else { //if out of stock
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<h3>Out Of Stock</h3>";
    }
    echo "<br>";
    echo "Menu Item ID: ";
    echo $_SESSION['ItemID'][$i];
    echo "<br>";
    echo "Name: ";
    echo $_SESSION['Name'][$i];
    echo "<br>";
    echo "Info: ";
    echo $_SESSION['Description'][$i];
    echo "<br><br>";
    $_SESSION['TakeAction'] = $i;
    //echo "<a class='btn btn-primary' href='ticketAction.php' role='button'>Take action</a>";
    $currentID = $i;
    if ($_SESSION['TicketOpen'][$i] == 1) {
        echo "<form action='ticketAction.php' method='post'>";
    }


    echo "</div>";
}
?>
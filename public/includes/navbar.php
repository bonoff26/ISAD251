<link rel="stylesheet" href="../../assets/css/navbar.css">

<nav class="navbar navbar-light bg-light">

<?php
include "session.php";
if (isset($_SESSION['cart'])) {
    $var = getCart();
}
else {
    $var = 0;
}
$var--;
echo "<a class='navbar-brand' href='#'>Your Cart: $var </a>";
echo "</nav>";


function getCart () {
    $keys = array_values($_SESSION['cart']);
    $total = 0;
    for ($i = 0; $i < count($keys); $i++) {
        $total += (int)$keys[$i];
    }
    return $total;
}
?>
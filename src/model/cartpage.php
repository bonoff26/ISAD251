<?php
include_once '../model/cartpage.php';


class CartPageModel {

    function removeitem($id) {
        $_SESSION['cart'][$id]--;
    }

    function additem($id) {
        $_SESSION['cart'][$id]++;
    }


}
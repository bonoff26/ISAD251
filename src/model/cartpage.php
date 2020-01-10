<?php
//include_once '../model/cartpage.php';


class CartPageModel {

    function removeitem($id) {
        if ($_SESSION['cart'][$id] > 0) {
            $_SESSION['cart'][$id]--;
        }

    }

    function additem($id) {
        $_SESSION['cart'][$id]++;
    }


}
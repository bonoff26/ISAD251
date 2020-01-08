<?php
class NavModel {

    function __construct()
    {

    }

    function getCart () {
        $keys = array_values($_SESSION['cart']);
        $total = 0;
        for ($i = 0; $i < count($keys); $i++) {
            $total += (int)$keys[$i];
        }
        $total--;
        return $total;
    }
}
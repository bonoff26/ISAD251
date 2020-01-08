<?php
include_once '../model/navmodel.php';


class NavController {

    function getCartController() {
        $model = new NavModel();
        return $model->getCart();
    }


}




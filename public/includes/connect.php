<?php

function getConnection() {
    $dsn = "mysql:host=proj-mysql.uopnet.plymouth.ac.uk;dbname=isad251_tallenbrook";
    $user = "ISAD251_TAllenbrook";
    $passwd = "ISAD251_22214098";

    try {
        $pdo = new PDO($dsn, $user, $passwd);
    }
    catch (PDOException $err) {
        echo 'Connection failed: ', $err->getMessage();
    }
}





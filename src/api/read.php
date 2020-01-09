<?php
// required headers
include_once '../model/DbContext.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$db = new DbContext();

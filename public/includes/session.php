<?php
if(!isset($_SESSION))
{
    session_start();
    $_SESSION["NumOfItems"]=0;
    $_SESSION["ItemID"]=0;
    $_SESSION["Cart"] = array();
    echo '<script>console.log("Session started")</script>';
}
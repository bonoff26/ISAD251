<?php
include_once "../../assets/html/bootstrap.html";
include_once "../../public/includes/sidebar.php";
if(!isset($_SESSION))
{
    session_start();
    echo '<script>console.log("Session started")</script>';
}
?>

<link rel="stylesheet" href="../../assets/css/landing.css">

<?php
include_once 'getDrinks.php';
include_once 'DbContext.php';

    $optionString = "";

    $db = new DbContext();
    $items = $db->getInfo();

    if($items) {
        foreach($items as $item) {
            $optionString .= "<option value=".$item->ID().">".$item->Name().">".$item->Quant().">".$item->Desc()."</option>";
            if ($item->Quant() > 0) {
                echo "<div class='alert alert-success' role='alert'>";
                echo $item->Name();
            }
            else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo $item->Name();
            }
        }


    }

?>
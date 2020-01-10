<?php
// include database and object files
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../src/model/DbContext.php';
include_once 'objects/Item.php';

// instantiate database and product object


// initialize object


// query products



function read() {
    $database = new DbContext();
    $db = $database->connect();
    $item = new Item($db);

    $result = $item->read();

    $num = $result->rowCount();
    // check if more than 0 record found
    if($num>0){

        // products array
        $items_array=array();
        $items_array["records"]=array();

        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);

            $product_item = array(
                'MenuItemID' => $MenuItemID,
                'Name' => $Name,
                'Price' => $Price,
                'Description' => $Description,
                'Quantity' => $Quantity,
                'Type' => $Type
            );

            array_push($items_array["records"], $product_item);
        }

        // set response code - 200 OK
        http_response_code(200);

        // show products data in json format
        echo json_encode($items_array);
    }
}

read();

// read products will be here
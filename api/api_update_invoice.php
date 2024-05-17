<?php

header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents('php://input'); // return string
    parse_str($input, $_UPDATE);

    $invdate = $_UPDATE['invdate'];
    $tax = $_UPDATE['tax'];
    $netprice = $_UPDATE['netprice'];
    $carserialnumber = $_UPDATE['carserialnumber'];
    $customerid = $_UPDATE['customerid'];
    $id = $_UPDATE['id'];

    $res = $config->updateinvoice($invdate,$tax,$netprice,$carserialnumber,$customerid,$id);

    if ($res) {
        $arr['data'] = "Record Updated Successfully...";
    } else {
        $arr['data'] = "Record Updation Failed...";
    }

} else {
    $arr['err'] = "Only PUT and PATCH HTTP request methods are allowed...";
}
echo json_encode($arr);

?>
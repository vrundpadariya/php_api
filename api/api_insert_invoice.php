<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $invdate = $_POST['invdate'];
    $tax = $_POST['tax'];
    $netprice = $_POST['netprice'];
    $carserialnumber = $_POST['carserialnumber'];
    $customerid = $_POST['customerid'];


    $res = $config->insertinvoicedetail($invdate, $tax, $netprice,$carserialnumber,$customerid);
    

    if ($res) {
        $arr['data'] = "Data inserted Successfully...";
        http_response_code(201);
    } else {
        $arr['data'] = "Data insertion Faild...";
    }
} else {
    $arr['err'] = "Only POST HTTP Request Method is allowed...";
}

echo json_encode($arr);

?>
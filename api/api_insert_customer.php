<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];


    $res = $config->insertcustomer($first_name, $last_name, $phone_number);
    

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
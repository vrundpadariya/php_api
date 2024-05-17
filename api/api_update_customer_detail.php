<?php

header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents('php://input'); // return string
    parse_str($input, $_UPDATE);

    $first_name = $_UPDATE['first_name'];
    $last_name = $_UPDATE['last_name'];
    $phone_number = $_UPDATE['phone_number'];
    $Id = $_UPDATE['Id'];

    $res = $config->updatecustomer($first_name,$last_name,$phone_number,$Id);

    if ($res) {
        $arr['data'] = "Record Updated Successfully...";
    } else {
        $arr['data'] = "Record Updation Successfully...";
    }

} else {
    $arr['err'] = "Only PUT and PATCH HTTP request methods are allowed...";
}
echo json_encode($arr);

?>
<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Id = $_POST['Id'];

    $res = $config->fetchsinglecustomerdetail($Id);
    $result = mysqli_fetch_assoc($res);

    $arr['data'] = $result;
} else {
    $arr['err'] = "Only GET HTTP request method is allowed...";
}

echo json_encode($arr);


?>
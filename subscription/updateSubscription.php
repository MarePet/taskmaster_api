<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php';

$subId = $_POST['sub_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$maxUsers = $_POST['max_users'];

$sqlQuery = "UPDATE `subscriptions` SET `sub_id`=$subId,`name`='$name',`price`='$price',`max_users`=$maxUsers WHERE sub_id = $subId";

$result = $connectNow->query($sqlQuery);

if ($result) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
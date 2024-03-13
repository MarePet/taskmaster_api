<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php';

$userId = $_POST['user_id'];
$subId = $_POST['sub_id'];

$sqlQuery = "UPDATE users SET sub_id = $subId WHERE user_id = $userId;";


$result = $connectNow->query($sqlQuery);

if($result){
    echo json_encode(array('success' => true));
}else{
    echo json_encode(array('success' => false));
}
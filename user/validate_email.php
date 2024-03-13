<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php'; 

$email = $_POST['email'];
$sqlQuery = "SELECT * FROM users WHERE email = '$email'";

$result = $connectNow->query($sqlQuery);

if($result->num_rows > 0){
    echo json_encode(array("emailFound"=> true));
}
else{
    echo json_encode(array("emailFound"=> false,));
}

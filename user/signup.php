<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php'; 

//POST - sending data to db
//GET - return data from db


$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$userRole = $_POST['user_role'];
$subscriptionId = $_POST['sub_id'];

$sqlQuery = "INSERT INTO users 
SET first_name = '$firstName',
    last_name = '$lastName',
    email = '$email',
    password = '$password',
    user_role = $userRole,
    sub_id = $subscriptionId";

$result = $connectNow->query($sqlQuery);

if($result){
    echo json_encode(array("success"=> true));
}
else{
    echo json_encode(array("success"=> false));
}
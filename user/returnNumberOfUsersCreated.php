<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php';

$userId = $_POST['user_id'];

$sqlQuery = "SELECT COUNT(*) AS user_count FROM users WHERE owner_id = $userId";

$result = $connectNow->query($sqlQuery);

if ($result) {
    $row = $result->fetch_assoc();
    $user_count = $row['user_count'];
    echo intval($user_count);
} else {
    echo null;
}

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php'; 

$ownerId = $_POST['owner_id'];

$sqlQuery = "SELECT * FROM users WHERE owner_id = $ownerId";

$result = $connectNow->query($sqlQuery);

$users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    
    // Output tasks as JSON
    echo json_encode($users);

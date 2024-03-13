<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php';

$userId = $_POST['user_id'];

$sqlQuery = "SELECT subscriptions.* FROM subscriptions
JOIN users ON users.sub_id = subscriptions.sub_id
WHERE users.user_id = $userId";

$result = $connectNow->query($sqlQuery);

if ($result->num_rows > 0) {
    $subRecord = array();
    while ($row = $result->fetch_assoc()) {
        $subRecord[] = $row;
    }
    echo json_encode(
        array(
            "success" => true,
            "subData" => $subRecord[0],
        )
    );
} else {
    echo json_encode(array("success" => false));
}
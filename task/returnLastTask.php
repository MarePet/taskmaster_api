<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php'; 

$creatorId = $_POST['creator_id'];

$sqlQuery = "SELECT * FROM task WHERE creator_id = $creatorId ORDER BY task_id DESC LIMIT 1";

$result = $connectNow->query($sqlQuery);

if ($result->num_rows > 0) {
    $task = array();
    while ($row = $result->fetch_assoc()) {
        $task[] = $row;
    }
    echo json_encode(
        array(
            "success" => true,
            "task" => $task[0],
        )
    );
} else {
    echo json_encode(array("success" => false));
}
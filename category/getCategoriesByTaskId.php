<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
include '../connection.php';

$taskId = $_POST['task_id'];

$sqlQuery = "SELECT categories.* FROM categories
JOIN task_category ON categories.category_id = task_category.category_id
WHERE task_category.task_id = $taskId";

$result = $connectNow->query($sqlQuery);

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}
echo json_encode($categories);
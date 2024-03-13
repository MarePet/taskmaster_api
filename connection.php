<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
$serverHost = "fdb1032.awardspace.net";
$user = "4455490_tskmstr";
$password = "parcepapira1";
$databse = "4455490_tskmstr";

$connectNow = new mysqli($serverHost, $user, $password, $databse);


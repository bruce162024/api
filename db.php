<?php
$host = "sql105.infinityfree.com";   // OR your Render DB host
$user = "if0_41089035";
$pass = "7jE0zv5H2C";
$db   = "if0_41089035_irrs_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "DB connection failed"]);
    exit;
}
?>

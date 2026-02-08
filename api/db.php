<?php
header("Content-Type: application/json");

// 🔧 DATABASE CONFIG (Render / InfinityFree / Remote MySQL)
$host = "sql105.infinityfree.com";
$user = "if0_41089035";
$pass = "7jE0zv5H2C";
$db   = "if0_41089035_irrs_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);
    exit;
}
?>


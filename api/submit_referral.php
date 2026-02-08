<?php
require_once "db.php";

// ❌ Block GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "POST only"]);
    exit;
}

// 📥 Read raw JSON body
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

// ❌ Invalid JSON
if (!$data) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "Invalid JSON"
    ]);
    exit;
}

// 🧠 Store entire payload as JSON (SAFE & FLEXIBLE)
$jsonData = json_encode($data);

// 🗄️ Insert into database
$stmt = $conn->prepare(
    "INSERT INTO referrals (payload, created_at) VALUES (?, NOW())"
);

$stmt->bind_param("s", $jsonData);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "ok",
        "id" => $stmt->insert_id
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Insert failed",
        "sql_error" => $conn->error
    ]);
}

$stmt->close();
$conn->close();


<?php

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit();
}

include 'db_connection.php';

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$phone = $_POST["phone"] ?? "";
$message = $_POST["message"] ?? "";

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(["status" => "error", "message" => "Name, email, and message are required fields."]);
    exit();
}

$sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    exit();
}

$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message Saved Successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to save message: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
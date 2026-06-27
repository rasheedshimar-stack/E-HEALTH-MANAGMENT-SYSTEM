<?php

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit();
}

include 'db_connection.php';

$sql = "UPDATE about_content SET title=?, paragraph1=?, paragraph2=?, mission=?, vision=?, core_values=? WHERE id=?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    exit();
}

$stmt->bind_param(
    "ssssssi",
    $_POST['title'],
    $_POST['paragraph1'],
    $_POST['paragraph2'],
    $_POST['mission'],
    $_POST['vision'],
    $_POST['core_values'],
    $_POST['id']
);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Content updated successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update content: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
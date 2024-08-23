<?php
include("db.php");
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
    exit;
}

$name = $data['name'];
$username = $data['username'];
$email = $data['email'];
$gender = $data['gender'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (name, username, email, gender, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $username, $email, $gender, $password);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'User registered successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'User registration failed']);
}

$stmt->close();
$conn->close();
?>

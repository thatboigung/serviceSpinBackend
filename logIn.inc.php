<?php
session_start();
header('Content-Type: application/json');
include("db.php");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
    exit;
}

$usernameOrEmail = $data['usernameOrEmail'] ?? null;
$password = $data['password'] ?? null;

if (!$usernameOrEmail || !$password) {
    echo json_encode(['success' => false, 'message' => 'Username/Email and Password are required']);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }

    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();
 $_SESSION['user_id'] = $id; // Store user ID in session
            echo json_encode(['success' => true, 'user' => ['id' => $id, 'username' => $username]]);
        // if (password_verify($password, $hashedPassword)) {
           
        // } else {
        //     echo json_encode(['success' => false, 'message' => 'Invalid password']);
        // }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

$conn->close();
?>

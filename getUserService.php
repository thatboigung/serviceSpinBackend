<?php
include("db.php");

$userId = $_GET['userId'];

if (!$userId) {
    echo json_encode(['success' => false, 'message' => 'User ID is required']);
    exit;
}

$query = $conn->prepare("SELECT name, profilePic, bio, serviceName, serviceDesc, location, price FROM srvc_prders WHERE user_id = ?");
$query->bind_param("s", $userId);

if ($query->execute()) {
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(['success' => true, 'user' => $user]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No user found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Query execution failed']);
}

$query->close();
$conn->close();
?>

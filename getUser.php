<?php
include("db.php");


if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    
    $stmt = $conn->prepare("SELECT id, name, email, profile_pic, whyHere FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(['success' => true, 'user' => $user]);
        $isServiceProviderQuery = $conn->prepare("SELECT COUNT(*) FROM service_providers WHERE user_id = ?");
$isServiceProviderQuery->bind_param("i", $id);
$isServiceProviderQuery->execute();
$isServiceProviderQuery->bind_result($isServiceProvider);
$isServiceProviderQuery->fetch();
$isServiceProviderQuery->close();

echo json_encode(['success' => true, 'user' => ['id' => $id, 'username' => $username, 'isServiceProvider' => $isServiceProvider > 0]]);

    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No user ID provided']);
}

$conn->close();
?>

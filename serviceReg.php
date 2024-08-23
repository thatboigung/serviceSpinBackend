<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['userId'];
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $serviceName = $_POST['serviceName'];
    $serviceDesc = $_POST['serviceDesc'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    
    // Handle file upload
    $profilePic = $_FILES['profilePic'];

    if ($profilePic && $profilePic['error'] === 0) {
        $uploadDir = 'profilePics/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . basename($profilePic['name']);

        if (move_uploaded_file($profilePic['tmp_name'], $uploadFile)) {
            $stmt = $conn->prepare("INSERT INTO srvc_prders (user_id, name, profilePic, bio, serviceName, serviceDesc, price, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssssss", $user_id, $name, $uploadFile, $bio, $serviceName, $serviceDesc, $price, $location);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Service provider registered successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to register service provider']);
            }
            
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid file or no file uploaded']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

$conn->close();
?>

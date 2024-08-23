<?php
include("db.php");

$response = ['success' => false, 'bookings' => [], 'message' => ''];

try {
    $stmt = $conn->prepare("SELECT * FROM bookings");
    $stmt->execute();
    $result = $stmt->get_result();
    
    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
    
    $response['success'] = true;
    $response['bookings'] = $bookings;
} catch (Exception $e) {
    $response['message'] = 'Error fetching bookings: ' . $e->getMessage();
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>

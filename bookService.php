<?php
include("db.php");

$response = ['success' => false, 'message' => ''];

try {
    $client_name = $_POST['client_name'];
    $service_provider_id = $_POST['service_provider_id'];
    $issue_description = $_POST['issue_description'];

    $stmt = $conn->prepare("INSERT INTO bookings (client_name, service_provider_id, issue_description, status) VALUES (?, ?, ?, 'Pending')");
    $stmt->bind_param("sis", $client_name, $service_provider_id, $issue_description);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['message'] = 'Failed to record booking.';
    }
} catch (Exception $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>

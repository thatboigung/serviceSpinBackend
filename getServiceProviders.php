<?php
include("db.php");

$response = ['success' => false, 'providers' => [], 'message' => ''];

try {
    $query = "SELECT * FROM srvc_prders";
    $result = $conn->query($query);
    
    $providers = [];
    while ($row = $result->fetch_assoc()) {
        $providers[] = $row;
    }
    
    $response['success'] = true;
    $response['providers'] = $providers;
} catch (Exception $e) {
    $response['message'] = 'Error fetching service providers: ' . $e->getMessage();
}

echo json_encode($response);

$conn->close();
?>

<?php
include("db.php");

$response = ['success' => false, 'listing' => [], 'message' => ''];

if (isset($_GET['id'])) {
    $listingId = intval($_GET['id']);

    try {
        $stmt = $conn->prepare("SELECT * FROM srvc_providers WHERE id = ?");
        $stmt->bind_param("i", $listingId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $response['success'] = true;
            $response['listing'] = $row;
        } else {
            $response['message'] = 'Listing not found.';
        }
    } catch (Exception $e) {
        $response['message'] = 'Error fetching listing: ' . $e->getMessage();
    }

    $stmt->close();
}

echo json_encode($response);
$conn->close();
?>

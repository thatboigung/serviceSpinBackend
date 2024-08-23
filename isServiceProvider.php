<?php
    // Assuming you have a table `service_providers` where you store registered providers
$isServiceProviderQuery = $conn->prepare("SELECT COUNT(*) FROM service_providers WHERE user_id = ?");
$isServiceProviderQuery->bind_param("i", $id);
$isServiceProviderQuery->execute();
$isServiceProviderQuery->bind_result($isServiceProvider);
$isServiceProviderQuery->fetch();
$isServiceProviderQuery->close();

echo json_encode(['success' => true, 'user' => ['id' => $id, 'username' => $username, 'isServiceProvider' => $isServiceProvider > 0]]);

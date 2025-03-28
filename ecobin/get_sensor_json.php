<?php
include('connection.php');

try {
    // Get latest sensor data
    $stmt = $conn->prepare("SELECT * FROM sensor_data 
                          WHERE bin_id = 1 
                          ORDER BY created_at DESC 
                          LIMIT 1");
    $stmt->execute();
    $sensor_data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Prediction logic (example)
    $predicted_date = date('Y-m-d H:i:s', strtotime('+4 hours'));
    $optimized_route = "ICT Building -> Library -> Cafeteria";

    header('Content-Type: application/json');
    echo json_encode([
        'humidity' => $sensor_data['humidity'] ?? '--',
        'temperature' => $sensor_data['temperature'] ?? '--',
        'predicted_full_date' => $predicted_date,
        'optimized_route' => $optimized_route
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
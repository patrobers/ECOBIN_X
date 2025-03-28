<?php
include('connection.php');

// Capture POST data
$bin_id = $_POST['bin_id'] ?? 1; // Default to bin_id=1 if not provided
$distance1 = $_POST['distance1'] ?? 0;
$distance2 = $_POST['distance2'] ?? 0;
$distance3 = $_POST['distance3'] ?? 0;
$humidity = $_POST['humidity'] ?? 0;
$temperature = $_POST['temperature'] ?? 0;
$bin_status = $_POST['bin_status'] ?? 0;

// Calculate fill level (example calculation)
$max_distance = 200; // As defined in Arduino code
$average_distance = ($distance1 + $distance2 + $distance3) / 3;
$fill_level = (($max_distance - $average_distance)/$max_distance) * 100;
$fill_level = max(0, min(100, round($fill_level)));

// Calculate simulated weight (example)
$weight = round($fill_level * 0.5); // 0.5kg per percentage point

try {
    $stmt = $conn->prepare("INSERT INTO sensor_data 
        (bin_id, distance1, distance2, distance3, humidity, temperature, fill_level, weight, bin_status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->execute([
        $bin_id,
        $distance1,
        $distance2,
        $distance3,
        $humidity,
        $temperature,
        $fill_level,
        $weight,
        $bin_status
    ]);
    
    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
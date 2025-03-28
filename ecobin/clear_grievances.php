<?php
// clear_grievances.php
include('connection.php');

try {
    // Call the stored procedure to clear all grievances
    $stmt = $conn->prepare("CALL ClearAllGrievances()");
    $stmt->execute();

    $response = [
        'success' => true,
        'message' => 'All alerts have been cleared successfully.'
    ];
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'message' => 'Error clearing alerts: ' . $e->getMessage()
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
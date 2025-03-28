<?php
// delete_single_grievance.php
include('connection.php');

try {
    // Validate input
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        throw new Exception("No alert ID provided");
    }

    $alertId = $_POST['id'];

    // Prepare and call the stored procedure
    $stmt = $conn->prepare("CALL DeleteSingleGrievance(:id)");
    $stmt->bindParam(':id', $alertId, PDO::PARAM_INT);
    $stmt->execute();

    $response = [
        'success' => true,
        'message' => 'Alert deleted successfully.'
    ];
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'message' => 'Error deleting alert: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
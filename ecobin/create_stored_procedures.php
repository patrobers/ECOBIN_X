<?php
// create_stored_procedures.php
include('connection.php');

try {
    // Begin transaction
    $conn->beginTransaction();

    // Drop existing procedures if they exist
    $dropProcedures = [
        "DROP PROCEDURE IF EXISTS DeleteSingleGrievance",
        "DROP PROCEDURE IF EXISTS ClearAllGrievances"
    ];

    foreach ($dropProcedures as $dropProc) {
        $conn->exec($dropProc);
    }

    // Create DeleteSingleGrievance Procedure
    $createDeleteProc = "
    CREATE PROCEDURE DeleteSingleGrievance(IN grievance_id INT)
    BEGIN
        -- Delete the specific grievance
        DELETE FROM grievances WHERE id = grievance_id;
    END";

    // Create ClearAllGrievances Procedure
    $createClearProc = "
    CREATE PROCEDURE ClearAllGrievances()
    BEGIN
        -- Delete all grievances
        DELETE FROM grievances;
    END";

    // Execute procedure creation
    $conn->exec("DELIMITER //");
    $conn->exec($createDeleteProc . " //");
    $conn->exec($createClearProc . " //");
    $conn->exec("DELIMITER ;");

    // Commit transaction
    $conn->commit();

    echo "Stored procedures created successfully!";
} catch (PDOException $e) {
    // Rollback transaction
    $conn->rollBack();
    echo "Error creating stored procedures: " . $e->getMessage();
}
?>
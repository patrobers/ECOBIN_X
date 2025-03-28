<?php
include_once("header.php");

$bin_location = isset($_POST['bin_location']) ? trim($_POST['bin_location']) : "";
$bin_status = isset($_POST['bin_status']) ? trim($_POST['bin_status']) : "";

$query = "
    SELECT 
        bin_master.bin_id, 
        bin_master.bin_location_name, 
        bin_master.description, 
        bin_master.latitude, 
        bin_master.longitude, 
        bin_sensor_data.is_bin_present, 
        bin_sensor_data.bin_level, 
        bin_sensor_data.created_time 
    FROM bin_master 
    LEFT JOIN bin_sensor_data ON bin_master.bin_id = bin_sensor_data.fk_bin_id 
    WHERE 1=1"; // Ensures dynamic conditions append correctly

if ($bin_location !== "") {
    $query .= " AND bin_master.bin_location_name = :bin_location";
}
if ($bin_status !== "") {
    $query .= " AND bin_sensor_data.is_bin_present = :bin_status";
}

$query .= " ORDER BY bin_sensor_data.created_time DESC";

$stmt = $conn->prepare($query);

if ($bin_location !== "") {
    $stmt->bindParam(':bin_location', $bin_location);
}
if ($bin_status !== "") {
    $stmt->bindParam(':bin_status', $bin_status, PDO::PARAM_INT);
}

$stmt->execute();

$bin_master_data = "";
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $bin_level_display = !is_null($row['bin_level']) ? $row['bin_level'] . "%" : "N/A";
        $is_bin_present = $row['is_bin_present'] == 1 ? "Yes" : "<span class='else-not'>No</span>";
        $last_updated = !is_null($row['created_time']) ? $row['created_time'] : "N/A";

        $bin_master_data .= '<tr>
            <td>' . $row['bin_id'] . '</td>
            <td>' . $row['bin_location_name'] . '</td>
            <td>' . $row['description'] . '</td>
            <td>' . $row['latitude'] . '</td>
            <td>' . $row['longitude'] . '</td>
            <td>' . $is_bin_present . '</td>
            <td>' . $bin_level_display . '</td>
            <td>' . $last_updated . '</td>
        </tr>';
    }
} else {
    $bin_master_data = '<tr><td colspan="8" class="text-center text-danger">No matching results found.</td></tr>';
}
?>

<main role="main" class="container">
    <section>
        <div class="row">
            <div class="col-md-4">
                <div class="card custom-card">
                    <div class="card-header">📡 Sensor Data Filter</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Select Bin Location:</label>
                                <select class="form-control" name="bin_location">
                                    <option value="">All Locations</option>
                                    <?php
                                    $locationStmt = $conn->prepare("SELECT DISTINCT bin_location_name FROM bin_master");
                                    $locationStmt->execute();
                                    while ($loc = $locationStmt->fetch(PDO::FETCH_ASSOC)) {
                                        $selected = ($bin_location === $loc['bin_location_name']) ? 'selected' : '';
                                        echo '<option value="' . $loc['bin_location_name'] . '" ' . $selected . '>' . $loc['bin_location_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bin Status:</label>
                                <select class="form-control" name="bin_status">
                                    <option value="">All</option>
                                    <option value="1" <?= $bin_status === "1" ? "selected" : "" ?>>Present</option>
                                    <option value="0" <?= $bin_status === "0" ? "selected" : "" ?>>Not Present</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Filter Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">🗑️ Bin Sensor Data</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bin Code</th>
                                        <th>Bin Location</th>
                                        <th>Description</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Is Bin Present</th>
                                        <th>Bin Level</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $bin_master_data; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- /.container -->

<?php include_once("footer.php"); ?>

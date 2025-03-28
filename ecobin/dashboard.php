<?php
// Uncomment for admin authentication
// session_start();
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

// Smart Waste Management Dashboard
include('header.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Waste Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/custom.css">
    <script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right, #dfe9f3, #ffffff);
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            margin-bottom: 20px;
            transition: all 0.3s ease-in-out;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 255, 0, 0.5);
        }
        .bin-card {
    background: rgba(255, 255, 255, 0.4);
    border: 1px solid rgba(255, 255, 255, 0.5);
    transition: all 0.3s ease;
}

.bin-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.progress-bar {
    transition: width 0.5s ease-in-out;
}

.badge {
    padding: 8px 12px;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

        .map-container {
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
        }

        h4 {
            font-weight: bold;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInAnimation 1s ease-in-out forwards;
        }

        @keyframes fadeInAnimation {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="dashboard-card fade-in">
            <h4 class="text-success mb-4"><i class="fas fa-trash-alt me-2"></i>Smart Bin Status</h4>
            <div class="row">
                <?php
                try {
                    $query = "SELECT * FROM (
                        SELECT * FROM sensor_data 
                        ORDER BY created_at DESC
                    ) AS latest_data
                    GROUP BY bin_id";
                    
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $bins = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($bins as $bin) {
                        $statusClass = 'success';
                        $statusIcon = 'check-circle';
                        $lastUpdated = '';
                        $binStatusText = 'Unknown Status';
                        $binStatusClass = 'secondary';

                        if (isset($bin['fill_level'])) {
                            $statusClass = $bin['fill_level'] > 80 ? 'danger' : ($bin['fill_level'] > 60 ? 'warning' : 'success');
                            $statusIcon = $bin['fill_level'] > 80 ? 'exclamation-triangle' : ($bin['fill_level'] > 60 ? 'info-circle' : 'check-circle');
                        }

                        $lastUpdated = isset($bin['created_at']) ? date('H:i', strtotime($bin['created_at'])) : '';
                        $binStatusText = isset($bin['bin_status']) ? ($bin['bin_status'] ? 'Operational' : 'Needs Maintenance') : 'Unknown';
                        $binStatusClass = isset($bin['bin_status']) ? ($bin['bin_status'] ? 'success' : 'warning') : 'secondary';
                ?>
                <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
                    <div class="bin-card p-3 rounded-3 shadow-sm position-relative" style="background: #f8f9fa;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="mb-0 fw-semibold text-secondary">
                                    <i class="fas fa-trash me-2"></i>Bin #<?= $bin['bin_id'] ?? 'N/A' ?>
                                </h5>
                                <small class="text-muted"><?= $bin['location'] ?? 'No Location' ?></small>
                            </div>
                            <span class="badge bg-<?= $statusClass ?> px-3 py-2 rounded-pill">
                                <i class="fas fa-<?= $statusIcon ?> me-2"></i>
                                <?= $bin['fill_level'] ?? '0' ?>%
                            </span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress mb-4" style="height: 12px; border-radius: 6px;">
                            <div class="progress-bar bg-<?= $statusClass ?> progress-bar-striped progress-bar-animated" 
                                 role="progressbar" 
                                 style="width: <?= $bin['fill_level'] ?? '0' ?>%"
                                 aria-valuenow="<?= $bin['fill_level'] ?? '0' ?>">
                            </div>
                        </div>

                        <!-- Environmental Sensors -->
                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <div class="text-center p-2 bg-white rounded-2 border">
                                    <small class="d-block text-muted mb-1">
                                        <i class="fas fa-thermometer-half text-danger me-1"></i>Temperature
                                    </small>
                                    <span class="fw-bold">
                                        <?= number_format($bin['temperature'] ?? 0, 1) ?>°C
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-2 bg-white rounded-2 border">
                                    <small class="d-block text-muted mb-1">
                                        <i class="fas fa-tint text-info me-1"></i>Humidity
                                    </small>
                                    <span class="fw-bold">
                                        <?= number_format($bin['humidity'] ?? 0, 1) ?>%
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Distance Sensors -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted"><i class="fas fa-ruler-vertical me-2"></i>Distance Sensors</small>
                                <div class="badge bg-primary bg-opacity-10 text-primary py-1 px-2 rounded-pill">
                                    <?= ($bin['distance1'] + $bin['distance2'] + $bin['distance3']) / 3 ?? 'N/A' ?>cm avg
                                </div>
                            </div>
                            <div class="row g-2">
                                <?php foreach(['distance1', 'distance2', 'distance3'] as $key => $sensor): ?>
                                <div class="col-md-4 col-4">
                                    <div class="p-2 bg-white rounded-2 border text-center">
                                        <small class="text-muted d-block">S<?= $key+1 ?></small>
                                        <div class="distance-value fw-bold">
                                            <?= $bin[$sensor] ?? 'N/A' ?>cm
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Updated <?= isset($bin['created_at']) ? date('M j, H:i', strtotime($bin['created_at'])) : 'N/A' ?>
                            </small>
                            <span class="badge bg-<?= $binStatusClass ?> bg-opacity-10 text-<?= $binStatusClass ?> py-1 px-2">
                                <i class="fas fa-<?= $bin['bin_status'] ? 'check-circle' : 'tools' ?> me-1"></i>
                                <?= $binStatusText ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } catch (PDOException $e) {
                    echo '<div class="col-12 text-center text-danger p-4">⚠️ Error loading data: ' . $e->getMessage() . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<style>
.bin-card {
    transition: transform 0.2s, box-shadow 0.2s;
    background: linear-gradient(145deg, #ffffff, #f8f9fa);
}

.bin-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.distance-value {
    font-size: 0.9rem;
    color: #2c3e50;
}

.progress-bar-animated {
    animation: progress-stripes 1s linear infinite;
}

@keyframes progress-stripes {
    0% { background-position: 1rem 0; }
    100% { background-position: 0 0; }
}
</style>

        <!-- AI-Based Insights -->
        <div class="row">
            <div class="col-md-6">
                <div class="dashboard-card fade-in">
                    <h4 class="text-warning">AI-Based Waste Level Prediction</h4>
                    <p>Next Expected Full Bin Date: <span id="predicted_date" class="text-danger">--</span></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card fade-in">
                    <h4 class="text-primary">Optimized Collection Route</h4>
                    <p>Suggested Route: <span id="optimized_route" class="text-success">--</span></p>
                </div>
            </div>
        </div>

        <!-- Map for Bin Locations -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="dashboard-card fade-in">
                    <h4 class="text-danger">Smart Bin Locations</h4>
                    <div id="map" class="map-container"></div>
                </div>
            </div>
        </div>

        <!-- Alerts & Notifications -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="dashboard-card bg-light fade-in">
                    <h4 class="text-secondary" id="toggleGrievances" style="cursor: pointer;">
                        Alerts & Notifications <span id="toggleIcon">▼</span>
                    </h4>
                    <div id="grievancesSection" style="display: none;">
                        <button class="btn btn-danger btn-sm mb-2" id="clearAlerts">Clear Alerts</button>
                        <div id="grievancesContent">
                            <?php
                            try {
                                $query = "SELECT id, location, message, created_at FROM grievances ORDER BY created_at DESC";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();
                                $grievances = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if (count($grievances) > 0) {
                                    echo '<table class="table table-bordered table-striped" id="grievancesTable">';
                                    echo '<thead class="bg-dark text-white">';
                                    echo '<tr><th>Location</th><th>Message</th><th>Submitted At</th><th>Actions</th></tr>';
                                    echo '</thead><tbody>';

                                    foreach ($grievances as $row) {
                                        echo '<tr data-id="' . $row['id'] . '">';
                                        echo '<td>' . htmlspecialchars($row['location']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['message']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                                        echo '<td><button class="btn btn-sm btn-warning delete-alert" data-id="' . $row['id'] . '">Delete</button></td>';
                                        echo '</tr>';
                                    }

                                    echo '</tbody></table>';
                                } else {
                                    echo '<p class="text-danger" id="noGrievances">No grievances submitted yet.</p>';
                                }
                            } catch (PDOException $e) {
                                echo '<p class="text-danger">Error fetching grievances: ' . $e->getMessage() . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function initMap() {
        var kisiiCampusICT = { lat: -0.6805, lng: 34.7675 }; 

        var map = new google.maps.Map(document.getElementById('map'), {
            center: kisiiCampusICT,
            zoom: 17
        });

        var marker = new google.maps.Marker({
            position: kisiiCampusICT,
            map: map,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
            }
        });

        var infoWindow = new google.maps.InfoWindow({
            content: '<div style="font-size: 18px; font-weight: bold; color: #d9534f;">Smart Bin - Kisii Campus ICT Building</div>'
        });

        marker.addListener("click", function () {
            infoWindow.open(map, marker);
        });

        infoWindow.open(map, marker);
    }

    $(document).ready(function() {
        // Toggle Grievances Section
        $("#toggleGrievances").click(function() {
            $("#grievancesSection").slideToggle();
            let icon = $("#toggleIcon").text() === "▼" ? "▲" : "▼";
            $("#toggleIcon").text(icon);
        });

        // Clear All Alerts
        $("#clearAlerts").click(function() {
            if (confirm("Are you sure you want to clear all alerts?")) {
                $.ajax({
                    url: 'clear_grievances.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $("#grievancesTable").remove();
                            $("#grievancesContent").html(
                                '<p class="text-danger" id="noGrievances">No grievances submitted yet.</p>'
                            );
                            alert(response.message);
                        } else {
                            alert("Failed to clear alerts: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while clearing alerts: " + error);
                    }
                });
            }
        });

        // Delete Individual Alert
        $(document).on('click', '.delete-alert', function() {
            var alertId = $(this).data('id');
            var row = $(this).closest('tr');

            if (confirm("Are you sure you want to delete this alert?")) {
                $.ajax({
                    url: 'delete_single_grievance.php',
                    type: 'POST',
                    data: { id: alertId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            row.remove();
                            if ($("#grievancesTable tbody tr").length === 0) {
                                $("#grievancesContent").html(
                                    '<p class="text-danger" id="noGrievances">No grievances submitted yet.</p>'
                                );
                            }
                        } else {
                            alert("Failed to delete alert: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while deleting the alert: " + error);
                    }
                });
            }
        });

        // Fetch Sensor Data
        function fetchData() {
            $.get('get_sensor_data.php', function(data) {
                $('#humidity').text(data.humidity);
                $('#temperature').text(data.temperature);
                $('#predicted_date').text(data.predicted_full_date);
                $('#optimized_route').text(data.optimized_route);
            }, 'json');
        }
        
        // Fetch data every 5 seconds
        setInterval(fetchData, 5000);

        // Override with static values
        $('#humidity').text('54.40');
        $('#temperature').text('26');
    });
    </script>
    <script>
        // Update fetchData function
function fetchData() {
    $.get('get_sensor_json.php', function(data) {
        $('#humidity').text(data.humidity);
        $('#temperature').text(data.temperature);
        $('#predicted_date').text(data.predicted_full_date);
        $('#optimized_route').text(data.optimized_route);
    }, 'json');
}

// Update refresh interval to 2 seconds
setInterval(fetchData, 2000);
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqNSrWu4Cjx3B6Pe1k930dCkoPbuUPC-w&callback=initMap" async defer></script>
</body>
</html>
<?php include('footer.php'); ?>
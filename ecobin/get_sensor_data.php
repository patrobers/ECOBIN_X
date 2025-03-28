<?php

include('connection.php');

try {
    $query = "SELECT 
                s.bin_id,
                b.location,
                s.fill_level,
                s.weight,
                s.temperature,
                s.distance1,
                s.distance2,
                s.distance3,
                s.created_at
              FROM (
                SELECT *
                FROM sensor_data
                ORDER BY created_at DESC
              ) AS s
              LEFT JOIN bins b ON s.bin_id = b.bin_id
              GROUP BY s.bin_id";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $bins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($bins as $bin) {
        $location = $bin['location'] ?? 'Location not set';
        echo <<<HTML
        <div class="col-md-4 mb-4">
            <div class="bin-card p-3 rounded">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="mb-0">
                            <i class="fas fa-trash text-secondary"></i>
                            Bin #{$bin['bin_id']}
                        </h5>
                    </div>
                    <span class="badge bg-$statusClass">
                        <i class="fas fa-$statusIcon"></i>
                        {$bin['fill_level']}% Full
                    </span>
                </div>

                <div class="progress mb-3" style="height: 20px;">
                    <div class="progress-bar bg-$statusClass progress-bar-striped" 
                         role="progressbar" 
                         style="width: {$bin['fill_level']}%"
                         aria-valuenow="{$bin['fill_level']}" 
                         aria-valuemin="0" 
                         aria-valuemax="100">
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-4">
                        <small class="text-muted">Weight</small>
                        <h5 class="mb-0">{$bin['weight']}kg</h5>
                    </div>
                    <div class="col-4">
                        <small class="text-muted">Temp</small>
                        <h5 class="mb-0">{$bin['temperature']}°C</h5>
                    </div>
                    <div class="col-4">
                        <small class="text-muted">Updated</small>
                        <h5 class="mb-0">$lastUpdated</h5>
                    </div>
                </div>
            </div>
        </div>
HTML;
    }
} catch (PDOException $e) {
    echo '<div class="col-12 text-center text-danger">Error loading bin data: ' . $e->getMessage() . '</div>';
}
?>
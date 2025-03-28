<?php
    include_once("header.php");
    if(isset($_POST['submit'])) {
        if(
            isset($_POST['bin_code']) && !empty($_POST['bin_code']) && 
            isset($_POST['bin_loc_name']) && !empty($_POST['bin_loc_name']) && 
            isset($_POST['description']) && !empty($_POST['description']) && 
            isset($_POST['latitude']) && !empty($_POST['latitude']) && 
            isset($_POST['longitude']) && !empty($_POST['longitude']) && 
            isset($_POST['is_bin_present'])
        ) {
            $bin_code = $_POST['bin_code'];
            $bin_loc_name = $_POST['bin_loc_name'];
            $description = $_POST['description'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $is_bin_present = $_POST['is_bin_present'];

            $stmt = $conn->prepare("INSERT INTO bin_master(`bin_id`, `bin_location_name`, `description`, `created_by`, `created_on`, `latitude`, `longitude`) 
                                    VALUES(:bincode, :binlocname, :descr, :creator, :creationtime, :latitude, :longitude)");
            
            $stmt->execute([
                "bincode" => $bin_code,
                "binlocname" => $bin_loc_name,
                "descr" => $description,
                "creator" => $_SESSION['uid'],
                "creationtime" => date('Y-m-d H:i:s'),
                "latitude" => $latitude,
                "longitude" => $longitude
            ]);
        }
    }
    
    $stmt = $conn->prepare("SELECT 
                                bin_master.bin_id, 
                                bin_master.bin_location_name, 
                                bin_master.description, 
                                bin_master.latitude, 
                                bin_master.longitude, 
                                COALESCE(bin_sensor_data.is_bin_present, 'Unknown') AS is_bin_present, 
                                bin_sensor_data.bin_level, 
                                bin_sensor_data.created_time 
                            FROM bin_master 
                            LEFT JOIN bin_sensor_data ON bin_master.bin_id = bin_sensor_data.fk_bin_id 
                            ORDER BY COALESCE(bin_sensor_data.created_time, NOW()) DESC");

    $stmt->execute();

    $bin_master_data = "";
    if($stmt->rowCount() > 0) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $bin_master_data .= '<tr>
                                <td>'.$row['bin_id'].'</td>
                                <td>'.$row['bin_location_name'].'</td>
                                <td>'.$row['description'].'</td>
                                <td>'.$row['latitude'].'</td>
                                <td>'.$row['longitude'].'</td>
                                <td>'.$row['is_bin_present'].'</td>
                            </tr>';
        }
    }
?>

<style>
    table tbody tr:hover {
        background-color: #e9f5e9;
        box-shadow: 0px 4px 10px rgba(144, 238, 144, 0.5);
        transition: all 0.3s ease-in-out;
    }
</style>

<main role="main" class="container">
    <section>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="card custom-cards">
                    <div class="card-header">Add Bin </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label>Bin Code</label>
                                <input type="text" name="bin_code" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bin Location Name</label>
                                <input type="text" name="bin_loc_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Is Bin Present</label>
                                <select name="is_bin_present" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="card custom-cards">
                    <div class="card-header">ecoBin</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bin Code</th>
                                    <th>Bin Location Name</th>
                                    <th>Description</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Is Bin Present</th>
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
    </section>
</main>

<?php include_once("footer.php"); ?>

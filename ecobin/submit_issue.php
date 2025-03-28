<?php
$servername = "localhost";
$username = "root"; // Change this if needed
$password = "";
$dbname = "ecobin"; // Ensure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed"]));
}

$data = json_decode(file_get_contents("php://input"), true);
$binLocation = $data['binLocation'];
$issue = $data['issue'];

$sql = "INSERT INTO bin_issues (bin_location, issue, status, reported_at) VALUES ('$binLocation', '$issue', 'Pending', NOW())";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>

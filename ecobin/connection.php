<?php
    $servername = "localhost";
    $username = "root";
    $port = 3306;
    $password = "@Tamutamu1";


try {
    $conn = new PDO("mysql:host=$servername;dbname=waste_manage", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
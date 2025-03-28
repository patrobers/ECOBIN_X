<?php
	include_once('connection.php');
  session_start();
  if(!isset($_SESSION['uname']) && empty($_SESSION['uname']) && !isset($_SESSION['uid']) && empty($_SESSION['uid']))
	{
		header("Location:index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AI-powered smart waste management system">
    <meta name="author" content="ECOBIN Team">
    <link rel="icon" href="bin3.png">

    <title>🌱 ECOBIN - AI Smart Waste Management</title>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap and Custom Styles -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/starter-template.css" rel="stylesheet">
    
    <script src="assets/jquery.js"></script>

    <style>
        /* Navbar styling */
        .cus-nav {
            background: #004d40;
            padding: 10px 20px;
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 22px;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-size: 16px;
            transition: 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #ffeb3b !important;
            font-weight: bold;
        }

        .dropdown-menu {
            background: #004d40;
            border: none;
        }

        .dropdown-menu .dropdown-item {
            color: #ffffff !important;
        }

        .dropdown-menu .dropdown-item:hover {
            background: #ffeb3b;
            color: #004d40 !important;
            font-weight: bold;
        }
          /* Logout button green without hover effect */
    .logout-btn {
        background-color: #2E7D32 !important; /* Green color */
        color: #ffffff !important;
        font-weight: bold;
        text-align: center;
        padding: 10px 15px;
        border-radius: 5px;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top cus-nav">
        <a class="navbar-brand" href="dashboard.php">
            <i class="fa fa-recycle"></i> ECOBIN | Smart Waste System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bin_master.php">
                        <i class="fa fa-trash"></i> Manage Bins
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bin_sensors_report.php">
                        <i class="fa fa-bar-chart"></i> Sensor Reports
                    </a>
                </li>
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-toggle="dropdown">
        <i class="fa fa-user-circle"></i> Account
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item logout-btn" href="logout.php">
            <i class="fa fa-sign-out"></i> Logout
        </a>
    </div>
</li>

            </ul>
        </div>
    </nav>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ECOBIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #2c3e50, #3498db);
            font-family: 'Arial', sans-serif;
            color: black;
            padding-top: 60px;
        }
        .navbar {
            background-color: #1a1a1a;
            color: white;
            padding: 10px 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            font-size: 1.2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: 20px;
            cursor: pointer;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 15px;
        }
        .navbar a:hover { color: #f1c40f; }

        .container {
            max-width: 1100px;
            background: white;
            color: black;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-top: 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .header-image {
            width: 120%;
            height: 100px;
            background: linear-gradient(rgba(52, 152, 219, 0.7), rgba(44, 62, 80, 0.7)), url('https://source.unsplash.com/1100x300/?recycle,waste-management');
            background-position: center;
            background-size: cover;
            border-radius: 15px 15px 0 0;
            margin: -40px -40px 30px -40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .header-image h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .icon {
            font-size: 30px;
            color: #3498db;
            margin-top: -30px;
            background: white;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        h1, h3 {
            color: #2c3e50;
        }
        p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            line-height: 1.6;
            color: #34495e;
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 30px;
        }
        .feature-box {
            width: 22%;
            background: #f8f9fa;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .feature-box i {
            font-size: 40px;
            color: #3498db;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        .feature-box:hover i {
            transform: rotate(360deg);
        }
        .dashboard-section {
            background: #f0f4f8;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }
        .dashboard-features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .dashboard-feature {
            width: 30%;
            background: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: 0.3s ease;
        }
        .dashboard-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .dashboard-feature i {
            color: #3498db;
            margin-right: 10px;
            font-size: 24px;
        }
        .btn-learn {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .btn-learn:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #2980b9, #2c3e50);
        }
         /* .container2 {
            color: #f0f4f8;
           }   */
           .footer {
    background-color: #222; 
    color: #fff; /* White text */
    padding: 40px 50px;
}

.footer a {
    color: #bbb; /* Light gray for links */
    text-decoration: none;
}

.footer a:hover {
    color: #4CAF50; /* Green hover effect */
}
.footer p {
    color: #bbb; /* Light gray text */
    font-size: small;
    font-family: cursive;
}

    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <i class="fas fa-recycle"></i> ECOBIN
        </div>
        <div class="navbar-links">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="about.php"><i class="fas fa-trash-alt"></i> About </a>
            <a href="contact.php"><i class="fas fa-exclamation-circle"></i> Grievances</a>
            <a href="abt.php"><i class="fas fa-phone"></i> Contact us </a>
            <a href="admin.php"><i class="fas fa-user-shield"></i> Admin Panel</a>
        </div>
    </div>

    <div class="container">
        <div class="header-image">
            <h1><i class="fas fa-recycle icon"></i>About ECOBIN</h1>
        </div>

        <!-- <i class="fas fa-recycle icon"></i>
        <h1>About ECOBIN</h1> -->
        <p>
            ECOBIN is an innovative <strong>AI-powered smart waste management system</strong> that revolutionizes 
            waste disposal through <strong>IoT-enabled smart bins</strong>, offering real-time monitoring and 
            predictive analytics to create a <strong>cleaner and smarter future</strong>.
        </p>
        
        <h3>Why Choose ECOBIN?</h3>
        <div class="features">
            <div class="feature-box">
                <i class="fas fa-chart-line"></i>
                <h4>Real-time Monitoring</h4>
                <p>Track waste levels instantly with smart sensors.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-bell"></i>
                <h4>Automated Alerts</h4>
                <p>Get notified when bins are full to improve efficiency.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-brain"></i>
                <h4>AI-Based Predictions</h4>
                <p>Optimize waste collection with data-driven insights.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-leaf"></i>
                <h4>Eco-Friendly</h4>
                <p>Contribute to a greener planet with smart waste solutions.</p>
            </div>
        </div>

        <div class="dashboard-section">
            <h3>Web Dashboard Features</h3>
            <div class="dashboard-features">
                <div class="dashboard-feature">
                    <i class="fas fa-tachometer-alt"></i>
                    <h5>Comprehensive Dashboard</h5>
                    <p>Real-time overview of all waste management systems, bin statuses, and key performance indicators.</p>
                </div>
                <div class="dashboard-feature">
                    <i class="fas fa-map-marked-alt"></i>
                    <h5>Geographic Tracking</h5>
                    <p>Interactive map showing bin locations, fill levels, and collection routes for optimal efficiency.</p>
                </div>
                <div class="dashboard-feature">
                    <i class="fas fa-chart-pie"></i>
                    <h5>Waste Analytics</h5>
                    <p>Detailed reports and visualizations of waste generation, recycling rates, and trend analysis.</p>
                </div>
                <div class="dashboard-feature">
                    <i class="fas fa-bell"></i>
                    <h5>Customizable Alerts</h5>
                    <p>Set up personalized notifications for bin status, collection schedules, and maintenance needs.</p>
                </div>
                <div class="dashboard-feature">
                    <i class="fas fa-users"></i>
                    <h5>Multi-User Management</h5>
                    <p>Role-based access control for administrators, managers, and field workers.</p>
                </div>
                <div class="dashboard-feature">
                    <i class="fas fa-file-export"></i>
                    <h5>Reporting & Export</h5>
                    <p>Generate comprehensive reports in various formats for detailed analysis and compliance.</p>
                </div>
            </div>
        </div>
        
        <p class="mt-4">
            Join us in building a <strong>cleaner, greener future</strong> by adopting <strong>ECOBIN</strong> today.
        </p>
        
        <a href="abt.php" class="btn-learn">Get in Touch</a>
    </div>
    <footer class="footer">
    <div class="row">
        <div class="col-md-4">
            <h2 style="font-family: cursive;">
                <i class="fas fa-recycle text-success"></i> Ecobin
            </h2>
            <p>EcoBin is a smart waste management system that leverages AI and IoT to optimize waste disposal, promote recycling, and enhance environmental sustainability.</p>
            <a href="#" class="text-success">Our Team</a>
        </div>
        <div class="col-md-4">
            <h5 class="fw-bold">Contact</h5>
            <p><i class="fas fa-map-marker-alt"></i> Kisii Campus, Kisii, Kenya</p>
            <p><i class="fas fa-phone"></i> Phone: +254 798597545</p>
            <p><i class="fas fa-envelope"></i> Email: <a href="mailto:spatrobersk@gmail.com">spatrobersk@gmail.com</a></p>
            <p><i class="fab fa-skype"></i> Skype: you_online</p>
        </div>
        <div class="col-md-4">
            <h5 class="fw-bold">Links</h5>
            <div class="d-flex justify-content-between">
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Grievances</a></li>
                    <li><a href="abt.php">Contact Us</a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="#">Plans & Pricing</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Bin Issue - ECOBIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f1c40f;
            --success-color: #2ecc71;
            --gradient-primary: linear-gradient(135deg, #2c3e50, #3498db);
            --gradient-accent: linear-gradient(135deg, #f1c40f, #e67e22);
        }

        body {
            background: var(--gradient-primary);
            font-family: 'Poppins', sans-serif;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-attachment: fixed;
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


        .main-container {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            padding: 40px;
            margin-top: 100px;
            margin-bottom: 50px;
            transition: all 0.4s ease;
            max-width: 800px;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .report-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .report-icon {
            font-size: 50px;
            color: var(--secondary-color);
            background: white;
            padding: 20px;
            border-radius: 50%;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: inline-flex;
            transition: all 0.5s ease;
        }

        .report-icon:hover {
            transform: rotate(360deg) scale(1.1);
            background: var(--gradient-accent);
            color: white;
        }

        h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--gradient-accent);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 8px;
            display: block;
        }

        .input-group-text {
            background: var(--secondary-color);
            color: white;
            border: none;
        }

        .form-control {
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            padding: 12px 15px;
            height: auto;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            background: var(--gradient-accent);
            border: none;
            color: white;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 50px;
            transition: all 0.4s ease;
            display: block;
            width: 100%;
            max-width: 250px;
            margin: 30px auto 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(241, 196, 15, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 20px rgba(241, 196, 15, 0.5);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .alert-message {
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-weight: 500;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease;
        }

        .alert-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        .alert-success {
            background-color: rgba(46, 204, 113, 0.2);
            color: #27ae60;
            border: 1px solid #2ecc71;
        }

        .alert-danger {
            background-color: rgba(231, 76, 60, 0.2);
            color: #c0392b;
            border: 1px solid #e74c3c;
        }

        /* Footer Styles */
        .footer {
            background: rgba(34, 34, 34, 0.95);
            color: #bbb;
            padding: 50px 0 20px;
            margin-top: auto;
        }

        .footer h2 {
            color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .footer h2 i {
            color: var(--success-color);
            margin-right: 10px;
        }

        .footer p {
            color: #bbb;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer a {
            color: #bbb;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer a:hover {
            color: var(--accent-color);
            text-decoration: none;
        }

        .footer h5 {
            color: #f8f9fa;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer h5::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--accent-color);
        }

        .contact-info p {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 10px;
            width: 20px;
            color: var(--accent-color);
        }

        .quick-links ul {
            list-style: none;
            padding-left: 0;
        }

        .quick-links li {
            margin-bottom: 10px;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--accent-color);
            color: #222;
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .navbar-links {
                display: none;
            }
            
            .container {
                width: 95%;
                margin: 20px auto;
                padding: 25px;
                margin-top: 80px;
            }
            
            .footer .col-md-4 {
                margin-bottom: 30px;
            }
            
            .btn-submit {
                max-width: 100%;
            }
        }

        /* Animation for form elements */
        .form-group {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Delay animations for each form group */
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .btn-submit { animation: fadeInUp 0.5s ease 0.5s forwards; }
    </style>
</head>
<body>
    <div class="main-container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <i class="fas fa-recycle"></i> ECOBIN
                </div>
                <div class="navbar-links d-none d-lg-block">
                    <a href="index.php"><i class="fas fa-home"></i> Home</a>
                    <a href="about.php"><i class="fas fa-trash-alt"></i> About</a>
                    <a href="contact.php"><i class="fas fa-exclamation-circle"></i> Grievances</a>
                    <a href="abt.php"><i class="fas fa-phone"></i> Contact us</a>
                    <a href="admin.php"><i class="fas fa-user-shield"></i> Admin Panel</a>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="report-header">
                <div class="report-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <h2>Report Bin Issue</h2>
                <p class="text-muted">Help us keep our environment clean by reporting any issues with ECOBINs</p>
            </div>
            
            <form id="reportForm" action="contact.php" method="POST">
                <!-- Added Name Field -->
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                </div>
                
                <!-- Added Email Field -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                    </div>
                </div>
                
                <!-- Existing Location Field -->
                <div class="form-group">
                    <label for="location">Bin Location</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter bin location (e.g., Kisii Campus Library)" required>
                    </div>
                </div>
                
                <!-- Existing Message Field -->
                <div class="form-group">
                    <label for="message">Issue Description</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-comment"></i></span>
                        </div>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Describe the issue in detail (e.g., Bin is overflowing, damaged lid, etc.)" required></textarea>
                    </div>
                </div>
                
                <button type="submit" class="btn-submit btn">
                    <i class="fas fa-paper-plane mr-2"></i> Submit Report
                </button>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include('connection.php');
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $location = htmlspecialchars($_POST['location']);
                    $message = htmlspecialchars($_POST['message']);
                    
                    try {
                        $query = "INSERT INTO grievances (name, email, location, message) VALUES (:name, :email, :location, :message)";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':name', $name);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':location', $location);
                        $stmt->bindParam(':message', $message);
                        
                        if ($stmt->execute()) {
                            echo '<div id="alertMessage" class="alert-message alert-success show">';
                            echo '<i class="fas fa-check-circle mr-2"></i> Thank you! Your report has been submitted successfully.';
                            echo '</div>';
                        } else {
                            echo '<div id="alertMessage" class="alert-message alert-danger show">';
                            echo '<i class="fas fa-exclamation-circle mr-2"></i> Error submitting your report. Please try again.';
                            echo '</div>';
                        }
                    } catch (PDOException $e) {
                        echo '<div id="alertMessage" class="alert-message alert-danger show">';
                        echo '<i class="fas fa-exclamation-circle mr-2"></i> Database error: ' . htmlspecialchars($e->getMessage());
                        echo '</div>';
                    }
                }
                ?>
            </form>
        </div>

        <!-- Enhanced Footer -->
        <!-- Footer Section -->
<footer class="footer">
    <div class="container2">
        <div class="row">
            <!-- Logo and About -->
            <div class="col-md-4">
                <h2 style="font-family: cursive;">
                    <i class="fas fa-recycle text-success"></i> Ecobin
                </h2>
                <p style="color: #bbb; font-size: small; font-family: cursive;">
                    EcoBin is a smart waste management system that leverages AI and IoT to optimize waste disposal, promote recycling, and enhance environmental sustainability.
                </p>
                <a href="#" class="text-success" style="color: #4CAF50 !important;">Our Team</a>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4">
                <h5 style="color: #bbb; font-weight: bold;">Contact</h5>
                <p style="color: #bbb; font-size: small; font-family: cursive;">
                    <i class="fas fa-map-marker-alt"></i> Kisii Campus, Kisii, Kenya
                </p>
                <p style="color: #bbb; font-size: small; font-family: cursive;">
                    <i class="fas fa-phone"></i> Phone: +254 798597545
                </p>
                <p style="color: #bbb; font-size: small; font-family: cursive;">
                    <i class="fas fa-envelope"></i> Email: <a href="mailto:spatrobersk@gmail.com" style="color: #bbb;">spatrobersk@gmail.com</a>
                </p>
                <p style="color: #bbb; font-size: small; font-family: cursive;">
                    <i class="fab fa-skype"></i> Skype: you_online
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 style="color: #bbb; font-weight: bold;">Links</h5>
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled">
                        <li><a href="#" style="color: #bbb; font-size: small; font-family: cursive;">Home</a></li>
                        <li><a href="about.php" style="color: #bbb; font-size: small; font-family: cursive;">About</a></li>
                        <li><a href="contact.php" style="color: #bbb; font-size: small; font-family: cursive;">Grievances</a></li>
                        <li><a href="abt.php" style="color: #bbb; font-size: small; font-family: cursive;">Contact Us</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color: #bbb; font-size: small; font-family: cursive;">Plans & Pricing</a></li>
                        <li><a href="#" style="color: #bbb; font-size: small; font-family: cursive;">Affiliates</a></li>
                        <li><a href="#" style="color: #bbb; font-size: small; font-family: cursive;">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" style="border-top: 1px solid #444; padding-top: 20px;">
            <p style="color: #bbb; font-size: small; font-family: cursive;">
                &copy; 2025 ECOBIN. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
    </div>

    <script>
    // Form submission with animation
    document.getElementById("reportForm").addEventListener("submit", function(event) {
        // You can add client-side validation here if needed
        const alertMessage = document.getElementById("alertMessage");
        if (alertMessage) {
            alertMessage.scrollIntoView({ behavior: 'smooth' });
        }
    });

    // Animate form elements on load
    document.addEventListener("DOMContentLoaded", function() {
        const formGroups = document.querySelectorAll(".form-group");
        formGroups.forEach((group, index) => {
            group.style.animationDelay = `${0.1 * index}s`;
        });
    });
    </script>
</body>
</html>
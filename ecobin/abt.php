<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ECOBIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f1c40f;
            --dark-bg: #1a1a1a;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            color: #333;
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

        
        /* .navbar-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .navbar-links a:hover::after {
            width: 70%;
        } */
        
        .contact-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .contact-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        
        .gradient-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            position: relative;
            overflow: hidden;
        }
        
        .gradient-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 15s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .contact-icon {
            transition: all 0.5s ease;
        }
        
        .contact-icon:hover {
            transform: rotate(15deg) scale(1.1);
        }
        
        .social-icon {
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-5px) scale(1.2);
        }
        
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
            color: #4CAF50;
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
        
        .contact-info {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centers content horizontally */
}

.contact-info p {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center; /* Centers text horizontally */
    text-align: center; /* Ensures text inside is centered */
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
            
            .contact-card {
                width: 95%;
                margin: 20px auto;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <div class="navbar">
        <div class="navbar-brand" id="ecobin-logo">
            <i class="fas fa-recycle text-yellow-400"></i> ECOBIN
        </div>
        <div class="navbar-links hidden md:flex">
            <a href="index.php"><i class="fas fa-home mr-2"></i> Home</a>
            <a href="about.php"><i class="fas fa-trash-alt mr-2"></i> About</a>
            <a href="contact.php"><i class="fas fa-exclamation-circle mr-2"></i> Grievances</a>
            <a href="abt.php" class="active"><i class="fas fa-phone mr-2"></i> Contact us</a>
            <a href="admin.php"><i class="fas fa-user-shield mr-2"></i> Admin Panel</a>
        </div>
    </div>
    
    <main class="flex-grow flex items-center justify-center p-6">
    <div class="contact-card w-full max-w-4xl text-center">
        <div class="gradient-header p-12 text-white text-center relative">
            <div class="relative z-10">
                <h2 class="text-4xl font-bold mb-4 tracking-tight">Get In Touch With ECOBIN</h2>
                <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto">
                    We're excited to hear from you! Connect with our team and let's work together for a cleaner environment.
                </p>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center p-12">
            <div class="space-y-8 max-w-2xl">
                <h3 class="text-2xl font-bold text-gray-800">Contact Information</h3>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4 justify-center">
                        <div class="contact-icon bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-map-marker-alt text-2xl text-yellow-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Our Location</h4>
                            <p class="text-gray-600">123 Kisii Campus, Eco City, Kenya</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 justify-center">
                        <div class="contact-icon bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-phone text-2xl text-blue-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Phone Number</h4>
                            <p class="text-gray-600">+254 798 597 545</p>
                            <p class="text-gray-600">+254 700 000 000</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 justify-center">
                        <div class="contact-icon bg-green-100 p-3 rounded-full">
                            <i class="fas fa-envelope text-2xl text-green-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Email Address</h4>
                            <p class="text-gray-600">info@ecobin.com</p>
                            <p class="text-gray-600">support@ecobin.com</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 justify-center">
                        <div class="contact-icon bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-clock text-2xl text-purple-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Working Hours</h4>
                            <p class="text-gray-600">Monday - Friday: 8AM - 5PM</p>
                            <p class="text-gray-600">Saturday: 9AM - 2PM</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <h4 class="font-semibold text-gray-800 mb-4">Follow Us</h4>
                    <div class="flex space-x-4 justify-center">
                        <a href="#" class="social-icon text-2xl text-blue-600 hover:text-blue-800">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon text-2xl text-blue-400 hover:text-blue-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon text-2xl text-pink-600 hover:text-pink-800">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon text-2xl text-blue-700 hover:text-blue-900">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="social-icon text-2xl text-red-600 hover:text-red-800">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    
    <footer class="footer">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-1">
                    <h2><i class="fas fa-recycle"></i> ECOBIN</h2>
                    <p class="mt-4">EcoBin is a smart waste management system that leverages AI and IoT to optimize waste disposal, promote recycling, and enhance environmental sustainability.</p>
                    <div class="social-icons mt-6">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="md:col-span-1">
                    <h5>Contact Info</h5>
                    <div class="contact-info mt-4">
                        <p><i class="fas fa-map-marker-alt"></i> Kisii Campus, Kisii, Kenya</p>
                        <p><i class="fas fa-phone"></i> +254 798 597545</p>
                        <p><i class="fas fa-envelope"></i> info@ecobin.com</p>
                        <p><i class="fas fa-clock"></i> Mon-Fri: 8AM - 5PM</p>
                    </div>
                </div>
                
                <div class="md:col-span-1">
                    <h5>Quick Links</h5>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <ul class="quick-links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Report Issue</a></li>
                            <li><a href="#">Our Team</a></li>
                        </ul>
                        <ul class="quick-links">
                            <li><a href="#">Services</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 ECOBIN. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
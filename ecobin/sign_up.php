<?php
include_once('connection.php');
session_start();

if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password']; // Storing as plain text (not recommended)

        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :e");
        $stmt->execute([':e' => $email]);

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Email already registered!');</script>";
        } else {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:e, :p)");
            if ($stmt->execute([':e' => $email, ':p' => $password])) {
                echo "<script>alert('Registration successful! You can now log in.'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('Error in registration. Try again!');</script>";
            }
        }
    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ECOBIN</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #b3e5fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .login-box:hover {
            transform: translateY(-5px);
        }

        .login-box h3 {
            font-weight: bold;
            color: #007bff;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 20px;
            padding: 10px;
            font-size: 16px;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
            border-color: #28a745;
        }

        .btn-success {
            border-radius: 20px;
            font-size: 18px;
            padding: 10px;
            transition: background 0.3s ease-in-out;
        }

        .btn-success:hover {
            background: #218838;
        }

        .text-center p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h3 class="text-center">Create an Account</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-block" name="submit" value="Sign Up">
            </div>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="index.php">Log In</a></p>
        </div>
    </div>
</body>
</html>

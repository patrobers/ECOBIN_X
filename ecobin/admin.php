<?php
	include_once('connection.php');
	session_start();
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname']) && isset($_SESSION['uid']) && !empty($_SESSION['uid']))
	{
		header("Location:dashboard.php");
		exit();
	}
	if(isset($_POST['submit']))
    {
		if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$stmt = $conn->prepare("SELECT * FROM users WHERE email = :e AND password = :p"); 
			if(!$stmt->execute(array(':e'=>$username, ':p'=>$password)))
			{
				echo 'Not executed';
			}
			if($stmt->rowCount() == 1)
			{
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['uname'] 	= $result['email'];
				$_SESSION['uid']	= $result['id'];
				header("Location:dashboard.php");
				exit();
			}
			else
			{
				$error = "⚠️ Wrong username or password";
			}
		}
		else
		{
			$error = "⚠️ Username and password fields cannot be empty";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Secure Login - ECOBIN Smart Waste Management">
    <meta name="author" content="ECOBIN Team">
    <link rel="icon" href="bin3.png">

    <title>🔐 ECOBIN | Admin Login</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #004d40, #009688);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container h3 {
            color: #004d40;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 25px;
            padding: 10px 15px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #004d40 !important;
            border-radius: 25px;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #ffeb3b !important;
            color: #004d40 !important;
        }

        .alert-danger {
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .signup-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .signup-link a {
            font-weight: bold;
            color: #004d40;
            text-decoration: none;
        }

        .signup-link a:hover {
            color: #ffeb3b;
        }
    </style>

</head>
<body>

    <div class="login-container">
        <h3><i class="fas fa-user-lock"></i> Admin </h3>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="📧 Email Address" autofocus="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="🔑 Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
            </div>
        </form>

        <div class="signup-link">
            <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p>
        </div>
    </div>

    <script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.min.js"></script>

</body>
</html>

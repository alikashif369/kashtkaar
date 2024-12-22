<?php
include("../Includes/db.php");
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Login Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #88c057;
            --hover-color: #34495e;
            --white: #ffffff;
            --light-gray: #eee;
        }

        body {
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                        url('../Images/Website/farm-landscape.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            max-width: 500px; /* Increased from 400px */
            margin: 0 auto;
            padding: 2rem;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-header {
            background: var(--primary-color);
            color: var(--white);
            padding: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .login-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            height: auto;
            border: 2px solid var(--light-gray);
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(136, 192, 87, 0.25);
        }

        .btn-login {
            background: var(--secondary-color);
            color: var(--white);
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: var(--hover-color);
            transform: translateY(-2px);
        }

        .form-group label {
            font-weight: 500;
            color: var(--primary-color);
        }

        .login-links {
            text-align: center;
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .login-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
        }

        .login-links a:hover {
            color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fas fa-user-circle mb-2" style="font-size: 3rem;"></i>
                <h4 class="mb-0">Farmer Login</h4>
            </div>
            <div class="login-body">
                <form action="FarmerLogin.php" method="post">
                    <div class="form-group">
                        <label><i class="fas fa-phone-alt mr-2"></i>Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-lock mr-2"></i>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-login btn-block" name="login">Login</button>
                    <div class="login-links">
                        <a href="FarmerForgotPassword.php">Forgot Password?</a>
                        <a href="FarmerRegister.php">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";
    $encryption = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    $query = "select * from farmerregistration where farmer_phone = '$phonenumber' and farmer_password = '$encryption'";
    $run_query = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($run_query);
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('FarmerLogin.php','_self')</script>";
    }
    while ($row = mysqli_fetch_array($run_query)) {
        $id = $row['farmer_id'];
    }

    $_SESSION['phonenumber'] = $phonenumber;
    echo "<script>window.open('../FarmerPortal/farmerHomepage.php','_self')</script>";
}
?>
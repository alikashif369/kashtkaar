<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
            position: relative;
            background: #f5f8fa;
        }

        #vanta-background {
            position: fixed;
            z-index: -1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .login-container {
            max-width: 400px;
            width: 90%;
            margin: 2rem;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-header {
            background: #2c3e50;
            padding: 2rem 1.5rem;
            text-align: center;
            color: white;
        }

        .login-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #3498db;
        }

        .login-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: 2px solid #e1e8ef;
            border-radius: 50px;
            padding: 0.8rem 1.2rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
        }

        .btn-login {
            background: #3498db;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .login-links {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-links a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            display: block;
            margin: 0.5rem 0;
            transition: color 0.3s;
        }

        .login-links a:hover {
            color: #3498db;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>
    <div id="vanta-background"></div>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fas fa-user-circle"></i>
                <h4>Buyer Login</h4>
            </div>
            <div class="login-body">
                <form action="BuyerLogin.php" method="post">
                    <div class="form-group">
                        <label><i class="fas fa-phone-alt mr-2"></i>Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-lock mr-2"></i>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-login" name="login">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>
                    <div class="login-links">
                        <a href="BuyerForgotPassword.php"><i class="fas fa-key mr-2"></i>Forgot Password?</a>
                        <a href="BuyerRegistration.php"><i class="fas fa-user-plus mr-2"></i>Create New Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        VANTA.WAVES({
            el: "#vanta-background",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0x3498db,
            shininess: 30.00,
            waveHeight: 20.00,
            waveSpeed: 0.50,
            zoom: 0.75
        });
    </script>
</body>
</html>

<?php
include("../Includes/db.php");

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

    $query = "SELECT * FROM buyerregistration WHERE buyer_phone = '$phonenumber' AND buyer_password = '$encryption'";
    $run_query = mysqli_query($con, $query);

    if (!$run_query) {
        die("Query Failed: " . mysqli_error($con));
    }

    $count_rows = mysqli_num_rows($run_query);
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('BuyerLogin.php','_self')</script>";
    } else {
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row['buyer_id'];
        }

        $_SESSION['phonenumber'] = $phonenumber;
        echo "<script>window.open('../BuyerPortal2/bhome.php','_self')</script>";
    }
}
?>
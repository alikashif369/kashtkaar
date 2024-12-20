<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        .forgot-container {
            max-width: 400px;
            width: 90%;
            margin: 2rem;
            position: relative;
            z-index: 1;
        }

        .forgot-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .forgot-header {
            background: #2c3e50;
            padding: 2rem 1.5rem;
            text-align: center;
            color: white;
        }

        .forgot-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #3498db;
        }

        .forgot-body {
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
            width: 100%;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
        }

        .btn-update {
            background: #3498db;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-update:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .back-to-login {
            text-align: center;
            margin-top: 1rem;
        }

        .back-to-login a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .back-to-login a:hover {
            color: #3498db;
        }

        @media (max-width: 480px) {
            .forgot-container {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>
    <div id="vanta-background"></div>
    <div class="forgot-container">
        <div class="forgot-card">
            <div class="forgot-header">
                <i class="fas fa-lock"></i>
                <h4>Reset Password</h4>
            </div>
            <div class="forgot-body">
                <form name="forgot-password-form" action="FarmerForgotPassword.php" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label><i class="fas fa-phone-alt mr-2"></i>Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-id-card mr-2"></i>CNIC Number</label>
                        <input type="text" class="form-control" name="cnic" placeholder="Enter your CNIC number" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-lock mr-2"></i>New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-lock mr-2"></i>Confirm Password</label>
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm new password" required>
                    </div>
                    <button type="submit" class="btn btn-update" name="register">
                        <i class="fas fa-sync-alt mr-2"></i>Update Password
                    </button>
                    <div class="back-to-login">
                        <a href="FarmerLogin.php"><i class="fas fa-arrow-left mr-2"></i>Back to Login</a>
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

        function validateForm() {
            var password = document.forms["forgot-password-form"]["password"].value;
            var confirmPassword = document.forms["forgot-password-form"]["confirmpassword"].value;

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

<?php
include("../Includes/db.php");
if (isset($_POST['register'])) {
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $cnic = mysqli_real_escape_string($con, $_POST['cnic']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

    $query = "select * from farmerregistration where farmer_phone = '$phonenumber' and farmer_cnic = '$cnic'";
    $run_query = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($run_query);

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

    if (strcmp($password, $confirmpassword) == 0) {
        if ($count_rows != 0) {
            $update_query = "update farmerregistration set farmer_password = '$encryption' 
                                 where farmer_phone = '$phonenumber' and farmer_cnic = '$cnic' ";

            $run_query = mysqli_query($con, $update_query);

            echo "<script>alert('Password Updated Successfully');</script>";
            echo "<script>window.open('FarmerLogin.php','_self')</script>";
        } else if ($count_rows == 0) {
            echo "<script>alert('Please Enter Valid Details');</script>";
        }
    } else {
        echo "<script>alert('Please Enter Valid Details');</script>";
    }
}

?>
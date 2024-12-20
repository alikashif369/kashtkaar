<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        .reset-container {
            max-width: 400px;
            width: 90%;
            margin: 2rem;
            position: relative;
            z-index: 1;
        }

        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .reset-header {
            background: #2c3e50;
            padding: 2rem 1.5rem;
            text-align: center;
            color: white;
        }

        .reset-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #3498db;
        }

        .reset-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1.2rem;
            border: 2px solid #e1e8ef;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
        }

        .btn-reset {
            background: #3498db;
            color: white;
            border: none;
            width: 100%;
            padding: 0.8rem;
            border-radius: 50px;
            font-weight: 500;
            margin-top: 1rem;
            transition: all 0.3s;
        }

        .btn-reset:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .back-to-login {
            text-align: center;
            margin-top: 1.5rem;
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
            .reset-container {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>
    <div id="vanta-background"></div>
    <div class="reset-container">
        <div class="reset-card">
            <div class="reset-header">
                <i class="fas fa-lock"></i>
                <h4>Reset Password</h4>
            </div>
            <div class="reset-body">
                <form action="BuyerForgotPassword.php" method="post">
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
                    <button type="submit" class="btn btn-reset" name="register">
                        <i class="fas fa-sync-alt mr-2"></i>Update Password
                    </button>
                    <div class="back-to-login">
                        <a href="BuyerLogin.php"><i class="fas fa-arrow-left mr-2"></i>Back to Login</a>
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

        document.querySelector('form').addEventListener('submit', function (e) {
            var phone = document.querySelector('input[name="phonenumber"]').value.trim();
            var cnic = document.querySelector('input[name="cnic"]').value.trim();
            var password = document.querySelector('input[name="password"]').value.trim();
            var confirmPassword = document.querySelector('input[name="confirmpassword"]').value.trim();

            var phonePattern = /^03[0-9]{9}$/;
            var cnicPattern = /^[0-9]{13}$/;

            if (!phonePattern.test(phone)) {
                alert('Please enter a valid phone number (e.g., 03001234567).');
                e.preventDefault();
            }

            if (!cnicPattern.test(cnic)) {
                alert('Please enter a valid CNIC number (e.g., 1234512345678).');
                e.preventDefault();
            }

            if (password !== confirmPassword) {
                alert('Password and Confirm Password should be the same.');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>

<?php
include("../Includes/db.php");
if (isset($_POST['register'])) {
    $phonenumber = mysqli_real_escape_string($con, trim($_POST['phonenumber']));
    $cnic = mysqli_real_escape_string($con, trim($_POST['cnic']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
    $confirmpassword = mysqli_real_escape_string($con, trim($_POST['confirmpassword']));

    $query = "select * from buyerregistration where buyer_phone = '$phonenumber' and buyer_cnic = '$cnic'";
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
            $update_query = "update buyerregistration set buyer_password = '$encryption' 
                                    where buyer_phone = '$phonenumber' and buyer_cnic = '$cnic' ";

            $run_query = mysqli_query($con, $update_query);

            echo "<script>alert('Password Updated Successfully');</script>";
            echo "<script>window.open('BuyerLogin.php','_self')</script>";
        } else if ($count_rows == 0) {
            echo "<script>alert('Please Enter Valid Details');</script>";
        }
    } else {
        echo "<script>alert('Password and Confirm Password should be the same');</script>";
    }
}

?>
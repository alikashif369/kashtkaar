<?php

include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
$sql = "select * from buyerregistration where buyer_phone = $sessphonenumber";
$run_query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($run_query)) {
    $password = $row['buyer_password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --text-color: #2c3e50;
            --light-bg: #ffffff;
            --danger-color: #e74c3c;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)),
                        url(../Images/Website/buyerLogin.jpeg);
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        .password-nav {
            background: var(--primary-color);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .back-btn {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            color: var(--accent-color);
            text-decoration: none;
        }

        .password-container {
            max-width: 500px;
            margin: 2rem auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .password-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent-color);
        }

        .password-header h1 {
            color: var(--primary-color);
            font-family: 'Righteous', cursive;
            margin: 0;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: var(--text-color);
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .submit-btn {
            background: var(--accent-color);
            color: white;
            border: none;
            width: 100%;
            padding: 1rem;
            font-size: 1.1rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .password-requirements {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #666;
        }

        .password-requirements h4 {
            color: var(--text-color);
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .password-requirements ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        @media (max-width: 576px) {
            .password-container {
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="password-nav">
        <div class="nav-content">
            <a href="BuyerProfile.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Profile</span>
            </a>
            <h2 style="color: white; margin: 0;">Change Password</h2>
            <div style="width: 24px;"></div>
        </div>
    </nav>

    <div class="password-container">
        <div class="password-header">
            <h1>Change Your Password</h1>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="currentpassword" placeholder="Enter your current password" required>
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="newpassword" placeholder="Enter new password" required>
            </div>

            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirmpassword" placeholder="Confirm new password" required>
            </div>

            <button type="submit" name="confirm" class="submit-btn">
                <i class="fas fa-key"></i> Update Password
            </button>
        </form>

        <div class="password-requirements">
            <h4>Password Requirements:</h4>
            <ul>
                <li>At least 8 characters long</li>
                <li>Must include numbers and letters</li>
                <li>At least one special character</li>
                <li>Must not be the same as current password</li>
            </ul>
        </div>
    </div>

    <?php
    if (isset($_POST['confirm'])) {
        $currentpassword = mysqli_real_escape_string($con, $_POST['currentpassword']);
        $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '2345678910111211';
        $encryption_key = "DE";

        $encryption1 = openssl_encrypt(
            $currentpassword,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
        $encryption2 = openssl_encrypt(
            $newpassword,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
        $encryption3 = openssl_encrypt(
            $confirmpassword,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        if (strcmp($password, $encryption1) == 0 and strcmp($encryption2, $encryption3) == 0) {
            $query = "update buyerregistration 
                    set buyer_password = '$encryption2'
                    where buyer_phone = $sessphonenumber";
            $run = mysqli_query($con, $query);

            echo "<script>alert('Password Updated Sucessfully!');</script>";
            echo "<script>window.open('BuyerProfile.php','_self')</script>";
        } else {
            echo "<script>alert('Please Enter Valid Details');</script>";
            echo "<script>window.open('BuyerChangePassword.php','_self')</script>";
        }
    }
    ?>

</body>
</html>
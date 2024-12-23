<?php

include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
$sql = "select * from farmerregistration where farmer_phone = $sessphonenumber";
$run_query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($run_query)) {
    $password = $row['farmer_password'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Kashtkaar</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #88c057;
            --white: #ffffff;
            --border-color: #e0e0e0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
            color: var(--primary-color);
        }

        .profile-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-title {
            font-family: 'Righteous', cursive;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            text-transform: uppercase;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .profile-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .profile-field {
            margin-bottom: 1.5rem;
        }

        .profile-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .profile-value {
            background: #f8f9fa;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--primary-color);
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .profile-value:disabled {
            background: #f8f9fa;
            cursor: not-allowed;
        }

        .btn-edit {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 1.1rem;
            width: 100%;
            max-width: 300px;
            margin: 2rem auto 0;
            display: block;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-edit:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .profile-icon {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .profile-icon i {
            font-size: 4rem;
            color: var(--secondary-color);
            background: rgba(52, 152, 219, 0.1);
            padding: 1.5rem;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 1rem;
            }

            .profile-title {
                font-size: 2rem;
            }

            .btn-edit {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-icon">
                <i class="fas fa-key"></i>
            </div>
            <div class="profile-header">
                <h1 class="profile-title">Change Password</h1>
            </div>
            
            <form action="" method="post">
                <div class="profile-field">
                    <label class="profile-label">Current Password</label>
                    <input type="password" class="profile-value" name="currentpassword" placeholder="Current Password" required>
                </div>
                <div class="profile-field">
                    <label class="profile-label">New Password</label>
                    <input type="password" class="profile-value" name="newpassword" placeholder="New Password" required>
                </div>
                <div class="profile-field">
                    <label class="profile-label">Re-enter Password</label>
                    <input type="password" class="profile-value" name="confirmpassword" placeholder="Confirm New Password" required>
                </div>
                <button type="submit" name="confirm" class="btn-edit">
                    <i class="fas fa-check-circle mr-2"></i>Confirm
                </button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['confirm'])) {
        $currentpassword = mysqli_real_escape_string($con, $_POST['currentpassword']);
        $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
        echo $newpassword, "<br>";
        echo $confirmpassword, "<br>";
        echo $currentpassword, "<br>";

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
            $sql = "update farmerregistration 
                    set farmer_password='$encryption2' 
                    where farmer_phone=$sessphonenumber";
            echo $sql;
            $run = mysqli_query($con, $sql);
            echo "<script>alert('Password Updated Sucessfully!');</script>";
            echo "<script>window.open('FarmerProfile.php','_self')</script>";
        } else {
            echo "<script>alert('Please Enter Valid Details');</script>";
            echo "<script>window.open('ChangePassword.php','_self')</script>";
        }
    }
    ?>

</body>

</html>
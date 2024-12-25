<?php

    include("../Includes/db.php");
    session_start();
    $sessphonenumber = $_SESSION['phonenumber'];
    $sql="select * from buyerregistration where buyer_phone = $sessphonenumber";
    $run_query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($run_query))
    {
        $name = $row['buyer_name'];
        $cnic = $row['buyer_cnic']; // Changed from pan to cnic
        $phone = $row['buyer_phone'];
        $address = $row['buyer_addr'];
        $account= $row['buyer_bank']; 
        $comp = $row['buyer_comp'];
        $license = $row['buyer_license'];
        $mail = $row['buyer_mail'];
        $user = $row['buyer_username'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --text-color: #2c3e50;
            --light-bg: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)),
                        url(../Images/Website/buyerLogin.jpeg);
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        .profile-nav {
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

        .edit-container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .edit-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent-color);
        }

        .edit-header h1 {
            color: var(--primary-color);
            font-family: 'Righteous', cursive;
            margin: 0;
        }

        .edit-form {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1.5rem;
            align-items: start;
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

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .form-group textarea {
            resize: none;
            background: #f8f9fa;
        }

        .form-actions {
            grid-column: 1 / -1;
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-submit,
        .btn-change-password {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit {
            background: var(--accent-color);
            color: white;
        }

        .btn-submit:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-change-password {
            background: #e74c3c;
            color: white;
        }

        .btn-change-password:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .edit-form {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <nav class="profile-nav">
        <div class="nav-content">
            <a href="BuyerProfile.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Profile</span>
            </a>
            <h2 style="color: white; margin: 0;">Edit Profile</h2>
            <div style="width: 24px;"></div>
        </div>
    </nav>

    <div class="edit-container">
        <div class="edit-header">
            <h1>Edit Your Profile</h1>
        </div>

        <form action="" method="post" class="edit-form">
            <div class="form-group">
                <label>Name</label>
                <textarea rows="2" disabled><?php echo $name?></textarea>
            </div>

            <div class="form-group">
                <label>CNIC</label>
                <textarea rows="2" disabled><?php echo $cnic?></textarea> <!-- Changed from $pan to $cnic -->
            </div>

            <div class="form-group">
                <label>Company</label>
                <textarea rows="2" disabled><?php echo $comp?></textarea>
            </div>

            <div class="form-group">
                <label>License</label>
                <textarea rows="2" disabled><?php echo $license?></textarea>
            </div>

            <div class="form-group">
                <label>Email ID</label>
                <textarea rows="2" disabled><?php echo $mail?></textarea>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $user?>">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phonenumber" value="<?php echo $phone?>">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $address?>">
            </div>

            <div class="form-group">
                <label>Bank Account</label>
                <input type="number" name="bank" value="<?php echo $account?>">
            </div>

            <div class="form-actions">
                <button type="submit" name="confirm" class="btn-submit">
                    <i class="fas fa-save"></i> Save Changes
                </button>
                <a href="BuyerChangePassword.php" class="btn-change-password" style="text-decoration: none; text-align: center;">
                    <i class="fas fa-key"></i> Change Password
                </a>
            </div>
        </form>
    </div>
</body>
</html>

<?php

    include("../Includes/db.php");

    if (isset($_POST['confirm']))
    {
        $phone = mysqli_real_escape_string( $con,$_POST['phonenumber']);
        $address = mysqli_real_escape_string( $con,$_POST['address']);
        $account = mysqli_real_escape_string( $con,$_POST['bank']);   
        $user = mysqli_real_escape_string( $con,$_POST['username']);   
        
        $query = "update buyerregistration 
                  set buyer_phone = '$phone', buyer_username = '$user', 
                  buyer_addr = '$address', buyer_bank = '$account' 
                  where buyer_id in 
                  (select buyer_id from buyerregistration 
                  where buyer_phone='$sessphonenumber')"; 
        echo $query;
       

        $run = mysqli_query($con, $query);

        $_SESSION['phonenumber'] = $phone;
       echo "<script>window.open('BuyerProfile.php','_self')</script>";
    }
?>
<?php
    include("../Includes/db.php");
    session_start();
    $sessphonenumber = $_SESSION['phonenumber'];
    $sql="select * from buyerregistration where buyer_phone = '$sessphonenumber'";
    $run_query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($run_query))
    {
        $name = $row['buyer_name'];
        $phone = $row['buyer_phone'];
        $address = $row['buyer_addr'];
        $cnic = $row['buyer_cnic']; // Changed from pan to cnic
        $bank = $row['buyer_bank'];

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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buyer Profile</title>
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

        .profile-container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent-color);
        }

        .profile-header h1 {
            color: var(--primary-color);
            font-family: 'Righteous', cursive;
            margin: 0;
        }

        .profile-form {
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

        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f8f9fa;
            font-size: 1rem;
            resize: none;
        }

        .edit-btn {
            grid-column: 1 / -1;
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .edit-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .profile-form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="profile-nav">
        <div class="nav-content">
            <a href="bhome.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Home</span>
            </a>
            <h2 style="color: white; margin: 0;">Profile</h2>
            <div style="width: 24px;"></div> <!-- Spacer for alignment -->
        </div>
    </nav>

    <div class="profile-container">
        <div class="profile-header">
            <h1>BUYER'S PROFILE</h1>
        </div>

        <form action="BuyerEditProfile.php" method="post" class="profile-form">
            <div class="form-group">
                <label>Name</label>
                <textarea rows="2" disabled><?php echo $name?></textarea>
            </div>

            <div class="form-group">
                <label>Username</label>
                <textarea rows="2" disabled><?php echo $user?></textarea>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <textarea rows="1" disabled><?php echo $phone?></textarea>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea rows="3" disabled><?php echo $address?></textarea>
            </div>

            <div class="form-group">
                <label>CNIC Number</label>
                <textarea rows="2" disabled><?php echo $cnic?></textarea>
            </div>

            <div class="form-group">
                <label>Account Number</label>
                <textarea rows="2" disabled><?php echo $bank?></textarea>
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
                <label>Email</label>
                <textarea rows="2" disabled><?php echo $mail?></textarea>
            </div>

            <button type="submit" name="editProf" class="edit-btn">
                <i class="fas fa-edit"></i> Edit Profile
            </button>
        </form>
    </div>
</body>
</html>

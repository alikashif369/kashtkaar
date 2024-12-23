<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
$sql = "select * from farmerregistration where farmer_phone = '$sessphonenumber' ";
$run_query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($run_query)) {
    $name = $row['farmer_name'];
    $phone = $row['farmer_phone'];
    $address = $row['farmer_address'];
    $cnic = $row['farmer_cnic'];
    $bank = $row['farmer_bank'];
    $state = $row['farmer_state'];
    $district = $row['farmer_district'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile - Kashtkaar</title>
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
            max-width: 800px;
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

        .btn-edit, .btn-home {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 1.1rem;
            width: 100%;
            max-width: 300px;
            margin: 1rem auto 0;
            display: block;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-edit:hover, .btn-home:hover {
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

            .btn-edit, .btn-home {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="profile-header">
                <h1 class="profile-title">Farmer's Profile</h1>
            </div>
            
            <form action="EditProfile.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">Name</label>
                            <input type="text" class="profile-value" value="<?php echo $name ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">Phone Number</label>
                            <input type="text" class="profile-value" value="<?php echo $phone ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="profile-field">
                            <label class="profile-label">Address</label>
                            <textarea class="profile-value" rows="2" readonly><?php echo $address ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">State</label>
                            <input type="text" class="profile-value" value="<?php echo $state ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">District</label>
                            <input type="text" class="profile-value" value="<?php echo $district ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">CNIC Number</label>
                            <input type="text" class="profile-value" value="<?php echo $cnic ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">Account Number</label>
                            <input type="text" class="profile-value" value="<?php echo $bank ?>" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" name="editProf" class="btn-edit">
                    <i class="fas fa-edit mr-2"></i>Edit Profile
                </button>
            </form>
            <a href="farmerHomepage.php" class="btn-home">
                <i class="fas fa-home mr-2"></i>Home
            </a>
        </div>
    </div>
</body>
</html>
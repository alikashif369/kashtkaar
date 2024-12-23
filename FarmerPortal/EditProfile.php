<?php

include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
$sql = "select * from farmerregistration where farmer_phone = '$sessphonenumber'";
$run_query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($run_query)) {
    $name = $row['farmer_name'];
    $cnic = $row['farmer_cnic'];
    $phone = $row['farmer_phone'];
    $address = $row['farmer_address'];
    $account = $row['farmer_bank'];
    $state = $row['farmer_state'];
    $district = $row['farmer_district'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Kashtkaar</title>
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
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="profile-header">
                <h1 class="profile-title">Edit Profile</h1>
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
                            <label class="profile-label">CNIC</label>
                            <input type="text" class="profile-value" value="<?php echo $cnic ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">Phone Number</label>
                            <input type="text" class="profile-value" name="phonenumber" value="<?php echo $phone ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">Address</label>
                            <input type="text" class="profile-value" name="address" value="<?php echo $address ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">State</label>
                            <select name="statevalue" id="states" class="profile-value" onchange="state()">
                                <option value="0">--Select Province--</option>
                                <option value="PUNJAB">PUNJAB</option>
                                <option value="SINDH">SINDH</option>
                                <option value="KHYBER PAKHTUNKHWA">KHYBER PAKHTUNKHWA</option>
                                <option value="BALOCHISTAN">BALOCHISTAN</option>
                                <option value="ISLAMABAD">ISLAMABAD</option>
                                <option value="GILGIT-BALTISTAN">GILGIT-BALTISTAN</option>
                                <option value="AZAD KASHMIR">AZAD KASHMIR</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">District</label>
                            <select name="district" id="district" class="profile-value">
                                <option>Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-field">
                            <label class="profile-label">Bank Account</label>
                            <input type="number" class="profile-value" name="bank" value="<?php echo $account ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" name="confirm" class="btn-edit">
                    <i class="fas fa-check-circle mr-2"></i>Confirm
                </button>
            </form>
            <div class="text-center mt-4">
                <a href="ChangePassword.php" class="btn btn-outline-secondary">
                    <i class="fas fa-key mr-2"></i>Change Password
                </a>
            </div>
        </div>
    </div>

    <script>
        function state() {
            var a = document.getElementById('states').value;
            var array = [];
            if (a === 'PUNJAB') {
                array = ['Lahore', 'Faisalabad', 'Rawalpindi', 'Gujranwala', 'Multan', 'Sargodha', 'Sialkot', 'Bahawalpur', 'Sheikhupura', 'Rahim Yar Khan'];
            } else if (a === 'SINDH') {
                array = ['Karachi', 'Hyderabad', 'Sukkur', 'Larkana', 'Nawabshah', 'Mirpur Khas', 'Jacobabad', 'Shikarpur', 'Khairpur', 'Dadu'];
            } else if (a === 'KHYBER PAKHTUNKHWA') {
                array = ['Peshawar', 'Mardan', 'Mingora', 'Kohat', 'Abbottabad', 'Dera Ismail Khan', 'Mansehra', 'Swabi', 'Charsadda', 'Nowshera'];
            } else if (a === 'BALOCHISTAN') {
                array = ['Quetta', 'Khuzdar', 'Turbat', 'Chaman', 'Gwadar', 'Sibi', 'Zhob', 'Dera Murad Jamali', 'Usta Mohammad', 'Loralai'];
            } else if (a === 'ISLAMABAD') {
                array = ['Islamabad'];
            } else if (a === 'GILGIT-BALTISTAN') {
                array = ['Gilgit', 'Skardu', 'Hunza', 'Diamer', 'Ghizer', 'Ghanche', 'Astore', 'Nagar'];
            } else if (a === 'AZAD KASHMIR') {
                array = ['Muzaffarabad', 'Mirpur', 'Kotli', 'Rawalakot', 'Bagh', 'Bhimber', 'Pallandri', 'Hattian Bala', 'Haveli'];
            }

            var string = "";
            for (let i = 0; i < array.length; i++) {
                string += "<option>" + array[i] + "</option>";
            }
            document.getElementById('district').innerHTML = string;
        }
    </script>
</body>
</html>

<?php

if (isset($_POST['confirm'])) {
    $phone = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $state = mysqli_real_escape_string($con, $_POST['statevalue']);
    $account = mysqli_real_escape_string($con, $_POST['bank']);

    $query = "update farmerregistration 
              set farmer_phone = '$phone', farmer_address = '$address',
              farmer_bank = '$account', farmer_state = '$state',
              farmer_district = '$district'
              where farmer_phone = '$sessphonenumber'";
    $run = mysqli_query($con, $query);
    
    $_SESSION['phonenumber'] = $phone;
    echo "<script>window.open('FarmerProfile.php','_self')</script>";
}
?>
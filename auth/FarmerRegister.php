<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <title>Farmer Registration Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
    <script>
        function state() {
            var a = document.getElementById('states').value;
            if (a === 'PUNJAB') {
                var array = ['Lahore', 'Faisalabad', 'Rawalpindi', 'Gujranwala', 'Multan', 'Sargodha', 'Sialkot', 'Bahawalpur', 'Sheikhupura', 'Rahim Yar Khan'];
            } else if (a === 'SINDH') {
                var array = ['Karachi', 'Hyderabad', 'Sukkur', 'Larkana', 'Nawabshah', 'Mirpur Khas', 'Jacobabad', 'Shikarpur', 'Khairpur', 'Dadu'];
            } else if (a === 'KHYBER PAKHTUNKHWA') {
                var array = ['Peshawar', 'Mardan', 'Mingora', 'Kohat', 'Abbottabad', 'Dera Ismail Khan', 'Mansehra', 'Swabi', 'Charsadda', 'Nowshera'];
            } else if (a === 'BALOCHISTAN') {
                var array = ['Quetta', 'Khuzdar', 'Turbat', 'Chaman', 'Gwadar', 'Sibi', 'Zhob', 'Dera Murad Jamali', 'Usta Mohammad', 'Loralai'];
            } else if (a === 'ISLAMABAD') {
                var array = ['Islamabad'];
            } else if (a === 'GILGIT-BALTISTAN') {
                var array = ['Gilgit', 'Skardu', 'Hunza', 'Diamer', 'Ghizer', 'Ghanche', 'Astore', 'Nagar'];
            } else if (a === 'AZAD KASHMIR') {
                var array = ['Muzaffarabad', 'Mirpur', 'Kotli', 'Rawalakot', 'Bagh', 'Bhimber', 'Pallandri', 'Hattian Bala', 'Haveli'];
            }

            var string = "";
            for (let i = 0; i < array.length; i++) {
                string = string + "<option>" + array[i] + "</option>";
            }
            string = "<select name='district'>" + string + "</select>";
            document.getElementById('district').innerHTML = string;
        }

        function validateForm() {
            var phoneNumber = document.forms["my-form"]["phonenumber"].value;
            var cnic = document.forms["my-form"]["cnic"].value;
            var account = document.forms["my-form"]["account"].value;
            var password = document.forms["my-form"]["password"].value;
            var confirmPassword = document.forms["my-form"]["confirmpassword"].value;

            var phonePattern = /^[0-9]{11}$/;
            var cnicPattern = /^[0-9]{13}$/;
            var accountPattern = /^[0-9]{10,16}$/;

            if (!phonePattern.test(phoneNumber)) {
                alert("Please enter a valid 11-digit phone number.");
                return false;
            }

            if (!cnicPattern.test(cnic)) {
                alert("Please enter a valid 13-digit CNIC number.");
                return false;
            }

            if (!accountPattern.test(account)) {
                alert("Please enter a valid bank account number (10-16 digits).");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }
    </script>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
    .myfooter {
        background-color: #292b2c;

        color: goldenrod;
        margin-top: 15px;
    }

    .aligncenter {
        text-align: center;
    }

    a {
        color: goldenrod;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    nav {
        background-color: #292b2c;
    }

    .navbar-custom {
        background-color: #292b2c;
    }

    /* change the brand and text color */
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
        background-color: #292b2c;
    }

    .navbar-custom .navbar-nav .nav-link {
        background-color: #292b2c;
    }

    .navbar-custom .nav-item.active .nav-link,
    .navbar-custom .nav-item:hover .nav-link {
        background-color: #292b2c;
    }


    .mybtn {
        border-color: green;
        border-style: solid;
    }


    .right {
        display: flex;
    }

    .left {
        display: none;
    }

    .cart {
        /* margin-left:10px; */
        margin-right: -9px;
    }

    .profile {
        margin-right: 2px;

    }

    .login {
        margin-right: -2px;
        margin-top: 12px;
        display: none;
    }

    .searchbox {
        width: 60%;
    }

    .lists {
        display: inline-block;
    }

    .moblists {
        display: none;
    }

    .logins {
        text-align: center;
        margin-right: -30%;
        margin-left: 35%;
    }
  body{
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }

    .my-form, .login-form
    {
        font-family: Raleway, sans-serif;
    }

    .my-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .my-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }

    .login-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .login-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
    @media only screen and (min-device-width:320px) and (max-device-width:480px) {
        /* .mycarousel {
            display: none;
        }

        .firstimage {
            height: auto;
            width: 90%;
        }

        .card {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;

        }

        .col {
            margin-top: 20px;
        } */

        .right {
            display: none;
            background-color: #ff5500;
        }

        /* 
            .settings{
            margin-left:79%;
        } */
        .left {
            display: flex;
        }

        .moblogo {
            display: none;
        }

        .logins {
            text-align: center;
            margin-right: 35%;
            padding: 15px;
        }

        .searchbox {
            width: 95%;
            margin-right: 5%;
            margin-left: 0%;
        }

        .moblists {
            display: inline-block;
            text-align: center;
            width: 100%;
        }
        /* .pic{
        height:auto;
    } */
    
    /* .mobtext{
        display:none;
    }
    .destext{
        display:inline-block;
        width:90%;
        margin-left: 5%;
        margin-right: 5%;
    } */
    }

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

    .card {
        background: rgba(255, 255, 255, 0.95) !important;
        border-radius: 20px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        border: none !important;
        overflow: hidden;
        margin: 2rem 0;
    }

    .card-header {
        background: #2c3e50 !important;
        color: white !important;
        padding: 1.5rem !important;
        text-align: center;
        border: none !important;
    }

    .card-header h4 {
        color: white !important;
        font-size: 1.5rem;
        font-weight: 500;
        margin: 0;
    }

    .card-body {
        padding: 2rem !important;
    }

    .form-control {
        border-radius: 50px !important;
        padding: 0.8rem 1.2rem !important;
        border: 2px solid #e1e8ef !important;
        transition: all 0.3s !important;
    }

    .form-control:focus {
        border-color: #3498db !important;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1) !important;
    }

    select.form-control {
        height: calc(1.5em + 1.6rem + 4px) !important;
    }

    .btn-primary {
        background: #3498db !important;
        border: none !important;
        border-radius: 50px !important;
        padding: 0.8rem 2rem !important;
        font-weight: 500 !important;
        transition: all 0.3s !important;
    }

    .btn-primary:hover {
        background: #2980b9 !important;
        transform: translateY(-2px);
    }

    .col-form-label {
        font-weight: 500 !important;
        color: #2c3e50 !important;
    }

    @media (max-width: 768px) {
        .card {
            margin: 1rem;
        }
        
        .card-body {
            padding: 1.5rem !important;
        }
    }

    .fade-in {
        animation: fadeIn 1.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .container {
        max-width: 800px;
        width: 90%;
        margin: 2rem auto;
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 2rem 0;
    }

    .card-header {
        background: #2c3e50;
        color: white;
        padding: 1.5rem;
        text-align: center;
    }

    .card-header h4 {
        font-size: 1.8rem;
        margin: 0;
        color: white;
    }

    .card-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        border-radius: 50px;
        padding: 12px 20px;
        height: auto;
        border: 2px solid #eee;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    select.form-control {
        height: calc(1.5em + 1.25rem + 2px);
    }

    .btn-primary {
        background: #3498db;
        border: none;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        width: 100%;
        margin-top: 1rem;
    }

    .btn-primary:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .col-form-label {
        font-weight: 500;
        color: #2c3e50;
    }

    .col-form-label i {
        width: 20px;
        color: #3498db;
    }

    textarea.form-control {
        border-radius: 20px;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
            margin: 1rem auto;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }
    }
    </style>
</head>

<body>
    <div id="vanta-background"></div>
    <div class="container">
        <div class="card fade-in">
            <div class="card-header">
                <h4><i class="fas fa-user-plus mr-2"></i>Farmer Registration</h4>
            </div>
            <div class="card-body">
                <form name="my-form" action="FarmerRegister.php" method="post" onsubmit="return validateForm()">
                    <!-- Full Name -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-user"></i> Full Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-phone-alt"></i> Phone Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phonenumber" placeholder="03xx-xxxxxxx" required>
                        </div>
                    </div>

                    <!-- Present Address -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-home"></i> Present Address
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="address" rows="4" placeholder="Enter your address" required></textarea>
                        </div>
                    </div>

                    <!-- Province -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-globe-americas"></i> Province
                        </label>
                        <div class="col-md-6">
                            <select name="statevalue" id="states" onchange="state()" class="form-control">
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

                    <!-- District -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-globe-americas"></i> District
                        </label>
                        <div class="col-md-6">
                            <select name="district" id="district" class="form-control">
                                <option>Select District</option>
                            </select>
                        </div>
                    </div>

                    <!-- CNIC No. -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-pencil-alt"></i> CNIC No.
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cnic" placeholder="e.g., 1234512345671" required>
                        </div>
                    </div>

                    <!-- Bank Account No. -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-university"></i> Bank Account No.
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="account" placeholder="e.g., 1234567890123456" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            <i class="fas fa-lock"></i> Confirm Password
                        </label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="register">
                                <i class="fas fa-user-plus mr-2"></i>Register
                            </button>
                        </div>
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

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '2345678910111211';
$encryption_key = "DE";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $cnic = mysqli_real_escape_string($con, $_POST['cnic']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $state = mysqli_real_escape_string($con, $_POST['statevalue']);

    $encryption = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );
    // echo $encryption;

    if (strcmp($password, $confirmpassword) == 0) {

        $query = "insert into farmerregistration (farmer_name,farmer_phone,
                farmer_address, farmer_state, farmer_district,
                farmer_cnic,farmer_bank,farmer_password) 
                values ('$name','$phonenumber','$address',
                '$state','$district','$cnic','$account',
                '$encryption')";

        $run_register_query = mysqli_query($con, $query);
        echo "<script>console.log('SucessFully Inserted');</script>";
        echo "<script>window.open('FarmerLogin.php','_self')</script>";
    } else if (strcmp($password, $confirmpassword) != 0) {
        echo "<script>
				alert('Password and Confirm Password Should be same');
			</script>";
    }
}

?>
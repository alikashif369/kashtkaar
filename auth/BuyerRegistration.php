<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Registration</title>
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

        .container {
            max-width: 900px;
            width: 95%;
            margin: 2rem auto;
            position: relative;
            z-index: 1;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 1rem 0;
            border: none !important;
        }

        .card-header {
            background: #2c3e50 !important;
            padding: 1.5rem;
            text-align: center;
            border: none;
        }

        .card-header h4 {
            color: white !important;
            font-size: 1.8rem;
            margin: 0;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid #e1e8ef;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        textarea.form-control {
            border-radius: 20px;
        }

        .col-form-label {
            font-weight: 500;
            color: #2c3e50;
        }

        .col-form-label i {
            color: #3498db;
            width: 24px;
        }

        .btn-primary {
            background: #3498db !important;
            color: white !important;  /* Changed from goldenrod to white */
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            display: block;
            width: 200px;
            margin: 2rem auto 0;
        }

        .btn-primary:hover {
            background: #2980b9 !important;
            transform: translateY(-2px);
        }

        .fade-in {
            animation: fadeIn 1.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 1rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="vanta-background"></div>
    <div class="container">
        <div class="card fade-in">
            <div class="card-header">
                <h4><i class="fas fa-user-plus mr-2"></i>Buyer Registration</h4>
            </div>
            <div class="card-body">
                <form name="my-form" action="BuyerRegistration.php" method="post">
                    <div class="form-group row">
                        <label for="full_name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-user mr-2"></i><b>Full Name</b></label>
                        <div class="col-md-6">
                            <input type="text" id="full_name" class="form-control border border-dark" name="name" placeholder="Enter your full name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right "><i class="fas fa-phone-alt mr-2"></i><b>Phone Number</b></label>
                        <div class="col-md-6">
                            <input type="text" id="phone_number" class="form-control w-100 border border-dark" style="width:100% ! important;" name="phonenumber" placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right"><i class="far fa-envelope mr-2"></i><b>Email Address</b></label>
                        <div class="col-md-6">
                            <input type="email" id="email_address" class="form-control border border-dark" name="mail" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="present_address" class="col-md-4 col-form-label text-md-right"><i class="fas fa-home mr-2"></i><b>Present Address</b></label>
                        <div class="col-md-6">
                            <textarea type="text" id="present_address" class="form-control border border-dark" rows="4" name="address" placeholder="Enter your complete address" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-building mr-2"></i><b>Company Name</b></label>
                        <div class="col-md-6">
                            <input type="text" id="company_name" class="form-control border border-dark" name="company_name" placeholder="Enter your company name" required>
                        </div>
                    </div>            

                    <div class="form-group row">
                        <label for="license" class="col-md-4 col-form-label text-md-right"><i class="fas fa-id-badge mr-2"></i><b>License</b></label>
                        <div class="col-md-6">
                            <input type="text" id="license" class="form-control border border-dark" name="license" placeholder="Enter your license number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="account1" class="col-md-4 col-form-label text-md-right"><i class="fas fa-university mr-2"></i><b>Bank Account No.</b></label>
                        <div class="col-md-6">
                            <input type="text" id="account1" class="form-control border border-dark" name="account" placeholder="Enter your bank account number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="account2" class="col-md-4 col-form-label text-md-right"><i class="fas fa-pencil-alt mr-2"></i><b>CNIC No.</b></label>
                        <div class="col-md-6">
                            <input type="text" id="account2" class="form-control border border-dark" name="cnic" placeholder="Enter your CNIC number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-user mr-2"></i><b>Username</b></label>
                        <div class="col-md-6">
                            <input type="text" id="user_name" class="form-control border border-dark" name="username" placeholder="Choose a username" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="p1" class="col-md-4 col-form-label text-md-right "><i class="fas fa-lock mr-2"></i><b>Password</b></label>
                        <div class="col-md-6">
                            <input id="p1" class="form-control border border-dark" type="password" name="password" placeholder="Enter a password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="p2" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock mr-2"></i><b>Confirm Password</b></label>
                        <div class="col-md-6">
                            <input id="p2" class="form-control border border-dark" type="password" name="confirmpassword" placeholder="Confirm your password" required>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" name="register">
                            <i class="fas fa-user-plus mr-2"></i>Register
                        </button>
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

        document.querySelector('form[name="my-form"]').addEventListener('submit', function (e) {
            var phone = document.getElementById('phone_number').value.trim();
            var cnic = document.getElementById('account2').value.trim();
            var password = document.getElementById('p1').value.trim();
            var confirmPassword = document.getElementById('p2').value.trim();

            var phonePattern = /^03[0-9]{9}$/;
            var cnicPattern = /^[0-9]{13}$/; // Ensure pattern allows 13 digits without dashes

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

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $license = mysqli_real_escape_string($con, $_POST['license']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $cnic = mysqli_real_escape_string($con, $_POST['cnic']);
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

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

        $query = "insert into buyerregistration (buyer_name,buyer_phone,buyer_addr,buyer_comp,
        buyer_license,buyer_bank,buyer_cnic,buyer_mail,buyer_username,buyer_password) 
        values ('$name','$phonenumber','$address','$company_name','$license','$account','$cnic',
        '$mail','$username','$encryption')";

        $run_register_query = mysqli_query($con, $query);
        echo "<script>alert('SucessFully Inserted');</script>";
        echo "<script>window.open('BuyerLogin.php','_self')</script>";
    } else if (strcmp($password, $confirmpassword) != 0) {
        echo "<script>
            alert('Password and Confirm Password Should be same');
        </script>";
    }
}


?>
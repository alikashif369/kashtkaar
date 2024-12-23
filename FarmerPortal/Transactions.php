<?php
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transactions - Kashtkaar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
    <script src="../portal_files/jquery.min.js.download"></script>
    <script src="../portal_files/popper.min.js.download"></script>
    <script src="../portal_files/bootstrap.min.js.download"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --border-color: #e0e0e0;
            --text-color: #2c3e50;
            --light-bg: #ffffff;
        }

        * {
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 1rem;
            margin-right: 2rem;
        }

        .brand-text {
            font-family: 'Righteous', cursive;
            color: white;
            font-size: 28px;
            font-weight: 400;
            margin: 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            background: linear-gradient(45deg, #fff, #3498db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand img {
            height: 50px;
            filter: brightness(1.2);
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 1rem 1.5rem !important;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: var(--accent-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover:after {
            width: 80%;
        }

        /* User Menu Styles */
        .user-menu {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .user-menu .dropdown-menu {
            background: var(--primary-color);
            border: 1px solid var(--accent-color);
            border-radius: 8px;
            margin-top: 0.5rem;
        }

        .user-menu .dropdown-item {
            color: white;
            padding: 0.7rem 1.5rem;
            transition: all 0.2s;
        }

        .user-menu .dropdown-item:hover {
            background: var(--accent-color);
            color: white;
        }

        /* Footer Styles */
        .myfooter {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section {
            padding: 0 1rem;
        }

        .footer-section h5 {
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .footer-section h5:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 50px;
            height: 2px;
            background: #3498db;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #3498db;
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .footer-bottom p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
        }

        .footer-bottom a {
            color: #3498db;
            text-decoration: none;
        }

        .footer-bottom a:hover {
            color: #fff;
        }

        .contact-info {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: rgba(255,255,255,0.8);
        }

        .contact-info i {
            margin-right: 10px;
            color: #3498db;
        }

        /* Updated Footer Link Styles */
        .footer-section .contact-info li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-section .contact-info li a:hover {
            color: #3498db;
            padding-left: 5px;
        }

        .footer-section .contact-info li {
            transition: all 0.3s ease;
        }

        .footer-section .contact-info li:hover {
            color: white;
        }

        .footer-section .contact-info li:hover i {
            color: white;
        }

        .social-links a {
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.8);
        }

        .social-links a:hover {
            background: #3498db;
            color: white;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }

        .table th, .table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
            text-transform: uppercase;
            font-weight: 600;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table td {
            font-size: 0.95rem;
            color: var(--text-color);
        }

        .table td[data-label]::before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--accent-color);
            display: block;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .table thead {
                display: none;
            }

            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 1rem;
                border: 1px solid var(--border-color);
                border-radius: 8px;
                overflow: hidden;
            }

            .table td {
                padding: 1rem;
                text-align: right;
                position: relative;
            }

            .table td[data-label]::before {
                position: absolute;
                left: 1rem;
                top: 1rem;
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="farmerHomepage.php">
                <img src="kashtkaar_logo.png" alt="Logo">
                <span class="brand-text">Kashtkaar</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
                <i class="fas fa-bars" style="color: white"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="farmerHomepage.php">
                            <i class="fa fa-home mr-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="MyProducts.php">
                            <i class="fa fa-leaf mr-2"></i>My Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Transactions.php">
                            <i class="fa fa-exchange mr-2"></i>Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CallCenter.php">
                            <i class="fa fa-phone mr-2"></i>Call/SMS
                        </a>
                    </li>
                </ul>

                <div class="user-menu">
                    <?php if(isset($_SESSION['phonenumber'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle text-white" type="button" id="userMenu" data-toggle="dropdown">
                                <i class="fa fa-user-circle mr-2"></i><?php getFarmerUsername(); ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="FarmerProfile.php">Profile</a>
                                <a class="dropdown-item" href="Transactions.php">Orders</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="../auth/FarmerLogin.php" class="btn btn-outline-light">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div style="display:block;">
        <div class="content_item">
            <label style="font-size: 30px; text-shadow: 1px 1px 1px gray; color: var(--primary-color);"><b>TRANSACTION HISTORY</b></label>
        </div>
        <br>
    </div>
    <div class="container">
        <div class="transaction-table table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Delivery Address</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    global $con;
                    if (isset($_SESSION['phonenumber'])) {
                        $sess_phone_number = $_SESSION['phonenumber'];
                        $sel_price = "select * from orders where phonenumber = '$sess_phone_number'";
                        $run_price = mysqli_query($con, $sel_price);
                        $i = 0;
                        while ($p_price = mysqli_fetch_array($run_price)) {
                            $product_id = $p_price['product_id'];
                            $qty = $p_price['qty'];
                            $total = $p_price['total'];
                            $address = $p_price['address'];
                            $phone = $p_price['buyer_phonenumber'];
                            $pro_price = "select * from products where product_id='$product_id'";
                            $run_pro_price = mysqli_query($con, $pro_price);
                            while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                                $product_title = $pp_price['product_title'];
                                $query_name = "select * from buyerregistration where buyer_phone = $phone";
                                $run_query_name = mysqli_query($con, $query_name);
                                while ($names = mysqli_fetch_array($run_query_name)) {
                                    $buyer_name = $names['buyer_name'];
                    ?>
                                    <tr>
                                        <td data-label="Product Name"><?php echo $product_title; ?></td>
                                        <td data-label="Customer Name"><?php echo $buyer_name; ?></td>
                                        <td data-label="Phone Number"><?php echo $phone; ?></td>
                                        <td data-label="Delivery Address"><?php echo $address; ?></td>
                                        <td data-label="Quantity"><?php echo $qty; ?></td>
                                        <td data-label="Amount"><?php echo $total; ?></td>
                                    </tr>
                </tbody>
                    <?php
                                }
                            }
                            $i++;
                        }
                    } else {
                        echo "<h1 align = center>Please Login First!</h1><br><br><hr>";
                    } ?>
            </table>
        </div>
    </div>
    <br> <br>
    <section id="footer" class="myfooter">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h5>About Kashtkaar</h5>
                    <p>Empowering farmers through technology to connect directly with buyers and achieve better prices for their produce.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h5>Quick Links</h5>
                    <ul class="contact-info">
                        <li><a href="farmerHomepage.php">Home</a></li>
                        <li><a href="MyProducts.php">My Products</a></li>
                        <li><a href="Transactions.php">Transactions</a></li>
                        <li><a href="CallCenter.php">Support</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h5>Contact Us</h5>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-phone"></i>
                            +92 123 456 7890
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            support@kashtkaar.pk
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            Islamabad, Pakistan
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>
                    Copyright &copy; 2024 <a href="#">Kashtkaar</a>. All rights reserved.
                </p>
            </div>
        </div>
    </section>
</body>
</html>
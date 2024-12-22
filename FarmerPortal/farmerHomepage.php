<?php
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Farmer Homepage</title>
    <!-- <link rel="stylesheet" href="portal_files/font-awesome.min.css"> -->
    <!-- <script src="../portal_files/c587fc1763.js.download" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        .header, .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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

        @media (max-width: 576px) {
            .brand-text {
                font-size: 24px;
            }
        }

        .navbar-brand img {
            height: 50px;
            filter: brightness(1.2);
        }

        #navbar {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.1rem;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        #navbar:hover {
            background-color: var(--accent-color);
            color: white;
        }

        .card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.1);
        }

        .card-title {
            color: var(--primary-color);
        }

        .features h1:after {
            background-color: var(--accent-color);
        }

        .myfooter {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-links {
            background-color: #f8f9fa;
            border-bottom: 1px solid var(--border-color);
        }

        .social-links a:hover {
            color: var(--accent-color);
        }

        .navbar-toggler {
            color: white;
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-toggler i {
            color: white !important;
        }

        .list-group-item {
            background-color: var(--primary-color) !important;
            color: white !important;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .list-group-item:hover {
            background-color: var(--accent-color) !important;
        }

        /* Updated Navbar Styles */
        .navbar {
            padding: 0.8rem 1rem;
            background-color: var(--primary-color) !important;
            border-bottom: 3px solid var(--accent-color);
        }

        .main-nav {
            background-color: var(--primary-color);
            padding: 0;
            margin-top: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .main-nav .nav-item {
            padding: 0 0.5rem;
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

        /* Mobile Navigation */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: var(--primary-color);
                padding: 1rem;
                border-radius: 8px;
                margin-top: 0.5rem;
            }

            .nav-link {
                padding: 0.7rem 1rem !important;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }

            .nav-link:last-child {
                border-bottom: none;
            }

            .user-menu {
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid rgba(255,255,255,0.1);
            }
        }

        /* Adjust container padding */
        .container {
            padding: 0 15px;
            max-width: 1140px;
        }

        /* Adjust carousel size */
        .carousel {
            margin: 1rem auto;
        }
        
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }

        /* Make secondary nav more compact */
        .nav-links {
            padding: 0.5rem 0;
        }

        #navbar {
            font-size: 0.95rem;
            padding: 8px 12px;
            margin: 0 8px;
        }

        /* Adjust features section */
        .features {
            padding: 2rem 0;
        }

        .features h1 {
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        /* Make cards more compact */
        .card {
            margin: 10px;
            max-width: 300px;
        }

        .card-img-top {
            height: 160px;
            object-fit: contain;
            padding: 1rem;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 0;
        }

        /* Adjust footer */
        .myfooter {
            padding: 2rem 0;
        }

        .myfooter h5 {
            font-size: 1.1rem;
        }

        .myfooter p {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .social-links li {
            margin: 0 5px;
        }

        /* Adjust spacing between sections */
        .section-gap {
            margin: 2rem 0;
        }

        /* Make row of cards flex */
        .features .row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* Remove unnecessary nav-links styles */
        .nav-links, #navbar {
            display: none; /* Or you can completely remove these classes */
        }

        /* Adjust main navbar spacing */
        .navbar {
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
        }

        .nav-item {
            margin: 0 5px;
        }

        .nav-link {
            padding: 0.8rem 1.2rem !important;
            font-size: 0.95rem;
        }

        /* Add these new styles for features section */
        .feature-card {
            text-align: center;
            padding: 2rem;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--accent-color);
            color: white;
            font-size: 2.5rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: var(--primary-color);
            transform: scale(1.1) rotate(5deg);
        }

        .feature-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .feature-text {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
        }

        .features .row {
            gap: 2rem;
            justify-content: center;
            padding: 2rem 0;
        }

        /* Add additional feature icons/cards styles */
        .features .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
        }

        .feature-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .feature-text {
            flex-grow: 1;
        }

        /* Enhanced Feature Section Styles */
        .features {
            padding: 4rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .features h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: var(--primary-color);
            position: relative;
        }

        .features h1:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        .features .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            padding: 1rem;
        }

        .feature-card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border: none;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-color) 100%);
            opacity: 0;
            transition: all 0.4s ease;
            z-index: 1;
        }

        .feature-card:hover::before {
            opacity: 0.05;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        .feature-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-color) 100%);
            color: white;
            font-size: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(8deg);
            box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
        }

        .feature-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin: 1.5rem 0;
            position: relative;
        }

        .feature-text {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .features {
                padding: 3rem 0;
            }
            
            .features h1 {
                font-size: 2rem;
            }
            
            .feature-card {
                padding: 2rem 1.5rem;
            }
            
            .feature-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
        }

        /* Updated Footer Styles */
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

        /* Enhanced Carousel Styles */
        .carousel {
            margin: 2rem auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .carousel-item {
            height: 500px;
        }

        .carousel-item img {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.8);
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.4);
            border-radius: 15px;
            padding: 20px;
            bottom: 40px;
        }

        .carousel-caption h3 {
            font-size: 2rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .carousel-caption p {
            font-size: 1.2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .carousel-indicators {
            bottom: 20px;
        }

        .carousel-indicators li {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-indicators li.active {
            background-color: #fff;
            transform: scale(1.2);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 10%;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .carousel:hover .carousel-control-prev,
        .carousel:hover .carousel-control-next {
            opacity: 1;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            background-size: 20px;
        }

        @media (max-width: 768px) {
            .carousel-item {
                height: 300px;
            }

            .carousel-caption h3 {
                font-size: 1.5rem;
            }

            .carousel-caption p {
                font-size: 1rem;
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

    <div class="container">
        <div id="mainCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mainCarousel" data-slide-to="1"></li>
                <li data-target="#mainCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../Images/Homepage/img3.jpg" alt="First slide">
                    <div class="carousel-caption">
                        <h3>Welcome to Kashtkaar</h3>
                        <p>Empowering farmers across Pakistan</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../Images/Homepage/img2.jpg" alt="Second slide">
                    <div class="carousel-caption">
                        <h3>Direct Market Access</h3>
                        <p>Connect directly with buyers</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../Images/Homepage/img1.jpg" alt="Third slide">
                    <div class="carousel-caption">
                        <h3>Fresh Products</h3>
                        <p>Quality farm products for everyone</p>
                    </div>
                </div>
            </div>

            <!-- Navigation arrows -->
            <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <h1 class="text-center">Our Features</h1>
            <div class="row">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sms"></i>
                    </div>
                    <h4 class="feature-title">SMS System</h4>
                    <p class="feature-text">Upload and edit your products via SMS. Perfect for areas with limited internet connectivity.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="feature-title">Direct Buyer Connect</h4>
                    <p class="feature-text">Connect directly with buyers for better deals and understanding market demands.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="feature-title">Farmer Community</h4>
                    <p class="feature-text">Join local farmer groups to share knowledge and get community support.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h4 class="feature-title">Farm Location</h4>
                    <p class="feature-text">Get your farm mapped for better visibility to buyers and logistics planning.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="feature-title">Market Insights</h4>
                    <p class="feature-text">Access real-time market prices and trends to make informed selling decisions.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4 class="feature-title">Logistics Support</h4>
                    <p class="feature-text">Get help with transportation and delivery of your products to buyers.</p>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        $(document).ready(function(){
            // Enable carousel
            $('#mainCarousel').carousel({
                interval: 5000, // Change slide every 5 seconds
                pause: "hover" // Pause on hover
            });

            // Enable keyboard navigation
            $(document).on('keydown', function(e) {
                if(e.keyCode == 37) { // Left arrow
                    $('#mainCarousel').carousel('prev');
                }
                else if(e.keyCode == 39) { // Right arrow
                    $('#mainCarousel').carousel('next');
                }
            });

            // Enable swipe on touch devices
            $("#mainCarousel").on("touchstart", function(event){
                const xClick = event.originalEvent.touches[0].pageX;
                $(this).one("touchmove", function(event){
                    const xMove = event.originalEvent.touches[0].pageX;
                    const sensitivityInPx = 5;

                    if(Math.floor(xClick - xMove) > sensitivityInPx){
                        $(this).carousel('next');
                    }
                    else if(Math.floor(xClick - xMove) < -sensitivityInPx){
                        $(this).carousel('prev');
                    }
                });
                $(this).on("touchend", function(){
                    $(this).off("touchmove");
                });
            });
        });
    </script>

</body>

</html>
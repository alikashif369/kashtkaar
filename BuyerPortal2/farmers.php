<?php
include("../Functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --border-color: #e0e0e0;
            --text-color: #2c3e50;
            --light-bg: #ffffff;
        }

        /* Reset and base styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        /* Navbar styles */
        .navbar {
            background: var(--primary-color) !important;
            padding: 1rem 0;
            border-bottom: 2px solid var(--accent-color);
        }

        .navbar-brand {
            padding: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-text {
            font-family: 'Righteous', cursive;
            font-size: 24px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        /* Navigation links */
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            font-size: 15px;
            padding: 0.7rem 1rem !important;
            position: relative;
            transition: all 0.3s;
        }

        .nav-link:hover {
            background: transparent;
            color: #ffffff !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #ffffff;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        /* Search box */
        .searchbox {
            width: 300px;
            margin: 0 1rem;
        }

        .searchbox .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-color);
            color: white;
            border-radius: 20px;
            padding: 0.5rem 1rem;
        }

        /* Cart button */
        .cart-btn {
            color: white;
            position: relative;
            margin-right: 1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }

        .cart-counter {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: bold;
            min-width: 20px;
            text-align: center;
        }

        /* User menu */
        .user-menu .btn-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background: transparent;
            border: none;
            transition: all 0.3s;
        }

        .user-menu .dropdown-menu {
            background: var(--light-bg);
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .guard {
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #ffc857;
            /* background-color: #ffc857; */
            line-height: 0.1em;
            margin: 10px 0 20px;
            font-family: serif;
        }

        .guard span {
            background-color: white;
            padding: 0 10px;
        }
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
    .card{
    width: 14rem;

    }
        @media only screen and (min-device-width:320px) and (max-device-width:480px) {
            /* .mycarousel {
                display: none;
            }

            .firstimage {
                height: auto;
                width: 90%;
            }
    */
            .card {
                width: 90%;
                margin-left: 5%;
                margin-right: 5%;
                margin-bottom:10%;

            }

        /* .col {
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
            background: rgba(255, 255, 255, 0.1);
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
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-bottom p {
            color: rgba(255, 255, 255, 0.7);
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
            color: rgba(255, 255, 255, 0.8);
        }

        .contact-info i {
            margin-right: 10px;
            color: #3498db;
        }

        .footer-section .contact-info li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-section .contact-info li a:hover {
            color: #3498db;
            padding-left: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="bhome.php">
                <img src="kashtkaar_logo.png" alt="Kashtkaar Logo">
                <span class="brand-text">Kashtkaar</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
                <i class="fas fa-bars text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <form action="SearchResult.php" method="get" class="form-inline ml-auto">
                    <div class="input-group searchbox">
                        <input type="text" class="form-control" name="search" placeholder="Search products...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fas fa-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="bhome.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Transaction.php">
                            <i class="fas fa-exchange-alt"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="farmers.php">
                            <i class="fas fa-users"></i> Farmers
                        </a>
                    </li>
                </ul>

                <a href="CartPage.php" class="cart-btn">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span class="cart-counter"><?php echo totalItems(); ?></span>
                </a>

                <div class="user-menu ml-3">
                    <?php if(isset($_SESSION['phonenumber'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> <?php getUsername(); ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="BuyerProfile.php">My Profile</a>
                                <a class="dropdown-item" href="Transaction.php">My Orders</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Includes/logout.php">Sign Out</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="../auth/BuyerLogin.php" class="btn btn-outline-light">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="text-center container">
            <br>

            <b>
                <h1 class="guard text-center"style="  font-family: 'Times New Roman', Times, serif;"><span><b>Farmers</b></span>
                </h1>
            </b>
        </div>
    <div class="container mt-5">
                </p>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ">
                <div class="card border-dark border" >
                    <div class="card-body ">
                        <h5 class="card-title text-center"><img src="iconbig3.png" style=" margin-bottom:  10px;"></h5>
                        <h4 class="card-subtitle mb-2  text-center">Abhishek</h4>
                        <p class="card-text text-center">Vashi, Maharashtra<br><br>
                            <button type="button" class="btn  border-dark border" style="background-color:#FFD700;color:black">View Profile </button>
                        </p>
                        <!-- <a href="#" class="card-link text-center">Card link</a>
                      <a href="#" class="card-link text-center">Another link</a> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ">
                <div class="card border-dark border" >
                    <div class="card-body ">
                        <h5 class="card-title text-center"><img src="iconbig.png" style=" margin-bottom:  10px;"></h5>
                        <h4 class="card-subtitle mb-2  text-center">Ansh</h4>
                        <p class="card-text text-center">Kopar, Maharashtra<br><br>
                            <button type="button" class="btn  border-dark border" style="background-color:#FFD700;color:black">View Profile </button>
                        </p>
                        <!-- <a href="#" class="card-link text-center">Card link</a>
                      <a href="#" class="card-link text-center">Another link</a> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ">
                <div class="card border-dark border" >
                    <div class="card-body ">
                        <h5 class="card-title text-center"><img src="iconbig2.png" style=" margin-bottom:  10px;"></h5>
                        <h4 class="card-subtitle mb-2  text-center">Gladina</h4>
                        <p class="card-text text-center">Thane, Maharashtra<br><br>
                            <button type="button" class="btn  border-dark border" style="background-color:#FFD700;color:black">View Profile </button>
                        </p>
                        <!-- <a href="#" class="card-link text-center">Card link</a>
                      <a href="#" class="card-link text-center">Another link</a> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ">
                <div class="card border-dark border" >
                    <div class="card-body ">
                        <h5 class="card-title text-center"><img src="iconbig4.png" style=" margin-bottom:  10px;"></h5>
                        <h4 class="card-subtitle mb-2  text-center">Calista</h4>
                        <p class="card-text text-center">Wadala, Maharashtra<br><br>
                            <button type="button" class="btn  border-dark border" style="background-color:#FFD700;color:black">View Profile </button>
                        </p>
                        <!-- <a href="#" class="card-link text-center">Card link</a>
                      <a href="#" class="card-link text-center">Another link</a> -->
                    </div>
                </div>
            </div>

        </div>


    </div>

    <!-- footer -->
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
                        <li><a href="bhome.php">Home</a></li>
                        <li><a href="Transaction.php">Transactions</a></li>
                        <li><a href="saveforlater.php">Save For Later</a></li>
                        <li><a href="farmers.php">Farmers</a></li>
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
    <!-- ./Footer -->
</body>
</html>
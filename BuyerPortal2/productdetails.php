<?php
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

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

        .searchbox .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
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

        .cart-btn:hover {
            color: var(--accent-color);
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

        .user-menu .dropdown-item {
            color: var(--text-color);
            padding: 0.7rem 1.5rem;
            transition: all 0.2s;
        }

        .user-menu .dropdown-item:hover {
            background: #f8f9fa;
            color: var(--accent-color);
        }

        .firstimage {
            height: 500px;
            width: 100%;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .guard {
            text-align: center;
            border-bottom: 1px solid var(--accent-color);
            line-height: 0.1em;
            margin: 10px 0 20px;
        }

        .guard span {
            background: white;
            padding: 0 10px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid var(--accent-color);
        }

        .product-info {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .product-category {
            color: var(--accent-color);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .product-stock {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .product-actions {
            display: flex;
            gap: 1rem;
            margin-top: auto;
        }

        .btn-edit, .btn-delete {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-edit {
            background: var(--accent-color);
            color: white;
        }

        .btn-edit:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .stock-low {
            background: #e74c3c;
        }

        .stock-good {
            background: #27ae60;
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
            color: rgba(255, 255, 255, 8);
        }

        .social-links a:hover {
            background: #3498db;
            color: white;
        }

        @media (max-width: 768px) {
            .navbar-collapse {
                background: var(--primary-color);
                padding: 1rem;
                border-radius: 8px;
                margin-top: 0.5rem;
            }

            .nav-link {
                padding: 0.7rem 1rem !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-link:last-child {
                border-bottom: none;
            }

            .user-menu {
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .searchbox {
                width: 100%;
                margin-bottom: 1rem;
            }

            .firstimage {
                height: auto;
                width: 100%;
            }

            .product-card {
                margin-bottom: 1rem;
            }
        }

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

        .cart-btn:hover {
            color: var(--accent-color);
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

    <?php
    if (isset($_GET['id'])) {
        global $con;
        $product_id = $_GET['id'];
        $query = "SELECT p.*, f.* FROM products p 
                 JOIN farmerregistration f ON p.farmer_fk = f.farmer_id 
                 WHERE p.product_id = $product_id";
        $run_query = mysqli_query($con, $query);
        
        if ($row = mysqli_fetch_array($run_query)) {
            $product_title = $row['product_title'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $product_stock = $row['product_stock'];
            $product_type = $row['product_type'];
            $product_delivery = $row['product_delivery'] == "yes" ? "Delivery Available" : "No Delivery";
            $product_desc = $row['product_desc'];
            $farmer_name = $row['farmer_name'];
            $farmer_phone = $row['farmer_phone'];
            $farmer_address = $row['farmer_address'];
            $farmer_state = $row['farmer_state'];
            $farmer_district = $row['farmer_district'];

            echo "
            <div class='container py-5'>
                <div class='card shadow-lg'>
                    <div class='row g-0'>
                        <!-- Product Image Section -->
                        <div class='col-md-6'>
                            <div class='position-relative'>
                                <img src='../Admin/product_images/$product_image' 
                                     class='img-fluid rounded-start' 
                                     alt='$product_title'
                                     style='width: 100%; height: 400px; object-fit: cover;'>
                                <span class='badge bg-" . ($product_stock > 0 ? "success" : "danger") . " position-absolute top-0 end-0 m-3'>
                                    " . ($product_stock > 0 ? "In Stock" : "Out of Stock") . "
                                </span>
                            </div>
                        </div>

                        <!-- Product Details Section -->
                        <div class='col-md-6'>
                            <div class='card-body p-4'>
                                <h2 class='card-title mb-3'>$product_title</h2>
                                <div class='mb-4'>
                                    <span class='badge bg-primary me-2'>$product_type</span>
                                    <span class='badge bg-info'>$product_delivery</span>
                                </div>

                                <div class='d-flex justify-content-between align-items-center mb-4'>
                                    <h3 class='text-primary mb-0'>₨ $product_price/kg</h3>
                                    <span class='text-muted'>Stock: $product_stock kgs</span>
                                </div>

                                <form method='post' class='mb-4'>
                                    <div class='input-group mb-3'>
                                        <span class='input-group-text bg-warning'>
                                            <i class='fas fa-shopping-bag'></i>
                                        </span>
                                        <input type='number' name='qty' class='form-control' 
                                               placeholder='Quantity' min='1' max='$product_stock' required>
                                        <button name='cart' class='btn btn-warning' type='submit'>
                                            <i class='fas fa-cart-plus me-2'></i>Add to Cart
                                        </button>
                                    </div>
                                </form>

                                <!-- Farmer Info Card -->
                                <div class='card bg-light mb-4'>
                                    <div class='card-body'>
                                        <h5 class='card-title mb-3'>
                                            <i class='fas fa-user-circle me-2'></i>Farmer Details
                                        </h5>
                                        <p class='mb-2'>
                                            <i class='fas fa-user me-2'></i>$farmer_name
                                        </p>
                                        <p class='mb-2'>
                                            <i class='fas fa-phone me-2'></i>$farmer_phone
                                        </p>
                                        <p class='mb-2'>
                                            <i class='fas fa-map-marker-alt me-2'></i>$farmer_district, $farmer_state
                                        </p>
                                        <button class='btn btn-outline-primary mt-2 w-100'>
                                            <i class='fas fa-comments me-2'></i>Chat with Farmer
                                        </button>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class='mt-4'>
                                    <h5 class='mb-3'>Product Description</h5>
                                    <p class='card-text'>$product_desc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }

    if (isset($_POST['cart'])) {

        if (isset($_POST['quantity'])) {
            $qty = $_POST['quantity'];
        } else {
            $qty = 1;
        }
        global $con;
        if (isset($_SESSION['phonenumber'])) {
            $sess_phone_number = $_SESSION['phonenumber'];

            $check_pro = "select * from cart where phonenumber = $sess_phone_number and product_id='$product_id' ";

            $run_check = mysqli_query($con, $check_pro);

            if (mysqli_num_rows($run_check) > 0) {
                echo "";
            } else {
                $subtotal = $product_price * $qty;
                $insert_pro = "insert into cart (product_id,phonenumber,qty,subtotal) values ('$product_id','$sess_phone_number','$qty','$subtotal')";
                $run_insert_pro = mysqli_query($con, $insert_pro);
                echo "<script>window.location.reload(true)</script>";
            }
        } else {
            echo "<script>window.alert('Please Login First!');</script>";
        }
    }
    ?>



    <br><br>

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
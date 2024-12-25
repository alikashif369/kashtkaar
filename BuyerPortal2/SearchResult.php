<?php
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Kashtkaar</title>
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

        .searchbox .input-group-append .btn {
            background: transparent;
            border: none;
            color: white;
        }

        .searchbox .input-group-append .btn:hover {
            color: var(--accent-color);
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
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.1);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.15);
        }

        .farmer-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            right: 12px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: var(--primary-color);
        }

        .product-image-container {
            height: 200px;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--accent-color);
        }

        .stock-badge {
            font-size: 0.85rem;
            color: #2c3e50;
        }

        .stock-badge.low-stock {
            color: #e74c3c;
        }

        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
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
            color: rgba(255, 255, 255, 0.8);
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

        .category-filters .btn {
            transition: all 0.3s ease;
            border: none;
            padding: 12px 20px;
        }

        .category-filters .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .section-header h2 {
            position: relative;
            padding-bottom: 10px;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--accent-color);
        }

        .hero-banner {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .product-card {
            border: none;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        #fruits, #vegetables, #products {
            scroll-margin-top: 80px;
        }

        .category-filters {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .category-dropdown {
            width: 100%;
        }

        .category-btn {
            width: 100%;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1rem;
            font-weight: 500;
            color: white;
            transition: all 0.3s ease;
        }

        .category-btn i:last-child {
            margin-left: auto;
        }

        .fruits-btn {
            background: linear-gradient(135deg, #FF4E50, #F9D423);
        }

        .vegetables-btn {
            background: linear-gradient(135deg, #56AB2F, #A8E063);
        }

        .crops-btn {
            background: linear-gradient(135deg, #F2994A, #F2C94C);
        }

        .category-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .category-dropdown .dropdown-menu {
            width: 100%;
            padding: 0.5rem;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-top: 0.5rem;
        }

        .category-dropdown .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .category-dropdown .dropdown-item:hover {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--accent-color);
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .category-filters {
                padding: 1rem;
            }
            
            .category-btn {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Replace old navbar with new one from bhome.php -->
    <nav class="navbar navbar-expand-xl ">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="bhome.php">
                <img src="kashtkaar_logo.png" alt="Kashtkaar Logo">
                <span class="brand-text">Kashtkaar</span>
            </a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars p-1" style="color:green;margin-right:-9%;font-size:28px;"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

     <div class="container py-4">
        <!-- Category Filter Section -->
        <div class="category-filters mb-4">
            <div class="row">
                <!-- Category Buttons -->
                <div class="col-12 mb-4">
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle px-4" type="button" data-toggle="dropdown">
                                <i class="fas fa-apple-alt"></i> Fruits
                            </button>
                            <div class="dropdown-menu">
                                <?php getFruits(); ?>
                            </div>
                        </div>
                        
                        <div class="dropdown">
                            <button class="btn btn-outline-success dropdown-toggle px-4" type="button" data-toggle="dropdown">
                                <i class="fas fa-carrot"></i> Vegetables
                            </button>
                            <div class="dropdown-menu">
                                <?php getVegetables(); ?>
                            </div>
                        </div>
                        
                        <div class="dropdown">
                            <button class="btn btn-outline-warning dropdown-toggle px-4" type="button" data-toggle="dropdown">
                                <i class="fas fa-wheat"></i> Crops
                            </button>
                            <div class="dropdown-menu">
                                <?php getCrops(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Region Filter -->
                <div class="col-12">
                    <form action="" method="post">
                        <div class="row g-3 align-items-end">
                            <div class="col-12 col-md-4">
                                <label class="form-label text-muted">State</label>
                                <select class="form-select form-control" id="states" name="stateInput" onchange="state()">
                                    <option value="0">Select State</option>
                                    <option value="PUNJAB">Punjab</option>
                                    <option value="SINDH">Sindh</option>
                                    <option value="KHYBER PAKHTUNKHWA">Khyber Pakhtunkhwa</option>
                                    <option value="BALOCHISTAN">Balochistan</option>
                                    <option value="ISLAMABAD">Islamabad Capital Territory</option>
                                    <option value="GILGIT-BALTISTAN">Gilgit-Baltistan</option>
                                    <option value="AZAD KASHMIR">Azad Jammu and Kashmir</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label text-muted">District</label>
                                <select class="form-select form-control" name="districtInput" id="district">
                                    <option>Select District</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <button class="btn btn-primary w-100" name="go" type="submit">
                                    <i class="fas fa-filter me-2"></i>Apply Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4">
    <?php
    if (isset($_GET['district'])) {
        $district = $_GET['district'];
        $get_farmer_ids = "SELECT farmer_id FROM farmerregistration WHERE farmer_district='$district'";
        $run_farmer_ids = mysqli_query($con, $get_farmer_ids);
        
        while ($farmer = mysqli_fetch_array($run_farmer_ids)) {
            $farmer_id = $farmer['farmer_id'];
            
            $get_products = "SELECT p.*, f.farmer_name 
                           FROM products p 
                           JOIN farmerregistration f ON p.farmer_fk = f.farmer_id 
                           WHERE p.farmer_fk = $farmer_id";
                           
            $run_products = mysqli_query($con, $get_products);
            
            while ($product = mysqli_fetch_array($run_products)) {
                echo "
                <div class='col-12 col-sm-6 col-lg-4 col-xl-3'>
                    <div class='product-card h-100'>
                        <div class='position-relative'>
                            <img src='../Admin/product_images/{$product['product_image']}' 
                                 class='product-image' 
                                 alt='{$product['product_title']}'>
                            <span class='badge position-absolute top-0 end-0 m-3 " . 
                                 ($product['product_stock'] < 10 ? 'bg-warning' : 'bg-success') . "'>
                                {$product['product_stock']} kgs left
                            </span>
                        </div>
                        
                        <div class='product-details'>
                            <div class='farmer-info'>
                                <img src='../Images/default_avatar.png' class='farmer-avatar' alt='Farmer'>
                                <span>{$product['farmer_name']}</span>
                            </div>
                            
                            <h5 class='product-title'>{$product['product_title']}</h5>
                            
                            <div class='d-flex justify-content-between align-items-center mb-3'>
                                <div class='price'>₨ {$product['product_price']}/kg</div>
                                <div class='delivery-badge'>
                                    <i class='fas " . ($product['product_delivery'] == 'yes' ? 'fa-truck' : 'fa-store') . "'></i>
                                    " . ($product['product_delivery'] == 'yes' ? 'Delivery Available' : 'Pickup Only') . "
                                </div>
                            </div>
                            
                            <div class='d-grid gap-2'>
                                <a href='ProductDetails.php?id={$product['product_id']}' 
                                   class='btn btn-outline-primary'>View Details</a>
                                <form action='' method='post'>
                                    <button name='cart' type='submit' class='btn btn-primary w-100'>
                                        <i class='fas fa-cart-plus me-2'></i>Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
    }
    ?>
</div>
    </div>
     <?php
     if (isset($_POST['go'])) {
          $districtInput = $_POST['districtInput'];
          $stateInput = $_POST['stateInput'];
          echo $stateInput;
          echo "<br>";
          echo $districtInput;

          if ($stateInput != '0' && $districtInput == 'Select District') {
               echo "<script>window.open('StateSearch.php?state=$stateInput','_self')</script>";
          } else {
               echo "<script>window.open('DistrictSearch.php?district=$districtInput','_self')</script>";
          }
     }

     ?>

     <div class="container ">
          <br>
          <div class="row">


               <?php
               cart();
               ?>
               <?php
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $get_pro = "SELECT p.*, f.farmer_name 
                FROM products p 
                JOIN farmerregistration f ON p.farmer_fk = f.farmer_id 
                WHERE p.product_keywords LIKE '%$search_query%'";
    $run_pro = mysqli_query($con, $get_pro);
    $count = mysqli_num_rows($run_pro);
    
    if ($count > 0) {
        echo "<div class='row'>";
        while ($product = mysqli_fetch_array($run_pro)) {
            $product_id = $product['product_id'];
            $product_title = $product['product_title'];
            $product_price = $product['product_price'];
            $product_image = $product['product_image'];
            $product_stock = $product['product_stock'];
            $farmer_name = $product['farmer_name'];
            
            echo "<div class='col-md-4 col-sm-6 mb-4'>
                <div class='product-card h-100'>
                    <div class='farmer-badge'>
                        <i class='fas fa-user-circle'></i> $farmer_name
                    </div>
                    <div class='product-image-container'>
                        <img src='../Admin/product_images/$product_image' class='product-image' alt='$product_title'>
                    </div>
                    <div class='product-details p-3'>
                        <h5 class='product-title mb-2'>$product_title</h5>
                        <div class='d-flex justify-content-between align-items-center mb-3'>
                            <span class='product-price'>₨ $product_price/kg</span>
                            <span class='stock-badge " . ($product_stock < 10 ? 'low-stock' : '') . "'>
                                $product_stock kgs left
                            </span>
                        </div>
                        <div class='d-flex gap-2'>
                            <a href='ProductDetails.php?id=$product_id' class='btn btn-outline-primary flex-grow-1'>View Details</a>
                            <a href='bhome.php?add_cart=$product_id' class='btn btn-primary'>
                                <i class='fas fa-shopping-cart'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>";
        }
        echo "</div>";
    } else {
        echo "
        <div class='col-12 text-center py-5'>
            <div class='alert alert-info'>
                <i class='fas fa-search fa-3x mb-3'></i>
                <h4>No Products Found</h4>
                <p>We couldn't find any products matching your search. Try different keywords or browse categories.</p>
            </div>
        </div>";
    }
}
?>

          </div>
          <br><br>


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
    <!-- ./Footer a ,myfooter,aligncenter-->
</body>
</html>
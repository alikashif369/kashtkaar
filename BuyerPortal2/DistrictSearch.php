<?php
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Buyer Homepage</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <a href="https://icons8.com/icon/83325/roman-soldier"></a>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


     <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
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
               // Add more states and their districts as needed

               var districtSelect = document.getElementById('district');
               districtSelect.innerHTML = '';

               for (var i = 0; i < array.length; i++) {
                    var option = document.createElement('option');
                    option.value = array[i];
                    option.text = array[i];
                    districtSelect.appendChild(option);
               }
          }
     </script>
     <script>
          var a;
          9

          function display() {
               if (a == 0) {
                    document.getElementById("majic").style.visibility = "hidden";
                    document.getElementById("show").style.visibility = "visible";
                    return a = 1;
               } else {
                    document.getElementById("majic").style.visibility = "visible";
                    document.getElementById("show").style.visibility = "hidden";
                    // document.getElementById("show").style. visibility= "hidden";
                    return a = 0;
               }

          }
     </script>
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
               box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

          .firstimage {
               height: 500px;
               width: 100%;
          }

          .mybtn {
               border-color: green;
               border-style: solid;
          }

          .card {
               width: 100%;
               height: 100%;
               margin: 10px;
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

          /* .images {
            transition: 0.5s;
        } */

          .images:hover {

               height: 220px;
               box-shadow: 5px 5px 10px grey;
               transition: 0.3s;
          }

          .guard {
               width: 100%;
               text-align: center;
               border-bottom: 1px solid #ffc857;
               /* background-color: #ffc857; */
               line-height: 0.1em;
               margin: 10px 0 20px;
               /* font-family: serif; */
          }

          .guard span {
               background: white;
               padding: 0 10px;
          }

          .mobtext {
               display: block;
          }

          .destext {
               display: none;
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
               background: white;
               padding: 0 10px;
          }

          /* .settings{
    margin-left:10px;
} */
          .States {
               margin-right: -1%;
               margin-left: 10%
          }

          .districts {
               margin-right: -15%;
          }

          .go {
               margin-right: -50%;
               margin-left: 5%;
          }

          @media only screen and (min-device-width:320px) and (max-device-width:480px) {
               .States {
                    margin-right: 0%;
                    margin-left: 0%;
                    margin-top: 5%;
               }

               .districts {
                    margin-right: 0%;
                    margin-top: 5%;
               }

               .go {
                    margin-right: 0%;
                    margin-left: 40%;
                    margin-right: 30%;
                    margin-top: 10%;
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
                    background: white;
                    padding: 0 10px;
               }

               .mobtext {
                    display: none;
               }

               .destext {
                    display: inline-block;
                    width: 90%;
                    margin-left: 5%;
                    margin-right: 5%;
               }

               .mycarousel {
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
               }

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

               .guard {
                    /* width: 100%; */
                    text-align: center;
                    border-bottom: 1px solid #ffc857;
                    /* background-color: #ffc857; */
                    /* line-height: 0.1em; */
                    /* margin: 10px 0 20px; */
                    /* font-family: serif; */

               }

               .guard span {
                    background: white;
                    padding: 0 10px;
               }
          }




          /* Image Grig */


          * {
               box-sizing: border-box;
          }

          body {
               margin: 0;
               font-family: Arial;
          }

          .header {
               text-align: center;
               padding: 32px;
          }

          .row {
               display: -ms-flexbox;
               /* IE10 */
               display: flex;
               -ms-flex-wrap: wrap;
               /* IE10 */
               flex-wrap: wrap;
               padding: 0 4px;
          }

          /* Create four equal columns that sits next to each other */
          .column {
               -ms-flex: 25%;
               /* IE10 */
               flex: 25%;
               max-width: 25%;
               padding: 0 4px;
          }

          .column img {
               margin-top: 8px;
               vertical-align: middle;
               width: 100%;
          }

          .myfooter {
               background-color: #292b2c;
               color: goldenrod;
               margin-top: 15px;
               padding-bottom: 0; /* Remove padding below the footer */
          }

          .aligncenter {
               text-align: center;
          }

          a {
               color: goldenrod;
          }

          #headings {
               /* text-shadow: 2px 1px #666666; */
               font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
          }

          @media screen and (max-width: 800px) {
               .kolum {
                    flex: 50%;
                    max-width: 50%;
                    max-height: 40%;
               }
          }

          @media screen and (max-width: 600px) {
               .kolum {
                    flex: 50%;
                    max-width: 50%;
                    max-height: 40%;
               }
          }

          /* Responsive layout - makes a two column-layout instead of four columns */
          /* @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
        } */

          /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
          /* @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        } */

          /* Footer styles */
          .myfooter {
               background: linear-gradient(to right, #2c3e50, #3498db);
               color: white;
               padding-top: 4rem;
               padding-bottom: 4rem; /* Remove padding below the footer */

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

          .product-card {
               background: white;
               border-radius: 12px;
               box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
               overflow: hidden;
               transition: transform 0.3s ease;
          }

          .product-card:hover {
               transform: translateY(-5px);
          }

          .product-image {
               width: 100%;
               height: 200px;
               object-fit: cover;
          }

          .farmer-info {
               display: flex;
               align-items: center;
               gap: 10px;
               padding: 10px;
               background: #f8f9fa;
               border-radius: 8px;
               margin: 15px 0;
          }

          .farmer-avatar {
               width: 35px;
               height: 35px;
               border-radius: 50%;
          }

          .delivery-badge {
               font-size: 0.9rem;
               color: #666;
          }

          .category-filters {
               background: white;
               border-radius: 12px;
               box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
               padding: 20px;
          }

          .form-select {
               border-radius: 8px;
               border: 2px solid #e0e0e0;
               transition: all 0.3s ease;
          }

          .form-select:focus {
               border-color: var(--accent-color);
               box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
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
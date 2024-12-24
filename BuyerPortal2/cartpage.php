<?php
    include("../Functions/functions.php");
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Page</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $(".update-quantity").click(function(e) {
                    e.preventDefault();
                    var productId = $(this).data("id");
                    var action = $(this).data("action");
                    $.ajax({
                        url: "updateQuantity.php",
                        method: "POST",
                        data: { product_id: productId, action: action },
                        success: function(response) {
                            // Update the quantity and subtotal without reloading the page
                            var data = JSON.parse(response);
                            if (data.error) {
                                alert(data.error);
                            } else {
                                $("#qty-" + productId).val(data.qty);
                                $("#subtotal-" + productId).text(data.subtotal);
                                $("#grandtotal").text("Grand total = Rs " + data.grandtotal);
                            }
                        }
                    });
                });
            });
        </script>
    </head>
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

        /* Navbar styles - exact copy from bhome.php */
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

        /* Cart page specific styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
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

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td,
        .table th {
            padding: 8px 8px;
            border: 0.5px solid black;
            padding-left: 5px;
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

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td,
        .table th {
            padding: 8px 8px;
            border: 0.5px solid black;
            text-align: center;
            font-size: 16px;
            background-color: white;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 0px solid #dee2e6;
        }

        .table th {
            background-color: #292b2c;
            color: goldenrod;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .add {
            width: 40%;
        }

        @media only screen and (min-device-width:320px) and (max-device-width:480px) {


            .right {
                display: none;
                background-color: #ff5500;

            }


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

            .table thead {
                display: none;
                background-color: #292b2c;
                color: goldenrod;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;

            }

            .table tr {
                margin-bottom: 15px;

            }

            .table td {
                text-align: right;
                padding-left: 50%;
                text-align: right;
                position: relative;


            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-size: 15px;
                font-weight: bold;
                text-align: left;
                /* background-color: #292b2c;
            color: goldenrod; */
            }

            .add {
                width: auto;
            }

            .emptycart {
                /* margin-left: 20%;
                width:80%;  */
                float: none;
                text-align: center;

            }

            .continueshopping {
                /* margin-top:20%;
                margin-left: 20%;  */
                float: none;
                text-align: center;
                margin-top: -20%;

            }

            .grandtotal {
                /* margin-right: 20%; */
                float: none;
                margin-top: 40%;
            }
        }

        /* Footer styles - exact match with bhome.php */
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
            margin: 0;
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
            margin: 0;
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

        <div class="container">

            <?php
            if (isset($_SESSION['phonenumber'])) {
                $temp = totalItems();
                echo   "<div class='text-left'>
                            <h3>Your Items :- $temp</h3>
                            <hr>";
            }
            ?>

            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Item Name</th>
                    <th>Unit Price </th>
                    <th style="width:25%;">Quantity</th>
                    <th>Subtotal</th>
                    <th>Delete</th>
                </thead>

                <?php
                $total = 0;
                global $con;
                if (isset($_SESSION['phonenumber'])) {
                    $sess_phone_number = $_SESSION['phonenumber'];
                    $sel_price = "select * from cart where phonenumber = '$sess_phone_number'";
                    $run_price = mysqli_query($con, $sel_price);

                    $qtycart = array();
                    $i = 0;
                    while ($p_price = mysqli_fetch_array($run_price)) {
                        $product_id = $p_price['product_id'];
                        $_SESSION['qtycart'][$i] = $p_price['qty'];

                        $pro_price = "select * from products where product_id='$product_id'";
                        $run_pro_price = mysqli_query($con, $pro_price);
                        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                            $product_title = $pp_price['product_title'];
                            $product_price = $pp_price['product_price'];
                            $subtotal = $_SESSION['qtycart'][$i] * $product_price;

                ?>



                            <!-- <td class="tdy" data-label="quantity"><a style="color:black;margin-right:12px;" href="MinusQty.php?id=<?php echo $product_id; ?>"><label class="add ladd"><i style="padding: 4px;" class=" icon left  fas fa-minus">
                                        </label></a></i>
                                    <input type="number" oninput="this.value = Math.abs(this.value)" min="1" value='<?php echo $_SESSION['qtycart'][$i]; ?>' name="qty" style="width:40px; "><a style="color:black;margin-left:4px;" href="AddQty.php?id=<?php echo $product_id; ?>"><label class="add radd">
                                            <i style="padding: 4px;" class="icon right  fas fa-plus"></label></a></i></td>
                                </td> -->


                            <tbody>
                                <tr>
                                    <td data-label="S.No" style="font-size:20px;"><?php echo $i + 1; ?></td>
                                    <td data-label="Item Name " style="font-size:20px;"><?php echo $product_title; ?></td>
                                    <td data-label="Unit Price" style="font-size:20px;"><?php echo $product_price; ?></td>

                                    <td data-label="Quantity p-0 " style="padding-top:1.5%;padding-bottom:-2%">
                                        <div class="d-flex justify-content-center " style="width:90%;padding-left:10%;">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary update-quantity" style=" background-color:#292b2c;" type="button" data-id="<?php echo $product_id; ?>" data-action="increase">
                                                        <b style="color:goldenrod"><i class="fas fa-plus"></i></b>
                                                    </button>
                                                </div>
                                                <input type="number" class="form-control" id="qty-<?php echo $product_id; ?>" oninput="this.value = Math.abs(this.value)" min="1" value='<?php echo $_SESSION['qtycart'][$i]; ?>' name="qty" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary update-quantity" style=" background-color:#292b2c;" type="button" data-id="<?php echo $product_id; ?>" data-action="decrease">
                                                        <b style="color:goldenrod"><i class="fas fa-minus"></i></b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <?php $subtotal = $_SESSION['qtycart'][$i] * $product_price; ?>
                                    <?php
                                    $subquery = "update cart set subtotal = $subtotal where product_id = $product_id";
                                    $run = mysqli_query($con, $subquery);
                                    ?>

                                    <td data-label="Subtotal" id="subtotal-<?php echo $product_id; ?>" style="font-size:20px;"><?php echo $subtotal; ?></td>
                                    <?php $total = $total + $subtotal ?>
                                    <td data-label="Delete" style="font-size:20px;"><a href="DeleteProductCart.php?id=<?php echo $product_id; ?>" id="Deletionlink"><i class="far fa-times-circle"></i></a></td>
                                </tr>
                    <?php
                        }
                        $i++;
                    }
                } else {
                    echo "<h1 align = center>Please Login First!</h1><br><br><hr>";
                } ?>

                            </tbody>
            </table>

        </div>

        </div>


        <div class="container">
            <div class="float-none float-sm-none float-md-none float-lg-left float-xl-left  emptycart">
                <a href="emptyCart.php">
                    <button type="button" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">Empty Cart
                        <i class="fas fa-shopping-cart ml-1"></i></button>
                </a>
            </div>
            <!-- <div class="grandtotal  float-none float-sm-none float-md-none float-lg-right float-xl-right"></div><br> -->
            <br>
            <div class=" float-none float-sm-none float-md-none float-lg-right float-xl-rightcheckout mr-0 p-2 border border-dark  " style="border-radius:5%;">

                <h2 id="grandtotal">Grand total = Rs <?php echo $total; ?> </h2>




                <?php
                if (isset($_SESSION['phonenumber'])) {
                    $sel_price = "select * from cart where phonenumber = '$sess_phone_number'";
                    $run_price = mysqli_query($con, $sel_price);
                    $count = mysqli_num_rows($run_price);
                    if ($count > 0) {
                        echo "<a href='Checkout.php'>
                                    <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' style='font-size:22px;color:black;background-color:#FFD700'>
                                        Checkout<i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                                    </button>
                                </a>";
                    } else {

                        echo "<a href='Includes/alert.php'>
                                    <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' style='font-size:22px;color:black;background-color:#FFD700'>
                                        Checkout<i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                                    </button>
                                </a>";
                    }
                } else {

                    echo "<a href='../auth/BuyerLogin.php'>
                                    <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' style='font-size:22px;color:black;background-color:#FFD700'>
                                        Checkout<i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                                    </button>
                                </a>";
                }

                ?>

            </div>


















            <?php $_SESSION['grandtotal'] = $total; ?>
            <br>
            <br>
            <div class=" float-none float-sm-none float-md-none float-lg-left float-xl-left continueshopping mt-5">
                <a href="bhome.php"><button type="button" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">Continue Shopping
                        <i class="fas fa-shopping-bag ml-1"></i></button></a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Footer - exact match with bhome.php -->
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
<?php

    session_start();

    include("../Includes/db.php");

    function getUsername()
    {
        if (isset($_SESSION['phonenumber'])) {
            $phonenumber = $_SESSION['phonenumber'];
            global $con;

            $query = "select * from buyerregistration where buyer_phone = $phonenumber";
            $run_query = mysqli_query($con, $query);
            if ($run_query) {
                while ($row_cat = mysqli_fetch_array($run_query)) {
                    $buyer_name = ucfirst($row_cat['buyer_name']); // Capitalize first letter
                    echo $buyer_name; // Just output the name without any extra text
                }
            }
        } else {
            echo "<a href='../auth/BuyerLogin.php' style='color: #ffffff; text-decoration: none;'>Login</a>";
        }
    }


    function getFarmerUsername()
    {
        if (isset($_SESSION['phonenumber'])) {
            $phonenumber = $_SESSION['phonenumber'];
            global $con;

            $query = "select * from farmerregistration where farmer_phone = $phonenumber";
            $run_query = mysqli_query($con, $query);
            if ($run_query) {
                while ($row_cat = mysqli_fetch_array($run_query)) {
                    $buyer_name = ucfirst($row_cat['farmer_name']);
                    echo "<label style='color:white; padding-top:7px;'>$buyer_name</label>";
                }
            }
        } else {
            echo "<label><a href = '../auth/FarmerLogin.php' style = 'color:white; padding-top:20px;' >Login/Sign up</a></label>";
        }
    }

    function CheckoutIdentify()
    {
        if (isset($_SESSION['phonenumber'])) {
            echo "<script>window.open('CartPage.php','_self')</script>";
        } else {
            echo "<script>window.open('../auth/BuyerLogin.php','_self')</script>";
        }
    }


    function getCrops()
    {

        global $con;

        $query = "select * from products where product_cat = 1 order by RAND() LIMIT 0,10";

        $run_query = mysqli_query($con, $query);

        while ($row_cat = mysqli_fetch_array($run_query)) {
            $product_type = $row_cat['product_type'];
            echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
        }
    }

    function getFruits()
    {

        global $con;

        $query = "select * from products where product_cat = 3 order by RAND() LIMIT 0,10";

        $run_query = mysqli_query($con, $query);

        while ($row_cat = mysqli_fetch_array($run_query)) {
            $product_type = $row_cat['product_type'];
            // echo "<li class='options' role='presentation'><a role='menuitem' tabindex='-1' href='../BuyerPortal/Categories.php?type=$product_type'> 
            //         <label class='crop_items'>$product_type</label></a></li>";

            echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
        }
    }

    function getVegetables()
    {

        global $con;

        $query = "select * from products where product_cat = 2 order by RAND() LIMIT 0,10";

        $run_query = mysqli_query($con, $query);

        while ($row_cat = mysqli_fetch_array($run_query)) {
            $product_type = $row_cat['product_type'];
            echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
        }
    }


    function getProducts()
    {
        global $con;
        $query = "select * from products order by RAND() LIMIT 0,6";
        $run_query = mysqli_query($con, $query);
        
        while ($rows = mysqli_fetch_array($run_query)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_image = $rows['product_image'];
            $product_price = $rows['product_price'];
            $product_stock = $rows['product_stock'];
            $farmer_fk = $rows['farmer_fk'];
            
            // Get farmer name
            $farmer_query = mysqli_query($con, "SELECT farmer_name FROM farmerregistration WHERE farmer_id = $farmer_fk");
            $farmer_name = mysqli_fetch_array($farmer_query)['farmer_name'];
            
            echo "
            <div class='col-md-4 col-sm-6 mb-4'>
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
    }

    function getVegetablesHomepage()
    {
        global $con;
        $query = "select * from products where product_cat = 2 and not (product_image = '') order by RAND() LIMIT 0,4";
        $run_query = mysqli_query($con, $query);
        
        while ($rows = mysqli_fetch_array($run_query)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_image = $rows['product_image'];
            $product_price = $rows['product_price'];
            $product_stock = $rows['product_stock'];
            $product_type = $rows['product_type'];
            
            echo "
            <div class='col-md-3 col-sm-6 mb-4'>
                <div class='product-card h-100'>
                    <div class='badge-overlay'>
                        <span class='top-left badge'>" . ($product_stock > 0 ? 'In Stock' : 'Out of Stock') . "</span>
                    </div>
                    <div class='product-image-container'>
                        <img src='../Admin/product_images/$product_image' class='product-image' alt='$product_title'>
                    </div>
                    <div class='product-details p-3'>
                        <h5 class='product-title mb-2'>$product_title</h5>
                        <div class='d-flex justify-content-between align-items-center mb-2'>
                            <span class='product-price'>₨ $product_price/kg</span>
                            <span class='stock-badge " . ($product_stock < 10 ? 'low-stock' : '') . "'>
                                $product_stock kgs left
                            </span>
                        </div>
                        <a href='ProductDetails.php?id=$product_id' class='btn btn-outline-success w-100'>View Details</a>
                    </div>
                </div>
            </div>";
        }
    }

    function getFruitsHomepage() {
        global $con;
        $query = "select * from products where product_cat = 3 and not (product_image = '') order by RAND() LIMIT 0,4";
        $run_query = mysqli_query($con, $query);
        
        while ($rows = mysqli_fetch_array($run_query)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_image = $rows['product_image'];
            $product_price = $rows['product_price'];
            $product_stock = $rows['product_stock'];
            $product_type = $rows['product_type'];
            
            echo "
            <div class='col-md-3 col-sm-6 mb-4'>
                <div class='product-card h-100'>
                    <div class='badge-overlay'>
                        <span class='top-left badge'>" . ($product_stock > 0 ? 'In Stock' : 'Out of Stock') . "</span>
                    </div>
                    <div class='product-image-container'>
                        <img src='../Admin/product_images/$product_image' class='product-image' alt='$product_title'>
                    </div>
                    <div class='product-details p-3'>
                        <h5 class='product-title mb-2'>$product_title</h5>
                        <div class='d-flex justify-content-between align-items-center mb-2'>
                            <span class='product-price'>₨ $product_price/kg</span>
                            <span class='stock-badge " . ($product_stock < 10 ? 'low-stock' : '') . "'>
                                $product_stock kgs left
                            </span>
                        </div>
                        <a href='ProductDetails.php?id=$product_id' class='btn btn-outline-primary w-100'>View Details</a>
                    </div>
                </div>
            </div>";
        }
    }

    //function  which is link with FarmerProductDetails
    // function getFarmerProductDetails()
    // {
    //     include("../Includes/db.php");
    //     global $con;
    //     if (isset($_GET['id'])) {
    //         $prod_id = $_GET['id'];
    //         $query = "select * from products where product_id=" . $prod_id;
    //         $run_query = mysqli_query($con, $query);
    //         $resultCheck = mysqli_num_rows($run_query);
    //         if ($resultCheck > 0) {
    //             while ($rows = mysqli_fetch_array($run_query)) {
    //                 $product_title = $rows['product_title'];
    //                 $product_image = $rows['product_image'];
    //                 $product_type = $rows['product_type'];
    //                 $product_stock = $rows['product_stock'];
    //                 $product_description = $rows['product_desc'];
    //                 $product_price = $rows['product_price'];
    //                 $product_delivery = $rows['product_delivery'];
    //                 $product_cat = $rows['product_cat'];
    //                 echo "<div>
    //                 <img src='../Admin/product_images/$product_image' height='250px' width='300px' ><br>"
    //                     . " product title  :  " . $product_title . "<br>"
    //                     . " product type  :  " . $product_type . "<br>"
    //                     . " product stock  :  " . $product_stock . "<br>"
    //                     . " product Description  :  " . $product_description . "<br>"
    //                     . " product price  :  " . $product_price . "<br>"
    //                     . " product Delivery  :  " . $product_delivery . "<br>"
    //                     . " product category  :  " . $product_cat . "<br>"
    //                     . "</div>";
    //             }
    //         }
    //     } else {
    //         echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
    //     }
    // }

    // Checkout System Functions
    function cart()
    {
        if (isset($_SESSION['phonenumber'])) {
            if (isset($_GET['add_cart'])) {

                global $con;
                if (isset($_POST['quantity'])) {
                    $qty = $_POST['quantity'];
                } else {
                    $qty = 1;
                }
                $sess_phone_number = $_SESSION['phonenumber'];
                $product_id = $_GET['add_cart'];

                $check_pro = "select * from cart where phonenumber = $sess_phone_number and product_id='$product_id' ";

                $run_check = mysqli_query($con, $check_pro);

                if (mysqli_num_rows($run_check) > 0) {
                    echo "";
                } else {
                    $insert_pro = "insert into cart (product_id,phonenumber) values ('$product_id','$sess_phone_number')";
                    $run_insert_pro = mysqli_query($con, $insert_pro);
                }

                echo "<script>window.open('bhome.php','_self')</script>";
            }
        } else {
            // echo "<script>alert('Please Login First! ');</script>";
        }
    }

    //function which is link with FarmerHomePage
    function getFarmerProducts() {
        include("../Includes/db.php");
        global $con;
        $sess_phone_number = $_SESSION['phonenumber'];
        $query = "select * from products where farmer_fk in (select farmer_id from farmerregistration where farmer_phone=$sess_phone_number)";
        $run_query = mysqli_query($con, $query);
        
        if ($run_query && mysqli_num_rows($run_query) > 0) {
            echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            
            while ($row = mysqli_fetch_assoc($run_query)) {
                $product_title = $row['product_title'];
                $image = $row['product_image'];
                $price = $row['product_price'];
                $stock = $row['product_stock'];
                $id = $row['product_id'];
                $description = substr($row['product_desc'], 0, 100) . '...';
                
                $stock_class = ($stock < 10) ? 'badge bg-danger' : 'badge bg-success';
                $stock_text = ($stock < 10) ? 'Low Stock' : 'In Stock';
                
                // Image path with fallback
                $img_src = $image ? "../Admin/product_images/$image" : "../Images/Website/noimage.jpg";
                
                echo "
                <div class='col'>
                    <div class='card h-100 shadow-sm'>
                        <div class='position-relative'>
                            <div class='ratio ratio-16x9'>
                                <img src='$img_src' 
                                     class='card-img-top object-fit-cover' 
                                     style='max-height: 180px; object-fit: cover;' 
                                     alt='Product image'>
                            </div>
                            <span class='position-absolute top-0 end-0 m-2 $stock_class'>$stock_text</span>
                        </div>
                        
                        <!-- Rest of the card content remains the same -->
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title text-truncate'>$product_title</h5>
                            <div class='fs-4 fw-bold text-primary mb-3'>₨ $price</div>
                            <div class='small text-muted mb-3'>
                                <i class='fas fa-cubes me-1'></i>Stock: $stock units
                            </div>
                            <p class='card-text flex-grow-1'>$description</p>
                            
                            <div class='d-flex gap-2 mt-auto'>
                                <a href='EditProduct.php?id=$id' class='btn btn-primary flex-grow-1'>
                                    <i class='fas fa-edit me-1'></i> Edit
                                </a>
                                <button onclick=\"if(confirm('Are you sure you want to delete this product?')) location.href='DeleteProduct.php?id=$id'\" 
                                        class='btn btn-danger flex-grow-1'>
                                    <i class='fas fa-trash me-1'></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            
            echo '</div>';
        } else {
            echo "<div class='alert alert-info text-center m-5'>
                    <i class='fas fa-box-open fa-3x mb-3'></i>
                    <p class='mb-0'>No products found. Add some products to get started!</p>
                  </div>";
        }
    }

    //function which is linked with BuyerProductDetails
    function getBuyerProductDetails()
    {
        include("../Includes/db.php");
        global $con;
        // $sess_phone_number = $_SESSION['phonenumber'];
        if (isset($_GET['id'])) {
            $prod_id = $_GET['id'];
            $query = "select * from products where product_id=" . $prod_id;
            $run_query = mysqli_query($con, $query);
            $resultCheck = mysqli_num_rows($run_query);
            if ($resultCheck > 0) {
                while ($rows = mysqli_fetch_array($run_query)) {
                    $product_title = $rows['product_title'];
                    $product_image = $rows['product_image'];
                    $product_type = $rows['product_type'];
                    $product_stock = $rows['product_stock'];
                    $product_description = $rows['product_desc'];
                    $product_price = $rows['product_price'];
                    $product_delivery = $rows['product_delivery'];
                    $product_cat = $rows['product_cat'];
                    echo "<div>
                        <img src='../Admin/product_images/$product_image' height='250px' width='300px' ><br>"
                        . " product title  :  " . $product_title . "<br>"
                        . " product type  :  " . $product_type . "<br>"
                        . " product stock  :  " . $product_stock . "<br>"
                        . " product Description  :  " . $product_description . "<br>"
                        . " product price  :  " . $product_price . "<br>"
                        . " product Delivery  :  " . $product_delivery . "<br>"
                        . " product category  :  " . $product_cat . "<br>"
                        . "<button href=''>ADD TO CART</button>"
                        . "</div>";

                    if (isset($_SESSION['phonenumber'])) {
                        $query = "select * from products where product_id=" . $prod_id;
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run)) {
                            $farmerid = $row['farmer_fk'];
                        }

                        $query = "select * from farmerregistration where farmer_id = $farmerid";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run)) {
                            $farmer_name = $row['farmer_name'];
                            $farmer_phone = $row['farmer_phone'];
                            $farmer_address = $row['farmer_address'];
                        }
                        echo "farmer Name : " . $farmer_name . "<br>farmer Phone Number : " . $farmer_phone . "<br> Farmer Address" . $farmer_address;
                    }
                }
            }
        }
    }


    function totalItems()
    {
        global $con;
        if (isset($_SESSION['phonenumber'])) {
            $sess_phone_number = $_SESSION['phonenumber'];

            $get_items = "select * from cart where phonenumber = '$sess_phone_number'";
            $run_items =  mysqli_query($con, $get_items);
            $count_items =  mysqli_num_rows($run_items);
            return $count_items;
        } else {
            echo 0;
        }
    }


    function emptyCart()
    {
        global $con;
        $sess_phone_number = $_SESSION['phonenumber'];

        $get_items = "Delete from cart where phonenumber = '$sess_phone_number'";
        $run_items =  mysqli_query($con, $get_items);
        $count_items =  mysqli_num_rows($run_items);
    }


    function bestSeller()
    {
        global $con;
    }
    ?>


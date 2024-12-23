<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Kashtkaar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #88c057;
            --white: #ffffff;
            --border-color: #e0e0e0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
            color: var(--primary-color);
        }

        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-title {
            font-family: 'Righteous', cursive;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            text-transform: uppercase;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-control {
            background: #f8f9fa;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--primary-color);
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .btn-submit {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 1.1rem;
            width: 100%;
            max-width: 300px;
            margin: 2rem auto 0;
            display: block;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .form-icon {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-icon i {
            font-size: 4rem;
            color: var(--secondary-color);
            background: rgba(52, 152, 219, 0.1);
            padding: 1.5rem;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }

            .form-title {
                font-size: 2rem;
            }

            .btn-submit {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-card">
            <div class="form-icon">
                <i class="fas fa-leaf"></i>
            </div>
            <div class="form-header">
                <h1 class="form-title">Insert Your New Product</h1>
            </div>
            
            <form name="my-form" action="InsertProduct.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="product_title" placeholder="Enter Product title" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Stock (In kg)</label>
                    <input type="text" class="form-control" name="product_stock" placeholder="Enter Product Stock" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Categories</label>
                    <select name="product_cat" class="form-control" required>
                        <option>Select a Category</option>
                        <?php
                        $get_cats = "select * from categories";
                        $run_cats =  mysqli_query($con, $get_cats);
                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Type</label>
                    <input type="text" class="form-control" name="product_type" placeholder="Example: potato" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Expiry</label>
                    <input type="date" class="form-control" name="product_expiry" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="product_image">
                </div>
                <div class="form-group">
                    <label class="form-label">Product MRP (Per kg)</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter Product price" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <textarea class="form-control" name="product_desc" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Keywords</label>
                    <input type="text" class="form-control" name="product_keywords" placeholder="Example: best potatoes" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Delivery</label>
                    <div>
                        <input type="radio" name="product_delivery" value="yes" /> Yes
                        <input type="radio" name="product_delivery" value="no" /> No
                    </div>
                </div>
                <button type="submit" class="btn-submit" name="insert_pro">
                    <i class="fas fa-check-circle mr-2"></i>Insert
                </button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['insert_pro'])) {    // when button is clicked

    // getting the text data from fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_type = $_POST['product_type'];
    $product_stock = $_POST['product_stock'];
    $product_price = $_POST['product_price'];
    $product_expiry = $_POST['product_expiry'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_delivery = $_POST['product_delivery'];

    // getting image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];  // for server

    if (isset($_SESSION['phonenumber'])) {
        move_uploaded_file($product_image_tmp, "../Admin/product_images/$product_image");

        $phone = $_SESSION['phonenumber'];
        $getting_id = "select * from farmerregistration where farmer_phone = $sessphonenumber";
        $run = mysqli_query($con, $getting_id);
        $row = mysqli_fetch_array($run);
        $id = $row['farmer_id'];
        $insert_product = "insert into products (farmer_fk,product_title, product_cat, 
                                product_type,product_expiry,product_image, product_stock, product_price,
                                product_desc,  product_keywords, product_delivery) 
                                values ('$id','$product_title','$product_cat','$product_type','$product_expiry','$product_image','$product_stock',
                                        '$product_price','$product_desc',
                                        '$product_keywords','$product_delivery')";

        $insert_query = mysqli_query($con, $insert_product);
        echo $insert_product;
        if ($insert_query) {
            echo "<script>alert('Product has been added')</script>";
            echo "<script>window.open('farmerHomepage.php','_self')</script>";
        } else {
            echo "<script>alert('Error Uploading Data Please Check your Connections ')</script>";
        }
    }
}
?>
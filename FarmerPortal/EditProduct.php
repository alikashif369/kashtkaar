<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
$product_title = $product_cat = $product_type = $product_stock = $product_price = $product_expiry = $product_desc = $product_keywords = $product_delivery = "";
$id = ""; // Initialize $id variable

if (isset($_SESSION['phonenumber'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getting_prod = "select * from products where product_id = $id";
        $run = mysqli_query($con, $getting_prod);

        while ($details = mysqli_fetch_array($run)) {
            $product_title = $details['product_title'];
            $product_cat = $details['product_cat'];
            $product_type = $details['product_type'];
            $product_stock = $details['product_stock'];
            $product_price = $details['product_price'];
            $product_expiry = $details['product_expiry'];
            $product_desc = $details['product_desc'];
            $product_keywords = $details['product_keywords'];
            $product_delivery = $details['product_delivery'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Kashtkaar</title>
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
                <h1 class="form-title">Edit Your Product</h1>
            </div>
            
            <form name="my-form" action="EditProduct.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="product_title" value="<?php echo $product_title; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Stock (In kg)</label>
                    <input type="text" class="form-control" name="product_stock" value="<?php echo $product_stock; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Categories</label>
                    <select name="product_cat" class="form-control" required>
                        <option value="">Select a Category</option>
                        <?php
                        $get_cats = "select * from categories";
                        $run_cats =  mysqli_query($con, $get_cats);
                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            $selected = ($cat_id == $product_cat) ? "selected" : "";
                            echo "<option value='$cat_id' $selected>$cat_title</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Type</label>
                    <input type="text" class="form-control" name="product_type" value="<?php echo $product_type; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Expiry</label>
                    <input type="date" class="form-control" name="product_expiry" value="<?php echo $product_expiry; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="product_image">
                </div>
                <div class="form-group">
                    <label class="form-label">Product MRP (Per kg)</label>
                    <input type="text" class="form-control" name="product_price" value="<?php echo $product_price; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <textarea class="form-control" name="product_desc" rows="3" required><?php echo $product_desc; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Keywords</label>
                    <input type="text" class="form-control" name="product_keywords" value="<?php echo $product_keywords; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Delivery</label>
                    <div>
                        <input type="radio" name="product_delivery" value="yes" <?php echo ($product_delivery == 'yes') ? 'checked' : ''; ?> /> Yes
                        <input type="radio" name="product_delivery" value="no" <?php echo ($product_delivery == 'no') ? 'checked' : ''; ?> /> No
                    </div>
                </div>
                <button type="submit" class="btn-submit" name="update_pro">
                    <i class="fas fa-check-circle mr-2"></i>Update
                </button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['update_pro'])) {
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $product_cat = mysqli_real_escape_string($con, $_POST['product_cat']);
    $product_type = mysqli_real_escape_string($con, $_POST['product_type']);
    $product_stock = mysqli_real_escape_string($con, $_POST['product_stock']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_expiry = mysqli_real_escape_string($con, $_POST['product_expiry']);
    $product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_delivery = mysqli_real_escape_string($con, $_POST['product_delivery']);

    $update_product = "update products set 
                        product_title='$product_title', 
                        product_cat='$product_cat', 
                        product_type='$product_type', 
                        product_stock='$product_stock', 
                        product_price='$product_price', 
                        product_expiry='$product_expiry', 
                        product_desc='$product_desc', 
                        product_keywords='$product_keywords', 
                        product_delivery='$product_delivery' 
                        where product_id='$id'";

    $run_update = mysqli_query($con, $update_product);

    if ($run_update) {
        echo "<script>alert('Product updated successfully');</script>";
        echo "<script>window.open('FarmerProductDetails.php?id=$id','_self')</script>";
    } else {
        echo "<script>alert('Failed to update product');</script>";
    }
}
?>
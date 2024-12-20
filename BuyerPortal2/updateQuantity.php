<?php
include("../Functions/functions.php");

if (isset($_POST['product_id']) && isset($_POST['action'])) {
    $product_id = $_POST['product_id'];
    $action = $_POST['action'];
    global $con;

    if (isset($_SESSION['phonenumber'])) {
        $sess_phone_number = $_SESSION['phonenumber'];

        // Fetch cart item
        $get_cart = "SELECT * FROM cart WHERE phonenumber = '$sess_phone_number' AND product_id='$product_id'";
        $run_cart = mysqli_query($con, $get_cart);
        $cart_item = mysqli_fetch_array($run_cart);
        $old_qty = (int) $cart_item['qty'];

        // Fetch product stock
        $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
        $run_product = mysqli_query($con, $get_product);
        $product = mysqli_fetch_array($run_product);
        $stock = (int) $product['product_stock'];

        if ($action == "increase") {
            if ($old_qty < $stock) {
                $new_qty = $old_qty + 1;
            } else {
                echo json_encode(['error' => 'Quantity exceeds available stock']);
                exit;
            }
        } elseif ($action == "decrease") {
            if ($old_qty > 1) {
                $new_qty = $old_qty - 1;
            } else {
                echo json_encode(['error' => 'Minimum quantity is 1']);
                exit;
            }
        } else {
            echo json_encode(['error' => 'Invalid action']);
            exit;
        }

        // Update subtotal
        $subtotal = round($new_qty * ($cart_item['subtotal'] / $cart_item['qty']), 2);

        // Update cart table
        $update_cart = "UPDATE cart SET qty='$new_qty', subtotal='$subtotal' WHERE phonenumber='$sess_phone_number' AND product_id='$product_id'";
        if (!mysqli_query($con, $update_cart)) {
            echo json_encode(['error' => mysqli_error($con)]);
            exit;
        }

        // Adjust stock based on quantity change
        if ($new_qty != $old_qty) {
            $stock_difference = $old_qty - $new_qty; // Positive when decreasing quantity, negative when increasing
            $new_stock = $stock + $stock_difference;
            // $new_stock = $new_stock +1;

            // Update product stock
            $update_stock = "UPDATE products SET product_stock='$new_stock' WHERE product_id='$product_id'";
            if (!mysqli_query($con, $update_stock)) {
                echo json_encode(['error' => mysqli_error($con)]);
                exit;
            }
        }

        // Calculate grand total
        $get_total = "SELECT SUM(subtotal) AS grandtotal FROM cart WHERE phonenumber = '$sess_phone_number'";
        $run_total = mysqli_query($con, $get_total);
        $total_row = mysqli_fetch_array($run_total);
        $grandtotal = $total_row['grandtotal'];

        // Return updated values as JSON
        echo json_encode(['qty' => $new_qty, 'subtotal' => $subtotal, 'grandtotal' => $grandtotal]);
    } else {
        echo json_encode(['error' => 'User not logged in']);
    }
}
?>

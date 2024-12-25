<?php
session_start();
include("../Functions/functions.php");

if (isset($_POST['product_id']) && isset($_POST['qty'])) {
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $subtotal = $_POST['subtotal'];
    
    if (isset($_SESSION['phonenumber'])) {
        $sess_phone_number = $_SESSION['phonenumber'];
        
        $update_query = "UPDATE cart 
                        SET qty = $qty, subtotal = $subtotal 
                        WHERE product_id = $product_id 
                        AND phonenumber = '$sess_phone_number'";
        
        $result = mysqli_query($con, $update_query);
        
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Database update failed']);
        }
    } else {
        echo json_encode(['error' => 'User not logged in']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>

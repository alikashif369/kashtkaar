<?php
include("../Includes/db.php");

if(isset($_GET['farmer_id'])) {
    $farmer_id = mysqli_real_escape_string($con, $_GET['farmer_id']);
    
    $query = "SELECT product_id, product_title, product_price, product_stock 
              FROM products 
              WHERE farmer_fk = '$farmer_id'";
    
    $result = mysqli_query($con, $query);
    $products = array();
    
    while($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    
    header('Content-Type: application/json');
    echo json_encode($products);
}
?>

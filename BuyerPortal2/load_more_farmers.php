<?php
include("../Functions/functions.php");

if (isset($_GET['offset'])) {
    $offset = intval($_GET['offset']);
    global $con;
    
    $query = "SELECT f.*, COUNT(p.product_id) as product_count 
             FROM farmerregistration f 
             LEFT JOIN products p ON f.farmer_id = p.farmer_fk 
             GROUP BY f.farmer_id 
             LIMIT $offset, 8";
             
    $run_query = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($run_query)) {
        $farmer_name = $row['farmer_name'];
        $farmer_phone = $row['farmer_phone'];
        $farmer_address = isset($row['farmer_address']) ? $row['farmer_address'] : 'Address not available';
        $product_count = $row['product_count'];
        
        echo "
        <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4'>
            <div class='card border-dark border'>
                <div class='card-body text-center'>
                    <img src='../Images/default_avatar.png' class='card-img-top rounded-circle mb-3' 
                         alt='$farmer_name' style='height: 150px; width: 150px; object-fit: cover;'>
                    <h4 class='card-subtitle mb-2'>$farmer_name</h4>
                    <p class='card-text'><i class='fas fa-map-marker-alt text-danger'></i> $farmer_address</p>
                    <div class='d-flex justify-content-between align-items-center'>
                        <span class='badge bg-success text-white'>
                            <i class='fas fa-store'></i> $product_count Products
                        </span>
                        <span class='text-muted'>
                            <i class='fas fa-phone'></i> " . substr($farmer_phone, 0, 6) . "****
                        </span>
                    </div>
                </div>
            </div>
        </div>";
    }
}
?>

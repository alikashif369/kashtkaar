<?php
include("../Functions/functions.php");
include("../Includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Farmers Near You - Kashtkaar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <!-- Add Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        #map-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        .side-panel {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 380px;
            max-height: calc(100% - 40px);
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            z-index: 2;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .side-panel-header {
            padding: 20px;
            background: #2c3e50;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .side-panel-content {
            padding: 20px;
        }

        .filter-container {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .btn-location {
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            background: #2c3e50;
            color: white;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-location:hover {
            background: #34495e;
            transform: translateY(-2px);
        }

        .farmer-list {
            margin-top: 20px;
        }

        .farmer-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .farmer-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .side-panel {
                width: 100%;
                max-width: none;
                height: 50%;
                top: auto;
                bottom: 0;
                left: 0;
                border-radius: 20px 20px 0 0;
            }
        }

        .right-panel {
            position: absolute;
            top: 0;
            right: -400px; /* Start off-screen */
            width: 400px;
            height: 100%;
            background: white;
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: right 0.3s ease;
            overflow-y: auto;
        }

        .right-panel.active {
            right: 0;
        }

        .close-panel {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #2c3e50;
            z-index: 1001;
        }

        .farmer-profile {
            padding: 20px;
        }

        .farmer-profile-header {
            background: #2c3e50;
            color: white;
            padding: 30px 20px;
            position: relative;
        }

        .farmer-profile-content {
            padding: 20px;
        }

        .custom-marker {
            background-color: #2c3e50;
            border-radius: 50%;
            border: 2px solid white;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            color: white;
            font-size: 14px;
        }

        .custom-marker:hover {
            background-color: #34495e;
            transform: scale(1.1);
        }

        .farmer-products {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .product-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .farmer-profile-header {
            background: #2c3e50;
            color: white;
            padding: 25px 20px;
            position: relative;
        }

        .farmer-profile-header h4 {
            margin-bottom: 15px;
            font-size: 1.4rem;
        }

        .farmer-profile-header p {
            margin-bottom: 8px;
            opacity: 0.9;
        }

        .close-panel {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .close-panel:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        .products-grid {
            display: grid;
            gap: 15px;
            padding: 15px 0;
        }

        .product-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #2c3e50;
        }

        .product-item h6 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .product-details {
            display: flex;
            justify-content: space-between;
            color: #666;
            font-size: 0.9rem;
        }

        .product-details span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Remove routing-related styles */
        .leaflet-routing-container,
        .leaflet-routing-alt {
            display: none;
        }
    </style>
</head>
<body>
    <div id="map-container">
        <div id="map"></div>
    </div>

    <div class="side-panel">
        <div class="side-panel-header">
            <h4><i class="fas fa-map-marker-alt mr-2"></i>Find Farmers Near You</h4>
        </div>
        <div class="side-panel-content">
            <div class="filter-container">
                <div class="filter-group">
                    <label>Filter by Product Type</label>
                    <select id="product-filter" class="form-control">
                        <option value="">All Products</option>
                        <option value="vegetables">Vegetables</option>
                        <option value="fruits">Fruits</option>
                        <option value="crops">Crops</option>
                    </select>
                </div>
                
                <button id="find-me" class="btn-location mt-3">
                    <i class="fas fa-crosshairs mr-2"></i>Center Map on My Location
                </button>
            </div>

            <div class="farmer-list" id="farmer-list">
                <!-- Farmers will be listed here dynamically -->
            </div>
        </div>
    </div>

    <!-- Add right panel for farmer profile -->
    <div class="right-panel" id="farmerProfile">
        <button class="close-panel" onclick="closeProfile()">
            <i class="fas fa-times"></i>
        </button>
        <div id="profileContent"></div>
    </div>

    <script>
        // Initialize map and base layer
        var map = L.map('map').setView([30.3753, 69.3451], 6);
        var userMarker = null;
        
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '©OpenStreetMap, ©CartoDB',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);

        // Store all markers
        var markers = [];

        // Custom marker icon
        var createCustomMarker = function(farmer) {
            return L.divIcon({
                className: 'custom-marker',
                html: '<i class="fas fa-user-circle"></i>',
                iconSize: [30, 30]
            });
        };

        // Function to show farmer profile
        function showFarmerProfile(farmer) {
            const profilePanel = document.getElementById('farmerProfile');
            const profileContent = document.getElementById('profileContent');

            // Center map on farmer location
            map.setView([farmer.latitude, farmer.longitude], 13);

            // Fetch farmer's products
            fetch(`get_farmer_products.php?farmer_id=${farmer.id}`)
                .then(response => response.json())
                .then(products => {
                    profileContent.innerHTML = `
                        <div class="farmer-profile-header">
                            <button class="close-panel" onclick="closeProfile()">
                                <i class="fas fa-times"></i>
                            </button>
                            <h4>${farmer.name}</h4>
                            <p><i class="fas fa-map-marker-alt"></i> ${farmer.district}, ${farmer.state}</p>
                            <p><i class="fas fa-phone"></i> ${farmer.phone}</p>
                        </div>
                        <div class="farmer-profile-content">
                            <div class="farmer-products">
                                <h5>Available Products</h5>
                                <div class="products-grid">
                                    ${products.map(product => `
                                        <div class="product-item">
                                            <h6>${product.product_title}</h6>
                                            <div class="product-details">
                                                <span><i class="fas fa-tag"></i> Rs.${product.product_price}/kg</span>
                                                <span><i class="fas fa-box"></i> ${product.product_stock} kg</span>
                                            </div>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        </div>
                    `;
                });

            profilePanel.classList.add('active');
        }

        function closeProfile() {
            document.getElementById('farmerProfile').classList.remove('active');
        }

        // Function to add farmer to list and map
        function addFarmer(farmer) {
            var marker = L.marker([farmer.latitude, farmer.longitude], {
                icon: createCustomMarker(farmer)
            }).addTo(map);
            
            marker.on('click', function() {
                showFarmerProfile(farmer);
            });
            
            markers.push(marker);

            // Add to list with modified click handler
            var listItem = document.createElement('div');
            listItem.className = 'farmer-card';
            listItem.innerHTML = `
                <h5>${farmer.name}</h5>
                <p><i class="fas fa-map-marker-alt"></i> ${farmer.district}, ${farmer.state}</p>
            `;
            
            listItem.onclick = function() {
                map.setView([farmer.latitude, farmer.longitude], 13);
                marker.openPopup();
                showFarmerProfile(farmer);
            };
            
            document.getElementById('farmer-list').appendChild(listItem);
        }

        // Load farmers
        <?php
        $query = "SELECT f.*, fl.latitude, fl.longitude 
                  FROM farmerregistration f 
                  INNER JOIN farmer_locations fl ON f.farmer_id = fl.farmer_id 
                  WHERE fl.latitude IS NOT NULL 
                  AND fl.longitude IS NOT NULL 
                  AND fl.latitude != 0 
                  AND fl.longitude != 0";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {
            // Additional validation before outputting JavaScript
            if(is_numeric($row['latitude']) && is_numeric($row['longitude']) 
               && $row['latitude'] != 0 && $row['longitude'] != 0) {
                echo "addFarmer({
                    id: " . (int)$row['farmer_id'] . ",
                    name: '" . addslashes($row['farmer_name']) . "',
                    phone: '" . addslashes($row['farmer_phone']) . "',
                    district: '" . addslashes($row['farmer_district']) . "',
                    state: '" . addslashes($row['farmer_state']) . "',
                    latitude: " . floatval($row['latitude']) . ",
                    longitude: " . floatval($row['longitude']) . "
                });\n";
            }
        }
        ?>

        // Geolocation
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    
                    // Remove existing user marker if any
                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }

                    // Add new user marker
                    userMarker = L.marker([lat, lng], {
                        icon: L.divIcon({
                            className: 'custom-marker',
                            html: '<i class="fas fa-user"></i>',
                            iconSize: [30, 30]
                        })
                    }).addTo(map)
                    .bindPopup('You are here!')
                    .openPopup();

                    map.setView([lat, lng], 13);
                });
            }
        }

        document.getElementById('find-me').addEventListener('click', getLocation);
    </script>
</body>
</html>

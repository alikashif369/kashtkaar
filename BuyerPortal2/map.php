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

        .search-box {
            position: relative;
            margin-bottom: 15px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .filter-group {
            margin-bottom: 15px;
        }

        .filter-group label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .btn-location {
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            background: #3498db;
            color: white;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-location:hover {
            background: #2980b9;
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
            <div class="search-box">
                <input type="text" id="location-search" placeholder="Search location..." class="form-control">
                <i class="fas fa-search"></i>
            </div>

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
                
                <button id="find-me" class="btn-location">
                    <i class="fas fa-location-arrow mr-2"></i>Use My Location
                </button>
            </div>

            <div class="farmer-list" id="farmer-list">
                <!-- Farmers will be listed here dynamically -->
            </div>
        </div>
    </div>

    <script>
        // Initialize map
        var map = L.map('map').setView([30.3753, 69.3451], 6);
        
        // Add a modern-looking map style
        L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Store all markers
        var markers = [];

        // Function to add farmer to list and map
        function addFarmer(farmer) {
            // Add marker to map
            var marker = L.marker([farmer.latitude, farmer.longitude])
                .addTo(map)
                .bindPopup(`
                    <div class='farmer-info'>
                        <h5>${farmer.name}</h5>
                        <p>${farmer.district}, ${farmer.state}</p>
                        <a href='FarmerProfile.php?farmer_id=${farmer.id}' class='btn btn-primary btn-sm'>View Profile</a>
                    </div>
                `);
            
            markers.push(marker);

            // Add to list
            var listItem = document.createElement('div');
            listItem.className = 'farmer-card';
            listItem.innerHTML = `
                <h5>${farmer.name}</h5>
                <p><i class="fas fa-map-marker-alt"></i> ${farmer.district}, ${farmer.state}</p>
            `;
            
            // Click on list item centers map on farmer
            listItem.onclick = function() {
                map.setView([farmer.latitude, farmer.longitude], 13);
                marker.openPopup();
            };
            
            document.getElementById('farmer-list').appendChild(listItem);
        }

        // Load farmers
        <?php
        $query = "SELECT f.*, fl.latitude, fl.longitude 
                  FROM farmerregistration f 
                  JOIN farmer_locations fl ON f.farmer_id = fl.farmer_id";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {
            if($row['latitude'] && $row['longitude']) {
                echo "addFarmer({
                    id: {$row['farmer_id']},
                    name: '{$row['farmer_name']}',
                    district: '{$row['farmer_district']}',
                    state: '{$row['farmer_state']}',
                    latitude: {$row['latitude']},
                    longitude: {$row['longitude']}
                });\n";
            }
        }
        ?>

        // Geolocation
        document.getElementById('find-me').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    map.setView([lat, lng], 13);
                    L.marker([lat, lng])
                        .addTo(map)
                        .bindPopup('You are here!')
                        .openPopup();
                });
            }
        });
    </script>
</body>
</html>

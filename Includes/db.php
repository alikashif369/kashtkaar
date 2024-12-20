<?php 

        $con = mysqli_connect("localhost:3308","root", "","db1");
      
        if (mysqli_connect_errno()) {
                echo "Failed to connect to MySql " . mysqli_connect_error();
        }

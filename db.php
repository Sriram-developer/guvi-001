<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("database-guvi.ck2rgsp30sfg.ap-south-1.rds.amazonaws.com","admin","guvipass","guvi_db");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
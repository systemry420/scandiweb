<?php
    $servername = "localhost";
    $username = "root";
    $password = "mqgh7*eZKC5pCm82";
    $dbname = "product_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
?>
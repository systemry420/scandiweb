<?php

    include './includes/connection.php';

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['productType'];

    if ($type == "DVD") {
        $size = $_POST['size'];
    }
    else if ($type == "Furniture") {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
    }
    else if ($type == "Book") {
        $weight = $_POST['weight'];
    }
    //todo: validation

    if (isset($_POST['save'])) {
        $sql = "INSERT INTO `products`(`sku`, `name`, `price`)
        VALUES ('$sku', '$name', '$price')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    
?>
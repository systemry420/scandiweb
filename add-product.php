<?php

    include './includes/connection.php';

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['productType'];

    $sql = "INSERT INTO `products`(`sku`, `name`, `price`)
    VALUES ('$sku', '$name', '$price');";

    if ($type == "DVD") {
        $size = $_POST['size'];
        $sql .= "INSERT INTO `dvd`(`product_sku`, `size`) VALUES('$sku', '$size')";
    }
    else if ($type == "Furniture") {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $sql .= "INSERT INTO `furniture`(`product_sku`, `height`, `width`, `length`) 
        VALUES ('$sku', '$height', '$weight', '$length');";
    }
    else if ($type == "Book") {
        $weight = $_POST['weight'];
        $sql .= "INSERT INTO `books`(`product_sku`, `weight`) VALUES ('$sku', '$weight');";
    }

    if (isset($_POST['save'])) {

        if ($conn->multi_query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    
?>
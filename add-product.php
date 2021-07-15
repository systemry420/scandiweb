<?php
    include './includes/connection.php';
    include './model/product.php';
    include './model/disc.php';

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['productType'];

    $product = new Product($_POST['sku'], $_POST['name'], $_POST['price']);

    $objects = [
        'dvd' => dvdObject($product),
        'book' => prepareBookQuery($sku),
        'furniture' => prepareFurnitureQuery($sku),
        '' => ''
    ];


    $sql = $product->insertProduct();

    $sql .= $objects[$type]; // prepare query according to selected type

    if (isset($_POST['save'])) {
        echo $sql;
        // if ($conn->multi_query($sql) === TRUE) {
        //     header("Location: index.php");
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
        // $conn->close();
    }

    function dvdObject($product) {
        $size = $_POST['size'];
        $disc = new Disc($product->getSku(), $product->getName(), $product->getPrice(), $size);
        return $disc->insertDisc();
    }

    function prepareBookQuery($sku) {
        $weight = $_POST['weight'];
        return "INSERT INTO `books`(`product_sku`, `weight`) VALUES ('$sku', '$weight');";
    }

    function prepareFurnitureQuery($sku) {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        return "INSERT INTO `furniture`(`product_sku`, `height`, `width`, `length`) 
        VALUES ('$sku', '$height', '$width', '$length');";
    }


    function validate($input) {

    }
    
?>
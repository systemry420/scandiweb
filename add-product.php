<?php
    include './model/app.php';
    include './model/product.php';
    include './model/disc.php';
    include './model/book.php';
    include './model/furniture.php';

    $conn = App::connect();
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['productType'];

    $product = new Product($_POST['sku'], $_POST['name'], $_POST['price']);

    $objects = [
        'dvd' => dvdObject($product),
        'book' => bookObject($product),
        'furniture' => furnitureObject($product),
        '' => ''
    ];


    $sql = $product->insertProduct();

    $sql .= $objects[$type]; // prepare objects according to selected type

    if (isset($_POST['save'])) {
        echo $sql;
        if ($conn->multi_query($sql) === true) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function dvdObject($product) {
        $size = $_POST['size'];
        $disc = new Disc($product->getSku(), $product->getName(), $product->getPrice(), $size);
        return $disc->insertDisc();
    }

    function bookObject($product) {
        $weight = $_POST['weight'];
        $book = new Book($product->getSku(), $product->getName(), $product->getPrice(), $weight);
        return $book->insertBook();
    }

    function furnitureObject($product) {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $furniture = new Furniture($product->getSku(), $product->getName(), $product->getPrice(), $height, $width, $length);
        return $furniture->insertFurniture();
    }
    
?>
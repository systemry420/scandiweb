<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/main.css" rel="stylesheet" />
    <title>Products</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <header>
            <h1>Product List</h1>
            <ul id="buttons">
                <li>
                    <a class="button" href="add-product.html">Add</a>
                </li>
                <li>
                    <button class="button" type="submit" id="deleteAll" name="deleteAll">Mass Delete</button>
                </li>
            </ul>
        </header>

        <main>
            <section class="category-disc">
                <?php
                    include './model/app.php';
                    $conn = App::connect();
                    $sql = "SELECT * FROM `dvd`, `products` WHERE `sku`=`product_sku`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <article class="product">
                            <input type="checkbox" name="delete[]" class="delete-checkbox" value="<?php echo $row['sku']; ?>">
                            <div class="product-info">
                                <p class="product-sku"> <?php echo $row['sku']; ?></p>
                                <p class="product-name"> <?php echo $row['name']; ?></p>
                                <p class="product-price"> <?php echo $row['price']; ?> $</p>
                                <p class="product-property"><strong>Size:</strong>  <?php echo $row['size']; ?> MB</p>
                            </div>
                        </article>
                    <?php
                    }
                    $conn->close();
                    ?>
            </section>

            <section class="category-furniture">
                    <?php
                    $conn = App::connect();
                    $sql = "SELECT * FROM `furniture`, `products` WHERE `sku`=`product_sku`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <article class="product">
                            <input type="checkbox" name="delete[]" value="<?php echo $row['sku']; ?>" class="delete-checkbox">
                            <div class="product-info">
                                <p class="product-sku"> <?php echo $row['sku']; ?></p>
                                <p class="product-name"> <?php echo $row['name']; ?></p>
                                <p class="product-price"> <?php echo $row['price']; ?> $</p>
                                <p class="product-property"><strong>Dimensions:</strong> 
                                    <?php echo $row['height'] ?> x <?php echo $row['width'] ?> x <?php echo $row['length'] ?>
                                </p>
                            </div>
                        </article>
                    <?php
                    }
                    $conn->close();
                    ?>
            </section>

            <section class="category-book">
                    <?php
                    $conn = App::connect();
                    $sql = "SELECT * FROM `books`, `products` WHERE `sku`=`product_sku`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <article class="product">
                            <input type="checkbox" name="delete[]" value="<?php echo $row['sku']; ?>" class="delete-checkbox">
                            <div class="product-info">
                                <p class="product-sku"> <?php echo $row['sku']; ?></p>
                                <p class="product-name"> <?php echo $row['name']; ?></p>
                                <p class="product-price"> <?php echo $row['price']; ?> $</p>
                                <p class="product-property"><strong>Weight:</strong> <?php echo $row['weight'] ?> KG</p>
                            </div>
                        </article>
                    <?php
                    }
                    $conn->close();
                    ?>
            </section>
            <?php
                $conn = App::connect();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['deleteAll'])) {
                        if (!isset($_POST['delete'])) {
                            return;
                        }
                        $selectedProducts = $_POST['delete'];
                        if (!empty($selectedProducts)) {
                            $sql = "DELETE FROM products WHERE sku IN ";
                            $sql .= "('" . implode("','", array_values($selectedProducts)) . "')";
                            $result = $conn->query($sql);
                            if ($result == true) {
                                header("Location: index.php");
                                $conn->close();
                            }
                        }
                    }
                }
            ?>
        </main>
    </form>
</body>

</html>
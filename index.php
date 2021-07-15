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
                    <a href="add-product.html" name="add">Add</a>
                </li>
                <li>
                    <button class="button" type="submit" name="deleteAll">Mass Delete</button>
                </li>
            </ul>
        </header>

        <main>
            <section class="category-disc">
                <?php
                include './includes/connection.php';
                $sql = "select * FROM `products`";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <article class="product">
                        <input type="checkbox" name="delete[]" value="<?php echo $row['sku']; ?>" class="delete-checkbox">
                        <div class="product-info">
                            <p class="product-sku"> <?php echo $row['sku']; ?></p>
                            <p class="product-name"> <?php echo $row['name']; ?></p>
                            <p class="product-price"> <?php echo $row['price'] . " $"; ?></p>
                            <p class="product-property">Size: 700 MB</p>
                        </div>
                    </article>
                <?php
                }
                $conn->close();
                ?>
            </section>

            <section class="category-book">

            </section>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                if (isset($_POST['deleteAll'])) {
                    $selectedProducts = $_POST['delete'];
    
                    if(!empty($selectedProducts)) {   
    
                        include './includes/connection.php';                        
                        $sql = "DELETE FROM products WHERE sku in ";
                        $sql.= "('".implode("','",array_values($_POST['delete']))."')";
    
                        $result = $conn->query($sql);

                        $conn->close();
                        header("Location: index.php");
                    }
                }
            }
            ?>
        </main>
    </form>
</body>

</html>
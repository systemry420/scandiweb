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
    <header>
        <h1>Product List</h1>

        <ul id="buttons">
            <li>
                <a href="add-product.html" name="add">Add</a>
            </li>
            <li>
                <a href="index.php" name="deleteAll">Mass Delete</a>
            </li>
        </ul>
    </header>

    <main>
        <section class="category-disc">
        <?php

            include './includes/connection.php';

            $sql = "Select * FROM `products`";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
         ?>
                <article class="product">
                <input type="checkbox" name="delete" class="delete-checkbox">
                <div class="product-info">
                    <p class="product-sku"> <?php echo $row['sku']; ?></p>
                    <p class="product-name"> <?php echo $row['name']; ?></p>
                    <p class="product-price"> <?php echo $row['price']. " $"; ?></p>
                    <p class="product-property">Size: 700 MB</p>    
                </div>
            </article>
        <?php
            }

            $conn->close();
        ?>
            <article class="product">
                <input type="checkbox" name="delete" class="delete-checkbox">
                <div class="product-info">
                    <p class="product-sku">JVC200123</p>
                    <p class="product-name">Acme Disc</p>
                    <p class="product-price">20.00 $</p>
                    <p class="product-property">Size: 700 MB</p>    
                </div>
            </article>

            <article class="product">
                <input type="checkbox" name="delete" class="delete-checkbox">
                <p class="product-sku">JVC200123</p>
                <p class="product-name">Acme Disc</p>
                <p class="product-price">20.00 $</p>
                <p class="product-property">Size: 700 MB</p>
            </article>
        </section>

        <section class="category-book">                        
            <article class="product">
                <input type="checkbox" name="delete" class="delete-checkbox">

                <p class="product-sku">JVC200123</p>
                <p class="product-name">Acme Disc</p>
                <p class="product-price">20.00 $</p>
                <p class="product-property">Size: 700 MB</p>
            </article>
        </section>

        <section class="category-furniture">                        
            <article class="product">
                <input type="checkbox" name="delete" class="delete-checkbox">
                <p class="product-sku">JVC200123</p>
                <p class="product-name">Acme Disc</p>
                <p class="product-price">20.00 $</p>
                <p class="product-property">Size: 700 MB</p>
            </article>
        </section>
    </main>
</body>
</html>
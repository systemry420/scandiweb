<?php

    include './includes/connection.php';

    if (isset($_POST['save'])) {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['type'];
    }


    //todo: validation

    
    
?>
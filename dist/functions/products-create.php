<?php
    $brandname = strtoupper($_POST['brand-name']);
    $productcode = $_POST['product-code'];
    $name = strtoupper($_POST['name']);
    $category = $_POST['category'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID FROM tblproducts WHERE prd_brandname = ? AND prd_name = ? AND prd_code = ?");
    $stmt->execute([$brandname,$name,$productcode]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt = $connection->prepare("INSERT INTO tblproducts 
        (prd_brandname,prd_name,prd_category,prd_code) VALUES (?,?,?,?)");
        $stmt->execute([$brandname,$name,$category,$productcode]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../products-table.php?product-added-success");</script>';
    } else {
        echo '<script>window.location.assign("../products-table.php?product-exists");</script>';
    }
    
    

?>
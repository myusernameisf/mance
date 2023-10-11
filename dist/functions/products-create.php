<?php
    $productcode = $_POST['product-code'];
    $name = strtoupper($_POST['name']);
    $category = $_POST['category'];
    $uom = strtoupper($_POST['uom']);

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID FROM tblproducts WHERE prd_name = ? AND prd_code = ? AND prd_isTrash = ?");
    $stmt->execute([$name,$productcode,0]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt = $connection->prepare("INSERT INTO tblproducts 
        (prd_name,prd_category,prd_code,prd_uom) VALUES (?,?,?,?)");
        $stmt->execute([$name,$category,$productcode,$uom]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../products-table.php?product-added-success");</script>';
    } else {
        echo '<script>window.location.assign("../products-table.php?product-exists");</script>';
    }
    
    

?>
<?php
    $brandname = strtoupper($_POST['brand-name']);
    $name = strtoupper($_POST['name']);
    $category = $_POST['category'];
    $productcode = $_POST['product-code'];
    $id = $_POST['update-product-id'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID FROM tblproducts WHERE (prd_brandname = ?) AND (prd_code = ?) AND (prd_ID != ?)");
    $stmt->execute([$brandname,$productcode,$id]);
    $count = $stmt->rowCount();
        if ($count == 0) {
        $stmt = $connection->prepare("UPDATE tblproducts SET prd_brandname = ?, prd_name = ?, prd_category = ?, prd_code = ? WHERE prd_ID = ?");
        $stmt->execute([$brandname,$name,$category,$productcode,$id]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../products-table.php?update-success");</script>';
    } else {
        echo '<script>window.location.assign("../products-table.php?update-failed");</script>';
    }
    
?>
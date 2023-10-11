<?php
    $name = strtoupper($_POST['name']);
    $category = $_POST['category'];
    $productcode = $_POST['product-code'];
    $uom = $_POST['uom'];
    $id = $_POST['update-product-id'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID FROM tblproducts WHERE (prd_code = ?) AND (prd_name = ?) AND (prd_ID != ?)");
    $stmt->execute([$productcode,$name,$id]);
    $count = $stmt->rowCount();
        if ($count == 0) {
        $stmt = $connection->prepare("UPDATE tblproducts SET prd_name = ?, prd_category = ?, prd_code = ?, prd_uom = ? WHERE prd_ID = ?");
        $stmt->execute([$name,$category,$productcode,$uom,$id]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../products-table.php?update-success");</script>';
    } else {
        echo '<script>window.location.assign("../products-table.php?update-failed");</script>';
    }
    
?>
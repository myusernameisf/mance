<?php
    $productcode = $_POST['product-code'];
    $name = strtoupper($_POST['name']);
    $category = strtoupper($_POST['category']);
    $desc = $_POST['desc'];
    $qty = $_POST['qty'];
    $uom = strtoupper($_POST['uom']);
    $unitprice = $_POST['unit-price'];
    $sellingprice = $_POST['selling-price'];
    $lowstock = $_POST['low-stock'];
    $id = $_POST['update-product-id'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID FROM tblproducts WHERE (prd_code = ?) AND (prd_name = ?) AND (prd_ID != ?)");
    $stmt->execute([$productcode,$name,$id]);
    $count = $stmt->rowCount();
        if ($count == 0) {
        $stmt = $connection->prepare("UPDATE tblproducts SET prd_code = ?, prd_name = ?, prd_category = ?, prd_desc = ?,
         prd_qty = ?,  prd_uom = ?, prd_unitprice = ?, prd_sellingprice = ?, prd_lowstock = ? WHERE prd_ID = ?");
        $stmt->execute([$productcode,$name,$category,$desc,$qty,$uom,$unitprice,$sellingprice,$lowstock,$id]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../products-table.php?update-success");</script>';
    } else {
        echo '<script>window.location.assign("../products-table.php?update-failed");</script>';
    }
    
?>
<?php
    $brandname = strtoupper($_POST['brand-name']);
    $name = strtoupper($_POST['name']);
    $qty = $_POST['qty'];
    $productcode = $_POST['product-code'];
    $unitprice = $_POST['unit-price'];
    $sellingprice = $_POST['selling-price'];
    $id = $_POST['update-inventory-id'];
    $lowstock = $_POST['low-stock'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT inv_ID FROM tblinventory WHERE (inv_brandname = ?) AND (inv_prdCode = ?) AND (inv_ID != ?)");
    $stmt->execute([$brandname,$productcode,$id]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt = $connection->prepare("UPDATE tblinventory SET inv_brandname = ?, inv_name = ?, inv_qty = ?, inv_sellingprice = ?, inv_unitprice = ?, inv_lowstocknotif = ?, inv_prdCode = ? 
        WHERE inv_ID = ?");
        $stmt->execute([$brandname,$name,$qty,$sellingprice,$unitprice,$lowstock,$productcode,$id]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../inventory-table.php?update-success");</script>';
    } else {
        echo '<script>window.location.assign("../inventory-table.php?update-failed");</script>';
    }
    
?>
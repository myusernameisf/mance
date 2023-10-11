<?php
    $name = strtoupper($_POST['name']);
    $qty = $_POST['qty'];
    $productcode = $_POST['product-code'];
    $description = $_POST['description'];
    $unitprice = $_POST['unit-price'];
    $sellingprice = $_POST['selling-price'];
    $id = $_POST['update-inventory-id'];
    $uom = $_POST['uom'];
    $lowstock = $_POST['low-stock'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT inv_ID FROM tblinventory WHERE (inv_name = ?) AND (inv_prdCode = ?) AND (inv_ID != ?) AND (inv_isTrash = ?)");
    $stmt->execute([$name,$productcode,$id,0]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $stmt = $connection->prepare("UPDATE tblinventory SET inv_name = ?, inv_uom = ?, inv_description = ?, inv_qty = ?, inv_sellingprice = ?, inv_unitprice = ?, inv_lowstocknotif = ?, inv_prdCode = ? 
        WHERE inv_ID = ?");
        $stmt->execute([$name,$uom,$description,$qty,$sellingprice,$unitprice,$lowstock,$productcode,$id]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../inventory-table.php?update-success");</script>';
    } else {
        echo '<script>window.location.assign("../inventory-table.php?update-failed");</script>';
    }
    
?>
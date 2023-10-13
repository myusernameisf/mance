<?php
    $id = $_POST['return-item-id'];
    $qty = $_POST['qty'];
    $tqty = $_POST['t-qty'];
    $remarks = $_POST['remarks'];
    $supplier = strtoupper($_POST['supplier']);
    $newQty = $tqty - $qty;

    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblproducts SET prd_qty = ? WHERE prd_ID = ?");
    $stmt->execute([$newQty,$id]);
    $stmt = $connection->prepare("INSERT INTO tblreturnsupplier (rs_invID,rs_remarks,rs_qty,rs_supplier) VALUES (?,?,?,?)");
    $stmt->execute([$id,$remarks,$qty,$supplier]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../products-table.php?return-success");</script>';

?>
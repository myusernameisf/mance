<?php
    $id = $_POST['return-item-id'];
    $qty = $_POST['qty'];
    $tqty = $_POST['t-qty'];
    $remarks = $_POST['remarks'];
    $newQty = $tqty - $qty;

    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblinventory SET inv_qty = ? WHERE inv_ID = ?");
    $stmt->execute([$newQty,$id]);
    $stmt = $connection->prepare("INSERT INTO tblreturnsupplier (rs_invID,rs_remarks,rs_qty) VALUES (?,?,?)");
    $stmt->execute([$id,$remarks,$qty]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../inventory-table.php");</script>';

?>
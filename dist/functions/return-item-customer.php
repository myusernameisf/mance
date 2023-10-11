<?php
    $id = $_POST['return-button'];
    $qty = $_POST['qty'];
    $remarks = $_POST['remarks'];

    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblsalesitem SET item_returnQty = ? WHERE item_ID = ?");
    $stmt->execute([$qty,$id]);
    $stmt = $connection->prepare("INSERT INTO tblreturncustomer (rc_itemID,rc_remarks) VALUES (?,?)");
    $stmt->execute([$id,$remarks]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-table.php");</script>';

?>
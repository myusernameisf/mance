<?php
    $id = $_POST['delete-sales-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("DELETE FROM tblsales WHERE sale_receiptno = ?");
    $stmt->execute([$id]);
    $stmt = $connection->prepare("DELETE FROM tblsalesitem WHERE item_receiptno = ?");
    $stmt->execute([$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-table-archived.php?delete-success");</script>';

?>
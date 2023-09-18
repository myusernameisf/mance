<?php
    $id = $_POST['trash-sales-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblsales SET sale_isTrash = ? WHERE sale_receiptno = ?");
    $stmt->execute([1,$id]);
    $stmt = $connection->prepare("UPDATE tblsalesitem SET item_isTrash = ? WHERE item_receiptno = ?");
    $stmt->execute([1,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-table.php?trash-success");</script>';

?>
<?php
    $id = $_POST['restore-sales-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblsales SET sale_isTrash = ? WHERE sale_receiptno = ?");
    $stmt->execute([0,$id]);
    $stmt = $connection->prepare("UPDATE tblsalesitem SET item_isTrash = ? WHERE item_receiptno = ?");
    $stmt->execute([0,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-table-archived.php?restore-success");</script>';

?>
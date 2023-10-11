<?php
    $id = $_POST['trash-return-supplier-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblreturnsupplier SET rs_isTrash = ? WHERE rs_ID = ?");
    $stmt->execute([1,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../inventory-return.php?trash-success");</script>';

?>
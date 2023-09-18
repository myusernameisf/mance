<?php
    $id = $_POST['trash-inventory-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblinventory SET inv_isTrash = ? WHERE inv_ID = ?");
    $stmt->execute([1,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../inventory-table.php?trash-success");</script>';

?>
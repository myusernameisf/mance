<?php
    $id = $_POST['restore-inventory-id'];
    $invID = $_POST['inv-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT inv_ID FROM tblinventory WHERE inv_productID = ? AND inv_isTrash = ?");
    $stmt->execute([$id,0]);
    $count = $stmt->rowCount();

    if ($count == 0) {
        $stmt = $connection->prepare("UPDATE tblinventory SET inv_isTrash = ? WHERE inv_ID = ?");
        $stmt->execute([0,$invID]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../inventory-table-archived.php?restore-success");</script>';
    } else {
        echo '<script>window.location.assign("../inventory-table-archived.php?restore-failed");</script>';
    }

    

?>
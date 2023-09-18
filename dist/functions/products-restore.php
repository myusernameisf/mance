<?php
    $id = $_POST['restore-product-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblproducts SET prd_isTrash = ? WHERE prd_ID = ?");
    $stmt->execute([0,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../products-table-archived.php?restore-success");</script>';

?>
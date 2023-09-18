<?php
    $id = $_POST['trash-product-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblproducts SET prd_isTrash = ? WHERE prd_ID = ?");
    $stmt->execute([1,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../products-table.php?trash-success");</script>';

?>
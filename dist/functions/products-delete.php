<?php
    $id = $_POST['delete-product-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("DELETE FROM tblproducts WHERE prd_ID = ?");
    $stmt->execute([$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../products-table-archived.php?delete-success");</script>';

?>
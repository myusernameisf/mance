<?php
    $id = $_POST['trash-return-customer-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblreturncustomer SET rc_isTrash = ? WHERE rc_ID = ?");
    $stmt->execute([1,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-return.php?trash-success");</script>';

?>
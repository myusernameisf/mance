<?php
    $id = $_POST['delete-expenses-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("DELETE FROM tblexpenses WHERE exp_ID = ?");
    $stmt->execute([$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../expenses-table-archived.php?delete-success");</script>';

?>
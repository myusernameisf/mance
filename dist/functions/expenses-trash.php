<?php
    $id = $_POST['trash-expenses-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblexpenses SET exp_isTrash = ? WHERE exp_ID = ?");
    $stmt->execute([1,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../expenses-table.php?trash-success");</script>';

?>
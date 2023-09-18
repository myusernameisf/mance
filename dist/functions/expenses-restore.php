<?php
    $id = $_POST['restore-expenses-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblexpenses SET exp_isTrash = ? WHERE exp_ID = ?");
    $stmt->execute([0,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../expenses-table-archived.php?restore-success");</script>';

?>
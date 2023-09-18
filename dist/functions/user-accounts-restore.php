<?php
    $id = $_POST['restore-user-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblaccounts SET acc_isTrash = ? WHERE acc_ID = ?");
    $stmt->execute([0,$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../accounts-user-archived.php?restore-success");</script>';

?>
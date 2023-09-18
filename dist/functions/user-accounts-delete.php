<?php
    $id = $_POST['delete-user-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("DELETE FROM tblaccounts WHERE acc_ID = ?");
    $stmt->execute([$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../accounts-user-archived.php?delete-success");</script>';

?>
<?php
    $id = $_POST['reset-password-id'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("UPDATE tblaccounts SET acc_password = ? WHERE acc_ID = ?");
    $stmt->execute(['40bd001563085fc35165329ea1ff5c5ecbdbbeef',$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../accounts-user.php?password-change-success");</script>';

?>
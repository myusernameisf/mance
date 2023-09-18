<?php
    $userid = $_GET['userid'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("DELETE FROM tblpos WHERE pos_userID = ?");
    $stmt->execute([$userid]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-point.php");</script>';

?>
<?php
    $id = $_GET['posid'];
 
    include_once ('connection-open.php');
    $stmt = $connection->prepare("DELETE FROM tblpos WHERE pos_ID = ?");
    $stmt->execute([$id]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../sales-point2.php");</script>';

?>
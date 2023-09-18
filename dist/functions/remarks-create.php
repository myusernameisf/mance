<?php
    $remarks = $_POST['remarks'];
    $userID = $_POST['remarks-user'];
    

    include_once ('connection-open.php');
    $stmt = $connection->prepare("INSERT INTO tblremarks 
    (remarks_notes,remarks_userID) VALUES (?,?)");
    $stmt->execute([$remarks,$userID]);
    include_once ('connection-close.php');
    echo '<script>window.location.assign("../index.php#remarks");</script>';
    
    

?>
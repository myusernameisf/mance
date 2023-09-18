<?php
    $first_name = strtoupper($_POST['first-name']);
    $last_name = strtoupper($_POST['last-name']);
    $email = $_POST['email'];
    $em = $_POST['em'];
    $id = $_POST['update-user-id'];
    $logo = $_POST['logo'];

    if ($email == $em) {
        include_once ('connection-open.php');
        $stmt = $connection->prepare("UPDATE tblaccounts SET acc_firstname = ?, acc_lastname = ?, acc_logo = ? WHERE acc_ID = ?");
        $stmt->execute([$first_name,$last_name,$logo,$id]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../accounts-user.php?update-success");</script>';
    } else {
        include_once ('connection-open.php');
        $stmt = $connection->prepare("SELECT acc_ID FROM tblaccounts WHERE acc_email = ?");
        $stmt->execute([$email]);
        $count = $stmt->rowCount();
        if ($count == 0) {
            $stmt = $connection->prepare("UPDATE tblaccounts SET acc_firstname = ?, acc_lastname = ?, acc_email = ?, acc_logo = ? WHERE acc_ID = ?");
            $stmt->execute([$first_name,$last_name,$email,$logo,$id]);
            include_once ('connection-close.php');
            echo '<script>window.location.assign("../accounts-user.php?update-success");</script>';
        } else {
            echo '<script>window.location.assign("../accounts-user.php?update-email-exist");</script>';
        }
    }
    
    
    
    
    

?>
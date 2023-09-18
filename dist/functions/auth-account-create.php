<?php
    $first_name = strtoupper($_POST['first-name']);
    $last_name = strtoupper($_POST['last-name']);
    $email = $_POST['email'];
    $logo = $_POST['logo'];
    $password = sha1($_POST['password']);
    $c_password = sha1($_POST['c-password']);

    if ($password == $c_password) { 
        include_once ('connection-open.php');
        $stmt = $connection->prepare("SELECT acc_ID FROM tblaccounts WHERE acc_email = ?");
        $stmt->execute([$email]);
        $count = $stmt->rowCount();
        if ($count == 0) {
            $stmt = $connection->prepare("INSERT INTO tblaccounts 
            (acc_firstname,acc_lastname,acc_email,acc_password,acc_logo) VALUES (?,?,?,?,?)");
            $stmt->execute([$first_name,$last_name,$email,$password,$logo]);
            include_once ('connection-close.php');
            echo '<script>window.location.assign("../auth-login.php?account-created-success");</script>';
        } else {
            echo '<script>window.location.assign("../auth-login.php?account-created-email");</script>';
        }

       
    } else {
        echo '<script>window.location.assign("./auth-login.php?account-created-password");</script>';
    }
    
    

?>
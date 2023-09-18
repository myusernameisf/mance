<?php
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblaccounts WHERE acc_email = ? AND acc_password = ?");
    $stmt->execute([$email,$password]);
    $count = $stmt->rowCount();
    $array = $stmt->fetch();

    if ($count > 0) {
        include_once ('auth-account-cookies.php');
        echo '<script>window.location.assign("../index.php");</script>';
    } else {
        echo '<script>window.location.assign("../auth-login.php?account-login-failed");</script>';
    }

    
    

?>
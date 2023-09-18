<?php
    $currentPassword = sha1($_POST['current-password']);
    $newPassword = sha1($_POST['new-password']);
    $confirmPassword = sha1($_POST['confirm-password']);

    $userID = $_GET['userid'];

    if ($newPassword == $confirmPassword) { 
        include_once ('connection-open.php');
        $stmt = $connection->prepare("SELECT acc_ID FROM tblaccounts WHERE acc_password = ? AND acc_ID = ?");
        $stmt->execute([$currentPassword,$userID]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $stmt = $connection->prepare("UPDATE tblaccounts SET acc_password = ? WHERE acc_ID = ?");
            $stmt->execute([$newPassword,$userID]);
            include_once ('connection-close.php');
            echo '<script>window.location.assign("../auth-login.php?password-change");</script>';
        } else {
    
        }
    } else {

    }

?>
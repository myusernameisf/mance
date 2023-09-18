<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['userdata'] = null;
    unset($_SESSION['userdata']);

    echo '<script>window.location.assign("../auth-login.php");</script>';

?>
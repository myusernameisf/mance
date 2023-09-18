<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION['userdata'])){
        $userdetails = $_SESSION['userdata'];
        return $userdetails;
    } else {
        return null;
    }

?>
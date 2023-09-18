<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['userdata'] = array(
        "fname" => $array['acc_firstname'], "lname"=> $array['acc_lastname'], 
        "email" => $array['acc_email'], "id" => $array['acc_ID'],
        "fullname" => $array['acc_firstname']." ".
        $array['acc_lastname'], "access" => $array['acc_access'], "logo" => $array['acc_logo']
    );

?>
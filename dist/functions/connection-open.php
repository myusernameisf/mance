<?php

    $server = "mysql:host=localhost;dbname=db_mence";
    $user = "root";
    $pass = "";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>
    PDO::FETCH_ASSOC);

    try {
        $connection = new PDO($server,$user,$pass,$options);
    } catch (PDOException $e) {
        echo "There is some problem in the connection".$e->getMessage();
    }

?>
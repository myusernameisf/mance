<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT pos_invID FROM tblpos WHERE pos_invID = ?");
    $stmt->execute([$_POST['inv-id']]);
    $count = $stmt->rowCount();

    if ($count == 0) { 
        $invID = $_POST['inv-id'];
        $userID = $_POST['userid'];
        $sprice = $_POST['sprice'];
        $uprice = $_POST['uprice'];
        $qty = $_POST['qty'];
        
    
        include_once ('connection-open.php');
        $stmt = $connection->prepare("INSERT INTO tblpos 
        (pos_invID,pos_qty,pos_sellingPrice,pos_unitprice,pos_userID) VALUES (?,?,?,?,?)");
        $stmt->execute([$invID,$qty,$sprice,$uprice,$userID]);
        include_once ('connection-close.php');
        echo '<script>window.location.assign("../sales-point2.php");</script>';
    } else {
        echo '<script>window.location.assign("../sales-point2.php?duplicate");</script>';
    }
    
    
    

?>
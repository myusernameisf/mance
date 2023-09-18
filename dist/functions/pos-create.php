<?php
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
    echo '<script>window.location.assign("../sales-point.php");</script>';
    
    

?>
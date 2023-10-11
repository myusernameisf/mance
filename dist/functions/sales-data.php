<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblsales.*,tblaccounts.acc_firstname,tblaccounts.acc_lastname 
    FROM tblsales
    LEFT JOIN tblaccounts ON acc_ID = sale_userID 
    WHERE sale_receiptno = ?");
    
    $stmt->execute([$data['sale_receiptno']]);
    $count = $stmt->rowCount();
    $sales = $stmt->fetch();
?>
    <?php include_once ('connection-close.php'); ?>

    


<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblsales.*,tblaccounts.acc_firstname,tblaccounts.acc_lastname 
    FROM tblsales
    LEFT JOIN tblaccounts ON acc_ID = sale_userID 
    WHERE sale_receiptno = ?");
    $stmt->execute([$receiptno]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetch();
?>
    <?php include_once ('connection-close.php'); ?>

    


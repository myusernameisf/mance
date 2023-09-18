<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblsales
    WHERE sale_receiptno = ?");
    $stmt->execute([$receiptno]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetch();
?>
    <?php include_once ('connection-close.php'); ?>

    


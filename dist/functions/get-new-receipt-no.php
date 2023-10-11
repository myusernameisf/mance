<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT sale_receiptno FROM tblsales ORDER BY sale_receiptno DESC LIMIT 1");
    $stmt->execute();
    $count = $stmt->rowCount();
    $datas = $stmt->fetch();

?>
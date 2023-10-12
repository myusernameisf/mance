<?php
    include_once ('connection-open.php');

    $i = 1;
    $dateNow = date('Y-m');
    $tt = array();
    $monthname = date('F',strtotime($dateNow));
    $stmt = $connection->prepare("SELECT item_prdName, COUNT(item_qty) AS total_sales
    FROM tblsalesitem
    WHERE (item_isTrash = ?) 
    AND (item_date LIKE '%$dateNow%')
    GROUP BY item_prdName
    ORDER BY total_sales DESC
    LIMIT 3");
    $stmt->execute([0]);
    $topthrees = $stmt->fetchAll();
    foreach ($topthrees as $ttt) {
        array_push($tt,$ttt['total_sales'],$ttt['item_prdName']);
    } 

    



?>

    <?php include_once ('connection-close.php'); ?>
<?php
    include_once ('connection-open.php');

    $i = 1;
    $dateNow = date('Y-m');
    $values = array();
        $monthname = date('F',strtotime($dateNow));
        $stmt = $connection->prepare("SELECT item_prdName, COUNT(item_qty) AS total_sales
        FROM tblsalesitem
        WHERE (item_isTrash = ?) 
        AND (item_date LIKE '%$dateNow%')
        GROUP BY item_prdName
        ORDER BY total_sales DESC
        LIMIT 3");
        $stmt->execute();
        $datas = $stmt->fetchAll();
        $totalMonth = 0;

        foreach ($datas as $data) {
            echo $data['total_sales']; 
        }



?>

    <?php include_once ('connection-close.php'); ?>
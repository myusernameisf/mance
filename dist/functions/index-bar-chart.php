<?php
    include_once ('connection-open.php');

    $i = 1;
    $year = date('Y');
    $grossValues = array();
    $netValues = array();
    while ($i <= 12) {
        $date = date('Y-m', strtotime($year.'-'.$i));
        $stmt = $connection->prepare("SELECT * 
        FROM tblsalesitem 
        WHERE (item_isTrash = ?) 
        AND (item_date LIKE '%$date%')");
        $stmt->execute([0]);
        $datas = $stmt->fetchAll();
        $totalMonth = 0;
        $totalNetMonth = 0;

        foreach ($datas as $data) {
            $total = $data['item_qty'] * $data['item_sellingPrice'];
            $totalnet = $data['item_qty'] * $data['item_unitprice'];
            $totalMonth += $total;

            $newNet = $total - $totalnet;
            $totalNetMonth += $newNet;
        }
        array_push($grossValues,$totalMonth);
        array_push($netValues,$totalNetMonth);
        $i++;
    }



?>

    <?php include_once ('connection-close.php'); ?>
<?php
    include_once ('connection-open.php');

    $i = 1;
    $year = date('Y');
    $barValues = array();
    while ($i <= 12) {
        $date = date('Y-m', strtotime($year.'-'.$i));
        $stmt = $connection->prepare("SELECT * 
        FROM tblsalesitem 
        WHERE (item_isTrash = ?) 
        AND (item_date LIKE '%$date%')");
        $stmt->execute([0]);
        $datas = $stmt->fetchAll();
        $totalMonth = 0;

        foreach ($datas as $data) {
            $total = $data['item_qty'] * $data['item_sellingPrice'];
            $totalMonth += $total;
        }
        array_push($barValues,$totalMonth);

        $i++;
    }



?>

    <?php include_once ('connection-close.php'); ?>
<?php
    include_once ('connection-open.php');

    $i = 1;
    $dateNow = date('Y-m');
    $values = array();
    while ($i <= 2) {
        $monthname = date('F',strtotime($dateNow));
        $stmt = $connection->prepare("SELECT * 
        FROM tblsalesitem 
        WHERE (item_isTrash = ?) 
        AND (item_date LIKE '%$dateNow%')");
        $stmt->execute([0]);
        $datas = $stmt->fetchAll();
        $totalMonth = 0;

        foreach ($datas as $data) {
            $total = $data['item_qty'] * $data['item_sellingPrice'];
            $totalMonth += $total;
        }
        $dateNow = date("Y-m", strtotime("-1 months"));
        array_push($values,$totalMonth,$monthname);

        $i++;
    }



?>

    <?php include_once ('connection-close.php'); ?>
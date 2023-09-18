<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblsalesitem.*,inv_brandname,inv_name 
    FROM tblsalesitem 
    LEFT JOIN tblinventory ON tblsalesitem.item_invID = tblinventory.inv_ID
    WHERE item_receiptno = ?");
    $stmt->execute([$receiptno]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>
    <?php $totalValue = 0; ?>
    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['inv_brandname']; ?></td>
                <td><?= $data['inv_name']; ?></td>
                <td><?= $data['item_qty']; ?></td>
                <td><?= number_format($data['item_sellingPrice'],2); ?></td>
                <?php $totalSellingPrice = $data['item_qty'] * $data['item_sellingPrice']; ?>
                <td><?= number_format($totalSellingPrice,2); ?></td>
                <?php $totalValue += $totalSellingPrice; ?>
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


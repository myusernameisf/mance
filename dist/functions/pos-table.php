<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblpos.*,inv_brandname,inv_name,inv_prdCode 
    FROM tblpos 
    LEFT JOIN tblinventory ON tblpos.pos_invID = tblinventory.inv_ID
    WHERE pos_userID = ? ORDER BY pos_ID DESC");
    $stmt->execute([$userdetails['id']]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>
    <?php $totalValue = 0; ?>
    <?php if ($count > 0) { ?>
        
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['inv_prdCode']; ?></td>
                <td><?= $data['inv_brandname']; ?></td>
                <td><?= $data['inv_name']; ?></td>
                <td><?= $data['pos_qty']; ?></td>
                <td><?= number_format($data['pos_sellingPrice'],2); ?></td>
                <?php $totalSellingPrice = $data['pos_qty'] * $data['pos_sellingPrice']; ?>
                <td><?= number_format($totalSellingPrice,2); ?></td>
                <?php $totalValue += $totalSellingPrice; ?>
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-danger mr-2" href="functions/pos-delete.php?posid=<?=$data['pos_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblreturncustomer.*,tblsalesitem.* 
    FROM tblreturncustomer
    LEFT JOIN tblsalesitem
    ON rc_itemID = item_ID WHERE rc_isTrash = ? ORDER BY rc_ID DESC");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= date('F d, Y', strtotime($data['rc_date'])); ?></td>
                <td><?= $data['item_receiptno']; ?></td>
                <td><?= $data['item_prdCode']; ?></td>
                <td><?= $data['item_prdName']; ?></td>
                <td><b><?= $data['item_returnQty']; ?></b></td>
                <td><?= $data['rc_remarks']; ?></td>
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-danger mr-2 mt-3" data-bs-toggle="modal" data-bs-target="#deleteReturnModal<?= $data['rc_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Delete Record"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </td>
            </tr>

            <?php include ('./return-customer-modal-trash.php'); ?>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


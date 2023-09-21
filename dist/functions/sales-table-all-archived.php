<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * 
    FROM tblsales 
    LEFT JOIN tblaccounts ON acc_ID = sale_userID
    WHERE (sale_isTrash = ?) AND (sale_date BETWEEN '$firstDate' AND '$lastDate') ORDER BY sale_ID DESC");
    $stmt->execute([1]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>
    <?php $totalValue = 0; ?>
    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= date('F d, Y', strtotime($data['sale_date'])); ?></td>
                <td><?= $data['sale_receiptno']; ?></td>
                <td><?= $data['sale_customer']; ?></td>
                <td><?= $data['sale_pm']; ?></td>
                <td><?= $data['acc_firstname'].' '.$data['acc_lastname']; ?></td>
                <td>
                    <a class="btn btn-success mr-2" target="_blank" href="sales-data.php?receiptno=<?= $data['sale_receiptno']; ?>"><i class="bi bi-eye-fill"></i></a>
                    <a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#restoreSalesModal<?= $data['sale_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Restore"><i class="bi bi-arrow-clockwise"></i></a>
                    <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteSalesModal<?= $data['sale_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Delete"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php include('sales-modal-delete.php'); ?>
            <?php include('sales-modal-restore.php'); ?>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


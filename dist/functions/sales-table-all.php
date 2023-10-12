<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * 
    FROM tblsales 
    LEFT JOIN tblaccounts ON acc_ID = sale_userID
    WHERE (sale_isTrash = ?) AND (sale_date BETWEEN '$firstDate' AND '$lastDate') ORDER BY sale_ID DESC");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>
    <?php $totalValue = 0; ?>
    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <?php if (isset($_GET['rn'])) { ?>
                <?php if ($_GET['rn'] == $data['sale_receiptno']) { ?>
                    <tr class="bg-warning text-light">
                <?php } else { ?>
                    <tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
            <?php } ?>
                <td><?= date('F d, Y', strtotime($data['sale_date'])); ?></td>
                <td><?= $data['sale_receiptno']; ?></td>
                <td><?= $data['sale_customer']; ?></td>
                <td><?= $data['sale_pm']; ?></td>
                <td><?= $data['acc_firstname'].' '.$data['acc_lastname']; ?></td>
                <?php $receiptno = $data['sale_receiptno']; ?>
                <?php include('./sales-modal-trash.php'); ?>
                <?php include('./sales-modal-view.php'); ?>
                <td><?= number_format($totalValue,2); ?></td>
                <td><b><?= number_format($totalValueProfit,2); ?></b></td>
                <td>
                    <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewSalesModal<?= $saleid; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                    <?php if ($userdetails['access'] == "ADMIN") { ?>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashSalesModal<?= $saleid; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    <?php } ?>
                    
                </td>
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


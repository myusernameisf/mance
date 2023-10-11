<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblexpenses.*
    FROM tblexpenses
    WHERE (exp_isTrash = ?) AND (exp_date BETWEEN '$firstDate' AND '$lastDate') ORDER BY exp_ID DESC");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= date('F d, Y', strtotime($data['exp_date'])); ?></td>
                <td><?= $data['exp_supplier']; ?></td>
                <td><?= $data['exp_receiptno']; ?></td>
                <td><?= $data['exp_productCode']; ?></td>
                <td><?= $data['exp_productName']; ?></td>
                <td><b><?= $data['exp_qty']; ?></b></td>
                <td><?= number_format($data['exp_unitprice'],2); ?></td>
                <?php $total = $data['exp_unitprice'] * $data['exp_qty']; ?>
                <td><?= number_format($total,2); ?></td>
                
                <?php if ($userdetails['access'] == "ADMIN") { ?>
                    <td>
                        <div class="text-center mb-3" role="group" aria-label="Basic example">
                            <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewExpensesModal<?= $data['exp_ID']; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                            <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashExpensesModal<?= $data['exp_ID']; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                        </div>
                    </td>

                    <?php include ('./expenses-modal-view.php'); ?>
                    <?php include ('./expenses-modal-trash.php'); ?>
                <?php } ?>
            </tr>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


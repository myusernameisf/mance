<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblexpenses.*,tblproducts.prd_name,tblproducts.prd_code  
    FROM tblexpenses 
    LEFT JOIN tblproducts ON tblproducts.prd_ID = tblexpenses.exp_productID 
    WHERE (exp_isTrash = ?) AND (exp_date BETWEEN '$firstDate' AND '$lastDate') ORDER BY exp_ID DESC");
    $stmt->execute([1]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= date('F d, Y', strtotime($data['exp_date'])); ?></td>
                <td><?= $data['exp_supplier']; ?></td>
                <td><?= $data['exp_receiptno']; ?></td>
                <td><?= $data['prd_code']; ?></td>
                <td><?= $data['prd_name']; ?></td>
                <td><?= $data['exp_qty']; ?></td>
                <td><?= number_format($data['exp_unitprice'],2); ?></td>
                <?php $total = $data['exp_unitprice'] * $data['exp_qty']; ?>
                <td><?= number_format($total,2); ?></td>
                
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#restoreExpensesModal<?= $data['exp_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Restore"><i class="bi bi-arrow-clockwise"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteExpensesModal<?= $data['exp_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Delete"><i class="bi bi-trash"></i></a>
                    </div>
                </td>

                <?php include ('./expenses-modal-delete.php'); ?>
                <?php include ('./expenses-modal-restore.php'); ?>
            </tr>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


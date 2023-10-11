<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblproducts WHERE prd_isTrash = ? ORDER BY prd_ID DESC");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['prd_code']; ?></td>
                <td><?= $data['prd_name']; ?></td>
                <td><?= $data['prd_category']; ?></td>
                <td><?= $data['prd_uom']; ?></td>
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#addProductSupplierModal<?= $data['prd_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add Stock"><i class="bi bi-plus-circle"></i></a>&nbsp |&nbsp
                        <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewProductModal<?= $data['prd_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashProductModal<?= $data['prd_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    </div>
                </td>

                <?php include ('./products-modal-view.php'); ?>
                <?php include ('./products-modal-trash.php'); ?>
                <?php include ('./expenses-modal-create.php'); ?>
            </tr>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


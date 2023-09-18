<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblproducts WHERE prd_isTrash = ?");
    $stmt->execute([1]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['prd_code']; ?></td>
                <td><?= $data['prd_brandname']; ?></td>
                <td><?= $data['prd_name']; ?></td>
                <td><?= $data['prd_category']; ?></td>
                <td><?= date('F d, Y', strtotime($data['prd_date'])); ?></td>
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#restoreProductModal<?= $data['prd_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Restore"><i class="bi bi-arrow-clockwise"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteProductModal<?= $data['prd_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    </div>
                </td>

                <?php include ('./products-modal-delete.php'); ?>
                <?php include ('./products-modal-restore.php'); ?>
            </tr>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


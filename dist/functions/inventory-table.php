<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblinventory WHERE inv_isTrash = ? ORDER BY inv_ID DESC");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['inv_prdCode']; ?></td>
                <td><?= $data['inv_name']; ?></td>
                <td><?= $data['inv_prdCategory']; ?></td>
                <td><?= $data['inv_uom']; ?></td>
                <td><?= $data['inv_description']; ?></td>
                <?php if ($data['inv_lowstocknotif'] >= $data['inv_qty']) { ?>
                    <td class="text-danger"><b><?= $data['inv_qty']; ?></b></td>
                <?php } else { ?>
                    <td><b><?= $data['inv_qty']; ?></b></td>
                <?php } ?>

                <?php if ($userdetails['access'] == "ADMIN") { ?>
                <td>
                    <div class="text-center mt-1" role="group" aria-label="Basic example">
                        <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewInventoryModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                        <a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#returnItemModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Return"><i class="bi bi-arrow-clockwise"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashInventoryModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    </div>
                </td>
                <?php } ?>

                <?php include ('./inventory-modal-view.php'); ?>
                <?php include ('./inventory-return-modal.php'); ?>
                <?php include ('./inventory-modal-trash.php'); ?>
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


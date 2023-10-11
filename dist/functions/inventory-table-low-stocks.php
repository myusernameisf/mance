<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblinventory WHERE inv_isTrash = ? AND inv_qty <= inv_lowstocknotif  ORDER BY inv_ID DESC");
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
                <td><?= $data['inv_description']; ?></td>
                <td><b class="text-danger"><?= $data['inv_qty']; ?></b></td>
                <?php if ($userdetails['access'] == "ADMIN") { ?>
                    <td>
                        <div class="text-center mb-3" role="group" aria-label="Basic example">
                            <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewInventoryModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                            <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashInventoryModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                        </div>
                    </td>
                <?php } ?>
                

                <?php include ('./inventory-modal-view.php'); ?>
                <?php include ('./inventory-modal-trash.php'); ?>
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblaccounts WHERE acc_isTrash = ? ORDER BY acc_ID DESC");
    $stmt->execute([1]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td>USER<?= $data['acc_ID']; ?></td>
                <td><?= $data['acc_firstname']; ?></td>
                <td><?= $data['acc_lastname']; ?></td>
                <td><?= $data['acc_email']; ?></td>
                <td><?= $data['acc_access']; ?></td>
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#restoreUserModal<?= $data['acc_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Restore"><i class="bi bi-arrow-clockwise"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $data['acc_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Delete"><i class="bi bi-trash"></i></a>
                    </div>
                </td>

                
                <?php include ('./accounts-modal-delete.php'); ?>
                <?php include ('./accounts-modal-restore.php'); ?>
            </tr>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


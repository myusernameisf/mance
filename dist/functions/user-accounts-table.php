<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblaccounts WHERE acc_isTrash = ?");
    $stmt->execute([0]);
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
                        <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewModal<?= $data['acc_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                        <a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#restartPasswordModal<?= $data['acc_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Restart Password"><i class="bi bi-arrow-clockwise"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashUserModal<?= $data['acc_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    </div>
                </td>

                
                <?php include ('./accounts-modal-reset-password.php'); ?>
                <?php include ('./accounts-modal-view.php'); ?>
                <?php include ('./accounts-modal-trash.php'); ?>
            </tr>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


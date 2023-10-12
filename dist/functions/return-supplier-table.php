<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblreturnsupplier.*,tblproducts.* 
    FROM tblreturnsupplier
    LEFT JOIN tblproducts
    ON rs_invID = prd_ID WHERE rs_isTrash = ? ORDER BY rs_ID DESC");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= date('F d, Y', strtotime($data['rs_date'])); ?></td>
                <td><?= $data['prd_code']; ?></td>
                <td><?= $data['prd_name']; ?></td>
                <td><b><?= $data['rs_qty']; ?></b></td>
                <td><?= $data['rs_remarks']; ?></td>

                <?php if ($userdetails['access'] == 'ADMIN') { ?>
                    <td>
                        <div class="text-center mb-3" role="group" aria-label="Basic example">
                            <a class="btn btn-danger mr-2 mt-3" data-bs-toggle="modal" data-bs-target="#deleteReturnModal<?= $data['rs_ID']; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Delete Record"><i class="bi bi-trash-fill"></i></a>
                        </div>
                    </td>
                <?php } ?>
                
            </tr>

            <?php include ('./return-supplier-modal-trash.php'); ?>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


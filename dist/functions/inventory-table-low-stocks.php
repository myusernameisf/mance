<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblinventory WHERE inv_isTrash = ? AND inv_qty <= inv_lowstocknotif");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['inv_prdCode']; ?></td>
                <td><?= $data['inv_brandname']; ?></td>
                <td><?= $data['inv_name']; ?></td>
                <td><?= $data['inv_qty']; ?></td>
                <td><?= number_format($data['inv_unitprice'],2); ?></td>
                <td><?= number_format($data['inv_sellingprice'],2); ?></td>
                <?php $totalUnitPrice = $data['inv_qty'] * $data['inv_unitprice']; ?>
                <td><?= number_format($totalUnitPrice,2); ?></td>
                <?php $totalSellingPrice = $data['inv_qty'] * $data['inv_sellingprice']; ?>
                <?php $profit = $totalSellingPrice - $totalUnitPrice; ?>
                <td><?= number_format($profit,2); ?></td>
                
                <td>
                    <div class="text-center mb-3" role="group" aria-label="Basic example">
                        <a class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#viewInventoryModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="View"><i class="bi bi-eye-fill"></i></a>
                        <a class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#trashInventoryModal<?= $data['inv_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Trash"><i class="bi bi-trash"></i></a>
                    </div>
                </td>

                <?php include ('./inventory-modal-view.php'); ?>
                <?php include ('./inventory-modal-trash.php'); ?>
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    

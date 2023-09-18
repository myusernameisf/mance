<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * 
    FROM tblsales 
    LEFT JOIN tblaccounts ON acc_ID = sale_userID
    WHERE sale_isTrash = ? ORDER BY sale_ID DESC LIMIT 3");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>
    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <a href="sales-data.php?receiptno=<?= $data['sale_receiptno']; ?>" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Go to Receipt No.: <?= $data['sale_receiptno']; ?>">
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="assets/images/faces/<?= $data['acc_logo']; ?>.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Receipt No.: <?= $data['sale_receiptno']; ?></h5>
                        <h6 class="text-muted mb-0"><?= $data['acc_firstname'].' '.$data['acc_lastname']; ?></h6>
                    </div>
                </div>
            </a>
        <?php } ?>
        
    <?php } else {
        echo 'There is no sales.'; 
    } ?>

    <?php include_once ('connection-close.php'); ?>

    


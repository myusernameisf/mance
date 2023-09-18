<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblremarks.*,tblaccounts.acc_firstname,tblaccounts.acc_lastname,tblaccounts.acc_logo 
    FROM tblremarks 
    LEFT JOIN tblaccounts ON acc_ID = remarks_userID ORDER BY remarks_ID DESC
    LIMIT 4");
    $stmt->execute();
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td class="col-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-md">
                            <img src="assets/images/faces/<?= $data['acc_logo']; ?>.jpg">
                        </div>
                        <p class="font-bold ms-3 mb-0"><?= $data['acc_firstname'].' '.$data['acc_lastname']; ?></p>
                    </div>
                </td>
                <td class="col-auto">
                    <p class=" mb-0"><?= $data['remarks_notes']; ?></p>
                </td>
                <td>
                    <p class=" mb-0"><?= date('F d, Y', strtotime($data['remarks_date'])); ?></p>
                </td>
            </tr>
            
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


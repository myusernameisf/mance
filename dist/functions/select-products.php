<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT prd_ID,prd_brandname,prd_name,prd_code FROM tblproducts WHERE prd_isTrash = ?");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $selects = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($selects as $select) { ?>
            <option value="<?= $select['prd_ID']; ?>"><?= $select['prd_brandname']; ?> - <?= $select['prd_name']; ?> - <?= $select['prd_code']; ?></option>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


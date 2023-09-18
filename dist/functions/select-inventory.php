<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblinventory WHERE inv_isTrash = ?");
    $stmt->execute([0]);
    $count = $stmt->rowCount();
    $selects = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($selects as $select) { ?>
            <option value="<?= $select['inv_ID']; ?>"><?= $select['inv_brandname']; ?> - <?= $select['inv_name']; ?></option>
        <?php } ?>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


<?php

    include_once ('connection-open.php');
    $val = $_GET['value'];
    $stmt = $connection->prepare("SELECT * FROM tblinventory WHERE inv_isTrash = ? AND inv_ID = ?");
    $stmt->execute([0,$val]);
    $count = $stmt->rowCount();
    $select = $stmt->fetch();
?>

    <?php if ($count > 0) { ?>
        <input type="hidden" name="inv-id" value="<?= $select['inv_ID']; ?>">
        <input type="hidden" name="uprice" value="<?= $select['inv_unitprice']; ?>">
        <div class="col-sm-3 mb-2">
            <label>Product Name: </label>
            <input type="text" name="" id="" value="<?= $select['inv_brandname'].' - '.$select['inv_name']; ?>"
            class="form-control" required readonly>
        </div>
        <div class="col-sm-3 mb-2">
            <label>Price: </label>
            <input type="number" step="any" name="sprice" id="price" value="<?= $select['inv_sellingprice']; ?>" placeholder="Price"
            class="form-control" required>
        </div>
        <div class="col-sm-3 mb-2">
            <label>Qty: </label>
            <input type="number" name="qty" placeholder="<?= $select['inv_qty']; ?>" min="1" max="<?= $select['inv_qty']; ?>"
            class="form-control" required>
        </div>
        <div class="col-sm-3 mb-2">
            <button type="submit" class="btn btn-primary mt-4"><i class="bi bi-plus-circle"></i></button>
            <a class="btn btn-warning mt-4" href="sales-point.php"><i class="bi bi-arrow-clockwise"></i></a>
        </div>
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


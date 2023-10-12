<?php

    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT * FROM tblproducts WHERE prd_isTrash = ? AND prd_qty != ? ORDER BY prd_ID DESC");
    $stmt->execute([0,0]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>

    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <tr>
                <td><?= $data['prd_code']; ?></td>
                <td><?= $data['prd_name']; ?></td>
                <?php if ($data['prd_lowstock'] >= $data['prd_qty']) { ?>
                    <td class="text-danger"><b><?= $data['prd_qty']; ?></b></td>
                <?php } else { ?>
                    <td><b><?= $data['prd_qty']; ?></b></td>
                <?php } ?>
                <td>
                    <form class="m-0 p-0" action="functions/pos-create.php" method="post">
                        <input type="hidden" name="uprice" value="<?= $data['prd_unitprice']; ?>">
                        <input type="hidden" name="inv-id" value="<?= $data['prd_ID']; ?>">
                        <input type="hidden" name="userid" value="<?= $userdetails['id']; ?>">
                        <div class="form-group row m-0">
                            <div class="col-sm-3">
                                <label for=""><b>Qty: </b></label><input type="number" name="qty" id="qty" value="0" min="1" max="<?= $data['prd_qty']; ?>" placeholder="Qty"
                                    class="form-control p-1" required>
                            </div>
                            <div class="col-sm-6">
                                <label for=""><b>Price: </b></label><input type="number" step="any" id="selling-price" name="sprice" placeholder="Selling Price" value="<?= $data['prd_sellingprice']; ?>"
                                    class="form-control p-1" required>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary mr-2 mt-4" title="Add Order"><i class="bi bi-cart-fill"></i></button>
                            </div>
                        </div>
                    </form>
                </td>
                    
            </tr>
        <?php } ?>
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


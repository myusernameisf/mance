<?php
    include_once ('connection-open.php');
    $stmt = $connection->prepare("SELECT tblsalesitem.*
    FROM tblsalesitem
    WHERE item_receiptno = ? ORDER BY item_receiptno DESC");
    $stmt->execute([$receiptno]);
    $count = $stmt->rowCount();
    $datas = $stmt->fetchAll();
?>
    <?php $totalValue = 0; ?>
    <?php $totalValueProfit = 0; ?>
    <?php if ($count > 0) { ?>
        <?php foreach ($datas as $data) { ?>
            <div class="row"> 
                <div class="col-2 border p-2"><?= $data['item_prdCode']; ?></div> 
                <div class="col-2 border p-2"><?= $data['item_prdName']; ?></div> 
                <div class="col-2 border p-2"><b><?= $data['item_qty']; ?>(<?= $data['item_returnQty']; ?>)</b></div> 
                <div class="col-2 border p-2"><?= number_format($data['item_sellingPrice'],2); ?></div> 
                <?php $totalSellingPrice = $data['item_qty'] * $data['item_sellingPrice']; ?>
                <?php $totalUnitPrice = $data['item_qty'] * $data['item_unitprice']; ?>
                <div class="col-2 border p-2"><b><?= number_format($totalSellingPrice,2); ?></b></div> 
                <div class="col-2 border p-2 text-center"><a class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#exampleModalToggle<?= $data['item_ID']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Restart Password"><i class="bi bi-arrow-clockwise"></i></a></div> 
                <?php $totalValue += $totalSellingPrice; ?>
                <?php $profit = $totalSellingPrice - $totalUnitPrice; ?>
                <?php $totalValueProfit += $profit; ?>
            </div>
            <div class="modal fade" id="exampleModalToggle<?= $data['item_ID']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel<?= $data['item_ID']; ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Returned Item</h5>
                    </div>
                    <div class="modal-body">
                        Product Code: <b><?= $data['item_prdCode']; ?></b><br>
                        Product Name: <b><?= $data['item_prdName']; ?></b><br><br>
                        
                        <form action="functions/return-item-customer.php" method="post">
                            Select Qty: 
                            <input type="number" name="qty" placeholder="Qty" max="<?= $data['item_qty']; ?>" min="1" value="<?= $data['item_qty']; ?>"
                            class="form-control" required>
                            Remarks: 
                            <textarea class="form-control" name="remarks" id="exampleFormControlremarks"
                                rows="3"></textarea>
                        
                    </div>
                    <div class="modal-footer">
                        <i>Click Accept if done.</i>
                        <button type="submit" name="return-button" value="<?= $data['item_ID']; ?>" class="btn btn-primary">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>
        <div class="row"> 
            <div class="col-2 border p-2"></div> 
            <div class="col-2 border p-2"></div> 
            <div class="col-2 border p-2"></div> 
            <div class="col-2 border p-2"><b>Total Value: </b></div> 
            <div class="col-2 border p-2"><b><?= number_format($totalValue,2); ?></b></div> 
            <div class="col-2 border p-2"></div> 
        </div> 
        
    <?php } ?>

    <?php include_once ('connection-close.php'); ?>

    


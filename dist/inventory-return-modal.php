<!-- Return Item Modal -->
<div class="modal fade" id="returnItemModal<?= $data['inv_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="returnItemModal<?= $data['inv_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="returnItemModal<?= $data['inv_ID']; ?>Title">Return Item to Supplier
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Product Code: <b><?= $data['inv_prdCode']; ?></b><br>
                Product Name: <b><?= $data['inv_name']; ?></b><br><br>
                
                <form action="functions/return-item-supplier.php" method="post">
                    Select Qty: 
                    <input type="number" name="qty" placeholder="Qty" max="<?= $data['inv_qty']; ?>" min="1" value="<?= $data['inv_qty']; ?>"
                    class="form-control" required>
                    Remarks: 
                    <textarea class="form-control" name="remarks" id="exampleFormControlremarks"
                        rows="3"></textarea>
            </div>
            <div class="modal-footer">
                    <a type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </a>
                    <input type="hidden" name="t-qty" value="<?=$data['inv_qty']; ?>">
                    <button type="submit" name="return-item-id" value="<?= $data['inv_ID']; ?>" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
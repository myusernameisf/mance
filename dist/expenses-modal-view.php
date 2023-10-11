<!-- View Account Modal -->
<div class="modal fade" id="viewExpensesModal<?= $data['exp_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="viewExpensesModal<?= $data['exp_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewExpensesModal<?= $data['exp_ID']; ?>Title">View This Record
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/expenses-update.php" method="post">
                    <div class="modal-body">
                        <label>Date: </label>
                        <div class="form-group">
                            <input type="date" name="date" value="<?= $data['exp_date']; ?>" placeholder="Date"
                                class="form-control" required>
                        </div>
                        <label>Product Code: </label>
                        <div class="form-group">
                            <input type="text" name="product-code" value="<?= $data['exp_productCode']; ?>" placeholder="Product Code"
                                class="form-control" required readonly>
                        </div>
                        <label>Product Name: </label>
                        <div class="form-group">
                            <input type="text" name="product-name" value="<?= $data['exp_productName']; ?>" placeholder="Product Name"
                                class="form-control" required readonly>
                        </div>
                        <label>Supplier: </label>
                        <div class="form-group">
                            <input type="text" name="supplier" value="<?= $data['exp_supplier']; ?>" placeholder="Supplier"
                                class="form-control" required>
                        </div>
                        <label>Receipt No.: </label>
                        <div class="form-group">
                            <input type="text" name="receipt-no" value="<?= $data['exp_receiptno']; ?>" placeholder="Receipt No."
                                class="form-control" required>
                        </div>
                        <label>Qty: </label>
                        <div class="form-group">
                            <input type="number" name="qty" placeholder="Qty" value="<?= $data['exp_qty']; ?>"
                                class="form-control" required>
                        </div>
                        <label>Unit Price: </label>
                        <div class="form-group">
                            <input type="number" step="any" name="unit-price" placeholder="Unit Price" value="<?= $data['exp_unitprice']; ?>"
                                class="form-control" required>
                        </div>
                        <hr>
                        <?php $total = $data['exp_unitprice'] * $data['exp_qty']; ?>
                        <label>Total: </label>
                        <div class="form-group">
                            <input type="text" name="total" value="<?= number_format($total,2); ?>" placeholder="Total"
                                class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </a>
                        <button type="submit" name="update-expense-id" value="<?= $data['exp_ID']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
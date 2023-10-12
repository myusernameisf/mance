<!-- View Expenses Modal -->
<div class="modal fade" id="addProductSupplierModal<?= $data['prd_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="addProductSupplierModal<?= $data['prd_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductSupplierModal<?= $data['prd_ID']; ?>Title">Stock In
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/expenses-create.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="rqty" value="<?= $data['prd_qty']; ?>">
                        <input type="hidden" name="id" value="<?= $data['prd_ID']; ?>">
                        <label>Product Code: </label>
                        <div class="form-group">
                            <input type="text" name="product-code" placeholder="Product Code" value="<?= $data['prd_code']; ?>"
                                class="form-control" required readonly>
                        </div>
                        <label>Product Name: </label>
                        <div class="form-group">
                            <input type="text" name="product-name" placeholder="Product Name" value="<?= $data['prd_name']; ?>"
                            class="form-control" required readonly>
                        </div>
                        <label>Category: </label>
                        <div class="form-group">
                            <input type="text" name="category" placeholder="Category" value="<?= $data['prd_category']; ?>"
                                class="form-control" required readonly>
                        </div>
                        <label>UoM: </label>
                        <div class="form-group">
                            <input type="text" name="uom" placeholder="UoM" value="<?= $data['prd_uom']; ?>"
                                class="form-control" required readonly>
                        </div>
                        <hr>
                        <label>Date: </label>
                        <div class="form-group">
                            <input type="date" name="date" placeholder="Date" value="<?= date('Y-m-d'); ?>"
                                class="form-control" required>
                        </div>
                        <label>Supplier: </label>
                        <div class="form-group">
                            <input type="text" name="supplier" placeholder="Supplier"
                                class="form-control" required>
                        </div>
                        <label>Receipt No.: </label>
                        <div class="form-group">
                            <input type="text" name="receipt-no" placeholder="Receipt No."
                                class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Qty: </label>
                                <input type="number" name="qty" placeholder="Qty" id="qty" value="1" min="1"
                                    class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Unit Price: </label>
                                <input type="number" step="any" name="unit-price" id="unitPrice" placeholder="Unit Price" value="0.00"
                                class="form-control" required>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </a>
                        <button type="submit" name="create-user-id" value="<?= $userdetails['id']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Create</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
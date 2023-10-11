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
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Product Code: </label>
                                <input type="text" name="product-code" placeholder="Product Code" value="<?= $data['prd_code']; ?>"
                                class="form-control" required readonly>
                            </div>
                            <div class="col-sm-6">
                                <label>Product Name: </label>
                                <input type="text" name="product-name" placeholder="Product Name" value="<?= $data['prd_name']; ?>"
                                class="form-control" required readonly>
                            </div>
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
                        <label>Qty: </label>
                        <div class="form-group">
                            <input type="number" name="qty" placeholder="Qty" id="qty" onkeyup="add_number()"
                                class="form-control" required>
                        </div>
                        <label>Unit Price: </label>
                        <div class="form-group">
                            <input type="number" step="any" name="unit-price" id="unitPrice" placeholder="Unit Price" onkeyup="add_number()"
                                class="form-control" required>
                        </div>
                        <hr>
                        <label>Total: </label>
                        <div class="form-group">
                            <input type="text" name="total" value="0.00" id="total" placeholder="Total"
                                class="form-control" readonly>
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

<script>
    function add_number() {
    var a_number = parseFloat(document.getElementById("qty").value.replace(/,/g,''));
    if (isNaN(a_number)) a_number = 0;
    var b_number = parseFloat(document.getElementById("unitPrice").value.replace(/,/g,''));
    if (isNaN(b_number)) b_number = 0;
    
    
    var resultUnitPrice = a_number * b_number;
    var result2 = resultUnitPrice.toFixed(2);
    document.getElementById("total").value = result2.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
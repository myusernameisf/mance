<!-- View Expenses Modal -->
<div class="modal fade" id="expensesModal" tabindex="-1" role="dialog"
    aria-labelledby="expensesModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expensesModalTitle">Create Expenses
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/expenses-create.php" method="post">
                    <div class="modal-body">
                        <label>Date: </label>
                        <div class="form-group">
                            <input type="date" name="date" placeholder="Date"
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
                        <label>Select Product: </label>
                        <div class="form-group">
                            <select name="product-id" class="choices form-select" required>
                                <option>Select Product</option>
                                <?php include('functions/select-products.php'); ?>
                            </select>
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
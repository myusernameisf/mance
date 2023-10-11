<!-- View Account Modal -->
<div class="modal fade" id="addOrderModal<?= $data['inv_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="addOrderModal<?= $data['inv_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderModal<?= $data['inv_ID']; ?>Title">Add Order
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/pos-create.php" method="post">
                    <input type="hidden" name="uprice" value="<?= $data['inv_unitprice']; ?>">
                    <input type="hidden" name="inv-id" value="<?= $data['inv_ID']; ?>">
                    <input type="hidden" name="userid" value="<?= $userdetails['id']; ?>">

                    <div class="modal-body">
                        <label>Product Code: </label>
                        <div class="form-group">
                            <input type="text" name="product-code" value="<?= $data['inv_prdCode']; ?>" placeholder="Product Code"
                                class="form-control" required readonly>
                        </div>
                        <label>Name: </label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?= $data['inv_name']; ?>" placeholder="Name"
                                class="form-control" required readonly>
                        </div>
                        <hr>
                        <label>Qty: </label>
                        <div class="form-group">
                            <input type="number" name="qty" id="qty" value="0" min="1" max="<?= $data['inv_qty']; ?>" placeholder="Qty" onkeyup="add_number()"
                                class="form-control" required>
                        </div>
                        <label>Selling Price: </label>
                        <div class="form-group">
                            <input type="number" step="any" id="selling-price" name="sprice" onkeyup="add_number()" placeholder="Selling Price" value="<?= $data['inv_sellingprice']; ?>"
                                class="form-control" required>
                        </div>
                        <hr>
                        <?php $total = $data['inv_unitprice'] * $data['inv_qty']; ?>
                        <label>Total: </label>
                        <div class="form-group">
                            <input type="text" name="total" id="total" value="0.00" placeholder="Total"
                                class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </a>
                        <button type="submit" name="update-inventory-id" value="<?= $data['inv_ID']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Add to order</span> 
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
        var b_number = parseFloat(document.getElementById("selling-price").value.replace(/,/g,''));
        if (isNaN(b_number)) b_number = 0;
        
        
        var resultChange = a_number * b_number;
        var result2 = resultChange.toFixed(2);
        document.getElementById("total").value = result2.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
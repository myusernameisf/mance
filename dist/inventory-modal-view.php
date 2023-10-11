<!-- View Account Modal -->
<div class="modal fade" id="viewInventoryModal<?= $data['inv_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="viewInventoryModal<?= $data['inv_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewInventoryModal<?= $data['inv_ID']; ?>Title">View This Item
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/inventory-update.php" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Product Code: </label>
                                <input type="text" name="product-code" value="<?= $data['inv_prdCode']; ?>" placeholder="Product Code"
                                class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Product Name: </label>
                                <input type="text" name="name" value="<?= $data['inv_name']; ?>" placeholder="Name"
                                class="form-control" required>
                            </div>
                        </div>
                        <label>UoM: </label>
                        <div class="form-group">
                            <input type="text" name="uom" value="<?= $data['inv_uom']; ?>" placeholder="UoM"
                                class="form-control" required>
                        </div>
                        <label for="exampleFormControlDescription" class="form-label">Description: </label>
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="description" id="exampleFormControlDescription"
                                rows="3"><?= $data['inv_description']; ?></textarea>
                        </div>
                        <label>Qty: </label>
                        <div class="form-group">
                            <input type="number" name="qty" value="<?= $data['inv_qty']; ?>" placeholder="Qty"
                                class="form-control" required>
                        </div>
                        <label>Unit Price: </label>
                        <div class="form-group">
                            <input type="number" name="unit-price" placeholder="Unit Price" value="<?= $data['inv_unitprice']; ?>"
                                class="form-control" required>
                        </div>
                        <label>Selling Price: </label>
                        <div class="form-group">
                            <input type="number" step="any" name="selling-price" placeholder="Selling Price" value="<?= $data['inv_sellingprice']; ?>"
                                class="form-control" required>
                        </div>
                        <label>Low Stock Qty: </label>
                        <div class="form-group">
                            <input type="number" step="any" name="low-stock" placeholder="Low Stock Qty" value="<?= $data['inv_lowstocknotif']; ?>"
                                class="form-control" required>
                        </div>
                        <hr>
                        <?php $total = $data['inv_unitprice'] * $data['inv_qty']; ?>
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
                        <button type="submit" name="update-inventory-id" value="<?= $data['inv_ID']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- View Account Modal -->
<div class="modal fade" id="viewProductModal<?= $data['prd_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="viewProductModal<?= $data['prd_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductModal<?= $data['prd_ID']; ?>Title">View This Product
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/products-update.php" method="post">
                    <div class="modal-body">
                    <label>Product Code: </label>
                        <div class="form-group">
                            <input type="text" name="product-code" value="<?= $data['prd_code']; ?>" placeholder="Product Code"
                                class="form-control" required>
                        </div>
                        <label>Product Name: </label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?= $data['prd_name']; ?>" placeholder="Name"
                                class="form-control" required>
                        </div>
                        <label>Category: </label>
                        <div class="form-group">
                            <input type="text" name="category" value="<?= $data['prd_category']; ?>" placeholder="Category"
                                class="form-control" required>
                        </div>
                        <label for="exampleFormControlDescription" class="form-label">Description: </label>
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="desc" id="exampleFormControlDescription"
                                rows="3"><?= $data['prd_desc']; ?></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label>Stock/s: </label>
                            <input type="number" name="qty" value="<?= $data['prd_qty']; ?>" placeholder="Qty"
                                class="form-control <?php if ($data['prd_lowstock'] >= $data['prd_qty']) { echo 'border border-danger'; }; ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label>UoM: </label>
                                <input type="text" name="uom" value="<?= $data['prd_uom']; ?>" placeholder="UoM"
                                class="form-control" required>
                            </div>
                        </div>
                        <label>Unit Price: </label>
                        <div class="form-group">
                            <input type="number" name="unit-price" placeholder="Unit Price" value="<?= $data['prd_unitprice']; ?>"
                                class="form-control" required>
                        </div>
                        <label>Selling Price: </label>
                        <div class="form-group">
                            <input type="number" step="any" name="selling-price" placeholder="Selling Price" value="<?= $data['prd_sellingprice']; ?>"
                                class="form-control" required>
                        </div>
                        <label>Low Stock Qty: </label>
                        <div class="form-group">
                            <input type="number" step="any" name="low-stock" placeholder="Low Stock Qty" value="<?= $data['prd_lowstock']; ?>"
                                class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </a>
                        <button type="submit" name="update-product-id" value="<?= $data['prd_ID']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
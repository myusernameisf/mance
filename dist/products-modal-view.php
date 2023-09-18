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
                        <label>Brand Name: </label>
                        <div class="form-group">
                            <input type="text" name="brand-name" value="<?= $data['prd_brandname']; ?>" placeholder="Brand Name"
                                class="form-control" required>
                        </div>
                        <label>Name: </label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?= $data['prd_name']; ?>" placeholder="Name"
                                class="form-control" required>
                        </div>
                        <label for="exampleFormControlCategory" class="form-label">Category: </label>
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="category" id="exampleFormControlCategory"
                                rows="3"><?= $data['prd_category']; ?></textarea>
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
<!-- View Account Modal -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog"
    aria-labelledby="productsModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productsModalTitle">Create Product
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/products-create.php" method="post">
                    <div class="modal-body">
                        <label>Product Code: </label>
                        <div class="form-group">
                            <input type="text" name="product-code" placeholder="Product Code"
                                class="form-control" required>
                        </div>
                        <label>Product Name: </label>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name"
                                class="form-control" required>
                        </div>
                        <label for="exampleFormControlCategory" class="form-label">Category: </label>
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="category" id="exampleFormControlCategory"
                                rows="3"></textarea>
                        </div>
                        <label for="exampleFormControlUoM" class="form-label">UoM (Unit of Measurement): </label>
                        <div class="form-group">
                            <input type="text" name="uom" placeholder="UoM"
                                class="form-control" required>
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
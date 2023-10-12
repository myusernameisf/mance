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
                            <input type="text" name="name" placeholder="Product Name"
                                class="form-control" required>
                        </div>
                        <label>Category: </label>
                        <div class="form-group">
                            <input type="text" name="category" placeholder="Category"
                                class="form-control" required>
                        </div>
                        <label for="exampleFormControlDescription" class="form-label">Description: </label>
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="desc" id="exampleFormControlDescription"
                                rows="2"></textarea>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="exampleFormControlUoM" class="form-label">UoM: </label>
                            <input type="text" name="uom" placeholder="UoM"
                                class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                            <label for="exampleFormControlLowStock" class="form-label">Low Stock: </label>
                            <input type="number" min="1" name="low-stock" value="10" placeholder="Low Stock"
                                class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label>Receipt No.(From Supplier): </label>
                            <input type="text" name="receipt-no" placeholder="Receipt No."
                                class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                            <label>Supplier: </label>
                            <input type="text" name="supplier" placeholder="Supplier"
                                class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="exampleFormControlDate" class="form-label">Date Arrived: </label>
                                <input type="date" min="1" name="date" value="<?= date('Y-m-d'); ?>"
                                    class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleFormControlQty" class="form-label">Qty: </label>
                                <input type="number" min="1" name="qty" value="0" placeholder="Qty"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="exampleFormControlUnitPrice" class="form-label">Unit Price: </label>
                            <input type="number" step="any" value="0.00" name="unit-price" placeholder="Unit Price"
                                class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                            <label for="exampleFormControlSellingPrice" class="form-label">Selling Price: </label>
                            <input type="number" step="any" value="0.00" name="selling-price" placeholder="Selling Price"
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
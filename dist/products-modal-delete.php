<!-- Delete Product Modal -->
<div class="modal fade" id="deleteProductModal<?= $data['prd_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="deleteProductModal<?= $data['prd_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModal<?= $data['prd_ID']; ?>Title">Delete Product
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to Delete <?= $data['prd_brandname'].' '.$data['prd_name']; ?>?
                </p>
            </div>
            <div class="modal-footer">
                <form action="functions/products-delete.php" method="post">
                    <a type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </a>
                    <button type="submit" name="delete-product-id" value="<?= $data['prd_ID']; ?>" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
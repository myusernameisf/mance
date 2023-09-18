<!-- Trash User Modal -->
<div class="modal fade" id="trashInventoryModal<?= $data['inv_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="trashInventoryModal<?= $data['inv_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trashInventoryModal<?= $data['inv_ID']; ?>Title">Trash User
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to Trash this <?= $data['inv_brandname'].' '.$data['inv_name']; ?>?
                </p>
            </div>
            <div class="modal-footer">
                <form action="functions/inventory-trash.php" method="post">
                    <a type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </a>
                    <button type="submit" name="trash-inventory-id" value="<?= $data['inv_ID']; ?>" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
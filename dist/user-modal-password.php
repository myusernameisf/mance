<!-- View Password Modal -->
<div class="modal fade" id="passwordUser<?= $userdetails['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="passwordUser<?= $userdetails['id']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordUser<?= $userdetails['id']; ?>Title">Settings
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/user-accounts-password.php?userid=<?=$userdetails['id']; ?>" method="post">
                    <div class="modal-body">
                        <label>Current Password: </label>
                        <div class="form-group">
                            <input type="password" name="current-password" placeholder="Current Password"
                                class="form-control" required>
                        </div>
                        <label>New Password: </label>
                        <div class="form-group">
                            <input type="password" name="new-password" placeholder="New Password"
                                class="form-control" minlength="8" required>
                        </div>
                        <label>Confirm Password: </label>
                        <div class="form-group">
                            <input type="password" name="confirm-password" placeholder="Confirm Password"
                                class="form-control" minlength="8" required>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </a>
                        <button type="submit" name="update-user-id" value="<?= $userdetails['id']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
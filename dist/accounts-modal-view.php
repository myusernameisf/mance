<!-- View Account Modal -->
<div class="modal fade" id="viewModal<?= $data['acc_ID']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="viewModal<?= $data['acc_ID']; ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModal<?= $data['acc_ID']; ?>Title">View This User
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="functions/user-accounts-update.php" method="post">
                    <div class="modal-body">
                        <label>Logo: </label>
                        <div class="form-group">
                            <select name="logo" class="choices form-select" required>
                                <option value="<?= $data['acc_logo']; ?>">
                                    <?php if ($data['acc_logo'] == 1) { ?>
                                        Male
                                    <?php } elseif ($data['acc_logo'] == 5) { ?>
                                        Female
                                    <?php } ?>
                                </option>
                                <option value="1">Male</option>
                                <option value="5">Female</option>
                            </select>
                        </div>
                        <label>ID: </label>
                        <div class="form-group">
                            <input type="text" name="id" value="<?= $data['acc_ID']; ?>" placeholder="ID"
                                class="form-control" required readonly>
                        </div>
                        <label>First Name: </label>
                        <div class="form-group">
                            <input type="text" name="first-name" value="<?= $data['acc_firstname']; ?>" placeholder="First Name"
                                class="form-control" required>
                        </div>
                        <label>Last Name: </label>
                        <div class="form-group">
                            <input type="text" name="last-name" value="<?= $data['acc_lastname']; ?>" placeholder="Last Name"
                                class="form-control" required>
                        </div>
                        <hr>
                        <label>Email: </label>
                        <div class="form-group">
                            <input type="text" name="email" value="<?= $data['acc_email']; ?>" placeholder="Email Address"
                                class="form-control" required>
                            <input type="hidden" name="em" value="<?= $data['acc_email']; ?>">
                        </div>
                        <label>Access: </label>
                        <div class="form-group">
                            <input type="text" name="access" value="<?= $data['acc_access']; ?>" placeholder="Access"
                                class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </a>
                        <button type="submit" name="update-user-id" value="<?= $data['acc_ID']; ?>" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
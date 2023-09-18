<!--create account form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Create Account </h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="functions/auth-account-create.php" method="post">
                <div class="modal-body">
                    <label>First Name: </label>
                    <div class="form-group">
                        <input type="text" name="first-name" placeholder="First Name"
                            class="form-control" required>
                    </div>
                    <label>Last Name: </label>
                    <div class="form-group">
                        <input type="text" name="last-name" placeholder="Last Name"
                            class="form-control" required>
                    </div>
                    <label>Gender: </label>
                    <select name="logo" class="choices form-select" required>
                        <option value="1">Male</option>
                        <option value="5">Female</option>
                    </select>
                    <hr>
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email Address"
                            class="form-control" required>
                    </div>
                    <hr>
                    <label>Password: </label>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" minlength="8"
                            class="form-control" required>
                    </div>
                    <label>Confirm Password: </label>
                    <div class="form-group">
                        <input type="password" name="c-password" placeholder="Confirm Password" minlength="8"
                            class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </a>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">login</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
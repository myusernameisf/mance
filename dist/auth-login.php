<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mance Bicycle Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="auth-login.php"><img src="assets/images/logo/mance.PNG" style="height:50%;width:50%" alt="Logo"></a>
                    </div>
                    
                    <?php if (isset($_GET['account-created-success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Account created successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif (isset($_GET['account-created-password'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Password does not match.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif (isset($_GET['account-created-email'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Email Already Exists.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif (isset($_GET['account-login-failed'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Email or Password is incorrect.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif (isset($_GET['login-first'])) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Please Log-in first.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif (isset($_GET['password-change'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Please Re Log-in new Password.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Official Inventory System of Mance Bicycle Shop.</p>

                    <form action="functions/auth-account-login.php" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="email" placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="" data-bs-toggle="modal"
                            data-bs-target="#inlineForm" class="font-bold">Sign
                                up</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>

    <?php include_once ('auth-modal-create.php'); ?>
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory - Mance Bicycle Shop</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="assets/images/logo/mancelogo.PNG">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include_once ('sidebar.php'); ?>
        <div id="main" class='layout-navbar'>
            <?php include_once ('header.php'); ?>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Inventory</h3>
                                <a href="#" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#productsModal">Add new Product</a>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Inventory
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                Inventory

                                <?php if (isset($_GET['product-added-success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Inventory created successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif (isset($_GET['update-success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Inventory updated successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif (isset($_GET['trash-success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Inventory move to trash successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif (isset($_GET['update-failed'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Inventory failed to update.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif (isset($_GET['product-exists'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Inventory already exists.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif (isset($_GET['return-success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Item returned Successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                
                            </div>
                            

                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>UoM</th>
                                            <th>Description</th>
                                            <th>Stocks</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once ('functions/products-table.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>

                <?php include_once ('footer.php'); ?>
                <?php include_once ('products-modal-create.php'); ?>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>
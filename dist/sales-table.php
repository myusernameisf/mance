<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales - Mance Bicycle Shop</title>

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
                                <h3>Sales</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sales
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <?php if (isset($_GET['firstdate'])) { ?>
                                    <?php
                                        $firstDate = $_GET['firstdate']; 
                                        $lastDate = $_GET['lastdate'];
                                    ?>
                                <?php }else { ?>
                                    <?php 
                                        $firstDate = date('Y-m-d', strtotime(' - 7 days')); 
                                        $lastDate = date('Y-m-d');
                                    ?>
                                <?php } ?>

                                <form action="" method="get">
                                    <label>Select Date: </label>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="date" name="firstdate" value="<?= date($firstDate); ?>"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="date" name="lastdate" value="<?= date($lastDate); ?>"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary">View</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            <?php if (isset($_GET['trash-success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Sale move to trash successfully.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Receipt No</th>
                                            <th>Customer</th>
                                            <th>Payment Method</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Profit</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once ('functions/sales-table-all.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>

                <?php include_once ('footer.php'); ?>
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